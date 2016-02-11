<!DOCTYPE html>
<html lang="es">

    <?php $this->load->view('layouts/head_web');?>

    <body>

        <!-- NAVBAR
        ================================================== -->

        <header id="top">
            <div class="grupo">
                <div class="caja base-45 web-20">
                    <a href="<?=site_url();?>" class="logo"><img src="<?=base_url().$web_upload;?>logo.jpg" class="logo__img"><span class="logo__title">7Tual</span></a>
                    <div class="flag peru"></div>
                </div>
                <div class="caja base-45 web-80">
                    <!-- Sociales header-->
                    <div class="sociales sociales--header"><a href="#" class="icon-facebook"></a><a href="#" class="icon-twitter"></a><a href="#" class="icon-youtube"></a></div>
                    <!-- Menú principal-->
                    <?php $this->load->view('layouts/web_menu'); ?>
                </div>
                <div class="caja base-10 hasta-web">
                    <div id="toggle-menu" class="icon-menu"></div>
                </div>
            </div>
        </header>

        <?php $this->load->view('layouts/slider_page');?>
        <?php $this->load->view('layouts/notion-event');?>

        <main id="main">

            <?php $this->load->view('layouts/sub_menu');?>

            <div class="grupo total main-content">

                <?php $this->load->view('layouts/menu_options_web');?>

                <div id="content" class="caja web-85">
                    <div class="grupo total">
                        <div class="caja eventos-container" id="eventos"></div>
                        <div class="caja pager-container">
                            <ul class="pager">
                                <li><a href="#main">Primero</a></li>
                                <li><a href="#main">2</a></li>
                                <li><a href="#main">3</a></li>
                                <li><a href="#main">4</a></li>
                                <li><a href="#main">5</a></li>
                                <li><a href="#main">6</a></li>
                                <li><a href="#main">Ultimo</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </main>

        <?php $this->load->view('layouts/footer_web');?>

        <script id="evento" type="text/x-jsrender">
            <article class="evento"><a href="<?php echo site_url('evento/');?>/{{:slug}}"><img src="<?php echo base_url().$upload_evento;?>{{:image_video}}"></a>
                <div class="grupo base-tabla medio evento__footer">
                    <div class="caja base-80"><a href="<?php echo site_url('evento/');?>/{{:slug}}">
                            <p class="evento__titulo">{{:title}}</p></a></div>
                    <div class="caja base-20 no-padding">
                        <p class="evento__fecha">{{:~getDia(date_created)}} {{:~getMes(date_created)}}</p>
                    </div>
                </div>
            </article>
        </script>

        <script>

            $.ajax({
                url: "http://localhost/7tualsys/web/list_events/PE",
                dataType: 'json',
                type: 'POST',
                success: function(data) {
                    var template = $.templates("#evento");
                    var htmlOutput;
                    htmlOutput = template.render(data, {
                        getMes: function(dateCreated){
                            var f = dateCreated;
                            var res = f.split("-",2);
                            var mes = res[1];
                            if(mes == 01){ return "Ene";}
                            if(mes == 02){ return "Feb";}
                            if(mes == 03){ return "Mar";}
                            if(mes == 04){ return "Abr";}
                            if(mes == 05){ return "May";}
                            if(mes == 06){ return "Jun";}
                            if(mes == 07){ return "Jul";}
                            if(mes == 08){ return "Ago";}
                            if(mes == 09){ return "Set";}
                            if(mes == 10){ return "Oct";}
                            if(mes == 11){ return "Nov";}
                            if(mes == 12){ return "Dic";}
                        },
                        getDia: function(dateCreated){
                            var f = dateCreated;
                            var res = f.split("-",3);
                            var x = res[2];
                            var dia = x.split(" ",1);
                            return dia;
                        }
                    });
                    $("#eventos").html(htmlOutput);
                }
            });

        </script>

        <script type="text/javascript">

            var slider = new MasterSlider();

            // adds Arrows navigation control to the slider.
            slider.control('arrows');
            //slider.control('timebar' , {insertTo:'#masterslider'});
            slider.control('bullets');

            slider.setup('masterslider' , {
                width:1400,    // slider standard width
                height:404,   // slider standard height
                space:1,
                layout:'fullwidth',
                loop:true,
                preload:0,
                autoplay:true,
                swipe: false
            });

        </script>

    </body>

</html>
