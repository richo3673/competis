<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container">
    <a href="c_jadwal.php" class="back"></a>
    <div class="dropdown">
        <button class="dropbtn">Menu
        </button>
        <div class="dropdown-content">
            <a href="index.php">Klub</a>
            <a href="c_jadwal.php">Jadwal</a>
            <a href="c_klasemen.php">Klasemen</a>
        </div>
    </div>
    <p class="header">Riwayat Pertandingan</p>
    <div style="width: 55%; float:left">
        <table id="list">
            <thead>
            <tr>
                <th>Klub 1</th>
                <th>Skor 1</th>
                <th></th>
                <th>Skor 2</th>
                <th>Klub 2</th>
                <th>Tanggal</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $count = count($pertandingan); //this will give you the count of elements of your array...
            for ($i = 0; $i < $count; $i++) //loop through the array..
            {
                if (!isset($pertandingan[$i]["skor1"])) {
                    echo "</td><td>" . $pertandingan[$i]["klub1"] . "</td><td>" . "belum" . "</td><td></td><td>" . "tanding" . "</td><td>" .
                        $pertandingan[$i]["klub2"] . "</td><td>" . $pertandingan[$i]["tanggal"] . "</td></tr>";
                } else {
                    echo "</td><td>" . $pertandingan[$i]["klub1"] . "</td><td>" . $pertandingan[$i]["skor1"] . "</td><td> - </td><td>" . $pertandingan[$i]["skor2"] . "</td><td>" .
                        $pertandingan[$i]["klub2"] . "</td><td>" . $pertandingan[$i]["tanggal"] . "</td></tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <div style="width: 34%; float:right; margin-top:-10px">
        <form action="c_pertandingan.php" method="post" class="inputan">
            <div class="input-group">
                <h2>Input skor</h2>
                <select name="klub" id="klub" required>
                    <option value="">Pilih pertandingan</option>
                    <?php
                    global $mysqli;
                    $rs = $mysqli->query("SELECT * FROM jadwal WHERE skor1 IS NULL");
                    while ($row = mysqli_fetch_array($rs)) {
                        ?>
                        <option value="<?= $row[5] ?>"><?= $row[0], ' vs ', $row[1], ' | ', $row[2], ' | ID=', $row[5] ?> </option>
                        <?php
                    }
                    ?>

                </select>
                <input type="submit" name="simpan" value="Simpan" class="btn2">
        </form>
        <form action="c_pertandingan.php" method="post" name="update">
            Match ID : <input type='text' name='id' value='<?php
            if (isset($pertandinganid[0]["id_pertandingan"])) {
                echo $pertandinganid[0]["id_pertandingan"];
            } ?>' Readonly><br>
            <div style="width: 45%; float:left">
                Klub 1 : <input type='text' name='klub1' value='<?php
                if (isset($pertandinganid[0]["klub1"])) {
                    echo $pertandinganid[0]["klub1"];
                } ?>' Readonly>
                Skor 1 :<input type='text' name='skor1' value='<?php
                if (isset($pertandinganid[0]["skor1"])) {
                    echo $pertandinganid[0]["skor1"];
                } ?>' required>
            </div>
            <div style="width: 45%; float:right;">
                Klub 2 :<input type='text' name='klub2' value='<?php
                if (isset($pertandinganid[0]["klub2"])) {
                    echo $pertandinganid[0]["klub2"];
                } ?>' Readonly><br>
                Skor 2 :<input type='text' name='skor2' value='<?php
                if (isset($pertandinganid[0]["skor2"])) {
                    echo $pertandinganid[0]["skor2"];
                } ?>'
                required><br>
            </div>
            <input type="submit" name="update" value="Update" class="btn2">
        </form>
    </div>
</body>
</html>