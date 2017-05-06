<?php
/******************************************************************************************************
 * wunderground.php
 * last updated 2/111111111111111111111000000000000000000000000/17
 * this script is called from the js_weather.js page using the getWeather function
 *******/
header('Content-Type: application/json');
if( isset($_GET['state']) && (strlen($_GET['state'])===2) && (isset($_GET['city'])) ) {
$curl = curl_init("http://api.wunderground.com/api/75355b3e4adcf97f/conditions/q/$_GET[state]/$_GET[city].json");
curl_setopt($curl,CURLOPT_RETURNERTRANSFER,1);
$result=curl_exec($curl);
curl_close($curl);
// this is adding 1 to end of returned data >>> print $result;
} else {
echo "error";
}
?>
