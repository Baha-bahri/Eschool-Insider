<?php
session_start();
if ((isset($_SESSION['email'])) || (!empty($_SESSION['email']))){
	header('Location: 404.php');
}

?>
<!DOCTYPE html>
<html>

<head>
<script src="https://kit.fontawesome.com/90913221dc.js" crossorigin="anonymous"></script>
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/datepicker/daterangepicker1.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main_in.css">
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
    <title>SIGN UP</title>
</head>

<body>
    <center>
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins" style="background-image: url('../images/bg-012.jpg')" ;>
            <form action="signup-check.php" method="post">
               <h1>SIGN UP</h1>
               <br><br>
                <?php if (isset($_GET['error'])) { ?>
                <p class="error">
                    <?php echo $_GET['error']; ?>
                </p>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                <p class="success">
                    <?php echo $_GET['success']; ?>
                </p>
                <?php } ?>

                <label style="color:black"><i style="padding-right: 10%" class="fas fa-user"></i><strong style="padding-right: 7%;"><em>Full Name</em></strong></label>
                <?php if (isset($_GET['fullname'])) { ?>
                <input class="input100" type="text" name="fullname" placeholder=" full Name" value="<?php echo $_GET['fullname']; ?>"><br>
                <?php }else{ ?>
                <input class="input100" type="text" name="fullname" placeholder=" full Name"><br>
                <?php }?>

                <label  style="color:black"><i style="padding-right: 10%" class="fas fa-user"></i><strong style="padding-right: 6%;"><em>User Name</em></strong></label>
                <?php if (isset($_GET['username'])) { ?>
                <input class="input100" type="text" name="username" placeholder="User Name" value="<?php echo $_GET['username']; ?>"><br>
                <?php }else{ ?>
                <input class="input100" type="text" name="username" placeholder="User Name"><br>
                <?php }?>
                <label><i style="padding-right: 5%" class="far fa-envelope"></i><strong style="padding-right:3%;"><em>Email</em></strong></label>
                <?php if (isset($_GET['email'])) { ?>
                    <input class="input100" type="email" name="email" placeholder="email" value="<?php echo $_GET['email']; ?>"><br>
                <?php }else{ ?>
                <input class="input100" type="email" name="email" placeholder="email"><br>
                <?php }?>
                <label  style="color:rgb(0, 0, 0)"><i style="padding-right: 10%" class="fas fa-lock"></i><strong style="padding-right: 6%;"><em>Password</em></strong></label>
                <input class="input100" type="password" name="password" placeholder="Password"><br>

                <label  style="color:black"><i style="padding-right:10%" class="fas fa-unlock"></i><strong ><em>Re Password</em></strong></label>
                <input class="input100" type="password" name="re_password" placeholder="Re_Password"><br>
                <select name="role" id="role"  class="select-css">
                <option value="teacher" name="teacher">Teacher</option>
                <option value="learner" name="learner">Learner</option>
                </select>
                
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button  class="login100-form-btn" > Sign Up</button>
                    </div>
                 </div>
                  <a href="signin.php" class="ca">Already have an account?</a>
        </div>
        </form>
    </center>
</body>

</html>