-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Jun 2026 pada 16.49
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportbooking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `nama`, `email`, `sport`, `tanggal`, `jam_mulai`, `jam_selesai`, `total`) VALUES
(1, 'Muhammad Sodais Adam', 'sodais@gmail.com', 'Padel', '2026-06-28', '07:30:00', '09:30:00', 'Rp 240.000'),
(2, 'Keisha Azzahra Adam', 'keisha@gmail.com', 'Futsal', '2026-06-28', '07:00:00', '10:00:00', 'Rp 450.000'),
(3, 'Annie Purnama Dewi', 'anniepurnamad@gmail.com', 'Futsal', '2026-06-28', '10:00:00', '12:00:00', 'Rp 300.000'),
(4, 'Adamas Nizaroeddin', 'nizaroeddinadamas@gmail.com', 'Badminton', '2026-06-28', '11:00:00', '12:00:00', 'Rp 50.000'),
(5, 'Muhammad Kadri', 'kadri@gmail.com', 'Futsal', '2026-06-29', '19:00:00', '20:00:00', 'Rp 300.000'),
(6, 'Tia Baiquni', 'tiabaiquni@gmail.com', 'Padel', '2026-06-30', '07:00:00', '09:00:00', 'Rp 240.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `catatan` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `nama`, `payment_method`, `nominal`, `bukti_transfer`, `catatan`, `status`) VALUES
(1, 1, 'Muhammad Sodais Adam', 'Transfer Bank', 240000, '', 'Lunas', 'Success'),
(2, 2, 'Keisha Azzahra Adam', 'Transfer Bank', 450000, '', 'Lunas', 'Success'),
(3, 3, 'Annie Purnama Dewi', 'Transfer Bank', 300000, '', 'Pending verifikasi', 'Pending'),
(4, 4, 'Adamas Nizaroeddin', 'Transfer Bank', 50000, '', 'Lunas', 'Success'),
(5, 5, 'Muhammad Kadri', 'Transfer Bank', 300000, '', 'Lunas', 'Success'),
(6, 6, 'Tia Baiquni', 'Transfer Bank', 240000, '', 'Pending Verifikasi', 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456'),
(2, 'Sodais Adam', 'sodais@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
