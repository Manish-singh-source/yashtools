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
            'categoryImage' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:2048', // 2MB
                'dimensions:min_width=300,min_height=240,max_width=300,max_height=240'
            ],
        ], [
            'categoryImage.dimensions' => 'Category image must be exactly 300x240 pixels.',
            'categoryImage.image' => 'Please upload a valid image file.',
            'categoryImage.mimes' => 'Image must be JPEG, PNG, JPG, or WebP.',
            'categoryImage.max' => 'Image size must not exceed 2MB.',
            'category_name.required' => 'Category name is required.',
            'category_name.unique' => 'Category name already exists.',
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
            'category_id' => 'required|exists:categories,id',
            'category_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'category_name')
                    ->ignore($request->category_id)
                    ->whereNull('deleted_at')
            ],
            'categoryImage' => [
                'nullable',  // Optional for updates
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:2048',  // 2MB
                'dimensions:min_width=300,min_height=240,max_width=300,max_height=240'
            ],
        ], [
            'category_id.required' => 'Category ID is required.',
            'category_id.exists' => 'Invalid category.',
            'category_name.required' => 'Category name is required.',
            'category_name.unique' => 'Category name already exists.',
            'categoryImage.image' => 'Please upload a valid image file.',
            'categoryImage.mimes' => 'Image must be JPEG, PNG, JPG or WebP.',
            'categoryImage.max' => 'Image size must not exceed 2MB.',
            'categoryImage.dimensions' => 'Category image must be exactly 300x240 pixels.',
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $category = Categories::findOrFail($request->category_id);

        // Update category name
        $category->category_name = $request->category_name;

        // Handle image update (only if new image provided)
        if ($request->hasFile('categoryImage')) {
            // Delete old image if exists
            if ($category->category_image && file_exists(public_path('/uploads/categories/' . $category->category_image))) {
                unlink(public_path('/uploads/categories/' . $category->category_image));
            }

            // Upload new image
            $image = $request->file('categoryImage');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '_' . uniqid() . '.' . $ext;
            $image->move(public_path('/uploads/categories'), $imageName);
            $category->category_image = $imageName;
        }

        $category->save();

        flash()->success('Category updated successfully!');
        return redirect()->route('admin.table.category');
    }
}
