jQuery(document).ready(function(){

    var base_url = "http://localhost/7tualsys/";

/**
 * Reset Formulario
 */

    jQuery.fn.reset = function () {
        $(this).each (function() { this.reset(); });
    }

/**
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Functions jQuery Modules::Manager
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 */

    jQuery("#login-form").submit(function(event){
        event.preventDefault();
        var $form = $(this),
            msg = "",
            username = $form.find( "input[name='username']" ).val(),
            password = $form.find( "input[name='password']" ).val(),
            token    = $form.find( "input[name='token']" ).val(),
            url      = $form.attr( "action" );

        if(username=="" || password=="")
            msg = "Ingrese un usuario y una contraseña, los campos estan vacios";
        else
            msg = "Su usuario o contraseña son incorrectas, por favor intentar de nuevo";

        $.ajax({
            type: "POST",
            url: url,
            data: "username="+username+"&password="+password+"&token="+token,
            beforeSend:function(){
                $($form).find('.btn-block').text('Verificando...');
            },
            success:function(respuesta){
                if(respuesta == 'ok'){
                    $($form).find('.btn-block').text('Usuario correcto...');
                    $(location).attr('href',base_url+'dashboard');
                }else{
                    $($form).find('.btn-block').text('Iniciar sesion');
                }
            }
        });

    });

/**
 *
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Functions jQuery Modules::Medic
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 *
 **/

    /**
     * @function ::: Eliminar medicos
     */

    jQuery('.deleteMedic').on("click",function(){
        var id_medic    = $(this).attr('id');
        var url_delete   = $("#delete_medic").val();

        $.ajax({
            type: "POST",
            url: url_delete,
            data: "idMedic="+id_medic,
            beforeSend:function(){
                $('#med_'+id_medic).find('td').css({backgroundColor: 'rgb(252, 170, 170)'});
            },
            success:function(){
                $('#med_'+id_medic).fadeIn(500).delay(250).fadeOut(500);
            }
        });

    });

    /**
     * @function ::: Comprobar medicos existente
     */

    jQuery('.modal').on('keyup', '#inputCMP', function(){
        var cod_cmp = $("#inputCMP").val();
        var url = $("#check_codcmp").val();
        var lenght_cod = cod_cmp.length;

        if(lenght_cod > 4){
            $.ajax({
                type: "POST",
                url: url,
                data: "cod_cmp="+cod_cmp,
                beforeSend: function(){
                    $('#result_cmp').html('Verificando código...');
                },
                success:function(data){
                    if(data==1){
                        $('#result_cmp').html('El código no existe...');
                        $("#form_create_medic").find("input, select, button[type='submit']").removeAttr('disabled');
                    }else{
                        $('#result_cmp').html('El código existe...');
                        $("#form_create_medic").find("input, select, button[type='submit']").attr('disabled', true);
                        $("#form_create_medic").find("#inputCMP").removeAttr('disabled');
                    }
                }
            });
        }else{
            $('#result_cmp').html('El codigo es invalidado');
            $("#form_create_medic").find("input, select, button[type='submit']").attr('disabled', true);
            $("#form_create_medic").find("#inputCMP").removeAttr('disabled');
        };
    });

    /**
     * @function ::: Guardar nuevo medicos
     */

    jQuery('.modal').on('submit','form#form_create_medic[data-async]', function(event) {
        var $form = $(this);
        var url_create = $("#create_medic").val();
        var url = $("#url").val();

        $.ajax({
            type: $form.attr('method'),
            url: url_create,
            data: $form.serialize(),
            beforeSend:function(){
                $($form).find('.btn-send').text('Enviando datos...');
            },
            success: function(data){
                if(data==1){
                    $($form).find('.btn-send').text('Datos Guardados...');
                    $('#form_create_medic').reset();
                    $('.modal').delay(1500).modal('hide');
                    $($form).find('.btn-send').text('Nuevo médico');
                    $(location).attr('href',url);
                }
            }
        });

        event.preventDefault();
    });

    /**
     * @function ::: Editar medicos
     */

    jQuery('.editMedic').on("click",function(){
        var id_medic = $(this).attr('id');
        var url_edit = $('#edit_medic').val();
        $.ajax({
            type: 'POST',
            url: url_edit,
            data: 'cod_cmp='+id_medic,
            success: function(data){
                console.log(data);
                var result = JSON.parse(data);
                $.each(result, function(i, val){
                    //console.log(val.id_med);
                    $('form#form_edit_medic').find("#inputId").val(val.id_med);
                    $('form#form_edit_medic').find("#inputCMP").val(val.cod_cmp);
                    $('form#form_edit_medic').find("#inputPaterno").val(val.ap_paterno);
                    $('form#form_edit_medic').find("#inputMaterno").val(val.ap_materno);
                    $('form#form_edit_medic').find("#inputNombres").val(val.nombres);
                    $('form#form_edit_medic').find("#inputCategorias").val(val.categoria);
                    $('form#form_edit_medic').find("#inputEstado").append('<option value="val.est_med" selected="selected">'+val.est_med+'</option>');
                    $('form#form_edit_medic').find("#inputEspecializacion").append('<option value="val.cod_espec" selected="selected">'+val.cod_espec+'</option>')
                    $('form#form_edit_medic').find("#inputTitulo").val(val.tit_cod);
                    $('form#form_edit_medic').find("#inputTelefono").val(val.telefono);
                    $('#new_medic_edit').modal();
                });
            }
        });
    });

/**
 *
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Functions jQuery Modules::perfilusuario
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 *
 **/

    /**
     * @function ::: Guardar nuevo usuarios
     */

    jQuery('.modal').on('submit','form#form_create_user[data-async]', function(event) {
        var $form = $(this);
        var url_create = $("#create_user").val();
        var url = $("#url").val();

        $.ajax({
            type: $form.attr('method'),
            url: url_create,
            data: $form.serialize(),
            beforeSend:function(){
                $($form).find('.btn-send').text('Enviando datos...');
            },
            success: function(data){
                if(data==1){
                    $($form).find('.btn-send').text('Datos Guardados...');
                    $('#form_create_user').reset();
                    $('.modal').delay(1500).modal('hide');
                    $($form).find('.btn-send').text('Nuevo Usuario');
                    $(location).attr('href',url);
                }
            }
        });

        event.preventDefault();
    });

    /**
     * @function ::: Eliminar usuarios
     */

    jQuery('.deleteUser').on("click",function(){
        var id_user   = $(this).attr('id');
        var url_delete   = $("#delete_user").val();

        $.ajax({
            type: "POST",
            url: url_delete,
            data: "inputId="+id_user,
            beforeSend:function(){
                $('#user_'+id_user).find('td').css({backgroundColor: 'rgb(252, 170, 170)'});
            },
            success:function(){
                $('#user_'+id_user).fadeIn(500).delay(250).fadeOut(500);
            }
        });

    });

/**
 *
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
    Functions jQuery Modules::metodos
    ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 *
 **/

    /**
     * @function    ::: Guardar nuevo metodo
     * @event       ::: Clic
     */

    jQuery('.modal').on('submit','form#form_create_metodo[data-async]', function(event) {
        var $form = $(this);
        var url_create = $("#create_metodo").val();
        var url = $("#url").val();

        var descripcion = $('form#form_create_metodo').find("#inputDescripcion").val();

        $.ajax({
            type: $form.attr('method'),
            url: url_create,
            data: $form.serialize(),
            beforeSend:function(){
                $($form).find('.btn-send').text('Enviando datos...');
            },
            success: function(data){
                if(data != "" || data >= 1){
                    $($form).find('.btn-send').text('Datos Guardados...');
                    $('#form_create_metodo').reset();
                    $('.modal').delay(1500).modal('hide');
                    $($form).find('.btn-send').text('Nuevo metodo');
                    $('#form_metodos').find('select').append('<option value="'+data+'">'+descripcion+'</option>');
                }
            }
        });

        event.preventDefault();
    });

    /**
     * @function    ::: Cargar analisis
     * @evento      ::: change select
     */

    jQuery("#inputMetodos").change(function(){
        var idMetodo = "";
        $('select#inputMetodos option:selected').each(function() {
            idMetodo = $(this).val();
            if(idMetodo > 0){
                $.ajax({
                    type: "POST",
                    url: $('#consult_metodo').val(),
                    data: 'inputMetodos='+ idMetodo,
                    beforeSend:function(){
                        $('#list_analisis_x_metodo').append('Cargando analisis del metodo...')
                    },
                    success:function(data){
                        $('#list_analisis_x_metodo').html('');
                        $('#list_analisis_x_metodo').append(data);
                    }
                });
            }else{
                $('#list_analisis_x_metodo').html('');
            }

        });
    });


    /**
     * @eventos     ::: alerts o notificaciones
     */
    $('.alert-autocloseable-success').hide();
    $('.alert-autocloseable-warning').hide();
    $('.alert-autocloseable-danger').hide();
    $('.alert-autocloseable-info').hide();

    $('#autoclosable-btn-success').click(function() {
        $('#autoclosable-btn-success').prop("disabled", true);
        $('.alert-autocloseable-success').show();

        $('.alert-autocloseable-success').delay(5000).fadeOut( "slow", function() {
            // Animation complete.
            $('#autoclosable-btn-success').prop("disabled", false);
        });
    });

    $('#normal-btn-success').click(function() {
        $('.alert-normal-success').show();
    });

    $('#autoclosable-btn-warning').click(function() {
        $('#autoclosable-btn-warning').prop("disabled", true);
        $('.alert-autocloseable-warning').show();

        $('.alert-autocloseable-warning').delay(3000).fadeOut( "slow", function() {
            // Animation complete.
            $('#autoclosable-btn-warning').prop("disabled", false);
        });
    });

    $('#normal-btn-warning').click(function() {
        $('.alert-normal-warning').show();
    });

    $('#autoclosable-btn-danger').click(function() {
        $('#autoclosable-btn-danger').prop("disabled", true);
        $('.alert-autocloseable-danger').show();

        $('.alert-autocloseable-danger').delay(5000).fadeOut( "slow", function() {
            // Animation complete.
            $('#autoclosable-btn-danger').prop("disabled", false);
        });
    });

    $('#normal-btn-danger').click(function() {
        $('.alert-normal-danger').show();
    });

    $('#autoclosable-btn-info').click(function() {
        $('#autoclosable-btn-info').prop("disabled", true);
        $('.alert-autocloseable-info').show();

        $('.alert-autocloseable-info').delay(6000).fadeOut( "slow", function() {
            // Animation complete.
            $('#autoclosable-btn-info').prop("disabled", false);
        });
    });

    $('#normal-btn-info').click(function() {
        $('.alert-normal-info').show();
    });

    $(document).on('click', '.close', function () {
        $(this).parent().hide();
    });

});
