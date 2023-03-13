-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2023 pada 03.17
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id_adm` int(11) NOT NULL,
  `nama_adm` varchar(30) DEFAULT NULL,
  `foto_adm` varchar(11) DEFAULT NULL,
  `tempat_lhr_adm` varchar(30) DEFAULT NULL,
  `tgl_lhr_adm` date DEFAULT NULL,
  `alamat_adm` varchar(50) DEFAULT NULL,
  `nmpengguna_adm` varchar(20) DEFAULT NULL,
  `email_adm` varchar(30) DEFAULT NULL,
  `katasandi_adm` varchar(80) DEFAULT NULL,
  `telepon_adm` varchar(12) DEFAULT NULL,
  `facebook_adm` varchar(30) DEFAULT NULL,
  `instagram_adm` varchar(30) DEFAULT NULL,
  `twitter_adm` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_admin`
--

INSERT INTO `akun_admin` (`id_adm`, `nama_adm`, `foto_adm`, `tempat_lhr_adm`, `tgl_lhr_adm`, `alamat_adm`, `nmpengguna_adm`, `email_adm`, `katasandi_adm`, `telepon_adm`, `facebook_adm`, `instagram_adm`, `twitter_adm`) VALUES
(2, 'Kris Wangsa Putra', 'jenis2.jfif', 'Kalimantan Selatan', '1999-04-17', 'New Jersey', 'kris', 'kriswangsaputra04@gmail.com', '$2y$10$Z1blUzvaz89DUg1gTrRy/.W8KMZvPw06viViyAlBsvxbAEIC0N.Ge', '081293628517', '@kriswangsaputra', '@kriswangsaputra_', '@kriswangsaputraa'),
(4, 'Kris Wangsa Putra', '', 'Kebumen', '1999-04-17', 'kajoran', 'kwp', 'kunkun@gmail', '$2y$10$wUIuf37iQKLKDN8vrHsCuufYCqLqZ6jND4GyStn4.yxVrY8bOIXqq', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_user`
--

CREATE TABLE `akun_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `foto_user` varchar(20) DEFAULT NULL,
  `email_user` varchar(30) DEFAULT NULL,
  `nmpengguna_user` varchar(20) DEFAULT NULL,
  `katasandi_user` varchar(80) DEFAULT NULL,
  `alamat_user` varchar(50) DEFAULT NULL,
  `tempat_lahir_user` varchar(20) DEFAULT NULL,
  `tgl_lahir_user` date DEFAULT NULL,
  `telepone_user` varchar(15) DEFAULT NULL,
  `facebook_user` varchar(30) DEFAULT NULL,
  `instagram_user` varchar(30) DEFAULT NULL,
  `twetter_user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_user`
--

INSERT INTO `akun_user` (`id_user`, `nama_user`, `foto_user`, `email_user`, `nmpengguna_user`, `katasandi_user`, `alamat_user`, `tempat_lahir_user`, `tgl_lahir_user`, `telepone_user`, `facebook_user`, `instagram_user`, `twetter_user`) VALUES
(3, 'Kris Wangsa Putra', 'visimisi.jpg', 'kriswangsaputra04@gmail.com', 'kris', '$2y$10$NKn2RpDsksz93HdmBgPW4uhlQHISX7.PWVscosJcKZGPjvDVDwRaO', 'Kajoran', 'Kebumen', '1999-04-17', '081293628517', '@kriswangsaputra', '@kriswangsaputra_', '@kriswangsaputraa'),
(8, 'wangsa', '', 'kunkun@gmail', 'wangsa', '$2y$10$8ydZgSmaPudHXyyv2sA5eO.J.NPJ9nzik0JIby4y9XhwP2S.l69oa', 'Jakarta Pusat', 'Jakarta Selatan', '2023-01-11', '', '', '', ''),
(9, 'ahmad fauzy', '2.png', 'ahmadfauzy@gmail.com', 'fauzy', '$2y$10$CG1t4hN5NLRKBN1w37Ks3.4kh9kzPUl6a2loWvFADNVLA5sDi5Ygu', 'kebayoran baru', 'Jakarta Selatan', '1999-04-17', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelatihan`
--

CREATE TABLE `data_pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `pelatihan` varchar(50) DEFAULT NULL,
  `peserta_pelatihan` varchar(30) DEFAULT NULL,
  `telepon_peserta` varchar(13) DEFAULT NULL,
  `email_peserta` varchar(40) DEFAULT NULL,
  `nilai_pelatihan` varchar(5) DEFAULT NULL,
  `status_pelatihan` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pelatihan`
--

INSERT INTO `data_pelatihan` (`id_pelatihan`, `pelatihan`, `peserta_pelatihan`, `telepon_peserta`, `email_peserta`, `nilai_pelatihan`, `status_pelatihan`) VALUES
(4, 'Pelatihan Budidaya Ikan Cupang', 'Kris Wangsa Putra', '081293628517', 'kriswangsaputra04@gmail.com', '', 'tidak lulus'),
(5, 'Pelatihan Budidaya Ikan Cupang', 'Kris Wangsa Putra', '081293628517', 'kriswangsaputra04@gmail.com', '', 'tidak lulus'),
(6, 'Pelatihan Budidaya Ikan Cupang', 'Kris Wangsa Putra', '081293628517', 'kriswangsaputra04@gmail.com', '100', 'lulus'),
(7, 'Pelatihan Budidaya Ikan Cupang', 'Kris Wangsa Putra', '081293628517', 'kriswangsaputra04@gmail.com', '100', 'lulus'),
(10, 'Pelatihan Budidaya Ikan Cupang', 'Raditiya Rezky Maulana', '12345678789', 'rezky@gmail.com', '100', 'lulus'),
(11, 'Pelatihan Budidaya Ikan Cupang', 'Kris Wangsa Putra', '12345678789', 'kriswangsaputra04@gmail.com', '96', 'lulus'),
(12, 'Pelatihan Budidaya Ikan Cupang', 'Kris Wangsa Putra', '081293628517', 'kriswangsaputra04@gmai.com', '97.5', 'lulus'),
(13, 'Pelatihan Budidaya Ikan Cupang', 'ahmad fauzy', '12345678789', 'ahmadfauzy@gmail.com', '97.5', 'lulus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_transaksi`
--

CREATE TABLE `data_transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `nm_pembeli` varchar(25) NOT NULL,
  `id_produk` varchar(4) NOT NULL,
  `nm_produk` varchar(25) NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `jmlh_beli` varchar(2) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `total_harga` varchar(12) NOT NULL,
  `status_transaksi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_transaksi`
--

INSERT INTO `data_transaksi` (`id_transaksi`, `nm_pembeli`, `id_produk`, `nm_produk`, `gambar`, `jmlh_beli`, `harga`, `total_harga`, `status_transaksi`) VALUES
('T-220123-01', 'ahmad fauzy', 'PI02', 'crowntail', 'dana.png', '2', '20000', '40000', 'Selesai'),
('T-230123-02', 'ahmad fauzy', 'PI04', 'Ikan Cupang Plakat Avatar', 'dana.png', '4', '300000', '1200000', 'Selesai'),
('T-230123-03', 'ahmad fauzy', 'PI04', 'Ikan Cupang Plakat Avatar', 'dana.png', '1', '300000', '300000', 'Selesai'),
('T-230123-04', 'ahmad fauzy', 'PI08', 'Ikan Cupang Candy', 'dana.png', '4', '200000', '800000', 'Selesai'),
('T-240123-05', 'ahmad fauzy', 'PI07', 'Ikan Cupang Black Samurai', 'dana.png', '3', '100000', '300000', 'Selesai'),
('T-240123-06', 'ahmad fauzy', 'PI07', 'Ikan Cupang Black Samurai', 'dana.png', '3', '100000', '300000', 'Selesai'),
('T-240123-07', 'ahmad fauzy', 'PI07', 'Ikan Cupang Black Samurai', 'dana.png', '5', '100000', '500000', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikancupangalam`
--

CREATE TABLE `ikancupangalam` (
  `id` int(11) NOT NULL,
  `judul_cpngalam` varchar(30) DEFAULT NULL,
  `penjelasan_cpngalam` varchar(255) DEFAULT NULL,
  `gambar_cpngalam` varchar(30) DEFAULT NULL,
  `jenis_cpngalam` varchar(50) DEFAULT NULL,
  `deskripsi_jenis_cpngalam` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ikancupangalam`
--

INSERT INTO `ikancupangalam` (`id`, `judul_cpngalam`, `penjelasan_cpngalam`, `gambar_cpngalam`, `jenis_cpngalam`, `deskripsi_jenis_cpngalam`) VALUES
(3, 'Ikan Cupang Alam', 'Golongan ikan cupang ini merupakan cupang yang hidupnya masih di rawa-rawa atau persawahan dan keindahannya terbentuk secara alami tanpa campur tangan manusia meskipun diperoleh dari alam, ikan cupang ini mempunyai bentuk dan warna yang cantik.', 'jenis1.jfif', '1. Ikan Cupang Channoides (Betta Channoides)', 'Betta Channoides berasal dari Sungai Mahakam, Kalimantan Timur. Ciri khas ikan cupang endemik ini adalah terdapat list putih pada ujung sirip tengah dan sirip perut. Nilai jual ikan cupang ini pun tinggi. Pasalnya, selain punya warna kecoklatan yang unik, beberapa daerah menyebutnya sebagai ikan cupang ular, di mana hanya ada di Indonesia. Betta Channoides jantan memiliki warna yang gelap dengan t'),
(4, '', '', '', '2. Ikan Cupang Ocellata (Betta Ocellata)', 'Jika sebelumnya ikan cupang memiliki ciri khas, ikan cupang Ocellata cenderung tidak memiliki warna yang menonjol dari karakternya. Namun, ikan cupang ini memiliki keunikan lain dari sisi sifatnya, yaitu dapat melompat ke permukaan air. Di alam liarnya, ikan ini biasa mengangkat serangga di atas permukaan. Buat kamu pemilik hobi aquascape, pilihan ikan cupang ini bisa menambah kenaturalannya. Perb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikancupanghias`
--

CREATE TABLE `ikancupanghias` (
  `id` int(11) NOT NULL,
  `judul_cpnghias` varchar(30) DEFAULT NULL,
  `subjudul_cpnghias` varchar(300) DEFAULT NULL,
  `gambar_cpnghias` varchar(30) DEFAULT NULL,
  `jenis_cpnghias` varchar(50) DEFAULT NULL,
  `penjelasan_jenis_cpnghias` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ikancupanghias`
--

INSERT INTO `ikancupanghias` (`id`, `judul_cpnghias`, `subjudul_cpnghias`, `gambar_cpnghias`, `jenis_cpnghias`, `penjelasan_jenis_cpnghias`) VALUES
(2, 'Ikan Cupang Hias', 'Golongan cupang ini merupakan persilangan dari ikan cupang alam. jenis ikan cupang ini sangat beragaam karena banyak persilangan dari tiap jenisnya.', 'jenis2.jfif', '1. Ikan Cupang Giant', 'Cupang Giant merupakan cupang yang berukuran besar lebih dari ikan cupang normal pada umumnya. ikan ini bisa mencapai besar 8 - 12 cm. ikan cupang giant terlihat kurang aktif dibanding ikan cupang yang berukuran kecil lainnya, namun sifat agresifitas ikan ini masih tetap ada karena memang ikan cupang bersifat soliter.'),
(3, '', '', '', '2. Ikan Cupang Halfmoon', 'Ikan Cupang Halfmoon pertama kali dibudidayakan di Amerika Serikat oleh petter Goettner pada tahun 1982. sesuai dengan namanya cupang halfmoon memiliki sirip lebar dan simetris menyerupai bentuk setengah bulan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi_kami`
--

CREATE TABLE `koleksi_kami` (
  `id` int(11) NOT NULL,
  `judul_kntn_koleksi` varchar(30) DEFAULT NULL,
  `gambar_kntn_koleksi` varchar(20) DEFAULT NULL,
  `deskripsi_kntn_koleksi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `koleksi_kami`
--

INSERT INTO `koleksi_kami` (`id`, `judul_kntn_koleksi`, `gambar_kntn_koleksi`, `deskripsi_kntn_koleksi`) VALUES
(7, 'Red Koi', 'redkoi.jpg', 'Ikan Cupang Jenis ekor pendek ini sering disebut ikan cupang red koi karena kemiripannya dengan ikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `nama_pengirim` varchar(30) DEFAULT NULL,
  `email_pengirim` varchar(40) DEFAULT NULL,
  `subjek_komentar` varchar(100) DEFAULT NULL,
  `komentar` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nama_pengirim`, `email_pengirim`, `subjek_komentar`, `komentar`) VALUES
(1, 'Kris Wangsa Putra', 'kriswangsaputra04@gmail.com', 'fitur kurang lengkap', 'saya telah mengikuti pelatihan, tapi tidak dapat feedback apapun. saya harap bisa ditambahkan fitur sertifikat setelah pelatihan selesai'),
(2, 'Kris Wangsa Putra', 'kriswangsaputra04@gmail.com', 'halo', 'aku ingin mencuba fitur komentar'),
(3, 'Kris Wangsa Putra', 'kriswangsaputra04@gmail.com', 'mencoba komentar', 'mencoba fitur komentar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(4) NOT NULL,
  `nm_produk` varchar(25) NOT NULL,
  `usia_produk` varchar(2) NOT NULL,
  `harga_produk` varchar(12) NOT NULL,
  `stok_produk` varchar(3) NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nm_produk`, `usia_produk`, `harga_produk`, `stok_produk`, `gambar`, `deskripsi_produk`) VALUES
('PI01', 'koi galaksi              ', '2 ', '10000       ', '2  ', 'redkoi.jpg', 'ikan amat sangat cantik                                    '),
('PI02', 'crowntail                ', '3 ', '20000       ', '3  ', 'crowntail.jpg', 'ikan sangat cantik                                    '),
('PI03', 'Blue Rim', '3', '120000', '1', 'bluerim.jpg', 'Ikan Cupang Plakat dengan nama Blue Rim'),
('PI04', 'Ikan Cupang Plakat Avatar', '3', '300000', '1', 'avatar.jpg', 'ikan cupang plakat avatar dengan warna rintik yang proporsional. dan gen yang sangat baik'),
('PI05', 'Ikan Cupang Halfmoon Gold', '4', '350000', '9', 'gold.jfif', 'ikan cupang halfmoon dengan warna emas yang menawan dan anggun'),
('PI06', 'Ikan Cupang Plakat Ironma', '2.', '150000', '10', 'ironman.jfif', 'ikan cupang plakat yang memiliki pola warna menarik dan cantik seperti tokoh film ironman'),
('PI07', 'Ikan Cupang Black Samurai', '3', '100000', '1', 'samurai.jpg', 'ikan cupang plakat black samurai atau black mamba, dengan warna hitam pekat dan sisik yang mengkilat'),
('PI08', 'Ikan Cupang Candy', '3', '200000', '6', 'candy.jpg', 'ikan cupang plakat candy multycollor yang sangat cantik dengan perpaduan warna yang elegan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_media_budidaya`
--

CREATE TABLE `quiz_media_budidaya` (
  `id` int(11) NOT NULL,
  `soal` varchar(100) DEFAULT NULL,
  `pilihan1` varchar(40) DEFAULT NULL,
  `pilihan2` varchar(40) DEFAULT NULL,
  `pilihan3` varchar(40) DEFAULT NULL,
  `pilihan4` varchar(40) DEFAULT NULL,
  `jawaban` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz_media_budidaya`
--

INSERT INTO `quiz_media_budidaya` (`id`, `soal`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `jawaban`) VALUES
(1, 'Media budidaya ikan cupang terbagi menjadi 2, apa saja', 'media pemijahan dan pembesaran', 'media cupang dewasa dan burayak', 'media pemijahan dan burayak', 'media ikan cupang siap jual', 'media pemijahan dan pembesaran'),
(2, 'Daun ketapang kering berfungsi untuk', 'mengatur ph air', 'media pembesaran', 'makanan burayak', 'media pemijahan', 'mengatur ph air'),
(3, 'Jika ikan cupang kita berjenis giant media pembesaran yang baik adalah', 'ember berukuran sedang', 'botol 1,5 liter', 'soliter kecil', 'sterofoam', 'ember berukuran sedang'),
(4, 'air ini lebih baik diendapkan selama minimal', 'satu malam', 'dua malam', 'tiga malam', 'satu minggu', 'satu malam'),
(5, 'salah satu fungsi mengendapkan air adalah', 'menyesuaikan ph air', 'agar air jernih', 'agar air tidak bau', 'agar air tidak berasa', 'menyesuaikan ph air'),
(6, 'menjaga kesehatan air agar partikel tidak mengganggu adalah dengan cara', 'mengendapkan air', 'menyaring air', 'mengganti air', 'mengalirkan air', 'mengendapkan air'),
(7, 'fungsi dari gelas plastik pada media budidaya adalah', 'tempat induk betina', 'tempat induk jantan', 'tempat burayak', 'tempat pemijahan', 'tempat induk betina'),
(8, 'wadah pemijahan disarankan menggunakan', 'baskom', 'ember bak', 'sterofoam pembesaran', 'ember sedang', 'baskom'),
(9, 'obat biru dan garam ikan berfunsi sebagai', 'pencegah penyakit', 'makanan indukan', 'makanan burayak', 'penghias', 'pencegah penyakit'),
(10, 'burayak adalah sebutan untuk', 'anakan ikan cupang', 'induk jantan', 'induk betina', 'pakan ikan cupang', 'anakan ikan cupang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_morfologi`
--

CREATE TABLE `quiz_morfologi` (
  `id` int(11) NOT NULL,
  `soal` varchar(100) DEFAULT NULL,
  `pilihan1` varchar(40) DEFAULT NULL,
  `pilihan2` varchar(40) DEFAULT NULL,
  `pilihan3` varchar(40) DEFAULT NULL,
  `pilihan4` varchar(40) DEFAULT NULL,
  `jawaban` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz_morfologi`
--

INSERT INTO `quiz_morfologi` (`id`, `soal`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `jawaban`) VALUES
(1, 'Klasifikasi filum ikan cupang adalah', 'Chordata', 'Craeniata', 'Osteichthyes', 'Actinopterygii', 'Chordata'),
(2, 'Klasifikasi Spesies ikan cupang adalah', 'Betta Splendens', 'Macropodusinae', 'Osphronamidae', 'Percomorphodei', 'Betta Splendens'),
(3, 'Bagian Tubuh Ikan cupang yang membuat ikan cupang dapat mengambil oksigen dari permukaan air', 'labirin', 'Sirip Insang', 'Sirip punggung', 'mulut', 'labirin'),
(4, 'Klasifikasi Genus ikan cupang adalah', 'Betta', 'Craeniata', 'Osteichthyes', 'Actinopterygii', 'Betta'),
(5, 'ecara fisik, cupsng memiliki ekor yang membentuk', 'Setengah Lingkaran', 'bulat', 'pipih', 'memanjang', 'Setengah Lingkaran'),
(7, 'klasifikasi subfilum ikan cupang adalah', 'Craeniata', 'Betta Splendens', 'Osphronamidae', 'Actinopterygii', 'Craeniata'),
(8, 'Klasifikasi Ordo Ikan Cupang adalah', 'Percomorphodei', 'Craeniata', 'Osphronamidae', 'Actinopterygii', 'Percomorphodei'),
(9, 'Klasifikasi Subfamili Ikan cupang adalah', 'Macropodusinae', 'Craeniata', 'Osphronamidae', 'Actinopterygii', 'Macropodusinae'),
(10, 'ciri khas ikan cupang jantan salah satunya adalah', 'senang memamerkan keindahan ek', 'bertelur', 'memakan burayak', 'mudah stres', 'senang memamerkan keindahan ek'),
(11, 'sirip ikan cupang ada dua jenis yaitu setengah lingkaran dan', 'serit', 'full moon', 'pipih', 'memanjang', 'serit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_pembesaran`
--

CREATE TABLE `quiz_pembesaran` (
  `id` int(11) NOT NULL,
  `soal` varchar(100) DEFAULT NULL,
  `pilihan1` varchar(40) DEFAULT NULL,
  `pilihan2` varchar(40) DEFAULT NULL,
  `pilihan3` varchar(40) DEFAULT NULL,
  `pilihan4` varchar(40) DEFAULT NULL,
  `jawaban` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz_pembesaran`
--

INSERT INTO `quiz_pembesaran` (`id`, `soal`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `jawaban`) VALUES
(1, 'setelah pemijahan burayak tetap berada di wadah selama', '4 hari', '3 hari', '2 hari', '1 hari', '4 hari'),
(2, 'pembesaran dalam kolam pembesaran bisa berkisar', '1 - 3 bulan', '3 - 4 bulan', '4 - 5 bulan', '5 - 6 bulan', '1 - 3 bulan'),
(3, 'salah satu fungsi daun pisang kering adalah', 'media pertumbuhan infusoria', 'media pertumbuhan jamur', 'obat penyakit', 'media meletakan telur', 'media pertumbuhan infusoria'),
(4, 'burayak usia 4 - 7 hari tidak perlu diberi makan karena', 'memiliki makanan alami', 'belum bisa makan', 'mendapat makan dari induk', 'sudah kenyang', 'memiliki makanan alami'),
(5, 'berapa ketinggian air pada kolam pembesaran ', '20 - 40 cm', '50 - 80 cm', '1 meter', '5 - 10 cm', '20 - 40 cm'),
(6, 'pergantian air pada kolam pembesaran dapat dilakukan', '1 kali sebulan', '1 kali seminggu', '3 hari sekali', 'tidak perlu diganti', '1 kali sebulan'),
(7, 'salah satu ciri ciri ikan cupang yang sudah dapat disortir dari kolam pembesaran adalah', 'mulai bermutasi warna', 'ikan cupang betina', 'burayak kecil', 'ikan cupang berwarna gelap', 'mulai bermutasi warna'),
(8, 'media pembesaran soliter dapat berupa', 'botol, drigen, ember', 'sterofoam', 'bak', 'terpal', 'botol, drigen, ember'),
(9, 'pembesaran soliter dapat memakan waktu selama', '2 minggu - 1 bulan', 'satu minggu', '5 hari', '5 bulan', '2 minggu - 1 bulan'),
(10, 'pergantian air pada soliter ikan cupang siap jual dapat dilakukan berapa kali', '1 - 2 kali selama satu minggu', '1 kali seminggu', '3 kali seminggu', '5 kali seminggu', '1 - 2 kali selama satu minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_pemijahan`
--

CREATE TABLE `quiz_pemijahan` (
  `id` int(11) NOT NULL,
  `soal` varchar(100) DEFAULT NULL,
  `pilihan1` varchar(40) DEFAULT NULL,
  `pilihan2` varchar(40) DEFAULT NULL,
  `pilihan3` varchar(40) DEFAULT NULL,
  `pilihan4` varchar(40) DEFAULT NULL,
  `jawaban` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz_pemijahan`
--

INSERT INTO `quiz_pemijahan` (`id`, `soal`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `jawaban`) VALUES
(1, 'Indukan yang membuat gelembung adalah', 'indukan jantan', 'indukan betina', 'jantan dan betina', 'burayak', 'indukan jantan'),
(2, 'indukan cupang dapat dipijahkan kembali minimal berapa lama', '2 minggu', '1 minggu', '5 hari', '2 hari', '2 minggu'),
(3, 'indukan yang harus dipisahkan setela dipijahkan adalah', 'induk betina', 'induk jantan', 'induk jantan dan betina', 'tidak dipisahkan', 'induk betina'),
(4, 'ciri ikan cupang jantan yaitu memiliki warna yang', 'tegas dan variatif', 'kusam', 'monoton', 'gelap', 'tegas dan variatif'),
(5, 'garis vertikal pada tubuh ikan cupang berjenis kelamin', 'betina', 'jantan', 'jantan dan betina', 'burayak', 'betina'),
(6, 'setelah sir sudah siap tahap selanjutnya adalah', 'penjodohan', 'menggabungkan indukan', 'memisah induk jantan', 'mengambil burayak', 'penjodohan'),
(7, 'media untuk membuat gelembung disarankan terbuat dari', 'plastik bening', 'tanaman air', 'daun ketapang', 'daun pisang', 'plastik bening'),
(8, 'proses penjodohan dapat memakan waktu berapa lama', '1-2 hari', '3 hari', '4 hari', '5 hari', '1-2 hari'),
(9, 'jika dalam waktu 1-2 hari proses pemijahan tidak menghasilkan telur, maka', 'ganti indukan betina', 'ganti indukan jantan', 'ulangi proses pemijahan', 'lanjutkan pemijahan', 'ganti indukan betina'),
(10, 'jika pemijahan berhasil dapat dilihat pada', 'ada telur pada gelembung', 'sirip ikan yang rusak', 'ciri fisik ikan', 'gelembung yang rusak', 'ada telur pada gelembung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sejarah`
--

CREATE TABLE `sejarah` (
  `id` int(11) NOT NULL,
  `judul_sejarah` varchar(30) DEFAULT NULL,
  `foto_sejarah` varchar(30) DEFAULT NULL,
  `deskripsi_sejarah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sejarah`
--

INSERT INTO `sejarah` (`id`, `judul_sejarah`, `foto_sejarah`, `deskripsi_sejarah`) VALUES
(4, 'Sejarah Ikan Cupang', 'sejarah.jpg', 'Ikan cupang atau juga disebut ikan aduan Siam (Siamese fighting fish) adalah ikan yang berasal dari Asia Tenggara dan umumnya merupakan hewan peliharaan, seperti dikutip Live Science. Di Thailand misalnya, mereka menyebut ikan cupang pla kat yang berarti ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` int(11) NOT NULL,
  `judul_tentangkami` varchar(30) DEFAULT NULL,
  `subjudul_tentangkami` varchar(30) DEFAULT NULL,
  `visi` varchar(255) DEFAULT NULL,
  `misi` varchar(255) DEFAULT NULL,
  `deskripsi_tentangkami` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `judul_tentangkami`, `subjudul_tentangkami`, `visi`, `misi`, `deskripsi_tentangkami`) VALUES
(1, 'Visi &amp; Misi', 'Bergabung Dengan Kami Belajar ', 'Mencetak petani ikan cupang yang kompeten', 'Menghadirkan pelatihan budidaya ikan cupang yang mudah diakses masyarakat', ''),
(2, '', '', 'Memajukan budidaya perikanan dalam bidang ikan hias dalam hal ini ikan hias jenis cupang (Betta sp)', 'Memiliki bahan ajar yang valid untuk dijadikan materi pembelajaran dalam pelatihan sehingga dapat meningkatkan kemampuan budidaya para petani ikan cupang', ''),
(3, '', '', 'Menciptakan lapangan pekerjaan', 'Pelatihan tersertifikasi serta pengadaan lapangan pekerjaan', ''),
(4, '', '', 'Mampu bersaing dalam bidang budidaya perikanan baik dalam negeri maupun luar negeri', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_akhir_budidaya`
--

CREATE TABLE `ujian_akhir_budidaya` (
  `id` int(11) NOT NULL,
  `soal` varchar(100) DEFAULT NULL,
  `pilihan1` varchar(40) DEFAULT NULL,
  `pilihan2` varchar(40) DEFAULT NULL,
  `pilihan3` varchar(40) DEFAULT NULL,
  `pilihan4` varchar(40) DEFAULT NULL,
  `jawaban` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ujian_akhir_budidaya`
--

INSERT INTO `ujian_akhir_budidaya` (`id`, `soal`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `jawaban`) VALUES
(1, 'Klasifikasi filum ikan cupang adalah', 'Chordata', 'Craeniata', 'Osteichthyes', 'Actinopterygii', 'Chordata'),
(2, 'Media budidaya ikan cupang terbagi menjadi 2, apa saja', 'media pemijahan dan pembesaran', 'media cupang dewasa dan burayak', 'media pemijahan dan burayak', 'media ikan cupang siap jual', 'media pemijahan dan pembesaran'),
(3, 'setelah pemijahan burayak tetap berada di wadah selama', '4 hari', '3 hari', '2 hari', '1 hari', '1 hari'),
(4, 'Indukan yang membuat gelembung adalah', 'indukan jantan', 'indukan betina', 'jantan dan betina', 'burayak', 'indukan jantan'),
(5, 'Klasifikasi Spesies ikan cupang adalah', 'Betta Splendens', 'Macropodusinae', 'Osphronamidae', 'Percomorphodei', 'Betta Splendens'),
(6, 'Daun ketapang kering berfungsi untuk', 'mengatur ph air', 'media pembesaran', 'makanan burayak', 'media pemijahan', 'mengatur ph air'),
(7, 'pembesaran dalam kolam pembesaran bisa berkisar', '1 - 3 bulan', '3 - 4 bulan', '4 - 5 bulan', '5 - 6 bulan', '1 - 3 bulan'),
(8, 'indukan cupang dapat dipijahkan kembali minimal berapa lama', '2 minggu', '1 minggu', '5 hari', '2 hari', '2 minggu'),
(9, 'Bagian Tubuh Ikan cupang yang membuat ikan cupang dapat mengambil oksigen dari permukaan air', 'labirin', 'Sirip Insang', 'Sirip punggung', 'mulut', 'labirin'),
(10, 'Jika ikan cupang kita berjenis giant media pembesaran yang baik adalah', 'ember berukuran sedang', 'botol 1,5 liter', 'soliter kecil', 'sterofoam', 'ember berukuran sedang'),
(11, 'salah satu fungsi daun pisang kering adalah', 'media pertumbuhan infusoria', 'media pertumbuhan jamur', 'obat penyakit', 'media meletakan telur', 'media pertumbuhan infusoria'),
(12, 'indukan yang harus dipisahkan setela dipijahkan adalah', 'induk betina', 'induk jantan', 'induk jantan dan betina', 'tidak dipisahkan', 'induk betina'),
(13, 'Klasifikasi Genus ikan cupang adalah', 'Betta', 'Craeniata', 'Osteichthyes', 'Actinopterygii', 'Betta'),
(14, 'air ini lebih baik diendapkan selama minimal', 'satu malam', 'dua malam', 'tiga malam', 'satu minggu', 'satu malam'),
(15, 'burayak usia 4 - 7 hari tidak perlu diberi makan karena', 'memiliki makanan alami', 'belum bisa makan', 'mendapat makan dari induk', 'sudah kenyang', 'memiliki makanan alami'),
(16, 'ciri ikan cupang jantan yaitu memiliki warna yang', 'tegas dan variatif', 'kusam', 'monoton', 'gelap', 'tegas dan variatif'),
(17, 'ecara fisik, cupsng memiliki ekor yang membentuk', 'Setengah Lingkaran', 'bulat', 'memanjang', 'pipih', 'Setengah Lingkaran'),
(18, 'salah satu fungsi mengendapkan air adalah', 'menyesuaikan ph air', 'agar air jernih', 'agar air tidak bau', 'agar air tidak berasa', 'menyesuaikan ph air'),
(19, 'berapa ketinggian air pada kolam pembesaran', '20 - 40 cm', '50 - 80 cm', '1 meter', '5 - 10 cm', '20 - 40 cm'),
(20, 'garis vertikal pada tubuh ikan cupang berjenis kelamin', 'betina', 'jantan', 'jantan dan betina', 'burayak', 'betina'),
(21, 'klasifikasi subfilum ikan cupang adalah', 'Craeniata', 'Betta Splendens', 'Osphronamidae', 'Actinopterygii', 'Craeniata'),
(22, 'menjaga kesehatan air agar partikel tidak mengganggu adalah dengan cara', 'mengendapkan air', 'menyaring air', 'mengganti air', 'mengalirkan air', 'mengendapkan air'),
(23, 'pergantian air pada kolam pembesaran dapat dilakukan', '1 kali sebulan', '3 hari sekali', '1 kali seminggu', 'tidak perlu diganti', '1 kali sebulan'),
(24, 'setelah sir sudah siap tahap selanjutnya adalah', 'penjodohan', 'mengambil burayak', 'menggabungkan indukan', 'memisah induk jantan', 'penjodohan'),
(25, 'Klasifikasi Ordo Ikan Cupang adalah', 'Percomorphodei', 'Craeniata', 'Osphronamidae', 'Actinopterygii', 'Percomorphodei'),
(26, 'fungsi dari gelas plastik pada media budidaya adalah', 'tempat induk betina', 'tempat induk jantan', 'tempat burayak', 'tempat pemijahan', 'tempat induk betina'),
(27, 'salah satu ciri ciri ikan cupang yang sudah dapat disortir dari kolam pembesaran adalah', 'mulai bermutasi warna', 'ikan cupang betina', 'burayak kecil', 'ikan cupang berwarna gelap', 'mulai bermutasi warna'),
(28, 'media untuk membuat gelembung disarankan terbuat dari', 'plastik bening', 'tanaman air', 'daun ketapang', 'daun pisang', 'plastik bening'),
(29, 'Klasifikasi Subfamili Ikan cupang adalah', 'Macropodusinae', 'Craeniata', 'Osphronamidae', 'Actinopterygii', 'Macropodusinae'),
(30, 'wadah pemijahan disarankan menggunakan', 'baskom', 'ember bak', 'sterofoam pembesaran', 'ember sedang', 'baskom'),
(31, 'media pembesaran soliter dapat berupa', 'botol, drigen, ember', 'sterofoam', 'bak', 'terpal', 'botol, drigen, ember'),
(32, 'proses penjodohan dapat memakan waktu berapa lama', '1-2 hari', '3 hari', '4 hari', '5 hari', '1-2 hari'),
(33, 'ciri khas ikan cupang jantan salah satunya adalah', 'senang memamerkan keindahan ek', 'bertelur', 'memakan burayak', 'mudah stres', 'senang memamerkan keindahan ek'),
(34, 'obat biru dan garam ikan berfunsi sebagai', 'pencegah penyakit', 'makanan indukan', 'makanan burayak	', 'penghias', 'pencegah penyakit'),
(35, 'pembesaran soliter dapat memakan waktu selama', '2 minggu - 1 bulan', 'satu minggu', '5 hari', '5 bulan', '2 minggu - 1 bulan'),
(36, 'jika dalam waktu 1-2 hari proses pemijahan tidak menghasilkan telur, maka', 'ganti indukan betina', 'ganti indukan jantan', 'ulangi proses pemijahan', 'lanjutkan pemijahan', 'ganti indukan betina'),
(37, 'sirip ikan cupang ada dua jenis yaitu setengah lingkaran dan', 'serit', 'full moon', 'pipih', 'memanjang', 'serit'),
(38, 'burayak adalah sebutan untuk', 'anakan ikan cupang', 'induk jantan', 'induk betina', 'pakan ikan cupang', 'anakan ikan cupang'),
(39, 'pergantian air pada soliter ikan cupang siap jual dapat dilakukan berapa kali', '1 - 2 kali selama satu minggu', '1 kali seminggu', '3 kali seminggu', '5 kali seminggu', '1 - 2 kali selama satu minggu'),
(40, 'jika pemijahan berhasil dapat dilihat pada', 'ada telur pada gelembung', 'sirip ikan yang rusak', 'ciri fisik ikan', 'gelembung yang rusak', 'ada telur pada gelembung');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indeks untuk tabel `akun_user`
--
ALTER TABLE `akun_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `data_pelatihan`
--
ALTER TABLE `data_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indeks untuk tabel `data_transaksi`
--
ALTER TABLE `data_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `ikancupangalam`
--
ALTER TABLE `ikancupangalam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ikancupanghias`
--
ALTER TABLE `ikancupanghias`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `koleksi_kami`
--
ALTER TABLE `koleksi_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `quiz_media_budidaya`
--
ALTER TABLE `quiz_media_budidaya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz_morfologi`
--
ALTER TABLE `quiz_morfologi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz_pembesaran`
--
ALTER TABLE `quiz_pembesaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz_pemijahan`
--
ALTER TABLE `quiz_pemijahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ujian_akhir_budidaya`
--
ALTER TABLE `ujian_akhir_budidaya`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `akun_user`
--
ALTER TABLE `akun_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_pelatihan`
--
ALTER TABLE `data_pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `ikancupangalam`
--
ALTER TABLE `ikancupangalam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ikancupanghias`
--
ALTER TABLE `ikancupanghias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `koleksi_kami`
--
ALTER TABLE `koleksi_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `quiz_media_budidaya`
--
ALTER TABLE `quiz_media_budidaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `quiz_morfologi`
--
ALTER TABLE `quiz_morfologi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `quiz_pembesaran`
--
ALTER TABLE `quiz_pembesaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `quiz_pemijahan`
--
ALTER TABLE `quiz_pemijahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ujian_akhir_budidaya`
--
ALTER TABLE `ujian_akhir_budidaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
