<?

$taggable_count=0;

function taggable_image($path)
{
  global $taggable_count;
  $taggable_count++;
  $pfx = "t_{$taggable_count}_";

  $attrs = array(
    'style'=>'border: 0px',
    'width'=>75,
    'height'=>75,
    'id'=>$pfx."photo"
  );
  $args = func_get_args();
  $attrs = assemble_attrs($attrs, $args);

  $args = array($path);
  foreach($attrs as $k=>$v)
  {
    $args[] = $k;
    $args[] = $v;
  }
  $tag = call_user_func_array('image_thumb', $args);
  
  
  $w = $attrs['width']/2;
  $h = $attrs['height']/2;
  $html = <<<HTML
<div id="{$pfx}photo">
  $tag
</div>
<div id='{$pfx}loading' style='display: none'>
Loading...
</div>

<script type="text/javascript">
var {$pfx}url = '';

function {$pfx}updatePreview(img, selection)
{
  $('#{$pfx}photo').hide();
  $('#{$pfx}loading').show();
  url = "{$path}&w={$w}&h={$h}far=1&fltr[]=ric|3|3&f=png&zc=1&sx="+selection.x1/2+"&sy="+selection.y1/2+"&sw="+selection.width/2+"&sh="+selection.height/2;
  jQuery.get({$pfx}url, null, {$pfx}showPreview );
  $('input[name=item[x]]').val(selection.x1/2);
  $('input[name=item[y]]').val(selection.y1/2);
  $('input[name=item[w]]').val(selection.width/2);
  $('input[name=item[h]]').val(selection.height/2);
} 


function {$pfx}showPreview () {
  $('#preview').attr(
    'src',
    url
  );
  $('#{$pfx}loading').hide();
  $('#{$pfx}photo').show();
}


$(document).ready(function () {
	var ias = $('img#{$pfx}photo').imgAreaSelect({ handles: true, onSelectEnd: {$pfx}updatePreview, aspectRatio: "320:200" });
});  
</script>

HTML;
  return $html;
}
