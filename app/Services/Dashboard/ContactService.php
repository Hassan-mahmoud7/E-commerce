<?php

namespace App\Services\Dashboard;

use App\Mail\ReplayContactMail;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Dashboard\ContactRepository;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    protected $contactRepository;
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    public function getAllContacts()
    {
        return $this->contactRepository->getAllContacts();
    }
    public function getContactById($id)
    {
        $contact = $this->contactRepository->getContactById($id);
        return $contact ?? false;
    }
    public function getContact()
    {
        $contact = $this->contactRepository->getContact();
        return $contact ?? false;
    }
    public function createContact($data)
    {
        $contact = $this->contactRepository->createContact($data);
        $this->contactsCache();
        return $contact;
    }
    public function deleteContact($id)
    {
        $contact = $this->getContactById($id);
        $contactResult = $this->contactRepository->deleteContact($contact);
        $this->contactsCache();
        return $contactResult;
    }
    public function MarkAsRead($id)
    {
        $contact = $this->getContactById($id);
        return $this->contactRepository->markAsRead($contact);
    }
    public function MarkUnread($id)
    {
        $contact = $this->getContactById($id);
        return $this->contactRepository->markUnRead($contact);
    }
    public function getMarkReadContact()
    {
        return $this->contactRepository->getMarkReadContact();
    }
    public function contactsCache()
    {
        Cache::forget('contacts_count');
    }
    public function getContactsandSearsh($search)
    {
        $contacts = $this->contactRepository->getContactsandSearsh($search);
        return $contacts;
    }
    public function replayContact($contactId, $replayMessage)
    {
        $contact = $this->getContactById($contactId);
        Mail::to($contact->email)->send(new ReplayContactMail($contact->name, $replayMessage, $contact->subject));
        return true;
    }
    public function getContactAnswered()
    {
        return $this->contactRepository->getContactAnswered();
    }
    public function markIsStarred($id)
    {
        $contact = $this->getContactById($id);
        if ($contact->is_starred == 1) {
            return $this->contactRepository->markIsStarred($contact, 0);
        } else {
            return $this->contactRepository->markIsStarred($contact, 1);
        }
    }
    public function getIsStarred()
    {
        return $this->contactRepository->getIsStarred();
    }
    public function getIsTrashed()
    {
        return $this->contactRepository->getIsTrashed();
    }
    public function getIsTrashedFirst()
    {
        return $this->contactRepository->getIsTrashedFirst();
    }
    public function restoreContact($id)
    {
        $contact = $this->getContactById($id);
        return $this->contactRepository->restoreContact($contact);
    }
    public function forceDeleteContact($id)
    {
        $contact = $this->getContactById($id);
        return $this->contactRepository->forceDeleteContact($contact);
    }
    public function markAllAsRead()
    {
        return $this->contactRepository->markAllAsRead();
    }
    public function deleteMarkAllAsReaded()
    {
        return $this->contactRepository->deleteMarkAllAsReaded();
    }
    public function deleteMarkAllAnswered()
    {
        return $this->contactRepository->deleteMarkAllAnswered();
    }
}
