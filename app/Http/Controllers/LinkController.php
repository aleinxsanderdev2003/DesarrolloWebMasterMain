<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index(){
        return view("index");
    }
    public function tienda(){
        return view("tienda.index");
    }

    public function empresa(){
        return view("empresa");
    }

    public function contacto(){
        return view("contacto");
    }
    public function header(){
        return view("header");
    }

    public function servicios(){
        return view("servicios");
    }
}
