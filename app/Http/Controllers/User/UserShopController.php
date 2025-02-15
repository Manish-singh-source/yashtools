<?php

namespace App\Http\Controllers\User;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Http\Controllers\Controller;

class UserShopController extends Controller
{
    public function productShop()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $products = Product::orderby('updated_at', 'desc')->paginate(12);
        return view('user.productcategory', compact('categories', 'brands', 'subcategories', 'products'));
    }
}
