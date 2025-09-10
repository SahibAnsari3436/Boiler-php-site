-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2025 at 03:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `energyequipco_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_features`
--

CREATE TABLE `about_features` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_features`
--

INSERT INTO `about_features` (`id`, `title`, `content`, `icon`, `sort_order`, `created_at`) VALUES
(11, 'Cleaver Brooks', 'Reconditioning the used Cleaver Brooks Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel.', NULL, 0, '2025-07-16 19:03:19'),
(12, 'Johnston', 'Reconditioning the Johnston Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel, tubes, boiler trim piping, and blowdown piping and valves, new Honeywell or Fireye controls are installed, new electrical and control panels are installed as needed, new steam pressure controls are installed, the boilers are re-wired as', NULL, 0, '2025-07-16 19:03:52'),
(13, 'Superior', 'Reconditioning the Superior Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel, tubes, boiler trim piping, and blowdown piping and valves, new Honeywell or Fireye controls are installed, new electrical and control panels are installed as needed, new steam pressure controls are installed, the boilers are re-wired as', NULL, 0, '2025-07-16 19:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `about_section`
--

CREATE TABLE `about_section` (
  `id` int(11) NOT NULL,
  `years_experience` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_section`
--

INSERT INTO `about_section` (`id`, `years_experience`, `title`, `description`, `image1`, `image2`, `image3`, `created_at`) VALUES
(1, 45, 'Years Of Working Experience', 'Energy Equipment Co., Inc., founded in 1981, specializes in the sale of new and used packaged boilers, burners, deaerators, feedwater systems, economizers, water softeners, condensate return systems, and blowdown separators manufactured by Cleaver Brooks, Johnston, Hurst, Superior, Burnham, Fulton, York Shipley, Kewanee, B&W, Combustion Engineering, Nebraska, Keeler, and Zurn, ranging in size from 5 HP to 150,000 lb/hr, with design pressures from 15 PSI to 750 PSI for saturated or superheated steam, with burners designed for natural gas, propane, low btu gas, waste gas, digester gas, landfill gas, methane, and No. 2 through 6 fuel oil.', 'uploads/about-img1.webp', 'uploads/about-img2.webp', 'uploads/about-img3.webp', '2025-07-16 16:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `years_experience` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image1`, `image2`, `image3`, `years_experience`, `title`, `description`, `created_at`) VALUES
(1, 'uploads/about-img1.webp', 'uploads/about-img2.webp', 'uploads/about-img3.webp', 45, 'Years Of Working Experience', 'Energy Equipment Co., Inc., founded in 1981, specializes in the sale of new and used packaged boilers, burners, deaerators, feedwater systems, economizers, water softeners, condensate return systems, and blowdown separators manufactured by Cleaver Brooks, Johnston, Hurst, Superior, Burnham, Fulton, York Shipley, Kewanee, B&W, Combustion Engineering, Nebraska, Keeler, and Zurn, ranging in size from 5 HP to 150,000 lb/hr, with design pressures from 15 PSI to 750 PSI for saturated or superheated steam, with burners designed for natural gas, propane, low btu gas, waste gas, digester gas, landfill gas, methane, and No. 2 through 6 fuel oil.\r\n\r\nWe maintain a stock pre-owned boilers, deaerators, feedwater systems, water softeners, condensate return systems, chemical feed pumps and blowdown separators.\r\n\r\nWe sell spare and replacements parts for Fireye and Honeywell Flame Safeguard Controls, pressure switches, gaskets, combustion controls, gas valves, gas pressure regulators, mod motors, relief valves, pumps, level controls, valves, traps, sight glass, and gauge cocks.\r\n\r\nOur customers include architects and engineers, contractors, and end users. We work on all facets of projects requiring new boilers, used boilers, rental or mobile boilers, from the budgeting phase to final commissioning of the equipment. We offer complete installation and turn-key service or site supervision for the contractor of your choice.\r\n', '2025-07-21 14:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `sub_heading` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_text` varchar(100) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `heading`, `sub_heading`, `description`, `button_text`, `button_link`, `image`, `created_at`) VALUES
(2, 'A Platform', 'HIGH PERFORMANCE', 'for Industry Factory\r\nExcellence Work', 'Read More', 'http://localhost/energyequipco/about-us.php', 'images/main-slider/home-banner-1.webp', '2025-07-14 12:43:54'),
(3, 'We Are', 'HIGH PERFORMANCE', 'Provide Industry\r\nFactory Solutions', 'Read More', 'http://localhost/energyequipco/about-us.php', 'images/main-slider/home-banner-2.jpeg', '2025-07-14 13:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `boiler_details`
--

CREATE TABLE `boiler_details` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `boiler_details`
--

INSERT INTO `boiler_details` (`id`, `image`, `description`, `created_at`) VALUES
(6, 'images/product/cleaver-brooks.png', 'Reconditioning the used Cleaver Brooks Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel. Additionally tubes, boiler trim piping, and blow down piping and valves and new Honeywell or Fireye controls are installed along with new electrical and control panels are installed as needed. New steam pressure controls are installed, the boilers are re-wired as needed, new safety relief valves are installed or shipped loose for field installation, electrical and mechanical checks are performed to identify defective components, defective components found are replaced. We guarantee that the pressure vessel and tubes are in good condition and that the boiler will pass a hydrostatic test at the time of startup. A one (1) year parts replacement warranty on controls is included.\r\n\r\nUsed, reconditioned Cleaver Brooks Boilers, Cleaver Brooks 3 & 4 pass dry back boilers, Cleaver Brooks 3 & 4 pass wet back boilers, Cleaver Brooks water tube boilers, high pressure boilers, low pressure boilers, hot water boilers, Cleaver Brooks boiler feed water systems, atmospheric tanks, pressurized deaerators, blow down tanks, blow down separators, flash steam economizers, stack economizers, boiler flame safeguard controls, boiler combustion controls, boiler water level controls.', '2025-07-28 06:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`, `created_at`) VALUES
(1, 'images/logo/img-clever.webp', '2025-07-22 11:34:56'),
(2, 'images/logo/img-hurst.webp', '2025-07-22 12:32:46'),
(3, 'images/logo/img-jonston.webp', '2025-07-22 12:33:15'),
(4, 'images/logo/img-superior.webp', '2025-07-22 12:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `cleaver_table`
--

CREATE TABLE `cleaver_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_number` varchar(50) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `horsepower` varchar(50) DEFAULT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `pressure` varchar(50) DEFAULT NULL,
  `steam_or_hot_water` varchar(50) DEFAULT NULL,
  `burner` varchar(100) DEFAULT NULL,
  `fuel` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cleaver_table`
--

INSERT INTO `cleaver_table` (`id`, `item_number`, `year`, `horsepower`, `manufacturer`, `pressure`, `steam_or_hot_water`, `burner`, `fuel`, `created_at`) VALUES
(1, '02500', 2002, '500 hp	', 'Cleaver Brooks	', '300 psi	', 'Steam', 'Cleaver Brooks	', 'natural gas/oil', '2025-07-30 08:06:58'),
(2, '03100-1', 2003, '100 hp', 'Cleaver Brooks	', '150 psi	', 'Steam	', 'Cleaver Brooks	', 'natural gas/oil', '2025-07-29 13:16:49'),
(3, '0360', 2003, '60 hp', 'Cleaver Brooks', '150 psi	', 'Steam', 'ProFire', 'natural gas', '2025-07-29 12:41:52'),
(4, '07750', 2007, '750 hp	', 'Cleaver Brooks CBLE	', '200 psi	', 'Steam	', 'Cleaver Brooks 30 PPM NOx	', 'natural gas/oil', '2025-07-30 08:09:26'),
(5, '09350CB', 2009, '350 hp', 'Cleaver Brooks CBLE', '250 psi', 'Steam', 'Cleaver Brooks 30 PPM NOx	', 'natural gas/oil', '2025-07-30 08:05:39'),
(6, '181500', 2018, '1500 hp	', 'Cleaver Brooks CBEX	', '200 psi	', 'Steam', 'Cleaver Brooks 30 PPM NOx	', 'natural gas', '2025-07-30 08:11:45'),
(7, '91200', 1991, '200 hp', 'Cleaver Brooks	', '200 psi	', 'Steam', 'Cleaver Brooks	', 'natural gas/oil', '2025-07-30 08:01:48'),
(8, '93125', 1993, '125 hp	', 'Cleaver Brooks	', '200 psi	', 'Steam	', 'Cleaver Brooks	', 'natural gas', '2025-07-30 07:59:40'),
(9, '95150', 1995, '150 hp	', 'Cleaver Brooks CBLE	', '150 psi	', 'Steam	', 'Cleaver Brooks 30 PPM NOx	', 'natural gas/oil', '2025-07-30 08:00:19'),
(10, '95500', 1995, '1995	', 'Cleaver Brooks CBLE', '150 psi', 'Steam', 'Cleaver Brooks 30 PPM NOx', 'natural gas/oil', '2025-07-30 08:08:03'),
(11, '95800', 1995, '800 hp	', 'Cleaver Brooks	', '250 psi	', 'Steam	', 'Cleaver Brooks	', 'natural gas', '2025-07-30 08:11:03'),
(12, '96300', 1995, '300 hp', 'Cleaver Brooks CBLE	', '150 psi	', 'Steam	', 'Cleaver Brooks 30 PPM NOx	', 'natural gas/oil', '2025-07-30 08:02:30'),
(13, '96400', 1996, '400 hp', 'Cleaver Brooks CBLE	', '150 psi	', 'Steam', 'Cleaver Brooks 30 PPM NOx	', 'natural gas', '2025-07-30 08:06:23'),
(14, '99150', 1999, '150 hp	', 'Cleaver Brooks CEW	', '150 psi	', 'Steam', 'ProFire 30 PPM NOx	', 'natural gas', '2025-07-30 08:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiry`
--

CREATE TABLE `contact_enquiry` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_enquiry`
--

INSERT INTO `contact_enquiry` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `subject`, `message`, `created_at`) VALUES
(1, 'Sahib', 'Ansari', 'shabuddin@webzent.in', '9899343655', 'Test', 'This is for testing', '2025-08-01 18:49:16'),
(2, 'Babloo', 'Kumar', 'babloo.kumar@webzent.in', '1234567892', 'Testing', 'This is for the testing by webzent', '2025-08-04 14:54:16'),
(3, 'Gaurav', 'Thakur', 'gaurav@webzent.in', '1236547896', 'testing', 'testing by webzent', '2025-08-04 15:01:45'),
(4, 'Gayatry', 'Gautam', 'gayatry@webzent.in', '1478523692', 'Email Marketing', 'This is for the test.', '2025-08-04 15:10:03'),
(5, 'Rashid ', 'Kureshi', 'rahisd@gmail.com', '8130486889', 'Project', 'This is for the Website.', '2025-08-04 15:13:02'),
(6, 'Zahid ', 'Khan', 'zahid.khan@gmail.com', '7896541234', 'Product Test', 'I\'m testing the website for the product use.', '2025-08-04 15:20:28'),
(7, 'Vijay', 'Gupta', 'vijay@gmail.com', '9874563521', 'Accounts', 'Hello, i\'m vijay and i want to book an appointment.', '2025-08-04 15:22:16'),
(8, 'Sagar', 'Gupta', 'sagar@gmail.com', '9513578523', 'Trainer', 'Hi, i provide the best service.', '2025-08-04 15:24:07'),
(9, 'Abhishek', 'Sharma', 'abishek@gmail.com', '9842635789', 'Wordpress Developer', 'I sell my service.', '2025-08-04 15:25:47'),
(10, 'Aakash ', 'Saini', 'aakash@gmail.com', '1239874563', 'PHP Developer', 'I want to be a full stack developer', '2025-08-04 15:27:27'),
(11, 'Priya ', 'Saini', 'priya@gmail.com', '1539578624', 'SEO ', 'website testing.', '2025-08-04 15:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `counter_section`
--

CREATE TABLE `counter_section` (
  `id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `title1` varchar(100) DEFAULT NULL,
  `title2` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counter_section`
--

INSERT INTO `counter_section` (`id`, `number`, `title1`, `title2`, `created_at`) VALUES
(1, 785, 'Project', 'Complated', '2025-07-17 15:33:21'),
(2, 987, 'Client', 'Satisfaction', '2025-07-17 15:39:23'),
(3, 874, 'Workers', 'Hand', '2025-07-17 15:40:59'),
(4, 698, 'Awards', 'International', '2025-07-17 15:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_cards`
--

CREATE TABLE `equipment_cards` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `more_des` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_cards`
--

INSERT INTO `equipment_cards` (`id`, `image`, `title`, `description`, `more_des`, `link`, `created_at`) VALUES
(5, 'images/product/submit-your-equip.gif', 'Boilers', 'We purchase steam boilers and hot water boilers online from all over the United States of all designs including firetube, watertube, and vertical designs, manufactured by Cleaver Brooks, Johnston, Hurst, Superior, Burnham, Fulton, York Shipley, Kewanee, B&W, Combustion Engineering, Keeler, and Zurn for sale, ranging in size from 5 HP to 150,000 lb/hr, with design pressures from 15 PSI to 750 PSI for saturated or superheated steam, or hot water applications. We also purchase deaerators,', 'We specialize in boiler room and power plant equipment. We sell packaged steam boilers and support equipment ranging in size from ½ hp to over 300,000 lbs/hr generating saturated or superheated steam, with burner systems designed for firing natural gas, propane, low BTU gas, waste gas, digester gas, landfill gas, No. 2 through 6 fuel oil, wood, and coal.\r\n\r\nWe represent some of the leading manufacturers of steam boilers, burners, deaerators, economizers, boiler feed systems, chemical feed systems, water softeners, condensate return systems, and blowdown separators. We sell spare and replacements parts for flame safeguard controls, pressure switches, gaskets, combustion controls, gas valves, gas pressure regulators, relief valves, pumps, level controls, valves, traps, sight glass, and gauge cocks and also purchase hot water boilers, steam boilers, and other entire boiler room equipment online.\r\n\r\nOur customers include architects and engineers, contractors, and end users. We work on all facets of projects requiring new boilers, used boilers, rental or mobile boilers, from the budgeting phase to final commissioning of the equipment. We offer complete installation and turn-key service or site supervision for the contractor of your choice.\r\n\r\nWe are constantly looking to purchase all kinds of boilers, deaerators, boiler feed systems or entire boiler rooms. If you have equipment for sell, please let us know by clicking on Request Information button. We want to work with you.', 'http://localhost/energyequipco/sell-your-boiler.php', '2025-07-23 11:02:20'),
(6, 'images/product/submit-your-equip.gif', 'Deaerator', 'We purchase steam boilers and hot water boilers online from all over the United States of all designs including firetube, watertube, and vertical designs, manufactured by Cleaver Brooks, Johnston, Hurst, Superior, Burnham, Fulton, York Shipley, Kewanee, B&W, Combustion Engineering, Keeler, and Zurn for sale, ranging in size from 5 HP to 150,000 lb/hr, with design pressures from 15 PSI to 750 PSI for saturated or superheated steam, or hot water applications. We also purchase deaerators,', 'We specialize in boiler room and power plant equipment. We sell packaged steam boilers and support equipment ranging in size from ½ hp to over 300,000 lbs/hr generating saturated or superheated steam, with burner systems designed for firing natural gas, propane, low BTU gas, waste gas, digester gas, landfill gas, No. 2 through 6 fuel oil, wood, and coal.\r\n\r\nWe represent some of the leading manufacturers of steam boilers, burners, deaerators, economizers, boiler feed systems, chemical feed systems, water softeners, condensate return systems, and blowdown separators. We sell spare and replacements parts for flame safeguard controls, pressure switches, gaskets, combustion controls, gas valves, gas pressure regulators, relief valves, pumps, level controls, valves, traps, sight glass, and gauge cocks and also purchase hot water boilers, steam boilers, and other entire boiler room equipment online.\r\n\r\nOur customers include architects and engineers, contractors, and end users. We work on all facets of projects requiring new boilers, used boilers, rental or mobile boilers, from the budgeting phase to final commissioning of the equipment. We offer complete installation and turn-key service or site supervision for the contractor of your choice.\r\n\r\nWe are constantly looking to purchase all kinds of boilers, deaerators, boiler feed systems or entire boiler rooms. If you have equipment for sell, please let us know by clicking on Request Information button. We want to work with you.', 'http://localhost/energyequipco/sell-your-boiler.php', '2025-07-23 11:56:18'),
(7, 'images/product/submit-your-equip.gif', 'Boiler Feed System (Atmospheric Tank)', 'We purchase steam boilers and hot water boilers online from all over the United States of all designs including firetube, watertube, and vertical designs, manufactured by Cleaver Brooks, Johnston, Hurst, Superior, Burnham, Fulton, York Shipley, Kewanee, B&W, Combustion Engineering, Keeler, and Zurn for sale, ranging in size from 5 HP to 150,000 lb/hr, with design pressures from 15 PSI to 750 PSI for saturated or superheated steam, or hot water applications. We also purchase deaerators,', 'We specialize in boiler room and power plant equipment. We sell packaged steam boilers and support equipment ranging in size from ½ hp to over 300,000 lbs/hr generating saturated or superheated steam, with burner systems designed for firing natural gas, propane, low BTU gas, waste gas, digester gas, landfill gas, No. 2 through 6 fuel oil, wood, and coal.\r\n\r\nWe represent some of the leading manufacturers of steam boilers, burners, deaerators, economizers, boiler feed systems, chemical feed systems, water softeners, condensate return systems, and blowdown separators. We sell spare and replacements parts for flame safeguard controls, pressure switches, gaskets, combustion controls, gas valves, gas pressure regulators, relief valves, pumps, level controls, valves, traps, sight glass, and gauge cocks and also purchase hot water boilers, steam boilers, and other entire boiler room equipment online.\r\n\r\nOur customers include architects and engineers, contractors, and end users. We work on all facets of projects requiring new boilers, used boilers, rental or mobile boilers, from the budgeting phase to final commissioning of the equipment. We offer complete installation and turn-key service or site supervision for the contractor of your choice.\r\n\r\nWe are constantly looking to purchase all kinds of boilers, deaerators, boiler feed systems or entire boiler rooms. If you have equipment for sell, please let us know by clicking on Request Information button. We want to work with you.', 'http://localhost/energyequipco/sell-your-boiler.php', '2025-07-23 11:58:10'),
(8, 'images/product/submit-your-equip.gif', 'Blowdown Tank', 'We purchase steam boilers and hot water boilers online from all over the United States of all designs including firetube, watertube, and vertical designs, manufactured by Cleaver Brooks, Johnston, Hurst, Superior, Burnham, Fulton, York Shipley, Kewanee, B&W, Combustion Engineering, Keeler, and Zurn for sale, ranging in size from 5 HP to 150,000 lb/hr, with design pressures from 15 PSI to 750 PSI for saturated or superheated steam, or hot water applications. We also purchase deaerators,', 'We specialize in boiler room and power plant equipment. We sell packaged steam boilers and support equipment ranging in size from ½ hp to over 300,000 lbs/hr generating saturated or superheated steam, with burner systems designed for firing natural gas, propane, low BTU gas, waste gas, digester gas, landfill gas, No. 2 through 6 fuel oil, wood, and coal.\r\n\r\nWe represent some of the leading manufacturers of steam boilers, burners, deaerators, economizers, boiler feed systems, chemical feed systems, water softeners, condensate return systems, and blowdown separators. We sell spare and replacements parts for flame safeguard controls, pressure switches, gaskets, combustion controls, gas valves, gas pressure regulators, relief valves, pumps, level controls, valves, traps, sight glass, and gauge cocks and also purchase hot water boilers, steam boilers, and other entire boiler room equipment online.\r\n\r\nOur customers include architects and engineers, contractors, and end users. We work on all facets of projects requiring new boilers, used boilers, rental or mobile boilers, from the budgeting phase to final commissioning of the equipment. We offer complete installation and turn-key service or site supervision for the contractor of your choice.\r\n\r\nWe are constantly looking to purchase all kinds of boilers, deaerators, boiler feed systems or entire boiler rooms. If you have equipment for sell, please let us know by clicking on Request Information button. We want to work with you.', 'http://localhost/energyequipco/sell-your-boiler.php', '2025-07-23 12:00:28'),
(9, 'images/product/submit-your-equip.gif', 'Other Equipment', 'We purchase steam boilers and hot water boilers online from all over the United States of all designs including firetube, watertube, and vertical designs, manufactured by Cleaver Brooks, Johnston, Hurst, Superior, Burnham, Fulton, York Shipley, Kewanee, B&W, Combustion Engineering, Keeler, and Zurn for sale, ranging in size from 5 HP to 150,000 lb/hr, with design pressures from 15 PSI to 750 PSI for saturated or superheated steam, or hot water applications. We also purchase deaerators,', 'We specialize in boiler room and power plant equipment. We sell packaged steam boilers and support equipment ranging in size from ½ hp to over 300,000 lbs/hr generating saturated or superheated steam, with burner systems designed for firing natural gas, propane, low BTU gas, waste gas, digester gas, landfill gas, No. 2 through 6 fuel oil, wood, and coal.\r\n\r\nWe represent some of the leading manufacturers of steam boilers, burners, deaerators, economizers, boiler feed systems, chemical feed systems, water softeners, condensate return systems, and blowdown separators. We sell spare and replacements parts for flame safeguard controls, pressure switches, gaskets, combustion controls, gas valves, gas pressure regulators, relief valves, pumps, level controls, valves, traps, sight glass, and gauge cocks and also purchase hot water boilers, steam boilers, and other entire boiler room equipment online.\r\n\r\nOur customers include architects and engineers, contractors, and end users. We work on all facets of projects requiring new boilers, used boilers, rental or mobile boilers, from the budgeting phase to final commissioning of the equipment. We offer complete installation and turn-key service or site supervision for the contractor of your choice.\r\n\r\nWe are constantly looking to purchase all kinds of boilers, deaerators, boiler feed systems or entire boiler rooms. If you have equipment for sell, please let us know by clicking on Request Information button. We want to work with you.', 'http://localhost/energyequipco/sell-your-boiler.php', '2025-07-23 12:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `date_time`) VALUES
(2, 'Are your used boilers certified or tested before shipping?', 'Absolutely. Every used boiler undergoes a full mechanical inspection, hydrostatic testing, and electrical checks before it leaves our facility. Many come with new controls, gaskets, and upgraded safety components.', '2025-07-14 17:10:52'),
(3, 'Can I sell my existing boiler to Energy Equipment Co.?', 'Yes. We buy used boilers in good condition. Visit our “Sell Your Boiler” page to submit details, and we’ll provide an evaluation and offer.', '2025-07-14 17:11:15'),
(4, 'Do you offer boiler parts and accessories?', 'Yes. In addition to complete boilers, we stock a variety of boiler parts, including feedwater systems, blowdown separators, water softeners, and more.', '2025-07-14 17:11:28'),
(6, 'Do you provide delivery and setup assistance?', 'We do. We can arrange logistics and freight, and our team is available to coordinate with your facility for proper setup and installation support if needed.', '2025-07-14 17:12:09'),
(7, 'Do you sell both new and used boilers?', 'Yes. We offer a wide selection of new and reconditioned used boilers from top manufacturers like Cleaver-Brooks, Johnston, Superior, and Hurst. All used boilers are tested, inspected, and certified for reliable performance.', '2025-07-14 17:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `feature_products`
--

CREATE TABLE `feature_products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `button_text` varchar(100) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feature_products`
--

INSERT INTO `feature_products` (`id`, `image`, `title`, `button_text`, `button_link`) VALUES
(1, 'images/services/cleaver-brooks.png', 'Cleaver Brooks Boilers', 'Read More', 'http://localhost/energyequipco/cleaver-brooks-boilers.php'),
(2, 'images/services/johnston-boiler.jpg', 'Johnston Boilers', 'Read More', 'http://localhost/energyequipco/johnston-boilers.php'),
(3, 'images/services/sup-boiler.jpg', 'Superior Boilers', 'Read More', 'http://localhost/energyequipco/superior-boilers.php'),
(4, 'images/services/hurst-image.jpeg', 'Hurst Boilers', 'Read More', 'http://localhost/energyequipco/hurst-boilers.php'),
(5, 'images/services/watertube-boilers.webp', 'Watertube Boilers', 'Read More', 'http://localhost/energyequipco/hurst-boilers.php'),
(6, 'images/services/other-boilers.webp', 'Additional Boilers', 'Read More', 'http://localhost/energyequipco/additional-boilers.php');

-- --------------------------------------------------------

--
-- Table structure for table `hurst_boiler`
--

CREATE TABLE `hurst_boiler` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hurst_boiler`
--

INSERT INTO `hurst_boiler` (`id`, `image`, `description`, `created_at`) VALUES
(1, 'images/product/hurst-boiler.jpeg', 'Reconditioning the used Hurst Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel, tubes, boiler trim piping, and blowdown piping and valves, new Honeywell or Fireye controls are installed, new electrical and control panels are installed as needed, new steam pressure controls are installed, the boilers are re-wired as needed, new safety relief valves are installed or shipped loose for field installation, electrical and mechanical checks are performed to identify defective components, defective components found are replaced. We guarantee that the pressure vessel and tubes is in good condition and that the boiler will pass a hydrostatic test at the time of startup. A 1 year parts replacement warranty on controls is included.\r\n\r\nUsed, reconditioned Hurst Boilers, Hurst 3 & 4 pass dry back boilers, Hurst 3 & 4 pass wet back boilers, high pressure boilers, low pressure boilers, hot water boilers, Hurst boiler feed water systems, atmospheric tanks, pressurized deaerators, blow down tanks, blow down separators, flash steam economizers, stack economizers, boiler flame safeguard controls, boiler combustion controls, boiler water level controls.', '2025-07-28 12:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `hurst_table`
--

CREATE TABLE `hurst_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_number` varchar(50) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `horsepower` varchar(50) DEFAULT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `pressure` varchar(50) DEFAULT NULL,
  `steam_or_hot_water` varchar(50) DEFAULT NULL,
  `burner` varchar(100) DEFAULT NULL,
  `fuel` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hurst_table`
--

INSERT INTO `hurst_table` (`id`, `item_number`, `year`, `horsepower`, `manufacturer`, `pressure`, `steam_or_hot_water`, `burner`, `fuel`, `created_at`) VALUES
(1, '0020', 2000, '20 hp	', 'Hurst Vertical	', '150 psi	', 'Steam	', 'PowerFlame	', 'natural gas', '2025-07-31 13:08:26'),
(2, '0030', 2000, '30 hp	', 'Hurst Vertical	', '150 psi	', 'Steam	', 'PowerFlame	', 'natural gas', '2025-07-31 13:09:56'),
(3, '07150', 2007, '150 hp', 'Hurst', '150 psi', 'Steam', 'Gordon Piatt', 'natural gas/oil', '2025-07-31 13:10:41'),
(4, '071500		', 1500, '1500 hp	', 'Hurst	', '150 psi	', 'Steam	', 'PowerFlame	', 'natural gas', '2025-07-31 13:14:04'),
(5, '07300		', 2007, '300 hp	', 'Hurst Hybrid Biomass', '150 psi	', 'Steam	', 'Hurst	', 'wood/biomass', '2025-07-31 13:12:03'),
(6, '09350		', 2009, '350 hp	', 'Hurst	', '150 psi	', 'Steam	', 'PowerFlame	', 'natural gas', '2025-07-31 13:13:17'),
(7, '09350H		', 2009, '350 hp	', 'Hurst	', '150 psi	', 'Steam	', 'PowerFlame	', 'natural gas', '2025-07-31 13:12:35'),
(8, '9930', 1999, '30 hp	', 'Hurst Vertical	', '150 psi	', 'Steam	', 'PowerFlame', 'natural gas', '2025-07-31 13:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `johnston_boiler`
--

CREATE TABLE `johnston_boiler` (
  `id` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `johnston_boiler`
--

INSERT INTO `johnston_boiler` (`id`, `image1`, `image2`, `description`, `created_at`) VALUES
(1, 'images/product/johnston-boiler.jpg', 'images/product/johnston-boiler2.jpg', 'Reconditioning the Johnston Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel, tubes, boiler trim piping, and blowdown piping and valves, new Honeywell or Fireye controls are installed, new electrical and control panels are installed as needed, new steam pressure controls are installed, the boilers are re-wired as needed, new safety relief valves are installed or shipped loose for field installation, electrical and mechanical checks are performed to identify defective components, defective components found are replaced. We guarantee that the pressure vessel and tubes is in good condition and that the boiler will pass a hydrostatic test at the time of startup. A one (1) year parts replacement warranty on controls is included.\r\n\r\nUsed, reconditioned Johnston Boilers, Johnston 3 & 4 pass dry back boilers, Johnston 3 & 4 pass wet back boilers, high pressure boilers, low pressure boilers, hot water boilers, Johnston boiler feed water systems, atmospheric tanks, pressurized deaerators, blow down tanks, blow down separators, flash steam economizers, stack economizers, boiler flame safeguard controls, boiler combustion controls, boiler water level controls.', '2025-07-28 08:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `johnston_table`
--

CREATE TABLE `johnston_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_number` varchar(50) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `horsepower` varchar(50) DEFAULT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `pressure` varchar(50) DEFAULT NULL,
  `steam_or_hot_water` varchar(50) DEFAULT NULL,
  `burner` varchar(100) DEFAULT NULL,
  `fuel` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `johnston_table`
--

INSERT INTO `johnston_table` (`id`, `item_number`, `year`, `horsepower`, `manufacturer`, `pressure`, `steam_or_hot_water`, `burner`, `fuel`, `created_at`) VALUES
(1, '07600', 2007, '600 hp	', 'Johnston	', '150 psi	', 'Steam', 'Limpsfield 30 PPM NOx	', 'natural gas', '2025-07-31 13:01:40'),
(2, '081000', 2008, '1000 hp	', 'Johnston	', '150 psi	', 'Steam	', 'Johnston	', 'natural gas/oil', '2025-07-31 13:02:29'),
(3, '96250-2', 1996, '250 hp	', 'Johnston	', '15 psi	', 'Steam', 'Johnston	', 'natural gas', '2025-07-31 12:58:25'),
(4, '96500', 1996, '500 hp	', 'Johnston	', '150 psi	', 'Steam	', 'Johnston 30 PPM NOx	', 'natural gas', '2025-07-31 13:00:36'),
(5, '98200', 1998, '200 hp	', 'Johnston	', '250 psi	', 'Steam', 'Johnston', 'natural gas/oil', '2025-07-29 13:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `other_boilers`
--

CREATE TABLE `other_boilers` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `other_boilers`
--

INSERT INTO `other_boilers` (`id`, `image`, `description`, `created_at`) VALUES
(1, 'images/product/other-boilers.png', 'Reconditioning the used additional Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel. Additionally tubes, boiler trim piping, and blow down piping and valves and new Honeywell or Fireye controls are installed along with new electrical and control panels are installed as needed. New steam pressure controls are installed, the boilers are re-wired as needed, new safety relief valves are installed or shipped loose for field installation, electrical and mechanical checks are performed to identify defective components, defective components found are replaced. We guarantee that the pressure vessel and tubes are in good condition and that the boiler will pass a hydrostatic test at the time of startup. A one (1) year parts replacement warranty on controls is included.\r\n\r\nUsed, reconditioned Boilers, 3 & 4 pass dry back boilers, 3 & 4 pass wet back boilers, high pressure boilers, low pressure boilers, hot water boilers, boiler feed water systems, atmospheric tanks, pressurized deaerators, blow down tanks, blow down separators, flash steam economizers, stack economizers, boiler flame safeguard controls, boiler combustion controls, boiler water level controls.', '2025-07-28 13:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `other_table`
--

CREATE TABLE `other_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_number` varchar(50) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `horsepower` varchar(50) DEFAULT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `pressure` varchar(50) DEFAULT NULL,
  `steam_or_hot_water` varchar(50) DEFAULT NULL,
  `burner` varchar(100) DEFAULT NULL,
  `fuel` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `other_table`
--

INSERT INTO `other_table` (`id`, `item_number`, `year`, `horsepower`, `manufacturer`, `pressure`, `steam_or_hot_water`, `burner`, `fuel`, `created_at`) VALUES
(1, '21200	', 2021, '200 hp	', 'Power Master (NEW)	', '250 psi	', 'Steam	', 'Oilon	', 'natural gas/oil', '2025-08-01 10:56:16'),
(2, '9170	', 1991, '70 hp	', 'York Shipley	', '150 psi	', 'Steam	', 'York Shipley	', 'natural gas/oil', '2025-08-01 10:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `our_boilers`
--

CREATE TABLE `our_boilers` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `button_text` varchar(100) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `our_boilers`
--

INSERT INTO `our_boilers` (`id`, `image`, `title`, `button_text`, `button_link`) VALUES
(1, 'images/services/cleaver-brooks.png', 'Used Boilers by Manufacturer', 'Read More', 'http://localhost/energyequipco/manufacturers.php'),
(2, 'images/services/hurst-image.jpeg', 'Used Boilers by Horsepower', 'Read More', 'http://localhost/energyequipco/used-boilers-by-horsepower.php'),
(3, 'images/services/johnston-boiler.jpg', 'Ready to Ship Used Boilers', 'Read More', 'http://localhost/energyequipco/ready-to-ship-used-boilers.php'),
(4, 'images/services/sell-your-equipment.png', 'Sell Your Equipment', 'Read More', 'http://localhost/energyequipco/sell-your-boiler.php');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `content`, `created_at`) VALUES
(0, '<h3><strong>Energy Equipment Co. Inc.</strong></h3>\r\n\r\n<p><a href=\"mailto:dave@energyequipco.com\">dave@energyequipco.com</a><br />\r\n<a href=\"mailto:dave@energyequipco.com\">www.energyequipco.com</a></p>\r\n\r\n<h3><strong>Last modified: October 03, 2023</strong></h3>\r\n\r\n<p>Energy Equipment Co. Inc. respects your privacy and our site visitors&rsquo; information. We do not sell or rent to third parties any of the information collected via this website.</p>\r\n\r\n<h3><strong>Information Collected</strong></h3>\r\n\r\n<p>If you request or submit information to us by sending an Email or by filling out a &ldquo;contact&rdquo; form, we may save your Email address as well as any other information you provide on website forms submitted to us. This information may be used to contact you in the future by mail, Email, or phone to convey information about our products, services or solutions that we feel may benefit you.</p>\r\n\r\n<h3><strong>Information Collected by Others</strong></h3>\r\n\r\n<p>This notice addresses only Energy Equipment Co. Inc.&rsquo;s website policy, and does not apply to sites that users access via links from our site. Energy Equipment Co. Inc. is not responsible for the information collecting policies of other sites, for the practices employed by websites linked to or from our website, or for the information or content contained therein. Often, links to other websites are provided solely on the basis that they may contain useful information for our website visitors. Users are advised to review the privacy policies of these other websites.</p>\r\n\r\n<h3><strong>Cookies</strong></h3>\r\n\r\n<p>This website may set cookies on your computer. A cookie is a text file that is placed on your computer by our web server and helps recall your use of this website. Cookies are uniquely generated and assigned to you.</p>\r\n\r\n<p>We may also use one or more 3rd party tracking tools that utilize data collected to track and examine the use of www.energyequipco.com and to prepare reports regarding our website&rsquo;s usage. These 3rd party tracking tools do not collect personally identifiable information.</p>\r\n\r\n<h3><strong>Other Information We Collect</strong></h3>\r\n\r\n<p>Energy Equipment Co. Inc. may keep track of technical information about your computer or mobile device, such as the browser type and version, browser plug-in types and versions and operating system of your computer; the Internet Service Provider (ISP) or other provider you use to access this website, links on this website and certain of our services; and your internet protocol (IP) address, location and time zone setting. To help us understand the use of this website by users, improve your site experience and aid us in marketing and managing this website and our services, we may also collect information as to how you were directed to this website and our services, how you navigate around them, what products or services you browse, which external websites or links you access from this website. This information may be used, among other things, in the reporting, marketing and analysis of this website and its services and features and may be shared with our affiliates, suppliers, providers and/or their and our respective agents and contractors.</p>\r\n\r\n<h3><strong>Updating, Correcting, and Deleting Personal Information</strong></h3>\r\n\r\n<p>If you would like to have your personal information updated, corrected or removed from our records, please send us an Email with &ldquo;Update/Correct or Remove personal information&rdquo; in the subject line to dave@energyequipco.com.</p>\r\n\r\n<h3><strong>Opting Out Of Email</strong></h3>\r\n\r\n<p>You can choose to opt out of receiving email from Energy Equipment Co. Inc. at any time. Energy Equipment Co. Inc. markets some of its own products and services by email. Every email sent from Energy Equipment Co. Inc. will include appropriate unsubscribe instructions. Opting out of email offers for a specific Energy Equipment Co. Inc. service only opts you out of that service. To opt out of all email marketing messages from Energy Equipment Co. Inc., you must send an email to dave@energyequipco.com from the email address you wish to unsubscribe. Please clearly state in your email, &ldquo;Unsubscribe me from all Energy Equipment Co. Inc. email marketing.&rdquo; This is the only way to assure that you no longer receive email advertising messages from Energy Equipment Co. Inc.</p>\r\n\r\n<h3><strong>Data Security</strong></h3>\r\n\r\n<p>We use reasonable precautions to keep user information disclosed to us secure. To prevent unauthorized access, maintain data accuracy and ensure the appropriate use of information, we have put in place commercially reasonable physical, electronic and managerial procedures to safeguard and secure the information we collect.</p>\r\n\r\n<p>We may disclose information we collect to third parties, under contract to us, as required to operate this website, provide certain services or features offered by this website or to perform business functions on our behalf. We will only release this information to those companies that we believe to be responsible. However, we are not responsible for any breach of security or for any actions of any third parties who receive the information. Also, once information has been provided to a third party, it is out of the control of Energy Equipment Co. Inc. and subject to the policies of that third party.</p>\r\n\r\n<h3><strong>Children</strong></h3>\r\n\r\n<p>This website is not intended for use by children, and the terms and conditions governing the use of this website and its features require that you must be at least 18 years old to use them.</p>\r\n\r\n<h3><strong>Legally Compelled Disclosure of Information</strong></h3>\r\n\r\n<p>Energy Equipment Co. Inc. may disclose information when legally compelled to do so: when we, in good faith, believe that the law requires us to do so or for the protection of our legal rights.</p>\r\n\r\n<h3><strong>Periodic Policy Changes</strong></h3>\r\n\r\n<p>Please note that Energy Equipment Co. Inc. reviews its privacy practices from time-to-time (i.e. to track technology and/or legal changes), and that these practices are subject to change. To ensure continuing familiarity with the most current version of our privacy policy, please bookmark and periodically review this page.</p>\r\n\r\n<p>This policy statement is made in the name of Energy Equipment Co. Inc. and is effective as of the date last modified as noted above. This statement does not create an agreement between Energy Equipment Co. Inc. and users, and as such, does not create any legal rights for any party.</p>\r\n\r\n<h3><strong>Contact Us:</strong><br />\r\n<strong>Energy Equipment Co. Inc.</strong></h3>\r\n\r\n<p>206 N. Lanford Rd.<br />\r\nSpartanburg, SC 29301</p>\r\n\r\n<p>Phone:&nbsp;<a href=\"tel:8643164028\">864-316-4028</a><br />\r\nFax:&nbsp;866-931-1819<br />\r\nEmail:&nbsp;<a href=\"mailto:dave@energyequipco.com\">dave@energyequipco.com</a><br />\r\nWebsite:&nbsp;<a href=\"https://energyequipco.com/\">www.energyequipco.com</a></p>\r\n', '2025-08-19 15:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `email`, `phone`, `address`, `facebook`, `twitter`, `instagram`, `linkedin`, `logo`, `favicon`, `created_at`) VALUES
(1, 'New and Used Boilers and Boiler Room Equipment - Spartanburg, South Carolina', 'dave@energyequipco.com', '864.316.4028', 'Mill Spring, NC Gastonia, NC Woodruff, SC', '', '', '', '', 'eec-logo.webp', 'boiler-fav-icon.webp', '2025-07-10 18:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `strategy_progress`
--

CREATE TABLE `strategy_progress` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `percentage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `strategy_progress`
--

INSERT INTO `strategy_progress` (`id`, `label`, `percentage`) VALUES
(1, 'Quality Products', 90),
(2, 'Affordable Cost', 80),
(3, 'Business Analytics', 95);

-- --------------------------------------------------------

--
-- Table structure for table `strategy_section`
--

CREATE TABLE `strategy_section` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `subheading` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `strategy_section`
--

INSERT INTO `strategy_section` (`id`, `heading`, `subheading`, `description`, `image`) VALUES
(1, 'Providing Full Range of High Services Solution', 'OUR STRATEGY', 'Fusce accumsan felis sed purus sollicitudin posuere. Vivamus id pharetra augue. Phasellus molestie ornare lacus mattis iaculis. Nulla dui dui, convallis et venenatis id, condimentum ut justo.', 'images/video/pic2-1.webp');

-- --------------------------------------------------------

--
-- Table structure for table `superior_boiler`
--

CREATE TABLE `superior_boiler` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superior_boiler`
--

INSERT INTO `superior_boiler` (`id`, `image`, `description`, `created_at`) VALUES
(1, 'images/product/sup-boiler.jpg', 'Reconditioning the Superior Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel, tubes, boiler trim piping, and blowdown piping and valves, new Honeywell or Fireye controls are installed, new electrical and control panels are installed as needed, new steam pressure controls are installed, the boilers are re-wired as needed, new safety relief valves are installed or shipped loose for field installation, electrical and mechanical checks are performed to identify defective components, defective components found are replaced. We guarantee that the pressure vessel and tubes is in good condition and that the boiler will pass a hydrostatic test at the time of startup. A one (1) year parts replacement warranty on controls is included.\r\n\r\nUsed, reconditioned Superior Boilers, Superior 3 & 4 pass dry back boilers, Superior 3 & 4 pass wet back boilers, high pressure boilers, low pressure boilers, hot water boilers, Superior boiler feed water systems, atmospheric tanks, pressurized deaerators, blow down tanks, blow down separators, flash steam economizers, stack economizers, boiler flame safeguard controls, boiler combustion controls, boiler water level controls.', '2025-07-28 11:59:21'),
(2, 'images/product/sup-boiler.jpg', 'Reconditioning the Superior Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel, tubes, boiler trim piping, and blowdown piping and valves, new Honeywell or Fireye controls are installed, new electrical and control panels are installed as needed, new steam pressure controls are installed, the boilers are re-wired as needed, new safety relief valves are installed or shipped loose for field installation, electrical and mechanical checks are performed to identify defective components, defective components found are replaced. We guarantee that the pressure vessel and tubes is in good condition and that the boiler will pass a hydrostatic test at the time of startup. A one (1) year parts replacement warranty on controls is included.\r\n\r\nUsed, reconditioned Superior Boilers, Superior 3 & 4 pass dry back boilers, Superior 3 & 4 pass wet back boilers, high pressure boilers, low pressure boilers, hot water boilers, Superior boiler feed water systems, atmospheric tanks, pressurized deaerators, blow down tanks, blow down separators, flash steam economizers, stack economizers, boiler flame safeguard controls, boiler combustion controls, boiler water level controls.', '2025-07-28 12:42:00'),
(3, 'images/product/sup-boiler.jpg', 'Reconditioning the Superior Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel, tubes, boiler trim piping, and blowdown piping and valves, new Honeywell or Fireye controls are installed, new electrical and control panels are installed as needed, new steam pressure controls are installed, the boilers are re-wired as needed, new safety relief valves are installed or shipped loose for field installation, electrical and mechanical checks are performed to identify defective components, defective components found are replaced. We guarantee that the pressure vessel and tubes is in good condition and that the boiler will pass a hydrostatic test at the time of startup. A one (1) year parts replacement warranty on controls is included.\r\n\r\nUsed, reconditioned Superior Boilers, Superior 3 & 4 pass dry back boilers, Superior 3 & 4 pass wet back boilers, high pressure boilers, low pressure boilers, hot water boilers, Superior boiler feed water systems, atmospheric tanks, pressurized deaerators, blow down tanks, blow down separators, flash steam economizers, stack economizers, boiler flame safeguard controls, boiler combustion controls, boiler water level controls.', '2025-07-28 12:42:10'),
(4, 'images/product/sup-boiler.jpg', 'Reconditioning the Superior Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel, tubes, boiler trim piping, and blowdown piping and valves, new Honeywell or Fireye controls are installed, new electrical and control panels are installed as needed, new steam pressure controls are installed, the boilers are re-wired as needed, new safety relief valves are installed or shipped loose for field installation, electrical and mechanical checks are performed to identify defective components, defective components found are replaced. We guarantee that the pressure vessel and tubes is in good condition and that the boiler will pass a hydrostatic test at the time of startup. A one (1) year parts replacement warranty on controls is included.\r\n\r\nUsed, reconditioned Superior Boilers, Superior 3 & 4 pass dry back boilers, Superior 3 & 4 pass wet back boilers, high pressure boilers, low pressure boilers, hot water boilers, Superior boiler feed water systems, atmospheric tanks, pressurized deaerators, blow down tanks, blow down separators, flash steam economizers, stack economizers, boiler flame safeguard controls, boiler combustion controls, boiler water level controls.', '2025-07-28 12:44:32'),
(5, 'images/product/sup-boiler.jpg', 'Reconditioning the Superior Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel, tubes, boiler trim piping, and blowdown piping and valves, new Honeywell or Fireye controls are installed, new electrical and control panels are installed as needed, new steam pressure controls are installed, the boilers are re-wired as needed, new safety relief valves are installed or shipped loose for field installation, electrical and mechanical checks are performed to identify defective components, defective components found are replaced. We guarantee that the pressure vessel and tubes is in good condition and that the boiler will pass a hydrostatic test at the time of startup. A one (1) year parts replacement warranty on controls is included.\r\n\r\nUsed, reconditioned Superior Boilers, Superior 3 & 4 pass dry back boilers, Superior 3 & 4 pass wet back boilers, high pressure boilers, low pressure boilers, hot water boilers, Superior boiler feed water systems, atmospheric tanks, pressurized deaerators, blow down tanks, blow down separators, flash steam economizers, stack economizers, boiler flame safeguard controls, boiler combustion controls, boiler water level controls.', '2025-07-28 12:44:35'),
(6, 'images/product/sup-boiler.jpg', 'Reconditioning the Superior Boiler(s) includes but not limited to the following: boilers re-tubed as required, cleaned on the fireside, waterside, outside, and painting, new fireside and waterside gaskets are installed, hydrostatic tests are done on the vessel, tubes, boiler trim piping, and blowdown piping and valves, new Honeywell or Fireye controls are installed, new electrical and control panels are installed as needed, new steam pressure controls are installed, the boilers are re-wired as needed, new safety relief valves are installed or shipped loose for field installation, electrical and mechanical checks are performed to identify defective components, defective components found are replaced. We guarantee that the pressure vessel and tubes is in good condition and that the boiler will pass a hydrostatic test at the time of startup. A one (1) year parts replacement warranty on controls is included.\r\n\r\nUsed, reconditioned Superior Boilers, Superior 3 & 4 pass dry back boilers, Superior 3 & 4 pass wet back boilers, high pressure boilers, low pressure boilers, hot water boilers, Superior boiler feed water systems, atmospheric tanks, pressurized deaerators, blow down tanks, blow down separators, flash steam economizers, stack economizers, boiler flame safeguard controls, boiler combustion controls, boiler water level controls.', '2025-07-28 12:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `superior_table`
--

CREATE TABLE `superior_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_number` varchar(50) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `horsepower` varchar(50) DEFAULT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `pressure` varchar(50) DEFAULT NULL,
  `steam_or_hot_water` varchar(50) DEFAULT NULL,
  `burner` varchar(100) DEFAULT NULL,
  `fuel` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superior_table`
--

INSERT INTO `superior_table` (`id`, `item_number`, `year`, `horsepower`, `manufacturer`, `pressure`, `steam_or_hot_water`, `burner`, `fuel`, `created_at`) VALUES
(1, '04500', 2003, '500 hp	', 'Superior	', '150 psi	', 'Steam', 'URS-9 PPM NOx	', 'natural gas/oil', '2025-07-31 13:04:52'),
(2, '07500', 2007, '500 hp	', 'Superior', '150 psi	', 'Steam', 'Industrial Combustion	', 'natural gas', '2025-07-31 13:06:47'),
(3, '98200', 1998, '200 hp	', 'Superior	', '415 psi	', 'Steam', 'Gordon Piatt	', 'natural gas/oil', '2025-07-31 13:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `terms_of_service`
--

CREATE TABLE `terms_of_service` (
  `id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms_of_service`
--

INSERT INTO `terms_of_service` (`id`, `content`, `created_at`) VALUES
(1, '<h3><strong>Last modified: October 03, 2023</strong></h3>\r\n\r\n<p>Please read these Terms of Use (&ldquo;Terms&rdquo;, &ldquo;Terms of Use&rdquo;) carefully before using the&nbsp;<a href=\"https://energyequipco.com/\">www.energyequipco.com</a>&nbsp;website (the &ldquo;Service&rdquo;) operated by&nbsp;<strong>Energy Equipment Co. Inc.</strong>&nbsp;(&ldquo;us&rdquo;, &ldquo;we&rdquo;, or &ldquo;our&rdquo;)..</p>\r\n\r\n<p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>\r\n\r\n<p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>\r\n\r\n<h3><strong>Intellectual Property</strong></h3>\r\n\r\n<p>The Service and its original content, features and functionality are and will remain the exclusive property of Energy Equipment Co. Inc. and its licensors.</p>\r\n\r\n<h3><strong>Links To Other Websites</strong></h3>\r\n\r\n<p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Energy Equipment Co. Inc.</p>\r\n\r\n<p>Energy Equipment Co. Inc. has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Energy Equipment Co. Inc. shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>\r\n\r\n<p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>\r\n\r\n<h3><strong>Termination</strong></h3>\r\n\r\n<p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>\r\n\r\n<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>\r\n\r\n<h3><strong>Disclaimer</strong></h3>\r\n\r\n<p>Your use of the Service is at your sole risk. The Service is provided on an &ldquo;AS IS&rdquo; and &ldquo;AS AVAILABLE&rdquo; basis. The Service is provided without warranties of any kind, whether express or implied, including, but not limited to, implied warranties of merchantability, fitness for a particular purpose, non-infringement or course of performance.</p>\r\n\r\n<h3><strong>Governing Law</strong></h3>\r\n\r\n<p>These Terms shall be governed and construed in accordance with the laws of the United States without regard to its conflict of law provisions.</p>\r\n\r\n<p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>\r\n\r\n<h3><strong>Changes</strong></h3>\r\n\r\n<p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>\r\n\r\n<p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>\r\n\r\n<h3><strong>Contact Us</strong></h3>\r\n\r\n<p>If you have any questions about these Terms, please&nbsp;<a href=\"https://energyequipco.com/contact/\">contact us</a>.</p>\r\n', '2025-08-19 16:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `role`, `message`, `created_at`, `date_time`) VALUES
(2, 'Devon Mitchell', 'Senior Engineer, Horizon Foods', 'Energy Equipment Co. provided expert advice and outstanding service. Their team helped us source a unit that met both our technical and budgetary needs. Plus, they handled all compliance checks—seamlessly.', '2025-07-14 15:12:44', '2025-07-14 15:12:44'),
(3, 'Natalie Lopez', 'Maintenance Supervisor, NC Beverage Co.', 'As a maintenance supervisor, I value reliability and response time. Energy Equipment Co. has always responded quickly to any support queries post-purchase. Their used boilers run like new—can’t ask for more.', '2025-07-14 15:15:09', '2025-07-14 15:15:09'),
(4, 'Benjamin Clark', 'Project Coordinator, Southeast Plastics', 'We were up and running in no time thanks to their ‘ready to ship’ units. The refurbished boiler we got looked brand new and passed inspection with flying colors. Great value and fantastic customer service.', '2025-07-14 15:18:45', '2025-07-14 15:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'shabuddin@webzent.in', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `work_process`
--

CREATE TABLE `work_process` (
  `id` int(11) NOT NULL,
  `step_number` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_process`
--

INSERT INTO `work_process` (`id`, `step_number`, `title`, `description`, `created_at`) VALUES
(1, 1, 'Receive Project', 'Nullam nec rutrum eros. Maecenas maximus augue eget libero dictum.', '2025-07-21 17:03:14'),
(2, 2, 'Planning Work', 'Nullam nec rutrum eros. Maecenas maximus augue eget libero dictum.', '2025-07-21 17:03:35'),
(3, 3, 'Creative Design', 'Nullam nec rutrum eros. Maecenas maximus augue eget libero dictum.', '2025-07-21 17:03:59'),
(4, 4, 'Start Building', 'Nullam nec rutrum eros. Maecenas maximus augue eget libero dictum.', '2025-07-21 17:04:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_features`
--
ALTER TABLE `about_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_section`
--
ALTER TABLE `about_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boiler_details`
--
ALTER TABLE `boiler_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaver_table`
--
ALTER TABLE `cleaver_table`
  ADD PRIMARY KEY (`item_number`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter_section`
--
ALTER TABLE `counter_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_cards`
--
ALTER TABLE `equipment_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_products`
--
ALTER TABLE `feature_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hurst_boiler`
--
ALTER TABLE `hurst_boiler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hurst_table`
--
ALTER TABLE `hurst_table`
  ADD PRIMARY KEY (`item_number`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `johnston_boiler`
--
ALTER TABLE `johnston_boiler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `johnston_table`
--
ALTER TABLE `johnston_table`
  ADD PRIMARY KEY (`item_number`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `other_boilers`
--
ALTER TABLE `other_boilers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_table`
--
ALTER TABLE `other_table`
  ADD PRIMARY KEY (`item_number`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `our_boilers`
--
ALTER TABLE `our_boilers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strategy_progress`
--
ALTER TABLE `strategy_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strategy_section`
--
ALTER TABLE `strategy_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superior_boiler`
--
ALTER TABLE `superior_boiler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superior_table`
--
ALTER TABLE `superior_table`
  ADD PRIMARY KEY (`item_number`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `terms_of_service`
--
ALTER TABLE `terms_of_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_process`
--
ALTER TABLE `work_process`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_features`
--
ALTER TABLE `about_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `about_section`
--
ALTER TABLE `about_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `boiler_details`
--
ALTER TABLE `boiler_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cleaver_table`
--
ALTER TABLE `cleaver_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `counter_section`
--
ALTER TABLE `counter_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `equipment_cards`
--
ALTER TABLE `equipment_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feature_products`
--
ALTER TABLE `feature_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hurst_boiler`
--
ALTER TABLE `hurst_boiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hurst_table`
--
ALTER TABLE `hurst_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `johnston_table`
--
ALTER TABLE `johnston_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `other_boilers`
--
ALTER TABLE `other_boilers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `other_table`
--
ALTER TABLE `other_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `our_boilers`
--
ALTER TABLE `our_boilers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `strategy_progress`
--
ALTER TABLE `strategy_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `strategy_section`
--
ALTER TABLE `strategy_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `superior_boiler`
--
ALTER TABLE `superior_boiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `superior_table`
--
ALTER TABLE `superior_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `terms_of_service`
--
ALTER TABLE `terms_of_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_process`
--
ALTER TABLE `work_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
