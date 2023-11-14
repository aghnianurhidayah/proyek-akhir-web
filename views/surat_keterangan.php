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
    <title>Admin | Surat Keterangan</title>

</head>
<body>

    <div class="hist">
        <div class="hist-text">
            <p>Surat Keterangan</p>
        </div>
        <div class="hist-table">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Surat</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Status</th>
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
                    </tr>
                    <?php $j++; endforeach; ?>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>