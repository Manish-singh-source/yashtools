<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function viewAddCategories()
    {
        return view('admin.add-category');
    }

    public function addCategory(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'category_name' => 'required',
            "categoryImage" => "image",
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }


        if (!empty($request->categoryImage)) {

            $image = $request->categoryImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/categories'), $imageName);

            $banner = new Categories();
            $banner->category_name = $request->category_name;
            $banner->category_image = $imageName;
            $banner->save();
        }
        return redirect()->route('admin.table.category');
    }

    public function viewCategoryTable()
    {
        $categories = Categories::get();
        return view('admin.category-table', compact('categories'));
    }

    public function deleteCategory(Request $request)
    {
        $category = Categories::find($request->bannerId);
        if (!empty($category->category_image)) {
            File::delete(public_path('/uploads/categories/' . $category->category_image));
        }
        $category->delete();

        if ($category) {
            return back()->with('success', 'Successfully Deleted Banner Image');
        }

        return back()->with('error', 'Please Try Again.');
    }

    public function editCategory(String $id)
    {
        $category = Categories::find($id);
        return view('admin.edit-category', compact('category'));
    }

    public function updateCategory(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'category_id' => 'required',
            'category_name' => 'required',
            "categoryImage" => "image",
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }


        if (!empty($request->categoryImage)) {

            $image = $request->categoryImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/categories'), $imageName);

            $category = Categories::find($request->category_id);
            $category->category_name = $request->category_name;
            $category->category_image = $imageName;
            $category->save();
        }
        return redirect()->route('admin.table.category');
    }
}
