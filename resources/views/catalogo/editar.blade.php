<!--@extends('plantilla')-->
@extends('layouts.app')

@section('content')
	<h1>Editar Catalogo  1</h1>


	<form action="{{route('catalogo.update',$catalogo->idCatalogo)}}" method="POST">
                   	@method('PUT')

                    @csrf
 

                     @if(session('mensaje')) 
                            <div class="alert alert-success"> 
                                    {{ session('mensaje') }} 
                            </div>
                        @endif
  <!--             
                    @error('nombre')
                        <div class="alert alert-danger">
                            El nombre es obligatorio
                        </div>
                    @enderror  

                    @error('telefono')
                        <div class='alert alert-danger'>
                            El telefono es obligatorio
                        </div>
                    @enderror  

                    @error('email')
                        <div class='alert alert-danger'>
                            El email es obligatorio
                        </div>
                    @enderror  
                    @error('direccion')
                        <div class='alert alert-danger'>
                            La direccion es obligatorio
                        </div>
                    @enderror  
                    @error('nit')
                        <div class='alert alert-danger'>
                            El nit es obligatorio
                        </div>
                    @enderror  
                 -->
                     Nombre catalogo: <input type="text" name="Nombre_catalogo" placeholder="" Class="form-control mb-2"  value="{{ $catalogo->Nombre_catalogo }}">
                       
                    

                    <button class="btn btn-warning btn-block" type="submit">Editar</button>
            </form>
@endsection