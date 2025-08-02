<?php

namespace App\Http\Controllers\Website;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\services\Website\GlobalService;

class BrandController extends Controller
{
    protected $globalService;
    public function __construct(GlobalService $globalService)
    {
        $this->globalService = $globalService;
    }
    public function index()
    {
        $brands = $this->globalService->getBrands();
        return view('website.brand', compact('brands'));
    }
    public function getProductsByBrand($slug)
    {
        $products = $this->globalService->getProductsByBrand($slug);
        return view('website.products', compact('products'));
    }
}
