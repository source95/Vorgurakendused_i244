<?php

function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust SQL'ga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function db_query($query) {
      // Connect to the database
      global $connection;
      // Query the database
      $result = mysqli_query($connection,$query);
      return $result;
 }


function logi(){

 global $connection;
  
  if (!empty($_SESSION['user'])) {
		header("Location: ?page=home");
	} else {		
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      $myusername = mysqli_real_escape_string($connection,$_POST['user']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['pass']); 
      $sqlrole = "SELECT roll FROM ffjodoro_users WHERE username = '$myusername'";
      $myrole = mysqli_query($connection,$sqlrole); 
       $role = mysqli_fetch_array($myrole,MYSQLI_ASSOC);
      $sql = "SELECT id FROM ffjodoro_users WHERE username = '$myusername' and passw = SHA1('$mypassword')";
      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row		
      if($count == 1) {
         
         $_SESSION['user'] = $myusername;
         $_SESSION['roll'] = $role['roll'];
         
         header("location: ?page=loggedin");
      }else {
         $errors[] = "Your Login Name or Password is invalid";
      }
   }

}
	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function DTime(){
   $dt = new DateTime();
   echo $dt->format('Y-m-d H:i:s');
}


?>
