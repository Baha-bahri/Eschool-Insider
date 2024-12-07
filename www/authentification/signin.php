<?php
session_start();
if ((isset($_SESSION['email'])) || (!empty($_SESSION['email']))){
	header('Location: 404.php');
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
	<script src="https://kit.fontawesome.com/90913221dc.js" crossorigin="anonymous"></script>
<!--===============================================================================================-->
</head>

<body >

	<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/bg-012.jpg')";>
				<form class="login100-form validate-form" action="login.php" method="post">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<img src="../images/logo1.png">
					</span>

     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label><i style="padding-right: 5%" class="far fa-envelope"></i><strong><em>Email</em></strong></label>
     	<br>
     	<input class="input100" type="email" name="email" placeholder="Email"><br>

     	<label><i class="fas fa-lock"></i><strong style="padding-left: 3%"><em>Password</em></strong></label>
     	<br>
     	<input class="input100" type="password" name="password" placeholder="Password"><br>
		 <select name="role" id="role" class="select-css">
                <option value="teacher" name="teacher">Teacher</option>
                <option value="learner" name="learner">Learner</option>
                </select>

     	<div class="container-login100-form-btn">
			<div class="wrap-login100-form-btn">
				<div class="login100-form-bgbtn"></div>
				<button  class="login100-form-btn" > Login</button>
			</div>
		 </div>
		 <h3><p style="text-align: right"> <a class="txt2" href="forgot_pass.php">
			Forgot your password? </a></p> 
          	<br>
          <a href="signup.php" class="txt2">Create an account</a></h3>
	 </form>
</body>
</html>