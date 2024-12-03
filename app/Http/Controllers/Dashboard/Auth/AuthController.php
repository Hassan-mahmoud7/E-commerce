<?php

namespace App\Http\Controllers\Dashboard\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateAdminRequest;
use App\Models\Admin;
use App\Services\Auth\AuthService;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller implements HasMiddleware
{
    protected $dependency_injection;
    public function __construct(AuthService $authService)
    {
        $this->dependency_injection = $authService;
    }
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'guest:admin', except: ['logout']),
        ];
    }
    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }

    public function login(CreateAdminRequest $request)
    {    
        $credenstials = $request->only(['email' , 'password']);
        if ($this->dependency_injection->login($credenstials,'admin',$request->remember)) {
            
            return redirect()->intended(route('dashboard.welcome'))->with('success' , __('auth.logned_successfuly'));
        }else{
            return redirect()->back()->withErrors(['email'=>__('validation.Invalid')]);
        }
    }

    public function logout()
    {
       $this->dependency_injection->logout('admin');
        return redirect()->route('dashboard.login')->with('success', __('auth.loggout_successfuly'));
    }
}
