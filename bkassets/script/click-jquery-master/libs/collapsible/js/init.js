$(document).ready(function()
{

  init_collapsibles();
});

function init_collapsibles()
{
  //hide the all of the element with class msg_body
  $(".collapsible").hide();
  //toggle the componenet with class msg_body
  $(".collapsible_head").click(function()
  {
    $(this).nextAll(".collapsible:first").slideToggle(600);
    $(this).nextAll(".collapsible:first").trigger('toggle');
  });
}