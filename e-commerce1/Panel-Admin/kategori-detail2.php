<?php
    require "session.php";
    require "koneksi.php";

    $id = $_GET['q'];

    $query = mysqli_query($config, "SELECT * FROM kategori2 WHERE id_kategori='$id'");
    $data = mysqli_fetch_array($query);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php require "navbar.php";?>

    <div class="container mt-5">
        <h2>Detail Kategori</h2>

        <div class="col-12 col-md-6">
        <form method="post" action="">
           
                <div>
                    <label for="kategori2">Kategori</label>
                    <input type="text" name="kategori2" id="kategori2" class="form-control" value="<?php echo $data['nama_kategori2']; ?>">
                </div>

                <div class="mt-5 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
                    <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
                </div>
            </form>

            <?php
                if(isset($_POST['editBtn'])){
                    $kategori = htmlspecialchars($_POST['kategori2']);
                
                    if($data['nama_kategori2']==$kategori){
                        ?>
                        <meta http-equiv="refresh" content="0; url=kategori.php" />
                        <?php
                    }
                    else{
                        $query = mysqli_query($config, "SELECT * FROM kategori2 WHERE nama_kategori2='$kategori'");
                        $jumlahData = mysqli_num_rows($query);

                        if($jumlahData > 0){
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                Kategori Sudah Ada
                            </div>
                            <?php
                        }
                        else{
                            $querySimpan = mysqli_query($config, "UPDATE kategori2 SET nama_kategori2='$kategori' WHERE id_kategori='$id'");
    
                            if($querySimpan){
                                ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                    Kategori Berhasil Diupdate
                                </div>

                                <meta http-equiv="refresh" content="2; url=kategori.php" />
                                <?php
                            }
                            else{
                                echo mysqli_error($config);

                            }
                        }
                    }
                }

                if(isset($_POST['deleteBtn'])){
                    $queryCheck = mysqli_query($config, "SELECT * FROM barang WHERE id_kategori = '$id'" );
                    $dataCount = mysqli_num_rows($queryCheck);
                    
                    if ($dataCount >0){
                        ?>

                        <div class="alert alert-warning mt-3" role="alert">
                            Kategori tidak bisa dihapus karena sudah digunakan di produk
                        </div>
                        <?php
                        die();
                    }  

                    $queryDelete = mysqli_query($config, "DELETE FROM kategori2 WHERE id_kategori='$id'");
                    
                    if($queryDelete){
                        ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Kategori Berhasil Dihapus
                        </div>

                        <meta http-equiv="refresh" content="2; url=kategori.php" />
                        <?php
                    }
                    else{
                        echo mysqli_error($config);
                    }
                }
            ?>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>