<?php

namespace App\Livewire\Dashboard\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\Dashboard\ContactService;

class ContactShow extends Component
{
    public $msg, $is_starred, $screen;
    protected $listeners = ['msg-deleted' => '$refresh', 'msg-starred' => '$refresh', 'refresh-Message' => '$refresh','select-screen' => '$refresh', 'msg-restored' => '$refresh'];

    protected ContactService $contactService;
    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
    // public function mount()
    // {
    //     $this->msg = $this->contactService->getContact();
    // }
    #[On('show-message')] 
    public function showMessage($messageId)
    {
        $this->msg = $this->contactService->getContactById($messageId);
        
    }
    public function replayMsg($messageId)
    {
        $this->dispatch('call-replay-contact-componect', $messageId);
    }
    public function markIsStarred($messageId)
    {
        $this->contactService->markIsStarred($messageId);
        $this->is_starred = $this->msg->is_starred = !$this->msg->is_starred;
        $this->dispatch('msg-starred');
    }
    public function markAsUnread($messageId)
    {
        $this->contactService->MarkUnread($messageId);
        $this->dispatch('refresh-Message');
    }        
    // Delete the message from the database
    public function deleteMessage($messageId)
    {
        $this->contactService->deleteContact($messageId);
        $this->msg = $this->contactService->getContact();
        $this->dispatch('msg-deleted', __('dashboard.delete_message'));
    }

    #[On('select-screen')]
    public function selectScreen($screen)
    {
        $this->screen = $screen;
    }
    public function foreceDelete($messageId)
    {
        $this->contactService->forceDeleteContact($messageId);
        $this->msg = $this->chooseMessages();
        $this->dispatch('msg-deleted', __('dashboard.delete_message'));
    }
    
    public function restoreMessage($messageId)
    {
        $this->contactService->restoreContact($messageId);
        $this->msg = $this->chooseMessages();
        $this->dispatch('msg-restored', __('dashboard.restore_message_success'));
    }
    public function chooseMessages()
    {
        if ($this->screen == 'treshed') {
            return $this->contactService->getIsTrashedFirst();
        } else {
            return $this->contactService->getContact();
        }
    }
    public function render()
    {
        return view('livewire.dashboard.contact.contact-show');
    }
}
