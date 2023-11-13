<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="../styles/sidebar.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
<nav>
        <div class="logo">
            <i class="bx bx-menu menu-icon" style="color: #2c444e;"></i>
            <span class="logo-name" style="color: #2c444e;">SukaMaju.</span>
        </div>
        <div class="sidebar">
            <div class="logo">
                <i class="bx bx-menu menu-icon" style="color: #ffc801;"></i>
                <span class="logo-name" style="color: #ffc801">SukaMaju.</span>
            </div>

            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="../views/dashboard.php" class="nav-link">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="link">Dashboard</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="bx bx-envelope icon"></i>
                            <span class="link">Surat Masuk</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../views/status.php" class="nav-link">
                            <i class="bx bx-bell icon"></i>
                            <span class="link">Status</span>
                        </a>
                    </li>
                </ul>

                <div class="bottom-cotent">
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="bx bx-moon icon" id="dark-mode"></i>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../views/index.php" class="nav-link">
                            <i class="bx bx-log-out icon"></i>
                            <span class="link">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </nav>

    <section class="overlay"></section>

    <script src="../scripts/script.js"></script>
</body>
</html>