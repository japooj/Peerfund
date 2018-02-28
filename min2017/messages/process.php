<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkAdmin();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
			
	case 'changepwd' :
		changePwd();
	break;
	
	case 'add_messages' :
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
	$id = $_POST['id'];
			
	$sql   = "INSERT INTO tbl_messages VALUES ('NULL','$id','$title','$body','NOW()','Admin')";
	
	dbQuery($sql);
	header('Location: index.php?v=view_messages&msg=' . urlencode('Message has succesfully been sent'));	
	}


function changePwd()
{
    $pwd 	= $_POST['cpass'];
	$id		= $_POST['id'];
	
	$sql	= "UPDATE tbl_users SET pwd = PASSWORD('$pwd') WHERE id = $id";
	$result = dbQuery($sql);
	
	header('Location: index.php?v=profile&msg=' . urlencode('Password has succesfully been updated'));
	exit();	
}

?>