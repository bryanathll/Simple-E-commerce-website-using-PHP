<?php
// menjalankan atau menghubungkan form dengan file koneksi
include_once("koneksi.php");

$nama = $_GET['kode_sepatu'];

// menghapus data bersarkan npm
$result = mysqli_query($config, "DELETE FROM barang WHERE nama_sepatu=$nama");

header('Location:product.php')
?>