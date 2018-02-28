<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkAdmin();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	
	
	case 'pending' :
		$content 	= 'pending.php';		
		$pageTitle 	= 'Pending Requests';
	break;
	case 'aprroved' :
		$content 	= 'approved.php';		
		$pageTitle 	= 'Approved Requests';
	break;

	default :
		$content 	= 'aprroved.php';		
		$pageTitle 	= 'View All Requests';
	break;
}

$script    = array('user.js');

require_once '../include/template.php';
?>
