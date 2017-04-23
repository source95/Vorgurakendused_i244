<?php 
session_start();

require_once('head.html');
 ?>

<?php 
$pictures = array("1", "2", "3", "4", "5", "6");

if (!empty($_GET)){
$leht = $_GET["page"];

switch ($leht) {
	case 'pealeht':
		require_once('pealeht.php');
		break;
	case 'galerii':
		require_once('galerii.php');
		break;
	case 'vote':
		require_once('vote.php');
			break;	
	case 'tulemus':
		$id=false;
		if (isset($_POST['pilt']) && isset($pictures[$_POST['pilt']]))
			$id=htmlspecialchars($_POST['pilt']);
		require_once('tulemus.php');
		break;
	default:
		# code...
		break;
	}
}

?>

<?php require_once('foot.html'); ?>
