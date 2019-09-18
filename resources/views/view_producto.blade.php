@extends('layouts.app')

	@section('content')

<div class="row justify-content-center">
    @if(auth()->user()->tipo==1)
      <a href="{{ Route('view_asociado') }}" class="btn btn-primary">ASOCIADOS</a>
      <a href="{{ Route('view_catalogo') }}" class="btn btn-primary">CATALOGO</a>
      <a href="{{ Route('view_producto') }}" class="btn btn-primary">PRODUCTOS</a>
      <a href="{{ Route('view_membresia') }}" class="btn btn-primary">MEMBRESIA</a>
     <!-- <a href="#" class="btn btn-primary">BONOS</a>-->
      <a href="{{ Route('venta_detalle_inicio') }}" class="btn btn-primary">VENTAS</a>
    @else
      <a href="{{ Route('venta_asociado_inicio') }}" class="btn btn-primary">COMPRAR PRODUCTOS</a>
      <a href="{{ Route('view_compras_cliente') }}" class="btn btn-primary">COMPRAS REALIZADAS</a>
    @endif    
</div>  

		<h1>PRODUCTOS</h1>		

        @if(session('mensaje')) 
            <div class="alert alert-success"> 
                    {{ session('mensaje') }} 
            </div>
        @endif



                  <form enctype="multipart/form-data" action="{{route('producto.crear') }}" method="post">
                    @csrf
                    <!--
                    @error('nombre')
                        <div class='alert alert-danger'>
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
                    <!--<input type="text" name="Codigo_catalogo" placeholder="Codigo Catalogo" Class="form-control mb-2" value="{{ old('Codigo_catalogo') }}">-->
                      <label>Catálogo:</label>
                        <select id="Codigo_catalogo"  name="Codigo_catalogo" class="form-control">
                            @foreach ($catalogo as $s)
                            <option value="{{ $s->idCatalogo }}">{{ $s->idCatalogo}} {{ $s->Nombre_catalogo  }}</option>
                            @endforeach
                        </select>
                        <label>Codigo Producto:</label>
                    <input type="text" name="Codigo" required="true" placeholder="Codigo" Class="form-control mb-2" value="{{ old('Codigo') }}">
                    <input type="text" name="Tipo" required="true" placeholder="Tipo" Class="form-control mb-2" value="{{ old('Tipo') }}">
                    <input type="text" name="Nombre_producto" required="true" placeholder="Nombre producto" Class="form-control mb-2" value="{{ old('Nombre_producto') }}">
                    <!--
                    <input type="text" name="Descuento" placeholder="Descuento" Class="form-control mb-2" value="{{ old('Descuento') }}">
                    -->
                    <input type="text" name="Precio_venta" required="true" placeholder="Precio venta" Class="form-control mb-2" value="{{ old('Precio_venta') }}">
                    <input type="text" name="Stock" required="true" placeholder="Stock" Class="form-control mb-2" value="{{ old('Stock') }}">
                    <input type="text" name="Descripcion" required="true" placeholder="Descripcion" Class="form-control mb-2" value="{{ old('Descripcion') }}">                
                    Selecciona imagen: <input accept="image/jpeg,image/png" required="true" type="file" id="foto" name="foto">    
                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
            </form>

			<div class="container my-4">
				<table class="table" border="1">
					<thead>
						<tr>
							<th scope="col">IdProducto</th>
							<th scope="col">Codigo</th>
							<th scope="col">Tipo</th>
							<th scope="col">Nombre</th>
							<!--<th scope="col">Descuento</th>-->
							<th scope="col">Precio Venta</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Catalogo</th>                            
                            <th scope="col">Descripcion</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Acciones</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($producto as $row)
						<tr>
							<th scope="row">{{$row->idProducto}}</th>
							<td>{{$row->Codigo}}</td>
							<td>{{$row->Tipo}}</td>
							<td>{{$row->Nombre_producto}}</td>
							<!--<td>{{$row->Descuento}}</td>-->
                            <td>{{$row->Precio_venta}}</td>
                            <td>{{$row->Stock}}</td>
                            <td>{{$row->Catalogo_idCatalogo}}</td>
                            <td>{{$row->Descripcion}}</td>                            
                            <td><img width="80%" src="{{ \Storage::url($row->imagen) }}"></td>
                            <td>
                              <a href="{{ route('producto.editar', $row->idProducto) }}" class="btn btn-warning btn-sm">Editar</a>
                              <a href="{{ route('producto.actualizar', $row->idProducto) }}" class="btn btn-warning btn-sm">Actualizar Stock</a>
                                
                               <form action="{{ route('producto.eliminar', $row->idProducto) }}" method="POST" Class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                                
                            </td>
						</tr>
						@endforeach()
					</tbody>
				</table>
			</div>
	@endsection		
