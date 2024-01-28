<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function.php';

///ambil data url
$id = $_GET['id'];

//query id
$phone = query("SELECT * FROM phone WHERE id = $id")[0];

//cek submit input or not submit
if (isset($_POST["submit"])) {

    //cek data berhasil di UBAH/tidak
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil di Ubah!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data Gagal di Ubah!');
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
    <title>Ubah data Hp</title>
</head>
<body>
    <h1>Ubah Data Hp</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$phone["id"];?>">
        <input type="hidden" name="gambarLama" value="<?=$phone["gambar"];?>">
        <ul>
            <li>
                <label for="merek">Merek : </label>
                <input type="text" name="merek" id="merek" required value="<?=$phone["merek"];?>">
            </li>
            <li>
                <label for="model">Model : </label>
                <input type="text" name="model" id="model" value="<?=$phone["model"];?>">
            </li>
            <li>
                <label for="ram">Ram : </label>
                <input type="text" name="ram" id="ram" value="<?=$phone["ram"];?>">
            </li>
            <li>
                <label for="warna">Warna : </label>
                <input type="text" name="warna" id="warna" value="<?=$phone["warna"];?>">
            </li>
            <li>
                <label for="penyimpanan">Penyimpanan : </label>
                <input type="text" name="penyimpanan" id="penyimpanan" value="<?=$phone["penyimpanan"];?>">
            </li>
            <li>
                <label for="harga">Harga : </label>
                <input type="text" name="harga" id="harga" value="<?=$phone["harga"];?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <img src="img/<?=$phone['gambar'];?>" width="40"> <br>
                <input type="file" name="gambar" id="gambar" >
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>
    </form>
</body>
</html>
