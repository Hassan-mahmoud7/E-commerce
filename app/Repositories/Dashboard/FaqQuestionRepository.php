<?php

namespace App\Repositories\Dashboard;

use App\Models\FaqQuestion;

class FaqQuestionRepository
{
    public function getAllFaqQuestions()
    {
    return FaqQuestion::latest()->get();
    }
    public function getFaqQuestionById($id)
    {
        return FaqQuestion::find($id);
    }
    public function destroy($faqQuestion)
    {
       return $faqQuestion->delete();
    }
    

}
