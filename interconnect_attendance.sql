-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2021 pada 15.49
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interconnect_attendance`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_pin`
--

CREATE TABLE `admin_pin` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_pin`
--

INSERT INTO `admin_pin` (`id`, `user`, `pin`) VALUES
(0, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(0, 'admin2', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `uid` varchar(35) NOT NULL,
  `tgl` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `attendance`
--

INSERT INTO `attendance` (`id`, `uid`, `tgl`, `time_in`, `time_out`) VALUES
(170, '234211', '2021-08-19', '10:17:16', '00:00:00'),
(171, '234211', '2021-08-20', '10:17:46', '00:00:00'),
(172, '234211', '2021-08-21', '10:18:07', '00:00:00'),
(173, '234211', '2021-08-22', '10:18:18', '00:00:00'),
(176, '234211', '2021-08-23', '10:54:02', '10:54:11'),
(177, '09878901', '2021-08-19', '10:56:32', '00:00:00'),
(178, '09878901', '2021-08-20', '10:56:55', '00:00:00'),
(179, '09878901', '2021-08-21', '10:57:11', '00:00:00'),
(180, '09878901', '2021-08-22', '10:57:23', '00:00:00'),
(181, '09878901', '2021-08-23', '10:57:36', '00:00:00'),
(182, '4536512', '2021-08-19', '10:58:05', '00:00:00'),
(183, '4536512', '2021-08-20', '10:58:22', '00:00:00'),
(184, '4536512', '2021-08-21', '10:58:31', '00:00:00'),
(185, '4536512', '2021-08-22', '10:58:38', '00:00:00'),
(186, '4536512', '2021-08-23', '10:58:46', '10:59:39'),
(187, '876789', '2021-08-23', '13:54:36', '01:55:04'),
(190, '121142', '2021-08-26', '11:52:02', '03:58:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL,
  `uid` varchar(35) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`e_id`, `uid`, `name`, `address`, `gender`, `position_id`) VALUES
(2, '121142', 'Syahidan Arrizaldy Sidik', 'Bandung', 'm', 1),
(35, '09878901', 'Ihsan Nurhakim Aziz', 'Bandung', 'm', 1),
(39, '3243253', 'Nindy Aghnia', 'Bandung', 'f', 8),
(41, '242421', 'Anisa', 'Bandung', 'female', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position_name` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `position`
--

INSERT INTO `position` (`id`, `position_name`, `created_at`, `updated_at`) VALUES
(1, 'Programmer', '2021-08-13 09:02:35', '2021-08-22 10:29:50'),
(7, 'Data Entry', '2021-08-22 10:56:30', '2021-08-26 09:59:34'),
(8, 'HRD', '2021-08-22 10:57:23', '0000-00-00 00:00:00'),
(9, 'IT', '2021-08-26 10:11:04', '0000-00-00 00:00:00'),
(10, 'test', '2021-08-26 10:11:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unregistered_uid`
--

CREATE TABLE `unregistered_uid` (
  `id` int(11) NOT NULL,
  `uid` varchar(35) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image_url` varchar(35) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indeks untuk tabel `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT untuk tabel `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
