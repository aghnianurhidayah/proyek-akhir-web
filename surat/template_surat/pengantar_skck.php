<?php
    require "../connect/db_connect.php";

    $form_id = $_GET['form_id'];

    $get = mysqli_query($conn, "SELECT * FROM forms WHERE form_id = $form_id");

    $form = [];
    while ($row = mysqli_fetch_assoc($get)){
        $form[] = $row;
    }

    $form = $form[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar SKCK</title>

</head>
<body style="margin: 0px 50px;">
    <div class="header-surat" style="border-bottom: 2px solid black; text-align: center;">
        <h4 style="font-size: 18px; margin-bottom: 5px;">PEMERINTAHAN DESA SUKA MAJU<br>KECAMATAN KONGBENG KABUPATEN KUTAI TIMUR</h4>
        <p style="font-size: 12px;"><i>Alamat: Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, eos.</i></p>
    </div>
    <div class="title-surat">
        <h4 style="font-size: 18px; text-align: center;">SURAT PENGANTAR KETERANGAN CATATAN KEPOLISIAN</h4>
    </div>
    <div class="content-surat" style="font-size: 18px; margin: 50px 0">
        <p>Yang bertanda tangan di bawah Kepala Desa Suka Maju Kecamatan Kongbeng Kabupaten Kutai Timur, menerangkan bahwa:</p>
        <table style="width: 100%;">
            <tr>
                <td style="width: 35%; text-align: left; padding-left: 20px; padding-bottom: 6px;">Nama Lengkap</td>
                <td style="padding-bottom: 6px;">: <?= $form['nama'] ?></td>
            </tr>
            <tr>
                <td style="width: 35%; text-align: left; padding-left: 20px; padding-bottom: 6px;">NIK</td>
                <td style="padding-bottom: 6px;">: <?= $form['nik'] ?></td>
            </tr>
            <tr>
                <td style="width: 35%; text-align: left; padding-left: 20px; padding-bottom: 6px;">Tempat/Tanggal Lahir</td>
                <td style="padding-bottom: 6px;">: <?= $form['tgl_lahir'] ?></td>
            </tr>
            <tr>
                <td style="width: 35%; text-align: left; padding-left: 20px; padding-bottom: 6px;">Jenis Kelamin</td>
                <td style="padding-bottom: 6px;">: <?= $form['jenis_kelamin'] ?></td>
            </tr>
            <tr>
                <td style="width: 35%; text-align: left; padding-left: 20px; padding-bottom: 6px;">Pekerjaan</td>
                <td style="padding-bottom: 6px;">: <?= $form['pekerjaan'] ?></td>
            </tr>
            <tr>
                <td style="width: 35%; text-align: left; padding-left: 20px; padding-bottom: 6px;">Agama</td>
                <td style="padding-bottom: 6px;">: <?= $form['agama'] ?></td>
            </tr>
            <tr>
                <td style="width: 35%; text-align: left; padding-left: 20px; padding-bottom: 6px;">Alamat</td>
                <td style="padding-bottom: 6px;">: <?= $form['alamat'] ?></td>
            </tr>
        </table>
        <p>Adalah anggota masyarakat Desa Suka Maju yang berdomisili di alamat tersebut dan berkelakukan baik di masyarakat. Surat ini dibuat untuk keperluan pengurusan SKCK. </p>
        <p>Demikian surat pengantar ini dibuat dan diserahkan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>
    <div class="sign-surat" style="font-size: 18px; margin-top: 40px; justify-content: flex-end;">
        <p style="margin-bottom: 120px;;">Dikeluarkan Di Desa Suka Maju<br>Pada Tanggal<br>Kepala Desa Suka Maju</p>
        <h5>BUDIONO SIREGAR</h5>
    </div>
</body>
</html>