<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;


use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;
class ProductosController extends Controller
{

    public function listado(Request $request)
{
    $num_cart = config('custom.num_cart'); // Obtiene el valor de configuración 'custom.num_cart' y lo asigna a $num_cart

    $moneda = config('custom.MONEDA'); // Obtiene el valor de configuración 'custom.MONEDA' y lo asigna a $moneda
    $keyToken = Config::get('custom.key_token'); // Obtiene el valor de configuración 'custom.key_token' y lo asigna a $keyToken
    $productos = Producto::where('activo', 1)->get(); // Obtiene todos los productos activos

    if ($request->session()->has('carrito.productos')) { // Verifica si la sesión tiene una clave llamada 'carrito.productos'
        $request->session()->forget('carrito.productos'); // Elimina la clave 'carrito.productos' de la sesión
    }

    foreach ($productos as $producto) {
        $id = $producto->id;
        $imagen = $producto->imgProducto;
        $producto->imagen = $imagen;
        $token_tmp = hash_hmac('sha1', $id, $keyToken); // Calcula un token temporal utilizando el ID del producto y la clave $keyToken
        $producto->token_tmp = $token_tmp; // Asigna el token temporal al objeto $producto
    }

    foreach ($productos as $producto) {
        $nombre = $producto->nombre;
        $descripcion = $producto->descripcion;
        $precio = $producto->precio;
        $id_categoria = $producto->id_categoria;
        $activo = $producto->activo;
    }

    return view('productos')->with('productos', $productos)->with('num_cart', $num_cart)->with('token_tmp', $token_tmp);
    // Retorna la vista 'productos' y pasa las variables $productos, $num_cart y $token_tmp a la vista
}




public function detalles()
{
    $num_cart = config('custom.num_cart'); // Obtiene el valor de configuración 'custom.num_cart' y lo asigna a $num_cart

    $keyToken = Config::get('custom.key_token'); // Obtiene el valor de configuración 'custom.key_token' y lo asigna a $keyToken
    $moneda = config('custom.MONEDA'); // Obtiene el valor de configuración 'custom.MONEDA' y lo asigna a $moneda
    $productos = Producto::where('activo', 1)->get(); // Obtiene todos los productos activos

    foreach ($productos as $producto) {
        $nombre = $producto->nombre;
        $descripcion = $producto->descripcion;
        $linkdemo = $producto->linkDemo;
        $precio = $producto->precio;
        $id_categoria = $producto->id_categoria;
        $activo = $producto->activo;
     
    }

    return view('detalles')->with('productos', $productos);
    // Retorna la vista 'detalles' y pasa la variable $productos a la vista
}


public function tienda()
{
    $num_cart = config('custom.num_cart');
    // Obtiene el valor de configuración 'custom.num_cart' y lo asigna a $num_cart

    $keyToken = Config::get('custom.key_token');
    // Obtiene el valor de configuración 'custom.key_token' y lo asigna a $keyToken

    $moneda = config('custom.MONEDA');
    // Obtiene el valor de configuración 'custom.MONEDA' y lo asigna a $moneda

    $productos = Producto::where('activo', 1)->get();
    // Obtiene todos los productos activos

    $productosCarrito = Session::get('carrito.productos');
    // Obtiene los productos en el carrito de la sesión

    $lista_carrito = [];
    // Inicializa una lista vacía para almacenar los productos del carrito

    if ($productosCarrito != null) {
        foreach ($productosCarrito as $clave => $cantidad) {
            $producto = Producto::select('id', 'nombre', 'precio', 'descuento')
                ->where('id', $clave)
                ->where('activo', 1)
                ->first();
            // Obtiene información específica del producto del carrito

            if ($producto) {
                $producto->cantidad = $cantidad;
                $lista_carrito[] = $producto;
                // Agrega el producto al carrito
            }
        }
    }

    $total = 0;
    // Inicializa el total en 0 para realizar el cálculo

    foreach ($lista_carrito as $producto) {
        $total += $producto->precio;
        // Calcula el total sumando el precio de cada producto en el carrito
    }

    foreach ($productos as $producto) {
        $nombre = $producto->nombre;
        $descripcion = $producto->descripcion;
        $precio = $producto->precio;
        $id_categoria = $producto->id_categoria;
        $activo = $producto->activo;
        // Recorre los productos, pero no realiza ninguna operación específica
    }

    return view('tienda')
        ->with('productos', $productos)
        ->with('num_cart', $num_cart)
        ->with('lista_carrito', $lista_carrito)
        ->with('total', $total);
    // Retorna la vista 'tienda' con los datos necesarios para mostrar los productos, el carrito y el total
}

public function pago()
{
    SDK::setAccessToken(Config::get('custom.ACCESS_TOKEN'));
    // Configura el token de acceso para la pasarela de pagos (ejemplo: MercadoPago)

    $productosCarrito = Session::get('carrito.productos');
    // Obtiene los productos en el carrito de la sesión

    if ($productosCarrito == null) {
        return redirect()->route('productos');
        // Si no hay productos en el carrito, redirige a la página de productos
    }

    $lista_carrito = [];
    // Inicializa una lista vacía para almacenar los productos del carrito

    foreach ($productosCarrito as $clave => $cantidad) {
        $producto = Producto::select('id', 'nombre', 'precio', 'descuento')
            ->where('id', $clave)
            ->where('activo', 1)
            ->first();
        // Obtiene información específica del producto del carrito

        if ($producto) {
            $producto->cantidad = $cantidad;
            $lista_carrito[] = $producto;
            // Agrega el producto al carrito
        }
    }

    $preference = new Preference();
    // Crea una nueva preferencia de pago

    $items = [];
    // Lista de items/productos en la preferencia

    $total = 0;
    // Inicializa el total en 0 para realizar el cálculo

    foreach ($lista_carrito as $producto) {
        $item = new Item();
        $item->id = $producto->id;
        $item->title = $producto->nombre;
        $item->quantity = $producto->cantidad;
        $item->unit_price = $producto->precio;
        $item->currency_id = config('custom.MONEDA');

        $items[] = $item;
        // Agrega cada producto como un item a la lista de items

        $total += $producto->precio * $producto->cantidad;
        // Calcula el total sumando el precio de cada producto multiplicado por la cantidad
    }

    $preference->items = $items;
    // Asigna la lista de items a la preferencia

    $preference->save();
    // Guarda la preferencia

    $preferenceId = $preference->id;
    // Obtiene el ID de la preferencia

    return view('pago')
        ->with('preferenceId', $preferenceId)
        ->with('num_cart', config('custom.num_cart'))
        ->with('lista_carrito', $lista_carrito)
        ->with('total', $total);
    // Retorna la vista 'pago' con los datos necesarios para realizar el pago, incluyendo el ID de la preferencia, el número de productos en el carrito, la lista de productos y el total.
}


}
