-- MySQL Database Dump untuk Sistem Pakar Penyakit Ikan Lele
-- Converted from SQLite

SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------
-- Table structure for table `migrations`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_20_113227_create_penyakit_table', 1),
(5, '2025_06_20_113258_create_gejala_table', 1),
(6, '2025_06_20_113327_create_basis_pengetahuan_table', 1),
(7, '2025_10_05_115609_add_photo_to_penyakit_table', 1);

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('admin', 'peternak') NOT NULL,
  `photo` VARCHAR(255) NULL DEFAULT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2025-10-09 07:56:52', '$2y$12$FCDIkMysuwYpbZVTzpSK5Og9cpg4HiwwiwYTlcmda8cgaM9gFCa0e', 'admin', 'photos/9qloNxQZthin2qJpD1JzyCl4h3uQZVSyFGRFKIv6.jpg', 'BeLfiAgeVP2cwW7C1Avvs0bjUpuo1pSdv8ThZkmqDAbdDRZh84oCgmfmXaOa', '2025-10-09 07:56:52', '2025-10-09 09:58:50'),
(2, 'Peternak 1', 'peternak1@gmail.com', '2025-10-09 07:56:52', '$2y$12$SRjjAyCjHUKS2K77ol6Qfu7yroav.tKbtouGVsAL9ugRCZvVDlDS6', 'peternak', NULL, 'ZzgKz7yxPJ', '2025-10-09 07:56:52', '2025-10-09 07:56:52'),
(3, 'Nopi', 'nopi14@gmail.com', NULL, '$2y$12$U9.l1QBIxtIAae0ORJXwj.of1k7RlMXLj11rsx.BZda6Iw5yMqowC', 'peternak', NULL, NULL, '2025-10-09 08:00:43', '2025-10-09 08:00:43');

-- --------------------------------------------------------
-- Table structure for table `password_reset_tokens`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `sessions`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` VARCHAR(255) NOT NULL,
  `user_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `ip_address` VARCHAR(45) NULL DEFAULT NULL,
  `user_agent` TEXT NULL DEFAULT NULL,
  `payload` LONGTEXT NOT NULL,
  `last_activity` INT NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `cache`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` VARCHAR(255) NOT NULL,
  `value` MEDIUMTEXT NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `cache_locks`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` VARCHAR(255) NOT NULL,
  `owner` VARCHAR(255) NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `jobs`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` VARCHAR(255) NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `attempts` TINYINT UNSIGNED NOT NULL,
  `reserved_at` INT UNSIGNED NULL DEFAULT NULL,
  `available_at` INT UNSIGNED NOT NULL,
  `created_at` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `job_batches`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `total_jobs` INT NOT NULL,
  `pending_jobs` INT NOT NULL,
  `failed_jobs` INT NOT NULL,
  `failed_job_ids` LONGTEXT NOT NULL,
  `options` MEDIUMTEXT NULL DEFAULT NULL,
  `cancelled_at` INT NULL DEFAULT NULL,
  `created_at` INT NOT NULL,
  `finished_at` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `failed_jobs`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `penyakit`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `penyakit`;
CREATE TABLE `penyakit` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` VARCHAR(50) NOT NULL,
  `nama` VARCHAR(255) NOT NULL,
  `deskripsi` TEXT NULL DEFAULT NULL,
  `solusi` TEXT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `photo` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `penyakit_kode_unique` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `penyakit` (`id`, `kode`, `nama`, `deskripsi`, `solusi`, `created_at`, `updated_at`, `photo`) VALUES
