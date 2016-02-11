<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Scroll infinito codeigniter</title>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row-fluid">
			<div class="col-md-8 col-md-offset-2 content">
				<?php
	            foreach ($respuesta as $fila) {
	            ?>
	                <div class="panel panel-info">
						<div class="panel-heading">
						    <h3 class="panel-title">
						    	Escrito por <?php echo $fila->name ?>
						    	<span class="pull-right"><?php echo $fila->id ?></span>
						    </h3>
						</div>
						<div class="panel-body">
						    <p>Escrito por <?php echo $fila->name ?></p>
		                    <p><?php echo $fila->registro ?></p>
		                    <p><?php echo $fila->email ?></p>
						</div>
					</div>
	            <?php
	            $id = $fila->id;
	            }
	            ?>
	        </div>
            <div class="before col-md-12 text-center"><img src='imgs/preloader.gif' /></div>
            <div class="lastId" style="display:none" id="<?php echo  $id ?>"></div>
		</div>
	</div>
</body>
<script type="text/javascript">
//creamos una función para llamarla en el evento del scroll
function loadMore()
{
    var id = $(".lastId").attr("id"), getLastId, html = "";
    if (id != "" || id != "undefined")
    {
        $.ajax({
            type : "POST",
            url : "http://localhost/scrollinfinito/scroll/loadMore",
            data : "lastId=" + id,//la última id
            beforeSend: function()
            {
                $(".before").show();
            },
            success : function(data)
            {
                $(".before").hide();
                var json = JSON.parse(data);
                if(json.res === "success")
                {
                   for(datos in json.users)
                   {
                        html += '<div class="panel panel-info">';
                        html += '<div class="panel-heading">';
                        html += '<h3 class="panel-title">';
                        html += 'Escrito por ' + json.users[datos].name;
                        html += '<span class="pull-right">' + json.users[datos].id + '</span>';
                        html += '</h3>';
                        html += '</div>';
                        html += '<div class="panel-body">';
                        html += '<p>Escrito por ' + json.users[datos].name + '</p>';
                        html += '<p>' + json.users[datos].registro + '</p>';
                        html += '<p>' + json.users[datos].email + '</p>';
                        html += '</div>';
                        html += '</div>';
                        getLastId = json.users[datos].id;
                   }
                   $(".content").append(html);
                   scrollLoad = true;
               }
               else
               {
                    moreusers = false;
                    $(".content").append("<div class='alert alert-danger text-center'>Ya no hay más users</div>");
               }
                 $(".lastId").attr("id",getLastId);
            },
            error: function()
            {
                //hacer algo cuando ocurra un error
            }
        });
    }
}

//actuamos en en evento del scroll
var scrollLoad = true;

$(window).scroll(function () {
  if (scrollLoad && $(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
    scrollLoad = false;
    loadMore();
  }
});
</script>
</html>