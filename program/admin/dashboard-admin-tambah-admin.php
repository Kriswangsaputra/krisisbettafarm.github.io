<?php

require 'fungsi-admin.php';

    if (isset($_POST["submit"])) {
        
        if (registrasiadmin($_POST) > 0 ) {
            echo "<script> alert('admin Baru Berhasil Ditambahkan!')</script>";
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
        <link rel="stylesheet" type="text/css" href="admin.css">
        <link rel="stylesheet" type="text/css" href="sidebar.css">
        <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
        <script src="https://kit.fontawesome.com/ff8b67bae7.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>

        <!-- Navigasi panel -->
        <nav class="navbar navbar-expand-lg bg-black mx-auto fixed-top">
            <div class="container-fluid">
                <p class="h1">
                    <a class="navbar-brand text-white" href="#" style="font-size:35px; margin-left: 100px;">Selamat Datang Admin KrisisBetta!</a>
                </p>             
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <a href="keluar-admin.php" onclick="return confirm('Apakah Anda Yakin Untuk Keluar?!')">
                        <span style="margin-left:500px; font-size:30px;"><i class="fa-solid fa-right-from-bracket text-white"></i></span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- akhir navigasi panel -->


        <div class="container-sm">
            <div class="row">
                <div class="col" style="width:30rem;">
                    <!-- sidebar -->
                    <div class="sidebar">
                        <ul>
                            <li><a href="dashboard-admin.php"><i class="fa-solid fa-house-chimney"></i>Dashboard</a></li>
                            <li><a href="dashboard-admin-profil.php"><i class="fa-solid fa-circle-user"></i>Profil</a></li>
                            <li><a href="dashboard-admin-konten.php"><i class="fa-solid fa-newspaper"></i>Kelola Konten</a></li>
                            <li><a href="dashboard-admin-akunadmin.php"><i class="fa-solid fa-user-check"></i>Kelola Akun</a></li>
                            <li><a href="dashboard-admin-kelolakomentar.php"><i class="fa-solid fa-message"></i></i>Komentar</a></li>
                            <li><a href="dashboard-admin-toko.php"><i class="fa-solid fa-shop"></i>Toko</a></li>

                        </ul>
                    </div>
                    <!-- akhir sidebar -->
                </div>
                <div class="col" id="kol-dashboard">
                    <div class="row" id="header-dashboard">
                        <div class="col">
                            <span> 
                                <h2><i class="fa-solid fa-user-check"></i>KELOLA AKUN</h2>
                                <hr style="width:900px;">
                            </span>
                        </div>
                    </div>
                    <a class="btn btn-primary me-5" href="dashboard-admin-akunadmin.php" role="button">Kembali</a>

                    <div class="card mt-5">
                        <h5 class="card-header">Form Tambah Admin</h5>
                        <div class="card-body shadow">
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
                                <div class="d-grid gap-2">
                                    <button name="submit" class="btn btn-success" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <div class="row bg-black" style="width:100%; padding-left:200px; position:absolute;">

            <p class="h1 mt-5 mb-5">
                <a class="navbar-brand text-success" href="#" style="font-size:50px; margin-left: -100px;">KrisisBetta</a>
            </p>
        </div>
        <!-- akhir footer -->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>