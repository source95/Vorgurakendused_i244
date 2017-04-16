<?php 
require_once('head.html');
 ?>
 	
	<h3>Vali oma lemmik :)</h3>
	<form action="?page=tulemus" method="POST">
	 

<?php 
		foreach ($pictures as $value) {	
			echo "<p>";
			echo'<label for="p'.$value.'">';
			echo'<img src="pildid/nameless'.$value.' ".jpg" alt="nimetu' .$value.'" height="100" />';
			echo'</label>';
			echo'<input type="radio" value="'.$value.'" id="p'.$value.'" name="pilt"/>';
			echo "</p>";
		}
 ?>

		<br/>
		<input type="submit" value="Valin!"/>
	</form>

<?php  
require_once('foot.html');
?>