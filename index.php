<?php
require 'index-2.php';

$phone = query("SELECT * FROM phone");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daftar hp</title>
</head>
<body>
    <h1>Daftar Hp</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>
                No.
            </th>
            <th>
                Aksi
            </th>
            <th>
                Gambar
            </th>
            <th>
                Merek
            </th>
            <th>
                Model
            </th>
            <th>
                Ram
            </th>
            <th>
                Warna
            </th>
            <th>
                Penyimpanan
            </th>
            <th>
                Harga
            </th>

        </tr>
        <?php $i = 1;?>
        <?php foreach ($phone as $row): ?>
        <tr>
            <td><?=$i;?></td>
            <td>
                <a href=""">ubah</a>
                <a href=""">Hapus</a>
            </td>
            <td>
            <img src="img/<?php echo $row["gambar"]; ?>"  width="50" alt="#">
            </td>
            <td><?=$row["merek"];?></td>
            <td><?=$row["model"];?></td>
            <td><?=$row["ram"];?></td>
            <td><?=$row["warna"];?></td>
            <td><?=$row["penyimpanan"];?></td>
            <td><?=$row["harga"];?></td>

        </tr>
        <?php $i++;?>
        <?php endforeach;?>

    </table>
</body>
</html>
