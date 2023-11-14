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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>
                        <a href=""><i class="bx bxs-edit" style="font-size: 25px; color: #ffc801"></i></a>
                        <a href=""><i class="bx bxs-trash" style="font-size: 25px; color: #DF2E38"></i></a>
                    </td>
                </tbody>
            </table>
        </div>
    </section>

    <script src="../scripts/script.js"></script>
</body>

</html>