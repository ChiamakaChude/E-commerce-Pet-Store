<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['loggedin']);
    header("location: signin.php");
    exit;
?>