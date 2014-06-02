<!DOCTYPE html>
<html lang="en">

<?php   $this->load->view('layouts/head_dashboard'); ?>

<body>
<!-- container section start -->
<section id="container" class="">

    <?php   $this->load->view('layouts/header_dashboard');?>

    <?php   $this->load->view('layouts/navigation_dashboard');?>

    <!--main content start-->
    <section id="main-content">

        <section class="wrapper">

            <?php   $this->load->view('layouts/breadcrumb_dashboard'); ?>

            <!--mail inbox start-->
            <div class="inbox-wrapper">
                <aside class="inbox-left">
                    <div class="inbox-left-menu">
                        <div class="user-head">
                            <div class="timeline-ava">
                                <img src="<?=$base_css_js;?>img/profile-widget-avatar.jpg" alt="">
                            </div>
                            <div class="user-name">
                                <h5><a href="#">Menú</a></h5>
                                <span>Listado de menús</span>
                            </div>
                        </div>
                    </div>
                    <div class="inbox-body">
                        <a class="btn btn-success compose-mail" data-toggle="modal" href="#myModal">
                            <i class="icon_pencil-edit"></i> Crear menú
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                        <h4 class="modal-title">Crear menú</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" data-async id="menuForm" action="<?=site_url();?>perfil/create_menu" method="post">
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">Nombre</label>
                                                <div class="col-lg-10">
                                                    <input type="hidden" value="<?=site_url();?>perfil/create_menu">
                                                    <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Nombre">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">Parent</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control m-bot15" name="inputParent" id="inputParent">
                                                        <option value="0">Seleccionar</option>
                                                        <?php foreach($array_menu as $item):?>
                                                            <option value="<?=$item->id_menu;?>"><?=$item->name_menu;?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button id="submitCloseForm" class="btn btn-default" type="button">Cancelar</button>
                                                    <button class="btn btn-send" id="submitCreateMenu">Crear menú</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    </div>
                    <ul class="inbox-nav inbox-divider" id="list_menu">
                        <?php foreach($array_menu as $item):?>
                        <li>
                            <a href="#" id="<?=$item->id_menu;?>">
                                <i class="icon_menu"></i> <?=$item->name_menu;?>
                                <span class="label label-danger pull-right">
                                    <button type="button" class="close tooltips deleteMenu" data-placement="right" data-original-title="Eliminar <?=$item->name_menu;?>">×</button>
                                </span>
                            </a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </aside>
                <aside class="inbox-middle">
                    <div class="inbox-mail">
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </div>
                    <ul class="mail-nav">
                        <li class="">
                            <a href="#">
                                    <span class="profile-ava">
                                        <i class="icon_star_alt"></i>
                                        <img alt="" class="simple" src="<?=$base_css_js;?>img/avatar1_small.jpg">
                                    </span>
                                    <span class="mail-info">
                                        <span class="mail-sender-name"><strong>Rena Rios</strong></span>
                                    </span>
                                <p>Project Demo : Only 24 Hours Left to Save 30%</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                    <span class="profile-ava">
                                        <i class="icon_star_alt"></i>
                                        <img alt="" class="simple" src="<?=$base_css_js;?>img/avatar-mini.jpg">
                                    </span>
                                    <span class="mail-info">
                                        <span class="mail-sender-name"><strong>Robin Mathis</strong></span>
                                    </span>
                                <p>Project Design Task : Pellentesque habitant morbi tristique </p>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                    <span class="profile-ava">
                                        <i class="icon_star_alt"></i>
                                        <img alt="" class="simple" src="<?=$base_css_js;?>img/avatar-mini2.jpg">
                                    </span>
                                    <span class="mail-info">
                                        <span class="mail-sender-name"><strong>Bennie Gilliam</strong></span>
                                    </span>
                                <p>Pellentesque habitant morbi tristique.</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                    <span class="profile-ava">
                                        <i class="icon_star_alt"></i>
                                        <img alt="" class="simple" src="<?=$base_css_js;?>img/avatar-mini3.jpg">
                                    </span>
                                    <span class="mail-info">
                                        <span class="mail-sender-name"><strong>Eddy Wilcox</strong></span>
                                    </span>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                    <span class="profile-ava">
                                        <i class="icon_star_alt"></i>
                                        <img alt="" class="simple" src="<?=$base_css_js;?>img/avatar1_small.jpg">
                                    </span>
                                    <span class="mail-info">
                                        <span class="mail-sender-name"><strong>Rena Rios</strong></span>
                                    </span>
                                <p>Project Demo : Only 24 Hours Left to Save 30%</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                    <span class="profile-ava">
                                        <i class="icon_star_alt"></i>
                                        <img alt="" class="simple" src="<?=$base_css_js;?>img/avatar-mini.jpg">
                                    </span>
                                    <span class="mail-info">
                                        <span class="mail-sender-name"><strong>Robin Mathis</strong></span>
                                    </span>
                                <p>Project Design Task : Pellentesque habitant morbi tristique </p>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                    <span class="profile-ava">
                                        <i class="icon_star_alt"></i>
                                        <img alt="" class="simple" src="<?=$base_css_js;?>img/avatar-mini2.jpg">
                                    </span>
                                    <span class="mail-info">
                                        <span class="mail-sender-name"><strong>Bennie Gilliam</strong></span>
                                    </span>
                                <p>Pellentesque habitant morbi tristique.</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                    <span class="profile-ava">
                                        <i class="icon_star_alt"></i>
                                        <img alt="" class="simple" src="<?=$base_css_js;?>img/avatar-mini3.jpg">
                                    </span>
                                    <span class="mail-info">
                                        <span class="mail-sender-name"><strong>Eddy Wilcox</strong></span>
                                    </span>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                            </a>
                        </li>
                    </ul>
                </aside>
                <aside class="inbox-right">
                    <div class="inbox-head">
                        <div class="mail-option">

                            <div class="btn-group">
                                <a class="btn mini tooltips" href="#" data-toggle="dropdown" data-placement="top" data-original-title="Refresh">
                                    <i class="icon_refresh"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a class="btn mini" href="#">
                                    <i class="icon_trash_alt"></i>
                                    Delete
                                </a>
                            </div>

                            <div class="btn-group">
                                <a class="btn mini blue" href="#" data-toggle="dropdown">
                                    <i class="icon_folder_download"></i>
                                    Move to
                                    <i class="arrow_carrot-down "></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="icon_folder-alt"></i> Folder 1</a></li>
                                    <li><a href="#"><i class="icon_folder-alt"></i> Folder 2</a></li>
                                    <li><a href="#"><i class="icon_folder-alt"></i> Folder 3</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon_error-triangle_alt"></i> Spam</a></li>
                                    <li><a href="#"><i class="icon_trash_alt"></i> Delete</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon_folder-add_alt"></i> Create Folder</a></li>
                                </ul>
                            </div>
                            <div class="btn-group">
                                <a class="btn mini" href="#">
                                    <i class="icon_error-triangle_alt"></i>
                                    Spam
                                </a>
                            </div>
                            <div class="btn-group hidden-phone">
                                <a class="btn mini blue" href="#" data-toggle="dropdown">
                                    <i class="icon_ol"></i>
                                    More
                                    <i class="arrow_carrot-down "></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"> Mark as Read</a></li>
                                    <li><a href="#"> Mark as Unread</a></li>
                                    <li><a href="#"> Star</a></li>
                                    <li><a href="#"> Clear Star</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon_printer"></i> Print</a></li>
                                </ul>
                            </div>
                            <ul class="unstyled inbox-pagination">
                                <li>
                                    <a href="#" class="np-btn"><i class="arrow_carrot-left_alt2  pagination-left"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="np-btn"><i class="arrow_carrot-right_alt2 pagination-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="inbox-body">
                        <div class="open-mail-top">
                            <div class="row">
                                <div class="col-lg-4">
                                            <span class="profile-ava">
                                                <i class="icon_star_alt"></i>
                                                <img alt="" class="simple" src="<?=$base_css_js;?>img/avatar1_small.jpg">
                                                John Smith <i class="arrow_triangle-down_alt2"></i>
                                            </span>
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-6">
                                            <span class="open-mail-action pull-right">
                                                <i class="icon_paperclip"></i>
                                                <i class="icon_chat_alt"></i>
                                                <i class="icon_image"></i>
                                                <i class="icon_ribbon_alt"></i>
                                                <i class="icon_clock_alt"></i>  11:45 AM
                                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="open-mail-content">
                            <h3>Header Level 3</h3>
                            <p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>

                            <ol>
                                <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                <li>Aliquam tincidunt mauris eu risus.</li>
                            </ol>

                            <ul>
                                <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                <li>Aliquam tincidunt mauris eu risus.</li>
                            </ul>
                            <div class="chat-form">
                                <div class="input-cont ">
                                    <textarea type="text" class="form-control col-lg-12" rows="3"placeholder="Type your replay here..."></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="pull-right chat-features">
                                        <a href="javascript:;">
                                            <i class="icon_image"></i>
                                        </a>
                                        <a href="javascript:;">
                                            <i class="icon_paperclip"></i>
                                        </a>
                                        <a class="btn btn-primary" href="javascript:;">Replay</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <!--mail inbox end-->

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
