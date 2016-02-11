<!DOCTYPE html>
<html lang="en">

<?php   $this->load->view('layouts/head_dashboard'); ?>

<body>
<!-- container section start -->
<section id="container" class="">

    <!-- URL-CONTROLLERS -->
    <input type="hidden" id="url" value="<?=site_url('metodos');?>">
    <input type="hidden" id="edit_metodo" value="<?=site_url('metodos/edit_metodo');?>">
    <input type="hidden" id="create_metodo" value="<?=site_url('metodos/create_metodo');?>">
    <input type="hidden" id="consult_metodo" value="<?=site_url('metodos/consult_metodo');?>">
    <!-- END-URL-CONTROLLERS -->

    <?php   $this->load->view('layouts/header_dashboard');?>

    <?php   $this->load->view('layouts/navigation_dashboard');?>

    <!--main content start-->
    <section id="main-content">

        <section class="wrapper">

            <?php   $this->load->view('layouts/breadcrumb_dashboard'); ?>

            <?php   $this->load->view('form_new_metodo'); ?>

            <div class="row">

                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                                <h2>Metodos</h2>
                            </div>
                            <div class="col-lg-10 col-sm-10 follow-info weather-category">
                                <form class="form-inline" role="form" id="form_metodos">
                                    <div class="form-group">
                                        <label class="sr-only" for="inputMetodos">Metodos</label>
                                        <select class="form-control input-sm" name="inputMetodos" id="inputMetodos">
                                            <option value="0">Seleccione un metodo</option>
                                            <?php foreach ($array_metodos as $item) {?>
                                                <option value="<?=$item->id_metodo;?>"><?=$item->descripcion;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <a class="btn btn-success new_metodo" title="Nuevo metodo" data-toggle="modal" href="#new_metodo"><span class="icon_plus"></span> Nuevo metodo</a>
                                </form>
                            </div>
                          </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">

                    <section class="panel">

                        <div class="panel-body" id="list_analisis_x_metodo">

                        </div>

                    </section>

                </div>

            </div>

        </section>

    </section>
    <!--main content end-->

</section>
<!-- container section start -->

<?php
$this->load->view('layouts/footer_dashboard');
?>

</body>

</html>
