<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">Listado de Subgrupos</h4>
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
                <!-- Page-body start -->
                <div class="page-body">
                    <!-- Basic table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Listado de Subgrupos</h5>
                            <a href="nuevo-subgrupo"><button type="button" class="btn btn-primary" name="button">Nuevo</button></a>
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
                                        <th>Descripción</th>
                                        <th>Grupo</th>
                                        <th>Estado</th>
                                        <th>Adjunto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $subgrupos = new ControladorSubGrupos();
                                    $subgrupos = $subgrupos -> ctrMostrarSubGrupos();

                                    foreach ($subgrupos as $subgrupo) {

                                      $id = $subgrupo['id'];

                                      ?>
                                      <tr>
                                        <td><?php echo $subgrupo['nombre']; ?></td>
                                        <td><?php echo $subgrupo['descripcion']; ?></td>
                                        <td><?php echo $subgrupo['grupo']; ?></td>
                                        <td><?php if ($subgrupo['activo']==1) {
                                          echo "<span class='label label-success'>ACTIVO</span>";
                                        } else {
                                          echo "<span class='label label-danger'>INACTIVO</span>";
                                        }?></td>
                                        <td><?php if ($subgrupo['adjunto']==1) {
                                          echo "<span class='label label-success'>SI</span>";
                                        } else {
                                          echo "<span class='label label-danger'>NO</span>";
                                        }?></td>

                                        <td>

                                          <a href="index.php?ruta=editar-subgrupo&id=<?php echo $subgrupo['id'];?>&nombre=<?php echo $subgrupo['nombre']; ?>"> <button type="button" class="btn btn-warning waves-effect waves-light">Editar</button></a>
                                          <!--<a href="#"> <button type="button" class="btn btn-danger waves-effect waves-light btnEliminarSubgrupo" idSubgrupo="<?php //echo $id; ?>">Borrar</button></a>-->
                                          <button type="button" name="view" value="Ver" id="<?php echo $subgrupo["id"]; ?>" class="btn btn-info btn-xs view_data2"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                          <?php if ($subgrupo['activo']==1 and $subgrupo['enviado']==0): ?>
                                          <a href="bat"> <button type="button" name="button" class="btn btn-success" onclick="return confirm('¿Confirma envio de mails?');">Enviar</button> </a>
                                          <?php endif; ?>
                                          <?php if ($subgrupo['enviado']==1): ?>
                                          <a href="#"> <button type="button" class="btn btn-danger" name="desbloquear">Desbloquear</button> </a>
                                          <?php endif; ?>

                                        </td>
                                      </tr>
                                  <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                      <th>Nombre</th>
                                      <th>Descripción</th>
                                      <th>Grupo</th>
                                      <th>Estado</th>
                                      <th>Adjunto</th>
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

  $borrarSubGrupo = new ControladorSubGrupos();
  $borrarSubGrupo -> ctrBorrarSubGrupo();

?>

<br><br>
<div id="dataModal" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Detalle subgrupo</h4>
                </div>
                <div class="modal-body" id="detalles">
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
           </div>
      </div>
 </div>
