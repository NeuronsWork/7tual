                    <ul id="menu-principal" class="menu-principal">
                        <?php echo($this->menu->output());?>
                        <?php if($status_login == "not_login"):?>
                        <li class="menu-principal__item"><a href="#" id="login-toggle" data-toggle="modal" data-target="#login-modal" class="menu-principal__link icon-login espacio">Login</a></li>
                        <li class="menu-principal__item"><a href="#" id="signup-toggle" data-toggle="modal" data-target="#login-modal" class="menu-principal__link icon-usuario espacio">Registrarse</a></li>
                        <?php
                        else:
                            if($this->session->userdata('id_profile')==2):
                        ?>
                                <li class="menu-principal__item"><a href="<?php echo site_url('mi-cuenta');?>" class="menu-principal__link espacio">Cuenta</a></li>
                                <li class="menu-principal__item"><a href="<?=site_url('web/logout');?>" class="menu-principal__link espacio">Cerrar Sesión</a></li>
                        <?php
                            endif;
                            if($this->session->userdata('id_profile') == 1 || $this->session->userdata('id_profile')==3):
                        ?>
                                <li class="menu-principal__item"><a href="<?=site_url('dashboard');?>" class="menu-principal__link espacio">Dashboard</a></li>
                                <li class="menu-principal__item"><a href="<?=site_url('web/logout');?>" class="menu-principal__link espacio">Cerrar Sesión</a></li>
                        <?php
                            endif;
                        endif;
                        ?>
                    </ul>
