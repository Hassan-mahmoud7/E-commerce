<?php

namespace App\Repositories\Dashboard;

use App\Models\Admin;

class AdminRepository
{
    public function getAllAdmins()
    {
        $admins = Admin::select('id','name','email','status','role_id','created_at')->paginate(6);
        return $admins;
    }
    public function getAdmin($id)
    {
        $admin = Admin::find($id);
        return $admin;
    }
    
    public function storeAdmin($request)
    {
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'status' => $request->status,  
            'role_id' => $request->role_id,
        ]);
        return $admin;
    }
    public function updateAdmin($admin, $data)
    {
        $admin = $admin->update($data);
        return $admin;
    }
    public function destroyAdmin($admin)
    {
        return $admin->delete();
    }
    public function changeStatus($admin,$status)
    {
        $admin = $admin->update(['status' => $status]);
        return $admin;
    }
    
}
