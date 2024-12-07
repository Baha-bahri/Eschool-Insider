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
                         <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper ">
                                <div class="page-title-heading">
                                <h3> <p style="color:blue;text-align:center;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;View All Tutors</em></strong></p>
                                </h3>
                                
                                      </div>
                                      </div></div>
                                      
                                      
                                     
                                          
                                      <div id='add'>
                                          <details>
                                              <summary>Add New Tutor</summary>
                                          <form method="post" enctype="multipart/form-data">
                                          <input type="text" name="username" placeholder="Enter the full name here"/><br><br>
                                          <input type="text" name="fullname" placeholder="Enter the user name here"/><br><br>
                                          <input type="email" name="email" placeholder="Enter the adress email here"/><br><br>
                                          <input type="password" name="password" placeholder="Enter the password here"/><br><br>
                                          <center>  <button name="add_user" class=''>Add Tutor</button><center>
                                        </form>
                                        </details>
<table cellspacing="0">
    <tr>
        <th>Full Name</th>
        <th>User Name</th>
        <th style="padding-left:10%;">Email</th>
        <th>Delete</th>
</tr>
<?php view_teacher(); ?>
</table>
                                      </div>
                                      </div>
                                </body>
</html>
<?php echo add_teacher() ;?>