<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Services\Dashboard\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleDependencyInjection;
    public function __construct(RoleService $roleService)
    {
        $this->roleDependencyInjection = $roleService;
    }
    public function index()
    {
        $roles = $this->roleDependencyInjection->getRoles();
        return view('dashboard.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = $this->roleDependencyInjection->createRole($request);
        if (!$role) {
            return back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->route('dashboard.roles.index')->with('success', __('dashboard.role_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->roleDependencyInjection->getRoleById($id);
        if (!$role) {
            return back()->with('error', __('dashboard.error_message'));
        }
        return view('dashboard.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $role =  $this->roleDependencyInjection->updateRole($request , $id);
        if (!$role) {
            return redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->route('dashboard.roles.index')->with('success', __('dashboard.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $role = $this->roleDependencyInjection->deleteRole($id);
        if (!$role) {
            return  redirect()->back()->with('error', __('dashboard.error_message'));
        }
        return redirect()->back()->with('success', __('dashboard.deleted_successfully'));
    }
}
