<?php	

//mote oli voetud lehelt http://freeola.com/support/adding-a-visitor-counter-to-a-website.html	
	$cookie_name = "visitorsCounter";
	if(!isset($_COOKIE[$cookie_name])) {	
		
		require_once('funk.php');
		connect_db();
		$mytime = date ("Y-m-d H:i:s"); 

		$sql_Query = mysqli_query($connection,"UPDATE ffjodoro_eksam SET count=count+1, lastvisit='$mytime'");


		 if($sql_Query === false) {
   		$error = db_error();
   		echo '<p><span>Salvestamine ebaõnnestus!</span></p>';        
    } else {
    	//for testing echo '<p><span id="success">Andmed salvestatud!</span></p>';
    	setcookie($cookie_name, "is counted", 
			time() + (30), "/"); // expires in 30 sec for testing
    	//in real life about 3 days> time() + (3* 24 * 60 *60), "/"); 
    		}
	}		

?>
