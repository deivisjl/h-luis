@extends('layouts.app')

     

@section('content')

     
<div class="container">

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

    <div class="row justify-content-center">

   <div class="col-md-8">
            <div class="card">
                      <!--<div class="card-header">MENU PRINCIPAL</div>-->
                
                        
                             
  <!--
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        
                    @endif
                    
                    Estados conectado al sistema!
                    asd
                    asdf
                    asdf
                    asdfa
                    sdf
                    asdfa
                    sdfa
                    sdf<br>
                    alsdjflksd
                </div>
                -->
            </div>
        </div>
    </div>
</div>
@endsection


