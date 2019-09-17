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
          <a href="{{ Route('view_membresia') }}" class="btn btn-primary">MEMBRESIA</a>

      <a href="{{ Route('venta_asociado_inicio') }}" class="btn btn-primary">COMPRAR PRODUCTOS</a>
      <a href="{{ Route('view_compras_cliente') }}" class="btn btn-primary">COMPRAS REALIZADAS</a>
    @endif    
</div>  

    
		<h1>MEMBRESIA</h1>		

        @if(session('mensaje')) 
            <div class="alert alert-success"> 
                    {{ session('mensaje') }} 
            </div>
        @endif

            <form action="{{route('membresia.crear') }}" method="post">
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
               <!-- <input type="text" name="Costo" placeholder="Costo" Class="form-control mb-2" value="{{ old('Costo') }}">
                    <input type="text" name="Fecha_compra" placeholder="Fecha compra" Class="form-control mb-2" value="{{ old('Fecha_compra') }}">
                    <input type="text" name="Fecha_vencimiento" placeholder="Fecha vencimiento" Class="form-control mb-2" value="{{ old('Fecha_vencimiento') }}">
                -->
                    <input type="text" name="Tipo_tarjeta" required="true" placeholder="Tipo_tarjeta" Class="form-control mb-2" value="{{ old('Tipo_tarjeta') }}">
                    <input type="text" name="Numero_tarjeta" required="true" placeholder="Numero tarjeta" Class="form-control mb-2" value="{{ old('Numero_tarjeta') }}">
                    <input type="text" name="Nombre_tarjeta" required="true" placeholder="Nombre tarjeta" Class="form-control mb-2" value="{{ old('Nombre_tarjeta') }}">
                    <input type="text" name="Codigo_asociado" required="true" placeholder="Asociado Asesor - Default: 0" Class="form-control mb-2" value="{{ old('Codigo_asociado') }}">
            
                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                </form>

			<div class="container my-4">
				<table class="table" border="1">
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Costo</th>
							<th scope="col">Fecha_compra</th>
							<th scope="col">Fecha_vencimiento</th>
							<th scope="col">Tipo_tarjeta</th>
							<th scope="col">Numero_tarjeta</th>
                            <th scope="col">Nombre_tarjeta</th>
                            <th scope="col">Asociado</th>                            
                            <th scope="col">Acciones</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($membresia as $row)
						<tr>
							<th scope="row">{{$row->idMembresia}}</th>
							<td>{{$row->Costo}}</td>
							<td>{{$row->Fecha_compra}}</td>
							<td>{{$row->Fecha_vencimiento}}</td>
							<td>{{$row->Tipo_tarjeta}}</td>
                            <td>{{$row->Numero_tarjeta}}</td>
                            <td>{{$row->Nombre_tarjeta}}</td>
                            <td>{{$row->users_id}}</td>                            
                            <td>
                             <!-- <a href="{{ route('membresia.editar', $row->idMembresia) }}" class="btn btn-warning btn-sm">Editar</a>-->
                               
                               <form action="{{ route('membresia.eliminar', $row->idMembresia) }}" method="POST" Class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                     @php
                                        if(auth()->user()->tipo==1){      
                                         echo '<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>';
                                    
                                        }else{
                                        echo 'Sin permiso';
                                    }
                                    @endphp
                                </form>
                                
                            </td>
						</tr>
						@endforeach()
					</tbody>
				</table>
			</div>
	@endsection		
