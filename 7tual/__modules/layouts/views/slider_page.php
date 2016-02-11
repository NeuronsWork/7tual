<div class="container-fluid" id="masterSlider">
    <!-- masterslider -->
    <div class="master-slider ms-skin-default" id="masterslider">
        <?php foreach ($list_slider as $item):?>
        <!-- new slide -->
        <div class="ms-slide slide-1" data-delay="14">
            <!-- slide background -->
            <img src="<?php echo base_url().$web_css_js;?>masterslider/blank.gif" data-src="<?=base_url().$upload_slider.$item->image_background;?>" alt="">
            <?php
            if($item->title != ""){
            ?>
            <h3 class="ms-layer hps-title1" style="width: 60%; left:50px; top:40px; font-size:60px; line-height: 70px;font-weight: bold; text-align: center; -webkit-transform: rotate(-3deg); -moz-transform: rotate(-3deg); -ms-transform: rotate(-3deg); -o-transform: rotate(-3deg); filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3); color: #fff; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);" data-type="text">
                <?=$item->title;?>
            </h3>
            <img src="<?php echo base_url().$web_css_js;?>masterslider/blank.gif" data-src="<?=base_url().$upload_slider.$item->imagen;?>" alt="" style="right:70px; top:50px;" class="ms-layer" data-type="image" data-effect="scalefrom(0.5,0.5,449,-39)" data-ease="easeOutExpo">
            <?php
            }
            ?>
        </div>
        <!-- end of slide -->
        <?php endforeach;?>
    </div>
    <!-- end of masterslider -->
</div>