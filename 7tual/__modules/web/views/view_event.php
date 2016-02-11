<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('layouts/head_web');?>

    <?php foreach ($view_event as $event):?>
    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo $event->title;?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content=" <?php echo current_url();?>" />
    <meta property="og:image" content="<?=base_url().$web_upload.'evento/'.$event->image_video;?>" />
    <meta property="og:description" content="<?php echo $event->title;?>" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="7Tual">
    <meta name="twitter:title" content="<?php echo $event->title;?>">
    <meta name="twitter:description" content="<?php echo $event->title;?>">
    <meta name="twitter:creator" content="7Tual">
    <?php endforeach;?>

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
                                        <?php if($this->session->userdata('id_usuario')!=''):?>
                                        <input type="hidden" id="user_id" value="<?php echo $this->session->userdata('id_usuario')?>">
                                        <?php endif;?>
                                        <input type="hidden" id="url_meapunto" value="<?php echo site_url('web/me_apunto');?>">
                                        <input type="hidden" id="url_removeapunto" value="<?php echo site_url('web/remove_apunto');?>">

                                        <div class="row item view_event" id="<?=$view_event[0]->id_event;?>">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slide-row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 info">
                                                    <!--<h2><echo $view_event[0]->title;?></h2>-->
                                                    <center><img class="img-responsive" src="<?php echo base_url().'upload/evento/'.$view_event[0]->image_video;?>"></center>
                                                    <div class="slide-row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 info">
                                                            <h2><?php echo $view_event[0]->title;?></h2>
                                                            <dl class="dl-horizontal">
                                                                <dt>Categoría</dt>
                                                                <dd><?php echo $view_event[0]->name_category;?></dd>
                                                                <dt>País</dt>
                                                                <dd><?php echo $view_event[0]->name_country;?></dd>
                                                                <dt>Ciudad</dt>
                                                                <dd><?php echo $view_event[0]->name_city;?></dd>
                                                                <dt>Fecha de creación</dt>
                                                                <dd><?php
                                                                $datestring1 = "%Y-%m-%d";
                                                                echo mdate($datestring1,  strtotime($view_event[0]->date_created));?></dd>
                                                                <dt>Descripción:</dt>
                                                                <dd><?php echo $view_event[0]->description;?></dd>
                                                            </dl>
                                                        </div>
                                                        <div class="slide-counter like" id="like-<?php echo $view_event[0]->id_event;?>" data-counter="<?php echo $view_event[0]->likes;?>">
                                                            <?php
                                                                if($view_event[0]->likes == "" || $view_event[0]->likes == 0): echo "+0";
                                                                else: echo "+".$view_event[0]->likes;
                                                                endif;
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12 noise">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 list-noise">
                                        <input type="hidden" id="base_url" value="<?=base_url('idea');?>">
                                        <div class="row item view_event" id="<?=$view_event[0]->id_event;?>">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slide-row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 video">
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$view_event[0]->video;?>?rel=0&amp;controls=0" frameborder="0" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <div class="slide-footer">
                                                    <span class="pull-right buttons">
                                                        <div class="btn-group dropup">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><span class="icon icon-share-1"></span></button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <div class="fb-share-button" data-href="<?php current_url();?>" data-layout="button"></div>
                                                                </li>
                                                                <li>
                                                                    <a href="https://twitter.com/share" class="twitter-share-button" data-via="neyberbz" data-size="large" data-count="none">Tweet</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!--<button class="btn"><span class="icon icon-medal-rank-star"></span></button>-->
                                                        <?php if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1): ?>

                                                            <?php
                                                            $sw=0;
                                                            foreach ($list_event_like as $item){
                                                                if($view_event[0]->id_event == $item->id_event){
                                                            ?>
                                                                <button data-id="<?php echo $view_event[0]->id_event;?>" class="btn me_apunto hidden" id="btn_<?php echo $view_event[0]->id_event;?>"><span class="icon icon-medal-rank-star"></span></button>
                                                                <button data-id="<?php echo $view_event[0]->id_event;?>" class="btn remove_apunto" id="btn__<?php echo $view_event[0]->id_event;?>"><span class="icon icon-medal-rank-star"></span></button>
                                                            <?php
                                                                    $sw = 1;
                                                                }
                                                            }
                                                            ?>

                                                            <?php
                                                                if($sw==0){?>
                                                                <button data-id="<?php echo $view_event[0]->id_event;?>" class="btn me_apunto" id="btn_<?php echo $view_event[0]->id_event;?>"><span class="icon icon-medal-rank-star"></span></button>
                                                                <button data-id="<?php echo $view_event[0]->id_event;?>" class="btn remove_apunto hidden" id="btn__<?php echo $view_event[0]->id_event;?>"><span class="icon icon-medal-rank-star"></span></button>
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row" id="comment">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-comment">
                                        <?php if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1): ?>
                                        <form action="<?php echo site_url('noise/add_comment');?>" method="POST" id="form_add_comment" name="form_add_comment">
                                            <div class="form-group">
                                                <input type="hidden" name="id_notion" value="<?php echo $view_event[0]->id_event;?>">
                                                <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_usuario')?>">
                                                <input type="hidden" name="tipo_comment" value="2">
                                                <textarea class="form-control" rows="3" name="comment" id="comment"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success pull-right">Enviar</button>
                                            </div>
                                            <div class="info alert alert-success pull-left" role="alert"></div>
                                        </form>
                                        <?php else:?>
                                            <p>Debe iniciar sesión para comentar.</p>
                                        <?php endif;?>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12 list-comment">
                                        <div class="item-comment">
                                            <?php foreach ($list_comment_event as $comment) { ?>
                                            <div class="comment">
                                                <blockquote>
                                                    <p><?php echo $comment['comment'];?></p>
                                                    <footer><strong><?php echo $comment['user'];?></strong> | <cite title="Source Title"><strong><?php echo $comment['date_created'];?></strong></cite></footer>
                                                </blockquote>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 featured-noise">
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
                                                    if($item['like'] == "" || $item['like'] == 0): echo "+0";
                                                    else: $item['like'];
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
                        </div>-->
                    </div>

                </div>
            </div>
        </div>


        <?php $this->load->view('layouts/footer_web');?>

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
