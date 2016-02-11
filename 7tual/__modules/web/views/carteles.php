<html lang="en">

    <?php $this->load->view('layouts/head_web');?>

<body>

    <!-- NAVBAR
    ================================================== -->

    <div class="navbar-wrapper">

        <div class="container">

            <div class="navbar navbar-inverse navbar-static-top" role="navigation">

                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?=site_url();?>"><img src="<?=$web_img;?>images/logo.png" class="img-responsive"></a>
                    </div>

                    <div class="navbar pull-right">
                        <ul class="nav navbar-nav redes-sociales">
                            <li><a href="#"><span class="icon icon-facebook-1"></span></a></li>
                            <li><a href="#"><span class="icon icon-twitter-1"></span></a></li>
                            <li><a href="#"><span class="icon icon-youtube-alt"></span></a></li>
                        </ul>
                    </div>

                    <?php $this->load->view('layouts/web_menu'); ?>

                </div>

            </div>

        </div>

    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide carousel-index" data-ride="carousel">

        <div class="carousel-inner">

            <div class="item active">
                <div class="container">
                    <div class="carousel-caption rotate">
                        <p>
                            <a class="btn-play-video venobox" data-type="youtube" href="http://www.youtu.be/LYZ6gXWZfZM">
                                ¿Que es 7tual?
                            </a>
                        </p>
                        <a href="#" class="conocerte pull-left">
                            <span>Conoce</span><br>
                            <span>Las propuestas de<br>ocio de varios<br>lugares!</span>
                        </a>
                        <a href="#" class="unete pull-left">
                            <span>unete</span><br>
                            <span>A TU CIUDAD PARA<br>ELEGIR TUS<br>FAVORITOS!</span>
                        </a>
                        <a href="#" class="disfruta pull-left">
                            <span>disfruta</span><br>
                            <span>MUY CERCA DE LOS<br>MEJORES EVENTOS<br>CON AYUDA DE LAS<br>EMPRESAS!</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!--<a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span><i class="fa fa-chevron-circle-left"></i></span>
        </a>-->

        <a class="right carousel-control" href="<?=site_url('publico');?>">
            <span><i class="fa fa-chevron-circle-right"></i></span>
        </a>

        <div class="register-terms">
            <div class="container">
                <div class="row">
                    <ul class="pull-right">
                        <li class="pull-right">
                            <a class="register pull-right dropdown-toggle" href="#" data-toggle="dropdown">Registrate</a>
                            <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                                <li>
                                   <div class="row">
                                      <div class="col-md-12">
                                         <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                <select class="form-control">
                                                    <option>País</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                               <label class="sr-only" for="exampleInputPassword2">Password</label>
                                               <select class="form-control">
                                                    <option>Ciudad</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                               <label class="sr-only" for="inputCorreo">Correo electrónico</label>
                                               <input type="email" class="form-control" id="inputCorreo" placeholder="Correo electrónico" required>
                                            </div>
                                            <div class="form-group">
                                               <label class="sr-only" for="inputNombre">Nombre</label>
                                               <input type="text" class="form-control" id="inputNombre" placeholder="Nombre" required>
                                            </div>
                                            <div class="form-group">
                                               <button type="submit" class="btn btn-success btn-block">Sign in</button>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox">
                                                </label>
                                            </div>
                                         </form>
                                      </div>
                                   </div>
                                </li>
                            </ul>
                        </li>
                        <li class="pull-right">
                            <a href="#" class="link-01">Iniciar sesión</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="terms pull-right">© 2014, 7TUAL | <a href="#">TÉRMINOS & PRIVACIDAD</a></div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.carousel -->

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container">

        <!-- Three columns of text below the carousel -->

        <div class="row submenu">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="col-lg-12">
                    <div class="row">
                        <h2><span><img src="<?=$web_img;?>images/icon-mascara.png"></span>Encuentra tus eventos</h2>
                    </div>
                    <div class="row group-selects">
                        <div class="col-lg-6">
                            <div class="btn-group btn-input clearfix">
                                <button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
                                    <span data-bind="label">País</span>&nbsp;<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Perú</a></li>
                                    <li><a href="#">Argentina</a></li>
                                    <li><a href="#">Chile</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="btn-group btn-input clearfix">
                                <button type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown">
                                    <span data-bind="label">Ciudad</span>&nbsp;<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Ciudad0</a></li>
                                    <li><a href="#">Ciudad1</a></li>
                                    <li><a href="#">Ciudad2</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li>
                        <a href="#perfil" class="btn btn-primary btn-lg" role="button">
                            <span class="icon-user-5"></span><br/>
                            Perfil
                        </a>
                    </li>
                    <li>
                        <a href="#ideas-eventos" class="btn btn-primary btn-lg" role="button">
                            <span class="icon-comment-3"></span><br/>
                            Ideas de eventos
                        </a>
                    </li>
                    <li>
                        <a href="#eventos" class="btn btn-primary btn-lg" role="button">
                            <span class="icon-calendar-4"></span><br/>
                            Eventos
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 dia_actual">
                <span>16 febrero</span><br/>
                Día de Brasil
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row" id="ideas-eventos">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-md-offset-2 col-xs-12">
                        <h3 class="marginH3">Carteles</h3>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row" id="ideas-events">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cartel">
                                    <div class="body">
                                        <div class="row img">
                                            <img src="<?=$web_upload;?>cartel-4.jpg" class="img-thumbnail">
                                            <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12 share pull-right">
                                                <div class="row text-right">
                                                    <a href="#" class="st pull-right"><span class="icon-star-24"></span></a>
                                                    <a href="#" class="c pull-right"><span>Link</span></a>
                                                    <a href="#" class="yt pull-right"><span class="icon-youtube-alt"></span></a>
                                                    <a href="#" class="tw pull-right"><span class="icon-twitter-circle"></span></a>
                                                    <a href="#" class="fb pull-right"><span class="icon-facebook-circled"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row texto">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam orci sem, sed dignissim sem feugiat sed. Suspendisse accumsan commodo enim, ac aliquet nunc pulvinar ac. 
                                        </div>
                                    </div>
                                </div>
                                <hr class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 groups-btns">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 text-right">
                                            <span class="button-checkbox">
                                                últimos <button type="button" class="btn"></button>
                                                <input type="checkbox" class="hidden" />
                                            </span>
                                            <span class="button-checkbox">
                                                por puntos <button type="button" class="btn"></button>
                                                <input type="checkbox" class="hidden" />
                                            </span>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-right">
                                            <div class="row">
                                                <a href="#" class="link_02 pull-right">Comentar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comentario">
                                    <div class="body">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam orci sem, sed dignissim sem feugiat sed. Suspendisse accumsan commodo enim, ac aliquet nunc pulvinar acorci sem, sed dignissim sem feugiat sed. 
                                        </div>
                                    </div>
                                    <div class="foot">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">Nombre del autor</div>
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 text-right">
                                                    <span class="date-time">09/04/2011 • 4:35</span>
                                                    <span class="mas">Más</span>
                                                    <span class="count-add">+1</span>
                                                    <span class="count">+124</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comentario">
                                    <div class="body">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam orci sem, sed dignissim sem feugiat sed. Suspendisse accumsan commodo enim, ac aliquet nunc pulvinar acorci sem, sed dignissim sem feugiat sed. 
                                        </div>
                                    </div>
                                    <div class="foot">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">Nombre del autor</div>
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 text-right">
                                                    <span class="date-time">09/04/2011 • 4:35</span>
                                                    <span class="mas">Más</span>
                                                    <span class="count-add">+1</span>
                                                    <span class="count">+124</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comentario">
                                    <div class="body">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam orci sem, sed dignissim sem feugiat sed. Suspendisse accumsan commodo enim, ac aliquet nunc pulvinar acorci sem, sed dignissim sem feugiat sed. 
                                        </div>
                                    </div>
                                    <div class="foot">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">Nombre del autor</div>
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 text-right">
                                                    <span class="date-time">09/04/2011 • 4:35</span>
                                                    <span class="mas">Más</span>
                                                    <span class="count-add">+1</span>
                                                    <span class="count">+124</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div><!-- /.container -->

    <div class="container-fluid">
        <div class="container">
            <!-- FOOTER -->
            <footer>
                <p class="pull-right">Copyright © 2014 7tual. Todos los derechos reservados.</p>

                <div class="navbar-collapse pull-left">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="<?=site_url();?>">inicio</a></li>
                        <li><a href="<?=site_url('publico');?>">público</a></li>
                        <li><a href="<?=site_url('empresas');?>">empresas</a></li>
                        <li><a href="<?=site_url('equipo');?>">equipo</a></li>
                        <li><a href="<?=site_url('contactanos');?>">contáctanos</a></li>
                    </ul>
                </div>

            </footer>
        </div>
    </div>

    <?php $this->load->view('layouts/foot_web');?>

</body>

</html>
