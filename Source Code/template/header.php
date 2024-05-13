<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
?>
<header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 ">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-envelope"></i> info@docmed.com</a></li>
                                    <li><a href="#"> <i class="fa fa-phone"></i> 0112 291 951</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <?php
                                        if(!isset($_SESSION['staffdata'])){
                                    ?>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.php">home</a></li>
                                        <li><a href="Department.html">Department</a></li>
                                        </li>
                                        <li><a href="Doctors.php">Doctors</a></li>
                                        <?php
                                            if(isset($_SESSION['userdata'])){
                                        ?>
                                        <li><a href="#" id="logout">Logout</a></li>
                                        <?php        
                                            }
                                            else{
                                        ?> 
                                        <li><a href="login.php">Login</a></li>
                                        <li><a href="register.php">Register</a></li>
                                        <?php
                                            }
                                        }
                                        ?>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>