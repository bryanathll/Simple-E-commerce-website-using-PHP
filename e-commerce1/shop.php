<?php
    require "session.php";
    require "koneksi.php";
    $queryProduk = mysqli_query($config, "SELECT barang.*, k1.nama_kategori AS nama_kategori1, k2.nama_kategori2 AS nama_kategori2 FROM barang 
    JOIN kategori AS k1 ON barang.id_kategori = k1.id_kategori
    JOIN kategori2 AS k2 ON barang.id_kategori2 = k2.id_kategori");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop</title>
    <!-- style-css -->
    <link rel="stylesheet" href="style-shop.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- feather-icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body style="background-color: #EDEDEF;">
  <?php require "navbar.php" ?>
    <nav aria-label="breadcrumb" class="bread ms-1 me-1">
        <ol class="breadcrumb">

            <a href="#" class="text-dark pe-"><i style="width: 90%;" data-feather="home"></i></a>
            <li class="breadcrumb-item"><a href="#" class="text-dark "> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
    </nav>

    <div class="container-sec">
        <div class="product">
            <div class="row">
                <div class="col">
                    <div class="ms-1">
                        <h2 class="fw-semibold">PRODUCT</h2>
                    </div>
                </div>
            </div>
        </div>
        <?php require "filter.php" ?>

        <div class="row row-product me-1 ms-1 ">
        <?php while ($data = mysqli_fetch_array($queryProduk)) { ?>
            <div class=" col-lg-3 product-home ">
            <a href="detail.php?nama_sepatu=<?php echo $data['nama_sepatu']; ?>" class="text-decoration-none">
                    <img src="Panel-Admin/image/<?php echo $data['gambar']; ?>" class="card-img-top gambar-product" alt="..." style="border-radius: 22px;">
                    <div class="row">
                        <div class="col-lg-6 ">
                            <h5 style="color:#2d2d2d;"><?php echo $data['nama_sepatu']; ?></h5>
                            
                        </div>
                        <div style="color:#2d2d2d;" class="col-lg-6 text-end">
                            <h5>Rp <?php echo $data['harga'] ?></h5>
                        </div>
                    </div>
                    <h6><?php echo isset($data['nama_kategori1']) ? $data['nama_kategori1'] : ''; ?> Shoes</h6>
                    <h6><?php echo isset($data['nama_kategori2']) ? $data['nama_kategori2'] : ''; ?></h6>
                </a>
            </div>
            <?php } ?>

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