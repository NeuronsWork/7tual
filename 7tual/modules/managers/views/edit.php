<!DOCTYPE html>
<html lang="en" class="app">

    <?php   $this->load->view('layouts/head_dashboard'); ?>

    <body>
        <!-- container section start -->
        <section class="vbox">

            <?php $this->load->view('layouts/header_dashboard');?>

            <section>

                <section class="hbox stretch">

                    <?php $this->load->view('layouts/navigation_dashboard');?>

                    <section id="content">

                        <section class="vbox">

                            <section class="scrollable padder">

                                <?php $this->load->view('layouts/breadcrumb_dashboard'); ?>

                                <section class="panel panel-default">
                                  <header class="panel-heading font-bold">Editar manager</header>
                                  <div class="panel-body">
                                    <form class="bs-example form-horizontal" method="POST" action="<?=site_url('managers/update');?>">
                                      <input type="hidden" name="id_manager" value="<?php echo $manager[0]->id_manager;?>">
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Tipo de manager</label>
                                        <div class="col-lg-10">
                                          <select name="id_profile" class="form-control m-b">
                                            <option value="1" <?php echo ($manager[0]->id_profile == 1) ? 'selected' : ''; ?>>Administrador</option>
                                            <option value="3" <?php echo ($manager[0]->id_profile == 3) ? 'selected' : ''; ?>>Editor</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">User</label>
                                        <div class="col-lg-10">
                                          <input type="text" name="user" class="form-control" value="<?php echo $manager[0]->user;?>" placeholder="Nombre de usuario" required>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Nombres</label>
                                        <div class="col-lg-10">
                                          <input type="text" name="name" class="form-control" value="<?php echo $manager[0]->name;?>" placeholder="Nombres completos" required>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Correo electrónico</label>
                                        <div class="col-lg-10">
                                          <input type="email" name="email" class="form-control" value="<?php echo $manager[0]->email;?>" placeholder="Nombres completos" required>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Estado</label>
                                        <div class="col-sm-10">
                                          <select name="status" class="form-control m-b">
                                            <option value="1" <?php echo ($manager[0]->status == 1) ? 'selected' : ''; ?>>Habilitar</option>
                                            <option value="0" <?php echo ($manager[0]->status == 0) ? 'selected' : ''; ?>>Desahabilitar</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-success">Guardar</button>
                                          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </section>

                            </section>

                        </section>

                        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>

                    </section>

                    <aside class="bg-light lter b-l aside-md hide" id="notes">
                        <div class="wrapper">Notification</div>
                    </aside>

                </section>

            </section>

        </section>
        <!-- container section start -->

        <?php
            $this->load->view('layouts/footer_dashboard');
        ?>
    </body>

</html>
