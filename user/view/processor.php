<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$userID = $_SESSION['hlbank_user']['id'];

$now = date('Y-m-d H:i:s');
$date = strtotime($now);
$finaldate = date('M d, Y', $date);

$stmt="SELECT * FROM tbl_transaction WHERE status='confirmed' AND period =2";
$result = dbQuery($stmt); 
while ($row = dbFetchAssoc($result)) {
	$mature_on_date = $row['mature_on'];

if ($mature_on_date == $finaldate) {
    $stmt="UPDATE tbl_transaction SET status='recommit', period=3 WHERE status='confirmed' AND period =2";
    $result = dbQuery($stmt);
 }
}
?>