-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Sep 2019 pada 04.26
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nama`, `telpon`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Mahmud Ramadan', '0829987908', 'SUKABUMI', '2019-09-09 03:04:11', '0000-00-00 00:00:00'),
(2, 'Rehan Sukamti', '082365478954', 'MALANG', '2019-09-09 03:04:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `kode` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `kode`, `nama`, `semester`, `guru_id`, `created_at`, `updated_at`) VALUES
(1, 'M-123', 'Matematika', 'ganjil', 1, '2019-08-31 04:54:46', NULL),
(2, 'S-321', 'Ilmiah', 'ganjil', 1, '2019-08-31 04:54:46', NULL),
(3, 'S-11024', 'Ilmu pengetahuan alam', 'Genap', 2, '2019-09-02 04:30:03', NULL),
(4, 'B-12903', 'Bahasa inggris', 'Ganjil', 2, '2019-09-02 04:30:03', NULL),
(5, 'S-09876', 'Ilmu pengetahuan sosial', 'Genap', 2, '2019-09-02 04:31:54', NULL),
(6, 'X-11098', 'Pendidikin warna negaraan', 'Genap', 1, '2019-09-02 04:31:54', NULL),
(7, 'G-097856', 'KOMPUTER JARINGAN', 'Genap', 2, '2019-09-02 04:33:11', NULL),
(8, 'N-87690', 'TEKNIK MESIN', 'Ganjil', 1, '2019-09-02 04:33:11', NULL),
(9, 'H-098782', 'Bahasa Indonesia', 'Akhir', 1, '2019-09-02 08:19:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel_siswa`
--

