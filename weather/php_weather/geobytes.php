<?php
/******************************************************************************************************
 * geobytes.php.php
 * last updated 2/111111111111111100000000000000000000/17
 * script is called from the js_weather.js file. from the getLocation function
 *
 *******/
header('Content-Type: application/json');
if(isset($_GET['city'])) {
$curl = curl_init("http://gd.geobytes.com/AutoCompleteCity?callback=?&q=$_GET[city]");
curl_setopt($curl,CURLOPT_RETURNERTRANSFER,1);
$result=curl_exec($curl);
curl_close($curl);
// this is adding 1 to end of returned data >>> print $result;
} else {
echo "error";
}
?>
