/**
 * @author David
 */
/*
$(document).bind( "mobileinit", function () { 
//$(document).bind("mobileinit", function(){
  $.mobile.page.prototype.options.headerTheme = "b";
  //$.mobile.page.prototype.options.headerTheme= "b";
  $.mobile.page.prototype.options.footerTheme = "b";
  //$.mobile.page.prototype.options.footerTheme= "b";
});

function checkForMobile (){
//function checkForMobile(){
  if(!/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)){
 // if(!/Android|webOS|iPhone|ipad|iPod|BlackBerry/i.test(navigator.userAgent)){
    $("#border").css({ "background-image":'url(../images/phone.png)',
   // $("#border").css({"background-image":'url(../images/phone.png)',
    height:700, width:350});
   // height:700, width:350});
    $("#frame").css({height:475, width:267, "margin-top":112, "margin-left":40,
    //$("#frame").css({height:475, width:267, "margin-top":112, "margin=left":40,
     position:"absolute", overflow:"hidden" });
      //position:"absolute", overflow:"hidden"});
     }
}
*/

$(document).bind( "mobileinit", function () { 
  $.mobile.page.prototype.options.headerTheme = "b";
  $.mobile.page.prototype.options.footerTheme = "b";
});
function checkForMobile (){
  if(!/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)){
    $("#border").css({ "background-image":'url(../images/phone.png)',
      height:700, width:350});
    $("#frame").css({height:475, width:267, "margin-top":112, "margin-left":40,
      position:"absolute", overflow:"hidden" });
  }
}
