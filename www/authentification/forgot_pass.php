<?php
$conn=mysqli_connect('localhost','root','','eschool-insider');
if(isset($_POST['submit'])){
$email=mysqli_real_escape_string($conn,$_POST['email']);
$query= "SELECT * FROM users WHERE email='$email'";
$run=mysqli_query($conn,$query);
if(mysqli_num_rows($run)==1){
	$row=mysqli_fetch_array($run);
	$db_email=$row['email'];
$db_id=$row['id'];
$password=uniqid(md5(time())); //this is a random token
$query="INSERT INTO password_reset(id,email,password) VALUES($db_id,'$email','$password')";
if(mysqli_query($conn,$query)){
	$to=$db_email;
	$subject="Password reset link";
	$message="Click <a href='reset.php?token=$password'></a> here to reset your password";
	$headers="MIME-Version:1.0" . "\r\n";
	$headers="Content-type:text/html;charset=UTF-8". "\r\n";
$headers='From: <demo@demo.com>' . "\r\n";
mail($to, $subject,$message,$headers);
	$msg= header("Location: password_message.php");
}
}else{
	echo "<script>alert('Incorrect Email');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
						Forgot Password
					</span>
					<span class="login100-form-title p-b-48">
						<img src="../images/logo1.png">
					</span>
     	<input class="input100" type="email" name="email" placeholder="Enter your Email"><br>

     	<div class="container-login100-form-btn">
			<div class="wrap-login100-form-btn">
				<div class="login100-form-bgbtn"></div>
				<button  class="login100-form-btn" name="submit" > Reset your password</button>
			</div>
		 </div>
	 </form>
</body>
</html>