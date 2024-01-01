<?php
require "session.php";
require "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($config, "SELECT barang.*, k1.nama_kategori AS nama_kategori1, k2.nama_kategori2 AS nama_kategori2 FROM barang 
JOIN kategori AS k1 ON barang.id_kategori = k1.id_kategori
JOIN kategori2 AS k2 ON barang.id_kategori2 = k2.id_kategori
WHERE barang.id_barang = '$id'");


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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product detail</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
<?php require "navbar.php";?>

<div class="container mt-5">
        <h2>Detail product</h2>

        <div class="col-12 col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                  <label for="nama_sepatu">Nama</label>
                  <input type="text" id="kode_sepatu" name="nama_sepatu" value="<?php echo $product_data["nama_sepatu"] ?>" class="form-control" autocomplete="off" required>

                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="<?php echo $product_data["id_kategori"] ?>"> <?php echo $product_data["nama_kategori1"] ?></option>
                        <?php while ($data = mysqli_fetch_array($querykategori)) { ?>
                        <option value="<?php echo $data['id_kategori']; ?>">
                        <?php echo $data['nama_kategori']; ?>
                        </option>
                        <?php } ?>
                    </select>

                </div>

                <div>
                    <label for="kategori2">Kategori</label>
                    <select name="kategori2" id="kategori2" class="form-control">
                            <option value="<?php echo $product_data["id_kategori2"] ?>"> <?php echo $product_data["nama_kategori2"] ?></option>
                            <?php mysqli_data_seek($querykategori, 0); // Mengembalikan posisi result set ke awal
                            while ($data = mysqli_fetch_array($querykategori2)) { ?>
                            <option value="<?php echo $data['id_kategori']; ?>">
                            <?php echo $data['nama_kategori']; ?>
                            </option>
                             <?php } ?>
                    </select>

                </div>
                <div>
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" value= "<?php echo $product_data['harga']; ?>" name="harga" required>
                </div>
                <div>
                    <label for="currentfoto">foto prodcuct</label> <br>
                    <img src="image/<?php echo $product_data['gambar']; ?>" height="100" alt="Gambar Barang">
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
                            <?php echo $product_data['detail'] ?>
                    </textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                </div>
            </form>
            <?php
            if (isset($_POST['simpan'])) {
                $nama = htmlspecialchars($_POST['nama_sepatu']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $kategori2 = htmlspecialchars($_POST['kategori2']);
                $harga = htmlspecialchars($_POST['harga']);
                $detail = htmlspecialchars($_POST['detail']);
        
                // Perbarui data produk tanpa memeriksa gambar
                $queryupdate = mysqli_query($config, "UPDATE barang SET id_kategori='$kategori', 
                    id_kategori2='$kategori2', nama_sepatu='$nama', harga='$harga', 
                    detail='$detail' WHERE id_barang='$id'");
        
                if (!$queryupdate) {
                    echo mysqli_error($config);
                    exit; // Hentikan eksekusi kode jika terjadi kesalahan pada query
                }
        
                // Periksa apakah ada pembaruan gambar produk
                if ($_FILES["foto"]["size"] > 0) {
                    $target_dir = "image/";
                    $nama_file = basename($_FILES["foto"]["name"]);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $image_size = $_FILES["foto"]["size"];
                    $random_name = generateRandomString(20);
                    $new_name = $random_name . "." . $imageFileType;
        
                    if ($image_size > 10000000) {
                        ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            File tidak boleh lebih dari 10mb
                        </div>
                        <?php
                    } elseif ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                        ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            File wajib bertipe jpg, png, atau gif
                        </div>
                        <?php
                    } else {
                        // Hapus gambar lama jika ada
                        $old_image = $product_data['gambar'];
                        if (!empty($old_image)) {
                            unlink($target_dir . $old_image);
                        }
        
                        // Pindahkan gambar baru ke direktori tujuan
                        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
        
                        // Perbarui nama gambar pada database
                        $queryupdate = mysqli_query($config, "UPDATE barang SET gambar='$new_name' WHERE id_barang='$id'");
                        if ($queryupdate) {
                            ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Product Berhasil di update
                            </div>
                            <meta http-equiv="refresh" content="2; url=product.php" />
                            <?php
                        } else {
                            echo mysqli_error($config);
                        }
                    }
                } else {
                    // Tampilkan pesan sukses tanpa pembaruan gambar
                    ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Product Berhasil di update
                    </div>
                    <meta http-equiv="refresh" content="2; url=product.php" />
                    <?php
                }
            }
        
            if (isset($_POST['delete'])) {
                $queryhapus = mysqli_query($config, "DELETE FROM barang WHERE id_barang = '$id'");
        
                if ($queryhapus) {
                    ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Product Berhasil Dihapus
                    </div>
                    <meta http-equiv="refresh" content="2; url=product.php" />
                    <?php
                }
            }
        ?>
        </div>
</div>



<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>