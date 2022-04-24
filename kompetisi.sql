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

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`klub1`, `klub2`, `tanggal`, `skor1`, `skor2`, `id_pertandingan`) VALUES
('Arema FC', 'Arsenal', '2022-05-04', 0, 0, 1),
('Arsenal', 'Juventus', '2022-05-06', 2, 3, 2),
('Arema FC', 'PSG', '2022-05-08', 2, 4, 3),
('Arema FC', 'Barcelona', '2022-05-09', 7, 4, 4),
('Arsenal', 'Barcelona', '2022-05-12', 1, 1, 5),
('PSG', 'Barcelona', '2022-05-04', 1, 1, 6),
('Barcelona', 'Juventus', '2022-05-04', 3, 1, 7),
('Madrid', 'PSG', '2022-05-04', 1, 0, 8),
('Arema FC', 'Barcelona', '2022-05-04', 7, 4, 9),
('Arsenal', 'Madrid', '2022-05-04', 5, 3, 10),
('Juventus', 'PSG', '2022-05-04', 2, 4, 11),
('Arsenal', 'PSG', '2022-05-04', 4, 1, 12),
('Madrid', 'Juventus', '2022-05-04', 1, 3, 13),
('PSG', 'Arema FC', '2022-05-21', 5, 1, 14),
('PSG', 'Arsenal', '2022-05-23', 4, 1, 15),
('Juventus', 'Madrid', '2022-05-25', 2, 1, 16),
('Persebaya', 'Liverpool', '2022-05-26', 3, 0, 17),
('Chelsea', 'Bayern Munchen', '2022-05-27', 1, 1, 21),
('Chelsea', 'Liverpool', '2022-05-28', NULL, NULL, 22),
('Liverpool', 'Persebaya', '2022-05-28', NULL, NULL, 23),
('Chelsea', 'Bayern Munchen', '2022-05-27', NULL, NULL, 24),
('Liverpool', 'Persebaya', '2022-05-29', NULL, NULL, 25),
('Persebaya', 'Madrid', '2022-05-30', NULL, NULL, 26);

-- --------------------------------------------------------

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
-- Dumping data untuk tabel `klub`
--

INSERT INTO `klub` (`nama`, `stadion`, `manager`, `poin`, `jumlahmenang`, `jumlahkalah`, `jumlahseri`, `jumlahgol`, `jumlahkebobol`, `selisihgol`) VALUES
('Arema FC', 'Kanjuruhan', 'Alfons A', 4, 1, 2, 1, 12, 15, -2),
('Arsenal', 'London', 'Auryn S', 16, 5, 3, 1, 23, 22, 5),
('Barcelona', 'Camp Nou', 'Denny S', 6, 1, 1, 3, 11, 12, 2),
('Bayern Munchen', 'Munich', 'Hoseanita', 1, 0, 0, 1, 1, 1, 0),
('Chelsea', 'Gajayana', 'Abilo', 1, 0, 0, 1, 1, 1, 0),
('Juventus', 'Turin', 'Alucard', 12, 4, 2, 0, 13, 12, 0),
('Liverpool', 'Liverpool', 'Liverpool', 0, 0, 1, 0, 0, 3, 0),
('Madrid', 'Bernabeu', 'Billy K', 3, 1, 4, 0, 7, 12, -3),
('Persebaya', 'Bung Tomo', 'Jaya', 3, 1, 0, 0, 3, 0, 0),
('PSG', 'Paris', 'Richo W', 16, 5, 5, 1, 29, 22, -2);

--
-- Indexes for dumped tables
--

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
