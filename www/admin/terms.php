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
                                       if (isset($_GET['edit_term'])) {
                                       echo edit_term();
                                    } else{ 
                                        ?>
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper ">
                                <div class="page-title-heading">
                                
                    
                                    <h3> <p style="color:blue;text-align:center;"> &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;View all Terms & Conditions</em></strong></p>
                                </h3>
                                      
                                    </h3>
                          </div></div></div>

                                      <div id='add'>
                                          <details>
                                              <summary>Add New T&C</summary>
                                          <form method="post" enctype="multipart/form-data">
                                          <select name="for_who" required>
                                           <option value="">Select Term For</option>
                                          <option value="learner">Learner</option>
                                          <option value="tutor">Tutor</option>
                                          </select>
                                          <input type="text" name="term" placeholder="Enter term here"/><br><br>
                                        <center>  <button name="add_term">Add T&C</button><center>
                                        </form>
                                        </details>
<table style="width: 60%" cellspacing="0">
    <tr>
        <th>N°</th>
        <th style="padding-left: 45%;">Terms</th>
        <th>For who</th>
        <th style="padding-left: 2%;">Action</th>
        <th></th>

</tr>
<?php view_term();  ?>
</table>
    </div>
</body>
</html>
<?php echo add_term(); } ?>