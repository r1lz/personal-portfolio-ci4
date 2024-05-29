-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2024 at 03:40 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evamalam_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi_diri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama`, `deskripsi_diri`) VALUES
(1, 'Sachril Candra Pratama', 'I am Sachril Candra Pratama, web developer from Sukabumi, Indonesia. I have rich experience in web site design and building and customization, also I am good at WordPress.');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int NOT NULL,
  `start_year` int DEFAULT NULL,
  `end_year` int DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `start_year`, `end_year`, `degree`, `description`) VALUES
(1, 2019, 2023, 'Academic Degree', 'Lorem ipsum dolor sit amet quo ei simul congue exerci ad nec admodum perfecto.'),
(2, 2017, 2013, 'Bachelor’s Degree', 'Lorem ipsum dolor sit amet quo ei simul congue exerci ad nec admodum perfecto.'),
(3, 2013, 2009, 'Honours Degree', 'Lorem ipsum dolor sit amet quo ei simul congue exerci ad nec admodum perfecto.');

-- --------------------------------------------------------

--
-- Table structure for table `tablepesan`
--

CREATE TABLE `tablepesan` (
  `id` int NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `subjek` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tablepesan`
--

INSERT INTO `tablepesan` (`id`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(2, 'Tes', 'tes@gmail.com', 'Tes', 'Tes', '2023-06-08 07:35:46'),
(8, 'sad', 'sad@SD.COM', 'sd', 'sd', '2024-05-29 21:14:45'),
(9, 'asd', 'sad@sd.com', 'asdsad', 'sd', '2024-05-29 21:30:02'),
(10, 'bnm', 'dsa@ds.c', 'as', 'dsd', '2024-05-29 21:33:22'),
(11, 'tyuio', 'yuio@gmail.com', 'yuio', 'yuio', '2024-05-29 21:38:59'),
(12, 'sachril', 'candra@gamil.com', 'dskjLKJ', 'KLJKLJ', '2024-05-29 21:41:57'),
(13, 'ghjk', 'ghjk@gmail.com', 'hjk', 'jhjk', '2024-05-29 21:48:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablepesan`
--
ALTER TABLE `tablepesan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tablepesan`
--
ALTER TABLE `tablepesan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
