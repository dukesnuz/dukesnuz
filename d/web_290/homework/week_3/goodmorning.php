<p>Exercise page 83</p>
<?php
$hour = date("H");
echo $hour;
echo "<br>";
if ($hour < 12)
  {
  	echo 'Good morning';
  }else{
  	echo 'Good night';
  }
  
 include('../../stats.html');
?>