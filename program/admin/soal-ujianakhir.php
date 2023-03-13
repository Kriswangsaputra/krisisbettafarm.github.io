<?php

    session_start();
    require "fungsi-admin.php";
    

    if (isset($_SESSION["login"])) {
            $nmpengguna = $_SESSION["nmpengguna"];
            $result = mysqli_query($koneksi, "SELECT * FROM akun_admin WHERE nmpengguna_adm = '$nmpengguna'");

            if (mysqli_num_rows($result) === 1 ) {
                
                $row = mysqli_fetch_assoc($result);}

    }

    $admin = query("SELECT * FROM ujian_akhir_budidaya");

    if (isset($_POST["submit"])) {
        
        if (ujianakhirbudidaya($_POST) > 0 ) {
            echo "<script> 
            alert('soal Baru Berhasil Ditambahkan!');
            </script>";
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
                <div class="col" id="kol-dashboard" style="margin-right: -100px;">
                    <div class="row" id="header-dashboard">
                        <div class="col">
                            <span> 
                                <h2><i class="fa-solid fa-newspaper"></i>UJIAN AKHIR BUDIDAYA</h2>
                                <hr style="width:900px;">
                            </span>
                        </div>
                    </div>
                    <a class="btn btn-primary me-5" href="dashboard-admin-keloladatapelatihan.php" role="button">Kembali</a>

                    <div class="card mt-5">
                        <h5 class="card-header">Form Tambah soal ujian akhir budidaya</h5>
                        <div class="card-body shadow">
                            <form action="" method="post">
                                <div class="kotak-isian">
                                    <input type="text" name="soal" class="form-info">
                                    <label for="" class="label-form-info">soal</label>
                                </div>

                                <table>
                                    <tr>
                                        <td>
                                            <div class="kotak-isian">
                                                <input type="text" name="pilihan1" class="form-info">
                                                <label for="" class="label-form-info">Pilihan 1</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="kotak-isian">
                                                <input type="text" name="pilihan2" class="form-info">
                                                <label for="" class="label-form-info">Pilihan 2</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="kotak-isian">
                                                <input type="text" name="pilihan3" class="form-info">
                                                <label for="" class="label-form-info">Pilihan 3</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="kotak-isian">
                                                <input type="text" name="pilihan4" class="form-info">
                                                <label for="" class="label-form-info">Pilihan 4</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="kotak-isian">
                                    <input type="text" name="jawaban" class="form-info">
                                    <label for="" class="label-form-info">jawaban</label>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-5">
                        <h5 class="card-header">soal ujian akhir budidaya</h5>
                        <div class="card-body shadow">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Soal</th>
                                        <th scope="col">Pilihan 1</th>
                                        <th scope="col">Pilihan 2</th>
                                        <th scope="col">Pilihan 3</th>
                                        <th scope="col">Pilihan 4</th>
                                        <th scope="col">Jawaban</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($admin as $data) : ?>
                                    <tr>
                                        <th scope="row"><?=$i;?></th>
                                        <td><?=$data["id"];?></td>
                                        <td><?=$data["soal"];?></td>
                                        <td><?=$data["pilihan1"];?></td>
                                        <td><?=$data["pilihan2"];?></td>
                                        <td><?=$data["pilihan3"];?></td>
                                        <td><?=$data["pilihan4"];?></td>
                                        <td><?=$data["jawaban"];?></td>
                                        <td>
                                            <button type="button" class="btn btn-danger">hapus</button>
                                        </td>
                                    </tr>
                                    <?php $i++;?>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
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