<?php require_once('head.html'); 

if (isset($_SESSION['vote_for'] )){ ?>

	<h3>Valik juba tehtud </h3>
	

<?php } else{
	$_SESSION['vote_for'] = $_POST["pilt"];
	echo "<br/>";
	echo "Tänan, valisite pilt nr ";
			echo $_POST["pilt"];

	 } ?>


	<?php if ($_SESSION['vote_for'] = $_POST["pilt"]){ ?>
<form method="post" action="?page=tulemus">

	<input type="submit" name="delete" value="Muuta oma valik">	
</form>
<?php	} ?>

<?php if (isset($_POST['delete'] )){
		$_SESSION = array(); 
	
		echo '<a href="?page=vote">Tagasi valimiseks</a>';
} ?>




<?php require_once('foot.html'); ?>

