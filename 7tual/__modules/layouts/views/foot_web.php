    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url();?><?=$web_css_js;?>js/bootstrap.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>js/7tual.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>js/jquery.transform2d.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>js/jquery-scrolltofixed-min.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>js/jyoutube.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>js/holder.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>skippr/js/jquery.skippr.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>js/gridify.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>js/jquery-dateFormat.min.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>css/slick/slick.js"></script>

    <!-- Master Slider -->
    <script src="<?=base_url();?><?=$web_css_js;?>masterslider/jquery.easing.min.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>masterslider/masterslider.min.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>js/jquery-ui.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>js/alert.min.js"></script>
    <script src="<?=base_url();?><?=$web_css_js;?>js/jquery.selectric.js"></script>

    <script src="<?=base_url();?><?=$web_css_js?>js/sweetalert.min.js"></script>

    <script type="text/javascript">

        var slider = new MasterSlider();
         slider.setup('masterslider' , {
             width:1400,    // slider standard width
             height:450,   // slider standard height
             space:0,
             fullwidth:true,
             loop:false,
             //preload:0,
             autoplay:true
        });
        // adds Arrows navigation control to the slider.
        slider.control('arrows');
        slider.control({insertTo:'#masterslider'});
        slider.control('bullets');

    </script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

