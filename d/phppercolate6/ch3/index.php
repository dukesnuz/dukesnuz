<?php #Script 3.1-3.4- index.php
$page_title ='Welcome to this Site!';
include('includes/header.html');
?>
<h1>Content Header Scripts 3.1-3.4</h1>
<p>This is where the page specfic content goes. This section and the corresponding header, will change from one page to the next.</p>

<p></p>

<?php echo '<p>The page Title =' . $page_title. '.</p>'; ?>

<p></p>

<p>Some</p>
<p>Space</p>
<p>Added</p>
<p>Here</p>



<?php

if(!empty ($_SERVER['HTTP_REFERER'])){
   $previous=$_SERVER['HTTP_REFERER'];
   }else{
   $previous= NULL;
  }
?>
<p><a href="<?php echo $previous; ?>">Back</a></p>



<?php include('includes/footer.html');?>