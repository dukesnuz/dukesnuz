<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php 
//used for FM
//require_once('../include/dba.inc.php');
require_once('../include_2/mysqli_connect.php');
ini_set('display_errors','0');

		$ip=$_SERVER['REMOTE_ADDR'];
        //Get Previous page came from
		//$ref= "";
	    //$ref=$_SERVER['HTTP_REFERER'];

 /*used for FM
$newPostCmd = $LR->newAddCommand('Feedbackform');
$newPostCmd->setField('Ip',"$Ip");
$newPostCmd->setField('Personsname',POST('Personsname'));
//
	if(filter_var($_POST['ListersEmail'],FILTER_VALIDATE_EMAIL))
			{
		
	$newPostCmd->setField('ListersEmail',POST('ListersEmail'));
			}
		else
			{

?>

<a href='<?php echo $ref;?>'><navigation>Previous Page</navigation></a>;
<?php
die("<logout><blink>Your email address is not valid. ....<a href=contactusform.php>Try again</blink></logout></a>...You can click the back button on your browser to keep info already entered.");
			}
//
$newPostCmd->setField('Message',POST('Message'));
$newPostCmd->setField('Website',"dukesnuz");
$newPost = $newPostCmd->execute();

if(FileMaker::isError($newPost)) {
	die('Database Error: '.$newPost->getMessage());
}
*/

//below adds to mysql
//if(isset($_POST['Personsname']))
    //{
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['Personsname']));
	$email = mysqli_real_escape_string($dbc, trim($_POST['ListersEmail']));
	$message = mysqli_real_escape_string($dbc, trim($_POST['Message']));
	//echo 'ok';
   // }else{
    //	echo' Please enter yor first name';
   // }
$q= "INSERT INTO contact(first_name,email,message,page_name, ip)
      VALUES('$first_name', '$email','$message','contact/dukesnuz','$ip')";

$r = mysqli_query($dbc, $q);
        if(mysqli_affected_rows($dbc) ==1)
        {
       echo '<p>Your nessage has been recieved</p>';
		}else{
			echo 'OOPPSS ! System Error';
		}
 
//send email to me
	$body ="A Message has been posted on dukesnuz contact me page. Check mysql database.\r\n";
	$body.= "From $email\r\n";
	$body.= "First name: $first_name\r\n";
	$body.= "Message is: $message\r\n";
	$body.= "Ip: $ip";
	
	         mail('contactus@dukesnuz.com','Contact me message @dukesnuz',$body, 'From:Dukesnuz');
 
//start send mail
/*   start old email
$message = "";
if(POST('to') != '') {
	
	$body =POST("Personsname")."  
	has sent the following message:   
	".POST("Message")." ;  
	There email is:   ".POST("ListersEmail");
	
	include('sendmail.php');
	ini_set("sendmail_from","WebSite");

	  //$headers = 'From:".POST("ListersEmail")";
	  $headers ='From:'. $_POST['ListersEmail'];
	   //$headers = 'From: contactus@dukesnuz.com' . "\r\n" .
    'Reply-To: contactus@dukesnuz.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	
	$subject ="DukesNuz Website Message Received";
	$result = mail(POST('to'), $subject, $body, $headers);      
//start send mail to the contact
//$message = "";
//if(POST('to') != '') {

    $body =POST("Personsname")."
	Thank you for your message;
    Your email is:   
	".POST("ListersEmail")."
	Your message is: 
	".POST("Message")."
		___________________________________________
	Have a great day!
	Thank you,
	The Duke
	http://www.dukesnuz.com
	To contact us, click the link below
	http://dukesnuz.com/d/contactusform.php";
	
	
    include('sendmail.php');
	ini_set("sendmail_from","Dukesnuz");

	//$headers = 'From: "Dukes Web App"';
	 $headers = 'From: contactus@dukesnuz.com' . "\r\n" .
    'Reply-To: contactus@dukesnuz.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	$subject ="The Duke has recieved your message.";
	$result = mail(POST('ListersEmail'), $subject, $body, $headers);  
//end send mail to the submitter
}
end old email
*/
//end send mail
?>



<html>
        
<head>
         <link href="../stylesheet.css" rel="stylesheet" type="text/css">
        <link rel="../stylesheet" type="text/css" media="screen" href="plain_white.css">
        
       	<title>contactus</title>
        </head>

<body>


             <center>
               <h33></h33>
               &nbsp;
               &nbsp;
            
        <td valign="top">
          <h11>Success</h11>
          <p>I will answer your message within 24 hours.</p>
          <p>Thank you</p>
		 
        </td>
    
      
          <center>

 <?php include('../stats.php');?>

</body>
</html>
