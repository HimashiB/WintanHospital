<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("../system.php");

echo patient::register($_POST);

?>