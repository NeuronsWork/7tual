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
        <?php $this->load->view('layouts/notion-event');?>
        <?php $this->load->view('layouts/sub_menu_1');?>

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
                                        <?php if($this->session->userdata('id_usuario')!=''):?>
                                        <input type="hidden" id="user_id" value="<?php echo $this->session->userdata('id_usuario')?>">
                                        <?php endif;?>
                                        <input type="hidden" id="url_meapunto" value="<?php echo site_url('noise/me_apunto');?>">
                                        <?php
                                        foreach ($view_noise as $noise) {
                                            if($noise->video == ""):
                                        ?>
                                        <div class="row item view_noise" id="<?=$noise->id_notion;?>">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slide-row slide-row-no-img">
                                                <div class="slide-header">
                                                    <div class="pull-left">
                                                        <?=$noise->name_category.' • '.$noise->name_country.' , '.$noise->name_city;?>
                                                    </div>
                                                    <div class="pull-right">
                                                        <?=date("d/m/Y",strtotime($noise->date_created)); ?> • Hace
                                                        <?php
                                                            $fecha_i    = $noise->date_created;
                                                            $fecha_f    = $date_time;
                                                            $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
                                                            $dias = abs($dias);
                                                            $dias = floor($dias);
                                                            if($dias==0){

                                                            }else{
                                                                if($dias==1){
                                                                    echo $dias." día";
                                                                }else{
                                                                    echo $dias." días";
                                                                }
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 video">
                                                    <h2><? echo $noise->title;?></h2>
                                                </div>
                                                <div>
                                                    <p><?php echo $noise->description;?></p>
                                                </div>
                                                <div class="slide-counter" data-counter="<?php echo $noise->likes;?>">
                                                    <?php
                                                        if($noise->likes == "" || $noise->likes == 0): echo "+0";
                                                        else: echo "+".$noise->likes;
                                                        endif;
                                                    ?>
                                                </div>
                                                <div class="slide-footer">
                                                    <span class="pull-right buttons">
                                                        <div class="btn-group dropup">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><span class="icon icon-share-1"></span></button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">Facebook</a></li>
                                                                <li><a href="#">Twitter</a></li>
                                                            </ul>
                                                        </div>
                                                        <!--<button class="btn"><span class="icon icon-medal-rank-star"></span>Me apunto</button>-->
                                                        <?php if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1): ?>

                                                            <?php
                                                            $sw=0;
                                                            foreach ($list_noise_like as $item){
                                                                if($noise->id_notion == $item->id_notion){
                                                            ?>
                                                                <button data-id="<?php echo $noise->id_notion;?>" class="btn remove_apunto" id="btn_<?php echo $noise->id_notion;?>"><span class="icon icon icon-elusive-icons-30"></span></button>
                                                            <?php
                                                                    $sw = 1;
                                                                }
                                                            }
                                                            ?>

                                                            <?php
                                                                if($sw==0){?>
                                                                <button data-id="<?php echo $noise->id_notion;?>" class="btn me_apunto" id="btn_<?php echo $noise->id_notion;?>"><span class="icon icon-medal-rank-star"></span></button>
                                                            <?php
                                                                }
                                                            ?>

                                                        <?php else: ?>

                                                        <a tabindex="1" class="btn popup" role="button" data-toggle="popover" data-trigger="focus" title="Me apunto" data-content="Necesitar haber iniciado sesion para dar me apunto"><span class="icon icon-medal-rank-star"></span></a>

                                                        <?php endif;?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            else:
                                        ?>
                                        <div class="row item view_noise" id="<?=$noise->id_notion;?>">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slide-row">
                                                <div class="slide-header">
                                                    <div class="pull-left">
                                                        <?=$noise->name_category.' • '.$noise->name_country.' , '.$noise->name_city;?>
                                                    </div>
                                                    <div class="pull-right">
                                                        <?=date("d/m/Y",strtotime($noise->date_created)); ?> • Hace <?php
                                                            $fecha_f = $date_time;
                                                            $fecha_i =  $noise->date_created;
                                                            $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
                                                            $dias = abs($dias);
                                                            $dias = floor($dias);
                                                            //echo $dias."///";
                                                            if($dias==0){

                                                            }else{
                                                                if($dias==1){
                                                                    echo $dias." día";
                                                                }else{
                                                                    echo $dias." días";
                                                                }
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 video">
                                                    <h2><? echo $noise->title;?></h2>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <?php list($url, $idVideo) = explode("=", $noise->video); ?>
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$idVideo;?>?rel=0&amp;controls=0" frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p><?php echo $noise->description;?></p>
                                                </div>
                                                <div class="like">
                                                    <?php
                                                        if($noise->likes == "" || $noise->likes == 0): echo "+0";
                                                        else: echo "+".$noise->likes;
                                                        endif;
                                                    ?>
                                                </div>
                                                <div class="slide-footer">
                                                    <span class="pull-right buttons">
                                                        <div class="btn-group dropup">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><span class="icon icon-share-1"></span></button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">Facebook</a></li>
                                                                <li><a href="#">Twitter</a></li>
                                                            </ul>
                                                        </div>
                                                        <!--<button class="btn"><span class="icon icon-medal-rank-star"></span>Me apunto</button>-->
                                                        <?php if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1): ?>

                                                            <?php
                                                            $sw=0;
                                                            foreach ($list_noise_like as $item){
                                                                if($noise->id_notion == $item->id_notion){
                                                            ?>
                                                                <button data-id="<?php echo $noise->id_notion;?>" class="btn remove_apunto" id="btn_<?php echo $noise->id_notion;?>"><span class="icon icon icon-elusive-icons-30"></span></button>
                                                            <?php
                                                                    $sw = 1;
                                                                }
                                                            }
                                                            ?>

                                                            <?php
                                                                if($sw==0){?>
                                                                <button data-id="<?php echo $noise->id_notion;?>" class="btn me_apunto" id="btn_<?php echo $noise->id_notion;?>"><span class="icon icon-medal-rank-star"></span></button>
                                                            <?php
                                                                }
                                                            ?>

                                                        <?php else: ?>

                                                        <a tabindex="1" class="btn popup" role="button" data-toggle="popover" data-trigger="focus" title="Me apunto" data-content="Necesitar haber iniciado sesion para dar me apunto"><span class="icon icon-medal-rank-star"></span></a>

                                                        <?php endif;?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            endif;
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 featured-noise">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">Destacados</div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 list-featured-noise">

                                    <?php
                                    foreach ($list_noise_vip as $item):
                                    ?>
                                        <div class="row item">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slide-row slide-row-no-img">
                                                <div class="slide-content" data-url="<?=$item['slug'];?>">
                                                    <p>
                                                        <strong><?=$item['title'];?></strong> •<?=$item['description'];?>
                                                    </p>
                                                </div>
                                                <div class="slide-counter">
                                                    <?php
                                                    if($item['likes'] == "" || $item['likes'] == 0): echo "+0";
                                                    else: echo "+".$item['likes'];
                                                    endif;
                                                    ?>
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
