        <!-- javascripts -->
        <script src="<?=$base_css_js;?>js/jquery.js"></script>
        <script src="<?=$base_css_js;?>js/jquery-1.8.3.min.js"></script>
        <script src="<?=$base_css_js;?>js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="<?=$base_css_js;?>js/bootstrap.js"></script>
        <!-- nice scroll -->
        <script src="<?=$base_css_js;?>js/jquery.scrollTo.min.js"></script>
        <script src="<?=$base_css_js;?>js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="<?=$base_css_js;?>assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="<?=$base_css_js;?>js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="<?=$base_css_js;?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="<?=$base_css_js;?>js/owl.carousel.js" ></script>
        <!-- jQuery full calendar -->
        <script src="<?=$base_css_js;?>assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
        <!--script for this page only-->
        <script src="<?=$base_css_js;?>js/calendar-custom.js"></script>
        <!-- custom select -->
        <script src="<?=$base_css_js;?>js/jquery.customSelect.min.js" ></script>
        <!--custome script for all page-->
        <script src="<?=$base_css_js;?>js/scripts.js"></script>
        <!-- custom script for this page-->
        <script src="<?=$base_css_js;?>js/sparkline-chart.js"></script>
        <script src="<?=$base_css_js;?>js/easy-pie-chart.js"></script>
        <!-- data tables js -->
        <script src="<?=$base_css_js;?>assets/data-tables/jquery.dataTables.js"></script>
        <script src="<?=$base_css_js;?>assets/data-tables/DT_bootstrap.js"></script>
        <!-- dynamic table cuatom script for this page only-->
        <script src="<?=$base_css_js;?>js/functions.js"></script>
        <script src="<?=$base_css_js;?>assets/gritter/js/jquery.gritter.js"></script>

        <script>

            //knob
            $(function() {
                $(".knob").knob({
                    'draw' : function () {
                        $(this.i).val(this.cv + '%')
                    }
                })
            });

            //carousel
            $(document).ready(function() {
                $("#owl-slider").owlCarousel({
                    navigation : true,
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    singleItem : true

                });
            });

            //custom select box

            $(function(){
                $('select.styled').customSelect();
            });

        </script>