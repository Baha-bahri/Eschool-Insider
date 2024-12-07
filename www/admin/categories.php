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
                          
                       <div class="app-main__outer">
                       <?php
                                       if (isset($_GET['edit_cat'])) {
                                       echo edit_cat();
                                    } else{ 
                                        ?>
                         <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper ">
                                <div class="page-title-heading">
                                <h3> <p style="color:blue;text-align:center;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;View All Categories</em></strong></p>
                                </h3>
                                
                                      </div>
                                      </div></div>
                                      
                                      
                                     
                                          
                                      <div id='add'>
                                          <details>
                                              <summary>Add Category</summary>
                                          <form method="post" enctype="multipart/form-data">
                                          <input type="text" name="cat_name" placeholder="Enter category name here"/><br><br>
                                          <input type="text" name="cat_icon" placeholder="Enter category icon code here"/><br><br>
                                          <center>  <button name="add_cat" class=''>Add category</button><center>
                                        </form>
                                        </details>
<table cellspacing="0">
    <tr>
        <th>Sr No</th>
        <th>Category Name</th>
        <th>Edit</th>
        <th>Delete</th>
</tr>
<?php view_cat(); ?>
</table>
                                      </div>
                                      </div>
                                </body>
</html>
<?php echo add_cat() ;} ?>