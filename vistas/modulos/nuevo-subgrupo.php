<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">Alta nuevo Subgrupo</h4>

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
                                    <h5>Formulario Nuevo Subgrupo</h5>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form class="form-material" method="POST" enctype="multipart/form-data">
                                        <div class="form-group form-default">
                                            <input type="text" name="nombreSubGrupo" class="form-control" value="<?php if (isset($_POST['nombreSubGrupo'])) {
                                              echo $_POST['nombreSubGrupo'];
                                            } ?>" autocomplete="off" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nombre subgrupo</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <input type="text" name="descripcionSubGrupo" class="form-control" value="<?php if (isset($_POST['descripcionSubGrupo'])) {
                                            echo $_POST['descripcionSubGrupo'];
                                          } ?>" autocomplete="off" required="">
                                          <span class="form-bar"></span>
                                          <label class="float-label">Descripción subgrupo</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <input type="text" name="asuntoSubGrupo" class="form-control" value="<?php if (isset($_POST['asuntoSubGrupo'])) {
                                            echo $_POST['asuntoSubGrupo'];
                                          } ?>" autocomplete="off" required="">
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
                                            <textarea id="summernote" name="cuerpoSubGrupo"><?php if (isset($_POST['cuerpoSubGrupo'])) {
                                              echo $_POST['cuerpoSubGrupo'];
                                            } ?></textarea>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Cuerpo</label>

                                        </div>

                                        <div class="form-group form-default">
                                          <br><br>
                                          <label class="float-label">Activo</label>
                                            <input type="checkbox" checked data-toggle="toggle" value="1" name="estadoSubGrupo">
                                            <span class="form-bar"></span>

                                        </div>

                                        <div class="form-group form-default">
                                          <br><br>
                                          <label class="float-label">Individual</label>
                                            <input type="checkbox" checked data-toggle="toggle" value="1" name="individualSubGrupo">
                                            <span class="form-bar"></span>

                                        </div>

                                        <br>
                                        <div class="form-group form-default">
                                            <input name="adjuntos[]" class="form-control" type="file" multiple="multiple" />
                                            <span class="form-bar"></span>
                                            <label class="float-label">Adjuntos</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <input type="text" name="dropbox" class="form-control" autocomplete="off">
                                          <span class="form-bar"></span>
                                          <label class="float-label">Link Dropbox</label>
                                        </div>

                                        <div class="form-group form-default">
                                            <span class="form-bar"></span>
                                            <button type="submit" name="btnFormNuevoSubGrupo" class="btn btn-success waves-effect waves-light">Guardar</button>
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
$crearGrupo = new ControladorSubgrupos();
$crearGrupo -> ctrCrearSubGrupo();
?>
