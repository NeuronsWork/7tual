<!DOCTYPE html>
<html lang="en" class="bg-dark">

    <?php $this->load->view('layouts/head_login');?>

    <body>
        <section id="content" class="m-t-lg wrapper-md animated fadeInUp">
            <div class="container aside-xxl">
            <a class="navbar-brand block" href="<?=site_url();?>">7Tual</a>
                <section class="panel panel-default bg-white m-t-lg">
                    <header class="panel-heading text-center">
                        <strong>Iniciar Sesión</strong>
                    </header>
                    <input type="hidden" name="urlVerifyLogin" id="urlVerifyLogin" value="">
                    <form id="login-form" method="post" class="panel-body wrapper-lg" action="<?=site_url();?>manager/validateUser">
                        <div class="form-group">
                            <label class="control-label">Usuario</label>
                            <input type="text" name="username" id="username" placeholder="usuario" class="form-control input-lg" autofocus>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="Contraseña" class="form-control input-lg">
                        </div>
                        <input type="hidden" name="token" id="token" value="<?=$token;?>">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                    </form>
                </section>
            </div>
        </section>
        <!-- footer -->
        <footer id="footer">
            <div class="text-center padder">
                <p><small>7Tual &copy; 2014</small></p>
            </div>
        </footer>
        <!-- / footer -->
        <?php $this->load->view('layouts/footer_login');?>
    </body>

</html>