(6, 'P001', 'Bintik Bintik putih (White Spot Disease)', 'Penyakit bintik putih adalah salah satu penyakit paling umum yang menyerang ikan lele dan ikan air tawar lainnya. Penyakit ini disebabkan oleh parasit kecil bernama Ichthyophthirius multifiliis yang menempel di kulit, sirip, dan insang ikan', 'Isolasi ikan sakit agar tidak menulari ikan lain. Perbaiki kualitas air dengan mengganti 30–50% air kolam secara bertahap dan tambahkan aerasi agar oksigen terjaga. Lakukan perendaman dengan garam ikan (250–500 g/m³) .dan cara  Alaminya: rendaman daun ketapang selama 24 jam untuk menekan parasit dan mengurangi stres ikan. Pantau kondisi ikan setiap hari dan ulangi perendaman bila perlu sampai bintik putih berkurang', '2025-10-09 08:07:38', '2025-10-09 09:47:49', 'photos/5JMYvjJx86rg5KsYuatH5Uuu4f6TIh67lIwLIOtN.jpg'),
(7, 'P002', 'Infeksi Bakteri (Bacterial Septicemia )', 'Penyakit infeksi bakteri adalah salah satu penyakit yang sering menyerang ikan lele, terutama jika kualitas air kolam buruk atau ikan sedang stres. Penyakit ini disebabkan oleh bakteri berbahaya, seperti Aeromonas atau Pseudomonas, yang masuk ke tubuh ikan melalui luka di kulit atau sirip', 'Pisahkan ikan yang luka atau terlihat sakit. Bersihkan kolam dari sisa pakan dan kotoran dasar kolam. Berikan antibiotik seperti oxytetracycline dicampur ke pakan (50–75 mg/kg pakan) selama 7–10 hari. Alami: bawang putih ditumbuk atau diekstrak dicampur ke pakan untuk menekan bakteri. Perhatikan kualitas air agar amonia dan nitrit tetap rendah', '2025-10-09 08:08:34', '2025-10-09 09:48:57', 'photos/N7xJ5hRYCBLLWFw9LRYisILo3BiVhI3bZVKtk3rb.png'),
(8, 'P003', 'Busuk sirip  (Fin Rot)', 'Penyakit busuk sirip adalah penyakit yang menyebabkan sirip ikan menjadi rusak, sobek, dan tampak membusuk. Penyakit ini biasanya disebabkan oleh bakteri seperti Aeromonas atau Pseudomonas, namun kadang juga diperparah oleh jamur jika luka sudah lama tidak sembuh', 'Kurangi kepadatan ikan, jaga kebersihan kolam, ganti air 30–50% secara rutin. Perendaman dengan garam ikan atau KMnO₄ dapat membantu mengurangi infeksi bakteri penyebab sirip membusuk. Alami: kunyit ditumbuk halus, air perasannya diteteskan ke kolam sebagai antiseptik alami. Lakukan pemantauan sirip setiap hari sampai pertumbuhan sirip membaik', '2025-10-09 08:09:24', '2025-10-09 09:49:33', 'photos/7FA8Nd51hvGKL3EQNRWBQo5nEbwcpn4wSkMStd1B.png'),
(9, 'P004', 'Jamur Kapas (Saprolegniasis )', 'Penyakit jamur kapas ditandai dengan munculnya gumpalan putih seperti kapas di kulit, kepala, atau sirip ikan. Penyakit ini disebabkan oleh jamur Saprolegnia sp. yang biasanya tumbuh pada luka ikan atau kulit yang lemah akibat stres', 'Buang ikan mati, perbaiki kualitas air, dan isolasi ikan yang sakit. Lakukan perendaman dengan malachite green atau methylene blue dosis rendah selama 30–60 menit. Alami: rendaman air rebusan daun pepaya atau daun ketapang selama 12–24 jam untuk menekan jamur. Ulangi sesuai tingkat keparahan infeksi', '2025-10-09 08:10:21', '2025-10-09 09:50:41', 'photos/usKUH2RkS2AEeE7uQnyX8IIdNsIvVAtucaIlvXo2.png'),
(10, 'P005', 'Kutu Ikan  (Argulus)', 'Penyakit kutu ikan disebabkan oleh parasit Argulus sp., yaitu kutu kecil yang menempel di kulit atau sirip ikan dan menghisap darah', 'Tangkap ikan yang terinfestasi secara manual bila jumlah sedikit. Lakukan perendaman dengan formalin dosis rendah atau garam ikan. Alami: rendaman air rebusan tembakau dapat membantu mengusir kutu. Jaga kebersihan kolam dan lakukan pengeringan kolam sebelum isi ulang air agar siklus hidup kutu terputus', '2025-10-09 08:14:08', '2025-10-09 09:51:14', 'photos/o44ZzwwCwMxlqXAEOCmj65aROJhy6pzQcku54Wmr.png'),
(11, 'P006', 'Perut bengkak (Dropsy)', 'Penyakit perut bengkak (Dropsy) terjadi karena penumpukan cairan di dalam tubuh ikan, biasanya akibat infeksi bakteri atau gangguan organ dalam seperti ginjal dan hati', 'Isolasi ikan dengan perut buncit dan sisik terangkat. Ganti air secara rutin, pastikan kualitas air baik dan oksigen cukup. Berikan antibiotik ke pakan bila infeksi sekunder muncul. Alami: campurkan daun pepaya atau meniran ke pakan untuk memperkuat daya tahan tubuh ikan. Pantau pertumbuhan dan kondisi perut ikan setiap hari', '2025-10-09 08:15:04', '2025-10-09 09:51:23', 'photos/HtjVcfuS1z3aaOr5HbY8312mmd0swpZu7eYC3Tun.jpg'),
(12, 'P007', 'Mata menonjol (Exophthalmia)', 'Penyakit mata menonjol menyebabkan mata ikan tampak keluar dari rongganya. Penyakit ini bisa disebabkan oleh infeksi bakteri, tekanan osmotik, atau gangguan organ dalam', 'Pisahkan ikan dengan mata menonjol. Pastikan kualitas air optimal (oksigen tinggi, amonia rendah). Berikan antibiotik dalam pakan bila terlihat infeksi bakteri. Alami: bawang putih dicampur pakan untuk mempercepat pemulihan jaringan mata. Amati perkembangan mata setiap 2–3 hari', '2025-10-09 08:16:05', '2025-10-09 09:51:33', 'photos/9aC88QdvbbhSLRqIEf32UJPuVYODKrMBvh6uUQLC.png'),
(13, 'P008', 'Penyakit Insang (Gill Disease)', 'Penyakit insang menyerang bagian insang ikan yang berfungsi untuk bernapas. Penyakit ini bisa disebabkan oleh bakteri, jamur, atau parasit', 'Tambahkan aerasi, ganti 30–50% air secara rutin, perendaman dengan KMnO₄ atau formalin dosis rendah untuk menekan bakteri/parasit pada insang. Alami: rebusan daun ketapang dimasukkan ke kolam untuk membantu membersihkan insang. Jangan terlalu padatkan ikan agar insang tidak teriritasi', '2025-10-09 08:16:50', '2025-10-09 09:51:42', 'photos/CPnRwZfCd6otndvfWcdpf2HOc7gKIHyxcSSyuYZi.jpg'),
(14, 'P009', 'Luka pada tubuh (Ulcer disease)', 'Penyakit luka pada tubuh disebabkan oleh infeksi bakteri atau jamur yang menyerang kulit ikan. Biasanya muncul setelah ikan terluka atau stres', 'Isolasi ikan yang luka, perendaman dengan garam ikan, dan pemberian antibiotik bila parah. Alami: campuran bawang putih dan daun pepaya sebagai antibakteri alami. Jaga kualitas air tetap stabil, kurangi kepadatan, dan lakukan penggantian air rutin', '2025-10-09 08:17:32', '2025-10-09 09:51:53', 'photos/pyXU87cl23MG1zfuCYovai3CjQJX07fmb2J6sI3m.png'),
(15, 'P010', 'Penyakit kuning (Jaundice)', 'Penyakit kuning menyebabkan warna tubuh ikan berubah menjadi kekuningan, terutama di bagian perut dan sirip. Kondisi ini biasanya disebabkan oleh gangguan hati atau masalah metabolisme', 'Beri pakan berkualitas (protein ≥30%, vitamin A, C, D, E, probiotik). Alami: tambahkan daun pepaya muda, azolla, atau cacing tanah. Pantau pertumbuhan dan kondisi fisik ikan', '2025-10-09 08:18:30', '2025-10-09 09:52:04', 'photos/IjyKA5yhcJiDyQDEDzUtt3JhDOCjty5a3K398FjB.png');

