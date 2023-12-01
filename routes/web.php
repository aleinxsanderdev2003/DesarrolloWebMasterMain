<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\capturaController;
use App\Http\Controllers\CarritoController;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DomainSearchController;
use App\Http\Controllers\ContactController;
/*
use App\Http\Controllers\LoginControlle;
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// prueba
Route::get('/admin', function () {
    return view('administrador');
});



Route::get('/', [LinkController::class, 'index'])->name('index');
Route::get('/empresa', [LinkController::class, 'empresa'])->name('empresa');
Route::get('/contacto', [LinkController::class, 'contacto'])->name('contacto');
Route::get('/servicios', [LinkController::class, 'servicios'])->name('servicios');



Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');
Route::get('/carrito', [ProductController::class, 'carrito'])->name('carrito');
Route::get('/cotizar', [ProductController::class, 'cotizar'])->name('cotizar');


Route::get('/tienda', [CategoriaController::class, 'index'])->name('tienda');
Route::get('/categorias/{categoria}', [ProductController::class, 'mostrarCategoria']);

Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');
Route::get('/categorias/{categoria}', [ProductController::class, 'mostrarCategoria']);

/*AUTENTICACION*/
Route::get('/login', [LoginController::class, 'index'])->name('login');


/*BUSCADOR DE DOMINIO*/


Route::get('/servicios', [DomainSearchController::class,'showForm'])->name('servicios');
Route::post('/buscar-dominio', [DomainSearchController::class,'checkAvailability'])->name('check.domain.availability');


Route::post('/enviar-mensaje', [ContactController::class, 'enviarMensaje'])->name('enviar-mensaje');



/* prueba de rutas tienda */


Route::get('/productos', [ProductosController::class, 'listado'])->name('productos');
Route::get('/detalles', [ProductosController::class, 'detalles']);
Route::get('/tienda', [ProductosController::class, 'tienda'])->name('tienda');
Route::get('/pago', [ProductosController::class, 'pago'])->name('pago');

// Route::get('/mercado-pago', [MercadoPagoController::class, 'mercadoP'])->name('mercado-pago');

Route::post('/captura', [capturaController::class, 'captura'])->name('captura.captura');
Route::get('/completado', [CapturaController::class,'completado'])->name('completado');


Route::post('/carrito/agregar-producto', [CarritoController::class, 'agregarProducto'])->name('carrito.agregarProducto');
Route::post('/carrito/actualizar-carrito', [CarritoController::class, 'actualizarCarrito'])->name('carrito.actualizarCarrito');
Route::get('carrito/obtener-numero-productos', [CarritoController::class, 'obtenerNumeroProductos'])->name('carrito.obtenerNumeroProductos');



