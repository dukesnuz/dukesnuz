#!/usr/bin/php

<?php //script 12.3 - temperature.php

echo "\Enter a temperature and indicate if it's Fahrenheit or Celsius[##.# C/F]:";

if (fscanf(STDIN, '%f %s', $temp_i, $which_i) == 2)
	{
		$which_o=FALSE;
		
		switch (trim($which_i))
			{
			case 'C':
			case 'c':
				$temp_o = ($temp_i * (9.0/5.0)) +32;
				$which_o = 'F';
				$which_i = 'C';
				break;
			
			case 'F':
			case 'f':
				$temp_o = ($temp_i -32) * (5.0/9.0);
				$which_o = 'C';
				$which_i = 'F';
				break;
			}//END of switch
			
			if($which_o)
				{
					printf("%0.1f %s is %0.1f %s.\n", $temp_i, $which_i,$temp_o, $which_o);
				}else{
					echo "You failed to enter C or F to indicate the current temperatture type.\n";
				}
	}else{
		echo "You faled to use the proper syntax.\n";
	}
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
?>
