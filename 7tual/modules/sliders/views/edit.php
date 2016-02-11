<!DOCTYPE html>
<html lang="en" class="app">

    <?php   $this->load->view('layouts/head_dashboard'); ?>

    <body>
        <script>
        </script>
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
                                    <?php
                                      $attributes = array('class' => 'bs-example form-horizontal', 'id' => 'new_slider');
                                      echo form_open_multipart('sliders/update_slider',$attributes);
                                    ?>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Código de País</label>
                                        <div class="col-lg-10">
                                          <select name="code_country[]" multiple class="form-control">
                                            <?php foreach ($list_country as $country):?>
                                            <option value="<?php echo $country->code_country;?>"
                                              <?php
                                              foreach($relations as $relation):
                                                if($country->code_country == $relation->code_country):
                                                  echo "selected";
                                                endif;
                                              endforeach;
                                              ?>
                                            ><?php echo $country->name_country;?></option>
                                            <?php endforeach;?>
                                          </select>
                                          <span class="help-block m-b-none">Selecciona varios paises con la tecla Alt <i class="fa fa-keyboard-o"></i></span>
                                        </div>
                                      </div>
                                      <div class="line line-dashed line-lg pull-in"></div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Tenor de slider</label>
                                        <div class="col-sm-10">
                                          <input type="hidden" name="id" value="<?php echo $slider[0]->id_slider; ?>">
                                          <textarea name="tenor" class="form-control editor"><?php echo $slider[0]->title;?></textarea>
                                        </div>
                                      </div>
                                      <div class="line line-dashed line-lg pull-in"></div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Imagen de slider</label>
                                        <div class="col-sm-10">
                                          <img src="<?php echo base_url().'upload/slider/'.$slider[0]->image_background;?>" style="width: 100px;">
                                          <input type="hidden" id="" name="imagen_slider" value="<?php echo $slider[0]->image_background;?>">
                                          <input type="file" class="filestyle" id="imagen_slider" name="imagen_slider" value="<?php echo $slider[0]->image_background;?>">
                                        </div>
                                      </div>

                                      <div class="line line-dashed line-lg pull-in"></div>
                                      <div class="form-group">
                                        <label class="col-sm-2 control-label">Imagen de Video</label>
                                        <div class="col-sm-10">
                                          <img src="<?php echo base_url().'upload/slider/'.$slider[0]->imagen;?>" style="width: 100px;">
                                          <input type="hidden" id="" name="imagen_video" value="<?php echo $slider[0]->imagen;?>">
                                          <input type="file" class="filestyle" id="imagen_video" name="imagen_video" value="<?php echo $slider[0]->imagen;?>">
                                        </div>
                                      </div>


                                      <div class="line line-dashed line-lg pull-in"></div>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Video</label>
                                        <div class="col-lg-10">

                                          <input type="text" id="video" name="video" class="form-control" value="<?php echo $slider[0]->id_video;?>" placeholder="">
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
                                            <?php if($slider[0]->status == 1):?>
                                            <option value="1" selected>Habilitar</option>
                                            <option value="0">Desahabilitar</option>
                                          <?php else:?>
                                            <option value="0" selected>Desahabilitar</option>
                                            <option value="1">Habilitar</option>
                                          <?php endif;?>
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

        <script>
          $(document).ready(function(){
            $('.bootstrap-filestyle').find('input[type="text"]').val('<?php echo $slider[0]->image; ?>');
            //alert('<?php echo $slider[0]->image; ?>');
          });
        </script>

    </body>

</html>
