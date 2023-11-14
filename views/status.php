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
                    <p>NIK : </p>
                    <p>Nama Lengkap : </p>
                    <p>Nama Surat : </p>
                    <p>Jenis Surat : </p>
                    <div class="status-select">
                        <select required>
                            <option value="Proses" selected>Proses</option>
                            <option value="Setuju">Disetujui</option>
                            <option value="Tolak">Ditolak</option>
                        </select>
                        <br><br>
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="container">
                    <h3>Preview File</h3>
                </div>
            </div>
        </div>
    </section>

    <script src="../scripts/script.js"></script>
</body>

</html>