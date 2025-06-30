<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected $faqService;
    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }
    public function ShowFaqPage()
    {
        $faqs = $this->faqService->getAllFaqs();
        return view('website.faq' ,compact('faqs'));
    }
}
