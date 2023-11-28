<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function agregarProducto(Request $request)
    {
        $id = $request->input('id');
        // $carrito = $request->input('cantidad');
        $token = $request->input('token');
        // Obtiene el ID y el token del producto que se va a agregar al carrito

        $token_tmp = hash_hmac('sha1', $id, config('custom.key_token'));
        // Genera un token temporal basado en el ID y la clave de token

        $datos = array();
        // Inicializa un array para almacenar los datos de respuesta

        if ($token == $token_tmp) {
            // Verifica si el token recibido es igual al token temporal generado

            $producto = Producto::find($id);
            // Busca el producto con el ID especificado

            if ($producto) {
                // Si se encuentra el producto

                if ($request->session()->has('carrito.productos.'.$id)) {
                    // Verifica si el producto ya está en el carrito

                    $request->session()->put('carrito.productos.'.$id, $request->session()->get('carrito.productos.'.$id) + 1);
                    // Si el producto ya está en el carrito, incrementa la cantidad en 1
                } else {
                    $request->session()->put('carrito.productos.'.$id, 1);
                    // Si el producto no está en el carrito, lo agrega con cantidad 1
                }

                $datos['numero'] = count($request->session()->get('carrito.productos'));
                $datos['ok'] = true;
                // Almacena el número de productos en el carrito y establece 'ok' en true en los datos de respuesta
            } else {
                $datos['ok'] = false;
                // Si el producto no existe, establece 'ok' en false en los datos de respuesta
            }
        } else {
            $datos['ok'] = false;
            // Si el token no coincide, establece 'ok' en false en los datos de respuesta
        }

        return response()->json($datos);
        // Retorna los datos de respuesta en formato JSON
    }

    public function obtenerNumeroProductos(Request $request)
    {
        $datos = array();
        // Inicializa un array para almacenar los datos de respuesta

        $datos['numero'] = count($request->session()->get('carrito.productos'));
        // Obtiene el número de productos en el carrito accediendo a la sesión y contando el número de elementos en la clave 'carrito.productos'

        $datos['ok'] = true;
        // Establece 'ok' en true en los datos de respuesta

        return response()->json($datos);
        // Retorna los datos de respuesta en formato JSON
    }



    public function actualizarCarrito(Request $request)
    {
        $datos = array();
        // Inicializa un array para almacenar los datos de respuesta

        if ($request->input('action')) {
            $action = $request->input('action');
            $id = $request->input('id');
            // Obtiene la acción y el ID del producto desde la solicitud

            if ($action == 'agregar') {
                $cantidad = $request->input('cantidad');
                // Obtiene la cantidad desde la solicitud en caso de agregar un producto
                $respuesta = $this->agregar($id, $cantidad);
                // Llama a la función "agregar" pasando el ID y la cantidad como argumentos

                if ($respuesta > 0) {
                    $datos['ok'] = true;
                } else {
                    $datos['ok'] = false;
                }

                $datos['sub'] = config('custom.MONEDA') . $respuesta;
                // Establece 'ok' en true si la respuesta es mayor a 0, de lo contrario, lo establece en false
                // Agrega el subtotal en los datos de respuesta

            } else if ($action == 'eliminar') {
                $respuesta = $this->eliminar($id);
                // Llama a la función "eliminar" pasando el ID como argumento

                if ($respuesta) {
                    $datos['ok'] = true;
                } else {
                    $datos['ok'] = false;
                }
                // Establece 'ok' en true si la respuesta es verdadera, de lo contrario, lo establece en false

            } else {
                $datos['ok'] = false;
            }
            // Si la acción no es reconocida, establece 'ok' en false
        } else {
            $datos['ok'] = false;
        }
        // Si no se proporciona ninguna acción, establece 'ok' en false

        return response()->json($datos);
        // Retorna los datos de respuesta en formato JSON
    }


    public function agregar($id, $cantidad)
    {
        $res = 0;
        // Inicializa la variable $res en 0

        if ($id > 0 && $cantidad > 0 && is_numeric($cantidad)) {
            // Verifica si el ID y la cantidad son mayores a 0, y si la cantidad es un valor numérico

            if (Session::has('carrito.productos.'.$id)) {
                // Verifica si el producto ya está en el carrito

                Session::put('carrito.productos.'.$id, $cantidad);
                // Actualiza la cantidad del producto en el carrito

                // Aquí puedes realizar cualquier operación adicional necesaria

                $producto = Producto::find($id);
                // Obtiene el objeto del producto correspondiente al ID

                if ($producto) {
                    $res = $producto->precio * $cantidad;
                    // Calcula el subtotal multiplicando el precio del producto por la cantidad
                }
            }
        }

        return $res;
        // Retorna el subtotal calculado
    }



    public function eliminar($id)
    {
        if ($id > 0) {
            // Verifica si el ID es mayor a 0

            if (Session::has('carrito.productos.'.$id)) {
                // Verifica si el producto está en el carrito

                Session::forget('carrito.productos.'.$id);
                // Elimina el producto del carrito

                return true;
            }
        }

        return false;
    }



}
