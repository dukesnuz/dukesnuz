<?php
//save settings in cookies
if(isset($_REQUEST['save_settings']))
{
if($_REQUEST['save_settings'] == "yes")
	{
		setcookie('font_size',$_REQUEST['font_size'],time()+60);
		setcookie('font_type',$_REQUEST['font_type'], time()+60);
		setcookie('font_color',$_REQUEST['font_color'],time()+60);
	}
}else{
	die();
}	
$message = $_REQUEST['message'];
$font_size = $_REQUEST['font_size'];
$font_type = $_REQUEST['font_type'];
$font_color =$_REQUEST['font_color'];
$save_settings =$_REQUEST['save_settings'];


?>
<html>
	<head>
		<title>result input text select style</title>
	</head>
	<body>
		<?php
		echo "<p>Message: $message </p>";
		echo "<p>Font Size $font_size </p>";
		echo "<p>Font Type $font_type </p>";
		echo "<p>Font Color $font_color </p>";
		echo "<p>Save Settings $save_settings </p>";
		?>
<?php include('../../stats.html');?>		 
	</body>
</html>