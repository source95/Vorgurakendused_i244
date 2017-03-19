
<?php
$uploadOk = 1;
if(isset($_POST['submit']) && $_FILES['userfile']['size'] > 0)
{
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["userfile"]["tmp_name"]);
if($check !== false) {
       echo "File is an image - " . $check["mime"] . ".";
       $uploadOk = 1;
	
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}
//database cred
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
$query = "INSERT INTO pr3pildid (name, size, type, content ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));

echo "<br>File $fileName uploaded<br>";

// Closing connection
mysqli_close($link);
} 
else {
      echo "File is not an image.";
      $uploadOk = 0;
	 }	

}
?>


