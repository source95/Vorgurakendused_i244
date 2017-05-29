<?php 
require_once('functions.php');
session_start();
connect_db();
require_once('views/head.html');

$page="pealeht";
if (isset($_GET['page']) && $_GET['page']!=""){
$page = htmlspecialchars($_GET["page"]);
}
switch ($page) {
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
	case 'about':
			require_once('views/about.html');
		break;
	case 'query':
			require_once('query.php');
			break;	
	case 'querybydate':
			require_once('querybydate.php');
			break;	
	case 'export':
			require_once('views/export.html');
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
		include_once('views/home.html');
		break;
	}


require_once('views/foot.html'); 
?>
