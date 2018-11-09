<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">Alta nuevo Mail</h4>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="inicio"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="nuevo-mail">Nuevo</a>
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
                                    <h5>Formulario Nuevo Mail</h5>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form class="form-material" method="POST">
                                        <div class="form-group form-default">
                                            <input type="text" name="nombrePersona" class="form-control" value="<?php if (isset($_POST['nombrePersona'])) {
                                              echo $_POST['nombrePersona'];
                                            } ?>" required="" autocomplete="off">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nombre y Apellido</label>
                                        </div>
                                        <div class="form-group form-default">
                                            <input type="text" name="nombreMail" class="form-control" value="<?php if (isset($_POST['nombreMail'])) {
                                              echo $_POST['nombreMail'];
                                            } ?>" required="" autocomplete="off">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Correo electrónico</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <label class="">Seleccionar subgrupo</label>
                                              <select name="selectSubGrupo[]" size="5" multiple required class="form-control">
                                                <?php
                                                   $subgrupos = new ControladorSubGrupos();
                                                   $subgrupos = $subgrupos->ctrMostrarSubGrupos();

                                                  foreach ($subgrupos as $subgrupo){ ?>

                                                     <option value=<?php echo $subgrupo['id']; ?> ><?php echo $subgrupo['nombre']; ?></option>

                                                 <?php } ?>
                                              </select>
                                        </div>

                                        <div class="form-group form-default">
                                          <br><br>
                                          <label class="float-label">Seleccione estado</label>
                                            <input type="checkbox" checked data-toggle="toggle" value="1" name="estadoMail">
                                            <span class="form-bar"></span>

                                        </div>

                                        <div class="form-group form-default">
                                            <span class="form-bar"></span>
                                            <button type="submit" name="btnFormNuevoMail" class="btn btn-success waves-effect waves-light">Guardar</button>
                                            <a href="inicio"><button type="button" name="" class="btn btn-danger waves-effect waves-light">Cancelar</button></a>
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

$nuevoMail = new ControladorMails();
$nuevoMail = $nuevoMail->ctrCrearMail();

?>
