<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkAdmin();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	
	case 'change_password' :
		$content    = 'change_password.php';
		$pageTitle  = 'Change Password';
	break;
	
	
	default :
		$content 	= 'change_password.php';		
		$pageTitle 	= 'Change Password';
}
require_once '../include/template.php';
?>
