<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Database Backup</title>
	</head>
<body>
	<?php //Script 11.1 - db_backup.php
	echo '<h1>Compressing Files - Script 11.1</h1>';
	//set name of database
	$db_name = 'test';
	
	//make sure backup directory exists
	$dir = "backups/$db_name";
  if(!is_dir($dir))
    {
  	if(!@mkdir($dir))
		{
			die("<p>The backup --$dir--could not be created.</p>
			    </body>");
		}
	}	
	
	$time = time();
	
	require_once('../../include_2/mysqli_connect.php');
	
	$r= mysqli_query($dbc, 'SHOW TABLES');
	
	if(mysqli_num_rows($r) >0)
		{
			echo "<p>Backing up database '.$db_name.'</p>\n";
			
			//create loop that fetches each tabe name
			while(list($table) = mysqli_fetch_array($r, MYSQLI_NUM))
				{
					$q = "SELECT * FROM $table";
					$r2 = mysqli_query($dbc, $q);
					
					if(mysqli_num_rows($r2) >0)
						{
							if($fp = gzopen("$dir/{$table}_{$time}.sql.gz",'w9'))
								{
									//retrieve all tables data and write it to the file
									while($row = mysqli_fetch_array($r2, MYSQLI_NUM))
										{
											foreach ($row as $value)
												{
													$value = addslashes($value);
													gzwrite($fp, "'$value',");
												}
												gzwrite($fp, "'$value', ");
										}//END while loop
										//close the file and print a message
										gzclose($fp);
										echo "<p>Table '$table' backed up.</p>";
								}else{
									echo "<p>The file--$dir/{$table}_{$time}.sql.gz--could not be 
									        opened for writing</p>\n";
											break;
								}//END of gzopen() IF
						}//END of mysqli_num_rows() IF
				}//END of while loop
				}else{
					echo "<p>The submitted database--$db_name--contains no tables.</p>\n";
		}
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
?>

</body>
</html>
