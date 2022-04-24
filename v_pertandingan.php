<html>
<head>
    <style>
        td {
            text-align: center
        }

        #customers {
            border-collapse: collapse;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<form action="c_pertandingan.php" method="post">
    <select name="klub" id="klub">
        <option disabled selected> Pilih pertandingan</option>
        <?php
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM jadwal WHERE skor1 IS NULL");
        while ($row = mysqli_fetch_array($rs)) {
            ?>
            <option value="<?= $row[5] ?>"><?= $row[0], ' vs ', $row[1], ' | ' ,$row[2],' | ID=',$row[5] ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" name="simpan" value="Simpan">
</form>
<section>
    <h2>Input skor</h2>
        <form action="c_pertandingan.php" method="post" name="update">
            Match ID : <input type='text' name='id' value='<?php
            if (isset($pertandinganid[0]["id_pertandingan"])) {
                echo $pertandinganid[0]["id_pertandingan"];
            } ?>'Readonly><br>
            Klub 1 : <input type='text' name='klub1' value='<?php
                if (isset($pertandinganid[0]["klub1"])) {
                    echo $pertandinganid[0]["klub1"];
                } ?>'Readonly>
            Klub 2 :<input type='text' name='klub2' value='<?php
                if (isset($pertandinganid[0]["klub2"])) {
                    echo $pertandinganid[0]["klub2"];
                } ?>'Readonly><br>
            Skor 1 :<input type='text' name='skor1' value='<?php
            if (isset($pertandinganid[0]["skor1"])) {
                echo $pertandinganid[0]["skor1"];
            } ?>'>
            Skor 2 :<input type='text' name='skor2' value='<?php
            if (isset($pertandinganid[0]["skor2"])) {
                echo $pertandinganid[0]["skor2"];
            } ?>'
            ><br>
            <input type="submit" name="update" value="Update">
    </form>
</section>

<p>Riwayat Pertandingan</p>
<table id="customers">
    <thead>
    <tr>
        <th>No</th>
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
            echo "<tr><td>" . ($i + 1) . "</td><td>" . $pertandingan[$i]["klub1"] . "</td><td>" . "belum" . "</td><td></td><td>" . "bertanding" . "</td><td>" .
                $pertandingan[$i]["klub2"] . "</td><td>" . $pertandingan[$i]["tanggal"] . "</td></tr>";
        } else {
            echo "<tr><td>" . ($i + 1) . "</td><td>" . $pertandingan[$i]["klub1"] . "</td><td>" . $pertandingan[$i]["skor1"] . "</td><td> - </td><td>" . $pertandingan[$i]["skor2"] . "</td><td>" .
                $pertandingan[$i]["klub2"] . "</td><td>" . $pertandingan[$i]["tanggal"] . "</td></tr>";
        }
    }
    ?>
    </tbody>
</table>
<a href="main.php" class="button button1"> Home</a>
<a href="c_jadwal.php" class="button button1"> Lihat Jadwal</a>
</html>