<?php
//Script 4.1 defining a class
/**
 * short description
 * 
 * Long description
 * Tags
 */
			//define class
			class HelloWorld
			{
				/**
				 * Function that says hello
				 * @param string $language Default is "English"
				 * @returns void
				 */
				 //define method
				function sayHello($language = 'English')
				{
					//start methods code
					echo '<p>';
					switch($language)
					{
case 'Dutch':
echo 'Halo, wereld!';
	break;

case 'French':
echo 'Bonjour, monde!';
	break;

case 'German':
echo 'Hallo, Welt!';
	break;
	
case 'Italian':
echo 'Ciao, mondo!';
	break;
	
case 'Spanish':
echo '!Hola, mundo!';
	break;
	
case 'English':
	Default:
echo 'Hello, world';
		break;
	}//END switch
	//complete sayHello() method
	echo '</p>';
			}	//END of sayHello() method	
			}//Complete class
