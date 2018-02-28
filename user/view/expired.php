<?php
$userID = $_SESSION['hlbank_user']['user_id'];
$sql = "DELETE FROM upgrade_requests WHERE approval='pending' AND user_id = '$userID'";
$result = dbQuery($sql);

$sql = "UPDATE tbl_users SET is_active='False' WHERE id = '$userID'";
$result = dbQuery($sql);
echo "<script>
	  window.location.href='../login.php';
	 </script>
	 ";
?>