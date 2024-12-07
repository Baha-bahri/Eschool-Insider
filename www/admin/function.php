<?php
function add_cat(){
    include("db.php");
    if(isset($_POST['add_cat'])){
     $cat_name=$_POST['cat_name'];
     $cat_icon=$_POST['cat_icon'];
     $check=$conn->prepare("select * from categories where cat_name='$cat_name'");
     $check->setFetchMode(PDO:: FETCH_ASSOC);
     $check->execute();
     $count=$check->rowCount();

if(empty($cat_name)){
    echo"<script>alert('Field empty !!')</script>";
    echo"<script>window.open('index.php?categories','_self')</script>";
}else{
     if($count==1){
        echo"<script>alert('Category already exist')</script>";
        echo"<script>window.open('index.php?categories','_self')</script>";

     }else{
        $add_cat=$conn->prepare("insert into categories(cat_name,cat_icon) values('$cat_name','$cat_icon')");
        if($add_cat->execute()){
            echo"<script>alert('Category added successfully')</script>";
            echo"<script>window.open('index.php?categories','_self')</script>";
        }else{ 
            echo"<script>alert('Category not added')</script>";
            echo"<script>window.open('index.php?categories','_self')</script>";
   
        }
    }
     } 
    }
}

function edit_cat(){
    include("db.php");
    if(isset($_POST['edit_cat'])) {
         $id=$_GET['edit_cat'];   
         $get_cat=$conn->prepare("select * from categories where cat_id='$id'");
         $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
         $get_cat->execute();
         $row=$get_cat->fetch();}
    
         echo"
         <div class='app-main__inner'>
         <div class='app-page-title'>
             <div class='page-title-wrapper '>
                 <div class='page-title-heading'>
                                    
                                <h3> <p style='color:blue;text-align:center;'>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Edit Categories</em></strong></p>
                                </div></div></div>
                                </h3> <center>
                                <div id='edit'>
                                <form id='edit_form' method='post' enctype='multipart/form-data'>
                                <input type='text' name='cat_name'   placeholder='Enter category name here'/><br><br>
                                <input type='text' name='cat_icon' /><br><br>                              
                                <center>  <button name='edit_cat' >Edit category</button><center>
                              </form>
         ";
    
     if(isset($_POST['edit_cat'])){
         
        $cat_name=$_POST['cat_name'];
        $cat_icon=$_POST['cat_icon'];
       
   if(empty($cat_name)){
       echo"<script>alert('Field empty !!')</script>";
       echo"<script>window.open('index.php?categories','_self')</script>";
       exit();
   }
        $up=$conn->prepare("update categories set cat_name='$cat_name', cat_icon='$cat_icon' where cat_id='$id'");
        if($up->execute()){
            echo"<script>alert('Category Updated successfully')</script>";
            echo"<script>window.open('index.php?categories','_self')</script>";
        }else{ 
            echo"<script>alert('Category not Updated')</script>";
            echo"<script>window.open('index.php?categories','_self')</script>";
   
        
    }

    }
}
     
function edit_sub_cat(){
    include("db.php");
    if(isset($_POST['edit_sub_cat'])) {
         $id=$_GET['edit_sub_cat'];   
         $get_sub_cat=$conn->prepare("select * from sub_categories where sub_cat_id='$id'");
         $get_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
         $get_sub_cat->execute();
         $row=$get_sub_cat->fetch();

         $cat_id=$row['cat_id'];
         $get_cat=$conn->prepare( "select * from categories where cat_id='$cat_id'");
         $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
         $get_cat->execute();
         $row_cat=$get_cat->fetch();

 

        }
        $id=$_GET['edit_sub_cat'];   
         $get_sub_cat=$conn->prepare("select * from sub_categories where sub_cat_id='$id'");
         $get_sub_cat->setFetchMode(PDO:: FETCH_ASSOC);
         $get_sub_cat->execute();
         $row=$get_sub_cat->fetch();

         $cat_id=$row['cat_id'];
         $get_cat=$conn->prepare( "select * from categories where cat_id='$cat_id'");
         $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
         $get_cat->execute();
         $row_cat=$get_cat->fetch();

         echo"
         <div class='app-main__inner'>
         <div class='app-page-title'>
             <div class='page-title-wrapper '>
                 <div class='page-title-heading'>
                                    
                                <h3> <p style='color:blue;text-align:center;'>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Edit Sub-Categories</em></strong></p>
                                </div></div></div>
                                </h3> <center>
                                <div id='edit'>
                                <form id='edit_form' method='post' enctype='multipart/form-data'>
                                <select name='cat_id' >
                                <option  value='".$row_cat['cat_id']."'>".$row_cat['cat_name']." </option>;
                                ";
                                echo select_cat();

                                echo"</select> <br> <br><input type='text' name='sub_cat_name'  placeholder='Enter sub-category name here'/><br><br>
                              <center>  <button name='edit_sub_cat' >Edit category</button><center>
                              </form>
         ";
    
     if(isset($_POST['edit_sub_cat'])){
         
        $cat_name=$_POST['sub_cat_name'];
        $cat_id=$_POST['cat_id'];

        
   
                  $up=$conn->prepare("update sub_categories set sub_cat_name='$cat_name' where sub_cat_id='$id'");
        
                 if($up->execute()){
            echo"<script>alert('Sub-Category Updated successfully')</script>";
            echo"<script>window.open('index.php?sub_categories','_self')</script>";
        }else{ 
            echo"<script>alert('Sub-Category not Updated')</script>";
            echo"<script>window.open('index.php?sub-categories','_self')</script>";
   
        }
    
}
     
}

    
     
    
  

