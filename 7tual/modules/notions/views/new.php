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
                                  <header class="panel-heading font-bold">Nueva idea</header>
                                  <div class="panel-body">
                                    <form class="bs-example form-horizontal" method="POST" action="<?php echo site_url('notions/add_notion');?>">
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Categoria</label>
                                        <div class="col-lg-10">
                                          <select name="selectCategory" class="form-control m-b">
                                             <?php 
                                             foreach ($categoria as $cat) { ?>
                                               <option value="<?php echo $cat->id_category; ?>"><?php echo $cat->name_category; ?></option>}
                                               option
                                             <?php } ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Ciudad</label>
                                        <div class="col-lg-10">
                                          <select name="selectCity" class="form-control m-b">
                                            <?php 
                                             foreach ($city as $ciu) { ?>
                                               <option value="<?php echo $ciu->id_city; ?>"><?php echo $ciu->name_city; ?></option>
                                             <?php } ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Pais</label>
                                        <div class="col-lg-10">
                                          <select name="code_country" class="form-control m-b">
                                            <?php 
                                             foreach ($country as $countrys) { ?>
                                               <option value="<?php echo $countrys->code_country; ?>"><?php echo $countrys->name_country; ?></option>
                                             <?php } ?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Titulo</label>
                                        <div class="col-lg-10">
                                          <input type="text" name="inputTitulo" class="form-control" value="" required>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Descripción</label>
                                        <div class="col-lg-10">
                                          <textarea name="inputIdea" class="form-control editor"></textarea>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Video</label>
                                        <div class="col-lg-10">
                                          <input type="text" name="inputVideo" class="form-control" value="" required>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Tag</label>
                                        <div class="col-lg-10">
                                          <input type="text" name="inputTag" class="form-control" value="" required>
                                        </div>
                                      </div>


                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Vip</label>
                                        <div class="col-sm-10">
                                          <select name="vip" class="form-control m-b">
                                            <option value="">SELECCIONE </option>
                                            <option value="1">SI</option>
                                            <option value="0">NO</option>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Estado</label>
                                        <div class="col-sm-10">
                                          <select name="status" class="form-control m-b">
                                            <option value="">SELECCIONE </option>
                                            <option value="1">Habilitado</option>
                                            <option value="0">Deshabilitado</option>
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
