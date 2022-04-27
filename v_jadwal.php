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
    Nama Klub 1: &emsp;&emsp;<select name="klub1" id="klub1" onchange="testFunc(1)">
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
        function testFunc(a){
            undisable(a);
            var text = '';
            var text2 = '';
            if(a==1){
                text = 'klub1';
                text2 = 'klub2';
            }
            else{
                text = 'klub2';
                text2 = 'klub1';
            }
            var select = document.getElementById(text);
            var value = select.selectedIndex;
            var select2 = document.getElementById(text2);
            var op = select2.getElementsByTagName("option");
            op[value].disabled = true;
        }

        function undisable(a){
            var text = '';
            if(a==1){
                text='klub2';
            }
            else{
                text='klub1'
            }
            var op = document.getElementById(text).getElementsByTagName("option");
                for (var i = 0; i < op.length; i++) {
                    op[i].disabled = false ;
                }
        }
    </script>
    Nama Klub 2: &emsp;&emsp;<select name="klub2" id="klub2" onchange="testFunc(2)">
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
    <p>Tanggal :&emsp;&emsp;&emsp;&emsp;<input type="date" name="tanggal" required><br></p>
    <input type="submit" name="input" value="Input" class="button button2">
</form>
<a href="main.php" class="button button1"> Kembali</a>
<a href="c_pertandingan.php" class="button button1"> Lihat Pertandingan</a>
</body>
</html>
