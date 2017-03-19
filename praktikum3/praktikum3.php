<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />

<link rel="stylesheet" type="text/css" href="pr3-styles.css">
<title> Praktikum </title>
	
</head>
<body onload="startTime()">
<h1>You are welcome to our photo gallery</h1>
<div>
<form id="upload" action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:    
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
	<input name="userfile" type="file" id="userfile">
    <input class="button" type="submit" value="Upload Image" name="submit">
</form>
</div>

<?php

	$host = "localhost";
    $user = "test";
    $pass = "t3st3r123";
    $db = "test";

    // Connecting, selecting database
	$link = mysqli_connect($host, $user, $pass, $db)
    or die('Could not connect: ' . mysqli_error());
	echo 'Connected successfully';
	echo '<br>';
	$sdb= mysqli_select_db($link, $db) or die('Could not select database');
	
   
   $sql = "SELECT * FROM `pr3pildid`";
   $mq = mysqli_query($link, $sql) or die ("not working query");
  // $row = mysqli_fetch_array($mq) or die("line 44 not working");
 //  $s=$row['content'];
   while($rows = mysqli_fetch_assoc($mq))
    {       
   echo '<img src="data:image/jpeg;base64,'.base64_encode( $rows['content'] ).'"/>';
   echo '<br>';
	}
   
   //echo '<img src="'.$s.'" alt="HTML5 Icon" style="width:128px;height:128px">';
   
   // Closing connection
	mysqli_close($link);
?>

<h1>You are welcome to my own page</h1>
<img class="displayed" src="https://business.yell.com/uploads/2011/10/4120686250.jpg" alt="website" />



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
