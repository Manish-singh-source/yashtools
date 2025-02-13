<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Product;
use App\Models\SubCategories;
use Illuminate\Http\Request;

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
}
