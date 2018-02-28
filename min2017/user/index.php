<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkAdmin();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	
	case 'users' :
		$content 	= 'users.php';		
		$pageTitle 	= 'View Users';
	break;

    case 'new_user' :
		$content 	= 'add_user.php';		
		$pageTitle 	= 'Register User';
	break;

	case 'edit_user' :
		$content 	= 'edit_user.php';		
		$pageTitle 	= 'Register User';
	break;

	case 'view_user' :
		$content 	= 'view_profile.php';		
		$pageTitle 	= 'Register User';
	break;

	case 'view_blocked_users' :
		$content 	= 'view_blockedusr.php';		
		$pageTitle 	= 'Blocked Users';
	break;

	case 'view_active_users' :
		$content 	= 'view_activeusr.php';		
		$pageTitle 	= 'Blocked Users';
	break;

	default :
		$content 	= 'users.php';		
		$pageTitle 	= 'View Users';
	break;
}

$script    = array('user.js');

require_once '../include/template.php';
?>
