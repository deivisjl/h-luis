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


		<div class="container text-center">
			<div class="page-header">
					<h1><i class="fa fa-shopping-cart">Detalle del producto</i></h1>
			</div>
			
			<div class="page">
					<div class="table-responsive">
						<h3>Datos del usuario</h3>	
						<table class="table table-striped table-hover table-bordered">
							<tr><td>ID:</td><td>{{ Auth::user()->id}}</td></tr>
							<tr><td>Nombre:</td><td>{{ Auth::user()->name}}</td></tr>
							<tr><td>Correo:</td><td>{{ Auth::user()->email }}</td></tr>			
						</table>
					</div>
			</div>

			<div class="table-responsive">
				<h3>Datos del pedido</h3>
				<table class="table table-striped table-hover table-bordered">
					<tr>
						<th>Producto</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
					</tr>
					@foreach($car as $item)
						<tr>
							<td>{{ $item->Nombre_producto }}</td>
							<td>${{ number_format($item->Precio_venta,2) }}</td>
							<td>{{ $item->cantidad }}</td>
							<td>${{ number_format($item->Precio_venta * $item->cantidad,2) }}</td>

						</tr>
					@endforeach
				</table>
				<hr>
				<h3>
					<span class="label label-success">
						Total: ${{ number_format($total,2) }}
					</span>
				</h3>

				<hr>
					<a href="{{ route('car-show') }}" class="btn btn-primary">
						<i class="fa fa-chevron-circle-left"></i> Regresar
					</a>
					<a href="#" class="btn btn-warning">
						Pagar con <i class="fa fa-paypal fa-2x"></i>
					</a>

					<a href="{{ route('pagar') }}" class="btn btn-primary">
						Finalizar Compra <i class="fa fa-chevron-circle-right"></i>
					</a>
			</div>

		</div>


	@endsection		
