<?php
    require "session.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CV Pengembang</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
                <img class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3" src="img/profile.png"
                    alt="Image">
                <h1 class="font-weight-bold">BDLFShoes</h1>
                <p class="mb-4">
                    BDLFShoes merupakan Toko Sepatu online terkemuka dan terpercya No.1 di Indonesia
                </p>
                <div class="d-flex justify-content-center mb-5">
                    <a class="btn btn-outline-primary mr-2" href="https://www.facebook.com/ladzina.mustaqim/"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary mr-2" href="https://www.instagram.com/pemudasukses_amin/"><i
                            class="fab fa-instagram"></i></a>
                </div>
                <a href="" class="btn btn-lg btn-block btn-primary mt-auto">Tentang Kami</a>
            </div>
            <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
                <i class="fas fa-2x fa-angle-double-right text-primary"></i>
            </div>
        </div>
        <div class="content">
            <!-- Navbar Start -->
            <div class="container p-0">
                <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
                    <a href="" class="navbar-brand d-block d-lg-none">Navigation</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav m-auto">
                            <a href="shop.php" class="nav-item nav-link active">Home</a>
                            <div class="nav-item dropdown">
                            </div>
                        </div>
                </nav>
            </div>
            <!-- Navbar End -->

            <!-- Carousel Start -->
            <div class="container p-0">
                <div id="blog-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="w-100" src="img/carousel-1.png" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <h2 class="mb-3 text-white font-weight-bold">BDLFShouse</h2>
                                <div class="d-flex text-white">
                                    <small class="mr-2"><i class="fa fa-calendar-alt"></i> 01-Jun-2023</small>
                                    <small class="mr-2"><i class="fa fa-folder"></i> Toko Sepatu Online</small>

                                </div>
                                <a href="shop.php" class="btn btn-lg btn-outline-light mt-4">Back to Home</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="w-100" src="img/carousel-2.png" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <h2 class="text-white font-weight-bold">BDLFShouse</h2>
                                <div class="d-flex">
                                    <small class="mr-2"><i class="fa fa-calendar-alt"></i> 01-Jun-2023</small>
                                    <small class="mr-2"><i class="fa fa-folder"></i> Toko Sepatu Online</small>

                                </div>
                                <a href="shop.php" class="btn btn-lg btn-outline-light mt-4">Back to Home</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="w-100" src="img/carousel-3.png" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <h2 class="text-white font-weight-bold">BDLFShouse</h2>
                                <div class="d-flex">
                                    <small class="mr-2"><i class="fa fa-calendar-alt"></i> 01-Jun-2023</small>
                                    <small class="mr-2"><i class="fa fa-folder"></i> Toko Sepatu Online</small>

                                </div>
                                <a href="shop.php" class="btn btn-lg btn-outline-light mt-4">Back to Home</a>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <!-- Carousel End -->


            <!-- Blog List Start -->
            <div class="container bg-white pt-5">
                <div class="row blog-item px-3 pb-5">
                    <div class="col-md-5">
                        <img class="img-fluid mb-4 mb-md-0" src="img/profil.png" alt="Image">
                    </div>
                    <div class="col-md-7">
                        <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Bryan Natanael</h3>
                        <div class="d-flex mb-3">
                            <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 20-Des-2002</small>
                            <small class="mr-2 text-muted"><a href="https://www.instagram.com/bryanathll/"><i
                                        class="fab fa-instagram"></i> Web Design</a></small>
                            <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 0895-0245-1761 </small>
                        </div>
                        <p>
                            Saya merupakan salah satu mahasiswa yang sedang menempuh pendidikan S1 Teknik Informatika di
                            Universitas Putera Batam
                        </p>
                    </div>
                </div>
                <div class="row blog-item px-3 pb-5">
                    <div class="col-md-5">
                        <img class="img-fluid mb-4 mb-md-0" src="img/blog-8.jpg" alt="Image">
                    </div>
                    <div class="col-md-7">
                        <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Doni Oktavian</h3>
                        <div class="d-flex mb-3">
                            <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 08-Okt-2003</small>
                            <small class="mr-2 text-muted"><a
                                    href="https://instagram.com/donnyoktavian?igshid=NGExMmI2YTkyZg=="><i
                                        class="fab fa-instagram"></i> Manager</a></small>
                            <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 0813-6566-7205</small>
                        </div>
                        <p>
                            Saya merupakan salah satu mahasiswa yang sedang menempuh pendidikan S1 Teknik Informatika di
                            Universitas Putera Batam
                        </p>
                    </div>
                </div>
                <div class="row blog-item px-3 pb-5">
                    <div class="col-md-5">
                        <img class="img-fluid mb-4 mb-md-0" src="img/fau.png" alt="Image">
                    </div>
                    <div class="col-md-7">
                        <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Fauzian Sinaga</h3>
                        <div class="d-flex mb-3">
                            <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                            <small class="mr-2 text-muted"><a href="https://www.instagram.com/pemudasukses_amin/"><i
                                        class="fab fa-instagram"></i> Direktur</a></small>
                            <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 0812-6939-7012 </small>
                        </div>
                        <p>
                            Saya merupakan salah satu mahasiswa yang sedang menempuh pendidikan S1 Teknik Informatika di
                            Universitas Putera Batam
                        </p>
                    </div>
                </div>
                <div class="row blog-item px-3 pb-5">
                    <div class="col-md-5">
                        <img class="img-fluid mb-4 mb-md-0" src="img/blog-7.jpg" alt="Image">
                    </div>
                    <div class="col-md-7">
                        <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Ladzina Mustaqim</h3>
                        <div class="d-flex mb-3">
                            <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 01-Jan-1999</small>
                            <small class="mr-2 text-muted"><a href="https://www.instagram.com/pemudasukses_amin/"><i
                                        class="fab fa-instagram"></i> Shoftware Engginer</a></small>
                            <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 0821-7452-4224</small>
                        </div>
                        <p>
                            Saya merupakan salah satu mahasiswa yang sedang menempuh pendidikan S1 Teknik Informatika di
                            Universitas Putera Batam
                        </p>

                    </div>
                </div>

                <div class="row blog-item px-3 pb-5">
                    <div class="col-md-5">
                        <img class="img-fluid mb-4 mb-md-0" src="img/blog-9.jpg" alt="Image">
                    </div>
                    <div class="col-md-7">
                        <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Suci Ramadhani</h3>
                        <div class="d-flex mb-3">
                            <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 16-Des-2002</small>
                            <small class="mr-2 text-muted"><a
                                    href="https://instagram.com/its.sucirmd?igshid=MjEwN2IyYWYwYw=="><i
                                        class="fab fa-instagram"></i> Marketing</a></small>
                            <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 0877-1387-7528</small>
                        </div>
                        <p>
                            Saya merupakan salah satu mahasiswi yang sedang menempuh pendidikan S1 Teknik Informatika di
                            Universitas Putera Batam
                        </p>
                    </div>
                </div>
            </div>


            <!-- Blog List End -->


            <!-- Footer Start -->
            <div class="container py-4 bg-secondary text-center">
                <p class="m-0 text-white">
                    &copy; <a class="text-white font-weight-bold" href="shop.php">Copy right 2023</a>. All Rights
                    Reserved. Designed by <a class="text-white font-weight-bold" href="shop.php">BDFLShoes</a>
                </p>
            </div>
            <!-- Footer End -->
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>