-- --------------------------------------------------------
-- Table structure for table `gejala`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `gejala`;
CREATE TABLE `gejala` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` VARCHAR(50) NOT NULL,
  `nama` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gejala_kode_unique` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `gejala` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(16, 'G001', 'Bintik putih kecil seperti garam di kulit, sirip, atau insang', '2025-10-09 08:20:23', '2025-10-09 08:20:23'),
(17, 'G002', 'Ikan menggesek tubuh ke dinding kolam', '2025-10-09 08:20:44', '2025-10-09 08:20:50'),
(18, 'G003', 'Luka merah terbuka di tubuh ikan', '2025-10-09 08:21:15', '2025-10-09 08:21:15'),
(19, 'G004', 'Bercak merah pada kulit', '2025-10-09 08:21:34', '2025-10-09 08:21:34'),
(20, 'G005', 'Luka bernanah/berair di tubuh ikan', '2025-10-09 08:21:58', '2025-10-09 08:21:58'),
(21, 'G006', 'Sirip rusak atau membusuk', '2025-10-09 08:22:18', '2025-10-09 08:22:18'),
(22, 'G007', 'Ujung sirip tampak sobek', '2025-10-09 08:22:38', '2025-10-09 08:22:38'),
(23, 'G008', 'Sirip berubah warna menjadi putih/gelap', '2025-10-09 08:23:03', '2025-10-09 08:23:03'),
(24, 'G009', 'Gumpalan putih seperti kapas di kulit/kepala/sirip', '2025-10-09 08:23:33', '2025-10-09 08:23:33'),
(25, 'G010', 'Luka dengan serabut putih menempel', '2025-10-09 08:24:19', '2025-10-09 08:24:19'),
(26, 'G011', 'Parasit pipih menempel di kulit', '2025-10-09 08:24:35', '2025-10-09 08:24:35'),
(27, 'G012', 'Luka kecil di sekitar area gigitan', '2025-10-09 08:24:54', '2025-10-09 08:24:54'),
(28, 'G013', 'Ikan sering meloncat ke permukaan', '2025-10-09 08:25:19', '2025-10-09 08:25:19'),
(29, 'G014', 'Perut sangat buncit', '2025-10-09 08:25:46', '2025-10-09 08:25:46'),
(30, 'G015', 'Sisik mengangkat keluar seperti landak', '2025-10-09 08:26:03', '2025-10-09 08:26:03'),
(31, 'G016', 'Mata menonjol keluar', '2025-10-09 08:26:29', '2025-10-09 08:26:29'),
(32, 'G017', 'Mata keruh/berwarna putih', '2025-10-09 08:27:50', '2025-10-09 08:27:50'),
(33, 'G018', 'Insang rusak, kusam, kotor, atau membusuk', '2025-10-09 08:28:27', '2025-10-09 08:28:27'),
(34, 'G019', 'Warna insang berubah dari merah cerah ke warna coklat/hitam', '2025-10-09 08:28:49', '2025-10-09 08:28:49'),
(35, 'G020', 'Kulit tampak pucat/kusam', '2025-10-09 08:29:17', '2025-10-09 08:29:17'),
(36, 'G021', 'Kulit mengelupas/lecet', '2025-10-09 08:29:36', '2025-10-09 08:29:36'),
(37, 'G022', 'Bercak putih keabu-abuan di tubuh', '2025-10-09 08:29:52', '2025-10-09 08:29:52'),
(38, 'G023', 'Tubuh ikan berwarna kuning', '2025-10-09 08:31:40', '2025-10-09 08:31:40'),
(39, 'G024', 'Tubuh kurus dibanding ikan lain', '2025-10-09 08:32:01', '2025-10-09 08:32:01'),
(40, 'G025', 'Ekor rusak atau membusuk', '2025-10-09 08:32:25', '2025-10-09 08:32:25');

