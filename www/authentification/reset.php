<?php
$conn=mysqli_connect('localhost','root','','eschool-insider');
if(isset($GET['password'])){
$password=mysqli_real_escape_string($conn,$_GET['password']);
$query= "SELECT * FROM password_reset WHERE password='$password'";
$run=mysqli_query($conn,$query);
if(mysqli_num_rows($run)==1){
	$row=mysqli_fetch_array($run);
	$email=$row['email'];
$password=$row['password'];

    }else{
header("location: signin.php");
    }

    }


if (isset($_POST['submit'])){
$newpassword=mysqli_real_escape_string($conn,$_POST['newpassword']);
$confirmpassword=mysqli_real_escape_string($conn,$_POST['confirmpassword']);
$option=['cost'=>11];
$hashed=password_hash($newpassword,PASSWORD_BCRYPT,$option);
if($newpassword!=$confirmpassword){
    echo"<script>alert('Password didn't matched')</script>";
}else if(strlen($password)<6){
    echo"<script>alert('Password must be 6 characters long)</script>";
}else{
    $query="UPDATE users SET password='$hashed' WHERE email='$email'";
    mysqli_query($conn,$query);
    $query="DELETE FROM password_reset WHERE email='$email'";
    mysqli_query($conn,$query);
    echo"<script>alert('Password Updated successfully)</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util_up.css">
	<link rel="stylesheet" type="text/css" href="../css/main_in.css">
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
<!--===============================================================================================-->
</head>

<body >

	<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/bg-012.jpg')";>
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
					
					</span>
					<span class="login100-form-title p-b-48">
						<img src="../images/logo1.png">
					</span>
     	<label><strong><em>Email</em></strong></label>
     	<br>
     	<input class="input100" type="text" readonly name="" value="<?php echo $email ?>"><br>

     	<label><strong><em>Password</em></strong></label>
     	<br>
     	<input class="input100" type="password" name="newpassword" placeholder="Password"><br>
         <label><strong><em> Confirm Password</em></strong></label>
     	<br>
     	<input class="input100" type="password" name="confirmpassword" placeholder="Password"><br>
     	<div class="container-login100-form-btn">
			<div class="wrap-login100-form-btn">
				<div class="login100-form-bgbtn"></div>
				<button  class="login100-form-btn" name="submit" > Reset Password</button>
			</div>
		 </div>
	 </form>
</body>
</html>