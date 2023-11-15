<?php
session_start();
require "../connect/db_connect.php";

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

$get_nik = $_SESSION['nik'];

$sql_surat = mysqli_query($conn, "SELECT * FROM surat WHERE nik = $get_nik");

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
    <title>e-Surat | Riwayat Surat</title>

    <link rel="stylesheet" href="../styles/userstyle.css">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="hist">
        <div class="hist-text">
            <p>Riwayat Surat</p>
        </div>
        <div class="hist-table">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Surat</th>
                        <th>Jenis Surat</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($surat as $srt) :
                        $sql_form = mysqli_query($conn, "SELECT * FROM forms WHERE nik = $get_nik");
                        $form = [];
                        while ($row = mysqli_fetch_assoc($sql_form)) {
                            $form[] = $row;
                        }
                        $j = 1;
                        foreach ($form as $f) :
                    ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $f['nama_surat'] ?></td>
                                <td><?= $srt['jenis_surat'] ?></td>
                                <td><?= $srt['tgl_masuk'] ?></td>
                                <td><?= $srt['tgl_keluar'] ?></td>
                                <td><?= $f['status'] ?></td>
                                <td>
                                    <?php
                                    if ($f['status'] == "Proses") {
                                    ?>
                                        <div class="action">
                                            <a href="editform.php?form_id=<?= $f['form_id'] ?>"><i class="bx bxs-edit" style="font-size: 25px; color: #ffc801"></i></a>
                                            <a href="deleteform.php?form_id=<?= $f['form_id'] ?>"><i class="bx bxs-trash" style="font-size: 25px; color: #DF2E38"></i></a>
                                        </div>
                                    <?php
                                    } else if ($f['status'] == "Disetujui") {
                                    ?>
                                        <div class="action">
                                            <a href="../surat/<?= $f['nama_surat'] ?>.php?form_id=<?= $f['form_id'] ?>" target="_blank"><button>Unduh</button></a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php $j++;
                        endforeach; ?>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>