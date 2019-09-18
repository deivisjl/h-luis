<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoModelo extends Model
{
    protected $primaryKey = 'idProducto';
    protected $table='producto';

    protected $fillable = ['idProducto','Codigo','Tipo','Nombre_producto','Descuento','Precio_venta','Stock','imagen','Descripcion','Estado','Catalogo_idCatalogo'];



    public function getImagen(){
    	
    	return \Storage::url($this->imagen);
    }
}
