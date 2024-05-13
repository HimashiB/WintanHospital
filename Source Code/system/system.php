<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	

	include_once("database.php");
    
	include_once("class/patient.php");
	include_once("class/doctor.php");
	include_once("class/staff.php");
?>