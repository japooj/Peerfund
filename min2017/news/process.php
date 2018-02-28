<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkAdmin();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add_news' :
		addUser();
		break;


	default :
		header('Location: index.php');
	break;
}

function addUser()
{
    $title = $_POST['title'];
	$body = $_POST['body'];
			
	$sql   = "INSERT INTO tbl_news VALUES ('NULL','$title','$body','NOW()','Admin')";
	
	dbQuery($sql);
	header('Location: index.php?v=view_news&msg=' . urlencode('News has succesfully been posted'));	
	}

?>