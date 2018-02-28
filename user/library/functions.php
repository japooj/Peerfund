<?php
function checkUser()
{
	// if the session id is not set, redirect to login page
	if (!isset($_SESSION['hlbank_user'])) {
		header('Location: ' . WEB_ROOT . 'login.php');
		exit;
	}
	// the user want to logout
	if (isset($_GET['logout'])) {
		doLogout();
	}
}	

function doReset()
{
	$errorMessage = '';
	
	//$accno 	= mysql_real_escape_string($_POST['usrname']);
	$email=$_POST['email'];
	
	$sql = "SELECT email FROM tbl_users WHERE email='$email'";
	$result = dbQuery($sql);

	if (dbNumRows($result) == 1) {
		while ($row = dbFetchAssoc($result)) {
			
			$pass=md5($row['password']);
		}
	$link="<a href='https://peerfundgh.com/user/reset_password.php?reset=".$pass."'>Click To Reset password</a>";
    require_once('phpmailer/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPDebug = 0;

    $mail->Host = "mail.peerfundgh.com";

        // set the SMTP port for the GMAIL server
    $mail->Port = "465";
                 
    // GMAIL username
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->SMTPAuth = true; 
    $mail->Username = "support@peerfundgh.com";
    // GMAIL password
    $mail->Password = "support@peerfundgh.com";

    $mail->setFrom('support@peerfundgh.com', 'PeerFund GH');

//Set an alternative reply-to address
$mail->addReplyTo('support@peerfundgh.com', 'PeerFund GH');

//Set who the message is to be sent to


$mail->addAddress($email);

//Set the subject line
$mail->Subject = 'Reset Password';

    $mail->IsHTML(true);
    $mail->Body    = 'Someone requested to reset your Password on PeerFund GH website. Kindly ignore this message if
    not you but if you, Kindly copy and paste the link into your browser to reset your password or '.$link;
    if($mail->Send())
    {
       $errorMessage = '<p style="color: green">Password reset successful. Check your email for reset link</p>';
    }
    else
    {
    	 $errorMessage = '<p style="color: red">Email does not exit.</p>';
      //echo "Mail Error - >".$mail->ErrorInfo;
    }

  }
	return $errorMessage;
	exit();
}

function doLogin()
{
	$errorMessage = '';
	
	$accno 	= mysql_real_escape_string($_POST['accno']);
	$pwd 	= mysql_real_escape_string($_POST['pass']);
	
	$sql = "SELECT * FROM tbl_users u, tbl_accounts a, tbl_address ad
			WHERE u.username = '$accno' AND u.pwd = PASSWORD('$pwd')
			AND u.id = a.user_id AND ad.user_id = u.id AND u.is_active != 'False'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		$row = dbFetchAssoc($result);
		$email = $row['email'];
		$_SESSION['hlbank_tmp'] = $row;
		$_SESSION['hlbank_user'] = $_SESSION['hlbank_tmp'];
		unset($_SESSION['hlbank_tmp']);
		$_SESSION['hlbank_user_name'] =	strtoupper($row['username']);
		
		    
		header('Location: index.php');
		exit;
	}
	else {
    $errorMessage = '<p style="color: red">Wrong username or password or Account is not Active. Please try again or contact support.</p>';
	}
	return $errorMessage;
}

function doLogout()
{
	if (isset($_SESSION['hlbank_user'])) {
		unset($_SESSION['hlbank_user']);
		//session_unregister('hlbank_user');
	}
	header('Location: login.php');
	exit;
}


