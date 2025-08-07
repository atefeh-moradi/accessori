-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 11, 2025 at 10:45 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accessory`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `caption` text COLLATE utf8_persian_ci NOT NULL,
  `subTitle` text COLLATE utf8_persian_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `time_read` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `create_at` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `caption`, `subTitle`, `author`, `time_read`, `category`, `image`, `create_at`) VALUES
(1, 'مقاله 2', 'توضیحات مقاله 1', 'زیر عنوان مقاله 1', 'عاطفه مرادی', '12', 'کاربردی', 'about image (1).jpg', '۱۴۰۴/۰۴/۲۰ - ۱۱:۴۴:۰۹'),
(2, 'مقاله 1', 'توضیحات مقاله 1', 'زیر عنوان مقاله 1', 'عاطفه مرادی', '12', 'کاربردی', 'about image (2).jpg', '۱۴۰۴/۰۴/۲۰ - ۱۱:۴۴:۵۷');

-- --------------------------------------------------------

--
-- Table structure for table `articles_view`
--

DROP TABLE IF EXISTS `articles_view`;
CREATE TABLE IF NOT EXISTS `articles_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `articles_view`
--

INSERT INTO `articles_view` (`id`, `article_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `create_at`) VALUES
(13, 3, 2579635, '۱۴۰۴/۰۴/۲۰ - ۰۱:۰۸:۴۸'),
(12, 3, 4415458, '۱۴۰۴/۰۴/۲۰ - ۰۱:۰۷:۰۳'),
(11, 3, 8752923, '۱۴۰۴/۰۴/۲۰ - ۰۱:۰۰:۱۶'),
(10, 3, 6919339, '۱۴۰۴/۰۴/۲۰ - ۱۲:۳۷:۰۵');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8_persian_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `create_at` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `content`, `status`, `create_at`) VALUES
(2, 2, 8752923, 'f', 1, '۱۴۰۴/۰۴/۲۰ - ۱۱:۴۹:۱۱'),
(3, 3, 8752923, 'ی', 1, '۱۴۰۴/۰۴/۲۰ - ۱۱:۵۴:۴۱');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `caption` text COLLATE utf8_persian_ci NOT NULL,
  `feature1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `feature2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `feature3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `feature4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `create_at` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `category`, `model`, `price`, `caption`, `feature1`, `feature2`, `feature3`, `feature4`, `create_at`) VALUES
(2, 'عینک آفتابی', 'watch5.jfif', 'عینک', 'gs9', 128000, 'توضیحات عینک آفتابی', 'رنگ ثابت', 'بند دار', 'انواع رنگ', 'بدون حساسیت', '۱۴۰۴/۰۴/۲۰ - ۱۱:۳۹:۴۳'),
(3, 'لیبل', 'banner.jpg', 'کاربردی', 'یبل', 1000000, 'یبل', 'بییل', 'یبل', 'یبل', 'یب', '۱۴۰۴/۰۴/۲۰ - ۱۱:۵۴:۲۶');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `family` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `rule` int(11) NOT NULL DEFAULT '0',
  `create_at` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `num_id`, `name`, `family`, `username`, `email`, `phone`, `password`, `image`, `rule`, `create_at`) VALUES
(1, 8752923, 'عاطفه', 'مرادی', 'atefeh', 'atefeh@gmail.com', '05132231468', '1111', '8b219b5cc90572f930c4273c168ff7f7662f88a0.png', 1, '۱۴۰۴/۰۴/۲۰ - ۱۱:۰۴:۳۵'),
(3, 6919339, NULL, NULL, 'fdgfd', 'mfgdfgmd@gmail.com', '09028800199', '1111', NULL, 0, '۱۴۰۴/۰۴/۲۰ - ۱۲:۱۶:۲۹'),
(4, 4415458, NULL, NULL, 'fdgfd', 'mfgdfgmd@gmail.com', '09028800199', '1111', NULL, 0, '۱۴۰۴/۰۴/۲۰ - ۰۱:۰۶:۵۰'),
(5, 2579635, NULL, NULL, 'fdgff11fd', 'mfgdf111ffgmd@gmail.com', '09028800199', '1111', NULL, 0, '۱۴۰۴/۰۴/۲۰ - ۰۱:۰۸:۴۱');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
