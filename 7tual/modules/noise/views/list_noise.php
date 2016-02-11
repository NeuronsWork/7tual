                                        <input type="hidden" id="base_url" value="<?=base_url('idea');?>">
                                        <?php if($this->session->userdata('id_usuario')!=''):?>
                                        <input type="hidden" id="user_id" value="<?php echo $this->session->userdata('id_usuario')?>">
                                        <?php endif;?>
                                        <input type="hidden" id="url_meapunto" value="<?php echo site_url('noise/me_apunto');?>">
                                        <input type="hidden" id="url_removeapunto" value="<?php echo site_url('noise/remove_apunto');?>">
                                        <input type="hidden" id="id_profile" value="<?php echo $this->session->userdata('id_profile');?>">
                                        <?php
                                        if(empty($view_noise)):
                                        ?>
                                            <div class="row item">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loading">
                                                    <div class="row text-center before">
                                                        <button type="button" class="btn btn-warning">No hay ideas</button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        else:
                                        foreach ($view_noise as $item):
                                            if($item->video == ""){
                                        ?>
                                            <div class="row item" id="<?php echo $item->id_notion;?>" data-id="<?php echo $item->id_notion;?>">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slide-row slide-row-no-img">
                                                    <div class="slide-header">
                                                        <div class="pull-left">
                                                            <?php echo $item->name_category.' • '.$item->name_country.' , '.$item->name_city;?>
                                                        </div>
                                                        <div class="pull-right">
                                                            <?=date("d/m/Y",strtotime($item->date_created)); ?> • Hace
                                                            <?php
                                                                $fecha_i    = $item->date_created;
                                                                $fecha_f    = $date_time;
                                                                $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
                                                                $dias = abs($dias);
                                                                $dias = floor($dias);
                                                                if($dias==0){

                                                                }else{
                                                                    if($dias==1){
                                                                        echo $dias." día";
                                                                    }else{
                                                                        echo $dias." días";
                                                                    }
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="slide-content" data-url="<?=$item->slug;?>">
                                                        <a href="<?php echo site_url('idea/'.$item->slug);?>">
                                                            <p><strong><?php echo $item->title;?></strong> • <?php echo $item->description;?></p>
                                                        </a>
                                                    </div>
                                                    <div class="slide-comment" id="slide-comment-<?php echo $item->id_notion;?>">
                                                        <?php if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1): ?>
                                                        <a href="#comentar-<?php echo $item->slug;?>" class="input-placeholder" data-id="<?php echo $item->id_notion;?>"><span class="icon-bubbles-talk-1"></span> Agregar comentario...</a>
                                                        <?php else:?>
                                                        <a tabindex="1" role="button" class="popup" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Necesitar haber iniciado sesion para comentar o reportar">Agregar comentario...</a>
                                                        <?php endif;?>
                                                    </div>
                                                    <div class="slide-counter" id="like-<?php echo $item->id_notion;?>" data-counter="<?php echo $item->likes;?>">
                                                        <?php
                                                            if($item->likes == "" || $item->likes == 0): echo "+0";
                                                            else: echo "+".$item->likes;
                                                            endif;
                                                        ?>
                                                    </div>
                                                    <div class="slide-footer">
                                                        <span class="buttons">

                                                            <div class="btn-group dropup">
                                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><span class="icon icon-share-1"></span></button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li><a href="#">Facebook</a></li>
                                                                    <li><a href="#">Twitter</a></li>
                                                                </ul>
                                                            </div>
                                                            <?php if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1): ?>

                                                                <?php
                                                                $sw=0;
                                                                foreach ($list_noise_like as $noise){
                                                                    //print_r($noise);
                                                                    if($item->id_notion == $noise->id_notion){
                                                                ?>
                                                                    <button data-id="<?php echo $item->id_notion;?>" class="btn me_apunto hidden" id="btn_<?php echo $item->id_notion;?>"><span class="icon icon-medal-outline-star"></span></button>
                                                                    <button data-id="<?php echo $item->id_notion;?>" class="btn remove_apunto" id="btn__<?php echo $item->id_notion;?>"><span class="icon icon-medal-rank-star"></span></button>
                                                                <?php
                                                                        $sw = 1;
                                                                    }
                                                                }
                                                                ?>

                                                                <?php
                                                                    if($sw==0){?>
                                                                    <button data-id="<?php echo $item->id_notion;?>" class="btn me_apunto" id="btn_<?php echo $item->id_notion;?>"><span class="icon icon-medal-outline-star"></span></button>
                                                                    <button data-id="<?php echo $item->id_notion;?>" class="btn remove_apunto hidden" id="btn__<?php echo $item->id_notion;?>"><span class="icon icon-medal-rank-star"></span></button>
                                                                <?php
                                                                    }
                                                                ?>

                                                            <?php else: ?>

                                                            <a tabindex="1" class="btn popup" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Necesitar haber iniciado sesion para dar me apunto"><span class="icon icon-medal-rank-star"></span></a>

                                                            <?php endif;?>
                                                        </span>
                                                    </div>
                                                    <div class="panel-google-plus-comment" id="panel-comment-<?php echo $item->id_notion;?>">
                                                        <div class="panel-google-plus-textarea">
                                                            <form action="<?php echo site_url('noise/add_comment');?>" method="POST" class="form_add_comment" id="form_add_comment-<?php echo $item->id_notion;?>" name="form_add_comment">
                                                                <input type="hidden" name="id_notion" value="<?php echo $item->id_notion;?>">
                                                                <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_usuario')?>">
                                                                <input type="hidden" name="tipo_comment" value="1">
                                                                <textarea class="form-control" rows="4" name="comment" id="comment"></textarea>
                                                                <button type="submit" class="[ btn btn-success disabled ]">Comentar</button>
                                                                <button type="reset" class="[ btn btn-default ]" data-id="<?php echo $item->id_notion;?>">Cancelar</button>
                                                            </form>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            }else{
                                        ?>
                                            <div class="row item" id="<?php echo $item->id_notion;?>" data-id="<?php echo $item->id_notion;?>">
                                                <div class="alert" style="position: absolute; top: 0; left:0;"></div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 slide-row">
                                                    <div class="slide-header">
                                                        <div class="pull-left">
                                                            <?=$item->name_category.' • '.$item->name_country.' , '.$item->name_city;?>
                                                        </div>
                                                        <div class="pull-right">
                                                            <?php echo date("d/m/Y",strtotime($item->date_created)); ?> • Hace <?php
                                                                $fecha_f = $date_time;
                                                                $fecha_i =  $item->date_created;
                                                                $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
                                                                $dias = abs($dias);
                                                                $dias = floor($dias);
                                                                //echo $dias."///";
                                                                if($dias==0){

                                                                }else{
                                                                    if($dias==1){
                                                                        echo $dias." día";
                                                                    }else{
                                                                        echo $dias." días";
                                                                    }
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div id="carousel-1" class="carousel slide slide-carousel" data-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div class="item active">
                                                                <?php list($url, $idVideo) = explode("=", $item->video); ?>
                                                                <img src="http://img.youtube.com/vi/<?=$idVideo;?>/0.jpg" alt="Image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="slide-content" data-url="<?php echo $item->slug;?>">
                                                        <a href="<?php echo site_url('idea/'.$item->slug);?>">
                                                            <p><strong><?php echo $item->title;?></strong> • <?php echo $item->description;?></p>
                                                        </a>
                                                    </div>
                                                    <div class="slide-comment" id="slide-comment-<?php echo $item->id_notion;?>">
                                                        <?php if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1): ?>
                                                        <a href="#comentar-<?php echo $item->slug;?>" class="input-placeholder" data-id="<?php echo $item->id_notion;?>">Agregar comentario...</a>
                                                        <?php else:?>
                                                        <a tabindex="1" role="button" class="popup" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Necesitar haber iniciado sesion para comentar o reportar">Agregar comentario...</a>
                                                        <?php endif;?>
                                                    </div>
                                                    <div class="slide-counter" id="like-<?php echo $item->id_notion;?>" data-counter="<?php echo $item->likes;?>">
                                                        <?php
                                                            if($item->likes == "" || $item->likes == 0): echo "+0";
                                                            else: echo "+".$item->likes;
                                                            endif;
                                                        ?>
                                                    </div>
                                                    <div class="slide-footer">
                                                        <span class="buttons">

                                                            <div class="btn-group dropup">
                                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><span class="icon icon-share-1"></span></button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li><a href="#">Facebook</a></li>
                                                                    <li><a href="#">Twitter</a></li>
                                                                </ul>
                                                            </div>

                                                            <?php if($this->session->userdata('id_profile') == 2 || $this->session->userdata('id_profile') == 1): ?>

                                                                <?php
                                                                $sw = 0;
                                                                foreach ($list_noise_like as $noise){
                                                                    if($item->id_notion == $noise->id_notion){
                                                                ?>
                                                                    <button data-id="<?php echo $item->id_notion;?>" class="btn me_apunto hidden" id="btn_<?php echo $item->id_notion;?>"><span class="icon icon-medal-outline-star"></span></button>
                                                                    <button data-id="<?php echo $item->id_notion;?>" class="btn remove_apunto" id="btn__<?php echo $item->id_notion;?>"><span class="icon icon-medal-rank-star"></span></button>
                                                                <?php
                                                                        $sw = 1;
                                                                    }
                                                                }
                                                                ?>

                                                                <?php
                                                                    if($sw==0){
                                                                ?>
                                                                    <button data-id="<?php echo $item->id_notion;?>" class="btn me_apunto" id="btn_<?php echo $item->id_notion;?>"><span class="icon icon-medal-outline-star"></span></button>
                                                                    <button data-id="<?php echo $item->id_notion;?>" class="btn remove_apunto hidden" id="btn__<?php echo $item->id_notion;?>"><span class="icon icon-medal-rank-star"></span></button>
                                                                <?php
                                                                    }
                                                                ?>

                                                            <?php else: ?>

                                                            <a tabindex="1" class="btn popup" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Necesitar haber iniciado sesion para dar me apunto"><span class="icon icon-medal-rank-star"></span></a>

                                                            <?php endif;?>
                                                        </span>
                                                    </div>
                                                    <div class="panel-google-plus-comment" id="panel-comment-<?php echo $item->id_notion;?>">
                                                        <div class="panel-google-plus-textarea">
                                                            <form action="<?php echo site_url('noise/add_comment');?>" method="POST" class="form_add_comment" id="form_add_comment-<?php echo $item->id_notion;?>" name="form_add_comment">
                                                                <input type="hidden" name="id_notion" value="<?php echo $item->id_notion;?>">
                                                                <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_usuario')?>">
                                                                <input type="hidden" name="tipo_comment" value="1">
                                                                <textarea class="form-control" rows="4" name="comment" id="comment"></textarea>
                                                                <button type="submit" class="[ btn btn-success disabled ]">Comentar</button>
                                                                <button type="reset" class="[ btn btn-default ]" data-id="<?php echo $item->id_notion;?>">Cancelar</button>
                                                            </form>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            }
                                        endforeach;

                                        endif;
                                        ?>