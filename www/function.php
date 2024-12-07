<?php

function footer_link(){
include("db.php");
$get_link=$conn->prepare("select * from contact");
$get_link->setFetchMode(PDO:: FETCH_ASSOC);
$get_link->execute();
$row=$get_link->fetch();

echo"


<center><h2> Contact us </h2> <br>
                                  <div id='info'>
                                  <img src='icon/phone.png'><font color='white'> ".$row['phn']."  <br>
                                  <img src='icon/location.png'>".$row['add1']." <br>
                                  <center><img src='icon/mail.png'>".$row['email']." <br></center></font>
<br><center>
<ul>
<a href='https://www.facebook.com/".$row['fb']."' target='_blank'><img src='icon/facebook.png'></a>
<a href='https://www.twitter.com/".$row['tw']."' target='_blank'><img src='icon/Twitter.png'></a>
  <a href='https://www.linkedin.com/".$row['link']."' target='_blank'><img src='icon/linkedin.png'></a>
 <a href='https://www.instagram.com/".$row['insta']."' target='_blank'><img src='icon/instagram.png'></a> <br> <br> <br>

  </li> 
</ul>
</center>";

}

function footer_about(){
  include("db.php");
  $get_about=$conn->prepare("select * from about");
  $get_about->setFetchMode(PDO:: FETCH_ASSOC);
  $get_about->execute();
  $row=$get_about->fetch();
  echo"


  <li> 
  <center><h2> About us</h2> <br>
  <p style='color:'ffff'>".$row['about']." </p> <br></center>
  </li>";
  
}

function cat_menu(){
  include("db.php");
  $get_cat=$conn->prepare("select * from categories");
  $get_cat->setfetchMode(PDO:: FETCH_ASSOC);
  $get_cat->execute();
  while($row=$get_cat->fetch()):
    echo"<li><a href='category.php?cat=".$row['cat_name']."'>".$row['cat_icon']." &nbsp;  ".$row['cat_name']."</a></li>";
  endwhile;
}

function home_cat(){
  include("db.php");
  $get_cat=$conn->prepare("select * from categories");
  $get_cat->setfetchMode(PDO:: FETCH_ASSOC);
  $get_cat->execute();
  while($row=$get_cat->fetch()):
echo"<li>
<a href='category.php?cat=".$row['cat_name']."'> 
<center>
".$row['cat_icon']."
<h4>".$row['cat_name']."</h4>
</center>
</a>
</li>";
  endwhile ;
}


