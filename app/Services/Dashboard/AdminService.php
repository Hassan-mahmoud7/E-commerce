<?php

namespace App\Services\Dashboard;

use App\Models\Admin;
use App\Repositories\Dashboard\AdminRepository;

class AdminService
{
    protected $adminRepository;
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }
    public function getAllAdmins()
    {
        $admin = $this->adminRepository->getAllAdmins();
        return $admin;
    }
    public function getAdmin($id)
    {
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin) {
            return abort(404);
        }
        return $admin;
    }
    
    public function storeAdmin($request)
    {
        $admin = $this->adminRepository->storeAdmin($request);
        if (!$admin) {
            return false;
        }
        return $admin;
    }
    public function updateAdmin($id, $data)
    {
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin) {
            return abort(404);
        }
        if ($data['password'] == null) {
            unset($data['password']);
        }
        $admin = $this->adminRepository->updateAdmin($admin, $data);
        if (!$admin) {
            return false;
        }
        return $admin;
    }
    public function destroyAdmin($id)
    {
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin) {
            return abort(404);
        }
        $admin = $this->adminRepository->destroyAdmin($admin);
        if (!$admin) {
            return false;
        }
        return $admin;
    }
    public function changeStatus($id)
    {
        $admin = $this->adminRepository->getAdmin($id);
        if (!$admin) {
            return abort(404);
        }
        if ($admin->status == 0) {
           $this->adminRepository->changeStatus($admin, 1);
            return 1;
        }elseif($admin->status == 1){
            $this->adminRepository->changeStatus($admin, 0);
            return 2;
        }
    }
}
