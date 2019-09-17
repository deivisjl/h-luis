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
      <a href="{{ Route('view_membresia') }}" class="btn btn-primary">MEMBRESIA</a>
      <a href="{{ Route('venta_asociado_inicio') }}" class="btn btn-primary">COMPRAR PRODUCTOS</a>
      <a href="{{ Route('view_compras_cliente') }}" class="btn btn-primary">COMPRAS REALIZADAS</a>

    @endif    

</div>




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
                    <input type="text" name="Codigo_catalogo" placeholder="Codigo Catalogo" Class="form-control mb-2" value="{{ old('Codigo_catalogo') }}">

                    <input type="text" name="Codigo" placeholder="Codigo" Class="form-control mb-2" value="{{ old('Codigo') }}">
                    <input type="text" name="Tipo" placeholder="Tipo" Class="form-control mb-2" value="{{ old('Tipo') }}">
                    <input type="text" name="Nombre_producto" placeholder="Nombre producto" Class="form-control mb-2" value="{{ old('Nombre_producto') }}">
                    <input type="text" name="Descuento" placeholder="Descuento" Class="form-control mb-2" value="{{ old('Descuento') }}">
                    <input type="text" name="Precio_venta" placeholder="Precio venta" Class="form-control mb-2" value="{{ old('Precio_venta') }}">
                    <input type="text" name="Stock" placeholder="Stock" Class="form-control mb-2" value="{{ old('Stock') }}">                    
                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
            </form>
@endif
			<div class="container my-4">
                
                <center><h1><i class="fa fa-shopping-cart"></i>  Carrito de Compras</h1></center>

                <center><a href="{{ route('car-show') }}" class="btn btn-warning btn-sm"><i class="fa fa-shopping-cart"></i>Ver carrito</a></center>
				<table class="table" border="1">
                    <!--
					<thead>
						<tr>
							<td scope="col">
                            idProducto
                            </td>
							<th scope="col">Codigo</th>
							<th scope="col">Tipo</th>
							<th scope="col">Nombre</th>
							<th scope="col">Descuento</th>
							<th scope="col">Precio Venta</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Catalogo</th>                            
                            <th scope="col">Imagen</th>
                            <th scope="col">Acciones</th>
						</tr>
					</thead>
-->
					<tbody>

                                @php
                                    $count=1;
                                @endphp
						@foreach ($catalogo as $row)
                                      @php                            
                                        if($count==1){
                                           echo "<tr>";
                                        }
                                      @endphp

                             @if($count<5)        						
                                    <td>
                                            <center><img width="60%" src="/storage/{{substr($row->imagen,7)}}"></center>                       
                                            <br>Nombre: {{$row->Nombre_producto}}
                                            <br>
                                            <br>Descripción: {{$row->Descripcion}}
                                            <br>
                                            <br><center>Precio: Q{{ number_format($row->Precio_venta,2) }}</center>
                                            <br><br>
                                            <center><i class="fa fa-shopping-cart"></i> <a href="{{ route('car-add', $row->idProducto) }}" class="btn btn-warning btn-sm">Agregar al Carrito</a></center>
                                    </td> 
                                    @php
                                        $count=$count+1;                            
                                    @endphp
                            @else
                                </tr>
                                <tr>
                                    <td>
                                            <center><img width="60%" src="/storage/{{substr($row->imagen,7)}}"></center>                       
                                            <br>Nombre: {{$row->Nombre_producto}}
                                            <br>
                                            <br>Descripción: {{$row->Descripcion}}
                                            <br>
                                            <br><center>Precio: Q{{ number_format($row->Precio_venta,2) }}</center>

                                            <br><br>
                                            <center><i class="fa fa-shopping-cart"></i> <a href="{{ route('car-add', $row->idProducto) }}" class="btn btn-warning btn-sm">Agregar al Carrito</a></center>
                                    </td> 
                                    @php
                                        $count=2;
                                    @endphp
                            @endif        
				        @endforeach()  
                    </form>
						
					</tbody>
				</table>
			</div>
	@endsection		