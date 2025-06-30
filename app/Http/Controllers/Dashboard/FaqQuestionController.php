<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\FaqQuestionService;
use Illuminate\Http\Request;

class FaqQuestionController extends Controller
{
    protected $faqQuestionService ;
    public function __construct(FaqQuestionService $faqQuestionService)
    {
        $this->faqQuestionService = $faqQuestionService;
    }
    public function index()
    {
        return view('dashboard.faqQuestions.index');
    }
    public function getAllFaqQuestionForDatatable()
    {
        return $this->faqQuestionService->getAllFaqQuestionForDatatable();
    }
    public function destroy($id)
    {
        $faqQ = $this->faqQuestionService->destroy($id);
        if (!$faqQ) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.delete_faq_question_successfully')], 200);
    }
}
