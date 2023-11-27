<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;


    protected $table = 'detalle_compra';

    protected $fillable = [
        'id_compra',
        'id_producto',
        'nombre',
        'precio',
        'cantidad',
    ];

}
