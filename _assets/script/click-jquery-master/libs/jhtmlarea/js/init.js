$(document).ready( function() {
    $('.htmlarea').htmlarea();

    $('.tabs').bind('tabsshow', function(event,ui) {
      $('.htmlarea').htmlarea();
    });
  }
);
