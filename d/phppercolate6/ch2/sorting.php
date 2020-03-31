<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Mon, 19 Aug 2013 14:56:48 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Sorting Arrays 2.8|| Boston PHP || Percolate Season 6</title>
    <link href="../styles/percolate6.css" rel="stylesheet" type="text/css">
    
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<style>
	.error{
	font-weight:bold;
	color:#COO;
	 }
	.shuffle a{
	font-weight:bold;
	color:green;
    font-size:1.25em;
	 }
	</style>
  </head>
  <body>
  
Script 2.8
  
  <table border = "0" cellspacing ="3" cellpadding= "3" align = "center" >
  <tr>
  	  <td><h2>Rating</h2></td>
	  <td><h2>Title</h2></td>
  </tr>
  
  
<?php 
// Script 2.8 - sorting arrays 
echo "Script 2.8 - Sorting arrays. Last section I used a new array along with the shuffle() function.";
// new code goes here
$movies = array(
'Casablanca' =>10,
'To Kill a Mockingbird'=> 10,
'The English patient'=> 2,
'Stranger Than Fiction'=> 9,
'Story of The Weeping camel'=> 5,
'Donnie Darko'=> 7
);
$cities= array(
'1. Cine Thisio, Athens, Greece',
'2. Alamo Drafthouse, TX, US',
'3. Raj Mandir Theatre, Jaipur, India',
'4. Kino Int, Berlin, Germany',
'5. 4DX, Seaoul, South Korea',
'6. Uplink X, Tokyo, Japan',
'7. Prasads, Hyderbad, India',
'8. Cine de Chef, Seoul, South Korea',
'9. Secret Cinema, Worldwide',
'10. Castro Theatre, San Franxisci, US'
);

echo '<tr><td colspan="2"><b>In their original order:</b></td></tr>';
foreach ($movies as $title => $rating){
 		echo "<tr><td>$rating</td> <td>$title</td></tr>\n";
		}
		
ksort($movies);
 	echo '<tr><td colspan="2"><b> Sorted by title:</b></td></tr>';
	 foreach($movies as $title => $rating){
			echo "<tr><td>blank</td><td>$title</td></tr>\n";
			}
arsort($movies);
	 echo '<tr><td colspan="2"><b>Sorted by rating:</b></td></tr>';
	 foreach($movies as $title => $rating){
	 		echo "<tr><td>$rating</td><td>$title</td></tr>\n";
			}
//http://travel.cnn.com/explorations/escape/worlds-10-coolest-movie-theaters-355218

shuffle($cities);
	  echo '<tr><td colspan="2" class="shuffle"><b>Shuffle() 10 of The World\'s Most Enjoyable 
	  <a href="http://travel.cnn.com/explorations/escape/worlds-10-coolest-movie-theaters-355218" target="_blank">Movie</a> Theatres</b></td></tr>';
	  foreach($cities as $title ){
	 		echo "<tr><td>$title</td></tr>\n";
			}
			

// end new code


if(!empty ($_SERVER['HTTP_REFERER'])){
   $previous=$_SERVER['HTTP_REFERER'];
   }else{
   $previous= NULL;
  }
?>
<p><a href="<?php echo $previous; ?>">Back</a></p>


<?php include('../../stats.php');?>
  </body>
</html>