function course_details(){
  include("db.php");
  $id = $_GET['id'];
  $get_cat=$conn->prepare("select * from courses where course_id='$id'");
  $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
  $get_cat->execute();
  $type = null;
  $table = null;
  $table_favoris = null;
  $course_name = null;
  $course_desc = null;
  $img = null;
  $req = null;
  $fb = $tw = $go = $what = null;
  $button = null;
  $sql = null;
  
  if($_SESSION['role'] == 'teacher'){
    $table_favoris = "favor_teacher";
  }

  else{
    $table_favoris = "favor_learner";
  }
  $f = null;
  $sql=$conn->prepare("select * from $table_favoris where course_id='$id'");
  $sql->setFetchMode(PDO:: FETCH_ASSOC);
  $sql->execute();
  if($sql->rowCount() > 0){
    while($row=$sql->fetch()){
      $button = "<button class='btn btn-icon btn-linkedin' style=width:38% name = 'removeFav'><span>Remove from My Favorites</span></button>";
      $f = $row['id_favor'];
    }
  }

  else {
    $button = "<button class='btn btn-icon btn-linkedin' name = 'addFav' style='width:30%' ><span >Add to my favorite</span></button>";
  }

  if(isset($_POST['addFav'])){
    $con = $_SESSION['id'];
    $get_l=$conn->prepare("insert into $table_favoris(course_id, con_id) values ('$id', '$con')");
    $get_l->setFetchMode(PDO:: FETCH_ASSOC);
    if($get_l->execute()){
      echo"<script>alert('Course added successfully')</script>";
      echo"<script>window.open('course_details.php?id=".$id."&email=".$_GET["email"]."','_self')</script>";
    }
  else{ 
      echo"<script>alert('Course not updated')</script>";
      echo"<script>window.open('course_details.php?id=".$id."&email=".$_GET["email"]."','_self')</script>";
    }
  }

 else if(isset($_POST['removeFav'])){
    $con = $_SESSION['id'];
    $get_l=$conn->prepare("delete from $table_favoris where id_favor = '$f'");
    $get_l->setFetchMode(PDO:: FETCH_ASSOC);
    if($get_l->execute()){
      echo"<script>alert('Course Removed successfully')</script>";
      echo"<script>window.open('course_details.php?id=".$id."&email=".$_GET["email"]."','_self')</script>";
    }
  else{ 
      echo"<script>alert('Course not deleted')</script>";
      echo"<script>window.open('course_details.php?id=".$id."&email=".$_GET["email"]."','_self')</script>";
    }
  }


  while($row=$get_cat->fetch()){
    if($row['author_admin'] != null){
      $type = $row['author_admin'];
      $table = "admin";
      $course_name = $row['course_name'];
      $course_desc = $row['course_desc'];
      $course_id= $row['course_id'];
      $img = $row['course_img'];
      $req = $conn->prepare("select * from $table");
    }

    else{
      $type = $row['author_teacher'];
      $table = "teacher";
      $course_name = $row['course_name'];
      $course_desc = $row['course_desc'];
      $course_id= $row['course_id'];
      $img = $row['course_img'];
      $email = $_GET['email'];
      $req = $conn->prepare("select * from $table where email = '$email'");
    }
  }
  
    $get_cat = $req;
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    while($row=$get_cat->fetch()){
    if($table == "admin"){
      $fb = $tw = $go = $what = "#";
    }

    else{
      $fb = $row['fb'];
      $tw = $row['tw'];
      $go = $row['google'];
      $what = $row['whtsapp'];
    }

      echo"<div id='wrapper'> 
  <br />
  <div id='course_left'>
  <img style='width:90%' src = 'data:image/png;base64,".base64_encode($img)."'>

  </div> <h3>
  <div id=course_right> <center>
  <h2> ".$course_name." </h2> <br></center>
  <table>
  <tr> 
  <td>Instructor :</td>
  <td>".$type."</td>
  </tr>
  <tr> 
  <td> Contact :</td>
  <td>".$row['email']."</td>
  </tr>
  </table>
  <br> <br>
   <center>
  <form method = 'post'>
  <a class='btn btn-icon btn-linkedin' href='course_content.php?id=".$course_id."' style='width:20%' ><span >Unroll Now</span></a>
    $button

  
  </form></center>
<div id='social-platforms'>
<a class='btn btn-icon btn-facebook' href='https://".$fb."'><i class='fa fa-facebook'></i><span>Facebook</span></a>
<a class='btn btn-icon btn-twitter' href='https://".$tw."'><i class='fa fa-twitter'></i><span>Twitter</span></a>
<a class='btn btn-icon btn-googleplus' href='https://".$go."'><i class='fa fa-google-plus'></i><span>Google</span></a>
<a class='btn btn-icon btn-whatsup' href=https://".$what."'><i class='fa fa-whatsapp'></i><span>Whatsapp</span></a>
</div>
</div> <br >
<div id='c_desc'>
<h1 style='color:blue;font-size:200%'> Course Details :</h1><br>
<p style='font-size: 120%;'>".$course_desc."</p> <br> <br>
<center>

<p></center>
<div id='social-platforms'>
</div>
<h2 style='color:blue';> What You Will Learn : </h2>
<ul>";
$get_l=$conn->prepare("select * from lessons where course_id='".$_GET['id']."' ");
  $get_l->setFetchMode(PDO:: FETCH_ASSOC);
  $get_l->execute();
  $i=1;
  while ($row = $get_l->fetch()){
echo"<li><i class='fas fa-video'></i><span>".$i++.". &nbsp;".$row['lesson_name']."</span></li>";}
echo"</ul>
</div>
<br clear:all />
</div>
"
 ;

  }
    } 






