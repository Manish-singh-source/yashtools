<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function viewAddSubCategories()
    {
        $categories =  Categories::get();
        return view('admin.add-sub-category', compact('categories'));
    }


    public function addSubCategory(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'subcategoryId' => 'required|exists:categories,id',
            'subcategory_name' => [
                'required',
                Rule::unique('sub_categories', 'sub_category_name')
                    ->where('category_id', $request->subcategoryId)
                    ->whereNull('deleted_at')
            ],
            'subcategoryImage' => 'required|image',
            'display_order' => [
                'required',
                'numeric',
                'min:0',
                Rule::unique('sub_categories', 'display_order')->whereNull('deleted_at')
            ],
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        if (!empty($request->subcategoryImage)) {
            $image = $request->subcategoryImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('/uploads/subcategories'), $imageName);

            $subcategory = new SubCategories();
            $subcategory->category_id = $request->subcategoryId;
            $subcategory->sub_category_name = $request->subcategory_name;
            $subcategory->sub_category_image = $imageName;
            $subcategory->display_order = $request->display_order;
            $subcategory->save();
        }
        flash()->success('Sub Category Added Successfully.');
        return redirect()->route('admin.table.subcategory');
    }

    public function viewSubCategoryTable()
    {
        // order by display_order so UI reflects current ordering
        $subcategories =  SubCategories::with('category')->withCount('productsCount')->orderBy('display_order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.sub-category-table', compact('subcategories'));
    }

    public function deleteSubCategory(Request $request)
    {
        $subcategory = SubCategories::where('subcategory_slug', $request->subcategorySlug)->first();
        if (!empty($subcategory->subcategory_image)) {
            File::delete(public_path('/uploads/subcategories/' . $subcategory->subcategory_image));
        }
        $subcategory->delete();

        if ($subcategory) {
            return back()->with('success', 'Successfully Deleted Banner Image');
        }

        return back()->with('error', 'Please Try Again.');
    }

    public function editSubCategory(String $slug)
    {
        $selectedSubcategory = SubCategories::with('category')->where('subcategory_slug', $slug)->first();
        $categories =  Categories::get();
        return view('admin.edit-sub-category', compact('selectedSubcategory', 'categories'));
    }

    public function updateSubCategory(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'selectedSubcategoryId' => 'required',
            'categoryId' => 'required|exists:categories,id',
            'subcategory_name' => [
                'required',
                Rule::unique('sub_categories', 'sub_category_name')
                    ->ignore($request->selectedSubcategoryId) // allow updating the same subcategory
                    ->where(function ($query) use ($request) {
                        $query->where('category_id', $request->categoryId) // unique within same category
                            ->whereNull('deleted_at');                  // ignore soft-deleted
                    }),
            ],
            "subcategoryImage" => "image",
            'display_order' => [
                'required',
                'numeric',
                'min:0',
                Rule::unique('sub_categories', 'display_order')->ignore($request->selectedSubcategoryId)->whereNull('deleted_at')
            ],
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $subcategory = SubCategories::find($request->selectedSubcategoryId);
        $subcategory->category_id = $request->categoryId;
        $subcategory->sub_category_name = $request->subcategory_name;
        if (!empty($subcategory->subcategory_image)) {
            File::delete(public_path('/uploads/subcategories/' . $subcategory->subcategory_image));
        }
        if (!empty($request->subcategoryImage)) {
            $image = $request->subcategoryImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('/uploads/subcategories'), $imageName);
            $subcategory->sub_category_image = $imageName;
        }
        $subcategory->display_order = $request->display_order;

        $subcategory->save();
        flash()->success('Sub Category Updated Successfully.');
        return redirect()->route('admin.table.subcategory');
    }

    /**
     * Reorder sub categories via drag-and-drop.
     */
    public function reorderSubCategories(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'order' => 'required|array',
            'order.*' => 'integer|exists:sub_categories,id',
        ]);

        if ($validations->fails()) {
            return response()->json(['success' => false, 'message' => 'Invalid data provided.'], 422);
        }

        $order = $request->order;

        DB::beginTransaction();
        try {
            // store display orders as 1-based index (start at 1)
            foreach ($order as $index => $id) {
                SubCategories::where('id', $id)->update(['display_order' => $index + 1]);
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Order updated successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Could not save order.'], 500);
        }
    }

    /**
     * Server-side DataTables endpoint for sub categories
     */
    public function subCategoryData(Request $request)
    {
        $draw = intval($request->input('draw'));
        $start = intval($request->input('start', 0));
        $length = intval($request->input('length', 10));
        $search = $request->input('search.value');

        $query = SubCategories::with('category')->withCount('productsCount');

        $recordsTotal = $query->count();

        if (!empty($search)) {
            $query = $query->where(function ($q) use ($search) {
                $q->where('sub_category_name', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($q2) use ($search) {
                        $q2->where('category_name', 'like', "%{$search}%");
                    });
            });
        }

        $recordsFiltered = $query->count();

        $data = $query->orderBy('display_order', 'asc')->orderBy('created_at', 'desc')
            ->skip($start)->take($length)->get();

        $result = $data->map(function ($item) {
            return [
                'id' => $item->id,
                'category_name' => $item->category->category_name ?? '',
                'sub_category_name' => $item->sub_category_name,
                'sub_category_image' => $item->sub_category_image,
                'products_count_count' => $item->products_count_count,
                'display_order' => $item->display_order,
                'subcategory_slug' => $item->subcategory_slug,
            ];
        })->toArray();

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $result,
        ]);
    }

    /**
     * Return all subcategories (minimal fields) for full reorder mode
     */
    public function subCategoryAll()
    {
        $items = SubCategories::with('category')->withCount('productsCount')
            ->orderBy('display_order', 'asc')->orderBy('created_at', 'desc')->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'category_name' => $item->category->category_name ?? '',
                    'sub_category_name' => $item->sub_category_name,
                    'sub_category_image' => $item->sub_category_image,
                    'products_count_count' => $item->products_count_count,
                    'display_order' => $item->display_order,
                    'subcategory_slug' => $item->subcategory_slug,
                ];
            });

        return response()->json($items);
    }
}
