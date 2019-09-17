@extends('layouts.app')



<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Producto</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
</head>
<body>
    
	@section('content')
		<h1>PRODUCTOS</h1>		

        @if(session('mensaje')) 
            <div class="alert alert-success"> 
                    {{ session('mensaje') }} 
            </div>
        @endif



                  <form action="{{route('regalias.crear') }}" method="post">
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

			<div class="container my-4">
				<table class="table" border="1">
					<thead>
						<tr>
							<th scope="col">IdProducto</th>
							<th scope="col">Codigo</th>
							<th scope="col">Tipo</th>
							<th scope="col">Nombre</th>
							<th scope="col">Descuento</th>
							<th scope="col">Precio Venta</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Catalogo</th>                            
                            <th scope="col">Acciones</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($regalias as $row)
						<tr>
							<th scope="row">{{$row->idProducto}}</th>
							<td>{{$row->Codigo}}</td>
							<td>{{$row->Tipo}}</td>
							<td>{{$row->Nombre_producto}}</td>
							<td>{{$row->Descuento}}</td>
                            <td>{{$row->Precio_venta}}</td>
                            <td>{{$row->Stock}}</td>
                            <td>{{$row->Catalogo_idCatalogo}}</td>                            
                            <td>
                              <a href="{{ route('regalias.editar', $row->idProducto) }}" class="btn btn-warning btn-sm">Editar</a>
                              <a href="{{ route('regalias.actualizar', $row->idProducto) }}" class="btn btn-warning btn-sm">Actualizar Stock</a>
                                
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
</body>
</html>