console.log('Website Develop by gravity.cr - Andrés Castillo | follow me @aazcast')
//Web font
jQuery(function(){
  try{Typekit.load({ async: true });}catch(e){}
});


//Top Page
jQuery(document).ready(function() {
var movementStrength = 25;
var height = movementStrength / jQuery(window).height();
var width = movementStrength / jQuery(window).width();

//Top Image
  jQuery("#top-image").mousemove(function(e){
    var pageX = e.pageX - (jQuery(window).width() / 2);
    var pageY = e.pageY - (jQuery(window).height() / 2);
    var newvalueX = width * pageX * -1 - 45;
    var newvalueY = height * pageY * -1 - 250;
    jQuery('#top-image').css("background-position", newvalueX+"px     "+newvalueY+"px");
  });
  //On Click Menu
  jQuery('._menuMovil').on('click', function(){
    jQuery('.menuItems').fadeIn();
  });
  jQuery('.closeMenu').on('click', function(){
    jQuery('.menuItems').fadeOut();
  })
});


