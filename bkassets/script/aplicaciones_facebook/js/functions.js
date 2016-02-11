/**
 * Created with JetBrains PhpStorm.
 * User: isra
 * Date: 25/11/12
 * Time: 0:31
 * To change this template use File | Settings | File Templates.
 */
$('.send_comment').live("click",function(){
    var id = $(this).attr("id");
    var comment= $("#comment_textarea"+id).val();
    var data = 'comment='+ comment + '&id_message=' + id;
    if(comment=='')
    {
        alert("Escribe algo.");
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "load_comment_ajax.php",
            data: data,
            cache: false,
            before: function(){
                $("#carga_comentarios"+id).html("<img src='images/ajax-loader.gif' />");
            },
            success: function(response){
                $(response).prependTo("#carga_comentarios"+id);
                $("#comment_textarea"+id).attr("value", "").focus();
            }
        });
    }
    return false;
});


$('.send_entry').live("click",function(){
    var message= $("#newentry").val();
    var data = 'newentry='+ message;
    if(message=='')
    {
        alert("Escribe algo.");
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "new_entry.php",
            data: data,
            cache: false,
            before: function(){
                $("#other_comments").html("<img src='images/ajax-loader.gif' />");
            },
            success: function(response){
                $(response).prependTo("#other_comments");
                $("#newentry").attr("value", "").focus();
            }
        });
    }
    return false;
});