<?php

namespace App\Livewire\Dashboard\Contact;

use App\Services\Dashboard\ContactService;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ContactMessage extends Component
{
    use WithPagination;
    public $itemSearch, $openMessageId, $screen;
    protected $listeners = ['msg-deleted' => '$refresh', 'msg-starred' => '$refresh', 'refresh-Message' => '$refresh', 'msg-restored' => '$refresh'];
    protected ContactService $contactService;

    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
    public function showMessage($messageId)
    {
        $this->openMessageId = $messageId;

        $this->contactService->MarkAsRead($messageId);

        $this->dispatch('msg-starred');
        $this->dispatch('show-message', $messageId);
    }
    public function updatingItemSearch()
    {
        $this->resetPage();
    }
    #[On('select-screen')]
    public function selectScreen($screen)
    {
        $this->screen = $screen;
    }
    public function render()
    {

        if ($this->screen == 'inbox' || $this->itemSearch) {
            $messages = $this->contactService->getContactsandSearsh(trim($this->itemSearch));
        } elseif ($this->screen == 'readed') {
            $messages = $this->contactService->getMarkReadContact();
        } elseif ($this->screen == 'answered') {
            $messages = $this->contactService->getContactAnswered();
        } elseif ($this->screen == 'starred') {
            $messages = $this->contactService->getIsStarred();
        } elseif ($this->screen == 'treshed') {
            $messages = $this->contactService->getIsTrashed();
        } else {
            $messages = $this->contactService->getContactsandSearsh(trim($this->itemSearch));
        }

        // $messages = $this->contactService->getContactsandSearsh();
        return view('livewire.dashboard.contact.contact-message', [
            'messages' => $messages,
        ]);
    }
}
