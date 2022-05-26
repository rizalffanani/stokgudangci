-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2022 pada 06.46
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `privatco_stok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `id_assignment` int(11) NOT NULL,
  `id_aunt` int(11) NOT NULL,
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_assignment`
--

INSERT INTO `auth_assignment` (`id_assignment`, `id_aunt`, `item_name`, `user_id`, `created_at`) VALUES
(1, 1, 'Admin', '1', '0000-00-00 00:00:00'),
(2, 2, 'User', '2', NULL),
(3, 2, 'User', '3', NULL),
(12, 2, 'User', '4', '2021-10-04 09:43:31'),
(13, 1, 'Admin', '5', '2021-11-25 23:51:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
--

CREATE TABLE `auth_item` (
  `id_aunt` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tipe` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item`
--

INSERT INTO `auth_item` (`id_aunt`, `name`, `tipe`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 'hak akses admin', NULL, NULL),
(2, 'User', 1, 'hak akses User', NULL, '2021-10-07 09:58:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `idc` int(11) NOT NULL,
  `id_aunt` int(11) NOT NULL,
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item_child`
--

INSERT INTO `auth_item_child` (`idc`, `id_aunt`, `parent`, `child`) VALUES
(1, 1, 'Admin', '15'),
(3, 1, 'Admin', '33'),
(28, 1, 'Admin', '40'),
(43, 2, 'Kasir', '12'),
(45, 1, 'Admin', '49'),
(46, 1, 'Admin', '50'),
(47, 1, 'Admin', '51'),
(50, 1, 'Admin', '54'),
(51, 1, 'Admin', '56'),
(52, 1, 'Admin', '55'),
(53, 1, 'Admin', '57'),
(58, 1, 'Admin', '70'),
(68, 2, 'Kasir', '61'),
(69, 2, 'Kasir', '62'),
(70, 2, 'Kasir', '63'),
(79, 1, 'Admin', '79'),
(80, 6, 'siswa', '12'),
(86, 1, 'Admin', '80'),
(87, 1, 'Admin', '81'),
(90, 3, 'User', '61'),
(91, 3, 'User', '62'),
(92, 3, 'User', '63'),
(93, 1, 'Admin', '74'),
(98, 1, 'Admin', '63'),
(107, 3, 'User', '12'),
(108, 2, 'Kasir', '89'),
(109, 1, 'Admin', '48'),
(110, 1, 'Admin', '3'),
(112, 1, 'Admin', '13'),
(113, 1, 'Admin', '22'),
(114, 1, 'Admin', '41'),
(115, 1, 'Admin', '47'),
(116, 1, 'Admin', '52'),
(117, 1, 'Admin', '61'),
(118, 1, 'Admin', '62'),
(119, 1, 'Admin', '73'),
(120, 1, 'Admin', '78'),
(124, 1, 'Admin', '85'),
(125, 1, 'Admin', '86'),
(138, 1, 'Admin', '102'),
(139, 1, 'Admin', '103'),
(140, 1, 'Admin', '104'),
(142, 1, 'Admin', '106');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `nama_web` varchar(100) NOT NULL,
  `tentang` text NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `wa` varchar(18) NOT NULL,
  `logo_web` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id_info`, `nama_web`, `tentang`, `slogan`, `alamat`, `email`, `wa`, `logo_web`) VALUES
(1, 'PT Digital Technology', 'PT Digital Technology', 'PT Digital Technology', 'PT Digital Technology', 'smk@gmail.com', '0813-3378-2544', '1file_16052022124804.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `deskrip` text NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL,
  `tipe` enum('menu','link','pager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `deskrip`, `icon`, `is_active`, `is_parent`, `tipe`) VALUES
(12, 'Dashboard', 'admin/dashboard', 'hak akses info desa', 'fa fa-laptop', 1, 0, 'link'),
(13, 'Admin', '#', '', 'fa fa-laptop', 1, 0, 'menu'),
(15, 'menu management', 'admin/menu', 'hak akses penuh Controler menu/*', 'fa fa-circle', 1, 13, 'menu'),
(22, 'GENERATOR', 'harviacode', 'hak akses penuh Controler harviacode/*', 'fa fa-circle', 1, 13, 'menu'),
(40, 'data', '#', '', 'fa fa-laptop', 1, 0, 'menu'),
(41, 'Setting', '#', '', 'fa fa-laptop', 1, 0, 'menu'),
(47, 'Auth item', 'admin/auth_item', 'hak akses penuh Controler Auth_item/*', 'fa fa-circle', 1, 13, 'menu'),
(48, 'Auth detail', 'admin/auth_item_child', 'hak akses penuh Controler Auth_item_child/*', 'fa fa-circle', 1, 13, 'menu'),
(52, 'Info Web', 'admin/info', 'hak akses Info', 'fa fa-circle', 1, 41, 'menu'),
(61, 'users/update', 'admin/users/update', 'hak akses aksi users/update/', 'fa fa-laptop', 1, 0, 'pager'),
(62, 'users/update_pass', 'admin/users/update_pass', 'hak akses aksi users/read/', 'fa fa-laptop', 1, 0, 'pager'),
(63, 'users/read', 'admin/users/read', 'hak akses aksi users/read/', 'fa fa-laptop', 1, 0, 'pager'),
(70, 'Pegawai', 'admin/users', 'Data users', 'fa fa-laptop', 1, 13, 'menu'),
(73, 'admin', 'admin', 'routing', '1', 1, 0, 'pager'),
(74, 'Dashboard', 'admin/dashboard', 'hak akses info desa', 'fa fa-laptop', 1, 0, 'link'),
(78, 'tema', 'admin/tema', 'hak akses', 'fa fa-circle', 1, 41, 'link'),
(97, 'tamu', 'admin/tbl_tamu', 'hak akses', 'fa fa-circle', 1, 40, 'link'),
(98, 'Pagu', 'admin/tbl_provinsi', 'hak akses', 'fa fa-circle', 1, 40, 'link'),
(99, 'hotel', 'admin/tbl_hotel', 'hak akses', 'fa fa-circle', 1, 40, 'link'),
(100, 'rekap', 'admin/tbl_rekap', 'hak akses', 'fa fa-circle', 1, 40, 'link'),
(101, 'tbl_rekap_dtl', 'admin/tbl_rekap_dtl', 'hak akses', 'fa fa-circle', 1, 0, 'link'),
(102, 'barang', 'admin/t_barang', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(103, 'barang masuk', 'admin/t_barang_masuk', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(104, 'barang keluar', 'admin/t_barang_keluar', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(105, 'Transaksi', 'admin/transaksi', 'fungsi data Pesanan Tamufungsi data Pesanan Tamu', 'fa fa-laptop', 1, 0, 'menu'),
(106, 'supplier', 'admin/t_supplier', 'hak akses', 'fa fa-laptop', 1, 40, 'link');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tema`
--

CREATE TABLE `tema` (
  `id_tema` int(11) NOT NULL,
  `navbar_bg_color` varchar(100) NOT NULL,
  `navbar_font_color` varchar(100) NOT NULL,
  `sidebar_bg_color` varchar(50) NOT NULL,
  `sidebar_font_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tema`
--

INSERT INTO `tema` (`id_tema`, `navbar_bg_color`, `navbar_font_color`, `sidebar_bg_color`, `sidebar_font_color`) VALUES
(1, 'blue', 'light', 'dark', 'blue');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_barang`
--

CREATE TABLE `t_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(1000) NOT NULL,
  `kategori` varchar(1000) NOT NULL,
  `harga` varchar(100) NOT NULL DEFAULT '0',
  `stok` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_barang`
--

INSERT INTO `t_barang` (`id_barang`, `nama_barang`, `kategori`, `harga`, `stok`) VALUES
(1, 'ANOA robot Vacuum Dry Wet Mop cleaner works with Alexan Google-hitam', 'Smart home series ( original )', '2299000', '0'),
(2, 'Xiaomi Smart Scale -Timbangan Pintar', 'Smart home series ( original )', '259000', '0'),
(3, 'Hannochs Smart LED BULB 9 watt 14 watt RGB CCTT Lampu Pintar Wifi Warna - CCTT, 9 Watt', 'Smart home series ( original )', '60000', '0'),
(4, 'BCARE M5 Speaker Bluetooth 5.0 AUX Handfree Call- abu-abu, Green Army, Navy, Hitam, Merah, Merah muda, Orange, Gold', 'Speaker Bluetooth Original', '149000', '0'),
(5, 'Camino Limited Edition Karakter Series TWS Mini Bluetooth Speaker - INFINITY GAUNT, SPIDERMAN, BLACKPANTHER, BOBA FETT, DART VADER', 'Speaker Bluetooth Original', '990000', '0'),
(6, 'Xiaomi Soundbar Wired and Wireless Bluetooth Audio Cinema TV Sound Bar - Putih, Hitam', 'Speaker Bluetooth Original', '1049000', '0'),
(7, 'Car Air Purifier Notale Portable UVC Plasma HEPA 13', 'Air Purifier and Humidifier', '699000', '0'),
(8, 'Air Purifier NOTALE Trael Series PORTABLE Rechargeable HEPA 13 UV', 'Air Purifier and Humidifier', '899000', '0'),
(9, 'Deerma Standing Humidifier 5L Ultrasonic Pelembab Udara Ruangan', 'Air Purifier and Humidifier', '429000', '0'),
(10, 'Balance Bike Notale Dolemi Premium Ultralight Sepeda Anak - Biru, Putih, Merah muda, Orange, Hijau', 'Baby And Kids', '399000', '0'),
(11, 'Skuter Anak Notale Dolemi Series 5 in 1 Deformation Kids Scooter - Kuning, TANPA Handle, PAKAI Handle', 'Baby And Kids', '749000', '0'),
(12, 'Scooter Kid BEBEHOO 5 in 1 Multifunctional Deformation Kid Skuter Anak - 7 in 1, 5 in 1, TANPA, 5 in 1, PAKAI, Kuning, Merah, Biru Muda, ', 'Baby And Kids', '1029000', '0'),
(13, 'Memory Card Micro Sd 8/ 16/ 32/ 64/ 128 Gb Class 10 Speed 1000 Mbps- TANPA ADAPTOR', 'ACC Action Cam', '57000', '0'),
(14, 'Tas Kacamata Action Camera Hardsell- Tas Kacamata Action Cam', 'ACC Action Cam', '29000', '0'),
(15, 'Paket Aksesoris Action Camera GoPro Xiaomi Yi Mijia Full Set', 'ACC Action Cam', '129000', '0'),
(16, 'Blueido Particle TWS Wireless Bass Earphone 5.0 Earbud Low2 Latency', 'Headset Earphone TWS Orginal', '169000', '0'),
(17, 'MIFA X5 Headset Wireless Earphone TWS Bluetooth 5.0 Airpods', 'Headset Earphone TWS Orginal', '225000', '0'),
(18, 'Bluetooth Wireless Audio Receiver Dongle', 'Headset Earphone TWS Orginal', '49000', '0'),
(19, 'Notale Air Pump Inflator Mini Portable Electric Pompa Ban Mobil Sepeda', 'Sepeda Lipat dan Scooter Dewasa', '399000', '0'),
(20, 'Sepeda Lipat FIIDO M1 Mountain Foldabe EBIKE Hybrid Smart Bicycle MTB', 'Sepeda Lipat dan Scooter Dewasa', '12490000', '0'),
(21, 'Sepeda Scooter Listrik FIIDO Q1 Series 36V 250W 10.4Ah - Hitam, Merah, Hijau, Putih', 'Sepeda Lipat dan Scooter Dewasa', '7990000', '0'),
(22, 'Sepeda Lipat FIIDO D1 Foldable EBIKE Hybrid Smart Bicycle Electric- Putih, Hitam', 'Sepeda Lipat dan Scooter Dewasa', '7490000', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_barang_keluar`
--

CREATE TABLE `t_barang_keluar` (
  `id_bk` int(11) NOT NULL,
  `tgl_bk` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(1000) NOT NULL,
  `jml_bk` varchar(100) NOT NULL,
  `harga_bk` varchar(1000) NOT NULL,
  `sub_total_bk` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_barang_keluar`
--

INSERT INTO `t_barang_keluar` (`id_bk`, `tgl_bk`, `id_barang`, `nama_barang`, `jml_bk`, `harga_bk`, `sub_total_bk`) VALUES
(1, '2022-05-22', 4, 'BCARE M5 Speaker Bluetooth 5.0 AUX Handfree Call- abu-abu, Green Army, Navy, Hitam, Merah, Merah muda, Orange, Gold', '14', '149000', '2086000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_barang_masuk`
--

CREATE TABLE `t_barang_masuk` (
  `id_bm` int(11) NOT NULL,
  `tgl_bm` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(1000) NOT NULL,
  `jml_bm` varchar(100) NOT NULL,
  `harga_bm` varchar(1000) NOT NULL,
  `sub_total_bm` varchar(1000) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_barang_masuk`
--

INSERT INTO `t_barang_masuk` (`id_bm`, `tgl_bm`, `id_barang`, `nama_barang`, `jml_bm`, `harga_bm`, `sub_total_bm`, `id_supplier`) VALUES
(2, '2022-05-23', 1, 'ANOA robot Vacuum Dry Wet Mop cleaner works with Alexan Google-hitam', '12', '2299000', '27588000', 1),
(3, '2022-05-23', 5, 'Camino Limited Edition Karakter Series TWS Mini Bluetooth Speaker - INFINITY GAUNT, SPIDERMAN, BLACKPANTHER, BOBA FETT, DART VADER', '16', '990000', '15840000', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_supplier`
--

CREATE TABLE `t_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_sup` varchar(1000) NOT NULL,
  `tlp_sup` varchar(20) NOT NULL,
  `email_sup` varchar(1000) NOT NULL,
  `alamat_sup` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_supplier`
--

INSERT INTO `t_supplier` (`id_supplier`, `nama_sup`, `tlp_sup`, `email_sup`, `alamat_sup`) VALUES
(1, 'CV wuku', '08383321822', 'alim@gmail.co', 'csdcds, csdcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nokartuidentitas` varchar(30) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nokartuidentitas`, `first_name`, `last_name`, `alamat`, `phone`, `foto`, `active`) VALUES
(1, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '', 'Admin', NULL, '', '081272222545', '1file_09092020122247.png', 1),
(2, 'joni2', 'e10adc3949ba59abbe56e057f20f883e', 'joni@gmail.com', NULL, 'joni', NULL, '', '082139121467', 'default.png', 1),
(3, 'user12', 'e10adc3949ba59abbe56e057f20f883e', 'user12@mail.com', NULL, 'user1', NULL, 'fgfdg', '82139121467', 'default.png', 1),
(4, 'difakusuma', 'e10adc3949ba59abbe56e057f20f883e', 'difakusuma@mail.com', NULL, 'difa kusuma', NULL, '', '089718839814', 'default.png', 1),
(5, 'adam123', 'e10adc3949ba59abbe56e057f20f883e', 'adam123@mail.com', NULL, 'Adam Kharisma', NULL, '', '123', 'default.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_detail`
--

CREATE TABLE `users_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_detail`
--

INSERT INTO `users_detail` (`id`, `ip_address`, `activation_code`, `forgotten_password_time`, `created_on`, `last_login`) VALUES
(1, '109.109.109.109', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, '::1', NULL, NULL, '2021-04-27 12:51:34', NULL),
(3, '203.190.246.243', NULL, NULL, '2021-10-02 22:32:40', NULL),
(4, '114.10.10.52', NULL, NULL, '2021-10-04 09:43:31', NULL),
(5, '112.215.241.118', NULL, NULL, '2021-11-25 23:51:35', NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_akses`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_akses` (
`id` int(11) unsigned
,`username` varchar(100)
,`first_name` varchar(50)
,`name_level` varchar(64)
,`id_aunt` int(11)
,`id_child` int(11)
,`name` varchar(50)
,`link` varchar(50)
,`deskrip` text
,`icon` varchar(30)
,`is_active` int(1)
,`is_parent` int(1)
,`tipe` enum('menu','link','pager')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_auth_child`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_auth_child` (
`idc` int(11)
,`parent` varchar(64)
,`child` varchar(64)
,`name` varchar(50)
,`link` varchar(50)
,`deskrip` text
,`icon` varchar(30)
,`is_parent` int(1)
,`is_active` int(1)
,`tipe` enum('menu','link','pager')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_hk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_hk` (
`id` int(11) unsigned
,`username` varchar(100)
,`id_assignment` int(11)
,`id_aunt` int(11)
,`item_name` varchar(64)
,`created_at` datetime
,`idc` int(11)
,`child` varchar(64)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_akses`
--
DROP TABLE IF EXISTS `view_akses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_akses`  AS SELECT `users`.`id` AS `id`, `users`.`username` AS `username`, `users`.`first_name` AS `first_name`, `auth_item`.`name` AS `name_level`, `auth_item`.`id_aunt` AS `id_aunt`, `menu`.`id` AS `id_child`, `menu`.`name` AS `name`, `menu`.`link` AS `link`, `menu`.`deskrip` AS `deskrip`, `menu`.`icon` AS `icon`, `menu`.`is_active` AS `is_active`, `menu`.`is_parent` AS `is_parent`, `menu`.`tipe` AS `tipe` FROM ((((`users` join `auth_assignment` on(`users`.`id` = `auth_assignment`.`user_id`)) join `auth_item` on(`auth_item`.`id_aunt` = `auth_assignment`.`id_aunt`)) join `auth_item_child` on(`auth_item`.`id_aunt` = `auth_item_child`.`id_aunt`)) join `menu` on(`menu`.`id` = `auth_item_child`.`child`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_auth_child`
--
DROP TABLE IF EXISTS `view_auth_child`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_auth_child`  AS SELECT `auth_item_child`.`idc` AS `idc`, `auth_item_child`.`parent` AS `parent`, `auth_item_child`.`child` AS `child`, `menu`.`name` AS `name`, `menu`.`link` AS `link`, `menu`.`deskrip` AS `deskrip`, `menu`.`icon` AS `icon`, `menu`.`is_parent` AS `is_parent`, `menu`.`is_active` AS `is_active`, `menu`.`tipe` AS `tipe` FROM (`auth_item_child` join `menu` on(`menu`.`id` = `auth_item_child`.`child`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_hk`
--
DROP TABLE IF EXISTS `view_hk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hk`  AS SELECT `users`.`id` AS `id`, `users`.`username` AS `username`, `auth_assignment`.`id_assignment` AS `id_assignment`, `auth_assignment`.`id_aunt` AS `id_aunt`, `auth_assignment`.`item_name` AS `item_name`, `auth_assignment`.`created_at` AS `created_at`, `auth_item_child`.`idc` AS `idc`, `auth_item_child`.`child` AS `child` FROM ((`auth_assignment` join `users` on(`users`.`id` = `auth_assignment`.`user_id`)) join `auth_item_child` on(`auth_item_child`.`id_aunt` = `auth_assignment`.`id_aunt`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`id_assignment`);

--
-- Indeks untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`id_aunt`);

--
-- Indeks untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`idc`);

--
-- Indeks untuk tabel `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indeks untuk tabel `t_barang`
--
ALTER TABLE `t_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `t_barang_keluar`
--
ALTER TABLE `t_barang_keluar`
  ADD PRIMARY KEY (`id_bk`);

--
-- Indeks untuk tabel `t_barang_masuk`
--
ALTER TABLE `t_barang_masuk`
  ADD PRIMARY KEY (`id_bm`);

--
-- Indeks untuk tabel `t_supplier`
--
ALTER TABLE `t_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_detail`
--
ALTER TABLE `users_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  MODIFY `id_assignment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  MODIFY `id_aunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT untuk tabel `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT untuk tabel `tema`
--
ALTER TABLE `tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_barang`
--
ALTER TABLE `t_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `t_barang_keluar`
--
ALTER TABLE `t_barang_keluar`
  MODIFY `id_bk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_barang_masuk`
--
ALTER TABLE `t_barang_masuk`
  MODIFY `id_bm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_supplier`
--
ALTER TABLE `t_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
