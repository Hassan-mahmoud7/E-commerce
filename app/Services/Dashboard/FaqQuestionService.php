<?php

namespace App\Services\Dashboard;

use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Dashboard\FaqQuestionRepository;

class FaqQuestionService
{
    protected $faqQuestionRepository;
    public function __construct(FaqQuestionRepository $faqQuestionRepository)
    {
        $this->faqQuestionRepository = $faqQuestionRepository;
    }
    public function getAllFaqQuestions()
    {
        return $this->faqQuestionRepository->getAllFaqQuestions();
    }
    public function getAllFaqQuestionForDatatable()
    {
         $faqQuestions = $this->getAllFaqQuestions();
        return DataTables::of($faqQuestions)
            ->addIndexColumn()
            ->addColumn('message', function ($item) {
                return view('dashboard.faqQuestions.dataTable.message', compact('item'));
            })
            ->addColumn('action', function ($item) {
                return view('dashboard.faqQuestions.dataTable.actions', compact('item'));
            })
            ->rawColumns(['message','action'])
            ->make(true);
    }
    public function getFaqQuestionById($id)
    {
        $faqQ = $this->faqQuestionRepository->getFaqQuestionById($id);
        return $faqQ ?? false;
    }
    public function destroy($id)
    {
        $faqQ = $this->getFaqQuestionById($id);
        if (!$faqQ) {
            return false;
        }
        return $this->faqQuestionRepository->destroy($faqQ);
    }
}
