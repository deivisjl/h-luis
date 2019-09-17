<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentasDetalleModelo extends Model
{
    protected $primaryKey = 'idDetalle_venta';
    protected $table='detalle_venta';
}
