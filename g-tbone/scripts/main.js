console.log('Website Develop by gravity.cr - Andrés Castillo | follow me @aazcast')
//Web font
$(function(){
  try{Typekit.load({ async: true });}catch(e){}
});


//Top Page
$(document).ready(function() {
var movementStrength = 25;
var height = movementStrength / $(window).height();
var width = movementStrength / $(window).width();

//Top Image
  $("#top-image").mousemove(function(e){
    var pageX = e.pageX - ($(window).width() / 2);
    var pageY = e.pageY - ($(window).height() / 2);
    var newvalueX = width * pageX * -1 - 45;
    var newvalueY = height * pageY * -1 - 250;
    $('#top-image').css("background-position", newvalueX+"px     "+newvalueY+"px");
  });
});