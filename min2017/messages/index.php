<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkAdmin();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	
	case 'new_message' :
		$content    = 'add_message.php';
		$pageTitle  = 'Add Message';
	break;

	case 'view_messages' :
		$content    = 'messages.php';
		$pageTitle  = 'All Messages';
	break;
	
	
	default :
		$content    = 'messages.php';
		$pageTitle  = 'All Messages';
		break;
}
require_once '../include/template.php';
?>
