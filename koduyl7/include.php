<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title> Kodutöö7 nr3 </title>
</head>

<body>
<?php
$cars= array( 
		array('mudel'=>'Passat', 'tootja'=>'Volkswagen'), 
		array('mudel'=>'Rav4', 'tootja'=>'Toyota'),
		array('mudel'=>'Scenic', 'tootja'=>'Renault'), 
		array('mudel'=>'GTR', 'tootja'=>'Nissan'),
		array('mudel'=>'Voyager', 'tootja'=>'Chrysler'), 
		array('mudel'=>'Transit', 'tootja'=>'Ford')
	);
	
	foreach($cars as &$value){
	  include 'autod.html';
	  }
?>

</body>
</html>
