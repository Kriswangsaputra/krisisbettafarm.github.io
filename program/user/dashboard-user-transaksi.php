<?php

    session_start();
    require "fungsi.php";
    

    if (isset($_SESSION["login"])) {
            $nmpengguna = $_SESSION["nmpengguna"];
            $result = mysqli_query($koneksi, "SELECT * FROM akun_user WHERE nmpengguna_user = '$nmpengguna'");

            if (mysqli_num_rows($result) === 1 ) {
                
                $row = mysqli_fetch_assoc($result);}

    }

    $email=$_SESSION["email"];

    $admin = query("SELECT * FROM data_transaksi");



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
                        <?php 
                            if (!isset($_SESSION["login"])) { ?>
                                <li class="nav-item ms-3">
                                    <a class="btn btn-primary" href="login-user.php" role="button">Masuk</a>
                                </li>
                        <?php }else {
                                    if ($row["foto_user"] === "")  { ?>
                                        <li class="nav-item ms-3">
                                            <a class="btn btn-primary" href="dashboard-user.php" role="button">Profil Pengguna</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <img src="../../img/galeri/pp.png" class="rounded-circle" alt="..." style="width:40px; height:40px;">
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="btn btn-primary" href="keluar.php" role="button" onclick="return confirm('Apakah Anda Yakin Untuk Keluar?!');"><i class="fa-solid fa-right-from-bracket"></i></a>
                                        </li>
                                    <?php } else { ?>
                                        <li class="nav-item ms-3">
                                            <a class="btn btn-primary" href="dashboard-user.php" role="button">Profil Pengguna</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <img src="../../img/upload/<?= $row["foto_user"];?>" class="rounded-circle" alt="..." style="width:40px; height:40px;">
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="btn btn-primary" href="keluar.php" role="button"><i class="fa-solid fa-right-from-bracket" onclick="return confirm('Apakah Anda Yakin Untuk Keluar?!');"></i></a>
                                        </li>
                                    <?php }
                        } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- akhir navigasi panel -->

        <!-- bagian utama -->
        <div class="container-fluid" id="dashboard">
            <div class="row">
                <div class="col">
                    <!-- foto profil -->
                    <div class="card shadow" style="width: 30rem;">
                        <div class="card-body">
                            <div class="row" >
                            <?php
                                    if ($row["foto_user"] === "") { ?>
                                        <div class="col">
                                            <a href="dashboard-user-ubah-foto.php" style="text-decoration:none;">
                                                <img src="../../img/galeri/pp.png" class="rounded-circle shadow" alt="..." id="pp-user">
                                            </a>
                                            <a href="dashboard-user-ubah-foto.php" style="text-decoration:none; color:black;">
                                                <i class="fa-solid fa-pen-to-square" id="ganti-pp"></i>
                                            </a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col">
                                            <a href="dashboard-user-ubah-foto.php" style="text-decoration:none;">
                                                <img src="../../img/upload/<?=$row["foto_user"];?>" class="rounded-circle shadow" alt="..." id="pp-user">
                                            </a>
                                            <a href="dashboard-user-ubah-foto.php" style="text-decoration:none; color:black;">
                                                <i class="fa-solid fa-pen-to-square" id="ganti-pp"></i>
                                            </a>
                                        </div>
                                    <?php }
                                ?>
                                <div class="col">
                                    <h4 class="pp-capt"><?= $row["nama_user"];?></h4>
                                    <p style="font-size: 14px;">Silahkan Kelola Profil Anda</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir foto profil -->

                    <!-- submenu -->
                    <div class="card shadow" style="width: 30rem;" id="submenu-dashboard">
                        <div class="card-body">
                            <ul>
                                <li><a href="dashboard-user.php"><i class="fa-solid fa-user"></i> Profil</a></li>
                                <li><a href="dashboard-user-ubah-sandi.php"><i class="fa-solid fa-lock"></i> Ganti Kata Sandi</a></li>
                                <li><a href="dashboard-user-pelatihan.php"><i class="fa-solid fa-list-check"></i> Pelatihan</a></li>
                                <li><a href="dashboard-user-transaksi.php"><i class="fa-brands fa-shopify"></i></i> Pembelian</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- akhir submenu -->
                </div>
                <div class="col">
                    <div class="card shadow" >
                        <div class="card-header">
                            <h5 class="card-title">Data Transaksi</h5>
                        </div>
                        <div class="card-body">
                                    <table class="table mb-5">
                                        <tr>
                                            <th scope="col">Nomor</th>
                                            <th scope="col">ID Transaksi</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Jumlah Beli</th>
                                            <th scope="col">Total Bayar</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Cetak</th>

                                        </tr>
                                            <?php $i=1; ?>
                                            <?php foreach( $admin as $data) : ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$data["id_transaksi"];?></td>
                                                    <td><?=$data["nm_produk"];?></td>
                                                    <td><?=$data["jmlh_beli"];?></td>
                                                    <td><?=$data["total_harga"];?></td>
                                                    <td style="background-color:#198754; font-weight:bold;">
                                                        <?=$data["status_transaksi"];?>
                                                    </td>
                                                    <td><a href="struk.php?id=<?=$data["id_transaksi"];?>" type="button" class="btn btn-outline-primary">Cetak</a></td>
                                                </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                    </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir bagian utama -->

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