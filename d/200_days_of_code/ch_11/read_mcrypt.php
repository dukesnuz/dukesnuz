<?php //script 11.4 read_mcrpt.php

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
	//check if session data exists
	if(isset($_SESSION['thing1'], $_SESSION['thing2']))
		{
			//create the key
			$key = md5('77 public drop-shadow Java');
			
			//open cypher
			$m = mcrypt_module_open('rijndael-256', '', 'cbc', '');
			//decode the IV
			$iv = base64_decode($_SESSION['thing2']);
			
			//initialize the decryption
			mcrypt_generic_init($m, $key, $iv);
			
			//decrypt the data
			$data = mdecrypt_generic($m, base64_decode($_SESSION['thing1']));
			
			//wrap up the MCrypt code
			mcrypt_generic_deinit($m);
			mcrypt_module_close($m);
			
			echo '<p>The session has been read. Its value is "' . trim($data).'".</p>';
		}else{ //no data
		echo '<p>There\'s nothing to see here.</p>';
		}
		
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
		?>
</body>
</html>
