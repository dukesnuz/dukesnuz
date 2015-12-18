<?php
/***********************Using book PHP Advanced and Object Orietned Programming page 82***********************************/
require('db_sessions.inc.php');



$title = "Storing Session Data";

include('../views/header.inc.html');

mail(CONTACT_EMAIL,'Session page accssed',SITE_NAME.'Line10',CONTACT_EMAIL);

?>
<section>
	 <div class="content">
<header style="background-color: #ffffff;text-align: center">
<h1>Storing Session Data in Mysql</h1>
    <p>This script will store session data in a mysql database. Type values into one or both input fields. Click submit.
	Session data will be created and stored in the database.  By clicking Destroy Session, the session data is deleted from
	the database and current session is destroyed.  Click Refresh page to display this result.
	</p>
</header>

	
<?php


$ip = $_SERVER['REMOTE_ADDR'];
$ip = 99;

if(isset($_POST['session_1'])  )
		{
		           if(!empty($_POST['session_1']) || !empty($_POST['session_2']))
				{
						  $_SESSION['form_value_1'] = $_POST['session_1'];
						  $_SESSION['form_value_2'] = $_POST['session_2'];
						  $_SESSION['ip'] = $_POST['ip'];
		         	}else{
					echo 'Please enter a value in at least one field.';	
	        	}		
		}
			
?>
		<p>Set session data in one or two fields.</p>
		//for testing use http://localhost/dukesnuz/coding-playground/sessions.php
		//for live use /coding/playground/storing/sessions/in/a/database/php/mysqli<?php echo MODWRITE;?>
		<form action= "http://localhost/dukesnuz/coding-playground/sessions.php" method ="post">
			<fieldset>
				<legend>Create Session Data</legend>
				<p><label class="question">Session 1</label>
				<input type="text" name="session_1" size = "50" placeholder="Enter Data 1" required/></p>
			
				<p><label class="question">Session 2</label>
				<input type="text" name="session_2" size= "50" placeholder="Enter Data 2" /></p>
				
				<p><label class="question">Your IP Address</label>
				<input type="text" name="ip" size= "50" value="<?php echo $ip;?>"/></p>
				
				
			</fieldset>
			<div id="button">
				<input type="submit" value="Submit" /> or
				<input type="reset" value="Erase and start over" />
			</div>
			 
		</form>


<?php
			
		

		/////////////
			if(isset($_GET['logout']))
		{
			
			   session_destroy();
			   echo '<p style="color:green">Session Destroyed. Session no longer stored in database.</p>';    
		
		}else{
			if(empty($_SESSION))
				{
				   // echo '<p>There is no active session.</p>';
			
			    }else{
			    	echo '<p><a href="/coding/playground/storing/sessions/in/a/database/php/mysqli'.MODWRITE.'?logout=true"><span style="color:red">Click here to destroy current session</span></a></p>';
			    }
			    
		}
		/////////////////////
		

//store dummy sessions

if(empty($_SESSION))
	{
		//$_SESSION['blah'] = 'David';
		//$_SESSION['this'] = 'Boston';
		//$_SESSION['that'] = 'Memphis';
		//$_SESSION['user'] = 3615684.45;
		
		//echo '<p>Session:<pre>' .print_r($_SESSION,1).'</pre></p>';
		echo '<p>Session data does not exist. Please enter a value to be set in the current session.</p>';
		
		
	

	}else{
		echo '<p>Current session Data and Data stored in database.</p><pre style="background-color:#8B8080;width:500px;overflow:scroll">' .print_r($_SESSION,1).'</pre>';
	}


		session_write_close();
?>

<!--
<p><a href="/coding/playground/storing/sessions/in/a/database/php/mysqli<?php echo MODWRITE;?>">Refresh Page</a></p>
-->

<aside>
	<h4>Credit for the creation of this page.</h4>
	<p>I used the following as a referenece for this script. <a href="http://amzn.to/1OkxQ8M" target="blank">PHP Advanced and Object-Oriented Programing</a>
		by: <a href="http://www.larryullman.com/" target="blank">Larry Ullman</a> Page: 82 Storing Sessions in a Database.
	</p>
	
<div style="text-align: center">	
<iframe style="width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ss&ref=ss_til&ad_type=product_link&tracking_id=dukesnuz-20&marketplace=amazon&region=US&placement=0321832183&asins=0321832183&linkId=K67TSPV7BJ46XIXB&show_border=true&link_opens_in_new_window=true">
</iframe>
</div>

</aside>
</div>
</section>





<?php include('../views/footer.inc.html');?>
		