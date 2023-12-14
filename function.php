<?php
//connect database
$conn = mysqli_connect("localhost", "root", "", "phpnative");

//fetch data from database
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;

    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    //ambil data dari tiap elment
    //htmlspecialchars agar tidak di style dari data
    $merek = htmlspecialchars($data["merek"]);
    $model = htmlspecialchars($data["model"]);
    $ram = htmlspecialchars($data["ram"]);
    $warna = htmlspecialchars($data["warna"]);
    $penyimpanan = htmlspecialchars($data["penyimpanan"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambar = htmlspecialchars($data["gambar"]);

    //query insert data
    $query = "INSERT INTO phone
        VALUES
        ('', '$merek', '$model', '$ram', '$warna', '$penyimpanan', '$harga', '$gambar')
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM phone WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    //ambil data dari tiap elment
    //htmlspecialchars agar tidak di style dari data
    $id = $data["id"];
    $merek = htmlspecialchars($data["merek"]);
    $model = htmlspecialchars($data["model"]);
    $ram = htmlspecialchars($data["ram"]);
    $warna = htmlspecialchars($data["warna"]);
    $penyimpanan = htmlspecialchars($data["penyimpanan"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambar = htmlspecialchars($data["gambar"]);

    //query insert data
    $query = "UPDATE phone SET
                merek = '$merek',
                model = '$model',
                ram = '$ram',
                warna = '$warna',
                penyimpanan = '$penyimpanan',
                harga = '$harga',
                gambar = '$gambar'
            WHERE id = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
