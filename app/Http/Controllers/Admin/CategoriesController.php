<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    public function viewAddCategories()
    {
        return view('admin.add-category');
    }

    public function addCategory(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'category_name' => [
                'required',
                Rule::unique('categories')->whereNull('deleted_at')
            ],
            "categoryImage" => "required|image",
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }


        if (!empty($request->categoryImage)) {

            $image = $request->categoryImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('/uploads/categories'), $imageName);

            $category = new Categories();
            $category->category_name = $request->category_name;
            $category->category_image = $imageName;
            $category->save();
        }
        if ($category) {
            flash()->success('Category Created Successfully.');
            return redirect()->route('admin.table.category');
        }

        return back()->with('error', 'Please Try Again.');
    }

    public function viewCategoryTable()
    {
        $categories = Categories::withCount('productsCount')->orderBy('created_at', 'desc')->get();
        return view('admin.category-table', compact('categories'));
    }

    public function deleteCategory(Request $request)
    {
        $category = Categories::where('category_slug', $request->categorySlug)->first();
        if (!empty($category->category_image)) {
            File::delete(public_path('/uploads/categories/' . $category->category_image));
        }
        $category->delete();

        if ($category) {
            return back()->with('success', 'Successfully Deleted Category');
        }

        return back()->with('error', 'Please Try Again.');
    }

    public function editCategory(String $slug)
    {
        $category = Categories::where('category_slug', $slug)->first();
        return view('admin.edit-category', compact('category'));
    }

    public function updateCategory(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'category_id' => 'required',
            'category_name' => [
                'required',
                Rule::unique('categories', 'category_name')
                    ->ignore($request->category_id) // ignore current row
                    ->whereNull('deleted_at')       // ignore soft-deleted rows
            ],
            "categoryImage" => "image",
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $category = Categories::find($request->category_id);
        $category->category_name = $request->category_name;
        if (!empty($category->category_image)) {
            File::delete(public_path('/uploads/categories/' . $category->category_image));
        }
        if (!empty($request->categoryImage)) {
            $image = $request->categoryImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('/uploads/categories'), $imageName);
            $category->category_image = $imageName;
        }
        $category->save();

        if ($category) {
            flash()->success('Category Updated Successfully.');
            return redirect()->route('admin.table.category');
        }

        flash()->error('Something Went Wrong. Please Try Again.');
        return back();
    }
}
