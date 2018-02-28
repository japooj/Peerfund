<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkAdmin();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	
	case 'testimonials' :
		$content    = 'testimonials.php';
		$pageTitle  = 'Testimonials';
	break;
	
	case 'approved_testimonials':
		$content = 'approved_testimonials.php';
		$pageTitle = 'Approved Testimonials';
		break;

	case 'approve_testimonial':
		approve_testimonial($_REQUEST['id']);
	break;

	case 'decline_testimonial':
		decline_testimonial($_REQUEST['id']);
	break;

	default :
		$content 	= '';		
		$pageTitle 	= '';
}
require_once '../include/template.php';
?>
