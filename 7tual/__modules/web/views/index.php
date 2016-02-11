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

        <?php $this->load->view('layouts/slider_page');?>
        <?php $this->load->view('layouts/notion-event');?>
        <?php $this->load->view('layouts/sub_menu');?>

        <div class="container-fluid" id="content-wrapper">

            <div class="row row-offcanvas row-offcanvas-left">

                <?php $this->load->view('layouts/menu_options_web');?>

                <div class="col-lg-11 col-sm-9 col-md-9 content main" id="wrapper_box">

                    <div class="row grid">
                        <?php
                        foreach($list_events as $event):
                        ?>
                        <div class="grid-event">
                            <a href="<?php echo site_url('evento/'.$event->slug);?>"><img src="<?php echo base_url().$web_upload.'evento/'.$event->image_video;?>" class="img-responsive" alt=""></a>
                            <div class="row description">
                                <div class="col-md-9 col-sm-8 col-xs-8">
                                    <p><a href="<?php echo site_url('evento/'.$event->slug);?>"><?php echo $event->title;?></a></p>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-4">
                                    <h3>
                                    <?php
                                        $datestring = "%d";
                                        echo mdate($datestring,  strtotime($event->date_created));
                                    ?>
                                    </h3>
                                    <h4>
                                    <?php
                                        $datestring1 = "%m";
                                        $m = mdate($datestring1,  strtotime($event->date_created));
                                        switch($m) {
                                        case 1: echo 'ENE'; break;
                                        case 2: echo 'FEB'; break;
                                        case 3: echo 'MAR'; break;
                                        case 4: echo 'MAY'; break;
                                        case 5: echo 'ABR'; break;
                                        case 6: echo 'JUN'; break;
                                        case 7: echo 'JUL'; break;
                                        case 8: echo 'AGO'; break;
                                        case 9: echo 'SET'; break;
                                        case 10: echo 'OCT'; break;
                                        case 11: echo 'NOV'; break;
                                        default:
                                        echo 'DIC';
                                        }
                                    ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <?php
                        endforeach;
                        ?>
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
                //$this->load->view('layouts/register_noise');
                //echo "dd";
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
