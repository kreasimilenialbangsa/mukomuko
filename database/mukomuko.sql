-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2022 at 03:53 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mukomuko`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `user_id`, `title`, `slug`, `description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Sekilas NU', 'sekilas-nu', '<p><strong>SEJARAH SINGKAT NU CARE-LAZISNU MUKOMUKO</strong></p>\r\n<p>&nbsp;</p>\r\n<p class=\"ql-align-justify\">NU CARE-LAZISNU adalah rebranding atau pintu masuk agar masyarakat global mengenal dengan adanya Lembaga Amil Zakat Infaq dan Shadaqah Nahdlatul UIama (LAZISNU).</p>\r\n<p class=\"ql-align-justify\">NU CARE-LAZISNU berdiri di kabupaten Mukomuko pada Tahun 2017. Sebagai acuan pergerakan NU CARE-LAZISNU berdasarkan SK PC.NU Kabupaten Mukomuko dengan Nomor : 435/SK/A.01/PCNU./ IX/2017 dan dikukuhkan oleh Pengurus Pusat dengan Nomor SK 121/SK/PP/Lazisnu/i/2018 tentang Pengesahan dan pemberian izin operasional kepada Lembaga Amil Zakat Infaq dan Shadaqah Nahdlatul Ulama (LAZISNU) Kabupaten Mukomuko.</p>\r\n<p class=\"ql-align-justify\">Surat Keputusan Pengesahan Lazisnu Mukomuko terebut mengacu pada Keputusan Menteri Agama Republik Indonesia Nomor: 255/Tahun 2016 tentang Pemberian izin kepada Yayasan Lembaga Amil Zakat Infak dan Shadaqah Nahdlatul Ulama sebagai amil skala Nasional tertanggal 26 Mei 2016 untuk melakukan pemungutan Zakat, Infaq dan Shadaqah kepada Masyarakat luas.</p>\r\n<p class=\"ql-align-justify\">NU CARE-LAZISNU merupakan lembaga Nirlaba milik perkumpulan Nahdaltul Ulama (NU) yang bertujuan berkhidmat dalam rangka membantu kesejahteraan umat, mengangkat harkat sosial dengan mendayagunakan dana Zakat Infak dan Shadaqah serta wakaf (ZISWAF)</p>\r\n<p class=\"ql-align-justify\">NU CARE-LAZISNU di Kabupaten Mukomuko lahir dan berdiri pada tahun 2017 berdasarkan rapat kerja Pengurus Cabang NU Mukomuko yang dipimpin oleh ketua PC NU K.H. Mukholid. S.Pd.I.. Kemudian pada tahun 2018 secara yuridis-formal LAZISNU disahkan serta diakui oleh dunia perbankan dan dikukuhkan berdasarkan SK Mentri Agama no. 255 tahun 2016.</p>\r\n<p class=\"ql-align-justify\">Dalam upaya meningkatkan kinerja dan meraih kepercayaan masyarakat, NUCARE-LAZISNU menerapkan sistem manajemen ISO 9001 : 2015 yang dikeluarkan oleh Badan Sertifikasi NRA dan UKAS manajemen sistem dengan nomor sertifikat : 49224 yang telah diterbitkan pada tanggal 21 Oktober 2016 dengan komitmen manajemen MANTAP (Modern, Akuntable, Transparan, Amanah, dan Profesional).</p>\r\n<p class=\"ql-align-justify\">Sampai saat ini NU Care-LAZISNU telah memiliki jaringan di enam kecamatan (MWC) dan 33 desa (Ranting) di Kabupaten Mukomuko. NU Care sebagai lembaga filantropi akan terus berupaya untuk meningkatkan kepercayaan dari para donatur yag semua sistem&nbsp;pencatatan dan penyalurannya akan bisa dilihat secara real time melalui sistem kami.</p>\r\n<p class=\"ql-align-justify\">NU Care-LAZISNU berfokus pada 4 pilar program: Pendidikan, kesehatan, ekonomi pengembangan ekonomi mandiri, dan kebencanaan. Kebencanaan adalah program NU Care yang fokus pada rescue. Ketika ada dan/atau setelah terjadinya bencana.</p>\r\n<p class=\"ql-align-justify\">Untuk menjalankan manajemen dan berbagai kegiatan, NUCARE Lazisnu Mukomuko berkantor di Jalan Wijaya Kusuma Desa Marga Mulya Sakti Kecamatan Penarik Kabupaten Mukomuko Provinsi Bengkulu</p>', 1, '2022-02-14 08:38:35', '2022-02-14 08:38:35', NULL),
(2, 1, 'Visi & Misi', 'visi-misi', '<p class=\"ql-align-center\" style=\"text-align: center;\"><strong>VISI MISI NUCARE LAZISNU</strong></p>\r\n<p class=\"ql-align-center\" style=\"text-align: center;\">&nbsp;</p>\r\n<p class=\"ql-align-center\" style=\"text-align: center;\"><strong>VISI</strong></p>\r\n<p>Bertekad menjadi Lembaga Pengelola Dana Masyarakat (Zakat, Infaq dan Shadaqah, dll) yang didayagunakan secara amanah dan profesional untuk pemberdayaan umat</p>\r\n<p class=\"ql-align-center\" style=\"text-align: center;\"><strong>MISI</strong></p>\r\n<p>1. Mendorong tumbuhnya kesadaran masyarakat untuk melakukan Zakat, Infaq dan Shadaqah dengan rutin dan tetap</p>\r\n<p>2. Mengumpulkan/menghimpun dan mendayagunakan dana Zakat, Infaq dan Shadaqah secara profesional, transparan, tepat guna dan tepat sasaran</p>\r\n<p>3. Menyelenggarakan program pemberdayaan masyarakat guna mengatasi problem kemiskinan, pengangguran dan minimnya akses pendidikan yang layak</p>', 1, '2022-02-14 08:39:16', '2022-02-14 08:39:23', NULL),
(3, 1, 'Pengurus', 'pengurus', '<p class=\"ql-align-center\" style=\"text-align: center;\"><strong>SUSUNAN LENGKAP PENGURUS NU CARE-LAZISNU MUKOMUKO</strong></p>\r\n<p class=\"ql-align-center\" style=\"text-align: center;\"><strong>MASA KHIDMAT TAHUN 2020 &ndash; 2025</strong></p>\r\n<p><strong>Penasishat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></p>\r\n<ul>\r\n<li>Ky. Muhayun</li>\r\n<li>Ky. Mukholid</li>\r\n<li>Ky. Daud, S.Ag.</li>\r\n<li>Ky. Safa&rsquo;at, S.Ag.</li>\r\n</ul>\r\n<p><strong>Ketua&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</strong>Wahid Nursodiq</p>\r\n<p><strong>Bendahara&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</strong>Subhan Asyari</p>\r\n<p><strong>Sekretaris</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: M. Riadi, S.Pd.I.</p>\r\n<p><strong>Kabag Armada</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Supriyono</p>\r\n<p><strong>Kasi Keuangan&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;Surya Puji Astuti</p>\r\n<p><strong>Kasi IT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;Mustika, S.Kom.</p>\r\n<p><strong>Driver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>&nbsp;Fatur Rohman, S.H.</p>', 1, '2022-02-14 08:39:57', '2022-02-14 08:40:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `user_id`, `title`, `image`, `description`, `link_url`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Lorem ipsum dolor is amet', '/banner/lorem-ipsum-dolor-is-amet_6209c755eb699.jpg', '<p>Lorem ipsum dolor is amet</p>', 'https://lazisnumukomuko.id/profil/', 1, '2022-02-13 20:07:02', '2022-02-13 20:07:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('image','video') COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `user_id`, `title`, `description`, `type`, `content`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Youtube 1', '<p>Youtube</p>', 'video', 'PMUt0lShZfs', 1, '2022-02-14 08:50:31', '2022-02-14 08:50:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `user_id`, `parent_id`, `name`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 'Penarik', 1, '2022-02-12 09:59:30', '2022-02-12 09:59:30', NULL),
(2, 1, 1, 'Test1', 1, '2022-02-12 09:59:52', '2022-02-12 09:59:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_09_051623_create_settings_table', 1),
(6, '2022_02_09_060921_create_permission_tables', 1),
(7, '2022_02_09_061717_create_banners_table', 1),
(8, '2022_02_09_065720_create_galleries_table', 1),
(9, '2022_02_09_070434_create_news_table', 1),
(10, '2022_02_09_072333_create_abouts_table', 1),
(11, '2022_02_09_172352_create_programs_table', 1),
(12, '2022_02_09_172648_create_ziswafs_table', 1),
(13, '2022_02_09_172843_create_services_table', 1),
(14, '2022_02_09_173530_create_news_categories_table', 1),
(15, '2022_02_09_173655_create_program_categories_table', 1),
(16, '2022_02_09_173758_create_ziswaf_categories_table', 1),
(17, '2022_02_10_170420_create_news_images_table', 2),
(18, '2022_02_12_091417_create_locations_table', 3),
(19, '2022_02_13_065633_create_program_news_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_highlight` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `user_id`, `title`, `slug`, `content`, `category_id`, `is_active`, `is_highlight`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Test', 'test', '<p>test</p>', 1, 1, 1, '2022-02-10 10:11:51', '2022-02-13 20:08:24', '2022-02-13 20:08:24'),
(2, 1, 'Test2', 'test2', '<p>test2</p>', 1, 1, 1, '2022-02-10 10:12:52', '2022-02-13 20:08:18', '2022-02-13 20:08:18'),
(3, 1, 'test3', 'test3', '<p>test3</p>', 1, 1, 1, '2022-02-10 10:15:04', '2022-02-13 20:08:14', '2022-02-13 20:08:14'),
(4, 1, 'Test5', 'test5', '<p>test5</p>', 1, 1, 1, '2022-02-10 10:15:41', '2022-02-13 20:08:09', '2022-02-13 20:08:09'),
(5, 1, 'Test6', 'test6', '<p>test6</p>', 1, 1, 1, '2022-02-10 10:17:24', '2022-02-13 20:08:04', '2022-02-13 20:08:04'),
(6, 1, 'Lorem ipsum dolor', 'lorem-ipsum-dolor', '<p>Loram ipsum dolor is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 1, 1, '2022-02-10 10:18:45', '2022-02-14 08:46:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `user_id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Sosial', 'sosial', '2022-02-10 18:27:58', '2022-02-10 18:27:58', NULL),
(2, 1, 'Kabar Lembaga', 'kabar-lembaga', '2022-02-11 09:23:14', '2022-02-11 09:23:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

CREATE TABLE `news_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_images`
--

INSERT INTO `news_images` (`id`, `file`, `news_id`, `created_at`, `updated_at`) VALUES
(1, '/news/test7_620554c643612.jpg', 6, '2022-02-10 10:18:45', '2022-02-10 11:09:10'),
(4, '/news/test7_620554c66122a.png', 6, '2022-02-10 11:09:10', '2022-02-10 11:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` int(11) NOT NULL,
  `target_dana` int(11) NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_urgent` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `user_id`, `title`, `slug`, `location`, `target_dana`, `end_date`, `category_id`, `description`, `image`, `is_urgent`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Bantu kawan kita bersama', 'bantu-kawan-kita-bersama', 1, 1000000, '2022-02-13', 1, '<p>Test</p>', '/program/test_6207e8ed12fd2.jpg', 1, 1, '2022-02-12 10:05:49', '2022-02-14 00:16:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_categories`
--

CREATE TABLE `program_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_categories`
--

INSERT INTO `program_categories` (`id`, `user_id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Kemanusiaan', 'kemanusiaan', '2022-02-11 09:30:16', '2022-02-11 09:30:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_news`
--

CREATE TABLE `program_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2022-02-11 17:16:44', '2022-02-11 17:16:44'),
(2, 'Kabupaten', 'web', '2022-02-11 17:16:44', '2022-02-11 17:16:44'),
(3, 'Kecamatan', 'web', '2022-02-11 17:17:20', '2022-02-11 17:17:20'),
(4, 'Desa', 'web', '2022-02-11 17:17:20', '2022-02-11 17:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `title`, `slug`, `description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Daftar Rekening', 'daftar-rekening', '<p>Untuk Menyalurkan Infak, Zakat dan Sedekah dapat dilakukan secara Langsung dengan cara Transfer Ke Nomor Rekening di Bawah Ini:</p>\r\n<p><strong>BANK RAKYAT INDONESIA</strong><br /><strong>No. Rek&nbsp;: 586-01-016236-53-3&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><br /><strong>Lazisnu PC-NU Kab Mukomuko</strong></p>\r\n<p><strong>BANK BENGKULU</strong><br /><strong>No Rek&nbsp;&nbsp;&nbsp;&nbsp;: 5030201039382&nbsp;</strong><br /><strong>Lazisnu Kabupaten Mukomuko</strong></p>', 1, '2022-02-12 09:20:36', '2022-02-14 08:36:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@email', NULL, '$2y$10$5AiRBHrtUzbBCU7MeS5qVuPj110f22lIjTCpCkogCCr8H75droLHS', NULL, 1, '2022-02-10 16:24:46', '2022-02-11 10:16:15', NULL),
(2, 'Kabupaten', 'kabupaten@email', NULL, '$2y$10$kXXMQalYUDfXPKWzhWb/D.QUkDGjv2iqCgpvE1975iOiGBfcnN8I2', NULL, 1, '2022-02-11 11:13:48', '2022-02-11 11:13:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ziswafs`
--

CREATE TABLE `ziswafs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ziswafs`
--

INSERT INTO `ziswafs` (`id`, `user_id`, `category_id`, `title`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Zakar Mall', 1, '2022-02-12 09:28:34', '2022-02-12 09:28:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ziswaf_categories`
--

CREATE TABLE `ziswaf_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ziswaf_categories`
--

INSERT INTO `ziswaf_categories` (`id`, `user_id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Zakat', 'zakat', '2022-02-11 09:40:45', '2022-02-11 09:40:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_images`
--
ALTER TABLE `news_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_categories`
--
ALTER TABLE `program_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_news`
--
ALTER TABLE `program_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `ziswafs`
--
ALTER TABLE `ziswafs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ziswaf_categories`
--
ALTER TABLE `ziswaf_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_images`
--
ALTER TABLE `news_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_categories`
--
ALTER TABLE `program_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_news`
--
ALTER TABLE `program_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ziswafs`
--
ALTER TABLE `ziswafs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ziswaf_categories`
--
ALTER TABLE `ziswaf_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
