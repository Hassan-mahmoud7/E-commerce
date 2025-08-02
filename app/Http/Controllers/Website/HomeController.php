<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\services\Website\GlobalService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $globalService;
    public function __construct(GlobalService $globalService)
    {
        $this->globalService = $globalService;
    }
    public function index()
    {                 
        $homePageProducts =             $this->globalService->getHomePageProducts(8, 6);
        return view('website.index',[
            'sliders'        => $this->globalService->getSlider(),
            'someBrands'     => $this->globalService->getBrands(12),
            'someCategories' => $this->globalService->getCategories(12),
            'homePageProducts'   => $homePageProducts
        ]);
    }

}
