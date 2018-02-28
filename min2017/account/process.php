<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkAdmin();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
			
	case 'changepwd' :
		changePwd();
	break;
	
	default :
	    // if action is not defined or unknown
		// move to main product page
		header('Location: index.php');
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