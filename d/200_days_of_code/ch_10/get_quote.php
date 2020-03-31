<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Get Stock Quotes</title>
		<link rel="stylesheet" href="styles.css">
		<!--<link rel="stylesheet" href="../styles/my_styles.css">-->
	</head>
</html>
<body>
	<?php //Script 10.1 - get_quotes.php
	//check if form submitted
	if(isset($_GET['symbol']) && !empty($_GET['symbol']))
		{
			//Define url to be opened
			$url = sprintf('http://quote.yahoo.com/d/quotes.csv?s=%s&f=nl1', $_GET['symbol']);
			
			//open webpage and read in data
			$fp = fopen($url, 'r');
			$read = fgetcsv($fp);
			fclose($fp);
			
			//validate a legitmate stock symbol used
			if(strcasecmp($read[0], $_GET['symbol']) != 0)
				{
					//print stock quote
					echo '<div>The latest value for <span class="quote">'.$read[0].'</span>
					(<span class="quote">'.$_GET['symbol'].'</span>) is 
					$<span class="quote">'.$read[1].'</span>.</div>';
				}else{
					echo '<div class="error">Invalid symbol!</div>';
				}
		}//END of form submission IF
		?>
		<!-- create HTML Form-->
		<form action="get_quote.php" method="get">
			<fieldset>
				<legend>
					Enter a NYSE stock symbol to get the latest price:
				</legend>
				
				<p><label for="symbol">Symbol</label>:
					<input type="text" name="symbol" size="5" maxlength="5"></p>
					
				<p><input type="submit" name="submit" value="Fetch the Quote!" /></p>
			</fieldset>
		</form>
<?php
/**********************This link to stat counter works*************************/
 include('../../stats.html');
/******************************************************************************/
?>
</body>
</html>
