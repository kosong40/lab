-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Apr 2018 pada 02.03
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_lab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `user`, `password`) VALUES
(1, 'Admin', 'admin', '550e1bafe077ff0b0b67f4e32f29d751'),
(2, 'Bukan Admin Biasa', 'XXX', '550e1bafe077ff0b0b67f4e32f29d751');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stok` int(3) NOT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `merk` varchar(40) DEFAULT NULL,
  `keterangan` text,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id`, `nama`, `stok`, `satuan`, `merk`, `keterangan`, `gambar`) VALUES
(1001, 'Arduino Uno', 8, 'Buah', 'Arduino', '2 Rusak', 'http://127.0.0.1:8000/img/515b4656ce395f8a38000000.png'),
(1002, 'Sensor sharp', 1, 'Buah', '', NULL, 'http://127.0.0.1:8000/img/00242-1.jpg'),
(1003, 'Sensor Ping', 2, 'Buah', '', NULL, 'http://127.0.0.1:8000/img/parallax-ping-ultrasonic-sensor-1.jpg'),
(1004, 'Sensor PIR', 0, 'Buah', '', NULL, 'http://127.0.0.1:8000/img/PIR Sensor.jpg'),
(1005, 'Remote control 6 chanel', 8, 'Unit', 'Hobby King', '', NULL),
(1006, 'GPS reicever', 3, 'Buah', 'Parallax', '', NULL),
(1007, 'Robot ARM', 4, 'Unit', 'Parallax', '', NULL),
(1008, 'Resistor 120 Ohm', 4, 'Pack', '', '1 Pack 200 Buah', NULL),
(1009, 'Resistor 470 Ohm', 2, 'Pack', '', '1 Pack 500 Buah', NULL),
(1010, 'Resistor  390 Ohm', 1, 'Pack', '', '1 Pack 500 Buah', NULL),
(1011, 'Resistor 4700 Ohm', 2, 'Pack', '', '1 Pack 500 Buah', NULL),
(1012, 'Resistor 10 Kilo Ohm', 2, 'Pack', '', '1 Pack 500 Buah', NULL),
(1013, 'Capasitor 100 PF', 1, 'Pack', '', '1 Pack 1000 Buah', NULL),
(1014, 'Capasitor 22 PF', 6, 'Pack', '', '1 Pack 100 Buah', NULL),
(1015, 'Capasitor 0.1 OhmF', 50, 'Buah', '', '', NULL),
(1016, 'IC TSL. 230', 9, 'Buah', '', '', NULL),
(1017, 'IC HD74LS21P', 20, 'Buah', '', '', NULL),
(1018, 'IC HD74LS138P', 20, 'Buah', '', '', NULL),
(1019, 'IC HD74LS20P', 20, 'Buah', '', '', NULL),
(1020, 'IC HD74LS04P', 20, 'Buah', '', '', NULL),
(1021, 'IC HD74LS32P', 20, 'Buah', '', '', NULL),
(1022, 'IC HD74LS10P / SN74LS10N\n', 20, 'Buah', '', '', NULL),
(1023, 'IC HD74LS08P', 20, 'Buah', '', '', NULL),
(1024, 'IC HD74LS32P', 20, 'Buah', '', '', NULL),
(1025, 'IC HD74LS11P  /DM74LS11N\n', 20, 'Buah', '', '', NULL),
(1026, 'IC HD74LS00P', 24, 'Buah', '', '', NULL),
(1027, 'IC SN74LS47N', 20, 'Buah', '', '', NULL),
(1028, 'IC HD74LS148P', 7, 'Buah', '', '', NULL),
(1029, 'IC SN74LS175N', 20, 'Buah', '', '', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `alatview`
--
CREATE TABLE `alatview` (
`id` int(11)
,`status` varchar(20)
,`nim` varchar(15)
,`nama` varchar(50)
,`tgl_pinjam` date
,`tgl_kembali` date
,`keterangan` text
,`nama_alat` varchar(200)
,`kegunaan` varchar(20)
,`jumlah` int(4)
,`no_hp` varchar(14)
,`alamat` text
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id`, `username`, `nama`, `status`) VALUES
(1, '', '', 'belum'),
(2, '21120115120039', 'Muchammad Dwi Cahyo Nugroho', 'sudah'),
(3, '', '', 'belum'),
(4, '', '', 'belum'),
(5, '', '', 'belum'),
(6, '', '', 'belum'),
(7, '', '', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE `peminjam` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '7b9a5e072236e44339d9b0087a6d0ed2',
  `no_hp` varchar(14) DEFAULT NULL,
  `alamat` text,
  `foto` varchar(255) DEFAULT NULL,
  `ktm` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`id`, `nama`, `username`, `password`, `no_hp`, `alamat`, `foto`, `ktm`, `status`) VALUES
(1, 'Lian Cahyo Wijaya', '21120115120001', 'aea25e05de8d4224bea097fa7131e64b', '085732691476', 'Baskoro raya no 61', NULL, NULL, 'offline'),
(2, 'Nur Kholid', '21120115120002', '7b9a5e072236e44339d9b0087a6d0ed2', '-', '-', NULL, NULL, 'offline'),
(3, 'Minarti Arthaulina Tarigan', '21120115120003', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(4, 'Ghiffari Zaka', '21120115120004', '0a435b39cdd5d5d773044488fbedc9db', '082242124126', 'banjarsari', NULL, NULL, 'offline'),
(5, 'Ferry Chaerul Landani', '21120115120005', '7b9a5e072236e44339d9b0087a6d0ed2', '-', '-', NULL, NULL, 'offline'),
(6, 'Oki Winarto', '21120115120006', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(7, 'Alfi Moch Agus Firdaus', '21120115120007', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(8, 'Muhammad Afwan', '21120115120008', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(9, 'Pandu Kent Elian', '21120115120009', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(10, 'Septiridho Putra', '21120115120010', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(11, 'Rachmat Agung Pambudi', '21120115120011', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(12, 'Latipatul Hilmi', '21120115120012', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(13, 'Melinda Sari', '21120115120013', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(14, 'Hazmi Adlan Hawari', '21120115120014', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(15, 'Faujan Adhim', '21120115120015', '7b9a5e072236e44339d9b0087a6d0ed2', '-', 'Tirtasari', NULL, NULL, 'offline'),
(16, 'Romadoni Kevin Julian', '21120115120016', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(17, 'Hilda Nur Safitri', '21120115120017', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(18, 'Yoki Ferdinand Situmorang', '21120115120018', '7b9a5e072236e44339d9b0087a6d0ed2', '345', 'DFG', NULL, NULL, 'offline'),
(19, 'Difka Satria Akbar', '21120115120019', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(20, 'Ismarniati', '21120115120020', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(21, 'Nurinda Ramadhanty Maula', '21120115120021', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(22, 'Dea Ismy Soraya Isabella', '21120115120022', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(23, 'Safira Nurmon Anggerda', '21120115120023', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(24, 'Windi Putri Nur Aini', '21120115120024', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(25, 'Mas Adam Syah Nuhandika', '21120115120025', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(26, 'Khairuzzain Shofar', '21120115120026', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(27, 'Amaniyya Addini Hanifah', '21120115120027', '7b9a5e072236e44339d9b0087a6d0ed2', '0987654321', 'durian utara', NULL, NULL, 'offline'),
(28, 'Ayu Sridevi Samosir', '21120115120028', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(29, 'Abigail Adiwijna Mercy', '21120115120029', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(30, 'Pradipta Sekar Ayu Putri W.', '21120115120030', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(31, 'Dhiya Firdaus Padiya Arridho', '21120115120031', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(32, 'Rahayu Putri Pertiwi', '21120115120032', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(33, 'Dhesti Rosytawati Rahayu', '21120115120033', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(34, 'Firman Sadewo Priatmadji', '21120115120034', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(35, 'Najakhul Fahmi', '21120115120035', '7b9a5e072236e44339d9b0087a6d0ed2', '-', '-', NULL, NULL, 'offline'),
(36, 'Fajariah Fitriani Nasution', '21120115120036', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(37, 'Masadi Naim', '21120115120037', '7b9a5e072236e44339d9b0087a6d0ed2', '-', 'Magelang', NULL, NULL, 'offline'),
(38, 'Agung Pasca Mukti', '21120115120038', '7b9a5e072236e44339d9b0087a6d0ed2', '-', '-', NULL, NULL, 'offline'),
(39, 'Muchammad Dwi Cahyo Nugroho', '21120115120039', '7b9a5e072236e44339d9b0087a6d0ed2', '082326464265', 'Jalan Sipodang No 8 Bulusan Tembalang Semarang', 'http://127.0.0.1:8000/img/21120115120039.jpg', 'http://127.0.0.1:8000/img/IMG_20170413_0018.jpg', 'offline'),
(40, 'Aswin Bahar Setiawan', '21120115120040', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(41, 'Efata Stefani Regitasari', '21120115120041', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(42, 'Nadya Putri Elfiani', '21120115120042', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(43, 'Yosua Audi Nugraha', '21120115120043', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(44, 'R. Raka Wijaya Purbangkara', '21120115120044', '7b9a5e072236e44339d9b0087a6d0ed2', '-', '-', NULL, NULL, 'offline'),
(45, 'Kewes Uswah Anggraeni', '21120115120045', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(46, 'Handi Alfian', '21120115120046', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(47, 'Elia Ramadhini', '21120115120047', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(48, 'Nur Mishbah Hayat', '21120115130048', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(49, 'Tito Anugerah Maharizky', '21120115130049', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(50, 'Agung Eka Saputra', '21120115130050', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(51, 'Elfa Aufa Nida', '21120115130051', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(52, 'Mukhlish Abdul Aziz', '21120115130052', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(53, 'Ardianto Kurniawan', '21120115130053', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(54, 'Mochamad Fandi', '21120115130054', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(55, 'Pramudya Erviansyah', '21120115130055', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(56, 'Hartina Hiromi Satyanegara', '21120115140056', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(57, 'Mohhamad Donny Prasetyo', '21120115130057', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(58, 'Yosephine Novianti', '21120115140058', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(59, 'Sendy Wijayanto', '21120115140059', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(60, 'Arendarama Danuarta', '21120115130060', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(61, 'Muhammad Rifai', '21120115130061', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(62, 'Fakhry Fauzan', '21120115140062', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(63, 'Muhammad Adinugroho', '21120115140063', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(64, 'Muhammad Nuril Oktavian', '21120115130064', '7b9a5e072236e44339d9b0087a6d0ed2', '-', '-', NULL, NULL, 'offline'),
(65, 'Raisya Rahmah Noor', '21120115140065', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(66, 'Mario Namora', '21120115140066', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(67, 'Reza Syahputra Pakpahan', '21120115130067', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(68, 'Dhandy Junanto', '21120115130068', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(69, 'Moh. Aufal Marom Arrozi', '21120115130069', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(70, 'Alfalah Okdinda', '21120115130070', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(71, 'Zais Handika Murdhani', '21120115130071', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(72, 'Bintang Krisna Primawan', '21120115140072', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(73, 'Ardelia Puri Paramitha', '21120115130073', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(74, 'Harits Fathuddin', '21120115130074', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(75, 'Agung Wirayudha', '21120115140075', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(76, 'Iqbal Iradana', '21120115140076', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(77, 'Koko Fajar Nurcahyo', '21120115140077', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(78, 'Deo Oktiadi', '21120115130078', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(79, 'Faris Lukman Nuranto', '21120115140079', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(80, 'Wahyu Wijaya Kusuma', '21120115140080', '7b9a5e072236e44339d9b0087a6d0ed2', '-', '-', NULL, NULL, 'offline'),
(81, 'Bashit Bagas Samodra', '21120115130081', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(82, 'Wildan Budi Bawono', '21120115130082', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(83, 'Bayu Dewantara', '21120115140083', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(84, 'Nijma Dania Arfadin', '21120115140084', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(85, 'Chasna Banafsaj A', '21120115140085', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(86, 'Alvina Rahmatiana Sari', '21120115130086', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(87, 'Maulida Goldy Firdausi', '21120115140087', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(88, 'Bima Fajar Setiawan', '21120115140088', '7a498e926cd86491b69e10df2f1dd57e', '089610687965', 'Jalan Sendangguwo Selatan', NULL, NULL, 'offline'),
(89, 'Lucky Jalu Harapan', '21120115140089', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(90, 'Vla Cusdi Sibarani', '21120115130090', '7b9a5e072236e44339d9b0087a6d0ed2', '', '', NULL, NULL, 'offline'),
(94, 'Muhammad Hafidz Al Fauzan', '21120116120001', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(95, 'Tengku Kemal Yusron Hasibuan', '21120116120002', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(96, 'Muhammad Rizki Nur Majiid', '21120116120003', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(97, 'Evita Cindy Septiviani', '21120116120004', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(98, 'Guntur Dwi Cahyono', '21120116120005', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(99, 'Monanzarifa Yonanta', '21120116120006', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(100, 'Kornelius Satria Budiyanto', '21120116120007', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(101, 'Agustiawan', '21120116120008', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(102, 'Ahmad Shofie Hilmi', '21120116120009', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(103, 'Mutiara Victorina M.', '21120116120010', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(104, 'Rio Julian Azis Pratama', '21120116120011', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(105, 'Ratna Yuli Himawati', '21120116120012', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(106, 'Hasyim Dahlan Attaufiqi', '21120116120013', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(107, 'Faisal Rizky Rahadian', '21120116120014', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(108, 'Favo Perdana Hadiyanto Saputra', '21120116120015', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(109, 'Amara Ranindhita', '21120116120016', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(110, 'Septi Nurna Alfiani', '21120116120017', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(111, 'Afif Syarifuddin Yahya', '21120116120018', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(112, 'Prawito', '21120116120019', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(113, 'Usman Ralih Muis', '21120116120020', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(114, 'Fitriana Yunita Sari', '21120116120021', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(115, 'Irnawaty Isabella Silalahi', '21120116120022', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(116, 'Edho Sulenda Satrio Pambudi', '21120116120023', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(117, 'Demara Ramadhani', '21120116120024', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(118, 'Busyroo Busyairie', '21120116120025', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(119, 'Muhammad Farrell Denando', '21120116120026', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(120, 'Martin Johan Siagian', '21120116120027', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(121, 'Ahmad Rindhoni', '21120116120028', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(122, 'Laila Nur Aini', '21120116120029', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(123, 'Cindi Aprillianti', '21120116120030', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(124, 'Nisrina Fauziah', '21120116120031', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(125, 'Primus Widya Prabandono', '21120116120032', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(126, 'Muhammad Ikhsan', '21120116120033', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(127, 'Ratri Kusumastuti', '21120116140034', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(128, 'Alfian Aulia Firdaus', '21120116130035', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(129, 'Muhammad Muharrik Al-islamy', '21120116130036', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(130, 'Akhmad Ali Sajidin', '21120116130037', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(131, 'Irvan Renata', '21120116140038', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(132, 'Tendi Nugeraha Wijaya', '21120116140039', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(133, 'Sarwono Alfian H Nadeak', '21120116130040', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(134, 'Muhamad Khoderi', '21120116130041', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(135, 'Vania Ariyani Prilia Putri', '21120116130042', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(136, 'Herjuno Pratomo', '21120116130043', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(137, 'Veronika Putri Indah Bestari', '21120116130044', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(138, 'Hisyam Pohan', '21120116140045', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(139, 'Nadia Febrianita Gunarto', '21120116130046', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(140, 'Rena Visi Nuraini', '21120116130047', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(141, 'Fahmi Aziz Trianto', '21120116130048', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(142, 'Muhammad Hafiz Tsalavin', '21120116130049', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(143, 'Wildan Aufa Hanif Bagassurya', '21120116140050', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(144, 'Nadya Arumda', '21120116140051', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(145, 'Muhammad Ja`far Shodiq', '21120116130052', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(146, 'Abda Rafi Hamaminata', '21120116140053', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, 'Kose mbahe', NULL, NULL, 'offline'),
(147, 'Muhamad Dodi Ilyana', '21120116140054', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(148, 'Dimas Nur Ramadhani', '21120116130055', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(149, 'Muhammad Rizki', '21120116130056', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(150, 'Zainiyatus Sa`adah', '21120116130057', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(151, 'Saskia Agustin Leonydytia', '21120116140058', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(152, 'Afif Wicaksono', '21120116130059', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(153, 'Rio Kisna Eka Putra', '21120116130060', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(154, 'Yogie Meysa Tama', '21120116130061', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(155, 'Fahmi Maghrizal Mochtar', '21120116140062', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(156, 'Faturachman Asyari Oktavian', '21120116130063', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(157, 'Muhammad Aditya Nugraha', '21120116140064', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(158, 'Adam Maulidani', '21120116130065', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(159, 'Khoirunisa Widyaningrum', '21120116130066', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(160, 'Fajar Rizki Nahari', '21120116130067', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(161, 'Fanny Hasbi', '21120116140068', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(162, 'Rio Lutfi Adipradana', '21120116140069', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(163, 'Azizah Kamalia', '21120116140070', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(164, 'Agyan Atma Villantya', '21120116140071', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(165, 'Dimas Luhur Sulistya', '21120116140072', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(166, 'Muhammad Refi', '21120116130073', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(167, 'Intishar Nur Annisa', '21120116140074', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(168, 'Ade Saputra', '21120116130075', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(169, 'Daud Dimas Prasetyo', '21120116130076', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(170, 'Kelvin John Ringoringo', '21120116140077', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(171, 'Jeremy Karisma Mesalinri', '21120116140078', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(172, 'Sepvia Wida Setya Murti', '21120116140079', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(173, 'Rahardian Yogatama', '21120116130080', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(174, 'Ilham Putra Arifa', '21120116140081', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(175, 'Muhammad Richie Assariy', '21120116130082', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(176, 'Malik Abdurrahman Hakim', '21120116140083', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(177, 'Saifullah Fikri', '21120116130084', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(178, 'Harry Satria', '21120116140085', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(179, 'Andreas Irvan Saputra', '21120116130086', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(180, 'Muhammad Taqiyuddin', '21120116140087', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(181, 'Atha Dwira Perdana', '21120116140088', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(182, 'Amirul Afif Al Qoyyum', '21120116140089', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(183, 'Shela Selviana', '21120114120001', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(184, 'Ardhian Adhi Nugroho', '21120114120002', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(185, 'Reza Fahlevi Panggabean', '21120114120003', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(186, 'Fahrizal Rizqi E', '21120114120004', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(187, 'Mutiarasari Kusuma Putri', '21120114120005', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(188, 'Asrorul Umam', '21120114120006', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(189, 'Muhammad Rizqi', '21120114120007', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(190, 'Arief Nur Prakoso', '21120114120008', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(191, 'Muhammad Burhanudin', '21120114120009', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(192, 'Eka Abid Mahatma', '21120114120010', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(193, 'Muhammad Faishal Fikri', '21120114120011', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(194, 'Yanuar Akbar Teguh Putranto', '21120114120012', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(195, 'Akbar Yazid Syahuma', '21120114120013', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(196, 'Refnaldi Atmaja', '21120114120014', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(197, 'Muhammad Hendra Setiawan', '21120114120015', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(198, 'Gustian Ramadhika', '21120114120016', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(199, 'Taufiq Nur Fauzi', '21120114120017', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(200, 'Ivani Anggraini Nadeak', '21120114120018', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(201, 'Prisma Wahyu Ardana', '21120114120019', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(202, 'Harliyan Tri Mardian', '21120114120020', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(203, 'Fajriani Kusnul Diniyah', '21120114120021', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(204, 'Faza Abdani Auni Robbi', '21120114120022', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(205, 'Herdianto Setyo N', '21120114120023', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(206, 'Hammas Zulfikar Ikhsan', '21120114120024', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(207, 'Arif Firdana', '21120114120025', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(208, 'Fidel Yabes Exaudio Sasiang', '21120114120026', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(209, 'Kukuh Riandika Widiar', '21120114120027', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(210, 'Nizar Rahman Hidayat', '21120114120028', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(211, 'Diovany Bryan Gunawan', '21120114120029', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(212, 'Michael S. M. Pakpahan', '21120114120030', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(213, 'Rizki Putra Perdana', '21120114120031', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(214, 'Risyal Febrianto', '21120114120032', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(215, 'Zakky Ainun Najich', '21120114120033', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(216, 'Ikhsan Chakim', '21120114120034', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(217, 'Niken Dwi Setiyaningrum', '21120114120035', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(218, 'Tegar Widya Pranata', '21120114120036', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(219, 'Ajik Ulinuha', '21120114120037', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(220, 'Bonifasius Edo Sudigdo', '21120114120038', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(221, 'Wahyu Septiyanto', '21120114120039', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(222, 'Ryan Jalu Andana', '21120114120040', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(223, 'Ghani Heryanto Sukmantara', '21120114120041', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(224, 'Tyas Panorama Nan Cerah', '21120114120042', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(225, 'Aldhi Sofyan Dwi Aryarso', '21120114120043', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(226, 'Meila Isna Riyanti', '21120114120044', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(227, 'Anjar Nugroho', '21120114120045', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(228, 'Tommy Dedy Aritonang', '21120114120046', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(229, 'Muhammad Ulil Albab', '21120114120047', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(230, 'Mukjizat Brilianto', '21120114120048', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(231, 'Rizki Oktavia Ningrum', '21120114120049', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(232, 'Nurdiansya Waruwu', '21120114120050', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(233, 'Mohammad Irfan Setiawan', '21120114120051', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(234, 'Irvan Effendy', '21120114120052', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(235, 'Rifkhi Ilham', '21120114120053', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(236, 'Ahmad Nur Alfihadhi', '21120114120054', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(237, 'Nanda Mahdiaritama Basuki', '21120114140055', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(238, 'Taqiyuddin Ja`far', '21120114130056', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(239, 'Sarifa Isna Fitria Ali', '21120114140057', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(240, 'Galang Firza Damara', '21120114130058', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(241, 'Neindra Okvialdy N', '21120114140059', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(242, 'Amri Luthfi', '21120114130060', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(243, 'M Ihaab Munabbih', '21120114130061', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(244, 'Yusuf Bachtiar', '21120114130062', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(245, 'Rizky Pratama Nugroho', '21120114130063', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(246, 'Elvine Putra K', '21120114130064', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(247, 'Iqbal Nur Fadhillah', '21120114140065', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(248, 'Al Arthur Faizal', '21120114130066', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(249, 'Annas Setiawan', '21120114130067', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(250, 'Jazaak Firdaus Syafaat', '21120114140068', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(251, 'Yusuf Abdul Hakim', '21120114130069', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(252, 'Nanda Maulida H U', '21120114130070', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(253, 'Annisa Rahmawati', '21120114130071', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(254, 'Christopher', '21120114130072', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(255, 'Muhammad Alkautsar Virzawan', '21120114140073', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(256, 'Amien Kurniawan', '21120114140074', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(257, 'Dannior Rangga Pratama', '21120114140075', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(258, 'Ilmam Fauzi H A', '21120114130076', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(259, 'Theo Afianto', '21120114130077', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(260, 'Paramadita Hantoro', '21120114140078', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(261, 'Muhammad Angga Prasetyo', '21120114140079', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(262, 'Rafly Anditya Mukti', '21120114130080', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(263, 'Moh Fajrul Hakim', '21120114130081', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(264, 'Ardian Pradipta', '21120114130082', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(265, 'Wenny Ty Situmorang', '21120114140083', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(266, 'Bryan Pratisia', '21120114140084', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(267, 'Nusa Gilang Harda Kusuma', '21120114130085', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(268, 'Siti Lina Suryaningsih', '21120114130086', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(269, 'Mahesta Yudistira', '21120114130087', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(270, 'Ayodya Alian Purba', '21120114130088', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(271, 'Destia Arti Wahyu H', '21120114130089', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(272, 'Ramoti Yob Silalahi', '21120114130090', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(273, 'Rizky Randa Ismail', '21120114130091', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(274, 'Edsar Imantaka L', '21120114130092', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(275, 'Fachreza Adhitya Dharmawan', '21120114140093', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(276, 'Dwi Yulianto', '21120114130094', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(277, 'Ginanjar Hamid Wiryawan', '21120114140095', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(278, 'Adira Sari Pranasti', '21120114140096', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(279, 'Melia Prisca Hapsari', '21120114130097', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(280, 'Richard Dwi Olympus Augustinus', '21120114140098', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(281, 'Maria Veni Sancti Waemame', '21120114140099', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(282, 'Muhammad Faishal C', '21120114130100', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(283, 'Yuliana Nur Aini', '21120114140101', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(284, 'Naufal Abid Izzati', '21120114140102', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(285, 'Dery Try Wicaksono', '21120114130103', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(286, 'Auzan Touviandi', '21120114140104', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(287, 'Rizky Faturachman', '21120114140105', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(288, 'Indra Zaylana', '21120114130106', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(289, 'Kholid Wisnu Pratitis', '21120114140107', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(290, 'Alinda Alfiyani', '21120114140108', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(291, 'Aris Munandar', '21120114130109', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(292, 'Sandy Bayu Aji', '21120114130110', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(293, 'Alip Hadi Riski', '21120113120001', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(294, 'M. Rizky Rafsanjani', '21120113120002', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(295, 'Indah Pratiwi', '21120113120003', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(296, 'Rivan Apriyantoro', '21120113120004', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(297, 'Sandy Dwi Laksana Putra', '21120113120005', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(298, 'Piter Hartato', '21120113120006', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(299, 'Esthi Novianti', '21120113120007', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(300, 'Anisa Aulia Ardi', '21120113120008', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(301, 'Feliks Novianus Harsono', '21120113120009', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(302, 'Bella Maulia Indah Kurniawati', '21120113120010', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(303, 'Pandu Bintang Pratama', '21120113120011', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(304, 'Abi Mestu Yudansha', '21120113120012', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(305, 'Hasan Asyrofi', '21120113120013', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(306, 'Sri S.y. Wulandari Simbolon', '21120113120014', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(307, 'Dean Pandu Eko Sapto', '21120113120015', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(308, 'Mochamad Riza Alfiana', '21120113120016', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(309, 'Ryan Adhi Nugraha', '21120113120017', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(310, 'Kharisma Cipta Mulia', '21120113120018', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(311, 'Afrizal Maulana', '21120113120019', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(312, 'Ganang Ery Putranto', '21120113120020', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(313, 'Muhammad Fauzi', '21120113120021', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(314, 'Yusuf Nugrahanto', '21120113120022', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(315, 'Ibrahim Kholil Rahman', '21120113120023', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(316, 'Meciridayani', '21120113120024', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(317, 'Armely Naputri', '21120113120025', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(318, 'Muhammad Syahrul Ihsan', '21120113120026', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(319, 'Kuncoro Galih Gemilang', '21120113120027', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(320, 'Khothifatul Faizati Affa', '21120113120028', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(321, 'Muhammad Aditya Miftahul Rifki', '21120113120029', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(322, 'Satria Fadhil Ardika', '21120113120030', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(323, 'Fajar Riansyah', '21120113120031', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(324, 'Olivia Wardhani', '21120113120032', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(325, 'Septimanda Arianno', '21120113120033', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(326, 'Ba''tiar Afas Rahmamulia', '21120113120034', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(327, 'Muh. Takdir Adhi Saputro', '21120113120035', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(328, 'Rizal Luwi Pambudi', '21120113120036', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(329, 'Prasidya Bagaskara', '21120113120037', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(330, 'Mohammad Fahmi Maulana', '21120113120038', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(331, 'Trias Fakumaprita', '21120113120039', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(332, 'Erisa Dian Ayu Ps', '21120113120040', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(333, 'Enie Ria Puspita', '21120113120041', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(334, 'Hariyanto Lukman', '21120113120042', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(335, 'Mahfudhotul Khasanah', '21120113120043', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(336, 'Arif Rahman Hakim', '21120113120044', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(337, 'Surya Anugrah Dwi Oktana', '21120113120045', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(338, 'Angga Puput Saputra', '21120113120046', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(339, 'Moh Alif Basthomi', '21120113120047', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(340, 'Agil Nuruzzaman', '21120113120048', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(341, 'Inmas Al Aziz Budiman', '21120113120049', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(342, 'Rizkika Aprilisa', '21120113120050', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(343, 'Amanda Nurfachmia', '21120113120051', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(344, 'Rahadian Eka Trisna', '21120113120052', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(345, 'Annaz Bagas Rivaldi', '21120113120053', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(346, 'Chandra Dwi Suryana', '21120113120054', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(347, 'Lelly Ratna Dwi', '21120113120055', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(348, 'Nugroho Dwi Ariansyah', '21120113120056', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(349, 'Rosita Permata Dewi', '21120113120057', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(350, 'Natalia Deviana Widowati', '21120113130058', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(351, 'Rm. Alhakim Tirtarizky Dewansah', '21120113130059', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(352, 'Muhammad Furqon Hakim', '21120113130060', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(353, 'Laila Khoirun Nisa', '21120113130061', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(354, 'Addam Triatmadja P', '21120113130062', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(355, 'Dimas Helmi W', '21120113130063', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(356, 'Ulil Albab Rabbani', '21120113130064', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(357, 'Muchammad Arif P', '21120113130065', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(358, 'Satriajati Ardhenta', '21120113130066', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(359, 'Tirto Wongsodikromo M', '21120113140067', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(360, 'Duta Adicahya Darmawan', '21120113130068', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(361, 'Faizah', '21120113130069', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(362, 'Muhammad Yogi Jefani', '21120113130070', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(363, 'Iqbal Ramdhani', '21120113130071', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(364, 'Haris Asrofi', '21120113130072', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(365, 'Gilang Dhimas Yurista Nugraha', '21120113130073', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(366, 'Reti Septa Saraswati', '21120113140074', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(367, 'Dimas Panji Wibisono', '21120113130075', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(368, 'Muhammad Adrian', '21120113130076', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(369, 'Tri Setyo Okdiyanto', '21120113130077', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(370, 'Argaditya Rahma Sasmita', '21120113130078', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(371, 'Helen Hardiana', '21120113140079', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(372, 'Ammar Fadhil Ahmad', '21120113130080', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(373, 'Eko Prasetyo', '21120113140081', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(374, 'Ilfi A''la Fauzia', '21120113130082', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(375, 'Andra Busra', '21120113130083', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(376, 'Ivan Sanusi', '21120113130084', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(377, 'Kiki Ardiyanti Nofiar', '21120113140085', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(378, 'Adi Fadilah Wijaya', '21120113130086', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(379, 'Ahmad Nizar Shiddiqi', '21120113130087', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(380, 'Gayuh Nurul Huda', '21120113140088', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(381, 'Hardika Gutama', '21120113130089', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(382, 'R. Puntadewa Endra Cahaya', '21120113140090', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(383, 'Nur Hasan Najibullah', '21120113140091', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(384, 'Mahendra Pratito Sulistyo', '21120113140092', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(385, 'Rosyiid Gede Prabowo', '21120113130093', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(386, 'Nur Meyla Jiana', '21120113140094', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(387, 'Mohammad Zuhdi El Fathani', '21120113140095', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(388, 'Delphi Hanggoro', '21120113130096', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(389, 'Baptista Varani Yovie W.n.', '21120113130097', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(390, 'Aditya Rizqi Y', '21120113130098', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(391, 'Muhammad Pranaditta Trahonggo', '21120113140099', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(392, 'Mohamad Yusup Dias Ibrahim', '21120113130100', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(393, 'Erlangga Rizki Wydianto', '21120113130101', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(394, 'Hawaina Alimatussuffa Nora Farda', '21120113130102', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(395, 'Cristy Sekar Herdaningtyas', '21120113130103', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(396, 'Awal Rizqi Rahmawan', '21120113130104', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(397, 'Aditya Rizki Pradana', '21120113130105', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(398, 'Bryan Monang Wiener Samosir', '21120113140106', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(399, 'Alfian Nur Zaman', '21120113130107', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(400, 'Geraldi Byantara Wisesa', '21120117110001', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(401, 'Revin Marthin Junior Gultom', '21120117140001', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(402, 'Nareswari Dyah Puspaningrum', '21120117120002', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(403, 'Imam Ghozali', '21120117140002', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(404, 'Prio Pambudi', '21120117120003', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(405, 'M.risqullah Naufal Y', '21120117140003', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(406, 'Rafli Adhiyaksa Putra', '21120117120004', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(407, 'Agung Budi Prakoso', '21120117140004', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(408, 'Umi Khoiryatin M S', '21120117120005', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(409, 'Farhan Mazario', '21120117140005', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(410, 'Maftukhah Dwi Utami', '21120117120006', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(411, 'Bagaskara Muhammad Noer', '21120117140006', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(412, 'Kukuh Pranata Sugiarto', '21120117120007', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(413, 'M. Rizqi Alfani', '21120117140007', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(414, 'Luqman Setyo Nugroho', '21120117120008', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(415, 'Anggara Diebrata', '21120117140008', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(416, 'Doni Hermawan', '21120117120009', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(417, 'Dita Ananda Elisa Reviana', '21120117140009', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(418, 'Laurensia Divina Dewi Fortuna', '21120117120010', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(419, 'Abbiyu Kirana Distira', '21120117140010', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(420, 'Naufal Muhammad Shafa', '21120117120011', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(421, 'Muhammad Zulfikar Isnanto', '21120117140011', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(422, 'Nanda Hidayatullah Abadi', '21120117120012', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(423, 'Gisza Irsyad Ardhinta', '21120117140012', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(424, 'Mulazi', '21120117120013', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(425, 'Andro Adhita Pratama', '21120117140013', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(426, 'M Irfan Syarif H', '21120117120014', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(427, 'Ara Fasaka Ardanta', '21120117140014', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(428, 'Dimas Putu Gumiwang', '21120117120015', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(429, 'Irgantara Arda Pratama', '21120117140015', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(430, 'Rizky Fajar Nur Pratama', '21120117120016', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline');
INSERT INTO `peminjam` (`id`, `nama`, `username`, `password`, `no_hp`, `alamat`, `foto`, `ktm`, `status`) VALUES
(431, 'Mahani Halwa', '21120117140016', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(432, 'Divianis Oktaviyani', '21120117120017', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(433, 'Yoga Pratama', '21120117140017', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(434, 'Nurhadiyatussholihah', '21120117120018', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(435, 'Moch Chamdan Erbono', '21120117140018', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(436, 'Cakrawati', '21120117120019', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(437, 'Wahyu Aji Sulaiman', '21120117140019', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(438, 'Desy Krisdian Rejo Woro Astuti', '21120117120020', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(439, 'Aryo Anindyo Abhinowo', '21120117140020', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(440, 'Ramadhani Batari Syah N', '21120117120021', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(441, 'Afif Makruf', '21120117140021', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(442, 'Heidi Amellie Ayu Astria', '21120117120022', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(443, 'Elvitro Gumelar Agung', '21120117140022', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(444, 'Heni Nurul Kholifah', '21120117120023', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(445, 'Rama Febriansyah', '21120117140023', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(446, 'Dwi Supardiyono', '21120117120024', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(447, 'Arya Naradana', '21120117140024', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(448, 'Lita Muflikha', '21120117120025', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(449, 'Kurnia Luqman Majid', '21120117140025', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(450, 'Obed Jeck Gredo Tarigan', '21120117120026', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(451, 'Julian Manuel', '21120117140026', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(452, 'Ratna Nurul Fajriya', '21120117120027', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(453, 'Juan Adhiasta Pratama', '21120117140027', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(454, 'Petrick Jubel Eliezer', '21120117120028', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(455, 'Muhammad Hanif Atthariq', '21120117140028', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(456, 'Siskawati Sianipar', '21120117120029', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(457, 'Muhammad Gilang Ramadhan', '21120117140029', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(458, 'Dina Lusiana', '21120117120030', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(459, 'Yudhi Kasih Pasaribu', '21120117140030', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(460, 'M.gesit Alifandi', '21120117120031', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(461, 'Jeremia Joseph P', '21120117140031', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(462, 'Ayu Novita Mei Ulawati', '21120117120032', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(463, 'Muslim', '21120117140032', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(464, 'Fajrul Falah', '21120117120033', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(465, 'Aldio Bangkit Wijaya', '21120117120034', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(466, 'Heidy Novendra', '21120117130035', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(467, 'Salma Asri Ardiningrum', '21120117130036', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(468, 'Fransiska Tebay', '21120117100037', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(469, 'Lisa Ruth Hyarangga', '21120117100038', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(470, 'Grace Keterina Mansumber', '21120117100039', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(471, 'Hizkia Josef Adi Pradana', '21120117130040', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(472, 'Daffa Shidqi Haramaini', '21120117130041', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(473, 'Wahid Dwipa Baskara', '21120117130042', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(474, 'Muhammad Madel Nizam', '21120117130043', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(475, 'Muhammad Afishal Fakhri', '21120117130044', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(476, 'Muhamad Rizal Dwi Cahyo', '21120117130045', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(477, 'Yusuf Valent Adyatomo', '21120117130046', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(478, 'Novazira. A.f', '21120117130047', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(479, 'Nobi Kharisma', '21120117130048', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(480, 'Yarnish Dwi Sagita Fidarliyan', '21120117130049', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(481, 'Oryza Satifha Andesti', '21120117130050', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(482, 'Alvin Elian Abiyyi', '21120117130051', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(483, 'Andhika Fitra Setyawan', '21120117130052', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(484, 'Gagah Pristiyaputra', '21120117130053', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(485, 'Jonathan Imago Dei Gloriawan', '21120117130054', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(486, 'Tedy Anggi Firdaus', '21120117130055', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(487, 'Okky Nurnanda Pangestularas', '21120117130056', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(488, 'Dimas Aldi Kartika', '21120117130057', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(489, 'M. Sayyidus Shaleh Y.', '21120117130058', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(490, 'Tasya Chandra Icha Pratiwi', '21120117130059', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(491, 'Faiz Noerdiyan Cesara', '21120117130060', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(492, 'Fiqri Abdilah', '21120117130061', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(493, 'Stefani Avelliana Megaranti', '21120117130062', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(494, 'Erika Clara Simanjuntak', '21120117130063', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(495, 'Irvan Rifqi Syaefulloh', '21120117130064', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(496, 'Hafizh Gagah Abhipraya', '21120117130065', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(497, 'Daromy Darojat', '21120117130066', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(498, 'Ikhsan Achmad Irsyad', '21120117130067', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(499, 'Dinisya Zalfa Wafi', '21120117130068', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(500, 'Daniel Felix Nainggolan', '21120117130069', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(501, 'Chandra Purnama Wijaya', '21120117130070', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(502, 'Nuur Sirajuddin Faruq', '21120117130071', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(503, 'Kurniasari', '21120117130072', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(504, 'Muhammad Fachrurrozy', '21120117130073', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(505, 'Muhammad Ulul Fadli', '21120117130074', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline'),
(506, 'Afrizal Bagas Santoso', '21120117130075', '7b9a5e072236e44339d9b0087a6d0ed2', NULL, NULL, NULL, NULL, 'offline');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjamalat`
--

CREATE TABLE `pinjamalat` (
  `id` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(200) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `kegunaan` varchar(20) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjamalat`
--

INSERT INTO `pinjamalat` (`id`, `id_alat`, `nama_alat`, `id_peminjam`, `jumlah`, `kegunaan`, `keterangan`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(1, 1004, 'Sensor PIR', 39, 2, 'Tugas Akhir', 'siap', '2018-03-27', '2018-03-27', 'Proses Kembali'),
(3, 1001, 'Arduino Uno', 39, 2, 'Praktikum', 'pinjam', '2018-04-06', '2018-04-14', 'proses');

--
-- Trigger `pinjamalat`
--
DELIMITER $$
CREATE TRIGGER `Kurangi_stok` AFTER INSERT ON `pinjamalat` FOR EACH ROW BEGIN
update alat set stok = stok-NEW.jumlah
where id = NEW.id_alat;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus_barang` AFTER DELETE ON `pinjamalat` FOR EACH ROW begin 
update alat set stok=stok+old.jumlah
where id = old.id_alat;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_barang` AFTER UPDATE ON `pinjamalat` FOR EACH ROW begin 
IF (new.status ='Terima' || new.status ='Batal')
THEN
update alat set stok = stok+old.jumlah
where id = old.id_alat;
END IF;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posting`
--

CREATE TABLE `posting` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `posting` text,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posting`
--

INSERT INTO `posting` (`id`, `judul`, `posting`, `waktu`) VALUES
(212, 'posting 1', '<p><a href="/js/ckeditor/kcfinder/upload/images/232.jpg" target="_self"><img alt="" src="/js/ckeditor/kcfinder/upload/images/232.jpg" style="height:316px; width:400px" /></a></p>\r\n\r\n<p>oke</p>', '2018-02-25 19:58:09'),
(213, 'test', '<p><a href="/js/ckeditor/kcfinder/upload/images/1331-2755.jpg"><img alt="" src="/js/ckeditor/kcfinder/upload/images/1331-2755.jpg" style="height:300px; width:200px" /></a></p>', '2018-03-07 04:54:46'),
(215, 'posting 2', 'isi posting 2', '2018-03-23 02:38:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `praktikum`
--

CREATE TABLE `praktikum` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `keterangan` text,
  `gambar` varchar(225) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'belum aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `praktikum`
--

INSERT INTO `praktikum` (`id`, `nama`, `keterangan`, `gambar`, `status`) VALUES
(1, 'Praktikum Sistem Digital', '<ol>\r\n	<li>Modul I Pengenalan Modul Praktikum</li>\r\n	<li>Modul II Gerbang Logika</li>\r\n	<li>Modul III Perancangan Rangkaian Logika Menggunakan IC TTL</li>\r\n	<li>Modul IV Multiplekser Dan Demultiplekser</li>\r\n	<li>Modul V Multiplekser Dan Ekspansi Shannon</li>\r\n	<li>Modul VI Decoder Dan Encoder</li>\r\n	<li>Modul VII Implemnetasi Digital Menggunakan Multisim</li>\r\n</ol>', 'http://127.0.0.1:8000/img/nx-4i_02.jpg', 'belum aktif'),
(2, 'Praktikum Teknik Interface Peripheral', '<ol>\r\n	<li>Modul I Digital Input Output</li>\r\n	<li>Modul II Interface Keypad dan LCD</li>\r\n	<li>Modul III Pengaplikasian Timer</li>\r\n	<li>Modul IV Interface ADC to LCD Modul</li>\r\n	<li>V Interfacing Motor Servo</li>\r\n</ol>', 'http://127.0.0.1:8000/img/praktikum 1_170312_0008.jpg', 'belum aktif'),
(3, 'Praktikum Mikroprosesor', '<ol>\r\n	<li>Modul I Pengenalan Sofware Proteus</li>\r\n	<li>Modul II Sistem Input &ndash; Output pada Mikroprosesor</li>\r\n	<li>Modul III Sistem Interupsi Eksternal &nbsp;</li>\r\n	<li>Modul IV Timer</li>\r\n	<li>Modul V Komunikasi Serial UART Modul</li>\r\n	<li>VI Display Dot Matrix</li>\r\n</ol>', 'http://127.0.0.1:8000/img/232.jpg', 'aktif'),
(4, 'Praktikum Sistem Digital Lanjut', '<ol>\r\n	<li>Modul I Multiplekser Dan Ekspansi Shanon</li>\r\n	<li>Modul II Enkoder, Decoder Dan Demultiplekser</li>\r\n	<li>Modul III Decoder To 7-Segment</li>\r\n	<li>Modul IV Desain Counter</li>\r\n	<li>Modul V Latch Dan Flip-Flop</li>\r\n</ol>', 'http://127.0.0.1:8000/img/Spartan-3E.jpg', 'belum aktif'),
(5, 'Praktikum Robotika', '<ol>\r\n	<li>Modul I Sensor</li>\r\n	<li>Modul II Aktuator Motor DC dan Servo</li>\r\n	<li>Modul III H-Bridge</li>\r\n	<li>Modul IV Implementasi Sensor dan Aktuator</li>\r\n</ol>', 'http://127.0.0.1:8000/img/515b4656ce395f8a38000000.png', 'belum aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id` int(11) NOT NULL,
  `id_peminjam` varchar(15) NOT NULL,
  `kegunaan` varchar(50) NOT NULL,
  `tema` text,
  `tgl_pinjam` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id`, `id_peminjam`, `kegunaan`, `tema`, `tgl_pinjam`, `keterangan`, `status`) VALUES
(1000, 'ADMIN', 'Praktikum Sistem Digital', 'modul 1', '2018-02-28', 'Pengenalan Modul', 'belum aktif'),
(1001, 'ADMIN', 'Praktikum Sistem Digital', 'modul 2', '2018-03-03', 'Gerbang Logika', 'belum aktif'),
(1002, 'ADMIN', 'Praktikum Sistem Digital', 'modul 3', '2018-03-10', 'Perancangan Rangkaian Logika Menggunakan IC TTL', 'belum aktif'),
(1003, 'ADMIN', 'Praktikum Sistem Digital', 'modul 4', '2018-03-17', 'Multiplekser Dan Demultiplekser', 'belum aktif'),
(1004, 'ADMIN', 'Praktikum Sistem Digital', 'modul 5', '2018-03-24', 'Multiplekser Dan Ekspansi Shannon', 'belum aktif'),
(1005, 'ADMIN', 'Praktikum Sistem Digital', 'modul 6', '2018-03-31', 'Decoder Dan Encoder', 'belum aktif'),
(1006, 'ADMIN', 'Praktikum Sistem Digital', 'modul 7', '2018-02-27', 'Tugas Akhir', 'belum aktif'),
(1007, 'ADMIN', 'Praktikum Teknik Interface Peripheral', 'modul 1', '2018-02-21', 'siap', 'belum aktif'),
(1008, 'ADMIN', 'Praktikum Teknik Interface Peripheral', 'modul 2', '0000-00-00', '-', 'belum aktif'),
(1009, 'ADMIN', 'Praktikum Teknik Interface Peripheral', 'modul 3', '0000-00-00', '-', 'belum aktif'),
(1010, 'ADMIN', 'Praktikum Teknik Interface Peripheral', 'modul 4', '0000-00-00', '-', 'belum aktif'),
(1011, 'ADMIN', 'Praktikum Teknik Interface Peripheral', 'modul 5', '0000-00-00', '-', 'belum aktif'),
(1012, 'ADMIN', 'Praktikum Mikroprosesor', 'modul 1', '2018-03-24', 'DIgital Input Output', 'aktif'),
(1013, 'ADMIN', 'Praktikum Mikroprosesor', 'modul 2', '2018-04-20', 'Inputan', 'aktif'),
(1014, 'ADMIN', 'Praktikum Mikroprosesor', 'modul 3', '0000-00-00', '-', 'aktif'),
(1015, 'ADMIN', 'Praktikum Mikroprosesor', 'modul 4', '0000-00-00', '-', 'aktif'),
(1016, 'ADMIN', 'Praktikum Mikroprosesor', 'modul 5', '0000-00-00', '-', 'aktif'),
(1017, 'ADMIN', 'Praktikum Mikroprosesor', 'modul 6', '0000-00-00', '-', 'aktif'),
(1018, 'ADMIN', 'Praktikum Sistem Digital Lanjut', 'modul 1', '0000-00-00', '-', 'belum aktif'),
(1019, 'ADMIN', 'Praktikum Sistem Digital Lanjut', 'modul 2', '0000-00-00', '-', 'belum aktif'),
(1020, 'ADMIN', 'Praktikum Sistem Digital Lanjut', 'modul 3', '0000-00-00', '-', 'belum aktif'),
(1021, 'ADMIN', 'Praktikum Sistem Digital Lanjut', 'modul 4', '0000-00-00', '-', 'belum aktif'),
(1022, 'ADMIN', 'Praktikum Robotika', 'modul 1', '2018-03-13', 'Aktuator', 'belum aktif'),
(1023, 'ADMIN', 'Praktikum Robotika', 'modul 2', '0000-00-00', '-', 'belum aktif'),
(1024, 'ADMIN', 'Praktikum Robotika', 'modul 3', '2018-02-12', 'Siap', 'belum aktif'),
(1025, 'ADMIN', 'Praktikum Robotika', 'modul 4', '0000-00-00', '-', 'belum aktif'),
(1026, '21120115120039', 'Seminar KP', NULL, '2018-04-16', 'jam 1 siang', 'setuju');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ruangview`
--
CREATE TABLE `ruangview` (
`username` varchar(15)
,`ktm` varchar(255)
,`nama` varchar(50)
,`foto` varchar(255)
,`no_hp` varchar(14)
,`alamat` text
,`kegunaan` varchar(50)
,`tgl_pinjam` date
,`keterangan` text
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `alatview`
--
DROP TABLE IF EXISTS `alatview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `alatview`  AS  select `peminjam`.`id` AS `id`,`pinjamalat`.`status` AS `status`,`peminjam`.`username` AS `nim`,`peminjam`.`nama` AS `nama`,`pinjamalat`.`tgl_pinjam` AS `tgl_pinjam`,`pinjamalat`.`tgl_kembali` AS `tgl_kembali`,`pinjamalat`.`keterangan` AS `keterangan`,`pinjamalat`.`nama_alat` AS `nama_alat`,`pinjamalat`.`kegunaan` AS `kegunaan`,`pinjamalat`.`jumlah` AS `jumlah`,`peminjam`.`no_hp` AS `no_hp`,`peminjam`.`alamat` AS `alamat` from (`peminjam` join `pinjamalat` on((`peminjam`.`id` = `pinjamalat`.`id_peminjam`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `ruangview`
--
DROP TABLE IF EXISTS `ruangview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ruangview`  AS  select `peminjam`.`username` AS `username`,`peminjam`.`ktm` AS `ktm`,`peminjam`.`nama` AS `nama`,`peminjam`.`foto` AS `foto`,`peminjam`.`no_hp` AS `no_hp`,`peminjam`.`alamat` AS `alamat`,`ruang`.`kegunaan` AS `kegunaan`,`ruang`.`tgl_pinjam` AS `tgl_pinjam`,`ruang`.`keterangan` AS `keterangan`,`ruang`.`status` AS `status` from (`peminjam` join `ruang` on((`peminjam`.`username` = `ruang`.`id_peminjam`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_3` (`username`);

--
-- Indexes for table `pinjamalat`
--
ALTER TABLE `pinjamalat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `praktikum`
--
ALTER TABLE `praktikum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1030;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;
--
-- AUTO_INCREMENT for table `pinjamalat`
--
ALTER TABLE `pinjamalat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
--
-- AUTO_INCREMENT for table `praktikum`
--
ALTER TABLE `praktikum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1027;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
