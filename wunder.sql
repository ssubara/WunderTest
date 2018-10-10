-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2018 at 11:18 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wunder`
--

-- --------------------------------------------------------

--
-- Table structure for table `userRegistration`
--

CREATE TABLE `userRegistration` (
  `id` int(4) NOT NULL,
  `firstname` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `street` varchar(191) NOT NULL,
  `housenumber` int(4) NOT NULL,
  `zipcode` int(6) NOT NULL,
  `city` varchar(40) NOT NULL,
  `accountowner` varchar(80) NOT NULL,
  `iban` varchar(30) NOT NULL,
  `paydataid` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userRegistration`
--

INSERT INTO `userRegistration` (`id`, `firstname`, `lastname`, `telephone`, `street`, `housenumber`, `zipcode`, `city`, `accountowner`, `iban`, `paydataid`) VALUES
(1, 'Test', 'Test', '', '', 0, 0, '', '1', '1', ''),
(2, 'Slaven', 'Subara', '+38765698539', 'Vojvode Z Misica', 14, 78220, 'Kotor Varos', 'Slaven Subara', 'BA 9999 9999 9999 9999', '645df72683af7ba526f57c7870a579234e96b3a35ff51648e314ba5edb635a1ba8e3fdfc34cdb9a6e8446c291369048d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userRegistration`
--
ALTER TABLE `userRegistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userRegistration`
--
ALTER TABLE `userRegistration`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
