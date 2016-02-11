<div class="modal fade" id="myFormLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md-1">
        <div class="modal-content">

            <form id="login-form" method="post" accept-charset="utf-8" role="form" action="<?=site_url('web/login');?>">
                <input type="hidden" name="url_current" value="<?=current_url();?>">
                <input type="hidden" name="token" id="token" value="<?=$token;?>">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <input class="form-control" name="username" type="text" placeholder="CORREO" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <input class="form-control" type="password" name="password" placeholder="CONTRASEÑA" required>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <a href="">Recuperar contraseña</a>
                    </div>
                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <button type="submit" class="btn">LOGIN</button>
                        </div>
                    </div>
                    <div class="info pull-left" id="info_login"></div>
                </div>
            </form>
        </div>
    </div>
</div>
