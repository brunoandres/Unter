<!DOCTYPE html>
<html lang="es">

<head>
    <title>UNTER Sistema de Envíos masivos</title>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Unter, sistema de envíos masivos de correos electrónicos" />
      <meta name="keywords" content="UNTER,unter,sistema de envios" />
      <meta name="author" content="CENERGON" />

      <!-- POPUPS SWEET ALERT -->
      <script type="text/javascript" src="vistas/assets/js/sweetalert2.all.js"></script>
      <!-- Favicon icon -->

      <link rel="icon" type="image/png" sizes="96x96" href="vistas/assets/images/favicon-96x96.png">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
      <!-- waves.css -->
      <link rel="stylesheet" href="vistas/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->

      <link rel="stylesheet" type="text/css" href="vistas/assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="vistas/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="vistas/assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="vistas/assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="vistas/assets/css/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
      <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="vistas/assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="vistas/assets/css/jquery.dataTables.css">

      <link rel="stylesheet" type="text/css" href="vistas/assets/css/sweetalert.css">

      <!-- DESCOMENTAR PARA USAR LIBRERIA BOOTSTRAP, ES ANTERIOR A BOOTSTRAP.MIN.CSS EN LA PARTE SUPERIOR! -->
      <!--<link rel="stylesheet" type="text/css" href="vistas/assets/css/bootstrap.css">-->

      <link href="vistas/assets/css/summernote.css" rel="stylesheet">

      <!-- BUTTON TOOGLE BOOTSTRAP -->
      <link href="vistas/assets/css/bootstrap-toggle.min.css" rel="stylesheet">




  </head>

  <body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>

              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>

              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">

        <!--INCLUYO NAVBAR HEADER-->
        <?php include 'modulos/navbarheader.php'; ?>
          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <!--INCLUYO NAVBAR PROFILE-->
                  <?php include 'modulos/navbarprofile.php'; ?>

                  <?php

                  //CARGO LA VISTA SEGUN LA RUTA SETEADA POR GET
                  if(isset($_GET["ruta"])){

                      if($_GET["ruta"] == "inicio" ||
                         $_GET["ruta"] == "grupos" ||
                         $_GET["ruta"] == "nuevo-grupo" ||
                         $_GET["ruta"] == "editar-grupo" ||
                         $_GET["ruta"] == "subgrupos" ||
                         $_GET["ruta"] == "nuevo-subgrupo" ||
                         $_GET["ruta"] == "editar-subgrupo" ||
                         $_GET["ruta"] == "mails" ||
                         $_GET["ruta"] == "nuevo-mail" ||
                         $_GET["ruta"] == "editar-mail" ||
                         $_GET["ruta"] == "detalle" ||
                         $_GET["ruta"] == "bat" ||
                         $_GET["ruta"] == "configuracion"){

                        include "modulos/".$_GET["ruta"].".php";

                      }elseif ($_GET["ruta"] == "login") {
                        echo "<script>
                            window.location.replace('login.php');

                              </script>
                        ";
                      }
                      else{

                        include "modulos/404.php";

                      }

                    }else{

                      include "modulos/inicio.php";

                    }

                  ?>

                </div>
            </div>
        </div>
    </div>



    <!-- Required Jquery -->

    <script type="text/javascript" src="vistas/assets/js/jquery/jquery.min.js"></script>

    <script type="text/javascript" src="vistas/assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="vistas/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="vistas/assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="vistas/assets/pages/widget/excanvas.js "></script>

    <script>
     $(document).ready(function(){
          $('#add').click(function(){
               $('#insert').val("Guardar");
               $('#insert_form')[0].reset();
          });

          $(document).on('click', '.view_data', function(){
               var employee_id = $(this).attr("id");
               if(employee_id != '')
               {
                    $.ajax({
                         url:"detalle.php",
                         method:"POST",
                         data:{employee_id:employee_id},
                         success:function(data){
                              $('#detalles').html(data);
                              $('#dataModal').modal('show');
                         }
                    });
               }
          });

          $(document).on('click', '.view_data2', function(){
               var employee_id = $(this).attr("id");
               if(employee_id != '')
               {
                    $.ajax({
                         url:"detalle_subgrupo.php",
                         method:"POST",
                         data:{employee_id:employee_id},
                         success:function(data){
                              $('#detalles').html(data);
                              $('#dataModal').modal('show');
                         }
                    });
               }
          });
     });
     </script>

    <script src="vistas/assets/js/pcoded.min.js"></script>
    <script src="vistas/assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="vistas/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="vistas/assets/js/script.js "></script>
    <script type="text/javascript" src="vistas/assets/js/jquery.dataTables.min.js"></script>

    <!-- BUTTON TOOGLE BOOTSTRAP -->
    <script src="vistas/assets/js/bootstrap-toggle.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
      responsive : true
      } );
    </script>

    <script src="vistas/assets/js/summernote.js"></script>

    <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
    </script>

    <!-- SCRIPTS PARA BORRAR -->
    <script type="text/javascript" src="vistas/assets/js/mails.js"></script>
    <script type="text/javascript" src="vistas/assets/js/grupos.js"></script>
    <script type="text/javascript" src="vistas/assets/js/subgrupos.js"></script>




</body>

</html>
