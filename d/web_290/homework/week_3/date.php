<html>
<head>
<title>How many days in this month?</title>
</head>
<body>
	<p>Exercise page 83</p>
<?php
$month = date("n");
if ($month==1) echo "31";
if ($month==2) echo "28 (unless it's a leap year)";
if ($month==3) echo "31";
if ($month==4) echo "30";
if ($month==5) echo "31";
if ($month==6) echo "30";
if ($month==7) echo "31";
if ($month==8) echo "31";
if ($month==9) echo "30";
if ($month==10) echo "31";
if ($month==11) echo "30";
if ($month==12) echo "31";
?>
<br>
<?php
$month = date("n");
if($month==1) echo "There are 31 Days";
if($month==2) echo "There are 28 (unless it's a leap year)Days";
if($month==3) echo "There are 31 Days";
if($month==4) echo "There are 30 Days";
if($month==4) echo "There are 30 Days";
if($month==5) echo "There are 31 Days";
if($month==6) echo "There are 30 Days";
if($month==7) echo "There are 31 Days";
if($month==8) echo "There are 31 Days";
if($month==9) echo "There are 30 Days";
if($month==10) echo "There are 31 Days";
if($month==11) echo "There are 30 Days";
if($month==12) echo " There are 31 Days";

echo '<br>';
$month_name = date("M");
echo "The month is $month_name";
echo '<br>';
$left= 12 - $month;
echo "there are $left monthes left in the year";

echo '<br>';
echo "Below is an include file";
echo '<br>';
include('myemail.html');

include('../../stats.html');
?>
</body>
</html>
