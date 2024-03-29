<?php
require "session.php";
require "koneksi.php";
$nama = htmlspecialchars( $_GET['nama_sepatu']);
$queryProduk = mysqli_query($config, "SELECT * FROM barang WHERE nama_sepatu = '$nama'");
$produk = mysqli_fetch_array($queryProduk);
$querykategori = mysqli_query($config, "SELECT * FROM kategori");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
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
            <div class="col ">
                <hr>
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Remove</th>
                            <th scope="col">Image</th>
                            <th scope="col">Add</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="text-center">
                            <th class="text-center" scope="row"><i data-feather="trash-2"></i></th>
                            <td colspan=""><img src="Panel-Admin/image/<?php echo $produk['gambar']; ?>" height="100" alt=""></td>
                            <td><i data-feather="plus-circle"></i></td>
                            <td><?php echo $produk['nama_sepatu'] ?></td>
                            <td><?php echo $produk['harga'] ?></td>
                            <td>2</td>
                            <td> 1.433.900 x 2</td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div >
        <div class="row ms-1 me-1">
            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-5 cart">

                <table class="table">
                    <tbody>
                        <h4 class="pb-5 ps-1">Ringkasan pesanan</h4>
                        <tr class="text-start justify-content-around ">
                            <th class="text-start fw-normal" scope="row">Total Produk</i></th>
                            <td class="pb-4">Rp 1.449.000</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr class="text-start justify-content-around">
                            <th class="text-start pt-3 fw-normal" scope="row">Biaya pengiriman</i></th>
                            <td class="pb-4">Gratis</td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr class="text-start justify-content-around">
                            <th class="text-start pt-3 fw-normal" scope="row">Total</i></th>
                            <td class="pb-4">Rp 1.449.000</td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-grid gap-2">
                    <a href="pembelian.php"><button class="btn btn-dark" type="button">Checkout</button></a>
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