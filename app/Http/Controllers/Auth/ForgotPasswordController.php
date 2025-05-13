<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\PasswordService;
use App\Http\Requests\ForgotPasswordUserRequest;
use Ichtrojan\Otp\Otp;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    protected $otp2;
    protected $dependency_injection;

    public function __construct(PasswordService $passwordService)
    {
        $this->dependency_injection = $passwordService;
        $this->otp2 = new Otp;
    }
    public function showConfirmForm()
    {
        return view('website.auth.passwords.email');
    }
    public function sendCodeOtp(ForgotPasswordUserRequest $request)
    {
        $user = $this->dependency_injection->sendOtp($request->email);
        return redirect()->route('website.show.form.code',['email' => $user->email])->with('info', __('auth.code_sent'));
    }
    public function showFormCode($email)
    {
        return view('website.auth.passwords.confirm',['email' => $email]);
    }
    public function checkOtpCode(ForgotPasswordUserRequest $request)
    {
        if (!$this->dependency_injection->verifyOtp($request->email , $request->token)) {
            return redirect()->back()->with('error', __('auth.code_expired'));
        }
        return redirect()->route('website.show.reset.password',['email' => $request->email , 'token'=> $request->token])->with('success', __('auth.code_successfully'));
    }
}
