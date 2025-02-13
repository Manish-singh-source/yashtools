<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Flasher\Prime\FlasherInterface;

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
            'brand_name' => 'required|unique:brands,brand_name',
            "brandImage" => "required|image",
        ]);

        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }

        if (!empty($request->brandImage)) {
            $image = $request->brandImage;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/brands'), $imageName);

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
        $brands = Brand::withCount('productsCount')->get();
        // dd($brands);
        return view('admin.brand-table', compact('brands'));
    }

    public function deleteBrand(Request $request)
    {
        $brand = Brand::find($request->brandId);
        if (!empty($brand->brand_image)) {
            File::delete(public_path('/uploads/brands/' . $brand->brand_image));
        }
        $brand->delete();

        if ($brand) {
            return back()->with('success', 'Successfully Deleted Banner Image');
        }

        return back()->with('error', 'Please Try Again.');
    }
    public function editBrand(String $id)
    {
        $selectedbrand = Brand::find($id);
        return view('admin.edit-brand', compact('selectedbrand'));
    }

    public function updateBrand(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'brandId' => 'required',
            'brand_name' => 'required|unique:brands,brand_name,' . $request->brandId . '',
            "brandImage" => "image",
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
            $image->move(public_path('uploads/brands'), $imageName);

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
