<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\services\Website\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $HomeService;
    public function __construct(HomeService $HomeService)
    {
        $this->HomeService = $HomeService;
    }
    public function index()
    {
        return view('website.index');
    }
}
