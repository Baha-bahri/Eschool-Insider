
<?php

require("db.php");
session_start();
if(isset($_SESSION['AdminLoginId']))
{
	header('Location: 404.php');
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util_up.css">
	<link rel="stylesheet" type="text/css" href="../css/main_in.css">
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
	<script src="https://kit.fontawesome.com/90913221dc.js" crossorigin="anonymous"></script>
<!--===============================================================================================-->
</head>

<body >

	<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/bg-012.jpg')";>
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						Admin Side
					</span>
					<span class="login100-form-title p-b-48">
						<img src="../images/logo1.png">
					</span>

     	
     	<label><i class="fas fa-user-tie"></i><strong style="padding-left: 3%"><em>Admin Name</em></strong></label>
     	<br>
     	<input class="input100" type="text" name="ad_name" placeholder="Admin Name"><br>

     	<label><i class="fas fa-unlock-alt"></i><strong style="padding-left: 3%;"><em>Password</em></strong></label>
     	<br>
     	<input class="input100" type="password" name="ad_pass" placeholder="Password"><br>

     	<div class="container-login100-form-btn">
			<div class="wrap-login100-form-btn">
				<div class="login100-form-bgbtn"></div>
				<button  class="login100-form-btn" type="submit" name="signin"> Login</button>
			</div>
		 </div>
		 <h3><p style="text-align: right"> <a class="txt2" href="forgot_pass.html">
			Forgot your password? </a></p> 
     </form>
<?php

if(isset($_POST['signin']))
{
	$ad_name=$_POST['ad_name'];
	$ad_pass=$_POST['ad_pass'];
	$check=$conn->prepare("select * from admin where ad_name='$ad_name' and ad_pass='$ad_pass'");
	$check->setFetchMode(PDO:: FETCH_ASSOC);
	$check->execute();
	$count=$check->rowCount();
	if($count==1)
{
	session_start();
$_SESSION['AdminLoginId']=$_POST['ad_name'];
header("location: index.php?dash");
}
else{
	echo "<script>alert('Incorrect Name or Password');</script>";
}
}

?>

</body>
</html>