-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 11:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID_Buku` int(11) NOT NULL,
  `Judul` varchar(200) NOT NULL,
  `Penulis` varchar(100) NOT NULL,
  `Tahun` date NOT NULL,
  `Sinopsis` text NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID_Buku`, `Judul`, `Penulis`, `Tahun`, `Sinopsis`, `Foto`, `Jumlah`) VALUES
(1, 'Harry Potter Magic and the Philosopher\'s Stone', 'JK Rowling', '2010-03-01', 'Harry potter Magic', 'Uploads/hp_7.jpg', 3),
(2, 'Buku Mimpi', 'Unknown', '2011-10-01', 'Buku Mimpi by Unknown', 'Uploads/buku3.jpg', 0),
(3, 'testing', 'steven', '2017-01-08', 'percobaan', 'Uploads/Screenshot (1).png', 2),
(4, 'Buku Anak', 'Pengarang', '2011-10-01', 'Buku Anak-anak', 'Uploads/bukuanak.jpeg', 0),
(5, 'Belajar Coding Membuat Program', 'Gramedia', '2008-01-05', 'Belajar Coding yang menyenangkan', 'Uploads/belajar-coding-membuat-program.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID_Customer` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `NoHP` int(15) NOT NULL,
  `Alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID_Customer`, `Nama`, `Email`, `Password`, `NoHP`, `Alamat`) VALUES
(1, 'steven', 'steven@gmail.com', 'ss', 111111, 'BSD'),
(2, 'vivilavida', 'vivi@gmail.com', 'vivi', 101010, 'pekanbaru'),
(3, 'edly', 'edly@gmail.com', 'edly', 90909, 'Tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID_Staff` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `NoHP` int(15) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID_Staff`, `Nama`, `Password`, `Email`, `NoHP`, `Status`) VALUES
(1, 'Steven Surya', 'admin', 'Admin', 911, 1),
(3, 'lavila', 'lala', 'lala@gmail.com', 999, 2),
(4, 'otto', 'oo', 'oo@gmail.com', 8888, 2),
(5, 'md', 'md', 'md@gmail.com', 555, 2),
(6, 'leo', 'leo', 'leo@gmail.com', 321123, 2);

-- --------------------------------------------------------

--
-- Table structure for table `status_pinjam`
--

CREATE TABLE `status_pinjam` (
  `ID_Transaksi` int(11) NOT NULL,
  `ID_Buku` int(11) NOT NULL,
  `ID_Customer` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `ID_Staff` int(11) NOT NULL,
  `Tanggal_Pengambilan` date NOT NULL,
  `Tanggal_Pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pinjam`
--

INSERT INTO `status_pinjam` (`ID_Transaksi`, `ID_Buku`, `ID_Customer`, `Status`, `ID_Staff`, `Tanggal_Pengambilan`, `Tanggal_Pengembalian`) VALUES
(1, 1, 2, 'Done', 4, '2021-04-18', '2021-04-19'),
(2, 2, 2, 'Done', 1, '2021-04-18', '2021-04-18'),
(4, 3, 2, 'Booked', 0, '0000-00-00', '0000-00-00'),
(8, 4, 2, 'Taken', 1, '2021-04-19', '0000-00-00'),
(10, 1, 1, 'Booked', 0, '0000-00-00', '0000-00-00'),
(13, 5, 2, 'Booked', 0, '0000-00-00', '0000-00-00'),
(14, 4, 3, 'Booked', 0, '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID_Buku`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_Customer`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID_Staff`);

--
-- Indexes for table `status_pinjam`
--
ALTER TABLE `status_pinjam`
  ADD PRIMARY KEY (`ID_Transaksi`),
  ADD KEY `ID_Buku` (`ID_Buku`),
  ADD KEY `ID_Customer` (`ID_Customer`,`ID_Staff`),
  ADD KEY `ID_Staff` (`ID_Staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID_Buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_Customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID_Staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status_pinjam`
--
ALTER TABLE `status_pinjam`
  MODIFY `ID_Transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `status_pinjam`
--
ALTER TABLE `status_pinjam`
  ADD CONSTRAINT `status_pinjam_ibfk_1` FOREIGN KEY (`ID_Buku`) REFERENCES `buku` (`ID_Buku`) ON UPDATE CASCADE,
  ADD CONSTRAINT `status_pinjam_ibfk_2` FOREIGN KEY (`ID_Customer`) REFERENCES `customer` (`ID_Customer`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
