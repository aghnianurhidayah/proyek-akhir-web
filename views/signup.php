<?php
session_start();
require "../connect/db_connect.php";

if (isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $nik = $_POST['nik'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password === $cpassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $check = mysqli_query($conn, "SELECT * FROM users WHERE nik='$nik'");
        if (!$check->num_rows > 0) {
            $result = mysqli_query($conn, "INSERT INTO users VALUES ('', '$nik', '$name', '$password')");
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                header("Location: login.php");
            } else {
                echo "<script>alert('Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('NIK Sudah Terdaftar.')</script>";
        }
    } else {
        echo "
                <script>
                    alert('Konformasi Password Anda Tidak Sesuai');
                    document.location.href = 'signup.php';
                </script>";
    }
}

// if (isset($_POST['uname']) && isset($POST['password'])) {

// function validate($data){
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

// $uname = validate($_POST['uname']);
// $pass = validate($_POST['password']);

// if (empty($uname)) {
//     header("Location: login.php?error=User Name is required");
//     exit ();
// }else if (empty($pass)) {
//     header("Location: login.php?error=Password is required");
//     exit ();
// }else{
//     echo "Valid input";
// }

// }
// else {
//     header("Location: login.php");
//     exit();
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../styles/sign.css">
</head>

<body>
    <form action="signup.php" method="post">
        <h2>Buat Akun</h2>
        <label>NIK</label>
        <input type="number" name="nik" placeholder="Masukan NIK" maxlength="16" required>

        <label>Nama</label>
        <input type="text" name="name" placeholder="Masukan Nama" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukan Password" required>

        <label>Konfirmasi Password</label>
        <input type="password" name="cpassword" placeholder="Masukan Password" required>

        <input class="button" type="submit" value="Daftar" name="signup">
        <p class="link">Sudah memiliki akun? <a href="login.php">Login</a></p>
    </form>
</body>

</html>