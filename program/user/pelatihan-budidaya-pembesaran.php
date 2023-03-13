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
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body active">
                                    <a href="pelatihan-budidaya-taksonomi.php">Taksonomi Ikan Cupang</a>
                                </div>
                                <div class="accordion-body">
                                    <a href="pelatihan-budidaya-morfologi.php">Morfologi Ikan Cupang</a>
                                </div>
                                <div class="accordion-body">
                                    <a href="quiz-morfologi.php">Quiz</a>
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
                                    <a href="pelatihan-budidaya-media.php">Persiapan dan Perlengkapan</a>
                                </div>
                                <div class="accordion-body">
                                    <a href="quiz-mediabudidaya.php">Quiz</a>
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
                                    <a href="pelatihan-budidaya-perbedaan-jeniskelamin.php">Perbedaan Jantan dan Betina</a>
                                </div>
                                <div class="accordion-body">
                                    <a href="pelatihan-budidaya-pemijahan.php">Proses Pemijahan</a>
                                </div>
                                <div class="accordion-body">
                                    <a href="quiz-pemijahan.php">Quiz</a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                    <strong>Pembesaran Ikan Cupang</strong>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFive">
                                <div class="accordion-body">
                                    <a href="pelatihan-budidaya-pembesaran.php">Proses Pembesaran</a>
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
                                <h3>Media Pembesaran Ikan Cupang</h3>
                            </strong>
                            <br>
                            <p style="text-align:justify;">
                            pada materi terahir ini adalah materi pembesaran ikan cupang. pembesaran ini dilakukan setelah proses pemijahan, dan perlu perawatan khusus sampai ikan siap untuk dijual. adapun media pembesaran bisa dilihat pada materi <a href="pelatihan-budidaya-media.php">Media Budidaya ikan cupang</a>. adapun cara pembesarannya adalah sebagai berikut.

                                <ul>
                                    <li>
                                        <strong>pembesaran setelah pemijahan</strong>
                                        <p style="text-align:justify;">
                                        setelah pemijahan burayak ikan cupang tetap berada diwadah pemijahan selama 4 - 7 hari bersama indukan jantan, dan selama itu pula kita tidak perlu memberi makan burayak karena masih membawa makanan dari telur yang dihasilkan secara alami.
                                        </p>
                                    </li>
                                    <li>
                                        <strong>Kolam Pembesaran</strong>
                                        <p style="text-align:justify;">
                                        Setelah usia burayak cupang 4 - 7 hari maka perlu kita pindahkan ke tempat yang lebih luas agar pertumbuhan ikan cupang berkembang dengan cepat.
                                        </p>
                                        <p style="text-align:justify;">
                                        kolam pembesaran bisa berupa kolam terpal, sterofoam atau pun bak. adapun persiapannya adalah sebagai berikut.
                                            <ul>
                                                <li>
                                                    <p style="text-align:justify;">
                                                    isi kolam pembesaran dengan air, ketinggian air cukup 20 cm - 40 cm saja. campurkan dengan obat biru, garam ikan, daun ketapang kering, dan, dan tanaman air. daun pisang berfungsi sebagai media agar tumbuh infusuria, dimana binatang ini lebih kecil dari kutu air dan dapat digunakan sebagai pakan alamai burayak cupang.
                                                    </p>
                                                </li>
                                                <li>
                                                    <p style="text-align:justify;">
                                                    endapkan air dalam kolam pembesaran selama 3 hari, jadi selama proses pasca pemijahan kita sudah menyiapkan kolam pembesaran, agar ketika burayak sudah waktunya dipindahkan kita bisa langsung memakai kolam pembesaran.
                                                    </p>
                                                </li>
                                                <li>
                                                    <p style="text-align:justify;">
                                                    selama pengendapan taruhlah kutu air agar kutu air tersebut berkembang biak dan dengan bentuk yang lebih kecil, agar dapat dimakan oleh burayak
                                                    </p>
                                                </li>
                                            </ul>
                                        </p>
                                        <p style="text-align:justify;">
                                        Setelah proses diatas sudah dilakukan maka masukan burayak kedalam kolam pembesaran dengan cara perlahan agar tidak ada burayak yang tertinggal. adapun pakan selama dikolam pembesaran dapat berupa kutu air, infusoria dan artemia.
                                        </p>
                                        <p style="text-align:justify;">
                                        pembesaran dalam kolam ini bisa berkisar 1 - 3 bulan tergantung pakan dan kualitas air. pergantian air kolam bisa dilakukan sebanyak 1 kali dalam satu bulan.
                                        </p>
                                    </li>
                                    <li>
                                        <strong>Pembesaran Ikan Cupang Dewasa</strong>
                                        <p style="text-align:justify;">
                                        setelah melalui pembesaran dalam kolam selama 1 -3 bulan kita sudah bisa mensortir ikan ikan tersebut. jadi selama proses pembesaran dikolam kita harus terus memantau perkembangan ikan cupang. adapun ikan cupang yang sudah bisa dipisahkan antara lain sebagai berikut.
                                            <ul>
                                                <li>ikan cupang jantan</li>
                                                <li>ikan cupang yang terlihat paling besar dalam kolam</li>
                                                <li>ikan cupang yang mulai terlihat bermutasi warna</li>
                                                <li>ikan cupang betina cukup dalam kolam saja</li>
                                            </ul>
                                        </p>
                                        <p style="text-align:justify;">
                                        setelah ciri ciri diatas terlihat, maka ikan cupang dapat dipisahkan ke media pembesaran soliter. media ini dapat berupa botol air mineral 1,5 liter, drigen, dan ember berukuran sedang.
                                        </p>
                                        <p style="text-align:justify;">
                                        adapun persiapan pada media pembesaran soliter ini adalah sebagai berikut.
                                            <ul>
                                                <li>gunakan air yang sudah diendapkan</li>
                                                <li>campurkan garam ikan, obat biru dan daun ketapang kering</li>
                                                <li>tambahkan tanaman air</li>
                                            </ul>
                                        </p>
                                        <p style="text-align:justify;">
                                        setelah persiapan diatas sudah dilakukan kita bisa menaruh ikan cupang hasil sortir kedalam wadah pembesaran soliter. pada tahap ini proses pembesaran akan lebih maksimal, karena jatah makanan dan tempat sangat efektif untuk ikan tersebut. pembesaran tahap ini bisa memakan waktu 2 minggu - 1 bulan.
                                        </p>
                                        <p style="text-align:justify;">
                                        kita perlu mengganti air dalam wadah selama 1 minggu sekali agar kualitas air tetap terjaga
                                        </p>
                                    </li>
                                    <li>
                                        <strong>Ikan Cupang Siap Jual</strong>
                                        <p style="text-align:justify;">
                                        setelah proses pembesaran secara soliter diatas dilakukan, kita tetap perlu mengawasi perkembangan ikan cupang, karena pada tahap ini ikan cupang akan terus bermutasi warna. adapun ikan cupang yang sudah siap jual dan dapat disortir dari pembesaran soliter ini adalah sebagai berikut.
                                            <ul>
                                                <li>ikan cupang jantan</li>
                                                <li>ikan cupang yang mutasinya sudah sepurna</li>
                                                <li>ikan cupang betina yang sudah bermutasi warna</li>
                                                <li>ikan cupang betina yang sudah full telur</li>
                                                <li>ikan cupang yang mutasi warnanya belum terlalu sempurna</li>
                                            </ul>
                                        </p>
                                        <p style="text-align:justify;">
                                        jika sudah terlihat ciri ciri diatas maka ikan cupang dapat dipindahkan kedalam soliter display. soliter display bisa berupa aquarium dengan ukuran sedang, ataupun toples. adapun perawatan pada soliter display bisa kita lakuka sifon 2 hari sekali, sifon adalah menyedot kotoran pada dasar soliter. dan air bisa diganti sebanyak 1 -2 kali dalam satu minggu. jangan lupa pula soliter diberi penutup dengan sekat.
                                        </p>
                                    </li>
                                </ul>
                            </p>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <a class="btn btn-success" href="quiz-pemijahan.php" role="button" style="width: 10rem;">Kembali</a>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-primary" href="quiz-pembesaran.php" role="button" style="width: 10rem;">Lanjut</a>
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