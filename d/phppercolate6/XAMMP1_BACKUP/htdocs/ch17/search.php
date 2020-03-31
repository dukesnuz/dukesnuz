<?php #Script 17.8 - search.php
//This page dispalys and handles a search form.

include('includes/17_01_header.html');

//Show search form
echo '<form action="search.php" method="get" accept-charset="utf-8">
            <p>search:<input name="terms" type="text" size="30" maxlength="60" ';

			
			
     //below line in book I did not use because I did not want to have to add words into language table
     //<p><em>' . $words['search'] . '</em>:<input name="terms" type="text" size="30" maxlength="60" ';
     //I did not add search to words databse
	
	     
//check for existing 
if(isset($_GET['terms']))
   {
   echo 'value="' . htmlspecialchars($_GET['terms']) . '" ';
   }
   

 
//complete the form
echo '/><input name="submit" type="submit"
         value="' . $words['submit'] . '"   /></p></form>';
 
if(isset($_GET['terms']))
    {
	$terms= mysqli_real_escape_string($dbc,htmlentities(strip_tags($_GET['terms'] )) );
	
	    //run the query
	  
	   //$q= "SELECT * FROM posts WHERE message = 99";
	     $q ="SELECT * FROM posts WHERE MATCH(message) AGAINST('$terms')";
	  
	   $r = mysqli_query($dbc, $q);
	   if(mysqli_num_rows($r) >0)
	   {
	   echo '<h2>Search Results</h2>';
	  // echo 'create form here to display results';
	   //
	   //create table for results
		echo '<table width+"100%" border="0" cellspacing="2" cellpadding="2" align="center">
		     <tr>
			 	 <td align="left" width="85%"><em>Post:' . $words['body'] . '</em>:</td>
				 
			  </tr>';
			  //set initail background color
			  $bg = '#eeeeee';
			  //fetch and print each returned record
			  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			      {
				  //swap backbround color
				  $bg = ($bg=='#eeeeee' ? '#ffffff' :'#eeeeee');
				  echo '<tr bgcolor="'.$bg.' ">
				  	 
					 <td align="left">'.$row['message'] .'</td>
					 <td align="right">'.$row['posted_on'] .'</td>
					 </tr>';
					 
					 
					}
					echo '</table>';
					//
					//
	   }else{
	   echo '<p>No results found.</p>';
	   }
  }
echo'
   <br />
     <p>How This Search Box was created.</p>
   <ul>
	  <li>I changed the Mysql engine to MyISAM for the posts table.</li>
	  <li>I added FULLTEXT to message column</li>
	  <li>I added a basic FULLTEXT search similiar to the one on page 224.</li>
	  <li>As a page templete I used the search page provided in the book downloads.</li>
	  <li>I also used alternating color rows similair to Script 10.4 page 316.</li>
	  <li>I only have the search set up  to search the posts table-message column.</li>
	  <li>At this point I am not sure if I should add a link from the results to the origianl post.</li>
	  
	  <p>Certain Rules Apply to FULLTEXT searches page 224:</p>
	  
	  <ul>
	      <li>Strings are broken down into their individual keywords</li>
		  <li>Keywords less than four characters long are ignored</li>
		  <li>Very poplar words, called stopwords, are ignored</li>
		  <li>If more than 50% of the records match the keywords, no records are returned</li>
	  </ul>
		  
   </ul>';
    include('includes/17_02_footer.html');
  ?> 