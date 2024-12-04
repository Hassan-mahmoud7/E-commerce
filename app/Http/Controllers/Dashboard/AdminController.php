<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Services\Dashboard\AdminService;
use App\Services\Dashboard\RoleService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminService;
    protected $roleService;
    public function __construct(AdminService $adminService , RoleService $roleService)
    {
        $this->adminService = $adminService;
        $this->roleService = $roleService;
    }
    public function index()
    {
        $admins = $this->adminService->getAllAdmins();
        return view('dashboard.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleService->getRoles();
        return view('dashboard.admins.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $admin = $this->adminService->storeAdmin($request);
        if (!$admin) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->route('dashboard.admins.index')->with('success', __('dashboard.admin_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = $this->adminService->getAdmin($id);
        if (!$admin) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return view('dashboard.admins.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = $this->adminService->getAdmin($id);
        if (!$admin) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return view('dashboard.admins.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $data = $request->only(['name','email','password','status','role_id']);
        $admin = $this->adminService->updateAdmin($id,$data);
        if (!$admin) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->route('dashboard.admins.index')->with('success', __('dashboard.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = $this->adminService->destroyAdmin($id);
        if (!$admin) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->route('dashboard.admins.index')->with('success', __('dashboard.deleted_successfully'));
    }
    public function ChangeStatus($id)  
    {
        $status = $this->adminService->changeStatus($id);
        if (!$status) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        if ($status == 1) {
            return redirect()->back()->with('success', __('dashboard.status_active_updated_successfully'));     
        }else{
            return redirect()->back()->with('success', __('dashboard.status_not_active_updated_successfully'));
        }
    }
}
