<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class AdminAuthController extends Controller
{

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
    //admin@tienda.com
    //admin123

    protected $redirectTo = '/admin/dashboard'; // Ajusta la ruta a la que deseas redirigir después del inicio de sesión

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    protected function guard()
    {
        return auth()->guard('admin'); // Ajusta el guard si es necesario
    }


    public function username()
    {
        return 'email'; // Ajusta el campo del nombre de usuario si es necesario
    }
}
