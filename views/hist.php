<?php
    require "../connect/db_connect.php";

    $sql_surat = mysqli_query($conn, "SELECT * FROM surat");

    $surat = [];
    while ($row = mysqli_fetch_assoc($sql_surat)){
        $surat[] = $row;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Surat | Riwayat Surat</title>

    <link rel="stylesheet" href="../styles/style.css">
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
                        <th>Surat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($surat as $srt) :
                        $sql_form = mysqli_query($conn, "SELECT * FROM forms WHERE form_id = $srt[fk_form_id]");
                        $form = [];
                        while ($row = mysqli_fetch_assoc($sql_form)){
                            $form[] = $row;
                        }
                        $j = 1; foreach ($form as $f) :
                    ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $f['nama_surat']?></td>
                        <td><?= $srt['jenis_surat']?></td>
                        <td><?= $srt['tgl_masuk']?></td>
                        <td><?= $srt['tgl_keluar']?></td>
                        <td><?= $f['status']?></td>
                        <td><a href="../surat/<?= $f['nama_surat']?>.php?form_id=<?= $f['form_id']?>" target="_blank"><button>Unduh</button></a></td>
                    </tr>
                    <?php $j++; endforeach; ?>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>