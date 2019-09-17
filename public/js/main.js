$(document).ready(function(){
//alert('hola5');
$(".btn-update-item").on('click', function(e){
	alert('entro al boton');
	e.preventDefault();
	var id = $(this).data('id');
	var href = $(this).data('href');
	var cantidad= $("#product_"+id).val();
	window.location.href = href + "/" + cantidad;
});
});