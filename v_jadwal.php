<html>
<head>
</head>
<body>
<div class="container2">

    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Jadwal Pertandingan</p>
    <table id="customers">
        <thead>
        <tr>
            <th>No</th>
            <th>Klub 1</th>
            <th>&emsp;</th>
            <th>&emsp;Klub 2</th>
            <th>Nomor Pertandingan</th>
            <th>Tanggal</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $count = count($jadwal); //this will give you the count of elements of your array...
        for ($i = 0; $i < $count; $i++) //loop through the array..
        {
            echo "<tr><td>" . ($i + 1) . "</td><td>" . $jadwal[$i]["klub1"] . "</td><td> vs </td><td>" . $jadwal[$i]["klub2"] . "</td><td>" .
                $jadwal[$i]["id_pertandingan"] . "</td><td>" . $jadwal[$i]["tanggal"] . "</td></tr>";
        }

        ?>
        </tbody>
    </table>
</div>



<form action="c_jadwal.php" method="post" name="input">
    <h2>Tambahkan jadwal</h2>
    Nama Klub 1: &emsp;&emsp;<select name="klub1" id="klub1">
        <option disabled selected> Pilih klub</option>
        <?php
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM klub");
        while ($row = mysqli_fetch_array($rs)) {
            ?>
            <option><?= $row[0] ?></option>
            <?php
        }
        ?>
    </select>
    Nama Klub 2: &emsp;&emsp;<select name="klub2" id="klub2">
        <option disabled selected> Pilih klub</option>
        <?php
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM klub");
        while ($row = mysqli_fetch_array($rs)) {
            ?>
                <option><?= $row[0] ?></option>
                <?php
            }
        ?>
    </select>
    <p>Tanggal :&emsp;&emsp;&emsp;&emsp;<input type="text" name="tanggal" required><br></p>
    <input type="submit" name="input" value="Input" class="button button2">
</form>
<a href="main.php" class="button button1"> Kembali</a>
<a href="c_pertandingan.php" class="button button1"> Lihat Pertandingan</a>
</body>
</html>