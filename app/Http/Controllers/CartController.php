<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        
        $cart = new Cart();
        $cart->user_id = $request->userId;
        $cart->product_id = $request->productId;
        $cart->part_number = $request->partNumber;
        $cart->save();

        if ($cart) {
            flash()->success('Successfull Product added to cart.');
            return response()->json([
                'status' => true,
                'message' =>  'Successfull Product added to cart',
            ]);
        }

        flash()->error('Failed.');
        return response()->json([
            'status' => false,
            'error' => 'Failed',
        ]);
    }

    public function viewCartItems()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('products')->get();
        $groupedCartItems = $cartItems->groupBy(function ($item) {
            return $item->created_at;
        });
        // dd($groupedCartItems);
        return view('user.maincart', compact('groupedCartItems'));
    }
}
