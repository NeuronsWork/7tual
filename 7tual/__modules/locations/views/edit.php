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
                                  <header class="panel-heading font-bold">Editar país</header>
                                  <div class="panel-body">
                                    <form class="bs-example form-horizontal" method="POST" action="<?=site_url('locations/update');?>">
                                      <?php
                                      foreach ($array_country as $item) {
                                      ?>
                                      <input type="hidden" name="current_url" value="<?=site_url('locations');?>">
                                      <input type="hidden" name="id_country" value="<?=$item->id_country;?>">
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Código de País</label>
                                        <div class="col-lg-10">
                                          <input type="text" name="code_country" class="form-control" value="<?=$item->code_country;?>">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">País</label>
                                        <div class="col-lg-10">
                                          <input type="text" name="name_country" class="form-control" value="<?=$item->name_country;?>">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Estado</label>
                                        <div class="col-sm-10">
                                          <select name="status" class="form-control m-b">
                                            <option value="1" <?php if($item->status == 1){ echo 'selected="selected"';}?>>Habilitar</option>
                                            <option value="0" <?php if($item->status == 0){ echo 'selected="selected"';}?>>Desahabilitar</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-success">Guardar</button>
                                          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
                                        </div>
                                      </div>
                                      <?php
                                      }
                                      ?>
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
