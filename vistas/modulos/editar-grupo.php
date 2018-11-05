<?php

$datosGrupo = new ControladorGrupos();
$set = $datosGrupo->ctrMostrarDatosGrupos($_GET['id']);

  if ($set>=1) { //SI EL ID EMPLEADO EXISTE EN LA BASE PUEDO EDITARLO, SINO ENVIO ERROR.
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
                        <h4 class="m-b-10">Editar Grupo</h4>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="grupos">Grupos</a>
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
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Formulario Editar Grupo</h5>
                                </div>

                                <div class="card-block">
                                    <form class="form-material" method="POST" enctype="multipart/form-data">
                                        <div class="form-group form-default">
                                            <input type="text" name="nombreGrupo" value="<?php echo $dato['nombre']?>" class="form-control" required="" autocomplete="off">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nombre</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <input type="text" name="descripcionGrupo" value="<?php echo $dato['descripcion']?>" class="form-control" required="" autocomplete="off">
                                          <span class="form-bar"></span>
                                          <label class="float-label">Descripción</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <input type="text" name="asuntoGrupo" value="<?php echo $dato['asunto']?>" class="form-control" required="">
                                          <input type="hidden" name="idGrupo" value="<?php echo $_GET['id']; ?>">
                                          <span class="form-bar"></span>
                                          <label class="float-label">Asunto</label>
                                        </div>

                                        <div class="form-group form-default">
                                            <br><br>
                                            <textarea id="summernote" name="cuerpoGrupo"><?php echo $dato['cuerpo']; ?></textarea>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Cuerpo</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <br><br>
                                          <label class="float-label">Activo</label>
                                            <input type="checkbox" data-toggle="toggle" value="1" name="estadoGrupo" <?php if ($dato['activo']==1) {
                                              echo "checked";
                                            } ?>>
                                            <span class="form-bar"></span>

                                        </div>

                                        <br>
                                        <div class="form-group form-default">
                                            <input name="adjuntos[]" class="form-control" type="file" multiple="multiple" />
                                            <span class="form-bar"></span>
                                            <label class="float-label">Adjuntos</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <input type="text" name="dropbox" class="form-control" value="<?php echo $dato['dropbox']?>" autocomplete="off">
                                          <span class="form-bar"></span>
                                          <label class="float-label">Link Dropbox</label>
                                        </div>

                                        <div class="form-group form-default">
                                            <span class="form-bar"></span>
                                            <button type="submit" name="btnFormEditarGrupo" class="btn btn-warning waves-effect waves-light">Guardar cambios</button>
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
        $editarGrupo = new ControladorGrupos();
        $editarGrupo -> ctrEditarGrupo();
        ?>
