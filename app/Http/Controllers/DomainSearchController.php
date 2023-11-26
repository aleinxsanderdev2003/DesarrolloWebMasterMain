<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DomainSearchController extends Controller
{
    public function showForm()
    {
        return view('servicios');
    }

    public function checkAvailability(Request $request)
    {
        $domain = $request->input('domain');
        $isAvailable = $this->checkDomainAvailability($domain);

        if ($isAvailable) {
            return response()->json(['message' => "¡El dominio $domain está disponible para su compra!"], 200);
        } else {
            return response()->json(['message' => "Lo siento, el dominio $domain ya está en uso. Por favor, intenta con otro."], 422);
        }
    }

    private function checkDomainAvailability($domain)
    {
        try {
            $response = Http::get("https://jsonwhois.com/api/v1/whois?identifier=$domain");

            if ($response->successful()) {
                $result = $response->json();
                // Resto del código...
            } else {
                // Manejar errores de la solicitud a la API.
                return response()->json(['error' => $response->body()], 500);
            }
        } catch (\Exception $e) {
            // Capturar excepciones generales y devolver información detallada sobre el error.
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


}
