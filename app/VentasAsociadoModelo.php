<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class VentasAsociadoModelo extends Model
{
    protected $primaryKey = 'idDetalle_venta';
    protected $table='detalle_venta';
}
