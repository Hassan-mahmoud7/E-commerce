<?php

namespace App\Repositories\Dashboard;

use App\Models\Contact;

class ContactRepository
{
    public function getAllContacts() 
    {
        $contacts = Contact::latest()->get();
        return $contacts;   
    }
    public function getContactById($id) 
    {
        $contact = Contact::withTrashed()->find($id);
        return $contact;   
    }
    public function getContact() 
    {
        $contact = Contact::latest()->first();
        return $contact;   
    }
    public function createContact($data) 
    {
        $contact = Contact::create($data);
        return $contact;   
    }
    public function deleteContact($contact) 
    {
        return $contact->delete();
    }
    public function getContactsandSearsh($search)
    {
        $contacts = Contact::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
            $query->orWhere('email', 'like', "%{$search}%");
            $query->orWhere('phone', 'like', "%{$search}%");
        })->latest()->get();
        return $contacts;
    }
    public function getMarkReadContact()
    {
        return Contact::where('is_read', 1)->latest()->get();
    }
    public function markAsRead($contact)
    {
        $contact->is_read = 1;
        return $contact->save();
    }
    public function markUnRead($contact)
    {
        $contact->is_read = 0;
        return $contact->save();
    }
    public function getContactAnswered()
    {
        return Contact::where('replay_status', 1)->latest()->get();
    }
    public function markIsStarred($contact, $is_starred)
    {
        $contact->is_starred = $is_starred;
        return $contact->save();
    }

    public function getIsStarred()
    {
        return Contact::where('is_starred', 1)->latest()->get();
    }
    public function getIsTrashed()
    {
        return Contact::onlyTrashed()->latest()->get();
    }
    public function getIsTrashedFirst()
    {
        return Contact::onlyTrashed()->first();
    }
    public function restoreContact($contact)
    {
        return $contact->restore();
    }
    public function forceDeleteContact($contact)
    {
        return $contact->forceDelete();
    }
    public function markAllAsRead()
    {
        $contacts = Contact::where('is_read',0)->update(['is_read' => 1]);
        return $contacts;
    }
    public function deleteMarkAllAsReaded()
    {
        $contacts = Contact::where('is_read',1)->delete();
        return $contacts;
    }
    public function deleteMarkAllAnswered()
    {
        $contacts = Contact::where('replay_status',1)->delete();
        return $contacts;
    }


}
