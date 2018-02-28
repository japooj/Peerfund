<?php
/*
	Check if a session user id exist or not. If not set redirect
	to login page. If the user session id exist and there's found
	$_GET['logout'] in the query string logout the user
*/
function checkAdmin()
{
	// if the session id is not set, redirect to login page
	if (!isset($_SESSION['hlbank_admin_user'])) {
		header('Location: ' . WEB_ROOT . 'login.php');
		exit;
	}
	
	// the user want to logout
	if (isset($_GET['logout'])) {
		doLogout();
	}
}
function getTestimonials(){
		$sql = sprintf('select ts.id as t_id,ts.message,ts.date, ts.approval, usr.* from testimonials as ts left join tbl_users as usr on ts.user_id=usr.id');
		$result = dbQuery($sql);
		// fetch all into array
		$pending_arr =[];

		while($row = dbFetchAssoc($result)){
			$pending_arr[] = $row;
		}


		// TODO: //replace with code to send email to notify admin to attend to new testimonial submission here

		return $pending_arr;
	}

	function count_testimonials($approval){
		switch ($approval) {
			case 'pending':
				$status = 'false';
				break;

			default:
				$status= 'true';
				break;
		};
		// print $status;
	 $sql = sprintf('select count(*) as count from testimonials where approval=%s',$status);
		$result = dbFetchAssoc(dbQuery($sql));
		return $result['count'];
	}

	function approve_testimonial($testimonial_id){
		print $sql = sprintf('update testimonials set approval=true where id = %s', $testimonial_id);
		if(dbQuery($sql))
			header('Location: ?view=approved_testimonials'); //return to admin view for testimonials;
	}

	function decline_testimonial($testimonial_id){
		print $sql = sprintf('delete from testimonials where id = %s', $testimonial_id);
		if(dbQuery($sql)){
			header('Location: ?view=pending_testimonials'); //return to admin view for testimonials;
		}
	}


/*
	
*/
function doLogin()
{
	// if we found an error save the error message in this variable
	$errorMessage = '';
	
	$userName = $_POST['username'];
	$password = $_POST['password'];
	
	// first, make sure the username & password are not empty
	if ($userName == '') {
		$errorMessage = 'You must enter your username';
	} else if ($password == '') {
		$errorMessage = 'You must enter the password';
	} else {
		// check the database and see if the username and password combo do match
		$sql = "SELECT * FROM admin 
				WHERE username = '$userName' AND password = '$password'";
		$result = dbQuery($sql);
	
		if (dbNumRows($result) == 1) {
		    $row = dbFetchAssoc($result);
			$_SESSION['hlbank_admin_user'] = $row['username'];
			header('Location: index.php');
			exit;
		} else {
			$errorMessage = 'Wrong username or password';
		}		
			
	}
	
	return $errorMessage;
}

/*
	Logout a user
*/
function doLogout()
{
	if (isset($_SESSION['hlbank_admin_user'])) {
		unset($_SESSION['hlbank_admin_user']);
	//	session_unregister('auction_user_id');
	}
		
	header('Location: login.php');
	exit;
}


?>