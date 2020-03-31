 <!--this menu_css.php will only use css and will not use jquery as I have some pages the a jquery-->
	<!--start new menu with drop down--> 
	  <nav class="clear">
	 <ul id="navigation" class="mainNav3">
	     <!--first button-->
		<?php   
define('BASE_URL','http://dukesnuz.com/d/jQueryJam4');
//define('BASE_URL','http://192.168.0.122:81/jQueryJam4');

		
	    echo '<li><a href="'.BASE_URL.'/index.php" title="HOURS 1-4">HOURS 1-4</a>
		    <ul>';
		    
			//echo '<li><a href="'.BASE_URL.'/hour01/first.html" title="Hour 1 first.html" target="blank">Hour_0101</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour01/hour01_01.html" title="Hour 1.1" target="blank">Hour_01.01</a></li>';
		echo '<li>';
			echo '<li><a href="'.BASE_URL.'/hour01/hour01_02.html" title="Hour 1.2" target="blank">Hour_01.02</a></li>';
	    	echo '<li><a href="'.BASE_URL.'/hour01/hour01_03.php" title="Hour 1.3" target="blank">Hour_01.03</a></li>';
		    echo '<li><a href="'.BASE_URL.'/hour01/hour01_04.html" title="Hour 1.4" target="blank">Hour_01.04</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour01/hour01_05.html" title="Hour 1.5" target="blank">Hour_01.05,6</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour01/hour01_07.html" title="Hour 17" target="blank">Hour_01.07</a></li>';
		//echo '</li>';
			
			echo '<li><a href="'.BASE_URL.'/hour02/hour02_01.html" title="Hour 2" target="blank">Hour_02.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour02/hour02_02.html" title="Hour 2" target="blank">Hour_02.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour02/hour02_03.html" title="Hour 2" target="blank">Hour_02.03</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour02/hour02_04.html" title="Hour 2" target="blank">Hour_02.04</a></li>';
			
			echo '<li><a href="'.BASE_URL.'/hour03/hour03_01.html" title="Hour 3" target="blank">Hour_03.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour03/hour03_02.html" title="Hour 3" target="blank">Hour_03.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour03/hour03_03.html" title="Hour 3" target="blank">Hour_03.03</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour03/hour03_04.html" title="Hour 3" target="blank">Hour_03.04</a></li>';
		    echo '<li><a href="'.BASE_URL.'/hour03/hour03_05.html" title="Hour 3" target="blank">Hour_03.05</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour03/hour03_06.html" title="Hour 3" target="blank">Hour_03.06</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour03/hour03_07.html" title="Hour 3" target="blank">Hour_03.07</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour03/hour03_08.html" title="Hour 3" target="blank">Hour_03.08</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour03/hour03_video.html" title="Hour 3" target="blank">Hour_03_Video</a></li>';
			
			
			echo '<li><a href="'.BASE_URL.'/hour04/hour04_01.html" title="Hour 4" target="blank">Hour_04.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour04/hour04_02.html" title="Hour 4" target="blank">Hour_04.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour04/hour04_03.html" title="Hour 4" target="blank">Hour_04.03</a></li>';
            echo '<li><a href="'.BASE_URL.'/hour04/hour04_04.html" title="Hour 4" target="blank">Hour_04.04</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour04/hour04_exercise_01.html" title="Hour 4" target="blank">Exercise4.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour04/hour04_exercise_02.html" title="Hour 4" target="blank">Exercise4.02</a></li>';
			
			
		echo '</ul>';
		echo '</li>';
		  
		//second button
		   echo '<li><a href="'.BASE_URL.'/index.php" title="HOURS 5-9">HOURS 5-9</a>
		    <ul>';
			echo '<li><a href="'.BASE_URL.'/hour05/hour05_01.html" title="Hour 5" target="blank">Hour_05.01</a></li>';
            echo '<li><a href="'.BASE_URL.'/hour05/hour05_02.html" title="Hour 5" target="blank">Hour_05.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour05/hour05_03.html" title="Hour 5" target="blank">Hour_05.03</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour05/hour05_04.html" title="Hour 5" target="blank">Hour_05.04</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour05/hour05_exercise_01.html" title="Hour 5" target="blank">Exercise5.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour05/hour05_exercise_02.html" title="Hour 5" target="blank">Exercise5.02</a></li>';
			
			echo '<li><a href="'.BASE_URL.'/hour06/hour06_01.html" title="Hour 6" target="blank">Hour_06.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour06/hour06_02.html" title="Hour 6" target="blank">Hour_06.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour06/hour06_03.html" title="Hour 6" target="blank">Hour_06.03</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour06/hour06_exercise_01.html" title="Hour 6" target="blank">Exercise6.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour06/hour06_exercise_02.html" title="Hour 6" target="blank">Exercise6.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour06/hour06_exercise_03.html" title="Hour 6" target="blank">Exercise6.03</a></li>';
			
			echo '<li><a href="'.BASE_URL.'/hour07/hour07_01.html" title="Hour 7" target="blank">Hour_07.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour07/hour07_02.html" title="Hour 7" target="blank">Hour_07.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour07/hour07_exercise_01.html" title="Hour 7" target="blank">Exercise7.01</a></li>';

			echo '<li><a href="'.BASE_URL.'/hour08/hour08_01.html" title="Hour 8" target="blank">Hour_08.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour08/hour08_02.html" title="Hour 8" target="blank">Hour_08.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour08/hour08_exercise_01.html" title="Hour 8" target="blank">Exercise8.01</a></li>';

			echo '<li><a href="'.BASE_URL.'/hour09/hour09_01.html" title="Hour 9" target="blank">Hour_09.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour09/hour09_02.html" title="Hour 9" target="blank">Hour_09.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour09/hour09_03.html" title="Hour 9" target="blank">Hour_09.03</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour09/hour09_04.html" title="Hour 9" target="blank">Hour_09.04</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour09/hour09_exercise_01.html" title="Hour 9" target="blank">Exercise9.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour09/hour09_exercise_02.html" title="Hour 9" target="blank">Exercise9.02</a></li>';
	
			
		echo '</ul>';
		echo '</li>';
	
	     //third button
		
		echo '<li><a href="'.BASE_URL.'/" title="">Hours 10-13</a>';
		echo '<ul>';
		echo '<li><a href="'.BASE_URL.'/hour10/hour10_01.html" title="Hour 10" target="blank">Hour_10.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour10/hour10_02.html" title="Hour 10" target="blank">Hour_10.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour10/hour10_03.html" title="Hour 10" target="blank">Hour_10.03</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour10/hour10_exercise_01.html" title="Hour 10" target="blank">Exercise10.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour10/hour10_exercise_02.html" title="Hour 10" target="blank">Exercise10.02</a></li>';
			
			echo '<li><a href="'.BASE_URL.'/hour11/hour11_01.html" title="Hour 11" target="blank">Hour_11.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour11/hour11_02.html" title="Hour 11" target="blank">Hour_11.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour11/hour11_exercise_01.html" title="Hour 11" target="blank">Exercise11.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour11/hour11_exercise_02.html" title="Hour 11" target="blank">Exercise11.02</a></li>';
            
		    echo '<li><a href="'.BASE_URL.'/hour12/hour12_01.html" title="Hour 12" target="blank">Hour_12.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour12/hour12_02.html" title="Hour 12" target="blank">Hour_12.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour12/hour12_03.html" title="Hour 12" target="blank">Hour_12.03</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour12/hour12_04.html" title="Hour 12" target="blank">Hour_12.04</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour12/hour12_05.html" title="Hour 12" target="blank">Hour_12.05</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour12/hour12_exercise_01.html" title="Hour 12" target="blank">Exercise12.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour12/hour12_exercise_02.html" title="Hour 12" target="blank">Exercise12.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour12/hour12_exercise_03.html" title="Hour 12" target="blank">Exercise12.03</a></li>';
			
			echo '<li><a href="'.BASE_URL.'/hour13/hour13_01.html" title="Hour 13" target="blank">Hour_13.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour13/hour13_02.html" title="Hour 13" target="blank">Hour_13.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour13/hour13_03.html" title="Hour 13" target="blank">Hour_13.03</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour13/hour13_04.html" title="Hour 13" target="blank">Hour_13.04</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour13/hour13_exercise_01.html" title="Hour 13" target="blank">Exercise13.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour13/hour13_exercise_02.html" title="Hour 13" target="blank">Exercise13.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour13/hour13_exercise_03.html" title="Hour 13" target="blank">Exercise13.03</a></li>';
			
		echo '</ul>';
		echo '</li>';
	
		 
		     //fourth button-
		echo '<li><a href="'.BASE_URL.'/" title="">Hours 14-16</a>';
		echo '<ul>';
		echo '<li><a href="'.BASE_URL.'/hour14/hour14_01.html" title="Hour 14" target="blank">Hour_14.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour14/hour14_02.html" title="Hour 14" target="blank">Hour_14.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour14/hour14_03.html" title="Hour 14" target="blank">Hour_14.03</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour14/hour14_04.html" title="Hour 14" target="blank">Hour_14.04</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour14/hour14_05.html" title="Hour 14" target="blank">Hour_14.05</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour14/hour14_06.html" title="Hour 14" target="blank">Hour_14.06</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour14/hour14_exercise_01.html" title="Hour 14" target="blank">Exercise14.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour14/hour14_exercise_02.html" title="Hour 14" target="blank">Exercise14.02</a></li>';
            echo '<li><a href="'.BASE_URL.'/hour14/hour14_exercise_03.html" title="Hour 14" target="blank">Exercise14.03</a></li>';
            
			
		    echo '<li><a href="'.BASE_URL.'/hour15/hour15_01.html" title="Hour 15" target="blank">Hour_15.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour15/hour15_02.html" title="Hour 15" target="blank">Hour_15.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour15/hour15_03.html" title="Hour 15" target="blank">Hour_15.03</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour15/hour15_04.html" title="Hour 15" target="blank">Hour_15.04</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour15/hour15_05.html" title="Hour 15" target="blank">Hour_15.05</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour15/hour15_06.html" title="Hour 15" target="blank">Hour_15.06</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour15/hour15_exercise_01.html" title="Hour 15" target="blank">Exercise15.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour15/hour15_exercise_02.html" title="Hour 15" target="blank">Exercise15.02</a></li>';
           
			echo '<li><a href="'.BASE_URL.'/hour16/hour16_01.html" title="Hour 16" target="blank">Hour_16.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour16/hour16_02.html" title="Hour 16" target="blank">Hour_16.02</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour16/hour16_03.html" title="Hour 16" target="blank">Hour_16.03</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour16/hour16_04.html" title="Hour 16" target="blank">Hour_16.04</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour16/hour16_05.html" title="Hour 16" target="blank">Hour_16.05</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour16/hour16_exercise_01.html" title="Hour 16" target="blank">Exercise16.01</a></li>';
			echo '<li><a href="'.BASE_URL.'/hour16/hour16_exercise_02.html" title="Hour 16" target="blank">Exercise16.02</a></li>';
            echo '<li><a href="'.BASE_URL.'/hour16/hour16_exercise_03.html" title="Hour 16" target="blank">Exercise16.03</a></li>';
          
		echo '</ul>';
		echo '</li>';
		
		
		
				     //fifth button-
		echo '<li><a href="'.BASE_URL.'/" title="">Hours 17-19</a>';
		echo '<ul>';
		echo '<li><a href="'.BASE_URL.'/hour17/hour17_01.html" title="Hour 17" target="blank">Hour_17.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour17/hour17_02.html" title="Hour 17" target="blank">Hour_17.02</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour17/hour17_03.html" title="Hour 17" target="blank">Hour_17.03</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour17/hour17_03_b.html" title="Hour 17" target="blank">Hour_17.03_b</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour17/hour17_exercise_01.html" title="Hour 17" target="blank">Exercise17.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour17/hour17_exercise_02.html" title="Hour 17" target="blank">Exercise17.02</a></li>';
           
		echo '<li><a href="'.BASE_URL.'/hour18/hour18_01.html" title="Hour 18" target="blank">Hour_18.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour18/hour18_02.html" title="Hour 18" target="blank">Hour_18.02</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour18/hour18_03.html" title="Hour 18" target="blank">Hour_18.03</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour18/hour18_04.html" title="Hour 18" target="blank">Hour_18.04</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour18/hour18_exercise_01.html" title="Hour 18" target="blank">Exercise18.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour18/hour18_exercise_02.html" title="Hour 18" target="blank">Exercise18.02</a></li>';
           
		echo '<li><a href="'.BASE_URL.'/hour19/hour19_01.html" title="Hour 19" target="blank">Hour_19.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour19/hour19_02.html" title="Hour 19" target="blank">Hour_19.02</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour19/hour19_03.html" title="Hour 19" target="blank">Hour_19.03</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour19/hour19_04.html" title="Hour 19" target="blank">Hour_19.04</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour19/hour19_05.html" title="Hour 19" target="blank">Hour_19.05</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour19/hour19_exercise_01.html" title="Hour 19" target="blank">Exercise19.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour19/hour19_exercise_02.html" title="Hour 19" target="blank">Exercise19.02</a></li>';
              
		echo '</ul>';
		echo '</li>';
		
		
		//sixth button-
		echo '<li><a href="'.BASE_URL.'/" title="">Hours 20-22</a>';
		echo '<ul>';
	
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_01.html" title="Hour 20" target="blank">Hour_20.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_02.html" title="Hour 20" target="blank">Hour_20.02</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_03.html" title="Hour 20" target="blank">Hour_20.03</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_04.html" title="Hour 20" target="blank">Hour_20.04</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_05.html" title="Hour 20" target="blank">Hour_20.05</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_06.html" title="Hour 20" target="blank">Hour_20.06</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_07.html" title="Hour 20" target="blank">Hour_20.07</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_08.html" title="Hour 20" target="blank">Hour_20.08</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_09.html" title="Hour 20" target="blank">Hour_20.09</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_10.html" title="Hour 20" target="blank">Hour_20.10</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_11.html" title="Hour 20" target="blank">Hour_20.11</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_12.html" title="Hour 20" target="blank">Hour_20.12</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_exercise_01.html" title="Hour 20" target="blank">Exercise20.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour20/hour20_exercise_02.html" title="Hour 20" target="blank">Exercise20.02</a></li>'; 
		  
		echo '<li><a href="'.BASE_URL.'/hour21/hour21_01.html" title="Hour 21" target="blank">Hour_21.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour21/hour21_exercise_01.html" title="Hour 21" target="blank">Exercise21.01</a></li>';
		
		
		echo '<li><a href="'.BASE_URL.'/hour22/hour22_01.html" title="Hour 22" target="blank">Hour_22.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour22/hour22_02.html" title="Hour 22" target="blank">Hour22.02</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour22/hour22_03.html" title="Hour 22" target="blank">Hour22.03</a></li>'; 
		echo '<li><a href="'.BASE_URL.'/hour22/hour22_exercise_01.html" title="Hour 22" target="blank">Exercise22.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour22/hour22_exercise_02.html" title="Hour 22" target="blank">Exercise22.02</a></li>';           
		
		echo '</ul>';
		echo '</li>';
		
		
		//seventh button-
		echo '<li><a href="'.BASE_URL.'/" title="">Hours 23-24</a>';
		echo '<ul>';
	
		echo '<li><a href="'.BASE_URL.'/hour23/hour23_01.html" title="Hour 23" target="blank">Hour_23.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour23/hour23_02.html" title="Hour 23" target="blank">hour23.02</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour23/hour23_03.html" title="Hour 23" target="blank">Hour_23.03</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour23/hour23_04.html" title="Hour 23" target="blank">hour23.04</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour23/hour23_05.html" title="Hour 23" target="blank">Hour_23.05</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour23/hour23_06.html" title="Hour 23" target="blank">Hour_23.06</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour23/hour23_exercise_01.html" title="Hour 23" target="blank">Exercise23.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour23/hour23_exercise_02.html" title="Hour 23" target="blank">Exercise23.02</a></li>';      

		echo '<li><a href="'.BASE_URL.'/hour24/hour24_01.html" title="Hour 24" target="blank">Hour_24.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour24/hour24_02.html" title="Hour 24" target="blank">hour24.02</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour24/hour24_03.html" title="Hour 24" target="blank">Hour_24.03</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour24/hour24_04.html" title="Hour 24" target="blank">hour24.04</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour24/hour24_05.html" title="Hour 24" target="blank">Hour_24.05</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour24/hour24_exercise_01.html" title="Hour 24" target="blank">Exercise24.01</a></li>';
		echo '<li><a href="'.BASE_URL.'/hour24/hour24_exercise_02.html" title="Hour 24" target="blank">Exercise24.02</a></li>';      
		
		 
		echo '</ul>';
		echo '</li>';
			   //lastbutton
   //echo '<li><ul>';
	//echo '<li><a href="##" class="press" title="Slide title up and create more screen space." id="headertoggle">Slide Title</a></li>';
    //echo '<li><span class="press" id="headertoggle">Slide Title</span></li>';
	// echo '<span class="press" id="headertoggle">Slide Title</span>';
   // echo '</ul></li>';    ?>
   
	 </ul>
 </nav>

