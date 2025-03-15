<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;

class FavouritesController extends Controller
{
    public function favouriteItems()
    {
        $favouriteItems = Favourite::with('products')->where('user_id', Auth::id())->where('status', '1')->paginate(4);
        return view('user.maincollection', compact('favouriteItems'));
    }
}
