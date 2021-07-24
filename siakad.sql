-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 12:51 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `idAbsensi` bigint(20) UNSIGNED NOT NULL,
  `idJadwal` bigint(20) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`idAbsensi`, `idJadwal`, `tgl`, `created_at`, `updated_at`) VALUES
(1, 22, '2021-07-09', '2021-06-14 05:22:17', '2021-06-24 13:03:29'),
(2, 23, '2021-07-10', '2021-06-14 05:22:17', '2021-06-24 13:03:29'),
(3, 30, '2021-07-10', '2021-07-10 08:16:44', '2021-07-10 08:16:44'),
(4, 30, '2021-07-10', '2021-07-10 08:19:25', '2021-07-10 08:19:25'),
(5, 30, '2021-07-10', '2021-07-10 08:23:08', '2021-07-10 08:23:08'),
(6, 30, '2021-07-10', '2021-07-10 08:24:31', '2021-07-10 08:24:31'),
(7, 23, '2021-07-10', '2021-07-10 08:43:30', '2021-07-10 08:43:30'),
(8, 23, '2021-07-10', '2021-07-10 08:52:21', '2021-07-10 08:52:21'),
(9, 23, '2021-07-10', '2021-07-10 08:55:00', '2021-07-10 08:55:00'),
(11, 32, '2021-07-11', '2021-07-10 22:27:32', '2021-07-10 22:27:32'),
(13, 34, '2021-07-11', '2021-07-11 00:40:13', '2021-07-11 00:40:13'),
(14, 34, '2021-07-11', '2021-07-11 05:26:30', '2021-07-11 05:26:30'),
(15, 34, '2021-07-11', '2021-07-11 05:27:05', '2021-07-11 05:27:05'),
(16, 34, '2021-07-11', '2021-07-11 05:27:55', '2021-07-11 05:27:55'),
(17, 44, '2021-07-12', '2021-07-11 17:01:35', '2021-07-11 17:01:35'),
(18, 35, '2021-07-12', '2021-07-11 19:19:23', '2021-07-11 19:19:23'),
(19, 46, '2021-07-22', '2021-07-22 01:29:52', '2021-07-22 01:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_detail`
--

CREATE TABLE `absensi_detail` (
  `idDetail` bigint(20) UNSIGNED NOT NULL,
  `idAbsensi` bigint(20) UNSIGNED NOT NULL,
  `idSiswa` bigint(20) UNSIGNED DEFAULT NULL,
  `keterangan` enum('hadir','sakit','izin','alpha') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi_detail`
--

INSERT INTO `absensi_detail` (`idDetail`, `idAbsensi`, `idSiswa`, `keterangan`, `created_at`, `updated_at`) VALUES
(5, 9, NULL, 'hadir', '2021-07-10 08:55:00', '2021-07-10 08:55:00'),
(22, 19, NULL, 'hadir', '2021-07-22 01:29:52', '2021-07-22 01:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `bank_soal`
--

CREATE TABLE `bank_soal` (
  `idBankSoal` bigint(20) UNSIGNED NOT NULL,
  `idUjian` bigint(20) UNSIGNED NOT NULL,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunci` enum('a','b','c','d') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detailbayar`
--

CREATE TABLE `detailbayar` (
  `idBayar` bigint(20) UNSIGNED NOT NULL,
  `jenisBayar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailbayar`
--

INSERT INTO `detailbayar` (`idBayar`, `jenisBayar`, `created_at`, `updated_at`) VALUES
(1, 'Iuran Semester/Ujian', '2021-06-14 05:22:17', '2021-07-05 20:50:49'),
(2, 'LKS', '2021-06-09 06:20:17', '2021-06-10 06:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ujian`
--

CREATE TABLE `hasil_ujian` (
  `idHasilUjian` bigint(20) UNSIGNED NOT NULL,
  `idUjian` bigint(20) UNSIGNED NOT NULL,
  `idSiswa` bigint(20) UNSIGNED NOT NULL,
  `listsoal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historisiswa`
--

CREATE TABLE `historisiswa` (
  `idHistori` bigint(20) UNSIGNED NOT NULL,
  `idSemester` bigint(20) UNSIGNED NOT NULL,
  `idSiswa` bigint(20) UNSIGNED NOT NULL,
  `idKelas` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `idInfo` bigint(20) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `pengumuman` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`idInfo`, `tgl`, `pengumuman`, `created_at`, `updated_at`) VALUES
(1, '2021-06-12', 'Jumat Sehat', '2021-06-07 10:25:37', '2021-07-23 22:44:54'),
(6, '2021-07-03', 'Pramuka Rutin Kelas 7', '2021-07-02 04:57:24', '2021-07-02 04:57:24'),
(7, '2021-07-02', 'Shalat Dhuha Setiap Hari kecuali Hari Senin', '2021-07-11 04:28:40', '2021-07-11 04:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `iuran`
--

CREATE TABLE `iuran` (
  `idIuran` bigint(20) UNSIGNED NOT NULL,
  `idSemester` bigint(20) UNSIGNED NOT NULL,
  `idSiswa` bigint(20) UNSIGNED NOT NULL,
  `idKelas` bigint(20) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `jenisBayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahBayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iuran`
--

INSERT INTO `iuran` (`idIuran`, `idSemester`, `idSiswa`, `idKelas`, `tgl`, `jenisBayar`, `jumlahBayar`, `created_at`, `updated_at`) VALUES
(1, 2, 51, 7, '2021-07-01', 'Iuran Semester', 50000, '2021-07-22 00:19:33', '2021-07-22 00:19:52'),
(2, 2, 47, 1, '2021-07-02', 'Iuran Semester', 100000, '2021-07-23 16:00:51', '2021-07-23 16:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idJadwal` bigint(20) UNSIGNED NOT NULL,
  `idSemester` bigint(20) UNSIGNED NOT NULL,
  `idPegawai` bigint(20) UNSIGNED NOT NULL,
  `idMapel` bigint(20) UNSIGNED NOT NULL,
  `idKelas` bigint(20) UNSIGNED NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jum`at','Sabtu','Minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jamMulai` time NOT NULL,
  `jamSelesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idJadwal`, `idSemester`, `idPegawai`, `idMapel`, `idKelas`, `hari`, `jamMulai`, `jamSelesai`, `created_at`, `updated_at`) VALUES
(22, 2, 16, 1, 3, 'Jum`at', '17:44:00', '18:44:00', '2021-07-03 03:44:13', '2021-07-06 00:23:44'),
(23, 2, 16, 1, 5, 'Sabtu', '13:00:00', '22:00:00', '2021-06-14 05:22:17', '2021-06-29 15:46:56'),
(26, 2, 16, 2, 1, 'Selasa', '14:05:00', '16:00:00', '2021-07-06 00:06:34', '2021-07-06 00:06:34'),
(27, 2, 22, 5, 1, 'Selasa', '16:15:00', '17:00:00', '2021-07-06 00:07:26', '2021-07-06 00:07:26'),
(28, 2, 16, 1, 3, 'Selasa', '14:00:00', '15:30:00', '2021-07-06 00:23:15', '2021-07-06 00:23:44'),
(29, 2, 31, 8, 4, 'Selasa', '15:00:00', '18:00:00', '2021-07-06 01:37:43', '2021-07-06 01:37:43'),
(30, 2, 16, 1, 4, 'Sabtu', '17:05:00', '22:00:00', '2021-07-10 03:11:13', '2021-07-10 03:11:13'),
(32, 2, 16, 2, 1, 'Minggu', '07:00:00', '22:00:00', '2021-07-10 22:26:31', '2021-07-10 22:26:31'),
(34, 2, 16, 8, 1, 'Minggu', '07:00:00', '22:00:00', '2021-07-11 00:37:48', '2021-07-11 00:37:48'),
(35, 2, 16, 2, 1, 'Senin', '07:00:00', '07:40:00', '2021-07-11 16:16:40', '2021-07-11 16:16:40'),
(36, 2, 33, 10, 1, 'Rabu', '08:20:00', '09:35:00', '2021-07-11 16:17:30', '2021-07-11 16:17:30'),
(37, 2, 22, 5, 1, 'Kamis', '07:00:00', '07:40:00', '2021-07-11 16:23:02', '2021-07-11 16:23:02'),
(38, 2, 16, 12, 1, 'Jum`at', '07:00:00', '07:35:00', '2021-07-11 16:23:51', '2021-07-11 16:26:49'),
(39, 2, 22, 5, 1, 'Jum`at', '07:00:00', '07:35:00', '2021-07-11 16:24:30', '2021-07-11 16:24:30'),
(40, 2, 16, 12, 1, 'Sabtu', '07:00:00', '07:35:00', '2021-07-11 16:28:00', '2021-07-11 16:28:00'),
(41, 2, 33, 10, 1, 'Rabu', '10:05:00', '11:25:00', '2021-07-11 16:35:11', '2021-07-11 16:35:11'),
(44, 2, 16, 8, 1, 'Senin', '07:00:00', '10:45:00', '2021-07-11 17:01:08', '2021-07-11 17:01:08'),
(45, 5, 16, 1, 1, 'Senin', '07:00:00', '12:00:00', '2021-07-21 22:55:37', '2021-07-21 22:55:37'),
(46, 2, 16, 1, 1, 'Kamis', '07:00:00', '12:00:00', '2021-07-22 01:28:22', '2021-07-22 01:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idKelas` bigint(20) UNSIGNED NOT NULL,
  `namaKelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idKelas`, `namaKelas`, `created_at`, `updated_at`) VALUES
(1, 'VII A', '2021-06-07 06:51:49', '2021-07-24 01:10:54'),
(3, 'VII B', '2021-06-08 22:38:02', '2021-07-24 02:02:28'),
(4, 'VIII A', '2021-06-08 22:38:11', '2021-07-24 02:02:49'),
(5, 'VIII B', '2021-06-08 22:38:18', '2021-07-24 02:03:05'),
(6, 'IX A', '2021-06-08 22:38:25', '2021-07-24 02:03:23'),
(7, 'XI B', '2021-06-08 22:38:31', '2021-07-24 02:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `kepsek`
--

CREATE TABLE `kepsek` (
  `idKepsek` bigint(20) UNSIGNED NOT NULL,
  `namaKepsek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kepsek`
--

INSERT INTO `kepsek` (`idKepsek`, `namaKepsek`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES
(1, 'Sudarno', 'Magetan Timur', '085672418634', '2021-06-14 05:22:17', '2021-07-11 07:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `lks`
--

CREATE TABLE `lks` (
  `idLks` bigint(20) UNSIGNED NOT NULL,
  `idSemester` bigint(20) UNSIGNED NOT NULL,
  `idSiswa` bigint(20) UNSIGNED NOT NULL,
  `idKelas` bigint(20) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `jenisBayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahBayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lks`
--

INSERT INTO `lks` (`idLks`, `idSemester`, `idSiswa`, `idKelas`, `tgl`, `jenisBayar`, `jumlahBayar`, `created_at`, `updated_at`) VALUES
(2, 2, 44, 1, '2021-07-01', 'LKS', 100000, '2021-07-22 00:06:07', '2021-07-23 23:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `idMapel` bigint(20) UNSIGNED NOT NULL,
  `namaMapel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`idMapel`, `namaMapel`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pend. Agama Islam', '2021-06-09 01:06:08', '2021-06-09 01:06:08', NULL),
(2, 'Bahasa Indonesia', '2021-06-09 01:09:33', '2021-06-09 01:20:27', NULL),
(5, 'Matematika', '2021-06-18 19:38:59', '2021-06-18 19:38:59', NULL),
(7, 'IPA Terpadu', '2021-07-04 08:15:58', '2021-07-11 15:46:45', NULL),
(8, 'IPS Terpadu', '2021-07-04 08:16:07', '2021-07-11 15:46:55', NULL),
(10, 'BahasaArab', '2021-07-11 15:48:00', '2021-07-11 15:48:00', NULL),
(11, 'Seni Budaya', '2021-07-11 15:48:22', '2021-07-11 15:48:22', NULL),
(12, 'Penjaskes', '2021-07-11 15:48:35', '2021-07-11 15:48:35', NULL),
(13, 'PKN', '2021-07-11 15:48:46', '2021-07-11 15:48:46', NULL),
(14, 'Fikih', '2021-07-11 15:49:00', '2021-07-11 15:49:00', NULL),
(15, 'Aqidah Akhlak', '2021-07-11 15:49:11', '2021-07-11 15:49:11', NULL),
(16, 'Qur\'an Hadist', '2021-07-11 15:49:20', '2021-07-11 15:49:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `idMateri` bigint(20) UNSIGNED NOT NULL,
  `idJadwal` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2021_06_07_043146_create_pegawai_table', 1),
(3, '2021_06_07_044430_create_kelas_table', 2),
(4, '2021_06_07_044557_create_siswa_table', 3),
(5, '2021_06_07_044817_create_users_table', 4),
(6, '2021_06_07_045253_create_semester_table', 5),
(7, '2021_06_07_045554_create_mapel_table', 6),
(8, '2021_06_07_045718_create_jadwal_table', 7),
(10, '2021_06_07_045931_create_absensi_table', 8),
(11, '2021_06_07_050331_create_absensi_detail_table', 9),
(13, '2021_06_07_050534_create_info_table', 11),
(14, '2021_06_07_050629_create_nilai_table', 12),
(15, '2021_06_07_051519_create_pembayaran_table', 13),
(16, '2021_06_08_094520_create_materi_table', 14),
(17, '2021_06_08_095234_create_tugas_table', 15),
(19, '2021_06_08_102646_create_ujian_table', 16),
(20, '2021_06_08_103045_create_bank_soal_table', 17),
(21, '2021_06_08_103518_create_hasil_ujian_table', 18),
(22, '2021_06_08_104115_create_submisi_table', 19),
(23, '2021_06_08_104333_create_submisi_upload_table', 20),
(24, '2021_06_29_140536_create_histori_siswa_table', 21),
(25, '2021_06_29_211426_create_kepsek_table', 22),
(26, '2021_06_30_193404_create_historibayar_table', 23),
(27, '2021_07_01_172557_create_petugas_t_u_table', 24),
(28, '2021_07_03_042403_create_pembelajaran_table', 25),
(29, '2021_07_06_034325_create_detailbayar_table', 26),
(30, '2021_07_22_063511_create_lks_table', 27),
(31, '2021_07_22_063946_create_iuran_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `idNilai` bigint(20) UNSIGNED NOT NULL,
  `idMapel` bigint(20) UNSIGNED NOT NULL,
  `idSiswa` bigint(20) UNSIGNED NOT NULL,
  `idSemester` bigint(20) UNSIGNED DEFAULT NULL,
  `idPegawai` bigint(20) UNSIGNED NOT NULL,
  `kkm` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilaiTugas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilaiUH` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilaiUTS` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilaiUAS` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`idNilai`, `idMapel`, `idSiswa`, `idSemester`, `idPegawai`, `kkm`, `nilaiTugas`, `nilaiUH`, `nilaiUTS`, `nilaiUAS`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 1, 44, NULL, 16, '75', '85', '85', '80', '80', NULL, '2021-07-22 01:39:10', '2021-07-22 01:39:10'),
(9, 12, 57, NULL, 16, '75', '80', '80', '80', '80', NULL, '2021-07-23 16:57:09', '2021-07-23 16:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaPegawai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmpLahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tglLahir` date DEFAULT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `nip`, `namaPegawai`, `jk`, `tmpLahir`, `tglLahir`, `alamat`, `telp`, `status`, `created_at`, `updated_at`) VALUES
(16, '0128202042', 'Siswoyo, S.Pd', 'L', 'Madiun Raya', '1970-01-01', 'magetan', '08538264680', 'Guru', '2021-06-15 23:34:54', '2021-07-24 00:11:18'),
(22, '1985335086632', 'Sudarno, S.Pd', 'L', 'Magetan', '1970-01-01', 'parang, magetan', '08538264680', 'Kepala Sekolah', '2021-06-16 22:06:50', '2021-07-11 15:53:53'),
(31, '19853350866', 'Heri Kustanto, S.Pd', 'L', 'Madiun', '1970-03-12', 'parang, magetan', '0835793648', 'Guru', '2021-07-02 13:23:59', '2021-07-11 15:54:20'),
(32, '198533508667', 'Sutomo', 'L', 'Madiun', '2021-07-15', 'Magetan', '032794699458', 'Guru', '2021-07-11 08:08:52', '2021-07-11 15:54:48'),
(33, '1942735840', 'Tutik, S.Pd', 'P', 'Madiun', '1989-01-12', 'Bungkuk', '08538264680', 'Guru', '2021-07-11 15:58:53', '2021-07-11 15:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idPembayaran` bigint(20) UNSIGNED NOT NULL,
  `idSiswa` bigint(20) UNSIGNED NOT NULL,
  `idSemester` bigint(20) UNSIGNED NOT NULL,
  `idKelas` bigint(20) UNSIGNED NOT NULL,
  `idBayar` bigint(20) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `jumlahBayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelajaran`
--

CREATE TABLE `pembelajaran` (
  `idPembelajaran` bigint(20) UNSIGNED NOT NULL,
  `idSemester` bigint(20) UNSIGNED NOT NULL,
  `idPegawai` bigint(20) UNSIGNED NOT NULL,
  `idMapel` bigint(20) UNSIGNED NOT NULL,
  `idKelas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelajaran`
--

INSERT INTO `pembelajaran` (`idPembelajaran`, `idSemester`, `idPegawai`, `idMapel`, `idKelas`, `created_at`, `updated_at`) VALUES
(1, 2, 16, 1, 1, '2021-06-14 05:22:17', '2021-06-24 13:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `petugastu`
--

CREATE TABLE `petugastu` (
  `idTU` bigint(20) UNSIGNED NOT NULL,
  `namaTU` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugastu`
--

INSERT INTO `petugastu` (`idTU`, `namaTU`, `jk`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES
(3, 'Sutrisno, S.Pd', 'L', 'Magetan', '085382646806', '2021-07-01 21:36:02', '2021-07-23 23:12:12'),
(5, 'Mega Ambarwati, S.E', 'L', 'Magetan', '085382646801', '2021-07-02 04:52:17', '2021-07-11 15:19:16'),
(7, 'Sukur Budianto, S.Pd', 'L', 'Plaosan', '08538264680', '2021-07-04 22:27:42', '2021-07-11 15:19:44'),
(9, 'Sukur Budianto, S.Pd', 'L', 'Bungkuk, Magetan', '08538264680', '2021-07-11 18:56:53', '2021-07-11 18:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `idSemester` bigint(20) UNSIGNED NOT NULL,
  `tahunAjaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglMulai` date NOT NULL,
  `tglSelesai` date DEFAULT NULL,
  `keterangan` enum('ganjil','genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`idSemester`, `tahunAjaran`, `tglMulai`, `tglSelesai`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, '2021/2022', '2021-06-09', '2022-12-01', 'ganjil', '2021-06-08 21:35:32', '2021-07-23 23:36:15'),
(5, '2019/2020', '2019-03-01', '2020-09-01', 'ganjil', '2021-07-21 19:56:37', '2021-07-21 19:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idSiswa` bigint(20) UNSIGNED NOT NULL,
  `idSemester` bigint(20) UNSIGNED NOT NULL,
  `idKelas` bigint(20) UNSIGNED NOT NULL,
  `tahunAngkatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaSiswa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmpLahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tglLahir` date DEFAULT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaOrtu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Siswa','Alumni') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idSiswa`, `idSemester`, `idKelas`, `tahunAngkatan`, `nis`, `namaSiswa`, `alamat`, `jk`, `tmpLahir`, `tglLahir`, `telp`, `namaOrtu`, `status`, `created_at`, `updated_at`) VALUES
(44, 2, 1, '2021', '2762', 'Vitri Avivahh', 'Ngrombo Bungkuk', 'L', 'Magetan', '2021-07-24', '085138570946', 'Edi Sukamto', 'Siswa', '2021-07-11 14:19:42', '2021-07-23 21:59:07'),
(46, 2, 4, '2021', '2744', 'Dinda', 'Ngrombo Bungkuk', 'L', 'Magetan', NULL, '085378298764', 'Miswanto', 'Siswa', '2021-07-11 14:24:23', '2021-07-11 15:11:29'),
(47, 2, 4, '2019', '2704', 'Ananda Mustifa', 'Desa Mategal', 'L', 'Magetan', NULL, '085278253490', 'Jainuri', 'Siswa', '2021-07-11 14:28:41', '2021-07-11 15:11:47'),
(48, 2, 5, '2019', '2705', 'Angga', 'Desa Sombo', 'L', 'Magetan', NULL, '085724356479', 'Selamet', 'Siswa', '2021-07-11 14:30:33', '2021-07-11 15:12:35'),
(49, 2, 5, '2019', '2706', 'Bekti', 'Desa Trosono', 'L', 'Magetan', NULL, '085008722313', 'Sukimin', 'Siswa', '2021-07-11 14:32:24', '2021-07-11 15:12:49'),
(51, 2, 6, '2018', '2665', 'Andri', 'DEsa Trosono', 'L', 'Magetan', NULL, '0835793648', 'Gunawan', 'Siswa', '2021-07-11 14:35:44', '2021-07-11 15:10:22'),
(52, 2, 7, '2018', '2666', 'Anisa', 'Desa Kediren', 'L', 'Magetan', NULL, '089426734567', 'Jumiran', 'Siswa', '2021-07-11 14:37:16', '2021-07-11 15:10:04'),
(57, 2, 1, '2018', '1350000774000', 'Indah Puspita Sari', 'Loceret, Nganjuk', 'L', 'Madiun', '2021-07-02', '0835793648', 'Edi Sukamto', 'Siswa', '2021-07-22 10:38:30', '2021-07-22 10:38:30'),
(58, 5, 6, '2019', '2351', 'Dwi Wulandari', 'Madiun', 'P', 'Madiun', '2021-07-02', '08538264680', 'Suyatno', 'Siswa', '2021-07-23 15:50:42', '2021-07-23 15:50:42'),
(59, 5, 6, '2018', '2356', 'Hanisyah', 'Madiun', 'P', 'Madiun', '2021-07-24', '081336389791', 'Untoro', 'Alumni', '2021-07-23 22:03:14', '2021-07-23 22:03:14'),
(60, 5, 1, '2019', '2359', 'Muhammad Aziz', 'Madiun', 'L', 'Madiun', '2021-07-01', '0835793648', 'Edi Sukamto', 'Siswa', '2021-07-24 03:43:38', '2021-07-24 03:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `submisi`
--

CREATE TABLE `submisi` (
  `idSubmisi` bigint(20) UNSIGNED NOT NULL,
  `idTugas` bigint(20) UNSIGNED NOT NULL,
  `idSiswa` bigint(20) UNSIGNED NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submisi_upload`
--

CREATE TABLE `submisi_upload` (
  `idSubmisiUpload` bigint(20) UNSIGNED NOT NULL,
  `idSubmisi` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `idTugas` bigint(20) UNSIGNED NOT NULL,
  `idJadwal` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_awal` datetime NOT NULL,
  `waktu_akhir` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `idUjian` bigint(20) UNSIGNED NOT NULL,
  `idJadwal` bigint(20) UNSIGNED NOT NULL,
  `kategori` enum('Ulangan Harian','Ulangan Tengah Semester','Ulangan Akhir Semester') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ujian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_awal` datetime NOT NULL,
  `waktu_akhir` datetime NOT NULL,
  `durasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` bigint(20) UNSIGNED NOT NULL,
  `idPegawai` bigint(20) UNSIGNED DEFAULT NULL,
  `idKepsek` bigint(20) UNSIGNED DEFAULT NULL,
  `idSiswa` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Pegawai','Kepsek','Siswa') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `idPegawai`, `idKepsek`, `idSiswa`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, NULL, NULL, NULL, 'Admin', '$2y$10$5PHEKgGnpVpfHfM2kNWIT.DWGZlfbB9rsdyuvratGvCqtSFFtSRom', 'Admin', NULL, '2021-06-14 05:22:17', '2021-07-23 16:32:39'),
(11, 16, NULL, NULL, 'Siswoyo', '$2y$10$UuVXoKd5rz4/moznS3iWj.cP5flZRXKw2DqAg2pgG9lpdXrtl2WlW', 'Pegawai', NULL, '2021-06-14 05:22:17', '2021-06-07 05:22:17'),
(13, NULL, 1, NULL, 'sudarno', '$2y$10$ejN2CGmEtJtxnsF9Gt1FFeKjltGThgQxJa.h1Oe5602KX.s5Y6RzS', 'Kepsek', NULL, '2021-06-01 04:36:44', '2021-06-01 04:36:44'),
(14, 31, NULL, NULL, 'Arianto', '$2y$10$UuVXoKd5rz4/moznS3iWj.cP5flZRXKw2DqAg2pgG9lpdXrtl2WlW', 'Pegawai', NULL, '2021-06-14 05:22:17', '2021-06-24 13:03:29'),
(16, 16, NULL, NULL, 'siswoyo', '$2y$10$UuVXoKd5rz4/moznS3iWj.cP5flZRXKw2DqAg2pgG9lpdXrtl2WlW', 'Pegawai', NULL, '2021-06-14 05:22:17', '2021-06-24 13:03:29'),
(17, 33, NULL, NULL, 'tutik', 'guru', 'Pegawai', NULL, '2021-06-14 05:22:17', '2021-06-07 05:22:17'),
(18, 22, NULL, NULL, 'sudarno', '$2y$10$pl0FWn3H2JAbFGg3/L4i8uzEl0JdXC6Gd7sh84Iui7LUYUIKf6xfa', 'Pegawai', NULL, '2021-06-14 05:22:17', '2021-06-24 13:03:29'),
(20, NULL, NULL, 57, 'indah', '$2y$10$ejN2CGmEtJtxnsF9Gt1FFeKjltGThgQxJa.h1Oe5602KX.s5Y6RzS', 'Siswa', NULL, '2021-06-14 05:22:17', '2021-07-03 02:30:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`idAbsensi`),
  ADD KEY `absensi_idjadwal_foreign` (`idJadwal`);

--
-- Indexes for table `absensi_detail`
--
ALTER TABLE `absensi_detail`
  ADD PRIMARY KEY (`idDetail`),
  ADD KEY `absensi_detail_idabsensi_foreign` (`idAbsensi`),
  ADD KEY `absensi_detail_idsiswa_foreign` (`idSiswa`);

--
-- Indexes for table `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD PRIMARY KEY (`idBankSoal`),
  ADD KEY `bank_soal_idujian_foreign` (`idUjian`);

--
-- Indexes for table `detailbayar`
--
ALTER TABLE `detailbayar`
  ADD PRIMARY KEY (`idBayar`),
  ADD UNIQUE KEY `detailbayar_jenisbayar_unique` (`jenisBayar`);

--
-- Indexes for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD PRIMARY KEY (`idHasilUjian`),
  ADD KEY `hasil_ujian_idujian_foreign` (`idUjian`),
  ADD KEY `hasil_ujian_idsiswa_foreign` (`idSiswa`);

--
-- Indexes for table `historisiswa`
--
ALTER TABLE `historisiswa`
  ADD PRIMARY KEY (`idHistori`),
  ADD KEY `historisiswa_idsiswa_foreign` (`idSiswa`),
  ADD KEY `historisiswa_idkelas_foreign` (`idKelas`),
  ADD KEY `idSemester` (`idSemester`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`idInfo`);

--
-- Indexes for table `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`idIuran`),
  ADD KEY `iuran_idsemester_foreign` (`idSemester`),
  ADD KEY `iuran_idsiswa_foreign` (`idSiswa`),
  ADD KEY `iuran_idkelas_foreign` (`idKelas`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`),
  ADD KEY `idSemester` (`idSemester`),
  ADD KEY `idMapel` (`idMapel`),
  ADD KEY `idKelas` (`idKelas`),
  ADD KEY `idPegawai` (`idPegawai`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idKelas`),
  ADD UNIQUE KEY `kelas_nama_kelas_unique` (`namaKelas`);

--
-- Indexes for table `kepsek`
--
ALTER TABLE `kepsek`
  ADD PRIMARY KEY (`idKepsek`);

--
-- Indexes for table `lks`
--
ALTER TABLE `lks`
  ADD PRIMARY KEY (`idLks`),
  ADD KEY `lks_idsemester_foreign` (`idSemester`),
  ADD KEY `lks_idsiswa_foreign` (`idSiswa`),
  ADD KEY `lks_idkelas_foreign` (`idKelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`idMapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`idMateri`),
  ADD KEY `materi_idjadwal_foreign` (`idJadwal`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`idNilai`),
  ADD KEY `nilai_idmapel_foreign` (`idMapel`),
  ADD KEY `nilai_idsiswa_foreign` (`idSiswa`),
  ADD KEY `nilai_idsemester_foreign` (`idSemester`),
  ADD KEY `idPegawai` (`idPegawai`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idPembayaran`),
  ADD KEY `pembayaran_idsiswa_foreign` (`idSiswa`),
  ADD KEY `idSemester` (`idSemester`),
  ADD KEY `idKelas` (`idKelas`),
  ADD KEY `idBayar` (`idBayar`);

--
-- Indexes for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD PRIMARY KEY (`idPembelajaran`),
  ADD KEY `pembelajaran_idsemester_foreign` (`idSemester`),
  ADD KEY `pembelajaran_idpegawai_foreign` (`idPegawai`),
  ADD KEY `pembelajaran_idmapel_foreign` (`idMapel`),
  ADD KEY `pembelajaran_idkelas_foreign` (`idKelas`);

--
-- Indexes for table `petugastu`
--
ALTER TABLE `petugastu`
  ADD PRIMARY KEY (`idTU`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`idSemester`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idSiswa`),
  ADD KEY `idSemester` (`idSemester`),
  ADD KEY `idKelas` (`idKelas`);

--
-- Indexes for table `submisi`
--
ALTER TABLE `submisi`
  ADD PRIMARY KEY (`idSubmisi`),
  ADD KEY `submisi_idtugas_foreign` (`idTugas`),
  ADD KEY `submisi_idsiswa_foreign` (`idSiswa`);

--
-- Indexes for table `submisi_upload`
--
ALTER TABLE `submisi_upload`
  ADD PRIMARY KEY (`idSubmisiUpload`),
  ADD KEY `submisi_upload_idsubmisi_foreign` (`idSubmisi`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`idTugas`),
  ADD KEY `tugas_idjadwal_foreign` (`idJadwal`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`idUjian`),
  ADD KEY `ujian_idjadwal_foreign` (`idJadwal`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`),
  ADD KEY `users_idpegawai_foreign` (`idPegawai`),
  ADD KEY `idKepsek` (`idKepsek`),
  ADD KEY `idSiswa` (`idSiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `idAbsensi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `absensi_detail`
--
ALTER TABLE `absensi_detail`
  MODIFY `idDetail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `idBankSoal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detailbayar`
--
ALTER TABLE `detailbayar`
  MODIFY `idBayar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  MODIFY `idHasilUjian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historisiswa`
--
ALTER TABLE `historisiswa`
  MODIFY `idHistori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `idInfo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `iuran`
--
ALTER TABLE `iuran`
  MODIFY `idIuran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idJadwal` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idKelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kepsek`
--
ALTER TABLE `kepsek`
  MODIFY `idKepsek` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lks`
--
ALTER TABLE `lks`
  MODIFY `idLks` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `idMapel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `idMateri` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `idNilai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idPegawai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idPembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  MODIFY `idPembelajaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petugastu`
--
ALTER TABLE `petugastu`
  MODIFY `idTU` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `idSemester` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idSiswa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `submisi`
--
ALTER TABLE `submisi`
  MODIFY `idSubmisi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submisi_upload`
--
ALTER TABLE `submisi_upload`
  MODIFY `idSubmisiUpload` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `idTugas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `idUjian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_idjadwal_foreign` FOREIGN KEY (`idJadwal`) REFERENCES `jadwal` (`idJadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `absensi_detail`
--
ALTER TABLE `absensi_detail`
  ADD CONSTRAINT `absensi_detail_idabsensi_foreign` FOREIGN KEY (`idAbsensi`) REFERENCES `absensi` (`idAbsensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absensi_detail_idsiswa_foreign` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD CONSTRAINT `bank_soal_idujian_foreign` FOREIGN KEY (`idUjian`) REFERENCES `ujian` (`idUjian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD CONSTRAINT `hasil_ujian_idsiswa_foreign` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ujian_idujian_foreign` FOREIGN KEY (`idUjian`) REFERENCES `ujian` (`idUjian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `historisiswa`
--
ALTER TABLE `historisiswa`
  ADD CONSTRAINT `historisiswa_idkelas_foreign` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historisiswa_idsiswa_foreign` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `iuran`
--
ALTER TABLE `iuran`
  ADD CONSTRAINT `iuran_idkelas_foreign` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iuran_idsemester_foreign` FOREIGN KEY (`idSemester`) REFERENCES `semester` (`idSemester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iuran_idsiswa_foreign` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`idMapel`) REFERENCES `mapel` (`idMapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`idSemester`) REFERENCES `semester` (`idSemester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lks`
--
ALTER TABLE `lks`
  ADD CONSTRAINT `lks_idkelas_foreign` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lks_idsemester_foreign` FOREIGN KEY (`idSemester`) REFERENCES `semester` (`idSemester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lks_idsiswa_foreign` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_idjadwal_foreign` FOREIGN KEY (`idJadwal`) REFERENCES `jadwal` (`idJadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_idmapel_foreign` FOREIGN KEY (`idMapel`) REFERENCES `mapel` (`idMapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_idsemester_foreign` FOREIGN KEY (`idSemester`) REFERENCES `semester` (`idSemester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_idsiswa_foreign` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idSemester`) REFERENCES `semester` (`idSemester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`idBayar`) REFERENCES `detailbayar` (`idBayar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_idsiswa_foreign` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD CONSTRAINT `pembelajaran_idkelas_foreign` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelajaran_idmapel_foreign` FOREIGN KEY (`idMapel`) REFERENCES `mapel` (`idMapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelajaran_idpegawai_foreign` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelajaran_idsemester_foreign` FOREIGN KEY (`idSemester`) REFERENCES `semester` (`idSemester`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`idSemester`) REFERENCES `semester` (`idSemester`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submisi`
--
ALTER TABLE `submisi`
  ADD CONSTRAINT `submisi_idsiswa_foreign` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submisi_idtugas_foreign` FOREIGN KEY (`idTugas`) REFERENCES `tugas` (`idTugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submisi_upload`
--
ALTER TABLE `submisi_upload`
  ADD CONSTRAINT `submisi_upload_idsubmisi_foreign` FOREIGN KEY (`idSubmisi`) REFERENCES `submisi` (`idSubmisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_idjadwal_foreign` FOREIGN KEY (`idJadwal`) REFERENCES `jadwal` (`idJadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_idjadwal_foreign` FOREIGN KEY (`idJadwal`) REFERENCES `jadwal` (`idJadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idKepsek`) REFERENCES `kepsek` (`idKepsek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`idSiswa`) REFERENCES `siswa` (`idSiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_idpegawai_foreign` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
