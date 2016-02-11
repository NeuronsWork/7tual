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
            <div class="grupo container">
                <div class="caja">
                    <h1 class="titulo">Público</h1>
                    <h2 class="subtitulo">Estamos preparándonos para unir a más países</h2>
                    <p>Cuanto más crezca esta red, más eventos increibles podrán ser compartidos y llevados a tu ciudad.</p>
                    <p>Únete para llegar al tuyo. Necesitamos reunir a una gran cantidad de público que nos facilite convencer a patrocinadores locales para llegar muy cerca de ti.</p><img src="<?=base_url().$web_upload;?>events-heavenly-header.jpg" class="total">
                    <p>Cuanto más crezca esta red, más eventos increibles podrán ser compartidos y llevados a tu ciudad.</p>
                    <p>Únete para llegar al tuyo. Necesitamos reunir a una gran cantidad de público que nos facilite convencer a patrocinadores locales para llegar muy cerca de ti.</p><img src="<?=base_url().$web_img;?>img/publico-mapa.png">
                </div>
            </div>
        </main>

        <!-- Footer-->
        <?php $this->load->view('layouts/footer_web');?>
    </body>

</html>