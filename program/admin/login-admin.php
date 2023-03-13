<?php

    session_start();
    require "fungsi-admin.php";

    if (isset($_POST["submit"])) {
        $nmpengguna = $_POST["nmpengguna"];
        $password = $_POST["password"];

        $result = mysqli_query($koneksi, "SELECT * FROM akun_admin WHERE nmpengguna_adm = '$nmpengguna'");

        // cek username
        if (mysqli_num_rows($result) === 1 ) {
            // cek password
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row["katasandi_adm"])) {
                // set session
                $_SESSION["login"] = true ;
                $_SESSION["nmpengguna"] = $nmpengguna;
                header("location:dashboard-admin.php");
                exit;
            }
        }

        $error = true;
    }

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KrisisBetta.com</title>
        <link rel="stylesheet" type="text/css" href="admin.css">
        <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
        <script src="https://kit.fontawesome.com/ff8b67bae7.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        
        <!-- Navigasi panel -->
        <nav class="navbar navbar-expand-lg bg-black mx-auto fixed-top">
            <div class="container-fluid">
                <p class="h1">
                    <a class="navbar-brand text-success" href="#" style="font-size:50px; margin-left: 100px;">KrisisBetta</a>
                </p>             
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <p class="h2 text-white">
                    Halaman Login Administrator
                </p>
            </div>
        </nav>
        <!-- akhir navigasi panel -->

        <!-- form login -->
        <div class="row" style="margin-top:150px; width:100%;">
            
            <div class="col ps-5">
                <img src="../../img/galeri/login.jpg" class="card-img-top" alt="..." style="width:500px; height:500px;">
            </div>
            <div class="col pe-5">
                <center>
                    <h4>Silahkan Masuk Terlebihdahulu</h4>
                </center>

                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Nama Pengguna atau katasandi salah !
                    </div>
                <?php endif; ?>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="namapengguna" class="form-label">Nama Pengguna</label>
                        <input type="text" name="nmpengguna" class="form-control" id="namapengguna" placeholder="Masukan Nama Pengguna Anda">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" id="namapengguna" placeholder="Masukan Kata Sandi Anda">
                    </div>
                    <div class="mb-3">
                        <button name="submit" type="submit" class="btn btn-success" style="width:610px;">Masuk</button>
                    </div>

                </form>
                <p class="h5">Anda Pengguna ? <a href="../user/login-user.php">Masuk Disini</a></p>
            </div>
        </div>
        <!-- akhir form login -->

        <!-- footer -->
        <div class="row bg-black" style="width:100%; padding-left:200px;">

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