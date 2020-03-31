<?php
// page.php
require('../includes_2/config.inc.php');

//connect to database
require(MYSQL);

if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range =>1)))')))
	{
		$page_id = $_GET['id'];
	
	 //grab page info
	$q = "SELECT title, description, content
	      FROM pages
	      WHERE id = '$page_id' ";
		  $r = mysqli_query($dbc, $q);
		  //////////////////////////////////////////////////////////
		  //chp 12 page 384
//user logged in record pages viewed
		 	 if(isset($_SESSION['user_id']))
				  {
					$uid = $_SESSION['user_id'];
					//echo $_SESSION['user_id'];
					//echo 00;
					$q = "INSERT INTO history (user_id, type, item_id)
			                            VALUES($uid, 'page', $page_id) ";
					$h = mysqli_query($dbc, $q);
                }
/////////////////////////////////////////////////////////////
		  //if no rows return an error
		  if(mysqli_num_rows($r) !==1)
		  {
		  	$page_title = 'OOPPS Error!';
			include('includes/header.html');
	        echo '<div class="alert alert-danger">This page has been accessed in error.</div>';
	        include('includes/footer.html');	
	        exit(); 	
		  }
	
	//grab page info
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
	$page_title = $row['title'];
	include('includes/header.html');
	echo '<h1>' . htmlspecialchars($page_title) . '</h1>';
	
	//display content if user has an account
	if(isset($_SESSION['user_not_expired']))
	//if(4>2)
	{
        
		$user_id = $_SESSION['user_id'];
		// Bonus material! Referenced in Chapter 12.
		// Create add to favorites and remove from favorites links:
		// See if this is favorite:

		 $q ='SELECT user_id FROM favorite_pages WHERE user_id ='. $user_id .' AND page_id ='.  $page_id;
		 
		 $r = mysqli_query($dbc, $q);
		 
		if(mysqli_num_rows($r)  === 1)
			{
			
		    echo '<h3 id="favorite_h3"><img src="images/heart_32.png" width="32" height="32"><span class="label label-info">This is a favorite!</span> <a id="remove_favorite_link" href="remove_from_favorites.php?id='.    $page_id.'"><img src="images/close_32.png"  width="32" height="32"></a></h3>';

			}else{
			
		   echo '<h3 id="favorites_h3"><span class="label label-info">Make this a favorite!</span> <a id="add_favorite_link" href="add_to_favorites.php?id=' . $page_id . ' "><img src="images/heart_32.png" width="32" height="32"></a></h3>';
			}

		// Show the page content:
		 	
		echo "<div>{$row['content']}</div>";
			
			
		//chp 12 notes page 389
		//check for form submission
		//echo 'notes';
		if($_SERVER['REQUEST_METHOD'] ==='POST')
			{
				//echo 11;
				if(isset($_POST['notes']) && !empty($_POST['notes']))
				{
					//echo 22;
					 $notes = $_POST['notes'];
					//  if(isset($_SESSION['user_not_expired']))
					  		//{
					  			//echo "<div>{$row['content']}";
								//new code here
								//store notes in database
								//echo 'user'.$user_id;
								//echo 'page'.$page_id;
								  $q = "REPLACE INTO notes(user_id, page_id, note)
									VALUES($user_id,$page_id,'". escape_data($notes, $dbc) . "')";
									$r = mysqli_query($dbc, $q);
									if(mysqli_affected_rows($dbc) > 0)
										{
											echo '<div class="alert alert-success">Your notes have been saved.</div';
										}//END if(mysqli_affected_rows
										
					  		 }//END if issett($_SESSION
					  } //END if(isset($_POST['notes']))
					  //grab user current notes
					  if(!isset($notes))
					 // echo 33;
					 // if(4>2)
					  	{
					  		//echo 44;
					  		$q = "SELECT note FROM notes 
					  			WHERE user_id = $user_id AND page_id = $page_id";
								$r = mysqli_query($dbc, $q);
									if(mysqli_num_rows($r) ===1)
										{
											//echo 66;
											list($notes) = mysqli_fetch_array($r, MYSQLI_NUM);
										      
										}// END if(mysqli_num_rows)
										
							}
					//  	}//END if(!issett($notes)
					   
					  	//begin form and a textarea
					  	echo '<form action="page.php?id='.$page_id.'" method="POST" accept-charset="utf-8">
					  			<fieldset><legend>Your Notes. Go ahead-Try it out.</legend>
					  				<textarea name="notes" class="form-control">';
					  				
					  				//display current notes
					  				if(isset($notes) && !empty($notes)) 
										{
											echo htmlspecialchars($notes);
										}
						//complete form
						echo '</textarea><br>
							<input type="submit" name="submit-button" value="Save" id="submit_button" class="btn btn-default" />
						    <fieldset>
						    </form>';

						    
						    //chapter 12 page 405 making recomendations
						 
				 	    
		$q = "SELECT p.id, p.title FROM pages AS p, recommendations AS r 
				WHERE (r.page_a = $page_id AND r.page_b = p.id)
						OR
					  (r.page_b = $page_id AND r.page_a = p.id)";
		   $r = mysqli_query($dbc, $q);
		   if(mysqli_num_rows($r) > 0)
		   		{
		   			echo '<br />';
		   			echo '<p>Some Recomendations</p>';
					  while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
					  			{
					  				echo '<ul>';
					  				echo '<li>'.$row['title'].'</li>';
									echo '</ul>';
					  			}
		   		}else{
		   			echo '<p>There are no recomendations for this page.</p>';
		   		}
		 ///end chp 12
	}elseif(isset($_SESSION['user_id']))
	//}elseif(4>6)
	{
		echo '<div class="alert"><h4>Expired Account</h4>Thank you for your interest in this content,
		but your account is no longer current.  Please <a href="##">renew your account</a> in order
		to view this page in its entirety.</div>';
		echo '<div>' . htmlspecialchars($row['description']). '</div>';
	}else{
		echo '<div class="alert">Thank you for your interest in this content.  You must be logged in as
		a registered user to view this page in its entirety.</div>';
		echo '<div' .htmlspecialchars($row['description']).'</div>';
	}

//complete id conditional
}else{
	$page_title = 'OOPSS! Error';
	include('includes/header.html');
	echo '<div class="alert alert-danger">This page has been accessed in error.</div>';
}//end primary IF
	
include('includes/footer.html');	
?>