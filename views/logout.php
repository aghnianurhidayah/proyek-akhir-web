<?php
    session_start();
    session_destroy();
    unset($_SESSION['role']);
    unset($_SESSION['name']);
    unset($_SESSION['nik']);
    header("Location:index.php");
    die();
?>