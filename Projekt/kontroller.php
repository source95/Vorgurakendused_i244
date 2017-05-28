<?php 
require_once('functions.php');
session_start();
connect_db();
require_once('views/head.html');

if (!empty($_GET)){
$leht = htmlspecialchars($_GET["page"]);

switch ($leht) {
	case 'uus_transport':
			require_once('uus_transport.php');
		break;
	case 'uus_transport_kinnita':
			require_once('uus_transport_kinnita.php');
		break;
	case 'uus_transport_salvesta':
			require_once('uus_transport_salvesta.php');
		break;
	case 'home':
			require_once('views/home.html');
		break;
	case 'query':
			require_once('query.php');
			break;	
	case 'tulemus':
			require_once('tulemus.php');
		break;
	case 'login':
			logi();
		break;
	case "logout":
			logout();
	break;
	case 'loggedin':
			require_once('views/loggedin.html');
		break;	
	case 'kontakt':
			require_once('views/kontakt.html');
			break;	
	default:
		# code...
		break;
	}
}

require_once('views/foot.html'); 
?>
