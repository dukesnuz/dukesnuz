<?php

// home.html

 require('includes/config.inc.php');
   
  $page_title = 'Coffee - Would\'nt you Love a Cup Right Now?';
  
   include('./includes/header.html');
  
  require(MYSQL);
  
  //using false tells stored procedure to not return all every item..true will return all
 // $r = mysqli_query($dbc, "CALL select_sale_items(false))");
  $r = mysqli_query($dbc, 'CALL select_sale_items(false)');
  
  include('./views/home.html');
  
include('./includes/footer.html');
  ?>

