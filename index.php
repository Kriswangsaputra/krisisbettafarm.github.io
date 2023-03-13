<?php

    session_start();
    require "program/user/fungsi.php";
    

    if (isset($_SESSION["login"])) {
            $nmpengguna = $_SESSION["nmpengguna"];
            $result = mysqli_query($koneksi, "SELECT * FROM akun_user WHERE nmpengguna_user = '$nmpengguna'");

            if (mysqli_num_rows($result) === 1 ) {
                
                $row = mysqli_fetch_assoc($result);
            }

            if (isset($_COOKIE["pelatihan"])) {
                if ($_COOKIE["nama"] != $row["nama_user"]) {
                    setcookie('pelatihan','',time()-1);
                    setcookie('nama','',time()-1);
                    setcookie('telepon','',time()-1);
                    setcookie('email','',time()-1);
                    setcookie('judul','',time()-1);
                }
            }
    }

    // komentar
    if (isset($_POST["kirim"])) {
        if (komentar($_POST) > 0 ) {
            echo "<script>alert('Komentar Terkirim, Terimakasih');</script>";
        }else{
            echo "<script>alert('Komentar Tidak Terkirim');</script>";
        }
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KrisisBetta.com</title>
        <link rel="stylesheet" type="text/css" href="program/user/user.css">
        <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
        <script src="https://kit.fontawesome.com/ff8b67bae7.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        
        <!-- Navigasi panel -->
        <nav class="navbar navbar-expand-lg bg-black mx-auto fixed-top">
            <div class="container-fluid">
                <p class="h1">
                    <a class="navbar-brand text-success" href="index.php" style="font-size:50px; margin-left: 100px;">KrisisBetta</a>
                </p>             
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item ms-3">
                            <a class="nav-link active text-light" aria-current="page" href="index.php">Beranda</a>
                        </li>
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle text-light" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Belajar
                            </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item text-dark" href="program/user/jenis-ikan-cupang.php">Jenis Ikan Cupang</a></li>
                                    <li><a class="dropdown-item text-dark" href="program/user/sejarah-ikan-cupang.php">Sejarah Ikan Cupang</a></li>
                                </ul>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link text-light" href="#visimisi">Tentang Kami</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link text-light" href="#footer">Hubungi Kami</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link text-light" href="program/user/pendaftaran-pelatihan.php">Pelatihan</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link text-light" href="program/user/toko.php">Toko</a>
                        </li>                        
                        <?php 
                            if (!isset($_SESSION["login"])) { ?>
                                <li class="nav-item ms-3">
                                    <a class="btn btn-primary" href="program/user/login-user.php" role="button">Masuk</a>
                                </li>
                        <?php }else {
                                    if ($row["foto_user"] === "")  { ?>
                                        <li class="nav-item ms-3">
                                            <a class="btn btn-primary" href="program/user/dashboard-user.php" role="button">Profil Pengguna</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <img src="img/galeri/pp.png" class="rounded-circle" alt="..." style="width:40px; height:40px;">
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="btn btn-primary" href="program/user/keluar.php" role="button" onclick="return confirm('apakah anda yakin untuk keluar?!');"><i class="fa-solid fa-right-from-bracket"></i></a>
                                        </li>
                                    <?php } else { ?>
                                        <li class="nav-item ms-3">
                                            <a class="btn btn-primary" href="program/user/dashboard-user.php" role="button">Profil Pengguna</a>
                                        </li>
                                        <li class="nav-item ms-3">
                                            <img src="img/upload/<?= $row["foto_user"];?>" class="rounded-circle" alt="..." style="width:40px; height:40px;">
                                        </li>
                                        <li class="nav-item ms-3">
                                            <a class="btn btn-primary" href="program/user/keluar.php" role="button" onclick="return confirm('apakah anda yakin untuk keluar?!');"><i class="fa-solid fa-right-from-bracket"></i></a>
                                        </li>
                                    <?php }
                        } ?>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- akhir navigasi panel -->

        <!-- jumbotron -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/hero/hero1.jpg" class="d-block w-100" alt="...">
                    <div class="row justify-content-end" id="jumbo">
                        <div class="col-sm">
                            <div class="jumbotron">
                                <h1 class="display-4 text-light">Krisis betta</h1>
                                <p class="lead text-light">Berkembang Dalam Usaha Mandiri Budidaya Ikan Cupang</p>
                                <p class="text-light">Daftar Dan Bergabung Dengan Kami</p>
                                <a class="btn btn-primary btn-lg" href="program/user/pendaftaran-pelatihan.php" role="button">Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/hero/hero2.jpg" class="d-block w-100" alt="...">
                        <div class="row justify-content-end" id="jumbo2">
                            <div class="col-sm">
                                <div class="jumbotron">
                                    <h1 class="display-4 text-light">Krisis betta</h1>
                                    <p class="lead text-light">Berkembang Dalam Usaha Mandiri Budidaya Ikan Cupang</p>
                                    <p class="text-light">Daftar Dan Bergabung Dengan Kami</p>
                                    <a class="btn btn-primary btn-lg" href="program/user/pendaftaran-pelatihan.php" role="button">Daftar</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- jumbotron -->

        <!-- visi misi -->
        <div class="container">
            <p class="h1 mt-5" id="visimisi">Visi & Misi</p>
            <p class="text-center mt-3">-- Bergabung Dengan Kami Belajar Dengan Pembimbing Berpengalaman --</p>
            <div class="row mt-5">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center">Visi</h5>
                            <h6 class="card-subtitle mb-2 text-muted text-center">Visi</h6>
                            <p class="card-text">
                                <ol>
                                    <li>Mencetak petani ikan cupang yang kompeten</li>
                                    <li>Memajukan budidaya perikanan dalam bidang ikan hias dalam hal ini ikan hias jenis cupang (Betta sp)</li>
                                    <li>Menciptakan lapangan pekerjaan</li>
                                    <li>Mampu bersaing dalam bidang budidaya perikanan baik dalam negeri maupun luar negeri</li>
                                </ol>
                            </p>  
                        </div>
                    </div>
                </div>
                <div class="col">
                <img src="img/galeri/visimisi.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center">Misi</h5>
                            <h6 class="card-subtitle mb-2 text-muted text-center">Misi</h6>
                            <p class="card-text">
                                <ol>
                                    <li>Menghadirkan pelatihan budidaya ikan cupang yang mudah diakses masyarakat</li>
                                    <li>Memiliki bahan ajar yang valid untuk dijadikan materi pembelajaran dalam pelatihan sehingga dapat meningkatkan kemampuan budidaya para petani ikan cupang</li>
                                    <li>Pelatihan tersertifikasi serta pengadaan lapangan pekerjaan</li>
                                </ol>
                            </p>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir visi misi -->

        <!-- koleksi Kami -->
        <div class="row mt-5 bg-secondary" style="width:100%;">
                    <center>
                    <div class="card mb-5" style="width: 15rem;">
                        <div class="card-body">
                            <p class="h2">Koleksi Kami</p>
                        </div>
                    </div>
                    </center>

                    <div class="col">
                        <div class="card ms-5" style="width: 15rem;">
                            <img src="img/galeri/redkoi.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Red Koi</h5>
                                <p class="card-text">Ikan Cupang Jenis ekor pendek ini sering disebut ikan cupang red koi karena kemiripannya dengan ikan red koi</p>
                                <a href="program/user/jenis-ikan-cupang.php" class="btn btn-primary">Pelajari Jenis</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                            <img src="img/galeri/halfmoon.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Halfmoon</h5>
                                <p class="card-text">Ikan cupang paling populer dikalangan masyarakat, mudah dikenali dengan bentuk tubuh yang menyerupai setengah bulan</p>
                                <a href="program/user/jenis-ikan-cupang.php" class="btn btn-primary">Pelajari Jenis</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                            <img src="img/galeri/marble.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Marble</h5>
                                <p class="card-text">Ikan cupang jenis ekor pendek yang memiliki variasi warna biru dot dot, atau sering kita sebut marble.
                                </p>
                                <a href="program/user/jenis-ikan-cupang.php" class="btn btn-primary">Pelajari Jenis</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 15rem;">
                            <img src="img/galeri/crowntail.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Crowntail</h5>
                                <p class="card-text">Ikan cupang jenis crowntail sangat mudah dijumpai.
                                </p>
                                <a href="program/user/jenis-ikan-cupang.php" class="btn btn-primary">Pelajari Jenis</a>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- akhir Koleksi Kami -->

        <!-- footer -->
        <div class="row bg-black" style="width:100%; padding-left:200px;" id="footer">

            <p class="h1 mt-5 mb-5">
                <a class="navbar-brand text-success" href="index.php" style="font-size:50px; margin-left: -100px;">KrisisBetta</a>
            </p>
            <div class="col-sm">
                <h4 class="text-success"><i class="fa-solid fa-book"></i> Hubungi Kami</h4>
                <p class="text-light">Anda dapat mengirim pesan kepada kami, dimohon untuk tidak mengirim pesan bersifat sara atau ujaran kebencian lainnya</p>
            </div>
            <div class="col-sm">
                <h4 class="text-success"><i class="fa-solid fa-inbox"></i> Tulis Pesan Disini</h4>
                <div class="mb-3 text-light">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td><label for="exampleFormControlInput1" class="form-label">nama</label></td>
                                <td><label for="exampleFormControlInput1" class="form-label">Email</label></td>
                            </tr>
                            <tr>
                                <td><input name="nama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama"></td>
                                <td><input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"></td>
                            </tr>
                        </table>
                        <label for="exampleFormControlInput1" class="form-label">Subjek</label>
                        <input name="subjek" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label text-light">Pesan Anda</label>
                        <textarea name="komentar" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <button name="kirim" type="submit" class="btn btn-outline-primary mt-2" style="width:400px;">Kirim</button>
                    </form>
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