<?php
    require "../connect/db_connect.php";

    if(isset($_POST['submitform'])){
        $nosurat = "0";
        $nik = $_POST['nik'];
        $nokk = $_POST['nokk'];
        $nama = $_POST['nama'];
        $notelp = $_POST['notelp'];
        $tl = $_POST['tl'];
        $jk = $_POST['jk'];
        $agama = $_POST['agama'];
        $pekerjaan = $_POST['pekerjaan'];
        $wn = $_POST['wn'];
        $alamat = $_POST['alamat'];
        $fkk = strtolower(end(explode('.', $_FILES['fkk']['name'])));
        $fktp = strtolower(end(explode('.', $_FILES['fktp']['name'])));
        $ffoto = strtolower(end(explode('.', $_FILES['ffoto']['name'])));
        $surat = $_POST['surat'];
        $status = "Proses";

        $file_kk = "kk.$nama.$fkk";
        $file_ktp = "ktp.$nama.$fktp";
        $file_foto = "foto.$nama.$ffoto";
        $tmp_kk = $_FILES['fkk']['tmp_name'];
        $tmp_ktp = $_FILES['fktp']['tmp_name'];
        $tmp_foto = $_FILES['ffoto']['tmp_name'];

        $tgl_masuk = date('d-m-Y');

        if(is_uploaded_file($tmp_ktp) && file_exists($tmp_ktp)){
            move_uploaded_file($tmp_ktp, "../img/ktp/".$file_ktp);
        }else{
            $file_ktp = '';
        }

        if(is_uploaded_file($tmp_foto) && file_exists($tmp_foto)){
            move_uploaded_file($tmp_foto, "../img/foto/".$file_foto);
        }else{
            $file_foto = '';
        }

        if (move_uploaded_file($tmp_kk, "../img/kk/".$file_kk)) {
            $insert_form = "INSERT INTO forms VALUES ('', '$nosurat', '$nik', '$nokk', '$nama', '$notelp', '$tl', '$jk', '$agama', '$pekerjaan', '$wn', '$alamat', '$file_kk', '$file_ktp', '$file_foto', '$surat', '$status')";
            $result = $conn->query($insert_form);
    
            if ($result) {

                $fk_form_id = $conn->insert_id;
                $insert_surat = "INSERT INTO surat VALUES ('$fk_form_id', '$nik', 'Surat Pengantar', '$tgl_masuk', '0')";
                $result = $conn->query($insert_surat);

                echo "
                <script>
                    alert('Formulir Berhasil Diisi!');
                    document.location.href = 'hist.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Formulir Gagal Diisi!');
                </script>";
            }

        } else {
            echo "
            <script>
                alert('Formulir Gagal Diisi!');
            </script>";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Surat | Form</title>

    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="form">
        <div class="form-title">
            <p>Silahkan Isi Formulir Berikut</p>
        </div>
        <div class="form-box">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-box">
                    <label for="nik">NIK</label>
                    <input type="number" name="nik" class="textfield" placeholder="Masukan NIK" required>
                </div>
                <div class="input-box">
                    <label for="nokk">No KK</label>
                    <input type="number" name="nokk" class="textfield" placeholder="Masukan No. KK" required>
                </div>
                <div class="input-box">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" class="textfield" placeholder="Masukan Nama Lengkap" required>
                </div>
                <div class="input-box">
                    <label for="notelp">No. Telepon</label>
                    <input type="number" name="notelp" class="textfield" placeholder="Masukan No. Telepon" required>
                </div>
                <div class="input-box">
                    <label for="tl">Tanggal Lahir</label>
                    <input type="date" name="tl" class="textfield" placeholder="Masukan Tempat, Tanggal Lahir" required>
                </div>
                <div class="input-box">
                    <label for="jk">Jenis Kelamin</label>
                    <input type="text" name="jk" class="textfield" placeholder="Masukan Jenis Kelamin" required>
                </div>
                <div class="input-box">
                    <label for="agama">Agama</label>
                    <input type="text" name="agama" class="textfield" placeholder="Masukan Agama" required>
                </div>
                <div class="input-box">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="textfield" placeholder="Masukan Tempat, Tanggal Lahir" required>
                </div>
                <div class="input-box">
                    <label for="wn">Kewarganegaraan</label>
                    <input type="text" name="wn" class="textfield" placeholder="Masukan Kewarganegaraan" required>
                </div>
                <div class="input-box">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="textfield" placeholder="Masukan Alamat" required>
                </div>
                <div class="input-box">
                    <label for="fkk">Upload File KK</label>
                    <input type="file" name="fkk" class="filefield" placeholder="Upload File KK" required>
                </div>
                <div class="input-box">
                    <label for="fktp">Upload File KTP</label>
                    <input type="file" name="fktp" class="filefield" placeholder="Upload File KTP">
                </div>
                <div class="input-box">
                    <label for="ffoto">Upload File Foto 3x4</label>
                    <input type="file" name="ffoto" class="filefield" placeholder="Upload File Foto 3x4">
                </div>
                <div class="input-box">
                    <label for="surat">Pilih Surat</label>
                    <select name="surat">
                        <option value="Surat Pengantar e-KTP Baru">Surat Pengantar e-KTP Baru</option>
                        <option value="Surat Pengantar Nikah">Surat Pengantar Nikah</option>
                        <option value="Surat Pengantar Cerai">Surat Pengantar SKCK</option>
                    </select>
                </div>
                <input class="button" type="submit" value="Kirim" name="submitform">
            </form>
        </div>
    </div>
</body>
</html>