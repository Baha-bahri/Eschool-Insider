<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
<link href="./main.css" rel="stylesheet"></head>
<div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Categories Management</li>
                                <li>
                                    <a href="index.php?dash" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Dashboard
                                    </a>
                                    <a href="index.php?categories" >
                                        <i class="metismenu-icon pe-7s-albums"></i>
                                        View Course Categories</a>
                                <li class="app-sidebar__heading">Website Management</li>
                                <li
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                >
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-study"></i>
                                        Course Management
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    >
                                        <li>
                                            <a href="index.php?add_course">
                                                <i class="metismenu-icon"></i>
                                                View All Courses
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.php?lesson">
                                                <i class="metismenu-icon">
                                                </i>View All Lessons
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                >
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-user"></i>
                                        Users Management
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    >
                                        <li>
                                            <a href="index.php?learner">
                                                <i class="metismenu-icon">
                                                </i>View All Students   
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.php?teacher">
                                                <i class="metismenu-icon">
                                                </i>View All Teachers
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li  >
                                    
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-browser"></i>
                                        Page Management
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul





                                    >
                                     <li>
                                        <a href="index.php?terms">
                                            <i class="metismenu-icon">
                                            </i>Termes And Conditions   
                                        </a>
                                     </li>
                                     <li>
                                        <a href="index.php?contact">
                                            <i class="metismenu-icon">
                                            </i>Contact Us Page
                                        </a>
                                     </li>
                                     <li>
                                        <a href="index.php?faqs">
                                            <i class="metismenu-icon">
                                            </i>FAQs Page
                                        </a>
                                     </li>
                                     <li>
                                        <a href="index.php?about">
                                            <i class="metismenu-icon">
                                            </i>About Us
                                        </a>
                                     </li>
                                </ul>
                            </li>
                            </div>
                    </div>
                    </div>
                    <?php
                    if (isset($_GET['categories'])){
                      include("categories.php");  
                    }
                    if (isset($_GET['sub_categories'])){
                        include("sub_categories.php");  
                      }
                      if (isset($_GET['learner'])){
                        include("learner.php");  
                      }
                      if (isset($_GET['teacher'])){
                        include("teacher.php");  
                      }
                      if (isset($_GET['terms'])){
                        include("terms.php");  
                      }
                      if (isset($_GET['contact'])){
                        include("contact.php");  
                      }
                      if (isset($_GET['faqs'])){
                        include("faqs.php");  
                      }
                      if (isset($_GET['about'])){
                        include("about.php");  
                      }
                      if (isset($_GET['add_course'])){
                        include("add_course.php");  
                      }
                      if (isset($_GET['lesson'])){
                        include("lesson.php");  
                      }
                      if (isset($_GET['dash'])){
                        include("dash.php");  
                      }
                    
                    ?>
                           </body>
</html>
                            