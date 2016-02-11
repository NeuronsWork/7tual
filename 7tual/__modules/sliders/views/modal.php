<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Paises relacionados con slider</h4>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-sm-12">
          <section class="panel panel-default">
            <div class="list-group no-radius alt">
              <?php foreach ($relations as $key):?>
              <div class="list-group-item" id="list-item-<?=$key->id_relation;?>">
                <a href="<?=base_url();?>sliders/delete_relations/<?=$key->id_relation;?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                <span class="badge bg-success"><?=$key->code_country;?></span>
                <?=$key->name_country;?>
              </div>
              <?php endforeach; ?>
            </div>
          </section>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
    </div>;
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->