<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

    include "db_conn.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      echo"<script>alert('Old password is required')</script>";
	  exit();
    }else if(empty($np)){
		echo"<script>alert('New password is required')</script>";
	  exit();
    }else if($np !== $c_np){
		echo"<script>alert('The confirm password does not matched')</script>";
	  exit();
    }else {
    	// hashing the password
    	$op = md5($op);
    	$np = md5($np);
        $id = $_SESSION['id'];

        $sql = "SELECT password
                FROM users WHERE 
                id='$id' AND password='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE users
        	          SET password='$np'
        	          WHERE id='$id'";
        	mysqli_query($conn, $sql_2);
			echo"<script>('Your password has been changed successfuly')</script>";
	        exit();

        }else {
			echo"<script>('Incorrect password')</script>";
	        exit();
        }

    }

    
}else{
	header("Location: profile.php");
	exit();
}

}else{
     header("Location: authentification/signin.php");
     exit();
}