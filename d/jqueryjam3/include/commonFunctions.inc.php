<?php
function POST($var=null) {
   if($var === null) {
      $ret = array();
      foreach($_POST as $key=>$value) {
         $ret[$key] = POST($key);
      }
      return $ret;
   }
   if(!isset($_POST[$var])) return false;
   if(get_magic_quotes_gpc()) {
      return stripslashes($_POST[$var]);
   }else{
      return $_POST[$var];
   }
}

function GET($var=null) {
   if($var === null) {
      $ret = array();
      foreach($_GET as $key=>$value) {
         $ret[$key] = GET($key);
      }
      return $ret;
   }
   if(!isset($_GET[$var])) return false;
   if(get_magic_quotes_gpc()) {
      return stripslashes($_GET[$var]);
   }else{
      return $_GET[$var];
   }
}
?>