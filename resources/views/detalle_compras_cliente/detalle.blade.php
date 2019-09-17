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


        <h1>
            Detalle compra
        </h1>
        @if($tipoUsuario==1)
                    <table class="table"> 
                    <th>ID_VENTA</th>
                    <th>TIPO</th>
                    <th>ID_PRODUCTO</th>
                    <th>PRODUCTO</th>
                    <th>UNIDADES</th>
                    <th>PRECIO_VENTA</th>
                    <th>TOTAL</th>
                    <th>ACCIONES</th>
                        @foreach($compras as $item)
                            <tr>
                                <td>{{ $item->idDetalle_venta}}</td>
                                <td>{{ $item->Tipo}}</td>
                                <td>{{ $item->Producto_idProducto}}</td>
                                <td>{{ $item->Nombre_producto}}</td>
                                <td>{{ $item->Unidades}}</td>
                                <td>{{ $item->Precio_venta}}</td>
                                <td>{{ $item->Total_venta}}</td>
                                <td><a href="{{ route('ventas_detalle.eliminar', $item->idDetalle_venta) }}" class="btn btn-warning btn-sm">Eliminar2</a></td>
                            </tr>        
                        @endforeach
                </table>

        @else
                <table class="table"> 
                    <th>ID_VENTA</th>
                    <th>TIPO</th>
                    <th>ID_PRODUCTO</th>
                    <th>PRODUCTO</th>
                    <th>UNIDADES</th>
                    <th>PRECIO_VENTA</th>
                    <th>TOTAL</th>
                        @foreach($compras as $item)
                            <tr>
                                <td>{{ $item->idDetalle_venta}}</td>
                                <td>{{ $item->Tipo}}</td>
                                <td>{{ $item->Producto_idProducto}}</td>
                                <td>{{ $item->Nombre_producto}}</td>
                                <td>{{ $item->Unidades}}</td>
                                <td>{{ $item->Precio_venta}}</td>
                                <td>{{ $item->Total_venta}}</td>
                            </tr>        
                        @endforeach
                </table>
               
        @endif
	@endsection		
