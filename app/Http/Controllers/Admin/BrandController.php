<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    //
    public function viewAddBrand()
    {
        return view('admin.add-brand');
    }

    public function addBrand(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'brand_name' => [
                'required',
                Rule::unique('brands')->whereNull('deleted_at')
            ],
            'brandImage' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:1024', // 1MB
                'dimensions:min_width=300,min_height=100,max_width=300,max_height=100'
            ],
        ], [
            'brand_name.required' => 'Brand name is required.',
            'brand_name.unique' => 'Brand name already exists.',
            'brandImage.required' => 'Brand image is required.',
            'brandImage.dimensions' => 'Image must be exactly 300x100 pixels.',
            'brandImage.max' => 'Image size cannot exceed 1MB.',
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        if (!empty($request->brandImage)) {
            $image = $request->brandImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('/uploads/brands'), $imageName);

            $brand = new Brand();
            $brand->brand_name = $request->brand_name;
            $brand->brand_image = $imageName;
            $brand->save();
        }

        flash()->success('Brand Added Successfully.');
        return redirect()->route('admin.table.brand');
    }

    public function viewBrandTable()
    {
        $brands = Brand::withCount('productsCount')->orderBy('created_at', 'desc')->get();
        return view('admin.brand-table', compact('brands'));
    }

    public function deleteBrand(Request $request)
    {
        $brand = Brand::where('brand_slug', $request->brandSlug)->first();
        if (!empty($brand->brand_image)) {
            File::delete(public_path('/uploads/brands/' . $brand->brand_image));
        }
        $brand->delete();

        if ($brand) {
            return back()->with('success', 'Successfully Deleted Banner Image');
        }

        return back()->with('error', 'Please Try Again.');
    }

    public function editBrand(String $slug)
    {
        $selectedbrand = Brand::where('brand_slug', $slug)->first();
        return view('admin.edit-brand', compact('selectedbrand'));
    }

    public function updateBrand(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'brandId' => 'required',
            'brand_name' => [
                'required',
                Rule::unique('brands', 'brand_name')
                    ->ignore($request->brandId) // allow updating same brand
                    ->where(fn($query) => $query->whereNull('deleted_at')), // ignore soft deleted
            ],
            'brandImage' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'max:1024', // 1MB
                'dimensions:min_width=300,min_height=100,max_width=300,max_height=100'
            ],
        ], [
            'brandId.required' => 'Brand ID is required.',
            'brand_name.required' => 'Brand name is required.',
            'brand_name.unique' => 'Brand name already exists.',
            'brandImage.dimensions' => 'Image must be exactly 300x100 pixels.',
            'brandImage.max' => 'Image size cannot exceed 1MB.',
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        $brand = Brand::find($request->brandId);
        $brand->brand_name = $request->brand_name;


        if (!empty($request->brandImage)) {
            if (!empty($brand->brand_image)) {
                File::delete(public_path('/uploads/brands/' . $brand->brand_image));
            }

            $image = $request->brandImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('/uploads/brands'), $imageName);

            $brand->brand_image = $imageName;
        }
        $brand->save();
        if ($brand) {
            flash()->success('Brand Updated Successfully.');
            return redirect()->route('admin.table.brand');
        }

        flash()->error('Something Went Wrong. Please Try Again.');
        return back();
    }
}
