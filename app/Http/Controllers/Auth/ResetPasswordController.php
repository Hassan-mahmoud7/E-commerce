<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordUserRequest;
use App\Services\Auth\PasswordService;
use Illuminate\Foundation\Auth\ResetsPasswords;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/en';
    protected $dependency_injection;
    public function __construct(PasswordService $passwordService)
    {
        $this->dependency_injection = $passwordService;
    }

    public function resetPassword($email,$token)
    {
        return view('website.auth.passwords.reset',compact('email','token'));
    }

    public function addNewPassword(ResetPasswordUserRequest $request)
    {
        $adminUpdateResult = $this->dependency_injection->resetPassword($request->email,$request->password,$request->token);
        if (!$adminUpdateResult) {
            return redirect()->back()->withErrors(['email' => __('validation.error')]);
        }        
        return redirect()->route('website.login')->with('success', __('auth.password_updated_successfuly'));
    }
}
