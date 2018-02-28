<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkAdmin();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	case 'status' :
		statusUser();
	break;

	case 'add_new' :
		addUser();
	break;

	case 'updateusr' :
		updateUsr();
	break;
			
	case 'delete' :
		deleteUser();
	break;    

	default :
		header('Location: index.php');
	break;  
}

function updateUsr()
{
	$userId 	= (int)$_POST['hidUserId'];	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$Username = $_POST['username'];
	$phone 	= $_POST['phone'];
	$email 	= $_POST['email'];
	$country= $_POST['country_is'];
	$acctType= $_POST['default_is'];
	$acctNumber= $_POST['mmnumber'];
	$acctName= $_POST['mmname'];

	echo $sql= "UPDATE tbl_users SET fname = '$fname', lname = '$lname', username ='$Username', phone = '$phone', 
	email= '$email' WHERE id= $userId";
	dbQuery($sql);


	$sql   = "UPDATE tbl_address SET country = '$country' WHERE id = $userId";
	dbQuery($sql);

	$sql   = "UPDATE tbl_accounts SET acct_type = '$acctType', acct_name='$acctName', acct_number='$acctNumber' WHERE id = $userId";
	dbQuery($sql);

	header('Location: index.php');	

}

function statusUser()
{
	$userId = (int)$_GET['userId'];	
	$nst 	= $_GET['nst'];
	
	$status = $nst == 'Unblock' ? 'True' : 'False';
	$sql   = "UPDATE tbl_users 
	          SET is_active = '$status'
			  WHERE id = $userId";

	dbQuery($sql);
	header('Location: index.php');	

}

function addUser()
{
	$username = $_POST['username'];
	$phone 	= $_POST['phone'];
	$email 	= $_POST['email'];
	$country= $_POST['country_is'];
	$pwd 	= $_POST['password'];
	$acctType= $_POST['default_is'];
	$acctNumber= $_POST['mmname'];
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

	$sql = "INSERT INTO tbl_users (username, pwd, email, phone, is_active,bdate, referral_code,ip,original_referral_by)
			VALUES ('$username', PASSWORD('$pwd'), '$email', '$phone','True',NOW(),'$ref','$ipaddress','$original_referral_by')";	
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

}

function deleteUser()
{

	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
	$userId = (int)$_GET['userId'];
} else {
	header('Location: index.php');
}
	
	$sql	= "DELETE FROM tbl_users WHERE id = $userId";
	$result = dbQuery($sql);

	$sql	= "DELETE FROM tbl_address WHERE user_id = $userId";
	$result = dbQuery($sql);

	$sql	= "DELETE FROM tbl_accounts WHERE user_id = $userId";
	$result = dbQuery($sql);

	$sql	= "DELETE FROM tbl_transaction WHERE user_id = $userId";
	$result = dbQuery($sql);


	
	header('Location: index.php?view=users&msg=' . urlencode('Donation has been deleted successfully'));

	exit();
	
}
?>