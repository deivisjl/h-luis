<?php

namespace App\Http\Controllers;
use DB;
use App;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{

	public function __construct(){
	    $this->middleware('auth');
	}	

    public function inicio(){
		//$proveedores = App\ProveedoresModelo::paginate(2);
					$catalogo = DB::select("
    					select * from catalogo
    					where catalogo.Estado=1
    				");
		return view('view_catalogo',compact('catalogo'));
	}

	public function crearCatalogo(Request $request){
			//return $request->all();
		/*	$request->validate([
				'nombre'=> 'required',
				'telefono'=> 'required',
				'email'=> 'required',
				'direccion'=> 'required',
				'nit'=> 'required'
			]);
		*/

			
			
			$catalogoNuevo = new App\CatalogoModelo;
		//	$proveedorNuevo->Id_proveedor=2;
			$catalogoNuevo->Nombre_catalogo = $request->Nombre_catalogo;			
			$catalogoNuevo->Estado=1;
			$catalogoNuevo->save();
			return back()->with('mensaje','Catalogo guardado exitosamente');
		
	}

	public function editar($id){
		$catalogo = App\CatalogoModelo::findOrFail($id);
		return view('catalogo.editar',compact('catalogo'));
	}


	public function update(Request $request,$idCatalogo){
					//$proveedorUpdate= new App\ProveedoresModelo;
					//$Idd=$id->Id;				
					$catalogoUpdate = App\CatalogoModelo::find($idCatalogo);			
					//$proveedorUpdate=App\ProveedoresModelo::find($id);
					//$proveedorUpdate = App\ProveedoresModelo::where('Id',$Id)->first();
					//$proveedorUpdate::find($Id);
						if($catalogoUpdate){
							$catalogoUpdate->Nombre_catalogo = $request->Nombre_catalogo;
							
							//$proveedorUpdate->Estado=1;
							$catalogoUpdate->save();
							return back()->with('mensaje','Catalogo actualizado exitosamente');
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


		public function eliminar($idCatalogo){
					//$proveedorUpdate= new App\ProveedoresModelo;
					//$Idd=$id->Id;				
					$catalogoUpdate = App\CatalogoModelo::find($idCatalogo);			
					//$proveedorUpdate=App\ProveedoresModelo::find($id);
					//$proveedorUpdate = App\ProveedoresModelo::where('Id',$Id)->first();
					//$proveedorUpdate::find($Id);
						if($catalogoUpdate){
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
							$catalogoUpdate->Estado=0;
							$catalogoUpdate->save();
							return back()->with('mensaje','Catalogo eliminado exitosamente');
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
