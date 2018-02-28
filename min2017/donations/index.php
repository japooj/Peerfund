<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkAdmin();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	
    case 'view_pending':
	    $content 	= 'pending_donations.php';		
		$pageTitle 	= 'View PH';
	break;

    case 'confirmed_donations':
	    $content 	= 'confirmed_donations.php';		
		$pageTitle 	= 'Confirmed Donations';
	break;

	case 'view_gh':
	    $content 	= 'view_gh.php';		
		$pageTitle 	= 'View GH';
	break;

	case 'add_gh':
	    $content 	= 'add_gh.php';		
		$pageTitle 	= 'Add GH';
	break;

	case 'match':
	    $content 	= 'match.php';		
		$pageTitle 	= 'Assign GH to PH';
	break;

	case 'mdonors':
	    $content 	= 'matured_donations.php';		
		$pageTitle 	= 'Matured Donations';
	break;

    case 'match':
	    $content 	= 'match_donors.php';		
		$pageTitle 	= 'Match Donors';
	break;


	case 'donations':
	    $content 	= 'donations.php';		
		$pageTitle 	= 'All Donations';
	break;

	default :
		
	
}

require_once '../include/template.php';
?>
