<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	include_once("system/system.php");
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Docmed</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once('template/links.php'); ?>

</head>

<body id="top">
   
  <?php include_once('template/header.php'); ?>

    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Doctors</h3>
                        <p><a href="index.php">Home /</a> Doctors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <?php
        $docInfo = [];
    	$result = doctor::getAllDoctors();
	        while($row = $result->fetch_assoc()){
                $docInfo = $row;
                break;
             }

      	?>
<!-- welcome_docmed_area_start -->
<div class="welcome_docmed_area">
<div class="container">
                <div class="row">        
                    <div class="col-lg-2">
                        <div class="about-img ">
                            <div class="about-font-img d-none d-lg-block">
                                <img src="img/doctors/<?php echo $row['img']; ?>" width="110%">
                            </div>
                        </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="welcome_docmed_info">
                        <h2>Doctor's Information</h2>
                        <h3><?php echo $docInfo['DName']; ?></h3>
                        <p><?php echo $docInfo['Specialisation']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->

    <!-- Emergency_contact start -->
    <div class="Emergency_contact">
        <div class="conatiner-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_1 overlay_skyblue">
                        <div class="info">
                            <h3>For Any Emergency Contact</h3>
                            <p>We care for every patient. At your service 24×7.</p>
                        </div>
                        <div class="info_button">
                            <a href="#" class="boxed-btn3-white">0112 291 951</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_2 overlay_skyblue">
                        <div class="info">
                            <h3>Make an Online Appointment</h3>
                            <p>We care for every patient. At your service 24×7.</p>
                        </div>
                        <div class="info_button">
                            <a href="#" class="boxed-btn3-white">Make an Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Emergency_contact end -->

    <?php include_once('template/footer.php'); ?>

    <!-- link that opens popup -->

    <!-- form itself end-->
    <form id="test-form" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Make an Appointment</h3>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-6">
                            <input id="datepicker" placeholder="Pick date">
                        </div>
                        <div class="col-xl-6">
                            <input id="datepicker2" placeholder="Suitable time">
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Select Department">Department</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Doctors">Doctors</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <input type="text"  placeholder="Name">
                        </div>
                        <div class="col-xl-6">
                            <input type="text"  placeholder="Phone no.">
                        </div>
                        <div class="col-xl-12">
                            <input type="email"  placeholder="Email">
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed-btn3">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <!-- form itself end -->
    <style>
      .img-container {
        text-align: right;
        display: block;
      }
    </style>
    
    <?php include_once('template/scripts.php'); ?>

</body>

</html>