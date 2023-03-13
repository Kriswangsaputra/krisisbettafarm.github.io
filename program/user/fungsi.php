<?php

// koneksi
$koneksi = mysqli_connect("localhost","root","","kkp");

function query($query) {

    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }

    return $rows;
}

// fungsi registrasi
function registrasi($data){

    global $koneksi;

    $nama = stripslashes($data["nama"]);
    $tempat_lahir = stripslashes($data["tempat_lahir"]);
    $tanggal_lahir = stripslashes($data["tanggal_lahir"]);
    $alamat = stripslashes($data["alamat"]);
    $nmpengguna = stripslashes($data["nmpengguna"]);
    $email = stripslashes($data["email"]);
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $konfirmasi = mysqli_real_escape_string($koneksi, $data["konfirmasi"]);

    // cek nama pengguna
    $result = mysqli_query($koneksi, "SELECT nmpengguna_user FROM akun_user WHERE nmpengguna_user = '$nmpengguna'");

    if ( mysqli_fetch_assoc($result)) {
        echo "<script>alert('Nama Pengguna Sudah Terdaftar!')</script>";

        return false;
    }
    
    
    // konfirmasi password
    if ($password !== $konfirmasi) {
        echo "<script>alert('Konfirmasi Kata Sandi Tidak Sesuai!')</script>";
    return false;
    }

    // enkripsi katasandi
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan pengguna baru
    mysqli_query ($koneksi, "INSERT INTO akun_user VALUES('', '$nama', '',  '$email', '$nmpengguna', '$password', '$alamat', '$tempat_lahir', '$tanggal_lahir', '', '', '', '')");

    return mysqli_affected_rows($koneksi);
}

// fungsi ubah info pribadi
function ubahinfo($data){

    global $koneksi;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $nmpengguna = htmlspecialchars($data["nmpengguna"]);

    $query = "UPDATE akun_user SET nama_user='$nama',nmpengguna_user='$nmpengguna',tempat_lahir_user='$tempat_lahir',tgl_lahir_user='$tanggal_lahir' WHERE id_user=$id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// ubah foto profil
function ubahfoto($data){

    global $koneksi;

    $id = $data["id"];
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "UPDATE akun_user SET foto_user = '$gambar' WHERE id_user = '$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

}

// fungsi upload gambar
function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah ada gambar yg di upload
    if ($error === 4) {
        echo "
                <script>alert('Gambar Belum Dipilih!');</script>
        ";

        return false;
    }

    // cek apakah file berupa gambar
    $ekstensigambarvalid = ['jpg','jpeg','png','jfif'];
    $ekstensigambar = explode('.',$namaFile);
    $ekstensigambar = strtolower(end($ekstensigambar));

    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "
                <script>alert('File Yang diperbolehkan adalah jpg, jpeg, png dan jfif!');</script>
        ";

        return false;
    }

    // cek ukuran gambar
    if ($ukuranFile > 3145728) {
        echo "
                <script>alert('Maksimal gambar 3 MB!');</script>
        ";

        return false;
    }

    // upload gambar
    move_uploaded_file($tmpName, '../../img/upload/'.$namaFile);

    return $namaFile;

}

// fungsi ubah kontak
function ubahkontak($data){

    global $koneksi;

    $id = $data["id"];
    $alamat = htmlspecialchars($data["alamat"]);
    $email = htmlspecialchars($data["email"]);
    $telepon = htmlspecialchars($data["telepon"]);

    $query = "UPDATE akun_user SET alamat_user='$alamat',email_user='$email',telepone_user='$telepon' WHERE id_user=$id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi ubah sosial media
function ubahsosmed($data){

    global $koneksi;

    $id = $data["id"];
    $facebook = htmlspecialchars($data["facebook"]);
    $instagram = htmlspecialchars($data["instagram"]);
    $twitter = htmlspecialchars($data["twitter"]);

    $query = "UPDATE akun_user SET facebook_user='$facebook',instagram_user='$instagram',twetter_user='$twitter' WHERE id_user=$id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// ubah Kata Sandi
function ubahpassword($data){

    global $koneksi;

    $id = $data["id"];
    $password1 = $data["password1"];
    $password2 = $data["password2"];

    // cek kesamaan password lama
    $hasil = mysqli_query($koneksi, "SELECT * FROM akun_user WHERE id_user='$id'");
    
    if (mysqli_num_rows($hasil) === 1) {

        $row = mysqli_fetch_assoc($hasil);

        if (password_verify($password1,$row["katasandi_user"])) {
            
            if (password_verify($password2, $row["katasandi_user"])) {
                echo "<script>
                        alert('Kata sandi tidak boleh sama');
                    </script>
                ";
                return false;
            }else {
                $katasandi = password_hash($password2, PASSWORD_DEFAULT);

                mysqli_query($koneksi, "UPDATE akun_user SET katasandi_user = '$katasandi' WHERE id_user='$id'");

                return mysqli_affected_rows($koneksi);
            }

        }else {
            echo "<script>
                        alert('Kata sandi salah');
                    </script>
                ";
                return false;
        }
    }
    
}

// komentar
function komentar($data){

    global $koneksi;

    $nama = $data["nama"];
    $email = $data["email"];
    $subjek = $data["subjek"];
    $komentar = $data["komentar"];

    mysqli_query($koneksi, "INSERT INTO komentar VALUES('','$nama','$email','$subjek','$komentar')");

    return mysqli_affected_rows($koneksi);
}

// pembayaran
function pembayaran($data){

    global $koneksi;

    // update tabel produk
    $idproduk = $data["idproduk"];
    $stok = (int) $data["stok"];
    $jumlahbeli = (int) $data["jumlahpembelian"];

    $stokterbaru = $stok - $jumlahbeli;

    mysqli_query($koneksi, "UPDATE produk SET stok_produk = '$stokterbaru' WHERE id_produk='$idproduk'");


    // data pembayaran
    $idtransaksi = $data["idtransaksi"];
    $namapembeli = htmlspecialchars($data["namapembeli"]);
    $nmproduk = htmlspecialchars($data["nmproduk"]);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $hargaproduk = htmlspecialchars($data["harga"]);
    $total = htmlspecialchars($data["total"]);
    $statustransaksi = "Selesai";

    mysqli_query($koneksi, "INSERT INTO data_transaksi VALUES('$idtransaksi','$namapembeli','$idproduk','$nmproduk','$gambar','$jumlahbeli','$hargaproduk','$total','$statustransaksi')");

    return mysqli_affected_rows($koneksi);

}
?>