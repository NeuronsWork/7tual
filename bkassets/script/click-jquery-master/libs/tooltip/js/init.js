$(document).ready( function() {
  $(".tooltip").tooltip({ 
      bodyHandler: function() { 
        e = $(this);
        id = e.attr("id")+'_content';
        return $('#'+id).html();
      }, 
      showURL: false 
  });
});