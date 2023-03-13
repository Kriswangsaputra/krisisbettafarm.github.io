<?php

    session_start();
    require "fungsi-admin.php";
    

    if (isset($_SESSION["login"])) {
            $nmpengguna = $_SESSION["nmpengguna"];
            $result = mysqli_query($koneksi, "SELECT * FROM akun_admin WHERE nmpengguna_adm = '$nmpengguna'");

            if (mysqli_num_rows($result) === 1 ) {
                
                $row = mysqli_fetch_assoc($result);}

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
                    <a class="navbar-brand text-white" href="dashboard-admin.php" style="font-size:35px; margin-left: 100px;">Selamat Datang Admin KrisisBetta!</a>
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
                <div class="col">
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
                        <div class="col-12 col-sm-12" style="margin-bottom:100px;">
                            <span> 
                                <h2><i class="fa-solid fa-shop"></i>TOKO</h2>
                                <hr style="width:900px;">
                            </span>
                        </div>
                        <div class="col-8 col-sm-4 me-5" style="margin-left: -150px;">
                            <div class="card" style="width: 18rem;" id="profil-admin">
                                <div class="card-header">
                                    <h5 class="card-title">PRODUK</h5>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Data Produk</h5>
                                    <p class="card-text">Input dan Perbarui Data Produk</p>
                                    <a href="dashboard-admin-input-produk.php" class="btn btn-primary">Kelola</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-6">
                            <div class="card" style="width: 18rem;" id="profil-admin">
                                <div class="card-header">
                                    <h5 class="card-title">DATA PEMBELIAN</h5>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Data Transaksi</h5>
                                    <p class="card-text">Data Setiap Transaksi Jual Beli</p>
                                    <a href="dashboard-admin-data-pembelian.php" class="btn btn-primary">Kelola</a>
                                </div>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>

        <!-- footer -->
        <div class="row bg-black" style="width:100%; padding-left:200px; position:absolute;">

            <p class="h1 mt-5 mb-5">
                <a class="navbar-brand text-success" href="dashboard-admin.php" style="font-size:50px; margin-left: -100px;">KrisisBetta</a>
            </p>
        </div>
        <!-- akhir footer -->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>