        <div class="container-fluid" id="carousel-notion-event">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 notion-event">
                <?php
                foreach($list_events_vip as $event):
                ?>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 event">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <a href="<?php echo site_url('evento/'.$event->slug);?>"><img src="<?=base_url();?><?=$web_upload.'evento/'.$event->image_video;?>" class="img-responsive" alt=""></a>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>