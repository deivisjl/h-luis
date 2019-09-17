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

class VistaProductoClienteController extends Controller
{
	public function __construct(){

		if(!\Session::has('car')) \Session::put('car', array());
	}	

    public function inicio(){
		//$venta_asociado = App\VentasAsociadoModelo::paginate(2);
					$venta_asociado = DB::select("
    					select * from detalle_venta
    					where Estado=1
    				");
					$catalogo=DB::select("
							select producto.idProducto,producto.Descripcion,producto.imagen,producto.Codigo,producto.Tipo,producto.Nombre_producto,producto.Descuento,producto.Precio_venta,producto.Stock,producto.Catalogo_idCatalogo from producto,catalogo where catalogo.Estado=1 and catalogo.idCatalogo=producto.Catalogo_idCatalogo and catalogo_idCatalogo=1 
						");

		return view('vista_productos',compact('venta_asociado','catalogo'));
	}

	public function store(Request $request,$idProducto){		
				dd($idProducto,"clic al boton agregar");
	}

	public function quitar(Request $request,$idProducto){
			dd($idProducto, "clic al boton quitar");
			$agregar=(object)array(
									'id' => $idProducto,
									'cantidad' => 1
								);
	}


	public function show(){
		//	return \Session::get('car');
		$car = \Session::get('car');
		$total=$this->total();
		return view('car',compact('car','total'));
	}


	public function agregar($id){

	    if($this->middleware('auth')){

				    //$this->middleware('auth');

			$product= App\ProductoModelo::where('idProducto',$id)->first();

		$car = \Session::get('car');
		$product->cantidad = '1';
		$car[$product->idProducto]=$product;
		\Session::put('car',$car);
		return redirect()->route('car-show'); 			
		}else{
			return redirect()->route('login');
		}

	}

	public function delete($id){
		$product= App\ProductoModelo::where('idProducto',$id)->first();		
		$car = \Session::get('car');
		unset($car[$product->idProducto]);
		\Session::put('car',$car);
		return redirect()->route('car-show');
	}


	public function trash(){
		\Session::forget('car');
		return redirect()->route('car-show');
	}	

	public function update(ProductoModelo $datos, $cantidad){
		//$product = App\ProductoModelo::where('idProducto',$id)->first();		
		$product= App\ProductoModelo::where('idProducto',$datos->idProducto)->first();		
		$car = \Session::get('car');

		//$car[$product->idProducto]->cantidad=$cantidad;
		$car[$datos->idProducto]->cantidad=$cantidad;
		\Session::put('car',$car);
		return redirect()->route('car-show');
	}

	private function total(){
		$car=\Session::get('car');
		$total=0;
		foreach($car as $item){
			$total+=$item->Precio_venta * $item->cantidad;
		}
		return $total;
	}

	public function orderDetail(){
		if(count(\Session::get('car'))<=0) return redirect()->route('home');
		$car = \Session::get('car');
		$total=$this->total();
		$id=Auth()->user()->id;
		$extraeMembresia="";	
		$extraeMembresia=DB::select("SELECT max(Fecha_vencimiento) as Fecha_vencimiento
												 FROM membresia,users
												 WHERE membresia.users_id=users.id and users.id='$id'" );

		if($extraeMembresia!=""){
			
			$carbon= new \Carbon\Carbon();
			//$date = $carbon->now()->toDateString();
			$date=Carbon::now();
			$dates=$date->format('Y-m-d');
			foreach($extraeMembresia as $row){
							$fecha_compra_sistema=$row->Fecha_vencimiento;
							//$fecha_sistema=new Carbon($fecha_compra_sistema);

							$fecha_sistema=$fecha_compra_sistema;
								if($dates<=$fecha_sistema){
									
									return view('order-detail',compact('car','total'));
								}else{
									//return route('view_membresia');									
									//return view('order-detail',compact('car','total'));
								}
						} //fin foreach
		}


		

	}

	public function pagar(){
		$car=\Session::get('car');		
		$total=$this->total();
		$id=Auth()->user()->id;

			$venta_nueva = new App\VentasModelo;
				//	$proveedorNuevo->Id_proveedor=2;
			$venta_nueva->Total_venta = $total;			
			$venta_nueva->estado=1;
			$venta_nueva->users_id=$id;
			$venta_nueva->save();
			$id_venta_nueva=$venta_nueva->idVenta;
					
				foreach ($car as $item) {
					$detalle_venta_nueva=new App\VentasAsociadoModelo;		
						$stock_producto= App\ProductoModelo::where('idProducto',$item->idProducto)->first();													
						$detalle_venta_nueva->Unidades=$item->cantidad;
						$detalle_venta_nueva->Precio_venta=$item->Precio_venta;
						$detalle_venta_nueva->Total_descuento=0;
						$detalle_venta_nueva->Estado=1;
						$detalle_venta_nueva->Venta_idVenta=$id_venta_nueva;
						$detalle_venta_nueva->Producto_idProducto=$item->idProducto;
						$detalle_venta_nueva->Producto_Catalogo_idCatalogo=$stock_producto->Catalogo_idCatalogo;
						$detalle_venta_nueva->save();

						//$stock_producto = new App\ProductoModelo;
							$total_stock=$stock_producto->Stock;
							$stock_descontado=$total_stock-$item->cantidad;
								$stock_producto->Stock=$stock_descontado;
								$stock_producto->save();
				}
			//return back()->with('mensaje','Venta guardado exitosamente');		
	}
}