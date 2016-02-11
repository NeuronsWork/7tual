<!DOCTYPE html>
<html lang="es">

    <?php $this->load->view('layouts/head_web');?>

    <body class="publico pagina-interna">

        <form id="login-form" method="" action="" class="modal-form">
            <div class="icon-cerrar"></div>
            <div class="grupo movil-80 tablet-50">
                <div class="caja base-30">
                    <label for="login-user">Usuario</label>
                </div>
                <div class="caja base-70">
                    <input type="text" id="login-user">
                </div>
            </div>
            <div class="grupo movil-80 tablet-50">
                <div class="caja base-30">
                    <label for="login-password">Contraseña</label>
                </div>
                <div class="caja base-70">
                    <input type="password" id="login-password">
                </div>
            </div>
            <div class="grupo movil-80 tablet-50">
                <div class="caja">
                    <input type="submit" value="Ingresar" class="submit">
                </div>
            </div>
        </form>

        <form id="signup-form" method="" action="" class="modal-form">
            <div class="icon-cerrar"></div>
            <div class="grupo movil-80 tablet-50">
                <div class="caja base-30">
                    <label for="signup-user">Usuario</label>
                </div>
                <div class="caja base-70">
                    <input type="text" id="user">
                </div>
            </div>
            <div class="grupo movil-80 tablet-50">
                <div class="caja base-30">
                    <label for="signup-email">Contraseña</label>
                </div>
                <div class="caja base-70">
                    <input type="email" id="signup-email">
                </div>
            </div>
            <div class="grupo movil-80 tablet-50">
                <div class="caja base-30">
                    <label for="password">Contraseña</label>
                </div>
                <div class="caja base-70">
                    <input type="password" id="signup-password">
                </div>
            </div>
            <div class="grupo movil-80 tablet-50">
                <div class="caja">
                    <input type="submit" value="Registrarse" class="submit">
                </div>
            </div>
        </form>

        <header id="top">
            <div class="grupo">
                <div class="caja base-45 web-20">
                    <a href="<?=site_url();?>" class="logo"><img src="<?=base_url().$web_upload;?>logo.jpg" class="logo__img"><span class="logo__title">7Tual</span></a>
                    <div class="flag peru"></div>
                </div>
                <div class="caja base-45 web-80">
                    <!-- Sociales header-->
                    <div class="sociales sociales--header"><a href="#" class="icon-facebook"></a><a href="#" class="icon-twitter"></a><a href="#" class="icon-youtube"></a></div>
                    <!-- Menú principal-->
                    <?php $this->load->view('layouts/web_menu'); ?>
                </div>
                <div class="caja base-10 hasta-web">
                    <div id="toggle-menu" class="icon-menu"></div>
                </div>
            </div>
        </header>

        <main id="main">
            <div class="grupo">
                <div class="caja">
                    <div class="container tablet-80 centro">
                        <h1 class="titulo">Escríbenos</h1>
                        <div class="grupo tablet-80 centro">
                            <div class="caja">
                                <p>Tu consulta es importante para nosotros!</p>
                                <p>Envianos un mensaje con tus inquietudes, comentarios o sugerencias y a la brevedad estaremos contigo</p>
                            </div>
                        </div>
                        <form id="contacto">
                            <div class="grupo tablet-80 centro">
                                <div class="caja tablet-20">
                                    <label for="nombre">Nombre</label>
                                </div>
                                <div class="caja tablet-80">
                                    <input type="text" id="nombre">
                                </div>
                            </div>
                            <div class="grupo tablet-80 centro">
                                <div class="caja tablet-20">
                                    <label for="email">Email</label>
                                </div>
                                <div class="caja tablet-80">
                                    <input type="email" id="email">
                                </div>
                            </div>
                            <div class="grupo tablet-80 centro">
                                <div class="caja tablet-20">
                                    <label for="asunto">Asunto</label>
                                </div>
                                <div class="caja tablet-80">
                                    <select id="asunto" name="asunto">
                                        <option value="empresa">Empresa</option>
                                        <option value="emprendedores">Emprendedores</option>
                                        <option value="informacion">Información</option>
                                        <option value="otros">Otros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grupo tablet-80 centro">
                                <div class="caja">
                                    <label for="mensaje">Mensaje</label>
                                    <textarea id="mensaje"></textarea>
                                </div>
                            </div>
                            <div class="grupo tablet-80 centro">
                                <div class="caja">
                                    <button type="submit" id="enviar">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer-->
        <?php $this->load->view('layouts/footer_web');?>

    </body>

</html>