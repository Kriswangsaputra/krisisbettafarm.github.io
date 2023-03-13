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
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFour">
                                <div class="accordion-body">
                                    <a href="pelatihan-budidaya-perbedaan-jeniskelamin.php">Perbedaan Jantan dan Betina</a>
                                </div>
                                <div class="accordion-body">
                                    <a href="pelatihan-budidaya-pemijahan.php">Proses Pemijahan</a>
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
                                <h3>Proses Pemijahan Ikan Cupang</h3>
                            </strong>
                            <br>
                            <p style="text-align:justify;">
                            setelah mengetahui perbedaan jenis kelamin ikan cupang, dan pada materi sebelumnya telah mempelajari <a href="pelatihan-budidaya-media.php">media budidaya ikan cupang</a> maka tahap selanjutnya adalah mempelajari proses pemijahan ikan cupang. adapun prosesnya adalah sebagai berikut.
                            </p>
                            <p style="text-align:justify;">
                                <ol>
                                    <li>
                                        <strong>Persiapan</strong>
                                        <p style="text-align:justify;">
                                        Pada tahap ini adalah menyiapkan perlengkapan dan peralatan, dimana kita sudah mempelajari materi tersebut pada <a href="pelatihan-budidaya-media.php">media budidaya ikan cupang</a>. setelah perlengkapan dan peralatan sudah terkumpul kita perlu menyiapkan air yang baik, adapun caranya adalah sebagai berikut
                                        </p>
                                        <ul>
                                            <li>
                                                <strong>persiapkan air</strong>
                                                <p style="text-align:justify;">
                                                masukan air kedalam wadah pemijahan, campurkan garam ikan satu sendok makan, obat biru 1 tetes dan daun ketapang kering
                                                </p>
                                            </li>
                                            <li>
                                                <strong>endapkan air</strong>
                                                <p style="text-align:justify;">
                                                pengendapan ini diperlukan untuk memastikan kualitas air yang baik. minimal pengendapan adalah selama satu malam.
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong>Penjodohan</strong>
                                        <p style="text-align:justify;">
                                        Setelah air pemijahan sudah diendapkan, cara selanjutnya adalah penjodohan. teknik pemijahan yang akan kita praktekan adalah dengan teknik penjodohan, cara ini akan meminimalisir kegagalan dalam pemijahan. salah satunya adalah ikan rusak karena tidak mau kawin, ataupun kurangnya gelembung yang dibuat ikan jantan. cara penjodohannya adalah sebagai berikut
                                        </p>
                                        <ul>
                                            <li>
                                                <strong>media untuk menempelkan gelembung</strong> 
                                                <p style="text-align:justify;">
                                                media ini bisa berupa tanaman air, daun ketapang kering ataupun plastik. untuk pemula kami sarankan menggunakan plastik karena plastik akan memudahkan kita untuk melihat apakah dalam geembung sudah ada telur atau belum
                                                </p>
                                            </li>
                                            <li>
                                                <strong>Gelas plastik atau gelas bening</strong> 
                                                <p style="text-align:justify;">
                                                Gelas ini berfungsi untuk menaruh ikan cupang betina sementara. kenapa harus ikan cupang betina yang ditempatkan ditempat sementara. karena ikan cupang jantan harus secara leluasa mengenali tempat pemijahan, dan mempermudah membuat gelembung.
                                                </p>
                                            </li>
                                            <li>
                                                <strong>proses penjodohan</strong> 
                                                <p style="text-align:justify;">
                                                letakan ikan cupang jantan ditempat pemijahan dan ikan cupang betina digelas sementara. biarkan mereka saling melihat, agar ikan cupang jantan agresif dan membuat gelembung. penjodohan ini bisa memakan waktu 1 - 2 hari tergantung ada atau tidaknya gelembung yang dibuat pejantan. jika selama 2 hari masih belum terlihat gelembung lebih baik ikaan pejantan diganti dengan indukan lain.
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong>Proses Pemijahan</strong>
                                        <p style="text-align:justify;">
                                        proses selanjutnya adalah pemijahan, dalam proses ini perlu diperhatikan apakah gelembung sudah ada atau belum, jika belum ada maka sebaiknya jangan di campurkan antara jantan dan betina. adapun proses pemijahanya adalah sebagai berikut.
                                        </p>
                                        <ul>
                                            <li>
                                                <strong>pencampuran antara jantan dan betina</strong>
                                                <p style="text-align:justify;">
                                                setelah penjodohan selama 1 - 2 hari maka ikan cupang jantan sudah menyiapkan media berupa gelembung untuk meletakan telur. gelembung tersebut menandakan ikan siap untuk disatukan. campurkan secara perlahan agar tidak merusak gelembung.
                                                </p>
                                            </li>
                                            <li>
                                                <strong>Pemijahan</strong>
                                                <p style="text-align:justify;">
                                                setelah dicampurkan jantan dan betina maka proses pemijahan akan berlangsung. proses ini bisa menghabiskan waktu selama 1 - 2 hari. jika dalam waktu tersebut tidak ada telur yang dihasilkan maka sebaiknya indukan betina diganti. 
                                                </p>
                                                <p style="text-align:justify;">
                                                sebaiknya selama proses penjodohan sampai pemijahan jauhkan dari jangkauan orang banyak dan hewan hewan predator. 
                                                </p>
                                                <p style="text-align:justify;">
                                                pada awal pencampuran jantan dan betina biasanya mereka akan melakukan kejar kejaran, dan kadang sampai membuat sirip ikan betina rusak dan itu adalah normal maka tetap lanjutkan saja. jika dilihat ikan betina yang lebih agresif maka sebaiknya proses dihentikan atau indukan jantan diganti.
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong>Pemisahan Indukan</strong>
                                        <p style="text-align:justify;">
                                        setelah menunggu proses pemijahan selama 1 - 2 hari selanjutnya adalah pemisahan indukan. indukan yang harus dipisahkan adalah indukan betina, nantinya indukan jantan yang akan menjaga burayak ikan cupang. adapun cara melihat sukses atau tidaknya dapat dilihat dari berbagai cara yaitu.
                                        </p>
                                        <ul>
                                            <li>
                                                <strong>telur pada gelembung</strong>
                                                <p style="text-align:justify;">
                                                ini adalah alasan kenapa media untuk meletakan telur adalah plastik transparan, karena kita bisa melihat dari permukaan apakah gelembung sudah berisi telur atau belum. telur biasanya berwarna putih lebih pekat. jika sudah terdeteksi ada telur di gelembung maka pisahkan indukan betina.
                                                </p>
                                            </li>
                                            <li>
                                                <strong>ciri fisik pada ikan cupang betina</strong>
                                                <p style="text-align:justify;">
                                                ikan cupang betina sebelum proses pemijahan memiliki bentuk tubuh yang gemuk karena pada perutnya menyimpan telur, setelah proses pemijahan biasanya ikan cupang betina akan terlihat lemas dan cenderung menjauh dari ikan jantan dan perutnya ramping karena telur pada perutnya sudah dikeluarkan. jika sudah terlihat ciri ciri diatas maka ikan cupang betina harus dipisahkan.
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <strong>perawatan pasca pemijahan</strong>
                                        <p style="text-align:justify;">
                                        setelah pemijahan maka perlu beberapa perawatan pada kedua indukan. perawatan ini akan mempengaruhi kualitas indukan agar dapat cepat digunakan kembali sebagai indukan dipemijahan selanjutnya. adapun perawatannya adalah sebagai berikut.
                                        </p>
                                        <ul>
                                            <li>
                                                <strong>indukan betina</strong>
                                                <p style="text-align:justify;">
                                                selama pemijahan indukan betina pasti banyak mengalami luka dan stress. maka indukan betina perlu mendapatkan treatment lebih dari biasanya. adapun perawatanya bisa berupa siapkan endapkan air didalam soliter campur dengan garam ikan dan obat biru agar tidak stres dan terhindar dari penyakit.
                                                </p>
                                                <p style="text-align:justify;">
                                                agar indukan betina cepat mengisi telur kita bisa memberikan pakan ekstra berupa jentik nyamuk. ikan cupang betina dapat dipijahkan kembali setelah selang waktu 2 minggu sampai 1 bulan.
                                                </p>
                                            </li>
                                            <li>
                                                <strong>indukan jantan</strong>
                                                <p style="text-align:justify;">
                                                indukan jantan tetap dilitekan diwadah pemijahan, kita bisa mengangkat indukan jantan setelah 4 hari pasca pemijahan ataupun sampai burayak siap untuk di sortir. selama masa penjagaan cukup beri makan pejantan 1 kali dalam sehari, pakan bisa berupa kutu air agar dapat dgunakan sebagai pakan burayak juga.
                                                </p>
                                                <p style="text-align:justify;">
                                                indukan jantan dapat dipijahkan kembali setelah 2 minggu atau 1 bulan pasca pemijahan. hal ini dilihat dari kesehatan ikan tersebut. 
                                                </p>
                                            </li>
                                        </ul>
                                    </li>
                                </ol>
                            </p>
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <a class="btn btn-success" href="pelatihan-budidaya-perbedaan-jeniskelamin.php" role="button" style="width: 10rem;">Kembali</a>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-primary" href="quiz-pemijahan.php" role="button" style="width: 10rem;">Lanjut</a>
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