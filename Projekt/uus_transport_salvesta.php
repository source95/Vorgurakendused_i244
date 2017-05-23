<!DOCTYPE HTML>
<html>
 <head>
 <title>Salvesta</title>
 <link rel="stylesheet" href="css/uus_transport.css" />
 </head>
 <body>
 <div class="container">
 <div class="main">
 <h2>Salvest1</h2>
 <?php
 session_start();
extract($_SESSION['post']); // Function to extract array.
unset($_SESSION['post']); // Destroying session.

 include 'db_connect.php';

 $mysqltime = date ("Y-m-d H:i:s"); 
 
 // An insertion query. $result will be `true` if successful
  $result = db_query("INSERT INTO uus_transport (auto_regnr, juhi_nimi, dok_nr, dateposted) VALUES ('$auto_regnr','$juhi_nimi', '$dok_nr', '$mysqltime')");
   if($result === false) {
   		$error = db_error();
   		echo '<p><span>Form Submission Failed..!!</span></p>';
        // Handle failure - log the error, notify administrator, etc.
    } else {
    	echo '<p><span id="success">Form Submitted successfully..!!</span></p>';
        // We successfully inserted a row into the database
    }



 ?>
 </div>
 </div>
 </body>
</html>
