<?php

namespace App\Services\Auth;

use App\Notifications\SendOtpNotify;
use App\Repositories\Auth\PasswordRepository;

class PasswordService
{
    /**
     * Create a new class instance.
     */
    protected $passwordRepository;
    public function __construct(PasswordRepository $passwordRepository)
    {
        $this->passwordRepository = $passwordRepository;
    }
    public function sendOtp($email)  
    {
        if (request()->is('*/dashboard/*')) {
            $admin = $this->passwordRepository->getAdminByEmail($email);   
            $admin->notify(new SendOtpNotify());
            return $admin;
        }else {
            $user = $this->passwordRepository->getUserByEmail($email);    
            $user->notify(new SendOtpNotify());
            return $user;
        }

    }
    public function verifyOtp($email,$token) 
    {
        $otp = $this->passwordRepository->verifyOtp($email,$token);
        return $otp->status;  
    }
    public function checkExsits($email , $token) 
    {
        $OtpToken = $this->passwordRepository->checkExsits($email,$token);
        if (!$OtpToken) {
            return false;
        }
        return $OtpToken;
    }
    public function resetPassword($email,$password,$token)
    {
        $checkExsits = $this->passwordRepository->checkExsits($email,$token);
        if (!$checkExsits) {
            return false;
        }
        if (request()->is('*/dashboard/*')) {
            $admin = $this->passwordRepository->getAdminByEmail($email);
            return $this->passwordRepository->resetPassword($admin,$password);
        }else {
            $user = $this->passwordRepository->getUserByEmail($email);
            return $this->passwordRepository->resetPassword($user,$password);
        }
    }
}
