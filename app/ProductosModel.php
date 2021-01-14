<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosModel extends Model{
    protected $table = "tb_productos";
    protected $primaryKey = "id_producto";
    protected $fillable = [
        'codigo',
        'nombre',
        'costo',
        'cantidad',
    ];

}