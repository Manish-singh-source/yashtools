<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategories;
use Illuminate\Http\Request;

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
}
