/*=============================================
ELIMINAR SUBGRUPO
=============================================*/
$(".tablas").on("click", ".btnEliminarSubgrupo", function(){

	 var idSubgrupo = $(this).attr("idSubgrupo");

	 swal({
	 	title: '¿Está seguro de borrar el subgrupo?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar subgrupo!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=subgrupos&idSub="+idSubgrupo;

	 	}

	 })

})
