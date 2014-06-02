<!DOCTYPE html>
<html lang="en">

<?php   $this->load->view('layouts/head_dashboard'); ?>

<body>
<!-- container section start -->
<section id="container" class="">

    <!-- URL-CONTROLLERS -->
    <input type="hidden" id="url" value="<?=site_url();?>medico">
    <input type="hidden" id="edit_medic" value="<?=site_url();?>medico/edit_medico">
    <input type="hidden" id="delete_medic" value="<?=site_url();?>medico/delete_medico">
    <input type="hidden" id="create_medic" value="<?=site_url();?>medico/create_medico">
    <input type="hidden" id="check_codcmp" value="<?=site_url();?>medico/check_codcmp">
    <!-- END-URL-CONTROLLERS -->

    <?php   $this->load->view('layouts/header_dashboard');?>

    <?php   $this->load->view('layouts/navigation_dashboard');?>

    <!--main content start-->
    <section id="main-content">

        <section class="wrapper">

            <?php   $this->load->view('layouts/breadcrumb_dashboard'); ?>

            <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">

                        <section class="panel">
                            <div class="panel-body">
                                <div class="btn-group btn-group">
                                    <a class="btn btn-primary new_medic" title="Nuevo médico" data-toggle="modal" href="#new_medic"><span class="icon_plus"></span> Nuevo médico</a>
                                    <a class="btn btn-danger" href="#" title="Eliminar médico"><span class="icon_close"></span> Eliminación grupal</a>
                                </div>
                            </div>
                        </section>

                        <?php   $this->load->view('form_medic');?>

                        <?php   $this->load->view('form_medic_edit');?>

                        <section class="panel">
                            <header class="panel-heading">Mantenimiento de Medico</header>
                            <table class="table table-striped border-top" id="tableMedic">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                    <th>Cod. Medico</th>
                                    <th><i class="icon_profile"></i> Apellido Paterno</th>
                                    <th><i class="icon_profile"></i> Apellido Materno</th>
                                    <th><i class="icon_profile"></i> Nombres</th>
                                    <th><i class="icon-list-alt"></i> Categorías</th>
                                    <th><i class="icon-shield"></i> Estado</th>
                                    <th><i class="icon-globe"></i> Especializacion</th>
                                    <th><i class="icon-file-text-alt"></i> Título</th>
                                    <th><i class="icon_mobile"></i> Teléfono</th>
                                    <th><i class="icon_cogs"></i> Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($array_medicos as $item):?>
                                <tr class="odd gradeX" id="med_<?=$item->cod_cmp;?>">
                                    <td><input type="checkbox" class="checkboxes" value="<?=$item->cod_cmp;?>" /></td>
                                    <td><?=$item->cod_cmp;?></td>
                                    <td><?=$item->ap_paterno;?></td>
                                    <td><?=$item->ap_materno;?></td>
                                    <td><?=$item->nombres;?></td>
                                    <td><?=$item->categoria;?></td>
                                    <td><?=$item->est_med;?></td>
                                    <td><?=$item->desc_espec;?></td>
                                    <td><?=$item->tit_cod;?></td>
                                    <td><?=$item->telefono;?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary tooltips editMedic" id="<?=$item->cod_cmp;?>" data-placement="right" data-original-title="Editar <?=$item->cod_cmp;?>"><i class="icon_pencil-edit"></i></a>
                                            <a class="btn btn-danger tooltips deleteMedic" id="<?=$item->cod_cmp;?>" data-placement="right" data-original-title="Eliminar <?=$item->cod_cmp;?>"><i class="icon_close_alt2"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                            </table>
                        </section>
                </div>
            </div>
              <!-- page end-->

        </section>

    </section>
    <!--main content end-->

</section>
<!-- container section start -->

<?php
$this->load->view('layouts/footer_dashboard');
?>

</body>

</html>
