<!doctype html>
<html lang="en">
	<meta charset="utf-8">
	<title>XML Expat Parser</title>
	<link re="stylesheet" href="styles">
	<link rel="stylesheet" href="../styles/my_styles.css">
	<link rel="stylesheet" href="../styles/style.css">
</html>
<body>
	<?php //script 13.8 - expat.php
	echo '<h2>Script 13.8 Parsing XML w/Expat</h2>';
	//begin function for handling opening tags
	function handle_open_element($p, $element, $attributes)
	{
		//begin switch to handle diff elements
		switch ($element)
		{
			case 'BOOK':
				echo '<div';
				break;
				
				//add case for cp elements
			case 'CHAPTER':
				echo "<p>Chapter {$attributes ['NUMBER']}:";
				break;
				
				//add case fpr cover elements
			case 'COVER':
				$image = @getimagesize($attributes['FILENAME']);
				echo "<img src=\"{$attributes['FILENAME']}\" $image[3] border=\"0\"><br>";
				break;
				
				//complete switch
			case 'TITLE':
				echo '<h2>';
				break;
			case 'YEAR':
			case 'AUTHOR':
			case 'PAGES':
				echo '<span class="label">' . $element . '</span>: ';
				break;
		}//END of switch
	}//END of handle_open_element() function
	
	
	//function for handling elements
	function handle_close_element($p, $element)
		{
			switch ($element)
				{
				case 'BOOK':
					echo '</div>';
					break;
				case 'CHAPTER':
					echo '</p>';
					break;
				case 'TITLE':
					echo '</h2>';
					break;
					
		//complete the function
				case 'YEAR':
				case 'AUTHOR':
				case 'PAGES':
					echo '<br>';
					break;
				}//END switch
		}//END of handle_close_element() function
		
		function handle_character_data($p, $cdata)
		{
			echo $cdata;
		}
		
		//create neew parser and identify the functions to use
		$p = xml_parser_create();
		xml_set_element_handler($p, 'handle_open_element', 'handle_close_element');
		
		xml_set_character_data_handler($p, 'handle_character_data');
		
		//read and parse the XML file
		$file = 'books4.xml';
		$fp = @fopen($file, 'r') or 
		die("<p>Could not open a file called '$file'.</p></body></html>");
		
		while ($data = fread($fp, 4096))
			{
				xml_parse($p, $data, feof($fp));
			}
			
			//free up parser 
			xml_parser_free($p);
			?>
			
</body>