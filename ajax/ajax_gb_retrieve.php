<?php
//echo 1;
require('../includes/config.inc.php');

	require (MYSQL);
	

 

$q= "SELECT message, first_name FROM contact WHERE type= 'guest_book' order by date_created DESC ";

$r = mysqli_query($dbc , $q);

if(mysqli_num_rows($r) >0)
	{
		
		
				$display_string ="<table id='gb_retrieve'>";
				$display_string .="<tr>";
				$display_string .="<th>Comment</th>";
				$display_string .="<th>Commentator</th>";
				$display_string .="</tr>";
					
		while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
				
				
				$display_string .="<tr>";
				$display_string .="<td style='width:50%'>$row[message]</td>";
				$display_string .="<td style='width:10%'>$row[first_name]</td";
				$display_string .="</tr>";
				
			//	$display_string .="<tr>";
				
				//$display_string .="</tr>";
			
			}
			
			echo $display_string;
	}
  
 

