<?php
    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['nik']);
    header("Location:index.php");
?>