<?php

namespace App\Repositories\Auth;

use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function login($credenstials, $guard, $remember = false)
    {
        Auth::guard($guard)->attempt($credenstials, $remember == true);
    }
    
    public function logout($guard)
    {
        return Auth::guard($guard)->logout();

    }
}
