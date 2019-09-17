@extends('plantilla')

@section('seccion')
	<h1>Editar Membresia  1</h1>


	<form action="{{route('membresia.update',$membresia->idMembresia)}}" method="POST">
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
                    Costo: <input type="text" name="Costo" placeholder="Costo" Class="form-control mb-2" value="{{ $membresia->Costo }} ">
                    Fecha compra:<input type="text" name="Fecha_compra" placeholder="Fecha compra" Class="form-control mb-2" value="{{ $membresia->Fecha_compra }}">
                    Fecha vencimiento: <input type="text" name="Fecha_vencimiento" placeholder="Fecha vencimiento" Class="form-control mb-2" value="{{ $membresia->Fecha_vencimiento }}">
                    Tipo tarjeta: <input type="text" name="Tipo_tarjeta" placeholder="Tipo_tarjeta" Class="form-control mb-2" value="{{ $membresia->Tipo_tarjeta }}">
                    Numero tarjeta: <input type="text" name="Numero_tarjeta" placeholder="Numero tarjeta" Class="form-control mb-2" value="{{ $membresia->Numero_tarjeta }}">
                    Nombre tarjeta: <input type="text" name="Nombre_tarjeta" placeholder="Nombre tarjeta" Class="form-control mb-2" value="{{ $membresia->Nombre_tarjeta }}">
                    Asociado: <input type="text" name="Codigo_asociado" placeholder="Asociado" Class="form-control mb-2" value="{{ $membresia->Asociado_idAsociado }}">

                    <button class="btn btn-warning btn-block" type="submit">Editar</button>
            </form>
@endsection