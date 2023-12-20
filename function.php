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

    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO phone
        VALUES
        ('', '$merek', '$model', '$ram', '$warna', '$penyimpanan', '$harga', '$gambar')
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apa ada gambar yg di upload/tidak
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
                </script>";
        return false;
    }

    //cek tipe upload gambar / tidak
    $ektensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ektensiGambar = explode('.', $namaFile);
    $ektensiGambar = strtolower(end($ektensiGambar));
    if (!in_array($ektensiGambar, $ektensiGambarValid)) {
        echo "<script>
        alert('yang di upload bukan gambar!');
        </script>";
        return false;
    }

    //cek jika ukurang kebesaran
    if ($ukuranFile > 100000) {
        echo "<script>
        alert('ukuran terlalu besar!');
        </script>";
        return false;
    }

    //lolos pengecekan gambar siap upload
    move_uploaded_file($tmpName, 'img/' . $namaFile);
    return $namaFile;

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

function cari($keyword)
{
    $query = "SELECT * FROM phone WHERE
            merek LIKE '%$keyword%' OR
            model LIKE '%$keyword%' OR
            ram LIKE '%$keyword%' OR
            model LIKE '%$keyword%' OR
            penyimpanan LIKE '%$keyword%' OR
            harga LIKE '%$keyword%' OR
            warna LIKE '%$keyword%'

            ";

    return query($query);
}
