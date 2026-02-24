-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Feb 2026 pada 08.53
-- Versi server: 10.11.16-MariaDB-cll-lve
-- Versi PHP: 8.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bang2434_legal_kredit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukan_nasabah`
--

CREATE TABLE `bukan_nasabah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dokumentasi_db` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bukan_nasabah`
--

INSERT INTO `bukan_nasabah` (`id`, `nomor_surat`, `perihal`, `tgl_surat`, `tgl_keluar`, `tujuan`, `keterangan`, `dokumentasi_db`, `created_at`, `updated_at`) VALUES
(4, '580/03/214.412/I/2025', 'SURAT KETERANGAN BUKAN NASABAH', '2025-01-02', '2025-01-02', 'SRI WIDODO 3522151009730001', 'UNTUK MENGURUS KEHILANGAN BPKB', NULL, '2025-01-16 03:49:41', '2025-01-16 03:49:41'),
(5, '580/06/214.412/I/2025', 'SURAT KETERANGAN BUKAN NASABAH', '2025-01-02', '2025-01-02', 'NUR ASA MALINDA 3522065312030002', 'UNTUK MENGURUS KEHILANGAN BPKB', NULL, '2025-01-16 03:52:47', '2025-01-16 03:52:47'),
(6, '580/050/214.412/I/2025', 'SURAT KETERANGAN BUKAN NASABAH', '2025-01-16', '2025-01-16', 'SRI WAHYUNI 3522065010810012', 'UNTUK MENGURUS KEHILANGAN BPKB', '1737515915_2025-01-17-15-51-59-01.pdf', '2025-01-17 08:50:06', '2025-01-22 03:18:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:65:{i:0;a:4:{s:1:\"a\";i:147;s:1:\"b\";s:20:\"view_management_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:148;s:1:\"b\";s:22:\"create_management_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:149;s:1:\"b\";s:20:\"read_management_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:150;s:1:\"b\";s:22:\"update_management_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:151;s:1:\"b\";s:22:\"delete_management_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:251;s:1:\"b\";s:9:\"view_roya\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:6;a:4:{s:1:\"a\";i:252;s:1:\"b\";s:11:\"create_roya\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:7;a:4:{s:1:\"a\";i:253;s:1:\"b\";s:9:\"read_roya\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:8;a:4:{s:1:\"a\";i:254;s:1:\"b\";s:11:\"update_roya\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:9;a:4:{s:1:\"a\";i:255;s:1:\"b\";s:11:\"delete_roya\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:10;a:4:{s:1:\"a\";i:256;s:1:\"b\";s:10:\"view_lunas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:11;a:4:{s:1:\"a\";i:257;s:1:\"b\";s:12:\"create_lunas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:12;a:4:{s:1:\"a\";i:258;s:1:\"b\";s:10:\"read_lunas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:13;a:4:{s:1:\"a\";i:259;s:1:\"b\";s:12:\"update_lunas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:14;a:4:{s:1:\"a\";i:260;s:1:\"b\";s:12:\"delete_lunas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:15;a:4:{s:1:\"a\";i:261;s:1:\"b\";s:21:\"view_tidak_dijaminkan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:16;a:4:{s:1:\"a\";i:262;s:1:\"b\";s:23:\"create_tidak_dijaminkan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:17;a:4:{s:1:\"a\";i:263;s:1:\"b\";s:21:\"read_tidak_dijaminkan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:18;a:4:{s:1:\"a\";i:264;s:1:\"b\";s:23:\"update_tidak_dijaminkan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:19;a:4:{s:1:\"a\";i:265;s:1:\"b\";s:23:\"delete_tidak_dijaminkan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:20;a:4:{s:1:\"a\";i:266;s:1:\"b\";s:18:\"view_bukan_nasabah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:21;a:4:{s:1:\"a\";i:267;s:1:\"b\";s:20:\"create_bukan_nasabah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:22;a:4:{s:1:\"a\";i:268;s:1:\"b\";s:18:\"read_bukan_nasabah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:23;a:4:{s:1:\"a\";i:269;s:1:\"b\";s:20:\"update_bukan_nasabah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:24;a:4:{s:1:\"a\";i:270;s:1:\"b\";s:20:\"delete_bukan_nasabah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:25;a:4:{s:1:\"a\";i:271;s:1:\"b\";s:22:\"view_surat_keluar_lain\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:26;a:4:{s:1:\"a\";i:272;s:1:\"b\";s:24:\"create_surat_keluar_lain\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:27;a:4:{s:1:\"a\";i:273;s:1:\"b\";s:22:\"read_surat_keluar_lain\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:28;a:4:{s:1:\"a\";i:274;s:1:\"b\";s:24:\"update_surat_keluar_lain\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:29;a:4:{s:1:\"a\";i:275;s:1:\"b\";s:24:\"delete_surat_keluar_lain\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:30;a:4:{s:1:\"a\";i:276;s:1:\"b\";s:11:\"view_minuta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:31;a:4:{s:1:\"a\";i:277;s:1:\"b\";s:13:\"create_minuta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:32;a:4:{s:1:\"a\";i:278;s:1:\"b\";s:11:\"read_minuta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:33;a:4:{s:1:\"a\";i:279;s:1:\"b\";s:13:\"update_minuta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:34;a:4:{s:1:\"a\";i:280;s:1:\"b\";s:13:\"delete_minuta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:35;a:4:{s:1:\"a\";i:281;s:1:\"b\";s:12:\"view_salinan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:36;a:4:{s:1:\"a\";i:282;s:1:\"b\";s:14:\"create_salinan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:37;a:4:{s:1:\"a\";i:283;s:1:\"b\";s:12:\"read_salinan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:38;a:4:{s:1:\"a\";i:284;s:1:\"b\";s:14:\"update_salinan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:39;a:4:{s:1:\"a\";i:285;s:1:\"b\";s:14:\"delete_salinan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:40;a:4:{s:1:\"a\";i:286;s:1:\"b\";s:10:\"view_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:41;a:4:{s:1:\"a\";i:287;s:1:\"b\";s:12:\"create_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:42;a:4:{s:1:\"a\";i:288;s:1:\"b\";s:10:\"read_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:43;a:4:{s:1:\"a\";i:289;s:1:\"b\";s:12:\"update_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:44;a:4:{s:1:\"a\";i:290;s:1:\"b\";s:12:\"delete_order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:45;a:4:{s:1:\"a\";i:291;s:1:\"b\";s:12:\"view_tagihan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:46;a:4:{s:1:\"a\";i:292;s:1:\"b\";s:14:\"create_tagihan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:47;a:4:{s:1:\"a\";i:293;s:1:\"b\";s:12:\"read_tagihan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:48;a:4:{s:1:\"a\";i:294;s:1:\"b\";s:14:\"update_tagihan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:49;a:4:{s:1:\"a\";i:295;s:1:\"b\";s:14:\"delete_tagihan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:50;a:4:{s:1:\"a\";i:296;s:1:\"b\";s:18:\"view_jaminan_masuk\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:51;a:4:{s:1:\"a\";i:297;s:1:\"b\";s:20:\"create_jaminan_masuk\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:52;a:4:{s:1:\"a\";i:298;s:1:\"b\";s:18:\"read_jaminan_masuk\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:53;a:4:{s:1:\"a\";i:299;s:1:\"b\";s:20:\"update_jaminan_masuk\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:54;a:4:{s:1:\"a\";i:300;s:1:\"b\";s:20:\"delete_jaminan_masuk\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:55;a:4:{s:1:\"a\";i:301;s:1:\"b\";s:19:\"view_jaminan_keluar\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:56;a:4:{s:1:\"a\";i:302;s:1:\"b\";s:21:\"create_jaminan_keluar\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:57;a:4:{s:1:\"a\";i:303;s:1:\"b\";s:19:\"read_jaminan_keluar\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:58;a:4:{s:1:\"a\";i:304;s:1:\"b\";s:21:\"update_jaminan_keluar\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:59;a:4:{s:1:\"a\";i:305;s:1:\"b\";s:21:\"delete_jaminan_keluar\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:60;a:4:{s:1:\"a\";i:306;s:1:\"b\";s:20:\"view_tukar_sementara\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:61;a:4:{s:1:\"a\";i:307;s:1:\"b\";s:22:\"create_tukar_sementara\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:62;a:4:{s:1:\"a\";i:308;s:1:\"b\";s:20:\"read_tukar_sementara\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:63;a:4:{s:1:\"a\";i:309;s:1:\"b\";s:22:\"update_tukar_sementara\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:64;a:4:{s:1:\"a\";i:310;s:1:\"b\";s:22:\"delete_tukar_sementara\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super-admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:7:\"petugas\";s:1:\"c\";s:3:\"web\";}}}', 1771921314);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jaminan_keluar`
--

CREATE TABLE `jaminan_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_rekening` varchar(255) DEFAULT NULL,
  `jenis_jaminan` varchar(255) DEFAULT NULL,
  `no_registrasi` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `jumlah_jaminan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jaminan_masuk`
--

CREATE TABLE `jaminan_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_rekening` varchar(255) DEFAULT NULL,
  `jenis_jaminan` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jaminan_masuk`
--

