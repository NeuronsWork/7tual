<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('layouts/head_web');?>

    <body>

        <!-- NAVBAR
        ================================================== -->

        <div class="navbar-wrapper" id="header">

            <div class="container-fluid">

                <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

                    <div class="container-fluid">

                        <div class="navbar-header pull-left">
                            <a class="navbar-brand" href="<?=site_url();?>"><img style="height:120%;" src="<?=base_url().$web_upload;?>logo.jpg">7tual</a>
                        </div>

                        <div class="navbar-header pull-right">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar navbar-country pull-left">
                            <div id="country_"><?=$nameCountry;?></div>
                        </div>

                        <div class="navbar pull-right">
                            <ul class="nav navbar-nav redes-sociales">
                                <li><a href="#"><span class="icon icon-facebook-circle"></span></a></li>
                                <li><a href="#"><span class="icon icon-twitter-circled"></span></a></li>
                                <li><a href="#"><span class="round"><span class="icon icon-youtube-alt"></span></span></a></li>
                            </ul>
                        </div>

                        <?php $this->load->view('layouts/web_menu'); ?>

                    </div>

                </div>

            </div>

        </div>

        <?php $this->load->view('layouts/slider_page');?>
        <?php $this->load->view('layouts/sub_menu');?>

        <div class="container-fluid" id="content-wrapper">

            <div class="row row row-offcanvas row-offcanvas-left">

                <?php $this->load->view('layouts/menu_options_web');?>


                <div class="col-lg-11 col-md-10 col-sm-9p col-xs-9 content main" id="wrapper_box">

                    <div class="row" id="index-noise" style="padding: 20px 0;">

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 noise">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 list-noise">
                                        <input type="hidden" id="base_url" value="<?=base_url('idea');?>">
                                        <?php
                                        foreach ($account as $user) {
                                        ?>
                                        <div class="row item view_event" id="<?=$user->id_user;?>">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slide-row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 info">
                                                    <h2>Mi cuenta <a class="btn btn-danger pull-right" href="<?php echo site_url('eliminar_cuenta/'.$this->session->userdata('id_usuario'));?>">Eliminar cuenta</a></h2>
                                                    <form class="form-horizontal">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Usuario</label>
                                                            <div class="col-sm-10">
                                                                <p class="form-control-static"><?php echo $user->user;?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Nombres</label>
                                                            <div class="col-sm-10">
                                                                <?php if($user->name != ""):?>
                                                                <p class="form-control-static"><?php echo $user->name;?></p>
                                                                <?php else:?>
                                                                <p class="form-control-static">No hay datos</p>
                                                                <?php endif;?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <p class="form-control-static"><?php echo $user->email;?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Cuenta creada</label>
                                                            <div class="col-sm-10">
                                                                <p class="form-control-static"><?php echo $user->date_created;?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Último acceso</label>
                                                            <div class="col-sm-10">
                                                                <p class="form-control-static"><?php echo $user->date_last_access;?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Estado</label>
                                                            <div class="col-sm-10">
                                                                <p class="form-control-static">
                                                                    <?php
                                                                    if($user->status=="1") echo "Activo";
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <?php $this->load->view('layouts/footer_web');?>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-content">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>

        <?php $this->load->view('layouts/foot_web');?>

        <?php
            if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1):
            else:
                $this->load->view('layouts/register_noise');
                $this->load->view('layouts/login_form');
                $this->load->view('layouts/register_form');
                $this->load->view('msg_activate');
            endif;
        ?>

    </body>

</html>
