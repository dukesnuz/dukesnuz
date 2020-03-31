<!DOCTYPE html>

<html lang="en">
	<head>  
		<meta charset="utf-8">
		<title>Validate URLs</title>
		<link rel="stylesheet" href="styles.css">
		<link rel="stylesheet" href="../styles/my_styles.css">
    </head>
</html>
<body>
<?php ///script 10.2 - check_urls.php
   echo '<h2>script 10.2 - Working w/Sockets</h2>';
   
//define scheck url function
function check_url($url)
	{
		//parse the url
		$url_pieces = parse_url($url);
		//set path and port
		$path = (isset($url_pieces['path'])) ? $url_pieces['path'] : '/';
		$port = (isset($url_pieces['port'])) ? $url_pieces['port'] : 80;
		
		//try to connect
		if($fp = fsockopen($url_pieces['host'], $port, $errno, $errstr, 30))
			{
				$send = "HEAD $path HTTP/1.1\r\n";
				$send.= "HOST:{$url_pieces['host']}\r\n";
				$send.= "CONNECTION: Close\r\n\r\n";
				
				fwrite($fp, $send);
				
				//retrieve response code
				$data = fgets($fp, 128);
				fclose($fp);
				
				list($response, $code) = explode(' ', $data);
				
				//return code
				if($code == 200)
					{
						return array($code, 'good');
					}else{
						return array($code, 'bad');
					}
			}else{
				return array($errstr, 'bad');
			}
	}//END of check_url() function.

	//create a list of urls
	$urls = array('http://www.larryullman.com/',
'http://www.larryullman.com/wp-admin/',
'http://www.yiiframework.com/tutorials/',
'http://video.google.com/videoplay?docid=-5137581991288263801&q=loose+change'
);

//print
	echo '<h1>Validating URLs</h1>';
	set_time_limit(0);
	
	//validate each url
	foreach ($urls as $url)
		{
			list($code, $class) = check_url($url);
			
			echo "<h2><a href=\"$url\"target\"new\">$url</a> (<span class=\"$class\">$code</span>)</h2>\n";
		}
	

/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
?>
</body>
</html>