            <!-- .header -->
            <header class="bg-dark dk header navbar navbar-fixed-top-xs">
                <div class="navbar-header aside-md">
                    <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                        <i class="fa fa-bars"></i>
                    </a>
                    <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="<?=base_url().$admin_img;?>images/logo.png" class="m-r-sm">7tual</a>
                    <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                        <i class="fa fa-cog"></i>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="thumb-sm avatar pull-left">
                                <img src="<?=base_url().$admin_img;?>images/avatar.png">
                            </span>
                            <?=$this->session->userdata('username');?> /
                            <?php
                            foreach ($profile as $item):
                            echo $item;
                            endforeach;
                            ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight">
                            <span class="arrow top"></span>
                            <li><a href="<?php echo site_url();?>" target="_blank">Web</a></li>
                            <!--<li><a href="profile.html">Perfil</a></li>
                            <li>
                                <a href="#">
                                    <span class="badge bg-danger pull-right">0</span> Notificaciones
                                </a>
                            </li>
                            <li><a href="docs.html">Documentación</a></li>-->
                            <li class="divider"></li>
                            <li>
                                <a href="<?=base_url();?>manager/logout">Cerrar sesión</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </header>
            <!-- /.header -->
