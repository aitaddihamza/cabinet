<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function doLogin(LoginRequest $request)
    {
        $crendials = $request->validated();
        if (Auth::attempt($crendials)) {
            $userRole = Auth::user()->role;
            if ($userRole == 'admin')
                return to_route('admin.index');
            else if ($userRole == 'doctor')
                return to_route('doctor.index');
            else
                return to_route('patient.index');
        }
        return redirect()->back()->with('warning', __('Email ou mot de passe incorrect ! '));
    }
    public function doRegister(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return to_route('login')->with('message', __('veuillez s\'authentifier'));
    }
    public function logout()
    {
        Auth::logout();
        return to_route('home.index');
    }
}
