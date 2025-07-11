<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Services\Dashboard\FaqService;

class FaqController extends Controller
{
    protected $faqService;
    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }
    public function index()
    {
        $faqs = $this->faqService->getFaqs();
        return view('dashboard.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $data = $request->only(['question', 'answer']);
        $faq = $this->faqService->storeFaq($data);
        if (!$faq) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.created_successfully'), 'faq' => $faq], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request, string $id)
    {
        $data = $request->only(['question', 'answer']);
        $faq = $this->faqService->updateFaq($data, $id);
        if (!$faq) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        $faqAfterUpdate = $this->faqService->getFaqById($id);
        return response()->json(['status' => 'success', 'message' => __('dashboard.updated_successfully'),'faq' => $faqAfterUpdate], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = $this->faqService->deleteFaq($id);
        if (!$faq) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.deleted_successfully')], 200);
    }
}
