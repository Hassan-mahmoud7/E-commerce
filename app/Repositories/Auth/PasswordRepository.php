<?php

namespace App\Repositories\Auth;

use App\Models\Admin;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\DB;

class PasswordRepository
{
    /**
     * Create a new class instance.
     */
    protected $otp;
    public function __construct()
    {
        $this->otp = new Otp();       
    }
    public function getAdminByEmail($email)  
    {
       $admin = Admin::where('email', $email)->first();
       return $admin;
    }
    public function verifyOtp($email,$token) 
    {
        $otp = $this->otp->validate($email,$token);
        return $otp;  
    }
    public function resetPassword($email,$password)
    {
        $admin = $this->getAdminByEmail($email);
        return $admin->update(['password' => bcrypt($password)]);
         
    }
    public function checkExsits($email , $token) 
    {
        $OtpToken = DB::table('otps')->where([
            ['identifier', '=', $email],
            ['token', '=', $token]
        ])->first();
        return $OtpToken;
    }
}
