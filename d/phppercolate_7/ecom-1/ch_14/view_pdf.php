<?php
// view_pdf.php


require('../includes_2/config.inc.php');

require(MYSQL);

//create a flag variable
$valid = false;
//validate pdf id
if(isset($_GET['id']) && (strlen($_GET['id']) ===63) && (substr($_GET['id'], 0,1) !=='.'))
	{
		$file = PDFS_DIR . $_GET['id'];	
		if(file_exists($file) && (is_file($file)) )
			{
				//grab pdf info from database
				$q = 'SELECT id, title, description, file_name 
				      FROM pdfs
				      WHERE tmp_name="'.escape_data($_GET['id'], $dbc) .'"';
					  $r = mysqli_query($dbc, $q);
					  if(mysqli_num_rows($r) ===1)
					  $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
					  $valid = true;
					  
					    //////////////////////////////////////////////////////////
		  //chp 12 page 384
//user logged in record pages viewed
		 	 if(isset($_SESSION['user_id']))
				  {
					$uid = $_SESSION['user_id'];
					$id = $row['id'];
					//echo $_SESSION['user_id'];
					//echo 00;
					$q = "INSERT INTO history (user_id, type, item_id)
			                            VALUES($uid, 'pdf', $id) ";
					$h = mysqli_query($dbc, $q);
                }
/////////////////////////////////////////////////////////////


					  //only display pdf to user whose account is active
					   if(isset($_SESSION['user_not_expired']))
					  //if(4>2)
					  	{
					  		header('Content-type:application/pdf');
							header('Content-Disposition:inline;filename="'.$row['file_name'].'"');
							$fs = filesize($file);
							header("Content-Length:$fs\n");
							readfile($file);
							exit();
						}else{
							//for inactive users show content's description
						$page_title = $row['title'];
						include('includes/header.html');
						echo "<h1>$page_title</h1>";
						if(isset($_SESSSION['user_id']))
							{
								echo '<div class="alert"><h4>Expired Account</h4>
								Thank you for your interest in this content, but your
								account is no longer current. Please <a href="##">renew your account</a>
								in order ro access this file.</div>';
							}else{
							//not logged in
							echo '<div class="alert">Thank you for your interest in this content.
							You must be logged in as a registered user to access this file.</div>';
							}							
							echo '<div>' . htmlspecialchars($row['description']). '</div>';
							include('includes/footer.html');
					  	}//end of user IF_ELSE
					}//end of mysqli_num_rows() IF
			}//end of $_GET['id'] IF
			
			//indicate a problem and complete the page
			if(!$valid)
			//if(4>2)
			{
				$page_title = 'OO0PPS! Error!';
				include('includes/header.html');
				echo '<div class="alert alert-danger">This page has been accessed in error.</div';
				include('includes/footer.html');
			}
?>