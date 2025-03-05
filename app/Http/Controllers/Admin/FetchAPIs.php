<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Event;
use App\Models\Banner;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\Favourite;
use App\Mail\statusChange;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use Flasher\Prime\FlasherInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function deleteSelectedCustomers(Request $request)
    {
        $checkedValues = $request->checkValues;
        if (!$checkedValues) {
            return response()->json([
                'status' => false,
                'message' => 'Customer ID is required.',
            ], 400);
        }

        $rows = User::destroy($checkedValues);

        if (!$rows) {
            return response()->json([
                'status' => false,
                'message' => 'No Customer found.',
                'data' => $rows,
            ], 404);
        }


        flash()->success('Deleted Selected Customer Successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Deleted Selected Customer Successfully.',
        ]);
    }

    public function deleteSelectedOrder(Request $request)
    {
        $checkedValues = $request->checkValues;
        if (!$checkedValues) {
            return response()->json([
                'status' => false,
                'message' => 'Enquiry ID is required.',
            ], 400);
        }

        $rows = Enquiry::destroy($checkedValues);

        if (!$rows) {
            return response()->json([
                'status' => false,
                'message' => 'No Enquiries found.',
                'data' => $rows,
            ], 404);
        }


        flash()->success('Deleted Selected Enquiries Successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Deleted Selected Enquiries Successfully.',
        ]);
    }


    public function deleteSelectedMultiAdmin(Request $request)
    {
        $checkedValues = $request->checkValues;
        if (!$checkedValues) {
            return response()->json([
                'status' => false,
                'message' => 'Admin ID is required.',
            ], 400);
        }

        $rows = User::destroy($checkedValues);

        if (!$rows) {
            return response()->json([
                'status' => false,
                'message' => 'No Admins found.',
                'data' => $rows,
            ], 404);
        }


        flash()->success('Deleted Selected Admins Successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Deleted Selected Admins Successfully.',
        ]);
    }








    // addToFav 
    public function addToFav(Request $request)
    {
        $productid = $request->productid;
        $productStatus = $request->productStatus;

        if (!isset($productid)) {
            return response()->json([
                'status' => false,
                'message' => 'Product ID is required.',
            ], 400);
        }

        if ($productStatus == 'active') {
            $saveFav = Favourite::where('user_id', Auth::id())->where('product_id', $productid)->first();
            $saveFav->status = ($productStatus == 'active') ? '0' : '1';
            $saveFav->save();
        } elseif ($productStatus == 'inactive') {
            $saveFav = Favourite::where('user_id', Auth::id())->where('product_id', $productid)->first();
            $saveFav->status = ($productStatus == 'inactive') ? '1' : '0';
            $saveFav->save();
        } else {
            $saveFav = new Favourite();
            $saveFav->user_id = Auth::id();
            $saveFav->product_id = $productid;
            $saveFav->save();
        }


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

    // addToFav 
    public function removeFromFav(Request $request)
    {
        $productid = $request->productid;
        $productStatus = $request->productStatus;

        if (!isset($productid)) {
            return response()->json([
                'status' => false,
                'message' => 'Product ID is required.',
            ], 400);
        }

        $favItem = Favourite::find($productid);
        $favItem->delete();

        if (!$favItem) {
            return response()->json([
                'status' => false,
                'message' => 'No Product found.',
                'data' => $favItem,
            ], 404);
        }

        flash()->success('Removed From Favourites List Successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Removed From Favourites List Successfully.',
        ]);
    }

    public function changeOrderStatus(Request $request)
    {
        $enquiryid = $request->enquiryid;
        $enquiryStatus = $request->enquiryStatus;

        if (!isset($enquiryid)) {
            return response()->json([
                'status' => false,
                'message' => 'Enquiry ID is required.',
            ], 400);
        }

        $enquiry = Enquiry::where('id', $enquiryid)->first();
        $enquiry->status = $enquiryStatus;
        $enquiry->save();


        if (!$enquiry) {
            return response()->json([
                'status' => false,
                'message' => 'No Enquiry found.',
                'data' => $enquiry,
            ], 404);
        }

        $user = User::where('id', $enquiry->customer_id)->first();
        $userEmail = $user->email;

        $enquiryData = Enquiry::where('id', $enquiryid)->first();
        Mail::to($userEmail)->send(new statusChange($user, $enquiryData));
        
        flash()->success('Enquiry Status Changed Successfully.');
        return response()->json([
            'status' => $enquiry,
            'message' => 'Enquiry Status Changed Successfully.',
        ]);
    }
}
