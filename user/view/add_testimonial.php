<?php
require('./../library/config.php');
require('./../library/functions.php');

add_testimonial($_SESSION['hlbank_user']['id'],$_REQUEST['message']);



 ?>
