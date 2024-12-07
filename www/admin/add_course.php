<!doctype html>
<html lang="en">

<head>
    <body>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admin Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
<link href="./main.css" rel="stylesheet">
<link href="./style.css" rel="stylesheet"></head>
                          


<?php
                                       if (isset($_GET['edit_course'])) {
                                       echo edit_course();
                                    } else{ 
                                        ?>
                       <div class="app-main__outer">
                         <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper ">
                                <div class="page-title-heading">
                                <h3> <p style="color:blue;text-align:center;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;View All Courses</em></strong></p>
                                </h3>
                                
                                      </div>
                                      </div></div>
                                      
                                      
                                     
                                          
                                      <div id='add'>
                                          <details>
                                              <summary>Add New Course</summary>
                                          <form method="post" enctype="multipart/form-data">
                                          <select name="cat_id">
                                         <option>Select Category</option>
                                         <?php echo select_cat()?>
                                         </select><br><br>
                                          <input type="text" name="course_name" placeholder="Enter the title here"/><br><br>
                                          <textarea  name="course_desc" placeholder="Enter the description here"></textarea><br><br>
                                          <input type="text" name="author" value = "Admin" readonly/><br><br>
                                          <input type="file" name="course_img"> </input><br><br>
                                          <center>  <button name="add_course" class=''>Add Course</button><center>
                                        </form>
                                        </details>
<table cellspacing="0">
    <tr>
        <th>Category</th>
        <th>Course Title</th>
        <th>Author</th>
        <th>Edit</th>
        <th>Delete</th>
</tr>
<?php view_course(); ?>
</table>
                                      </div>
                                      </div>
                                </body>
</html>
<?php echo add_course() ;}?>