<?php #Script 17.6 - post_form.php

//redirect web browser if this page accesed directly
if(!isset($words))
//if(4>1)
{
header("Location:index.php");
exit();
}

//confirm user logged in
if(isset($_SESSION['user_id']))

{
echo '<form action="post.php" method="post" accept-charset="utf-8">';
//check for a thread id..if thread id post reply...else new thread
if(isset($tid) && $tid)
//if(4>8)
   {
   echo '<h3>' . $words['post_a_reply'] . '</h3>';
   echo '<input name="tid" type="hidden" value="' . $tid .'"/>';
   }else{
   
   //new thread
   echo '<h3>' . $words['new_thread'] . '</h3>';
   
   echo '<p><em>' . $words['subject'] . '</em>:<input name="subject" type="text" size="60" maxlength="100" ' ;
                                                if(isset($subject)){ echo "value=\"$subject\" ";}
		                                        echo '/></p>';
   } //end of if $tid
   
echo '<p><em>' . $words['body'] . '</em>:<textarea name="body" rows="10" cols="60">';
                                     if(isset($body)){ echo $body; } 
									 echo '</textarea></p>';
									 
									 
echo'<input name="submit" type="submit" value="' . $words['submit'] . '"/> </form>';

}else{
echo '<p>Ypu must be logged in to post message.</p>';
}
?>