<?php

    session_start();
    require "fungsi-admin.php";
    

    if (isset($_SESSION["login"])) {
            $nmpengguna = $_SESSION["nmpengguna"];
            $result = mysqli_query($koneksi, "SELECT * FROM akun_admin WHERE nmpengguna_adm = '$nmpengguna'");

            if (mysqli_num_rows($result) === 1 ) {
                
                $row = mysqli_fetch_assoc($result);}

    }

    if (isset($_POST["submit"])) {
        
        if (ubahkontak($_POST) > 0 ) {
            echo "<script>
                alert('Data Berhasil Di Ubah!');
                document.location.href='dashboard-admin-kontak.php';
            </script>";
        }else {
            echo "
                <script>alert('Data Gagal Di Ubah!');
            ";
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
                                <h2><i class="fa-solid fa-circle-user"></i>PROFIL ADMIN</h2>
                                <hr style="width:900px;">
                            </span>
                        </div>
                    </div>
                    <div class="row" id="row-admin">
                        <div class="col" id="col-admin">
                            <!-- foto profil -->
                            <div class="card shadow" style="width: 25rem;">
                                <div class="card-body">
                                    <div class="row" >
                                    <?php
                                        if ($row["foto_adm"] === "") { ?>
                                            <div class="col">
                                                <a href="dashboard-admin-gantipp.php" style="text-decoration:none;">
                                                    <img src="../../img/galeri/pp.png" class="rounded-circle shadow" alt="..." id="pp-user">
                                                </a>
                                                <a href="dashboard-admin-gantipp.php" style="text-decoration:none; color:black;">
                                                    <i class="fa-solid fa-right-from-bracket"></i>
                                                </a>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col">
                                                <a href="dashboard-admin-gantipp.php" style="text-decoration:none;">
                                                    <img src="../../img/upload/<?=$row["foto_adm"];?>" class="rounded-circle shadow" alt="..." id="pp-user">
                                                </a>
                                                <a href="dashboard-admin-gantipp.php" style="text-decoration:none; color:black;">
                                                    <i class="fa-solid fa-right-from-bracket"></i>
                                                </a>
                                            </div>
                                        <?php }
                                    ?>
                            
                            <div class="col">
                                <h4 class="pp-capt"><?= $row["nama_adm"];?></h4>
                                <p style="font-size: 14px;">Silahkan Kelola Profil Anda</p>
                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- akhir foto profil -->
                            <!-- submenu -->
                            <div class="card shadow" style="width: 25rem;" id="submenu-dashboard">
                                <div class="card-body">
                                    <ul>
                                        <li><a href="dashboard-admin.php"><i class="fa-solid fa-user" id="submenu-profil"></i> Profil</a></li>
                                        <li><a href="dashboard-admin-ganti-sandi.php"><i class="fa-solid fa-lock" id="submenu-password"></i> Ganti Kata Sandi</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- akhir submenu -->
                        </div>
                        <div class="col">
                            <div class="card shadow" id="isi-submenu-profil-admin" style="width:28rem;">
                                <div class="card-header">
                                    <h5 class="card-title"><i class="fa-solid fa-id-card"></i> Kontak Pribadi</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?=$row["id_adm"];?>">
                                        <div class="kotak-isian">
                                            <input type="text" name="alamat" class="form-info" value="<?=$row["alamat_adm"];?>">
                                            <label for="" class="label-form-info">Alamat</label>
                                        </div>
                                        <div class="kotak-isian">
                                            <input type="Email" name="email" class="form-info" value="<?=$row["email_adm"];?>">
                                            <label for="" class="label-form-info">Email</label>
                                        </div>
                                        <div class="kotak-isian">
                                            <input type="number" name="telepon" class="form-info" value="<?=$row["telepon_adm"];?>">
                                            <label for="" class="label-form-info">Telepon</label>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-outline-primary" type="submit" name="submit">Ubah kontak Pribadi</button>
                                            <a href="dashboard-admin-kontak.php" type="button" class="btn btn-outline-success">Kembali</a>
                                        </div>
                                    </form>
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