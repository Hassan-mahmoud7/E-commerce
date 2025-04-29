<?php

namespace App\Livewire\Dashboard\Contact;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\Dashboard\ContactService;

class ReplayContact extends Component
{
    public $contact;
    public $id,$name,$email,$subject,$replayMessage;
    protected ContactService $contactService;
    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
        
    }
    #[On('call-replay-contact-componect')]
    public function luanchModal($contactId)
    {
        $this->setDataInAttributes($contactId);
        $this->dispatch('luanch-replay-contact-modal');
    }
    public function setDataInAttributes($contactId)
    {
        $this->contact  = $this->contactService->getContactById($contactId);
        $this->id       = $this->contact->id;
        $this->name     = $this->contact->name;
        $this->email    = $this->contact->email;
        $this->subject  = $this->contact->subject;
    }
    public function replayContact()
    {
        $replayStatus = $this->contactService->replayContact($this->id,$this->replayMessage);
        if (!$replayStatus) {
            $this->dispatch('replay-contact-fail');
            return;
        }
        $this->dispatch('close-modal');

    }
    public function render()
    {
        return view('livewire.dashboard.contact.replay-contact');
    }
}