function view_cat(){
    include("db.php");
    $get_cat=$conn->prepare("select * from categories");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $i=1;
    while($row=$get_cat->fetch()):
        echo "<tr>
        <td>".$i++."</td>
    <td>".$row['cat_icon']." &nbsp;".$row['cat_name']."</td>
        <td><a style='text-decoration:none' href='index.php?categories&edit_cat=".$row['cat_id']."'>&nbsp;<i class='fas fa-edit'></i></a></td>
        <td><a style='text-decoration:none ;color:#f00' href='index.php?categories&del_cat=".$row['cat_id']."'>&nbsp;&nbsp;&nbsp;<i class='fas fa-trash'></i></a></td>
        <tr>";
    endwhile;
    if(isset($_GET['del_cat'])){
       $id=$_GET['del_cat'];
        $del_category=$conn->prepare("delete from categories where cat_id='$id'");
        if ($del_category->execute()){
            echo"<script>alert('Category deleted')</script>";
            echo"<script>window.open('index.php?categories','_self')</script>";
        } else {
            echo"<script>alert('Category not deleted')</script>";
            echo"<script>window.open('index.php?categories','_self')</script>";
        
}
    }
}


function add_sub_cat(){
    include("db.php");
    if(isset($_POST['add_sub_cat'])){
     $sub_cat_name=$_POST['sub_cat_name'];
    $cat_id=$_POST['cat_id'];
     $check=$conn->prepare("select * from sub_categories where sub_cat_name='$sub_cat_name'");
     $check->setFetchMode(PDO:: FETCH_ASSOC);
     $check->execute();
     $count=$check->rowCount();

if(empty($sub_cat_name)){
    echo"<script>alert('Field empty !!')</script>";
    echo"<script>window.open('index.php?sub_categories','_self')</script>";
}else{
     if($count==1){
        echo"<script>alert(' Sub category already exist')</script>";
        echo"<script>window.open('index.php?sub_categories','_self')</script>";

     }else{
        $add_cat=$conn->prepare("insert into sub_categories(sub_cat_name,cat_id) values('$sub_cat_name','$cat_id')");
        if($add_cat->execute()){
            echo"<script>alert('Sub category added successfully')</script>";
            echo"<script>window.open('index.php?sub_categories','_self')</script>";
        }else{ 
            echo"<script>alert('Sub category not added')</script>";
            echo"<script>window.open('index.php?sub_categories','_self')</script>";
   
        }
    }
     } 
    }
    }



