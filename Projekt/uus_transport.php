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