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

		<h1>COMPRAS ASOCIADO</h1>		

			<div class="container my-4">
				<table class="table" border="1">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Fecha Compra</th>
							<th scope="col">Usuario</th>
							<th scope="col">Total_venta</th>							
                            <th scope="col">Acciones</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($compras as $row)
						<tr>
							<th scope="row">{{$row->idVenta}}</th>
							<td>{{$row->created_at}}</td>
							<td>{{$row->users_id}}</td>
							<td>{{$row->Total_venta}}</td>						
                            <td><a href="{{ route('view_compras_cliente_detalle',$row->idVenta) }}">Detalles</a></td>                                                      
						</tr>                    
						@endforeach()
					</tbody>
				</table>
			</div>
	@endsection		
