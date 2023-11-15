<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller{
    public function index()
{
      // Obtener todas las categorías
      $categorias = Categoria::all();
      return view('productos.index', compact('categorias'));
}
}
