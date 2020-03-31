<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
<head>

</head>
<body>


<?php

require_once('include/dba.inc.php');

ini_set('display_errors','0');

   
$postsFind = $LR->newFindCommand('Commentsphp');
$postsFind->addFindCriterion('Constant', 1);
$postsFind->addSortRule('z_Record_Id', 1, FILEMAKER_SORT_DESCEND);

$postsFind->setRange(0, 50);
$posts = $postsFind->execute();

if(FileMaker::isError($posts)) {
	die('Error: '.$posts->getMessage());
}
else
{
 
$postsArray = $posts->getRecords();

//echo "Currently Listed Links.<br>...".$posts->getFoundSetCount()."...";
?>

    <h5>
    Current Comments left.
<?php echo $posts->getFoundSetCount();?>
 Refreshes automatically.
 <p>Just a random number to show page is automatically refreshing == <?php echo rand(); ?></p>
</h5>

<?php
foreach($postsArray as $post) {
?>




<!--Currently Listed Links.<br>....................<br> -->

<!--<br>______________<br> -->
<!--<td><a href=mychannels.php target="_blank"<h33>Add to Live LIST</h33></a></td';> 
<br> -->
<line>__________________________________________</line>
<br>
<h44><td>Listed @:&nbsp;<?php echo $post->getField('z_Creation_Date'); ?>
<br>

  <!--Placement --> 
Commenter:&nbsp;&nbsp;
<?php echo $post->getField('Name'); ?>
  
  <br>
Comment: &nbsp;&nbsp;
<?php echo $post->getField('Comments'); ?>
<!--go to their page-->
</h44><br>
 
<?php 
}
}//end foreach?>

<hr>
End of list



  </center>
      
      <!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
//<![CDATA[
var sc_project=6080262; 
var sc_invisible=1; 
var sc_security="ed805b7b"; 
//]]>
</script>
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter_xhtml.js"></script>
<noscript><div class="statcounter"><a title="web counter"
href="http://statcounter.com/" class="statcounter"><img
class="statcounter"
src="http://c.statcounter.com/6080262/0/ed805b7b/1/"
alt="web counter" /></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

       
            </body>
		</html>
             