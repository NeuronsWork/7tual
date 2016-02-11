<div id="slider">
    <!-- masterslider -->
    <div class="master-slider ms-skin-default" id="masterslider">
        <?php
        $n = 0;
        foreach ($list_slider as $item):
        ?>
            <!--<div class="slider"><img src="< ?=base_url().$upload_slider.$item->image_background;?>" class="slider__image"></div>-->
            <div class="ms-slide <?php echo $n;?>" data-delay="14">
                <img src="assets/masterslider/blank.gif" data-src="<?=base_url().$upload_slider.$item->image_background;?>">
                <img src="assets/masterslider/blank.gif" data-src="<?=base_url().$upload_slider.$item->imagen;?>" alt="Icon" style="right:180px; top:15px; height: 349px; width: 350px;" class="ms-layer" data-type="image" data-delay="300" data-duration="300" data-effect="scalefrom(0.5,0.5,449,-39)" data-ease="easeOutExpo">
                <h3 class="ms-layer hps-title1" style="left: 180px; top: 15px;" data-type="text"><?php echo $item->title;?></h3>
            </div>
        <?php
        $n++;
        endforeach;
        ?>
    </div>
    <!-- end of masterslider -->
</div>