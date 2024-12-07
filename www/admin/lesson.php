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
                                       if (isset($_GET['edit_lesson'])) {
                                       echo edit_lesson();
                                    } else{ 
                                        ?>
                       <div class="app-main__outer">
                         <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper ">
                                <div class="page-title-heading">
                                <h3> <p style="color:blue;text-align:center;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;View All Lessons</em></strong></p>
                                </h3>
                                
                                      </div>
                                      </div></div>
                                      
                                      
                                     
                                          
                                      <div id='add'>
                                          <details>
                                              <summary>Add New Lesson</summary>
                                          <form method="post" enctype="multipart/form-data">
                                          <select name="course_id">
                                         <option>Select Course</option>
                                         <?php echo select_course()?>
                                         </select> <br /> <br>
                                          <input type="text" name="lesson_name" placeholder="Enter Lesson name here"/><br><br>
                                         
                                          <input type="file" name="file">
                                        <center>  <button name="add_lesson">Add Lesson</button><center>
                                        </form>
                                        </details>
<table cellspacing="0">
    <tr>
    <th> Lesson ID </th> 
        <th>Lesson Title</th>
        <th>Course Title</th>
        <th>Edit</th>
        <th>Delete</th>
</tr>
<?php echo view_lesson(); ?>
</table>
                                      </div>
                                      </div>
                                </body>
</html>
<?php echo add_lesson() ;}?>