function course_det_cont(){
  include("db.php");
  $get_l=$conn->prepare("select * from lessons where course_id='".$_GET['id']."' ");
  $get_l->setFetchMode(PDO:: FETCH_ASSOC);
  $get_l->execute();
  $i=1;
  while ($row = $get_l->fetch()){
  echo"
  <li><i class='fas fa-video'></i><span>".$row['lesson_name']."</span></li>
  </div>
    ";
}
}
  
    function cat_left(){
      include("db.php");
      $get_cat=$conn->prepare("select * from categories");
      $get_cat->setfetchMode(PDO:: FETCH_ASSOC);
      $get_cat->execute();
      while($row=$get_cat->fetch()):
        echo"
        <br><li><a style='color:#fff' href='category.php?cat=".$row['cat_name']."'>&nbsp; &nbsp;".$row['cat_icon']." &nbsp;  ".$row['cat_name']."</a></li>";
      endwhile;
  
    }


  function sub_cat_left(){
    include("db.php");
    include("db.php");

    $get_cat=$conn->prepare("select * from sub_categories");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $i=1;
    while($row=$get_cat->fetch()):
        $id=$row['cat_id'];
        $get_c=$conn->prepare("select * from categories where cat_id='$id'");
        $get_c->setFetchMode(PDO:: FETCH_ASSOC);
        $get_c->execute();
        $row_cat=$get_c->fetch();
      echo"
     <br><li><a style='color:#fff'  href='#'>&nbsp; &nbsp; ".$row_cat['cat_icon']." &nbsp; &nbsp;  ".$row['sub_cat_name']."</a></li>";
    endwhile;
  }


function update_profile(){
  $table = null;
  if($_SESSION['role'] == "learner"){
    $table = "users";
  }

  else{
    $table = "teacher";
  }
  include("db.php");
  $id = $_SESSION['id'];
  $get=$conn->prepare("select * from $table where id='$id'");
    $get->setFetchMode(PDO:: FETCH_ASSOC);
    $get->execute();
    $row=$get->fetch();
    echo"<form method='post'>
    <center> <h4> Update Your Full Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='fullname' value='".$row['fullname']."'/></center><br>
          <center> <h4> Update Your User Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='username' value='".$row['username']."'></center><br>
          <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button name='update' style='width: 150px'><h5 style='color:white;padding-right:30%'>UPDATE</h5></button></center>
</form>";
if(isset($_POST['update'])){
  $fullname=$_POST['fullname'];
  $username=$_POST['username'];
  $up=$conn->prepare("update $table set fullname='$fullname' , username='$username' where id='$id'");
  if($up->execute()){
    echo"<script>alert('Profile updated successfully')</script>";
    echo"<script>window.open('profile.php','_self')</script>";
}else{ 
    echo"<script>alert('Profile not updated')</script>";
    echo"<script>window.open('profile.php','_self')</script>";

}
}
 } 




function favorite_view(){
  include("db.php");
  $table = null;
  $id = $_SESSION['id'];
  $type = null;

  if($_SESSION['role'] == "learner"){
    $table = "favor_learner";
  }

  else{
    $table = "favor_teacher";
  }

  $get=$conn->prepare("select * from $table as t, courses as c where con_id='$id' and c.course_id = t.course_id");
  $get->setFetchMode(PDO:: FETCH_ASSOC);
  $get->execute();
  while($row=$get->fetch()){
    if($row['author_admin'] != null){
      $type = $row['author_admin'];
    }

    else{
      $type = $row['author_teacher'];
    }
    echo"
    <li>
    <a href='course_details.php?id=".$row['course_id']."&email=".$row['email_teacher']."'>
       <center> <img style = 'width:90%; height:70%;margin-bottom:20%' src = 'data:image/png;base64,".base64_encode($row['course_img'] )."'/></center>
       <center><h3 style='color:blue;'>Title :&nbsp;".$row['course_name']."</h3></center>
       <center> <h4 style='color:red;'>Created By :&nbsp;".$type."</h4></center>
        </a>
    </li>";
 
  }
}



