<?php
if (empty($_SESSION['user'])) {
        header("Location: ?page=login");
    } else {  ?>

<link rel="stylesheet" href="css/uus_transport.css" />
 <div class="container">
 <div class="main">
 <h2>Transpordi registreerimine</h2>
 <span id="error">
<!--  Initializing Session for errors -->
 <?php
 if (!empty($_SESSION['error'])) {
 echo $_SESSION['error'];
 unset($_SESSION['error']);
 }
 ?>
 </span>
<form name="uus_transport" method="post" action="?page=uus_transport_kinnita" >
    Sõiduki reg NR: <input type="text" name="auto_regnr" required><br>
    Autojuhi nimi  <input type="text" name="juhi_nimi" required><br>
    Dokumendi NR  <input type="text" name="dok_nr" required><br>
    Kauba vedaja  <input type="text" name="vedaja" required><br>
    Estakaad  <input type="number" name="estakaad" min="1" max="25" required><br>
     Kaup <br>
     <input type="checkbox" name="kaup_sisse" value="jah"> Sisse 
     <input type="checkbox" name="kaup_valja" value="jah"> Välja <br>
    <br>
     <input type="reset" value="Kustuta" />
    <input type="submit" value="Edasi" name="submit" />
  </form>
<br>
 </div>
 </div>
<?php } ?>
