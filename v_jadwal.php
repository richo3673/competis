<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container">
    <a href="main.php" class="back"></a>
    <div class="dropdown2">
        <button class="dropbtn">Menu
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="main.php">Klub</a>
            <a href="c_pertandingan.php">Pertandingan</a>
            <a href="c_klasemen.php">Klasemen</a>
        </div>
    </div>
    <p class="jadwal">Jadwal Pertandingan</p>
    <div style="width: 55%; float:left">
        <table id="klub">
            <thead>
            <tr>
                <th>No</th>
                <th>Klub 1</th>
                <th>&emsp;</th>
                <th>&emsp;Klub 2</th>
                <th>Nomor</th>
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
    <div style="width: 35%; float:right; margin-top:-10px">
        <form action="c_jadwal.php" method="post" name="input" class="login-email">
            <div class="input-group">
            <h2>Tambahkan jadwal</h2>
                <div style="width: 50%; float:left">
            Nama Klub 1<select name="klub1" id="klub1" onchange="testFunc(1)" class="button2">
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
            <script>
                function testFunc(a) {
                    undisable(a);
                    var text = '';
                    var text2 = '';
                    if (a == 1) {
                        text = 'klub1';
                        text2 = 'klub2';
                    } else {
                        text = 'klub2';
                        text2 = 'klub1';
                    }
                    var select = document.getElementById(text);
                    var value = select.selectedIndex;
                    var select2 = document.getElementById(text2);
                    var op = select2.getElementsByTagName("option");
                    op[value].disabled = true;
                }

                function undisable(a) {
                    var text = '';
                    if (a == 1) {
                        text = 'klub2';
                    } else {
                        text = 'klub1'
                    }
                    var op = document.getElementById(text).getElementsByTagName("option");
                    for (var i = 0; i < op.length; i++) {
                        op[i].disabled = false;
                    }
                }
            </script>
                <br>
                </div>
                <div style="width: 40%; float:right">
            Nama Klub 2<select name="klub2" id="klub2" onchange="testFunc(2)" class="button2">
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
                </div>
            <p style="margin-top: 90px">Tanggal :<input type="date" name="tanggal" required><br></p>
            <input type="submit" name="input" value="Input" class="btn">
            </div>
        </form>
    </div>
</div>
</body>
</html>
