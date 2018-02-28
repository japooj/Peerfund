<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkAdmin();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) { 

	case 'confirm':
		confirmUser();
	break; 

	case 'add':
		addUser();
	break;

	case 'addgh':
		addGH();
	break;

	case 'delete':
		deleteUser();
	break; 

	case 'pay':
		payUser();
	break; 

	default :

	break; 
}

function addGH()
{

$now = date('Y-m-d H:i:s');
$amntId = $_POST['ghusername'];
$userIds = $_POST['ghamnt'];
	
	$sql = "INSERT INTO gh_entry VALUES ('$amntId','$userIds','0','NUL','$now')";
	$result = dbQuery($sql);
	
	header('Location: index.php?view=add_gh&msg=' . urlencode('Donation has been added successfully'));

	exit();
	
}

function addUser()
{
	$pGH = $_POST['gh'];
	$pPH = $_POST['ph'];
	

    
    $sql="SELECT user_id, amount AS value_sum FROM gh_entry WHERE id='$pGH' AND status=0";
    $result = dbQuery($sql);
    while ($row = dbFetchAssoc($result)) {
    	$sum = $row['value_sum'];
	    $pID4 = $row['user_id'];
    }
	
	$sql="SELECT user_id, dream_amount AS value_sum2 FROM tbl_transaction WHERE id='$pPH' AND status='pending' AND period=1";
    $result = dbQuery($sql);
	while ($row = dbFetchAssoc($result)) {
			$sum2 = $row['value_sum2'];
	        $pID = $row['user_id'];
	}

   if ($sum2 == $sum) {
    	$date = date("Y-m-d h:i:s");
        $date = strtotime($date);
        $date = strtotime("+1 day", $date);
        $date = date('Y-m-d h:i:s', $date);
    	
    	$sql = sprintf('insert into upgrade_requests (user_id,parent_id,approval,id,updated_at) values(%s,"%s","pending","NULL","%s");', $pID4, $pID, $date);
	    $result = dbQuery($sql);

	    $sql = "UPDATE tbl_transaction SET period=0 WHERE id='$pPH' AND status='pending' AND period=1";
	    $result = dbQuery($sql);

	    $sql = "UPDATE gh_entry SET status=1 WHERE id='$pGH' AND status=0";
	    $result = dbQuery($sql);

	    header('Location: index.php?view=match&msg=' . urlencode('Matching successfully'));
	    exit();
    }
    
}

function deleteUser()
{

	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
	$userId = (int)$_GET['userId'];
} else {
	header('Location: index.php');
}
	
	$sql	= "DELETE FROM tbl_transaction WHERE user_id = $userId";
	$result = dbQuery($sql);
	
	header('Location: index.php?view=view_pending&msg=' . urlencode('Donation has been deleted successfully'));

	exit();
	
}

function payUser()
{

	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
	$userId = (int)$_GET['userId'];
    } else {
	header('Location: index.php');
    }
	
    $date = date("Y-m-d h:i:s");
	$sql	= "UPDATE tbl_transaction SET status='Processed Order', date='$date' WHERE user_id = $userId";
	$result = dbQuery($sql);
	
	header('Location: index.php?view=donations&msg=' . urlencode('Donation has been paid successfully'));

	exit();
	
}

function confirmUser()
{

	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
	$userId = (int)$_GET['userId'];
} else {
	header('Location: index.php');
}

    $sql="SELECT * FROM tbl_transaction WHERE user_id='$userID' AND status='pending' ORDER BY id DESC LIMIT 1";
    $result = dbQuery($sql);
    if ($result) {
    $date = date("Y-m-d h:i:s");
    $date = strtotime($date);
    $date = strtotime("+7 day", $date);
    $date = date('M d, Y', $date);

	$sql="UPDATE tbl_transaction SET status='confirmed', period=2, mature_on='$date' WHERE status='pending' AND period=0 AND user_id = $userId";
	$result = dbQuery($sql);

	$sql = "UPDATE upgrade_requests SET approval='approved' WHERE parent_id='$userId' AND approval='pending'";
	$result = dbQuery($sql);

	
	header('Location: index.php?view=donations&msg=' . urlencode('PH has been Approve successfully'));

	exit();
    }		
}

?>