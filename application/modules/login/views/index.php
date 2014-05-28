<!DOCTYPE html>
<html lang="en">

    <?php
        $this->load->view('layouts/head_login');
    ?>

    <body class="login-body">

        <div class="container">

            <input type="hidden" name="urlVerifyLogin" id="urlVerifyLogin" value="">

            <form class="login-form" id="login-form" method="post" action="<?=site_url();?>login/validateUser">
                <div class="login-wrap">
                    <p class="login-img"><i class="icon_lock_alt"></i></p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Usuario / Correo Electronico" autofocus>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                    </div>
                    <input type="hidden" name="token" id="token" value="<?=$token;?>">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Iniciar sesion</button>
                </div>
            </form>

        </div>

        <?php
            $this->load->view('layouts/footer_login');
        ?>

    </body>

</html>
