<?php

namespace App\Http\Controllers;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function enviarMensaje(Request $request)
    {
        // Validar el formulario
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required',
        ]);

        // Enviar el correo
        $data = $request->all();

        Mail::to('informes@desarrollowebmaster.com')->send(new ContactFormMail($data));

        // Puedes agregar un mensaje de éxito o redirigir a una página de éxito
        return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
    }
}
