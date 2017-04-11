<?php
session_start();
	 
if (isset($_POST['auto_regnr'])){
 if (empty($_POST['auto_regnr'])
 || empty($_POST['juhi_nimi'])
 || empty($_POST['dok_nr'])){ 
 // Setting error message
 $_SESSION['error'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: page1_form.php"); // Redirecting to first page 
 } else {
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = htmlspecialchars($value);
 }
 }  
} else {
 if (empty($_SESSION['error_page2'])) {
 header("location: page1_form.php");//redirecting to first page
 }
}		 
?>
<!DOCTYPE HTML>
<html>
 <head>
 <title>Uue transpordi registreerimise kinnitus</title>
 <link rel="stylesheet" href="uus_transport.css" />
 </head>
 <body>
 <div class="container">
 <div class="main">
 <h2>Uue transpordi registreerimise kinnitus</h2><hr/>
 <span id="error">
<?php
// To show error of page 2.
if (!empty($_SESSION['error_page2'])) {
 echo $_SESSION['error_page2'];
 unset($_SESSION['error_page2']);
}
?>
 </span>

<?php 
$dt = new DateTime();
$nameErr ="";



if (isset($_POST['auto_regnr']) && $_POST['auto_regnr']!="") {
    $auto_reg_nr=htmlspecialchars($_POST['auto_regnr']);
  }
if (isset($_POST['juhi_nimi']) && $_POST['juhi_nimi']!="") {
    $autojuhi_nimi=htmlspecialchars($_POST['juhi_nimi']);
  }
if (isset($_POST['dok_nr']) && $_POST['dok_nr']!="") {
    $dokument_nr=htmlspecialchars($_POST['dok_nr']);
  } 
if (isset($_POST['kaup_sisse']) && $_POST['kaup_sisse']!="") {
    $kaup_sisse=htmlspecialchars($_POST['kaup_sisse']);
  } 
if (isset($_POST['kaup_valja']) && $_POST['kaup_valja']!="") {
    $kaup_valja=htmlspecialchars($_POST['kaup_valja']);
  } 

echo $auto_reg_nr;
echo "<br>";
echo $autojuhi_nimi; 
echo "<br>";
echo $dokument_nr; 
echo "<br>";
echo $kaup_sisse; 
echo "<br>";
echo $kaup_valja; 
echo "<br>";

echo $dt->format('Y-m-d H:i:s');
?>
<form action="uus_transport_salvesta.php" method="post">
<input type="submit" value="Kinnita" />
</form>
 
 </div>
 </div>
 </body>
</html>
