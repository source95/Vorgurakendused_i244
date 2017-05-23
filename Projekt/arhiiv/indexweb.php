<?php 
include("navbar.php");
echo "<br>";
include("menu.php");
?>
<!DOCTYPE HTML>
<html>
 <head>
 <title>WebPage</title>
 <link rel="stylesheet" href="indexweb.css" /> 
 </head>
 <body>

<!-- <h3>iframe</h3>
<p><a href="menu.php" target="iframe1">Uus tr</a></p>
<p><a href="uus_transport.php" target="iframe1">Vorm1</a></p>
<p><a href="vorm2.html" target="iframe1">Vorm2</a></p> -->

<div id="iframe">
<iframe src="uus_transport.php" name="iframe_content"></iframe>
 </div>

</body>
</html>
