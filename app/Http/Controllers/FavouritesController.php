<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouritesController extends Controller
{
    public function favouriteItems()
    {
        $favouriteItems = Favourite::with('products')->where('user_id', Auth::id())->where('status', '1')->paginate(4);
        // dd($favouriteItems);    
        return view('user.maincollection', compact('favouriteItems'));
    }
}
