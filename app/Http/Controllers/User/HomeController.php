<?php

namespace App\Http\Controllers\User;

use App\Models\Brand;
use App\Models\Event;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Favourite;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    //
    public function homeView()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $banners = Banner::where('status', '1')->latest()->take(3)->get();
        return view('user.index', compact('categories', 'brands', 'subcategories', 'banners'));
    }

    public function searchProducts(Request $request)
    {
        $searchTerm = $request->searchItem; // Get the search input

        $products = Product::where('status', '1')
            ->when($searchTerm, function ($query, $searchTerm) {
                return $query->where(function ($q) use ($searchTerm) {
                    $q->where('product_name', 'like', "%{$searchTerm}%");
                });
            })
            ->get();

        // Return JSON response
        return response()->json($products);
    }


    public function shopView($category = null)
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $products = Product::query()->where('status', '1');
        $products->orderby('updated_at', 'desc')->paginate(4);

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('user.home')],
            ['name' => 'Products', 'url' => route('user.shop')],
        ];

        if ($category) {
            $selectedCategories = $category;
        } else {
            $selectedCategories = null;
        }

        return view('user.shop', compact('categories', 'brands', 'subcategories', 'products', 'breadcrumbs', 'selectedCategories'));
    }

    public function shopViewAPI(Request $request)
    {

        $query = Product::query();

        // Apply category filter if selected
        if ($request->has('category') && $request->category != '') {
            $query->whereIn('product_category_id', $request->category);
        }

        if ($request->has('subcategory') && $request->subcategory != '') {
            $query->whereIn('product_sub_category_id', $request->subcategory);
        }
        // Apply brand filter if selected
        if ($request->has('brand') && $request->brand != '') {
            $query->whereIn('product_brand_id', $request->brand);
        }

        // Apply brand filter if selected
        if ($request->has('tags') && !empty($request->tags)) {
            if (in_array('new', $request->tags)) {
                $query->where('product_arrivals', 'new');
            }
        }

        if ($request->has('tags') && !empty($request->tags)) {
            if (in_array('offer', $request->tags)) {
                $query->where('product_sale', 'offer');
            }
        }

        // Apply sorting
        if ($request->has('sort_by')) {
            if ($request->sort_by == 'latest') {
                $query->orderBy('updated_at', 'asc');
            } elseif ($request->sort_by == 'by_name') {
                $query->orderBy('product_name', 'asc');
            }
        }

        // Fetch paginated data (10 products per page)
        $products = $query->where('status', '1')->paginate(9);

        // Return JSON response
        return response()->json($products);
    }

    public function subCategoriesFilter(Request $request)
    {
        if ($request->has('subcategory') && $request->subcategory != '') {
            $subcategories = SubCategories::whereIn('category_id', $request->subcategory)->get();
        }
        // Return JSON response
        return response()->json($subcategories);
    }

    public function singleProductView(String $slug)
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $selectedProduct = Product::with('brands')->where('product_slug', $slug)->orderby('updated_at', 'desc')->first();
        $favouritesProducts = Favourite::where('product_id', $selectedProduct->id)->where('user_id', Auth::id())->first();

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('user.home')],
            ['name' => 'Products', 'url' => route('user.shop')],
            ['name' => $selectedProduct->product_name, 'url' => route('user.single.product', $selectedProduct->product_slug)],
        ];

        $similarProducts = Product::where('product_category_id', $selectedProduct->product_category_id)->where('id', '!=', $selectedProduct->id)->limit(4)->get();
        if ($similarProducts->isEmpty()) {
            $similarProducts = Product::where('id', '!=', $selectedProduct->id)->limit(4)->get();
        }

        if (!empty($selectedProduct->product_specs)) {
            $path = public_path('uploads/products/product_specs/' . $selectedProduct->product_specs);

            if (!file_exists($path)) {
                die('File not found: ' . $path);
            }

            if (File::exists($path)) {
                $data = Excel::toArray([], $path);
                $sheetData = $data[0];
            }
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            return view('user.single-product', compact('categories', 'brands', 'subcategories', 'selectedProduct', 'sheetData', 'favouritesProducts', 'similarProducts', 'breadcrumbs'));
        }
        return view('user.single-product', compact('categories', 'brands', 'subcategories', 'selectedProduct', 'favouritesProducts', 'similarProducts', 'breadcrumbs'));
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

    public function aboutUs()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $events = Event::get();
        return view('user.about-us', compact('categories', 'brands', 'subcategories', 'events'));
    }

    public function privacypolicy()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $events = Event::get();
        return view('user.privacy-policy', compact('categories', 'brands', 'subcategories', 'events'));
    }

    public function termsconditions()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $events = Event::get();
        return view('user.terms-conditions', compact('categories', 'brands', 'subcategories', 'events'));
    }

    public function faq()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $events = Event::get();
        return view('user.faq', compact('categories', 'brands', 'subcategories', 'events'));
    }

    public function feedback()
    {
        $categories = Categories::orderby('updated_at', 'desc')->limit(8)->get();
        $subcategories = SubCategories::orderby('updated_at', 'desc')->limit(8)->get();
        $brands = Brand::orderby('updated_at', 'desc')->limit(8)->get();
        $events = Event::get();
        return view('user.feedback', compact('categories', 'brands', 'subcategories', 'events'));
    }
}
