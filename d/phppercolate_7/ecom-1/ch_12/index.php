<?php
//require('includes/config.inc.php');
require('../includes_2/config.inc.php');
 //test to see when user admin logged in

       $_SESSION['user_id'] =85;
       $_SESSION['user_admin'] = true;
	 //for demo purposes only
	   $_SESSION['user_not_expired'] = true;
 //end test see if user  admin logged in
 
 //set user id for showing most recent viewed 
 $uid= 85;
//$uid = $_session['user_id'];
require(MYSQL);

//added in chp 4
//if post use login 
if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		include('includes/login.inc.php');
	}
	
	
include('includes/header.html');
?>

<h3>Chapter 12</h3>
<p><a href="##">Thank you page</a></p>
<p><a href="cancel.php">Cancel page</a></p>
<p><a href="##">Renew page Displays in 2nd part of this chapter.</a></p>
<h3>Welcome</h3>
<p class="lead">Welcome to knowledge is Power, a site dedicated to keeping you up-to-date
	on Web security and programing information you need to know.</p>


<h2>Exercies for chapter 12</h2>
<?php 
// most popular pages
 
    $q="SELECT DISTINCT(pa.id) AS page_id, pa.title AS page_title
 		FROM pages AS pa 
 		JOIN history AS h WHERE pa.id=h.item_id AND h.type='page'  AND h.user_id=$uid
 		UNION
 		SELECT DISTINCT(pdfs.id) AS pdf_id, pdfs.title AS pdf_title
 		FROM pdfs 
 		JOIN history AS h WHERE pdfs.id=h.item_id AND h.type='pdf'  AND h.user_id=$uid";
 		
         $r = mysqli_query($dbc,$q);
		 echo '<p>History of pages viewed</p>';
		// echo $_SESSION['user_id'];
		 while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
		 	{
		 	echo '<ul>';
		 	echo '<li>'.	$row['page_title'] . '</li>';
			echo '</ul>';
		 	}
 
 $q =" SELECT count(history.id) AS num, pages.id, pages.title FROM pages,history
		WHERE pages.id=history.item_id AND history.type='page'
		GROUP BY (history.item_id) ORDER BY num DESC LIMIT 10";

          $r = mysqli_query($dbc,$q);
		 echo '<p>Most Popular Pages</p>';
		 while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
		 	{
		 	echo '<ul>';
		 	echo '<li>'.	$row['title'] . '</li>';
			echo '</ul>';
		 	}

     echo "<p><img src='images/heart_32.png' width='32' height='32'><a href='page.php?id=1''>Add To Favorites Go ahead-try it out</a>";
     // echo '<h3 id="favorite_h3"><img src="images/heart_32.png" width="32" height="32"><span class="label label-info">Add To Favorites !</span> <a id="remove_favorite_link" href="page.php?id=1"><img src="images/close_32.png"  width="32" height="32"></a></h3>';
	 
     echo "<p><a href='page.php?id=1'>Notes</a></p>";
	 
	 
	 echo '<p>Using Prepared Statements. Completed the 3 exampls.P393-396Not displayable</p>';
	 
	 echo "<p><a href='forgot_password.php'>Forgot Password</a></p>";
	 
	 echo "<p><a href='page.php?id=1'>Making Recomendations</a>";
	 
	 echo "<p><a href='category.php?id=1'>Content in Multiple Categories</a>";
	 echo "<p><a href='add_page.php'>Add Multiple Categories</a>";
	 
	  echo "<p><a href='add_page.php'>Allowing for Content Drafts</a>";
	 
	 
include('includes/footer.html');