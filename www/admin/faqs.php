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
                                <h3> <p style="color:blue;text-align:center;"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;View All FAQs</em></strong></p>
                                </h3>
                                
                                      </div>
                                      </div></div>
                                      
                                      
                                     
                                          
                                      <div id='add'>
                                          <details style="width:20%">
                                              <summary>Add FAQs</summary>
                                          <form method="post" enctype="multipart/form-data">
                                          <input type="text" name="qsn" placeholder="Enter QSN   here"/><br><br>
                                        <textarea name="ans" placeholder="Enter Answer Here"></textarea>
                                        <center>  <button name="add_faqs" class=''>Add FAQs</button><center>
                                        </form>
                                        </details><br />
                                        <?php echo view_faqs(); ?>
                                      </div>
                                      </div>
                                </body>
</html>
<?php echo add_faqs() ;} ?>