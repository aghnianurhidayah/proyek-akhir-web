<?php
session_start();
require "../connect/db_connect.php";

$form_id = $_GET['form_id'];
$get = mysqli_query($conn, "SELECT * FROM forms JOIN surat ON forms.form_id = surat.fk_form_id WHERE form_id = $form_id");
$form = [];

while ($row = mysqli_fetch_assoc($get)) {
    $form[] = $row;
}
$form = $form[0];

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['editform'])) {
    $status = $_POST['status'];

    $update_form = "UPDATE forms SET status = '$status' WHERE form_id = '$form_id'";
    $result = $conn->query($update_form);

    if ($result) {
        echo "
                <script>
                    alert('Status Berhasil Diubah!');
                    document.location.href = 'hist.php';
                </script>";
    } else {
        echo "
                <script>
                    alert('Status Gagal Diubah!');
                </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/status.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>

    <?php include 'sidebar.php'; ?>

    <section class="main-content">
        <div class="content">
            <div class="left">
                <div class="container">
                    <h3>Keterangan Surat</h3>
                </div>
                <div class="main">
                    <br>
                    <p>NIK          : <?= $form['nik']?></p>
                    <p>Nama Lengkap : <?= $form['nama']?></p>
                    <p>Nama Surat   : <?= $form['nama_surat']?></p>
                    <p>Jenis Surat  : <?= $form['jenis_surat']?></p>
                    <form action="" method="post">
                        <div class="status-select">
                            <!-- <label for="surat">Status</label> -->
                            <select name="surat" id="surat" required>
                                <option value="Proses" selected>Proses</option>
                                <option value="Setuju">Disetujui</option>
                                <option value="Tolak">Ditolak</option>
                            </select>
                            <br><br>
                            <input class="button" type="submit" value="Kirim">
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="container">
                    <h3>Preview File</h3>
                </div>
                <div class="display">
                    <iframe src="../surat/<?= $form['nama_surat']?>.php?form_id=<?= $form['form_id']?>" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </section>

    <script src="../scripts/script.js"></script>
</body>

</html>