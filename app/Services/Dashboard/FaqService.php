<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\FaqRepository;

class FaqService
{
    protected $faqRepository;
    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }
    public function getFaqs()
    {
        return $this->faqRepository->getFaqs();
    }
    public function getFaqById($id)
    {
        $faq = $this->faqRepository->getFaqById($id);
        return $faq ?? abort('404');
    }
    public function storeFaq($data)
    {
        $faq = $this->faqRepository->storeFaq($data);
        if (!$faq) {
            return false;
        }
        return $faq;
    }
    public function updateFaq($data, $id)
    {
        $faq = $this->getFaqById($id);
        $faq = $this->faqRepository->updateFaq($data, $faq);
        if (!$faq) {
            return false;
        }
        return $faq;
    }
    public function deleteFaq($id)
    {
        $faq = $this->getFaqById($id);
        $faq = $this->faqRepository->deleteFaq($faq);
        if (!$faq) {
            return false;
        }
        return true;
    }
}
