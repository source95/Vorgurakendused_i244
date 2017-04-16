<?php 
require_once('head.html');
 ?>

	<h3>Fotod</h3>
	<div id="gallery">
	<?php 

	$pictures = array("1", "2", "3", "4", "5", "6"); 

	foreach ($pictures as $value) {
	echo '<img src="pildid/nameless'.$value.' ".jpg" alt="nimetu' .$value.'"/>';
   /* echo "<br>";*/
	}

	?>
	
		<!-- <img src="pildid/nameless1.jpg" alt="nimetu 1" />
		<img src="pildid/nameless2.jpg" alt="nimetu 2" />
		<img src="pildid/nameless3.jpg" alt="nimetu 3" />
		<img src="pildid/nameless4.jpg" alt="nimetu 4" />
		<img src="pildid/nameless5.jpg" alt="nimetu 5" />
		<img src="pildid/nameless6.jpg" alt="nimetu 6" /> -->
		
</div>

<?php  
require_once('foot.html');
?>