<?php
require "session.php";
require "koneksi.php";



$query = mysqli_query($config, "SELECT barang.*, k1.nama_kategori AS nama_kategori1, k2.nama_kategori2 AS nama_kategori2 FROM barang 
JOIN kategori AS k1 ON barang.id_kategori = k1.id_kategori
JOIN kategori2 AS k2 ON barang.id_kategori2 = k2.id_kategori");


$jumlahBarang = mysqli_num_rows($query);
$product_data = mysqli_fetch_array($query);

// Periksa apakah data produk ditemukan
if (!$product_data) {
    echo "Produk tidak ditemukan";
    exit;
}

$querykategori = mysqli_query($config, "SELECT * FROM kategori");
$querykategori2 = mysqli_query($config, "SELECT * FROM kategori2");
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
                </div>
                <div>
                    <label for="kategori">Kategori 1</label>
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
                    <label for="kategori2">Kategori 2</label>
                    <select name="kategori2" id="kategori2" class="form-control">
                        <option value="">Pilih Satu</option>
                        <?php mysqli_data_seek($querykategori2, 0); // Mengembalikan posisi result set ke awal
                        while ($data = mysqli_fetch_array($querykategori2)) { ?>
                            <option value="<?php echo $data['id_kategori']; ?>">
                                           <?php echo $data['nama_kategori2']; ?>
                             </option>
                           <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="kode_sepatu">Kode sepatu</label>
                    <input type="text" class="form-control" name="kode_sepatu" required>
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
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan']))  {
                $nama = htmlspecialchars($_POST['nama_sepatu']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $kategori2 = htmlspecialchars($_POST['kategori2']);
                $kode = htmlspecialchars($_POST['kode_sepatu']);
                $harga = htmlspecialchars($_POST['harga']);
                $detail = htmlspecialchars($_POST['detail']);

                $target_dir = "./image/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                

                if ($nama == '' || ($kategori == '' && $kategori2 == '') || $harga == '') {
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Nama, kategori, dan harga wajib diisi
                    </div>
                    <?php
                } 
                else {
                    if ($nama_file != '') {
                        if ($image_size > 500000) {
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File tidak boleh lebih dari 5mb
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
                     $insertQuery = mysqli_query($config, "INSERT INTO barang(nama_sepatu, id_kategori, id_kategori2, harga, gambar, detail, kode_sepatu) 
                     VALUES ('$nama', '$kategori', '$kategori2', '$harga', '$new_name','$detail','$kode')");
                     
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
                            <th>Kategori</th>
                            <th>Kode Sepatu</th>
                            <th>Harga</th>
                            <th>action</th>
                      
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlahBarang == 0) {
                        ?>
                            <tr>
                                <td colspan="6" class="text-center">Data Barang Tidak Tersedia</td>
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
                                    <td><?php echo $data['nama_kategori1']?> - <?php echo $data['nama_kategori2']?></td>
                                    <td><?php echo $data['kode_sepatu']?> </td>
                                    <td><?php echo $data['harga'] ?></td>
                                    <td>
                                    <a href="product-detail.php?id=<?php echo $data['id_barang']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
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
