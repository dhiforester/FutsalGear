-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2025 at 06:19 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madu_sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

DROP TABLE IF EXISTS `akses`;
CREATE TABLE IF NOT EXISTS `akses` (
  `id_akses` int(10) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `akses` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `nama`, `kontak`, `email`, `password`, `akses`, `foto`) VALUES
(6, 'Solihul Hadi', '089601154726', 'dhiforester@gmail.com', 'f4a3229c9c5f1bdd9c6a6791080791b7', 'Customer Service', 'fb7edbefbf3c255a24a16ef6349bda.jpg'),
(25, 'Windy Yanuariska', '089601154721', 'windygiga@gmail.com', 'd748c957a0018bfe3d974f8c44e4f3b7', 'Pelanggan', 'e9149d8e1a8c8dfcee20e8c6f4bcaf.jpg'),
(26, 'Santi Nursari', '08942342342', 'santinursari@gmail.com', '8aab6686729bae15bbb979b3bac166b2', 'Pelanggan', '30a8d22759c583cc5a0538c999798c.jpg'),
(27, 'Syamsul Maarif', '089601154726', 'syamsulmaarif@gmail.com', '39a4dda18c93ccf4d47e44580bcaf1a0', 'Pelanggan', '7d945eeae4973f035c9fd124d53288.jpg'),
(28, 'Budi Utomo', '0895651212', 'budiutomo@gmail.com', 'eca390c06ce2792c675ac3cb595aa4ce', 'Pemilik', 'a2fe11b9aecbf7264794b0b42afdfc.jpg'),
(30, 'Susan Susanti', '089601154723', 'susansusanti@gmail.com', 'a2ccef0d65f5efdc19d9b968f12d55a2', 'Pemilik', '84b02d6288cd93dc35e798f8dc92fd.jpg'),
(31, 'Jefri Nicol', '089601154729', 'jefrinicol@gmail.com', '0c8046f1e88d883b22f5b07c55e9a397', 'Customer Service', '9d7276614e570ed8cc39040d52f203.jpg'),
(32, 'Nicholas Saputra', '089565121211', 'nicolassaputra@gmail.com', '9991903db34753a93a25a4100d5fba36', 'Customer Service', 'fca380436d7db5401b170e562b9621.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `id_setting_bank` int(10) NOT NULL AUTO_INCREMENT,
  `nama_bank` text NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `atas_nama` text NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`id_setting_bank`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_setting_bank`, `nama_bank`, `rekening`, `atas_nama`, `logo`) VALUES
(4, 'Bank Rakyat Indonesia (BRI)', '739248615207', 'CV.Madu Sport', 'c828486d6ebef011a2b61ca90ca539.png'),
(5, 'Bank Negara Indonesia (BNI)', '836249017583', 'CV.Madu Sport', '4ec4e3e9f694bba56ccf8243a5fd72.png'),
(6, 'Bank Central Asia (BCA)', '758214693025', 'CV.Madu Sport', '5d952cd562ccdd1dbad399539f8a00.png'),
(7, 'Bank Jabar Banten (BJB)', '349856217430', 'CV.Madu Sport', 'b13151684ed5111a9fe44e842bb375.png'),
(8, 'Bank Mega', '975132468790', 'CV.Madu Sport', '15b785134317bdf1097ca6323162c1.png'),
(9, 'Bank Danamon', '374829561032', 'CV.Madu Sport', '56d32bff76fc2ebfed6ad973a689a3.png'),
(10, 'Bank Bukopin', '473892615704', 'CV.Madu Sport', 'bf126dd2b1e90c3f95d035794c3737.png');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id_brand` int(10) NOT NULL AUTO_INCREMENT,
  `nama_brand` text NOT NULL,
  `deskripsi` text NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`, `deskripsi`, `logo`) VALUES
(1, 'Nike', 'Nike adalah salah satu merek produk olahraga paling terkenal dan sukses di dunia. Merek ini didirikan pada tahun 1964 oleh Phil Knight dan Bill Bowerman, dan telah menjadi pemimpin pasar dalam sepatu, pakaian, dan peralatan olahraga.', '25bd8ac4d2d40cd17544881611a3e4.jpeg'),
(2, 'Adidas', 'Adidas adalah salah satu merek produk olahraga paling terkenal dan sukses di dunia. Merek ini didirikan pada tahun 1949 oleh Adolf \"Adi\" Dassler, dan telah menjadi pemimpin pasar dalam sepatu, pakaian, dan peralatan olahraga.', 'd80155cbb7f0efac78803da4980055.jpg'),
(4, 'Puma', 'Puma adalah merek sepatu olahraga Jerman yang telah ada sejak tahun 1948. Merek ini dikenal dengan sepatu olahraganya yang stylish dan terjangkau. ', 'd4eddfbc17c3107b136cbdf9d6c2ea.jpg'),
(6, 'Reebok', 'Reebok adalah merek sepatu olahraga Amerika yang telah ada sejak tahun 1958. Merek ini dikenal dengan sepatu olahraganya yang nyaman dan mendukung', '1415d244ed24189df5d6eb60d5027d.jpg'),
(7, 'New Balance', 'New Balance dikenal dengan sepatu lari dan sepatu olahraga yang nyaman', 'f9079c9312f2e6158f2d738cf4fccc.jpg'),
(8, 'ASICS', 'ASICS adalah merek sepatu yang sangat dihormati dalam olahraga lari, tenis, dan olahraga lainnya', '22a37d2aeb7ae65ffbfd833cd7babe.jpg'),
(9, 'Columbia Sportswear', 'Columbia adalah merek yang mengkhususkan diri dalam pakaian dan perlengkapan luar ruangan', 'fdfbb7f24d4fa13d7d0684e9ab1175.png');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int(20) NOT NULL AUTO_INCREMENT,
  `id_akses` int(10) NOT NULL,
  `tanggal` datetime NOT NULL,
  `pesan` text NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_chat`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_akses`, `tanggal`, `pesan`, `kategori`, `status`) VALUES
(1, 27, '2023-11-03 00:37:00', 'Assalamualaikum ', 'To Admin', 'Dibaca'),
(2, 27, '2023-11-03 00:43:00', 'Haloooo', 'To Admin', 'Dibaca'),
(3, 27, '2023-11-03 01:12:39', 'Waalaikumsalam', 'From Admin', 'Dibaca'),
(4, 25, '2023-11-03 01:16:00', 'Assalamualaikum\r\n', 'To Admin', 'Dibaca'),
(5, 25, '2023-11-03 01:18:13', 'haii', 'From Admin', 'Dibaca'),
(6, 25, '2023-11-03 01:19:11', 'lagi apa', 'From Admin', 'Dibaca'),
(7, 25, '2023-11-03 01:19:00', 'hehehe', 'To Admin', 'Dibaca'),
(8, 25, '2023-11-03 01:27:20', 'hehehe', 'From Admin', 'Dibaca'),
(9, 26, '2023-11-07 01:41:00', 'Assalamualaikum', 'To Admin', 'Dibaca'),
(10, 26, '2023-11-07 01:41:00', 'Kenapa Barang Saya Belum Sampai', 'To Admin', 'Dibaca'),
(11, 26, '2023-11-07 01:41:56', 'oya sabar ya', 'From Admin', 'Dibaca');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

DROP TABLE IF EXISTS `diskon`;
CREATE TABLE IF NOT EXISTS `diskon` (
  `id_diskon` int(10) NOT NULL AUTO_INCREMENT,
  `id_produk` int(10) NOT NULL,
  `nama_produk` text NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `diskon` int(10) NOT NULL,
  PRIMARY KEY (`id_diskon`),
  KEY `id_barang` (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_produk`, `nama_produk`, `periode_awal`, `periode_akhir`, `diskon`) VALUES
