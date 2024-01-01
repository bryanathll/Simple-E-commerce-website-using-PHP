<?php
    require "session.php";
    require "koneksi.php";
    
    $queryKategori = mysqli_query($config, "SELECT * FROM kategori");
    $queryKategori2 = mysqli_query($config, "SELECT * FROM kategori2");
    $jumlahKategori = mysqli_num_rows($queryKategori);
    $jumlahKategori2 = mysqli_num_rows($queryKategori2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <linl rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
</head>

<style>
      .no-decoration{
        text-decoration: none;
    }
</style>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="index.php" class="no-decoration text-muted" >
                        <i class="fas fa-house"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                     Kategori
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <h3> Tambah Kategori</h3>

            <form action="" method="post">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="input nama kategori"
                    class="form-control">
                </div>
                <div>
                    <label for="kategori">Kategori2</label>
                    <input type="text" id="kategori2" name="kategori2" placeholder="input nama kategori"
                    class="form-control">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>

            <?php
                if(isset($_POST['simpan_kategori'])){
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $kategori2 = htmlspecialchars($_POST['kategori2']);
                    
                    $queryExist = mysqli_query($config, "SELECT nama_kategori FROM kategori WHERE nama_kategori='$kategori'");
                    $queryExist2 = mysqli_query($config, "SELECT nama_kategori2 FROM kategori2 WHERE nama_kategori2='$kategori2'");
                    $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);
                    $jumlahDataKategoriBaru2 = mysqli_num_rows($queryExist2);

                    if($jumlahDataKategoriBaru > 0){
                        ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Kategori Sudah Ada
                        </div> 
                        <?php
                    }elseif($jumlahDataKategoriBaru2 > 0){
                        ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Kategori 2 Sudah Ada
                        </div> 
                        <?php
                    }
                    else{
                        $querySimpan = mysqli_query($config, "INSERT INTO kategori(nama_kategori) VALUES
                        ('$kategori')");
                        $querySimpan2 = mysqli_query($config, "INSERT INTO kategori2(nama_kategori2) VALUES
                        ('$kategori2')");

                        if($querySimpan){
                            ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Kategori Berhasil Tersimpan
                            </div>

                            <meta http-equiv="refresh" content="2; url=kategori.php" />
                            <?php
                        }elseif($querySimpan2){
                            ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Kategori2 Berhasil Tersimpan
                            </div>

                            <meta http-equiv="refresh" content="2; url=kategori.php" />
                            <?php
                        }
                        else{
                            echo mysqli_error($config);
                        }
                    }
                }
            ?>
        </div>

        <div class="mt-3">
            <h2>List Kategori</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if( $jumlahKategori==0){
                        ?>
                            <tr>
                                <td colspan=3 class="text-center">Tidak ada data Kategori</td>
                            </tr>
                        <?php
                              } 
                              else{
                                    $jumlah = 1;
                                    while($data=mysqli_fetch_array($queryKategori)){

                        ?>
                                    <tr>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $data['nama_kategori']; ?></td>
                                        <td>
                                            <a href="kategori-detail.php?q= <?php echo $data['id_kategori']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                                        </td>
                                    </tr>
                        <?php
                                    $jumlah++;
                                    } 
                                  
                              }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3">
            <h2>List Kategori 2</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if( $jumlahKategori2==0){
                        ?>
                            <tr>
                                <td colspan=3 class="text-center">Tidak ada data Kategori</td>
                            </tr>
                        <?php
                              } 
                              else{
                                    $jumlah = 1;
                                    while($data2=mysqli_fetch_array($queryKategori2)){

                        ?>
                                    <tr>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $data2['nama_kategori2']; ?></td>
                                        <td>
                                            <a href="kategori-detail2.php?q= <?php echo $data2['id_kategori']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                                        </td>
                                    </tr>
                        <?php
                                    $jumlah++;
                                    } 
                                  
                              }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script> 
</body>
</html>