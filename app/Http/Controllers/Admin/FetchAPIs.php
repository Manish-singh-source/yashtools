<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategories;
use App\Models\User;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

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

    public function toggleStatus(Request $request)
    {
        $productId = $request->productId;


        if (!$productId) {
            return response()->json([
                'status' => false,
                'message' => 'Product ID is required.',
            ], 400);
        }

        $status = ($request->status == '1') ? '0' : '1';
        $product = Product::find($productId);
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
        $customerId = $request->customerId;
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
}
