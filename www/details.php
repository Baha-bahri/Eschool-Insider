<?php
  session_start();
  if ((!isset($_SESSION['email'])) || (empty($_SESSION['email']))){
    header('Location: 404.php');
  }
  
  else{
    if($_SESSION['role'] == "learner"){
      header('Location: 404.php');
    }
  
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
    <title>Edit Course</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel = "icon" href = "images/logo1.png" type = "image/png">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
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

   <?php include("header.php"); 

   ?>
          
           <div id="details_bodyleft">
               <h2> Course Management</h2>
               <ul>
               <li><a href="add_course.php"><i class="fas fa-edit"></i> Title And Image </a></li>
                   <li><a href="details.php"><i class="fas fa-info-circle"></i> Course Details </a></li>
                   <li><a href="content.php"><i class="fas fa-play"></i> Course Content </a></li>
            </div>

            <div id="details_bodyright">
        <span><a href="home_coonected.php"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home  > </a></span>
        <span><a href="home_connected.php">Dashboard ></a></span>
        <span>Edit Course</span>
        <h1> Course Details</h1> 
        <textarea type="text" name="details" placeholder="Type Here All The Course Details"></textarea>
        
  

   <div id="edit_bodyright1 button"><center>
            <button name="Save" style="margin-left:70%" ><h5 style="color:white"> Save</h5></button> </center>
        </div>
        </div>

        <?php
      include("footer.php");
      ?>
      </div>

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   
</body>

</html>