-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Apr 2022 pada 08.09
-- Versi server: 5.7.33
-- Versi PHP: 8.0.6

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
-- Struktur dari tabel `abouts`
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
-- Dumping data untuk tabel `abouts`
--

INSERT INTO `abouts` (`id`, `user_id`, `title`, `slug`, `description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Sekilas NU', 'sekilas-nu', '<p><strong>SEJARAH SINGKAT NU CARE-LAZISNU MUKOMUKO</strong></p>\r\n<p>&nbsp;</p>\r\n<p class=\"ql-align-justify\">NU CARE-LAZISNU adalah rebranding atau pintu masuk agar masyarakat global mengenal dengan adanya Lembaga Amil Zakat Infaq dan Shadaqah Nahdlatul UIama (LAZISNU).</p>\r\n<p class=\"ql-align-justify\">NU CARE-LAZISNU berdiri di kabupaten Mukomuko pada Tahun 2017. Sebagai acuan pergerakan NU CARE-LAZISNU berdasarkan SK PC.NU Kabupaten Mukomuko dengan Nomor : 435/SK/A.01/PCNU./ IX/2017 dan dikukuhkan oleh Pengurus Pusat dengan Nomor SK 121/SK/PP/Lazisnu/i/2018 tentang Pengesahan dan pemberian izin operasional kepada Lembaga Amil Zakat Infaq dan Shadaqah Nahdlatul Ulama (LAZISNU) Kabupaten Mukomuko.</p>\r\n<p class=\"ql-align-justify\">Surat Keputusan Pengesahan Lazisnu Mukomuko terebut mengacu pada Keputusan Menteri Agama Republik Indonesia Nomor: 255/Tahun 2016 tentang Pemberian izin kepada Yayasan Lembaga Amil Zakat Infak dan Shadaqah Nahdlatul Ulama sebagai amil skala Nasional tertanggal 26 Mei 2016 untuk melakukan pemungutan Zakat, Infaq dan Shadaqah kepada Masyarakat luas.</p>\r\n<p class=\"ql-align-justify\">NU CARE-LAZISNU merupakan lembaga Nirlaba milik perkumpulan Nahdaltul Ulama (NU) yang bertujuan berkhidmat dalam rangka membantu kesejahteraan umat, mengangkat harkat sosial dengan mendayagunakan dana Zakat Infak dan Shadaqah serta wakaf (ZISWAF)</p>\r\n<p class=\"ql-align-justify\">NU CARE-LAZISNU di Kabupaten Mukomuko lahir dan berdiri pada tahun 2017 berdasarkan rapat kerja Pengurus Cabang NU Mukomuko yang dipimpin oleh ketua PC NU K.H. Mukholid. S.Pd.I.. Kemudian pada tahun 2018 secara yuridis-formal LAZISNU disahkan serta diakui oleh dunia perbankan dan dikukuhkan berdasarkan SK Mentri Agama no. 255 tahun 2016.</p>\r\n<p class=\"ql-align-justify\">Dalam upaya meningkatkan kinerja dan meraih kepercayaan masyarakat, NUCARE-LAZISNU menerapkan sistem manajemen ISO 9001 : 2015 yang dikeluarkan oleh Badan Sertifikasi NRA dan UKAS manajemen sistem dengan nomor sertifikat : 49224 yang telah diterbitkan pada tanggal 21 Oktober 2016 dengan komitmen manajemen MANTAP (Modern, Akuntable, Transparan, Amanah, dan Profesional).</p>\r\n<p class=\"ql-align-justify\">Sampai saat ini NU Care-LAZISNU telah memiliki jaringan di enam kecamatan (MWC) dan 33 desa (Ranting) di Kabupaten Mukomuko. NU Care sebagai lembaga filantropi akan terus berupaya untuk meningkatkan kepercayaan dari para donatur yag semua sistem&nbsp;pencatatan dan penyalurannya akan bisa dilihat secara real time melalui sistem kami.</p>\r\n<p class=\"ql-align-justify\">NU Care-LAZISNU berfokus pada 4 pilar program: Pendidikan, kesehatan, ekonomi pengembangan ekonomi mandiri, dan kebencanaan. Kebencanaan adalah program NU Care yang fokus pada rescue. Ketika ada dan/atau setelah terjadinya bencana.</p>\r\n<p class=\"ql-align-justify\">Untuk menjalankan manajemen dan berbagai kegiatan, NUCARE Lazisnu Mukomuko berkantor di Jalan Wijaya Kusuma Desa Marga Mulya Sakti Kecamatan Penarik Kabupaten Mukomuko Provinsi Bengkulu</p>', 1, '2022-02-11 01:57:46', '2022-03-21 16:06:06', '2022-03-21 16:06:06'),
(2, 1, 'Visi & Misi', 'visi-misi', '<p class=\"ql-align-center\"><strong>VISI MISI NUCARE LAZISNU</strong></p>\r\n<p class=\"ql-align-center\"><strong>VISI</strong></p>\r\n<p>Bertekad menjadi Lembaga Pengelola Dana Masyarakat (Zakat, Infaq dan Shadaqah, dll) yang didayagunakan secara amanah dan profesional untuk pemberdayaan umat</p>\r\n<p class=\"ql-align-center\"><strong>MISI</strong></p>\r\n<p>1. Mendorong tumbuhnya kesadaran masyarakat untuk melakukan Zakat, Infaq dan Shadaqah dengan rutin dan tetap</p>\r\n<p>2. Mengumpulkan/menghimpun dan mendayagunakan dana Zakat, Infaq dan Shadaqah secara profesional, transparan, tepat guna dan tepat sasaran</p>\r\n<p>3. Menyelenggarakan program pemberdayaan masyarakat guna mengatasi problem kemiskinan, pengangguran dan minimnya akses pendidikan yang layak</p>', 1, '2022-02-13 07:26:37', '2022-03-21 16:05:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
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
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `user_id`, `title`, `image`, `description`, `link_url`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Sekilas Lazisnu Mukomuko', '/banner/sekilas-lazisnu-mukomuko_6204c9d021dcd.jpeg', 'description', 'https://lazisnumukomuko.id/profil/', 1, '2022-02-10 00:56:50', '2022-03-21 16:08:23', NULL),
(2, 1, 'Lihat Donasi Harian', '/banner/lihat-donasi-harian_6208df67b7813.jpg', '<p>Kamu dapat melihat donatur harian disini.</p>', 'http://demo.lazisnumukomuko.id/donatur', 1, '2022-02-13 03:37:27', '2022-03-19 09:50:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `donates`
--

CREATE TABLE `donates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `total_donate` int(11) NOT NULL,
  `is_anonim` int(11) NOT NULL,
  `is_confirm` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `donates`
--

INSERT INTO `donates` (`id`, `user_id`, `type`, `type_id`, `location_id`, `name`, `email`, `phone`, `message`, `total_donate`, `is_anonim`, `is_confirm`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '\\App\\Models\\Admin\\Ziswaf', 1, 2, 'Budi Anto', 'budiianto24@gmail.com', '081380713910', 'Test', 100000, 1, 1, '2022-03-26 13:27:29', '2022-03-26 13:29:03', NULL),
(2, 1, '\\App\\Models\\Admin\\Ziswaf', 1, 2, 'John Doe', 'budiianto24@gmail.com', '081380713910', 'Qwerty', 200000, 0, 1, '2022-03-26 13:28:08', '2022-03-26 13:35:47', NULL),
(3, 1, '\\App\\Models\\Admin\\Program', 1, 2, 'Oman', 'budiianto24@gmail.com', '081380713910', 'Test', 500000, 0, 1, '2022-03-26 13:38:38', '2022-03-26 13:38:38', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('image','video') COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galleries`
--

INSERT INTO `galleries` (`id`, `user_id`, `title`, `description`, `link_url`, `type`, `content`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Test', '<p>test</p>', 'test', 'image', '/gallery/test_620633a087386.jpeg', 1, '2022-02-11 03:00:00', '2022-03-19 09:58:02', NULL),
(2, 1, 'test', '<p>test</p>', 'test', 'video', '2xhdt43QDCo', 1, '2022-02-11 03:11:44', '2022-03-19 09:58:07', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `incomes`
--

INSERT INTO `incomes` (`id`, `user_id`, `name`, `precent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'MUJAMI\'', '10', '2022-02-24 04:55:31', '2022-02-24 10:00:49', NULL),
(2, 1, 'UPZIS RANTING', '45', '2022-02-24 04:59:49', '2022-02-24 04:59:49', NULL),
(3, 1, 'UPZIS KEC (MWC)', '15', '2022-02-24 05:00:05', '2022-02-24 05:00:05', NULL),
(4, 1, 'LAZISNU', '20', '2022-02-24 05:00:20', '2022-02-24 05:00:20', NULL),
(5, 1, 'PC.NU', '10', '2022-02-24 05:00:30', '2022-02-24 05:00:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `locations`
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
-- Dumping data untuk tabel `locations`
--

INSERT INTO `locations` (`id`, `user_id`, `parent_id`, `name`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 'Penarik', 1, '2022-02-12 02:46:18', '2022-02-12 03:00:44', NULL),
(2, 1, 1, 'Lubuk Mukti', 1, '2022-02-12 03:10:54', '2022-02-12 03:10:54', NULL),
(3, 1, 0, 'V Koto', 1, '2022-02-12 03:46:53', '2022-03-19 10:32:35', NULL),
(4, 1, 3, 'Test', 0, '2022-02-12 03:47:05', '2022-03-19 11:53:58', NULL),
(5, 1, 1, 'Test2', 1, '2022-02-12 03:47:14', '2022-02-12 03:47:14', NULL);

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
(19, '2022_02_13_065633_create_program_news_table', 4),
(20, '2022_02_15_145118_create_donates_table', 5),
(21, '2022_02_18_210155_add_location_to_users_table', 6),
(22, '2022_02_24_113633_create_incomes_table', 7),
(23, '2022_04_09_131401_add_is_member_to_users_table', 8),
(24, '2022_04_09_153017_create_user_profile_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `is_highlight` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `user_id`, `title`, `slug`, `content`, `category_id`, `is_active`, `is_highlight`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Test', 'test', '<p>test</p>', 2, 1, 1, '2022-02-12 04:40:46', '2022-03-19 10:09:08', NULL),
(2, 1, 'Test2', 'test2', '<p>Test</p>', 1, 1, 0, '2022-02-12 04:41:25', '2022-03-15 09:43:15', '2022-03-15 09:43:15'),
(3, 1, 'Lorem ipsum dolor', 'lorem-ipsum-dolor', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 1, 1, '2022-02-12 04:42:36', '2022-03-19 09:54:57', NULL),
(4, 1, 'Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor', 'test3', '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 1, 0, '2022-02-12 04:44:30', '2022-03-29 16:24:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_categories`
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
-- Dumping data untuk tabel `news_categories`
--

INSERT INTO `news_categories` (`id`, `user_id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Sosial', 'sosial', '2022-02-12 04:38:41', '2022-02-12 04:38:41', NULL),
(2, 1, 'Kemanusiaan', 'kemanusiaan', '2022-02-12 04:50:17', '2022-02-12 04:50:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_images`
--

CREATE TABLE `news_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news_images`
--

INSERT INTO `news_images` (`id`, `file`, `news_id`, `created_at`, `updated_at`) VALUES
(1, '/news/test_62079cd5a1eff.jpeg', 1, '2022-02-12 04:41:09', '2022-02-12 04:41:09'),
(2, '/news/test2_62079d2c25591.jpeg', 3, '2022-02-12 04:42:36', '2022-02-12 04:42:36'),
(3, '/news/test2_62079d4579886.jpeg', 3, '2022-02-12 04:43:01', '2022-02-12 04:43:01'),
(4, '/news/test3_62079d9ea05c8.jpeg', 4, '2022-02-12 04:44:30', '2022-02-12 04:44:30');

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
-- Struktur dari tabel `permissions`
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
-- Struktur dari tabel `personal_access_tokens`
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

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'myapptoken', 'a37ba297c5dff46d076d6994cff8ef42648e0fb743f4105f1431c9c2bf60b5d1', '[\"*\"]', NULL, '2022-04-04 20:11:21', '2022-04-04 20:11:21'),
(2, 'App\\Models\\User', 1, 'myapptoken', 'cfe2f64a5769602c8b54f389b4b9ac2cbbb5868024e8132067253260703d1ede', '[\"*\"]', NULL, '2022-04-09 18:57:04', '2022-04-09 18:57:04'),
(4, 'App\\Models\\User', 6, 'myapptoken', '84daf46d877e4b0870fba8a9797d1dcc1a3b715f042f207545d13d1e614070ab', '[\"*\"]', NULL, '2022-04-10 07:32:13', '2022-04-10 07:32:13'),
(5, 'App\\Models\\User', 6, 'myapptoken', '612354b87e4c2d44b9d2152b4e96be8f15a305b631ce0871a6e529c9f1905670', '[\"*\"]', NULL, '2022-04-10 07:32:56', '2022-04-10 07:32:56'),
(6, 'App\\Models\\User', 6, 'myapptoken', 'c3beb647c52e1caffecd162d1c0edd978f7b4d68027cafbf105ae2d18d07591e', '[\"*\"]', NULL, '2022-04-10 07:37:52', '2022-04-10 07:37:52'),
(7, 'App\\Models\\User', 6, 'myapptoken', '80977cc82f58836b16f96f0f192c608ac7bc0ac178141ef3dadde2e40808b401', '[\"*\"]', NULL, '2022-04-10 07:38:47', '2022-04-10 07:38:47'),
(8, 'App\\Models\\User', 4, 'myapptoken', '346ce9b668295cf99de2559ed8182de652459d03279eff129175cc733c4e0a7f', '[\"*\"]', NULL, '2022-04-10 07:39:19', '2022-04-10 07:39:19'),
(9, 'App\\Models\\User', 6, 'myapptoken', '1040b4b969b79dc51d1c69f8a4e6094830f697cd293d5ef43d0228ae557232b8', '[\"*\"]', '2022-04-10 08:01:37', '2022-04-10 07:49:40', '2022-04-10 08:01:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Dumping data untuk tabel `programs`
--

INSERT INTO `programs` (`id`, `user_id`, `title`, `slug`, `location`, `target_dana`, `end_date`, `category_id`, `description`, `image`, `is_urgent`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Test', 'test', 'Rumah Uya', 10000000, '2022-03-07', 1, '<p>Test</p>', '/program/test_6208aa0664f57.jpeg', 0, 1, '2022-02-12 23:49:42', '2022-03-29 15:39:18', NULL),
(2, 1, 'Lorem ipsum dolor', 'lorem-ipsum-dolor', '1', 10000000, '2022-03-30', 1, '<p>Test</p>', '/program/lorem-ipsum-dolor_620a4263eafcd.jpg', 1, 1, '2022-02-14 04:52:03', '2022-03-29 15:39:34', NULL),
(3, 1, 'Lorem ipsum dolor2', 'lorem-ipsum-dolor2', '1', 10000000, '2022-03-20', 1, '<p>Test</p>', '/program/lorem-ipsum-dolor_620a4263eafcd.jpg', 0, 1, '2022-02-13 04:52:03', '2022-02-16 09:42:27', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_categories`
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
-- Dumping data untuk tabel `program_categories`
--

INSERT INTO `program_categories` (`id`, `user_id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Kemanusiaan', 'kemanusiaan', '2022-02-12 23:49:06', '2022-02-12 23:49:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_news`
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

--
-- Dumping data untuk tabel `program_news`
--

INSERT INTO `program_news` (`id`, `user_id`, `program_id`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '<p>Test1</p>', '2022-02-13 00:29:13', '2022-03-19 09:09:15', NULL),
(4, 1, 1, '<p>Test2</p>', '2022-02-13 00:53:07', '2022-02-13 00:53:51', '2022-02-13 00:53:51'),
(5, 1, 1, '<p>Test3</p>', '2022-02-13 00:53:51', '2022-03-19 09:09:15', NULL),
(6, 1, 2, '<p>Hello World</p>', '2022-02-22 07:18:34', '2022-03-29 15:39:34', NULL),
(7, 1, 2, '<p>Hello World</p>', '2022-02-22 07:18:34', '2022-02-22 07:19:05', '2022-02-22 07:19:05'),
(8, 1, 2, '<p>Qwerty</p>', '2022-02-22 07:19:05', '2022-03-29 15:39:34', NULL),
(9, 1, 2, '<p>Asd</p>', '2022-02-22 07:19:17', '2022-03-29 15:39:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2022-02-12 09:02:39', '2022-02-12 09:02:39'),
(2, 'Kabupaten', 'web', '2022-02-12 09:02:39', '2022-02-12 09:02:39'),
(3, 'Kecamatan', 'web', '2022-02-12 09:03:07', '2022-02-12 09:03:07'),
(4, 'Desa', 'web', '2022-02-12 09:03:07', '2022-02-12 09:03:07'),
(5, 'User', 'web', '2022-04-10 07:01:57', '2022-04-10 07:01:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
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
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `user_id`, `title`, `slug`, `description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Daftar Rekening', 'daftar-rekening', '<p>Untuk Menyalurkan Infak, Zakat dan Sedekah dapat dilakukan secara Langsung dengan cara Transfer Ke Nomor Rekening di Bawah Ini:</p>\r\n<p><strong>BANK RAKYAT INDONESIA</strong><br /><strong>No. Rek&nbsp;: 586-01-016236-53-3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><br /><strong>Lazisnu PC-NU Kab Mukomuko</strong></p>\r\n<p><strong>BANK BENGKULU</strong><br /><strong>No Rek&nbsp;&nbsp;&nbsp;&nbsp;: 5030201039382&nbsp;</strong><br /><strong>Lazisnu Kabupaten Mukomuko</strong></p>', 1, '2022-02-13 05:00:54', '2022-03-19 10:00:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `is_member` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `location_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_active`, `is_member`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Admin', 'admin@email', NULL, '$2y$10$7EuBI/kbGKmLUq8lqtXMBOnVzZaD0ZvAI47cT7L3hPDoELl9lBxC6', NULL, 1, 1, '2022-02-10 02:35:51', '2022-04-10 06:04:38', NULL),
(2, 1, 'Budianto', 'budiianto24@gmail.com', NULL, '$2y$10$N8QzEd/dndFkVv14Y3C5wuuNIIlQv.yRbD3ZckPzI.OKttdwXRYTe', NULL, 1, 1, '2022-02-14 20:05:46', '2022-03-21 17:08:03', NULL),
(3, 2, 'Anto', 'batas1204@gmail.com', NULL, '$2y$10$LOWGPL7z4R1kZ7l5Rov.o.R6IeAy6NLRSDTiYOiv8OeCxKFwldqQ6', NULL, 1, 1, '2022-02-22 17:14:33', '2022-03-26 13:26:19', NULL),
(4, 2, 'Budi', 'penarik@mail.com', NULL, '$2y$10$ZTsPoY9dWcxsVo.N3E0suujSG9VK8ojHT6rriWbJkrecV291iDl.2', NULL, 1, 1, '2022-02-22 17:30:24', '2022-02-22 17:30:24', NULL),
(5, 0, 'user', 'user@email.com', NULL, '$2y$10$ZTsPoY9dWcxsVo.N3E0suujSG9VK8ojHT6rriWbJkrecV291iDl.2', NULL, 1, 0, '2022-04-10 06:43:22', '2022-04-10 06:43:22', NULL),
(6, 0, 'User Dua', 'user2@email.com', NULL, '$2y$10$O0Tb3bIxW7MCrbw0xbsbxOlUsXPK7wubTbIdKJp5c./2V/VoKpula', NULL, 1, 0, '2022-04-10 07:05:10', '2022-04-10 07:58:10', NULL),
(7, 0, 'user 3', 'user3@email.com', NULL, '$2y$10$sGEhMfjkT0.0LBLiTDzQ5uoVCQZXV3e7t37xN3BI9qTyJwR7I9Hrq', NULL, 1, 0, '2022-04-10 07:08:47', '2022-04-10 07:08:47', NULL),
(8, 0, 'user', 'user4@email.com', NULL, '$2y$10$v7AvazZS4DVgYYVrLwt5.eioEk.3WsXYqRtpM5RePaoNpYDVX4LIu', NULL, 1, 0, '2022-04-10 08:05:31', '2022-04-10 08:05:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `image`, `telp`, `birth_day`, `address`, `bio`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '0812345678', '1998-05-24', 'Jalan lah', 'qwerty', '2022-04-09 08:41:04', '2022-04-10 06:04:38'),
(2, 5, NULL, '081380713910', NULL, NULL, NULL, '2022-04-10 06:43:22', '2022-04-10 06:43:22'),
(3, 6, NULL, '08123456789', '2022-04-10', 'Jalan jalan', 'Qwerty', '2022-04-10 07:05:10', '2022-04-10 07:58:10'),
(4, 7, NULL, '081380713910', NULL, NULL, NULL, '2022-04-10 07:08:47', '2022-04-10 07:08:47'),
(6, 8, NULL, '08123456789', NULL, NULL, NULL, '2022-04-10 08:05:31', '2022-04-10 08:05:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ziswafs`
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
-- Dumping data untuk tabel `ziswafs`
--

INSERT INTO `ziswafs` (`id`, `user_id`, `category_id`, `title`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Zakat Maal', 1, '2022-02-15 22:14:34', '2022-02-15 22:14:34', NULL),
(2, 1, 2, 'Beasiswa Pendidikan', 1, '2022-02-16 06:40:15', '2022-02-16 06:40:15', NULL),
(3, 1, 3, 'Wakaf Umum', 1, '2022-02-16 06:40:42', '2022-02-16 06:40:42', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ziswaf_categories`
--

CREATE TABLE `ziswaf_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ziswaf_categories`
--

INSERT INTO `ziswaf_categories` (`id`, `user_id`, `name`, `slug`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Zakat', 'zakat', 1, '2022-02-15 22:14:18', '2022-02-15 22:14:18', NULL),
(2, 1, 'Infaq', 'infaq', 1, '2022-02-16 06:38:56', '2022-02-16 06:38:56', NULL),
(3, 1, 'Wakaf', 'wakaf', 1, '2022-02-16 06:39:05', '2022-02-16 06:39:05', NULL),
(4, 1, 'Shadaqah', 'shadaqah', 1, '2022-02-16 06:39:13', '2022-02-16 06:39:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donates`
--
ALTER TABLE `donates`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
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
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news_images`
--
ALTER TABLE `news_images`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program_categories`
--
ALTER TABLE `program_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program_news`
--
ALTER TABLE `program_news`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ziswafs`
--
ALTER TABLE `ziswafs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ziswaf_categories`
--
ALTER TABLE `ziswaf_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `donates`
--
ALTER TABLE `donates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `news_images`
--
ALTER TABLE `news_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `program_categories`
--
ALTER TABLE `program_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `program_news`
--
ALTER TABLE `program_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ziswafs`
--
ALTER TABLE `ziswafs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ziswaf_categories`
--
ALTER TABLE `ziswaf_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
