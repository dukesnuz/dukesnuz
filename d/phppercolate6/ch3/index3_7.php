<?php #Script 3.7- index3_7.php

//This function outputs theoretical HTML
//for adding ads to a web page
function create_ad(){
echo '<p class+"ad">This is an annoying ad! This is an annoying ad! This is an annoying ad! This is an annoying ad!</p>';
} //End of the function defination.
$page_title ='Welcome to this Site!';
include('includes/header.html');

//call function
create_ad();
?>
<h1>Content Header SCript 3.7</h1>
<p>This is where the page specfic content goes. This section and the corresponding header, will change from one page to the next.</p>
<br />
<br />

<?php echo '<p>The page Title =' . $page_title. '.</p>'; ?>

<br />
<br />

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