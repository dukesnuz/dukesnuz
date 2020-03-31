<?php
   $beatle = $_GET['beatle'];
?>
<html>
	<head>
		<title>Hello <?php echo $beatle ?>!</title>
	</head>
	<body>
		<?php
		  echo "Hello $beatle!";
		  ?>
		 <p></p><a href="index.php">Back</a></p>
<?php include('../../stats.html');?>
	</body>
</html>

