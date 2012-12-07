<?php
	//Start session
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	include('../settings/config.php');
	//Function to sanitize values received from the form. Prevents SQL injection
	
	//Sanitize the POST values
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//Input Validations
	/*if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}*/
	
	//Create query
	$qry="SELECT * FROM registered_members WHERE username = '$username' AND password = '$password'";
	$result=mysql_query($qry);
	echo $qry;
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_NAME'] = $member['name'];
			$_SESSION['SESS_USERNAME'] = $member['username'];
			$_SESSION['SESS_EMAIL'] = $member['email'];
			session_write_close();
			header("location: ../home/index.php");
			exit();
		}else {
			
			header("location: logfail.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>