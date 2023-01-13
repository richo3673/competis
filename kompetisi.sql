-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2022 pada 06.04
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
('Arsenal', 'Barcelona', '2022-04-01', 2, 1, 83),
('Arsenal', 'Barcelona', '2022-04-01', 0, 1, 84),
('Arsenal', 'Bayern Munchen', '2022-04-01', 3, 0, 85),
('Bayern Munchen', 'Barcelona', '2022-04-04', 4, 1, 86),
('Barcelona', 'Liverpool', '2022-04-05', 1, 1, 87),
('Manchester United', 'Real Madrid', '2022-04-09', 3, 5, 88),
('Arsenal', 'Manchester City', '2022-04-22', 2, 2, 89);

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
('Arsenal', 'Emirates Stadium', 'Mikel Arteta', 7, 2, 1, 1, 7, 4, 3),
('Barcelona', 'Camp Nou', 'Xavi', 4, 1, 2, 1, 4, 7, -3),
('Bayern Munchen', 'Allianz Arena', 'Julian Nagelsmann', 3, 1, 1, 0, 4, 4, 0),
('Liverpool', 'Anfield Stadium', 'Jurgen Klopp', 1, 0, 0, 1, 1, 1, 0),
('Manchester City', 'Etihad Stadium', 'Richo Wijaya', 1, 0, 0, 1, 2, 2, 0),
('Manchester United', 'Camp Nou', 'Ragnick', 0, 0, 1, 0, 3, 5, -2),
('Real Madrid', 'Santiago Bernabeu', 'Carlo Ancelotti', 3, 1, 0, 0, 5, 3, 2);

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
  MODIFY `id_pertandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

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
