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

                            <section class="scrollable padder">

                                <?php $this->load->view('layouts/breadcrumb_dashboard'); ?>

                                <section class="panel panel-default">
                                  <header class="panel-heading font-bold">Nuevo slider</header>
                                  <div class="panel-body">
                                    <!--<form class="bs-example form-horizontal" id="new_slider" method="POST" accept-charset="utf-8" enctype="multipart/form-data" action="<=site_url(sliders/add_slider);?>">-->
                                    <?php
                                      $attributes = array('class' => 'bs-example form-horizontal', 'id' => 'new_slider');
                                      echo form_open_multipart('sliders/add_slider',$attributes);
                                    ?>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Código de País</label>
                                        <div class="col-lg-10">
                                          <select name="code_country[]" multiple class="form-control">
                                            <?php foreach ($list_country as $item):?>
                                            <option value="<?=$item->code_country;?>"><?=$item->name_country;?></option>
                                            <?php endforeach;?>
                                          </select>
                                          <span class="help-block m-b-none">Selecciona varios paises con la tecla Alt <i class="fa fa-keyboard-o"></i></span>
                                        </div>
                                      </div>
                                      <div class="line line-dashed line-lg pull-in"></div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Tenor de slider</label>
                                        <div class="col-sm-10">
                                          <textarea name="tenor" class="form-control editor"></textarea>
                                        </div>
                                      </div>
                                      <div class="line line-dashed line-lg pull-in"></div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Imagen de slider</label>
                                        <div class="col-sm-10">
                                          <input type="file" class="filestyle" id="imagen_slider" name="imagen_slider">
                                        </div>
                                      </div>

                                      <div class="line line-dashed line-lg pull-in"></div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Imagen de Video</label>
                                        <div class="col-sm-10">
                                          <input type="file" class="filestyle" id="imagen_video" name="imagen_video">
                                        </div>
                                      </div>

                                      <div class="line line-dashed line-lg pull-in"></div>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Video</label>
                                        <div class="col-lg-10">
                                          <input type="text" id="video" name="video" class="form-control" value="" placeholder="Ingresar id de youtube">
                                        </div>
                                      </div>
                                      <!--<div class="line line-dashed line-lg pull-in"></div>
                                      <div class="form-group input-daterange">
                                        <label class="col-sm-2 control-label">Fecha inicio</label>
                                        <div class="col-sm-4">
                                          <input class="input-sm input-s datepicker-input form-control" id="start" name="start" size="16" type="text" value="<=$time_now;?>" data-date-format="yyyy-mm-dd" >
                                        </div>
                                        <label class="col-sm-2 control-label">Fecha fin</label>
                                        <div class="col-sm-4">
                                          <input class="input-sm input-s datepicker-input form-control" id="end" name="end" size="16" type="text" value="<=$time_now;?>" data-date-format="yyyy-mm-dd">
                                        </div>
                                      </div>-->
                                      <div class="line line-dashed line-lg pull-in"></div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Habilitado</label>
                                        <div class="col-sm-10">
                                          <select id="status" name="status" class="form-control m-b">
                                            <option value="1">Habilitar</option>
                                            <option value="0">Desahabilitar</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="line line-dashed line-lg pull-in"></div>
                                      <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-success">Guardar</button>
                                          <i class="fa fa-spin fa-spinner hide" id="spin"></i>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </section>

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

        <script type="text/javascript">

        /*$(document).ready(function(){
          $("#new_slider").submit(function(event){
            event.preventDefault();
            var $form = $(this),
                code_country = $form.find('#code_country').val(),
                tenor        = $form.find('#editor').html();
                img_slider   = $form.find('.imagen_slider').val();
                video        = $form.find('#video').val();
                date_initial = $form.find('#start').val();
                date_end     = $form.find('#end').val();
                st           = $form.find('#status').val();
                url          = $form.attr( "action" );

            var posting = $.post(url,{code_country: code_country, tenor: tenor, userfile: img_slider, video: video, start: date_initial, end: date_end, status: st});
            // Put the results in a div
            posting.done(function(data){
              console.log(data);
            });
          });
        });*/

        </script>

    </body>

</html>
