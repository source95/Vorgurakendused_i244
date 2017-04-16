<?php require_once('head.html'); ?>

	<h3>Valiku tulemus</h3>
	
	<?php 
	$pictures = array("1", "2", "3", "4", "5", "6");
	
	if (empty($_GET)) {
		echo "Palun vali pilt!";
	}
	elseif (in_array($_GET["pilt"], $pictures)) {
		echo "Tänan, valisite pilt nr ";
			echo $_GET["pilt"];
	}
	/*else{
		if (array_key_exists($_GET["pilt"], $pictures)) {
			echo "Exist";
			echo $_GET["pilt"];
		}
		}
array_key_exists($_GET["pilt"], $pictures)
		*/
	 

	?>
	

<?php require_once('foot.html'); ?>

