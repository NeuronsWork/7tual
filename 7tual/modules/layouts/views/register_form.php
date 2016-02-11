<!--

<div class="modal fade" id="myFormRegister" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md-1">
        <div class="modal-content">

            <form id="form_register" action="<?=site_url('web/register_user');?>" accept-charset="utf-8" role="form" method="post">
                <input type="hidden" name="key_activation" value="<?=$key_activation;?>">
                <input type="hidden" name="id_profile" value="2">
                <input type="hidden" name="status" value="0">

                <div class="modal-body">

                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <input class="form-control" type="text" name="inputUsuario" placeholder="USUARIO" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <input class="form-control" type="email" name="inputEmail" placeholder="CORREO ELECTRÓNICO" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <input class="form-control" type="password" name="inputPassword" placeholder="CONTRASEÑA" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><input type="checkbox" name="" required>Acepto los terminos y condiciones</label>
                    </div>

                    <div class="form-group">
                        <div class="info pull-left" id="info_register"></div>
                        <button type="buttom" class="btn btn-primary">Registrarse</button>
                    </div>

                </div>

            </form>

        </div>
    </div>
</div>


-->

<div class="modal fade" id="login-modal" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>

            <!-- Begin # DIV Form -->
            <div id="div-forms">

                <!-- Begin # Login Form -->
                <form id="login-form">
                    <div class="modal-body">
                        <div id="div-login-msg" style="display: none;">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg">Ingrese su usuario y contraseña.</span>
                        </div>
                        <input id="login_username" class="form-control" type="text" placeholder="Usuario o e-mail" required>
                        <input id="login_password" class="form-control" type="password" placeholder="Contraseña" required>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Recordar sesión
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Iniciar Sesión</button>
                        </div>
                        <div>
                            <button id="login_lost_btn" type="button" class="btn btn-link">Olvide contraseña?</button>
                            <button id="login_register_btn" type="button" class="btn btn-link">Registrarse</button>
                        </div>
                    </div>
                </form>
                <!-- End # Login Form -->

                <!-- Begin | Lost Password Form -->
                <form id="lost-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-lost-msg" style="display: none; ">
                            <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-lost-msg">Type your e-mail.</span>
                        </div>
                        <input id="lost_email" class="form-control" type="text" placeholder="E-Mail" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Recuperar contraseña</button>
                        </div>
                        <div>
                            <button id="lost_login_btn" type="button" class="btn btn-link">Iniciar Sesión</button>
                            <button id="lost_register_btn" type="button" class="btn btn-link">Registrar</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->

                <!-- Begin | Register Form -->
                <form id="register-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-register-msg" style="display: none;">
                            <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-register-msg">Registrar.</span>
                        </div>
                        <input id="register_username" class="form-control" type="text" placeholder="Usuario" required>
                        <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                        <input id="register_password" class="form-control" type="password" placeholder="Password" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                        </div>
                        <div>
                            <button id="register_login_btn" type="button" class="btn btn-link">Iniciar Sesión</button>
                            <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                        </div>
                    </div>
                </form>
                <!-- End | Register Form -->

            </div>
            <!-- End # DIV Form -->

        </div>
    </div>
</div>
<!-- END # MODAL LOGIN -->