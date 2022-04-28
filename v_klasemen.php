<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container3">
        <div class="images">
			<img src="1.png" class = "ball">
		</div>
    <h1>Klasemen Liga PW</h1>
    <h2>Juara grup : <?php echo $klasemen[0]["nama"]?></h2>
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
        <th>Gol Kemasukan</th>
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
    <a href="main.php" class="button1"> Home</a>
    <a href="c_jadwal.php" class="button"> Lihat Jadwal</a>
</div>
</body>
</html>