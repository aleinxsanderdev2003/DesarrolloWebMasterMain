<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\DetalleCompra;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CapturaController extends Controller
{

    public function captura(Request $request)
    {
        $json = file_get_contents('php://input');
        $datos = json_decode($json, true);

        // Verificar si se recibieron datos válidos en formato JSON
        if (is_array($datos) && isset($datos['detalles']) && is_array($datos['detalles'])) {

            // Extraer la información relevante de los detalles de la transacción
            $id_transaccion = $datos['detalles']['id'];
            $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
            $status = $datos['detalles']['status'];
            $fecha = Carbon::parse($datos['detalles']['update_time']);
            $fecha_nueva = $fecha->format('Y-m-d H:i:s');

            $email = $datos['detalles']['payer']['email_address'];
            $id_cliente = $datos['detalles']['payer']['payer_id'];

            // Insertar los datos de la compra en la tabla "compra"
            DB::table('compra')->insert([
                'id_transaccion' => $id_transaccion,
                'fecha' => $fecha_nueva,
                'status' => $status,
                'email' => $email,
                'id_cliente' => $id_cliente,
                'total' => $total
            ]);

            // Obtener el ID de la compra recién insertada
            $id = DB::getPdo()->lastInsertId();

            // Verificar si se pudo obtener un ID válido
            if ($id > 0) {
                $productos = session('carrito.productos');

                // Verificar si existen productos en el carrito
                if ($productos != null) {

                    // Recorrer los productos del carrito
                    foreach ($productos as $clave => $cantidad) {

                        // Obtener información del producto desde la tabla "productos"
                        $producto = DB::table('productos')
                            ->select('id', 'nombre', 'precio', 'descuento')
                            ->where('id', $clave)
                            ->where('activo', 1)
                            ->first();

                        // Verificar si se encontró el producto en la base de datos
                        if ($producto) {
                            $precio = $producto->precio;
                            $descuento = $producto->descuento;

                            // Calcular el precio con descuento si corresponde
                            $precio_desc = $precio - (($precio * $descuento) / 100);

                            // Insertar el detalle de la compra en la tabla "detalle_compra"
                            DB::table('detalle_compra')->insert([
                                'id_compra' => $id,
                                'id_producto' => $clave,
                                'nombre' => $producto->nombre,
                                'precio' => $precio_desc,
                                'cantidad' => $cantidad
                            ]);
                        }
                    }
                }

                // Eliminar el contenido del carrito de la sesión
                session()->forget('carrito');

                // Devolver una respuesta JSON indicando el éxito y el ID de la compra
                return response()->json(['success' => true, 'id' => $id]);
            }
        }

        // Devolver una respuesta JSON indicando que no se pudo procesar la transacción
        return response()->json(['success' => false]);
    }




    public function completado(Request $request)
    {
        $id_transaccion = $request->query('key');
        $error = '';

        // Verificar si se proporcionó un ID de transacción
        if ($id_transaccion == '') {
            $error = 'Error al procesar la petición';
        } else {
            // Verificar si existe una compra con el ID de transacción y estado "COMPLETED"
            $count = Compra::where('id_transaccion', $id_transaccion)
                ->where('status', 'COMPLETED')
                ->count();

            if ($count > 0) {
                // Obtener los detalles de la compra
                $compra = Compra::where('id_transaccion', $id_transaccion)
                    ->where('status', 'COMPLETED')
                    ->first();

                $idCompra = $compra->id;
                $total = $compra->total;
                $fecha = $compra->fecha;

                // Obtener los detalles de la compra desde la tabla "detalle_compra"
                $sqlDet = DetalleCompra::where('id_compra', $idCompra)->get();
            } else {
                $error = 'Error al comprobar la compra';
            }
        }

        // Verificar si se produjo un error durante el proceso
        if ($error) {
            return redirect()->back()->with('error', $error);
        } else {
            // Establecer el ID de la compra en la sesión y mostrar la vista de completado
            session(['id_compra' => $id_transaccion]);
            return view('completado', compact('idCompra', 'total', 'fecha', 'sqlDet', 'error', 'id_transaccion'));
        }
    }



}
