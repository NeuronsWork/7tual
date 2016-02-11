<!DOCTYPE html>
<html lang="es">

    <?php $this->load->view('layouts/head_web');?>

    <body onload="recoveryURL();">

        <!-- NAVBAR ================================================== -->

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

            <?php $this->load->view('layouts/sub_menu_1');?>

            <div class="grupo total main-content">

                <?php $this->load->view('layouts/menu_options_web');?>

                <div id="content" class="caja web-85 no-padding">

                    <div class="grupo total">

                        <div class="caja tablet-50 destacados-container">
                            <header class="destacados__header">
                                <h2>Destacados</h2>
                            </header>

                            <div id="ideasDestacados"></div>

                        </div>

                        <div class="caja tablet-50 noticias-container" id="listIdeas">
                            <input type="hidden" id="url" value="<?php echo base_url() ?>">
                            <button class="demo" href="#animatedModal" style="display: none;">open</button>
                            <section class="grid">
                            <?php foreach($lst_ideas as $idea): ?>
                                <article class="noticia grid__item" id="<?php echo $idea['id_notion']; ?>" data-id="<?php echo $idea['id_notion']; ?>">
                                    <header class="noticia__header grupo">
                                        <div class="caja base-50"><a href="idea.html"><span class="icon-pin espacio"><?php echo $idea['name_category']; ?> •
                                                    <?php echo $idea['name_country']; ?> , <?php echo $idea['name_city']; ?></span></a></div>
                                        <div class="caja base-50 derecha-contenido"><a href="idea.html"><span class="icon-fecha espacio"><?php echo $idea['date_created']; ?> <!--• Hace {{:~getMoment(date_created)}}--></span></a></div>
                                    </header>
                                    <div class="noticia__contenido grupo">
                                    <?php if(!empty($idea['video'])): ?>
                                        <div class="caja movil-40">
                                            <a href="idea.html"><img src="" alt=""></a>
                                        </div>
                                        <div class="caja movil-60">
                                    <?php else: ?>
                                        <div class="caja movil-100">
                                    <?php endif; ?>
                                            <a class="open_idea" href="#<?php echo $idea['slug'] ?>" data-id="<?php echo $idea['id_notion'] ?>">
                                                <p class="description"><strong><?php echo $idea['title']; ?></strong> • <?php echo $idea['description']; ?></p>
                                            </a>
                                        </div>
                                        </div>
                                        <!-- Footer para los articulos-->
                                        <footer>
                                            <div class="article_footer grupo movil-tabla medio">
                                                <div class="caja movil-60 no-padding votar">
                                                    <div class="grupo">
                                                        <div class="caja base-100 movil-100">
                                                            <div class="caja total">
                                                                <a class="icon-estrella"></a>
                                                                <span class="noticia__contador">+<?php echo $idea['likes'];?></span>
                                                            </div>
                                                            <div class="noticia__compartir">
                                                                <a href="#" class="icon-facebook"></a>
                                                                <a href="#" class="icon-twitter"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="caja movil-40 comentarios">
                                                    <p><input type="text" name="" placeholder="Comentar" class="noticia__comentar" disabled></p>
                                                </div>
                                            </div>
                                        </footer>
                                </article>
                            <?php endforeach; ?>
                            </section>

                        </div>

                    </div>

                </div>

            </div>

        </main>

        <?php $this->load->view('layouts/footer_web');?>

        <?php
            //$this->load->view('layouts/register_noise');
            if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1):
                //$this->load->view('layouts/register_noise');
            else:
                //$this->load->view('layouts/login_form');
                $this->load->view('layouts/register_form');
                //$this->load->view('msg_activate');
            endif;
        ?>

        <script id="ideaDestacado" type="text/x-jsrender">
            <article class="destacado" data-url="{{:slug}}" id="{{:id_notion}}">
                <div class="grupo movil-tabla medio no-padding">
                    <div class="caja movil-100">
                        <p class="destacado__content"><strong> {{:title}} </strong> • {{:description}} </p>
                        <div class="grupo destacado--compartir">
                            <div class="caja base-50 movil-100">
                                <div class="compartir pull-right">
                                    <a class="icon-estrella"></a>
                                    <span class="destacado__contador">+{{:likes}}</span>
                                </div>
                                <div class="noticia__compartir _redes pull-right">
                                    <a href="#" class="icon-facebook"></a>
                                    <a href="#" class="icon-twitter"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </script>

        <script>

            function recoveryURL(){
                var URLhash = window.location.hash;
                if( URLhash === 'undefined' || URLhash === null || URLhash === ''){
                }else{
                    console.log(URLhash);
                    $('.demo').trigger("click");
                    var idx = $(this).attr('data-id'),
                        url = $('#url').val() + 'noise/item_idea/';
                    var posting = $.post(url, { id: idx});
                    posting.done(function(data){
                        $('#animatedModal .modal_container').empty();
                        $('#animatedModal .modal_container').html(data);
                    });
                }
            }

            $.ajax({
                url: "http://localhost/7tualsys/noise/list_noise_vip/PE",
                dataType: 'json',
                type: 'POST',
                success: function(data) {
                    var template = $.templates("#ideaDestacado");
                    var htmlOutput = template.render(data);
                    $("#ideasDestacados").html(htmlOutput);
                }
            });

            $('.demo').animatedModal();

            $(".open_idea").click(function(){

                var idx = $(this).attr('data-id'),
                    url = $('#url').val() + 'noise/item_idea/';
                //console.log(idx);
                    $('.demo').trigger("click");

                 var posting = $.post(url, { id: idx});
                 posting.done(function(data){
                    $('#animatedModal .modal_container').empty();
                    $('#animatedModal .modal_container').html(data);
                 });

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

            /*slider.setup('masterslider' , {
                width:1400,    // slider standard width
                height:404,   // slider standard height
                space:1,
                layout:'fullwidth',
                loop:true,
                preload:0,
                autoplay:true,
                swipe: false
            });*/

        </script>

    </body>

</html>
