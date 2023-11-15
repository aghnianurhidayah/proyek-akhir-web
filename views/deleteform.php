<?php

session_start();
require "../connect/db_connect.php";

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

$form_id = $_GET['form_id'];
$deletesurat = mysqli_query($conn, "DELETE FROM surat WHERE fk_form_id = $form_id");

if ($deletesurat) {
    $deleteform = mysqli_query($conn, "DELETE FROM forms WHERE form_id = $form_id");

    if ($deleteform) {
        echo "
    <script>
        alert('Form Berhasil Dihapus!');
        document.location.href = 'hist.php';
    </script>";
    } else {
        echo "
        <script>
            alert('Form Gagal Dihapus!');
            document.location.href = 'hist.php';
        </script>";
    }
} else {
    echo "
    <script>
        alert('Form Gagal Dihapus!');
        document.location.href = 'hist.php';
    </script>";
}
