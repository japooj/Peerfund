<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkAdmin();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add_news' :
		addUser();
	break;

	case 'confirm':
		confirmUser();
	break; 

	default :
		header('Location: index.php');
	break;
}

function confirmUser()
{

	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
	$userId = (int)$_GET['userId'];
} else {
	header('Location: index.php');
}

	$date = date("Y-m-d h:i:s");

	$sql	= "UPDATE tbl_transaction SET status='Approved Order', date='$date' WHERE user_id = $userId";
	$result = dbQuery($sql);
	$sql	= "UPDATE payment_proofs SET status='Approve' WHERE user_id = $userId";
	$result = dbQuery($sql);

	header('Location: index.php?view=payments&msg=' . urlencode('payment has been Approve successfully'));

	exit();
		
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