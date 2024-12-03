<?php

namespace App\Repositories\Dashboard;

use App\Models\Role;

class RoleRepository
{
    public function getRoles() 
    {
        $roles = Role::select('id' , 'role' , 'permission')->paginate(6);  
        return $roles;     
    }

    public function getRoleById($id)
    {
        $role = Role::find($id);
        return $role;
    }  
    public function createRole($request)
    {
        $role = Role::create([
            'role' => [
                'en' => $request->role['en'],
                'ar' => $request->role['ar'],
            ],
            'permission' => json_encode($request->permission),
        ]);
        return $role;
    }

    public function updateRole($role, $request)
    {
        $role = $role->update([
            'role' =>$request->role,
            'permission' => json_encode($request->permission),
        ]);
        return $role;
    }
    public function deleteRole($role)
    {
        $role = $role->delete();
        return $role;
    }
   
}
