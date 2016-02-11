<?


$libs = array('jquery');
foreach($this->e->modules_by_slug as $module_slug=>$m)
{
  if (!isset($m->jquery)) continue;
  $m->jquery = string_to_array($m->jquery);
  $libs = array_merge($libs, $m->jquery);
}
$libs = array_unique($libs);

$deps = array(
  'ui.effects'=>array('ui'),
  'ui.interactions'=>array('ui','ui.effects'),
  'ui.widgets'=>array('ui', 'ui.effects', 'ui.interactions', 'dynamicform'),
  'daterangepicker'=>array('urlencode','ui', 'ui.effects', 'ui.interactions', 'clockpick'),
  'styled_button'=>array('urlencode','ui','ui.widgets', 'ui.effects', 'ui.interactions'),
  'validate'=>array('ajax_form', 'metadata'),
);


$final_libs = array();
//$conflicts = array(array('tabs', 'ui.widgets'));
$conflicts=array();
$added=true;
while($added)
{
  $added=false;
  foreach($libs as $lib)
  {
    if (array_key_exists($lib, $deps))
    {
      $final_libs = array_merge($final_libs, $deps[$lib]);
    }
    $final_libs[] = $lib;
  }
}
$libs = array_unique($final_libs);

foreach($conflicts as $conflict)
{
  if(in_array($conflict[0], $libs)){
    if(in_array($conflict[1], $libs)){
      click_error("jquery conflict: $conflict[0] and $conflict[1] are not compatible plugins");
    }
  }
}


$load_order = array(
  'jquery',
  'ui',
  'ui.effects',
  'ui.interactions',
  'ui.widgets',
  'htmlarea',
  'wysiwyg',
  'collapsible',
  'textexpander',
  'colorbox',
);

$final_libs_ordered = array();
$final_libs_unordered = array();
foreach($libs as $lib)
{
  $idx = array_search($lib, $load_order);
  if ($idx===FALSE)
  {
    $final_libs_unordered[] = $lib;
    continue;
  }
  $final_libs_ordered[$idx] = $lib;
}

ksort($final_libs_ordered);

$libs = array_merge($final_libs_ordered, $final_libs_unordered);

foreach($libs as $fname)
{
  $folders = array('css', 'sass', 'js');
  foreach($folders as $folder)
  {
    $path = $this->fpath."/libs/$fname/$folder";
    if (!file_exists($path)) continue;
    $this->enqueue_codegen("register_asset_folder('jquery', '$path', '$folder');");
  }
}

$this->enqueue_codegen("\$this->libs = " . s_var_export($libs) .";");
