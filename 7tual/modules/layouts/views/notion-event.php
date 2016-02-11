        <div id="carrusel">
            <div class="grupo total">
                <?php foreach($list_events_vip as $event): ?>
                <div class="caja base-50 movil-1-3 tablet-20">
                    <a href="<?php echo site_url('evento/'.$event->slug);?>"><img src="<?=base_url();?><?=$web_upload.'evento/'.$event->image_video;?>" alt=""></a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>