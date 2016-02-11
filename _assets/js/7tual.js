/**
 * Created on 08/05/14.
 */

$(document).ready(function(){

    // comment noise
    $(document).on('click', '.input-placeholder', function(event) {
        var $panel = '#panel-comment-' + $(this).attr('data-id');
        $(this).css('display','none');
        $($panel).toggle('slow');
        $($panel).find('textarea').focus();
    });

    $(document).on('click', '.panel-google-plus-comment > .panel-google-plus-textarea > .form_add_comment > button[type="reset"]', function(event) {
        var $panel = '#panel-comment-' + $(this).attr('data-id');
            $ip = '#slide-comment-' + $(this).attr('data-id');
        $($panel).toggle('fast');
        $($ip).find('.input-placeholder').css('display', 'block');
    });

    $(document).on('keyup', '.panel-google-plus-comment > .panel-google-plus-textarea > .form_add_comment > textarea', function(event) {
        var $comment = $(this).closest('.panel-google-plus-comment');
        $comment.find('button[type="submit"]').addClass('disabled');
        if ($(this).val().length >= 1) {
            $comment.find('button[type="submit"]').removeClass('disabled');
        }
    });

    // Use CSS3 PIE PHP wrapper
    $.alert.setup({
        defaults: {
            pie: 'php'
        }
    });

    $(document).on('click', '.btn-search', function(){
        $('#search').toggle('fast');
    });

    /** SELECT */

    $('#select-country, #select-city, #select-category').selectric();

    $('#select-country').change(function(){
        var url = $('#url_list_city').val();
               url_s = $('#url_search_join').val();
               code = $(this).val();
               city = $('#select-city').val();
               category = $('#select-category').val();
        if(code != ''){
            // load select city
            $.post(url, { code_country: code, id_city: city, id_category: category }, function(data){
                var optF = '<option value="ALL">Todo el país</option>';
                $('#select-city').html('');
                $('#select-city').append(optF).selectric();
                $('#select-city').append(data).selectric();
                $('#viewCity').css('display', 'block');
                //$('#select-city').attr('enabled');
            });
            // load where country
            $.post(url_s, { code_country: code}, function(){
                $('#list_noise').html('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loading"><div class="row text-center before"><button type="button" class="btn btn-warning"><img src="assets/images/ajax-loader.gif"> Cargando ideas...</button></div></div>');
            }).done(function(data) {
                $('#list_noise').html('');
                $('#list_noise').html(data);
            });
        }
    });

    $('#select-city').change(function(){
        var url_s = $('#url_search_join').val();
               code = $('#select-country').val();
               category = $('#select-category').val();
               city = $(this).val();
        $.post(url_s, { code_country: code, id_city: city, id_category: category }, function(){
            $('#list_noise').html('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loading"><div class="row text-center before"><button type="button" class="btn btn-warning"><img src="assets/images/ajax-loader.gif"> Cargando ideas...</button></div></div>');
        }).done(function(data){
            $('#list_noise').html('');
            $('#list_noise').html(data);
        });
    });

    $('#select-category').change(function(){
        var url_s = $('#url_search_join').val();
               code = $('#select-country').val();
               city = $('#select-city').val();
               category = $(this).val();
        $.post(url_s, { code_country: code, id_city: city, id_category: category }, function(){
            $('#list_noise').html('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loading"><div class="row text-center before"><button type="button" class="btn btn-warning"><img src="assets/images/ajax-loader.gif"> Cargando ideas...</button></div></div>');
        }).done(function(data){
            $('#list_noise').html('');
            $('#list_noise').html(data);
        });
    });

    $('.id_others').click(function(){
        var url_s = $('#url_search_join').val();
        code = $('#select-country').val();
        city = $('#select-city').val();
        category = $('#select-category').val();
        other = $(this).attr('data-id');
        $.post(url_s, { code_country: code, id_city: city, id_category: category, other: other }, function(){
            $('#id_others').attr('value', other);
            $('#list_noise').html('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loading"><div class="row text-center before"><button type="button" class="btn btn-warning"><img src="assets/images/ajax-loader.gif"> Cargando ideas...</button></div></div>');
        }).done(function(data){
            $('#list_noise').html('');
            $('#list_noise').html(data);
        });
    });

    $(document.body).on('click','.dropdown-country li', function(event){
        var $target = $(event.currentTarget);
        $target.closest('.dropdown-countrys').find('[data-bind="label"]').text($target.text()).end().children('.dropdown-toggle').dropdown('toggle');
        var code_country= $target.attr('data-code');
            url_send    = $('#url_city').val();
            url_search  = $('#url_search_location').val();
        $.get(url_send+code_country, function(data)
        {
            var citys = '';
            var city = $.parseJSON(data);
            $.each(city, function(){
                citys += '<li><a href="'+url_search+code_country+'/'+this['id_city']+'">'+this['name_city']+'</a></li>';
            });
            $('.dropdown-city').html(citys);
        });
        return false;
    });

    $('.slide_content_1').bind('click',function(){
        var base_url= $('#base_url_1').val();
            slug    = $(this).attr('data-url');
            category    = $(this).attr('data-category');
            currentURL = base_url+'/'+category+'/'+slug;
        //alert(base_url+'/'+slug);
        $(location).attr('href',currentURL);
    });

    /* Smooth scrolling para anclas */
    $('a.btn-down-page').on('click', function() {
        var $link = $(this);
        var anchor  = "#"+$link.attr('data-ancla');
        $('html, body').stop().animate({
            //scrollTop = $(anchor).offset().top
            scrollTop: $(anchor).position().top - 20
        }, 1000);
    });

    $("#mySlick").skippr({
        transition: 'slide',
        speed: 1000,
        easing: 'easeOutQuart',
        navType: 'block',
        childrenElementType: 'div',
        arrows: true,
        autoPlay: true,
        autoPlayDuration: 5000,
        keyboardOnAlways: true,
        hidePrevious: false
    });

    $("#mySlick1").skippr({
        transition: 'slide',
        speed: 1000,
        easing: 'easeOutQuart',
        navType: 'block',
        childrenElementType: 'div',
        arrows: true,
        autoPlay: true,
        autoPlayDuration: 5000,
        keyboardOnAlways: true,
        hidePrevious: false
    });

    $('.notion-event').slick(
    {
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive:
        [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 320,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

	/**
	* Reset Formulario
	*/

    jQuery.fn.reset = function () {
        $(this).each (function() { this.reset(); });
    }

    $('.popup').popover();

    /**
    Functions jQuery ScrollToFixed
    **/

    $('[data-toggle=offcanvas]').click(function(e){
        var xx = $('.row-offcanvas').hasClass('active');
        if(xx == true){
            $('.nav-sidebar').trigger('detach.ScrollToFixed');
        }else{
            $('#nav-sidebar').scrollToFixed({
                marginTop: $('#submenu').outerHeight() + 70
            });
            $('#nav-sidebar').css('left','15px');
            $(window).scroll(function(){
                $('#nav-sidebar').scrollToFixed({
                    marginTop: $('#submenu').outerHeight() + 70
                });
            });
        }
        $('.row-offcanvas').toggleClass('active');
    });

    var path = $(this);
    var contW = path.width();

    if(contW >= 768){
        $('#nav-sidebar').scrollToFixed({
            marginTop: $('.header').outerHeight() + 70
        });
    }else{
        $('#nav-sidebar').scrollToFixed({
            marginTop: $('#submenu').outerHeight() + 70
        });
    }

    $('#sub-menu').scrollToFixed({
        marginTop: $('.header').outerHeight() + 40
    });


    /**
    Functions modal bootstrap
    **/
    $('.register').on('click', function(e){
        $('#myFormLogin').modal('hide');
        $('#myFormRegister').modal('show');
    });

    $('.login').on('click', function(e){
        $('#myFormLogin').modal('show');
        $('#activate_ok').modal('hide');
    });

    /**
    Functions jQuery Modules::Web -> add user
    */
    $("#form_register").submit(function(event){

        event.preventDefault();
        var $form = $(this);

        $.ajax({
            url : $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            beforeSend:function(){
                $('#info_register').html('Enviando...');
            },
            success: function(data){
                if(data==1){
                    $("#form_add_message").reset();
                    $('#info_register').html('Enviando correo de activación...');
                    $('#myFormRegister').delay(4000).modal('hide');
                    $('#msg_activate').delay(4000).modal('show');
                    $('#info_register').html('');
                    $form.reset();
                }
            },
            error: function(){
                console.log("Error al guardar datos");
            }
        });
    });

    $("#form_register_noise").submit(function(event){

        event.preventDefault();
        var $form = $(this);

        $.ajax({
            url : $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            beforeSend:function(){
                $('#info_register_noise').html('Agregando...');
            },
            success: function(data){
                if(data==1){
                    $("#form_add_message").reset();
                    $('#info_register_noise').html('Idea agregada correctamante... en unos instantes se publicara su idea.');
                    setTimeout(function(){
                       location.reload(1);
                    }, 3000);
                }
            },
            error: function(){
                console.log("Error al guardar datos");
            }
        });
    });

    /**
    Functions jQuery Modules::Web -> add user
    */
    $("#login-form").submit(function(event){
        event.preventDefault();
        var $form = $(this);
        $.ajax({
            url : $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            beforeSend:function(data){
                $("#info_login").html("Verificando datos...");
            },
            success: function(data){
                if(data==1){
                    console.log(data);
                    var url_current = $('input[name="url_current"]').val();
                    $("#info_login").html("Usuario correcto. Cargando...");
                    $('#myFormLogin').delay(8000).modal('hide');
                    location.reload();

                }else{
                    $("#info_login").html("Datos incorrectos, verificar usuario y contraseña");
                }
            },
            error: function(){
                $("#info_login").html("Error al consultar datos");
            }
        });
    });

/**
Functions jQuery Modules::Web
*/

    $("#form_add_message").submit(function(event){

       event.preventDefault();
       var $form = $(this);

        $.ajax({
            url : $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            beforeSend:function(){
                $($form).find('.info').text('Enviando...');
            },
            success: function(data){
                if(data==1){
                    $("#form_add_message").reset();
                    $($form).find('.info').text('Usuario registrado...');
                    $($form).find('.info').delay(1500).html('');
                }
            },
            error: function(){
            	console.log("Error al guardar datos");
            }
        });
    });

    $("#form_report").submit(function(event){

        event.preventDefault();
        var $form = $(this);

        $.ajax({
            url : $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            beforeSend:function(){
                $($form).find('.info').text('Enviando...');
            },
            success: function(data){
                if(data==1){
                    $("#form_report").reset();
                    $($form).find('.info').text('Reporte enviado...');
                    $($form).find('.info').delay(1500).html('');
                }
            },
            error: function(){
                console.log("Error al guardar reporte");
            }
        });
    });

    /**
     * Functions jQuery Add Comment
     */
    $("#form_add_comment").submit(function(event){

        event.preventDefault();
        var $form = $(this);

        $.ajax({
            url : $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            beforeSend:function(){
                $($form).find('.info').text('Enviando comentario...');
            },
            success: function(data){
                if(data==1){
                    $("#form_add_message").reset();
                    $($form).find('.info').text('Comentario agregado correctamente...');
                    location.reload();
                }
            },
            error: function(){
                alert("Error al guardar datos");
            }
        });
    });

    $(document).on("submit", ".form_add_comment", function(event){
        event.preventDefault();
        var $form = $(this);
            $id_notion = $($form).find('[name="id_notion"]').val();
        console.log($id_notion);
        $.ajax({
            url : $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            beforeSend:function(){},
            success: function(data){
                if(data==1){
                    swal({
                        title: "",
                        text: "Comentario agregado correctamente...",
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                    });
                    var $panel = '#panel-comment-' + $id_notion;
                        $ip = '#slide-comment-' + $id_notion;
                    $($panel).toggle('fast');
                    $($ip).find('.input-placeholder').css('display', 'block');
                }
            },
            error: function(){
                swal({
                    title: "",
                    text: "Error al guardar comentario!",
                    type: "error",
                    timer: 3000,
                    showConfirmButton: false
                });
            }
        });
    });

    /** Function me apunto */
    $(".list-noise").on("click", "button.me_apunto", function(){
        var action = $('#url_meapunto').val();
            id_user = $('#user_id').val();
            id_notion = $(this).attr('data-id');
            likes = $("#"+id_notion).find('.slide-counter').attr('data-counter');
            console.log(id_notion);

        $.ajax({
            url : action,
            type: 'POST',
            data: 'id_user='+id_user+'&id_notion='+id_notion,
            beforeSend:function(){},
            success: function(data){
                if(data==1){
                    var addLikes = parseInt(likes) + 1;
                    $('#btn_'+id_notion).html('<span class="icon icon-medal-rank-star"></span>');
                    $('#btn_'+id_notion).addClass('hidden');
                    $('#btn_'+id_notion).removeClass('show');
                    $('#btn__'+id_notion).removeClass('hidden');
                    $('#btn__'+id_notion).addClass('show');
                    $("#"+id_notion).find('.slide-counter').html("+"+addLikes);
                    $("#like-"+id_notion).attr('data-counter', addLikes);
                }
            },
            error: function(){
                alert("Error al guardar datos");
            }
        });
    });

    $(".list-noise").on( "click", "button.remove_apunto", function() {
        var action = $('#url_removeapunto').val();
            id_user = $('#user_id').val();
            id_notion = $(this).attr('data-id');
            likes = $("#like-"+id_notion).attr('data-counter');
        $.ajax({
            url : action,
            type : 'POST',
            data: 'id_user='+id_user+'&id_notion='+id_notion,
            beforeSend:function(){},
            success: function(data){
                var addLikes = parseInt(likes) - 1;
                $('#btn__'+id_notion).html('<span class="icon icon-medal-rank-star"></span>');
                $('#btn__'+id_notion).addClass('hidden');
                $('#btn__'+id_notion).removeClass('show');
                $('#btn_'+id_notion).removeClass('hidden');
                $('#btn_'+id_notion).addClass('show');
                $("#"+id_notion).find('.slide-counter').html("+"+addLikes);
                $("#"+id_notion).find('.slide-counter').attr('data-counter', addLikes);
                $("#like-"+id_notion).attr('data-counter', addLikes);
            },
            error: function(){
                alert('Error al guardar datos');
            }
        });
    });

    $('.list-comment').on('click','.report', function(){
        var id_comment = $(this).attr('data-id');
               action = $('#url_report').val();
        $.alert.open('confirm', '¿Desea denunciar este comentario?',function(button) {
            if (button == 'yes'){
                $.ajax({
                    url : action,
                    type : 'POST',
                    data: 'id='+id_comment,
                    beforeSend:function(){},
                    success: function(data){
                        $.alert.open('Comentario denunciado.');
                    },
                    error: function(){
                        $.alert.opem('Error al reportar comentario');
                    }
                });
            }
        });
    });

});

;(function($){
    $('.info').popover();
})(jQuery);