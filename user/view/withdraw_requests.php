<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$userID = $_SESSION['hlbank_user']['id'];


$date = date("Y-m-d h:i:s");

$stmt="INSERT IGNORE INTO withdraw_requests (user_id,approval,updated_at) VALUES ('$userID','0','$date');";
$result = dbQuery($stmt); 
if ($result) {
$sql="UPDATE tbl_transaction SET period ='5', status='processing' WHERE user_id='$userID' AND status='recommit' AND period ='4' ORDER BY user_id ASC";
$result = dbQuery($sql);
}
?>