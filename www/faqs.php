<?php 
    session_start();

if ((!isset($_SESSION['email'])) || (empty($_SESSION['email']))){
	include("header_home.php");

}

else
    if($_SESSION['role'] == "learner"){
        include("header_user.php");
    }

    else{
        include("header.php");
    }
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Instructor Dashboard</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel = "icon" href = "images/logo1.png" type = "image/png">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <script src="https://kit.fontawesome.com/90913221dc.js" crossorigin="anonymous"></script>
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->
<body class="main-layout home_page" style="background-color:rgb(0,0,0)">

 
    
    <div id='be_teacher' style="width: 100%;">
        <h1>FAQs :</h1>
        <div id='add'>
            
    
<?php echo faqs(); ?>
<br>
<br>
<br>
<br>
<br>

<br clear="all" />


</div>
</div>

     <?php
      include("footer.php");
      ?>
      </div>
</body>
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>


</html>


