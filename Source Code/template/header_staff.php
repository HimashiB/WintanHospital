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
                        <div class="col-xl-5 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="staff_main.php">Appointments</a></li>
                                        <li><a href="staff_sdule.php">Schedule</a></li>
                                        <li><a href="staff_docs.php">Doctors</a></li> 
                                        <li><a id="logout" href="#">Logout</a></li>                                  
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </header>