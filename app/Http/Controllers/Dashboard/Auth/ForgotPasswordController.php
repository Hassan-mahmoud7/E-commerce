<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Notifications\SendOtpNotify;
use App\Services\Auth\PasswordService;
use Ichtrojan\Otp\Otp;
use Illuminate\Routing\Controllers\Middleware;

class ForgotPasswordController extends Controller
{
    protected $otp2;
    protected $dependency_injection;

    public function __construct(PasswordService $passwordService)
    {
        $this->dependency_injection = $passwordService;
        $this->otp2 = new Otp;
    }
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'guest:admin'),
        ];
    }

    public function showForgotPasswordForm()
    {
        return view('dashboard.auth.password.email');
    }
    public function sendCodeOtp(ForgotPasswordRequest $request)
    {
        $admin = $this->dependency_injection->sendOtp($request->email);
        return redirect()->route('dashboard.show.form.code',['email' => $admin->email])->with('info', __('auth.code_sent'));
    }
    public function showFormCode($email)
    {
        return view('dashboard.auth.password.confirm',['email' => $email]);
    }
    public function checkOtpCode(ForgotPasswordRequest $request)
    {
        if (!$this->dependency_injection->verifyOtp($request->email , $request->token)) {
            return redirect()->back()->with('error', __('auth.code_expired'));
        }
        return redirect()->route('dashboard.show.reset.password',['email' => $request->email , 'token'=> $request->token])->with('success', __('auth.code_successfully'));
    }
}
