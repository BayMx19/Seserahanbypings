-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2025 pada 08.35
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seserahanbypings`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2025_07_10_084653_create_m_produk_table', 1),
(5, '2025_07_13_040640_create_produk_harga_table', 1),
(6, '2025_07_14_100125_create_t_keranjang_table', 1),
(7, '2025_07_14_100309_create_t_pesanan_table', 1),
(8, '2025_07_14_100411_create_t_detail_pesanan_table', 1),
(9, '2025_07_14_100506_create_t_pembayaran_table', 1),
(10, '2025_07_14_100514_create_t_pengiriman_table', 1),
(11, '2025_07_14_100657_create_t_review_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_produk`
--

CREATE TABLE `m_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_produk`
--

INSERT INTO `m_produk` (`id`, `nama`, `kategori`, `stok`, `deskripsi`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Terarium Elegan', 'Seserahan', 999, 'Hadirkan momen spesialmu dengan sentuhan elegan dari Seserahan by Pings menggunakan box terarium kaca premium dengan rangka emas yang mewah. Setiap seserahan dirangkai secara estetik, dilengkapi dengan bunga-bunga artifisial bernuansa soft pink & putih yang menambah kesan romantis dan eksklusif.\r\nIsi seserahan dapat disesuaikan, seperti perlengkapan mandi, skincare, pakaian, atau make-up, yang ditata rapi dan cantik dalam box kaca transparan berbentuk unik. Cocok untuk momen lamaran, akad, hingga pernikahan.', 'gambar_produk/nBecX2GE7lA4x4FUK8ibKyvrX4KVmZAXlsZa60sm.jpg', 'ACTIVE', '2025-08-02 23:20:52', '2025-08-02 23:20:52'),
(2, 'Box Putih Lengkung Elegan', 'Seserahan', 999, 'Lengkapi momen lamaran atau pernikahanmu dengan seserahan elegan dari Seserahan by Pings, kini hadir dalam varian box Putih Lengkung yang simpel namun tetap berkelas. Dengan nuansa dominan putih dan pelindung akrilik lengkung transparan, tampilan seserahan jadi makin bersih, modern, dan estetik.\r\nDihiasi dengan rangkaian bunga artifisial bernuansa ungu muda, pink, dan putih yang tertata rapi di bagian depan, cocok untuk mempercantik item seserahan seperti handuk, pakaian, perlengkapan ibadah, dan lainnya.', 'gambar_produk/AUZFxW9TdoLJIZlQrL1iWWZkcq8PXvVVvkcf76dp.jpg', 'ACTIVE', '2025-08-02 23:22:36', '2025-08-02 23:22:36'),
(3, 'Box Coklat Lengkung Natural', 'Seserahan', 999, 'Tampil sederhana namun tetap anggun, Seserahan by Pings kini hadir dalam varian Box Coklat Lengkung yang mengusung nuansa natural dan elegan. Menggunakan dudukan kayu coklat muda dengan penutup akrilik lengkung transparan, cocok untuk kamu yang menyukai tema rustic, earthy, atau minimalis modern.\r\nDilengkapi dengan dekorasi bunga artifisial bernuansa biru muda, putih, dan abu-abu yang ditata rapi di satu sisi, mempercantik tampilan item seserahan seperti perlengkapan mandi, pakaian, atau keperluan pribadi lainnya.', 'gambar_produk/RkJ6CSu98slguDyiGqsE0oqclftXBB7SYq3zq3tI.jpg', 'ACTIVE', '2025-08-02 23:23:27', '2025-08-02 23:23:27'),
(4, 'Pearl Luxury Gold Edition', 'Seserahan', 999, 'Wujudkan momen spesial dengan kemewahan yang elegan melalui Seserahan by Pings seri Pearl Luxury Gold. Didesain dengan nampan kaca berbingkai emas mewah yang dihiasi dengan deretan mutiara besar di sekelilingnya, menjadikannya pilihan sempurna untuk menyajikan perhiasan, mahar, hingga barang berharga lainnya.\r\nDekorasi bunga artifisial premium bernuansa merah marun, putih, dan sentuhan emas ditata eksklusif dengan ornamen daun emas dan elemen glamor lainnya, menciptakan tampilan yang anggun dan berkelas. Dilengkapi dengan stand display perhiasan dan box terarium kaca kecil untuk penyimpanan mahar atau uang tunai, membuat keseluruhan tampilan sangat menawan dan fotogenik.', 'gambar_produk/jNjfOhynI9RihxVWShlum3fyHPxJE4TVwwGm4sOr.jpg', 'ACTIVE', '2025-08-02 23:24:20', '2025-08-02 23:24:20'),
(5, 'Mahar 4D', 'Mahar', 999, 'Mahar dengan bahan frame full akrilik (transparan) ukuran 30x40cm desain mahar bisa dinikmati sampai kebelakang dengan full title garden', 'gambar_produk/r7TAK4oK5VYRdLAyANFTD93G1rNHAMrSkqI1cZWM.jpg', 'ACTIVE', '2025-08-02 23:27:37', '2025-08-02 23:27:37'),
(6, 'Mahar Full Akrilik', 'Mahar', 999, 'Mahar dengan bahan frame full akrilik (transparan) ukuran 30x40cm. desain mahar menyesuaikan dengan finsihing nama timbul. free replika LM atau replikar perhiasan include uang mainan dan anggrek artificial premium.', 'gambar_produk/tPsNG7c9ZsdpxJ42QH7MLji4RvNsL01LesjrAh6D.jpg', 'ACTIVE', '2025-08-02 23:29:18', '2025-08-02 23:29:18'),
(7, 'Mahar Putih', 'Mahar', 999, 'framel putih uk 30x40 kedalaman 3,5 cm I finising akrilik brush grafir x nama timbu -| kombinasi anggrek/danfull dried flower kombinasi I simple dan cantik I bisa custom warna.', 'gambar_produk/4ub5jdntH3qHxLpVjL7jdsuoXzKQzyEsmYuYE07l.jpg', 'ACTIVE', '2025-08-02 23:30:40', '2025-08-02 23:30:40'),
(8, 'Mahar Aksara', 'Mahar', 998, 'Mahar putih aksara ukuran 30x40 kedalaman 3,5 cm I transparan finishing tulisan timbul akrilik mix print artpaper I replika uang dan koin I kombinasi anggrek + dried flower I bisa custom warna.', 'gambar_produk/TdwXadJheknKote8qudnL1nMAj55Vtnv67CZZb45.jpg', 'ACTIVE', '2025-08-02 23:31:41', '2025-08-02 23:33:43');

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
-- Struktur dari tabel `produk_harga`
--

CREATE TABLE `produk_harga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `layanan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_harga`
--

INSERT INTO `produk_harga` (`id`, `product_id`, `layanan`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sewa Box', 55000, '2025-08-02 23:20:52', '2025-08-02 23:20:52'),
(2, 1, 'Jasa', 20000, '2025-08-02 23:20:52', '2025-08-02 23:20:52'),
(3, 1, 'Sewa + Jasa Hias', 60000, '2025-08-02 23:20:52', '2025-08-02 23:20:52'),
(4, 2, 'Sewa Box', 50000, '2025-08-02 23:22:36', '2025-08-02 23:22:36'),
(5, 2, 'Jasa', 20000, '2025-08-02 23:22:36', '2025-08-02 23:22:36'),
(6, 2, 'Sewa + Jasa Hias', 55000, '2025-08-02 23:22:36', '2025-08-02 23:22:36'),
(7, 3, 'Sewa Box', 45000, '2025-08-02 23:23:27', '2025-08-02 23:23:27'),
(8, 3, 'Jasa', 20000, '2025-08-02 23:23:27', '2025-08-02 23:23:27'),
(9, 3, 'Sewa + Jasa Hias', 50000, '2025-08-02 23:23:27', '2025-08-02 23:23:27'),
(10, 4, 'Sewa Box', 60000, '2025-08-02 23:24:20', '2025-08-02 23:24:20'),
(11, 4, 'Jasa', 20000, '2025-08-02 23:24:20', '2025-08-02 23:24:20'),
(12, 4, 'Sewa + Jasa Hias', 70000, '2025-08-02 23:24:20', '2025-08-02 23:24:20'),
(13, 5, 'Beli', 699000, '2025-08-02 23:27:37', '2025-08-02 23:27:37'),
(14, 6, 'Beli', 500000, '2025-08-02 23:29:18', '2025-08-02 23:29:18'),
(15, 7, 'Beli', 300000, '2025-08-02 23:30:40', '2025-08-02 23:30:40'),
(16, 8, 'Beli', 400000, '2025-08-02 23:31:41', '2025-08-02 23:31:41');

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
('0IzMT0g1N7tR7mB3U1NFwmM7yPdGsnCLPHKFrIf9', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQkVzTklkMHdldnVVZnpUTExtd1JJM0V3a2xaM2JaTXFsa1JVVUdraCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi90cmFuc2Frc2kiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc1NDIwMTMwMzt9fQ==', 1754202826),
('HdRRSyV0OoX6SaMEE7Wptfrt3EPkOqYcZMgHVYa7', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaDhGbVB5aDF6SWdQRmJVcWx0N09iRENmQXp1MWpBYkN2dGo3bDRhMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yaXdheWF0LXBlc2FuYW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc1NDIwMjA3Njt9fQ==', 1754202801);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_pesanan`
--

CREATE TABLE `t_detail_pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `keranjang_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_keranjang`
--

CREATE TABLE `t_keranjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `pembeli_id` bigint(20) UNSIGNED NOT NULL,
  `layanan_harga_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Belum Checkout',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pembayaran`
--

CREATE TABLE `t_pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `tanggal_pembayaran` datetime DEFAULT NULL,
  `status_pembayaran` varchar(255) NOT NULL DEFAULT 'Belum Dibayar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengiriman`
--

CREATE TABLE `t_pengiriman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `metode_pengiriman` varchar(255) NOT NULL,
  `tanggal_pengiriman` datetime DEFAULT NULL,
  `tanggal_diterima` datetime DEFAULT NULL,
  `status_pengiriman` varchar(255) NOT NULL DEFAULT 'Belum Dikirim',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pesanan`
--

CREATE TABLE `t_pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembeli_id` bigint(20) UNSIGNED NOT NULL,
  `kode_invoice` varchar(255) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `tanggal_acara` date DEFAULT NULL,
  `total_harga` bigint(20) NOT NULL,
  `status_pesanan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_review`
--

CREATE TABLE `t_review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review_text` longtext DEFAULT NULL,
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
  `nohp` varchar(13) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'ACTIVE',
  `alamat` text DEFAULT NULL,
  `provinsi` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `kecamatan` text DEFAULT NULL,
  `kelurahan` text DEFAULT NULL,
  `RT` text DEFAULT NULL,
  `RW` text DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `nohp`, `email`, `email_verified_at`, `password`, `role`, `foto_profil`, `jenis_kelamin`, `status`, `alamat`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `RT`, `RW`, `kode_pos`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '082191927762', 'admin@seserahanbypings.site', NULL, '$2y$12$GNv5ao6gBs39nPrbYB48Z.N3D2fRPnaobykOhOK4yLkcRgC8uDFnO', 'Admin', '', 'Perempuan', 'ACTIVE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Pembeli', '082191927762', 'pembeli@seserahanbypings.site', NULL, '$2y$12$hL82/lIuSQGP1mae6rNvzO7ptiunrMvyvjOE1WP8uwNkqfeRO1HsS', 'User', '', 'Laki-Laki', 'ACTIVE', 'Jl. Contoh Alamat No. 123', 'Jawa Barat', 'Bandung', 'Coblong', 'Ciumbuleuit', '01', '02', '40141', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_produk`
--
ALTER TABLE `m_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `produk_harga`
--
ALTER TABLE `produk_harga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_harga_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `t_detail_pesanan`
--
ALTER TABLE `t_detail_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_detail_pesanan_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `t_detail_pesanan_keranjang_id_foreign` (`keranjang_id`);

--
-- Indeks untuk tabel `t_keranjang`
--
ALTER TABLE `t_keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_keranjang_produk_id_foreign` (`produk_id`),
  ADD KEY `t_keranjang_pembeli_id_foreign` (`pembeli_id`),
  ADD KEY `t_keranjang_layanan_harga_id_foreign` (`layanan_harga_id`);

--
-- Indeks untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_pembayaran_pesanan_id_foreign` (`pesanan_id`);

--
-- Indeks untuk tabel `t_pengiriman`
--
ALTER TABLE `t_pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_pengiriman_pesanan_id_foreign` (`pesanan_id`);

--
-- Indeks untuk tabel `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `t_pesanan_kode_invoice_unique` (`kode_invoice`),
  ADD KEY `t_pesanan_pembeli_id_foreign` (`pembeli_id`);

--
-- Indeks untuk tabel `t_review`
--
ALTER TABLE `t_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_review_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `t_review_produk_id_foreign` (`produk_id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `m_produk`
--
ALTER TABLE `m_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produk_harga`
--
ALTER TABLE `produk_harga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `t_detail_pesanan`
--
ALTER TABLE `t_detail_pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_keranjang`
--
ALTER TABLE `t_keranjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_pengiriman`
--
ALTER TABLE `t_pengiriman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_pesanan`
--
ALTER TABLE `t_pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_review`
--
ALTER TABLE `t_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk_harga`
--
ALTER TABLE `produk_harga`
  ADD CONSTRAINT `produk_harga_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `m_produk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_detail_pesanan`
--
ALTER TABLE `t_detail_pesanan`
  ADD CONSTRAINT `t_detail_pesanan_keranjang_id_foreign` FOREIGN KEY (`keranjang_id`) REFERENCES `t_keranjang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_detail_pesanan_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `t_pesanan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_keranjang`
--
ALTER TABLE `t_keranjang`
  ADD CONSTRAINT `t_keranjang_layanan_harga_id_foreign` FOREIGN KEY (`layanan_harga_id`) REFERENCES `produk_harga` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_keranjang_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_keranjang_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `m_produk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD CONSTRAINT `t_pembayaran_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `t_pesanan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_pengiriman`
--
ALTER TABLE `t_pengiriman`
  ADD CONSTRAINT `t_pengiriman_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `t_pesanan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD CONSTRAINT `t_pesanan_pembeli_id_foreign` FOREIGN KEY (`pembeli_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_review`
--
ALTER TABLE `t_review`
  ADD CONSTRAINT `t_review_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `t_pesanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_review_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `m_produk` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
