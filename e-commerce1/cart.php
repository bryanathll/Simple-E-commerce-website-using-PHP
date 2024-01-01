<?php
require "session.php";
require "koneksi.php";
$nama = htmlspecialchars($_GET['nama_sepatu']); 
$queryProduk = mysqli_query($config, "SELECT * FROM cart WHERE nama_sepatu = '$nama'");
$product = mysqli_fetch_array($queryProduk);
$querykategori = mysqli_query($config, "SELECT * FROM kategori");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <!-- style-css -->
    <link rel="stylesheet" href="style-cart.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- feather-icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body style="background-color: #EDEDEF;">
    <?php require "navbar.php" ?>

    <div class="container">

        <div class="row cart">
            <div class="col">
                <hr>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Remove</th>
                            <th scope="col">Image</th>
                            <th scope="col">Add</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($product) : ?>
                            <tr class="text-center">
                                <th class="text-center" scope="row"><i data-feather="trash-2"></i></th>
                                <td colspan=""><img src="Panel-Admin/image/<?php echo $product['gambar']; ?>" height="100" alt=""></td>
                                <td><i data-feather="plus-circle"></i></td>
                                <td><?php echo $product['nama_sepatu'] ?></td>
                                <td><?php echo $product['harga'] ?></td>
                                <td> <?php echo $product['harga'] ?></td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td colspan="6">Tidak ada produk yang ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div>
        <div class="row ms-1 me-1">
            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-5 cart">

                <table class="table">
                    <tbody>
                        <h4 class="pb-5 ps-1">Ringkasan pesanan</h4>
                        <tr class="text-start justify-content-around ">
                            <th class="text-start fw-normal" scope="row">Total Produk</th>
                            <td class="pb-4"><?php echo $product['harga'] ?></td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr class="text-start justify-content-around">
                            <th class="text-start pt-3 fw-normal" scope="row">Biaya pengiriman</th>
                            <td class="pb-4">Gratis</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr class="text-start justify-content-around">
                            <th class="text-start pt-3 fw-normal" scope="row">Total</th>
                            <td class="pb-4"><?php echo $product['harga'] ?></td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="d-grid gap-2">
                <a class="btn btn-dark btn-md" style="font-size: 18px; col-lg-12 border-radius: 12px;"
                    href="pembelian.php?nama_sepatu=<?php echo $product['nama_sepatu']; ?>" role="button">Checkout</a>
        
                </div>
            </div>
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
