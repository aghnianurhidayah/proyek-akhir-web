<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <nav>
    <div class="nav-logo">
      <h3>e-SukMa</h3>
    </div>
    <div class="nav-items">
      <?php
      if (!isset($_SESSION['role'])) {
      ?>
        <a href="login.php" class="button">Login</a>
        <?php
      }
      if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "admin") {
        ?>
          <a href="logout.php" class="button">Logout</a>
        <?php
        } else if ($_SESSION['role'] == "user") {
        ?>
          <a href="menu.php">Menu</a>
          <a href="hist.php">Riwayat</a>
          <a href="logout.php" class="button">Logout</a>
        <?php
        }
        ?>
      <?php
      }
      ?>
    </div>
  </nav>
</body>

</html>