<?php
require 'function.php';

$id = $_GET['id'];
if (hapus($id) > 0) {
    echo "
    <script>
    alert('data berhasil di Hapus!');
    document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('data Gagal di Hapus!');
    document.location.href = 'index.php';
    </script>
    ";
}
