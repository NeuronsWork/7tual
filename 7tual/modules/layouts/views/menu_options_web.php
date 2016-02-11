                <aside id="sidebar" class="caja web-15">
                    <input type="hidden" id="url_list_city" value="<?php echo site_url('noise/list_city_v1');?>">
                    <input type="hidden" id="url_search_join" value="<?php echo site_url('noise/list_noise_search_join');?>">
                    <input type="hidden" id="id_others" value="">
                    <!-- Menu sidebar-->
                    <ul id="menu-sidebar" class="menu-sidebar">
                        <li class="menu-sidebar__item">
                            <?php if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1): ?>
                                <!--<a href="#me-apunto" data-toggle="modal" data-target="#myFormRegisternoise" class="btn">AÑADIR <span class="icon icon-plus-3"></span></a>-->
                                <a href="#" class="menu-sidebar__link icon-add espacio">Añadir</a>
                            <?php else: ?>
                                <!--<a href="#" class="menu-sidebar__link icon-add espacio">Añadir</a>-->
                            <?php endif; ?>
                        </li>
                        <li class="menu-sidebar__item collapsed-parent search-block"><a href="#" class="menu-sidebar__link icon-buscar espacio">Buscador</a>
                            <input type="search" id="buscador" name="s" class="collapsed s">
                        </li>
                        <li class="menu-sidebar__item collapsed-parent"><a href="#" class="menu-sidebar__link icon-triangulo-abajo espacio">Escoger país</a>
                            <ul class="menu-sidebar--submenu collapsed">
                                <?php foreach ($list_country as $country) { ?>
                                    <li class="menu-sidebar--submenu__item"><a href="<?php echo $country->code_country;?>" class="menu-sidebar--submenu__link"><?php echo $country->name_country;?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="menu-sidebar__item collapsed-parent"><a href="#" class="menu-sidebar__link icon-triangulo-abajo espacio">Escoger categoría</a>
                            <ul class="menu-sidebar--submenu collapsed">
                                <?php foreach ($list_category as $item):?>
                                    <li class="menu-sidebar--submenu__item"><a href="<?php echo $item->id_category;?>" class="menu-sidebar--submenu__link"><?=$item->name_category;?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <?php if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1): ?>
                            <li class="menu-sidebar__item"><a class="menu-sidebar__link icon-triangulo-derecha espacio" href="<?php echo site_url('ideas/favoritos');?>">Favoritos</a></li>
                        <?php endif; ?>
                        <li class="menu-sidebar__item"><a class="id_others menu-sidebar__link icon-triangulo-derecha espacio" id="btn_recientes" data-id="r">Más recientes</a></li>
                        <li class="menu-sidebar__item"><a class="id_others menu-sidebar__link icon-triangulo-derecha espacio" id="btn_masvotados" data-id="v">Más votados</a></li>
                    </ul>
                </aside>


