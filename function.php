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
    $merek = $data["merek"];
    $model = $data["model"];
    $ram = $data["ram"];
    $warna = $data["warna"];
    $penyimpanan = $data["penyimpanan"];
    $harga = $data["harga"];
    $gambar = $data["gambar"];

    //query insert data
    $query = "INSERT INTO phone
        VALUES
        ('', '$merek', '$model', '$ram', '$warna', '$penyimpanan', '$harga', '$gambar')
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
