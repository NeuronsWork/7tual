<div class="modal fade" id="new_medic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Nuevo médico</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="create_medic" role="form" data-async data-target="#rating-modal" action="<?=site_url('medico/create')?>" method="POST">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputEmail1" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword1" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputPassword1" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="button" class="btn btn-danger cancel_panel_medic"><i class="icon_close"></i> Cancelar</button>
                                <button type="submit" class="btn btn-primary"><i class="icon_plus"></i> Crear médico</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                <button class="btn btn-success" type="button">Guardar médico</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->