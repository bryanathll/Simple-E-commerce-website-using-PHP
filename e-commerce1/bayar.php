<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Pembelian</title>
    <!-- style-css -->
    <link rel="stylesheet" href="style-bayar.css" />
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
                        <h2>Bayar dengan kartu debit atau kartu kredit</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col personal pt-5 pb-3">
                        <p class="text-dark fw-light">perincian keuangan tidak dapat dibagikan kepada penjual</p>
                    </div>
                </div>
                <div class="row row-bor">
                    <div class="row row-bor notelp">
                        <div class="col">
                            <div class="form-group">
                                <p class="text-dark fw-light">Negara asal</p>
                                <input type="text" name="namadepan" class="form-style" placeholder="Negara asal"
                                    autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="row row-bor notelp">
                        <div class="col">
                            <div class="form-group">
                                <p class="text-dark fw-light">Email</p>
                                <input type="text" name="namadepan" class="form-style" placeholder="Email"
                                    autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="row row-bor prov">
                        <div style="margin: 0;" class="col">
                            <p>Nomor telepon</p>
                            <div class="form-group">
                                <input type="text" name="provinsi" class="form-style" placeholder="Masukkan No telepon"
                                    autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col address pt-5 pb-3">
                            <img style="width: 98%;" src="assets/img/card-heading.png" alt="">
                        </div>
                    </div>
                    <div class="row row-bor prov">
                        <div class="col">
                            <p>Card Number </p>
                            <div class="form-group">
                                <input type="text" name="provinsi" class="form-style"
                                    placeholder="Masukkan nama provinsi" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="row row-bor prov">
                        <div class="col">
                            <p>Holder Number</p>
                            <div class="form-group">
                                <input type="text" name="provinsi" class="form-style"
                                    placeholder="Masukkan nama provinsi" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    <div class="row row-bor prov">
                        <div class="col-6">
                            <p>Expiration (MM/YY)</p>
                            <div class="form-group">
                                <input type="text" name="provinsi" class="form-style"
                                    placeholder="Masukkan nama provinsi" autocomplete="off" />
                            </div>
                        </div>
                        <div class="col-6">
                            <p>CVV</p>
                            <div class="form-group">
                                <input type="text" name="provinsi" class="form-style"
                                    placeholder="Masukkan nama provinsi" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid gap- pt-2">
                    <a class="btn btn-dark btn-md" style="font-size: 18px; col-lg-12 border-radius: 12px;"
                    href="thanks.php" role="button">bayar</a>
                    </div>
        
                </div>
                </div>

</body>

</html>