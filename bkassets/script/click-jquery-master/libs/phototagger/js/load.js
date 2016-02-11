var path = '';
var url;

function updatePreview(img, selection)
{
  $('#preview').hide();
  $('#preview_load').show();
  $('#preview').attr(
    'src',
    ''
  );
  url = "/images/small"+path+"?sx="+selection.x1+"&sy="+selection.y1+"&sw="+selection.width+"&sh="+selection.height+"&ssw=medium";
  jQuery.get(url, null, showPreview );
  $('input[name=item[x]]').val(selection.x1);
  $('input[name=item[y]]').val(selection.y1);
  $('input[name=item[w]]').val(selection.width);
  $('input[name=item[h]]').val(selection.height);
} 


function showPreview () {
  $('#preview').attr(
    'src',
    url
  );
  $('#preview_load').hide();
  $('#preview').show();
}

var selection = null;
var ias;

$(document).ready(function () {
  args = { handles: true, onSelectEnd: updatePreview, instance: true};
	if (selection != null)
	{
	 args['x1'] = selection['x'];
	 args['y1'] = selection['y'];
	 args['x2'] = selection['x']+selection['w']-1;
	 args['y2'] = selection['y']+selection['h']-1;
	}
	ias = $('img#photo').imgAreaSelect(args);
});
