-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 07:15 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(3, 'himanshu', '123456', 1, '0000-00-00 00:00:00', '2021-03-21 05:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `title`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, '36431.jpg', 'himanshupundhir', 'hellohowareyoukeseho', 1, '2020-05-15 10:13:12', '2021-03-21 00:32:17'),
(2, '32706.jpg', 'hellohimanshupundhi123', 'howareyouthakursahab', 1, '2020-05-15 10:14:36', '2020-05-15 11:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `product_name`, `product_code`, `product_color`, `size`, `price`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(9, 12, 'shirt half', '11plp', 'blue', 'large', '2500', 1, 'anuj123@gmail.com', 'MMNOpbSm2K6oGu5geg9oDGiKegRZ6IqDri3y3ydy', NULL, NULL),
(18, 10, 'slow shirts', '110s', 'green', 'medium', '1800', 1, 'harshal123@gmail.com', 'QXtfPgHs4pRiGjapLZQ189LbfiTpsGU8cIfltt7J', NULL, NULL),
(19, 10, 'slow shirts', '110s', 'green', 'medium', '1800', 2, 'anujpundhir123@gmail.com', '6x9x9BvDVvrexBUEcijQkYR6Q5Usn95DUhqcPrp9', NULL, NULL),
(26, 12, 'shirt half', '11plp', 'blue', 'large', '2500', 1, 'nitinpundhir1234@gmail.com', 'MMrXm66fx4LYGrl2G4sjweJ4lYTlKSYdGJK5grXv', NULL, NULL),
(29, 21, 'shoes', '113we', 'red', 'large', '800', 1, '', 'mKeNbvNTkBCTP74qnCBXda1jRdyskJXA9z48g6Tu', NULL, NULL),
(42, 18, 'formal shirts red', '110s', 'red', 'large', '800', 1, 'himanshupundhir1234@gmail.com', 'B4jAZOPte6c224dtHHpnnZYrjPsRmVGM3lRiHReK', NULL, NULL),
(43, 19, 'shoes', '113s', 'red', 'medium', '650', 1, '', '08bwIoL4B5L8bGIG46as2XrA3pbNm9qMTWAT1PrG', NULL, NULL),
(44, 12, 'shirt half', '11plp', 'blue', 'large', '350', 1, 'himanshupundhir1234@gmail.com', 'jpKeFJ6BfadV6t9lpJwA2KBkvHmnjUj3w2D6mQ3U', NULL, NULL),
(51, 10, 'slow shirts', '110s', 'green', 'medium', '500', 1, '', 'i2zP3ZTbzux9ipwfkrBLwdBDfeJgo3w80fkkw7Sj', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `status`, `remember_token`, `url`, `created_at`, `updated_at`) VALUES
(9, 0, 'T-Shirts', 'T-Shirts Category', 1, NULL, 't-shirts', '2020-04-18 08:18:28', '2021-03-21 00:22:21'),
(10, 0, 'Shoes', 'shoes category', 1, NULL, 'shoes', '2020-04-18 08:19:45', '2020-04-18 08:19:45'),
(11, 9, 'Causal T- Shirts', 'Causal T-shirts', 1, NULL, 'causal-t-shirts', '2020-04-18 08:56:50', '2020-05-02 10:40:53'),
(13, 10, 'sports-shoes', 'this is good shoes', 1, NULL, 'sportsshoes', '2020-04-29 12:25:28', '2020-04-29 12:25:28'),
(15, 9, 'Formal t-shirts', 'this is good shirts', 1, NULL, 'formal-t-shirts', '2020-05-02 04:04:35', '2020-05-02 04:04:35'),
(19, 0, 'Template', 'Good Template', 1, NULL, 'Template', '2021-03-21 00:20:30', '2021-03-21 00:26:42'),
(20, 19, 'badsheet', 'good Template', 1, NULL, 'badsheet1', '2021-03-21 00:24:15', '2021-03-21 00:27:25'),
(21, 0, 'books', 'this is good', 1, NULL, 'books1', '2021-03-22 02:17:04', '2021-03-22 02:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(30) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `description`, `url`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(2, 'himanshu', 'hello hi', 'himanshu thakur', '', '', '', 1, '2020-08-31 16:49:45', '2020-08-31 11:19:45'),
(3, 'himanshu', 'hello hi', 'himanshu', '', '', '', 1, '2020-09-02 10:20:03', '2020-09-02 04:50:03'),
(4, 'terms $ conditions', 'there are many type of conditions', 'terms-conditions', '', '', '', 0, '2020-09-02 10:33:15', '2020-09-02 05:09:58'),
(5, 'About us', 'this is total details about company', 'about-us', '', '', '', 1, '2020-09-02 10:33:40', '2020-09-02 05:03:40'),
(6, 'mohit', 'this is good', 'mohit_sharma', 'very large e-com website', 'it is good website for purchase cloth', 'cloths,shirts,paint', 1, '2020-09-02 16:44:29', '2020-09-02 11:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'abcdefx', 30, 'fixed', '2020-05-15', 1, '2020-05-12 11:02:03', '2020-05-12 11:02:03'),
(3, 'abcdefh123', 23, 'percantage', '2020-05-14', 0, '2020-05-12 11:03:24', '2020-05-12 11:03:24'),
(4, 'abcdefh123', 23, 'percantage', '2020-05-14', 0, '2020-05-12 11:31:24', '2020-05-12 11:31:24'),
(5, '123456', 22, 'percantage', '2020-06-24', 1, '2020-05-12 11:55:47', '2020-06-09 02:34:08'),
(6, 'himanshupund', 49, 'fixed', '2020-05-12', 0, '2020-05-12 11:56:35', '2020-05-12 12:08:47'),
(7, 'hhpundhir', 100, 'fixed', '2021-03-22', 1, '2021-03-21 01:55:16', '2021-03-21 01:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 10, 'harshal123@gmail.com', 'harshal', 'mumbai', 'delhi', 'banaras', 'ARUBA', '207122', '6397202818', '2020-05-31 08:20:52', '2020-06-20 01:43:53'),
(2, 14, 'mohit123@gmail.com', 'mohit sharma', 'koshikala', 'mathura', 'up', 'INDIA', '207135', '9759255014', '2020-05-31 08:35:01', '2020-05-31 08:41:54'),
(3, 15, 'anuj123@gmail.com', 'anujkumar', 'kantaur', 'kasganj', 'up', 'INDIA', '207123', '6397202816', '2020-06-09 03:38:42', '2020-06-09 03:38:42'),
(4, 16, 'raja123@gmail.com', 'rajapundhir', 'kantaur', 'kasganj', 'up', 'INDIA', '207123', '06397202816', '2020-06-13 10:06:26', '2020-06-13 10:10:46'),
(5, 17, 'anujpundhir123@gmail.com', 'anujpundhir', 'kantaur', 'kasganj', 'up', 'INDIA', '207123', '06397202816', '2020-07-05 00:30:58', '2020-07-05 00:30:58'),
(6, 19, 'raja1234@gmail.com', 'rajapundhir', 'kantaur', 'kasganj', 'up', 'INDIA', '207123', '6397202816', '2020-07-20 05:28:40', '2020-07-20 05:33:30'),
(7, 43, 'shivam123@yopmail.com', 'shivam', 'kantaur', 'kasganj', 'up', 'INDIA', '207123', '6397202816', '2020-07-29 01:50:25', '2020-07-29 01:50:25'),
(8, 44, 'ashishpundhir1234@gmail.com', 'ashish pundhir', 'teekampura', 'kasganj', 'up', 'INDIA', '207123', '6397202816', '2020-08-01 05:19:38', '2020-08-01 05:43:01'),
(9, 48, 'nitinpundhir1234@gmail.com', 'nitin pundhir', 'kantaur', 'kasganj', 'up', 'INDIA', '207123', '06397202816', '2020-08-01 06:31:56', '2020-08-01 06:31:56'),
(10, 49, 'amitpundhir1234@yopmail.com', 'amitpundhir', 'kantaur', 'kasganj', 'up', 'INDIA', '207123', '06397202816', '2020-08-01 06:43:25', '2020-08-01 06:43:25'),
(11, 50, 'anshpundhir123@yopmail.com', 'ansh pundhir', 'kantaur', 'kasganj', 'up', 'INDIA', '207123', '6397202816', '2020-08-01 20:30:04', '2020-08-01 20:30:04'),
(12, 51, 'saurya123@yopmail.com', 'sauryapundhir', 'kantaur', 'kasganj', 'up', 'INDIA', '207123', '06397202816', '2020-08-29 00:56:57', '2020-08-29 00:56:57'),
(13, 52, 'himanshupundhir1234@gmail.com', 'himanshupundhir', 'kantaur', 'kasganj', 'up', 'INDIA', '207123', '06397202816', '2020-08-30 11:36:18', '2020-09-02 12:03:11'),
(14, 53, 'mohit19551@gmail.com', 'mohit sharma', 'kosi', 'mathura', 'up', 'INDIA', '207123', '8851779536', '2020-09-02 11:37:30', '2020-09-02 11:37:30'),
(15, 54, 'himanshupundhir1234@gmail.com', 'himanshu', 'kantaur', 'kasganj', 'up', 'INDIA', '207123', '06397202816', '2020-12-01 09:56:59', '2020-12-01 09:56:59'),
(16, 56, 'Deveshpundhir1234@gmail.com', 'Devesh', 'kasganj', 'kasganj', 'uttar pradesh', 'INDIA', '207123', '6397202816', '2021-03-18 08:36:48', '2021-03-18 09:00:40'),
(17, 57, 'Bhupendr1234@gmail.com', 'Bhupendr', 'kasganj', 'kasganj', 'uttar pradesh', 'INDIA', '207123', '06397202816', '2021-03-21 01:43:31', '2021-03-21 01:56:34'),
(18, 58, 'Akashpundhir1234@gmail.com', 'Akash', 'kasganj', 'kasganj', 'uttar pradesh', 'INDIA', '207123', '7818897029', '2021-03-21 02:14:09', '2021-03-21 02:14:09'),
(19, 60, 'harsh1234@gmail.com', 'harsh', 'kasganj', 'kasganj', 'uttar pradesh', 'INDIA', '207123', '06397202816', '2021-06-24 10:22:04', '2021-06-24 10:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2020_04_16_143028_create_categories_table', 2),
(5, '2020_04_19_160539_create_products_table', 3),
(6, '2020_04_24_151403_create_productsattributes_table', 4),
(7, '2020_05_04_164825_create_product_images_table', 5),
(8, '2020_05_08_165836_create_carts_table', 6),
(9, '2020_05_12_094208_create_coupons_table', 7),
(10, '2020_05_14_130535_create_banners_table', 8),
(11, '2020_05_30_180446_create_delivery_addresses_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `shipping_charge` varchar(255) NOT NULL DEFAULT '0',
  `coupon_code` varchar(255) NOT NULL,
  `coupon_amount` float NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `grand_total` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `pincode`, `country`, `mobile`, `shipping_charge`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `grand_total`, `created_at`, `updated_at`) VALUES
(53, 52, 'himanshupundhir1234@gmail.com', 'himanshupundhir', 'kantaur', 'kasganj', 'up', '207123', 'INDIA', '06397202816', '0', ' ', 0, 'new', 'cod', 800, '2020-08-30 18:41:39', '2020-08-30 13:11:39'),
(54, 52, 'himanshupundhir1234@gmail.com', 'himanshupundhir', 'kantaur', 'kasganj', 'up', '207123', 'INDIA', '06397202816', '0', ' ', 0, 'new', 'cod', 2300, '2020-08-30 18:43:44', '2020-08-30 13:13:44'),
(55, 52, 'himanshupundhir1234@gmail.com', 'himanshupundhir', 'kantaur', 'kasganj', 'up', '207123', 'INDIA', '06397202816', '0', ' ', 0, 'new', 'cod', 500, '2020-08-30 18:49:37', '2020-08-30 13:19:37'),
(56, 53, 'mohit19551@gmail.com', 'mohit sharma', 'kosi', 'mathura', 'up', '207123', 'INDIA', '8851779536', '0', ' ', 0, 'new', 'cod', 800, '2020-09-02 17:07:40', '2020-09-02 11:37:40'),
(57, 52, 'himanshupundhir1234@gmail.com', 'himanshupundhir', 'kantaur', 'kasganj', 'up', '207123', 'INDIA', '06397202816', '0', ' ', 0, 'new', 'cod', 800, '2020-09-02 17:33:20', '2020-09-02 12:03:20'),
(58, 52, 'himanshupundhir1234@gmail.com', 'himanshupundhir', 'kantaur', 'kasganj', 'up', '207123', 'INDIA', '06397202816', '0', ' ', 0, 'new', 'cod', 800, '2020-09-02 17:37:00', '2020-09-02 12:07:00'),
(59, 54, 'himanshupundhir1234@gmail.com', 'himanshupundhir', 'kantaur', 'kasganj', 'up', '207123', 'INDIA', '06397202816', '0', ' ', 0, 'new', 'cod', 1150, '2020-12-01 15:27:10', '2020-12-01 09:57:10'),
(60, 54, 'himanshupundhir1234@gmail.com', 'himanshupundhir', 'kantaur', 'kasganj', 'up', '207123', 'INDIA', '06397202816', '0', ' ', 0, 'new', 'cod', 1150, '2020-12-01 15:37:06', '2020-12-01 10:07:06'),
(61, 54, 'himanshupundhir1234@gmail.com', 'himanshupundhir', 'kantaur', 'kasganj', 'up', '207123', 'INDIA', '06397202816', '0', ' ', 0, 'new', 'cod', 1150, '2020-12-01 15:37:11', '2020-12-01 10:07:11'),
(62, 56, 'Deveshpundhir1234@gmail.com', 'Devesh', 'kasganj', 'kasganj', 'uttar pradesh', '207123', 'INDIA', '6397202816', '0', ' ', 0, 'new', 'cod', 500, '2021-03-18 14:06:58', '2021-03-18 08:36:58'),
(63, 56, 'Deveshpundhir1234@gmail.com', 'Devesh', 'kasganj', 'kasganj', 'uttar pradesh', '207123', 'INDIA', '6397202816', '0', ' ', 0, 'new', 'paypal', 500, '2021-03-18 14:07:34', '2021-03-18 08:37:34'),
(64, 56, 'Deveshpundhir1234@gmail.com', 'Devesh', 'kasganj', 'kasganj', 'uttar pradesh', '207123', 'INDIA', '6397202816', '0', ' ', 0, 'paid', 'cod', 500, '2021-03-18 14:07:57', '2021-03-18 08:39:46'),
(65, 56, 'Deveshpundhir1234@gmail.com', 'Devesh', 'kasganj', 'kasganj', 'uttar pradesh', '207123', 'INDIA', '6397202816', '0', ' ', 0, 'new', 'cod', 500, '2021-03-18 14:10:55', '2021-03-18 08:40:55'),
(66, 56, 'Deveshpundhir1234@gmail.com', 'Devesh', 'kasganj', 'kasganj', 'uttar pradesh', '207123', 'INDIA', '6397202816', '0', ' ', 0, 'new', 'cod', 500, '2021-03-18 14:24:15', '2021-03-18 08:54:15'),
(67, 56, 'Deveshpundhir1234@gmail.com', 'Devesh', 'kasganj', 'kasganj', 'uttar pradesh', '207123', 'INDIA', '6397202816', '0', ' ', 0, 'new', 'cod', 500, '2021-03-18 14:25:15', '2021-03-18 08:55:15'),
(68, 56, 'Deveshpundhir1234@gmail.com', 'Devesh', 'kasganj', 'kasganj', 'uttar pradesh', '207123', 'INDIA', '6397202816', '0', ' ', 0, 'new', 'cod', 500, '2021-03-18 14:29:21', '2021-03-18 08:59:21'),
(69, 56, 'Deveshpundhir1234@gmail.com', 'Devesh', 'kasganj', 'kasganj', 'uttar pradesh', '207123', 'INDIA', '6397202816', '0', ' ', 0, 'new', 'cod', 1300, '2021-03-18 14:30:49', '2021-03-18 09:00:49'),
(70, 57, 'Bhupendr1234@gmail.com', 'Bhupendr', 'kasganj', 'kasganj', 'uttar pradesh', '207123', 'INDIA', '06397202816', '0', ' ', 0, 'new', 'cod', 500, '2021-03-21 07:13:43', '2021-03-21 01:43:43'),
(71, 57, 'Bhupendr1234@gmail.com', 'Bhupendr', 'kasganj', 'kasganj', 'uttar pradesh', '207123', 'INDIA', '06397202816', '0', 'hhpundhir', 100, 'new', 'cod', 400, '2021-03-21 07:26:46', '2021-03-21 01:56:46'),
(72, 58, 'Akashpundhir1234@gmail.com', 'Akash', 'kasganj', 'kasganj', 'uttar pradesh', '207123', 'INDIA', '7818897029', '0', ' ', 0, 'new', 'cod', 500, '2021-03-21 07:44:27', '2021-03-21 02:14:27'),
(73, 60, 'harsh1234@gmail.com', 'harsh', 'kasganj', 'kasganj', 'uttar pradesh', '207123', 'INDIA', '06397202816', '0', ' ', 0, 'new', 'cod', 700, '2021-06-24 15:52:26', '2021-06-24 10:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_size`, `product_color`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 9, 15, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-06-09 09:15:10', '2020-06-09 03:45:10'),
(2, 10, 10, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-06-12 19:25:03', '2020-06-12 13:55:03'),
(3, 11, 16, 10, '11053s', 'slow shirts', 'large', 'green', 2300, 1, '2020-06-13 15:36:33', '2020-06-13 10:06:33'),
(4, 12, 16, 10, '110s', 'slow shirts', 'medium', 'green', 1800, 2, '2020-06-13 15:40:56', '2020-06-13 10:10:56'),
(5, 13, 10, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-06-16 12:38:27', '2020-06-16 07:08:27'),
(6, 14, 10, 10, '110s', 'slow shirts', 'medium', 'green', 1800, 1, '2020-06-16 12:40:52', '2020-06-16 07:10:52'),
(7, 15, 10, 10, '11053s', 'slow shirts', 'large', 'green', 2300, 1, '2020-06-16 12:42:12', '2020-06-16 07:12:12'),
(8, 15, 10, 10, '110s', 'slow shirts', 'medium', 'green', 1800, 1, '2020-06-16 12:42:12', '2020-06-16 07:12:12'),
(9, 16, 10, 12, '11pp', 'shirt half', 'medium', 'blue', 400, 1, '2020-06-20 06:31:14', '2020-06-20 01:01:14'),
(10, 17, 10, 10, '110s', 'slow shirts', 'medium', 'green', 1800, 1, '2020-06-20 07:14:09', '2020-06-20 01:44:09'),
(11, 18, 17, 10, '110s', 'slow shirts', 'medium', 'green', 1800, 2, '2020-07-05 06:01:09', '2020-07-05 00:31:09'),
(12, 19, 19, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-07-20 10:58:53', '2020-07-20 05:28:53'),
(13, 20, 19, 10, '110s', 'slow shirts', 'medium', 'green', 1800, 1, '2020-07-20 11:01:34', '2020-07-20 05:31:34'),
(14, 21, 19, 10, '11053s', 'slow shirts', 'large', 'green', 2300, 2, '2020-07-20 11:03:38', '2020-07-20 05:33:38'),
(15, 22, 43, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-07-29 07:20:37', '2020-07-29 01:50:37'),
(16, 23, 44, 10, '110s', 'slow shirts', 'medium', 'green', 1800, 1, '2020-08-01 10:49:45', '2020-08-01 05:19:45'),
(17, 24, 44, 12, '11pp', 'shirt half', 'medium', 'blue', 400, 1, '2020-08-01 11:13:09', '2020-08-01 05:43:09'),
(18, 25, 48, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-08-01 12:02:02', '2020-08-01 06:32:02'),
(19, 26, 48, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-08-01 12:08:51', '2020-08-01 06:38:51'),
(20, 27, 48, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-08-01 12:09:35', '2020-08-01 06:39:35'),
(21, 28, 49, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-08-01 12:13:31', '2020-08-01 06:43:31'),
(22, 29, 49, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-08-01 12:15:26', '2020-08-01 06:45:26'),
(23, 30, 49, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-08-01 12:20:07', '2020-08-01 06:50:07'),
(24, 31, 49, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-08-01 12:20:35', '2020-08-01 06:50:35'),
(25, 32, 49, 12, '11plp', 'shirt half', 'large', 'blue', 2500, 1, '2020-08-01 12:21:24', '2020-08-01 06:51:24'),
(26, 33, 50, 10, '110s', 'slow shirts', 'medium', 'green', 1800, 1, '2020-08-02 02:00:12', '2020-08-01 20:30:12'),
(27, 34, 50, 10, '110s', 'slow shirts', 'medium', 'green', 1800, 1, '2020-08-02 02:01:11', '2020-08-01 20:31:11'),
(28, 35, 50, 10, '110s', 'slow shirts', 'medium', 'green', 1800, 1, '2020-08-02 02:03:16', '2020-08-01 20:33:16'),
(29, 37, 51, 10, '110s', 'slow shirts', 'medium', 'green', 1800, 1, '2020-08-29 06:27:08', '2020-08-29 00:57:08'),
(30, 37, 51, 17, '113s', 'shirts yellow', 'large', 'yellow', 500, 1, '2020-08-29 06:27:08', '2020-08-29 00:57:08'),
(31, 38, 52, 10, '110s', 'slow shirts', 'medium', 'green', 1800, 1, '2020-08-30 17:06:26', '2020-08-30 11:36:26'),
(32, 39, 52, 22, '15t', 'shoes', 'small', 'blue', 600, 1, '2020-08-30 17:25:03', '2020-08-30 11:55:03'),
(33, 41, 52, 20, '1135s', 'shoes', 'small', 'blue', 400, 1, '2020-08-30 17:37:42', '2020-08-30 12:07:42'),
(34, 42, 52, 21, '113we', 'shoes', 'large', 'red', 800, 1, '2020-08-30 17:41:05', '2020-08-30 12:11:05'),
(35, 43, 52, 18, '110s', 'formal shirts red', 'large', 'red', 800, 1, '2020-08-30 17:50:37', '2020-08-30 12:20:37'),
(36, 44, 52, 10, '11053s', 'slow shirts', 'large', 'green', 2300, 1, '2020-08-30 17:59:48', '2020-08-30 12:29:48'),
(37, 45, 52, 10, '11053s', 'slow shirts', 'large', 'green', 2300, 1, '2020-08-30 18:01:56', '2020-08-30 12:31:56'),
(38, 46, 52, 21, '113we', 'shoes', 'large', 'red', 800, 1, '2020-08-30 18:06:04', '2020-08-30 12:36:04'),
(39, 47, 52, 21, '113we', 'shoes', 'large', 'red', 800, 1, '2020-08-30 18:17:17', '2020-08-30 12:47:17'),
(40, 48, 52, 21, '113we', 'shoes', 'large', 'red', 800, 1, '2020-08-30 18:18:31', '2020-08-30 12:48:31'),
(41, 49, 52, 21, '113we', 'shoes', 'large', 'red', 800, 1, '2020-08-30 18:18:55', '2020-08-30 12:48:55'),
(42, 50, 52, 21, '113we', 'shoes', 'large', 'red', 800, 1, '2020-08-30 18:20:49', '2020-08-30 12:50:49'),
(43, 51, 52, 21, '113we', 'shoes', 'large', 'red', 800, 1, '2020-08-30 18:22:13', '2020-08-30 12:52:13'),
(44, 54, 52, 10, '11053s', 'slow shirts', 'large', 'green', 2300, 1, '2020-08-30 18:43:44', '2020-08-30 13:13:44'),
(45, 55, 52, 13, '113e', 'green shirt', 'medium', 'green', 500, 1, '2020-08-30 18:49:37', '2020-08-30 13:19:37'),
(46, 56, 53, 21, '113we', 'shoes', 'large', 'red', 800, 1, '2020-09-02 17:07:41', '2020-09-02 11:37:41'),
(47, 57, 52, 18, '110s', 'formal shirts red', 'large', 'red', 800, 1, '2020-09-02 17:33:20', '2020-09-02 12:03:20'),
(48, 58, 52, 18, '110s', 'formal shirts red', 'large', 'red', 800, 1, '2020-09-02 17:37:00', '2020-09-02 12:07:00'),
(49, 59, 54, 18, '110s', 'formal shirts red', 'large', 'red', 800, 1, '2020-12-01 15:27:10', '2020-12-01 09:57:10'),
(50, 59, 54, 12, '11plp', 'shirt half', 'large', 'blue', 350, 1, '2020-12-01 15:27:10', '2020-12-01 09:57:10'),
(51, 60, 54, 18, '110s', 'formal shirts red', 'large', 'red', 800, 1, '2020-12-01 15:37:06', '2020-12-01 10:07:06'),
(52, 60, 54, 12, '11plp', 'shirt half', 'large', 'blue', 350, 1, '2020-12-01 15:37:06', '2020-12-01 10:07:06'),
(53, 61, 54, 18, '110s', 'formal shirts red', 'large', 'red', 800, 1, '2020-12-01 15:37:11', '2020-12-01 10:07:11'),
(54, 61, 54, 12, '11plp', 'shirt half', 'large', 'blue', 350, 1, '2020-12-01 15:37:11', '2020-12-01 10:07:11'),
(55, 62, 56, 16, '546s', 'yellow shirt', 'medium', 'yellow', 500, 1, '2021-03-18 14:06:58', '2021-03-18 08:36:58'),
(56, 63, 56, 16, '546s', 'yellow shirt', 'medium', 'yellow', 500, 1, '2021-03-18 14:07:34', '2021-03-18 08:37:34'),
(57, 64, 56, 16, '546s', 'yellow shirt', 'medium', 'yellow', 500, 1, '2021-03-18 14:07:57', '2021-03-18 08:37:57'),
(58, 65, 56, 16, '546s', 'yellow shirt', 'medium', 'yellow', 500, 1, '2021-03-18 14:10:56', '2021-03-18 08:40:56'),
(59, 66, 56, 16, '546s', 'yellow shirt', 'medium', 'yellow', 500, 1, '2021-03-18 14:24:15', '2021-03-18 08:54:15'),
(60, 67, 56, 16, '546s', 'yellow shirt', 'medium', 'yellow', 500, 1, '2021-03-18 14:25:16', '2021-03-18 08:55:16'),
(61, 68, 56, 16, '546s', 'yellow shirt', 'medium', 'yellow', 500, 1, '2021-03-18 14:29:21', '2021-03-18 08:59:21'),
(62, 69, 56, 21, '113we', 'shoes', 'large', 'red', 650, 2, '2021-03-18 14:30:49', '2021-03-18 09:00:49'),
(63, 70, 57, 10, '110s', 'slow shirts', 'medium', 'green', 500, 1, '2021-03-21 07:13:43', '2021-03-21 01:43:43'),
(64, 71, 57, 25, '1101', 'double badsheet', 'small', 'green', 500, 1, '2021-03-21 07:26:46', '2021-03-21 01:56:46'),
(65, 72, 58, 25, '1101', 'double badsheet', 'small', 'green', 500, 1, '2021-03-21 07:44:27', '2021-03-21 02:14:27'),
(66, 73, 60, 12, '11plp', 'shirt half', 'large', 'blue', 350, 2, '2021-06-24 15:52:27', '2021-06-24 10:22:27');

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
-- Table structure for table `pincodes`
--

CREATE TABLE `pincodes` (
  `id` int(11) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `care` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_code`, `product_color`, `description`, `care`, `price`, `image`, `created_at`, `updated_at`) VALUES
(10, 11, 'slow shirts', 'ss002', 'green', 'this is good product', '', 500.00, '65410.jpg', '2020-04-22 01:20:25', '2020-05-06 04:18:36'),
(12, 11, 'shirt half', 'blue', 'blue', 'this is good', '', 350.00, '41159.jpg', '2020-04-28 09:28:41', '2020-05-02 13:02:45'),
(13, 15, 'green shirt', 'green', 'green', 'this is good t shirt', '', 650.00, '86706.jpg', '2020-04-29 11:34:18', '2020-05-02 13:01:44'),
(14, 11, 'red shirt', 'rs0092', 'red', 'this is good red shirt', '', 700.00, '2199.jpg', '2020-04-29 11:35:05', '2020-05-03 10:31:55'),
(15, 13, 'white sports shoes', 'white', 'white', 'this is good product', '', 500.00, '48407.jpg', '2020-05-01 01:02:35', '2020-05-02 13:10:15'),
(16, 15, 'yellow shirt', 'yellow', 'yellow', 'this is good', '', 500.00, '55529.jpg', '2020-05-01 03:42:52', '2020-05-02 13:04:03'),
(17, 11, 'shirts yellow', 'yellow', 'yellow', 'this is good', '', 500.00, '87109.jpg', '2020-05-02 04:01:38', '2020-05-02 13:04:34'),
(18, 15, 'formal shirts red', 'red', 'red', 'this is good shirts', '', 600.00, '23120.jpg', '2020-05-02 04:06:13', '2020-05-02 13:04:59'),
(19, 12, 'shoes', 'red', 'red', 'this is good', '', 650.00, '57137.jpg', '2020-05-02 04:47:24', '2020-05-02 13:05:32'),
(21, 13, 'shoes', 'red', 'red', 'this is good', '', 650.00, '2013.jpg', '2020-05-02 04:49:21', '2020-05-02 13:06:40'),
(22, 13, 'shoes', 'blue', 'blue', 'ggof', '', 700.00, '64049.jpg', '2020-05-02 04:51:29', '2020-05-06 10:28:19'),
(23, 11, 'shirts', 'red', 'red', 'goof', '', 700.00, '19118.jpg', '2020-05-02 12:46:01', '2020-05-02 12:50:29'),
(24, 13, 'shoes', 'ss0015', 'white', 'this is good quality and', 'shooping and cotton', 400.00, '46458.jpg', '2020-05-04 00:58:17', '2020-05-04 01:26:04'),
(25, 20, 'double badsheet', '11052', 'green', 'good badsheet', 'this is a good product', 500.00, '41035.jpg', '2021-03-21 00:29:19', '2021-03-21 00:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `productsattributes`
--

CREATE TABLE `productsattributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productsattributes`
--

INSERT INTO `productsattributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(2, 10, '110s', 'medium', 1800.00, 20, '2020-04-28 03:21:45', '2020-08-29 01:27:21'),
(14, 12, '11pp', 'medium', 400.00, 22, '2020-04-28 09:29:32', '2020-08-04 02:43:16'),
(16, 12, '11plp', 'large', 2500.00, 25, '2020-04-28 23:40:35', '2020-08-04 02:43:16'),
(20, 10, '11053s', 'large', 2300.00, 3, '2020-05-06 22:55:36', '2020-08-29 01:27:21'),
(21, 12, '1102', 'small', 1800.00, 10, '2020-05-08 23:06:28', '2020-08-04 02:43:16'),
(22, 13, '113e', 'medium', 500.00, 3, NULL, '2020-08-04 02:46:49'),
(23, 13, '112s', 'large', 600.00, 4, '2020-08-04 02:55:13', '2020-08-04 02:55:13'),
(24, 14, '541s', 'large', 2000.00, 2, '2020-08-04 02:56:16', '2020-08-04 02:56:16'),
(25, 15, '321s', 'small', 600.00, 10, '2020-08-04 02:56:59', '2020-08-04 02:56:59'),
(26, 16, '546s', 'medium', 800.00, 2, '2020-08-04 02:58:12', '2020-08-04 02:58:12'),
(27, 17, '113s', 'large', 300.00, 5, '2020-08-04 02:59:37', '2020-08-04 02:59:37'),
(28, 18, '110s', 'large', 800.00, 3, '2020-08-04 03:00:24', '2020-08-04 03:00:24'),
(29, 19, '113s', 'medium', 600.00, 3, '2020-08-04 03:01:14', '2020-08-04 03:01:14'),
(30, 20, '1135s', 'small', 400.00, 23, '2020-08-04 03:01:56', '2020-08-04 03:01:56'),
(31, 21, '113we', 'large', 800.00, 4, '2020-08-04 03:02:36', '2020-08-04 03:02:36'),
(32, 22, '15t', 'small', 600.00, 13, '2020-08-04 03:03:23', '2020-08-04 03:03:23'),
(33, 23, '1190s', 'medium', 700.00, 10, '2020-08-04 03:04:08', '2020-08-04 03:04:08'),
(34, 24, '1132s', 'small', 300.00, 5, '2020-08-04 03:04:57', '2020-08-04 03:04:57'),
(35, 24, '11256s', 'large', 600.00, 8, '2020-08-04 03:17:18', '2020-08-04 03:17:18'),
(36, 25, '1101', 'small', 200.00, 5, '2021-03-21 01:17:47', '2021-03-21 01:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(21, 10, '88580.jpg', '2020-05-05 00:19:09', '2020-05-05 00:19:09'),
(22, 10, '80361.jpg', '2020-05-05 00:19:09', '2020-05-05 00:19:09'),
(23, 10, '99435.jpg', '2020-05-05 00:19:10', '2020-05-05 00:19:10'),
(24, 25, '14313.jpg', '2021-03-21 00:45:25', '2021-03-21 00:45:25'),
(25, 25, '32972.jpg', '2021-03-21 01:21:36', '2021-03-21 01:21:36'),
(26, 25, '10546.jpg', '2021-03-21 01:22:12', '2021-03-21 01:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `email_verified_at`, `password`, `admin`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(54, 'himanshu', 'kantaur', 'kasganj', 'up', 'INDIA', '207123', '06397202816', 'himanshupundhir1234@gmail.com', NULL, '$2y$10$o7TljXiNrTf/Xx1ii5MfSOw68c.Gf2646.G5i3iW3HMGA6xzAJvQW', NULL, 0, NULL, '2020-12-01 09:52:26', '2020-12-01 11:40:48'),
(55, 'himanshu', NULL, NULL, NULL, NULL, NULL, NULL, 'himanshupundhir123456@gmail.com', NULL, '$2y$10$5duqjpPVp33PQDjvA52eEeWhNDGfO54xurtdaEsSDZ7.S9sJ8bQ0S', NULL, 0, NULL, '2020-12-01 22:31:48', '2020-12-01 22:31:48'),
(56, 'Devesh', 'kasganj', 'kasganj', 'uttar pradesh', 'INDIA', '207123', '6397202816', 'Deveshpundhir1234@gmail.com', NULL, '$2y$10$8fJ8DkUFLRt0l1fX6kubd.lTMtgGypUg1XomjhHwoYwDUYGa6gpGi', NULL, 0, NULL, '2021-03-18 08:35:10', '2021-03-20 23:55:04'),
(57, 'Bhupendr', 'kasganj', 'kasganj', 'uttar pradesh', 'INDIA', '207123', '06397202816', 'Bhupendr1234@gmail.com', NULL, '$2y$10$C1Csd.Is1QUoO/INdaf0g.Opf6VEfkmW3pJ3wxiVaKwutIRx4p/Tq', NULL, 0, NULL, '2021-03-21 01:42:47', '2021-03-21 01:56:34'),
(58, 'Akash', 'kasganj', 'kasganj', 'uttar pradesh', 'INDIA', '207123', '7818897029', 'Akashpundhir1234@gmail.com', NULL, '$2y$10$.UsAkVW3rvEGQf.zPa5D..GPPl1qPjd7Z6DJ0p8U2n2Dz6aFIgQ/y', NULL, 0, NULL, '2021-03-21 02:13:21', '2021-03-21 02:14:09'),
(59, 'Suresh', NULL, NULL, NULL, NULL, NULL, NULL, 'Sureshpundhir1234@gmail.com', NULL, '$2y$10$gYnIhW9rcOVXfXQowX.Zg.y32OVvfyjDUUrheG3n80fpiSZurtNku', NULL, 0, NULL, '2021-03-22 02:20:03', '2021-03-22 02:20:03'),
(60, 'harsh', 'kasganj', 'kasganj', 'uttar pradesh', 'INDIA', '207123', '06397202816', 'harsh1234@gmail.com', NULL, '$2y$10$3t3fsHgW5o41kA/sSc.Xu.hYm5eGgtWPFMxiuhaaX2jZ3zwALgHc6', NULL, 0, NULL, '2021-06-24 10:21:15', '2021-06-24 10:22:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productsattributes`
--
ALTER TABLE `productsattributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `pincodes`
--
ALTER TABLE `pincodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `productsattributes`
--
ALTER TABLE `productsattributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
