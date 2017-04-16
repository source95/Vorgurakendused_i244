<?php 
require_once('head.html');
 ?>
 	
	<h3>Vali oma lemmik :)</h3>
	<form action="tulemus.php" method="GET">
	 

<?php 
$pictures = array("1", "2", "3", "4", "5", "6");
		foreach ($pictures as $value) {	
			echo "<p>";
			echo'<label for="p'.$value.'">';
			echo'<img src="pildid/nameless'.$value.' ".jpg" alt="nimetu' .$value.'" height="100" />';
			echo'</label>';
			echo'<input type="radio" value="'.$value.'" id="p'.$value.'" name="pilt"/>';
			echo "</p>";
		}
 ?>

		<!-- <p>
			<label for="p1">
				<img src="pildid/nameless1.jpg" alt="nimetu 1" height="100" />
			</label>
			<input type="radio" value="1" id="p1" name="pilt"/>
		</p>


		<p>			
			<label for="p2">
				<img src="pildid/nameless2.jpg" alt="nimetu 2" height="100" />
			</label>
			<input type="radio" value="2" id="p2" name="pilt"/>
		</p>
		<p>			
			<label for="p3">
				<img src="pildid/nameless3.jpg" alt="nimetu 3" height="100" />
			</label>
			<input type="radio" value="3" id="p3" name="pilt"/>
		</p>
		<p>			
			<label for="p4">
				<img src="pildid/nameless4.jpg" alt="nimetu 4" height="100" />
			</label>
			<input type="radio" value="4" id="p4" name="pilt"/>
		</p>
		<p>			
			<label for="p5">
				<img src="pildid/nameless5.jpg" alt="nimetu 5" height="100" />
			</label>
			<input type="radio" value="5" id="p5" name="pilt"/>
		</p>
		<p>			
			<label for="p6">
				<img src="pildid/nameless6.jpg" alt="nimetu 6" height="100" />
			</label>
			<input type="radio" value="6" id="p6" name="pilt"/>
		</p> -->
		<br/>
		<input type="submit" value="Valin!"/>
	</form>

<?php  
require_once('foot.html');
?>