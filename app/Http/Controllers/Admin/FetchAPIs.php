<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Event;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use App\Models\Favourite;

class FetchAPIs extends Controller
{
    public function fetchSubCategories(Request $request)
    {
        $category = $request->categoryId;


        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category ID is required.',
            ], 400);
        }

        $subcategories = SubCategories::where('category_id', $category)->get();


        if ($subcategories->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No subcategories found for the given category.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully.',
            'subcategories' => $subcategories,
        ], 200);
    }

    public function toggleBannerStatus(Request $request)
    {
        $id = $request->statusId;


        if (!$id) {
            return response()->json([
                'status' => false,
                'message' => 'Product ID is required.',
            ], 400);
        }

        $status = ($request->status == '1') ? '0' : '1';
        $product = Banner::find($id);
        $product->status = $status;
        $product->save();

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'No product found.',
            ], 404);
        }

        flash()->success('Status Changed successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Status Changed successfully.',
        ], 200);
    }

    public function toggleProductStatus(Request $request)
    {
        $id = $request->statusId;


        if (!$id) {
            return response()->json([
                'status' => false,
                'message' => 'Product ID is required.',
            ], 400);
        }

        $status = ($request->status == '1') ? '0' : '1';
        $product = Product::find($id);
        $product->status = $status;
        $product->save();

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'No product found.',
            ], 404);
        }

        flash()->success('Status Changed successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Status Changed successfully.',
        ], 200);
    }

    public function toggleStatusCustomer(Request $request)
    {
        $customerId = $request->statusId;
        if (!$customerId) {
            return response()->json([
                'status' => false,
                'message' => 'Customer ID is required.',
            ], 400);
        }

        $status = ($request->status == 'active') ? 'banned' : 'active';
        $customer = User::find($customerId);
        $customer->status = $status;
        $customer->save();

        if (!$customer) {
            return response()->json([
                'status' => false,
                'message' => 'No Customer found.',
                'data' => $request->status,
            ], 404);
        }

        flash()->success('Status Changed successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Status Changed successfully.',
            'data' => $request->status,
        ], 200);
    }

    public function deleteSelected(Request $request)
    {
        $checkedValues = $request->checkValues;
        if (!$checkedValues) {
            return response()->json([
                'status' => false,
                'message' => 'Banner ID is required.',
            ], 400);
        }

        $rows = Banner::destroy($checkedValues);

        if (!$rows) {
            return response()->json([
                'status' => false,
                'message' => 'No Banner found.',
                'data' => $rows,
            ], 404);
        }

        flash()->success('Deleted Selected Banners Successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Deleted Selected Banners Successfully.',
        ]);
    }

    public function deleteSelectedCategories(Request $request)
    {
        $checkedValues = $request->checkValues;
        if (!$checkedValues) {
            return response()->json([
                'status' => false,
                'message' => 'Category ID is required.',
            ], 400);
        }

        $rows = Categories::destroy($checkedValues);

        if (!$rows) {
            return response()->json([
                'status' => false,
                'message' => 'No Category found.',
                'data' => $rows,
            ], 404);
        }

        flash()->success('Deleted Selected Categories Successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Deleted Selected Categories Successfully.',
        ]);
    }

    public function deleteSelectedSubCategories(Request $request)
    {
        $checkedValues = $request->checkValues;
        if (!$checkedValues) {
            return response()->json([
                'status' => false,
                'message' => 'Sub Category ID is required.',
            ], 400);
        }

        $rows = SubCategories::destroy($checkedValues);

        if (!$rows) {
            return response()->json([
                'status' => false,
                'message' => 'No Sub Category found.',
                'data' => $rows,
            ], 404);
        }

        flash()->success('Deleted Selected Sub Categories Successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Deleted Selected Sub Categories Successfully.',
        ]);
    }

    public function deleteSelectedBrands(Request $request)
    {
        $checkedValues = $request->checkValues;
        if (!$checkedValues) {
            return response()->json([
                'status' => false,
                'message' => 'Brand ID is required.',
            ], 400);
        }

        $rows = Brand::destroy($checkedValues);

        if (!$rows) {
            return response()->json([
                'status' => false,
                'message' => 'No Brand found.',
                'data' => $rows,
            ], 404);
        }

        flash()->success('Deleted Selected Brand Successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Deleted Selected Brand Successfully.',
        ]);
    }

    public function deleteSelectedEvents(Request $request)
    {
        $checkedValues = $request->checkValues;
        if (!$checkedValues) {
            return response()->json([
                'status' => false,
                'message' => 'Event ID is required.',
            ], 400);
        }

        $rows = Event::destroy($checkedValues);

        if (!$rows) {
            return response()->json([
                'status' => false,
                'message' => 'No Event found.',
                'data' => $rows,
            ], 404);
        }

        flash()->success('Deleted Selected Event Successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Deleted Selected Event Successfully.',
        ]);
    }

    public function deleteSelectedProducts(Request $request)
    {
        $checkedValues = $request->checkValues;
        if (!$checkedValues) {
            return response()->json([
                'status' => false,
                'message' => 'Product ID is required.',
            ], 400);
        }

        $rows = Product::destroy($checkedValues);

        if (!$rows) {
            return response()->json([
                'status' => false,
                'message' => 'No Product found.',
                'data' => $rows,
            ], 404);
        }

        flash()->success('Deleted Selected Product Successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Deleted Selected Product Successfully.',
        ]);
    }









    // addToFav 
    public function addToFav(Request $request) {
        $productId = $request->productId;

        if (!$productId) {
            return response()->json([
                'status' => false,
                'message' => 'Product ID is required.',
            ], 400);
        }

        $saveFav = new Favourite();
        $saveFav->user_id = $request->userId; 
        $saveFav->product_id = $request->product_id; 
        $saveFav->status = $request->status; 
        $saveFav->save();


        if (!$saveFav) {
            return response()->json([
                'status' => false,
                'message' => 'No Product found.',
                'data' => $saveFav,
            ], 404);
        }

        flash()->success('Added to Favourites Successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Added to Favourites Successfully.',
        ]);
    }

}
