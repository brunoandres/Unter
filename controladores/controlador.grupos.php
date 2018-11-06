<?php

//CONTROLADOR ENCARGADO DE MANEJAR GRUPOS
class ControladorGrupos
{
	 //FUNCION PARA CREAR UNA NUEVA AREA
    public function ctrCrearGrupo(){

      if(isset($_POST["btnFormNuevoGrupo"])){

        //VALIDA LOS CAMPOS PARA QUE NO INGRESEN CARACTERES ESPECIALES
        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreGrupo"])&&
             preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionGrupo"])&&
                  preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["asuntoGrupo"])){

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

              //el grupo no tiene adjuntos
              $adjunto = 0 ;
            }
          }

          //valor que toma del check para el estado del grupo
          if (empty($_POST['estadoGrupo'])) {
            $estadoGrupo = 0;
          }else {
            $estadoGrupo = $_POST['estadoGrupo'];
          }

          $query = ModeloGrupos::mdlGuardarGrupo($_POST["nombreGrupo"],$_POST["descripcionGrupo"],$_POST['estadoGrupo'],$_POST["asuntoGrupo"],$_POST["cuerpoGrupo"],$adjunto,$_POST['dropbox']);

          if ($query==true) {

            echo'<script>

         swal({
             type: "success",
             title: "Grupo guardado correctamente!",
             showConfirmButton: true,
             confirmButtonText: "Cerrar"
             }).then(function(result){
                 if (result.value) {

                 window.location = "grupos";

                 }
               })

         </script>';

          }else {

            echo'<script>

           swal({
               type: "error",
               title: "¡Error al guardar Grupo!",
               showConfirmButton: true,
               confirmButtonText: "Cerrar"
               }).then(function(result){

             })

           </script>';
          }

        }else {
          //preg_match
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

        //isset
      }

      //function
    }

    //FUNCION PARA SETEAR EL ENVIO CON VALOR 1
    public function ctrSetearEnvio($id){

      $query = ModeloGrupos::mdlSetearEnvio($id);

    }

    //FUNCION PARA SETEAR EL ENVIO CON VALOR 0
    public function ctrActivarEnvio($id){

      $query = ModeloGrupos::mdlActivarEnvio($id);

      if ($query==true) {

        echo'<script>

     swal({
         type: "success",
         title: "Envio activado correctamente!",
         showConfirmButton: true,
         confirmButtonText: "Cerrar"
         }).then(function(result){
             if (result.value) {

             window.location = "grupos";

             }
           })

     </script>';

    }else {

      echo'<script>

     swal({
         type: "error",
         title: "¡Error al activar Envio!",
         showConfirmButton: true,
         confirmButtonText: "Cerrar"
         }).then(function(result){

       })

     </script>';
    }
  }
    //FUNCION PARA EDITAR GRUPO
    public function ctrEditarGrupo(){

      if(isset($_POST["btnFormEditarGrupo"])){

        //VALIDA LOS CAMPOS PARA QUE NO INGRESEN CARACTERES ESPECIALES
        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreGrupo"])&&
             preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionGrupo"])&&
                  preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["asuntoGrupo"])){

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

                //el grupo no tiene adjuntos
                $adjunto = 0 ;
              }
            }

            //valor que toma del check para el estado del grupo
            if (empty($_POST['estadoGrupo'])) {
              $estadoGrupo = 0;
            }else {
              $estadoGrupo = $_POST['estadoGrupo'];
            }


           $query = ModeloGrupos::mdlEditarGrupo($_POST["nombreGrupo"],$_POST["descripcionGrupo"],$estadoGrupo,$_POST["asuntoGrupo"],$_POST["cuerpoGrupo"],$adjunto,$_POST['dropbox'],$_POST["idGrupo"]);

           if ($query==true) {

             echo'<script>

          swal({
              type: "success",
              title: "Grupo editado correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then(function(result){
                  if (result.value) {

                  window.location = "grupos";

                  }
                })

          </script>';
           }else {
             echo'<script>

            swal({
                type: "error",
                title: "¡Error al editar Grupo!",
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
    public function ctrMostrarGrupos(){

      $grupos = ModeloGrupos::mdlObtenerGrupos();
      return $grupos;

    }

    //TRAE TODOS LOS GRUPOS TOTAL
    public function ctrMostrarGruposCant(){

      $grupos = ModeloGrupos::mdlObtenerGruposCant();
      return $grupos;

    }

    //FUNCION PARA EDITAR DATOS DE UN GRUPO
    public function ctrMostrarDatosGrupos($id){

      $datos = ModeloGrupos::mdlObtenerDatosGrupos($id);
      return $datos;

    }

    //FUNCION PARA BORAR GRUPO
    public function ctrBorrarGrupo(){

		if(isset($_GET["idGrupo"])){

			$id = $_GET["idGrupo"];

			$respuesta = ModeloGrupos::mdlBorrarGrupo($id);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El grupo ha sido eliminado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "grupos";

									}
								})

					</script>';
			}else {
        echo'<script>

       swal({
           type: "error",
           title: "¡Error al eliminar Grupo!",
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
