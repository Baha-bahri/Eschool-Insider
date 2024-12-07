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
  $category = null;
  $description = null;
  $image = null;
  $course_id = $_GET['edit_c'];
  $cat_id = null;
  
      $get_course=$conn->prepare("select * from courses as c, categories as cat where course_id = '$course_id' and cat.cat_id = c.cat_id");
      $get_course->setFetchMode(PDO:: FETCH_ASSOC);
      $get_course->execute();
  while ($row = $get_course->fetch()){
      $name = $row['course_name'];
      $category = $row['cat_name'];
      $image = $row['course_img'];
      $description = $row['course_desc'];
      $cat_id = $row['cat_id'];
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
    <title>Add Course</title>
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

<body class="main-layout home_page" style="background-color:rgb(0,0,0)" onload="category();">

   <?php include("header.php"); 

   ?>
          
           <div id="details_bodyleft">
               <h2> Course Management</h2>
               <ul>
                   <li><a href="teacher.php"><i class="fas fa-table"></i> Dashboard </a></li>
            </div>

            <div id="details_bodyright">
        <span><a href="home_connected.php"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home  > </a></span>
        <span><a href="teacher.php">Dashboard ></a></span>
        <span>Edit Course</span> <br><br><br>
        <h1> Course Title :</h1><br>
        <div id="e_form">
        <form method="POST" action = "#" enctype="multipart/form-data">
        <input type="text" name="course_name" value="<?php echo $name;?>"  style="margin-left:5%" />
        <br></div>
        <select name="cat_id" id="pet-select" style = "margin-left:37%" required>
            <option value="" disabled selected>--Please choose a category--</option>
            <?php echo det_menu(); ?>
        </select>
        <h1> Course Details :</h1> 
        <textarea type="text" name="course_desc"><?php echo $description;?></textarea>
        

  
        <br><br><br<br><br> 
        <h1>Add Image From Here :</h1><br>
        <img src = 'data:image/png;base64, <?php echo base64_encode($image);?>' style="width: 150px;height:120px"/>
            <input type="file" name="course_img" style="margin-left: 3.8%"> </input>
            <div id="edit_bodyright1 button"><center>
   <button name="edit_course">
          <h5 style="color:white">Update Now</h5>
        </button></center>
        </div>
        </div>
        </div>
        </form>
        
        <?php edit_course(); ?>
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
    <script> 
    function category(){
        var cat_id  = '<?php echo $cat_id;?>';
        document.getElementById(cat_id).selected = "true";
    }
  </script>
   
</body>

</html>