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
                                  <header class="panel-heading font-bold">Nuevo país</header>
                                  <div class="panel-body">
                                    <form class="bs-example form-horizontal" method="POST" action="<?=site_url('locations/add_country');?>">
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Código de País</label>
                                        <div class="col-lg-10">
                                          <input type="text" name="code_country" class="form-control" value="" placeholder="Código de país" required>
                                          <span class="help-block m-b-none">Si no sabes los codigos de país pueves visitar el siguiente link <a href="http://userpage.chemie.fu-berlin.de/diverse/doc/ISO_3166.html" title="">Code ISO Países</a> solo utilizar los códigos de la columna A2</span>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">País</label>
                                        <div class="col-lg-10">
                                          <input type="text" name="name_country" class="form-control" value="" placeholder="Nombre de país" required>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Estado</label>
                                        <div class="col-sm-10">
                                          <select name="status" class="form-control m-b">
                                            <option value="1">Habilitar</option>
                                            <option value="0">Desahabilitar</option>
                                          </select>
                                          <span class="help-block m-b-none">Estado de país</span>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Habilitado</label>
                                        <div class="col-sm-10">
                                          <select name="enabled" class="form-control m-b">
                                            <option value="1">Habilitar</option>
                                            <option value="0">Desahabilitar</option>
                                          </select>
                                          <span class="help-block m-b-none">Estado para saber si la plataforma esta habilitado en este país</span>
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
