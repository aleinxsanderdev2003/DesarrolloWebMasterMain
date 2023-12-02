<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use AuthenticatesUsers;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin');
        } else {
            return redirect()->route('login')->with('error', 'Usuario o contraseña incorrectos.');
        }
    }
}
