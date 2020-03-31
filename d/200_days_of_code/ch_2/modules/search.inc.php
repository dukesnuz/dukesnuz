<?php # script 2.6 - search.inc.php
if(!defined('BASE_URL'))
{
	require('../includes/config.inc.php');
	$url = BASE_URL.'index.php?p=search';
	if(isset($_GET['terms']))
	{
		$url .= '&terms='.urlencode($_GET['terms']);
	}
	header("Location: $url");
	exit();
}//END of defined()IF

echo '<h1>Search Results</h1>';

//check for search term
if(isset($_GET['terms'])  && ($_GET['terms'] != 'Search...'))
{
	//print search results
	for($i =1; $i<=10; $i++)
	{
echo <<<EOT
<h4><a href="#">Search Result #$i</a></h4>
<p>This is some description. This is some description. This is some description.</p>\n
EOT;
		

	}//END FOR Loop
  }else{
		echo '<p class="error">Please use the search form to search this site.</p>';
}
