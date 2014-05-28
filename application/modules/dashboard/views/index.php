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

                <section class="wrapper">

                    <?php   $this->load->view('layouts/breadcrumb_dashboard'); ?>

                    <!-- dashboard charts start -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="border-head">
                                    <div class="row">
                                        <div class="col-lg-8 pull-left">
                                            <h3><i class="icon-th"></i> 2013 - Earning Graph</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!--custom chart start-->
                                    <div class="custom-custom-bar-chart">
                                        <div class="bar">
                                            <div class="title">JAN</div>
                                            <div class="value tooltips" data-original-title="85%" data-toggle="tooltip" data-placement="top">85%</div>
                                        </div>
                                        <div class="bar doted">
                                            <div class="title">FEB</div>
                                            <div class="value tooltips" data-original-title="36%" data-toggle="tooltip" data-placement="top">36%</div>
                                        </div>
                                        <div class="bar ">
                                            <div class="title">MAR</div>
                                            <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                                        </div>
                                        <div class="bar doted">
                                            <div class="title">APR</div>
                                            <div class="value tooltips" data-original-title="65%" data-toggle="tooltip" data-placement="top">65%</div>
                                        </div>
                                        <div class="bar">
                                            <div class="title">MAY</div>
                                            <div class="value tooltips" data-original-title="30%" data-toggle="tooltip" data-placement="top">30%</div>
                                        </div>
                                        <div class="bar doted">
                                            <div class="title">JUN</div>
                                            <div class="value tooltips" data-original-title="95%" data-toggle="tooltip" data-placement="top">95%</div>
                                        </div>
                                        <div class="bar">
                                            <div class="title">JUL</div>
                                            <div class="value tooltips" data-original-title="45%" data-toggle="tooltip" data-placement="top">45%</div>
                                        </div>
                                        <div class="bar doted">
                                            <div class="title">AUG</div>
                                            <div class="value tooltips" data-original-title="85%" data-toggle="tooltip" data-placement="top">85%</div>
                                        </div>
                                        <div class="bar ">
                                            <div class="title">SEP</div>
                                            <div class="value tooltips" data-original-title="70%" data-toggle="tooltip" data-placement="top">70%</div>
                                        </div>
                                        <div class="bar doted">
                                            <div class="title">OCT</div>
                                            <div class="value tooltips" data-original-title="55%" data-toggle="tooltip" data-placement="top">55%</div>
                                        </div>
                                        <div class="bar ">
                                            <div class="title">NOV</div>
                                            <div class="value tooltips" data-original-title="35%" data-toggle="tooltip" data-placement="top">35%</div>
                                        </div>
                                        <div class="bar doted">
                                            <div class="title">DEC</div>
                                            <div class="value tooltips" data-original-title="95%" data-toggle="tooltip" data-placement="top">95%</div>
                                        </div>
                                    </div>
                                    <!--custom chart end-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- dashboard charts end -->

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
