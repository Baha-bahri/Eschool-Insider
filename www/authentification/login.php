<?php 
session_start(); 

include "db_conn.php";
if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	if (empty($email)) {
		header("Location: signin.php?error=email is required");
	    exit();
	}else if(empty($password)){
        header("Location: signin.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $password = md5($password);
        
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		$sql2 = "SELECT * FROM teacher WHERE email='$email' AND password='$password'";
		$l = "learner";
		$t = "teacher";

		if($_POST['role'] == "learner"){
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);
				if ($row['email'] == $email && $row['password'] == $password) {
					$_SESSION['email'] = $row['email'];
					$_SESSION['fullname'] = $row['fullname'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['role'] = $l;

					header("Location: ../home_connected.php");
				}

				else{
					header("Location: signin.php?error=Incorect email or password");				
				}
			}

			else{
				header("Location: signin.php?error=No account founded");
			}
		}

		else if($_POST['role'] == "teacher"){
			$result = mysqli_query($conn, $sql2);
			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);
				if ($row['email'] == $email && $row['password'] == $password) {
					$_SESSION['email'] = $row['email'];
					$_SESSION['fullname'] = $row['fullname'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['role'] = $t;

					header("Location: ../home_connected.php");
				}

				else{
					header("Location: signin.php?error=Incorect email or password");				
				}
			}

			else{
				header("Location: signin.php?error=No account founded");
			}
		}

		
}
}
