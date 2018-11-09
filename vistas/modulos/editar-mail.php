<?php

$datosMail = new ControladorMails();
$set = $datosMail->ctrMostrarDatosMail($_GET['id']);

  if ($set>=1) { //SI EL ID EXISTE EN LA BASE PUEDO EDITARLO, SINO ENVIO ERROR.
    foreach ($set as $key => $value) {
      $dato = $value;
    }
  }//FIN IF


?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">Editar Mail</h4>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="inicio"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="mails">Listado</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">

                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Formulario Editar Mail</h5>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form class="form-material" method="POST">
                                        <div class="form-group form-default">
                                            <input type="text" name="nombrePersona" class="form-control" value="<?php echo $dato['nombre']; ?>" autocomplete="off" required="">
                                            <input type="hidden" name="idMail" value="<?php echo $dato['id']; ?>">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nombre y Apellido</label>
                                        </div>
                                        <div class="form-group form-default">
                                            <input type="text" name="nombreMail" class="form-control" value="<?php echo $dato['direccion']; ?>" autocomplete="off" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Correo electrónico</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <br><br>
                                          <label class="float-label">Seleccione estado</label>
                                            <input type="checkbox" <?php if ($dato['activo']==1) {
                                              echo "checked";
                                            } ?> data-toggle="toggle" value="1" name="estadoMail">
                                            <span class="form-bar"></span>

                                        </div>


                                        <div class="form-group form-default">
                                            <span class="form-bar"></span>
                                            <button type="submit" name="btnFormEditarMail" class="btn btn-success waves-effect waves-light">Guardar</button>
                                            <a href="mails"><button type="button" name="" class="btn btn-danger waves-effect waves-light">Cancelar</button></a>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php

$editarMail = new ControladorMails();
$editarMail = $editarMail->ctrEditarMail();

?>