function update_email(){
  include("db.php");
  $id = $_SESSION['id'];
  $table = null;
  if($_SESSION['role'] == "learner"){
    $table = "users";
  }

  else{
    $table = "teacher";
  }
  $get=$conn->prepare("select * from $table where id='$id'");
    $get->setFetchMode(PDO:: FETCH_ASSOC);
    $get->execute();
    $row=$get->fetch();
    echo"<form method='post'>
          <center><h4> Update Your Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='email' name='email' value='".$row['email']."'/></center><br>
          <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button name='update_mail' style='width: 150px'><h5 style='color:white;padding-right:30%'>UPDATE</h5></button></center>
</form>";
if(isset($_POST['update_mail'])){
  $email=$_POST['email'];
 $check=$conn->prepare("select * from $table where email='$email'");
 $check->setFetchMode(PDO:: FETCH_ASSOC);
 $check->execute();
 $count=$check->rowCount();
 if($count==1){
    echo"<script>alert(' Email already exist')</script>";
    echo"<script>window.open('profile.php','_self')</script>";

 }else{
  $up=$conn->prepare("update $table set email='$email' where id='$id'");
  if($up->execute()){
    echo"<script>alert('Email updated successfully')</script>";
    echo"<script>window.open('profile.php','_self')</script>";
}else{ 
    echo"<script>alert('Email not updated')</script>";
    echo"<script>window.open('profile','_self')</script>";

}
}
 } 



}






function update_pass(){
  include("db.php");
  $id = $_SESSION['id'];
  $table = null;
  if($_SESSION['role'] == "learner"){
    $table = "users";
  }

  else{
    $table = "teacher";
  }
  $get=$conn->prepare("select * from $table where id='$id'");
    $get->setFetchMode(PDO:: FETCH_ASSOC);
    $get->execute();
    $row=$get->fetch();
    echo"<form method='post'>
          <center><h4>The New Password : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='password' name='np' placeholder='Enter Your New Password here' /></h4></center><br>
          <center><h4> The Confirm Password : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='password' name='c_np' placeholder='Confirm Your New Password here'/></h4></center><br>
          <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name='change' style='width: 150px'><h5 style='color:white;padding-right:30%'>CHANGE</h5></button></center>
</form>";
if(isset($_POST['change'])){
  $newpass=$_POST['np'];
  $confirmpass=$_POST['c_np'];
  if($newpass!=$confirmpass){
    echo"<script>alert('The Confirm password does not matches')</script>";
    echo"<script>window.open('profile.php','_self')</script>";
}else{
  if(empty($newpass)){
    echo"<script>alert('The New password is required')</script>";
    echo"<script>window.open('profile.php','_self')</script>";
}else{
  if(empty($confirmpass)){
    echo"<script>alert('The Confirm is required')</script>";
    echo"<script>window.open('profile.php','_self')</script>";
}else{
  if(strlen($newpass)<6){
    echo"<script>alert('you have to enter at least 6 digit!')</script>";
    echo"<script>window.open('profile.php','_self')</script>";
}else{
  // hashing the password
  $newpass = md5($newpass);
    $id = $_SESSION['id'];
  $up=$conn->prepare("update $table set password='$newpass' where id='$id'");
  if($up->execute()){
    echo"<script>alert('Password updated successfully')</script>";
    echo"<script>window.open('profile.php','_self')</script>";
}else{ 
    echo"<script>alert('Password not updated')</script>";
    echo"<script>window.open('profile','_self')</script>";

}
}
}
}
}
}
}



function social(){
  if($_SESSION['role'] == "teacher"){

  include("db.php");
  $id=$_SESSION['id'];
  $get=$conn->prepare("select * from teacher where id='$id'");
    $get->setFetchMode(PDO:: FETCH_ASSOC);
    $get->execute();
    $row=$get->fetch();
    echo"  <center><h2 style='padding-right: 10%'>Social Media</h2> <br> <br>  </center>  
    <form method='post'>
    <center>  <i style='size:7x; color:blue'  class='fab fa-facebook fa-3x'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='fb' value='".$row['fb']."'/></center><br>
          <center> <i style='size:7x; color:rgb(95, 156, 212);' class='fab fa-twitter fa-3x'></i> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='tw' value='".$row['tw']."'></center><br>
          <center>  <i style='size:7x; color:red' class='fab fa-google fa-3x'></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='google' value='".$row['google']."'></center><br>
          <center><i style='size:7x; color:green' class='fab fa-whatsapp fa-3x'></i> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='whtsapp' value='".$row['whtsapp']."'></center><br>
          <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button name='update_c' style='width: 150px'><h5 style='color:white;padding-right:30%'>UPDATE</h5></button></center>
</form>";
if(isset($_POST['update_c'])){
  $fb=$_POST['fb'];
  $tw=$_POST['tw'];
  $google=$_POST['google'];
  $whtsapp=$_POST['whtsapp'];

  $up=$conn->prepare("update teacher set fb='$fb' , tw='$tw', google='$google', whtsapp='$whtsapp' where id='$id'");
  if($up->execute()){
    echo"<script>alert('Profile updated successfully')</script>";
    echo"<script>window.open('profile.php','_self')</script>";
}else{ 
    echo"<script>alert('Profile not updated')</script>";
    echo"<script>window.open('profile','_self')</script>";

}
}
 } 
}






