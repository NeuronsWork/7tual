<!DOCTYPE html>
<html lang="en" class="app">

    <?php $this->load->view('layouts/head_dashboard'); ?>

    <body>
        <!-- container section start -->
        <input type="hidden" id="current_url" value="<?=current_url();?>/jsonNotions/">
        <input type="hidden" id="url_active" value="<?=current_url();?>/active/">
        <input type="hidden" id="url_desactive" value="<?=current_url();?>/desactive/">
        <input type="hidden" id="url_vip" value="<?=current_url();?>/vip/">
        <input type="hidden" id="url_notvip" value="<?=current_url();?>/notvip/">
        <input type="hidden" id="url_edit" value="<?=current_url();?>/edit/">
        <input type="hidden" id="url_delete" value="<?=current_url();?>/delete/">

        <section class="vbox">

            <?php $this->load->view('layouts/header_dashboard');?>

            <section>

                <section class="hbox stretch">

                    <?php $this->load->view('layouts/navigation_dashboard');?>

                    <!-- .aside -->
                    <aside class="bg-light lter b-l" id="email-list">
                      <section class="vbox">
                        <header class="header clearfix">
                          <?php $this->load->view('layouts/breadcrumb_dashboard'); ?>
                        </header>


                        <section class="scrollable wrapper">
                          <div class="row">
                            <div class="col-lg-12">
                            <?php
                              $mensaje = $this->session->flashdata('mensaje');
                              if($mensaje):
                            ?>
                              <div class="alert alert-success alert-autocloseable-success">
                                <button type="button" class="close" data-dismiss="alert">
                                  <span aria-hidden="true">&times;</span>
                                  <span class="sr-only">Close</span>
                                </button>
                                <?=$mensaje;?>
                              </div>
                            <?php
                              endif;
                            ?>
                            </div>
                            <div class="col-lg-12">
                              <!-- .comment-list -->
                              <section class="comment-list block">
                                <?php foreach ($list_message as $message):?>
                                <div class="message-<?php echo $message->id_message;?>">
                                  <article id="comment-id-<?php echo $message->id_message;?>" class="comment-item">
                                    <a class="pull-left thumb-sm avatar">
                                      <img src="<?=base_url().$admin_img;?>images/avatar_1.png" class="img-circle">
                                    </a>
                                    <span class="arrow left"></span>
                                    <section class="comment-body panel panel-default">
                                      <header class="panel-heading bg-white">
                                        <a href="#"><?php echo $message->name;?></a>
                                        <label class="label bg-info m-l-xs"><?php echo $message->subject;?></label>
                                        <span class="text-muted m-l-sm pull-right">
                                          <i class="fa fa-clock-o"></i>
                                          <span><?php echo $message->date_created;?></span>
                                        </span>
                                      </header>
                                      <div class="panel-body">
                                        <div><?php echo $message->message;?></div>
                                        <div class="comment-action m-t-sm">
                                          <a href="<?php echo site_url('messages/delete/'.$message->id_message);?>" data-dismiss="alert" class="btn btn-default btn-xs">
                                            <i class="fa fa-trash-o text-muted"></i>
                                            Eliminar
                                          </a>
                                          <?php if($message->answer_message == "" || $message->answer_message == NULL):?>
                                          <a href="#comment-form-<?php echo $message->id_message;?>" class="answer btn btn-default btn-xs" data-id="<?php echo $message->id_message;?>">
                                            <i class="fa fa-mail-reply text-muted"></i> Responder
                                          </a>
                                        <?php endif;?>
                                        </div>
                                      </div>
                                    </section>
                                  </article>
                                  <!-- .comment-reply -->
                                  <?php if($message->answer_message == "" || $message->answer_message == NULL):?>
                                  <article id="comment-id-<?php echo $message->id_message;?>-reply" class="comment-item comment-reply" style="display: none;">
                                    <a class="pull-left thumb-sm avatar">
                                      <img src="<?=base_url().$admin_img;?>images/avatar.png" class="img-circle">
                                    </a>
                                    <span class="arrow left"></span>
                                    <section class="comment-body panel panel-default text-sm">
                                      <div class="panel-body">
                                        <!--<span class="text-muted m-l-sm pull-right">
                                          <i class="fa fa-clock-o"></i>
                                          10m ago
                                        </span>-->
                                        <form class="bs-example form-horizontal" method="POST" action="<?=site_url('messages/send_answer');?>">
                                          <input type="hidden" name="id_message" value="<?php echo $message->id_message;?>">
                                          <input type="hidden" name="email" value="<?php echo $message->email;?>">
                                          <input type="hidden" name="name" value="<?php echo $message->name;?>">
                                          <div class="form-group">
                                            <label class="col-lg-2 control-label">Área de envio</label>
                                            <div class="col-lg-10">
                                              <select name="select_area" class="form-control" required>
                                                <option value="empresa@7tual.com">Empresa</option>
                                                <option value="emprendedores@7tual.com">Emprendedores</option>
                                                <option value="informacion@7tual.com">Información</option>
                                                <option value="otros@7tual.com">Otro</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-lg-2 control-label">Mensaje</label>
                                            <div class="col-lg-10">
                                              <textarea name="answer_message" class="form-control" placeholder="Mensaje" required></textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                              <button type="button" class="btn btn-danger remove-answer" data-id="<?php echo $message->id_message;?>">Cancelar</button>
                                              <button type="submit" class="btn btn-success">Enviar respuesta</button>
                                              <i class="fa fa-spin fa-spinner hide" id="spin"></i>
                                            </div>
                                          </div>
                                        </form>

                                      </div>
                                    </section>
                                  </article>
                                  <?php else:?>
                                  <article id="comment-id-<?php echo $message->id_message;?>-answer" class="comment-item comment-reply">
                                    <a class="pull-left thumb-sm avatar">
                                      <img src="<?=base_url().$admin_img;?>images/avatar.png" class="img-circle">
                                    </a>
                                    <span class="arrow left"></span>
                                    <section class="comment-body panel panel-default text-sm">
                                      <div class="panel-body">
                                        <span class="text-muted m-l-sm pull-right">
                                          <i class="fa fa-clock-o"></i>
                                          <?php echo $message->date_modified;?>
                                        </span>
                                        <label class="label bg-dark m-l-xs">Admin</label>
                                        <?php echo $message->answer_message;?>
                                      </div>
                                    </section>
                                  </article>
                                  <?php endif;?>
                                  <!-- / .comment-reply -->
                                </div>
                                <?php endforeach;?>
                              </section>
                              <!-- / .comment-list -->
                            </div>
                          </div>
                        </section>

                      </section>

                    </aside>
                    <!-- /.aside -->

                    <aside class="bg-light lter b-l aside-md hide" id="notes">
                        <div class="wrapper">Notification</div>
                    </aside>

                </section>

            </section>

        </section>
        <!-- container section start -->

        <?php
            $this->load->view('layouts/footer_dashboard');
        ?>
        <script src="<?=base_url().$admin_css_js;?>js/datagrid/notion.js"></script>

        <script>
          $(document).ready(function(){

            $('.remove-answer').click(function(){
              var id = '#comment-id-'+$(this).attr('data-id')+'-reply';
              $(id).css('display','none')
            });

            $('.answer').click(function(){
              var id = '#comment-id-'+$(this).attr('data-id')+'-reply';
              $(id).css('display', 'block');
              //console.log(id);
            });

          });
        </script>

    </body>

</html>
