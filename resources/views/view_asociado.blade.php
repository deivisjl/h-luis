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
    
		<h1>ASOCIADOS</h1>		
        @if(session('mensaje')) 
            <div class="alert alert-success"> 
                    {{ session('mensaje') }} 
            </div>
        @endif

            <form action="{{route('asociado.crear') }}" method="post">
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

                    <!--
                    <input type="text" name="Primer_nombre" placeholder="Primer Nombre" Class="form-control mb-2" value="{{ old('nombre') }}">
                    <input type="text" name="Segundo_nombre" placeholder="Segundo Nombre" Class="form-control mb-2" value="{{ old('telefono') }}">
                    <input type="text" name="Tercer_nombre" placeholder="Tercer Nombre" Class="form-control mb-2" value="{{ old('email') }}">
                    <input type="text" name="Primer_apellido" placeholder="Primer Apellido" Class="form-control mb-2" value="{{ old('direccion') }}">
                    <input type="text" name="Segundo_apellido" placeholder="Segundo Apellido" Class="form-control mb-2" value="{{ old('nit') }}">
                    <input type="text" name="Direccion" placeholder="Direccion" Class="form-control mb-2" value="{{ old('nit') }}">
                    <input type="text" name="Telefono" placeholder="Telefono" Class="form-control mb-2" value="{{ old('nit') }}">
                    <input type="text" name="Dpi" placeholder="DPI" Class="form-control mb-2" value="{{ old('nit') }}">
                    <input type="text" name="Codigo_asesor" placeholder="Codigo Asesor" Class="form-control mb-2" value="{{ old('nit') }}">
                    <input type="text" name="Pais" placeholder="Pais" Class="form-control mb-2" value="{{ old('nit') }}">

                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                -->
            </form>



			<div class="container my-4">
				<table class="table" border="1">
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Nombre</th>
							<!--<th scope="col">Segundo Nom</th>
							<th scope="col">Tercer Nom</th>
							<th scope="col">Primer Ape</th>
							<th scope="col">Segundo Ape</th>-->
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Tipo Usuario</th>
                            <!--<th scope="col">DPI</th>
                            <th scope="col">Asesor</th>-->
                            <th scope="col">Pais</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acciones</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($asociado as $row)
						<tr>
							<th scope="row">{{$row->id}}</th>
							<td>{{$row->name}}</td>
							
                            <td>{{$row->direccion}}</td>
                            <td>{{$row->telefono}}</td>
                            <td>{{$row->tipo}}</td>
                            
							<td>{{$row->pais}}</td>
                            <td>{{$row->email}}</td>
                            <td>
                              <a href="{{ route('asociado.editar', $row->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <!--
                               <form action="{{ route('asociado.eliminar', $row->id) }}" method="POST" Class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                                -->
                            </td>
						</tr>
						@endforeach()
					</tbody>
				</table>
			</div>
	@endsection		
