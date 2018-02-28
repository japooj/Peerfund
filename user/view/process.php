<?php
require_once '../library/config.php';
require_once '../library/functions.php';
require_once '../library/mail.php';

$_SESSION['hlbank_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'approveuser':
		approveUser();
	break;

	case 'request_withdraw':
		requestWithdraw();
	break;

	case 'declineuser':
		declineUser();
	break;

	case 'dreams':
		createDream();
	break;

	case 'recommitment':
		recommitPH();
	break;

	case 'cashout':
		cashoutPH();
	break;

	case 'comments':
		commentsBox();
	break;

	case 'perinfo':
		perInfo();
	break;

	case 'changepwd' :
		changePwd();
	break;
		
	case 'updateacct' :
		updateAccount();
	break;  

    case 'support' :
		sendSupport();
	break; 

	 case 'donate' :
		doNate();
	break; 
	
    case 'deletemature' :
		deletemature();
	break;

	case 'deletepen' :
		deletepen();
	break;
	
	case 'convertor' :
		btcCon();
	break;

	default :

	break;
}



function cashoutPH()
{
	$userID = $_SESSION['hlbank_user']['user_id'];
    $sql= "INSERT INTO upgrade_requests (user_id,parent_id,approval,updated_at) VALUES ('$userID','1','0','NOW()')";
	$result = dbQuery($sql);
    exit();	
}

function requestWithdraw()
{
$userID = $_SESSION['hlbank_user']['id'];
$date = date("Y-m-d h:i:s");

$stmt="INSERT IGNORE INTO withdraw_requests (user_id,approval,updated_at) VALUES ('$userID','0','$date');";
$result = dbQuery($stmt); 
if ($result) {
$sql="UPDATE tbl_transaction SET period ='5', status='processing' WHERE user_id='$userID' AND status='recommit' AND period ='4' ORDER BY user_id ASC";
$result = dbQuery($sql);
}
}
function approveUser()
{
if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
	$userId = (int)$_GET['userId'];
} else {
	header('Location: index.php');
}

        $date = date("Y-m-d h:i:s");
        $date = strtotime($date);
        $date = strtotime("+7 day", $date);
        $date = date('M d, Y', $date);

	$sql = "UPDATE tbl_transaction SET status='confirmed', period=2, mature_on='$date' WHERE id='$userId' AND status='pending' AND period=0";
	$result = dbQuery($sql);

	$sql = "UPDATE tbl_transaction SET status='paid', period=6 WHERE id='$userId' AND status='pending' AND period=0";
	$result = dbQuery($sql);

	$sql = "UPDATE upgrade_requests SET approval='approved' WHERE parent_id='$userId' AND approval='pending'";
	$result = dbQuery($sql);
	header('Location: index.php?v=dashboard&message=' . urlencode('You have a confirmed '));

exit();	
}

function declineUser()
{

   // $userID = $_SESSION['hlbank_user']['user_id'];
    	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
	$userId = (int)$_GET['userId'];
} else {
	header('Location: index.php');
}echo "string";

	$sql = "DELETE FROM upgrade_requests WHERE approval='pending' AND user_id='$userId'";
	$result = dbQuery($sql);
print 1;
exit();	
}


