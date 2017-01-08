<?php
/******************************************************************************************************
 * CSCI E - 3 -Introduction to Web Programming Using JavaScript  - Final Project - Fall 2016
 * Teaching Fellow 
 * Student = David Petringa
 * Thank you for checking my work. I hope you enjoy.
 * csci_e_3_final_project_retrieve_data.php
 * last updated 12/11111111111555555555555/16
 *
 * used the book modern javascript as a referenece.  page 468
 * I was getting cors erors when using ajax to directly retrieve the data.
 * So now the ajax call from the csci_e_3_final_project.js script calls this page
 * this script calls the outside domain url to get the JSON data
 * then the js page gets the response and parses the data
 * data source used is from http://api.sba.gov/doc/geodata.html
 * api url:
 * http://api.sba.gov/geodata/city_data_for_state_of/' + state + '.json', true)
 *******/
header('Content-Type: application/json');
if(isset($_GET['state'])&&(strlen($_GET['state'])===2)) {
$curl=curl_init("http://api.sba.gov/geodata/city_data_for_state_of/$_GET[state].json");
curl_setopt($curl,CURLOPT_RETURNERTRANSFER,1);
$result=curl_exec($curl);
curl_close($curl);
// this is adding 1 to end of returned data >>> print $result;
} else {
echo "error";
}
?>
