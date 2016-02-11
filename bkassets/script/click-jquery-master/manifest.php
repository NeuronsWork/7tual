<?

$manifest = array(
  'slug'=>'com.benallfree.click.jquery',
  'load_before'=>array(
    'com.benallfree.click'=>array(
      'sass',
    ),
  ),
  'load_after'=>array(
    'com.benallfree.click'=>array(
      'asset_autoloader',
    ),
  ),
  'requires'=>array(
    'com.benallfree.click'=>array(
      'sass',
      'asset_autoloader'
    )
  )
);