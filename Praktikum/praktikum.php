<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

	$host = "localhost";
    $user = "test";
    $pass = "t3st3r123";
    $db = "test";

    $l = mysqli_connect($host, $user, $pass, $db);
    mysqli_query($l, "SET CHARACTER SET UTF8") or
            die("Error, ei saa andmebaasi charsetti seatud");
   
    mysqli_close($l);

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
</body>
</html>
