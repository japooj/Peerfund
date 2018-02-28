<?php
require_once './library/config.php';
require_once './library/functions.php';

checkUser();

$content = 'view/dashboard.php';
$pageTitle = 'PeerFund GH';

require_once 'include/template.php';
?>