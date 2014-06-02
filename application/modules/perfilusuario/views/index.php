<!DOCTYPE html>
<html lang="en">

<?php   $this->load->view('layouts/head_dashboard'); ?>

<body>

<!-- container section start -->
<section id="container" class="">

    <?php   $this->load->view('layouts/header_dashboard');?>

    <?php   $this->load->view('layouts/navigation_dashboard');?>

    <!--main content start-->
    <section id="main-content">

        <!-- URL-CONTROLLERS -->
        <input type="hidden" id="url" value="<?=site_url();?>perfilusuario">
        <input type="hidden" id="create_user" value="<?=site_url();?>perfilusuario/create_user">
        <input type="hidden" id="edit_user" value="<?=site_url();?>perfilusuario/edit_user">
        <input type="hidden" id="delete_user" value="<?=site_url();?>perfilusuario/delete_user">

        <section class="wrapper">

            <div class="row">

                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-10 col-sm-10">
                                <h2>Perfiles & Usuarios</h2>
                            </div>
                            <div class="col-lg-2 col-sm-2 follow-info weather-category">
                                <ul>
                                    <li class="active">
                                        <h4><?php echo $count_usuarios;?></h4>
                                        Usuarios
                                    </li>
                                    <li>
                                        <h4><?php echo $count_perfiles;?></h4>
                                        Perfiles
                                    </li>
                                </ul>
                            </div>
                          </div>
                    </div>
                </div>

            </div>

            <!-- page start-->
            <div class="row">

                <div class="col-lg-12">

                    <section class="panel">

                        <header class="panel-heading tab-bg-info">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#usuarios">
                                        <i class="icon-user"></i>
                                        Usuarios
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#perfiles">
                                        <i class="icon_group"></i>
                                        Perfiles
                                    </a>
                                </li>
                            </ul>
                        </header>

                        <?php   $this->load->view('form_user');?>

                        <div class="panel-body">

                            <div class="tab-content">

                                <!-- usuario -->
                                <div id="usuarios" class="tab-pane active">

                                    <div class="row">

                                        <div class="panel-body">
                                            <div class="btn-group btn-group">
                                                <a class="btn btn-primary new_user" title="Nuevo usuario" data-toggle="modal" href="#new_user"><span class="icon_plus"></span> Nuevo perfil</a>
                                                <a class="btn btn-danger" href="#" title="Eliminar usuarios" disabled><span class="icon_close"></span> Eliminación grupal</a>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <section class="panel">
                                                <table class="table table-striped table-advance table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                                            <th><i class="icon_profile"></i> Nombre</th>
                                                            <th><i class="icon_calendar"></i> Última sesión</th>
                                                            <th><i class="icon_mail_alt"></i> Email</th>
                                                            <th><i class="icon_group"></i> Perfil</th>
                                                            <th><i class="icon_cone"></i> Estado</th>
                                                            <th><i class="icon_cogs"></i> Acción</th>
                                                        </tr>
                                                        <?php
                                                            foreach ($array_usuarios as $item){
                                                            //id_user, username, email, profile.name_profile, last_login
                                                        ?>
                                                        <tr id="user_<?=$item->id_user;?>">
                                                            <td><input type="checkbox" class="checkboxes" value="<?=$item->id_user;?>" /></td>
                                                            <td><?=$item->username;?></td>
                                                            <td><?=$item->last_login;?></td>
                                                            <td><?=$item->email;?></td>
                                                            <td><?=$item->name_profile;?></td>
                                                            <td>
                                                                <?php
                                                                if($item->status==1):
                                                                    echo "Activo";
                                                                else:
                                                                    echo "Desactivado";
                                                                endif;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary tooltips editUser" id="<?=$item->id_user;?>" data-placement="right" data-original-title="Editar <?=$item->username;?>"><i class="icon_pencil-edit"></i></a>
                                                                    <a class="btn btn-danger tooltips deleteUser" id="<?=$item->id_user;?>" data-placement="right" data-original-title="Eliminar <?=$item->username;?>"><i class="icon_close_alt2"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                </div>

                                <!-- perfiles -->
                                <div id="perfiles" class="tab-pane">

                                    <div class="row">

                                        <div class="panel-body">
                                            <div class="btn-group btn-group">
                                                <a class="btn btn-primary new_profile" title="Nuevo perfil" data-toggle="modal" href="#new_profile"><span class="icon_plus"></span> Nuevo perfil</a>
                                                <a class="btn btn-danger" href="#" title="Eliminar perfiles" disabled><span class="icon_close"></span> Eliminación grupal</a>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <section class="panel">
                                                <table class="table table-striped table-advance table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                                            <th><i class="icon_profile"></i> Nombre Perfil</th>
                                                            <th><i class="icon_cone"></i> Estado</th>
                                                            <th><i class="icon_cogs"></i> Acción</th>
                                                        </tr>
                                                        <?php
                                                            foreach ($array_perfiles as $item){
                                                        ?>
                                                        <tr>
                                                            <td><input type="checkbox" class="checkboxes" value="<?=$item->id_profile;?>" /></td>
                                                            <td><?=$item->name_profile;?></td>
                                                            <td>
                                                                <?php
                                                                if($item->status==1):
                                                                    echo "Activo";
                                                                else:
                                                                    echo "Desactivado";
                                                                endif;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a class="btn btn-primary" href="#"><i class="icon_pencil-edit"></i></a>
                                                                    <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
