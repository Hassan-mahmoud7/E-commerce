<?php

namespace App\Http\Controllers\Dashboard\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\Admin;
use App\Services\Auth\PasswordService;
use Illuminate\Routing\Controllers\Middleware;

class ResetPasswordController extends Controller
{
    protected $dependency_injection;
    public function __construct(PasswordService $passwordService)
    {
        $this->dependency_injection = $passwordService;
        $this->middleware('guest:admin');
    }
    // public static function middleware(): array
    // {
    //     return [
    //         new Middleware(middleware: 'guest:admin'),
    //     ];
    // }
    public function resetPassword($email,$token)
    {
        return view('dashboard.auth.password.reset',compact('email','token'));
    }

    public function addNewPassword(ResetPasswordRequest $request)
    {
        $adminUpdateResult = $this->dependency_injection->resetPassword($request->email,$request->password,$request->token);
        if (!$adminUpdateResult) {
            return redirect()->back()->withErrors(['email' => __('validation.error')]);
        }        
        return redirect()->route('dashboard.login')->with('success', __('auth.password_updated_successfuly'));
    }
}
