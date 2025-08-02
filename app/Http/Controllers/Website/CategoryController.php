<?php

namespace App\Http\Controllers\Website;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\services\Website\GlobalService;

class CategoryController extends Controller
{
    protected $globalService;
    public function __construct(GlobalService $globalService)
    {
        $this->globalService = $globalService;
    }
    public function index()
    {
        $categories = $this->globalService->getCategories();

        return view('website.category', compact('categories'));
    }
    public function getProductsByCategory($slug)
    {
        $products = $this->globalService->getProductsByCategory($slug);
        return view('website.products', compact('products'));
    }
}
