<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php 
//session_start();
//used for FM
//require_once('../include/dba.inc.php');
require_once('../include_2/mysqli_connect.php');
//require_once 'fmview.php';
ini_set('display_errors','0');


//start check if user has account and is signed in to fill in boxes
if(!isset($_SESSION['login']) || $_SESSION['login'] == '') 
{                                        
$listersemail="Enter your email";
$contactname="Enter your Name";
}else{
//used for FM
//$record=$LR->getRecordById('Profilephp', $_SESSION['login']);
//$listersemail=$record->getField('Listersemail');
//$contactname=$record->getField('Contactname');
}
?>

     
        
       <html>
        
<head>
         <link href="../stylesheet.css" rel="stylesheet" type="text/css">
        <link rel="../stylesheet" type="text/css" media="screen" href="plain_white.css">
        
       <title>contact form</title>

</head>

<body>

          <center> 
       <h55>Please use the form below to contact me.</h55>
          </center>

		  <form method="post" action="contactus.php">
		  	<input type="hidden" name="action" value="newEntry">
		    <table width="300">
            
            <tr>
           <td><input type="hidden" name="to" value="contactus@dukesnuz.com" ></td>
         </tr>
             
               <tr>
                <th><h4>Your Name<h4></th>
 <td><input name="Personsname" type="text" id="Personsname" value="<?php echo $contactname;?>"></td>
              </tr>
               <tr>
                <th><h4>Your Email</h4></th>
                <td><input name="ListersEmail" type="text" id="ListersEmail"
				value="<?php echo $listersemail;?>"></td>
              </tr>
              <tr>
                <th><h4>Message</h4></th>
                <td><textarea name="Message" cols="40" rows="8"></textarea></td>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td><input type="submit" name="Submit" value="Contact"></td>
              </tr>
            </table>
			</form>
        </td>
        <br> 
        <center>
      	<a href="mailto:contactus@dukesnuz.com"><navigation>Email Me</navigation></a>
   </center>



 <?php include('../stats.php');?>


</body>
</html>
