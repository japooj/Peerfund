<?php
if (isset($_SESSION['hlbank_user'])) {
	unset($_SESSION['hlbank_user']);
	}
	header('Location: ../login.php');
?>