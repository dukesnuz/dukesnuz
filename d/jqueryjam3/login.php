<?php

$password="secret";
$username="007";

$user=isset($_GET['username']) ? $_GET['username'] : $_POST['username'];
$pass=isset($_GET['password']) ? $_GET['password'] : $_POST['password'];

//if ($user==$username && $pass==$password) 
if($user=="secret" && $pass==007)

{
  echo 'pass';
} else {
  echo 'fail';
}



?>