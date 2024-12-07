<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['fullname']) && isset($_POST['password'])
    && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$fullname = validate($_POST['fullname']);
	$username = validate($_POST['username']);
	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
	$re_password = validate($_POST['re_password']);
	$role = $_POST['role'];



	$user_data = 'username='. $username. '&fullname='. $fullname. '&email='.$email;


	if (empty($username)) {
		header("Location: signup.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($password)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_password)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

else if(empty($email)){
	header("Location: signup.php?error=email is required&$user_data");
	exit();
}
	else if(empty($fullname)){
        header("Location: signup.php?error= full Name is required&$user_data");
	    exit();
	}
else if(strlen($password)<6){
	header("Location: signup.php?error=you have to enter at least 6 digit!&$user_data");
}

	else if($password !== $re_password){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $password = md5($password);

	    $sql = "SELECT * FROM users WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=This Email is taken try another&$user_data");
	        exit();
		}else {
			$sql2 = "";
			if($role == "teacher"){
				$sql2 = "INSERT INTO teacher(fullname,username,email, password) VALUES('$fullname','$username','$email', '$password')";
			}

			else{
				$sql2 = "INSERT INTO users(fullname,username,email, password) VALUES('$fullname','$username','$email', '$password')";
			}
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}