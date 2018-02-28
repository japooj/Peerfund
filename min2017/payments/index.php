<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkAdmin();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	
	case 'view_unconfirmed':
		$content    = 'view_unconfirmed.php';
		$pageTitle  = 'Add Unconfirmed';
	break;

	case 'view_confirmed':
		$content    = 'view_confirmed.php';
		$pageTitle  = 'All Confirmed';
	break;
	
	case 'view_payments':
		$content    = 'view_payments.php';
		$pageTitle  = 'All Payments';
	break;
	
	default:
		$content    = 'view_payments.php';
		$pageTitle  = 'All Payments';
	break;
}
require_once '../include/template.php';
?>
