<?php
require 'function.php';
//cek submit input or not submit
if (isset($_POST["submit"])) {

    //cek data berhasil di tambah/tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil di tambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data Gagal di tambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data Hp</title>
</head>
<body>
    <h1>Tambah Data Hp</h1>
    <form action="#" method="post">
<ul>
    <li>
        <label for="merek">Merek : </label>
        <input type="text" name="merek" id="merek" required>
    </li>
    <li>
        <label for="model">Model : </label>
        <input type="text" name="model" id="model">
    </li>
    <li>
        <label for="ram">Ram : </label>
        <input type="text" name="ram" id="ram">
    </li>
    <li>
        <label for="warna">Warna : </label>
        <input type="text" name="warna" id="warna">
    </li>
    <li>
        <label for="penyimpanan">Penyimpanan : </label>
        <input type="text" name="penyimpanan" id="penyimpanan">
    </li>
    <li>
        <label for="harga">Harga : </label>
        <input type="text" name="harga" id="harga">
    </li>
    <li>
        <label for="gambar">Gambar : </label>
        <input type="text" name="gambar" id="gambar">
    </li>
    <li>
        <button type="submit" name="submit">Tambah Data!</button>
    </li>
</ul>
    </form>
</body>
</html>
