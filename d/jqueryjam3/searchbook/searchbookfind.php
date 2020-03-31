<img src="../h" alt="book">
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<?php 
require_once('../include/dba.inc.php');
ini_set('display_errors','0');

$layout = $LR->getLayout('Themissingmanualphp');
if(FileMaker::isError($layout)) die('Error fetching layout');
$chapters=$layout->getField('Chapter')->getValueList();

$ip=$_SERVER['REMOTE_HOST'];
?>

  <!---
      <form method="get" action="searchbook.php" id="searchform" name="searchform">
      
                
					<p>
                    
							<label for="Chapter"><purple>Chapter:</purple></label>
		<!--<input type="text" name="State" id="State"  class="inputbox2">-->                        
                      <!---  <select name="Chapter">-->
<?php




//foreach($chapters as $chapter) {
	//$state = htmlspecialchars($state);
?>
	<option></option>
    <option value="<?php //echo $chapter; ?>"><?php //echo $chapter; ?></option>
    

<?php
//}
?>
	</select>
		<!---			</p>
                    
                    
					<p>
						<center><input type="submit" name="button" id="button" value="Submit" ></center>
					</p>
				</form>--->
                <?php

if(isset($_GET['button']))
//if (5>9)
{
$postsFind = $LR->newFindCommand('Themissingmanualphp');

$postsFind->addFindCriterion('Chapter', $_GET['Chapter']);
$postsFind->addSortRule('Title', 1, FILEMAKER_SORT_ASCEND);
//$postsFind->addSortRule('Name', 2, FILEMAKER_SORT_ASCEND);
//$postsFind->addSortRule('z_Creation_Date', 1, FILEMAKER_SORT_DESCEND);

//$postsFind->setRange(0, 50);
$posts = $postsFind->execute();

//$found=$posts->getFoundSetCount();
//if('$found' == 0)

//if(6<5)
 //{
	//echo "hi";
 //}else{
 

// }



if(FileMaker::isError($posts)) {
echo "<boldred><center>Links found = 0. <br> Please try again.</center></boldred>";	
//die('No Trucks Stops Found.  Please try again.'.$posts->getMessage());	
}else{

?> Interesting links found:&nbsp;<?php   echo $posts->getFoundSetCount();
 

$postsArray = $posts->getRecords();
foreach($postsArray as $post) {
?>

<hr>

<ul>
<li>Chapter:&nbsp;<?php echo $post->getField('Chapter'); ?> </li>
<li>Title:&nbsp;<?php echo $post->getField('Title'); ?></li>
<p></p>
<li>Description:&nbsp;<?php echo $post->getField('Description'); ?></li>

Url:&nbsp;<a href="http://<?php echo $post->getField('Url'); ?>" target="_blank">
http://<?php echo $post->getField('Url'); ?>
</a>
</ul>

   <hr><hr>
<?php 

}//end foreach
?>End of list<?php
}
}

?>

