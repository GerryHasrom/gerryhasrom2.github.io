-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2023 pada 17.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gerryestateofficial`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud`
--

CREATE TABLE `crud` (
  `idname` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `age` int(25) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `namehouse` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `crud`
--

INSERT INTO `crud` (`idname`, `name`, `gender`, `age`, `occupation`, `location`, `namehouse`, `image_filename`) VALUES
(1, 'vsdvv', 'fe', 80, 'vdv', 'dvd', 'vdv', '2023-10-25 vdv.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`idname`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `crud`
--
ALTER TABLE `crud`
  MODIFY `idname` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86877;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
