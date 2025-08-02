<?php

namespace App\Http\Controllers\Website;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class wishlistController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('website.wishlist');
    }
}
