<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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
            'subcategory_name' => 'required|unique:sub_categories,sub_category_name,NULL,id,category_id,' . $request->subcategoryId,
            "subcategoryImage" => "required|image",
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        if (!empty($request->subcategoryImage)) {
            $image = $request->subcategoryImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/subcategories'), $imageName);

            $subcategory = new SubCategories();
            $subcategory->category_id = $request->subcategoryId;
            $subcategory->sub_category_name = $request->subcategory_name;
            $subcategory->sub_category_image = $imageName;
            $subcategory->save();
        }
        return redirect()->route('admin.table.subcategory');
    }

    public function viewSubCategoryTable()
    {
        $subcategories =  SubCategories::with('category')->withCount('productsCount')->get();
        // dd($subcategories);
        return view('admin.sub-category-table', compact('subcategories'));
    }

    public function deleteSubCategory(Request $request)
    {
        $subcategory = SubCategories::find($request->subcategoryId);
        if (!empty($subcategory->subcategory_image)) {
            File::delete(public_path('/uploads/subcategories/' . $subcategory->subcategory_image));
        }
        $subcategory->delete();

        if ($subcategory) {
            return back()->with('success', 'Successfully Deleted Banner Image');
        }

        return back()->with('error', 'Please Try Again.');
    }

    public function editSubCategory(String $id)
    {
        $selectedSubcategory = SubCategories::with('category')->find($id);
        $categories =  Categories::get();
        return view('admin.edit-sub-category', compact('selectedSubcategory', 'categories'));
    }

    public function updateSubCategory(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'selectedSubcategoryId' => 'required',
            'categoryId' => 'required|exists:categories,id',
            'subcategory_name' => 'required|unique:sub_categories,sub_category_name,' . $request->selectedSubcategoryId . ',id,category_id,' . $request->categoryId,
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
            $image->move(public_path('uploads/subcategories'), $imageName);
            $subcategory->sub_category_image = $imageName;
        }

        $subcategory->save();
        return redirect()->route('admin.table.subcategory');
    }
}