INSERT INTO `jaminan_masuk` (`id`, `tgl_masuk`, `nama`, `no_rekening`, `jenis_jaminan`, `keterangan`, `created_at`, `updated_at`) VALUES
(20, '2025-01-21', 'ANAH NUR HANIFAH', '10130000448', 'BPKB', 'HONDA 2020	\r\nS 4575 AAM			O-07174255		\r\nANAH NUR HANIFAH', '2025-01-22 03:22:00', '2025-01-22 03:22:00'),
(21, '2025-01-21', 'LUTVI ANI MYDYAWATI', '10130000234', 'SHM', 'NO 964	\r\nLUAS \r\nLETAK 77	\r\nBANJAREJO 	\r\nBOJONEGORO	\r\nBOJONEGORO	\r\nJAWA TIMUR	\r\nLUTVI ANI MYDYAWATI', '2025-01-22 03:24:52', '2025-01-22 03:24:52'),
(22, '2025-01-21', 'CV OSAN JAYA', '10130002696', 'SPK, BPKB', 'SPK	630/9/SPK.PLBJBT-PL.PJBT/APBD/412.203/2024	CV OSAN JAYA\r\nTOYOTA 2015 S 1815 QI      M-11073367 M SHOLEH', '2025-01-22 03:26:31', '2025-01-22 03:29:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lunas`
--

CREATE TABLE `lunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dokumentasi_db` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lunas`
--

INSERT INTO `lunas` (`id`, `nomor_surat`, `perihal`, `tgl_surat`, `tgl_keluar`, `tujuan`, `keterangan`, `dokumentasi_db`, `created_at`, `updated_at`) VALUES
(3, '580/010/214.412/I/2025', 'SURAT KETERANGAN LUNAS', '2025-01-06', '2025-01-06', 'MOCHAMAD ARIYADI 3522151102820002', 'LUNAS 06 JANUARI 2025', '1737687003_580 10 214.412 I 2025.pdf', '2025-01-08 06:30:53', '2025-01-24 02:50:03'),
(4, '580/014/214.412/I/2025', 'SURAT KETERANGAN LUNAS', '2025-01-07', '2025-01-07', 'KASDAM 3522233112650094', 'LUNAS 30 OKTOBER 2024', '1737686994_580 14 214.412 I 2025.pdf', '2025-01-08 06:40:51', '2025-01-24 02:49:54'),
(6, '580/038/214.412/I/2025', 'SURAT KETERANGAN LUNAS', '2025-01-15', '2025-01-15', 'SETYA SULAKSONO 3522152311750002', 'LUNAS 15 JANUARI 2025', '1736930172_580038214.412I2025.pdf', '2025-01-15 08:31:24', '2025-01-22 03:15:22'),
(8, '580/049/214.412/I/2025', 'SURAT KETERANGAN LUNAS', '2025-01-16', '2025-01-16', 'SULISTYOWATI 3522154103670001', 'LUNAS 15 JANUARI 2025', '1737686981_580 49 214.412 I 2025.pdf', '2025-01-22 03:14:56', '2025-01-24 02:49:41'),
(9, '580/65/214.412/I/2025', 'SURAT KETERANGAN LUNAS', '2025-01-21', '2025-01-21', 'KASMIRAH 3522025507660003', 'LUNAS 21 JANUARI 2025', '1737686969_580 65 214.412 I 2025.pdf', '2025-01-22 03:17:36', '2025-01-24 02:49:29'),
(10, '580/945/214.412/XII/2024', 'SURAT KETERANGAN LUNAS', '2024-12-24', '2024-12-24', 'RADHINAL ROMADHONA 3522151902930001', 'LUNAS 24 DESEMBER 2024', NULL, '2025-01-22 03:59:20', '2025-01-22 03:59:20'),
(11, '580/923/214.412/XII/2024', 'SURAT KETERANGAN LUNAS', '2024-12-16', '2024-12-16', 'AGUS SUPRIADI 3275071408840015', 'LUNAS 26 NOVEMBER 2024', NULL, '2025-01-22 04:00:57', '2025-01-22 04:00:57'),
(12, '580/912/214.412/XII/2024', 'SURAT KETERANGAN LUNAS', '2024-12-12', '2024-12-12', 'AGUS SURYONO 3522080901770001', 'LUNAS 06 DESEMBER 2024', NULL, '2025-01-22 04:04:21', '2025-01-22 04:04:21'),
(13, '580/071/214.412/I/2025', 'SURAT KETERANGAN LUNAS', '2025-01-22', '2025-01-22', 'JANASRI 3522237112670089', 'LUNAS 17 JUNI 2022', '1737686961_580 71 214.412 I 2025.pdf', '2025-01-24 02:23:50', '2025-01-24 02:49:21'),
(14, '581/075/214.412/I/2025', 'SURAT KETERANGAN LUNAS', '2025-01-24', '2025-01-24', 'SUSANTI 3522246202890001', 'LUNAS 25 JANUARI 2025', '1737686943_2025-01-24-09-46-50-01.pdf', '2025-01-24 02:49:03', '2025-01-24 02:49:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_02_073111_create_permission_tables', 2),
(49, '2025_01_06_104711_buat_roya_table', 3),
(50, '2025_01_07_111209_buat_lunas_table', 3),
(51, '2025_01_07_112039_buat_tidak_dijaminkan_table', 3),
(52, '2025_01_07_113153_buat_bukan_nasabah_table', 3),
(53, '2025_01_07_113805_buat_surat_keluar_lain_table', 3),
(54, '2025_01_07_161852_buat_minuta_table', 3),
(55, '2025_01_08_082658_buat_salinan_table', 4),
(56, '2025_01_08_084313_buat_order_table', 5),
(58, '2025_01_08_101600_buat_tagihan_table', 6),
(63, '2025_01_20_085131_buat_jaminan_masuk_table', 7),
(64, '2025_01_20_092134_buat_jaminan_keluar_table', 8),
(65, '2025_01_20_093909_buat_tukar_sementara_table', 9),
(66, '2025_01_20_141101_create_importexcel_table', 10),
(67, '2025_01_20_141101_create_pegawai_table', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `minuta`
--

CREATE TABLE `minuta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `plafon` varchar(255) DEFAULT NULL,
  `notariil` varchar(255) DEFAULT NULL,
  `skmht` varchar(255) DEFAULT NULL,
  `apht` varchar(255) DEFAULT NULL,
  `fidusia` varchar(255) DEFAULT NULL,
  `notaris` varchar(255) DEFAULT NULL,
  `tgl_realisasi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `minuta`
--

INSERT INTO `minuta` (`id`, `nama`, `plafon`, `notariil`, `skmht`, `apht`, `fidusia`, `notaris`, `tgl_realisasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(7, 'MOCH ARIEF', '500000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-12-31', 'DISERAHKAN MINUTA KE NOTARIS ENI ZUBAIDAH NOTARIIL DAN SKMHT', '2025-01-10 03:19:31', '2025-01-10 03:19:31'),
(8, 'PRASTO DWI WAHJONO', '600000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-12-31', 'MINUTA DISERAHKAN KE NOTARIS BERUPA NOTARIIL DAN SKMHT', '2025-01-10 03:20:37', '2025-01-10 03:20:37'),
(9, 'ANDY ZULKARNAIN', '960000000', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-12-30', 'MINUTA ADENDDUM DISERAHKAN KE NOTARIS', '2025-01-10 03:21:33', '2025-01-10 03:26:13'),
(10, 'PT DAYA PATRA NGASEM RAYA', '1999862521', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-12-31', 'MINUTA ADENDDUM DISERAHKAN KE NOTARIS', '2025-01-10 03:22:39', '2025-01-10 03:22:39'),
(11, 'PT DAYA PATRA NGASEM RAYA', '5998973302', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-12-31', 'MINUTA ADENDDUM SUDAH DISERAHKAN KE NOTARIS', '2025-01-10 03:25:00', '2025-01-10 03:25:00'),
(12, 'PT PAPAN JAYA RAYA', '337703181', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-12-13', 'MINUTA NOTARIL SUDAH DISERAHKAN KE NOTARIS', '2025-01-10 03:25:58', '2025-01-10 03:25:58'),
(13, 'CV ARDI KARYA', '321343112', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-12-16', 'MINUTA NOTARIIL SUDAH DISERAHKAN KE NOTARIS', '2025-01-10 03:27:22', '2025-01-10 03:27:22'),
(14, 'WIDODO', '250000000', 'Ada', 'Ada', 'Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2025-01-13', 'NOTARIIL SKMHT APHT', '2025-01-21 02:07:16', '2025-01-21 04:11:34'),
(15, 'PUJIANTO', '220000000', 'Ada', 'Ada', 'Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2025-01-10', 'NOTARIIL SKMHT APHT', '2025-01-21 02:08:07', '2025-01-21 04:11:30'),
(26, 'HENI MEINAWATI', '60000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-01-07', 'DISERAHKAN NOTARIS NOTARIIL & SKMHT', '2025-01-22 02:23:04', '2025-01-22 03:32:52'),
(27, 'AGUS ARIFIN', '70000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-01-15', 'DISERAHKAN NOTARIS NOTARIIL & SKMHT', '2025-01-22 02:23:04', '2025-01-22 03:07:27'),
(28, 'SETYA AGISTINA', '35000000', 'Tidak Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-01-17', 'DISERAHKAN NOTARIS  SKMHT', '2025-01-22 02:23:04', '2025-01-22 03:07:22'),
(29, 'NASRIP', '95000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2025-01-16', 'DISERAHKAN NOTARIS NOTARIIL', '2025-01-22 02:23:04', '2025-01-30 01:12:46'),
(30, 'SUPRIYANTO', '100000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2025-01-21', 'DISERAHKAN NOTARIS NOTARIIL', '2025-01-22 02:23:04', '2025-01-30 01:12:39'),
(31, 'HAJAR DIANTORO', '115000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-01-02', 'DISERAHKAN NOTARIS NOTARIIL', '2025-01-22 02:23:04', '2025-01-22 03:07:09'),
(32, 'AHMAD BURHANI', '190000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-01-08', 'DISERAHKAN NOTARIS NOTARIIL', '2025-01-22 02:23:04', '2025-01-22 03:07:03'),
(33, 'SUPARSONO', '440000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-01-13', 'DISERAHKAN NOTARIS NOTARIIL & SKMHT', '2025-01-22 02:23:04', '2025-01-22 03:06:58'),
(34, 'IRA ARIANTI', '125000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-01-15', 'DISERAHKAN NOTARIS NOTARIIL', '2025-01-22 02:23:04', '2025-01-22 03:06:54'),
(35, 'SITI CHOIRIYAH', '110000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2025-01-17', 'DISERAHKAN NOTARIS NOTARIIL', '2025-01-22 02:23:04', '2025-01-22 03:06:46'),
(36, 'M RIZAL AZIZ', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2025-01-16', 'DISERAHKAN NOTARIS NOTARIIL', '2025-01-22 02:23:04', '2025-01-22 03:06:41'),
(37, 'DENI SUSANTO', '120000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2025-01-17', 'DISERAHKAN NOTARIS NOTARIIL', '2025-01-22 02:23:04', '2025-01-22 03:06:37'),
(38, 'YATIM SLAMET HARIONO', '50000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-01-21', 'DISERAHKAN NOTARIS NOTARIIL & SKMHT', '2025-01-22 02:23:04', '2025-01-22 03:06:32'),
(39, 'MOCHAMAD ARIYADI', '130000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-01-16', 'DISERAHKAN NOTARIS NOTARIIL SKMHT', '2025-01-22 02:46:51', '2025-01-22 02:46:51'),
(68, 'MOEDJIONO', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2025-01-22', 'NOTARIIL DISERAHKAN NOTARIS', '2025-01-24 01:31:06', '2025-01-24 01:31:06'),
(69, 'LINA KURNIAWATI', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2025-01-22', 'NOTARIIL DISERAHKAN NOTARIS', '2025-01-24 01:32:18', '2025-01-24 01:32:18'),
(70, 'ENDAH DEWI WAHYUNI', '265000000', 'Tidak Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-12-31', 'DISERAHKAN  KE NOTARIS ENI ZUBAIDAH APHT', '2025-02-06 07:44:27', '2025-02-06 07:44:27'),
(71, 'PRASTO DWI WAHJONO', '600000000', 'Tidak Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-12-31', ' DISERAHKAN KE NOTARIS BERUPA  SKMHT', '2025-02-06 07:44:27', '2025-02-06 07:44:27'),
(72, 'ANDRI SETYAWAN', '110000000', 'Tidak Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-12-31', 'DISERAHKAN  KE NOTARIS ENI ZUBAIDAH APHT', '2025-02-06 07:44:27', '2025-02-06 07:44:27'),
(75, 'NURUL IKHSAN', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2025-04-28', 'DISERAHKAN  KE NOTARIS FARIDA HIDAYATI', '2025-05-15 01:25:04', '2025-05-15 01:25:04'),
(76, 'SUBIANTONO', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2025-04-28', 'DISERAHKAN  KE NOTARIS FARIDA HIDAYATI', '2025-05-15 01:25:04', '2025-05-15 01:25:04'),
(77, 'SUBKHAN', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2025-05-07', 'DISERAHKAN  KE NOTARIS FARIDA HIDAYATI', '2025-05-15 01:25:04', '2025-05-15 01:25:04'),
(78, 'WANTO', '30000000', 'Tidak Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-05-15', 'DISERAHKAN KE NOTARIS ENI ZUBAIDAH SKMHT', '2025-05-15 04:12:23', '2025-05-15 04:12:23'),
(79, 'ARDIAN BUDI C', '100000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-05-16', 'SUDAH DISERAHKAN KE NOTARIS ENI ZUBAIDAH', '2025-05-19 02:48:41', '2025-05-19 02:48:41'),
(80, 'DWI PRIYORAHARJO', '385000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-05-20', 'ADENDDUM SUDAH DIKEMBALIKAN KE  NOTARIS', '2025-05-22 01:30:26', '2025-05-22 01:30:46'),
(81, 'AHMAD ALI ARIFUDIN', '200000000', 'Tidak Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2025-01-31', 'DISERAHKAN  KE NOTARIS ENI ZUBAIDAH APHT', '2025-05-26 02:46:45', '2025-05-26 02:46:45'),
(82, 'KHOIRUR ROZIKIN', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ACHMAD MUAS', '2025-05-23', 'DISERAHKAN  KE NOTARIS ACHMAD MUAS', '2025-05-26 02:46:45', '2025-05-26 02:46:45'),
(83, 'WISNU WARDANA', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ACHMAD MUAS', '2025-05-23', 'DISERAHKAN  KE NOTARIS ACHMAD MUAS', '2025-05-26 02:46:45', '2025-05-26 02:46:45'),
(84, 'RINTO SOFIYANTO', '70000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Ada', 'ENI ZUBAIDAH', '2025-05-27', 'SUDAH DISERAHKAN KE NOTARIS', '2025-05-28 01:30:37', '2025-05-28 01:30:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 15),
(23, 'App\\Models\\User', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `plafon` varchar(255) DEFAULT NULL,
  `notariil` varchar(255) DEFAULT NULL,
  `skmht` varchar(255) DEFAULT NULL,
  `apht` varchar(255) DEFAULT NULL,
  `fidusia` varchar(255) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `notaris` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `nama`, `plafon`, `notariil`, `skmht`, `apht`, `fidusia`, `tgl_order`, `notaris`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 'PUJIANTO', '220000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-01-10', 'FARIDA HIDAYATI', 'ORDER NOTARIIL APHT', '2025-01-10 04:35:16', '2025-01-21 04:14:18'),
(5, 'SUPARSONO', '44000000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-01-13', 'ENI ZUBAIDAH', 'NOTARIIL APHT', '2025-01-14 01:19:42', '2025-01-14 01:19:42'),
(6, 'WIDODO', '25000000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-01-13', 'FARIDA HIDAYATI', 'NOTARIIL APHT', '2025-01-14 01:20:29', '2025-01-21 04:14:13'),
(7, 'AGUS ARIFIN', '70000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-15', 'ENI ZUBAIDAH', 'NOTARIIL SKMHT', '2025-01-15 02:38:44', '2025-01-15 02:38:44'),
(8, 'IRA ARIANTI', '125000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-15', 'ENI ZUBAIDAH', 'NOTARIIL', '2025-01-15 02:57:26', '2025-01-15 02:57:26'),
(9, 'NASRIP', '95000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-16', 'FARIDA HIDAYATI', 'NOTARIIL', '2025-01-16 03:15:37', '2025-01-21 04:14:07'),
(10, 'DENI SUSANTO', '120000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-16', 'FARIDA HIDAYATI', 'NOTARIIL', '2025-01-16 03:16:26', '2025-01-21 04:14:01'),
(11, 'MOCHAMAD ARIYADI', '130000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-16', 'ENI ZUBAIDAH', 'NOTARIIL SKMHT', '2025-01-16 03:32:52', '2025-01-16 03:32:52'),
(12, 'M RIZAL AZIZ', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-16', 'FARIDA HIDAYATI', 'NOTARIIL', '2025-01-16 03:33:30', '2025-01-21 04:13:57'),
(13, 'SITI CHOIRIYAH', '110000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-16', 'FARIDA HIDAYATI', 'NOTARIIL', '2025-01-17 04:39:04', '2025-01-21 04:13:53'),
(14, 'SETYA AGISTINA', '35000000', 'Tidak Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-16', 'ENI ZUBAIDAH', 'SKMHT', '2025-01-17 04:40:04', '2025-01-17 04:40:04'),
(15, 'YATIM SLAMET HARIONO', '50000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-21', 'ENI ZUBAIDAH', 'NOTARIIL SKMHT', '2025-01-21 03:42:48', '2025-01-21 03:42:48'),
(16, 'SUPRIYANTO', '100000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-21', 'FARIDA HIDAYATI', 'NOTARIIL', '2025-01-21 03:43:17', '2025-01-21 04:13:46'),
(19, 'PURWANTO', '175000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-23', 'ENI ZUBAIDAH', 'NOTARIIL', '2025-01-24 04:01:05', '2025-01-24 04:01:05'),
(22, 'HALI MANSUR', '245000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-02-03', 'ACHMAD MUAS', 'NOTARIIL APHT', '2025-02-05 04:17:31', '2025-05-14 04:59:21'),
(23, 'GOZALI', '230000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-02-03', 'ACHMAD MUAS', 'NOTARIIL APHT', '2025-02-05 04:17:31', '2025-05-14 04:59:25'),
(24, 'MEGA KUSUMA A', '130000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-02-03', 'ACHMAD MUAS', 'NOTARIIL', '2025-02-05 04:17:31', '2025-05-14 04:59:29'),
(25, 'SUYONO', '100000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-02-05', 'ENI ZUBAIDAH', 'NOTARIIL ', '2025-02-05 04:17:31', '2025-02-05 04:17:31'),
(26, 'KARMAN', '70000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-02-05', 'ENI ZUBAIDAH', 'NOTARIIL', '2025-02-05 04:17:31', '2025-02-05 04:17:31'),
(27, 'HADI WINARNO', '200000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-02-06', 'ENI ZUBAIDAH', 'NOTARIIL', '2025-02-12 05:02:42', '2025-02-12 05:02:42'),
(28, 'M SAEFUDIN ZUHRI', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-02-11', 'ENI ZUBAIDAH', 'NOTARIIL', '2025-02-12 05:02:42', '2025-02-12 05:02:42'),
(29, 'TUMINI SRI WAHYUTI', '40000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Ada', '2025-02-11', 'FARIDA HIDAYATI', 'NOTARIIL APHT', '2025-02-12 05:02:42', '2025-02-12 05:02:42'),
(30, 'WISNU PRASETYO', '200000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-02-12', 'FARIDA HIDAYATI', 'NOTARIIL APHT', '2025-02-12 05:02:42', '2025-02-12 05:02:42'),
(31, 'AGUS BUDIONO', '245000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-02-12', 'FARIDA HIDAYATI', 'NOTARIIL APHT', '2025-02-12 05:02:42', '2025-02-12 05:02:42'),
(32, 'MUHAMMAD PUGUH HARIYANTO MAULANA', '190000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-02-12', 'FARIDA HIDAYATI', 'NOTARIIL APHT', '2025-02-12 05:02:42', '2025-02-12 05:02:42'),
(33, 'FERI ARIS BUDIANTO', '100000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-02-12', 'FARIDA HIDAYATI', 'NOTARIIL', '2025-02-12 05:02:42', '2025-02-12 05:02:42'),
(34, 'ENI PURWATI', '200000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-05-15', 'FARIDA HIDAYATI', 'NOTARIIL APHT', '2025-05-15 01:52:50', '2025-05-15 01:52:50'),
(35, 'ARDIAN BUDI C', '100000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-15', 'ENI ZUBAIDAH', 'NOTARIIL SKMHT', '2025-05-15 03:46:06', '2025-05-15 03:46:06'),
(36, 'WANTO', '30000000', 'Tidak Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-14', 'ENI ZUBAIDAH', 'SKMHT', '2025-05-15 03:46:37', '2025-05-15 03:46:37'),
(37, 'DIANA NUR SAFITRI', '30000000', 'Tidak Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-16', 'ENI ZUBAIDAH', 'SKMHT', '2025-05-16 02:07:13', '2025-05-16 02:07:13'),
(38, 'LUNTUR SUBAGYO', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-16', 'FARIDA HIDAYATI', 'NOTARIIL', '2025-05-16 02:14:31', '2025-05-16 02:14:31'),
(39, 'CHOIRUL ANAM', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-16', 'ENI ZUBAIDAH', 'ADENDDUM', '2025-05-16 03:27:53', '2025-05-16 03:27:53'),
(40, 'BAMBANG SUYOTO', '100000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-19', 'ENI ZUBAIDAH', 'NOTARIIL', '2025-05-19 02:11:17', '2025-05-19 02:11:17'),
(41, 'MOH SHOFIYUR ROHMAN', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-19', 'ENI ZUBAIDAH', 'NOTARIIL', '2025-05-19 02:11:50', '2025-05-19 02:11:50'),
(42, 'M AINUL ARIF', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-19', 'ENI ZUBAIDAH', 'NOTARIIL', '2025-05-19 02:12:18', '2025-05-19 02:12:18'),
(43, 'RETNO BUDIYANI', '80000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-19', 'ENI ZUBAIDAH', 'NOTARIIL', '2025-05-19 02:12:46', '2025-05-19 02:12:46'),
(44, 'AGUS MULYONO', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-23', 'ACHMAD MUAS', 'NOTARIIL', '2025-05-28 01:50:36', '2025-05-28 01:50:36'),
(45, 'WISNU WARDANA', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-23', 'ACHMAD MUAS', 'NOTARIIL', '2025-05-28 01:51:05', '2025-05-28 01:51:05'),
(46, 'KHOIRUR ROZIKIN', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-23', 'ACHMAD MUAS', 'NOTARIIL', '2025-05-28 02:00:28', '2025-05-28 02:00:28'),
(47, 'DEVI LUSIANA', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-23', 'ACHMAD MUAS', 'NOTARIIL', '2025-05-28 02:00:54', '2025-05-28 02:00:54'),
(48, 'RINTO SOFIYANTO', '70000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Ada', '2025-05-27', 'ENI ZUBAIDAH', 'NOTARIIL FIDUSIA', '2025-05-28 02:07:06', '2025-05-28 02:07:06'),
(49, 'MUJIANTO', '145000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-17', 'ENI ZUBAIDAH', 'NOTARIIL', '2025-09-23 03:27:37', '2025-09-23 03:27:37'),
(50, 'CV AZZAHRA JAYA RAYA', '550000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-09-24', 'ACHMAD MUAS', 'NOTARIIL APHT', '2025-09-25 01:54:11', '2025-09-25 01:54:11'),
(51, 'PUJI LESTARI', '90000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-25', 'ACHMAD MUAS', 'NOTARIIL', '2025-09-30 02:15:26', '2025-09-30 02:15:26'),
(52, 'MULYONO', '120000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-25', 'ACHMAD MUAS', 'NOTARIIL', '2025-09-30 02:16:38', '2025-09-30 02:16:38'),
(53, 'HAJAR DIANTORO', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-25', 'ACHMAD MUAS', 'NOTARIIL', '2025-09-30 02:17:35', '2025-09-30 02:17:35'),
(54, 'ENDANG ARIYANTI', '75000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-25', 'ACHMAD MUAS', 'NOTARIIL', '2025-09-30 02:18:22', '2025-09-30 02:18:22'),
(55, 'LASRIANTO', '130000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-24', 'ACHMAD MUAS', 'NOTARIIL', '2025-09-30 02:19:17', '2025-09-30 02:19:17'),
(56, 'ITA PURNAMASARI', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-26', 'ACHMAD MUAS', 'NOTARIIL', '2025-09-30 02:21:13', '2025-09-30 02:21:13'),
(57, 'EDY SETYO BUDI', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-26', 'ACHMAD MUAS', 'NOTARIIL', '2025-09-30 02:22:01', '2025-09-30 02:22:01'),
(58, 'PUJIANTO', '220000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-01-10', 'FARIDA HIDAYATI', 'ORDER NOTARIIL APHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(59, 'SUPARSONO', '44000000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-01-13', 'ENI ZUBAIDAH', 'NOTARIIL APHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(60, 'WIDODO', '25000000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-01-13', 'FARIDA HIDAYATI', 'NOTARIIL APHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(61, 'AGUS ARIFIN', '70000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-15', 'ENI ZUBAIDAH', 'NOTARIIL SKMHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(62, 'IRA ARIANTI', '125000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-15', 'ENI ZUBAIDAH', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(63, 'NASRIP', '95000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-16', 'FARIDA HIDAYATI', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(64, 'DENI SUSANTO', '120000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-16', 'FARIDA HIDAYATI', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(65, 'MOCHAMAD ARIYADI', '130000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-16', 'ENI ZUBAIDAH', 'NOTARIIL SKMHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(66, 'M RIZAL AZIZ', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-16', 'FARIDA HIDAYATI', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(67, 'SITI CHOIRIYAH', '110000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-16', 'FARIDA HIDAYATI', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(68, 'SETYA AGISTINA', '35000000', 'Tidak Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-16', 'ENI ZUBAIDAH', 'SKMHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(69, 'YATIM SLAMET HARIONO', '50000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-21', 'ENI ZUBAIDAH', 'NOTARIIL SKMHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(70, 'SUPRIYANTO', '100000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-21', 'FARIDA HIDAYATI', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(71, 'PURWANTO', '175000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-01-23', 'ENI ZUBAIDAH', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(72, 'HALI MANSUR', '245000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-02-03', 'ACHMAD MUAS', 'NOTARIIL APHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(73, 'GOZALI', '230000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-02-03', 'ACHMAD MUAS', 'NOTARIIL APHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(74, 'MEGA KUSUMA A', '130000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-02-03', 'ACHMAD MUAS', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(75, 'SUYONO', '100000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-02-05', 'ENI ZUBAIDAH', 'NOTARIIL ', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(76, 'KARMAN', '70000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-02-05', 'ENI ZUBAIDAH', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(77, 'HADI WINARNO', '200000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-02-06', 'ENI ZUBAIDAH', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(78, 'M SAEFUDIN ZUHRI', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-02-11', 'ENI ZUBAIDAH', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(79, 'TUMINI SRI WAHYUTI', '40000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Ada', '2025-02-11', 'FARIDA HIDAYATI', 'NOTARIIL APHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(80, 'WISNU PRASETYO', '200000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-02-12', 'FARIDA HIDAYATI', 'NOTARIIL APHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(81, 'AGUS BUDIONO', '245000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-02-12', 'FARIDA HIDAYATI', 'NOTARIIL APHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(82, 'MUHAMMAD PUGUH HARIYANTO MAULANA', '190000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-02-12', 'FARIDA HIDAYATI', 'NOTARIIL APHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(83, 'FERI ARIS BUDIANTO', '100000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-02-12', 'FARIDA HIDAYATI', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(84, 'ENI PURWATI', '200000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-05-15', 'FARIDA HIDAYATI', 'NOTARIIL APHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(85, 'ARDIAN BUDI C', '100000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-15', 'ENI ZUBAIDAH', 'NOTARIIL SKMHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(86, 'WANTO', '30000000', 'Tidak Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-14', 'ENI ZUBAIDAH', 'SKMHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(87, 'DIANA NUR SAFITRI', '30000000', 'Tidak Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-16', 'ENI ZUBAIDAH', 'SKMHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(88, 'LUNTUR SUBAGYO', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-16', 'FARIDA HIDAYATI', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(89, 'CHOIRUL ANAM', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-16', 'ENI ZUBAIDAH', 'ADENDDUM', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(90, 'BAMBANG SUYOTO', '100000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-19', 'ENI ZUBAIDAH', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(91, 'MOH SHOFIYUR ROHMAN', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-19', 'ENI ZUBAIDAH', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(92, 'M AINUL ARIF', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-19', 'ENI ZUBAIDAH', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(93, 'RETNO BUDIYANI', '80000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-19', 'ENI ZUBAIDAH', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(94, 'AGUS MULYONO', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-23', 'ACHMAD MUAS', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(95, 'WISNU WARDANA', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-23', 'ACHMAD MUAS', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(96, 'KHOIRUR ROZIKIN', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-23', 'ACHMAD MUAS', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(97, 'DEVI LUSIANA', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-05-23', 'ACHMAD MUAS', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(98, 'RINTO SOFIYANTO', '70000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Ada', '2025-05-27', 'ENI ZUBAIDAH', 'NOTARIIL FIDUSIA', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(99, 'MUJIANTO', '145000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-17', 'ENI ZUBAIDAH', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(100, 'CV AZZAHRA JAYA RAYA', '550000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2025-09-24', 'ACHMAD MUAS', 'NOTARIIL APHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(101, 'PUJI LESTARI', '90000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-25', 'ACHMAD MUAS', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(102, 'MULYONO', '120000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-25', 'ACHMAD MUAS', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(103, 'HAJAR DIANTORO', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-25', 'ACHMAD MUAS', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(104, 'ENDANG ARIYANTI', '75000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-25', 'ACHMAD MUAS', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(105, 'LASRIANTO', '130000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-24', 'ACHMAD MUAS', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(106, 'ITA PURNAMASARI', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-26', 'ACHMAD MUAS', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(107, 'EDY SETYO BUDI', '150000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2025-09-26', 'ACHMAD MUAS', 'NOTARIIL', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(108, 'DEVITA RESTIA DEWI', '400000000', 'Ada', 'Tidak Ada', 'Ada', 'Tidak Ada', '2026-01-07', 'ENI ZUBAIDAH', 'NOTARIIL APHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44'),
(109, 'RANEM', '80000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', '2026-01-13', 'ENI ZUBAIDAH', 'NOTARIIL SKMHT', '2026-01-15 02:10:44', '2026-01-15 02:10:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(147, 'view_management_user', 'web', '2024-09-29 21:20:38', '2024-09-29 21:20:38'),
(148, 'create_management_user', 'web', '2024-09-29 21:20:41', '2024-09-29 21:20:41'),
(149, 'read_management_user', 'web', '2024-09-29 21:20:45', '2024-09-29 21:20:45'),
(150, 'update_management_user', 'web', '2024-09-29 21:20:49', '2024-09-29 21:20:49'),
(151, 'delete_management_user', 'web', '2024-09-29 21:20:53', '2024-09-29 21:20:53'),
(251, 'view_roya', 'web', '2025-01-20 03:19:19', '2025-01-20 03:19:19'),
(252, 'create_roya', 'web', '2025-01-20 03:19:22', '2025-01-20 03:19:22'),
(253, 'read_roya', 'web', '2025-01-20 03:19:25', '2025-01-20 03:19:25'),
(254, 'update_roya', 'web', '2025-01-20 03:19:27', '2025-01-20 03:19:27'),
(255, 'delete_roya', 'web', '2025-01-20 03:19:30', '2025-01-20 03:19:30'),
(256, 'view_lunas', 'web', '2025-01-20 03:19:33', '2025-01-20 03:19:33'),
(257, 'create_lunas', 'web', '2025-01-20 03:19:36', '2025-01-20 03:19:36'),
(258, 'read_lunas', 'web', '2025-01-20 03:19:39', '2025-01-20 03:19:39'),
(259, 'update_lunas', 'web', '2025-01-20 03:19:42', '2025-01-20 03:19:42'),
(260, 'delete_lunas', 'web', '2025-01-20 03:19:44', '2025-01-20 03:19:44'),
(261, 'view_tidak_dijaminkan', 'web', '2025-01-20 03:19:49', '2025-01-20 03:19:49'),
(262, 'create_tidak_dijaminkan', 'web', '2025-01-20 03:19:53', '2025-01-20 03:19:53'),
(263, 'read_tidak_dijaminkan', 'web', '2025-01-20 03:19:55', '2025-01-20 03:19:55'),
(264, 'update_tidak_dijaminkan', 'web', '2025-01-20 03:19:57', '2025-01-20 03:19:57'),
(265, 'delete_tidak_dijaminkan', 'web', '2025-01-20 03:20:00', '2025-01-20 03:20:00'),
(266, 'view_bukan_nasabah', 'web', '2025-01-20 03:20:03', '2025-01-20 03:20:03'),
(267, 'create_bukan_nasabah', 'web', '2025-01-20 03:20:05', '2025-01-20 03:20:05'),
(268, 'read_bukan_nasabah', 'web', '2025-01-20 03:20:07', '2025-01-20 03:20:07'),
(269, 'update_bukan_nasabah', 'web', '2025-01-20 03:20:10', '2025-01-20 03:20:10'),
(270, 'delete_bukan_nasabah', 'web', '2025-01-20 03:20:14', '2025-01-20 03:20:14'),
(271, 'view_surat_keluar_lain', 'web', '2025-01-20 03:20:17', '2025-01-20 03:20:17'),
(272, 'create_surat_keluar_lain', 'web', '2025-01-20 03:20:21', '2025-01-20 03:20:21'),
(273, 'read_surat_keluar_lain', 'web', '2025-01-20 03:20:24', '2025-01-20 03:20:24'),
(274, 'update_surat_keluar_lain', 'web', '2025-01-20 03:20:27', '2025-01-20 03:20:27'),
(275, 'delete_surat_keluar_lain', 'web', '2025-01-20 03:20:30', '2025-01-20 03:20:30'),
(276, 'view_minuta', 'web', '2025-01-20 03:20:33', '2025-01-20 03:20:33'),
(277, 'create_minuta', 'web', '2025-01-20 03:20:36', '2025-01-20 03:20:36'),
(278, 'read_minuta', 'web', '2025-01-20 03:20:38', '2025-01-20 03:20:38'),
(279, 'update_minuta', 'web', '2025-01-20 03:20:41', '2025-01-20 03:20:41'),
(280, 'delete_minuta', 'web', '2025-01-20 03:20:43', '2025-01-20 03:20:43'),
(281, 'view_salinan', 'web', '2025-01-20 03:20:45', '2025-01-20 03:20:45'),
(282, 'create_salinan', 'web', '2025-01-20 03:20:48', '2025-01-20 03:20:48'),
(283, 'read_salinan', 'web', '2025-01-20 03:20:51', '2025-01-20 03:20:51'),
(284, 'update_salinan', 'web', '2025-01-20 03:20:54', '2025-01-20 03:20:54'),
(285, 'delete_salinan', 'web', '2025-01-20 03:20:57', '2025-01-20 03:20:57'),
(286, 'view_order', 'web', '2025-01-20 03:20:59', '2025-01-20 03:20:59'),
(287, 'create_order', 'web', '2025-01-20 03:21:02', '2025-01-20 03:21:02'),
(288, 'read_order', 'web', '2025-01-20 03:21:04', '2025-01-20 03:21:04'),
(289, 'update_order', 'web', '2025-01-20 03:21:07', '2025-01-20 03:21:07'),
(290, 'delete_order', 'web', '2025-01-20 03:21:09', '2025-01-20 03:21:09'),
(291, 'view_tagihan', 'web', '2025-01-20 03:21:12', '2025-01-20 03:21:12'),
(292, 'create_tagihan', 'web', '2025-01-20 03:21:16', '2025-01-20 03:21:16'),
(293, 'read_tagihan', 'web', '2025-01-20 03:21:18', '2025-01-20 03:21:18'),
(294, 'update_tagihan', 'web', '2025-01-20 03:21:22', '2025-01-20 03:21:22'),
(295, 'delete_tagihan', 'web', '2025-01-20 03:21:26', '2025-01-20 03:21:26'),
(296, 'view_jaminan_masuk', 'web', '2025-01-20 03:21:40', '2025-01-20 03:21:40'),
(297, 'create_jaminan_masuk', 'web', '2025-01-20 03:21:43', '2025-01-20 03:21:43'),
(298, 'read_jaminan_masuk', 'web', '2025-01-20 03:21:45', '2025-01-20 03:21:45'),
(299, 'update_jaminan_masuk', 'web', '2025-01-20 03:21:47', '2025-01-20 03:21:47'),
(300, 'delete_jaminan_masuk', 'web', '2025-01-20 03:21:50', '2025-01-20 03:21:50'),
(301, 'view_jaminan_keluar', 'web', '2025-01-20 03:21:54', '2025-01-20 03:21:54'),
(302, 'create_jaminan_keluar', 'web', '2025-01-20 03:21:56', '2025-01-20 03:21:56'),
(303, 'read_jaminan_keluar', 'web', '2025-01-20 03:21:58', '2025-01-20 03:21:58'),
(304, 'update_jaminan_keluar', 'web', '2025-01-20 03:22:01', '2025-01-20 03:22:01'),
(305, 'delete_jaminan_keluar', 'web', '2025-01-20 03:22:03', '2025-01-20 03:22:03'),
(306, 'view_tukar_sementara', 'web', '2025-01-20 03:22:06', '2025-01-20 03:22:06'),
(307, 'create_tukar_sementara', 'web', '2025-01-20 03:22:08', '2025-01-20 03:22:08'),
(308, 'read_tukar_sementara', 'web', '2025-01-20 03:22:11', '2025-01-20 03:22:11'),
(309, 'update_tukar_sementara', 'web', '2025-01-20 03:22:13', '2025-01-20 03:22:13'),
(310, 'delete_tukar_sementara', 'web', '2025-01-20 03:22:16', '2025-01-20 03:22:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2024-07-02 20:31:58', '2024-11-01 21:26:35'),
(2, 'petugas', 'web', '2024-07-02 20:32:35', '2024-10-14 02:18:08'),
(23, 'user', 'web', '2024-07-14 21:49:35', '2024-07-15 02:23:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(251, 1),
(251, 2),
(252, 1),
(252, 2),
(253, 1),
(253, 2),
(254, 1),
(254, 2),
(255, 1),
(255, 2),
(256, 1),
(256, 2),
(257, 1),
(257, 2),
(258, 1),
(258, 2),
(259, 1),
(259, 2),
(260, 1),
(260, 2),
(261, 1),
(261, 2),
(262, 1),
(262, 2),
(263, 1),
(263, 2),
(264, 1),
(264, 2),
(265, 1),
(265, 2),
(266, 1),
(266, 2),
(267, 1),
(267, 2),
(268, 1),
(268, 2),
(269, 1),
(269, 2),
(270, 1),
(270, 2),
(271, 1),
(271, 2),
(272, 1),
(272, 2),
(273, 1),
(273, 2),
(274, 1),
(274, 2),
(275, 1),
(275, 2),
(276, 1),
(276, 2),
(277, 1),
(277, 2),
(278, 1),
(278, 2),
(279, 1),
(279, 2),
(280, 1),
(280, 2),
(281, 1),
(281, 2),
(282, 1),
(282, 2),
(283, 1),
(283, 2),
(284, 1),
(284, 2),
(285, 1),
(285, 2),
(286, 1),
(286, 2),
(287, 1),
(287, 2),
(288, 1),
(288, 2),
(289, 1),
(289, 2),
(290, 1),
(290, 2),
(291, 1),
(291, 2),
(292, 1),
(292, 2),
(293, 1),
(293, 2),
(294, 1),
(294, 2),
(295, 1),
(295, 2),
(296, 1),
(296, 2),
(297, 1),
(297, 2),
(298, 1),
(298, 2),
(299, 1),
(299, 2),
(300, 1),
(300, 2),
(301, 1),
(301, 2),
(302, 1),
(302, 2),
(303, 1),
(303, 2),
(304, 1),
(304, 2),
(305, 1),
(305, 2),
(306, 1),
(306, 2),
(307, 1),
(307, 2),
(308, 1),
(308, 2),
(309, 1),
(309, 2),
(310, 1),
(310, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roya`
--

CREATE TABLE `roya` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dokumentasi_db` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roya`
--

INSERT INTO `roya` (`id`, `nomor_surat`, `perihal`, `tgl_surat`, `tgl_keluar`, `tujuan`, `keterangan`, `dokumentasi_db`, `created_at`, `updated_at`) VALUES
(3, '580/033/214.412/I/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-01-14', '2025-01-14', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. MOCH ARIEF', NULL, '2025-01-16 03:40:59', '2025-01-22 03:10:57'),
(7, '580/054/214.412/I/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-01-20', '2025-01-20', 'Kepala Kantor Pertanahan Nasional Kabupaten BANGKALAN', 'ROYA AN. PT CBS LAND INDONESIA', '1737515408_PENGANTAR ROYA.pdf', '2025-01-22 03:10:08', '2025-01-22 03:10:44'),
(8, '580/096/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-02-04', '2025-02-04', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN GOZALI', '1738641502_2025-02-04-10-51-19-01.pdf', '2025-02-04 03:46:49', '2025-02-04 03:58:23'),
(9, '580/033/214.412/I/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-01-14', '2025-01-14', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. MOCH ARIEF', NULL, '2025-05-15 02:36:28', '2025-05-15 02:36:28'),
(10, '580/054/214.412/I/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-01-20', '2025-01-20', 'Kepala Kantor Pertanahan Nasional Kabupaten BANGKALAN', 'ROYA AN. PT CBS LAND INDONESIA', NULL, '2025-05-15 02:36:28', '2025-05-15 02:36:28'),
(11, '580/096/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-02-04', '2025-02-04', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN GOZALI', NULL, '2025-05-15 02:36:28', '2025-05-15 02:36:28'),
(12, '580/143/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-02-20', '2025-02-20', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN PT GRAHA AGUNG', NULL, '2025-05-15 02:36:28', '2025-05-15 02:36:28'),
(13, '580/166/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-02-27', '2025-02-27', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. PT CBS LAND INDONESIA', NULL, '2025-05-15 02:36:28', '2025-05-15 02:36:28'),
(14, '580/167/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-02-27', '2025-02-27', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. PT CBS LAND INDONESIA', NULL, '2025-05-15 02:36:28', '2025-05-15 02:36:28'),
(15, '580/171/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-02-27', '2025-02-27', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. BERLIANTO RIYADI', NULL, '2025-05-15 02:36:28', '2025-05-15 02:36:28'),
(16, '580/191/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-03-05', '2025-03-05', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. SUGENG PRIYANTO', NULL, '2025-05-15 02:36:28', '2025-05-15 02:36:28'),
(17, '580/192/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-03-05', '2025-03-05', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. SUGENG PRIYANTO', NULL, '2025-05-15 02:36:28', '2025-05-15 02:36:28'),
(18, '580/033/214.412/I/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-01-14', '2025-01-14', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. MOCH ARIEF', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(19, '580/054/214.412/I/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-01-20', '2025-01-20', 'Kepala Kantor Pertanahan Nasional Kabupaten BANGKALAN', 'ROYA AN. PT CBS LAND INDONESIA', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(20, '580/096/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-02-04', '2025-02-04', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN GOZALI', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(21, '580/143/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-02-20', '2025-02-20', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN PT GRAHA AGUNG', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(22, '580/166/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-02-27', '2025-02-27', 'Kepala Kantor Pertanahan Nasional Kabupaten BANGKALAN', 'ROYA AN. PT CBS LAND INDONESIA', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(23, '580/167/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-02-27', '2025-02-27', 'Kepala Kantor Pertanahan Nasional Kabupaten BANGKALAN', 'ROYA AN. PT CBS LAND INDONESIA', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(24, '580/171/214.412/II/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-02-27', '2025-02-27', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. BERLIANTO RIYADI', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(25, '580/191/214.412/III/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-03-05', '2025-03-05', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. SUGENG PRIYANTO', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(26, '580/192/214.412/III/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-03-05', '2025-03-05', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. SUGENG PRIYANTO', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(27, '580/196/214.412/III/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-03-06', '2025-03-06', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. HAIDAR ABDA BACHTIAR', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(28, '580/221/214.412/III/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-03-14', '2025-03-14', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. SETU HERMANTO', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(29, '580/268/214.412/IV/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-04-08', '2025-04-08', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. ANIS TEGUH APRI DIHARTO', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(30, '580/269/214.412/IV/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-04-08', '2025-04-08', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. PT EMPAT EMPAT SANTOSO', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(31, '580/270/214.412/IV/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-04-08', '2025-04-08', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'ROYA AN. PT EMPAT EMPAT SANTOSO', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(32, '580/276/214.412/IV/2025', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2025-04-10', '2025-04-10', 'Kepala Kantor Pertanahan Nasional Kabupaten BANGKALAN', 'ROYA AN. PT CBS LAND INDONESIA', NULL, '2025-05-15 02:55:52', '2025-05-15 02:55:52'),
(37, '580/019/214.412/I/2026', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2026-01-07', '2026-01-07', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'MUHAMMAD FAUZAN', NULL, '2026-01-15 02:18:55', '2026-01-15 02:18:55'),
(38, '580/026/214.412/I/2026', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2026-01-09', '2026-01-09', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'KHOSIM', NULL, '2026-01-15 02:18:55', '2026-01-15 02:18:55'),
(39, '580/027/214.412/I/2026', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2026-01-09', '2026-01-09', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'CV BALADEWA', NULL, '2026-01-15 02:18:55', '2026-01-15 02:18:55'),
(40, '580/033/214.412/I/2026', 'PERMOHONAN PENGHAPUSAN ROYA HAK TANGGUNGAN', '2026-01-13', '2026-01-13', 'Kepala Kantor Pertanahan Nasional Kabupaten BOJONEGORO', 'CV DELAPAN DELAPAN', NULL, '2026-01-15 02:18:55', '2026-01-15 02:18:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `salinan`
--

CREATE TABLE `salinan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `plafon` varchar(255) DEFAULT NULL,
  `notariil` varchar(255) DEFAULT NULL,
  `skmht` varchar(255) DEFAULT NULL,
  `apht` varchar(255) DEFAULT NULL,
  `fidusia` varchar(255) DEFAULT NULL,
  `notaris` varchar(255) DEFAULT NULL,
  `tgl_realisasi` date DEFAULT NULL,
  `tgl_penyerahan` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `salinan`
--

INSERT INTO `salinan` (`id`, `nama`, `plafon`, `notariil`, `skmht`, `apht`, `fidusia`, `notaris`, `tgl_realisasi`, `tgl_penyerahan`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 'ARDHIANSYAH ROZAKI', '290000000', 'Ada', 'Ada', 'Tidak Ada', 'Tidak Ada', 'IDA FARIKHAH, SH', '2022-11-01', '2025-01-08', 'SUDAH MASUK MAP JAMINAN', '2025-01-08 09:42:56', '2025-01-08 09:42:56'),
(5, 'CV 44 DEWI SRI', '4000000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-11-13', '2025-01-10', 'SUDAH DITERIMA', '2025-01-10 04:10:43', '2025-01-10 04:10:43'),
(6, 'ALFI NURFADHILA', '50000000', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2024-12-18', '2025-01-13', 'ADENDDUM', '2025-01-14 01:52:58', '2025-01-21 04:12:47'),
(7, 'SUSILO', '110000000', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2024-12-11', '2025-01-13', 'ADENDDUM JAMINAN', '2025-01-14 01:57:47', '2025-01-21 04:12:42'),
(8, 'NURMAN SASMITO', '100000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Ada', 'FARIDA HIDAYATI', '2024-12-06', '2025-01-13', 'NOTARIIL FIDUSIA', '2025-01-14 01:58:49', '2025-01-21 04:12:36'),
(9, 'IANATUS SYARIFAH', '100000000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Ada', 'FARIDA HIDAYATI', '2024-12-11', '2025-01-13', 'NOTARIIL FIDUSIA', '2025-01-14 02:02:33', '2025-01-21 04:12:32'),
(10, 'PT GENDING SUKOCO', '657540730', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2022-09-06', '2025-01-16', 'NOTARIIL', '2025-01-16 06:47:57', '2025-01-21 04:12:28'),
(11, 'PT GENDING SUKOCO', '584264340', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2022-09-15', '2025-01-16', 'NOTARIIL', '2025-01-16 06:49:45', '2025-01-21 04:12:19'),
(12, 'PT GENDING SUKOCO', '958874455', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2021-12-09', '2025-01-16', 'NOTARIIL', '2025-01-16 06:50:55', '2025-01-21 04:12:15'),
(13, 'PT GENDING SUKOCO', '935995368', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2021-12-30', '2025-01-16', 'NOTARIIL', '2025-01-16 06:54:46', '2025-01-21 04:12:10'),
(14, 'PT GENDING SUKOCO', '1078573320', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2021-12-23', '2025-01-16', 'NOTARIIL', '2025-01-16 06:56:01', '2025-01-21 04:12:06'),
(15, 'PT GENDING SUKOCO', '1019880180', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'FARIDA HIDAYATI', '2021-12-16', '2025-01-16', 'NOTARIIL', '2025-01-16 06:57:14', '2025-01-21 04:12:01'),
(16, 'PT GENDING SUKOCO', '605921394', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-08-29', '2025-01-16', 'NOTARIIL', '2025-01-17 03:58:03', '2025-01-17 03:58:03'),
(17, 'PT GENDING SUKOCO', '615438668', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-09-11', '2025-01-16', 'NOTARIIL', '2025-01-17 03:58:50', '2025-01-17 03:58:50'),
(18, 'PT GENDING SUKOCO', '613680594', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-09-04', '2025-01-16', 'NOTARIIL', '2025-01-17 03:59:40', '2025-01-17 03:59:40'),
(19, 'PT GENDING SUKOCO', '717285774', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-07-29', '2025-01-16', 'NOTARIIL', '2025-01-17 04:00:32', '2025-01-17 04:00:32'),
(20, 'PT GENDING SUKOCO', '667504605', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-09-18', '2025-01-16', 'NOTARIIL', '2025-01-17 04:01:22', '2025-01-17 04:01:22'),
(29, 'CV CAHAYA CEMERLANG', '550038798', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-07-29', '2025-01-31', 'NOTARIIL', '2025-01-31 02:57:11', '2025-01-31 02:57:11'),
(30, 'CV ARDI KARYA', '503825039', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-08-28', '2025-01-31', 'NOTARIIL', '2025-01-31 02:57:59', '2025-01-31 02:57:59'),
(31, 'CV ARFA SEJAHTERA', '963120000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-08-23', '2025-01-31', 'NOTARIIL', '2025-01-31 02:58:39', '2025-01-31 02:58:39'),
(32, 'CV ARFA SEJAHTERA', '1495640000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-08-30', '2025-01-31', 'NOTARIIL', '2025-01-31 02:59:22', '2025-01-31 02:59:22'),
(33, 'PT INPERA PRATAMA INDONESIA', '691752132', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-07-26', '2025-01-31', 'NOTARIIL', '2025-01-31 03:00:14', '2025-01-31 03:00:14'),
(34, 'PT INPERA PRATAMA INDONESIA', '691318926', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-07-31', '2025-01-31', 'NOTARIIL', '2025-01-31 03:01:11', '2025-01-31 03:01:11'),
(35, 'PT INPERA PRATAMA INDONESIA', '609546780', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-08-22', '2025-01-31', 'NOTARIIL', '2025-01-31 03:01:47', '2025-01-31 03:01:47'),
(36, 'PT INPERA PRATAMA INDONESIA', '607202101', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-09-06', '2025-01-31', 'NOTARIIL', '2025-01-31 03:05:41', '2025-01-31 03:05:41'),
(37, 'PT INPERA PRATAMA INDONESIA', '596269800', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-08-28', '2025-01-31', 'NOTARIIL', '2025-01-31 03:06:18', '2025-01-31 03:06:18'),
(38, 'CV VISI SARANA NIAGA', '1528912750', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-09-13', '2025-01-31', 'NOTARIIL', '2025-01-31 03:07:21', '2025-01-31 03:07:21'),
(39, 'CV VISI SARANA NIAGA', '1398345000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-08-26', '2025-01-31', 'NOTARIIL', '2025-01-31 03:08:17', '2025-01-31 03:08:17'),
(40, 'CV VISI SARANA NIAGA', '1063530000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-09-02', '2025-01-31', 'NOTARIIL', '2025-01-31 03:12:05', '2025-01-31 03:12:05'),
(41, 'CV VISI SARANA NIAGA', '1477125000', 'Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'ENI ZUBAIDAH', '2024-08-05', '2025-01-31', 'NOTARIIL', '2025-01-31 03:12:58', '2025-01-31 03:12:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0IZ9YDMHvvzCY2UiLPgYwAtFSLWfY7Du0x6ttQWA', NULL, '136.118.74.188', 'Mozilla/5.0 (Linux; Android 12; Pixel 6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1hoMzE0U1lON0NsSU9LNEtPTUJzRFVHWGtra2RrMkE2eklDeHdaNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771896382),
('14sZNbMDz7kLZAWXE3strvHstG0LGWuO3eCrQxVR', NULL, '34.126.91.61', 'Mozilla/5.0 (Linux; Android 12) Chrome/111.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUw3MmJBNUlZejJGdWZMWDhSS3RNN3piVHFrYktkMG1PYWxkSTlaMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771859765),
('7nv8eBZV2eBHh2L0w7Xp0206ENKNxscTq7nCdX6W', NULL, '61.8.67.187', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSEhGTkdRSWNxVUg5alVmYkRzNUFGOFRlbkdYamEyVUZLZ1pVM0dCZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbS9sb2dpbiI7fX0=', 1771894134),
('8p20cRJGGBQL0b8Z16JEfycv3jvBX66lsYQfBmXr', NULL, '34.82.79.167', 'Mozilla/5.0 (Linux; Android 12; Pixel 6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaHduaVM0ekQ4V1p6UzVtWHlFeFhTc1hpTWJWRlh3MmM0aFp1UDBIZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771895548),
('aRukC7dHiAKNHrWlmr6CigpFCfUlyd73UouVisZd', NULL, '34.82.79.167', 'Mozilla/5.0 (Linux; Android 12; Pixel 6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia05wTGtYMldseTBDOWt1YUxWa0VNMFlaMk9BUzZZTmhXaHVlOHdBQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771895558),
('DXc0alTFB8v8Z70LxfDDz1keNV2K3AvWHy4bmxE5', NULL, '95.143.63.15', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiODFGb2tIa0w4ZWJPYmhESVZ3OFhxRjh2eXN0SU0xcG5lZGx1VmhZeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vd3d3LmxlZ2FsLWtyZWRpdC5iYW5rZGFlcmFoYm9qb25lZ29yby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1771861151),
('flcwOIuLHH4yYgei8OGU2tGnAI51D5VfthJ7Fz12', NULL, '136.119.185.229', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSnpwZ2xOZzZyWG5QVzBYbkNJa2F5SnhLQTNKNkRIaFR1M2paM2M1NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vd3d3LmxlZ2FsLWtyZWRpdC5iYW5rZGFlcmFoYm9qb25lZ29yby5jb20vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1771861913),
('g6SnqoPkpg9eD8uHajPUK5wkwlCoNPv0uhUbMe1E', NULL, '34.83.253.1', 'Mozilla/5.0 (Linux; Android 12; Pixel 6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0ZGeU8xbXFJYkV6VEg4NXVUaEpzYzNsTGo5a2RtU0dEejY0WWh2RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vd3d3LmxlZ2FsLWtyZWRpdC5iYW5rZGFlcmFoYm9qb25lZ29yby5jb20vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1771896663),
('hkBfJeWOiNVtEQzePgQcofFt7JeGg2jdHCoRZcpF', NULL, '34.83.253.1', 'Mozilla/5.0 (Linux; Android 12; Pixel 6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGdPOGs1b1k1VTZhT0pDYmMxMnJkekVqN1ZiY3VlUlNpY3d4cHhkcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vd3d3LmxlZ2FsLWtyZWRpdC5iYW5rZGFlcmFoYm9qb25lZ29yby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1771896654),
('i4i8hNOFeP4Js1k8A62R5SSPqnLxCFGTI9M3eOjR', NULL, '136.119.185.229', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiODcwMVVNdU5KTVNWZDRnU0phSEo1YjNhUDd2eGZmRE5aSW5BUnBTRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sZWdhbC1rcmVkaXQuYmFua2RhZXJhaGJvam9uZWdvcm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1771861911),
('ifO5P9m7jcha2GvyRU6gCOSdPZt7tvKdlAvNLBru', NULL, '194.36.109.243', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibndSTktuQVV4c1c2OFZQNnFKSWVyYjJZUGV3Rm5NVmFmOTl5MjZJQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771859722),
('LEol1T1LC1YlIFwWog9gGuZMx5Tu8FYxGnKmKyoj', NULL, '157.245.70.112', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTRobzN6SDMweXRvUE9WZ1AyUUE1NmtDQlZqaXFmODU5eG5LNGJHTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771855677),
('LW2zgTsKpLwSjJHtNg0wPPshKajtaXvso3KefDtf', NULL, '18.235.110.182', 'RecordedFuture Global Inventory Crawler', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic3J3TFBwcVE2bzRlYURFWjJ2MzlyRXg1RXNkSEEzOHVUSGQ4dFRrSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vd3d3LmxlZ2FsLWtyZWRpdC5iYW5rZGFlcmFoYm9qb25lZ29yby5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1771851244),
('O1mzfO8sb90UjKWaOZQKXuM7okVTRI9ZmRSCtUMG', NULL, '3.233.59.216', 'RecordedFuture Global Inventory Crawler', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickFmaUsxNzJZZ0lWRW1tVmZLMGdQQlZEQVdyYXdBSFVEaXhnWnlhaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vd3d3LmxlZ2FsLWtyZWRpdC5iYW5rZGFlcmFoYm9qb25lZ29yby5jb20vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1771851259),
('qKYGlcs6thxUO6rCGWkrSYucI3rAEEN8QjDQCoNB', NULL, '61.8.67.187', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVZPd3lLUmpJRDNCQWxGME9ESkE4Mm9QbVVIVU4wTnc5V0xmdFJwOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771897014),
('RNMHdJm6j2wW0OCcinQfdhFIMAreB2SEcTlGeqvy', NULL, '157.245.70.112', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2FMQk9ZbzRRSkYzdDlsa2FQeXdSTDcwMHpCWjhpTTU0b0NQaFN5USI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vd3d3LmxlZ2FsLWtyZWRpdC5iYW5rZGFlcmFoYm9qb25lZ29yby5jb20vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1771855677),
('SjnrW8WmXm0gKvD2uegjCa5auDjyc5euiKBCzyhx', NULL, '136.119.185.229', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkRKV2RjaXFLSmVOc1lHRnJhdTc1bmRMOXduY2IwVVVKUjlJTmdZeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771861913),
('upLQfXHqCtqfsQzpCs6GFXzwgwUOTvaOxc7HRC5x', NULL, '136.119.185.229', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUW9BWVZIMEpDUHplTnV1U2tNVkJWSUoxdW5qM3ZRT1A2VkNxbTJJeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly93d3cubGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771861911),
('VxYFLJdXbkb2ND3G3Q4N0ff9qe2L2wuqfnmabibL', NULL, '194.36.109.243', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnJSSUplSW5tTkpWZzF0MTJoNFFhYnVGQTFpZnRBd3ZENjFqc2xxQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771860020),
('WBhExRXQJ3S7mDINRmB4iREOx99oX8yKBzLjb8fP', NULL, '136.118.74.188', 'Mozilla/5.0 (Linux; Android 12; Pixel 6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSVl5UlFrR0R1UnhmMjhZZ2xyZXRNcFF5NEk3ZnRHVzhNZWdmeU5pTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771896386),
('xajH354hMfN7HRgHPINlblw1OE2EzWBfq5Ur1MZV', NULL, '34.82.79.167', 'Mozilla/5.0 (Linux; Android 12; Pixel 6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSENqZU5MUG5yOTRkbklaZHJwcFFJcnFDVnY4NXJoWTFROFNPRFFrOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771895555),
('XGrqw7NzPCgcd7jomUJiKEQoGVYZ6885W9Hfy3kK', NULL, '164.90.198.149', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0lZbGVNb3Z1ZE9NTEYxQWtObm82OXBOYUNCd0F1a2M5clA2VnBMbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vbGVnYWwta3JlZGl0LmJhbmtkYWVyYWhib2pvbmVnb3JvLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771875948),
('xQ80hMuy7QsInPAOSMCIwz9vulqvC7tdHKFDM5hX', NULL, '164.90.198.149', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMkMwT25oVnF2TWpERGozZGk5TmJLVmVZcklZVkhqZ09VTFh5WWo1UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sZWdhbC1rcmVkaXQuYmFua2RhZXJhaGJvam9uZWdvcm8uY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1771875941);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar_lain`
--

CREATE TABLE `surat_keluar_lain` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dokumentasi_db` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `bulan_tagihan` varchar(255) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `notaris` varchar(255) DEFAULT NULL,
  `notariil` varchar(255) DEFAULT NULL,
  `skmht` varchar(255) DEFAULT NULL,
  `apht` varchar(255) DEFAULT NULL,
  `fidusia` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dokumentasi_db` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id`, `tgl_bayar`, `bulan_tagihan`, `tahun`, `notaris`, `notariil`, `skmht`, `apht`, `fidusia`, `total`, `keterangan`, `dokumentasi_db`, `created_at`, `updated_at`) VALUES
(2, '2025-01-10', 'Oktober', '2024', 'ENI ZUBAIDAH', '0', '0', '0', '0', '19050000', 'NASABAH AN MAKHMUD FEBRIANTO , JUJUK ARIF BASUKI , NGUJIANTO , MUALIM , MUNAJAD, YASDI , LINA DWI MAWARNI , ALI NUR ROFIQ , MUHAMMAD SUCONDRO , M SAIFUL ANAM , PUDJIANTO , MUKAMAD SUNTORO , SISTIONO , ACHMAD MUNAWIR , SUSANTO MARGO UTOMO , CHOIRUL ANAM , SUSILOWATI', NULL, '2025-01-08 03:41:02', '2025-01-21 04:14:44'),
(4, '2025-01-16', 'Desember', '2024', 'FARIDA HIDAYATI', '0', '0', '0', '0', '1550000', 'NASABAH AN NURMAN SASMITO , INAATUS SYARIFAH , ALFI NUR FADHILA', NULL, '2025-01-16 04:03:30', '2025-01-16 04:03:30'),
(5, '2025-01-14', 'November', '2024', 'ENI ZUBAIDAH', '0', '0', '0', '0', '9020000', 'NASABAH AN MOKH MUNIR , YULIA PURWANINGTYASARI , SUGIANTO , WAHYU PUJI SETIAWAN , TRIAS SEFIRA , ROCHMAD CHAFIDZI ,WARSITO , CV 44 DEWI SRI , BAMBANG RETNO S, CHOIRUL ANAM , M IMAM ABDUL ALIM , CV DELAPAN DELAPAN , JAELAN , LUKITO , M REZA APREANDI , WAHYUDI , DODIK EKO C, MOH KHOIRUL MIN , M YUSUF ANSHORI , TEGUH ADI WIBOWO , PARJAN', NULL, '2025-01-16 04:23:14', '2025-01-21 04:14:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tidak_dijaminkan`
--

CREATE TABLE `tidak_dijaminkan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dokumentasi_db` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tukar_sementara`
--

CREATE TABLE `tukar_sementara` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_surat` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_rekening` varchar(255) DEFAULT NULL,
  `sebenarnya` varchar(255) DEFAULT NULL,
  `yang_ditukar` varchar(255) DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `foto`, `created_at`, `updated_at`) VALUES
(5, 'Legal Kredit BDB', 'admin@gmail.com', NULL, '$2y$12$Nb5HcTk0RO.x61auliLKs.JGmjYQS6MVybjO0f8NQs.z6p9wkKPde', NULL, 'Txq1RpNgtnBegm0zhg6oPxFnuOCJfhFsHh1Gke5r.jpg', '2024-09-25 19:15:02', '2026-02-23 05:14:18'),
(6, 'Petugas', 'petugas@gmail.com', NULL, '$2y$12$ESgk5xnan8UiiUyTAIHnGeOHx8H587e1fhvrzyEagvx7/Khylaf1e', NULL, 'EbQx6sFupnlzKal6cZ1syjwfFkTB9448GJBGBJjY.jpg', '2024-09-30 01:22:58', '2024-09-30 05:07:03'),
(14, 'Dummy', 'dummy@gmail.com', NULL, '$2y$12$Vygvitja8BodWjMj.0mNP.zKKuLFg10a4AdFqzR4nuX/lv/SsOOw.', NULL, NULL, '2025-02-07 10:02:50', '2025-02-07 10:02:50'),
(15, 'Rahardian Siti Purasih', 'purasihrahardian93@gmail.com', NULL, '$2y$12$oJW5ypKKfwhg6hyRX/IqDeQSmqrBAn/8Kxs3yRWpoTHdidBReJkUa', NULL, 'G5ZDRQXtHynnAjJ2cRyxdNYgKmdnClqOgjtZKDSq.jpg', '2026-02-23 08:00:32', '2026-02-23 08:54:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukan_nasabah`
--
ALTER TABLE `bukan_nasabah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jaminan_keluar`
--
ALTER TABLE `jaminan_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jaminan_masuk`
--
ALTER TABLE `jaminan_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lunas`
--
ALTER TABLE `lunas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `minuta`
--
ALTER TABLE `minuta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `roya`
--
ALTER TABLE `roya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `salinan`
--
ALTER TABLE `salinan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `surat_keluar_lain`
--
ALTER TABLE `surat_keluar_lain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tidak_dijaminkan`
--
ALTER TABLE `tidak_dijaminkan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tukar_sementara`
--
ALTER TABLE `tukar_sementara`
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
-- AUTO_INCREMENT untuk tabel `bukan_nasabah`
--
ALTER TABLE `bukan_nasabah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jaminan_keluar`
--
ALTER TABLE `jaminan_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `jaminan_masuk`
--
ALTER TABLE `jaminan_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lunas`
--
ALTER TABLE `lunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `minuta`
--
ALTER TABLE `minuta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `roya`
--
ALTER TABLE `roya`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `salinan`
--
ALTER TABLE `salinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar_lain`
--
ALTER TABLE `surat_keluar_lain`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tidak_dijaminkan`
--
ALTER TABLE `tidak_dijaminkan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tukar_sementara`
--
ALTER TABLE `tukar_sementara`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
