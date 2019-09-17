<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App;
use Carbon\Carbon;
use Auth;
use App\ProductoModelo;

class VentasDetalleController extends Controller
{    
	public function __construct(){
		    $this->middleware('auth');
		if(!\Session::has('car')) \Session::put('car', array());
	}	


    public function inicio(){
		//$venta_asociado = App\VentasAsociadoModelo::paginate(2);
					//$ventas = DB::select("
    				//	select producto.Tipo,producto.Nombre_producto, detalle_venta.idDetalle_venta,detalle_venta.unidades,d//etalle_venta.precio_venta,detalle_venta.Venta_idVenta,detalle_venta.Producto_idProducto,detalle_venta.P//roducto_Catalogo_idCatalogo,venta.Total_venta from detalle_venta,venta,producto 
    				//	where detalle_venta.Venta_idVenta=venta.idVenta and detalle_venta.Producto_idProducto=producto.idProducto
    				//");					

    				$ventas=DB::select("select * from venta where Estado=1");
		return view('view_ventas_detalle',compact('ventas'));
	}


	public function editar($id){
		$producto = App\ProductoModelo::findOrFail($id);
		return view('producto.editar',compact('producto'));
	}


	public function update(Request $request,$idProducto){
					//$proveedorUpdate= new App\ProveedoresModelo;
					//$Idd=$id->Id;				
					$verifica_catalogo=App\CatalogoModelo::find($request->Codigo_catalogo);			
					//$proveedorUpdate=App\ProveedoresModelo::find($id);
					//$proveedorUpdate = App\ProveedoresModelo::where('Id',$Id)->first();
					//$proveedorUpdate::find($Id);
						if($verifica_catalogo){
							$productoUpdate = App\ProductoModelo::find($idProducto);		
							$productoUpdate->Codigo = $request->Codigo;
							$productoUpdate->Tipo=$request->Tipo;
							$productoUpdate->Nombre_producto=$request->Nombre_producto;
							$productoUpdate->Descuento=$request->Descuento;
							$productoUpdate->Precio_venta=$request->Precio_venta;
							$productoUpdate->Stock=$request->Stock;
							$productoUpdate->Estado=1;
							$productoUpdate->Catalogo_idCatalogo=$request->Codigo_catalogo;																
							//$proveedorUpdate->Estado=1;
							$productoUpdate->save();
							return back()->with('mensaje','Producto actualizado exitosamente');
						}					
					/*
					$proveedorUpdate->Nombre = $request->input('nombre');
					$proveedorUpdate->Telefono=$request->input('telefono');
					$proveedorUpdate->Email=$request->input('email');
					$proveedorUpdate->Direccion=$request->input('direccion');
					$proveedorUpdate->Nit=$request->input('nit');									
					$proveedorUpdate->Estado=1;
					*/					
		}

		public function eliminar($idVenta){
					//$proveedorUpdate= new App\ProveedoresModelo;
					//$Idd=$id->Id;				
				$idVentaTable=0; // guarda el id de la tabla venta
				$venta_detalle = App\VentasDetalleModelo::find($idVenta); //el parametro $idVenta es el idDetalleVenta
					//$proveedorUpdate=App\ProveedoresModelo::find($id);
					//$proveedorUpdate = App\ProveedoresModelo::where('Id',$Id)->first();
						$unidadess=0; //capturar unidades vendidas
						$idProducto=0; //capturar el codigo de producto vendido
						$stockProducto=0; //capturar stock del producto de la tabla producto					 

						$valor_venta=0; //capturar el valor total de la venta - detalle_venta
						$precio_debitar=0; //guardar cantidad a debitar del total venta - detalle_venta
						$precio_vendido=0; //guardar el precio en que se vendio el producto

						$unidadess=$venta_detalle->Unidades;						
						$idProducto=$venta_detalle->Producto_idProducto;		
						$precio_vendido=$venta_detalle->Precio_venta;
						$idVentaTable=$venta_detalle->Venta_idVenta;
					
						$arrayVenta = App\VentasModelo::find($idVentaTable);//extrayendo array de la tabla venta			
							$valor_venta=$arrayVenta->Total_venta;

						$producto=App\ProductoModelo::find($idProducto);					
							$stockProducto=$producto->Stock;						
							

							$totalStock=0;							
							$totalStock=$stockProducto+$unidadess;		

							$total_venta_actual=$valor_venta-($unidadess*$precio_vendido);

					//$proveedorUpdate::find($Id);
						if($venta_detalle!=null){
							/*
							$asociadoUpdate->Primer_nombre = $request->Primer_nombre;
							$asociadoUpdate->Segundo_nombre=$request->Segundo_nombre;
							$asociadoUpdate->Tercer_nombre=$request->Tercer_nombre;
							$asociadoUpdate->Primer_apellido=$request->Primer_apellido;
							$asociadoUpdate->Segundo_apellido=$request->Segundo_apellido;
							$asociadoUpdate->Direccion=$request->Direccion;				
							$asociadoUpdate->Telefono=$request->Telefono;				
							$asociadoUpdate->Dpi=$request->Dpi;				
							$asociadoUpdate->Codigo_asesor=$request->Codigo_asesor;			
							$asociadoUpdate->Pais=$request->Pais;				
							*/
							//$proveedorUpdate->Estado=1;
							//$venta_detalle->Estado=0;
							//$venta_detalle->save();								
							
			$actualizar_stock = DB::update("UPDATE `producto` SET Stock='$totalStock' WHERE idProducto='$idProducto'");	
			$actualizar_stock = DB::update("UPDATE `venta` SET Total_venta='$total_venta_actual' WHERE idVenta='$idVentaTable'");	
			$eliminar_venta=DB::select("DELETE FROM `detalle_venta` WHERE idDetalle_venta='$idVenta'");
							return back()->with('mensaje','Producto-venta eliminado exitosamente');
						}					
					/*
					$proveedorUpdate->Nombre = $request->input('nombre');
					$proveedorUpdate->Telefono=$request->input('telefono');
					$proveedorUpdate->Email=$request->input('email');
					$proveedorUpdate->Direccion=$request->input('direccion');
					$proveedorUpdate->Nit=$request->input('nit');									
					$proveedorUpdate->Estado=1;
					*/					
		}
}
