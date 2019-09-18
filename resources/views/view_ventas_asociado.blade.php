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
        <hr>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{ route('car-show') }}" class="btn btn-success"><i class="fa fa-shopping-cart"></i>Ver carrito</a>
            </div>
        </div>
<hr>
        <div class="container">
            
            <div class="row">
                @foreach($catalogo as $item)
                    <div class="col-md-3" style="margin-left: 10px">
                        <div class="card" style="width: 18rem;">
                          <img src="{{ \Storage::url($item->imagen) }}" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">Nombre: {{$item->Nombre_producto}}</h5>
                            <p class="card-text">Descripción: {{$item->Descripcion}}</p>
                            <a href="{{ route('car-add', $item->idProducto) }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Agregar al Carrito </a>
                          </div>
                        </div>
                    </div>
                @endforeach()
                </div>
        </div>
	@endsection		

    @section('js')
     <script type="text/javascript">
            $(document).ready(function(){
                    
                    $(".btn btn-warning btn-update-item").on('Click', function(e){  
                       
                        e.preventDefault();
                        var id = $(this).data('id');
                        var href = $(this).data('href');
                        var cantidad= $("#product_"+id).val();
                        window.location.href = href + "/" + cantidad;
                    });
            });
            
        </script>
    @endsection