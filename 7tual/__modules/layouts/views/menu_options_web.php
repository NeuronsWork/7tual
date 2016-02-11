                <div class="col-lg-1 col-sm-3 col-md-3 sidebar-offcanvas" id="menu-options" role="navigation">

                    <input type="hidden" id="url_list_city" value="<?php echo site_url('noise/list_city_v1');?>">
                    <input type="hidden" id="url_search_join" value="<?php echo site_url('noise/list_noise_search_join');?>">
                    <input type="hidden" id="id_others" value="">

                    <ul class="nav nav-sidebar" id="nav-sidebar">
                        <li>
                            <?php if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1): ?>
                                <a href="#me-apunto" data-toggle="modal" data-target="#myFormRegisternoise" class="btn">AÑADIR <span class="icon icon-plus-3"></span></a>
                            <?php else: ?>
                                <a tabindex="0" class="btn btn-lg btn-danger popup" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Necesitar haber iniciado sesion para añadir una idea">AÑADIR <span class="icon icon-plus-3"></span></a>
                            <?php endif; ?>
                        </li>
                        <li>
                            <a href="#buscador" class="btn btn-search">BUSCAR <span class="icon icon-search"></span></a>
                        </li>
                        <li><hr></li>
                        <li>
                            <select name="select-country" id="select-country" class="select-country">
                                <option value="All" selected>Todos los paises</option>
                                <?php foreach ($list_country as $country) { ?>
                                <option value="<?php echo $country->code_country;?>"><?php echo $country->name_country;?></option>
                                <?php } ?>
                            </select>
                            <div id="viewCity" style="display: none;">
                                 <select name="select-city" id="select-city" class="select-city" data-placeholder="Escoger ciudad"></select>
                            </div>
                        </li>
                        <li><hr></li>
                        <li>
                            <select name="select-category" id="select-category" class="select-category" data-placeholder="Escoger ciudad">
                                    <option value="">Categoría</option>
                                    <option value="ALL">Todas</option>
                                <?php foreach ($list_category as $item):?>
                                    <option value="<?php echo $item->id_category;?>"><?=$item->name_category;?></option>
                                <?php endforeach; ?>
                            </select>
                        </li>
                        <li><hr></li>
                        <?php if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1): ?>
                        <li><a href="<?php echo site_url('ideas/favoritos');?>">Favoritos</a></li>
                        <?php endif; ?>
                        <li><a id="btn_recientes" class="id_others" data-id="r">Recientes</a></li>
                        <li><a id="btn_masvotados" class="id_others" data-id="v">Más votados</a></li>
                    </ul>
                </div>


