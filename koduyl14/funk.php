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
      $sqlrole = "SELECT role FROM ffjodoro_kylastajad WHERE username = '$myusername'";
      $myrole = mysqli_query($connection,$sqlrole); 
       $role = mysqli_fetch_array($myrole,MYSQLI_ASSOC);
      $sql = "SELECT id FROM ffjodoro_kylastajad WHERE username = '$myusername' and passw = SHA1('$mypassword')";
      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['user'] = $myusername;
         $_SESSION['role'] = $role['role'];
         
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
  
  if (empty($_SESSION['user'])) {
		header("Location: ?page=login");
	} else {
    $puurid = array();
    $puuri_nr = array();
    $sqlquery = "SELECT DISTINCT (puur) as puur FROM ffjodoro_loomaaed3 order by puur";

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
}
	//testimiseks
   /* echo "<pre>";
    print_r($loomad);
    echo"</pre>";*/

	include_once('views/puurid.html');
	
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)

global $connection;

  if (empty($_SESSION['user'])) {
		header("Location: ?page=login");
		}		
	 elseif ($_SESSION['role'] !== 'admin'){	 	
			header("Location: ?page=loomad");
		}
		else{
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      if (upload("liik") == ""){
      	$errors[] = "Error";
      }else{
      	upload('liik');
      	$nimi = mysqli_real_escape_string($connection, $_POST['nimi']);
		$puur = mysqli_real_escape_string($connection, $_POST['puur']);
		$liik = mysqli_real_escape_string($connection, upload("liik"));
      $insert = "INSERT INTO ffjodoro_loomaaed3 (nimi, puur, liik) VALUES ('$nimi', '$puur', '$liik')";
      $result = mysqli_query($connection,$insert);
     
      if(mysqli_insert_id($connection)){
	   		//echo "lisatud";
      			header("Location: ?page=loomad");
	   		} else {
	   			header("Location: ?page=lisa");
	   		}      
      } 
	}

}
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

function hangi_loom($id){

	$sqlloom = "SELECT * FROM ffjodoro_loomaaed3 WHERE id = '$id'";
	$resultloom = mysqli_query($connection, $sqlloom);

	if(mysql_num_rows($resultloom) >0){
    return resultloom;
	}else{
    header("Location: ?page=loomad");
	}
	
	}

?>
