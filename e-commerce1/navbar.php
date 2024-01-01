<?php 
    require "koneksi.php";

    $querykategori = mysqli_query($config, "SELECT * FROM kategori");

    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $stmt = $config->prepare("SELECT * FROM barang WHERE nama_sepatu LIKE ?");
        $stmt->bind_param("s", $searchParam);
        $searchParam = "%$search%";
        $stmt->execute();
        $queryProduk = $stmt->get_result();
    }elseif (isset($_GET['kategori'])) {
        $querykategoriID = mysqli_query($config, "SELECT id_kategori FROM kategori WHERE nama_kategori='".$_GET['kategori']."'");
        
        if ($querykategoriID && mysqli_num_rows($querykategoriID) > 0) {
            $kategoriID = mysqli_fetch_array($querykategoriID);
            $queryProduk = mysqli_query($config, "SELECT * FROM barang WHERE id_kategori = '$kategoriID[id_kategori]'");
        } else {
            // Tangani kasus ketika query tidak mengembalikan hasil
            echo "Kategori tidak ditemukan.";
            // Anda dapat menampilkan pesan kesalahan atau mengambil tindakan yang sesuai
        }
    } else {
        // Tangani kasus ketika tidak ada parameter query yang diatur
    }
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- style-css -->
    <link rel="stylesheet" href="navbar.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- feather-icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body style="background-color: #EDEDEF;">
    <nav class="navbar navbar-expand-lg pt-4">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/img/BDLFShoes.png" alt=""></a>

            <button class="navbar-toggler bg-0 border-0  " type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse nav-col" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold" href="cv.php">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active fw-semibold" href="shop.php">Shop</a>
                    </li>
                </ul>
                <form class="d-flex search" role="search">
                    <input class="form-control me-2  rounded-pill search-border " name="search" type="search" placeholder="Search"
                        aria-label="Search">
                </form>
                <?php if(isset($_GET['search'])){
                    $query = mysqli_query($config, "SELECT*FROM barang WHERE nama_sepatu LIKE '%".$_GET['search']."%'" );
                }
                 ?> 


            </div>
        </div>
        <div class="logout">            
            <a style="list-style: none;"  class="nav-link active fw-light" href="logout.php">logout</a>
        </div>
                    
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>

    <!-- feather-icons -->
    <script>
        feather.replace()
    </script>
</body>

</html>