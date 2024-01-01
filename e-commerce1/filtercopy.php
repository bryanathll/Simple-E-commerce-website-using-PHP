<?php
require "koneksi.php";

$querykategori = mysqli_query($config, "SELECT * FROM kategori");
$querykategori2 = mysqli_query($config, "SELECT * FROM kategori2");

if (isset($_GET['kategori'])) {
    $kategori = $_GET['kategori'];
    $stmt = $config->prepare("SELECT id_kategori FROM kategori WHERE nama_kategori = ?");
    $stmt->bind_param("s", $kategoriParam);
    $kategoriParam = $kategori;
    $stmt->execute();
    $querykategoriID = $stmt->get_result();

    if ($querykategoriID && mysqli_num_rows($querykategoriID) > 0) {
        $kategoriID = mysqli_fetch_array($querykategoriID);
        $stmt = $config->prepare("SELECT * FROM barang WHERE id_kategori = ?");
        $stmt->bind_param("s", $kategoriIDParam);
        $kategoriIDParam = $kategoriID['id_kategori'];
        $stmt->execute();
        $queryProduk = $stmt->get_result();
    } else {
        echo "Kategori tidak ditemukan.";
    }
} else if (isset($_GET['kategori2'])) {
    $kategori2 = $_GET['kategori2'];
    $stmt2 = $config->prepare("SELECT id_kategori2 FROM kategori2 WHERE nama_kategori2 = ?");
    $stmt2->bind_param("s", $kategoriParam2);
    $kategoriParam2 = $kategori2;
    $stmt2->execute();
    $querykategoriID2 = $stmt2->get_result();

    if ($querykategoriID2 && mysqli_num_rows($querykategoriID2) > 0) {
        $kategoriID2 = mysqli_fetch_array($querykategoriID2);
        $stmt2 = $config->prepare("SELECT * FROM barang WHERE id_kategori2 = ?");
        $stmt2->bind_param("s", $kategoriIDParam2);
        $kategoriIDParam2 = $kategoriID2['id_kategori2'];
        $stmt2->execute();
        $queryProduk = $stmt2->get_result();
    } else {
        echo "Kategori tidak ditemukan.";
    }
} else {
    // Tangani kasus ketika tidak ada parameter query yang diatur
    $queryProduk = mysqli_query($config, "SELECT * FROM barang");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- style-css -->
    <link rel="stylesheet" href="filter.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- feather-icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body style="background-color: #EDEDEF;">
    <header class="mb-5">
        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">Menu</label>
        <nav class="navbar1">
            <ul>
                <li><a class="text-decoration-none fs-6" href="shop.php">All Shoes</a></li>
                <li>
                    <a class="text-decoration-none fs-6" href="#">Gender +</a>
                    <ul>
                        <?php while ($produk = mysqli_fetch_array($querykategori)) { ?>
                            <li><a class="text-decoration-none fs-6" href="shop.php?kategori=<?php echo $produk['nama_kategori']; ?>"><?php echo $produk['nama_kategori']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li>
                    <a class="text-decoration-none fs-6" href="#">Type +</a>
                    <ul>
                        <?php while ($produk = mysqli_fetch_array($querykategori2)) { ?>
                            <li><a class="text-decoration-none fs-6" href="shop.php?kategori2=<?php echo $produk['nama_kategori2']; ?>"><?php echo $produk['nama_kategori2']; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- feather-icons -->
    <script>
        feather.replace()
    </script>
</body>
</html>
