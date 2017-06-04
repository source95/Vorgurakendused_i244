<?php

require_once('funk.php');
connect_db(); 
require_once('counter.php');
?>

<html>
<head>
  <meta charset="utf-8"/>
  <title>Eksam</title>
  </head>
<body>
  <p>See leht vaadatud <?php show();?> korda.</p>
  <p>Viimaselt <?php lastvisit();?></p>
</body>
</html>



