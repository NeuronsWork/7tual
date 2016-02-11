<!DOCTYPE html>
<html lang="en" class="app">

    <?php   $this->load->view('layouts/head_dashboard'); ?>

    <body>
        <!-- container section start -->
        <input type="hidden" id="current_url" value="<?=current_url();?>/jsonSliders/">
        <input type="hidden" id="url_active" value="<?=current_url();?>/active/">
        <input type="hidden" id="url_desactive" value="<?=current_url();?>/desactive/">
        <input type="hidden" id="url_modal" value="<?=current_url();?>/relations/">
        <input type="hidden" id="url_edit" value="<?=current_url();?>/edit/">
        <input type="hidden" id="url_delete" value="<?=current_url();?>/delete/">
        <input type="hidden" id="url_upload_slider" value="<?=$upload_slider;?>">

        <section class="vbox">

            <?php $this->load->view('layouts/header_dashboard');?>

            <section>

                <section class="hbox stretch">

                    <?php $this->load->view('layouts/navigation_dashboard');?>

                    <section id="content">

                        <section class="vbox">

                            <section class="scrollable padder">

                                <?php $this->load->view('layouts/breadcrumb_dashboard'); ?>

                                <?php
                                  $mensaje = $this->session->flashdata('mensaje');
                                  if($mensaje):
                                ?>
                                  <div class="alert alert-success alert-autocloseable-success">
                                    <button type="button" class="close" data-dismiss="alert">
                                      <span aria-hidden="true">&times;</span>
                                      <span class="sr-only">Close</span>
                                    </button>
                                    <?php $mensaje;?>
                                  </div>
                                <?php
                                  endif;
                                ?>

                                <section class="panel panel-default">

                                  <div class="table-responsive">
                                    <table id="MyStretchGrid" class="table table-striped datagrid m-b-sm">
                                      <thead>
                                        <tr>
                                          <th>
                                            <div class="row">
                                              <div class="col-sm-8 m-t-xs m-b-xs">
                                                <a href="sliders/new_sliders" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Nuevo slider</a>
                                              </div>
                                              <div class="col-sm-4 m-t-xs m-b-xs">
                                                <div class="input-group search datagrid-search">
                                                  <input type="text" class="input-sm form-control" placeholder="Search">
                                                  <div class="input-group-btn">
                                                    <button class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </th>
                                        </tr>
                                      </thead>

                                      <tfoot>
                                      <tr>
                                        <th class="row" colspan="5">
                                          <div class="datagrid-footer-left col-sm-6 text-center-xs m-l-n" style="visibility: visible;">
                                            <div class="grid-controls m-t-sm">
                                              <span>
                                                <span class="grid-start">1</span> -
                                                <span class="grid-end">20</span> de
                                                <span class="grid-count">146 items</span>
                                              </span>
                                              <div class="select grid-pagesize dropup" data-resize="auto">
                                                <button data-toggle="dropdown" class="btn btn-sm btn-default dropdown-toggle">
                                                  <span class="dropdown-label">20</span>
                                                  <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                  <li data-value="5"><a href="#">5</a></li>
                                                  <li data-value="10"><a href="#">10</a></li>
                                                  <li data-value="20"><a href="#">20</a></li>
                                                  <li data-value="50"><a href="#">50</a></li>
                                                  <li data-value="100"><a href="#">100</a></li>
                                                </ul>
                                              </div>
                                              <span>Por página</span>
                                            </div>
                                          </div>
                                          <div class="datagrid-footer-right col-sm-6 text-right text-center-xs" style="visibility: visible;">
                                            <div class="grid-pager m-r-n">
                                              <button type="button" class="btn btn-sm btn-default grid-prevpage" disabled="disabled"><i class="fa fa-chevron-left"></i></button>
                                              <span>Página</span>
                                              <div class="inline">
                                                <div class="input-group dropdown combobox">
                                                  <input class="input-sm form-control" type="text">
                                                  <div class="input-group-btn dropup">
                                                    <button class="btn btn-sm btn-default" data-toggle="dropdown"><i class="caret"></i></button>
                                                    <ul class="dropdown-menu pull-right"><li><a>1</a></li><li><a>2</a></li><li><a>3</a></li><li><a>4</a></li><li><a>5</a></li><li><a>6</a></li><li><a>7</a></li><li><a>8</a></li></ul>
                                                  </div>
                                                </div>
                                              </div>
                                              <span>of <span class="grid-pages">8</span></span>
                                              <button type="button" class="btn btn-sm btn-default grid-nextpage"><i class="fa fa-chevron-right"></i></button>
                                            </div>
                                          </div>
                                        </th>
                                      </tr>
                                    </tfoot>
                                    </table>
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
        <script src="<?=base_url().$admin_css_js;?>js/datagrid/slider.js"></script>

    </body>

</html>
