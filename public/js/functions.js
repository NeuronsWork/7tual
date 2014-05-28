/**
 *
 *
  __
 /\ \
 \ \ \____  _ __    __     __  __    ___     ____     _____      __
  \ \ '__`\/\`'__\/'__`\  /\ \/\ \  / __`\  /',__\   /\ '__`\  /'__`\
   \ \ \L\ \ \ \//\ \L\.\_\ \ \_/ |/\ \L\ \/\__, `\__\ \ \L\ \/\  __/
    \ \_,__/\ \_\\ \__/.\_\\ \___/ \ \____/\/\____/\_\\ \ ,__/\ \____\
     \/___/  \/_/ \/__/\/_/ \/__/   \/___/  \/___/\/_/ \ \ \/  \/____/
                                                        \ \_\
                                                         \/_/
 *
 *
 */

jQuery(document).ready(function(){

    var base_url = "http://localhost/endolab/";

/**
*
* Reset Formulario
*
*/

    jQuery.fn.reset = function () {
        $(this).each (function() { this.reset(); });
    }

/**
 *
 * ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 * 
 * Functions jQuery Modules::Login
 *
 * ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 * 
 **/

    jQuery("#login-form").submit(function(event)
    {
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
                    var unique_id = $.gritter.add({
                        title: 'Inicio de sesion fallida',
                        text: msg,
                        image: base_url+'public/img/avatar-mini.jpg',
                        sticky: true,
                        time: '',
                        class_name: 'my-sticky-class'
                    });
                }
            }
        });

    });


/**
 *
 * ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
 * 
 * Functions jQuery Modules::Medic
 *
 * ▄ █ ▄ █ ▄ █ ▄ █ ▄ ▄ █ ▄ █ ▄ █
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

});