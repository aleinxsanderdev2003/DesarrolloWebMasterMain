<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\capturaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DomainSearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Admin\AdminProductController;
/*
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


/*BUSCADOR DE DOMINIO*/


Route::get('/servicios', [DomainSearchController::class,'showForm'])->name('servicios');
Route::post('/buscar-dominio', [DomainSearchController::class,'checkAvailability'])->name('check.domain.availability');


Route::post('/enviar-mensaje', [ContactController::class, 'enviarMensaje'])->name('enviar-mensaje');
Route::post('/enviar-mensaje2', [FormularioController::class, 'enviarMensaje2'])->name('enviar-mensaje2');

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


// Ejemplo con Laravel Jetstream
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Ejemplo si estás definiendo las rutas manualmente
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Rutas de autenticación para administradores
Route::prefix('admin')->group(function () {
    Route::get('/login', 'AdminAuthController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminAuthController@login');
    Route::post('/logout', 'AdminAuthController@logout')->name('admin.logout');
});
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
// Otras rutas relacionadas con la autenticación del administrador


// Ruta del dashboard del administrador
Route::get('/admin/dashboard', [AdminController::class,'index'])->name('admin.dashboard')->middleware('auth:admin');

// PRODUCTOS
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('productos', [AdminProductController::class, 'index'])->name('productos.index');
    Route::get('productos/agregar', [AdminProductController::class, 'agregar'])->name('productos.agregar');
    Route::post('productos/agregar', [AdminProductController::class, 'store'])->name('productos.store');
    Route::get('productos/ver-todos', [AdminProductController::class, 'verTodos'])->name('productos.ver-todos');
    // Agrega más rutas para CRUD según sea necesario
});

// En tu archivo de rutas (web.php o similar)
// Rutas en web.php
Route::put('admin/productos/actualizar/{id}', [AdminProductController::class, 'actualizarProducto'])->name('admin.productos.actualizar');

// Ruta para procesar la eliminación de un producto
Route::delete('admin/productos/eliminar/{id}', [AdminProductController::class, 'eliminarProducto'])->name('admin.productos.eliminar');

Route::get('admin/productos/editar/{id}', [AdminProductController::class, 'editar'])->name('admin.editar_productos');


