<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
class FormularioController extends Controller
{
    public function enviarMensaje(Request $request)
    {
        // Validar el formulario
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required',
            'g-recaptcha-response' => 'required|captcha', // Validar reCAPTCHA
        ]);

        // Enviar el correo
        $data = $request->all();

        Mail::to('informes@desarrollowebmaster.com')->send(new ContactFormMail($data));

        // Puedes agregar un mensaje de éxito o redirigir a una página de éxito
        return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
    }
}
