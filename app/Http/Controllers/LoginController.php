<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use AuthenticatesUsers;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
}
