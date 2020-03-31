<?php #Script 17.3 - index.php//all html is in the included files 
include('includes/17_01_header.html');

//print language-specfic content 
//below is introductory 

echo $words['intro'];
//echo 'session=' . $_SESSION['user_id'];
include('includes/17_02_footer.html');
?>

 