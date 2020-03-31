<html>
	<head>
		<titile>Loops</titile>
	</head>
	
	<body>
	<p>Exercise page 83</p>
		<h2>While loop</h2>
		<ul>
		<?php
		
		$a = 2;
		while($a <= 100)
		{
			echo "<li>$a</li>";
			$a+=2;
		}
		 
		?>
		</ul>
		
		<h2> For Loop</h2>
		
		<ul>
		<?php
		 
		 for($a=1; $a<=100; $a+=2)
		
			{
				echo "<li>$a</li>";
			}
		?>
		</ul>
		
		<?php include('../../stats.html');?>
	</body>
</html>



 	