<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');
});
*/


Route::bind('producto', function($id){	
	return App\ProductoModelo::where('idProducto',$id)->first();
});



Route::get('/', function () {
    return view('welcome');
});

//rutas con parametros obligatorios
Route::get('fotoss/{numero}',function($numero){
	return 'Estas viendo la foto ' .$numero;
})->where('numero','[0-9]+');

//rutas con parametros opcionales
Route::get('fotoss/{numero?}', function($numero='sin numero'){
	return 'Tu ruta no tiene parametros';
});

Route::get('fotoss/animales/{numero?}',function($numero='sin numero'){
	return 'Estas viendo el animal # : '.$numero;
});

Route::get('galeria',function(){
	return view('fotos');
});

Route::get('fotos',function(){
	return view('fotos');
})->name('foto');

Route::get('blog',function(){
	return view('blog');
})->name('noticias');


Route::get('nosotros/{nombre?}',function($nombre=null){
	$equipo=['ignacio','jose','jorge','antonio','guiro'];
	//return view('nosotros',['equipo'=>$equipo]);
	return view('nosotros',compact('equipo','nombre'));
})->name('nosotros');

//rutas ASOCIADO

Route::get('view_asociado','AsociadoController@inicio')->name('view_asociado');

//Route::get('view_proveedor','ProveedoresController@inicio');//{

Route::post('asociado/','AsociadoController@crearAsociado')->name('asociado.crear');

Route::get('asociado/editar/{id}','AsociadoController@editar')->name('asociado.editar');

Route::put('asociado/editar/{id}','AsociadoController@update')->name('asociado.update');

Route::DELETE('/eliminarAsociado/{id}','AsociadoController@eliminar')->name('asociado.eliminar');
//fin rutas ASOCIADO


//rutas CATALOGO

Route::get('view_catalogo','CatalogoController@inicio')->name('view_catalogo');

//Route::get('view_proveedor','ProveedoresController@inicio');//{

Route::post('catalogo/','CatalogoController@crearCatalogo')->name('catalogo.crear');

Route::get('catalogo/editar/{id}','CatalogoController@editar')->name('catalogo.editar');

Route::put('catalogo/editar/{id}','CatalogoController@update')->name('catalogo.update');

Route::DELETE('/eliminarCatalogo/{id}','CatalogoController@eliminar')->name('catalogo.eliminar');
//fin rutas CATALOGO

//rutas PRODUCTO

Route::get('view_producto','ProductoController@inicio')->name('view_producto');

Route::get('view_producto_actualizar/{id}','ProductoController@actualizar')->name('producto.actualizar');
Route::put('view_producto_actualizar2','ProductoController@actualizar2')->name('producto.actualizar2');


//vista para mostarr al cliente sin iniciar sesion
Route::get('vista_productos','VistaProductoClienteController@inicio')->name('vista_productos');
//fin mostarr al cliente 


//Route::get('view_proveedor','ProveedoresController@inicio');//{

Route::post('producto/','ProductoController@crearProducto')->name('producto.crear');

Route::get('producto/editar/{id}','ProductoController@editar')->name('producto.editar');

Route::put('producto/editar/{id}','ProductoController@update')->name('producto.update');

Route::DELETE('/eliminarProducto/{id}','ProductoController@eliminar')->name('producto.eliminar');
//fin rutas PRODUCTO

//rutas MEMBRESIA

Route::get('view_membresia','MembresiaController@inicio')->name('view_membresia');

//Route::get('view_proveedor','ProveedoresController@inicio');//{

Route::post('membresia/','MembresiaController@crearMembresia')->name('membresia.crear');

Route::get('membresia/editar/{id}','MembresiaController@editar')->name('membresia.editar');

Route::put('membresia/editar/{id}','MembresiaController@update')->name('membresia.update');

Route::DELETE('/eliminarMembresia/{id}','MembresiaController@eliminar')->name('membresia.eliminar');
//fin rutas MEMBRESIA


//rutas REGALIAS

Route::get('view_regalias','RegaliasController@inicio')->name('view_regalias');

//Route::get('view_proveedor','ProveedoresController@inicio');//{

Route::post('regalias/','RegaliasController@crearRegalia')->name('regalias.crear');

Route::get('regalias/editar/{id}','RegaliasController@editar')->name('regalias.editar');

Route::put('regalias/editar/{id}','RegaliasController@update')->name('regalias.update');

Route::DELETE('/eliminarRegalias/{id}','RegaliasController@eliminar')->name('regalias.eliminar');
//fin rutas REGALIAS

//rutas ventas asociado



Route::get('view_ventas_asociado','VentasAsociadoController@inicio')->name('venta_asociado_inicio');

//Route::get('view_proveedor','ProveedoresController@inicio');//{

Route::post('venta_asociado/','VentasAsociadoController@crearMembresia')->name('venta_asociado.crear');

Route::get('venta_asociado/editar/{id}','VentasAsociadoController@editar')->name('venta_asociado.editar');

Route::put('venta_asociado/editar/{id}','VentasAsociadoController@update')->name('venta_asociado.update');

Route::DELETE('/eliminarVenta_asociado/{id}','VentasAsociadoController@eliminar')->name('venta_asociado.eliminar');

Route::get('car/show',[
	'as' => 'car-show',
	'uses' => 'VentasAsociadoController@show'
]);

Route::get('car/add/{id}',[
	'as' => 'car-add',
	'uses' => 'VentasAsociadoController@agregar'
]);

Route::get('car/delete/{id}',[
	'as' => 'car-delete',
	'uses' => 'VentasAsociadoController@delete'
]);

Route::get('car/trash',[
	'as' => 'car-trash',
	'uses' => 'VentasAsociadoController@trash'
]);


Route::get('car/update/{producto}/{cantidad?}',[
	'as' => 'car-update',
	'uses' => 'VentasAsociadoController@update'
]);


Route::get('order-detail',[
	'middleware'=>'auth',
	'as' => 'order-detail',
	'uses' => 'VentasAsociadoController@orderDetail'
]);

Route::get('agregar_carrito/{id}','VentasAsociadoController@agregar')->name('venta_asociado.agregar');
Route::get('quitar_carrito/{id}','VentasAsociadoController@quitar')->name('venta_asociado.quitar');

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('car/pagar/',[
	'as' => 'pagar',
	'uses'=>'VentasAsociadoController@pagar'
]);


Route::get('/home', 'HomeController@index')->name('home');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');




//detalles de ventas para el usuario de tipo administrador
Route::get('view_ventas_detalle','VentasDetalleController@inicio')->name('venta_detalle_inicio');

//Route::get('view_proveedor','ProveedoresController@inicio');//{

Route::post('venta_detalle/','VentasAsociadoController@crearMembresia')->name('ventas_detalle.crear');

Route::get('venta_detalle/editar/{id}','VentasAsociadoController@editar')->name('ventas_detalle.editar');

Route::put('venta_detalle/editar/{id}','VentasAsociadoController@update')->name('ventas_detalle.update');

Route::get('/eliminarVenta_detalle/{id?}','VentasDetalleController@eliminar')->name('ventas_detalle.eliminar');




//rutas para la vista de compras del cliente para el suario tipo cliente

Route::get('view_compras_cliente','ComprasClienteController@inicio')->name('view_compras_cliente');


//rutas para la vista detalles de compras del cliente para el usuario tipo cliente
Route::get('view_compras_cliente_detalle/{id}','ComprasClienteController@detalle')->name('view_compras_cliente_detalle');




