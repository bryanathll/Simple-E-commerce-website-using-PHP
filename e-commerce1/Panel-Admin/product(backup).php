<?php
    require "session.php";
    require "koneksi.php";

    $query = mysqli_query($config, "SELECT * FROM barang");
    $jumlahBarang = mysqli_num_rows($query);

    $querykategori = mysqli_query($config, "SELECT * FROM kategori");

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSATUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }

    form div {
        margin-bottom: 10px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="index.php" class="no-decoration text-muted">
                        <i class="fas fa-house"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Barang
                </li>
            </ol>
        </nav>

        <!-- tambah barang -->
        <div class="my-5 col-12 col-md-6">
            <h3> Tambah Barang</h3>

            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama_sepatu">Nama</label>
                    <input type="text" id="kode_sepatu" name="nama_sepatu" class="form-control" autocomplete="off" required>
                    <required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="">Pilih Satu</option>
                        <?php while ($data = mysqli_fetch_array($querykategori)) { ?>
                            <option value="<?php echo $data['id_kategori']; ?>">
                                           <?php echo $data['nama_kategori']; ?>
                             </option>
                           <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" required>
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div>
                    <label for="ketersediaan_stok">Ketersediaan Stok</label>
                    <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">Habis</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan']))  {
                $nama = htmlspecialchars($_POST['nama_sepatu']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $harga = htmlspecialchars($_POST['harga']);
                $detail = htmlspecialchars($_POST['detail']);
                $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                $target_dir = "./image/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                echo $target_dir . "<br>";
                echo $nama_file . "<br>";
                echo $target_file . "<br>";
                echo $imageFileType . "<br>";
                echo $image_size . "<br>";

                if ($nama == '' || $kategori == '' || $harga == '') {
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Nama, kategori, dan harga wajib diisi
                    </div>
                    <?php
                } 
                else {
                    if ($nama_file != '') {
                        if ($image_size > 999999000000) {
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File tidak boleh lebih dari 2000 kb
                            </div>
                            <?php
                        } 
                        else {
                            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                                ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    File wajib bertipe jpg, png, atau gif
                                </div>
                                <?php
                            } else {
                                move_uploaded_file($_FILES["foto"]["tmp_name"], 
                                $target_dir . $new_name);
                                $new_image_path = $target_dir . $new_name;
                              }
                            }
                        }
                         // Insert data into the database
                         $insertQuery = mysqli_query($config, "INSERT INTO barang(nama_sepatu, kategori, harga, gambar, detail, ketersediaan_stok) 
                         VALUES ('$nama', '$kategori', '$harga', '$new_name','$detail', '$ketersediaan_stok')");
                         if($insertQuery){
                            ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Kategori Berhasil Tersimpan
                            </div>

                            <meta http-equiv="refresh" content="2; url=product.php" />
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
            <h2>List Barang</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>kategori</th>
                            <th>Harga</th>
                            <th>Ketersediaan Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlahBarang == 0) {
                        ?>
                            <tr>
                                <td colspan="5" class="text-center">Data Barang Tidak Tersedia</td>
                            </tr>
                        <?php
                        } else {
                            $jumlah = 1;
                            while ($data = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $data['nama_sepatu'] ?></td>
                                    <td><img src="image/<?php echo $data['gambar']; ?>" height="100" alt="Gambar Barang"></td>
                                    <td><?php echo $data['kategori'] ?></td>
                                    <td><?php echo $data['harga'] ?></td>
                                    <td><?php echo $data['ketersediaan_stok'] ?></td>
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