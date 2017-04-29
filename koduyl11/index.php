<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />

<title> Praktikum </title>
	
</head>
<body>

<?php
	include 'db_con.php';
   
   //$sql = "SELECT * FROM `ffjodoro_loomaaed`";
  $number1 = "SELECT nimi, puur FROM `ffjodoro_loomaaed` WHERE puur=2";
  $number2 = "SELECT MAX(vanus) AS max_vanus, MIN(vanus) AS min_vanus FROM `ffjodoro_loomaaed`";
  $number3 = "SELECT puur, COUNT(puur) AS count_puur FROM `ffjodoro_loomaaed` GROUP BY puur";
  $number4 = "UPDATE `ffjodoro_loomaaed` SET `vanus`=`vanus`+1";
  $number5 = "SELECT nimi, vanus FROM `ffjodoro_loomaaed`";

  
   $result1 = db_query($number1) or die ("not working query");
   $result2 = db_query($number2) or die ("not working query");
   $result3 = db_query($number3) or die ("not working query");
   $result4 = db_query($number4) or die ("not working query");
   $result5 = db_query($number5) or die ("not working query");
echo '<p>Nr1</p>';
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo "Name: " . $row["nimi"]. " Puur: " . $row["puur"]. "<br>";
    }
} else {echo "0 results";}
echo '<p>Nr2</p>';
if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        echo "Max Vanus: " . $row['max_vanus']. " Min Vanus: " . $row['min_vanus']."<br>";
    }
} else {echo "0 results";}

echo '<p>Nr3</p>'; 
if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
        echo "Puur:  " . $row['puur']. " Puuris: " . $row['count_puur']."<br>";
    }
} else {echo "0 results";}

echo '<p>Nr4</p>';
if ($result5->num_rows > 0) {
    // output data of each row
    while($row = $result5->fetch_assoc()) {
        echo "Name: " . $row["nimi"]. " Vanus:  " . $row['vanus']. "<br>";
    }
} else {echo "0 results";}


?>

</body>
</html>
