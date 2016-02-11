<?
global $jquery_libs;

$files = array();
foreach($jquery_libs as $lib)
{
  $files = array_merge($files, rglob($this_module_fpath .'/libs/'.$lib, '*.*'));
}
