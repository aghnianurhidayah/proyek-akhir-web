<?php
session_start();
require "../connect/db_connect.php";

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

$sql_form = mysqli_query($conn, "SELECT * FROM forms JOIN surat ON forms.form_id = surat.fk_form_id");

$forms = [];
while ($row = mysqli_fetch_assoc($sql_form)) {
    $forms[] = $row;
}

if ($_SESSION['name'] == "admin"){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" href="../styles/dashboard.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>

    <?php include 'sidebar.php'; ?>

    <section class="main-content">
        <div class="content">
            <div class="header-wrapper">
                <div class="header">
                    <h2>Dashboard</h2>
                    <p><?php echo date('l, d F Y'); ?></p>
                    <p><?php date_default_timezone_set('Asia/Makassar');
                        echo date('h:i a'); ?></p>
                </div>
                <div class="search">
                    <i class="bx bx-search"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Nama Surat</th>
                        <th>Jenis Surat</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($forms as $form) :?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $form['no_surat'] ?></td>
                            <td><?= $form['nama_surat'] ?></td>
                            <td><?= $form['jenis_surat'] ?></td>
                            <td><?= $form['tgl_masuk'] ?></td>
                            <td><?= $form['tgl_keluar'] ?></td>
                            <td>
                                <a href="../views/status.php?form_id=<?= $form['form_id'] ?>"><button><i class='bx bx-show'></i> Lihat Status </button></a>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <script src="../scripts/script.js"></script>
</body>

</html>

<?php
}
?>