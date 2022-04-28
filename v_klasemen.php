<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <a href="main.php" class="back"></a>
    <div class="dropdown2">
        <button class="dropbtn">Menu
        </button>
        <div class="dropdown-content">
            <a href="main.php">Klub</a>
            <a href="c_jadwal.php">Jadwal</a>
            <a href="c_pertandingan.php">Pertandingan</a>
        </div>
    </div>
    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Klasemen Liga PW</p>
    <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">Juara grup : <?php echo $klasemen[0]["nama"]?></p>
<table id="klasemen">
    <thead>
    <tr>
        <th>Peringkat</th>
        <th>Klub</th>
        <th>Poin</th>
        <th>Menang</th>
        <th>Kalah</th>
        <th>Seri</th>
        <th>Gol Cetak</th>
        <th>Gol Masuk</th>
        <th>Selisih Gol</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $count = count($klasemen); //this will give you the count of elements of your array...
    for ($i = 0; $i < $count; $i++) //loop through the array..
    {
        echo "<tr><td>".($i+1)."</td><td>" . $klasemen[$i]["nama"] . "</td><td>" . $klasemen[$i]["poin"] . "</td><td>" .
            $klasemen[$i]["jumlahmenang"] . "</td><td>" . $klasemen[$i]["jumlahkalah"] . "</td><td>" .
            $klasemen[$i]["jumlahseri"] . "</td><td>" . $klasemen[$i]["jumlahgol"] . "</td><td>" .
            $klasemen[$i]["jumlahkebobol"] . "</td><td>" . ($klasemen[$i]["selisihgol"]) . "</td></tr>";
    }

    ?>
    </tbody>
</table>
</div>
</div>
</body>
</html>