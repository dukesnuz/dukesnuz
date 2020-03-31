<?php
  //set databse access info as constraints
  
  DEFINE('DB_USER', 'ecommercetwo');
  DEFINE('DB_PASSWORD', 'Stacy1964!');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_NAME', 'ecommercetwo');

  //make connection
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  
  //set character set
  mysqli_set_charset($dbc, 'utf8');
  
  //omit closing PHP tag to avoid error  headers already sent
  
// see page 203 to see how to create diff MySQL users that have a differrent permissions on specific table

// $user = 'general';
// require(MYSQL);
// see page 204 for the rest
