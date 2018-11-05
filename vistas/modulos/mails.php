<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">Listado de Mails</h4>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a>
                        </li>
                        <li class="breadcrumb-item"><a href="mails">Mails</a>
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
                <!-- Page-body start -->
                <div class="page-body">
                    <!-- Basic table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Listado de Mails</h5>
                            <a href="nuevo-mail"><button type="button" class="btn btn-primary" name="button">Nuevo</button></a>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                    <li><i class="fa fa-trash close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                              <table id="example" class="display tablas" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Dominio</th>
                                        <th>Estado</th>
                                        <th>Subgrupo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $mails = new ControladorMails();
                                    $mails = $mails -> ctrMostrarMails();

                                    foreach ($mails as $mail) {

                                      $id = $mail['id'];

                                      ?>
                                      <tr>
                                        <td><?php echo $mail['nombre']; ?></td>
                                        <td><?php echo $mail['direccion']; ?></td>
                                        <td><?php echo $mail['dominio']; ?></td>
                                        <td><?php if ($mail['activo']==1) {
                                          echo "<span class='label label-success'>ACTIVO</span>";
                                        } else {
                                          echo "<span class='label label-danger'>INACTIVO</span>";
                                        }?></td>
                                        <td><?php echo $mail['subgrupo']; ?></td>
                                        <td>

                                          <a href='index.php?ruta=editar-mail&id=<?php echo "$id"; ?>&nombre=<?php echo $mail['nombre']; ?>&descripcion=<?php echo $mail['direccion']; ?>'> <button type="submit" name="btnFormNuevoGrupo" class="btn btn-warning waves-effect waves-light">Editar</button></a>
                                          <a href="#"> <button type="submit" name="btnFormNuevoGrupo" class="btn btn-danger waves-effect waves-light btnEliminarMail" idMail="<?php echo $id; ?>">Borrar</button></a>
                                        </td>
                                      </tr>
                                  <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                      <th>Nombre</th>
                                      <th>Dirección</th>
                                      <th>Dominio</th>
                                      <th>Estado</th>
                                      <th>Subgrupo</th>
                                      <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Page-body end -->
            </div>
        </div>
        <!-- Main-body end -->

        <div id="styleSelector">

        </div>
    </div>
</div>

<?php

  $borrarMail = new ControladorMails();
  $borrarMail -> ctrBorrarMail();

?>
