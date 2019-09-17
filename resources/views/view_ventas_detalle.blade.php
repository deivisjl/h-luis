@extends('layouts.app')

        <script type="text/javascript">
            $(document).ready(function(){
                    alert('hola...');
                    alert('HOLA2');
                    $(".btn btn-warning btn-update-item").on('Click', function(e){  
                        alert('entro al boton');
                        e.preventDefault();
                        var id = $(this).data('id');
                        var href = $(this).data('href');
                        var cantidad= $("#product_"+id).val();
                        window.location.href = href + "/" + cantidad;
                    });
            });
            
        </script>
    
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

		<h1>VENTAS ASOCIADO</h1>		

        @if(session('mensaje')) 
            <div class="alert alert-success"> 
                    {{ session('mensaje') }} 
            </div>
        @endif
@if(auth()->user()->tipo==1)
            <form action="{{route('venta_asociado.crear') }}" method="post">
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
                    <input type="text" name="Codigo_catalogo" placeholder="Codigo Catalogo" Class="form-control mb-2" value="{{ old('Codigo_catalogo') }}">

                    <input type="text" name="Codigo" placeholder="Codigo" Class="form-control mb-2" value="{{ old('Codigo') }}">
                    <input type="text" name="Tipo" placeholder="Tipo" Class="form-control mb-2" value="{{ old('Tipo') }}">
                    <input type="text" name="Nombre_producto" placeholder="Nombre producto" Class="form-control mb-2" value="{{ old('Nombre_producto') }}">
                    <input type="text" name="Descuento" placeholder="Descuento" Class="form-control mb-2" value="{{ old('Descuento') }}">
                    <input type="text" name="Precio_venta" placeholder="Precio venta" Class="form-control mb-2" value="{{ old('Precio_venta') }}">
                    <input type="text" name="Stock" placeholder="Stock" Class="form-control mb-2" value="{{ old('Stock') }}">                    
                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                    -->
            </form>
@endif
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
						@foreach ($ventas as $row)
						<tr>
							<th scope="row">{{$row->idVenta}}</th>
                            <td>{{$row->created_at}}</td>
                            <td>{{$row->users_id}}</td>
                            <td>{{$row->Total_venta}}</td>  

                            <td>
                            <a href="{{ route('view_compras_cliente_detalle',$row->idVenta) }}">Detalles</a>                                
                            </td>
                        
						</tr>
                    </form>
						@endforeach()
					</tbody>
				</table>
			</div>
	@endsection		
