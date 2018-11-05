/*=============================================
ELIMINAR GRUPO
=============================================*/
$(".tablas").on("click", ".btnEliminarGrupo", function(){

	 var idGrupo = $(this).attr("idGrupo");

	 swal({
	 	title: '¿Está seguro de borrar el grupo?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar grupo!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=grupos&idGrupo="+idGrupo;

	 	}

	 })

})
