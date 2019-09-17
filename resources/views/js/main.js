$(document).ready(function(){
alert('hola2');
$(".btn btn-warning btn-update-item").on('Click', function(e){
	e.preventDefault();
	var id = $(this).data('id');
	var href = $(this).data('href');
	var cantidad= $("#product_"+id).val();
	window.location.href = href + "/" + cantidad;
});
});