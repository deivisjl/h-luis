@extends('plantilla')

@section('seccion')
	<h1>Editar Asociado  {{$asociado->id}}</h1>


	<form action="{{route('asociado.update',$asociado->id)}}" method="POST">
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
                     Nombre: <input type="text" name="name" required="true" placeholder="Primer Nombre" Class="form-control mb-2"  value="{{ $asociado->name }}">
                    <!--   
                    Segundo Nombre: <input type="text" name="Segundo_nombre" placeholder="Segundo Nombre" Class="form-control mb-2" value="{{ $asociado->Segundo_nombre }}">
                    Tercer Nombre: <input type="text" name="Tercer_nombre" placeholder="Tercer Nombre" Class="form-control mb-2" value="{{ $asociado->Tercer_nombre }}">
                    Primer Apellido: <input type="text" name="Primer_apellido" placeholder="Primer Apellido" Class="form-control mb-2" value="{{ $asociado->Primer_apellido }}">
                    Segundo Apellido: <input type="text" name="Segundo_apellido" placeholder="Segundo Apellido" Class="form-control mb-2" value="{{ $asociado->Segundo_apellido }}">
                    -->
                    Direccion: <input type="text" name="Direccion" required="true" placeholder="Direccion" Class="form-control mb-2" value="{{ $asociado->direccion }}">
                    Telefono: <input type="text" name="Telefono" required="true" placeholder="Telefono" Class="form-control mb-2" value="{{ $asociado->telefono }}">
                    <!--
                    DPI: <input type="text" name="Dpi" placeholder="DPI" Class="form-control mb-2" value="{{ $asociado->Dpi }}">
                    
                    Asesor: <input type="text" name="Codigo_asesor" placeholder="Codigo Asesor" Class="form-control mb-2" value="{{ $asociado->Codigo_asesor }}">
                    -->
                    Pais: <input type="text" name="Pais" required="true" placeholder="Pais" Class="form-control mb-2" value="{{ $asociado->pais }}">

                    Tipo Usuario: <select id="TipoUsuario"  name="TipoUsuario" class="form-control">
                           
                            <option value="1">Administrador</option>
                            <option value="2">Cliente</option>
                           
                        </select>
                    <button class="btn btn-warning btn-block" type="submit">Editar</button>
            </form>
@endsection