function view_sub_cat(){
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

        echo "<tr>
        <td>".$i++."</td>
        <td>".$row['sub_cat_name']."</td>
        <td>".$row_cat['cat_name']."</td>
        <td><a style='text-decoration:none' href='index.php?sub_categories&edit_sub_cat=".$row['sub_cat_id']."'><i class='fas fa-edit'></i></a></td>
        <td><a style='color:#f00;text-decoration:none' href='index.php?sub_categories&del_sub_cat=".$row['sub_cat_id']."'>&nbsp;&nbsp;&nbsp;<i class='fas fa-trash'></i></a></td>
        <tr>";
    endwhile;
    
    if(isset($_GET['del_sub_cat'])){
        $id=$_GET['del_sub_cat'];
         $del_sub_category=$conn->prepare("delete from sub_categories where sub_cat_id='$id'");
         if ($del_sub_category->execute()){
             echo"<script>alert('Sub-Category deleted')</script>";
             echo"<script>window.open('index.php?sub_categories','_self')</script>";
         } else {
             echo"<script>alert('SubCategory not deleted')</script>";
             echo"<script>window.open('index.php?sub_categories','_self')</script>";
         
 }
     } 
}
function select_cat(){
    include("db.php");
    $get_cat=$conn->prepare("select * from categories");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    while($row=$get_cat->fetch()):
        echo"<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
    endwhile;
}
function add_term(){
    include("db.php");
    if(isset($_POST['add_term'])){
     $cat_name=$_POST['term'];
    $cat_who=$_POST['for_who'];
     $check=$conn->prepare("select * from terms where term='$cat_name'");
     $check->setFetchMode(PDO:: FETCH_ASSOC);
     $check->execute();
     $count=$check->rowCount();

if(empty($cat_name)){
    echo"<script>alert('Field empty !!')</script>";
    echo"<script>window.open('index.php?terms','_self')</script>";
}else{
     if($count==1){
        echo"<script>alert(' Term already exist')</script>";
        echo"<script>window.open('index.php?terms','_self')</script>";

     }else{
        $add_term=$conn->prepare("insert into terms(term,for_who) values('$cat_name','$cat_who')");
        if($add_term->execute()){
            echo"<script>alert('Terms added successfully')</script>";
            echo"<script>window.open('index.php?terms','_self')</script>";
        }else{ 
            echo"<script>alert('Terms not added')</script>";
            echo"<script>window.open('index.php?terms','_self')</script>";
   
        }
    }
     } 
    }
    }


    function edit_term(){
        include("db.php");
        if(isset($_POST['edit_term'])) {
             $id=$_GET['edit_term'];   
             $get_term=$conn->prepare("select * from terms where t_id='$id'");
             $get_term->setFetchMode(PDO:: FETCH_ASSOC);
             $get_term->execute();
             $row=$get_term->fetch();
    
     
    
            }
            $id=$_GET['edit_term'];   
             $get_term=$conn->prepare("select * from terms where t_id='$id'");
             $get_term->setFetchMode(PDO:: FETCH_ASSOC);
             $get_term->execute();
             $row=$get_term->fetch();
    
             echo"
             <div class='app-main__inner'>
             <div class='app-page-title'>
                 <div class='page-title-wrapper '>
                     <div class='page-title-heading'>
                                        
                                    <h3> <p style='color:blue;text-align:center;'>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Edit Terms & Conditions</em></strong></p>
                                    </div></div></div>
                                    </h3> <center>
                                    <div id='edit'>
                                    <form id='edit_form' method='post' enctype='multipart/form-data'>
                                    <select name='for_who' >
                                    <option value='".$row['for_who']."'>".$row['for_who']." </option>;
                                    <option value='Learner'>Learner</option>
                                    <option value='Tutor'>Tutor</option>
                                     <br> <br><input type='text' name='term'  placeholder='Enter terms here'/><br><br>
                                  <center>  <button name='edit_term' >Edit category</button><center>
                                  </form>
             ";
        
         if(isset($_POST['edit_term'])){
             
            $cat_name=$_POST['term'];
            $cat_id=$_POST['for_who'];
            $check=$conn->prepare("select * from terms where term='$cat_name'");
            $check->setFetchMode(PDO:: FETCH_ASSOC);
            $check->execute();
            $count=$check->rowCount();
           
            if(empty($cat_name)){
                echo"<script>alert('Field empty !!')</script>";
                echo"<script>window.open('index.php?terms','_self')</script>";
           
            }else{
                 if($count==1){
                    echo"<script>alert(' Term already exist')</script>";
                    echo"<script>window.open('index.php?terms','_self')</script>";     }       
            
       
                      $up=$conn->prepare("update terms set term='$cat_name',for_who='$cat_id' where t_id='$id'");
            
                     if($up->execute()){
                echo"<script>alert('Term Updated successfully')</script>";
                echo"<script>window.open('index.php?terms','_self')</script>";
            }else{ 
                echo"<script>alert('Term not Updated')</script>";
                echo"<script>window.open('index.php?terms','_self')</script>";
       
            }
        
    
} } 
    }
    
        



