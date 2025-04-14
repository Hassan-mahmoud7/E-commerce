<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\Dashboard\UserService;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        return view('dashboard.users.index');
    }
    public function getAllUsersForDatatable()
    {
        return $this->userService->getAllUsersForDatatable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->only(['name','email','password','phone','status','city_id','country_id','governorate_id']);
        $user = $this->userService->storeUser($data);
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.created_successfully')], 201);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->userService->destroyUser($id);
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => __('dashboard.error_message')], 500);
        }
        return response()->json(['status' => 'success', 'message' => __('dashboard.deleted_successfully')], 200);
    }
    public function changeStatus($id)
    {
        $data = $this->userService->changeStatus($id);
        $user = $this->userService->getUserById($id);
       if ($user->status == 1) {
            return response()->json([
                'status' => 'success',
                'message' =>  __('dashboard.status_active_updated_successfully'),
                'data' =>  $user,

            ], 200);
        } elseif ($user->status == 0) {
            return response()->json([
                'status' => 'success_not_active',
                'message' =>  __('dashboard.status_not_active_updated_successfully'),
                'data' =>  $user,

            ], 200);
        }
        if (isNull($data)) {
            return response()->json(['status' => false, 'message' =>  __('dashboard.error_message')], 404);
        }
    }
}
