<?php

namespace App\Services\Website;

use App\Http\Requests\FaqRequest;
use App\Models\FaqQuestion;
use App\Repositories\Dashboard\FaqRepository;

class FaqService
{
    protected $faqRepository;

    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }
    public function getAllFaqs()
    {
        return $this->faqRepository->getFaqs();
    }
    public function storeFaqQuestion($data)
    {
        $faqQ = FaqQuestion::create($data);
        if (!$faqQ) {
            return false;
        }
        return true;
    }
}
