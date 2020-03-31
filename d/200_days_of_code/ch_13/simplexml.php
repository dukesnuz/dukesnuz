<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>SimpleXML Parser</title>
		<link rel="stylesheet" href="../styles/my_styles.css">
	    <link rel="stylesheet" href="../styles/style.css">
	</head>
<body>
	<?php //script 13.9 - simplexml.php
	echo '<h2>Script 13.9 SimpleXML</h2>';
	//read the file
	$xml = simplexml_load_file('books3.xml');
	
	//create loop iterates through each book
	foreach($xml->book as $book)
		{
			echo "<div><h2>$book->title";
			if(isset($book->title['edition']))
			{
			echo " (Edition {$book->title['edition']})";
		}
		echo '</h2>';
		
		//print authors
		foreach ($book->author as $author)
			{
				echo "<span class=\"label\">Author</span>: $author<br>";
			}
			
	  //print the year
	  echo "<span class=\"label\">Published:</span>$book->year<br>";
	  if(isset($book->pages))
	  	{
	  		echo "<span class=\"label\">Pages:</span>$book->pages<br>";
	  	}
		
		//print each chapter
		if(isset($book->chapter))
		{
			echo 'Table of conents<ul>';
			foreach($book->chapter as $chapter)
				{
					echo '<li>';
					if(isset($chapter['number']))
						{
							echo "Chapter {$chapter['number']}";
						}
						echo $chapter;
						if(isset($chapter['pages']))
							{
								echo " ({$chapter['pages']} Pages)";
							}
					echo '</li>';
					
				}
	  echo '</ul>';
		}
		
		//handle books cover
		if(isset($book->cover))
			{
				$image = @getimagesize($book->cover['filename']);
				
				echo "<img src=\"{$book->cover['filename']}\" $image[3] border=\"0\" /><br>";
			}
			
	echo '</div>';
	} //END of foreach loop
	?>
</body>
</html>
