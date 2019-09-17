@extends('plantilla')

@section('seccion')
	<h1>Actualizar Producto  1</h1>

	<form action="{{route('producto.actualizar2')}}" method="POST">
                   	@method('PUT')

                    @csrf
 <!--

                     @if(session('mensaje')) 
                            <div class="alert alert-success"> 
                                    {{ session('mensaje') }} 
                            </div>
                        @endif
               
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
                    <input type="number" name="cantidad_stock" placeholder="Cantidad a agregar" Class="form-control mb-2">
                    
                    <button class="btn btn-warning btn-block" type="submit">Actualizar</button>
            </form>
@endsection