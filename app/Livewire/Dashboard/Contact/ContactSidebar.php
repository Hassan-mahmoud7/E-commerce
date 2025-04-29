<?php

namespace App\Livewire\Dashboard\Contact;

use App\Services\Dashboard\ContactService;
use Livewire\Component;

class ContactSidebar extends Component
{
    public $screen = 'inbox';
    protected $listeners = ['msg-deleted' => '$refresh', 'msg-starred' => '$refresh', 'refresh-Message' => '$refresh', 'msg-restored' => '$refresh'];
    protected ContactService $contactService;
    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
    public function markAllAsRead()
    {
        $this->contactService->markAllAsRead();
        $this->dispatch('msg-deleted', __('dashboard.mark_all_as_read'));

    }
    public function deleteMarkAllAsReaded()
    {
        $this->contactService->deleteMarkAllAsReaded();
        $this->dispatch('msg-deleted');
    }
    public function deleteMarkAllAnswered()
    {
        $this->contactService->deleteMarkAllAnswered();
        $this->dispatch('msg-deleted');
    }
    public function selectScreen($screen) 
    {
        $this->screen = $screen;
        $this->dispatch('select-screen', $screen);   
    }
    public function render()
    {
        return view('livewire.dashboard.contact.contact-sidebar',
    [
        'inboxCount' => $this->contactService->getContact() ? $this->contactService->getContact()->count() : 0,
        'readedCount' => $this->contactService->getMarkReadContact() ? $this->contactService->getMarkReadContact()->count() : 0,
        'answeredCount' => $this->contactService->getContactAnswered() ? $this->contactService->getContactAnswered()->count() : 0,
        'starredCount' => $this->contactService->getIsStarred() ? $this->contactService->getIsStarred()->count() : 0,
        'trashedCount' => $this->contactService->getIsTrashed() ? $this->contactService->getIsTrashed()->count() : 0,
    ]);
    }
}
