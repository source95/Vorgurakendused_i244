<?php 
require_once('head.html');
 ?>

<?php 


if (!empty($_GET)){
$leht = $_GET["page"];

switch ($leht) {
	case 'uus_transport':
		require_once('uus_transport.php');
		break;
	case 'galerii':
		require_once('galerii.php');
		break;
	case 'vote':
		require_once('vote.php');
			break;	
	case 'tulemus':
		require_once('tulemus.php');
		break;
	default:
		# code...
		break;
	}
}

?>

<?php require_once('foot.html'); ?>