INSERT INTO `mapel_siswa` (`id`, `siswa_id`, `mapel_id`, `nilai`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 65, '2019-08-31 04:57:36', '0000-00-00 00:00:00'),
(3, 5, 1, 76, '2019-08-31 06:15:15', '0000-00-00 00:00:00'),
(4, 2, 7, 75, '2019-09-01 23:08:35', '2019-09-02 06:08:35'),
(5, 2, 8, 70, '2019-09-01 23:09:00', '2019-09-02 06:09:00'),
(6, 2, 1, 60, '2019-09-01 23:09:09', '2019-09-02 06:09:09'),
(7, 2, 2, 88, '2019-09-01 23:09:20', '2019-09-02 06:09:20'),
(8, 2, 3, 77, '2019-09-01 23:09:33', '2019-09-02 06:09:33'),
(9, 2, 4, 67, '2019-09-01 23:09:49', '2019-09-02 06:09:49'),
(10, 2, 5, 78, '2019-09-01 23:10:10', '2019-09-02 06:10:10'),
(11, 2, 6, 83, '2019-09-01 23:10:25', '2019-09-02 06:10:25'),
(12, 1, 1, 97, '2019-09-01 23:10:44', '2019-09-02 06:10:44'),
(13, 1, 3, 82, '2019-09-01 23:10:52', '2019-09-07 04:52:07'),
(14, 1, 4, 89, '2019-09-01 23:11:04', '2019-09-09 04:31:12'),
(15, 1, 5, 91, '2019-09-01 23:11:13', '2019-09-02 06:11:13'),
(16, 1, 6, 88, '2019-09-01 23:11:29', '2019-09-02 06:11:29'),
(17, 1, 7, 96, '2019-09-01 23:11:42', '2019-09-02 06:11:42'),
(18, 1, 8, 91, '2019-09-01 23:11:53', '2019-09-02 06:11:53'),
(20, 15, 1, 77, '2019-09-01 23:12:52', '2019-09-02 06:12:52'),
(21, 13, 1, 78, '2019-09-01 23:13:06', '2019-09-02 06:13:06'),
(22, 11, 1, 79, '2019-09-01 23:13:15', '2019-09-02 06:13:15'),
(23, 10, 1, 81, '2019-09-01 23:13:27', '2019-09-02 06:13:27'),
(24, 9, 1, 83, '2019-09-01 23:13:43', '2019-09-02 06:13:43'),
(25, 8, 8, 77, '2019-09-01 23:13:55', '2019-09-02 06:13:55'),
(26, 7, 7, 90, '2019-09-01 23:14:08', '2019-09-02 06:14:08'),
(27, 4, 7, 77, '2019-09-01 23:14:23', '2019-09-02 06:14:23'),
(28, 3, 7, 88, '2019-09-01 23:14:35', '2019-09-02 06:14:35'),
(29, 17, 1, 91, '2019-09-01 23:17:18', '2019-09-02 06:17:18'),
(30, 17, 2, 92, '2019-09-01 23:17:27', '2019-09-02 06:17:27'),
(31, 17, 3, 93, '2019-09-01 23:17:34', '2019-09-02 06:17:34'),
(32, 17, 4, 94, '2019-09-01 23:17:40', '2019-09-02 06:17:40'),
(33, 17, 5, 95, '2019-09-01 23:17:53', '2019-09-02 06:17:53'),
(34, 17, 6, 96, '2019-09-01 23:18:03', '2019-09-02 06:18:03'),
(35, 17, 7, 97, '2019-09-01 23:18:16', '2019-09-02 06:18:16'),
(36, 17, 8, 0, '2019-09-01 23:18:30', '2019-09-02 06:18:30'),
(37, 3, 2, 45, '2019-09-01 23:48:45', '2019-09-02 06:48:45'),
(38, 18, 1, 78, '2019-09-02 00:24:47', '2019-09-02 07:24:47'),
(39, 18, 2, 76, '2019-09-02 00:24:56', '2019-09-02 07:24:56'),
(40, 18, 3, 91, '2019-09-02 00:25:06', '2019-09-02 07:25:06'),
(41, 19, 1, 11, '2019-09-02 00:27:22', '2019-09-02 07:27:22'),
(42, 19, 2, 60, '2019-09-02 00:27:45', '2019-09-02 07:27:45'),
(43, 19, 3, 90, '2019-09-02 00:29:34', '2019-09-02 07:29:34'),
(44, 19, 8, 70, '2019-09-02 00:31:48', '2019-09-02 07:31:48'),
(46, 21, 1, 60, '2019-09-06 20:32:27', '2019-09-07 04:52:57'),
(47, 20, 9, 67, '2019-09-08 21:11:44', '2019-09-09 04:11:44'),
(48, 7, 1, 60, '2019-09-08 21:30:34', '2019-09-09 04:30:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_26_074818_create_siswa_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `agama`, `alamat`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 0, 'HUSIN', 'MUHAMAD', 'L', 'ISLAM', 'BUKIT PELANGI TAMAN RINDU', 'pria1.jpg', NULL, '2019-08-30 02:46:31'),
(2, 0, 'FAREL', 'HERMAWANTOSO', 'L', 'ISLAM', 'KAMPUNG COBLONG', 'marmut.jpg', NULL, '2019-09-02 00:20:12'),
(4, 0, 'RESTI', 'SUSILAWATI', 'P', 'HINDU', 'KALIMALANG  BARAT', 'cewe2.jpg', NULL, '2019-09-02 00:32:23'),
(7, 0, 'JESSKA', 'ISKANDDAR', 'P', 'ISLAM', 'KAMPUNG RAMBUTAN', 'cewe1.jpg', '2019-08-29 23:10:17', '2019-08-30 02:50:22'),
(8, 0, 'IPUL', 'SAPUTRA', 'L', 'ISLAM', 'JAMBI', 'pria3.jpg', '2019-08-29 23:10:51', '2019-08-30 02:01:36'),
(9, 0, 'ELLY', 'SUNARIAH', 'P', 'KRISTEN', 'SUMATRA UTARA', NULL, '2019-08-29 23:11:34', '2019-08-29 23:11:34'),
(10, 0, 'RESKI', 'AULIAWAN', 'L', 'KRISTEN', 'MALANG', NULL, '2019-08-29 23:12:07', '2019-08-29 23:12:07'),
(11, 0, 'TOMAS', 'JONSON', 'L', 'HINDU', 'KALIMANTAN TENGAH', NULL, '2019-08-29 23:12:40', '2019-08-29 23:12:40'),
(13, 6, 'BAROK', 'SIMATUPANG', 'L', 'ISLAM', 'KEBAYORAN LAMA', NULL, '2019-08-30 20:18:13', '2019-08-30 20:18:13'),
(15, 8, 'MAHMUD', 'SIMANJUNTAK', 'L', 'BUDHA', 'TERNATE', 'profile10.png', '2019-09-01 19:34:40', '2019-09-01 19:54:37'),
(17, 10, 'MULYETI', 'MARTA', 'P', 'ISLAM', 'PASIR PURUT', 'sabyan.jpg', '2019-09-01 23:17:04', '2019-09-01 23:17:04'),
(18, 12, 'ABIID', 'HERMAWAN', 'L', 'ISLAM', 'BOGOR SELATAN', 'profile1.png', '2019-09-02 00:22:53', '2019-09-02 02:29:58'),
(19, 13, 'IPUL', 'HARTONO', 'L', 'ISLAM', 'TANJUNG PRIOK', 'pria2.jpg', '2019-09-02 00:27:06', '2019-09-02 00:27:06'),
(20, 14, 'RATNA SARI', 'SUSILAWATI', 'P', 'KATOLIK', 'BANDUNG BARAT', 'cewe.png', '2019-09-02 02:44:20', '2019-09-02 02:44:20'),
(21, 15, 'RANI', 'RATNASARI', 'P', 'KRISTEN', 'BANDUNG SELATAN', 'cewe3.jpg', '2019-09-02 02:46:54', '2019-09-02 02:46:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'HUSIN', 'husin@gmail.com', NULL, '$2y$10$IVRZMijf7wKBrx3mUN3Dz.bu61jMnMNC9rBg/SGaTKk60tqPBb5uC', 'RzWJhXWjTgqw1mGhkLtYZCuLWJRXRhEkkq4kSAxCJdVz7Jz1PF4myuIjSgkF', '2019-08-30 19:23:04', '2019-08-30 19:23:04'),
(2, 'admin', 'ADMIN', 'admin@gmail.com', NULL, '$2y$10$Fd14fmF9oazw89w0esyoFOEzUQe0WrqnENsuwXazm0tzp.r6kiCOO', '6iIUAhmRh6o3uzBjdmroFS1DSZOKBTEngfkqm44cDDR8es4DGVtq7GEyP4bu', '2019-08-30 19:24:24', '2019-08-30 19:24:24'),
(6, 'siswa', 'BAROK', 'barok@gmail', NULL, '$2y$10$a6updJnmJUnWRhBdDg2kP.INh.Jz.3uWgEqAF4OhFxs5gW/yy3Ldi', 'sfxLvnRFP8RgIZBXL3YpVRxo6GCW4wYLTDy0Skf33F4RVKdzmKd4FpPS8vC8', '2019-08-30 20:18:13', '2019-08-30 20:18:13'),
(8, 'siswa', 'MAHMUD', 'mahmud@gmail.com', NULL, '$2y$10$oGXQvcajKKxwunLZfRSM2eeQ7fkc2wWShQFh1BFCQwmOBwU2.I9dG', 'AQ4kgIIFIyA5TtiaVZDSVq1G3FGpd14D7wuATm9RWQhT4WyvRlKKOH5RGH10', '2019-09-01 19:34:40', '2019-09-01 19:34:40'),
(10, 'siswa', 'MULYETI', 'mulyeti@gmail.com', NULL, '$2y$10$gqsNUV7XdUcSqTq14Vie7ee6uOqmTLMgNRtSqfbeCi6hxHUU1Up2G', '0CurMeRycEz5SaxoAMY6SQfL3zubzE7cKmlGAKZBqlITgxBgbFhNnTbRwizm', '2019-09-01 23:17:04', '2019-09-01 23:17:04'),
(11, 'siswa', 'RISMAH', 'rismah@gmal.com', NULL, '$2y$10$xBX0yFOLCr3FxxODKS5LK.IPHjfETncjXHX1s.koqW.6Dh8Q4QhJy', 'yGiv3MTKhyD3KeJRYEMNsH1jLYfvDTIE5JV6pESXVFZZ3IHiRhUhX4WXRDVa', '2019-09-01 23:56:01', '2019-09-01 23:56:01'),
(12, 'siswa', 'ABIID', 'abbid@gmail.com', NULL, '$2y$10$ajLNrNppVsFRnnEcchohp.lzlcLmFWQotYz5u91bjAJay6uaD6ve2', 'vZgFXdNMZebexD1p8AhtO6i6rNgQt5HguzGkhgzITIoI1A6iFEy66B3pAS1L', '2019-09-02 00:22:53', '2019-09-02 00:22:53'),
(13, 'siswa', 'IPUL', 'ipul@gmail.com', NULL, '$2y$10$DwP0jFXl.m9AN7lHVTDnrOBLmVslP7Eb3vlY6gQwSjqrQ3ZHCKaSW', 'i1j9p640WWcZhGXtJKb1poGclpcwXtZemVmakjjVTPDeGFDbUkGJ2K7b1js2', '2019-09-02 00:27:06', '2019-09-02 00:27:06'),
(14, 'siswa', 'RATNA SARI', 'ratna@gmail.com', NULL, '$2y$10$QxS/3sptdJHk0KLE02v1/.qiLt7b9i8LuhAql1ZiwZDSeFbbL169m', 'm92ONHx8rjDRHCrxaEKskt0gDht8wmBNTn67a1SbzLjMwhRG7LSFDEIbzXTt', '2019-09-02 02:44:20', '2019-09-02 02:44:20'),
(15, 'siswa', 'RANI', 'rani@gmail.com', NULL, '$2y$10$MU5.GylKwlHLl74wzZZJ2uG4oVP2bjToMCmrNI92n/ASc6r9mpKqu', 'DAJAiYvcqKGcLGKkxTCq7zEU4bTey4qOnvfODkyJDiAN2DmFqiyaGM1oI1ib', '2019-09-02 02:46:54', '2019-09-02 02:46:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
