<!DOCTYPE html>
<html lang="en" class="app">

    <?php   $this->load->view('layouts/head_dashboard'); ?>

    <body>
        <!-- container section start -->
        <section class="vbox">

            <?php $this->load->view('layouts/header_dashboard');?>

            <section>

                <section class="hbox stretch">

                    <?php $this->load->view('layouts/navigation_dashboard');?>

                    <section id="content">

                        <section class="vbox">

                            <section class="scrollable wrapper">

                                <?php $this->load->view('layouts/breadcrumb_dashboard'); ?>

                                <div class="m-b-md">
                                <h3 class="m-b-none">Dashboard</h3>
                                    <small>Bienvenido a 7Tual</small>
                                </div>

                                <div class="panel panel-default">
                                  <div class="row m-l-none m-r-none bg-light lter">

                                    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                                      <span class="fa-stack fa-2x pull-left m-r-sm">
                                        <i class="fa fa-circle fa-stack-2x text-info"></i>
                                        <i class="fa fa-male fa-stack-1x text-white"></i>
                                      </span>
                                      <a class="clear" href="#">
                                        <span class="h3 block m-t-xs"><strong><?php echo $count_last_users;?></strong></span>
                                        <small class="text-muted text-uc">NUEVOS USUARIOS</small>
                                      </a>
                                    </div>

                                    <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                                      <span class="fa-stack fa-2x pull-left m-r-sm">
                                        <i class="fa fa-circle fa-stack-2x text-warning"></i>
                                        <i class="fa fa-bug fa-stack-1x text-white"></i>
                                      </span>
                                      <a class="clear" href="#">
                                        <span class="h3 block m-t-xs"><strong>7168</strong></span>
                                        <small class="text-muted text-uc">NUEVAS IDEAS</small>
                                      </a>
                                    </div>

                                    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                                      <span class="fa-stack fa-2x pull-left m-r-sm">
                                        <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                        <i class="fa fa-fire-extinguisher fa-stack-1x text-white"></i>
                                      </span>
                                      <a class="clear" href="#">
                                        <span class="h3 block m-t-xs"><strong><?php echo $count_noise_report;?></strong></span>
                                        <small class="text-muted text-uc">IDEAS REPORTADAS</small>
                                      </a>
                                    </div>

                                    <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                                      <span class="fa-stack fa-2x pull-left m-r-sm">
                                        <i class="fa fa-circle fa-stack-2x icon-muted"></i>
                                        <i class="fa fa-clock-o fa-stack-1x text-white"></i>
                                      </span>
                                      <a class="clear" href="#">
                                        <span class="h3 block m-t-xs"><strong><?php echo $count_comment_report;?></strong></span>
                                        <small class="text-muted text-uc">COMENTARIOS REPORTADOS</small>
                                      </a>
                                    </div>

                                  </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm-6 portlet">
                                      <section class="panel panel-success portlet-item">

                                        <header class="panel-heading">
                                          Últimos usuarios
                                        </header>

                                        <ul class="list-group alt">
                                          <?php foreach ($user_last_access as $users):?>
                                          <!-- USUARIO-->
                                          <li class="list-group-item">
                                            <div class="media">
                                              <span class="pull-left thumb-sm"><img src="<?=base_url().$admin_img;?>images/avatar_1.png" alt="John said" class="img-circle"></span>
                                              <div class="pull-right text-success m-t-sm">
                                                <i class="fa fa-circle"></i>
                                              </div>
                                              <div class="media-body">
                                                <div><a href="#"><?php echo $users->user;?></a></div>
                                              </div>
                                            </div>
                                          </li>
                                          <!-- /USUARIO-->
                                          <?php endforeach;?>

                                        </ul>

                                      </section>

                                      <section class="panel panel-default portlet-item">

                                        <header class="panel-heading">
                                          <span class="label bg-dark"><?php echo $last_message_count;?></span> Mensajes
                                        </header>

                                        <section class="panel-body">
                                          <?php foreach ($last_message as $message) :?>

                                          <article class="media">
                                            <!-- <span class="pull-left thumb-sm"><img src="images/avatar_default.jpg" class="img-circle"></span> -->
                                            <div class="media-body">
                                              <div class="pull-right media-xs text-center text-muted">
                                                <strong class="h4">12:18</strong><br>
                                                <small class="label bg-light">pm</small>
                                              </div>
                                              <a href="#" class="h4"><?php echo $message->name;?></a>
                                              <small class="block"><a href="#" class=""><?php echo $message->email;?></a> <span class="label label-success"><?php echo $message->subject;?></span></small>
                                              <small class="block m-t-sm"><?php echo $message->message;?></small>
                                            </div>
                                          </article>

                                          <div class="line pull-in"></div>
                                          <?php endforeach;?>

                                        </section>
                                      </section>

                                    </div>

                                    <div class="col-sm-6 portlet">
                                        <section class="panel panel-default portlet-item">
                                            <header class="panel-heading">
                                              <ul class="nav nav-pills pull-right">
                                                <li>
                                                  <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                                                </li>
                                              </ul>
                                              Últimas ideas sin aprobar <span class="badge bg-info"><?php echo $last_noise_count;?></span>
                                            </header>
                                            <section class="panel-body">
                                            <?php foreach ($last_noise as $noise) :?>
                                              <article class="media">
                                                <div class="pull-left">
                                                  <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-stack-1x text-white" title="<?php echo $noise['name_category'];?>"><?php echo $noise['name_category'][0];?></i>
                                                  </span>
                                                </div>
                                                <div class="media-body">
                                                  <a href="<?php echo site_url('notions/edit/'.$noise['id_notion']);?>" class="h4"><?php echo $noise['title'];?></a>
                                                  <small class="block m-t-xs"><?php echo $noise['description'];?></small>
                                                  <em class="text-xs">Enviado el <span class="text-danger"><?php echo $noise['date_created'];?></span></em>
                                                </div>
                                              </article>
                                              <div class="line pull-in"></div>
                                            <?php endforeach;?>


                                            </section>
                                          </section>
                                    </div>

                                </div>

                            </section>

                        </section>

                        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>

                    </section>

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

    </body>

</html>
