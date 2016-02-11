<?

foreach($this->libs as $lib)
{
  foreach(click_glob($this->fpath."/libs/${lib}/lib/*.php") as $path)
  {
    require($path);
  }
}
