<html lang="en">

    <?php $this->load->view('layouts/head_web');?>

    <body>

        <!-- NAVBAR
        ================================================== -->

        <div class="navbar-wrapper" id="header">

            <div class="container-fluid">

                <div class="navbar navbar-inverse" role="navigation">

                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?=site_url();?>">7tual</a>
                        </div>

                        <div class="navbar navbar-country pull-left">
                            <input type="hidden" name="country_code" id="country_code" value="">
                            <input type="hidden" name="country" id="country" value="">
                            <div id="country_"></div>
                        </div>

                        <!--<div class="navbar pull-right">
                            <ul class="nav navbar-nav redes-sociales">
                                <li><a href="#"><span class="icon icon-facebook-alt"></span></a></li>
                                <li><a href="#"><span class="icon icon-twitter-circled"></span></a></li>
                                <li><a href="#"><span class="icon icon-youtube-alt"></span></a></li>
                            </ul>
                        </div>-->

                        <?php //$this->load->view('layouts/web_menu'); ?>

                    </div>

                </div>

            </div>

        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-verify">
                    <?php
                    $correcto = $this->session->flashdata('activate');
                    if($correcto):
                        if($correcto == 'good'):
                            echo "<h2>Activación de usuario correcta</h2>";
                            echo "<p>Sera redireccionado(a) en unos segundos...</p>";
                            echo "<p>Por favor espere...</p>";
                    ?>
                            <script>
                                setTimeout(function(){
                                    url = "<?=site_url();?>";
                                    $(location).attr('href',url);
                                },3000);
                            </script>
                    <?php
                        else:
                            echo "<h2>Activación de usuario fallida</h2>";
                        endif;
                    endif; ?>
                </div>
            </div>
        </div>


        <div class="container-fluid divfooter" id="footer">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#">Preguntas Frecuentes</a></li>
                    <li><a href="#">Terminos y condiciones</a></li>
                    <li><a href="#">Público</a></li>
                    <li><a href="#">Empresa</a></li>
                </ul>
            </div>
        </div>

        <?php $this->load->view('layouts/foot_web');?>

        <script>
            $(document).ready(function(){
                $('.divfooter').scrollToFixed({
                    bottom: 0,
                    limit: $('.divfooter').offset().bottom
                });
            });
        </script>

    </body>

</html>
