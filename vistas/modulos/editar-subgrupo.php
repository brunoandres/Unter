<?php

$datosSubGrupo = new ControladorSubGrupos();
$set = $datosSubGrupo->ctrMostrarDatosSubGrupos($_GET['id']);

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
                        <h4 class="m-b-10">Editar Subgrupo</h4>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="subgrupos">Subgrupos</a>
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
                                    <h5>Formulario Editar Subgrupo</h5>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form class="form-material" method="POST" enctype="multipart/form-data">
                                        <div class="form-group form-default">
                                            <input type="text" name="nombreSubGrupo" class="form-control" value="<?php echo $dato['nombre']; ?>" autocomplete="off" required="">
                                            <input type="hidden" name="idSub" value="<?php echo $dato['id']; ?>">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nombre subgrupo</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <input type="text" name="descripcionSubGrupo" class="form-control" value="<?php echo $dato['descripcion']; ?>" autocomplete="off" required="" >
                                          <span class="form-bar"></span>
                                          <label class="float-label">Descripción subgrupo</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <input type="text" name="asuntoSubGrupo" class="form-control" value="<?php echo $dato['asunto']; ?>" autocomplete="off" required="" >
                                          <span class="form-bar"></span>
                                          <label class="float-label">Asunto subgrupo</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <label class="">Seleccionar grupo principal</label>
                                              <select name="selectGrupo" class="form-control">
                                                <?php
                                                   $grupos = new ControladorGrupos();
                                                   $grupos = $grupos->ctrMostrarGrupos();

                                                  foreach ($grupos as $grupo){ ?>

                                                     <option value=<?php echo $grupo['id']; ?> ><?php echo $grupo['nombre']; ?></option>

                                                 <?php } ?>
                                              </select>
                                        </div>

                                        <div class="form-group form-default">

                                            <br><br>
                                            <textarea id="summernote" name="cuerpoSubGrupo"><?php echo $dato['cuerpo']; ?></textarea>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Cuerpo</label>

                                        </div>

                                        <div class="form-group form-default">
                                          <br><br>
                                          <label class="float-label">Activo</label>
                                            <input type="checkbox" <?php if ($dato['activo']==1) {
                                              echo "checked";
                                            } ?> data-toggle="toggle" value="1" name="estadoSubGrupo">
                                            <span class="form-bar"></span>

                                        </div>

                                        <div class="form-group form-default">
                                          <br><br>
                                          <label class="float-label">Individual</label>
                                            <input type="checkbox" <?php if ($dato['individual']==1) {
                                              echo "checked";
                                            } ?> data-toggle="toggle" value="1" name="individualSubGrupo">
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
                                            <button type="submit" name="btnFormEditarSubGrupo" class="btn btn-warning waves-effect waves-light">Guardar cambios</button>
                                            <a href="subgrupos"><button type="button" name="" class="btn btn-danger waves-effect waves-light">Cancelar</button></a>
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
$editarSubGrupo = new ControladorSubgrupos();
$editarSubGrupo -> ctrEditarSubGrupo();
?>
