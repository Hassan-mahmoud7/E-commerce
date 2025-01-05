<?php

namespace App\Repositories\Dashboard;

use App\Models\Faq;

class FaqRepository
{
    public function getFaqs()
    {
        $faqs = Faq::get();
        return $faqs;
    }
    public function getFaqById($id)
    {
        $faq = Faq::find($id);
        return $faq;
    }
    public function storeFaq($data)
    {
        $faq = Faq::create($data);
        return $faq;
    }
    public function updateFaq($data, $faq)
    {
        $faq = $faq->update($data);
        return $faq;
    }
    public function deleteFaq($faq)
    {
        $faq = $faq->delete();
        return $faq;
    }
}
