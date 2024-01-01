<?php
require "session.php";
require "koneksi.php";
$nama = htmlspecialchars($_GET['nama_sepatu']);
$queryProduk = mysqli_query($config, "SELECT * FROM barang WHERE nama_sepatu = '$nama'");
$produk = mysqli_fetch_array($queryProduk);
$querysize = mysqli_query($config, "SELECT * FROM tb_size");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail</title>
    <!-- style-css -->
    <link rel="stylesheet" href="detail.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- feather-icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body style="background-color: #EDEDEF;">
    <?php require "navbar.php" ?>

    <div class="container">
        <div class="row">

            <div class="col-6 gambar">
                <img src="Panel-Admin/image/<?php echo $produk['gambar']; ?>" alt="">
            </div>
            <div class="col-6 deskripsi">
                <h3 class="pb-3"><?php echo $produk['nama_sepatu'] ?></h3>
                <p class="pb-2" style="padding-right: 2rem;"><?php echo $produk['detail'] ?></p>
                <p class="pb-2">Rp <?php echo $produk['harga'] ?></p>

                <form action="" method="post">
                    <select class="form-select form-select-sm" name="size" aria-label=".form-select-sm example"
                        style="width: 25%; margin-bottom: 20px;">
                        <option selected>Pilih Ukuran</option>
                        <?php while ($data = mysqli_fetch_array($querysize)) { ?>
                            <option value="<?php echo $data['size_id']; ?>">
                                <?php echo $data['size']; ?>
                            </option>
                        <?php } ?>
                    </select>

                    <button type="submit" name="add_to_cart" class="btn btn-dark">Tambahkan ke Keranjang</button>
                </form>

                <?php
                if (isset($_POST['add_to_cart'])) {
                    // Masukkan kode untuk memasukkan data ke dalam tabel cart
                    $size = isset($_POST['size']) ? $_POST['size'] : ""; // Dapatkan nilai yang dipilih atau berikan nilai kosong
                    $insertQuery = "INSERT INTO cart (nama_sepatu, harga, size, gambar) VALUES ('{$produk['nama_sepatu']}', '{$produk['harga']}', '{$size}', '{$produk['gambar']}')";
                    mysqli_query($config, $insertQuery);
                ?>
                   
                    <meta http-equiv="refresh" content="0; url=cart.php?nama_sepatu=<?php echo $produk['nama_sepatu']; ?>">

                <?php
                    exit(); // Pastikan untuk keluar dari skrip setelah mengarahkan pengguna
                }
                ?>

            </div>
        </div>
    </div>

    <div class="row row-product me-1 ms-1 ">

        <div class="row ps-4">
            
        </div>
        <div class="col-lg-3 product-home ">
            <!-- Konten lainnya -->
        </div>

    </div>

    <?php require "footer.php" ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <!-- feather-icons -->
    <script>
        feather.replace()
    </script>
</body>

</html>
