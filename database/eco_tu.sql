-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2022 at 07:32 AM
-- Server version: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eco_tu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `email_verified_at`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rony Islam', 'admin', '01792702312', 'rony.rng@gmail.com', NULL, '$2y$10$qPATotlP/2twwiUa4Wtxbu6LUTO3li0YlkomPCnzafTr5Et1zTcQO', NULL, 1, NULL, '2021-03-18 03:41:27', '2021-03-18 03:41:27'),
(2, 'Arafat Hossen', 'subadmin', '01792702311', 'arafat@gmail.com', NULL, '$2y$10$hwll0eyvt46XqkfjLqVQkuzzNbxqXlvQOyRWrCdNni8XrfIKsct4i', NULL, 1, NULL, '2021-03-18 03:41:27', '2021-03-18 03:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangladeshi', '1', '2021-03-18 08:24:53', '2021-05-21 12:17:14'),
(2, 'China', '1', '2021-03-18 08:25:03', '2021-03-18 08:25:03'),
(3, 'Indian', '1', '2021-03-18 08:25:18', '2021-03-18 08:25:18'),
(4, 'Vision', '1', '2021-03-18 08:25:41', '2021-03-18 08:25:41'),
(5, 'RFL', '1', '2021-03-18 08:26:05', '2021-06-03 22:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Clothing', 'clothing', 'public/backend/upload/category/clothing95047.jpg', 0, 1, '2021-03-18 08:27:53', '2021-03-18 08:27:53'),
(2, 'Electronics', 'electronics', 'public/backend/upload/category/electronics16455.png', 0, 1, '2021-03-18 08:32:51', '2021-03-18 08:32:51'),
(3, 'Health & Beauty', 'health-beauty', NULL, 0, 1, '2021-03-18 08:33:30', '2021-03-18 08:33:30'),
(4, 'Watches', 'watches', NULL, 0, 1, '2021-03-18 08:34:58', '2021-03-18 08:34:58'),
(5, 'Sunglasess', 'sunglasess', NULL, 0, 1, '2021-03-18 08:35:23', '2021-03-18 08:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `countriesy_code` varchar(2) NOT NULL DEFAULT '',
  `countriesy_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countriesy_code`, `countriesy_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subsubcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `users` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_option`, `coupon_code`, `category_id`, `subcategory_id`, `subsubcategory_id`, `users`, `coupon_type`, `amount_type`, `amount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manual', 'zUPltoLI', NULL, NULL, NULL, NULL, 'Single Times', 'Percentage', 35.00, '2021-04-30', 1, '2021-03-18 10:33:24', '2021-03-18 10:33:24'),
(2, 'Manual', 'rony', NULL, NULL, NULL, NULL, 'Multiple Times', 'Percentage', 13.00, '2021-06-23', 1, '2021-03-18 12:17:52', '2021-06-03 23:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `first_name`, `last_name`, `address`, `country`, `division`, `district`, `zip_code`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 1, '2021-03-18 12:22:10', '2021-06-03 10:34:54'),
(4, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Rangpur', '32848', '01837282712', 1, '2021-03-18 21:40:42', '2021-06-03 10:34:13'),
(5, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Dhaka', '10199', '0172912912', 1, '2021-03-19 00:10:43', '2021-06-06 08:04:29'),
(7, 2, 'Arafat', 'Rony', 'Chilahati, Nilphamari', 'Bangladesh', 'jashor', 'Jashore', '1209', '+8801792702312', 1, '2021-06-24 23:06:51', '2021-06-24 23:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `division_id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lon` varchar(15) DEFAULT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `url`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd'),
(2, 1, 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', NULL, NULL, 'www.rangamati.gov.bd'),
(5, 1, 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd'),
(6, 1, 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', NULL, NULL, 'www.coxsbazar.gov.bd'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd'),
(11, 1, 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd'),
(13, 2, 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd'),
(14, 2, 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd'),
(15, 2, 'Rajshahi', 'রাজশাহী', NULL, NULL, 'www.rajshahi.gov.bd'),
(16, 2, 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', NULL, NULL, 'www.joypurhat.gov.bd'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd'),
(19, 2, 'Naogaon', 'নওগাঁ', NULL, NULL, 'www.naogaon.gov.bd'),
(20, 3, 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL, 'www.satkhira.gov.bd'),
(22, 3, 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd'),
(23, 3, 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd'),
(26, 3, 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd'),
(27, 3, 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd'),
(28, 3, 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL, 'www.jhalakathi.gov.bd'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd'),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL, 'www.pirojpur.gov.bd'),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL, 'www.barisal.gov.bd'),
(34, 4, 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd'),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL, 'www.barguna.gov.bd'),
(36, 5, 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd'),
(40, 6, 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd'),
(41, 6, 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL, 'www.shariatpur.gov.bd'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd'),
(44, 6, 'Tangail', 'টাঙ্গাইল', NULL, NULL, 'www.tangail.gov.bd'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL, 'www.manikganj.gov.bd'),
(47, 6, 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL, 'www.munshiganj.gov.bd'),
(49, 6, 'Rajbari', 'রাজবাড়ী', '23.7574305', '89.6444665', 'www.rajbari.gov.bd'),
(50, 6, 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd'),
(52, 6, 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd'),
(54, 7, 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL, 'www.lalmonirhat.gov.bd'),
(56, 7, 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd'),
(59, 7, 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd'),
(61, 8, 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', '24.7465670', '90.4072093', 'www.mymensingh.gov.bd'),
(63, 8, 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd'),
(64, 8, 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_26_131725_create_admins_table', 1),
(5, '2021_02_26_165512_create_categories_table', 1),
(6, '2021_02_26_170104_create_sub_categories_table', 1),
(7, '2021_02_26_170416_create_sub_sub_categories_table', 1),
(8, '2021_02_27_131133_create_brands_table', 1),
(9, '2021_02_27_134250_create_products_table', 1),
(10, '2021_02_28_061638_create_product_attributes_table', 1),
(11, '2021_02_28_125315_create_product_images_table', 1),
(12, '2021_03_08_141015_create_coupons_table', 1),
(13, '2021_03_09_041001_add_columns_to_users_table', 1),
(14, '2021_03_17_151739_create_delivery_addresses_table', 1),
(15, '2021_03_19_044000_create_orders_table', 2),
(16, '2021_03_19_044831_create_order_products_table', 3),
(17, '2021_03_19_161147_create_order_statuses_table', 4),
(18, '2021_06_03_084759_create_order_logs_table', 5),
(19, '2021_06_03_090401_add_colums_to_orders_table', 6),
(20, '2021_06_03_161944_create_shipping_charges_table', 7),
(21, '2021_06_08_052359_create_subscribers_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charges` double(8,2) DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` double(8,2) DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` double(8,2) NOT NULL,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `currency` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `address`, `country`, `division`, `district`, `zip_code`, `mobile`, `email`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `payment_gateway`, `transaction_id`, `status`, `grand_total`, `courier_name`, `tracking_number`, `amount`, `currency`, `created_at`, `updated_at`) VALUES
(61, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, 'rony', 100.00, 'New', 'COD', 'COD', NULL, NULL, 11750.00, NULL, NULL, 11750, 'BDT', '2021-03-24 08:08:31', '2021-03-24 08:08:31'),
(62, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', NULL, NULL, 7200.00, NULL, NULL, 7200, 'BDT', '2021-03-24 08:10:59', '2021-03-24 08:10:59'),
(63, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', NULL, NULL, 3800.00, NULL, NULL, 3800, 'BDT', '2021-03-24 08:14:12', '2021-03-24 08:14:12'),
(64, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '501694855', 'Pending', 51400.00, NULL, NULL, 51400, 'BDT', '2021-03-24 08:18:22', '2021-03-24 08:18:22'),
(65, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '860504756', 'Pending', 51400.00, NULL, NULL, 51400, 'BDT', '2021-03-24 08:20:51', '2021-03-24 08:20:51'),
(66, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1710867268', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:22:36', '2021-03-24 08:22:36'),
(67, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1574284827', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:23:15', '2021-03-24 08:23:15'),
(68, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '419451872', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:23:51', '2021-03-24 08:23:51'),
(69, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1610450093', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:32:07', '2021-03-24 08:32:07'),
(70, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1675497729', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:33:51', '2021-03-24 08:33:51'),
(71, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1712981888', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:34:02', '2021-03-24 08:34:02'),
(72, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '379588722', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:34:10', '2021-03-24 08:34:10'),
(73, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '71658812', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:34:27', '2021-03-24 08:34:27'),
(74, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1608396229', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:35:44', '2021-03-24 08:35:44'),
(75, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '949648820', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:37:14', '2021-03-24 08:37:14'),
(76, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '714401627', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:38:29', '2021-03-24 08:38:29'),
(77, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '773876794', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:39:49', '2021-03-24 08:39:49'),
(78, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '868351719', 'Pending', 51970.00, NULL, NULL, 51970, 'BDT', '2021-03-24 08:46:20', '2021-03-24 08:46:20'),
(79, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 'arafat@yopmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1520235226', 'Pending', 1800.00, NULL, NULL, 1800, 'BDT', '2021-03-24 08:53:54', '2021-03-24 08:53:54'),
(80, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Qui nemo id ab bland', '32848', '01837282712', 'arafat@yopmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1477986381', 'Pending', 1800.00, NULL, NULL, 1800, 'BDT', '2021-03-24 08:55:28', '2021-03-24 08:55:28'),
(81, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Qui nemo id ab bland', '32848', '01837282712', 'arafat@yopmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1491514346', 'Pending', 1900.00, NULL, NULL, 1900, 'BDT', '2021-03-24 09:17:22', '2021-03-24 09:17:22'),
(82, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 'arafat@yopmail.com', 0.00, 'zUPltoLI', 3748.00, 'New', 'Prepaid', 'SSLCommerz', '136159635', 'Complete', 6962.00, NULL, NULL, 6962, 'BDT', '2021-03-24 09:23:10', '2021-03-24 09:23:10'),
(83, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Qui nemo id ab bland', '32848', '01837282712', 'arafat@yopmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1371149356', 'Complete', 6000.00, NULL, NULL, 6000, 'BDT', '2021-03-24 09:26:28', '2021-03-24 09:26:28'),
(84, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 'arafat@yopmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '184067874', 'Complete', 3000.00, NULL, NULL, 3000, 'BDT', '2021-03-24 09:27:41', '2021-03-24 09:27:41'),
(85, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Qui nemo id ab bland', '32848', '01837282712', 'arafat@yopmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1518750480', 'Failed', 3600.00, NULL, NULL, 3600, 'BDT', '2021-03-24 09:28:50', '2021-03-24 09:28:50'),
(86, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Qui nemo id ab bland', '32848', '01837282712', 'arafat@yopmail.com', 0.00, NULL, NULL, 'Cancelled', 'Prepaid', 'SSLCommerz', '491753005', 'Failed', 48400.00, NULL, NULL, 48400, 'BDT', '2021-03-24 09:32:15', '2021-03-24 09:56:35'),
(87, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Qui nemo id ab bland', '32848', '01837282712', 'arafat@yopmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '2071263694', 'Complete', 48400.00, NULL, NULL, 48400, 'BDT', '2021-03-24 09:33:32', '2021-03-24 09:33:32'),
(88, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Qui nemo id ab bland', '32848', '01837282712', 'arafat@yopmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '207988911', 'Complete', 3800.00, NULL, NULL, 3800, 'BDT', '2021-03-24 09:34:20', '2021-03-24 09:34:20'),
(89, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Qui nemo id ab bland', '32848', '01837282712', 'arafat@yopmail.com', 0.00, 'zUPltoLI', 2047.00, 'New', 'Prepaid', 'SSLCommerz', '340586922', 'Complete', 3803.00, NULL, NULL, 3803, 'BDT', '2021-03-24 09:36:06', '2021-03-24 09:36:06'),
(90, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Qui nemo id ab bland', '32848', '01837282712', 'arafat@yopmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'Stripe', 'ch_1IYYyHBWuuxf9hWHs8iCd8l0', 'Complete', 3600.00, NULL, NULL, 3600, 'BDT', '2021-03-24 09:44:56', '2021-03-24 09:44:56'),
(91, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Qui nemo id ab bland', '32848', '01837282712', 'arafat@yopmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'Stripe', 'ch_1IYZ06BWuuxf9hWHWMPleByN', 'Complete', 1140.00, NULL, NULL, 1140, 'BDT', '2021-03-24 09:51:19', '2021-03-24 09:51:19'),
(92, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Qui nemo id ab bland', '32848', '01837282712', 'arafat@yopmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'Stripe', 'ch_1IYZ1CBWuuxf9hWHcrJLa9RQ', 'Complete', 3600.00, NULL, NULL, 3600, 'BDT', '2021-03-24 09:53:01', '2021-03-24 09:53:01'),
(93, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 'arafat@yopmail.com', 0.00, 'rony', 100.00, 'Shipped', 'Prepaid', 'Stripe', 'ch_1IYZ36BWuuxf9hWHB22pf2Zk', 'Complete', 49020.00, 'Sundorban', '2222333', 49020, 'BDT', '2021-03-24 09:54:35', '2021-06-03 04:10:59'),
(94, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 'arafat@yopmail.com', 0.00, NULL, NULL, 'New', 'Prepaid', 'Stripe', 'ch_1IYkNsBWuuxf9hWHAoBrDMjk', 'Complete', 1053.00, NULL, NULL, 1053, 'BDT', '2021-03-24 22:00:51', '2021-03-24 22:00:51'),
(95, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, 'zUPltoLI', 199.00, 'Cancelled', 'Prepaid', 'SSLCommerz', '213828986', 'Pending', 371.00, NULL, NULL, 371, 'BDT', '2021-03-30 09:37:58', '2021-03-30 09:39:33'),
(96, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, 'zUPltoLI', 199.00, 'New', 'Prepaid', 'SSLCommerz', '1416360205', 'Pending', 371.00, NULL, NULL, 371, 'BDT', '2021-03-30 09:39:43', '2021-03-30 09:39:43'),
(97, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, 'zUPltoLI', 199.00, 'New', 'Prepaid', 'SSLCommerz', '1570322700', 'Complete', 371.00, NULL, NULL, 371, 'BDT', '2021-03-30 09:41:46', '2021-03-30 09:41:46'),
(98, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Voluptas facere qui', '10199', '0172912912', 'rony.rngp@gmail.com', 0.00, 'rony', 100.00, 'Shipped', 'Prepaid', 'Stripe', 'ch_1Ic9ywBWuuxf9hWHkccV1EmT', 'Complete', 1250.00, 'International Courier', '2334343', 1250, 'BDT', '2021-04-03 07:57:05', '2021-06-03 10:15:39'),
(99, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 'arafat@yopmail.com', 0.00, NULL, NULL, 'Cancelled', 'Prepaid', 'SSLCommerz', '1441474349', 'Pending', 1613.00, NULL, NULL, 1613, 'BDT', '2021-04-14 22:57:56', '2021-06-03 09:50:34'),
(100, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Qui nemo id ab bland', '32848', '01837282712', 'arafat@yopmail.com', 0.00, 'rony', 100.00, 'Shipped', 'Prepaid', 'SSLCommerz', '85392774', 'Complete', 1700.00, 'International Courier', '2233212', 1700, 'BDT', '2021-05-05 07:42:45', '2021-06-03 09:46:46'),
(101, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 'arafat@yopmail.com', 0.00, 'rony', 100.00, 'Delivered', 'Prepaid', 'Stripe', 'ch_1IoVmfBWuuxf9hWH3DMwaR1q', 'Complete', 2900.00, 'Sundorban', '12121212', 2900, 'BDT', '2021-05-07 09:39:08', '2021-06-03 03:59:18'),
(102, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 'arafat@yopmail.com', 0.00, NULL, NULL, 'Delivered', 'Prepaid', 'Stripe', 'ch_1Iy8neBWuuxf9hWHZtgPqRLt', 'Complete', 3000.00, 'Sundorban', '11111111', 3000, 'BDT', '2021-06-02 23:05:01', '2021-06-03 03:46:30'),
(103, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 'arafat@yopmail.com', 35.00, 'rony', 120.00, 'Shipped', 'Prepaid', 'SSLCommerz', '516639127', 'Complete', 845.00, 'International Courier', '232232234', 845, 'BDT', '2021-06-04 08:47:50', '2021-06-04 08:51:16'),
(104, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Rangpur', '32848', '01837282712', 'arafat@yopmail.com', 40.00, NULL, NULL, 'New', 'Prepaid', 'Stripe', 'ch_1IyemmBWuuxf9hWH23j2Oa31', 'Complete', 610.00, NULL, NULL, 610, 'BDT', '2021-06-04 09:17:31', '2021-06-04 09:17:31'),
(105, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 'arafat@yopmail.com', 120.00, 'rony', 390.00, 'Shipped', 'COD', 'COD', NULL, NULL, 2730.00, 'Sundorban', '12121212', 2730, 'BDT', '2021-06-04 09:52:47', '2021-06-04 09:56:06'),
(106, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Dhaka', '10199', '0172912912', 'rony.rngp@gmail.com', 40.00, 'rony', 347.00, 'Delivered', 'Prepaid', 'SSLCommerz', '1610200499', 'Complete', 2365.00, 'International Courier', '434545323', 2365, 'BDT', '2021-06-06 08:04:59', '2021-06-06 08:20:04'),
(107, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Rangpur', '32848', '01837282712', 'arafat@yopmail.com', 40.00, NULL, NULL, 'New', 'COD', 'COD', NULL, NULL, 390.00, NULL, NULL, 390, 'BDT', '2021-06-17 09:19:04', '2021-06-17 09:19:04'),
(108, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Dhaka', '10199', '0172912912', 'rony.rngp@gmail.com', 60.00, NULL, NULL, 'New', 'Prepaid', 'Stripe', NULL, 'Pending', 3060.00, NULL, NULL, 3060, 'BDT', '2021-06-17 10:34:57', '2021-06-17 10:34:57'),
(109, 2, 'Destiny', 'Underwood', 'Ex elit repudiandae', 'Croatia (Hrvatska)', 'Molestiae quisquam s', 'Dhaka', '10199', '0172912912', 'rony.rngp@gmail.com', 40.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1692870143', 'Complete', 2620.00, NULL, NULL, 2620, 'BDT', '2021-06-24 03:13:06', '2021-06-24 03:13:06'),
(110, 2, 'Arafat', 'Rony', 'Chilahati, Nilphamari', 'Bangladesh', 'jashor', 'Jashore', '1209', '+8801792702312', 'rony.rngp@gmail.com', 70.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '877113330', 'Complete', 2650.00, NULL, NULL, 2650, 'BDT', '2021-06-24 23:07:58', '2021-06-24 23:07:58'),
(111, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 'arafat@yopmail.com', 35.00, NULL, NULL, 'New', 'COD', 'COD', NULL, NULL, 605.00, NULL, NULL, 605, 'BDT', '2021-09-02 09:12:21', '2021-09-02 09:12:21'),
(112, 1, 'Rony', 'Islam', 'Chilahati Domar Nilphamari', 'Bangladesh', 'Rangpur', 'Nilphamari', '1209', '01792702312', 'arafat@yopmail.com', 70.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '1870910358', 'Pending', 2410.00, NULL, NULL, 2410, 'BDT', '2021-09-13 08:09:34', '2021-09-13 08:09:34'),
(113, 1, 'Maxwell', 'Newman', 'Minus provident lab', 'Tonga', 'Voluptate veniam de', 'Rangpur', '32848', '01837282712', 'arafat@yopmail.com', 40.00, NULL, NULL, 'New', 'Prepaid', 'SSLCommerz', '294812224', 'Complete', 390.00, NULL, NULL, 390, 'BDT', '2021-09-16 21:41:01', '2021-09-16 21:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_logs`
--

CREATE TABLE `order_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_logs`
--

INSERT INTO `order_logs` (`id`, `order_id`, `order_status`, `created_at`, `updated_at`) VALUES
(7, 102, 'In Process', '2021-06-03 03:46:18', '2021-06-03 03:46:18'),
(8, 102, 'Shipped', '2021-06-03 03:46:25', '2021-06-03 03:46:25'),
(9, 102, 'Delivered', '2021-06-03 03:46:30', '2021-06-03 03:46:30'),
(10, 101, 'Hold', '2021-06-03 03:47:56', '2021-06-03 03:47:56'),
(11, 101, 'In Process', '2021-06-03 03:57:05', '2021-06-03 03:57:05'),
(12, 101, 'Shipped', '2021-06-03 03:58:31', '2021-06-03 03:58:31'),
(13, 101, 'Delivered', '2021-06-03 03:59:18', '2021-06-03 03:59:18'),
(14, 100, 'Pending', '2021-06-03 04:04:03', '2021-06-03 04:04:03'),
(15, 100, 'In Process', '2021-06-03 04:06:19', '2021-06-03 04:06:19'),
(16, 93, 'In Process', '2021-06-03 04:07:41', '2021-06-03 04:07:41'),
(17, 93, 'Shipped', '2021-06-03 04:10:59', '2021-06-03 04:10:59'),
(18, 100, 'Shipped', '2021-06-03 09:46:46', '2021-06-03 09:46:46'),
(19, 99, 'Cancelled', '2021-06-03 09:50:34', '2021-06-03 09:50:34'),
(20, 98, 'Shipped', '2021-06-03 10:15:40', '2021-06-03 10:15:40'),
(21, 103, 'In Process', '2021-06-04 08:50:33', '2021-06-04 08:50:33'),
(22, 103, 'Shipped', '2021-06-04 08:51:16', '2021-06-04 08:51:16'),
(23, 105, 'Shipped', '2021-06-04 09:56:06', '2021-06-04 09:56:06'),
(24, 106, 'In Process', '2021-06-06 08:07:03', '2021-06-06 08:07:03'),
(25, 106, 'Shipped', '2021-06-06 08:19:03', '2021-06-06 08:19:03'),
(26, 106, 'Delivered', '2021-06-06 08:20:04', '2021-06-06 08:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_color`, `product_size`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(124, 61, 2, 5, 'B4005', 'Men\'s Leather Jacket Stand-up Collar Zipper Casual Jack', 'Black', 'Medium', 1800.00, 5, '2021-03-24 08:08:32', '2021-03-24 08:08:32'),
(125, 61, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 5, '2021-03-24 08:08:32', '2021-03-24 08:08:32'),
(126, 62, 2, 5, 'B4005', 'Men\'s Leather Jacket Stand-up Collar Zipper Casual Jack', 'Black', 'Medium', 1800.00, 4, '2021-03-24 08:10:59', '2021-03-24 08:10:59'),
(127, 63, 2, 5, 'B4005', 'Men\'s Leather Jacket Stand-up Collar Zipper Casual Jack', 'Black', 'Large', 1900.00, 2, '2021-03-24 08:14:12', '2021-03-24 08:14:12'),
(128, 64, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:18:22', '2021-03-24 08:18:22'),
(129, 64, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:18:22', '2021-03-24 08:18:22'),
(130, 65, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:20:51', '2021-03-24 08:20:51'),
(131, 65, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:20:52', '2021-03-24 08:20:52'),
(132, 66, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:22:37', '2021-03-24 08:22:37'),
(133, 66, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:22:37', '2021-03-24 08:22:37'),
(134, 66, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:22:37', '2021-03-24 08:22:37'),
(135, 67, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:23:15', '2021-03-24 08:23:15'),
(136, 67, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:23:15', '2021-03-24 08:23:15'),
(137, 67, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:23:16', '2021-03-24 08:23:16'),
(138, 68, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:23:51', '2021-03-24 08:23:51'),
(139, 68, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:23:51', '2021-03-24 08:23:51'),
(140, 68, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:23:51', '2021-03-24 08:23:51'),
(141, 69, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:32:07', '2021-03-24 08:32:07'),
(142, 69, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:32:07', '2021-03-24 08:32:07'),
(143, 69, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:32:08', '2021-03-24 08:32:08'),
(144, 70, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:33:51', '2021-03-24 08:33:51'),
(145, 70, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:33:52', '2021-03-24 08:33:52'),
(146, 70, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:33:52', '2021-03-24 08:33:52'),
(147, 71, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:34:02', '2021-03-24 08:34:02'),
(148, 71, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:34:02', '2021-03-24 08:34:02'),
(149, 71, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:34:03', '2021-03-24 08:34:03'),
(150, 72, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:34:10', '2021-03-24 08:34:10'),
(151, 72, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:34:10', '2021-03-24 08:34:10'),
(152, 72, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:34:10', '2021-03-24 08:34:10'),
(153, 73, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:34:27', '2021-03-24 08:34:27'),
(154, 73, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:34:27', '2021-03-24 08:34:27'),
(155, 73, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:34:27', '2021-03-24 08:34:27'),
(156, 74, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:35:44', '2021-03-24 08:35:44'),
(157, 74, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:35:44', '2021-03-24 08:35:44'),
(158, 74, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:35:44', '2021-03-24 08:35:44'),
(159, 75, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:37:15', '2021-03-24 08:37:15'),
(160, 75, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:37:15', '2021-03-24 08:37:15'),
(161, 75, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:37:15', '2021-03-24 08:37:15'),
(162, 76, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:38:29', '2021-03-24 08:38:29'),
(163, 76, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:38:29', '2021-03-24 08:38:29'),
(164, 76, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:38:29', '2021-03-24 08:38:29'),
(165, 77, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:39:49', '2021-03-24 08:39:49'),
(166, 77, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:39:49', '2021-03-24 08:39:49'),
(167, 77, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:39:50', '2021-03-24 08:39:50'),
(168, 78, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 08:46:20', '2021-03-24 08:46:20'),
(169, 78, 2, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 08:46:20', '2021-03-24 08:46:20'),
(170, 78, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-24 08:46:20', '2021-03-24 08:46:20'),
(171, 79, 1, 5, 'B4005', 'Men\'s Leather Jacket Stand-up Collar Zipper Casual Jack', 'Black', 'Medium', 1800.00, 1, '2021-03-24 08:53:54', '2021-03-24 08:53:54'),
(172, 80, 1, 5, 'B4005', 'Men\'s Leather Jacket Stand-up Collar Zipper Casual Jack', 'Black', 'Medium', 1800.00, 1, '2021-03-24 08:55:29', '2021-03-24 08:55:29'),
(173, 81, 1, 5, 'B4005', 'Men\'s Leather Jacket Stand-up Collar Zipper Casual Jack', 'Black', 'Large', 1900.00, 1, '2021-03-24 09:17:22', '2021-03-24 09:17:22'),
(174, 82, 1, 5, 'B4005', 'Men\'s Leather Jacket Stand-up Collar Zipper Casual Jack', 'Black', 'Medium', 1800.00, 5, '2021-03-24 09:23:10', '2021-03-24 09:23:10'),
(175, 82, 1, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 3, '2021-03-24 09:23:10', '2021-03-24 09:23:10'),
(176, 83, 1, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 2, '2021-03-24 09:26:28', '2021-03-24 09:26:28'),
(177, 84, 1, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-03-24 09:27:41', '2021-03-24 09:27:41'),
(178, 85, 1, 5, 'B4005', 'Men\'s Leather Jacket Stand-up Collar Zipper Casual Jack', 'Black', 'Medium', 1800.00, 2, '2021-03-24 09:28:50', '2021-03-24 09:28:50'),
(179, 86, 1, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 09:32:15', '2021-03-24 09:32:15'),
(180, 87, 1, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 09:33:32', '2021-03-24 09:33:32'),
(181, 88, 1, 5, 'B4005', 'Men\'s Leather Jacket Stand-up Collar Zipper Casual Jack', 'Black', 'Large', 1900.00, 2, '2021-03-24 09:34:20', '2021-03-24 09:34:20'),
(182, 89, 1, 3, 'B4003', 'New White Shirts', 'White', 'Medium', 675.00, 2, '2021-03-24 09:36:06', '2021-03-24 09:36:06'),
(183, 89, 1, 4, 'B4004', 'Toys for Kids - Best Buy', 'Gray', NULL, 900.00, 5, '2021-03-24 09:36:06', '2021-03-24 09:36:06'),
(184, 90, 1, 5, 'B4005', 'Men\'s Leather Jacket Stand-up Collar Zipper Casual Jack', 'Black', 'Medium', 1800.00, 2, '2021-03-24 09:44:56', '2021-03-24 09:44:56'),
(185, 91, 1, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 2, '2021-03-24 09:51:19', '2021-03-24 09:51:19'),
(186, 92, 1, 5, 'B4005', 'Men\'s Leather Jacket Stand-up Collar Zipper Casual Jack', 'Black', 'Medium', 1800.00, 2, '2021-03-24 09:53:01', '2021-03-24 09:53:01'),
(187, 93, 1, 6, 'B4006', 'Inspiron 15 5000 Laptop', 'Silver', NULL, 48400.00, 1, '2021-03-24 09:54:35', '2021-03-24 09:54:35'),
(188, 93, 1, 3, 'B4003', 'New White Shirts', 'White', 'Large', 720.00, 1, '2021-03-24 09:54:35', '2021-03-24 09:54:35'),
(189, 94, 1, 3, 'B4003', 'New White Shirts', 'White', 'Large', 720.00, 1, '2021-03-24 22:00:51', '2021-03-24 22:00:51'),
(190, 94, 1, 2, 'B4002', 'Litio T-shirt SS', 'Black', 'Medium', 333.00, 1, '2021-03-24 22:00:51', '2021-03-24 22:00:51'),
(191, 95, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-30 09:37:58', '2021-03-30 09:37:58'),
(192, 96, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-30 09:39:43', '2021-03-30 09:39:43'),
(193, 97, 2, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-03-30 09:41:46', '2021-03-30 09:41:46'),
(194, 98, 2, 3, 'B4003', 'New White Shirts', 'White', 'Medium', 675.00, 2, '2021-04-03 07:57:06', '2021-04-03 07:57:06'),
(195, 99, 1, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 2, '2021-04-14 22:57:56', '2021-04-14 22:57:56'),
(196, 99, 1, 1, 'B4001', 'EYEBOGLER Men Yellow Regular fit Cotton Round neck T-Shirt - Pack Of 1', 'Yellow', 'Large', 473.00, 1, '2021-04-14 22:57:57', '2021-04-14 22:57:57'),
(197, 100, 1, 4, 'B4004', 'Toys for Kids - Best Buy', 'Gray', NULL, 900.00, 2, '2021-05-05 07:42:46', '2021-05-05 07:42:46'),
(198, 101, 1, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-05-07 09:39:09', '2021-05-07 09:39:09'),
(199, 102, 1, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-06-02 23:05:01', '2021-06-02 23:05:01'),
(200, 103, 1, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-06-04 08:47:51', '2021-06-04 08:47:51'),
(201, 103, 1, 2, 'B4002', 'Litio T-shirt SS', 'Black', 'Large', 360.00, 1, '2021-06-04 08:47:51', '2021-06-04 08:47:51'),
(202, 104, 1, 8, 'B4008', 'Flipkart Watches - Buy Watches Online at Best Prices', 'Black', NULL, 570.00, 1, '2021-06-04 09:17:31', '2021-06-04 09:17:31'),
(203, 105, 1, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-06-04 09:52:47', '2021-06-04 09:52:47'),
(204, 106, 2, 41, 'B4010', 'Uniqlo MEN ULTRA LIGHT DOWN JACKET', 'Black, White, Gray', 'Extra Large', 2322.00, 1, '2021-06-06 08:04:59', '2021-06-06 08:04:59'),
(205, 106, 2, 40, 'B4009', 'Sunglasses For Men', 'Black', NULL, 350.00, 1, '2021-06-06 08:04:59', '2021-06-06 08:04:59'),
(206, 107, 1, 40, 'B4009', 'Sunglasses For Men', 'Black', NULL, 350.00, 1, '2021-06-17 09:19:04', '2021-06-17 09:19:04'),
(207, 108, 2, 7, 'B4007', 'Tp Link 0043', 'Black', NULL, 3000.00, 1, '2021-06-17 10:34:57', '2021-06-17 10:34:57'),
(208, 109, 2, 41, 'B4010', 'Uniqlo MEN ULTRA LIGHT DOWN JACKET', 'Black, White, Gray', 'Extra Large', 2580.00, 1, '2021-06-24 03:13:07', '2021-06-24 03:13:07'),
(209, 110, 2, 41, 'B4010', 'Uniqlo MEN ULTRA LIGHT DOWN JACKET', 'Black, White, Gray', 'Extra Large', 2580.00, 1, '2021-06-24 23:07:58', '2021-06-24 23:07:58'),
(210, 111, 1, 43, 'rony', 'Arafat Hossen Rony', 'Black', NULL, 570.00, 1, '2021-09-02 09:12:21', '2021-09-02 09:12:21'),
(211, 112, 1, 41, 'B4010', 'Uniqlo MEN ULTRA LIGHT DOWN JACKET', 'Black, White, Gray', 'Medium', 2340.00, 1, '2021-09-13 08:09:35', '2021-09-13 08:09:35'),
(212, 113, 1, 40, 'B4009', 'Sunglasses For Men', 'Black', NULL, 350.00, 1, '2021-09-16 21:41:01', '2021-09-16 21:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New', 1, NULL, NULL),
(2, 'Pending', 1, NULL, NULL),
(3, 'Hold', 1, NULL, NULL),
(4, 'Cancelled', 1, NULL, NULL),
(5, 'In Process', 1, NULL, NULL),
(6, 'Paid', 1, NULL, NULL),
(7, 'Shipped', 1, NULL, NULL),
(8, 'Delivered', 1, NULL, NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subsubcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `discount` double(8,2) NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wash_care` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pattern` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sleeve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occassion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `brand_id`, `name`, `slug`, `code`, `color`, `price`, `discount`, `weight`, `stock`, `main_image`, `description`, `wash_care`, `fabric`, `pattern`, `sleeve`, `fit`, `occassion`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'EYEBOGLER Men Yellow Regular fit Cotton Round neck T-Shirt - Pack Of 1', 'eyebogler-men-yellow-regular-fit-cotton-round-neck-t-shirt-pack-of-1', 'B4001', 'Yellow', 499, 0.00, '123', NULL, 'public/backend/upload/product/main_image/eyebogler-men-yellow-regular-fit-cotton-round-neck-t-shirt-pack-of-17400.jpg', '<p>Durable stitch and Quality finish. This T-shirt is stitched for higher durability using the best technology in the industry. Manufactured from Cotton fabric;this T-shirt is very smooth and soft making it comfortable to wear during all Seasons. This fabric is Durable;Odorless and passed through Anti fading treatment which ensures the T-shirt color to be intact even after repeated washes.</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'Wool', 'Self', 'Half Sleeve', 'Regular', 'Casual', 0, 1, '2021-03-18 09:28:37', '2021-06-04 08:03:09'),
(2, 1, 1, 1, 2, 'Litio T-shirt SS', 'litio-t-shirt-ss', 'B4002', 'Black', 350, 10.00, '200', NULL, 'public/backend/upload/product/main_image/litio-t-shirt-ss91456.png', '<p>Light, fast drying and simple looking T-shirt made from super lightweight DELTAPEAK fabric. You can use it as base layer for summer trail running, hiking or cycling, but as a leisure wear it works great too. It keeps you dry by repelling your sweat at the surface of the fabric, where it can easily evaporate. This T-shirt giving you the impression to have nothing on your shoulders. Litio: when the weight matters.</p>\r\n\r\n<h3>TECHNICAL DETAILS</h3>\r\n\r\n<ul>\r\n	<li>Lightweight</li>\r\n	<li>Breathable</li>\r\n	<li>Fast Drying</li>\r\n	<li>Anti-UV</li>\r\n	<li>Soft hand-feel</li>\r\n	<li>Dimensional stability and recovery</li>\r\n	<li>Anatomical shaping for fit and comfort</li>\r\n	<li>Athletic regular fit</li>\r\n	<li>Flatlock seams prevents chafing enhance comfort while wearing</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', NULL, 'Cotton', 'Solid', 'Short Sleeve', 'Slim', 'Formal', 1, 1, '2021-03-18 09:31:42', '2021-03-18 09:54:42'),
(3, 1, 1, 7, 2, 'New White Shirts', 'new-white-shirts', 'B4003', 'White', 750, 0.00, '150', NULL, 'public/backend/upload/product/main_image/new-white-shirts37084.jpg', '<p>Light, fast drying and simple looking T-shirt made from super lightweight DELTAPEAK fabric. You can use it as base layer for summer trail running, hiking or cycling, but as a leisure wear it works great too. It keeps you dry by repelling your sweat at the surface of the fabric, where it can easily evaporate. This T-shirt giving you the impression to have nothing on your shoulders. Litio: when the weight matters.</p>\r\n\r\n<h3>TECHNICAL DETAILS</h3>\r\n\r\n<ul>\r\n	<li>Lightweight</li>\r\n	<li>Breathable</li>\r\n	<li>Fast Drying</li>\r\n	<li>Anti-UV</li>\r\n	<li>Soft hand-feel</li>\r\n	<li>Dimensional stability and recovery</li>\r\n	<li>Anatomical shaping for fit and comfort</li>\r\n	<li>Athletic regular fit</li>\r\n	<li>Flatlock seams prevents chafing enhance comfort while wearing</li>\r\n</ul>\r\n\r\n<p>MODEL</p>\r\n\r\n<p>Men</p>\r\n\r\n<hr />\r\n<p>MATERIAL</p>\r\n\r\n<p>DELTAPEAK&trade;</p>\r\n\r\n<hr />\r\n<p>SYNTHETIC / NATURAL</p>\r\n\r\n<p>Synthetic</p>\r\n\r\n<hr />\r\n<p>UNDERWEAR MATERIAL</p>\r\n\r\n<p>synteticke</p>\r\n\r\n<hr />\r\n<p>WEIGHT</p>\r\n\r\n<p>94 g</p>\r\n\r\n<hr />\r\n<p>STRUCTURE</p>\r\n\r\n<p>100% Polyester</p>\r\n\r\n<hr />\r\n<p>CARE</p>\r\n\r\n<p>Polyester clothing may be washed manually or in washing machine with the scrimping program at the temperatures of 30&deg;C using usual laundry agents without fabric conditioner. Never use any fabric conditioner! Polyester fibres are more resistant against higher temperatures than the Polypropylene and so the clothing may be carefully ironed at the lowest temperatures, however, clothing steaming only will be ideal. The clothing shall not be dried in a dryer. Line dry is recommended. Do not twist.</p>\r\n\r\n<p>&nbsp;</p>', NULL, 'Wool', 'Printed', 'Full Sleeve', 'Regular', 'Formal', 0, 1, '2021-03-18 09:33:33', '2021-03-18 09:33:33'),
(4, 1, 3, 15, 3, 'Toys for Kids - Best Buy', 'toys-for-kids-best-buy', 'B4004', 'Gray', 1200, 25.00, '250', 8, 'public/backend/upload/product/main_image/toys-for-kids-best-buy4410.jpg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-03-18 09:35:52', '2021-06-04 08:02:44'),
(5, 1, 1, 3, 2, 'Men\'s Leather Jacket Stand-up Collar Zipper Casual Jack', 'mens-leather-jacket-stand-up-collar-zipper-casual-jack', 'B4005', 'Black', 1800, 0.00, '700', NULL, 'public/backend/upload/product/main_image/mens-leather-jacket-stand-up-collar-zipper-casual-jack6597.jpg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', NULL, NULL, NULL, NULL, NULL, 'Casual', 0, 1, '2021-03-18 09:40:35', '2021-06-04 08:02:31'),
(6, 2, 4, 25, 2, 'Inspiron 15 5000 Laptop', 'inspiron-15-5000-laptop', 'B4006', 'Silver', 55000, 12.00, '2200', 10, 'public/backend/upload/product/main_image/inspiron-15-5000-laptop74670.jpg', '<p>Up to 10th Generation Intel&reg; Core&trade; i5-1035G1 Processor (6MB Cache, up to 3.6 GHz)</p>\r\n\r\n<p>Up to Windows 10 Home 64-bit English</p>\r\n\r\n<p>Up to Intel&reg; UHD Graphics with shared graphics memory</p>\r\n\r\n<p>Up to 8 GB, 1 x 8 GB, DDR4, 2666 MHz</p>\r\n\r\n<p>Up to 256GB M.2 PCIe NVMe Solid State Drive</p>', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-03-18 09:47:03', '2021-03-24 09:55:12'),
(7, 2, 5, 29, 2, 'Tp Link 0043', 'tp-link-0043', 'B4007', 'Black', 3000, 0.00, '1200', 14, 'public/backend/upload/product/main_image/tp-link-004354861.jpg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-03-18 09:49:48', '2021-06-04 09:52:47'),
(8, 4, NULL, NULL, 1, 'Flipkart Watches - Buy Watches Online at Best Prices', 'flipkart-watches-buy-watches-online-at-best-prices', 'B4008', 'Black', 600, 5.00, '150', 20, 'public/backend/upload/product/main_image/flipkart-watches-buy-watches-online-at-best-prices44631.jpeg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-03-18 09:53:12', '2021-06-06 07:39:54'),
(40, 5, NULL, NULL, 2, 'Sunglasses For Men', 'sunglasses-for-men', 'B4009', 'Black', 350, 0.00, '60', 12, 'public/backend/upload/product/main_image/sunglasses-for-men27297.jpg', '<p>There&rsquo;s something about putting on a good pair of sunglasses that just elevates our confidence. Slide a pair of Aviators on, and suddenly&nbsp;<strong>you&rsquo;re Tom Cruise in Top Gun</strong>.</p>\r\n\r\n<p>Aviators not your style? Grab some wayfarers, and you&rsquo;re a Blues Brother. It&rsquo;s amazing what a great pair of shades can do.</p>\r\n\r\n<p>Fortunately, there are literally thousands of fashionable styles of sunglasses to choose from, to suit any look and occasion. While&nbsp;<strong>style is 100% key when it comes to picking your perfect pair</strong>, there are protective features to consider, too. Being the instrument through which you see the world, it&rsquo;s safe to say your eyes are worth protecting!</p>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-06-06 07:43:07', '2021-09-16 21:41:24'),
(41, 1, 1, 3, 2, 'Uniqlo MEN ULTRA LIGHT DOWN JACKET', 'uniqlo-men-ultra-light-down-jacket', 'B4010', 'Black, White, Gray', 2600, 0.00, '555', NULL, 'public/backend/upload/product/main_image/uniqlo-men-ultra-light-down-jacket60454.jpg', '<ul>\r\n	<li>Fabric: Outer fabric 91% polyester, 9% elastane; filling 80% premium hydrophobic goose down, 20% feather; lining 100% polyamide.</li>\r\n	<li>Weight: 555g.</li>\r\n	<li>Pack Size: 2000g.</li>\r\n	<li>Drying Time: 14 hours.</li>\r\n	<li>Hydrophobic water repellent down jacket designed for town use.</li>\r\n	<li>RDS Certified.</li>\r\n	<li>Excellent warmth to weight ratio.</li>\r\n	<li>High loft properties.</li>\r\n</ul>', NULL, 'Polyester', 'Solid', 'Full Sleeve', 'Regular', 'Casual', 0, 1, '2021-06-06 07:49:35', '2021-06-24 23:10:44'),
(42, 2, NULL, NULL, 2, 'Dakota Becker', 'dakota-becker', 'Eum velit maxime non', 'Aut ullam voluptas d', 49, 90.00, '200', NULL, 'public/backend/upload/product/main_image/dakota-becker35235.png', '<p>Quis qui numquam har.</p>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-06-08 22:17:20', '2021-06-08 22:17:20'),
(43, 5, NULL, NULL, 2, 'Arafat Hossen Rony', 'arafat-hossen-rony', 'rony', 'Black', 600, 5.00, '0.45', 9, 'public/backend/upload/product/main_image/arafat-hossen-rony93717.jpg', '<p>wwewqe</p>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '2021-09-02 09:11:14', '2021-09-11 22:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'B4001-S', 'Small', 499, 20, 1, '2021-03-18 09:57:27', '2021-03-20 21:27:02'),
(2, 1, 'B4001-M', 'Medium', 520, 15, 1, '2021-03-18 09:57:27', '2021-03-18 09:57:27'),
(3, 1, 'B4001-L', 'Large', 550, 10, 1, '2021-03-18 09:57:27', '2021-03-18 09:57:27'),
(4, 1, 'B4001-XL', 'Extra Large', 600, 5, 1, '2021-03-18 09:57:27', '2021-03-18 09:57:27'),
(5, 5, 'B4005-M', 'Medium', 1800, 8, 1, '2021-03-18 11:48:39', '2021-03-24 09:53:14'),
(6, 5, 'B4005-L', 'Large', 1900, 10, 1, '2021-03-18 11:48:40', '2021-03-24 09:50:41'),
(7, 2, 'B4002-S', 'Small', 350, 10, 1, '2021-03-18 21:36:58', '2021-03-18 21:36:58'),
(8, 2, 'B4002-M', 'Medium', 370, 9, 1, '2021-03-18 21:36:58', '2021-03-24 22:01:27'),
(9, 2, 'B4002-L', 'Large', 400, 4, 1, '2021-03-18 21:36:58', '2021-06-04 08:48:14'),
(10, 3, 'B4003-M', 'Medium', 750, 7, 1, '2021-03-18 21:38:26', '2021-04-03 07:57:48'),
(11, 3, 'B4003-L', 'Large', 800, 5, 1, '2021-03-18 21:38:26', '2021-03-24 22:01:27'),
(12, 3, 'B4003-XL', 'Extra Large', 850, 0, 1, '2021-03-18 21:38:26', '2021-03-18 21:38:26'),
(44, 41, 'B4010-M', 'Medium', 2600, 10, 1, '2021-06-06 07:58:41', '2021-06-06 08:01:39'),
(45, 41, 'B4010-L', 'Large', 2800, 10, 1, '2021-06-06 07:58:41', '2021-06-06 09:37:27'),
(46, 41, 'B4010-XL', 'Extra Large', 3000, 5, 1, '2021-06-06 07:58:41', '2021-06-24 23:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/backend/upload/product/main_image/alt_image/1694585925008303.png', 1, '2021-03-18 09:57:54', '2021-03-18 09:57:54'),
(2, 1, 'public/backend/upload/product/main_image/alt_image/1694585925616667.png', 1, '2021-03-18 09:57:54', '2021-03-18 09:57:54'),
(3, 1, 'public/backend/upload/product/main_image/alt_image/1694585926055566.jpg', 1, '2021-03-18 09:57:54', '2021-03-18 09:57:54'),
(5, 8, 'public/backend/upload/product/main_image/alt_image/1694674495663200.jpeg', 1, '2021-03-19 09:25:41', '2021-03-19 09:25:41'),
(6, 8, 'public/backend/upload/product/main_image/alt_image/1694674540602662.jpg', 1, '2021-03-19 09:26:24', '2021-03-19 09:26:24'),
(7, 41, 'public/backend/upload/product/main_image/alt_image/1701826200410878.jpg', 1, '2021-06-06 07:58:59', '2021-06-06 07:58:59'),
(8, 41, 'public/backend/upload/product/main_image/alt_image/1701826201275410.jpg', 1, '2021-06-06 07:58:59', '2021-06-06 07:58:59'),
(9, 41, 'public/backend/upload/product/main_image/alt_image/1701826201666198.jpg', 1, '2021-06-06 07:59:00', '2021-06-06 07:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `0_500g` double(8,2) NOT NULL,
  `501_1000g` double(8,2) NOT NULL,
  `1001_2000g` double(8,2) NOT NULL,
  `2001_5000g` double(8,2) NOT NULL,
  `above_5000g` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `district`, `0_500g`, `501_1000g`, `1001_2000g`, `2001_5000g`, `above_5000g`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Comilla', 30.00, 60.00, 110.00, 140.00, 190.00, 1, '2021-06-04 03:24:15', '2021-06-03 23:02:15'),
(2, 'Feni', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Brahmanbaria', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(4, 'Rangamati', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(5, 'Noakhali', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(6, 'Chandpur', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(7, 'Lakshmipur', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(8, 'Chattogram', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(9, 'Coxsbazar', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(10, 'Khagrachhari', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(11, 'Bandarban', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(12, 'Sirajganj', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(13, 'Pabna', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(14, 'Bogura', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(15, 'Rajshahi', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(16, 'Natore', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(17, 'Joypurhat', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(18, 'Chapainawabganj', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(19, 'Naogaon', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(20, 'Jashore', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(21, 'Satkhira', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(22, 'Meherpur', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(23, 'Narail', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(24, 'Chuadanga', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(25, 'Kushtia', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(26, 'Magura', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(27, 'Khulna', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(28, 'Bagerhat', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(29, 'Jhenaidah', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(30, 'Jhalakathi', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(31, 'Patuakhali', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(32, 'Pirojpur', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(33, 'Barisal', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(34, 'Bhola', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(35, 'Barguna', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(36, 'Sylhet', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(37, 'Moulvibazar', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(38, 'Habiganj', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(39, 'Sunamganj', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(40, 'Narsingdi', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(41, 'Gazipur', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(42, 'Shariatpur', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(43, 'Narayanganj', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(44, 'Tangail', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(45, 'Kishoreganj', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(46, 'Manikganj', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(47, 'Dhaka', 20.00, 40.00, 60.00, 85.00, 105.00, 1, '2021-06-04 03:24:15', '2021-06-03 23:03:10'),
(48, 'Munshiganj', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(49, 'Rajbari', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(50, 'Madaripur', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(51, 'Gopalganj', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(52, 'Faridpur', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(53, 'Panchagarh', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(54, 'Dinajpur', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(55, 'Lalmonirhat', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(56, 'Nilphamari', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(57, 'Gaibandha', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(58, 'Thakurgaon', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(59, 'Rangpur', 40.00, 80.00, 130.00, 160.00, 210.00, 1, '2021-06-04 03:24:15', '2021-06-03 23:01:43'),
(60, 'Kurigram', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(61, 'Sherpur', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-03 22:42:52'),
(62, 'Mymensingh', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(63, 'Jamalpur', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15'),
(64, 'Netrokona', 35.00, 70.00, 120.00, 150.00, 200.00, 1, '2021-06-04 03:24:15', '2021-06-04 03:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(4, 'ronyislam6999@gmail.com', 1, '2021-06-08 22:05:03', '2021-06-08 22:05:03'),
(5, 'arafat@yopmail.com', 1, '2021-06-08 22:05:08', '2021-06-08 22:05:08'),
(6, 'rony.rngp@gmail.com', 1, '2021-06-08 22:05:16', '2021-06-08 22:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `image`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Man', 'man', NULL, 0, 1, '2021-03-18 08:36:14', '2022-01-02 03:42:37'),
(2, 1, 'Women', 'women', NULL, 0, 1, '2021-03-18 08:36:40', '2022-01-02 03:42:37'),
(3, 1, 'Kids', 'kids', NULL, 0, 1, '2021-03-18 08:37:29', '2021-03-18 08:37:29'),
(4, 2, 'Laptops', 'laptops', NULL, 0, 1, '2021-03-18 08:38:29', '2021-03-18 08:38:29'),
(5, 2, 'Desktops', 'desktops', NULL, 0, 1, '2021-03-18 08:38:36', '2021-03-18 08:38:36'),
(6, 2, 'Cameras', 'cameras', NULL, 0, 1, '2021-03-18 08:39:13', '2021-03-18 08:39:13'),
(7, 2, 'Mobile Phones', 'mobile-phones', NULL, 0, 1, '2021-03-18 08:39:35', '2022-01-02 03:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `subcategory_id`, `name`, `slug`, `image`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'T-Sharts', 't-sharts', NULL, 14, 1, '2021-03-18 08:41:40', '2021-03-18 08:41:40'),
(2, 1, 'Shoes', 'shoes', NULL, 0, 1, '2021-03-18 08:42:02', '2021-03-18 08:42:02'),
(3, 1, 'Jackets', 'jackets', NULL, 10, 1, '2021-03-18 08:42:13', '2021-06-24 23:11:35'),
(5, 1, 'Sport Wear', 'sport-wear', NULL, 0, 1, '2021-03-18 08:43:15', '2021-03-18 08:43:15'),
(6, 1, 'Blazers', 'blazers', NULL, 0, 1, '2021-03-18 08:43:30', '2021-03-18 08:43:30'),
(7, 1, 'Shirts', 'shirts', NULL, 10, 1, '2021-03-18 08:43:46', '2021-03-18 08:43:46'),
(8, 2, 'Handbags', 'handbags', NULL, 0, 1, '2021-03-18 08:52:28', '2021-03-18 08:52:28'),
(9, 2, 'Jewellery', 'jewellery', NULL, 0, 1, '2021-03-18 08:52:43', '2021-03-18 08:52:43'),
(10, 2, 'Swimwear', 'swimwear', NULL, 0, 1, '2021-03-18 08:53:20', '2021-03-18 08:53:20'),
(11, 2, 'Tops', 'tops', NULL, 0, 1, '2021-03-18 08:53:36', '2021-03-18 08:53:36'),
(12, 2, 'Flats', 'flats', NULL, 0, 1, '2021-03-18 08:54:07', '2021-03-18 08:54:07'),
(13, 2, 'Shoes', 'shoes', NULL, 0, 1, '2021-03-18 08:54:42', '2021-03-18 08:54:42'),
(14, 2, 'Winter Wear', 'winter-wear', NULL, 0, 1, '2021-03-18 08:55:07', '2021-03-18 08:55:07'),
(15, 3, 'Toys & Games', 'toys-games', NULL, 0, 1, '2021-03-18 08:56:36', '2021-03-18 08:56:36'),
(16, 3, 'Jeans', 'jeans', NULL, 0, 1, '2021-03-18 08:56:58', '2021-03-18 08:56:58'),
(17, 3, 'Shirts', 'shirts', NULL, 0, 1, '2021-03-18 08:57:13', '2021-03-18 08:57:13'),
(18, 3, 'Shoes', 'shoes', NULL, 0, 1, '2021-03-18 08:57:46', '2021-03-18 08:58:11'),
(19, 3, 'School Bags', 'school-bags', NULL, 0, 1, '2021-03-18 08:58:38', '2021-03-18 08:58:38'),
(20, 3, 'Lunch Box', 'lunch-box', NULL, 0, 1, '2021-03-18 08:58:53', '2021-03-18 08:58:53'),
(21, 3, 'Footwear', 'footwear', NULL, 0, 1, '2021-03-18 08:59:27', '2021-03-18 08:59:27'),
(22, 4, 'Gaming', 'gaming', NULL, 0, 1, '2021-03-18 09:00:56', '2021-03-18 09:00:56'),
(23, 4, 'Laptop Skins', 'laptop-skins', NULL, 0, 1, '2021-03-18 09:01:09', '2021-03-18 09:01:09'),
(24, 4, 'Apple', 'apple', NULL, 0, 1, '2021-03-18 09:01:23', '2021-03-18 09:01:23'),
(25, 4, 'Dell', 'dell', NULL, 0, 1, '2021-03-18 09:01:52', '2021-03-18 09:01:52'),
(26, 4, 'Lenovo', 'lenovo', NULL, 0, 1, '2021-03-18 09:02:06', '2021-03-18 09:02:06'),
(27, 4, 'Microsoft', 'microsoft', NULL, 0, 1, '2021-03-18 09:02:24', '2021-03-18 09:02:24'),
(28, 4, 'Asus', 'asus', NULL, 0, 1, '2021-03-18 09:02:54', '2021-03-18 09:02:54'),
(29, 5, 'Routers & Modems', 'routers-modems', NULL, 0, 1, '2021-03-18 09:03:30', '2021-03-18 09:03:30'),
(30, 5, 'CPUs, Processors', 'cpus-processors', NULL, 0, 1, '2021-03-18 09:03:47', '2021-03-18 09:03:47'),
(31, 5, 'PC Gaming Store', 'pc-gaming-store', NULL, 0, 1, '2021-03-18 09:04:13', '2021-03-18 09:04:13'),
(32, 5, 'Graphics Cards', 'graphics-cards', NULL, 0, 1, '2021-03-18 09:04:42', '2021-03-18 09:04:42'),
(33, 5, 'Components', 'components', NULL, 0, 1, '2021-03-18 09:05:02', '2021-03-18 09:05:02'),
(34, 5, 'Webcam', 'webcam', NULL, 0, 1, '2021-03-18 09:05:18', '2021-03-18 09:05:18'),
(35, 5, 'Memory (RAM)', 'memory-ram', NULL, 0, 1, '2021-03-18 09:05:32', '2021-03-18 09:05:32'),
(36, 5, 'Motherboards', 'motherboards', NULL, 25, 1, '2021-03-18 09:06:29', '2021-03-18 09:06:29'),
(37, 5, 'Keyboards', 'keyboards', NULL, 0, 1, '2021-03-18 09:07:03', '2021-03-18 09:07:03'),
(38, 4, 'HP', 'hp', NULL, 0, 1, '2021-03-18 09:07:39', '2021-03-18 09:07:39'),
(39, 4, 'Cooling Pads', 'cooling-pads', NULL, 0, 1, '2021-03-18 09:08:22', '2021-03-18 09:08:22'),
(40, 6, 'Accessories', 'accessories', NULL, 0, 1, '2021-03-18 09:09:10', '2021-03-18 09:09:10'),
(41, 6, 'Binoculars', 'binoculars', NULL, 0, 1, '2021-03-18 09:09:23', '2021-03-18 09:09:23'),
(42, 6, 'Telescopes', 'telescopes', NULL, 0, 1, '2021-03-18 09:09:41', '2021-03-18 09:09:41'),
(43, 6, 'Camcorders', 'camcorders', NULL, 0, 1, '2021-03-18 09:10:02', '2021-03-18 09:10:02'),
(44, 6, 'Digital', 'digital', NULL, 0, 1, '2021-03-18 09:10:15', '2021-03-18 09:10:15'),
(45, 6, 'Film Cameras', 'film-cameras', NULL, 0, 1, '2021-03-18 09:10:34', '2021-03-18 09:10:34'),
(46, 6, 'Flashes', 'flashes', NULL, 0, 1, '2021-03-18 09:10:52', '2021-03-18 09:10:52'),
(47, 6, 'Lenses', 'lenses', NULL, 0, 1, '2021-03-18 09:11:14', '2021-03-18 09:11:14'),
(48, 6, 'Surveillance', 'surveillance', NULL, 0, 1, '2021-03-18 09:11:34', '2021-03-18 09:11:34'),
(50, 7, 'Apple', 'apple', NULL, 0, 1, '2021-03-18 09:14:10', '2021-03-18 09:14:10'),
(51, 7, 'Samsung', 'samsung', NULL, 0, 1, '2021-03-18 09:14:33', '2021-03-18 09:14:33'),
(52, 7, 'Lenovo', 'lenovo', NULL, 0, 1, '2021-03-18 09:14:49', '2021-03-18 09:14:49'),
(53, 7, 'Motorola', 'motorola', NULL, 0, 1, '2021-03-18 09:15:15', '2021-03-18 09:15:15'),
(54, 7, 'LeEco', 'leeco', NULL, 0, 1, '2021-03-18 09:15:38', '2021-03-18 09:15:38'),
(55, 7, 'Asus', 'asus', NULL, 0, 1, '2021-03-18 09:16:10', '2021-03-18 09:16:10'),
(56, 7, 'Acer', 'acer', NULL, 0, 1, '2021-03-18 09:16:23', '2021-03-18 09:16:23'),
(57, 7, 'Accessories', 'accessories', NULL, 0, 1, '2021-03-18 09:16:35', '2021-03-18 09:16:35'),
(58, 7, 'Headphones', 'headphones', NULL, 0, 1, '2021-03-18 09:16:57', '2021-03-18 09:16:57'),
(59, 1, 'Hudi', 'hudi', NULL, 0, 1, '2021-03-18 09:17:52', '2021-03-18 09:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `state`, `country`, `zip_code`, `mobile`, `email`, `email_verified_at`, `password`, `status`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rony Islam', NULL, NULL, NULL, NULL, NULL, '0169162812', 'arafat@yopmail.com', NULL, '$2y$10$RaGQjozs1uad7SLxETpeh.yN82/P/MCXkOLBjqKweR12gtbZy78vW', 1, 'b069895c6b5ac771330edf41f408d1d2', NULL, '2021-03-18 10:14:54', '2021-03-18 10:15:15'),
(2, 'Arafat Hossen Rony', NULL, NULL, NULL, NULL, NULL, '01729171231', 'rony.rngp@gmail.com', NULL, '$2y$10$T.Wd/HLjFVgU8/ORSsEU9uB60brRcb5FIZ5xt6n1Y3G92Ye.Hg1d2', 1, '65d6c92fd3388be982cfad9337af7b33', NULL, '2021-03-19 00:07:49', '2021-03-19 00:07:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_category_id_foreign` (`category_id`),
  ADD KEY `coupons_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `coupons_subsubcategory_id_foreign` (`subsubcategory_id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_logs`
--
ALTER TABLE `order_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_logs_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_user_id_foreign` (`user_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_subsubcategory_id_foreign` (`subsubcategory_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_sub_categories_subcategory_id_foreign` (`subcategory_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `order_logs`
--
ALTER TABLE `order_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupons_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupons_subsubcategory_id_foreign` FOREIGN KEY (`subsubcategory_id`) REFERENCES `sub_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD CONSTRAINT `delivery_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_logs`
--
ALTER TABLE `order_logs`
  ADD CONSTRAINT `order_logs_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subsubcategory_id_foreign` FOREIGN KEY (`subsubcategory_id`) REFERENCES `sub_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD CONSTRAINT `sub_sub_categories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
