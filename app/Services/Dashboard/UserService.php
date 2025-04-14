<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Dashboard\UserRepository;

class UserService
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }
    public function getAllUsersForDatatable()
    {
        $users = $this->getAllUsers();

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('status', function ($user) {
                return $user->getStatusTranslated();
            })
            ->addColumn('country', function ($user){
                return $user->country->name;
            })
            ->addColumn('governorate', function ($user){
                return $user->governorate->name;
            })
            ->addColumn('city', function ($user){
                return $user->city->name;
            })
            ->addColumn('num_of_orders', function ($user){
                return $user->orders()->count() > 0 ? $user->orders()->count() : __('dashboard.not_found');
            })
            ->addColumn('action', function ($user) {
                return view('dashboard.users.datatable.actions', compact('user'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function getUserById($id)
    {
        $user = $this->userRepository->getUserById($id);
        return $user ?? abort(404);
    }
    public function storeUser($data)
    {
        $user = $this->userRepository->storeUser($data);
        $this->usersCache();
        return $user ?? false;
    }
   
    public function destroyUser($id)
    {
        $user = $this->getUserById($id);
        $userDelete = $this->userRepository->destroyUser($user);
        $this->usersCache();
        return $userDelete;
    }
    public function changeStatus($id)
    {
        $user = $this->getUserById($id);
        if ($user->status == 0) {
            $this->userRepository->changeStatus($user, 1);
            return 1;
        } elseif ($user->status == 1) {
            $this->userRepository->changeStatus($user, 0);
            return 2;
        }
    }
    public function usersCache()
    {
        Cache::forget('users_count');
    }

}
