<!-- <?php
//session_start(); // Session starts here. Exist in kontroller.php
?> -->
<link rel="stylesheet" href="css/uus_transport.css" />

 <div class="container">
 <div class="main">
 <h2>Uue transpordi registreerimine</h2>
 <span id="error">
<!--  Initializing Session for errors -->
 <?php
 if (!empty($_SESSION['error'])) {
 echo $_SESSION['error'];
 unset($_SESSION['error']);
 }
 ?>
 </span>
<!-- <h1>Uue transpordi registreerimine</h1> -->
<form name="uus_transport" method="post" action="uus_transport_kinnita.php" >
    Sõiduki reg NR: <input type="text" name="auto_regnr" required><br>
    Autojuhi nimi  <input type="text" name="juhi_nimi" required><br>
    Dokumendi NR  <input type="text" name="dok_nr" required><br>
    <!-- Kaup <input type="radio" name="kaup" value="sisse" > Sisse
     <input type="radio" name="kaup" value="välja"> Välja<br> -->
     Kaup <input type="checkbox" name="kaup_sisse" value="sisse"> Sisse 
          <input type="checkbox" name="kaup_valja" value="välja"> Välja <br>
    <br>
     <input type="reset" value="Reset" />
    <input type="submit" value="Edasi" name="submit" />
  </form>
<br>
 </div>
 </div>
