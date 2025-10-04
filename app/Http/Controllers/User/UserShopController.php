<?php

namespace App\Http\Controllers\User;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Favourite;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class UserShopController extends Controller
{
    public function productShop()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $products = Product::where('status', '1')->orderby('updated_at', 'desc')->paginate(12);
        return view('user.productcategory', compact('categories', 'brands', 'subcategories', 'products'));
    }

    public function productDetails(String $slug)
    {

        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $selectedProduct = Product::with('brands', 'subcategories')->where('product_slug', $slug)->orderby('updated_at', 'desc')->first();
        $favouritesProducts = Favourite::where('product_id', $selectedProduct->id)->where('user_id', Auth::id())->first();

        $similarProducts = Product::where('product_category_id', $selectedProduct->product_category_id)->where('id', '!=', $selectedProduct->id)->limit(4)->get();
        if ($similarProducts->isEmpty()) {
            $similarProducts = Product::where('id', '!=', $selectedProduct->id)->limit(4)->get();
        }
        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('user.dashboard')],
            ['name' => 'Products', 'url' => route('user.product.category')],
            ['name' => $selectedProduct->product_name, 'url' => route('user.product.details', $selectedProduct->product_slug)],
        ];

        if (!empty($selectedProduct->product_specs)) {
            $path = public_path('/uploads/products/product_specs/' . $selectedProduct->product_specs);

            if (!file_exists($path)) {
                die('File not found: ' . $path);
            }

            if (File::exists($path)) {
                $data = Excel::toArray([], $path);
                $sheetData = $data[0];
            }
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            return view('user.productdetails', compact('categories', 'brands', 'subcategories', 'selectedProduct', 'sheetData', 'favouritesProducts', 'similarProducts', 'breadcrumbs'));
        }
        return view('user.productdetails', compact('categories', 'brands', 'subcategories', 'selectedProduct', 'favouritesProducts', 'similarProducts', 'breadcrumbs'));
    }
    
}
