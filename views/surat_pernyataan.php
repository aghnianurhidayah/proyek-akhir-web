<?php
require "../connect/db_connect.php";

$sql_surat = mysqli_query($conn, "SELECT * FROM surat");

$surat = [];
while ($row = mysqli_fetch_assoc($sql_surat)) {
    $surat[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Surat Pernyataan</title>
    <link rel="stylesheet" href="../styles/adminsurat.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

</head>

<body>

    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <div class="header">
            <h2>Surat Pernyataan</h2>
            <br>
        </div>
        <div class="container">
            <div class="card-container">
                <h3>Jumlah Surat Masuk</h3>
                <br>
            </div>
            <div class="chart">
                <div id="myPlot"></div>
            </div>

            <script>
                const xArray = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"];
                const yArray = [5, 3, 7, 5, 10];

                // Define Data
                const data = [{
                    x: xArray,
                    y: yArray,
                    mode: "line"
                }];

                // Define Layout
                const layout = {
                    xaxis: {
                        title: "Hari"
                    },
                    yaxis: {
                        range: [1, 12],
                        title: "Keterangan"
                    }
                };

                // Display using Plotly
                Plotly.newPlot("myPlot", data, layout);
            </script>


        </div>
    </div>
</body>

</html>