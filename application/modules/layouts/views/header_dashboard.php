            <!--header start-->
            <header class="header white-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
                </div>

                <!--logo start-->
                <a href="#" class="logo">Endo<span>lab</span></a>
                <!--logo end-->

                <div class="top-nav notification-row">
                    <!-- notificatoin dropdown start-->
                    <ul class="nav pull-right top-menu">
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                            <span class="profile-ava">
                                                <img alt="" src="<?=base_url();?>public/img/avatar1_small.jpg">
                                            </span>
                                            <span class="username">
                                                <?=$this->session->userdata('username');?> /
                                                <?php
                                                foreach ($profile as $item):
                                                    echo $item;
                                                endforeach;
                                                ?>
                                            </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top">
                                    <a href="#"><i class="icon_profile"></i> Mi cuenta</a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>login/logout"><i class="icon_key_alt"></i>Cerrar sesion</a>
                                </li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!-- notificatoin dropdown end-->
                </div>
            </header>
            <!--header end-->