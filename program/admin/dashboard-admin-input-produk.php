<?php

    session_start();

    require "fungsi-admin.php";
    

    if (isset($_SESSION["login"])) {
            $nmpengguna = $_SESSION["nmpengguna"];
            $result = mysqli_query($koneksi, "SELECT * FROM akun_admin WHERE nmpengguna_adm = '$nmpengguna'");

            if (mysqli_num_rows($result) === 1 ) {
                
                $row = mysqli_fetch_assoc($result);}

    }

    $admin = query("SELECT * FROM produk");

    if (isset($_POST["submit"])) {
        
        if (tambahproduk($_POST) > 0 ) {
            echo "<script> 
            alert('produk Baru Berhasil Ditambahkan!');
            document.location.href = 'dashboard-admin-input-produk.php';
            </script>";
        }else {
            echo mysqli_error($koneksi);
        }
    }

    
    if (isset($_GET["id"])) {
        $idupdate = $_GET["id"];
        $update = query("SELECT * FROM produk WHERE id_produk ='$idupdate'")[0];
    }

    if (isset($_POST["update"])) {
        
        if (updateproduk($_POST) > 0 ) {
            echo "<script> 
            alert('produk Baru Berhasil DiPerbarui!');
            document.location.href = 'dashboard-admin-input-produk.php';
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
                        <div class="col-6 col-sm-6">
                            <span> 
                                <h2><i class="fa-solid fa-shop"></i>INPUT PRODUK</h2>
                            </span>
                        </div>
                        <div class="col-6 col-sm-6">
                            <a href="dashboard-admin-toko.php" type="button" class="btn btn-outline-success">Kembali</a>
                        </div>
                        <hr style="width:900px; margin-bottom:100px;">
                    </div>
                    <div class="row mb-5">
                        <div class="col-8 col-sm-6">
                            <form action="" method="post" enctype="multipart/form-data">

                            <?php
                                $query = mysqli_query($koneksi, "SELECT max(id_produk) as kodeTerbesar FROM produk");
                                $data = mysqli_fetch_array($query);
                                $kodeBarang = $data['kodeTerbesar'];
                                
                                // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                                // dan diubah ke integer dengan (int)
                                $urutan = (int) substr($kodeBarang, 3, 3);
                                
                                // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                                $urutan++;
                                
                                // membentuk kode barang baru
                                // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                                // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                                // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                                $huruf = "PI";
                                $kodeBarang = $huruf . sprintf("%02s", $urutan);
                            ?>

                                <input type="text" name="id" class="form-info" value="<?= $kodeBarang;?>" hidden>
                                <input type="text" name="idupdate" class="form-info" value="<?php if (isset($update)) { echo $idupdate;}?>" hidden>
                                <div class="kotak-isian">
                                    <input type="text" name="nmikan" class="form-info" value="<?php if (isset($update)) { echo $update["nm_produk"];}?>">
                                    <label for="" class="label-form-info">Nama Ikan</label>
                                </div>
                                <div class="kotak-isian">
                                    <input type="text" name="usia" class="form-info" value="<?php if (isset($update)) { echo $update["usia_produk"];}?>">
                                    <label for="" class="label-form-info">Usia Ikan</label>
                                </div>
                                <div class="kotak-isian">
                                    <input type="text" name="stok" class="form-info" value="<?php if (isset($update)) { echo $update["stok_produk"];}?>">
                                    <label for="" class="label-form-info">Stok Ikan</label>
                                </div>
                                <div class="kotak-isian">
                                    <input type="text" name="harga" class="form-info" value="<?php if (isset($update)) {echo $update["harga_produk"];}?>">
                                    <label for="" class="label-form-info">Harga Ikan</label>
                                </div>
                                <div class="kotak-isian">
                                    <input type="file" name="gambar" class="form-info" value="<?php if (isset($update)) {echo $update["gambar"];}?>">
                                    <label for="" class="label-form-info">Foto Ikan</label>
                                </div>
                                <div class="kotak-isian">
                                    <input type="text" name="deskripsi" class="form-info" value="<?php if (isset($update)) {echo $update["deskripsi_produk"];}?>">
                                    <label for="" class="label-form-info">Deskripsi Ikan</label>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-primary" type="submit" name="submit">Simpan</button>
                                    <button class="btn btn-outline-success" type="submit" name="update">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-5"></div>
                        <div class="col-12 col-sm-12">

                            <div class="card">
                                <h5 class="card-header"> Produk</h5>
                                <div class="card-body shadow">
                                    <table class="table mb-5">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nama Ikan</th>
                                                <th scope="col">Usia Ikan</th>
                                                <th scope="col">Stok Ikan</th>
                                                <th scope="col">Harga Ikan</th>
                                                <th scope="col">Foto Ikan</th>
                                                <th scope="col">Deskripsi Ikan</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($admin as $row) : ?>
                                            <tr>
                                                <td><?=$row["id_produk"];?></td>
                                                <td><?=$row["nm_produk"];?></td>
                                                <td><?=$row["usia_produk"];?></td>
                                                <td style="
                                                <?php
                                                    if ($row["stok_produk"]>=3) {
                                                        ?>
                                                        background-color:green;
                                                        <?php
                                                    }elseif ($row["stok_produk"]>=2) { ?>
                                                        background-color:yellow;
                                                    <?php 
                                                    }else { ?>
                                                        background-color:red;
                                                    <?php }
                                                ?>
                                                ">
                                                    <?=$row["stok_produk"];?>
                                                </td>
                                                <td><?=$row["harga_produk"];?></td>
                                                <td><img src="../../img/upload/<?=$row["gambar"];?>" alt="" width="50"></td>
                                                <td><?=$row["deskripsi_produk"];?></td>
                                                <td>
                                                    <a class="btn btn-success mb-2" href="dashboard-admin-input-produk.php?id=<?=$row["id_produk"];?>" role="button">Update</a>

                                                    <a class="btn btn-danger mb-2" href="Hapus-admin.php?id=<?=$row["id_produk"];?>" role="button" onclick="return confirm('Yakin Untuk Menghapus Data?!');">Hapus</a>

                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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