function profile_left(){
  
    echo"
    <br><li><a style='color:#fff' href='profile.php'>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-user'></i> &nbsp;  My Account</a></li>
    <br><li><a style='color:#fff' href='favorite.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<i class='fas fa-star'></i> &nbsp;  My Favorites Courses</a></li>
";
}
function teacher_term(){
  include("db.php");
  $get_term=$conn->prepare("select * from terms where for_who='tutor'");
  $get_term->setFetchMode(PDO:: FETCH_ASSOC);
  $get_term->execute();
  $row=$get_term->fetch();
  while($row=$get_term->fetch()):
    echo"<li>".$row['term']."</a></li>";
endwhile;
}
function user_term(){
  include("db.php");
  $get_term=$conn->prepare("select * from terms where for_who='learner'");
  $get_term->setFetchMode(PDO:: FETCH_ASSOC);
  $get_term->execute();
  $row=$get_term->fetch();
  while($row=$get_term->fetch()):
    echo"<li>".$row['term']."</a></li>";
endwhile;
}
function det_menu(){
  include("db.php");
  $get_cat=$conn->prepare("select * from categories");
  $get_cat->setfetchMode(PDO:: FETCH_ASSOC);
  $get_cat->execute();
  while($row=$get_cat->fetch()):
    echo"<option value='".$row['cat_id']."' id='".$row['cat_id']."'>".$row['cat_name']."</option>";
  endwhile;
}
function det_sub_menu(){
  include("db.php");
  include("db.php");

  $get_cat=$conn->prepare("select * from sub_categories");
  $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
  $get_cat->execute();
  $i=1;
  while($row=$get_cat->fetch()):
      $id=$row['cat_id'];
      $get_c=$conn->prepare("select * from categories where cat_id='$id'");
      $get_c->setFetchMode(PDO:: FETCH_ASSOC);
      $get_c->execute();
    
echo"<option>".$row['sub_cat_name']."</option>";
  endwhile;
}


