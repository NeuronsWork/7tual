        <div class="container-fluid" id="sub-menu">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <input type="hidden" id="url_city" value="<?=base_url();?>noise/list_city/">
                <input type="hidden" id="url_search_location" value="<?=base_url();?>search/">
                <input type="hidden" id="codido_pais" value="">

                <ul class="nav nav-pills pull-left submenu0">
                    <li class="active">
                        <a href="<?=site_url('web');?>">
                            <span class="icon icon-elusive-icons-104"></span>Eventos</a>
                            <button type="button" id="menu-toggle" class="btn navbar-toggle btn-primary btn-xs" data-toggle="offcanvas">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                    </li>
                    <li>
                        <a href="<?=site_url('ideas');?>">
                            <span class="icon icon-elusive-icons-173"></span>Ideas
                        </a>
                    </li>
                </ul>
                <!--<ul class="nav nav-pills pull-right submenu2">
                    <li><a href="#"><span class="icon icon-share-1"></span>Redes</a></li>
                    <li><a href="#"><span class="icon icon-trophy"></span>Concursos</a></li>
                </ul>-->
            </div>
        </div>