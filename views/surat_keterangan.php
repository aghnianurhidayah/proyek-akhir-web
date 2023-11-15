<?php
require "../connect/db_connect.php";

$sql_surat = mysqli_query($conn, "SELECT * FROM surat");

$surat = [];
while ($row = mysqli_fetch_assoc($sql_surat)) {
    $surat[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Surat Keterangan</title>
    <link rel="stylesheet" href="../styles/adminsurat.css">

</head>

<body>

    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <div class="header">
            <h2>Surat Keterangan</h2>
        </div>
        <div class="container">
            <div class="card-container">
                <h3>Jumlah Surat Masuk</h3>
            </div>
        </div>
    </div>
</body>

</html>