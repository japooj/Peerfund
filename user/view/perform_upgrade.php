<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$userID = $_SESSION['hlbank_user']['id'];

$stmt="update upgrade_requests set approval='approved' where user_id='$userID'";
dbQuery($stmt);

exit();
$stmt="update  withdraw_requests set approval='1' where user_id='$userID'";
dbQuery($stmt);

$stmt="select * from upgrade_requests where user_id='$userID' or parent_id='$userID' and approval='approved'"
$result = dbQuery($stmt);
$row = dbFetchAssoc($result);
$fet = $row['approval'];
$pID = $row['parent_id'];
if ($fet == 'approved') {
	$stmt="update tbl_transaction set status='confirmed' and period='2' where user_id='$pID'";
    dbQuery($stmt);
}
print 1;
exit();
?>
