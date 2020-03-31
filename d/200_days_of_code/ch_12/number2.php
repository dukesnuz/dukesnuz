#!/usr/bin/php
<?php //script 12.2 - number2.php


//check file name provided
if($_SERVER['argc'] ==2)
	{
		//check that file exists
		$file = $_SERVER['argv'][1];
		if(file_exists($file) && is_file($file))
		{
			//read in file and print each line
			if($data = file($file))
				{
					echo "\nNumbering the file named '$file'...\n
					-----------------------------------\n\n";
					
					$n = 1;
					foreach ($data as $line)
					{
						echo "$n $line";
						$n++;
					}//END foreach loop
					echo "\n---------------------\nEnd of file '$file'.\n";
					//return 0 to indicate proper execution 
					exit(0);
				}else{
					echo "The file could not be read.\n";
					exit(1);
				}
		}else{
			echo "The file does not exist.\n";
			exit(1);
		}
	}else{
		echo "\nUsage: number2.php <filename>\n\n";
		exit(1);
	}
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
?>