function view_term(){
    include("db.php");
        $get_t=$conn->prepare("select * from terms");
        $get_t->setFetchMode(PDO:: FETCH_ASSOC);
        $get_t->execute();
        $i=1; 
        while($row=$get_t->fetch()):

        echo "<tr>
        <td><br>".$i++."</td>
        <td><br><h7  style='color:#000000;'>".$row['term']."</h7></td>
        <td><br><h6>".$row['for_who']."</h6></td>
        <td><br><a style='padding-left:35%' href='index.php?terms&edit_term=".$row['t_id']."'><i class='fas fa-edit'></i></a></td>
        <td><br><a style='color:red' href='index.php?terms&del_term=".$row['t_id']."'><i class='fas fa-trash'></i></a></td>
        <tr>";
endwhile;
if(isset($_GET['del_term'])){
    $id=$_GET['del_term'];
     $del_term=$conn->prepare("delete from terms where t_id='$id'");
     if ($del_term->execute()){
         echo"<script>alert('Term deleted')</script>";
         echo"<script>window.open('index.php?terms','_self')</script>";
     } else {
         echo"<script>alert('Term not deleted')</script>";
         echo"<script>window.open('index.php?terms','_self')</script>";
     
}
 }

}
function contact(){
    include("db.php");
    $get_con=$conn->prepare("select * from contact");
    $get_con->setFetchMode(PDO:: FETCH_ASSOC);
    $get_con->execute();
    $row=$get_con->fetch();
    echo"<form method='post' enctype='multipart/form-data'>
    <table>
    <tr>
    <td>Update Contact No.</td>
    <td><input type='tel' value='".$row['phn']."'  name='phn'/></td>
    </tr>
    <tr>
    <td>Update Email.</td>
    <td><input type='email'  value='".$row['email']."' name='email'/></td>
    </tr>  
    <tr>
    <td>Update Office Adress Line 1.</td>
    <td><input type='text'  value='".$row['add1']."' name='add1'/></td>
    </tr>  
    <tr>
    <td>Update Office Adress Line 2.</td>
    <td><input type='text'  value='".$row['add2']."' name='add2'/></td>
    </tr>  
    <tr>
    <td>http://facebook.com/</td>
    <td><input type='text'  value='".$row['fb']."' name='fb'/></td>
    </tr>  
    <tr>
    <td>www.linkedin.com/</td>
    <td><input type='text'  value='".$row['link']."' name='link'/></td>
    </tr> 
    <tr>
    <td>www.twitter.com/</td>
    <td><input type='text'  value='".$row['tw']."' name='tw'/></td>
    </tr>  
    <tr>
    <td>www.instagram.com/</td>
    <td><input type='text'  value='".$row['insta']."' name='insta'/></td>
    </tr>   
    </table>
    <br><br><br>
<center>  <button name='up_con'> Save</button></center>
  </form> ";
  if(isset($_POST['up_con'])){
    $phn=$_POST['phn'];
    $email=$_POST['email'];
    $add1=$_POST['add1']; 
    $add2=$_POST['add2']; 
    $fb=$_POST['fb'];
    $link=$_POST['link']; 
    $tw=$_POST['tw'];
    $insta=$_POST['insta'];
    $up=$conn->prepare("update contact set phn='$phn', email='$email',add1='$add1',add2='$add2',fb='$fb',link='$link' ,tw='$tw',insta='$insta'");
    if($up->execute()){
        echo"<script>window.open('index.php?contact','_self')</script";
    }
  }
}

function add_faqs(){
    include("db.php");
    if(isset($_POST['add_faqs'])){
     $qsn=$_POST['qsn'];
     $ans=$_POST['ans'];
     $check=$conn->prepare("select * from faqs where qsn='$qsn'");
     $check->setFetchMode(PDO:: FETCH_ASSOC);
     $check->execute();
     $count=$check->rowCount();

if(empty($qsn)){
    echo"<script>alert('Field empty !!')</script>";
    echo"<script>window.open('index.php?categories','_self')</script>";
}else{
    if(empty($ans)){
        echo"<script>alert('Field empty !!')</script>";
        echo"<script>window.open('index.php?categories','_self')</script>";
    }else{
     if($count==1){
        echo"<script>alert('FAQs already exist')</script>";
        echo"<script>window.open('index.php?faqs','_self')</script>";

     }else{
        $add_cat=$conn->prepare("insert into faqs(qsn,ans) values('$qsn','$ans')");
        if($add_cat->execute()){
            echo"<script>alert('FAQs added successfully')</script>";
            echo"<script>window.open('index.php?faqs','_self')</script>";
        }else{ 
            echo"<script>alert('FAQs not added')</script>";
            echo"<script>window.open('index.php?faqs','_self')</script>";
   
        }
    }
     } 
    }
}
}

function view_faqs(){
    include("db.php");
    $get_faqs=$conn->prepare("select * from faqs");
    $get_faqs->setFetchMode(PDO:: FETCH_ASSOC);
    $get_faqs->execute();
    while($row=$get_faqs->fetch()):
        echo"  <details>
                                              <summary>".$row['qsn']."</summary>
                                          <form method='post' enctype='multipart/form-data'>
                                          <input type='text' name='up_qsn' value='".$row['qsn']."' placeholder='Enter QSN   here'/><br><br>
                                        <input type='hidden' name='id' value='".$row['q_id']."' />
                                          <textarea name='up_ans' placeholder='Enter Answer Here'>".$row['ans']."</textarea>
                                        <center>  <button name='up_faqs' class=''>Update FAQs</button><center>
                                        </form>
                                        </details><br />";

    endwhile;
      
    if(isset($_POST['up_faqs'])){
        $qsn=$_POST['up_qsn'];
        $ans=$_POST['up_ans'];
        $id=$_POST['id'];
        
   if(empty($qsn)){
       echo"<script>alert('Field empty !!')</script>";
       echo"<script>window.open('index.php?categories','_self')</script>";
   }else{
       if(empty($ans)){
           echo"<script>alert('Field empty !!')</script>";
           echo"<script>window.open('index.php?categories','_self')</script>";
       }else{
           $up_faq=$conn->prepare("update faqs set qsn='$qsn',ans='$ans' where q_id='$id'");
           if($up_faq->execute()){
               echo"<script>alert('FAQs updated successfully')</script>";
               echo"<script>window.open('index.php?faqs','_self')</script>";
           }else{ 
               echo"<script>alert('FAQs not updated')</script>";
               echo"<script>window.open('index.php?faqs','_self')</script>";
      
           }
       }
        } 
       }
   }


