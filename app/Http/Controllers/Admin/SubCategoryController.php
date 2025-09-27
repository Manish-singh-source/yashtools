<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
            $subcategory->save();
        }
        flash()->success('Sub Category Added Successfully.');
        return redirect()->route('admin.table.subcategory');
    }

    public function viewSubCategoryTable()
    {
        $subcategories =  SubCategories::with('category')->withCount('productsCount')->orderBy('created_at', 'desc')->get();
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

        $subcategory->save();
        flash()->success('Sub Category Updated Successfully.');
        return redirect()->route('admin.table.subcategory');
    }
}
