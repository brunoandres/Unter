<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">Bienvenido al Sistema UNTER</h4>

                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="inicio"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a>
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
                      <div class="row">
                          <!-- task, page, download counter  start -->
                          <div class="col-xl-4 col-md-6">
                              <div class="card">
                                  <div class="card-block">
                                      <div class="row align-items-center">
                                          <div class="col-8">
                                              <h4 class="text-c-purple"><?php $total = new ControladorMails();
                                              echo $t = $total -> ctrMostrarMailsCant(); ?></h4>
                                              <h6 class="text-muted m-b-0">Mails activos</h6>
                                          </div>
                                          <div class="col-4 text-right">
                                              <i class="fa fa-bar-chart f-28"></i>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer bg-c-purple">
                                      <div class="row align-items-center">
                                          <div class="col-9">
                                            <a href="mails">
                                              <p class="text-white m-b-0">Ver</p>
                                            </a>
                                          </div>
                                          <div class="col-3 text-right">
                                              <i class="fa fa-line-chart text-white f-16"></i>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-4 col-md-6">
                              <div class="card">
                                  <div class="card-block">
                                      <div class="row align-items-center">
                                          <div class="col-8">
                                              <h4 class="text-c-green"><?php $total = new ControladorGrupos();
                                              echo $t = $total -> ctrMostrarGruposCant(); ?></h4>
                                              <h6 class="text-muted m-b-0">Grupos activos</h6>
                                          </div>
                                          <div class="col-4 text-right">
                                              <i class="fa fa-file-text-o f-28"></i>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="card-footer bg-c-green">
                                      <div class="row align-items-center">
                                          <div class="col-9">
                                            <a href="grupos">
                                              <p class="text-white m-b-0">Ver</p>
                                            </a>
                                          </div>
                                          <div class="col-3 text-right">
                                              <i class="fa fa-line-chart text-white f-16"></i>

                                          </div>
                                      </div>
                                  </div>

                              </div>
                          </div>
                          <div class="col-xl-4 col-md-6">
                              <div class="card">
                                  <div class="card-block">
                                      <div class="row align-items-center">
                                          <div class="col-8">
                                              <h4 class="text-c-red"><?php $total = new ControladorSubgrupos();
                                              echo $t = $total -> ctrMostrarSubGruposCant(); ?></h4>
                                              <h6 class="text-muted m-b-0">Subgrupos activos</h6>
                                          </div>
                                          <div class="col-4 text-right">
                                              <i class="fa fa-file-text-o f-28"></i>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer bg-c-red">
                                      <div class="row align-items-center">
                                          <div class="col-9">
                                            <a href="subgrupos">
                                              <p class="text-white m-b-0">Ver</p>
                                            </a>
                                          </div>
                                          <div class="col-3 text-right">
                                              <i class="fa fa-line-chart text-white f-16"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <!-- task, page, download counter  end -->
                          <!--  project and team member start -->

                          <div class="col-xl-12 col-md-12">
                              <div class="card ">
                                  <div class="card-header">
                                      <h5>Últimos afiliados</h5>
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
                                  <div class="card-block">
                                    <?php $mails = new ControladorMails();
                                    $mails = $mails -> ctrMostrarMailsUltimos();
                                    foreach ($mails as $mail) { ?>


                                      <div class="align-middle m-b-30">
                                          <img src="vistas/assets/images/avatar-4.png" alt="user image" class="img-radius img-40 align-top m-r-15">
                                          <div class="d-inline-block">
                                              <h6><?php echo $mail['nombre']; ?></h6>
                                              <p class="text-muted m-b-0"><?php echo $mail['direccion']; ?></p>
                                          </div>
                                      </div>


                                    <?php } ?>
                                      <div class="text-center">
                                          <a href="mails" class="b-b-primary text-primary">Ver todos</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!--  project and team member end -->
                      </div>
                  </div>
                  <!-- Page-body end -->
              </div>
              <div id="styleSelector"> </div>
          </div>
      </div>
  </div>
