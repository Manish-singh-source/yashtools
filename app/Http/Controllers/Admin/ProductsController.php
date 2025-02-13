<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Flasher\Prime\FlasherInterface;

class ProductsController extends Controller
{
    public function viewProduct()
    {
        $brands = Brand::get();
        $categories = Categories::get();
        $subcategories = SubCategories::get();
        return view('admin.add-product', compact('brands', 'categories', 'subcategories'));
    }

    public function addProducts(Request $request)
    {
        // Validate the request
        $validations = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_quantity' => 'required|numeric',
            'product_price' => 'numeric',
            'product_days_to_dispatch' => 'required',
            'product_description' => 'required',
            'product_brand' => 'required',
            'product_image' => 'required|image',
            'product_pdf' => 'image',
            'product_catalogue' => 'image',
            'product_drawing' => 'image',
            'product_category' => 'required',
            'product_sub_category' => 'required',
        ]);

        // Check validation errors
        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }


        // Create new product
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_dispatch = $request->product_days_to_dispatch;
        $product->product_discription = $request->product_description;

        // Handle image upload
        if (!empty($request->product_image)) {
            $image1 = $request->product_image;
            $ext1 = $image1->getClientOriginalExtension();
            $imageName1 = time() . "." . $ext1;
            $image1->move(public_path('uploads/products/thumbnails'), $imageName1);
            $product->product_thumbain = $imageName1;
        }

        // Handle PDF upload
        if (!empty($request->product_pdf)) {
            $image2 = $request->product_pdf;
            $ext2 = $image2->getClientOriginalExtension();
            $imageName2 = time() . "." . $ext2;
            $image2->move(public_path('uploads/products/pdf'), $imageName2);
            $product->product_pdf = $imageName2;
        }

        // Handle catalogue upload
        if (!empty($request->product_catalogue)) {
            $image3 = $request->product_catalogue;
            $ext3 = $image3->getClientOriginalExtension();
            $imageName3 = time() . "." . $ext3;
            $image3->move(public_path('uploads/products/catalogue'), $imageName3);
            $product->product_catalouge = $imageName3;
        }

        // Handle drawing upload
        if (!empty($request->product_drawing)) {
            $image4 = $request->product_drawing;
            $ext4 = $image4->getClientOriginalExtension();
            $imageName4 = time() . "." . $ext4;
            $image4->move(public_path('uploads/products/drawing'), $imageName4);
            $product->product_drawing = $imageName4;
        }

        // Save additional product details
        $product->product_brand_id = $request->product_brand;
        $product->product_category_id = $request->product_category;
        $product->product_sub_category_id = $request->product_sub_category;
        $product->product_arrivals = $request->new_products ?? "";
        $product->product_sale = $request->new_offer ?? "";
        $product->save();

        return redirect()->route('admin.table.product');
    }


    public function viewProductTable()
    {
        $products = Product::with('categories')->with('subcategories')->with('brands')->get();
        return view('admin.product-table', compact('products'));
    }


    public function deleteProduct(Request $request)
    {
        $customer = Product::find($request->productId);
        if (!empty($customer->product_catalouge)) {
            File::delete(public_path('/uploads/products/catalogue/' . $customer->product_catalouge));
        }
        if (!empty($customer->product_pdf)) {
            File::delete(public_path('/uploads/products/pdf/' . $customer->product_pdf));
        }
        if (!empty($customer->product_drawing)) {
            File::delete(public_path('/uploads/products/drawing/' . $customer->product_drawing));
        }
        if (!empty($customer->product_thumbain)) {
            File::delete(public_path('/uploads/products/thumbnails/' . $customer->product_thumbain));
        }

        $customer->delete();

        if ($customer) {
            return back()->with('success', 'Successfully Deleted Customer');
        }
        return back()->with('error', 'Please Try Again.');
    }


    public function editProduct(String $id)
    {
        $brands = Brand::get();
        $categories = Categories::get();
        $subcategories = SubCategories::get();

        $selectedProduct = Product::find($id);
        return view('admin.edit-product', compact('brands', 'categories', 'subcategories', 'selectedProduct'));
    }

    public function updateProduct(Request $request)
    {
        // Validate the request
        $validations = Validator::make($request->all(), [
            'productId' => 'required',
            'product_name' => 'required',
            'product_quantity' => 'required|numeric',
            'product_price' => 'numeric',
            'product_days_to_dispatch' => 'required',
            'product_description' => 'required',
            'product_brand' => 'required',
            'product_image' => 'image',
            'product_pdf' => 'image',
            'product_catalogue' => 'image',
            'product_drawing' => 'image',
            'product_category' => 'required',
            'product_sub_category' => 'required',
        ]);

        // Check validation errors
        if ($validations->fails()) {
            return back()->withErrors($validations)->withInput();
        }


        // Create new product
        $product = Product::find($request->productId);
        $product->product_name = $request->product_name;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_dispatch = $request->product_days_to_dispatch;
        $product->product_discription = $request->product_description;


        // Handle image upload
        if (!empty($request->product_image)) {

            if (!empty($product->product_thumbain)) {
                File::delete(public_path('/uploads/products/thumbnails/' . $product->product_thumbain));
            }

            $image1 = $request->product_image;
            $ext1 = $image1->getClientOriginalExtension();
            $imageName1 = time() . "." . $ext1;
            $image1->move(public_path('uploads/products/thumbnails'), $imageName1);
            $product->product_thumbain = $imageName1;
        }

        // Handle PDF upload
        if (!empty($request->product_pdf)) {

            if (!empty($product->product_pdf)) {
                File::delete(public_path('/uploads/products/pdf/' . $product->product_pdf));
            }

            $image2 = $request->product_pdf;
            $ext2 = $image2->getClientOriginalExtension();
            $imageName2 = time() . "." . $ext2;
            $image2->move(public_path('uploads/products/pdf'), $imageName2);
            $product->product_pdf = $imageName2;
        }

        // Handle catalogue upload
        if (!empty($request->product_catalogue)) {

            if (!empty($product->product_catalouge)) {
                File::delete(public_path('/uploads/products/catalogue/' . $product->product_catalouge));
            }

            $image3 = $request->product_catalogue;
            $ext3 = $image3->getClientOriginalExtension();
            $imageName3 = time() . "." . $ext3;
            $image3->move(public_path('uploads/products/catalogue'), $imageName3);
            $product->product_catalouge = $imageName3;
        }

        // Handle drawing upload
        if (!empty($request->product_drawing)) {

            if (!empty($product->product_drawing)) {
                File::delete(public_path('/uploads/products/drawing/' . $product->product_drawing));
            }

            $image4 = $request->product_drawing;
            $ext4 = $image4->getClientOriginalExtension();
            $imageName4 = time() . "." . $ext4;
            $image4->move(public_path('uploads/products/drawing'), $imageName4);
            $product->product_drawing = $imageName4;
        }

        // Save additional product details
        $product->product_brand_id = $request->product_brand;
        $product->product_category_id = $request->product_category;
        $product->product_sub_category_id = $request->product_sub_category;
        $product->product_arrivals = $request->new_products ?? "";
        $product->product_sale = $request->new_offer ?? "";
        $product->save();

        return redirect()->route('admin.table.product');
    }

    public function detailProduct(String $id)
    {
        $productDetails = Product::with('categories')->with('subcategories')->with('brands')->where('id', $id)->first();
        return view('admin.product-details', compact('productDetails'));
    }
}
