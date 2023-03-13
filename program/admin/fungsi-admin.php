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
function registrasiadmin($data){

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
    $result = mysqli_query($koneksi, "SELECT nmpengguna_adm FROM akun_admin WHERE nmpengguna_adm = '$nmpengguna'");

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
    mysqli_query ($koneksi, "INSERT INTO akun_admin VALUES('', '$nama', '', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$nmpengguna', '$email', '$password', '', '', '', '')");

    return mysqli_affected_rows($koneksi);
}

// tambah konten tentang kami
function tambahtentangkami($data){

    global $koneksi;
    $judul = htmlspecialchars($data["judul"]);
    $subjudul = htmlspecialchars($data["subjudul"]);
    $visi = htmlspecialchars($data["visi"]);
    $misi = htmlspecialchars($data["misi"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    mysqli_query($koneksi, "INSERT INTO tentang_kami VALUES('','$judul','$subjudul','$visi','$misi','$deskripsi')");

    return mysqli_affected_rows($koneksi);
}

// hapus tentang kami
function hapustentangkami($id){

    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM tentang_kami WHERE id =$id");

    return mysqli_affected_rows($koneksi);
}

// tambah konten koleksi kami
function tambahkoleksikami($data){

    global $koneksi;

    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    mysqli_query($koneksi, "INSERT INTO koleksi_kami VALUES('','$judul','$gambar','$deskripsi')");

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

// tambah konten sejarah
function tambahsejarah($data){

    global $koneksi;

    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    mysqli_query($koneksi, "INSERT INTO sejarah VALUES('','$judul','$gambar','$deskripsi')");

    return mysqli_affected_rows($koneksi);
}

// tambah konten ikan cupang alam
function tambahcupangalam($data){

    global $koneksi;

    $judul = htmlspecialchars($data["judul"]);
    $subjudul = htmlspecialchars($data["subjudul"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $penjelasan = htmlspecialchars($data["penjelasan"]);

    // upload gambar
    $gambar = upload();

    mysqli_query($koneksi, "INSERT INTO ikancupangalam VALUES('','$judul','$subjudul','$gambar','$jenis','$penjelasan')");

    return mysqli_affected_rows($koneksi);
}

// tambah konten ikan cupang hias
function tambahcupanghias($data){

    global $koneksi;

    $judul = htmlspecialchars($data["judul"]);
    $subjudul = htmlspecialchars($data["subjudul"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $penjelasan = htmlspecialchars($data["penjelasan"]);

    // upload gambar
    $gambar = upload();

    mysqli_query($koneksi, "INSERT INTO ikancupanghias VALUES('','$judul','$subjudul','$gambar','$jenis','$penjelasan')");

    return mysqli_affected_rows($koneksi);
}

// ganti pp
function ubahpp($data){

    global $koneksi;

    $id = $data["id"];
    
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    mysqli_query($koneksi, "UPDATE akun_admin SET foto_adm = '$gambar' WHERE id_adm='$id'");

    return mysqli_affected_rows($koneksi);
}

// ubah Kata Sandi
function ubahpassword($data){

    global $koneksi;

    $id = $data["id"];
    $password1 = $data["password1"];
    $password2 = $data["password2"];

    // cek kesamaan password lama
    $hasil = mysqli_query($koneksi, "SELECT * FROM akun_admin WHERE id_adm='$id'");
    
    if (mysqli_num_rows($hasil) === 1) {

        $row = mysqli_fetch_assoc($hasil);

        if (password_verify($password1,$row["katasandi_adm"])) {
            
            if (password_verify($password2, $row["katasandi_adm"])) {
                echo "<script>
                        alert('Kata sandi tidak boleh sama');
                    </script>
                ";
                return false;
            }else {
                $katasandi = password_hash($password2, PASSWORD_DEFAULT);

                mysqli_query($koneksi, "UPDATE akun_admin SET katasandi_adm = '$katasandi' WHERE id_adm='$id'");

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

// fungsi ubah info pribadi
function ubahinfo($data){

    global $koneksi;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $nmpengguna = htmlspecialchars($data["nmpengguna"]);

    $query = "UPDATE akun_admin SET nama_adm='$nama',nmpengguna_adm='$nmpengguna',tempat_lhr_adm='$tempat_lahir',tgl_lhr_adm='$tanggal_lahir' WHERE id_adm=$id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi ubah kontak
function ubahkontak($data){

    global $koneksi;

    $id = $data["id"];
    $alamat = htmlspecialchars($data["alamat"]);
    $email = htmlspecialchars($data["email"]);
    $telepon = htmlspecialchars($data["telepon"]);

    $query = "UPDATE akun_admin SET alamat_adm='$alamat',email_adm='$email',telepon_adm='$telepon' WHERE id_adm=$id";

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

    $query = "UPDATE akun_admin SET facebook_adm='$facebook',instagram_adm='$instagram',twitter_adm='$twitter' WHERE id_adm=$id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// tambah quiz morfologi
function quizmorfologi($data){

    global $koneksi;

    $soal = $data["soal"];
    $pilihan1 = $data["pilihan1"];
    $pilihan2 = $data["pilihan2"];
    $pilihan3 = $data["pilihan3"];
    $pilihan4 = $data["pilihan4"];
    $jawaban = $data["jawaban"];

    mysqli_query($koneksi, "INSERT INTO quiz_morfologi VALUES('','$soal','$pilihan1','$pilihan2','$pilihan3','$pilihan4','$jawaban')");

    return mysqli_affected_rows($koneksi);
}

// tambah quiz media budidaya
function quizmediabudidaya($data){

    global $koneksi;

    $soal = $data["soal"];
    $pilihan1 = $data["pilihan1"];
    $pilihan2 = $data["pilihan2"];
    $pilihan3 = $data["pilihan3"];
    $pilihan4 = $data["pilihan4"];
    $jawaban = $data["jawaban"];

    mysqli_query($koneksi, "INSERT INTO quiz_media_budidaya VALUES('','$soal','$pilihan1','$pilihan2','$pilihan3','$pilihan4','$jawaban')");

    return mysqli_affected_rows($koneksi);
}

// tambah quiz pemijahan
function quizpemijahan($data){

    global $koneksi;

    $soal = $data["soal"];
    $pilihan1 = $data["pilihan1"];
    $pilihan2 = $data["pilihan2"];
    $pilihan3 = $data["pilihan3"];
    $pilihan4 = $data["pilihan4"];
    $jawaban = $data["jawaban"];

    mysqli_query($koneksi, "INSERT INTO quiz_pemijahan VALUES('','$soal','$pilihan1','$pilihan2','$pilihan3','$pilihan4','$jawaban')");

    return mysqli_affected_rows($koneksi);
}

// tambah quiz pembesaran
function quizpembesaran($data){

    global $koneksi;

    $soal = $data["soal"];
    $pilihan1 = $data["pilihan1"];
    $pilihan2 = $data["pilihan2"];
    $pilihan3 = $data["pilihan3"];
    $pilihan4 = $data["pilihan4"];
    $jawaban = $data["jawaban"];

    mysqli_query($koneksi, "INSERT INTO quiz_pembesaran VALUES('','$soal','$pilihan1','$pilihan2','$pilihan3','$pilihan4','$jawaban')");

    return mysqli_affected_rows($koneksi);
}

// tambah ujian akhir budidaya
function ujianakhirbudidaya($data){

    global $koneksi;

    $soal = $data["soal"];
    $pilihan1 = $data["pilihan1"];
    $pilihan2 = $data["pilihan2"];
    $pilihan3 = $data["pilihan3"];
    $pilihan4 = $data["pilihan4"];
    $jawaban = $data["jawaban"];

    mysqli_query($koneksi, "INSERT INTO ujian_akhir_budidaya VALUES('','$soal','$pilihan1','$pilihan2','$pilihan3','$pilihan4','$jawaban')");

    return mysqli_affected_rows($koneksi);
}

// tambah produk toko
function tambahproduk($data){
    global $koneksi;

    $nmikan = htmlspecialchars($data["nmikan"]);
    $usia = htmlspecialchars($data["usia"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    $id = $data["id"];

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    mysqli_query($koneksi, "INSERT INTO produk VALUES('$id','$nmikan','$usia','$harga','$stok','$gambar','$deskripsi')");

    return mysqli_affected_rows($koneksi);
}

// update produk
function updateproduk($data){

    global $koneksi;

    $id = $data["idupdate"];
    $nama = htmlspecialchars($data["nmikan"]);
    $usia = htmlspecialchars($data["usia"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    $query = "UPDATE produk SET nm_produk='$nama',usia_produk='$usia',harga_produk='$harga',stok_produk='$stok',deskripsi_produk='$deskripsi' WHERE id_produk='$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// hapus produk
function hapusproduk($id){

    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk ='$id'");

    return mysqli_affected_rows($koneksi);
}
?>

