<?php
session_start();
require "../connect/db_connect.php";

if (isset($_SESSION['name'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $nik = $_POST['nik'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE nik='$nik'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['nama'] == "admin" && $row['password'] == "admin123") {
            header("Location: dashboard.php");
        } else {
            if ($nik == $row['nik']) {
                if ($name == $row['nama']) {
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['name'] = $row['nama'];
                        $_SESSION['nik'] = $row['nik'];
                        header("Location: menu.php");
                    } else {
                        echo "<script>alert('Password tidak sesuai')</script>";
                    }
                } else {
                    echo "<script>alert('Nama tidak sesuai')</script>";
                }
            }
        }
    } else {
        echo "<script>alert('Akun Anda belum terdaftar')</script>";
    }
}

// if (isset($_POST['uname']) && isset($POST['password'])) {

    // function validate($data)
    // {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }

    // $uname = validate($_POST['uname']);
    // $pass = validate($_POST['password']);

//     if (empty($uname)) {
//         header("Location: index.php?error=Username is required");
//         exit();
//     } else if (empty($pass)) {
//         header("Location: index.php?error=Password is required");
//         exit();
//     } else {
//         echo "Valid input";
//     }
// } else {
//     header("Location: login.php");
//     exit();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/sign.css">
</head>

<body>
    <form action="login.php" method="post">
        <h2>Login</h2>
        <label>NIK</label>
        <input type="number" name="nik" placeholder="Masukan NIK" required>

        <label>Nama</label>
        <input type="text" name="name" placeholder="Masukan Nama" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukan Password" required>

        <input class="button" type="submit" value="Login" name="login">
        <p class="link">Belum memiliki akun? <a href="signup.php">Daftar Akun</a></p>
    </form>
</body>

</html>