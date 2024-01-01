<?php
    require "session.php"
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- style-css -->
    <link rel="stylesheet" href="style-home.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- feather-icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body style="background-color: #EDEDEF;">
    <?php require "navbar.php" ?>

    <!-- ==================text carouse lstart================== -->
    <div id="carouselExampleSlidesOnly" class="text-carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner text-center">
            <div class="carousel-item active">
                <p>Selamat datang di toko BDLFShoes <br>
                    temukan koleksi terbaik untuk melengkapi gaya Anda</p>
            </div>
            <div class="carousel-item">
                <p>Sepatu yang tepat dapat mengubah segalanya. <br>
                    Mulailah petualangan baru Anda dengan sepatu impian Anda</p>
            </div>
            <div class="carousel-item">
                <p>Ingin tampil lebih percaya diri? <br> Temukan sepatu yang sempurna untuk Anda di toko kami</p>
            </div>
        </div>
    </div>
    <!-- ==================text carouse end================== -->

    <!-- ==================video start================== -->
    <div class="videobg container-fluid text-center ">
        <video autoplay loop muted plays-inline class="video-bg text-center">
            <source src="assets/img/Novablast.mp4" type="video/mp4">
        </video>
    </div>
    <!-- ==================video end================== -->


    <div class="quotes text-center pt-5 ">
        <div class="row">
            <div class="col qts">
                <h1>Elevate Style, Boost Confidence</h1>
                <p>Unleash your confidence with our stylish collection of shoes that amplify your personal style. Each
                    step becomes a testament to your self-assurance and fashion-forward mindset</p>
            </div>
        </div>
    </div>

    <div class="row row-collection  me-5 ">
        <h3>Our Collection</h3>
    </div>
    <!-- ==================Our collection start================== -->
    <div class="image-slider pb-5 ">
        <div class="image-slider-track">
            <div class="slide1">
                <img src="assets/shoes-product/">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 2.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 3.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 4.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 5.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 6.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 7.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 8.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 9.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 10.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 11.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 12.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 13.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 14.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 15.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 16.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 17.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 18.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 19.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 20.png">
            </div>
            <div class="slide1">
                <img src="assets/shoes-product/Group 21.png">
            </div>
                       <!-- ==================Our collection start================== -->


        </div>
    </div>
    <!-- ===================================================================== -->

    <!-- ==================carousel start================== -->
    <div id="carouselExampleIndicators" class="carousel slide pb-5 pt-5 " data-bs-ride="true">
        <div class="row ">
            <h3>Don't miss</h3>
        </div>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/p1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/p2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/p3.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/p4.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/p5.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- ==================carousel end================== -->

    <div class="quotes text-center">
        <div class="row">
            <div class="col logo">
                <img src="assets/img/BDLFShoes.png" class="img-fluid " alt="">
                <p>Proudly presenting our shoe brand, combining trendy style with the finest quality. Discover unique
                    and comfortable shoe collections that will enhance your appearance. Coming soon on our website!</p>
                <a class="btn btn-dark btn-md" style="font-size: 18px; padding: 0.5rem 2rem; border-radius: 12px;"
                    href="shop.php" role="button">Shop</a>
            </div>
        </div>
    </div>

    <!-- ==================Best in sales session start================== -->
    <div class="row row-product justify-content-around  me-1 ms-1">
        <div class="row ">
            <h3>Best in sales</h3>
        </div>
        <div class=" col-lg-4 product-home ">
            <img src="assets/img/Rectangle 6.png" class="card-img-top gambar-product" alt="...">
            <div class="row">
                <div class="col-6">
                    <h5>BDLFS Air max pro</h5>
                </div>
                <div class="col-6 text-end">
                    <h5>Rp 1.255.555</h5>
                </div>

            </div>
            <h6>Men's Shoes</h5>
                <h6>One Color</h5>
        </div>
        <div class=" col-lg-4 product-home ">
            <img src="assets/img/Rectangle 7.png" class="card-img-top gambar-product" alt="...">

            <div class="row">
                <div class="col-6">
                    <h5>BDLFS Air max pro</h5>
                </div>
                <div class="col-6 text-end">
                    <h5>Rp 1.255.555</h5>
                </div>

            </div>
            <h6>Men's Shoes</h5>
                <h6>One Color</h5>

        </div>
        <div class=" col-lg-4 product-home ">
            <img src="assets/img/Rectangle 8.png" class="card-img-top gambar-product" alt="...">

            <div class="row">
                <div class="col-6">
                    <h5>BDLFS Air max pro</h5>
                </div>
                <div class="col-6 text-end">
                    <h5>Rp 1.255.555</h5>
                </div>

            </div>
            <h6>Men's Shoes</h5>
                <h6>One Color</h5>
        </div>

    </div>
    <!-- ==================Best in sales session end================== -->

    <!-- ==================footer start================== -->
    <?php require "footer.php" ?>

    <!-- ==================footer end================== -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

    <!-- feather-icons -->
    <script>
        feather.replace()
    </script>
</body>

</html>