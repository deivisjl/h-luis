@extends('plantilla_menu_encabezado')


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


      <div class="container my-4">
        <table class="table" border="1">
          <thead>
            <tr>
              <th scope="col">idProducto</th>
              <th scope="col">Codigo</th>
              <th scope="col">Tipo</th>
              <th scope="col">Nombre</th>
              <th scope="col">Descuento</th>
              <th scope="col">Precio Venta</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Catalogo</th>                            
                            <th scope="col">Unidades Comprar</th>
                            <th scope="col">Acciones</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($catalogo as $row)
            <tr>
              <th scope="row">{{$row->idProducto}}</th>
              <td>{{$row->Codigo}}</td>
              <td>{{$row->Tipo}}</td>
              <td>{{$row->Nombre_producto}}</td>
              <td>{{$row->Descuento}}</td>
                            <td>{{$row->Precio_venta}}</td>
                            <td>{{$row->Stock}}</td>
                            <td>{{$row->Catalogo_idCatalogo}}</td>                            
                            <form action="{{ route('venta_asociado.agregar',$row->idProducto) }}">
                            <td><input type="text" name="cantidad_comprar"></td>
                            
                            <td>
                            <!--
                                <button class="btn btn-warning btn-sm" name="agregar" id="agregar" type="submit">Agregar al carrito</button>
                            
                                
                                   <button class="btn btn-danger btn-sm" name="quitar" id="quitar" type="submit">Quitar del carrito</button>
                               -->                                                                           
                              <a href="{{ route('car-add', $row->idProducto) }}" class="btn btn-warning btn-sm">Agregar al Carrito</a>
                              <a href="{{ route('venta_asociado.quitar', $row->idProducto) }}" class="btn btn-danger btn-sm">Quitar del Carrito</a>                                                              
                             </form>
                           <!--
                               <form action="{{ route('venta_asociado.agregar', $row->idProducto) }}" method="POST" Class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Quitar del carrito</button>
                                </form>                                
                            -->
                            </td>
                        
            </tr>
                    </form>
            @endforeach()
          </tbody>
        </table>
      </div>

@endsection


