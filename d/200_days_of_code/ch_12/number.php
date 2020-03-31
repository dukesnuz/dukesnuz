#!/usr/bin/php
<?php //script 12.1 - number.php

$file ='states.txt';

echo "\nNumbering the file names '$file'...
	---------------------\n\n";
	
	//read the file
   $data = file($file);
   
   
   //print each line with its number
   $n = 1;
   foreach ($data as $line)
   	{
   		echo "$n $line";
		$n++;
   	}	
	
	echo "\n----------------------------------
		End of file '$file'.\n";
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
		?>
		
		
