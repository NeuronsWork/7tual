$(document).ready( function() {
  $('select[multiple="multiple"]').crossSelect();

  $('.collapsible').bind('toggle', function(event,ui) {
    $('select[multiple="multiple"]').crossSelect();
  });  

  $('.tabs').bind('tabsshow', function(event,ui) {
    $('select[multiple="multiple"]').crossSelect();
  });  
});