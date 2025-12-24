<?php

namespace App\Http\Controllers\User;

use App\Models\User;
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
use App\Models\UserCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\LeadTimeExcelService;

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

        // Process Lead Time data
        $leadTimeData = null;
        $leadTimeType = null;

        if (!empty($selectedProduct->lead_time)) {
            $leadTimeService = new LeadTimeExcelService();

            // Read Excel file
            $excelResult = $leadTimeService->readLeadTimeExcel($selectedProduct->lead_time);
            if ($excelResult['success']) {
                $leadTimeData = $excelResult['data'];
                $leadTimeType = 'excel';
            }
        }

        $sheetData = null;

        if (!empty($selectedProduct->product_specs)) {
            $path = public_path('uploads/products/product_specs/' . $selectedProduct->product_specs);

            // Stop — file does not exist
            if (!file_exists($path)) {
                $sheetData = null;
            }

            // Stop — empty file
            if (filesize($path) === 0) {
                $sheetData = null;
            }

            try {
                // Load spreadsheet
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);

                // If there is more than 1 sheet → ignore
                if ($spreadsheet->getSheetCount() > 1) {
                    $sheetData = null;
                }

                // Convert to array safely
                $sheetData = $spreadsheet->getActiveSheet()->toArray();
            } catch (\Exception $e) {
                // Any error reading spreadsheet → treat as invalid
                $sheetData = null;
            }
        }



        return view('user.single-product', compact('categories', 'brands', 'subcategories', 'selectedProduct', 'sheetData', 'leadTimeData', 'leadTimeType', 'favouritesProducts', 'similarProducts', 'breadcrumbs'));
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

    public function getDiscountPrice(Request $request)
    {
        $validated = $request->validate([
            'customerId' => 'required|exists:users,id',
            'subCategoryId' => 'required',
            'price' => 'required',
        ]);

        if ($validated) {
            $customer = User::find($request->customerId);

            $loyalty = $this->checkUserLoyalty($customer);

            if (!$loyalty) {
                return response()->json(['success' => false, 'price' => $request->price], 400);
            }

            $checkDiscountApplied = $this->checkDiscountApplied($customer, $request->subCategoryId);

            if (!$checkDiscountApplied) {
                return response()->json(['success' => false, 'price' => $request->price], 400);
            }

            $discountedPrice = $this->getDiscountedPrice($request->price, $checkDiscountApplied->percentage);


            return response()->json(['success' => true, 'price' => $discountedPrice['discountedPrice'], 'originalPrice' => $request->price, 'discountPercentage' => $discountedPrice['percentage']], 200);

        }

        // If validation fails, return an error response
        return response()->json(['error' => 'Invalid request'], 400);
    }

    protected function checkUserLoyalty($customer)
    {
        return $customer->customer_type == 'loyal' || $customer->customer_type == 'dealer';
    }

    protected function checkDiscountApplied($customer, $subCategoryId)
    {
        return UserCategory::where('sub_category_id', $subCategoryId)->where('user_id', $customer->id)->first();
    }

    protected function getDiscountedPrice($price, $percentage)
    {
        $discountedPrice = $price - ($price * ($percentage / 100));
        return ['discountedPrice' => $discountedPrice, 'percentage' => $percentage];
    }
}

