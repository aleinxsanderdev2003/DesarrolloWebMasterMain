<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        return view('admin.producto');
    }

    public function agregar()
    {
        return view('admin.producto');
    }

    public function verTodos()
    {
        return view('admin.ver-todos-productos');
    }

}
