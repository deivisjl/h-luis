@extends('plantilla')

@section('seccion')
	<h1>Editar Producto  1</h1>

	<form enctype="multipart/form-data" action="{{route('producto.update',$producto->idProducto)}}" method="POST">
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
                    <input type="text" name="Codigo_catalogo" placeholder="Codigo Catalogo" Class="form-control mb-2" value="{{ $producto->Catalogo_idCatalogo }}">
                    <input type="text" name="Codigo" placeholder="Codigo" Class="form-control mb-2" value="{{ $producto->Codigo }}">
                    <input type="text" name="Tipo" placeholder="Tipo" Class="form-control mb-2" value="{{ $producto->Tipo }}">
                    <input type="text" name="Nombre_producto" placeholder="Nombre producto" Class="form-control mb-2" value="{{ $producto->Nombre_producto }}">
                    <input type="text" name="Descuento" placeholder="Descuento" Class="form-control mb-2" value="{{ $producto->Descuento }}">
                    <input type="text" name="Precio_venta" placeholder="Precio venta" Class="form-control mb-2" value="{{ $producto->Precio_venta }}">
                    <input type="text" name="Stock" placeholder="Stock" Class="form-control mb-2" value="{{ $producto->Stock }}">   
                    <input type="text" name="Descripcion" placeholder="Descripcion" Class="form-control mb-2" value="{{ $producto->Descripcion }}">                  
                       Selecciona imagen: <input accept="image/jpeg,image/png" type="file" id="foto" name="foto">     

                    <button class="btn btn-warning btn-block" type="submit">Editar</button>
            </form>
@endsection