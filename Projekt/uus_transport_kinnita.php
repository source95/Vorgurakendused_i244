<?php
if (empty($_SESSION['user'])) {
        header("Location: ?page=login");
    } else {
      
if (isset($_POST['auto_regnr'])){
 if (empty($_POST['auto_regnr'])
 || empty($_POST['juhi_nimi'])
 || empty($_POST['dok_nr'])){ 
 // Setting error message
 $_SESSION['error'] = "Palun täida kõik väljud";
 header("location: uus_transport.php"); // Redirecting to first page 
 } else {
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = htmlspecialchars($value);
 }
 }  
} else {
 if (empty($_SESSION['error_page2'])) {
 header("location: uus_transport.php");
 }
}		 
?>

 <link rel="stylesheet" href="css/uus_transport.css" />
 <div class="container">
 <div class="main">
 <h2>Transpordi registreerimise kinnitus</h2><hr/>
 <span id="error">
<?php
// To show error of page 2.
if (!empty($_SESSION['error_page2'])) {
 echo $_SESSION['error_page2'];
 unset($_SESSION['error_page2']);
} ?>
 </span>

<?php 
$kaupsisse = "";
$kaupvalja = "";

if (isset($_POST['auto_regnr']) && $_POST['auto_regnr']!="") {
    $auto_reg_nr=htmlspecialchars($_POST['auto_regnr']);
  }
if (isset($_POST['juhi_nimi']) && $_POST['juhi_nimi']!="") {
    $autojuhi_nimi=htmlspecialchars($_POST['juhi_nimi']);
  }
if (isset($_POST['dok_nr']) && $_POST['dok_nr']!="") {
    $dokument_nr=htmlspecialchars($_POST['dok_nr']);
  } 
if (isset($_POST['vedaja']) && $_POST['vedaja']!="") {
    $kauba_vedaja=htmlspecialchars($_POST['vedaja']);
  }   
if (isset($_POST['estakaad']) && $_POST['estakaad']!="") {
    $estakaad=htmlspecialchars($_POST['estakaad']);
  }  
if (isset($_POST['kaup_sisse']) && ($_POST['kaup_sisse']=="jah")) {
   $kaupsisse .= "jah";   }
   else{  $kaupsisse .= "ei";  } 
if (isset($_POST['kaup_valja']) && ($_POST['kaup_valja']=="jah")) {
    $kaupvalja .= "jah";   }
   else{  $kaupvalja .= "ei";  }
  
$_SESSION['kaup'] = array();
$_SESSION['kaup']['kaupsisse'] = $kaupsisse;
$_SESSION['kaup']['kaupvalja'] = $kaupvalja;
?>

<div >
<table class="table table-striped table-bordered table-hover center">
    <tbody>
           <tr>
            <th>Sõiduki regNR</th>
            <td><?php echo $auto_reg_nr; ?></td>
           </tr>
           <tr>
            <th>Autojuhi nimi</th>
            <td><?php echo $autojuhi_nimi; ?></td>            
           </tr>
           <tr>
            <th>Dokumendi NR</th>
            <td><?php echo $dokument_nr;  ?></td>            
           </tr>
           <tr>
            <th>Kauba vedaja</th>
            <td><?php echo $kauba_vedaja; ?></td>            
          </tr>
          <tr>
            <th>Estakaad</th>
            <td><?php echo $estakaad; ?></td>            
          </tr>
          <tr>
            <th> Kaup sisse</th>
            <td><?php echo $kaupsisse; ?></td>            
          </tr>
           <tr>
            <th>Kaup välja</th>
            <td><?php echo $kaupvalja; ?></td>            
          </tr>
           <tr>
            <th>Aeg</th>
            <td><?php DTime(); ?></td>            
          </tr>
    </tbody>

</table>
</div>

<form action="?page=uus_transport_salvesta" method="post">
<input type="submit" value="Kinnita" />
</form>
 </div>
 </div>
<?php } ?>
