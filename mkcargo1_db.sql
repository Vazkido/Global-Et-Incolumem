-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2022 at 08:10 PM
-- Server version: 5.7.38
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mkcargo1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `Authentication` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `name`, `password`, `status`, `Authentication`) VALUES
(1, 'mkexpadmin', 'Administrator', 'siteAdmin@!321', 'Chief Admin', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `country_id` int(11) NOT NULL,
  `country_tag` varchar(10) NOT NULL DEFAULT '&nbsp;',
  `country_name` varchar(150) NOT NULL DEFAULT '&nbsp;',
  `country_flag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`country_id`, `country_tag`, `country_name`, `country_flag`) VALUES
(1, 'AF', 'Afghanistan', 'afghanistan.png'),
(2, 'AX', 'Aland Islands', 'aland-islands.png'),
(3, 'AL', 'Albania', 'albania.png'),
(4, 'DZ', 'Algeria', 'algeria.png'),
(5, 'AS', 'American Samoa', 'american-samoa.png'),
(6, 'AD', 'Andorra', 'andorra.png'),
(7, 'AO', 'Angola', 'angola.png'),
(8, 'AI', 'Anguilla', 'anguilla.png'),
(9, 'AQ', 'Antarctica', 'antarctica.png'),
(10, 'AG', 'Antigua &amp; Barbuda', 'antigua-and-barbuda.png'),
(11, 'AR', 'Argentina', 'argentina.png'),
(12, 'AM', 'Armenia', 'armenia.png'),
(13, 'AW', 'Aruba', 'aruba.png'),
(14, 'AC', 'Ascension Island', 'ascension-island.png'),
(15, 'AU', 'Australia', 'australia.png'),
(16, 'AT', 'Austria', 'austria.png'),
(17, 'AZ', 'Azerbaijan', 'azerbaijan.png'),
(18, 'BS', 'Bahamas', 'bahamas.png'),
(19, 'BH', 'Bahrain', 'bahrain.png'),
(20, 'BD', 'Bangladesh', 'bangladesh.png'),
(21, 'BB', 'Barbados', 'barbados.png'),
(22, 'BY', 'Belarus', 'belarus.png'),
(23, 'BZ', 'Belize', 'belize.png'),
(24, 'BJ', 'Benin', 'benin.png'),
(25, 'BM', 'Bermuda', 'bermuda.png'),
(26, 'BT', 'Bhutan', 'bhutan.png'),
(27, 'BO', 'Bolivia', 'bolivia.png'),
(28, 'BA', 'Bosnia &amp; Herzegovina', 'bosnia-and-herzegovina.png'),
(29, 'BW', 'Botswana', 'botswana.png'),
(30, 'BR', 'Brazil', 'brazil.png'),
(31, 'IO', 'British Indian Ocean Territory', 'british-indian-ocean-territory.png'),
(32, 'VG', 'British Virgin Islands', 'british-virgin-islands.png'),
(33, 'BN', 'Brunei', 'brunei.png'),
(34, 'BG', 'Bulgaria', 'bulgaria.png'),
(35, 'BF', 'Burkina Faso', 'burkina-faso.png'),
(36, 'BI', 'Burundi', 'burundi.png'),
(37, 'KH', 'Cambodia', 'cambodia.png'),
(38, 'CM', 'Cameroon', 'cameroon.png'),
(39, 'CA', 'Canada', 'canada.png'),
(40, 'IC', 'Canary Islands', 'canary-islands.png'),
(41, 'CV', 'Cape Verde', 'cape-verde.png'),
(42, 'BQ', 'Caribbean Netherlands', 'caribbean-netherlands.png'),
(43, 'KY', 'Cayman Islands', 'cayman-islands.png'),
(44, 'CF', 'Central African Republic', 'central-african-republic.png'),
(45, 'EA', 'Ceuta &amp; Melilla', 'ceuta-&amp;-melilla.png'),
(46, 'TD', 'Chad', 'chad.png'),
(47, 'CL', 'Chile', 'chile.png'),
(48, 'CN', 'China', 'china.png'),
(49, 'CX', 'Christmas Island', 'christmas-island.png'),
(50, 'CC', 'Cocos (Keeling) Islands', 'cocos-island.png'),
(51, 'CO', 'Colombia', 'colombia.png'),
(52, 'KM', 'Comoros', 'comoros.png'),
(53, 'CG', 'Congo - Brazzaville', 'congo-brazzaville.png'),
(54, 'CD', 'Congo - Kinshasa', 'congo-kinshasa.png'),
(55, 'CK', 'Cook Islands', 'cook-islands.png'),
(56, 'CR', 'Costa Rica', 'costa-rica.png'),
(57, 'CI', 'Côte d’Ivoire', 'cote-divoire.png'),
(58, 'HR', 'Croatia', 'croatia.png'),
(59, 'CU', 'Cuba', 'cuba.png'),
(60, 'CW', 'Curaçao', 'curaçao.png'),
(61, 'CY', 'Cyprus', 'cyprus.png'),
(62, 'CZ', 'Czech Republic', 'czech-republic.png'),
(63, 'DK', 'Denmark', 'denmark.png'),
(64, 'DG', 'Diego Garcia', 'diego-garcia.png'),
(65, 'DJ', 'Djibouti', 'djibouti.png'),
(66, 'DM', 'Dominica', 'dominica.png'),
(67, 'DO', 'Dominican Republic', 'dominican-republic.png'),
(68, 'EC', 'Ecuador', 'ecuador.png'),
(69, 'EG', 'Egypt', 'egypt.png'),
(70, 'SV', 'El Salvador', 'el-salvador.png'),
(71, 'GQ', 'Equatorial Guinea', 'equatorial-guinea.png'),
(72, 'ER', 'Eritrea', 'eritrea.png'),
(73, 'EE', 'Estonia', 'estonia.png'),
(74, 'ET', 'Ethiopia', 'ethiopia.png'),
(75, 'FK', 'Falkland Islands', 'falkland-islands.png'),
(76, 'FO', 'Faroe Islands', 'faroe-islands.png'),
(77, 'FJ', 'Fiji', 'fiji.png'),
(78, 'FI', 'Finland', 'finland.png'),
(79, 'FR', 'France', 'france.png'),
(80, 'GF', 'French Guiana', 'french-guiana.png'),
(81, 'PF', 'French Polynesia', 'french-polynesia.png'),
(82, 'TF', 'French Southern Territories', 'french-southern-territories.png'),
(83, 'GA', 'Gabon', 'gabon.png'),
(84, 'GM', 'Gambia', 'gambia.png'),
(85, 'GE', 'Georgia', 'georgia.png'),
(86, 'DE', 'Germany', 'germany.png'),
(87, 'GH', 'Ghana', 'ghana.png'),
(88, 'GI', 'Gibraltar', 'gibraltar.png'),
(89, 'GR', 'Greece', 'greece.png'),
(90, 'GL', 'Greenland', 'greenland.png'),
(91, 'GD', 'Grenada', 'grenada.png'),
(92, 'GP', 'Guadeloupe', 'guadeloupe.png'),
(93, 'GU', 'Guam', 'guam.png'),
(94, 'GT', 'Guatemala', 'guatemala.png'),
(95, 'GG', 'Guernsey', 'guernsey.png'),
(96, 'GN', 'Guinea', 'guinea.png'),
(97, 'GW', 'Guinea-Bissau', 'guinea-bissau.png'),
(98, 'GY', 'Guyana', 'guyana.png'),
(99, 'HT', 'Haiti', 'haiti.png'),
(100, 'HN', 'Honduras', 'honduras.png'),
(101, 'HK', 'Hong Kong SAR China', 'hong-kong-sar-china.png'),
(102, 'HU', 'Hungary', 'hungary.png'),
(103, 'IS', 'Iceland', 'iceland.png'),
(104, 'IN', 'India', 'india.png'),
(105, 'ID', 'Indonesia', 'indonesia.png'),
(106, 'IR', 'Iran', 'iran.png'),
(107, 'IQ', 'Iraq', 'iraq.png'),
(108, 'IE', 'Ireland', 'ireland.png'),
(109, 'IM', 'Isle of Man', 'isle-of-man.png'),
(110, 'IL', 'Israel', 'israel.png'),
(111, 'IT', 'Italy', 'italy.png'),
(112, 'JM', 'Jamaica', 'jamaica.png'),
(113, 'JP', 'Japan', 'japan.png'),
(114, 'JE', 'Jersey', 'jersey.png'),
(115, 'JO', 'Jordan', 'jordan.png'),
(116, 'KZ', 'Kazakhstan', 'kazakhstan.png'),
(117, 'KE', 'Kenya', 'kenya.png'),
(118, 'KI', 'Kiribati', 'kiribati.png'),
(119, 'XK', 'Kosovo', 'kosovo.png'),
(120, 'KW', 'Kuwait', 'kuwait.png'),
(121, 'KG', 'Kyrgyzstan', 'kyrgyzstan.png'),
(122, 'LA', 'Laos', 'laos.png'),
(123, 'LV', 'Latvia', 'latvia.png'),
(124, 'LB', 'Lebanon', 'lebanon.png'),
(125, 'LS', 'Lesotho', 'lesotho.png'),
(126, 'LR', 'Liberia', 'liberia.png'),
(127, 'LY', 'Libya', 'libya.png'),
(128, 'LI', 'Liechtenstein', 'liechtenstein.png'),
(129, 'LT', 'Lithuania', 'lithuania.png'),
(130, 'LU', 'Luxembourg', 'luxembourg.png'),
(131, 'MO', 'Macau SAR China', 'macau-sar-china.png'),
(132, 'MK', 'Macedonia', 'macedonia.png'),
(133, 'MG', 'Madagascar', 'madagascar.png'),
(134, 'MW', 'Malawi', 'malawi.png'),
(135, 'MY', 'Malaysia', 'malaysia.png'),
(136, 'MV', 'Maldives', 'maldives.png'),
(137, 'ML', 'Mali', 'mali.png'),
(138, 'MT', 'Malta', 'malta.png'),
(139, 'MH', 'Marshall Islands', 'marshall-islands.png'),
(140, 'MQ', 'Martinique', 'martinique.png'),
(141, 'MR', 'Mauritania', 'mauritania.png'),
(142, 'MU', 'Mauritius', 'mauritius.png'),
(143, 'YT', 'Mayotte', 'mayotte.png'),
(144, 'MX', 'Mexico', 'mexico.png'),
(145, 'FM', 'Micronesia', 'micronesia.png'),
(146, 'MD', 'Moldova', 'moldova.png'),
(147, 'MC', 'Monaco', 'monaco.png'),
(148, 'MN', 'Mongolia', 'mongolia.png'),
(149, 'ME', 'Montenegro', 'montenegro.png'),
(150, 'MS', 'Montserrat', 'montserrat.png'),
(151, 'MA', 'Morocco', 'morocco.png'),
(152, 'MZ', 'Mozambique', 'mozambique.png'),
(153, 'MM', 'Myanmar (Burma)', 'myanmar-(burma).png'),
(154, 'NA', 'Namibia', 'namibia.png'),
(155, 'NR', 'Nauru', 'nauru.png'),
(156, 'NP', 'Nepal', 'nepal.png'),
(157, 'NL', 'Netherlands', 'netherlands.png'),
(158, 'NC', 'New Caledonia', 'new-caledonia.png'),
(159, 'NZ', 'New Zealand', 'new-zealand.png'),
(160, 'NI', 'Nicaragua', 'nicaragua.png'),
(161, 'NE', 'Niger', 'niger.png'),
(162, 'NG', 'Nigeria', 'nigeria.png'),
(163, 'NU', 'Niue', 'niue.png'),
(164, 'NF', 'Norfolk Island', 'norfolk-island.png'),
(165, 'KP', 'North Korea', 'north-korea.png'),
(166, 'MP', 'Northern Mariana Islands', 'northern-mariana-islands.png'),
(167, 'NO', 'Norway', 'norway.png'),
(168, 'OM', 'Oman', 'oman.png'),
(169, 'PK', 'Pakistan', 'pakistan.png'),
(170, 'PW', 'Palau', 'palau.png'),
(171, 'PS', 'Palestinian Territories', 'palestinian-territories.png'),
(172, 'PA', 'Panama', 'panama.png'),
(173, 'PG', 'Papua New Guinea', 'papua-new-guinea.png'),
(174, 'PY', 'Paraguay', 'paraguay.png'),
(175, 'PE', 'Peru', 'peru.png'),
(176, 'PH', 'Philippines', 'philippines.png'),
(177, 'PN', 'Pitcairn Islands', 'pitcairn-islands.png'),
(178, 'PL', 'Poland', 'poland.png'),
(179, 'PT', 'Portugal', 'portugal.png'),
(180, 'PR', 'Puerto Rico', 'puerto-rico.png'),
(181, 'QA', 'Qatar', 'qatar.png'),
(182, 'RE', 'Réunion', 'réunion.png'),
(183, 'RO', 'Romania', 'romania.png'),
(184, 'RU', 'Russia', 'russia.png'),
(185, 'RW', 'Rwanda', 'rwanda.png'),
(186, 'WS', 'Samoa', 'samoa.png'),
(187, 'SM', 'San Marino', 'san-marino.png'),
(188, 'ST', 'São Tomé &amp; Príncipe', 'sao-tome-and-principe.png'),
(189, 'SA', 'Saudi Arabia', 'saudi-arabia.png'),
(190, 'SN', 'Senegal', 'senegal.png'),
(191, 'RS', 'Serbia', 'serbia.png'),
(192, 'SC', 'Seychelles', 'seychelles.png'),
(193, 'SL', 'Sierra Leone', 'sierra-leone.png'),
(194, 'SG', 'Singapore', 'singapore.png'),
(195, 'SX', 'Sint Maarten', 'sint-maarten.png'),
(196, 'SK', 'Slovakia', 'slovakia.png'),
(197, 'SI', 'Slovenia', 'slovenia.png'),
(198, 'SB', 'Solomon Islands', 'solomon-islands.png'),
(199, 'SO', 'Somalia', 'somalia.png'),
(200, 'ZA', 'South Africa', 'south-africa.png'),
(201, 'GS', 'South Georgia &amp; South Sandwich Islands', 'south-georgia-and-south-sandwich.png'),
(202, 'KR', 'South Korea', 'south-korea.png'),
(203, 'SS', 'South Sudan', 'south-sudan.png'),
(204, 'ES', 'Spain', 'spain.png'),
(205, 'LK', 'Sri Lanka', 'sri-lanka.png'),
(206, 'BL', 'St. Barthélemy', 'st.-barthélemy.png'),
(207, 'SH', 'St. Helena', 'st.-helena.png'),
(208, 'KN', 'St. Kitts &amp; Nevis', 'st.-kitts-&amp;-nevis.png'),
(209, 'LC', 'St. Lucia', 'st.-lucia.png'),
(210, 'MF', 'St. Martin', 'st.-martin.png'),
(211, 'PM', 'St. Pierre &amp; Miquelon', 'st-pierre-and-miquelon.png'),
(212, 'VC', 'St. Vincent &amp; Grenadines', 'st-vincent-and-the-Grenadine.png'),
(213, 'SD', 'Sudan', 'sudan.png'),
(214, 'SR', 'Suriname', 'suriname.png'),
(215, 'SJ', 'Svalbard &amp; Jan Mayen', 'svalbard-jan-mayen.png'),
(216, 'SZ', 'Swaziland', 'swaziland.png'),
(217, 'SE', 'Sweden', 'sweden.png'),
(218, 'CH', 'Switzerland', 'switzerland.png'),
(219, 'SY', 'Syria', 'syria.png'),
(220, 'TW', 'Taiwan', 'taiwan.png'),
(221, 'TJ', 'Tajikistan', 'tajikistan.png'),
(222, 'TZ', 'Tanzania', 'tanzania.png'),
(223, 'TH', 'Thailand', 'thailand.png'),
(224, 'TL', 'Timor-Leste', 'timor-leste.png'),
(225, 'TG', 'Togo', 'togo.png'),
(226, 'TK', 'Tokelau', 'tokelau.png'),
(227, 'TO', 'Tonga', 'tonga.png'),
(228, 'TT', 'Trinidad &amp; Tobago', 'trinidad-and-tobago.png'),
(229, 'TA', 'Tristan da Cunha', 'tristan-da-cunha.png'),
(230, 'TN', 'Tunisia', 'tunisia.png'),
(231, 'TR', 'Turkey', 'turkey.png'),
(232, 'TM', 'Turkmenistan', 'turkmenistan.png'),
(233, 'TC', 'Turks &amp; Caicos Islands', 'turks-and-caicos.png'),
(234, 'TV', 'Tuvalu', 'tuvalu.png'),
(235, 'VI', 'U.S. Virgin Islands', 'us-virgin-islands.png'),
(236, 'UG', 'Uganda', 'uganda.png'),
(237, 'UA', 'Ukraine', 'ukraine.png'),
(238, 'AE', 'United Arab Emirates', 'united-arab-emirates.png'),
(239, 'UK', 'United Kingdom', 'united-kingdom.png'),
(240, 'UY', 'Uruguay', 'uruguay.png'),
(241, 'UZ', 'Uzbekistan', 'uzbekistan.png'),
(242, 'VU', 'Vanuatu', 'vanuatu.png'),
(243, 'VA', 'Vatican City', 'vatican-city.png'),
(244, 'VE', 'Venezuela', 'venezuela.png'),
(245, 'VN', 'Vietnam', 'vietnam.png'),
(246, 'WF', 'Wallis &amp; Futuna', 'wallis-and-futuna.png'),
(247, 'EH', 'Western Sahara', 'western-sahara.png'),
(248, 'YE', 'Yemen', 'yemen.png'),
(249, 'ZM', 'Zambia', 'zambia.png'),
(250, 'ZW', 'Zimbabwe', 'zimbabwe.png'),
(251, 'US', 'United States', 'united-states.png'),
(252, 'BE', 'Belgium', 'belgium.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipient`
--

CREATE TABLE `tbl_recipient` (
  `recipient_id` bigint(20) NOT NULL,
  `recipient_shipper_refno` varchar(150) NOT NULL,
  `recipient_full_name` varchar(150) DEFAULT NULL,
  `recipient_gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `recipient_phone` varchar(50) DEFAULT NULL,
  `recipient_email` varchar(100) DEFAULT NULL,
  `recipient_address` varchar(250) DEFAULT NULL,
  `recipient_country_name` varchar(150) DEFAULT NULL,
  `recipient_state` varchar(150) DEFAULT NULL,
  `recipient_city` varchar(150) DEFAULT NULL,
  `recipient_zip_code` varchar(50) DEFAULT NULL,
  `recipient_photo` varchar(150) DEFAULT NULL,
  `recipient_shipment_tracking_no` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_recipient`
--

INSERT INTO `tbl_recipient` (`recipient_id`, `recipient_shipper_refno`, `recipient_full_name`, `recipient_gender`, `recipient_phone`, `recipient_email`, `recipient_address`, `recipient_country_name`, `recipient_state`, `recipient_city`, `recipient_zip_code`, `recipient_photo`, `recipient_shipment_tracking_no`) VALUES
(1, 'da4bc594bb2699b17ad3ef14ba2a551c', 'Gloria Anderson', 'Female', '+44-192-391-3840', 'gloriaanderson@gmail.com', '#12 Oreon CLose, marcos way', 'United Kingdom', 'London', 'London', '2004', NULL, 'AB-3949-28040'),
(2, '96023851df29c7874cf5991a1bec77a5', 'Do Thi Bach Thao', 'Female', '+886 908 592 231', 'bachthaodothi@gmail.com', 'No. 100, Alley 176, Lane 76, Sec.2, Minsheng Rd.,', 'Taiwan', 'Changhua County', 'Caigong Village, Xizhou Township', '', NULL, 'MTCE-3949-28040');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipment`
--

CREATE TABLE `tbl_shipment` (
  `shipment_id` bigint(20) NOT NULL,
  `shipment_tracking_no` varchar(150) DEFAULT NULL,
  `shipment_shipper_refno` varchar(150) DEFAULT NULL,
  `shipment_freight` enum('Air Freight','Sea Freight','Road Freight','Rail Freight') NOT NULL DEFAULT 'Air Freight',
  `shipment_weight` varchar(50) DEFAULT NULL,
  `shipment_content_type` varchar(250) NOT NULL,
  `shipment_description` text,
  `shipment_status` enum('Pending','Processing','In Transit','On Board','Delivered','On Hold') NOT NULL DEFAULT 'Pending',
  `shipment_take_off_point` varchar(350) DEFAULT NULL,
  `shipment_final_destination` varchar(350) DEFAULT NULL,
  `shipment_current_location` varchar(450) DEFAULT NULL,
  `shipment_shipping_date` varchar(50) DEFAULT NULL,
  `shipment_shipping_time` varchar(50) DEFAULT NULL,
  `shipment_expected_delivery_date` varchar(50) DEFAULT NULL,
  `shipment_expected_delivery_time` varchar(50) DEFAULT NULL,
  `shipment_actual_delivery_date` varchar(50) DEFAULT NULL,
  `shipment_actual_delivery_time` varchar(50) DEFAULT NULL,
  `shipment_date_created` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shipment`
--

INSERT INTO `tbl_shipment` (`shipment_id`, `shipment_tracking_no`, `shipment_shipper_refno`, `shipment_freight`, `shipment_weight`, `shipment_content_type`, `shipment_description`, `shipment_status`, `shipment_take_off_point`, `shipment_final_destination`, `shipment_current_location`, `shipment_shipping_date`, `shipment_shipping_time`, `shipment_expected_delivery_date`, `shipment_expected_delivery_time`, `shipment_actual_delivery_date`, `shipment_actual_delivery_time`, `shipment_date_created`) VALUES
(1, 'AB-3949-28040', 'da4bc594bb2699b17ad3ef14ba2a551c', 'Air Freight', '2.5kg', 'Parcel', 'Private and Confidential', 'In Transit', 'New York', 'London', 'Heathrow Airport, London', '23-04-2022', '11:45 PM', '25-04-2022', '1:20 PM', '02-05-2022', '02:21 PM', '25-04-2022 03:32'),
(2, 'MTCE-3949-28040', '96023851df29c7874cf5991a1bec77a5', 'Air Freight', '2.9kg', 'Parcel', '1: Long Black Gown\r\n2: Jelweries\r\n3: Bracelet \r\n4: Gold Earrings', 'Processing', 'New York', 'No. 100, Alley 176, Lane 76, Sec.2, Minsheng Rd., Caigong Village, Xizhou Township, Changhua County, Taiwan R.o.c', 'Kuala Lumpur International Airport, Malaysia', '01-07-2022', '2:36 Pm', '07-07-2022', 'Afternoon', 'Thursday', '02:30 Pm', '01-07-2022 09:58:08 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipment_travel_history`
--

CREATE TABLE `tbl_shipment_travel_history` (
  `shipment_travel_history_id` bigint(20) NOT NULL,
  `shipment_travel_shipment_tracking_no` varchar(20) NOT NULL,
  `shipment_travel_date` varchar(50) NOT NULL,
  `shipment_travel_time` varchar(50) DEFAULT NULL,
  `shipment_travel_status` varchar(150) DEFAULT NULL,
  `shipment_travel_description` varchar(350) DEFAULT NULL,
  `shipment_travel_history_location` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shipment_travel_history`
--

INSERT INTO `tbl_shipment_travel_history` (`shipment_travel_history_id`, `shipment_travel_shipment_tracking_no`, `shipment_travel_date`, `shipment_travel_time`, `shipment_travel_status`, `shipment_travel_description`, `shipment_travel_history_location`) VALUES
(1, 'AB-3949-28040', '23-04-2022', '1:30 PM', NULL, 'Left The Airport', 'Custom office in london'),
(2, 'AB-3949-28040', '29-04-2022', '12:15 PM', NULL, 'Shipment is now at heathrow airport', 'Heathrow Airport, London'),
(3, 'MTCE-3949-28040', '03-07-2022', '11:09 Pm', NULL, 'Dispatch to Xizhou Township, Changhua County, Taiwan', 'Multitrack Cargo Express Office, New York'),
(4, 'MTCE-3949-28040', '04-07-2022', '11:13 AM', NULL, 'Shipment is currently on transit in Turkey', 'Istanbul Airport, Turkey'),
(5, 'MTCE-3949-28040', '04-07-2022', '5:17 PM', NULL, 'Dispatch from Istanbul International Airport to Kuala Lumpur International Airport, Malaysia', 'Istanbul International Airport'),
(6, 'MTCE-3949-28040', '05-07-2022', '08:31 AM', NULL, 'Shipment on transit in Malaysia', 'Kuala Lumpur International Airport, Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipper`
--

CREATE TABLE `tbl_shipper` (
  `shipper_id` bigint(20) NOT NULL,
  `shipper_refno` varchar(150) DEFAULT NULL,
  `shipper_full_name` varchar(150) DEFAULT NULL,
  `shipper_gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `shipper_phone` varchar(50) DEFAULT NULL,
  `shipper_email` varchar(100) DEFAULT NULL,
  `shipper_address` varchar(250) DEFAULT NULL,
  `shipper_country_name` varchar(150) DEFAULT NULL,
  `shipper_state` varchar(150) DEFAULT NULL,
  `shipper_city` varchar(150) DEFAULT NULL,
  `shipper_zip_code` varchar(50) DEFAULT NULL,
  `shipper_photo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shipper`
--

INSERT INTO `tbl_shipper` (`shipper_id`, `shipper_refno`, `shipper_full_name`, `shipper_gender`, `shipper_phone`, `shipper_email`, `shipper_address`, `shipper_country_name`, `shipper_state`, `shipper_city`, `shipper_zip_code`, `shipper_photo`) VALUES
(1, 'da4bc594bb2699b17ad3ef14ba2a551c', 'Peterson Goldman', 'Male', '+1-283-294-3892', 'petersongoldman@gmail.com', '111 Nick Avenue', 'United States', 'California', 'Los Angeles', '2003', '6049086630.jpg'),
(2, '96023851df29c7874cf5991a1bec77a5', 'Xiang Li', 'Male', '+1 516 888 4875', 'xiangli4422@gmail.com', '2622 Wayback Lane', 'United States', 'New York', 'Manhattan', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`country_id`),
  ADD UNIQUE KEY `country_tag` (`country_tag`,`country_name`);

--
-- Indexes for table `tbl_recipient`
--
ALTER TABLE `tbl_recipient`
  ADD PRIMARY KEY (`recipient_id`);

--
-- Indexes for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  ADD PRIMARY KEY (`shipment_id`),
  ADD UNIQUE KEY `shipment_tracking_no` (`shipment_tracking_no`);

--
-- Indexes for table `tbl_shipment_travel_history`
--
ALTER TABLE `tbl_shipment_travel_history`
  ADD PRIMARY KEY (`shipment_travel_history_id`);

--
-- Indexes for table `tbl_shipper`
--
ALTER TABLE `tbl_shipper`
  ADD PRIMARY KEY (`shipper_id`),
  ADD UNIQUE KEY `shipper_refno` (`shipper_refno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `tbl_recipient`
--
ALTER TABLE `tbl_recipient`
  MODIFY `recipient_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  MODIFY `shipment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_shipment_travel_history`
--
ALTER TABLE `tbl_shipment_travel_history`
  MODIFY `shipment_travel_history_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_shipper`
--
ALTER TABLE `tbl_shipper`
  MODIFY `shipper_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