function doRegister()
{
	$fName= $_POST['fname'];
	$lName= $_POST['lname'];
	$username = $_POST['username'];
	$phone 	= $_POST['phone'];
	$email 	= $_POST['email'];
	$country= $_POST['country_is'];
	$pwd 	= $_POST['password'];
	$acctType= $_POST['default_is'];
	$acctNumber= $_POST['mmnumber'];
	$acctName= $_POST['mmname'];


	$ipaddress = $_SERVER['REMOTE_ADDR'];

		//check if referral_by submitted is valid
		if(isset($_POST['referral_by']) && $_POST['referral_by'] != ''){
			if(!isReferral_byValid($_POST['referral_by'])){
				//go back to registration page if referral_by is invalid
				$address = 'register.php?';
				$i = 0;
				foreach($_POST as $key =>$val){
					if($key == 'password'){
						continue;
					}

					if($i++==0){
						$address = sprintf('%sref_err=true&%s=%s',$address,$key,urlencode($val));
					}else{

						$address = sprintf('%s&%s=%s',$address,$key,urlencode($val));
					}
				}

				header('Location: '.$address);
			}
		}

		// return;

	$original_referral_by = $_POST['referral_by'];
	
	$errorMessage = '';
	
	$sql = "SELECT username FROM tbl_users WHERE username = '$username'";
	$result = dbQuery($sql);
	if (dbNumRows($result) == 1) {
		$errorMessage = '<p style="color: red">Username exist, please try another name.</p>';
		return $errorMessage;
	}
	

    $sql = "SELECT email FROM tbl_users WHERE email = '$email'";
	$result = dbQuery($sql);
	if (dbNumRows($result) == 1) {
		$errorMessage = '<p style="color: red">Email exist, please try another email.</p>';
		return $errorMessage;
	}


	$accno = rand(9999999999, 99999999999);
	$accno = strlen($accno) != 10 ? substr($accno, 0, 10) : $accno;
	$activation=md5($email.time());

	$character_set_array = array();
    $character_set_array[] = array('count' => 4, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    $character_set_array[] = array('count' => 4, 'characters' => '0123456789');
    $temp_array = array();
    foreach ($character_set_array as $character_set) {
        for ($i = 0; $i < $character_set['count']; $i++) {
            $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
        }
    }
    //shuffle($temp_array);
    $ref= $username;

	$insert_id = 0; 

	$sql = "INSERT INTO tbl_users (fname, lname, username, pwd, email, phone, is_active,bdate, referral_code,ip,original_referral_by)
			VALUES ('$fName','$lName','$username', PASSWORD('$pwd'), '$email', '$phone','True',NOW(),'$ref','$ipaddress','$original_referral_by')";	
	dbQuery($sql);
	
	$insert_id = dbInsertId();
	
	//now create a user address. 
	$sql = "INSERT INTO tbl_address (user_id,country) 
			VALUES ($insert_id, '$country')";
	dbQuery($sql);

	$sql = "INSERT INTO tbl_accounts (user_id,acct_type,acct_number,acct_name) 
			VALUES ($insert_id, '$acctType','$acctNumber','$acctName')";
	dbQuery($sql);

    echo "<script>
			alert('Congratulations! Account registeration successful');
			window.location.href='login.php';
	     </script>";
	exit();
	
}

		function add_testimonial($user_id,$message){
	    $sql = sprintf('insert into testimonials (user_id,message,approval) values(%s,"%s",false);', $user_id, $message);
	      $result = dbQuery($sql);
	      if($result){
	        header('Location: index.php?v=dashboard&message='.urlencode('Testimonial has been added successfully'));
	      }else{
	         header('Location: index.php?v=dashboard&errmessage='.urlencode('Sorry! Testimonial failed'));

	      }
	  }



        function isReferral_byValid($referral_by){
			$sql = sprintf('Select count(*) as count from tbl_users where referral_code = "%s"',$referral_by);

			return (int)dbFetchAssoc(dbQuery($sql))['count'];
		}

			function getUpgradeRequest($user_id){
			$sql = 'select req.*,usr.*,ac.*,acc.* from upgrade_requests as req,(select tbl_users.* from tbl_users) as usr,(select tbl_accounts.* from tbl_accounts) as ac,(select tbl_transaction.* from tbl_transaction) as acc where req.parent_id = usr.id and acc.user_id = usr.id and ac.user_id = usr.id and acc.status="pending" and acc.period=0 and req.user_id ='.$_SESSION['hlbank_user']['id'] ;
			$result = dbQuery($sql);
			$result_arr = [];

			while($row = dbFetchAssoc($result)){
				array_push($result_arr,$row);
			}

			return $result_arr;
			exit();
		}

		

			function getUpgradeRequest2($user_id){
			$sql = 'select req.*,usr.*,ac.*,acc.*,ad.* from upgrade_requests as req,(select tbl_users.* from tbl_users) as usr,(select tbl_accounts.* from tbl_accounts) as ac,(select tbl_transaction.* from tbl_transaction) as acc,(select tbl_address.* from tbl_address) as ad where req.user_id = usr.id and acc.user_id = req.parent_id and ac.user_id = usr.id and ad.user_id = usr.id and acc.status="pending" and acc.period=0 and req.parent_id ='.$_SESSION['hlbank_user']['id'] ;
			$result = dbQuery($sql);
			$result_arr = [];

			while($row = dbFetchAssoc($result)){
				array_push($result_arr,$row);
			}

			return $result_arr;
			exit();
		}
?>