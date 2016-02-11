<div class="modal fade" id="myFormRegisternoise" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md-1">
        <div class="modal-content">

            <form id="form_register_noise" action="<?=site_url('noise/add_notion');?>" accept-charset="utf-8" role="form" method="post">
                <input type="hidden" name="url" value="">
                <input type="hidden" name="code_country" id="country_code" value="<?=$this->session->userdata('code_country');?>">
                <input type="hidden" name="selectCity" id="selectCity" value="<?=$this->session->userdata('id_city');?>">
                <input type="hidden" name="status" value="0">"

                <div class="modal-body">

                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <input class="form-control" type="text" name="inputTitulo" placeholder="Título corto" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <textarea name="inputIdea" class="form-control" placeholder="Idea de evento" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="input-group col-md-6 pull-left city">
                                <select name="selectCity" id="selectCity" class="form-control">
                                    <option value="0" selected="selected">Seleccionar Ciudad</option>
                                    <?php foreach ($list_city as $item) { ?>
                                    <option value="<?=$item->id_city;?>"><?=$item->name_city;?></option>
                                    <?php } ?>
                                </select>
                                <div id="result"></div>
                            </div>

                            <div class="input-group col-md-6 pull-right category">
                                <select name="selectCategory" id="selectCategory" class="form-control">
                                    <option value="0" selected="selected">Seleccionar Categoría</option>
                                    <?php foreach ($list_category as $item) { ?>
                                    <option value="<?=$item->id_category;?>"><?=$item->name_category;?></option>
                                    <?php } ?>
                                </select>
                                <div id="result"></div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-md-12" style="position:relative;">
                        <div class="row">
                            <div class="input-group col-md-12">
                                <input class="form-control" type="text" name="inputVideo" placeholder="Link de Youtube (opcional)">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="info pull-left" id="info_register_noise"></div>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>

                </div>

            </form>

        </div>
    </div>
</div>