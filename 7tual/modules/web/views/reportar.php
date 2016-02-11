<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('layouts/head_web');?>

    <body class="bg_page bg_contacto">

        <!-- NAVBAR
        ================================================== -->

        <div class="navbar-wrapper" id="header">

            <div class="container-fluid">

                <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

                    <div class="container-fluid">

                        <div class="navbar-header pull-left" >
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

        <div class="container" id="content-wrapper">

            <!-- Three columns of text below the carousel -->
            <div class="row contactanos">

                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="col-lg-12 bg-contactanos">
                        <h2>Escríbenos!</h2>
                        <p>Tu consulta es importante para nosotros!</p>
                        <p>Envianos un mensaje con tus inquietudes, comentarios o sugerencias y a la brevedad estaremos contigo...</p>
                        <form class="form-horizontal" method="post" action="<?=site_url('web/add_report');?>" id="form_report">
                            <input type="hidden" name="id_reportar" id="id_reportar" value="<?php echo $id_notion;?>">
                            <div class="form-group">
                                <div class="col-md-12">
                                <input type="text" class="form-control" name="inputNombre" id="inputNombre" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select name="selectAsunto" class="form-control" required>
                                        <option value="<?php echo $id_notion;?>">Reportar idea</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <textarea class="form-control" name="inputMensaje" rows="5" required placeholder="Mensaje"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="info"></div>
                                    <button type="submit" class="btn btn-default pull-right send-message">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.col-lg-12 -->

            </div><!-- /.row -->

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->

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
                //$this->load->view('layouts/register_noise');
            else:
                $this->load->view('layouts/login_form');
                $this->load->view('layouts/register_form');
                $this->load->view('msg_activate');
            endif;

            $activate = $this->session->keep_flashdata('activate');
            if ($activate):
                echo $activate;
            endif;
        ?>

    </body>

</html>