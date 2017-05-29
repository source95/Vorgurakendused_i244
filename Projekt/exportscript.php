<?php
session_start();
if (empty($_SESSION['user'])) {
        header("Location: ?page=login");
    } else {
require_once('functions.php');
connect_db();

if(isset($_POST["Export"])){
       
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'auto_regnr', 'juhi_nimi', 'dok_nr', 'vedaja', 'estakaad', 'kaupsisse', 'kaupvalja', 'kuupaev', 'kasutaja' ));  
      $query1 = "SELECT * from uus_transport ORDER BY id DESC";  
      $result = db_query($query1);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
}
 ?>
