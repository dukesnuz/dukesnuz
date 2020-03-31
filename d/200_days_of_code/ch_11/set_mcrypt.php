<?php //script 11.3 - set_mcrypt.php
session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>A More Secure Session</title>
	</head>
<body>
	<?php
	//define key and data
	$key = md5('77 public drop-shadow Java');
	// $key = md5('77 public drop-shadow Java');
	 
	$data = 'rosebud';
	//$data = 'rosebud';
	//open the cypher
	$m = mcrypt_module_open('rijndel-256', '','cdc', '');
	$m = mcrypt_module_open('rijndael-256', '', 'cbc', '');
	 
	//create the IV
	$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($m), MCRYPT_DEV_RANDOM);
	//$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($m), MCRYPT_DEV_RANDOM);
	 
	//initialize the encryption
	mcrypt_generic_init($m,$key,$iv);
	//mcrypt_generic_init($m, $key, $iv);
	
	//encrpt the data
	$data = mcrypt_generic($m, $data);
	//$data = mcrypt_generic($m, $data);
	 
	//perform neccessary cleanup
	mcrypt_generic_deinit($m);
	mcrypt_module_close($m);
	
	//store data in the session
	$_SESSION['thing1'] = base64_encode($data);
	$_SESSION['thing2'] = base64_encode($iv);
	  echo '<p>The data has been stored. Its value is '.base64_encode($data).'.</p>';
	 
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
	?>
</body>
</html>
