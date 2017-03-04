<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />

<link rel="stylesheet" type="text/css" href="styles.css">
<title> Praktikum </title>
	
</head>
<body onload="startTime()">

<h1>You are welcome to my own page</h1>
<img class="displayed" src="https://business.yell.com/uploads/2011/10/4120686250.jpg" alt="website" />

<p>
Minu esimene veebileht, mis on tehtud võrgurakenduse aine raames.
</p>
<p id="t01">Time</p>
<script src="myScript.js"></script>
<div id="tme"></div> 
<br>
<div id="t02">
<?php
echo  'Current PHP version: ' . phpversion();
?>
</div>
<br>


<p>
 <a href="http://validator.w3.org/check?uri=referer">
  <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
 </a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
</p>
<?php
$host = "localhost";
    $user = "test";
    $pass = "t3st3r123";
    $db = "test";

    // Connecting, selecting database
$link = mysqli_connect($host, $user, $pass, $db)
    or die('Could not connect: ' . mysqli_error());
	echo 'Connected successfully';
	mysqli_select_db($link, $db) or die('Could not select database');

// Performing SQL query
$query = "SELECT id, Nimi, Perekonnanimi FROM t10163322t";
$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));

// Printing results in HTML
echo "<table>\n";
while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysqli_free_result($result);

// Closing connection
mysqli_close($link);

?>
</body>
</html>
