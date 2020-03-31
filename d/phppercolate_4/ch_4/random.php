<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/...­
<html xmlns="http://www.w3.org/199...­ xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Lucky numbers</title>
</head>
<body>
<?php // Script 4.6 - Random

//Generate random numbers:
$n1 = rand (1, 99);
$n2 = rand (1, 99);
$n3 = rand (1, 99);

//Print out the random numbers:

print "<p>Your lucky numbers are:<br />
$n1<br />
$n2<br />
$n3</p>";


include('../../stats.html');
?>
</body>
</html>