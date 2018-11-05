/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarMail", function(){

	 var idMail = $(this).attr("idMail");

	 swal({
	 	title: '¿Está seguro de borrar el mail?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar mail!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=mails&idMail="+idMail;

	 	}

	 })

})
