<?php

namespace App\Livewire\Website;

use App\Services\Website\FaqService;
use Livewire\Component;

class FaqQuestion extends Component
{
    public $name, $email, $subject, $message;
    protected $faqService;
    public function boot(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:30',
            'email' => 'required|email|max:60',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:1000',
        ];
    }
    public function updated()
    {
        $this->validate();
    }
    public function send()
    {
        $this->validate();
        
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message
        ];
        $faqQ = $this->faqService->storeFaqQuestion($data);
        if (!$faqQ) {
           $this->dispatch("faq-question-failed", __('website.question_submission_failed'));
        }
        $this->dispatch("faq-question-created", __('website.question_submitted_successfully'));
        $this->reset();
    }
    public function render()
    {
        return view('livewire.website.faq-question');
    }
}
