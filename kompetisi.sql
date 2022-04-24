-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2022 pada 15.39
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kompetisi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `klub1` varchar(255) NOT NULL,
  `klub2` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `skor1` int(11) DEFAULT NULL,
  `skor2` int(11) DEFAULT NULL,
  `id_pertandingan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

------------------------------------------------------

--
-- Struktur dari tabel `klub`
--

CREATE TABLE `klub` (
  `nama` varchar(255) NOT NULL,
  `stadion` varchar(255) NOT NULL,
  `manager` varchar(255) NOT NULL,
  `poin` int(11) NOT NULL,
  `jumlahmenang` int(11) NOT NULL,
  `jumlahkalah` int(11) NOT NULL,
  `jumlahseri` int(11) NOT NULL,
  `jumlahgol` int(11) NOT NULL,
  `jumlahkebobol` int(11) NOT NULL,
  `selisihgol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_pertandingan`),
  ADD KEY `idx_nama` (`klub1`),
  ADD KEY `idx_klub2` (`klub2`);

--
-- Indeks untuk tabel `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`nama`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_pertandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`klub1`) REFERENCES `klub` (`nama`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`klub2`) REFERENCES `klub` (`nama`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
