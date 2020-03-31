/**
 * @author David
 */

/*
//$(document).ready(function() {
$(document).ready(function(){
 // checkForMobile();
  checkForMobile();
 // $("#pageOne").on("swipeleft", function(){
  $("#pageOne").on("swipeleft", function(){
  //$.mobile.changePage("#pageTwo", {transition:"slide"}); });
   $.mobile.changePage("#pageTwo", {transition:"slide"});});
  //$("#pageTwo").on("swiperight", function(){
  $("#pageTwo").on("swiperight", function(){
   //$.mobile.changePage("#pageOne", {transition:"slide", reverse:true}); });
    $.mobile.changepage("#pageOne", {transition:"slide", reverse:true});});
  //$("#pageTwo").on("swipeleft", function(){
  $("#pageTwo").on("swipeleft", function(){
   // $.mobile.changePage("hour2201-page3.html", {transition:"slide", }); });
 $.mobile.changePage("hour22_01_page_3.html", {transition:"slide",});});
 //$(document).on("pageload", function(e, obj){
 $(document).on("pageload", function(e, obj){
 // if($("#pageThree .ui-content").length) {
 if($("#pageThree .ui-content").length){
  //  $("#pageThree .ui-content").append("Page loaded from: "+ obj.url); }
    $("#pageThree .ui-content").append("Page loaded  from: "+ obj.url);}
  });
});
*/


$(document).ready(function() {
  checkForMobile();
  $("#pageOne").on("swipeleft", function(){
    $.mobile.changePage("#pageTwo", {transition:"slide"}); });
  $("#pageTwo").on("swiperight", function(){
    $.mobile.changePage("#pageOne", {transition:"slide", reverse:true}); });
  $("#pageTwo").on("swipeleft", function(){
    $.mobile.changePage("hour2201-page3.html", {transition:"slide", }); });
  $(document).on("pageload", function(e, obj){
  if($("#pageThree .ui-content").length) {
    $("#pageThree .ui-content").append("Page loaded from: "+ obj.url); }
  });
});
