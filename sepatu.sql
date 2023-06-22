-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 12:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` text NOT NULL,
  `info_layanan` text NOT NULL,
  `harga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `info_layanan`, `harga`) VALUES
(1, 'Cuci Sepatu', 'Cuci bersih tanpa Noda', '1000'),
(3, 'Servis Sepatu Bolong', 'ini adalah layanan servis sepatu saya gabisa benerin sepatu harga per lubang hehe', '9000'),
(6, 'jasa jemput pacar orang', 'jasa mahal ini', '10000'),
(7, 'sadbaksd', 'jasdjhasfdjhasdfhashfdas', '10000'),
(8, 'asdasdghasd', 'asdfhasgdkfhasdgfjdhasfkgasdfasdgfjhasdgfasdhg', '20000'),
(10, 'aku sayang kamu', 'hahdasgdsjkdashdasjkddfjkhsdhfgsdhfjhdgjk', '37864326');

-- --------------------------------------------------------

--
-- Table structure for table `metode`
--

CREATE TABLE `metode` (
  `id_metode` int(11) NOT NULL,
  `nama_metode` text NOT NULL,
  `no_metode` text NOT NULL,
  `atasnama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode`
--

INSERT INTO `metode` (`id_metode`, `nama_metode`, `no_metode`, `atasnama`) VALUES
(1, 'BCA', '890734823423864', 'anoa ganteng'),
(2, 'BRI', '09734982378463', 'anoa gemasss'),
(5, 'BNI', '52345363547678563', 'Hallo Dek');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `id_metode` int(11) NOT NULL,
  `status_pesanan` text NOT NULL,
  `status_transaksi` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama`, `alamat`, `no_telp`, `id_layanan`, `tgl_pesanan`, `id_metode`, `status_pesanan`, `status_transaksi`, `id_user`, `bukti`) VALUES
(3, 'anoa', 'kwarasan baru', '088215305263', 6, '2023-06-15', 2, 'selesai', 'selesai', 7, 'bukti_648bb84964756.png'),
(55, 'nonono', 'asdasdsa', '076978565646', 10, '2023-06-16', 2, 'diproses', 'diproses', 7, 'bukti_648c3ac4e95d6.png'),
(56, 'ano ganteng', 'kwarasan', '08985319471', 6, '2023-06-10', 2, 'pending', 'pending', 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kualitas` text NOT NULL,
  `ket_review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_user`, `kualitas`, `ket_review`) VALUES
(1, 6, 'bagus', 'bagus banget tekomendasi untuk cuci disini'),
(2, 7, 'cukup', 'oke banget nih'),
(3, 6, 'bagus', 'ini kedua kalinya saya order disini'),
(4, 7, 'bagus', 'tukang kibul'),
(5, 1, 'bagus', 'brisik banget deh'),
(6, 7, 'oke', 'asdaddafdaf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` enum('admin','warga','','') NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `nama`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'anoa ketche sekali', 'anoaaaagantengbangetyakannn@gmail.com'),
(6, 'gemas', '202cb962ac59075b964b07152d234b70', 'warga', 'anoa gemas', 'anoatic@gmail.com'),
(7, 'ano', 'bde9dee6f523d6476dcca9cae8caa5f5', 'warga', 'ano', 'inicaca@gmail.com'),
(8, 'riska', '202cb962ac59075b964b07152d234b70', 'warga', 'riska', 'anonono@gmail.com'),
(9, 'nono', 'c625ade02c3acde8e4d9de57fca78203', 'warga', 'nono', 'katadata101@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_layanan` (`id_layanan`,`id_metode`),
  ADD KEY `id_metode` (`id_metode`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `metode`
--
ALTER TABLE `metode`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_metode`) REFERENCES `metode` (`id_metode`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`),
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
