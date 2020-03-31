<html>
	<head>
		<title>Contacts</title>
	</head>
<body>
	<h1>My Guestbook</h1>

		<form name="People" action="contact.php" method="post">

   <table border="1" width="400">
	
    <tr>
    	<td>First Name</td>
    	<td><input type="text" name="fname" size=43</td>
    </tr>

    <tr>
		<td>Last Name</td>
		<td><input type="text" name="lname" size=43</td>
    </tr>
    
    <tr>
    	<td>Email</td>
    	<td><input type="text" name="email" size=43</td>
    </tr>
 </table>
 <p><input type="submit" value="add Contact"></p>
 </form>
</body>
</html>

<?php

	include("../../includes/config.php");
	//see if people table exists, if not create
	$check = mysql_query ("SELECT * FROM `people` LIMIT 0,1"); 
	if($check){
		//query was legal and table exist
	}else{
//something wrong , so create the table
$peoples = "CREATE TABLE people(
	people_id int(11) NOT NULL auto_increment,
	people_fname varchar(32) NOT NULL,
	people_lname varchar(32) NOT NULL,
	people_email varchar(32) NOT NULL,
	PRIMARY KEY (people_id))";
	$results = mysql_query($peoples)
    or die (mysql_error());
}
	
//first row
//query all of people table
//query all of people table
$query="SELECT * FROM people";
$result=mysql_query($query);

mysql_close();


//first row
echo "<table border='1' cellpadding=5 width='400' style='font-size:13px'>";
echo "<tr><td><h3>First Name</h3></td>";
echo "<td><h3>Last Name</h3></td>";
echo "<td><h3>Email</h3></td>";
echo "<td><h3>Edit</h3></td></tr>";



//second roww
//keeps getting next row until no more to get
while ($row = mysql_fetch_array($result)){
	//print out the content of each row  into a table
	echo "<tr><td>";
	echo $row['people_fname'];
	echo "</td><td>";
	echo $row['people_lname'];
	echo "</td><td>";
	echo $row['people_email'];
	echo "</td><td>";
	echo '<a href="edit.php?id='.$row['people_id'].'">Edit</a>';
	echo "</td></tr>";
	}
 echo "</table>";
 include('../../stats.html')
?>