<?php

namespace App\Repositories\Dashboard;

use App\Models\User;

class UserRepository
{
    public function getAllUsers()
    {
        return User::latest()->get();
    }
    public function getUserById($id)
    {
        return User::find($id);
    }
    public function storeUser($data)
    {
        return User::create($data);
    }
    public function destroyUser($user)
    {
        return $user->delete();
    }

    public function changeStatus($user)
    {
        $user = $user->status == 1 ? $user->update(['status' => 0]) : $user->update(['status' => 1]);
        return $user;
    }
}
