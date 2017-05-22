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
	case 'home':
		require_once('home.html');
		break;
	case 'query':
		require_once('query.php');
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
