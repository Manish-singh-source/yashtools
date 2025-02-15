<?php

namespace App\Http\Controllers\User;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class HomeController extends Controller
{
    //
    public function homeView()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        return view('user.index', compact('categories', 'brands', 'subcategories'));
    }

    public function shopView()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $products = Product::orderby('updated_at', 'desc')->paginate(12);
        return view('user.shop', compact('categories', 'brands', 'subcategories', 'products'));
    }

    public function singleProductView(String $id)
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $selectedProduct = Product::with('brands')->find($id);

        if (!empty($selectedProduct->product_specs)) {
            $path = public_path('uploads/products/product_specs/' . $selectedProduct->product_specs);

            // dd($selectedProduct);
            if (!file_exists($path)) {
                die('File not found: ' . $path);
            }

            if (File::exists($path)) {
                $data = Excel::toArray([], $path);
                $sheetData = $data[0];
            }
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            return view('user.single-product', compact('categories', 'brands', 'subcategories', 'selectedProduct', 'sheetData'));
        }

        return view('user.single-product', compact('categories', 'brands', 'subcategories', 'selectedProduct'));
    }

    public function events()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $events = Event::get();
        return view('user.event', compact('categories', 'brands', 'subcategories', 'events'));
    }

    public function contactUs()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $events = Event::get();
        return view('user.contact', compact('categories', 'brands', 'subcategories', 'events'));
    }
}
