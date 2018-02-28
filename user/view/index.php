<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['hlbank_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['v']) && $_GET['v'] != '') ? $_GET['v'] : '';

switch ($view) {
	case 'dashboard':
		$content 	= 'dashboard.php';		
		$pageTitle 	= 'PeerFund GH - Dashboard';
	break;

	case 'testimonials':
		$content 	= 'testimonials.php';		
		$pageTitle 	= 'PeerFund GH - Testimonials';
	break;

	case 'view_recommit':
		$content 	= 'recommit.php';		
		$pageTitle 	= 'PeerFund GH - Recommitment';
	break;

	case 'view_profile':
		$content 	= 'settings.php';		
		$pageTitle 	= 'PeerFund GH - Profile';
	break;

	case 'view_donate':
		$content 	= 'add_pledge.php';		
		$pageTitle 	= 'PeerFund GH - Provide Help';
	break;

	case 'view_history':
		$content 	= 'view_history.php';		
		$pageTitle 	= 'PeerFund GH - History';
	break;

	case 'view_referrals':
		$content 	= 'view_referrals.php';		
		$pageTitle 	= 'PeerFund GH - My Referrals';
	break;

    case 'expired':
		$content 	= 'expired.php';		
	break;

	default :
		$content 	= 'dashboard.php';		
		$pageTitle 	= 'PeerFund GH - Dashboard';
	break;
}

require_once '../include/template.php';
?>