function recommitPH()
{
	$id= $_POST['id'];
	$refId = 'PH'.time() . rand(5*0.3, 2.3*8);
	$date = date("Y-m-d h:i:s");
    $dreamname 	= $_POST['dreamName'];
    $dreamimnt 	= $_POST['dreamAmnt'];

    $final = $dreamimnt * 2;

	$sql = "SELECT * FROM tbl_transaction WHERE user_id='$id' AND tx_type='RC' AND status='pending'";
	$result = dbQuery($sql);
	if (dbNumRows($result) >= 1) {
	header('Location: index.php?v=dashboard&errmessage=' . urlencode('Sorry! You have a pending Recommitment'));
	exit();
	}

	$sql = "SELECT * FROM tbl_transaction WHERE user_id='$id' AND tx_type='RC' AND status='confirmed'";
	$result = dbQuery($sql);
	if (dbNumRows($result) != 0) {
	header('Location: index.php?v=dashboard&errmessage=' . urlencode('Sorry! You have a confirmed Recommitment to grow'));
	exit();
	}

	$sql = "SELECT * FROM tbl_transaction WHERE user_id='$id'";
	$result = dbQuery($sql);
	$row = dbFetchAssoc($result);
	$iniamt = $row['dream_amount'];

	if ($dreamimnt < $iniamt) {
		header('Location: index.php?v=dashboard&errmessage=' . urlencode('Sorry! You cannot Recommit less than your PH'));
		exit();
	}

	    $sql= "INSERT INTO tbl_transaction (user_id,tx_no,tx_type,donation_amount,dream_amount,period,date,status) 
	           VALUES ('$id','$refId','RC','$final','$dreamimnt','1','$date','pending')";
	    $result = dbQuery($sql);

	    $sql = "SELECT date FROM tbl_transaction WHERE user_id='$id' AND tx_type='RC' AND status='pending'";
	    $result = dbQuery($sql);
	    $row = dbFetchAssoc($result);
	    $matureDate = $row['date'];

        $date = $matureDate;
        $date = strtotime($date);
        $date = strtotime("+7 day", $date);
        $date = date('M d, Y', $date);

        $sql = "UPDATE tbl_transaction SET mature_on='$date' WHERE user_id='$id' AND status='pending'";
	    $result = dbQuery($sql);

		$sql = "SELECT * FROM tbl_transaction WHERE user_id='$id' AND tx_type='PH' AND status='recommit'";
		$result = dbQuery($sql);
		if (dbNumRows($result) >= 1) {
        $stmt="UPDATE tbl_transaction SET status = 'recommit', period = '4' WHERE user_id='$id' AND status='recommit' AND period =3";
        $result = dbQuery($stmt);

	      }

	    header('Location: index.php?v=dashboard&message='.urlencode('Your Recommitment has succesfully been added'));
	   
	exit();
}


function createDream()
{
	$id= $_POST['id'];
	$refId = 'PH'.time() . rand(5*0.3, 2.3*8);
	$date = date("Y-m-d h:i:s");
    $dreamname 	= $_POST['dreamName'];
    $dreamimnt 	= $_POST['dreamAmnt'];

    $final = $dreamimnt * 2;


    $sql = "SELECT * FROM tbl_transaction WHERE user_id='$id' AND status='pending' AND period=1";
	$result = dbQuery($sql);
	if (dbNumRows($result) >= 1) {
	header('Location: index.php?v=dashboard&errmessage=' . urlencode('Sorry! You have a pending PH'));
	exit();
	}

	$sql = "SELECT * FROM tbl_transaction WHERE user_id='$id' AND status='confirmed' AND period=2";
	$result = dbQuery($sql);
	if (dbNumRows($result) >= 1) {
	header('Location: index.php?v=dashboard&errmessage=' . urlencode('Sorry! You already already have PH confirmed'));
	exit();
	}

    $sql = "SELECT * FROM tbl_transaction WHERE user_id='$id'";
	$result = dbQuery($sql);
	$row = dbFetchAssoc($result);
	if (dbNumRows($result) >= 1) {
	
	$iniamt = $row['dream_amount'];
	if ($iniamt >= $dreamimnt) {
	
	header('Location: index.php?v=dashboard&errmessage=' . urlencode('Sorry! You cannot PH amount less than your initial PH'));
	exit();
	  }
	}

	
	$sql = "SELECT * FROM tbl_transaction WHERE user_id='$id' AND status='matured'";
	$result = dbQuery($sql);
	if (dbNumRows($result) >= 1) {
	header('Location: index.php?v=dashboard&errmessage=' . urlencode('Sorry! You are not allowed to PH at this time'));
	exit();
	}


	  $sql = "SELECT username, phone , original_referral_by FROM tbl_users WHERE id='$id'";
	  $result = dbQuery($sql);
	  $row = dbFetchAssoc($result);
	  $refBy = $row['original_referral_by'];
	  $refUsr = $row['username'];
	  $refPh = $row['phone'];
	  if (isset($refBy)) {

	  $sql = "SELECT id,username,referral_code FROM tbl_users WHERE referral_code='$refBy'";
	  $result = dbQuery($sql);
	  $row = dbFetchAssoc($result);
	  

	  	$refBy3 = $row['referral_code'];
	  	
	    $refBy2 = $row['username'];
	  	
	  	$refID = $row['id'];
	  
	  	$bonus = $dreamimnt * 0.05;

	  	$sql= "INSERT INTO tbl_referrals VALUES ('NULL','$refID','$id','$refUsr','$refPh','$bonus','$date','Pending')";
	    $result = dbQuery($sql);

	    $sql= "INSERT INTO tbl_transaction (user_id,tx_no,tx_type,donation_amount,dream_amount,period,date,status) 
	           VALUES ('$id','$refId','PH','$final','$dreamimnt','1','$date','pending')";
	    $result = dbQuery($sql);

	    $sql = "SELECT date FROM tbl_transaction WHERE user_id='$id' AND status='pending'";
	    $result = dbQuery($sql);
	    $row = dbFetchAssoc($result);
	    $matureDate = $row['date'];

        $date = $matureDate;
        $date = strtotime($date);
        $date = strtotime("+7 day", $date);
        $date = date('M d, Y', $date);

        $sql = "UPDATE tbl_transaction SET mature_on='$date' WHERE user_id='$id' AND status='pending'";
	    $result = dbQuery($sql);

	    header('Location: index.php?v=dashboard&message='.urlencode('Your PH has succesfully been added'));
	   }
	exit();
}


