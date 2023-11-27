<?php

$handphone = [

    [
        "Merek" => "Apple",
        "Model" => "iPhone 13 Pro",
        "Ram" => "6GB",
        "Warna" => "Graphite, Gold, Silver, Sierra Blue",
        "Penyimpanan" => "128GB, 256GB, 512GB",
        "Harga" => "120",
        "gambar" => "apple.jpeg",
    ],
    [
        "Merek" => "Samsung",
        "Model" => "Galaxy S21 Ultra",
        "Ram" => "12 GB, 16 GB",
        "Warna" => "Phantom Black, Phantom Silver, Phantom Titanium, Phantom Navy",
        "Penyimpanan" => "128GB, 256GB, 512GB",
        "Harga" => "110",
        "gambar" => "samsung.jpeg",

    ],
    [
        "Merek" => "Xiaomi",
        "Model" => "Redmi Note 10 Pro",
        "Ram" => "6 GB, 8 GB",
        "Warna" => "Onyx Gray, Glacier Blue, Gradient Bronze",
        "Penyimpanan" => "64GB, 128GB",
        "Harga" => "80",
        "gambar" => "xiaomi.jpeg",
    ],
    [
        "Merek" => "OnePlus",
        "Model" => "OnePlus 9 Pro",
        "Ram" => "8 GB, 12 GB",
        "Warna" => " Morning Mist, Pine Green, Stellar Black",
        "Penyimpanan" => "28GB, 256GB",
        "Harga" => "100",
        "gambar" => "oneplus.jpeg",
    ],

    [
        "Merek" => "Oppo",
        "Model" => "Find X3 Pro",
        "Ram" => "12 GB",
        "Warna" => "Gloss Black, Blue, White, Cosmic Mocha",
        "Penyimpanan" => "256GB",
        "Harga" => "100",
        "gambar" => "oppo.jpeg",
    ],
    [
        "Merek" => "Vivo",
        "Model" => "Vivo X60 Pro+",
        "Ram" => "12 GB",
        "Warna" => "Emperor Blue, Midnight Black",
        "Penyimpanan" => "256GB",
        "Harga" => "99",
        "gambar" => "vivo.jpeg",
    ],
    [
        "Merek" => "Google",
        "Model" => "Pixel 6 Pro",
        "Ram" => "12 GB",
        "Warna" => "Cloudy White, Sorta Sunny, Stormy Black",
        "Penyimpanan" => "128GB, 256GB, 512GB",
        "Harga" => "150",
        "gambar" => "google.jpeg",
    ],
    [
        "Merek" => "Huawei",
        "Model" => "Mate 40 Pro",
        "Ram" => "8 GB",
        "Warna" => "Mystic Silver, White, Black, Green, Yellow",
        "Penyimpanan" => "256GB",
        "Harga" => "99",
        "gambar" => "huawei.jpeg",
    ],
    [
        "Merek" => "Sony",
        "Model" => "Xperia 1 III",
        "Ram" => "12 GB",
        "Warna" => "Frosted Black, Frosted Gray, Frosted Purple",
        "Penyimpanan" => "256GB",
        "Harga" => "99",
        "gambar" => "sony.jpeg",
    ],

    [

        "Merek" => "Motorola",
        "Model" => "Moto G Power (2022)",
        "Ram" => "4 GB",
        "Warna" => "Flash Gray, Polar Silver",
        "Penyimpanan" => "64GB, 128GB",
        "Harga" => "75",
        "gambar" => "motorola.jpeg",
    ],

];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
<h1>Daftar HP</h1>
<?php foreach ($handphone as $phone): ?>
    <ul>
        <li><?=$phone["Merek"];?></li>
        <li><img src="img/<?=$phone["gambar"];?>"</li>


    </ul>



    <?php endforeach;?>
</body>
</html>
