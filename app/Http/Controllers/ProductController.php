<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categoria;
class ProductController extends Controller
{
// app/Http/Controllers/ProductoController.php
public function mostrarCategoria($nombreCategoria)
{
    $categorias = Categoria::all();
    $productos = Product::where('categoria_id', $nombreCategoria)->get();

    return view('productos.index', compact('productos', 'categorias'));
}
public function index(Request $request)
{
    $categorias = Categoria::all(); // Asegúrate de tener el modelo y la tabla de categorías definidos

    if ($request->has('categoria')) {
        // Si se proporciona una categoría en la URL, carga la vista correspondiente
        $categoria = $request->input('categoria');
        return $this->mostrarCategoria($categoria);
    }

    // Si no se proporciona una categoría, carga la vista de 'todo'
    $productos = Product::all();
    return view('productos.todo', compact('productos', 'categorias'));
}
}
