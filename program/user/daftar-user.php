<?php

require 'fungsi.php';

    if (isset($_POST["submit"])) {
        
        if (registrasi($_POST) > 0 ) {
            echo "<script> alert('Pengguna Baru Berhasil Ditambahkan!')</script>";
        }else {
            echo mysqli_error($koneksi);
        }
    }

?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KrisisBetta.com</title>
        <link rel="stylesheet" type="text/css" href="user.css">
        <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
        <script src="https://kit.fontawesome.com/ff8b67bae7.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        
        <!-- Navigasi panel -->
        <nav class="navbar navbar-expand-lg bg-black mx-auto fixed-top">
            <div class="container-fluid">
                <p class="h1">
                    <a class="navbar-brand text-success" href="../../index.php" style="font-size:50px; margin-left: 100px;">KrisisBetta</a>
                </p>             
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item ms-3">
                            <a class="nav-link active text-light" aria-current="page" href="../../index.php">Beranda</a>
                        </li>
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Belajar
                            </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item text-dark" href="jenis-ikan-cupang.php">Jenis Ikan Cupang</a></li>
                                    <li><a class="dropdown-item text-dark" href="sejarah-ikan-cupang.php">Sejarah Ikan Cupang</a></li>
                                </ul>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link text-light" href="../../index.php#visimisi">Tentang Kami</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link text-light" href="#footer">Hubungi Kami</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link text-light" href="pendaftaran-pelatihan.php">Pelatihan</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link text-light" href="toko.php">Toko</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="btn btn-primary" href="login-user.php" role="button">Masuk</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- akhir navigasi panel -->

        <!-- form Pendaftaran -->
        <div class="row" style="margin-top:150px; width:100%;">
            
            <div class="col ps-5">
                <img src="../../img/galeri/login.jpg" class="card-img-top" alt="..." style="width:500px; height:500px;">
            </div>
            <div class="col pe-5">
                <center>
                    <h4>Registrasi Akun Anda Disini</h4>
                </center>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="namapengguna" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="namapengguna" placeholder="Masukan Nama Lengkap Anda">
                        </div>
                        <div class="mb-3">
                            <label for="namapengguna" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="namapengguna" placeholder="Masukan Tempat Lahir Anda">
                        </div>
                        <div class="mb-3">
                            <label for="namapengguna" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="namapengguna" placeholder="Masukan Tanggal Lahir Anda">
                        </div>
                        <div class="mb-3">
                            <label for="namapengguna" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="namapengguna" placeholder="Masukan Alamat Anda">
                        </div>
                        <div class="mb-3">
                            <label for="namapengguna" class="form-label">Nama Pengguna</label>
                            <input type="text" name="nmpengguna" class="form-control" id="namapengguna" placeholder="Masukan Nama Pengguna Anda">
                        </div>
                        <div class="mb-3">
                            <label for="namapengguna" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="namapengguna" placeholder="Masukan Email Anda">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Kata Sandi</label>
                            <input type="password" name="password" class="form-control" id="namapengguna" placeholder="Masukan Kata Sandi Anda">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" name="konfirmasi" class="form-control" id="namapengguna" placeholder="Konfirmasi Sandi Anda">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-success" style="width:610px;">Daftar</button>
                        </div>
                    </form>
                <p class="h5">Sudah Punya Akun ? <a href="login-user.php">Masuk Disini</a></p>
            </div>
        </div>
        <!-- akhir form pendaftaran -->

        <!-- footer -->
        <div class="row bg-black" style="width:100%; padding-left:200px;" id="footer">

            <p class="h1 mt-5 mb-5">
                <a class="navbar-brand text-success" href="../../index.php" style="font-size:50px; margin-left: -100px;">KrisisBetta</a>
            </p>
            <div class="col-sm">
                <h4 class="text-success"><i class="fa-solid fa-book"></i> Hubungi Kami</h4>
                <p class="text-light">Anda dapat mengirim pesan kepada kami, dimohon untuk tidak mengirim pesan bersifat sara atau ujaran kebencian lainnya</p>
            </div>
            <div class="col-sm">
                <h4 class="text-success"><i class="fa-solid fa-inbox"></i> Tulis Pesan Disini</h4>
                <div class="mb-3 text-light">
                    <table>
                        <tr>
                            <td><label for="exampleFormControlInput1" class="form-label">nama</label></td>
                            <td><label for="exampleFormControlInput1" class="form-label">Email</label></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama"></td>
                            <td><input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"></td>
                        </tr>
                    </table>
                    <label for="exampleFormControlInput1" class="form-label">Subjek</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label text-light">Pesan Anda</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <button type="button" class="btn btn-outline-primary mt-2" style="width:400px;">Kirim</button>
                </div>
            </div>
            <div class="col-sm">
                <h4 class="text-success"><i class="fa-solid fa-address-card"></i> Kontak Kami</h4>
                <ul class="text-light">
                    <li><i class="fa-solid fa-map-location-dot"></i> Jl. Brawijaya Raya No 5, Jakarta Selatan</li>
                    <li><i class="fa-brands fa-instagram-square"></i> @Krisis Betta Farm</li>
                    <li><i class="fa-solid fa-envelope"></i> Krisisbettafarm@gmail.com</li>
                    <li><i class="fa-solid fa-earth-americas"></i> WWW.Krisisbettafarm.com</li>
                </ul>
            </div>
        </div>
        <!-- akhir footer -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>