function contact_us(){
  include("db.php");
 
  if(isset($_POST['send'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $msg=$_POST['msg'];
  if(empty($email)){
    echo"<script>alert('Please Enter Your Email !')</script>";
  }else{
    if(empty($msg)){
      echo"<script>alert('Please Enter Your Message !')</script>";
    }
  else{
      $add=$conn->prepare("insert into contact_us(name,phone,email,msg) values('$name','$phone','$email','$msg')");
      if($add->execute()){
          echo"<script>alert('Thank you for contact us')</script>";
      }else{ 
          echo"<script>alert('Something went wrong')</script>";
 
      }
  }
   }
  }
}



function course_display(){
  include("db.php");
  include("db.php");
  $get_cat=$conn->prepare("select * from courses as c, categories as cat where cat.cat_id = c.cat_id limit 5");
  $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
  $get_cat->execute();
  $type = null;

  while($row=$get_cat->fetch()):
    if($row['author_admin'] != null){
      $type = $row['author_admin'];
    }

    else{
      $type = $row['author_teacher'];
    }
      
 echo"
        <li>
            <a href='course_details.php?id=".$row['course_id']."&email=".$row['email_teacher']."'>
           <center> <img style = 'width:80%; height:70%' src = 'data:image/png;base64,".base64_encode($row['course_img'] )."'/></center>
           <center><h3 style='color:blue;'>Title :&nbsp;".$row['course_name']."</h3></center>
           <center><h3 style='margin-top:5%;'>Category :&nbsp;".$row['cat_name']."</h3></center>
           <center> <h4 style='color:red;' >Created By :&nbsp;".$type."</h4></center>
            </a>
        </li>";
  endwhile;
}
function course_with_cat(){
  include("db.php");
  if(empty($_GET['cat'])){
    $get_cat=$conn->prepare("select * from courses");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();

    $type = null;

  while($row=$get_cat->fetch()):
    if($row['author_admin'] != null){
      $type = $row['author_admin'];
    }

    else{
      $type = $row['author_teacher'];
    }
    echo"
    <li>
    <a href='course_details.php?id=".$row['course_id']."&email=".$row['email_teacher']."'>
       <center> <img style = 'width:90%; height:70%;margin-bottom:20%' src = 'data:image/png;base64,".base64_encode($row['course_img'] )."'/></center>
       <center><h3 style='color:blue;'>Title :&nbsp;".$row['course_name']."</h3></center>
       <center> <h4 style='color:red;'>Created By :&nbsp;".$type."</h4></center>
        </a>
    </li>";
endwhile;
}

  else{
    $cat = $_GET['cat'];
    $get_cat=$conn->prepare("select * from courses AS c, categories AS categ where cat_name = '$cat' AND categ.cat_id = c.cat_id");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $type = null;

    while($row=$get_cat->fetch()):
      if($row['author_admin'] != null){
        $type = $row['author_admin'];
      }
  
      else{
        $type = $row['author_teacher'];
      }
      echo"
      <li>
          <a href='course_details.php?id=".$row['course_id']."&email=".$row['email_teacher']."'>
         <center> <img style = 'width:90%; height:70%;margin-bottom:20%' src = 'data:image/png;base64,".base64_encode($row['course_img'] )."'/></center>
         <center><h3 style='color:blue;'>Title :&nbsp;".$row['course_name']."</h3></center>
         <center> <h4 style='color:red;' >Created By :&nbsp;".$type."</h4></center>
          </a>
      </li>";
  endwhile;
  }
  }

 

 



 
   
  
      
   

 

  function teacher_add_course(){
    include("db.php");
    if(isset($_POST['add_course'])){
      $course_name=$_POST['course_name_teacher'];
      $cat_id=$_POST['cat_id'];
      $course_desc = $_POST['course_desc_teacher'];
      $email = $_SESSION['email'];
      $fullname = "";
      $image = addslashes(file_get_contents($_FILES['course_img']['tmp_name']));
      $check=$conn->prepare("select fullname  from teacher where email= '$email'");
      $check->setFetchMode(PDO:: FETCH_ASSOC);
      $check->execute();
      while($row=$check->fetch()):
      $fullname = $row['fullname'];
      endwhile;

     if(empty($course_name)){
        echo"<script>alert('The Tilte is required !!')</script>";
        echo"<script>window.open('add_course.php','_self')</script>";
     }else{
        $add_user=$conn->prepare("insert into courses(course_name, course_desc, course_img, cat_id, author_teacher, email_teacher) values('$course_name', '$course_desc', '$image', '$cat_id', '$fullname', '$email')");
        if($add_user->execute()){
            echo"<script>alert('Course added successfully')</script>";
            echo"<script>window.open('add_course.php','_self')</script>";
        }else{ 
            echo"<script>alert('Course not added')</script>";
            echo"<script>window.open('add_course.php','_self')</script>";
        }
     } 
    }
  }
    

  

    function select_course(){
      include("db.php");
      $email = $_SESSION['email'];
      $get_course=$conn->prepare("select * from courses as c, teacher as t where t.email = '$email' and t.fullname = c.author_teacher");
      $get_course->setFetchMode(PDO:: FETCH_ASSOC);
      $get_course->execute();
      while($row=$get_course->fetch()):
          echo"<option value='".$row['course_id']."'>".$row['course_name']."</option>";
      endwhile;
  }




  function add_lesson_teacher(){
    include("db.php");
    if(isset($_POST['add_lesson'])){
        $course_id=$_POST['course_id'];
     $lesson_name=$_POST['lesson_name_teacher'];
     
     $name=$_FILES['file']['name'];
     $target_dir="storevideo/";
     $target_file=$target_dir.$name;
     $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     $extension_arr=array("mp4","avi","3gp","mov","mpeg");
    
     if(in_array($extension,$extension_arr)){
         if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
        $add_lesson=$conn->prepare("insert into lessons(lesson_name,lesson_link,vid_location,course_id) values('$lesson_name','$name','$target_file','$course_id')");
        if($add_lesson->execute()){
            echo"<script>alert('Lesson added successfully')</script>";
            echo"<script>window.open('content.php','_self')</script>";
        }else{ 
            echo"<script>alert('Lesson not added')</script>";
            echo"<script>window.open('content.php','_self')</script>";
   
        }
    }
     } 
    }
}




function course_teacher_view(){
  include("db.php");
  $email = $_SESSION['email'];
      $get_course=$conn->prepare("select * from courses as c, teacher as t, categories as cat where t.email = '$email' and t.fullname = c.author_teacher and cat.cat_id = c.cat_id");
      $get_course->setFetchMode(PDO:: FETCH_ASSOC);
      $get_course->execute();
  while ($row = $get_course->fetch()){
  echo"
  <tr>
        <td> <img style='width:150px' src = 'data:image/png;base64,".base64_encode($row['course_img'] )."'1'></td>
        <td> ".$row['course_name']."</td>
        <td>".$row['cat_name']."</td>
        <td><span style='color: Blue;'>    <i class='far fa-edit'> </i> <a href='edit_course.php?edit_c=".$row['course_id']."'>Edit&nbsp;&nbsp;&nbsp;&nbsp;  </a> </span>
         <span style='color: Red'> <i class='fas fa-trash' style=color:rgb></i> <a href='teacher.php?del_c=".$row['course_id']."' >  Delete  </a> </span></td>
      </tr>
  ";

}
if(isset($_GET['del_c'])){
  $id=$_GET['del_c'];
   $del_course=$conn->prepare("delete from courses where course_id='$id'");
   if ($del_course->execute()){
       echo"<script>alert('Course deleted')</script>";
       echo"<script>window.open('teacher.php','_self')</script>";
   } else {
       echo"<script>alert('Course not deleted')</script>";
       echo"<script>window.open('teacher.php','_self')</script>";
   
}
}
}

function edit_course(){
  include 'db.php';
  $course_name = null;
  $course_desc = null;
  $course_categ = null;
  $course_img = null;
  $course_id = $_GET['edit_c'];
  if(isset($_POST['edit_course'])){
             
    $course_name=$_POST['course_name'];
    $course_desc=$_POST['course_desc'];
    $course_categ=$_POST['cat_id'];
    $up = "";

    if(!empty($_FILES['course_img']['tmp_name'])){
        $course_img = addslashes(file_get_contents($_FILES['course_img']['tmp_name']));
        $up=$conn->prepare("update courses set course_name='$course_name',course_desc='$course_desc',course_img = '$course_img', cat_id = '$course_categ' where course_id='$course_id'");    
    }
   
   else{
    $up=$conn->prepare("update courses set course_name='$course_name',course_desc='$course_desc', cat_id = '$course_categ' where course_id='$course_id'");
   
   }
   
    if($up->execute()){
        echo"<script>alert('Course Updated successfully')</script>";
        echo"<script>window.open('teacher.php','_self')</script>";
        
    }else{ 
        echo"<script>alert('Course not Updated')</script>";
        echo"<script>window.open('teacher.php','_self')</script>";
    }

}
}



function lesson_teacher_view(){
  include("db.php");
  $email = $_SESSION['email'];
      $get_course=$conn->prepare("select * from courses as c, teacher as t, lessons as l where t.email = '$email' and t.fullname = c.author_teacher and l.course_id = c.course_id");
      $get_course->setFetchMode(PDO:: FETCH_ASSOC);
      $get_course->execute();
  while ($row = $get_course->fetch()){
  echo"
  <tr>
  <td> <img style='width:150px' src = 'data:image/png;base64,".base64_encode($row['course_img'] )."'1'></td>
  <td> ".$row['lesson_name']."</td>
  <td>".$row['course_name']."</td>
  <td><span style='color: Blue;'>    <i class='far fa-edit'> </i> <a href='edit_lesson.php?edit_l=".$row['lesson_id']."'>Edit&nbsp;&nbsp;&nbsp;&nbsp;  </a> </span>
   <span style='color: Red'> <i class='fas fa-trash' style=color:rgb></i> <a href='dash_lesson.php?del_l=".$row['lesson_id']."' >  Delete  </a> </span></td>
</tr>
  ";

}
if(isset($_GET['del_l'])){
  $id=$_GET['del_l'];
   $del_course=$conn->prepare("delete from lessons where lesson_id='$id'");
   if ($del_course->execute()){
       echo"<script>alert('Lesson deleted')</script>";
       echo"<script>window.open('dash_lesson.php','_self')</script>";
   } else {
       echo"<script>alert('Lesson not deleted')</script>";
       echo"<script>window.open('dash_lesson.php','_self')</script>";
   
}
}
}



function edit_lesson(){
  include 'db.php';
  $lesson_name = null;
  $target_file = null;
  $lesson_id = $_GET['edit_l'];
  if(isset($_POST['edit_lesson'])){
             
    $lesson_name=$_POST['lesson_name'];
    $name=$_FILES['file']['name'];
    $target_dir="storevideo/";
    $target_file=$target_dir.$name;
    $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extension_arr=array("mp4","avi","3gp","mov","mpeg");
   $add_lesson = null;

   if(in_array($extension,$extension_arr)){
       if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
           $add_lesson=$conn->prepare("update lessons set lesson_name='$lesson_name',lesson_link='$lesson_link',vid_location = '$target_file' where lesson_id='$lesson_id'");
       }
  }

  else{
   $add_lesson=$conn->prepare("update lessons set lesson_name='$lesson_name' where lesson_id='$lesson_id'");
  }

  
  if($add_lesson->execute()){
   echo"<script>alert('Lesson updated successfully')</script>";
   echo"<script>window.open('dash_lesson.php','_self')</script>";
}else{ 
   echo"<script>alert('lesson not updated')</script>";
   echo"<script>window.open('dash_lesson.php','_self')</script>";

}

   } 
  

}




