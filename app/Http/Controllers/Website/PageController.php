<?php

namespace App\Http\Controllers\Website;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function showPage($slug)
    {
        $page = Page::where('slug', $slug)->active()->firstOrFail();
        if (!$page) {
            abort(404);
        }
        return view('website.page', compact('page'));
    }
}
