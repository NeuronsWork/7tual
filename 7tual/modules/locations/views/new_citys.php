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
                                  <header class="panel-heading font-bold">Nueva ciudad</header>
                                  <div class="panel-body">
                                    <form class="bs-example form-horizontal" method="POST" action="<?=site_url('locations/add_city');?>">
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">País</label>
                                        <div class="col-lg-10">
                                          <select name="code_country" class="form-control" required>
                                            <?php
                                            foreach ($list_countrys as $country) {
                                              echo '<option value="'.$country->code_country.'">'.$country->name_country.'</option>';
                                            }
                                            ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Ciudad</label>
                                        <div class="col-lg-10">
                                          <input type="text" name="name_city" class="form-control" value="" placeholder="Nombre de país" required>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Estado</label>
                                        <div class="col-sm-10">
                                          <select name="status" class="form-control m-b">
                                            <option value="1">Habilitar</option>
                                            <option value="0">Desahabilitar</option>
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
