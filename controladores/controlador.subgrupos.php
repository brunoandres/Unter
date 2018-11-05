<?php

//CONTROLADOR ENCARGADO DE MANEJAR SUBGRUPOS
class ControladorSubgrupos
{
	 //FUNCION PARA CREAR UNA NUEVO SUBGRUPO
    public function ctrCrearSubGrupo(){

      if(isset($_POST["btnFormNuevoSubGrupo"])){

        //VALIDA LOS CAMPOS PARA QUE NO INGRESEN CARACTERES ESPECIALES O VAYAN VACIOS
        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreSubGrupo"]))
	    {


        //ARCHIVOS MULTIPLES
        $total = count($_FILES['adjuntos']['name']);

        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {

          //Get the temp file path
          $tmpFilePath = $_FILES['adjuntos']['tmp_name'][$i];

          //Make sure we have a file path
          if ($tmpFilePath != ""){
            $adjunto = 1;
            //Setup our new file path
            $newFilePath = "./archivos/" . $_FILES['adjuntos']['name'][$i];

            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {

              //Handle other code here

            }
          }else {
            $adjunto = 0 ;
          }
        }
        //valor que toma del check para el estado del grupo
        if (empty($_POST['estadoSubGrupo'])) {
          $estadoSubGrupo = 0;
        }else {
          $estadoSubGrupo = $_POST['estadoSubGrupo'];
        }

        //valor que toma del check para el estado del grupo
        if (empty($_POST['individualSubGrupo'])) {
          $individualSubGrupo = 0;
        }else {
          $individualSubGrupo = $_POST['individualSubGrupo'];
        }

           $query = ModeloSubGrupos::mdlGuardarSubGrupo($_POST["selectGrupo"],$_POST["nombreSubGrupo"],$_POST["descripcionSubGrupo"],$estadoSubGrupo,$individualSubGrupo,$_POST["asuntoSubGrupo"],$_POST["cuerpoSubGrupo"],$adjunto,$_POST['dropbox']);

           if ($query==true) {
             echo'<script>

					swal({
						  type: "success",
						  title: "Subgrupo guardado correctamente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "subgrupos";

									}
								})

					</script>';
           }else {
             echo'<script>

   					swal({
   						  type: "error",
   						  title: "¡Error al guardar!",
   						  showConfirmButton: true,
   						  confirmButtonText: "Cerrar"
   						  }).then(function(result){

   						})

   			  	</script>';
          }

        }else {
          echo'<script>

					swal({
						  type: "error",
						  title: "¡Los campos no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
						})

			  	</script>';
        }
      }

    }

    //FUNCION PARA EDITAR GRUPO
    public function ctrEditarSubGrupo(){

      if(isset($_POST["btnFormEditarSubGrupo"])){

        //VALIDA LOS CAMPOS PARA QUE NO INGRESEN CARACTERES ESPECIALES O VAYAN VACIOS
        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreSubGrupo"])){

        //ARCHIVOS MULTIPLES
        $total = count($_FILES['adjuntos']['name']);

        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {

          //Get the temp file path
          $tmpFilePath = $_FILES['adjuntos']['tmp_name'][$i];

          //Make sure we have a file path
          if ($tmpFilePath != ""){
            $adjunto = 1;
            //Setup our new file path
            $newFilePath = "./archivos/" . $_FILES['adjuntos']['name'][$i];

            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $newFilePath)) {

              //Handle other code here

            }
          }else {
            $adjunto = 0 ;
          }
        }
        //valor que toma del check para el estado del grupo
        if (empty($_POST['estadoSubGrupo'])) {
          $estadoSubGrupo = 0;
        }else {
          $estadoSubGrupo = $_POST['estadoSubGrupo'];
        }

        //valor que toma del check para el estado del grupo
        if (empty($_POST['individualSubGrupo'])) {
          $individualSubGrupo = 0;
        }else {
          $individualSubGrupo = $_POST['individualSubGrupo'];
        }

           $query = ModeloSubGrupos::mdlEditarSubGrupo($_POST["selectGrupo"],$_POST["nombreSubGrupo"],$_POST["descripcionSubGrupo"],$estadoSubGrupo,$individualSubGrupo,$_POST["asuntoSubGrupo"],$_POST["cuerpoSubGrupo"],$adjunto,$_POST['dropbox'],$_POST['idSub']);

           if ($query==true) {
             echo'<script>

					swal({
						  type: "success",
						  title: "Subgrupo editado correctamente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "subgrupos";

									}
								})

					</script>';
           }else {
             echo'<script>

   					swal({
   						  type: "error",
   						  title: "¡Error al editar!",
   						  showConfirmButton: true,
   						  confirmButtonText: "Cerrar"
   						  }).then(function(result){

   						})

   			  	</script>';
          }

        }else {
          echo'<script>

					swal({
						  type: "error",
						  title: "¡Los campos no pueden ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
						})

			  	</script>';
        }
      }

    }

    //TRAE TODOS LOS GRUPOS
    public function ctrMostrarSubGrupos(){

      $subgrupos = ModeloSubGrupos::mdlObtenerSubGrupos();
      return $subgrupos;

    }

    //FUNCION PARA RECORRER DATOS A EDITAR
    public function ctrMostrarDatosSubGrupos($id){

      $datos = ModeloSubGrupos::mdlObtenerDatosSubGrupos($id);
      return $datos;

    }

    //TRAE TODOS LOS SUBGRUPOS TOTAL
    public function ctrMostrarSubGruposCant(){

      $subgrupos = ModeloSubGrupos::mdlObtenerSubGruposCant();
      return $subgrupos;

    }

    //FUNCION PARA BORAR SUBGRUPO
    public function ctrBorrarSubGrupo(){

		if(isset($_GET["idSub"])){

			$id = $_GET["idSub"];

			$respuesta = ModeloSubGrupos::mdlBorrarSubGrupo($id);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El subgrupo ha sido eliminado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "subgrupos";

									}
								})

					</script>';
			}else {
        echo'<script>

       swal({
           type: "error",
           title: "¡Error al eliminar Subgrupo!",
           showConfirmButton: true,
           confirmButtonText: "Cerrar"
           }).then(function(result){

         })

       </script>';
      }
		}

	}
}

?>
