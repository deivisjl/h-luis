<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoModelo extends Model
{
    protected $primaryKey = 'idProducto';
    protected $table='producto';
}
