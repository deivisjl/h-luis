<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
class AsociadoController extends Controller
{
	public function inicio(){
		//$proveedores = App\ProveedoresModelo::paginate(2);
		//			$asociado = DB::select("
    	//				select idAsociado,Primer_nombre,Segundo_nombre,Tercer_nombre,Primer_apellido,Segundo_apellido,Direccion,Telefono,Dpi,Codigo_asesor,Pais,Estado from asociado
    	//				where asociado.Estado=1
    	//			");

					$asociado = DB::select("
    					SELECT * FROM users
    				");

		return view('view_asociado',compact('asociado'));
	}

	public function crearAsociado(Request $request){
			//return $request->all();
		/*	$request->validate([
				'nombre'=> 'required',
				'telefono'=> 'required',
				'email'=> 'required',
				'direccion'=> 'required',
				'nit'=> 'required'
			]);
		*/

			$verifica_asesor_asociado=App\AsociadoModelo::find($request->Codigo_asesor);
			if($verifica_asesor_asociado!=''){
			$asociadoNuevo = new App\AsociadoModelo;
		//	$proveedorNuevo->Id_proveedor=2;
		//	$asociadoNuevo->Primer_nombre = $request->Primer_nombre;
		//	$asociadoNuevo->Segundo_nombre=$request->Segundo_nombre;
		//	$asociadoNuevo->Tercer_nombre=$request->Tercer_nombre;
		//	$asociadoNuevo->Primer_apellido=$request->Primer_apellido;
		//	$asociadoNuevo->Segundo_apellido=$request->Segundo_apellido;
			$asociadoNuevo->Name=$request->Name;
			$asociadoNuevo->Direccion=$request->Direccion;
			$asociadoNuevo->Telefono=$request->Telefono;
			//$asociadoNuevo->Dpi=$request->Dpi;
			//$asociadoNuevo->Codigo_asesor=$request->Codigo_asesor;
			$asociadoNuevo->Pais=$request->Pais;			
			//$asociadoNuevo->Estado=1;
			$asociadoNuevo->save();
			return back()->with('mensaje','Asociado guardado exitosamente');
		}else{
			return back()->with('El codigo asesor no existe');
		}
	}

	public function editar($id){
		$asociado = App\AsociadoModelo::findOrFail($id);
		return view('asociado.editar',compact('asociado'));
	}


	public function update(Request $request,$idAsociado){
					//$proveedorUpdate= new App\ProveedoresModelo;
					//$Idd=$id->Id;				
					$asociadoUpdate = App\AsociadoModelo::find($idAsociado);			
					//$proveedorUpdate=App\ProveedoresModelo::find($id);
					//$proveedorUpdate = App\ProveedoresModelo::where('Id',$Id)->first();
					//$proveedorUpdate::find($Id);
						if($asociadoUpdate){
							//$asociadoUpdate->Primer_nombre = $request->Primer_nombre;
							//$asociadoUpdate->Segundo_nombre=$request->Segundo_nombre;
							//$asociadoUpdate->Tercer_nombre=$request->Tercer_nombre;
							//$asociadoUpdate->Primer_apellido=$request->Primer_apellido;
							//$asociadoUpdate->Segundo_apellido=$request->Segundo_apellido;

							
							$asociadoUpdate->name=$request->name;
							$asociadoUpdate->direccion=$request->Direccion;				
							$asociadoUpdate->telefono=$request->Telefono;				
							//$asociadoUpdate->Dpi=$request->Dpi;				
							//$asociadoUpdate->Codigo_asesor=$request->Codigo_asesor;			
							$asociadoUpdate->pais=$request->Pais;				
							$asociadoUpdate->tipo=$request->TipoUsuario;		
							//$proveedorUpdate->Estado=1;
							$asociadoUpdate->save();
							return back()->with('mensaje','Asociado actualizado exitosamente');
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


		public function eliminar($idAsociado){
					//$proveedorUpdate= new App\ProveedoresModelo;
					//$Idd=$id->Id;				
					$asociadoUpdate = App\AsociadoModelo::find($idAsociado);			
					//$proveedorUpdate=App\ProveedoresModelo::find($id);
					//$proveedorUpdate = App\ProveedoresModelo::where('Id',$Id)->first();
					//$proveedorUpdate::find($Id);
						if($asociadoUpdate){
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
							$asociadoUpdate->Estado=0;
							$asociadoUpdate->save();
							return back()->with('mensaje','Asociado eliminado exitosamente');
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
