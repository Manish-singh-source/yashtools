<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
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
        return redirect()->route('admin.category.table');
    }
}
