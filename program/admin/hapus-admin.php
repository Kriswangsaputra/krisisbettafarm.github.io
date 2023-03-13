<?php
    require "fungsi-admin.php";

    $id = $_GET["id"];

    if (hapusproduk($id) > 0 ) {
        echo "
            <script>
                alert('Produk Berhasil Dihapus!');
                document.location.href = 'dashboard-admin-input-produk.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'dashboard-admin-input-produk.php';
            </script>
        ";
    }
?>