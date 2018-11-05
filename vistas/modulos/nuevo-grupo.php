<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">Alta nuevo Grupo</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="inicio"> <i class="fa fa-home"></i> </a>
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
                                    <h5>Formulario Nuevo Grupo</h5>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form class="form-material" method="POST" enctype="multipart/form-data">
                                        <div class="form-group form-default">
                                            <input type="text" name="nombreGrupo" class="form-control" required="" autocomplete="off">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nombre</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <input type="text" name="descripcionGrupo" class="form-control" required="" autocomplete="off">
                                          <span class="form-bar"></span>
                                          <label class="float-label">Descripción</label>
                                        </div>

                                        <div class="form-group form-default">
                                          <input type="text" name="asuntoGrupo" class="form-control" required="" autocomplete="off">
                                          <span class="form-bar"></span>
                                          <label class="float-label">Asunto</label>
                                        </div>

                                        <div class="form-group form-default">

                                            <br><br>
                                            <textarea id="summernote" name="cuerpoGrupo"></textarea>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Cuerpo</label>

                                        </div>

                                        <div class="form-group form-default">
                                          <br><br>
                                          <label class="float-label">Activo</label>
                                            <input type="checkbox" checked data-toggle="toggle" value="1" name="estadoGrupo">
                                            <span class="form-bar"></span>

                                        </div>

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
                                            <button type="submit" name="btnFormNuevoGrupo" class="btn btn-success waves-effect waves-light">Guardar</button>
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
$crearGrupo = new ControladorGrupos();
$crearGrupo -> ctrCrearGrupo();
?>
