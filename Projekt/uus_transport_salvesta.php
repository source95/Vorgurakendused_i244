<?php
if (empty($_SESSION['user'])) {
        header("Location: ?page=login");
    } else {
?>

 <link rel="stylesheet" href="css/uus_transport.css" />
 <div class="container">
 <div class="main">
 <h2>Salvestamine</h2>
 <?php
extract($_SESSION['post']); // Function to extract array.
unset($_SESSION['post']); // Destroying session.

 include 'db_connect.php';

$mytime = date ("Y-m-d H:i:s"); 
$kaupsisse = $_SESSION["kaup"]['kaupsisse'];
$kaupvalja = $_SESSION["kaup"]['kaupvalja'];
$kasutajanimi = $_SESSION['user'];

  $result = db_query("INSERT INTO uus_transport (auto_regnr, juhi_nimi, dok_nr, vedaja, estakaad, kaup_sisse, kaup_valja, dateposted, kasutajanimi) VALUES ('$auto_regnr','$juhi_nimi', '$dok_nr', '$vedaja', '$estakaad', '$kaupsisse', '$kaupvalja', '$mytime', '$kasutajanimi')");
   if($result === false) {
   		$error = db_error();
   		echo '<p><span>Salvestamine ebaõnnestus!</span></p>';        
    } else {
    	echo '<p><span id="success">Andmed salvestatud!</span></p>';
    }

 ?>
 </div>
 </div>
<?php } ?>
