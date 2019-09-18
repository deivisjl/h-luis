@extends('layouts.app') 
<!--<script type="text/javascript" src="{{asset('js/main.js')}}"></script>-->
@section('content')

<div class="row justify-content-center">
@if (Auth::check())
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
      <a href="{{ Route('view_membresia') }}" class="btn btn-primary">MEMBRESIA</a>
    @endif    
</div>

<center><h1><i class="fa fa-shopping-cart"></i>  Carrito de Compras</h1></center>
	<a href="{{ route('car-trash') }}" class="btn btn-danger">
		Vaciar Carrito <i class="fa fa-trash"></i>
	</a>
	@if(count($car))
	<table class="table">
		 		<thead>
		 			<tr>
		 				<th>Imagen</th>
		 				<th>Producto</th>
		 				<th>Precio</th>
		 				<th>Cantidad</th>
		 				<th>Subtotal</th>
		 				<th>Quitar</th>		 				
		 			</tr>
		 		</thead>
		 		<tbody>
		 			@foreach($car as $item)
		 				<tr>
		 					<td width="10%"><img src="/storage/{{substr($item->imagen,7)}}" style="width: 50px; display:block; margin:auto"></td>
		 					<td>{{ $item->Nombre_producto }}</td>
		 					<td>{{ ($item->Precio_venta) }}</td>

		 					<td>
		 							<input 
		 								type="number"
		 								min="1" 
		 								max="100"
		 								value="{{$item->cantidad}}"
		 								id="product_{{$item->idProducto}}"	
		 							>		 	
		 							<a 
		 								href=""
		 								class="btn btn-warning btn-update-item"
		 								data-href="{{ route('car-update', $item->idProducto)}} "
		 								data-id="{{ $item->idProducto }}"
		 							>
		 								<i class="fa fa-refresh"></i>
		 							</a>
		 					</td>
		 					<td>Q. {{ number_format($item->Precio_venta * $item->cantidad,2) }}</td>
		 					<td>
		 					<a href="{{ route('car-delete', $item->idProducto ) }}" class="btn btn-danger">
		 							<i class="fa fa-remove"></i>
		 						</a>
		 					</td>
		 				</tr>
		 			@endforeach	
		 		</tbody>
	</table>

	<hr>
	<h3><span class="label label-success">Total: Q{{ number_format($total,2) }}</span></h3>
	@else
		<h1>No hay elementos en el carrito</h1>
	@endif

	<hr>
	<center>
	<p>
		<a href="{{ route('venta_asociado_inicio') }}" class="btn btn-primary">
			<i class="fa fa-chevron-circle-left"></i> Seguir comprando 

		</a>

		<a href="{{ route('order-detail') }}" class="btn btn-primary">
			Continuar <i class="fa fa-chevron-circle-right"></i>
		</a>
	</p>
		 </center>
	@endif    

@endsection		