function about(){
    include("db.php");
    $about=$conn->prepare("select * from about");
    $about->setFetchMode(PDO:: FETCH_ASSOC);
    $about->execute();
    $row=$about->fetch();
    echo" <form method='post'>
    <textarea name='about'>".$row['about']."</textarea>
    <br><br>
    <center><button name='up_about'>Save</button></center>
    </form>";
    if(isset($_POST['up_about'])) {
        $info=$_POST['about'];

      $up_about=$conn->prepare("update about set about='$info'");
       if($up_about->execute()) {
            echo"<script>alert('Info updated successfully')</script>";
            echo"<script>window.open('index.php?about','_self')</script>";
        }else{ 
            echo"<script>alert('Info not updated')</script>";
            echo"<script>window.open('index.php?about','_self')</script>";
   
        }  
       }
    }

    function add_user(){
        include("db.php");
        if(isset($_POST['add_user'])){
         $fullname=$_POST['fullname'];
         $username=$_POST['username'];
         $email=$_POST['email'];
         $password=$_POST['password'];
         $crypt_password=md5($_POST['password']);
         $check=$conn->prepare("select * from users where email='$email'");
         $check->setFetchMode(PDO:: FETCH_ASSOC);
         $check->execute();
         $count=$check->rowCount();
         if(empty($fullname)){
            echo"<script>alert('Full Name is required !!')</script>";
            echo"<script>window.open('index.php?learner','_self')</script>";
        }else{if(empty($username)){
            echo"<script>alert('User Name is required !!')</script>";
            echo"<script>window.open('index.php?learner','_self')</script>";
        }else{if(empty($email)){
            echo"<script>alert('Adress Email is required !!')</script>";
            echo"<script>window.open('index.php?learner','_self')</script>";
        }else{if(empty($password)){
            echo"<script>alert('Password is required !!')</script>";
            echo"<script>window.open('index.php?learner','_self')</script>";
        }else{if(strlen($password)<6){
            echo"<script>alert('you have to enter at least 6 digit! !!')</script>";
            echo"<script>window.open('index.php?learner','_self')</script>";
        }else{
   
         if($count==1){
            echo"<script>alert('email already exist')</script>";
            echo"<script>window.open('index.php?learner','_self')</script>";
    
         }else{
            $add_user=$conn->prepare("insert into users(fullname,username,email,password) values('$fullname','$username','$email','$crypt_password')");
            if($add_user->execute()){
                echo"<script>alert('Student added successfully')</script>";
                echo"<script>window.open('index.php?learner','_self')</script>";
            }else{ 
                echo"<script>alert('Student not added')</script>";
                echo"<script>window.open('index.php?learner','_self')</script>";
       
            }
        }
         } 
        }
        }
    }
}
        }
    }
    function view_user(){
        include("db.php");
        $get_cat=$conn->prepare("select * from users");
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cat->execute();

        while($row=$get_cat->fetch()):
            echo "<tr>
            <td><h6 style='color:#000000;'>".$row['fullname']."</h6></td>
            <td><h6 style='color:#000000;'>".$row['username']."</h6></td>
        <td><h6 style='color:#000000;'>".$row['email']."</h6></td>
            <td><a style='text-decoration:none ;color:#f00' href='index.php?learner&del_cat=".$row['id']."'>&nbsp;&nbsp;&nbsp;<i class='fas fa-trash'></i></a></td>
            <tr>";
        endwhile;
        if(isset($_GET['del_cat'])){
           $id=$_GET['del_cat'];
            $del_user=$conn->prepare("delete from users where id='$id'");
            if ($del_user->execute()){
                echo"<script>alert('Student deleted')</script>";
                echo"<script>window.open('index.php?learner','_self')</script>";
            } else {
                echo"<script>alert('Student not deleted')</script>";
                echo"<script>window.open('index.php?learner','_self')</script>";
            
    }
        }
    }








    function add_teacher(){
        include("db.php");
        if(isset($_POST['add_user'])){
         $fullname=$_POST['fullname'];
         $username=$_POST['username'];
         $email=$_POST['email'];
         $password=$_POST['password'];
         $crypt_password=md5($_POST['password']);
         $check=$conn->prepare("select * from teacher where email='$email'");
         $check->setFetchMode(PDO:: FETCH_ASSOC);
         $check->execute();
         $count=$check->rowCount();
         if(empty($fullname)){
            echo"<script>alert('Full Name is required !!')</script>";
            echo"<script>window.open('index.php?teacher','_self')</script>";
        }else{if(empty($username)){
            echo"<script>alert('User Name is required !!')</script>";
            echo"<script>window.open('index.php?teacher','_self')</script>";
        }else{if(empty($email)){
            echo"<script>alert('Adress Email is required !!')</script>";
            echo"<script>window.open('index.php?teacher','_self')</script>";
        }else{if(empty($password)){
            echo"<script>alert('Password is required !!')</script>";
            echo"<script>window.open('index.php?teacher','_self')</script>";
        }else{if(strlen($password)<6){
            echo"<script>alert('you have to enter at least 6 digit! !!')</script>";
            echo"<script>window.open('index.php?teacher','_self')</script>";
        }else{
   
         if($count==1){
            echo"<script>alert('email already exist')</script>";
            echo"<script>window.open('index.php?teacher','_self')</script>";
    
         }else{
            $add_user=$conn->prepare("insert into teacher(fullname,username,email,password) values('$fullname','$username','$email','$crypt_password')");
            if($add_user->execute()){
                echo"<script>alert('teacher added successfully')</script>";
                echo"<script>window.open('index.php?teacher','_self')</script>";
            }else{ 
                echo"<script>alert('teacher not added')</script>";
                echo"<script>window.open('index.php?teacher','_self')</script>";
       
            }
        }
         } 
        }
        }
    }
}
        }
    }
    function view_teacher(){
        include("db.php");
        $get_cat=$conn->prepare("select * from teacher");
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cat->execute();

        while($row=$get_cat->fetch()):
            echo "<tr>
            <td><h6 style='color:#000000;'>".$row['fullname']."</h6></td>
            <td><h6 style='color:#000000;'>".$row['username']."</h6></td>
        <td><h6 style='color:#000000;'>".$row['email']."</h6></td>
            <td><a style='text-decoration:none ;color:#f00' href='index.php?teacher&del_cat=".$row['id']."'>&nbsp;&nbsp;&nbsp;<i class='fas fa-trash'></i></a></td>
            <tr>";
        endwhile;
        if(isset($_GET['del_cat'])){
           $id=$_GET['del_cat'];
            $del_user=$conn->prepare("delete from teacher where id='$id'");
            if ($del_user->execute()){
                echo"<script>alert('teacher deleted')</script>";
                echo"<script>window.open('index.php?teacher','_self')</script>";
            } else {
                echo"<script>alert('teacher not deleted')</script>";
                echo"<script>window.open('index.php?teacher','_self')</script>";
            
    }
        }
    }






    function add_course(){
        include("db.php");
        if(isset($_POST['add_course'])){
            $cat_id=$_POST['cat_id'];
         $course_name=$_POST['course_name'];
         $course_desc=$_POST['course_desc'];
        
         $image = addslashes(file_get_contents($_FILES['course_img']['tmp_name']));
         $check=$conn->prepare("select * from courses");
         $check->setFetchMode(PDO:: FETCH_ASSOC);
         $check->execute();
         if(empty($course_name)){
            echo"<script>alert('The Tilte is required !!')</script>";
            echo"<script>window.open('index.php?add_course','_self')</script>";
        }else{if(empty($course_desc)){
            echo"<script>alert('The Description is required !!')</script>";
            echo"<script>window.open('index.php?add_course','_self')</script>";

         }else{
            $add_user=$conn->prepare("insert into courses(course_name,course_desc, author_admin,course_img,cat_id) values('$course_name','$course_desc', 'Admin', '$image','$cat_id')");
            if($add_user->execute()){
                echo"<script>alert('Course added successfully')</script>";
                echo"<script>window.open('index.php?add_course','_self')</script>";
            }else{ 
                echo"<script>alert('Course not added')</script>";
                echo"<script>window.open('index.php?add_course','_self')</script>";
       
            
        }
         } 
        }
        }
    }

       
    
    function view_course(){
        include("db.php");
        include("db.php");
        $type = null;
        $get_cat=$conn->prepare("select * from courses");
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cat->execute();

        while($row=$get_cat->fetch()):
            $id=$row['cat_id'];
            $get_c=$conn->prepare("select * from categories where cat_id='$id'");
            $get_c->setFetchMode(PDO:: FETCH_ASSOC);
            $get_c->execute();
            $row_cat=$get_c->fetch();
            
            echo "<tr>
            <td><h6 style='color:#000000;'>".$row_cat['cat_name']."</h6></td>";
            if($row['author_admin'] == null){
                $type = $row['author_teacher'];
            }

            else{
                $type = $row['author_admin'];
            }
            echo "<td><h6 style='color:#000000;'>".$row['course_name']."</h6></td>
        <td><h6 style='color:#000000'>".$type."</h6></td>
        <td><a style='text-decoration:none;padding-left:10%' href='index.php?add_course&edit_course=".$row['course_id']."'><i class='fas fa-edit'></i></a></td>
            <td><a style='text-decoration:none ;color:#f00;padding-left:13%' href='index.php?add_course&del_cat=".$row['course_id']."'><i class='fas fa-trash'></i></a></td>
            <tr>";
        endwhile;
        if(isset($_GET['del_cat'])){
           $id=$_GET['del_cat'];
            $del_course=$conn->prepare("delete from courses where course_id='$id'");
            if ($del_course->execute()){
                echo"<script>alert('Course deleted')</script>";
                echo"<script>window.open('index.php?add_course','_self')</script>";
            } else {
                echo"<script>alert('Course not deleted')</script>";
                echo"<script>window.open('index.php?add_course','_self')</script>";
            
    }
        }
    }

 
    



    function edit_course(){
        include("db.php");

        $id=$_GET['edit_course'];    
        $get_cat=$conn->prepare("SELECT * FROM courses WHERE course_id='$id'");
        $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
        $get_cat->execute();

       while ($row = $get_cat->fetch()){
        echo"
        <div class='app-main__inner'>
        <div class='app-page-title'>
            <div class='page-title-wrapper '>
                <div class='page-title-heading'>
                                   
                               <h3> <p style='color:blue;text-align:center;'> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Edit Courses</em></strong></p>
                               </div></div></div>
                               </h3> <center>
                               <div id='edit'>
                               <form id='edit_form' method='post' enctype='multipart/form-data'>
                               <input type='text' name='course_name' value='".$row['course_name']."' /><br><br> 
                               <textarea type='text' style='width:100%;height:90px' name='course_desc'>".$row['course_desc']."</textarea><br><br>  
                               <input type='file' name='course_img'> </input><br><br>           
                               <div>
                               <img style = 'width:25%; height:25%' src = 'data:image/png;base64,".base64_encode($row['course_img'] )."'/>
                               </div>
                               <br>
                               <br>
                               <br>
                               <center>  <button name='edit_course' >Edit Course</button><center>
                             </form>
        ";
       }
       
 
         if(isset($_POST['edit_course'])){
             
            $course_name=$_POST['course_name'];
            $course_desc=$_POST['course_desc'];
            $up = "";

            if(!empty($_FILES['course_img']['tmp_name'])){
                $image = addslashes(file_get_contents($_FILES['course_img']['tmp_name']));
                $up=$conn->prepare("update courses set course_name='$course_name',course_desc='$course_desc',course_img = '$image' where course_id='$id'");    
            }
           
           else{
            $up=$conn->prepare("update courses set course_name='$course_name',course_desc='$course_desc' where course_id='$id'");
           
           }
           
            if($up->execute()){
                echo"<script>alert('Course Updated successfully')</script>";
                echo"<script>window.open('index.php?add_course','_self')</script>";
            }else{ 
                echo"<script>alert('Course not Updated')</script>";
                echo"<script>window.open('index.php?add_course','_self')</script>";
            }
    
        }
    }
  
             function select_course(){
                include("db.php");
                $get_course=$conn->prepare("select * from courses where author_admin = 'Admin'");
                $get_course->setFetchMode(PDO:: FETCH_ASSOC);
                $get_course->execute();
                while($row=$get_course->fetch()):
                    echo"<option value='".$row['course_id']."'>".$row['course_name']."</option>";
                endwhile;
            }
    
            function add_lesson(){
                include("db.php");
                if(isset($_POST['add_lesson'])){
                    $course_id=$_POST['course_id'];
                    $lesson_name=$_POST['lesson_name'];
                    $target_dir = null;
                 
                 $name=$_FILES['file']['name'];
                 $target_dir="../storevideo/";
                 $target_file=$target_dir.$name;
                 $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                 $extension_arr=array("mp4","avi","3gp","mov","mpeg");
                 $check=$conn->prepare("select * from lessons where lesson_name='$lesson_name' ");
                 $check->setFetchMode(PDO:: FETCH_ASSOC);
                 $check->execute();
                 if(empty($lesson_name)){
                    echo"<script>alert('The Tilte is required !!')</script>";
                    echo"<script>window.open('index.php?lesson','_self')</script>";
                  } 
                  
                else 
                 if(in_array($extension,$extension_arr)){
                     if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    $add_lesson=$conn->prepare("insert into lessons(lesson_name,lesson_link,vid_location,course_id) values('$lesson_name','$name','$target_file','$course_id')");
                    if($add_lesson->execute()){
                        echo"<script>alert('Lesson added successfully')</script>";
                        echo"<script>window.open('index.php?lesson','_self')</script>";
                    }else{ 
                        echo"<script>alert('Course not added')</script>";
                        echo"<script>window.open('index.php?lesson','_self')</script>";
               
                    }
                }
                 } 
                }
            }
            
                
        
               
            
            function view_lesson(){
                    include("db.php");
                    $get_lesson=$conn->prepare("select * from lessons  order by course_id");
                    $get_lesson->setFetchMode(PDO:: FETCH_ASSOC);
                    $get_lesson->execute();
                    $i=1;
                    $li = null;

                    while($row=$get_lesson->fetch()):
                        $id=$row['course_id'];
                        $get_c=$conn->prepare("SELECT * FROM courses WHERE course_id='$id'");
                        $get_c->setFetchMode(PDO:: FETCH_ASSOC);
                        $get_c->execute();
                        $row_cat=$get_c->fetch();
                        if($row_cat['author_admin'] == null){
                            $li = " <td><i class='fas fa-ban'></i></td>";
                        }

                        else{
                            $li = " <td><a style='text-decoration:none' href='index.php?lesson&edit_lesson=".$row['lesson_id']."'><i class='fas fa-edit'></i></a></td>";
                        }
                        
                        echo "<tr>
                        <td><h6  style='color:#000000;'>".$i++."</h6></td>
                        <td><h6  style='color:#000000;'>".$row['lesson_name']."</h6></td>
                        <td><h6  style='color:#000000;'>".$row_cat['course_name']."</h6></td>
                        ".$li."
                        <td><a style='color:#f00;text-decoration:none' href='index.php?lesson&del_lesson=".$row['lesson_id']."'>&nbsp;&nbsp;&nbsp;<i class='fas fa-trash'></i></a></td>
                        <tr>";
                    endwhile;
                if(isset($_GET['del_lesson'])){
                   $id=$_GET['del_lesson'];
                    $del_lesson=$conn->prepare("delete from lessons where lesson_id='$id'");
                    if ($del_lesson->execute()){
                        echo"<script>alert('Lesson deleted')</script>";
                        echo"<script>window.open('index.php?lesson','_self')</script>";
                    } else {
                        echo"<script>alert('Course not deleted')</script>";
                        echo"<script>window.open('index.php?lesson','_self')</script>";
                    
            }
                }
            }
        
            function edit_lesson(){
                include("db.php");
        
                $id=$_GET['edit_lesson'];    
                $get_cat=$conn->prepare("SELECT * FROM lessons WHERE lesson_id='$id' ORDER BY lesson_id");
                $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
                $get_cat->execute();
        
               while ($row = $get_cat->fetch()){
                echo"
                <div class='app-main__inner'>
                <div class='app-page-title'>
                    <div class='page-title-wrapper '>
                        <div class='page-title-heading'>
                                           
                                       <h3> <p style='color:blue;text-align:center;'> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Edit Lessons</em></strong></p>
                                       </div></div></div>
                                       </h3> <center>
                                       <div id='edit'>
                                       <form id='edit_form' method='post' enctype='multipart/form-data'>
                                       <input type='text'  value='".$row['lesson_name']."' name = 'lesson_name'/><br><br>
                                       <div>
                                       <input type='file' name='file'> </input><br><br>  
                                       <video src='".$row['vid_location']."' controls width='500px' name = 'vid_location'></video>
                                       </div>
                                       <br>
                                       <center>  <button name='edit_lesson' type = 'submit'>Edit Lesson</button><center>
                                     </form>
                ";
               }
               
         

             if(isset($_POST['edit_lesson'])){
             
                $lesson_name=$_POST['lesson_name'];
                $name=$_FILES['file']['name'];
                 $target_dir="../storevideo/";
                 $target_file=$target_dir.$name;
                 $extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                 $extension_arr=array("mp4","avi","3gp","mov","mpeg");
                $add_lesson = null;

                if(in_array($extension,$extension_arr)){
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                        $add_lesson=$conn->prepare("update lessons set lesson_name='$lesson_name',lesson_link='$name',vid_location = '$target_file' where lesson_id='$id'");
                    }
               }

               else{
                $add_lesson=$conn->prepare("update lessons set lesson_name='$lesson_name' where lesson_id='$id'");
               }

               
               if($add_lesson->execute()){
                echo"<script>alert('Lesson updated successfully')</script>";
                echo"<script>window.open('index.php?lesson','_self')</script>";
            }else{ 
                echo"<script>alert('lesson not updated')</script>";
                echo"<script>window.open('index.php?lesson','_self')</script>";
       
            }
            
                } 

        
            }
        
function total_course(){
    include("db.php");   
    $get_cat=$conn->prepare("SELECT * FROM courses");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $row = $get_cat->rowCount();
echo"<h1 class='top'>$row <i>Total Courses</i></h1>";


}    
function total_teacher(){
    include("db.php");   
    $get_cat=$conn->prepare("SELECT * FROM teacher");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $row = $get_cat->rowCount();
echo"<h1 class='top'>$row <i>Total Teachers</i></h1>";


}     
function total_learner(){
    include("db.php");   
    $get_cat=$conn->prepare("SELECT * FROM users");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $row = $get_cat->rowCount();
echo"<h1 class='top'>$row <i>Total Learners</i></h1>";


}  
function total_lesson(){
    include("db.php");   
    $get_cat=$conn->prepare("SELECT * FROM lessons");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $row = $get_cat->rowCount();
echo"<h1 class='top'>$row <i>Total Lessons</i></h1>";


}  
            
?>