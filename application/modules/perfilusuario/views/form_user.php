                        <!-- modal -->
                        <div class="modal fade" id="new_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="form-horizontal" role="form" id="form_create_user" data-async data-target="" action="" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Nuevo Usuario</h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="inputNombre" class="col-lg-3 control-label">Nombre de Usuario</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control input-sm" name="inputNombre" id="inputNombre" placeholder="Nombre de usuario" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputContrasena" class="col-lg-3 control-label">Contraseña</label>
                                                        <div class="col-lg-9">
                                                            <input type="password" class="form-control input-sm" name="inputContrasena" id="inputContrasena" placeholder="Contraseña" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail" class="col-lg-3 control-label">E-mail</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control input-sm" name="inputEmail" id="inputEmail" placeholder="E-mail" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPerfil" class="col-lg-3 control-label">Perfiles</label>
                                                        <div class="col-lg-9">
                                                            <select class="form-control input-sm" name="inputPerfil" id="inputPerfil">
                                                                <?php foreach($array_perfiles as $item):?>
                                                                <option value="<?=$item->id_profile;?>"><?=$item->name_profile;?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputCategorias" class="col-lg-3 control-label">Estado</label>
                                                        <div class="col-lg-9">
                                                            <select class="form-control input-sm" name="inputEstado" id="inputEstado">
                                                                <option value="1">Activo</option>
                                                                <option value="0">Inactivo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" type="button" class="btn btn-danger cancel_panel_medic"><i class="icon_close"></i> Cancelar</button>
                                            <button type="submit" class="btn btn-primary btn-send"><i class="icon_plus"></i> Crear usuario</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /modal -->