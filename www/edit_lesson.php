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

  include "db.php";
  $name = null;
  $video = null;
  $lesson_id = $_GET['edit_l'];
  
  
      $get_course=$conn->prepare("select * from lessons as l, courses as c where lesson_id = '$lesson_id' and l.course_id = c.course_id");
      $get_course->setFetchMode(PDO:: FETCH_ASSOC);
      $get_course->execute();
  while ($row = $get_course->fetch()){
      $name = $row['lesson_name'];
     
      $video = $row['vid_location'];
    
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
    <title>Edit Lesson</title>
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
               <h2> Lessons Management</h2>
               <ul>
                   <li><a href="dash_lesson.php"><i class="fas fa-table"></i> Dashboard </a></li>
            </div>

            <div id="details_bodyright">
        <span><a href="home_connected.php"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home  > </a></span>
        <span><a href="dash_lesson.php">Dashboard ></a></span>
        <span>Edit lesson</span> <br><br><br>
        <h1>Lesson Name :</h1><br>
        <div id="e_form">
        <form method="POST" action = "#" enctype="multipart/form-data">
        <input type="text" name="lesson_name" value="<?php echo $name;?>"  style="margin-left:5%" />
        <br></div>
       <br><br>
        <h1> lesson content :</h1> <br><br>
        <div>
                                       <input type='file' name='file' style="margin-left: 7%;"> </input><br><br>  
                                       <video src=" <?php echo $video;?>" controls width='500px' name = 'vid_location' style="margin-left: 7%;"></video>
                                       </div>
  
        <br><br> <br><br> 
   <button name="edit_lesson" style="margin-left:40%">
          <h5 style="color:white;">Update Now</h5>
        </button></center>
        </div>
        </div>
        </div>
        </form>
        
        <?php edit_lesson(); }?>
        <?php
      include("footer.php");
      ?>
      </div>
    
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   
</body>

</html>