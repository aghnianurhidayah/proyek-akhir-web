<?php
require "../connect/db_connect.php";

if (isset($_POST['submitform'])) {
    $nosurat = "0";
    $nik = $_POST['nik'];
    $nokk = $_POST['nokk'];
    $nama = $_POST['nama'];
    $tl = $_POST['tl'];
    $tk = $_POST['tk'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];
    $ayah = $_POST['ayah'];
    $ibu = $_POST['ibu'];
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

    if (move_uploaded_file($tmp_kk, "../img/kk/" . $file_kk) || move_uploaded_file($tmp_ktp, "../img/ktp/" . $file_ktp) || move_uploaded_file($tmp_foto, "../img/foto/" . $file_foto)) {
        $insert_form = "INSERT INTO forms VALUES ('', '$nosurat', '$nik', '$nokk', '$nama', '$tl', '$tk', '$jk', '$agama', '$alamat', '$pekerjaan', '$ayah', '$ibu', '$file_kk', '$file_ktp', '$file_foto', '$surat', '$status')";
        $result = $conn->query($insert_form);

        if ($result) {

            $fk_form_id = $conn->insert_id;
            $insert_surat = "INSERT INTO surat VALUES ('$fk_form_id', '$nik', 'Surat Keterangan', '$tgl_masuk', '0')";
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
                    <label for="surat">Pilih Surat</label>
                    <select name="surat" onchange="getValue(this)">
                        <option value="">Pilih Surat</option>
                        <option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran</option>
                        <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                        <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                        <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                    </select>
                </div>
                <div class="input-box d-none" id="input-nik">
                    <label for="nik">NIK</label>
                    <input type="number" name="nik" class="textfield" placeholder="Masukan NIK" required>
                </div>
                <div class="input-box d-none" id="input-nokk">
                    <label for="nokk">No KK</label>
                    <input type="number" name="nokk" class="textfield" placeholder="Masukan No. KK" required>
                </div>
                <div class="input-box d-none" id="input-nama">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" class="textfield" placeholder="Masukan Nama Lengkap" required>
                </div>
                <div class="input-box d-none" id="input-tl">
                    <label for="tl">Tanggal Lahir</label>
                    <input type="date" name="tl" class="textfield" placeholder="Masukan Tanggal Lahir" required>
                </div>
                <div class="input-box d-none" id="input-tk">
                    <label for="tl">Tanggal Kematian</label>
                    <input type="date" name="tk" class="textfield" placeholder="Masukan Tanggal Kematian" required>
                </div>
                <div class="input-box d-none" id="input-jk">
                    <label for="jk">Jenis Kelamin</label>
                    <select name="jk">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="input-box d-none" id="input-agama">
                    <label for="agama">Agama</label>
                    <select name="agama">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="input-box d-none" id="input-alamat">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="textfield" placeholder="Masukan Alamat" required>
                </div>
                <div class="input-box d-none" id="input-pekerjaan">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="textfield" placeholder="Masukan Pekerjaan" required>
                </div>
                <div class="input-box d-none" id="input-wn">
                    <label for="wn">Kewarganegaraan</label>
                    <input type="text" name="wn" class="textfield" placeholder="Masukan Kewarganegaraan" required>
                </div>
                <div class="input-box d-none" id="input-ayah">
                    <label for="ayah">Nama Ayah Kandung</label>
                    <input type="text" name="ayah" class="textfield" placeholder="Masukan Nama Ayah" required>
                </div>
                <div class="input-box d-none" id="input-ibu">
                    <label for="ibu">Nama Ibu Kandung</label>
                    <input type="text" name="ibu" class="textfield" placeholder="Masukan Nama Ibu" required>
                </div>
                <div class="input-box d-none" id="input-fkk">
                    <label for="fkk">Upload File KK</label>
                    <input type="file" name="fkk" class="filefield" placeholder="Upload File KK">
                </div>
                <div class="input-box d-none" id="input-fktp">
                    <label for="fktp">Upload File KTP</label>
                    <input type="file" name="fktp" class="filefield" placeholder="Upload File KTP">
                </div>
                <div class="input-box d-none" id="input-ffoto">
                    <label for="ffoto">Upload File Foto 3x4</label>
                    <input type="file" name="ffoto" class="filefield" placeholder="Upload File Foto 3x4">
                </div>
                <input class="button" type="submit" value="Kirim" name="submitform">
            </form>
        </div>
    </div>


    <script>
        function getValue(answer) {
            if (answer.value == "Surat Keterangan Kelahiran") {
                document.getElementById('input-nik').classList.add('d-none');
                document.getElementById('input-nokk').classList.remove('d-none');
                document.getElementById('input-nama').classList.remove('d-none');
                document.getElementById('input-tl').classList.remove('d-none');
                document.getElementById('input-tk').classList.add('d-none');
                document.getElementById('input-jk').classList.remove('d-none');
                document.getElementById('input-agama').classList.remove('d-none');
                document.getElementById('input-alamat').classList.remove('d-none');
                document.getElementById('input-pekerjaan').classList.add('d-none');
                document.getElementById('input-wn').classList.remove('d-none');
                document.getElementById('input-ayah').classList.remove('d-none');
                document.getElementById('input-ibu').classList.remove('d-none');
                document.getElementById('input-fkk').classList.remove('d-none');
                document.getElementById('input-fktp').classList.add('d-none');
                document.getElementById('input-ffoto').classList.add('d-none');
            } else if (answer.value == "Surat Keterangan Kematian") {
                document.getElementById('input-nik').classList.remove('d-none');
                document.getElementById('input-nokk').classList.remove('d-none');
                document.getElementById('input-nama').classList.remove('d-none');
                document.getElementById('input-tl').classList.add('d-none');
                document.getElementById('input-tk').classList.remove('d-none');
                document.getElementById('input-jk').classList.remove('d-none');
                document.getElementById('input-agama').classList.remove('d-none');
                document.getElementById('input-alamat').classList.remove('d-none');
                document.getElementById('input-pekerjaan').classList.add('d-none');
                document.getElementById('input-wn').classList.add('d-none');
                document.getElementById('input-ayah').classList.add('d-none');
                document.getElementById('input-ibu').classList.add('d-none');
                document.getElementById('input-fkk').classList.remove('d-none');
                document.getElementById('input-fktp').classList.add('d-none');
                document.getElementById('input-ffoto').classList.add('d-none');
            } else if (answer.value == "Surat Keterangan Domisili") {
                document.getElementById('input-nik').classList.remove('d-none');
                document.getElementById('input-nokk').classList.remove('d-none');
                document.getElementById('input-nama').classList.remove('d-none');
                document.getElementById('input-tl').classList.remove('d-none');
                document.getElementById('input-tk').classList.add('d-none');
                document.getElementById('input-jk').classList.remove('d-none');
                document.getElementById('input-agama').classList.remove('d-none');
                document.getElementById('input-alamat').classList.remove('d-none');
                document.getElementById('input-pekerjaan').classList.add('d-none');
                document.getElementById('input-wn').classList.remove('d-none');
                document.getElementById('input-ayah').classList.add('d-none');
                document.getElementById('input-ibu').classList.add('d-none');
                document.getElementById('input-fkk').classList.remove('d-none');
                document.getElementById('input-fktp').classList.remove('d-none');
                document.getElementById('input-ffoto').classList.add('d-none');
            } else if (answer.value == "Surat Keterangan Tidak Mampu") {
                document.getElementById('input-nik').classList.remove('d-none');
                document.getElementById('input-nokk').classList.remove('d-none');
                document.getElementById('input-nama').classList.remove('d-none');
                document.getElementById('input-tl').classList.remove('d-none');
                document.getElementById('input-tk').classList.add('d-none');
                document.getElementById('input-jk').classList.remove('d-none');
                document.getElementById('input-agama').classList.remove('d-none');
                document.getElementById('input-alamat').classList.remove('d-none');
                document.getElementById('input-pekerjaan').classList.remove('d-none');
                document.getElementById('input-wn').classList.add('d-none');
                document.getElementById('input-ayah').classList.add('d-none');
                document.getElementById('input-ibu').classList.add('d-none');
                document.getElementById('input-fkk').classList.remove('d-none');
                document.getElementById('input-fktp').classList.remove('d-none');
                document.getElementById('input-ffoto').classList.add('d-none');
            }
        };
    </script>

</body>

</html>