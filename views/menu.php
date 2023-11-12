<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Surat | Menu</title>

    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <div class="menu">
        <div class="greeting-text">
            <p>Selamat Datang, !</p>
        </div>
        <div class="menu-box">
            <a href="form_keterangan.php">
                <div class="menu-item">
                    <div class="box">
                        <img src="../assets/copy.png" alt="">
                    </div>
                    <p>Surat<br>Keterangan</p>
                </div>
            </a>
            <a href="form_pengantar.php">
                <div class="menu-item">
                    <div class="box">
                        <img src="../assets/copy.png" alt="">
                    </div>
                    <p>Surat<br>Pengantar</p>
                </div>
            </a>
            <a href="form_pernyataan.php">
                <div class="menu-item">
                    <div class="box">
                        <img src="../assets/copy.png" alt="">
                    </div>
                    <p>Surat<br>Pernyataan</p>
                </div>
            </a>
        </div>
    </div>
</body>
</html>