                        <!-- modal -->
                        <div class="modal fade" id="new_medic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="form-horizontal" role="form" id="form_create_medic" data-async data-target="" action="" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Nuevo médico</h4>
                                        </div>
                                        <div class="modal-body">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="inputCMP" class="col-lg-3 control-label">Código CMP</label>
                                                        <div class="col-lg-3">
                                                            <input type="text" class="form-control input-sm" name="inputCMP" id="inputCMP" placeholder="Código CMP" required="true" autofocus="true">
                                                        </div>
                                                        <div class="col-lg-6" id="result_cmp"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPaterno" class="col-lg-3 control-label">Ape. Paterno</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control input-sm" name="inputPaterno" id="inputPaterno" placeholder="Apellido Paterno" required="true" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputMaterno" class="col-lg-3 control-label">Ape. Materno</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control input-sm" name="inputMaterno" id="inputMaterno" placeholder="Apellido Materno" required="true" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputNombres" class="col-lg-3 control-label">Nombres</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control input-sm" name="inputNombres" id="inputNombres" placeholder="Nombres" required="true" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputCategorias" class="col-lg-3 control-label">Categorías</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control input-sm" name="inputCategorias" id="inputCategorias" placeholder="Categorías" required="true" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputCategorias" class="col-lg-3 control-label">Estado</label>
                                                        <div class="col-lg-9">
                                                            <select class="form-control input-sm" name="inputEstado" id="inputEstado" disabled>
                                                                <option value="1">Activo</option>
                                                                <option value="0">Inactivo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEspecializacion" class="col-lg-3 control-label">Especialización</label>
                                                        <div class="col-lg-9">
                                                            <select class="form-control input-sm" name="inputEspecializacion" id="inputEspecializacion" disabled>
                                                                <?php foreach($array_especializacion as $item):?>
                                                                <option value="<?=$item->cod_espec;?>"><?=$item->desc_espec;?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label for="inputTitulo" class="col-lg-6 control-label">Título</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control input-sm" name="inputTitulo" inputTitulo placeholder="Título" required="true" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label for="inputTelefono" class="col-lg-6 control-label">Teléfono</label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control input-sm" name="inputTelefono" inputTelefono placeholder="Teléfono" required="true" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" type="button" class="btn btn-danger cancel_panel_medic"><i class="icon_close"></i> Cancelar</button>
                                            <button type="submit" class="btn btn-primary btn-send" disabled><i class="icon_plus"></i> Crear médico</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /modal -->