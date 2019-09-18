<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
class ProductoController extends Controller
{

public function __construct(){
	    $this->middleware('auth');
		if(!\Session::has('stock')) \Session::put('stock', array());
	}	

    public function inicio(){

		//$proveedores = App\ProveedoresModelo::paginate(2);
					$producto = DB::select("
    					select * from producto
    					where producto.Estado=1
    				");

					$catalogo=DB::select("select * from catalogo where Estado=1");
					

		return view('view_producto',compact('producto','catalogo'));
	}

	public function crearProducto(Request $request){
			//return $request->all();
		/*	$request->validate([
				'nombre'=> 'required',
				'telefono'=> 'required',
				'email'=> 'required',
				'direccion'=> 'required',
				'nit'=> 'required'
			]);
		*/
				//dd($request->file('foto'));				
      		$request->file('foto')->store('public');

			$verifica_catalogo=App\CatalogoModelo::find($request->Codigo_catalogo);
			if($verifica_catalogo!=''){
			$productoNuevo = new App\ProductoModelo;
		//	$proveedorNuevo->Id_proveedor=2;
			$productoNuevo->Codigo = $request->Codigo;
			$productoNuevo->Tipo=$request->Tipo;
			$productoNuevo->Nombre_producto=$request->Nombre_producto;
			$productoNuevo->Descuento=$request->Descuento;
			$productoNuevo->Precio_venta=$request->Precio_venta;
			$productoNuevo->Stock=$request->Stock;
			$productoNuevo->Estado=1;
			$productoNuevo->Catalogo_idCatalogo=$request->Codigo_catalogo;			
			//$productoNuevo->imagen=$request->file('foto');
			$productoNuevo->Descripcion=$request->Descripcion;
			if($request->hasFile('foto')){
				$path = $request->foto->store('public');
				$productoNuevo->imagen = $path;
			}

			//$productoNuevo->imagen=$request->file('foto')->store('public');
			$productoNuevo->save();
			return back()->with('mensaje','Producto guardado exitosamente');
		}else{
			return back()->with('El codigo catalogo no existe');
		}
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
							//$productoUpdate->imagen=$request->file('foto');
							$productoUpdate->Descripcion=$request->Descripcion;							
							$productoUpdate->imagen=$request->file('foto')->store('public');							
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






		public function eliminar($idProducto){
					//$proveedorUpdate= new App\ProveedoresModelo;
					//$Idd=$id->Id;				
					$productoUpdate = App\ProductoModelo::find($idProducto);			
					//$proveedorUpdate=App\ProveedoresModelo::find($id);
					//$proveedorUpdate = App\ProveedoresModelo::where('Id',$Id)->first();
					//$proveedorUpdate::find($Id);
						if($productoUpdate){
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
							$productoUpdate->Estado=0;
							$productoUpdate->save();
							return back()->with('mensaje','Producto eliminado exitosamente');
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

		public function actualizar($idProducto){
		//$product= App\ProductoModelo::where('idProducto',$id)->first();
		$stock = \Session::get('stock');
		//$product->cantidad = '1';
		$stock['idProducto']=$idProducto;
		\Session::put('stock',$stock);
			$idProductoaux=$idProducto;
			return view('producto/actualizar');
			//return view('producto.actualizar',$idProductoaux);
		//return redirect()->route('producto.actualizar',$idProductoaux); 
		}

		public function actualizar2(Request $request){			

				$stock=\Session::get('stock');
					$idProducto=0;
						foreach($stock as $item){
							$idProducto=$item;
						}

							$cantidad_agregar=0;
							$cantidad_agregar=$request->cantidad_stock;
							$stock_actual=0;
						
							$producto = App\ProductoModelo::findOrFail($idProducto);
							$stock_actual=$producto->Stock;

							$stock_guardar=0;
							$stock_guardar=$cantidad_agregar+$stock_actual;

							//$proveedorUpdate->Estado=1;
							$producto->Stock=$stock_guardar;
							$producto->save();

							return back()->with('mensaje','Producto actualizado exitosamente');
		}
}
