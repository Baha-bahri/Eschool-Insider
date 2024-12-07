
<?php include("function.php"); ?>
<div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="home_connected.php"><img src="images/logo.png" alt="#"></a>
                                </div>
                            </div>
                        </div>
</div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                        <div class="head">
                      <center>  <li><div id="menu">
                        <h2><i class="fas fa-bars"></i></h2>
                        <?php include("cat_menu.php"); ?>
                        </div></li></center>
                        <form method="post" enctype="multipart/form-data">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li>
                                            <div class="flexbox">
                                                <div class="search">
                                                    <div>
                                                        <input type="text" name="query" id = "query" placeholder="Search courses from here" required onchange="
                                                        openPage()">
                                                  
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        </form>

                                            
                        
                          <li><a href="home_connected.php">Home</a> </li>
                          <li><a href="category.php">Courses</a></li>
                          <li> <a href="javascript:void()" onclick = "goToAboutUs()" type = "button">About</a> </li>
                                        <li><a href="javascript:void()" onclick = "goToContact()" type = "button">Contact</a></li>
                                        <li div class="dropdown">
                                            <a href = '' class="dropbtn"><img src="images/top-icon.png">
                                    </a>
                                            <div class="dropdown-content">
                                                <a href="profile.php"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;Profile </a>
                                                <a href="teacher.php"><i class="fas fa-table"></i>&nbsp;&nbsp;Dashboard</a>
                                                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Log Out</a>
                                            </div>

                            </div>
                            </li>
                            </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script>
    function goToAboutUs(){
        var element = document.querySelector(".titlepage3");
        element.scrollIntoView();
    }

    function goToContact(){
        var element = document.querySelector("#contact");
        element.scrollIntoView();
    }

    function openPage(){
        var search = document.getElementById('query').value;
        window.open("recherche.php?search="+search);
       
    }
</script>
