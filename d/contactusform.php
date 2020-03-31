<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<?php 
//session_start();
//used for FM
//require_once('../include/dba.inc.php');
//require_once('include_2/mysqli_connect.php');
//require_once 'fmview.php';
//ini_set('display_errors','0');


//start check if user has account and is signed in to fill in boxes
/*
if(!isset($_SESSION['login']) || $_SESSION['login'] == '') 
{                                        
$listersemail="Enter your email";
$contactname="Enter your Name";
}else{
	/*
//used for FM
//$record=$LR->getRecordById('Profilephp', $_SESSION['login']);
//$listersemail=$record->getField('Listersemail');
//$contactname=$record->getField('Contactname');
//}
 */
?>

     
        
<html>
        
<head>
	<link rel="shortcut icon" type="image/x-icon" href="http://dukesnuz.com/d/images/favicon.ico">
    <link rel="stylesheet" href="styles/reset.css" type="text/css"  />
<!--	<link rel="stylesheet" href="styles/css3coffeebreak.css" type="text/css"  />-->
        
       <title>contact | Dukesnuz</title>
   <style>
   
   .message{
   	 padding:20%;
   	 color:red;
   	 text-align: center;
   	 
   }
   	h1 a, h1{
   	 font-size: 3em;
  
   	

   	}
   	
   	a{
   		text-decoration: none;
   	}
   	a:hover{
   		color:green;
   		font-size:2.5em;
   		font-weight:bold;
   	}

   	p{
   		font-size: 2.25em;
   		
   		background: rgba( 255,200,100, .4);
   		padding:5%;
   		border: 2px dashed blue;
   		margin-top: 20px;	
   	}
   </style>
</head>

<body>
	
<div class="message">
	<h1>OOpppss _! This page has been remodeled.</h1>
	<p><a href="../contact.php">Please use my new and improved contact form</a></p>
	
</div>
<!--
          <center> 
       <h1>Please use the form below to contact me.</h1>
       <h2>Please excuse the mess, this page is under construction.</h2>
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
                <th><h4></h4>Your Email</p></th>
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

-->

 <?php include('../stats.php');?>


</body>
</html>
