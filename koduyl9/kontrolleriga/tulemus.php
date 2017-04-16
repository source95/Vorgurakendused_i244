<?php require_once('head.html'); ?>

	<h3>Valiku tulemus</h3>
	
	<?php 	
	if (empty($_POST)) {
		echo "Palun vali pilt!";
	}
	elseif (in_array($_POST["pilt"], $pictures)) {
		echo "Tänan, valisite pilt nr ";
			echo $_POST["pilt"];
	}
	
	?>

<?php require_once('foot.html'); ?>

