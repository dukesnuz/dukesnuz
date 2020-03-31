<?php #Script 17.4 - forum.php
include('includes/17_01_header.html');
// I added //
$display = 2;
//check if # of pages already set
if(isset($_GET['p']) && is_numeric($_GET['p'] ))
   {
   $pages = $_GET['p'];
   }else{
   //count #of records in databse
   $q = "SELECT COUNT(user_id) FROM threads";
   $r= @mysqli_query($dbc, $q);
   $row = @mysqli_fetch_array($r, MYSQLI_NUM);
   $records = $row[0];
   //mathematicaly calculate number pages needed
   if($records > $display)
      {
	  $pages = ceil($records/$display);
	  }else{
	  $pages =1;
	  }
}//end if isset
//determine starting point in databse
if(isset($_GET['s']) && is_numeric($_GET['s']))
      {
	  $start = $_GET['s'];
	  }else{
	  $start = 0;
	  }	  

//determine what dates and times to use
if(isset($_SESSION['user_tz']))
   {
   $first = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
   $last = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
   }else{
   $first = 'p.posted_on';
   $last ='p.posted_on';
   }
 ////
   //define and execute the query
   //below used wothout pagenation
   /*
   $q = "SELECT t.thread_id, t.subject, username, COUNT(post_id) - 1 AS responses,
   	  	MAX(DATE_FORMAT($last, '%e-%b-%y %1:%i %p')) AS last,
		MIN(DATE_FORMAT($first, '%e-%b-%y %1:%i %p'))AS first
		FROM threads AS t INNER JOIN posts AS p USING (thread_id) INNER JOIN
		users AS u ON t.user_id = u.user_id WHERE t.lang_id = {$_SESSION['lid']}
		GROUP BY (p.thread_id) ORDER BY last DESC";
	*/
	//below used WITH pagenation
	 $q = "SELECT t.thread_id, t.subject, username, COUNT(post_id) - 1 AS responses,
   	  	MAX(DATE_FORMAT($last, '%e-%b-%y %1:%i %p')) AS last,
		MIN(DATE_FORMAT($first, '%e-%b-%y %1:%i %p'))AS first
		FROM threads AS t INNER JOIN posts AS p USING (thread_id) INNER JOIN
		users AS u ON t.user_id = u.user_id WHERE t.lang_id = {$_SESSION['lid']}
		GROUP BY (p.thread_id) ORDER BY last DESC LIMIT $start, $display";
		
//
		$r = mysqli_query($dbc, $q);
		if(mysqli_num_rows($r) > 0)
		//if(4>1)
		{
		
		//create table for results
		echo '<table width+"100%" border="0" cellspacing="2" cellpadding="2" align="center">
		     <tr>
			     <td align="left" width="20%"><em>' . $words['subject'] . '</em>:</td>
			 
			 
			 	 <td align="left" width="20%"><em>' . $words['posted_by'] . '</em>:</td>
				 <td align="center" width="10%"><em>' . $words['posted_on'] .'</em>:</td>
				 <td align="center" width="10%"><em>' .$words['replies'] . '</em>:</td>
				 <td align="center" width="10%"><em>' .$words['latest_reply'] .'</em>:</td>
			  </tr>';
			  //set initail background color
			  $bg = '#eeeeee';
			  //fetch and print each returned record
			  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			      {
				  //swap backbround color
				  $bg = ($bg=='#eeeeee' ? '#ffffff' :'#eeeeee');
				  echo '<tr bgcolor="'.$bg.'">
				  	 <td align="left"><a href="read.php?tid=' .$row['thread_id'] . '">' . $row['subject'].'</a></td>
					 <td align="left">'.$row['username'] .'</td>
					 <td align="left">'.$row['first'] .'</td>
					 <td align="left">'.$row['responses'].'</td>
					 <td align="left">'.$row['last'].'</td>
					 </tr>';
					}
					echo '</table>';
					
					//Determine what page the script is
					$current_page=($start/$display) +1;
					//if not first page make link
					echo '<p>Pursuit = Pagination and alt row colors added</p>';
					if($current_page !=1)
					{
					echo '<a href="forum.php?s='.($start-$display). '&p='.$pages.' " class="navlink">Previous<a>';
					}
			//make numbered pages
			for($i = 1; $i <= $pages;  $i++)
					 {
					   if($i != $current_page)
					     {
						 echo '<a href="forum.php?s='.(($display*($i - 1))) . '&p='.$pages.'" class="navlink">'.$i.'</a>';
						 }else{
						 echo $i . ' ';
						 }
			  }//end for loop
					
					//if not last page make next button
					 if($current_page !=$pages)
					
					   {
					   echo '<a href="forum.php?s='.($start + $display) . '&p='.$pages.'" class="navlink">Next</a>';
					   //}
					}//end links
					   //end pagenation
					   
					   echo '<br />The current page ='. $current_page ;
					   
            		}else{
		echo '<p>There are currently no messages in this forum.</p>';
		//echo 'session=' .$_SESSION['user_id'];
		//echo 'user time zone'.$_SESSION['user_tz'];
		}
					 include('includes/17_02_footer.html');	