<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('layouts/head_web');?>

    <body class="bg_page bg_publico">

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
            <div class="row">

                <div class="col-lg-10 col-lg-offset-1">
                    <div class="col-lg-12">
                        <div class="row">
                            <h1 class="public-h1">Público</h1>
                        </div>
                        <div class="row nota-public">
                            <h2 class="public-h2">Estamos preparándonos para unir a más países</h2>
                            <p class="public-p">Cuanto más crezca esta red, más eventos increibles podrán ser compartidos y llevados a tu ciudad.</p>
                            <p class="public-p">Únete para llegar al tuyo. Necesitamos reunir a una gran cantidad de público que nos facilite convencer a patrocinadores locales para llegar muy cerca de ti.</p>
                            <center><img src="<?=base_url().$web_upload;?>events-heavenly-header.jpg" class="img-responsive"></center>
                        </div>
                        <div class="row nota-public">
                            <h2 class="public-h2">Estamos preparándonos para unir a más países</h2>
                            <p class="public-p">Cuanto más crezca esta red, más eventos increibles podrán ser compartidos y llevados a tu ciudad.</p>
                            <p class="public-p">Únete para llegar al tuyo. Necesitamos reunir a una gran cantidad de público que nos facilite convencer a patrocinadores locales para llegar muy cerca de ti.</p>
                            <center><img src="<?=base_url().$web_upload;?>events-heavenly-header.jpg" class="img-responsive"></center>
                        </div>
                    </div>
                </div><!-- /.col-lg-6 -->

                <div class="col-lg-10 col-lg-offset-1 map-public">
                    <img src="<?=base_url().$web_img;?>images/map.png" class="img-responsive">
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
        <script type="text/javascript">
            window.onload = function(){
                var options =
                {
                    srcNode: '.grid-event',             // grid items (class, node)
                    margin: '26px',             // margin in pixel, default: 0px
                    width: '220px',             // grid item width in pixel, default: 220px
                    max_width: '',              // dynamic gird item width if specified, (pixel)
                    resizable: true,            // re-layout if window resize
                    transition: 'all 0.5s ease' // support transition for CSS3, default: all 0.5s ease
                }
                document.querySelector('.grid').gridify(options);
            }
        </script>

    </body>

</html>