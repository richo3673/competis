-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2022 pada 02.03
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
('Arsenal', 'Barcelona', '2022-04-30', 1, 2, 62),
('Bayern Munchen', 'Liverpool', '2022-05-01', 3, 0, 63),
('Manchester United', 'Real Madrid', '2022-05-02', 2, 2, 64),
('Arsenal', 'Bayern Munchen', '2022-05-03', 4, 1, 65),
('Barcelona', 'Manchester United', '2022-05-04', 2, 1, 66),
('Liverpool', 'Real Madrid', '2022-05-04', 1, 3, 67),
('Arsenal', 'Liverpool', '2022-05-05', 0, 2, 68),
('Barcelona', 'Manchester United', '2022-05-06', 2, 1, 69),
('Bayern Munchen', 'Real Madrid', '2022-05-07', NULL, NULL, 70),
('Arsenal', 'Real Madrid', '2022-05-07', NULL, NULL, 71),
('Barcelona', 'Manchester United', '2022-05-07', 2, 1, 72),
('Bayern Munchen', 'Liverpool', '2022-05-07', 3, 0, 73),
('Arsenal', 'Barcelona', '2022-05-07', 1, 2, 74),
('Barcelona', 'Bayern Munchen', '2022-05-07', NULL, NULL, 75),
('Liverpool', 'Manchester United', '2022-05-07', NULL, NULL, 76),
('Manchester United', 'Real Madrid', '2022-05-07', 2, 2, 77);

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
('Arsenal', 'Emirates Stadium', 'Mikel Arteta', 3, 1, 2, 0, 5, 5, -3),
('Barcelona', 'Camp Nou', 'Xavi', 6, 2, 0, 0, 4, 2, 0),
('Bayern Munchen', 'Allianz Arena', 'Julian Nagelsmann', 3, 1, 1, 0, 4, 4, -3),
('Liverpool', 'Anfield Stadium', 'Jurgen Klopp', 3, 1, 2, 0, 3, 6, -5),
('Manchester United', 'Camp Nou', 'Ragnick', 1, 0, 1, 1, 3, 4, -1),
('Real Madrid', 'Santiago Bernabeu', 'Carlo Ancelotti', 4, 1, 0, 1, 5, 3, 0);

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
  MODIFY `id_pertandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

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
