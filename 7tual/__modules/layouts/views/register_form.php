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