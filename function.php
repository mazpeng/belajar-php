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
    //generate nama file agar tidak saling timpa
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ektensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;

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
    $gambarLama = ($data["gambarLama"]);

    //cek apa user up gambar baru/ tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

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

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username duplikat
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username already exists');
                </script>";
        return false;
    }

    //konfirmasi password
    {
        if ($password !== $password2) {
            echo "<script>
                    alert('password incorrect');
                </script>";
            return false;
        }
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
