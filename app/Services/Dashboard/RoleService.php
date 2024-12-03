<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\RoleRepository;

class RoleService
{
    protected $roleRepository;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function createRole($request)
    {
        $role = $this->roleRepository->createRole($request);
        return $role ;
    }
    public function getRoles()
    {
        return $this->roleRepository->getRoles();
    }
    public function getRoleById($id)
    {
        if (!$this->roleRepository->getRoleById($id)) {
            return false;
        }
        return $this->roleRepository->getRoleById($id);
    }
    public function updateRole($request, $id)
    {
        $role = self::getRoleById($id);
         if (!$role) {
            return false;
        }
        $role = $this->roleRepository->updateRole($role, $request);
        return $role ;
    }
    public function deleteRole($id)
    {
        $role = self::getRoleById($id);
        if ($role->admins->count() > 0 || !$role) {
            return false;
        }
        $this->roleRepository->deleteRole($role);
        return true;
    }
}
