-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Jan 2025 pada 04.40
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa_sabala`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `belanja`
--

CREATE TABLE `belanja` (
  `id` int NOT NULL,
  `kategori_belanja` enum('Penyelenggaraan Pemerintahan Desa','Pelaksanaan Pembangunan Desa','Pembinaan Kemasyarakatan Desa','Pemberdayaan Masyarakat Desa','Penanggulangan Bencana, Keadaan Darurat, dan Keadaan Mendesak Desa') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `uraian` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `belanja`
--

INSERT INTO `belanja` (`id`, `kategori_belanja`, `jumlah`, `uraian`, `created_at`, `updated_at`) VALUES
(7, 'Penanggulangan Bencana, Keadaan Darurat, dan Keadaan Mendesak Desa', 444444444.00, 's', '2024-12-10 16:04:58', NULL),
(8, 'Pembinaan Kemasyarakatan Desa', 50000000.00, 'dd', '2024-12-02 16:05:02', NULL),
(9, 'Pemberdayaan Masyarakat Desa', 444444444.00, 'd', '2023-12-14 16:05:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `gambar`, `isi`, `slug`, `excerp`, `views`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tes', 'beritaGambar/qLUk2aba6JKJhw35gz8m3fEcUQGvlVJsbcpGfAeU.jpg', '<div>tes</div>', 'tes', 'tes', 2, NULL, '2024-05-12 00:33:51', '2024-12-17 06:33:11'),
(3, 'FOR TESTING', 'beritaGambar/RM2ESzCExVJzN5nkcNM6ySnX2viD0QvcT9g57s7j.jpg', '<div>TES TES TES</div>', 'for-testing', 'TES TES TES', 2, NULL, '2024-05-14 05:40:17', '2024-12-17 04:11:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapenduduks`
--