-- --------------------------------------------------------
-- Table structure for table `basis_pengetahuan`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `basis_pengetahuan`;
CREATE TABLE `basis_pengetahuan` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_penyakit` BIGINT UNSIGNED NOT NULL,
  `id_gejala` BIGINT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `basis_pengetahuan_id_penyakit_foreign` (`id_penyakit`),
  KEY `basis_pengetahuan_id_gejala_foreign` (`id_gejala`),
  CONSTRAINT `basis_pengetahuan_id_penyakit_foreign` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id`) ON DELETE CASCADE,
  CONSTRAINT `basis_pengetahuan_id_gejala_foreign` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `basis_pengetahuan` (`id`, `id_penyakit`, `id_gejala`, `created_at`, `updated_at`) VALUES
(27, 6, 16, NULL, NULL),
(28, 6, 17, NULL, NULL),
(29, 6, 37, NULL, NULL),
(30, 7, 18, NULL, NULL),
(31, 7, 19, NULL, NULL),
(32, 7, 20, NULL, NULL),
(33, 7, 35, NULL, NULL),
(34, 7, 36, NULL, NULL),
(35, 8, 21, NULL, NULL),
(36, 8, 22, NULL, NULL),
(38, 8, 23, NULL, NULL),
(39, 9, 24, NULL, NULL),
(40, 9, 25, NULL, NULL),
(41, 10, 26, NULL, NULL),
(42, 10, 27, NULL, NULL),
(43, 10, 28, NULL, NULL),
(44, 11, 29, NULL, NULL),
(45, 11, 30, NULL, NULL),
(46, 12, 31, NULL, NULL),
(47, 12, 32, NULL, NULL),
(48, 13, 33, NULL, NULL),
(49, 13, 34, NULL, NULL),
(50, 14, 19, NULL, NULL),
(51, 14, 25, NULL, NULL),
(52, 14, 35, NULL, NULL),
(53, 14, 36, NULL, NULL),
(54, 15, 38, NULL, NULL),
(55, 15, 39, NULL, NULL),
(56, 8, 40, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
COMMIT;
