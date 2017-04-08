<?php 

$all_text="Please write something"; // vaikimisi vaartus

if (isset($_POST['te_size']) && $_POST['te_size']!="") {
    $text_size=htmlspecialchars($_POST['te_size']);
  }
if (isset($_POST['te_color']) && $_POST['te_color']!="") {
    $te_col=htmlspecialchars($_POST['te_color']);
  }
if (isset($_POST['bg_color']) && $_POST['bg_color']!="") {
    $bg_col=htmlspecialchars($_POST['bg_color']);
  } 
if (isset($_POST['text']) && $_POST['text']!="") {
    $all_text=htmlspecialchars($_POST['text']);
  } 
if (isset($_POST['border_width']) && $_POST['border_width']!="") {
    $border_w=htmlspecialchars($_POST['border_width']);
  } 
if (isset($_POST['border_radius']) && $_POST['border_radius']!="") {
    $border_r=htmlspecialchars($_POST['border_radius']);
 } 
if (isset($_POST['border_color']) && $_POST['border_color']!="") {
    $border_col=htmlspecialchars($_POST['border_color']);
 } 
if (isset($_POST['border_style']) && $_POST['border_style']!="") {
    $border_st=htmlspecialchars($_POST['border_style']);
 } 

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title> Kodutöö8 </title>
<style>
body {background: <?php echo $bg_col; ?>; }
.textbox {
  color:      <?php echo $te_col; ?>; 
  font-size:  <?php echo $text_size; ?>px; 
  border: <?php echo $border_w; ?>px solid;
  border-radius:  <?php echo $border_r; ?>px;
  border-color:   <?php echo $border_col; ?>;
  border-style:   <?php echo $border_st; ?>;
 }
</style>
</head>

<body>
<textarea class="textbox" rows="4" cols="50" placeholder="You entered:">
<?php
echo $all_text; 
?>
</textarea>
<br>
<br>
<br>
<form method="post" action="" id="usrform">
    <textarea name="text" form="usrform" rows="4" cols="50" placeholder="Please enter text"></textarea> <br>
    Teksti suurus <input type="number" name="te_size" min=8 max="72" step="1" value="12" ><br>
    Tekstivärvus  <input type="color" name="te_color" value="#FFF" ><br>
    Taustavärvus  <input type="color" name="bg_color" value="#FFFFFF" ><br>

    <fieldset> <!-- element is used to group related data in a form -->
    <legend>Piirjoon</legend> <!-- element defines a caption for the <fieldset> element -->
    Piirjoone laius <input type="number" name="border_width" min=0 max="20" step="1" value="2" ><br>
    Piirjoone värvus <input type="color" name="border_color" value="#FFF"><br>
    Piirjoone nurga raadius <input type="number" name="border_radius" min=0 max="100" step="1" value="5" ><br>
    Piirjoone stiil <select name="border_style">
        <option value="double">double</option>
        <option value="solid">solid</option>      
        <option value="dashed">dashed</option>
    </select>
    </fieldset>
    <input type="submit" name="submit" />
  </form>

</body>
</html>
