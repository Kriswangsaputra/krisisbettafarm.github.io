<?php

    session_start();
    require "fungsi.php";
    

    if (isset($_SESSION["login"])) {
            $nmpengguna = $_SESSION["nmpengguna"];
            $result = mysqli_query($koneksi, "SELECT * FROM akun_user WHERE nmpengguna_user = '$nmpengguna'");

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
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <link rel="stylesheet" type="text/css" href="user.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://kit.fontawesome.com/ff8b67bae7.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
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

        <div class="container" style="margin-top:100px; margin-bottom:50px; margin-left:10px;">
            <div class="row">
                <div class="col">
                    <!-- side bar -->
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                    <strong>Pengantar Pelatihan</strong>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <a href="pelatihan-budidaya.php">Pengantar</a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                    <strong>Morfologi Ikan Cupang</strong>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body active">
                                    <a href="pelatihan-budidaya-taksonomi.php">Taksonomi Ikan Cupang</a>
                                </div>
                                <div class="accordion-body">
                                    <a href="pelatihan-budidaya-morfologi.php">Morfologi Ikan Cupang</a>
                                </div>
                                <div class="accordion-body">
                                    Quiz
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    <strong>Media Budidaya Ikan Cupang</strong>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    Persiapan dan Perlengkapan
                                </div>
                                <div class="accordion-body">
                                    Quiz
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                    <strong>Pemijahan Ikan Cupang</strong>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                                <div class="accordion-body">
                                    Perbedaan Jantan dan Betina
                                </div>
                                <div class="accordion-body">
                                    Proses Pemijahan
                                </div>
                                <div class="accordion-body">
                                    Quiz
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                    <strong>Pembesaran Ikan Cupang</strong>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                                <div class="accordion-body">
                                    Media Pembesaran
                                </div>
                                <div class="accordion-body">
                                    Proses Pembesaran
                                </div>
                                <div class="accordion-body">
                                    Quiz
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                                    <strong>Ujian Akhir</strong>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                                <div class="accordion-body">
                                    Pengantar
                                </div>
                                <div class="accordion-body">
                                    Ujian
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir sidebar -->
                </div>
                <div class="col">
                    <!-- bagian pelatihan -->
                    <div class="card shadow" style="width: 50rem; margin-right:-100px; padding: 20px;">
                        <div class="card-body">
                            <strong>
                                <h3>Morfologi Ikan Cupang</h3>
                            </strong>
                            <br>
                            <p style="text-align:justify;">
                            Ikan cupang memiliki bentuk tubuh yang langsing dan pipih kesamping serta warna yang beragam dengan kombinasi warna yang menarik, seperti merah, hijau, biru dan lain sebagainya. pada sisi tubuh terdapat garis horizontal yang umumnya berwarna gelap, dimulai dari mata hingga sirip ekor. 
                            </p>
                            <p style="text-align:justify;">
                            Secara fisik, cupsng memiliki ekor yang membentuk setengah lingkaran, baik yang berujung mulus atau yang membentuk serit. pada ikan cupang jantan memiliki bentuk tubuh yang proporsional dengan sirip yang nampak mengembang dengan kombinasi warna yang lebih menarik dari pada cupang betina. ciri khas ikan cupang jantan lainnya adalah senang memamerkan keindahan ekornya, terutama jika didekatkan dengan cupang betina lainnya. 
                            </p>
                            <p style="text-align:justify;">
                            Berikut ini adalah morfologi Ikan Cupang. 
                            </p>
                            <img src="../../img/galeri/morfologi.jpg" class="img-fluid" alt="...">
                            <br>
                            <br>
                            <p style="text-align:justify;">
                            Diatas adalah morfologi yang dapat dilihat langsung pada gambar ikan cupang sebagai contohnya. 
                            </p>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <a class="btn btn-success" href="pelatihan-budidaya-taksonomi.php" role="button" style="width: 10rem;">Kembali</a>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-primary" href="quiz-morfologi.php" role="button" style="width: 10rem;">Lanjut</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- akhirnya -->
                </div>
            </div>
        </div>

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
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    </body>
</html>