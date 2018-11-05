<?php

//CONTROLADOR ENCARGADO DE MANEJAR GRUPOS
class ControladorMails
{
	 //FUNCION PARA CREAR UNA NUEVO MAIL
    public function ctrCrearMail(){

      if(isset($_POST["btnFormNuevoMail"])){

        //VALIDA LOS CAMPOS PARA QUE NO INGRESEN CARACTERES ESPECIALES O VAYAN VACIOS
        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombrePersona"])){

            //valor que toma del check para el estado del grupo
            if (empty($_POST['estadoMail'])) {
              $estadoMail = 0;
            }else {
              $estadoMail = $_POST['estadoMail'];
            }

            $email = strtolower($_POST['nombreMail']);

            $explode  = explode("@",$email);

            $extension = strtolower(pathinfo($_POST['nombreMail'], PATHINFO_EXTENSION));

            switch ($extension) {
              case 'com':
                $ext = '.com';
                break;
              case 'net':
                $ext = '.net';
                break;
              case 'org':
                $ext = '.org';
                break;
            }
            

            $dominio = explode($ext, $explode[1]);

            $dominio = strtoupper($dominio[0]);

            $query = ModeloMails::mdlGuardarMail($_POST["nombrePersona"],$email,$dominio,$estadoMail);

            if ($query) {
              foreach ($_POST['selectSubGrupo'] as $value) {
                $query1 = ModeloMails::mdlGuardarMailSubgrupo($query,$value);
              }
            }

            if ($query1) {
             echo'<script>

					swal({
						  type: "success",
						  title: "Mail guardado correctamente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "mails";

									}
								})

					</script>';
           }else {
             echo'<script>

   					swal({
   						  type: "error",
   						  title: "¡Error al guardar el mail!",
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

    //FUNCION PARA EDITAR MAIL
    public function ctrEditarMail(){

      if(isset($_POST["btnFormEditarMail"])){

        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombrePersona"])){

          //valor que toma del check para el estado del grupo
          if (empty($_POST['estadoMail'])) {
            $estadoMail = 0;
          }else {
            $estadoMail = $_POST['estadoMail'];
          }

          $email = strtolower($_POST['nombreMail']);

          $explode  = explode("@",$email);

          $extension = strtolower(pathinfo($_POST['nombreMail'], PATHINFO_EXTENSION));

          switch ($extension) {
            case 'com':
              $ext = '.com';
              break;
            case 'net':
              $ext = '.net';
              break;
            case 'org':
              $ext = '.org';
              break;
          }
            

          $dominio = explode($ext, $explode[1]);

          $dominio = strtoupper($dominio[0]);

          $query = ModeloMails::mdlEditarMail($_POST["nombrePersona"], $email,$dominio,$estadoMail,$_POST['idMail']);

           if ($query==true) {

             echo'<script>

             swal({
    type: "success",
    title: "¡El mail ha sido editado correctamente!",
    showConfirmButton: true,
    confirmButtonText: "Cerrar"
    }).then(function(result){
    if(result.value){

    window.location = "mails";
    }
    });

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

    //TRAE TODOS LOS MAILS
    public function ctrMostrarMails(){

      $mails = ModeloMails::mdlObtenerMails();
      return $mails;

    }

    //TRAE ULTIMOS MAILS
    public function ctrMostrarMailsUltimos(){

      $mails = ModeloMails::ctrMostrarMailsUltimos();
      return $mails;

    }



    //FUNCION PARA RECORRER DATOS A EDITAR
    public function ctrMostrarDatosMail($id){

      $datos = ModeloMails::mdlObtenerMail($id);
      return $datos;

    }

    //TRAE TODOS LOS GRUPOS TOTAL
    public function ctrMostrarMailsCant(){

      $mails = ModeloMails::mdlObtenerMailsCant();
      return $mails;

    }

    //FUNCION PARA BORAR MAIL
  public function ctrBorrarMail(){

   if(isset($_GET["idMail"])){

     $id = $_GET["idMail"];

     $respuesta = ModeloMails::mdlBorrarMail($id);

     if($respuesta == "ok"){

       echo'<script>

         swal({
             type: "success",
             title: "El mail ha sido eliminado correctamente",
             showConfirmButton: true,
             confirmButtonText: "Cerrar"
             }).then(function(result){
                 if (result.value) {

                 window.location = "mails";

                 }
               })

         </script>';
     }else {
       echo'<script>

      swal({
          type: "error",
          title: "¡Error al eliminar Mail!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar"
          }).then(function(result){
            if (result.value) {

            window.location = "mails";

            }
        })

      </script>';
      }
   }

 }
}

?>
