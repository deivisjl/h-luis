<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
use Carbon\Carbon;
use Auth;
class MembresiaController extends Controller
{


	public function __construct()
{
    $this->middleware('auth');

    $user = Auth::user();
 	$id=Auth::user('id');
}
    	public function inicio(){
		//$proveedores = App\ProveedoresModelo::paginate(2);
    					$membresia = DB::select("
    					select * from membresia
    					where membresia.Estado=1
    				");
				return view('view_membresia',compact('membresia'));
	}

	public function crearMembresia(Request $request){
			//return $request->all();
		/*	$request->validate([
				'nombre'=> 'required',
				'telefono'=> 'required',
				'email'=> 'required',
				'direccion'=> 'required',
				'nit'=> 'required'
			]);
		 */
			//$id=Auth()->user()->id;
			$id=Auth::user()->id;
					//$carbon = new \Carbon\Carbon();
					$date=Carbon::now()->format('Y-m-d');
					//$date=$carbon->now();
					
					$fecha_inicio=Carbon::now();
					$fecha_final=Carbon::now()->addYear();

					//$date = $carbon->now()->toDateString(); esta variable es para validar abajo

					//$fecha_inicio=$date->format('Y-m-d')->toDateString();
					//$fecha_final=$date->addYear()->format('Y-m-d')->toDateString();

			//$carbon= new \Carbon\Carbon();

			//$date = $carbon->now()->toDateString();
			//$date=Carbon::now()->format('d-m-Y');
			//$date=$date->format('d-m-Y');
			//$date = $date->toDateString();

			//$fecha_final=$date->addYear();

			//$verifica_asociado=App\users_modelo::find($request->Codigo_asociado);
			$verifica_asociado=App\users_modelo::find($id);
			   if($verifica_asociado!=""){
			   	//$idAsociado=$request->Codigo_asociado;
			   	$idAsociado=$id;
					//$extraeMembresia=DB::select("SELECT max(Fecha_vencimiento) as Fecha_vencimiento
												 //FROM membresia
												 //WHERE Asociado_idAsociado=$idAsociado and Estado=1" );

					$extraeMembresia=DB::select("select max(Fecha_vencimiento) as Fecha_vencimiento
												 from membresia,users where membresia.Estado=1 and membresia.users_id='$id'
												 " );
					if($extraeMembresia!=""){
						$decision=0;
						//$aux_fecha_compra=$request->Fecha_compra;

						foreach($extraeMembresia as $row){
							$fecha_compra_sistema=$row->Fecha_vencimiento;
							//$fecha_sistema=new Carbon($fecha_compra_sistema);

							$fecha_sistema=$fecha_compra_sistema;
								if($date<$fecha_sistema){
									$decision=0;
								}else{
									$decision=1;
									//echo $fecha_sistema;
									//echo '             ';
									//echo $date;
									//echo '     ';
								}
						} //fin foreach

						if($decision==1){
							$membresiaNuevo = new App\MembresiaModelo;

						//	$proveedorNuevo->Id_proveedor=2;
							//$membresiaNuevo->Costo = $request->Costo;
							$membresiaNuevo->Costo = 390;
							//$membresiaNuevo->Fecha_compra=$request->Fecha_compra;
							//$membresiaNuevo->Fecha_vencimiento=$request->$fecha_final;
							$membresiaNuevo->Fecha_compra=$fecha_inicio->toDateString();
							$membresiaNuevo->Fecha_vencimiento=$fecha_final->toDateString();
							$membresiaNuevo->Tipo_tarjeta=$request->Tipo_tarjeta;
							$membresiaNuevo->Numero_tarjeta=$request->Numero_tarjeta;
							$membresiaNuevo->Nombre_tarjeta=$request->Nombre_tarjeta;
							$membresiaNuevo->Estado=1;
							//$membresiaNuevo->Asociado_idAsociado=$id;
							$membresiaNuevo->users_id=$id;
							$membresiaNuevo->save();
							return back()->with('mensaje','Membresia guardado exitosamente');
						}//else{
							//return back()->with('mensaje','No puede comprar otra membresia... porque ya existe una vigente');
					//	}
					}else{
							$membresiaNuevo = new App\MembresiaModelo;
						//	$proveedorNuevo->Id_proveedor=2;
							//$membresiaNuevo->Costo = $request->Costo;
							$membresiaNuevo->Costo = 390;
							//$membresiaNuevo->Fecha_compra=$request->Fecha_compra;
							//$membresiaNuevo->Fecha_vencimiento=$request->fecha_final;
							$membresiaNuevo->Fecha_compra=$fecha_inicio->format('Y-m-d');
							$membresiaNuevo->Fecha_vencimiento=$fecha_final->format('Y-m-d')->addYear();

							$membresiaNuevo->Tipo_tarjeta=$request->Tipo_tarjeta;
							$membresiaNuevo->Numero_tarjeta=$request->Numero_tarjeta;
							$membresiaNuevo->Nombre_tarjeta=$request->Nombre_tarjeta;
							$membresiaNuevo->Estado=1;
							//$membresiaNuevo->Asociado_idAsociado=$request->Codigo_asociado;						
							//$membresiaNuevo->Asociado_idAsociado=$id;						
							$membresiaNuevo->users_id=$id;
							$membresiaNuevo->save();
							return back()->with('mensaje','Membresia guardado exitosamente');
					}//fin extrae membresia
		}//fin primer if verifica asociado
	}

	public function editar($id){
		$membresia = App\MembresiaModelo::findOrFail($id);
		return view('membresia.editar',compact('membresia'));
	}

	public function update(Request $request,$idMembresia){
					$id=Auth::user()->id;
					//$proveedorUpdate= new App\ProveedoresModelo;
					//$Idd=$id->Id;				
					$membresiaUpdate = App\MembresiaModelo::find($idMembresia);			

					$carbon= new \Carbon\Carbon();
					$date=Carbon::now()->format('d-m-Y');
					//$date=$carbon->now();
					//$date = $carbon->now()->toDateString();
					$fecha_final=$date->addYear();

					//$proveedorUpdate=App\ProveedoresModelo::find($id);
					//$proveedorUpdate = App\ProveedoresModelo::where('Id',$Id)->first();
					//$proveedorUpdate::find($Id);
						if($membresiaUpdate){
							//$membresiaUpdate->Costo = $request->Costo;
							$membresiaUpdate->Costo = 390;
							//$membresiaUpdate->Fecha_compra=$request->Fecha_compra;
							//$membresiaUpdate->Fecha_compra=$request->Fecha_compra;
							//$membresiaUpdate->Fecha_vencimiento=$request->fecha_final;
							//$membresiaUpdate->Fecha_vencimiento=$fecha_final;
							$membresiaUpdate->Tipo_tarjeta=$request->Tipo_tarjeta;
							$membresiaUpdate->Numero_tarjeta=$request->Numero_tarjeta;
							$membresiaUpdate->Nombre_tarjeta=$request->Nombre_tarjeta;	
							$membresiaUpdate->users_id=$id;
							//$proveedorUpdate->Estado=1;
							$membresiaUpdate->save();
							return back()->with('mensaje','Membresia actualizada exitosamente');
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

		public function eliminar($idMembresia){
					//$proveedorUpdate= new App\ProveedoresModelo;
					//$Idd=$id->Id;				
					$membresiaUpdate = App\MembresiaModelo::find($idMembresia);			
					//$proveedorUpdate=App\ProveedoresModelo::find($id);
					//$proveedorUpdate = App\ProveedoresModelo::where('Id',$Id)->first();
					//$proveedorUpdate::find($Id);
						if($membresiaUpdate){
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
							$membresiaUpdate->Estado=0;
							$membresiaUpdate->save();
							return back()->with('mensaje','Membresia eliminada exitosamente');
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