function lecture(){
  include("db.php");
  $get_l=$conn->prepare("select * from lessons as l, courses as c where c.course_id='".$_GET['id']."' and c.course_id = l.course_id");
  $get_l->setFetchMode(PDO:: FETCH_ASSOC);
  $get_l->execute();
  $i=1;
  $video = null;
  $v1 = null;

  while ($row = $get_l->fetch()){
    $video = $row['vid_location'];
    if($row['author_teacher'] != null){
      $v1 = $video;
    }

    else {
      $v1 = substr($video, 3);
    }
    echo"
    <details style='width:86%'>
                                              <summary><i class='fas fa-file-video'></i>".$i++.".&nbsp;&nbsp;".$row['lesson_name']."</summary>
                                         <br>
                                          <video src=".$v1." controls width='800px'controls height='500px' style='margin-left: 16%;'></video>
                                      
                                  
                        </details>
    ";
  }

}

function faqs(){
  include("db.php");
  $get_term=$conn->prepare("select * from faqs");
  $get_term->setFetchMode(PDO:: FETCH_ASSOC);
  $get_term->execute();
  $row=$get_term->fetch();
  while($row=$get_term->fetch()):
    echo"<details style='width:86%'>
    <summary>".$row['qsn']."</summary><br>
<li style='margin-left:7%'>".$row['ans']."

</details>
   ";
endwhile;
}



function recherche(){
  include("db.php");
  if(!empty($_GET['search'])){
    $get_cat=$conn->prepare("select * from courses where course_name LIKE '%".$_GET['search']."%'");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $count = $get_cat->rowCount();

    $type = null;

    if($count > 0){
  while($row=$get_cat->fetch()):
    if($row['author_admin'] != null){
      $type = $row['author_admin'];
    }

    else{
      $type = $row['author_teacher'];
    }

   
      echo"
      <li>
      <a href='course_details.php?id=".$row['course_id']."&email=".$row['email_teacher']."'>
         <center> <img style = 'width:90%; height:70%;margin-bottom:20%' src = 'data:image/png;base64,".base64_encode($row['course_img'] )."'/></center>
         <center><h3 style='color:blue;'>Title :&nbsp;".$row['course_name']."</h3></center>
         <center> <h4 style='color:red;'>Created By :&nbsp;".$type."</h4></center>
          </a>
      </li>";
   
    endwhile;
  }
  else{
    echo"
    <b style='text-align:center; color:blue;'> <p>No courses founded</p></b>";
  }
}
}

?>
 