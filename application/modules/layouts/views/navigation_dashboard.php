            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a class="" href="<?=site_url();?>dashboard">
                                <i class="icon_house_alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_toolbox_alt"></i>
                                <span>Principales</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?=site_url();?>"><i class="icon-tasks"></i>Pacientes</a></li>
                                <li><a class="" href="<?=site_url('medico');?>"><i class="icon-tasks"></i>Medicos</a></li>
                                <li class="sub-menu">
                                    <a class="" href="javascript:;">
                                        <i class="icon-tasks"></i>
                                        <span>Compañias</span>
                                        <span class="menu-arrow icon-level-down"></span>
                                    </a>
                                    <ul class="sub" style="display: none;">
                                        <li><a class="" href="<?=site_url();?>"><i class="icon-user-md"></i>Seguros</a></li>
                                        <li><a class="" href="<?=site_url();?>"><i class="icon-user-md"></i>Laboral</a></li>
                                    </ul>
                                </li>
                                <li><a class="" href="<?=site_url();?>"><i class="icon-tasks"></i>Rangos</a></li>
                                <li><a class="" href="<?=site_url();?>"><i class="icon-tasks"></i>Especialidades</a></li>
                                <li><a class="" href="<?=site_url();?>"><i class="icon-tasks"></i>Tipo de analisis</a></li>
                                <li><a class="" href="<?=site_url();?>"><i class="icon-tasks"></i>Nombre de la lista</a></li>
                                <li><a class="" href="<?=site_url();?>"><i class="icon-tasks"></i>Precios de la lista</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a class="" href="javascript:;">
                                <i class="icon_document_alt"></i>
                                <span>Metodos y Relación</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?=site_url('metodos');?>"><i class="icon_flowchart"></i>Relación de Codigos para un metodo</a></li>
                                <li><a class="" href="<?=site_url();?>"><i class="icon_flowchart"></i>Relación de Codigos con Metodos</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a class="" href="javascript:;">
                                <i class="icon_genius"></i>
                                <span>Analisis</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li class="sub-menu">
                                    <a class="" href="javascript:;">
                                        <i class="icon-tasks"></i>
                                        <span>Procesos de Analisis</span>
                                        <span class="menu-arrow icon-level-down"></span>
                                    </a>
                                    <ul class="sub" style="display: none;">
                                        <li><a class="" href="<?=site_url();?>"><i class="icon-stethoscope"></i>Ingreso de Analisis</a></li>
                                        <li><a class="" href="<?=site_url();?>"><i class="icon-stethoscope"></i>Evaluación de Analisis</a></li>
                                        <li><a class="" href="<?=site_url();?>"><i class="icon-stethoscope"></i>Resultados</a></li>
                                    </ul>
                                </li>
                                <li><a class="" href="<?=site_url();?>"><i class="icon-tasks"></i>Busqueda de Analisis</a></li>
                                <li><a class="" href="<?=site_url();?>"><i class="icon-tasks"></i>Actualizar</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_piechart"></i>
                                <span>Reportes</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?=site_url();?>"><i class="icon-tasks"></i>Reportes</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_tool"></i>
                                <span>Utilitarios</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?=site_url();?>"><i class="icon-tasks"></i>Utilitarios</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a class="" href="javascript:;">
                                <i class="icon_cog"></i>
                                <span>Sistema</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li class="sub-menu">
                                    <a class="" href="javascrip:;">
                                        <i class="icon_group"></i>
                                        <span>Perfil & Modulos</span>
                                        <span class="menu-arrow icon-level-down"></span>
                                    </a>
                                    <ul class="sub" style="display: none;">
                                        <li><a class="" href="<?=site_url('perfilusuario');?>"><i class="icon_menu"></i>Usuarios/Perfiles</a></li>
                                        <li><a class="" href="<?=site_url('menumodelo');?>"><i class="icon_menu"></i>Menu/Modulos</a></li>
                                    </ul>
                                </li>
                                <li><a class="" href="<?=site_url();?>login/logout"><i class="icon-cloud"></i>Backup DB</a></li>
                                <li><a class="" href="<?=site_url();?>login/logout"><i class="icon-signout"></i>Cerrar sesion</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->