function deletepen()
{
  if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
		$userId = (int)$_GET['userId'];
	} else {
		header('Location: index.php');
	}
		
	$sql = "DELETE FROM tbl_transaction WHERE id = $userId";
	dbQuery($sql);
	
	header('Location: index.php?v=dashboard&msg=' . urlencode('PH has succesfully been deleted'));
	exit();
}

function changePwd()
{
    $pwd 	= $_POST['cpass'];
	$id		= $_POST['id'];
	
	$sql	= "UPDATE tbl_users SET pwd = PASSWORD('$pwd') WHERE id = $id";
	$result = dbQuery($sql);
	
	header('Location: index.php?v=view_profile&msg=' . urlencode('Password has succesfully been updated'));
	exit();	
}




function perInfo()
{
    $ph = $_POST['phone'];
    $country = $_POST['country'];
	$id	= $_POST['id'];
	
	$sql	= "UPDATE tbl_users SET phone = '$ph' WHERE id = $id";
	$result = dbQuery($sql);

	$sql	= "UPDATE tbl_address SET country = '$country' WHERE id = $id";
	$result = dbQuery($sql);

	
	header('Location: index.php?v=dashboard&message=' . urlencode('You have succesfully updated your Information'));
	exit();	
}


function updateAccount()
{
    $acctNumber 	= $_POST['acctnumber'];
    $branchCode 	= $_POST['acctname'];
    $pymntMethode	= $_POST['default_is'];
	$id		= $_POST['id'];
	
	$sql	= "UPDATE tbl_accounts SET acct_type='$pymntMethode', acct_name='$branchCode ', acct_number='$acctNumber' WHERE id = $id";
	$result = dbQuery($sql);

	
	header('Location: index.php?v=view_profile&msg=' . urlencode('Account Information has succesfully been updated'));
	exit();	
}



function doNate()
{
    $amount = $_POST['amt'];
	$id		= $_POST['id'];
	$minAmount = 100;
	//next transaction number
	$tx_no = next_tx_no();

	if ($amount > $minAmount) {
		$desc = sprintf("Donation of $%u Reference# %s", $amount, $tx_no);
		$sql = "INSERT INTO tbl_transaction (id, user_id,tx_no, tx_type,amount, date, description,status) 
				VALUES ('NULL', '$id','$tx_no','30', $amount, NOW(), '$desc','Pendiing Confirmation')";
		dbQuery($sql);
	echo "<script>
			alert('Donation was successful!. Waiting for Confirmation');
			window.location.href='../index.php';
	</script>";
	//header("Location: ../index.php");
	exit();
	}else {
		 echo "<script>
			alert('Sorry! Minimum donation is 100GHC');
			window.location.href='index.php?v=make_donation';
	</script>";
		//header("Location: index.php?v=make_donation");
	}
	return $errorMessage;
}

?>