<?php
require "session.php";
require "koneksi.php";
$nama = htmlspecialchars($_GET['nama_sepatu']);

$queryProduk = mysqli_query($config, "SELECT barang.*, k1.nama_kategori AS nama_kategori1, k2.nama_kategori2 AS nama_kategori2 FROM barang 
JOIN kategori AS k1 ON barang.id_kategori = k1.id_kategori
JOIN kategori2 AS k2 ON barang.id_kategori2 = k2.id_kategori WHERE nama_sepatu = '$nama'");
$produk = mysqli_fetch_array($queryProduk);

$querykategori = mysqli_query($config, "SELECT cart.*, tb_size.size AS size FROM cart 
JOIN tb_size ON cart.size = tb_size.size_id WHERE nama_sepatu = '$nama'");
$cart =  mysqli_fetch_array($querykategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Data Pembelian</title>
  <!-- style-css -->
  <link rel="stylesheet" href="style-pembelian.css" />
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <!-- feather-icons -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
  <?php require "navbar.php" ?>



  <div class="pembelian">
    <div class="row">
      <div class="col-6">
        <div class="row">
          <div class="col">
            <h2>Checkout</h2>
          </div>
        </div>
        <div class="row">
          <div class="col personal pt-5 pb-3">
            <h5>Personal details</h5>
          </div>
        </div>
        <div class="row row-bor">
          <div class="col">
            <p>Nama Depan</p>
            <div class="form-group">
              <input type="text" name="namadepan" class="form-style" placeholder="Masukkan nama" autocomplete="off" />
            </div>
          </div>
          <div class="col">
            <p>Nama Belakang</p>
            <div class="form-group">
              <input type="text" name="namabelakang" class="form-style" placeholder="Masukkan nama"
                autocomplete="off" />
            </div>
          </div>
        </div>
        <div class="row row-bor notelp">
          <div class="col-6">
            <p>No Telepon</p>
            <div class="form-group">
              <input type="text" name="notelp" class="form-style" placeholder="Masukkan no telp" autocomplete="off" />
            </div>
          </div>
          <div class="col-6">
            <p>email</p>
            <div class="form-group">
              <input type="text" name="email" class="form-style" placeholder="Masukkan no telp" autocomplete="off" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col address pt-5 pb-3">
            <h5>Shopping address</h5>
          </div>
        </div>
        <div class="row row-bor prov">
          <div class="col">
            <p>Provinsi</p>
            <div class="form-group">
              <input type="text" name="provinsi" class="form-style" placeholder="Masukkan nama provinsi"
                autocomplete="off" />
            </div>
          </div>
          <div class="col">
            <p>Kab/Kota</p>
            <div class="form-group">
              <input type="text" name="kab/kota" class="form-style" placeholder="Masukkan nama kab/kota"
                autocomplete="off" />
            </div>
          </div>
        </div>
        <div class="row row-bor  kec">
          <div class="col">
            <p>Kecematan</p>
            <div class="form-group">
              <input type="text" name="kecematan" class="form-style" placeholder="Masukkan nama kecematan"
                autocomplete="off" />
            </div>
          </div>
          <div class="col">
            <p>Kelurahan</p>
            <div class="form-group">
              <input type="text" name="kelurahan" class="form-style" placeholder="Masukkan nama kelurahan"
                autocomplete="off" />
            </div>
          </div>
        </div>
        <div class="row row-bor kodepos">
          <div class="col-9">
            <p>Alamat Lengkap</p>
            <div class="form-group">
              <input type="text" name="alamat" class="form-style" placeholder="Masukkan alamat" autocomplete="off" />
            </div>
          </div>
          <div class="col-3">
            <p>Kode Pos</p>
            <div class="form-group">
              <input type="text" name="kdpos" class="form-style" placeholder="kode pos" autocomplete="off" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col payment pt-5 pb-3">
            <h5>Payment method</h5>
          </div>
        </div>
        <select class="form-select form-select-lg mb-3 " aria-label=".form-select-lg example">
          <option selected>Metode pembayaran</option>
          <option value="1">
            <h5><img src="assets/img/credit.png" alt="" /> Credit/debit card</h5>
          </option>
          <option value="2">
            <h5><img src="assets/img/image 2.png" alt="" />QRIS</h5>
          </option>
        </select>
        <div class="row">
          
        <a class="btn btn-dark btn-md" style="font-size: 18px; col-lg-12 border-radius: 12px;"
                    href="bayar.php" role="button"><input type="submit" name="submit" value="Checkout" class=" btn btn-dark" ></a>
        </div>
      </div>
      <div class="col-6 ps-5 col-ringkasan" style="padding-left: 5rem">
        <table class="table">
          <tbody>
            <h4 class="pb-5 ps-1">Ringkasan pesanan</h4>
            <tr class="text-start justify-content-around ">
              <th class="text-start fw-normal" scope="row">Total Produk</i></th>
              <td class="pb-4"><?php echo $produk['harga'] ?></td>
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
              <td class="pb-4"><?php echo $produk['harga'] ?></td>
            </tr>
          </tbody>
        </table>
        <div class="row pt-3">
          <div class="col-4">
          <img src="Panel-Admin/image/<?php echo $produk['gambar']; ?>" height="100" alt="">
          </div>
          <div class="col-4 ">
            <p style="margin: 0;"><?php echo $produk['nama_sepatu'] ?></p>
            <p style="margin: 0;"><?php echo $produk['kode_sepatu'] ?></p>
            <p style="margin: 0;">Gender: <?php echo $produk['nama_kategori1'] ?></p>
            <p style="margin: 0;">Size:<?php echo $cart['size'] ?></p>
          </div>
          <div class="col-4">
            <p style="margin: 0;"><?php echo $produk['harga'] ?></p>
            <p style="margin: 0;">Total: <?php echo $produk['harga'] ?></p>
          </div>
        </div>
       
      </div>
    </div>
  </div>

  <?php require "footer.php" ?>

</body>

</html>