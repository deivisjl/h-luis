<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
class ComprasClienteController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function inicio(){

    	$id=Auth()->user()->id;

		//$ventas = App\VentasModelo::all();
					$compras = DB::select("
    					select * from venta
    					where users_id='$id' and Estado=1
    					order by idVenta
    				");
					
		return view('view_compras_cliente',compact('compras'));
	}

 	 public function detalle($id){

    	//$id=Auth()->user()->id;
        $tipoUsuario=Auth()->user()->tipo;
		//$ventas = App\VentasModelo::all();
					$compras = DB::select("
    					select venta.idVenta,detalle_venta.idDetalle_venta,venta.Total_venta,venta.users_id,detalle_venta.Unidades,detalle_venta.Precio_venta,detalle_venta.Producto_idProducto,producto.Tipo,producto.Nombre_producto from detalle_venta,venta,producto
    					where producto.idProducto=detalle_venta.Producto_idProducto and detalle_venta.Venta_idVenta=venta.idVenta and venta.idVenta='$id'
    					
    				");
					
		return view('detalle_compras_cliente/detalle',compact('compras','tipoUsuario'));
	}

}