CREATE TABLE `datapenduduks` (
  `id` bigint UNSIGNED NOT NULL,
  `id_rt` bigint UNSIGNED NOT NULL,
  `id_rw` bigint UNSIGNED NOT NULL,
  `id_pendidikan` bigint UNSIGNED NOT NULL,
  `id_pekerjaan` bigint UNSIGNED NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepala_keluarga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hubungan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_darah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `suku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `datapenduduks`
--

INSERT INTO `datapenduduks` (`id`, `id_rt`, `id_rw`, `id_pendidikan`, `id_pekerjaan`, `alamat`, `no_kk`, `nama_kepala_keluarga`, `nik`, `nama`, `jenis_kelamin`, `hubungan`, `tempat_lahir`, `tanggal_lahir`, `usia`, `status`, `agama`, `golongan_darah`, `kewarganegaraan`, `suku`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 1, 2, 'Ternate', '8272010108080007', 'Wahyu', '8272016912690001', 'WAHYU JIHAD UMATERNATE', 'LAKI-LAKI', 'Anak Kandung', 'TERNATE', '2000-04-15', 1, 'Belum Kawin', 'ISLAM', 'O', 'indonesia', 'Ternate', NULL, '2023-07-11 23:57:40', '2023-07-12 00:08:43'),
(2, 4, 2, 1, 2, 'Jl. Makassar Barat', '012983717288212', 'ada', '8104011504000003', 'Yuda', 'LAKI-LAKI', 'Anak Kandung', 'TERNATE', '2024-05-09', 22, 'Kawin', 'ISLAM', 'O', 'indonesia', 'Ternate', NULL, '2024-05-21 17:36:24', '2024-05-21 17:36:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `title`, `description`, `image_path`, `created_at`, `updated_at`) VALUES
(2, 'v', 'v', 'galeri/WGFW4XRkZDMYx5bFrP7sUIHKz4ZhbjIU2skcKyGI.png', '2024-12-20 03:30:56', '2024-12-20 03:30:56'),
(3, 'v', 'v', 'galeri/WGFW4XRkZDMYx5bFrP7sUIHKz4ZhbjIU2skcKyGI.png', '2024-12-20 03:30:56', '2024-12-20 03:30:56'),
(4, 'v', 'v', 'galeri/WGFW4XRkZDMYx5bFrP7sUIHKz4ZhbjIU2skcKyGI.png', '2024-12-20 03:30:56', '2024-12-20 03:30:56'),
(5, 'v', 'v', 'galeri/WGFW4XRkZDMYx5bFrP7sUIHKz4ZhbjIU2skcKyGI.png', '2024-12-20 03:30:56', '2024-12-20 03:30:56'),
(6, 'v', 'v', 'galeri/WGFW4XRkZDMYx5bFrP7sUIHKz4ZhbjIU2skcKyGI.png', '2024-12-20 03:30:56', '2024-12-20 03:30:56'),
(7, 'v', 'v', 'galeri/WGFW4XRkZDMYx5bFrP7sUIHKz4ZhbjIU2skcKyGI.png', '2024-12-20 03:30:56', '2024-12-20 03:30:56'),
(8, 'sssssss', 'gggggg', 'galeri/8GkkpQKR13egq76t8fDX7FJqdwAm5VGjPQCPHpK6.jpg', '2024-12-20 03:41:26', '2024-12-20 03:41:26'),
(9, 'vv', 'c', 'galeri/tYOJbjC7NJ0dh58bfvf5sP0e9ZrJTTEX0YhJa20L.png', '2024-12-22 22:36:24', '2024-12-22 22:36:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambaran_umum`
--

CREATE TABLE `gambaran_umum` (
  `id` bigint UNSIGNED NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pelayanan`
--

CREATE TABLE `jenis_pelayanan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pelayanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_pelayanan`
--

INSERT INTO `jenis_pelayanan` (`id`, `nama_pelayanan`, `created_at`, `updated_at`) VALUES
(1, 'Surat Pengantar Keterangan Catatan Kepolisian', '2023-07-12 08:31:41', '2023-07-12 08:31:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakats`
--

CREATE TABLE `masyarakats` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masyarakats`
--

INSERT INTO `masyarakats` (`id`, `nama`, `nik`, `no_hp`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'WAHYU JIHAD UMATERNATE', '8272016912690001', '081242695750', 'wahyu@gmail.com', '$2y$10$yRSxDEYQz41dPl/yWpsUY.gcJYSmQXGMGFfqWkc5pOv5/cGe8aOn.', '2023-07-12 08:57:00', '2023-07-12 08:57:00'),
(2, 'isti 2003', '8104011504000003', '0812', 'isti@gmail.com', '$2y$10$kdu8NOgQXMmtbyyBHtZuAOvdK.XdsTb8JL0fcRQDUZXhVLOG7n1FS', '2024-05-12 19:40:43', '2024-05-12 19:40:43'),
(3, 'Yudas', '8104011504000002', '081234346944', 'muridyesus@gmail.com', '$2y$10$L9qXl094yyv40BzBFdl0au4MSSs8e5HGDIW0KaOd/jAXFDFuJfCoW', '2024-05-14 06:04:36', '2024-05-14 06:04:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_21_124438_create_beritas_table', 1),
(6, '2023_06_23_053522_create_sambutan_lurahs_table', 1),
(7, '2023_06_23_082623_create_visi_misis_table', 1),
(8, '2023_06_24_074542_create_sejarahs_table', 1),
(9, '2023_06_24_074610_create_gambaran_umums_table', 1),
(10, '2023_06_24_093115_create_struktur_organisasis_table', 1),
(11, '2023_07_01_060438_create_rts_table', 1),
(12, '2023_07_01_060446_create_rws_table', 1),
(13, '2023_07_01_060515_create_pendidikans_table', 1),
(14, '2023_07_01_060531_create_pekerjaans_table', 1),
(15, '2023_07_01_062335_datapenduduk', 1),
(16, '2023_07_04_051527_create_pengaduans_table', 1),
(17, '2023_07_04_160733_create_roles_table', 1),
(18, '2023_07_04_161442_add_role_id_to_users_table', 1),
(19, '2023_07_09_184204_create_petas_table', 1),
(20, '2023_07_11_062105_create_masyrakats_table', 1),
(21, '2023_07_11_142426_create_pelayanans_table', 1),
(22, '2023_07_11_142710_jenis_pelayanan', 1),
(23, '2023_07_11_144232_add_jenis_pelayanan_id_to_pelayanans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$p0er6LQHlwU7sPIpMcy2WOvFygSb3wi0FN0dbKicTOzKm0gfr7vBS', '2023-07-13 22:41:38'),
('Kelmakassarbaratte@gmail.com', '$2y$10$mnPPVqbQc.BO5JLDJpmGEOTrofTkYHheN1mRDwfCHXbBs9.fmeLJy', '2024-05-12 04:26:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama_pekerjaan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ibu Rumah Tangga', NULL, '2023-07-11 23:56:09', '2023-07-11 23:56:09'),
(2, 'Belum Bekerja', NULL, '2023-07-11 23:56:16', '2023-07-11 23:56:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanans`
--

CREATE TABLE `pelayanans` (
  `id` bigint UNSIGNED NOT NULL,
  `fc_kk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fc_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengantar_rt_rw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_pernyataan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masyarakat_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_pelayanan_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelayanans`
--

INSERT INTO `pelayanans` (`id`, `fc_kk`, `fc_ktp`, `pengantar_rt_rw`, `surat_pernyataan`, `masyarakat_id`, `created_at`, `updated_at`, `jenis_pelayanan_id`) VALUES
(1, 'pelyananFile/UZMXumoqTn2mF9wrERlbcGP6yLn0nJEfdqPOuryL.pdf', 'pelyananFile/dQQsPDnIVqr53UmxtHihpzUD41jTK5qthesuuDEE.pdf', 'pelyananFile/ac9hXu6W9cDUXk1Xd54JMiuJUCFhSUbPS3vEDWe5.pdf', NULL, 1, '2023-07-12 08:59:38', '2023-07-12 08:59:38', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembiayaan`
--

CREATE TABLE `pembiayaan` (
  `id` int NOT NULL,
  `kategori_pembiayaan` enum('Penerimaan','Pengeluaran') COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `uraian` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembiayaan`
--

INSERT INTO `pembiayaan` (`id`, `kategori_pembiayaan`, `jumlah`, `uraian`, `created_at`, `updated_at`) VALUES
(1, 'Penerimaan', 444444444.00, 'd', '2024-12-23 23:05:35', '2024-12-23 23:05:35'),
(2, 'Pengeluaran', 444444444.00, 'dd', '2024-12-23 23:05:52', '2024-12-23 23:05:52'),
(4, 'Penerimaan', 444444444.00, 'd', '2024-12-25 09:59:28', '2024-12-25 09:59:28'),
(5, 'Pengeluaran', 50000000.00, 'dd', '2024-12-25 10:05:09', '2024-12-25 10:05:09'),
(6, 'Pengeluaran', 50000000.00, 'dd', '2024-12-25 10:05:31', '2024-12-25 10:05:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id` int NOT NULL,
  `kategori_pendapatan` enum('Pendapatan Asli Desa','Pendapatan Transfer','Pendapatan Lain-lain') COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `uraian` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendapatan`
--

INSERT INTO `pendapatan` (`id`, `kategori_pendapatan`, `jumlah`, `uraian`, `created_at`, `updated_at`) VALUES
(2, 'Pendapatan Asli Desa', 44444.00, 'd', '2024-12-03 07:59:39', NULL),
(3, 'Pendapatan Transfer', 444444444.00, 'd', '2024-12-04 16:05:37', NULL),
(6, 'Pendapatan Asli Desa', 44444.00, 'd', '2023-12-01 07:59:39', NULL),
(7, 'Pendapatan Lain-lain', 44444.00, 'd', '2023-12-01 07:59:39', NULL),
(8, 'Pendapatan Lain-lain', 44444.00, 'd', '2023-12-01 07:59:39', NULL),
(11, 'Pendapatan Lain-lain', 50000000.00, 'dd', '2024-12-25 09:57:14', '2024-12-25 09:57:14'),
(12, 'Pendapatan Asli Desa', 444444444.00, 'd', '2024-12-25 09:57:43', '2024-12-25 09:57:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pendidikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nama_pendidikan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Tamat SD/sederajat', NULL, '2023-07-11 23:55:57', '2023-07-11 23:55:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pengaduan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `aprove` tinyint NOT NULL DEFAULT '0',
  `terkirim` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `nama`, `nik`, `email`, `jenis_pengaduan`, `deskripsi`, `lampiran`, `aprove`, `terkirim`, `created_at`, `updated_at`) VALUES
(2, 'Alexander Peter', '8271000124112003', 'alex@gmail.com', 'Penyalahgunaan Wewenang', 'LURAH TIDAK PERNAH BERKANTOR', 'lampiranPengaduan/334wM5B07LnyAvlNXBmiyCUE6DlZ8FHBPDThMCkh.jpg', 0, 0, '2024-05-14 05:32:53', '2024-05-14 05:32:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peta`
--

CREATE TABLE `peta` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peta`
--

INSERT INTO `peta` (`id`, `nama_tempat`, `gambar`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(5, 'GMIH Eben Haezer Ternate', 'Gambarpeta/zzOb6QtznblHWBUi8XmXlPtYhaFeJZwVv7pLtJxA.png', '0.7872663909234571', '127.38612972440735', '2024-10-26 04:03:27', '2024-10-26 04:03:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Lurah', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rt`
--

CREATE TABLE `rt` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_rt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rt`
--

INSERT INTO `rt` (`id`, `nama_rt`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, '003', NULL, '2023-07-11 23:54:15', '2023-07-11 23:54:15'),
(4, '001', NULL, '2023-07-11 23:55:39', '2023-07-11 23:55:39'),
(5, '002', NULL, '2023-07-11 23:55:45', '2023-07-11 23:55:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rw`
--

CREATE TABLE `rw` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_rw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rw`
--

INSERT INTO `rw` (`id`, `nama_rw`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '001', NULL, '2023-07-11 23:55:14', '2023-07-11 23:55:14'),
(2, '002', NULL, '2023-07-11 23:55:20', '2023-07-11 23:55:20'),
(3, '003', NULL, '2023-07-11 23:55:27', '2023-07-11 23:55:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sambutan_lurah`
--

CREATE TABLE `sambutan_lurah` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lurah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sambutan_lurah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_lurah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sambutan_lurah`
--

INSERT INTO `sambutan_lurah` (`id`, `nama_lurah`, `sambutan_lurah`, `gambar_lurah`, `slug`, `views`, `created_at`, `updated_at`) VALUES
(1, 'Contoh Sambutan Kades', '<div>s</div>', 'GambarLurah/CjGNQzJ7mV9gqA8CFnveoGbPi78Zb3h5qkeEtfVf.jpg', 'contoh-sambutan-kades', 4, '2024-12-17 06:33:43', '2024-12-17 06:41:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sejarah`
--

CREATE TABLE `sejarah` (
  `id` bigint UNSIGNED NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'struktur_organisasiGambar/NQ2DltZ0KMKZRVoL8JOAXXzsTBBDmzXxuq4RpQrY.jpg', '2023-07-11 22:47:22', '2024-12-23 21:26:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur_organisasi_pemuda`
--

CREATE TABLE `struktur_organisasi_pemuda` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `struktur_organisasi_pemuda`
--

INSERT INTO `struktur_organisasi_pemuda` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'struktur_organisasiGambar/eomWIU69xsD05ahdgX6XMWZ1NTVNoyjR7SApGp2d.jpg', '2023-07-11 22:47:22', '2024-12-23 21:43:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Retmu123', 'admin1@gmail.com', NULL, '$2y$10$vuyA.yD/CmzxNsGvGptODO3yLGx8NT.iQxbDA4JLbskXvmq7kbTbO', 'KrhFRCiN6foqWvk1AsApKteiY1SslqZaQHigVSPpAqVFloDAb1zr5VPmN3LL', '2023-07-11 22:32:54', '2024-05-14 06:25:22', 1),
(6, 'Lurah', 'Kelmakassarbaratte@gmail.com', NULL, '$2y$10$MUdSmK0ddrbFdbfEGCAIJuX.o7PLfVCvIFzLbWuceyBk796BOQmc2', NULL, '2023-07-13 22:04:13', '2023-07-13 22:04:13', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `video_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id`, `title`, `description`, `video_path`, `created_at`, `updated_at`) VALUES
(3, 'c', 'd', 'videos/uPI5vIerDFbvK8M9DgKn6RH25p0Q7ERqc0DZqCtS.mp4', '2024-12-20 03:48:22', '2024-12-20 03:48:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` bigint UNSIGNED NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `isi`, `created_at`, `updated_at`) VALUES
(1, '<div><strong>Visi </strong>:<br><strong><br></strong><br><strong>Misi </strong>:<br><br></div>', '2024-05-12 02:37:01', '2024-09-12 03:35:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datapenduduks`
--
ALTER TABLE `datapenduduks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datapenduduks_id_rt_foreign` (`id_rt`),
  ADD KEY `datapenduduks_id_rw_foreign` (`id_rw`),
  ADD KEY `datapenduduks_id_pendidikan_foreign` (`id_pendidikan`),
  ADD KEY `datapenduduks_id_pekerjaan_foreign` (`id_pekerjaan`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gambaran_umum`
--
ALTER TABLE `gambaran_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pelayanan`
--
ALTER TABLE `jenis_pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masyarakats`
--
ALTER TABLE `masyarakats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `masyarakats_nik_unique` (`nik`),
  ADD UNIQUE KEY `masyarakats_email_unique` (`email`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelayanans`
--
ALTER TABLE `pelayanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelayanans_masyarakat_id_foreign` (`masyarakat_id`),
  ADD KEY `pelayanans_jenis_pelayanan_id_foreign` (`jenis_pelayanan_id`);

--
-- Indeks untuk tabel `pembiayaan`
--
ALTER TABLE `pembiayaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `peta`
--
ALTER TABLE `peta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rw`
--
ALTER TABLE `rw`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sambutan_lurah`
--
ALTER TABLE `sambutan_lurah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `struktur_organisasi_pemuda`
--
ALTER TABLE `struktur_organisasi_pemuda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `belanja`
--
ALTER TABLE `belanja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `datapenduduks`
--
ALTER TABLE `datapenduduks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `gambaran_umum`
--
ALTER TABLE `gambaran_umum`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_pelayanan`
--
ALTER TABLE `jenis_pelayanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `masyarakats`
--
ALTER TABLE `masyarakats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelayanans`
--
ALTER TABLE `pelayanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembiayaan`
--
ALTER TABLE `pembiayaan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peta`
--
ALTER TABLE `peta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rt`
--
ALTER TABLE `rt`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rw`
--
ALTER TABLE `rw`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sambutan_lurah`
--
ALTER TABLE `sambutan_lurah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `struktur_organisasi_pemuda`
--
ALTER TABLE `struktur_organisasi_pemuda`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `datapenduduks`
--
ALTER TABLE `datapenduduks`
  ADD CONSTRAINT `datapenduduks_id_pekerjaan_foreign` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`id`),
  ADD CONSTRAINT `datapenduduks_id_pendidikan_foreign` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan` (`id`),
  ADD CONSTRAINT `datapenduduks_id_rt_foreign` FOREIGN KEY (`id_rt`) REFERENCES `rt` (`id`),
  ADD CONSTRAINT `datapenduduks_id_rw_foreign` FOREIGN KEY (`id_rw`) REFERENCES `rw` (`id`);

--
-- Ketidakleluasaan untuk tabel `pelayanans`
--
ALTER TABLE `pelayanans`
  ADD CONSTRAINT `pelayanans_jenis_pelayanan_id_foreign` FOREIGN KEY (`jenis_pelayanan_id`) REFERENCES `jenis_pelayanan` (`id`),
  ADD CONSTRAINT `pelayanans_masyarakat_id_foreign` FOREIGN KEY (`masyarakat_id`) REFERENCES `masyarakats` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
