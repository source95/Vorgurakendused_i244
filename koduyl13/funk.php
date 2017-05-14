<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)
 global $connection;
  
  if (!empty($_SESSION['user'])) {
		header("Location: ?page=loomad");
	} else {		
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
     
      $myusername = mysqli_real_escape_string($connection,$_POST['user']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['pass']); 
      
      $sql = "SELECT id FROM ffjodoro_kylastajad WHERE username = '$myusername' and passw = SHA1('$mypassword')";
      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['user'] = $myusername;
         
         header("location: ?page=loomad");
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

function kuva_puurid(){
	// siia on vaja funktsionaalsust 12.nädal

   global $connection;
    $puurid = array();
    $puuri_nr = array();
    $sqlquery = "SELECT DISTINCT puur FROM ffjodoro_loomaaed3 order by puur";

    $result = mysqli_query($connection, $sqlquery);


while ($rida = mysqli_fetch_assoc($result)){

        $puurid[$rida['puur']] = $rida['puur'];

    }

    $loomad = array();

    foreach($puurid as $value){
        $loomad[$value] = array();
        $loomarida = "SELECT * FROM ffjodoro_loomaaed3 WHERE puur=$value";
        $result1 = mysqli_query($connection, $loomarida);

        while ($rida = mysqli_fetch_assoc($result1)){
            array_push($loomad[$rida['puur']], $rida['liik']);

        }}

	//testimiseks
   /* echo "<pre>";
    print_r($loomad);
    echo"</pre>";*/

	include_once('views/puurid.html');
	
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	
	include_once('views/loomavorm.html');
	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>
