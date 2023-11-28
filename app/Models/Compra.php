<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compra';

    protected $fillable = [
        'id_transaccion',
        'fecha',
        'status',
        'email',
        'id_cliente',
        'total'
    ];
}
