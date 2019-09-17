@extends('vistas_dashboard.plantilla_menu_encabezado')


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


