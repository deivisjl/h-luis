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

		<h1>Catalogos</h1>		

        @if(session('mensaje')) 
            <div class="alert alert-success"> 
                    {{ session('mensaje') }} 
            </div>
        @endif
        <div><div>
            <form action="{{route('catalogo.crear') }}" method="post">
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
                    <input type="text" name="Nombre_catalogo" required="true" placeholder="Nombre Catalogo" Class="form-control mb-2" value="{{ old('Nombre_catalogo') }}">

                    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
            </form>
                </div>
            </div>

			<div class="container my-4">
				<table class="table" border="1">
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Nombre Catalogo</th>				
                            <th scope="col">Acciones</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($catalogo as $row)
						<tr>
							<th scope="row">{{$row->idCatalogo}}</th>
							<td>{{$row->Nombre_catalogo}}</td>
                            <td>
                              <a href="{{ route('catalogo.editar', $row->idCatalogo) }}" class="btn btn-warning btn-sm">Editar</a>
                                    
                               <form action="{{ route('catalogo.eliminar', $row->idCatalogo) }}" method="POST" Class="d-inline">
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
