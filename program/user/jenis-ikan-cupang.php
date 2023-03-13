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
        <link rel="stylesheet" type="text/css" href="user.css">
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
                            <a class="nav-link dropdown-toggle text-light" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

        <!-- sidebar -->
        <div class="sidebar">
            <header>Belajar Jenis Ikan Cupang</header>
            <ul>
                <li><a href="#alam">Ikan Cupang Alam</a></li>
                <li><a href="#hias">Ikan Cupang Hias</a></li>
            </ul>
        </div>
        <!-- akhir sidebar -->

        <!-- konten -->
        <div class="container-sm">

            <!-- ikan cupang alam -->
            <div class="row justify-content-end" style="margin-top:100px;">
                <div class="col-4">
                    <img src="../../img/galeri/jenis1.jfif" class="img-fluid" alt="...">
                </div>
                <div class="col-4">
                    <h3 class="bold" id="alam">Ikan Cupang Alam</h3>
                    <p style="text-align:justify;">Golongan ikan cupang ini merupakan cupang yang hidupnya masih di rawa-rawa atau persawahan dan keindahannya terbentuk secara alami tanpa campur tangan manusia meskipun diperoleh dari alam, ikan cupang ini mempunyai bentuk dan warna yang cantik.</p>
                    <ul>
                        <li style="font-weight:bold;">1. Ikan Cupang Channoides (Betta Channoides)</li>
                        <p style="text-align:justify;">Betta Channoides berasal dari Sungai Mahakam, Kalimantan Timur. Ciri khas ikan cupang endemik ini adalah terdapat list putih pada ujung sirip tengah dan sirip perut.
                        Nilai jual ikan cupang ini pun tinggi. Pasalnya, selain punya warna kecoklatan yang unik, beberapa daerah menyebutnya sebagai ikan cupang ular, di mana hanya ada di Indonesia.
                        Betta Channoides jantan memiliki warna yang gelap dengan tubuh lebih panjang, Sedangkan, betina memiliki warna lebih terang dengan tubuh lebih gemuk dan kepala lebih runcing</p>
                        <li style="font-weight:bold;">2. Ikan Cupang Ocellata (Betta Ocellata)</li>
                        <p style="text-align:justify;">Jika sebelumnya ikan cupang memiliki ciri khas, ikan cupang Ocellata cenderung tidak memiliki warna yang menonjol dari karakternya. Namun, ikan cupang ini memiliki keunikan lain dari sisi sifatnya, yaitu dapat melompat ke permukaan air.
                        Di alam liarnya, ikan ini biasa mengangkat serangga di atas permukaan. Buat kamu pemilik hobi aquascape, pilihan ikan cupang ini bisa menambah kenaturalannya.
                        Perbedaan antara jantan dan betina terletak pada ukuran. Ukuran ikan cupang Ocellata jantan lebih panjang daripada betina. Jenis cupang ini pun banyak ditemui di Sebuku (Kalimantan Timur) dan Malaysia.</p>
                        <li style="font-weight:bold;">3. Ikan Cupang Rubra (Betta Rubra)</li>
                        <p style="text-align:justify;">Beberapa laman menyebutkan, spesies cupang ini diyakini telah punah pada 1908. Namun, ternyata ditemukan kembali pada Februari 2017 di Aceh, Sumatera Utara.
                        Sekilas ikan cupang ini hampir sama dengan ikan cupang jenis Channoides, tapi bila diamati lagi ikan ini tidak memiliki list putih pada siripnya dan terdapat tanda hitam terpisah di badannya.
                        Ikan ini memiliki keunikan mouth booder atau pada saat memijah, si jantan yang menyimpan telurnya di mulut. Betta Rubra pun sangat cocok dijadikan sebahai penghias akuarium kamu.</p>
                    </ul>
                </div>
            </div>
            <!-- akhir ikan cupang alam -->

            <!-- ikan cupang hias -->
            <div class="row justify-content-end" style="margin-top:100px;" id="hias">
                <div class="col-4">
                <h3 class="bold" >Ikan Cupang Hias</h3>
                    <p style="text-align:justify;">Golongan cupang ini merupakan persilangan dari ikan cupang alam. jenis ikan cupang ini sangat beragaam karena banyak persilangan dari tiap jenisnya.</p>
                    <ul>
                        <li style="font-weight:bold;">1. Ikan Cupang Giant</li>
                        <p style="text-align:justify;">Cupang Giant merupakan cupang yang berukuran besar lebih dari ikan cupang normal pada umumnya. ikan ini bisa mencapai besar 8 - 12 cm. ikan cupang giant terlihat kurang aktif dibanding ikan cupang yang berukuran kecil lainnya, namun sifat agresifitas ikan ini masih tetap ada karena memang ikan cupang bersifat soliter.</p>
                        <li style="font-weight:bold;">2. Ikan Cupang Halfmoon</li>
                        <p style="text-align:justify;">Ikan Cupang Halfmoon pertama kali dibudidayakan di Amerika Serikat oleh petter Goettner pada tahun 1982. sesuai dengan namanya cupang halfmoon memiliki sirip lebar dan simetris menyerupai bentuk setengah bulan.</p>
                        <li style="font-weight:bold;">3. Ikan Cupang Crowntail (serit)</li>
                        <p style="text-align:justify;">Cupang Serit merupakan cupang hias hasil silangan dari Indonesia. ikan cupang ini memiliki daya tarik utama yaitu bentuk siripnya yang menyerupai sisir dengan rumbai-rumbai.</p>
                        <li style="font-weight:bold;">3. Ikan Cupang Plakat</li>
                        <p style="text-align:justify;">Ikan cupang plakat memiliki ekor yang lebih pendek atau biasa disebut ikan cupang ekor pendek, walaupun saat ini sudah banyak persilangan yang menghasilkan ikan plakat dengan sirip dan ekor yang lebih lebar. ikan cupang ini pertama kali dikembangkan di Thailand dan mulai menyebar di Indonesia pada tahun 2000 an.</p>
                    </ul>
                </div>
                <div class="col-4">
                    <img src="../../img/galeri/jenis2.jfif" class="img-fluid" alt="...">
                    
                </div>
            </div>
            <!-- akhir ikan cupang hias -->
        </div>
        <!-- akhir konten -->

        <!-- footer -->
        <div class="row bg-black" style="width:100%; padding-left:200px; position:absolute;" id="footer">

            <p class="h1 mt-5 mb-5">
                <a class="navbar-brand text-success" href="#" style="font-size:50px; margin-left: -100px;">KrisisBetta</a>
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