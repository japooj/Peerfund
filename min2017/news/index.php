<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkAdmin();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	
	case 'new_news':
		$content    = 'add_news.php';
		$pageTitle  = 'Add News';
	break;

	case 'view_news':
		$content    = 'news.php';
		$pageTitle  = 'All News';
	break;
	
	
	default:
		$content    = 'news.php';
		$pageTitle  = 'All News';
	break;
}
require_once '../include/template.php';
?>