(3, 5, 'Nik Air Max 97', '2023-11-01', '2023-11-30', 20),
(4, 14, 'Tas Reguler Puma', '2023-12-01', '2023-12-29', 10),
(5, 9, 'Kaos Reguler Adidas', '2024-02-01', '2024-02-29', 20),
(6, 6, 'Aerostreet T Shirt Reguler', '2024-02-01', '2024-02-29', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

DROP TABLE IF EXISTS `ongkir`;
CREATE TABLE IF NOT EXISTS `ongkir` (
  `id_ongkir` int(10) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(30) NOT NULL,
  `kabupaten` varchar(30) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `desa` varchar(30) DEFAULT NULL,
  `kurir` text NOT NULL,
  `ongkir` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_ongkir`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `kurir`, `ongkir`) VALUES
(7, 'Jawa Barat', 'Kuningan', 'Kuningan', 'Ancaran', 'JNE', 15000),
(8, 'Jawa Barat', 'Kuningan', 'Kuningan', 'Cijoho', 'JNE', 1000),
(9, 'Jawa Barat', 'Kuningan', 'Kuningan', 'Ciporang', 'JNE', 15000),
(10, 'Jawa Barat', 'Kuningan', 'Kuningan', 'Cirendang', 'JNE', 15000),
(12, 'Jawa Barat', 'Kuningan', 'Kuningan', 'Ciharendong', 'JNE', 5000),
(14, 'Jawa Barat', 'Kuningan', 'Kuningan', 'Winduhaji', 'JNE', 8000),
(15, 'Jawa Tengah', 'Losari', 'Losari', 'Banjarharjo', 'JNE', 100000),
(16, 'Jawa Tengah', 'Losari', 'Losari', 'Losari', 'JNE', 13000),
(17, 'Jawa Tengah', 'Losari', 'Losari', 'jatibarang', 'JNE', 15000),
(18, 'Jawa Barat', 'Kuningan', 'Kuningan', 'Puri Asri', 'JNE', 10000),
(19, 'Jawa Barat', 'Kuningan', 'Kuningan', 'Kertawangunan', 'JNE', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses` int(10) NOT NULL,
  `id_ongkir` int(10) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `alamat_lengkap` text,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_akses`, `id_ongkir`, `tanggal_daftar`, `alamat_lengkap`) VALUES
(1, 25, 0, '2023-11-02 04:39:09', ''),
(2, 26, 0, '2023-11-02 04:49:42', ''),
(3, 27, 0, '2023-11-02 23:58:09', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembatalan`
--

DROP TABLE IF EXISTS `pembatalan`;
CREATE TABLE IF NOT EXISTS `pembatalan` (
  `id_pembatalan` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `bukti` text NOT NULL,
  PRIMARY KEY (`id_pembatalan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(10) NOT NULL,
  `bank` text NOT NULL,
  `nama` text NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `image_bukti` text NOT NULL,
  `status` text NOT NULL COMMENT 'Pending, Lunas, Kurang',
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_transaksi`, `bank`, `nama`, `rekening`, `image_bukti`, `status`) VALUES
(1, 1, 'Bank BRI', 'Dewi Widiastuti', '4323254555', '3c486f068ea185a294067d7d16b5f4.png', ''),
(2, 2, 'Bank BRI', 'Dini Agustina', '12341234', 'eeccc7881b0ca790f210566ccf1b43.jpg', ''),
(3, 2, 'Bank BRI', 'Dini Agustina', '12341234', '522e01ef5c347a5e9d42baa37b1ce2.jpg', ''),
(6, 5, 'Bank Rakyat Indonesia (BRI)', 'Solihul Hadi', '428101028495538', '627edcb10a2f6ff796004ce34f8a5b.png', 'Lunas'),
(7, 6, 'Bank Bukopin', 'Solihul Hadi', '428101028495538', '03c621497ad914af7f853e14097a8c.jpg', 'Lunas'),
(8, 7, 'Bank Rakyat Indonesia (BRI)', 'Solihul Hadi', '428101028495538', 'dc115787e7fe2e9902715f7cb214d5.png', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

DROP TABLE IF EXISTS `pengiriman`;
CREATE TABLE IF NOT EXISTS `pengiriman` (
  `id_pengiriman` int(15) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(15) NOT NULL,
  `no_resi` varchar(25) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `status_pengiriman` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pengiriman`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_transaksi`, `no_resi`, `tanggal`, `keterangan`, `status_pengiriman`) VALUES
(1, 5, '441232342342', '2023-11-04 04:09:05', 'Packing produk', 'Dikirim'),
(2, 5, '441232342342', '2023-11-04 04:10:15', 'Pengiriman sorting depot', 'Dikirim'),
(3, 5, '441232342342', '2023-11-04 04:12:56', 'Sorting Cabang Cirebon', 'Dikirim'),
(6, 5, '441232342342', '2023-11-04 04:31:51', 'Sampai Rumah', 'Sampai Tujuan'),
(7, 5, '441232342342', '2023-11-05 00:06:59', 'Selesai', 'Selesai'),
(8, 6, '4512351234', '2023-11-05 07:09:59', 'Dikirim', 'Dikirim'),
(9, 6, '4512351234', '2023-11-05 07:10:30', 'Kebutuhan rutin', 'Sampai Tujuan'),
(10, 6, '4512351234', '2023-11-05 00:10:41', 'Selesai', 'Selesai'),
(11, 7, '45123512344', '2023-11-07 01:35:59', 'salah hitung', 'Dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(10) NOT NULL AUTO_INCREMENT,
  `id_brand` int(10) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `brand` text NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `deskripsi` text,
  `harga` int(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_brand`, `nama_produk`, `brand`, `kategori`, `deskripsi`, `harga`, `stok`, `foto`) VALUES
(2, 1, 'Nike Air Max Scorpion', 'Nike', 'Sepatu', 'Nike Air Max Scorpion adalah sepatu olahraga yang dirilis oleh Nike pada tahun 2022. Sepatu ini dirancang untuk memberikan kenyamanan dan respons yang luar biasa untuk berbagai aktivitas, termasuk lari, basket, dan tenis.', 3250000, 3, '72fb1644059ab62be8bdd64faa8f2b.jpeg'),
(3, 1, 'Sepatu Sneakers Unisex', 'Nike', 'Sepatu', 'Note : apabila terjadi kerusakan pada produk yang diorder, silahkan chat ke customer service (admin) kami serta melampirkan bukti video unboxing, tim kami dengan senang hati membantu siap proses nya :)', 2200000, 0, 'd3121831921acd8400447fd4468fa2.jpg'),
(4, 7, 'Nike New Balace 2002R', 'New Balance', 'Sepatu', 'Note : apabila terjadi kerusakan pada produk yang diorder, silahkan chat ke customer service (admin) kami serta melampirkan bukti video unboxing, tim kami dengan senang hati membantu siap proses nya :)', 2200000, 5, '7642a2e2917c5285d01f8de1e5b711.jpeg'),
(5, 1, 'Nik Air Max 97', 'Nike', 'Sepatu', 'Mengenai pemesanan atau pembelian produk tertentu, Anda perlu mencari toko sepatu atau penjual yang menyediakan sepatu Nike Air Max 97 Triple White dalam kondisi BNIB (Brand New In Box) dan ukuran 36 (atau sesuai dengan kebutuhan Anda).', 840000, 4, '494658f2c616c6493191d251710ea6.jpeg'),
(6, 2, 'Aerostreet T Shirt Reguler', 'Adidas', 'T-Shirt', 'Bahan :\r\n- Katun Combed 24s - Extra Soft Finishing\r\n- Jaminan sablon plastisol awet dan tahan lama\r\n- Sejuk dan nyaman saat dipakai', 50000, 10, 'c93430bf89d68868f0c4b0e6f19d44.jpg'),
(7, 2, 'Grey Addidas T-Shirt', 'Adidas', 'T-Shirt', 'Desain dan Gaya: Kaos Adidas memiliki berbagai desain dan gaya yang dapat memenuhi berbagai kebutuhan dan preferensi. Mereka sering memiliki desain yang khas dengan tiga garis mendatar yang menjadi ciri khas merek Adidas. Kaos Adidas hadir dalam berbagai warna, termasuk warna-warna klasik seperti hitam, putih, dan biru, serta warna-warna yang lebih berani', 25000, 13, '88078829ec127ac6a88c9d0f767c86.jpg'),
(8, 2, 'Kaos Bola Adidas', 'Adidas', 'T-Shirt', 'Bahan: Kaos Adidas biasanya terbuat dari bahan berkualitas tinggi seperti katun, polyester, atau campuran bahan yang nyaman untuk dipakai. Bahan-bahan ini membantu menjaga kenyamanan dan daya tahan kaos selama aktivitas fisik.', 50000, 24, '8550e858cdc900badc169ca273254f.jpeg'),
(9, 2, 'Kaos Reguler Adidas', 'Adidas', 'T-Shirt', 'Kinerja: Banyak kaos Adidas didesain dengan teknologi kinerja untuk meningkatkan kenyamanan dan performa selama berolahraga. Teknologi tersebut mungkin meliputi sifat anti-peluru, kemampuan menyerap keringat', 25000, 24, 'dae37283153a07c1609612b190aaaa.jpeg'),
(10, 8, 'Tas Reguler Asics', 'ASICS', 'Tas', 'Tas Asics memiliki berbagai desain dan gaya yang dirancang untuk memenuhi kebutuhan berbagai aktivitas dan penggunaan. Mereka sering memiliki desain yang sporty dan fungsional dengan sentuhan estetika yang khas Asics. Tas ini tersedia dalam berbagai ukuran dan model, seperti tas selempang, tas ransel, tas tangan, dan banyak lagi.', 120000, 20, 'e52889d736f8a5686b788a8c73e0d6.jpg'),
(11, 9, 'Tas Sekolah Columbia', 'Columbia Sportswear', 'Tas', 'as Asics sering dibuat dari bahan-bahan berkualitas tinggi yang tahan lama dan kuat. Bahan yang umum digunakan termasuk poliester, nilon, dan bahan sintetis lainnya. Ini membantu menjaga ketahanan dan daya tahan tas selama penggunaan yang aktif.', 200000, 12, '39232fac968e90fb3c8479905ad139.jpg'),
(12, 9, 'Tas Pinggang Columbia', 'Columbia Sportswear', 'Tas', 'Tas Asics sering didesain dengan fungsi yang baik dalam pikiran. Beberapa tas Asics memiliki banyak kantong dan kompartemen untuk membantu Anda mengatur barang-barang Anda dengan baik. Mereka juga sering dilengkapi dengan tali bahu yang dapat disesuaikan untuk kenyamanan penggunaan.', 200000, 12, '3d61161b6c0857b940b24b895fa56f.jpg'),
(13, 6, 'Tas Pinggang Rebok Orange', 'Reebok', 'Tas', 'Tas Asics biasanya mencakup logo Asics yang terkenal, yang terdiri dari huruf \"ASICS\" dengan desain yang khas. Logo ini sering terletak di bagian depan atau sisi tas.', 210000, 12, '6896be76dbbd383f828a7a3d3f417b.jpg'),
(14, 4, 'Tas Reguler Puma', 'Puma', 'Tas', 'Tas Asics tersedia dalam berbagai warna, dan Anda dapat memilih sesuai dengan preferensi pribadi Anda. Beberapa model mungkin mengikuti warna-warna merek Asics yang khas, seperti kombinasi warna biru dan putih.', 25000, 24, 'cd8d74540bf3f3c1068b60e3600ef1.jpg'),
(15, 7, 'Topi Taktikal New Balance', 'New Balance', 'Topi', 'Topi New Balance memiliki desain yang khas dengan fokus pada kesederhanaan dan gaya yang sporty. Mereka sering hadir dalam bentuk topi baseball atau dad cap dengan potongan yang nyaman dan desain minimalis. Warna-warna yang sering digunakan termasuk nuansa klasik seperti hitam, putih, biru, dan abu-abu, serta kombinasi warna yang sesuai dengan merek New Balance.', 25000, 12, '08b5c295e6ccf9f6bac89817124fd1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk_galeri`
--

DROP TABLE IF EXISTS `produk_galeri`;
CREATE TABLE IF NOT EXISTS `produk_galeri` (
  `id_produk_galeri` int(10) NOT NULL AUTO_INCREMENT,
  `id_produk` int(10) NOT NULL,
  `galeri` text NOT NULL COMMENT 'base64',
  PRIMARY KEY (`id_produk_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_galeri`
--

INSERT INTO `produk_galeri` (`id_produk_galeri`, `id_produk`, `galeri`) VALUES
(2, 2, 'c6921374221fc84d5ae9d6846caa88.png'),
(3, 2, '014db75c2a0a5add2a2ca80b33fe3a.png'),
(4, 7, 'b00b94a66d1070880f91920f3dba54.jpg'),
(5, 7, '424e73440fd493b7323eff95c5afcd.jpg'),
(6, 7, '30500d5158e47585394d54ea90ea0d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk_varian`
--

DROP TABLE IF EXISTS `produk_varian`;
CREATE TABLE IF NOT EXISTS `produk_varian` (
  `id_produk_varian` int(10) NOT NULL AUTO_INCREMENT,
  `id_produk` int(10) NOT NULL,
  `grup_variant` varchar(30) NOT NULL COMMENT 'Warna, Ukuran',
  `value_variant` text NOT NULL COMMENT 'ex: Merah, Kuning, Hijau, 45, 44',
  PRIMARY KEY (`id_produk_varian`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_varian`
--

INSERT INTO `produk_varian` (`id_produk_varian`, `id_produk`, `grup_variant`, `value_variant`) VALUES
(1, 4, 'Warna', 'Merah'),
(2, 5, 'Warna', 'Merah'),
(3, 4, 'Warna', 'Merah'),
(4, 4, 'Warna', 'Biru'),
(6, 5, 'Warna', 'Biru'),
(9, 4, 'Warna', 'Ungu'),
(10, 5, 'Warna', 'Ungu'),
(11, 5, 'Ukuran', '40'),
(12, 5, 'Ukuran', '42'),
(13, 5, 'Ukuran', '43'),
(14, 7, 'Ukuran', '20'),
(15, 7, 'Ukuran', '30'),
(16, 7, 'Ukuran', '40'),
(17, 14, 'Warna', 'Merah');

-- --------------------------------------------------------

--
-- Table structure for table `reting`
--

DROP TABLE IF EXISTS `reting`;
CREATE TABLE IF NOT EXISTS `reting` (
  `id_reting` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(10) NOT NULL,
  `id_rincian` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `id_akses` int(10) NOT NULL,
  `reting` int(10) NOT NULL,
  PRIMARY KEY (`id_reting`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reting`
--

INSERT INTO `reting` (`id_reting`, `id_transaksi`, `id_rincian`, `id_produk`, `id_akses`, `reting`) VALUES
(2, 6, 7, 3, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reting_rank`
--

DROP TABLE IF EXISTS `reting_rank`;
CREATE TABLE IF NOT EXISTS `reting_rank` (
  `id_reting` int(20) NOT NULL AUTO_INCREMENT,
  `id_produk` int(20) DEFAULT NULL,
  `sum_reting` int(20) DEFAULT NULL,
  `frq_reting` int(20) DEFAULT NULL,
  `ave_reting` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_reting`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reting_rank`
--

INSERT INTO `reting_rank` (`id_reting`, `id_produk`, `sum_reting`, `frq_reting`, `ave_reting`) VALUES
(1, 2, 0, 0, 0),
(2, 3, 1, 1, 1),
(3, 4, 0, 0, 0),
(4, 5, 0, 0, 0),
(5, 6, 0, 0, 0),
(6, 7, 0, 0, 0),
(7, 8, 0, 0, 0),
(8, 9, 0, 0, 0),
(9, 10, 0, 0, 0),
(10, 11, 0, 0, 0),
(11, 12, 0, 0, 0),
(12, 13, 0, 0, 0),
(13, 14, 0, 0, 0),
(14, 15, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rincian`
--

DROP TABLE IF EXISTS `rincian`;
CREATE TABLE IF NOT EXISTS `rincian` (
  `id_rincian` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(10) DEFAULT NULL,
  `id_akses` int(10) DEFAULT NULL,
  `id_produk` int(10) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL COMMENT 'sudah dipotong diskon jika ada',
  `qty` int(10) NOT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_rincian`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian`
--

INSERT INTO `rincian` (`id_rincian`, `id_transaksi`, `id_akses`, `id_produk`, `harga`, `qty`, `jumlah`, `keterangan`) VALUES
(6, 5, 25, 5, 672000, 1, 672000, '[{\"grup_variant\":\"Warna\",\"value_variant\":\"Merah\"},{\"grup_variant\":\"Ukuran\",\"value_variant\":\"Merah\"}]'),
(7, 6, 25, 3, 2200000, 4, 8800000, ''),
(8, 7, 26, 6, 50000, 2, 100000, ''),
(9, 0, 26, 3, 2200000, 1, 2200000, '');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

DROP TABLE IF EXISTS `testimoni`;
CREATE TABLE IF NOT EXISTS `testimoni` (
  `id_testimoni` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(10) NOT NULL,
  `id_akses` int(10) NOT NULL,
  `testimoni` text NOT NULL,
  `saran_kritik` text NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'Draft/Publish',
  PRIMARY KEY (`id_testimoni`),
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_akses` (`id_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_transaksi`, `id_akses`, `testimoni`, `saran_kritik`, `status`) VALUES
(2, 6, 25, 'pelayanan sangat cepat, customer service sangat membantu dan barang sesuai deskripsi', 'Semoga madu sport dapat mempertahankan kualitas pelayanannya', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses` int(10) DEFAULT NULL,
  `id_ongkir` int(10) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nama_pelanggan` text,
  `alamat` text,
  `metode_pembayaran` text,
  `kurir` text,
  `subtotal` int(20) DEFAULT NULL,
  `ongkir` int(20) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `status_pembayaran` varchar(20) DEFAULT NULL COMMENT 'Pending, Lunas, Expired',
  `status_pengiriman` varchar(20) DEFAULT NULL COMMENT 'Pending, Dikirim, Dikembalikan, Sampai Tujuan, Selesai',
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_akses`, `id_ongkir`, `tanggal`, `nama_pelanggan`, `alamat`, `metode_pembayaran`, `kurir`, `subtotal`, `ongkir`, `jumlah`, `status_pembayaran`, `status_pengiriman`) VALUES
(5, 25, 7, '2023-11-04 01:55:46', 'Windy Yanuariska', 'Jalan RE Martadinata no 14', 'Bank Rakyat Indonesia (BRI)', 'JNE', 672000, 15000, 687000, 'Lunas', 'Selesai'),
(6, 25, 8, '2023-11-04 04:48:03', 'Windy Yanuariska', 'Jalan', 'Bank Bukopin', 'JNE', 8800000, 1000, 8801000, 'Lunas', 'Selesai'),
(7, 26, 8, '2023-11-07 01:14:34', 'Santi Nursari', 'Dusun Kliwon RT22 RW12', 'Bank Rakyat Indonesia (BRI)', 'JNE', 100000, 1000, 101000, 'Lunas', 'Dikirim');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
