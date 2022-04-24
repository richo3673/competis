<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">

    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Daftar Klub Liga PW</p>
    <table id="customers">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Klub</th>
            <th>Stadion Kandang</th>
            <th>Manager</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //    echo "<table><tr>",
        //    "<td>.$proker[0][nomorProgram].</td>",
        //    "<td>$proker[0][namaProgram]</td>",
        //    "<td>$proker[0][suratKeterangan]</td>",
        //    "</tr></table>";
        $count = count($klub); //this will give you the count of elements of your array...
        for ($i = 0; $i < $count; $i++) //loop through the array..
        {
            echo "<tr><td>".($i+1)."</td><td>" . $klub[$i]["nama"] . "</td><td>" . $klub[$i]["stadion"] . "</td><td>" .
                $klub[$i]["manager"] ;
        }

        ?>
        </tbody>
    </table>
</div>
<div class="container2">
    <form action="c_klub.php" method="post" name="input">
        <p class="input-group">
            <h2>Tambahkan klub</h2>
        <p>Nama Klub: &emsp;&emsp;<input type="text" name="nama" required><br></p>
            <p>Stadion Kandang :<input type="text" name="stadion" required><br></p>
            <p>Manager :&emsp;&emsp;&emsp; <input type="text" name="manager" required><br></p>
            <input type="submit" name="input" value="Input" class="button button2" >
    </form>
</body>

<a href="c_jadwal.php" class="button button1"> Lihat Jadwal</a>
<a href="c_klasemen.php" class="button button1"> Lihat Klasemen</a>
</div>
</div>
</html>