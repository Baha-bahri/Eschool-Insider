
<?php include("function.php"); ?>
<div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.php"><img src="images/logo.png" alt="#"></a>
                                </div>
                            </div>
                        </div>
</div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                        <div class="head">
                        <form method="post" enctype="multipart/form-data">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li>
                                            <div class="flexbox">
                                                <div class="search">
                                                    
                                                </div>
                                            </div>
                                        </li>
                                        </form>

                                            
                        
                         
                         <li> <a href="index.php">Home</a> </li>
                          <li><a href="terms.php">Terms</a></li>
                          <li><a href="faqs.php">FAQs</a></li>
                                        <li> <a href="javascript:void()" onclick = "goToAboutUs()" type = "button">About</a> </li>
                                       
                                        <li><a href="javascript:void()" onclick = "goToContact()" type = "button">Contact</a></li>
                                        <li div class="dropdown">
                                            <button class="dropbtn"><img src="images/top-icon.png">
                                    </button>
                                            <div class="dropdown-content">
                                                <a href="./authentification/signin.php"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Sign In </a>
                                                <a href="./authentification/signup.php"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Sign Up</a>
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
</script>
