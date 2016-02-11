                    <div class="navbar-collapse collapse pull-right" id="menu">
                        <ul class="nav nav-pills">
                            <?php echo($this->menu->output());?>
                            <?php if($status_login == "not_login"):?>
                            <li>
                                <a href="#login" data-toggle="modal" data-target="#myFormLogin"><span class="icon icon-elusive-icons-58"></span>Login</a>
                            </li>
                            <li>
                                <a href="#login" data-toggle="modal" data-target="#myFormRegister"><span class="icon icon-pencil"></span>REGISTRARSE</a>
                            </li>
                            <?php else:?>
                            <li>
                                <div class="dropdown">
                                    <a id="dLabel" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon icon-elusive-icons-58"></span><?=$this->session->userdata('username');?><span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <?php if($this->session->userdata('id_profile')==2):?>
                                        <li><a href="<?php echo site_url('mi-cuenta');?>"><span class="icon icon-widget"></span>Cuenta</a></li>
                                        <li><a href="<?=site_url('web/logout');?>"><span class="icon-logout"></span> Cerrar sesión</a></li>
                                        <?php
                                        endif;
                                        if($this->session->userdata('id_profile') == 1 || $this->session->userdata('id_profile')==3):
                                        ?>
                                        <li><a href="<?=site_url('dashboard');?>"><span class="icon icon-elusive-icons-204"></span> Dashboard</a></li>
                                        <li><a href="<?=site_url('web/logout');?>"><span class="icon-logout"></span> Cerrar sesión</a></li>
                                        <?php endif;?>
                                    </ul>
                                </div>
                            </li>
                            <?php endif;?>
                        </ul>
                    </div>
