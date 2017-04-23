<?php 

//$all_text="Please write something"; // vaikimisi vaartus

if (isset($_POST['te_size']) && $_POST['te_size']!="") {
    $text_size=htmlspecialchars($_POST['te_size']);
  }
if (isset($_POST['te_color']) && $_POST['te_color']!="") {
    $te_col=htmlspecialchars($_POST['te_color']);
  }
if (isset($_POST['bg_color']) && $_POST['bg_color']!="") {
    $bg_col=htmlspecialchars($_POST['bg_color']);
  } 
/*if (isset($_POST['text']) && $_POST['text']!="") {
    $all_text=htmlspecialchars($_POST['text']);
  } */
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
<title> Kodutöö10 </title>
<style>
fieldset {
  display: inline-block;
}
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
<h1>Andmete edastamine PHP-st</h1>
<body>
<textarea class="textbox" rows="4" cols="50" >
<?php
if (!empty($_POST['text'])) {
        echo "{$_POST['text']}";
        } 
?>
</textarea>
<br>
<hr width="400" align="left"> 
<br>
<form method="post" action="index.php" id="usrform">
    <textarea name="text" form="usrform" rows="4" cols="50" placeholder="Please enter text"><?php if(!empty($_POST["text"]))
            echo htmlspecialchars($_POST["text"]);?></textarea> <br>
    Teksti suurus <input type="number" name="te_size" min=8 max="72" step="1" value="<?php if(!empty($_POST["te_size"]))
                    echo htmlspecialchars($_POST["te_size"]);?>" ><br>
    Tekstivärvus  <input type="color" name="te_color" value="<?php if(!empty($_POST["te_color"]))
                    echo htmlspecialchars($_POST["te_color"]);?>" ><br>
    Taustavärvus  <input type="color" name="bg_color" value="<?php if(!empty($_POST["bg_color"]))
                    echo htmlspecialchars($_POST["bg_color"]);?>"><br>

    <fieldset> <!-- element is used to group related data in a form -->
    <legend>Piirjoon</legend> <!-- element defines a caption for the <fieldset> element -->
    Piirjoone laius <input type="number" name="border_width" min=0 max="20" step="1" value="<?php if(!empty($_POST["border_width"]))
                    echo htmlspecialchars($_POST["border_width"]);?>" ><br>
    Piirjoone värvus <input type="color" name="border_color" value="<?php if(!empty($_POST["border_color"]))
                    echo htmlspecialchars($_POST["border_color"]);?>"><br>
    Piirjoone nurga raadius <input type="number" name="border_radius" min=0 max="100" step="1" value="<?php if(!empty($_POST["border_radius"]))
                    echo htmlspecialchars($_POST["border_radius"]);?>" ><br>
    Piirjoone stiil <select name="border_style">
        <option value="double"<?php if(!empty($_POST["border_style"]) && $_POST["border_style"] == "double]") echo "selected"; ?>>double</option>
        <option value="solid"<?php if(!empty($_POST["border_style"]) && $_POST["border_style"] == "solid") echo "selected"; ?>>solid</option>      
        <option value="dashed"<?php if(!empty($_POST["border_style"]) && $_POST["border_style"] == "dashed]") echo "selected"; ?>>dashed</option>
    </select>
    </fieldset>
    <br>
    <input type="submit" name="submit" />
  </form>

</body>
</html>
