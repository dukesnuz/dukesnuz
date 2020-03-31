
<?php
include("../../includes/config.php");
//get id from index
$id=$_GET["id"];
//ask the database for the information from the links table
$sql = "SELECT * FROM people WHERE people_id=$id";
$result = mysql_query($sql);
$num = mysql_fetch_array($result);
?>

<h1>Edit Post</h1>
<form action="update.php" method="POST">
<input type="hidden" name="id" value="<?php echo $num['people_id']?>"><br>
First Name:&nbsp&nbsp<input type="text" name="fname" value="<?php echo $num['people_fname']?>"><br>
Last Name:&nbsp&nbsp<input type="text" name="lname"  value="<?php echo $num['people_lname']?>"><br>
Email:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="email" value="<?php echo $num['people_email']?>"><br> 
<input type="submit" name="submit" value="submit">
</form>


<?php include('../../stats.html');?>