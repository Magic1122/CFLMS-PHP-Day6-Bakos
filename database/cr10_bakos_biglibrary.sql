-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 11:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_bakos_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `cr10_bakos_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr10_bakos_biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_fname` varchar(55) NOT NULL,
  `author_lname` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_fname`, `author_lname`) VALUES
(1, 'Pavel', 'Khvaleev'),
(2, 'Nestor Alexander', 'Haddaway'),
(3, 'Nora', 'En Pure'),
(4, 'J.K.', 'Rowling'),
(5, 'Kyle', 'Simpson'),
(6, 'J.R.R.', 'Tolkien'),
(7, 'Balint', 'Bakos'),
(8, 'Robert C.', 'Martin');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `isbn_asin` varchar(55) NOT NULL,
  `media_title` varchar(255) NOT NULL,
  `media_description` text NOT NULL,
  `media_status` enum('available','reserved') DEFAULT 'available',
  `media_genre` varchar(255) NOT NULL,
  `media_img` varchar(255) NOT NULL,
  `media_published_year` year(4) NOT NULL,
  `fk_author_id` int(11) NOT NULL,
  `fk_publisher_id` int(11) NOT NULL,
  `fk_type_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `isbn_asin`, `media_title`, `media_description`, `media_status`, `media_genre`, `media_img`, `media_published_year`, `fk_author_id`, `fk_publisher_id`, `fk_type_id`, `fk_user_id`, `created_at`) VALUES
(1, 'B07KZHV94F', 'Sonder Special Editition', 'Sonder Special Editition', 'available', 'Electronic', 'https://images-na.ssl-images-amazon.com/images/I/81wYsTZFCJL._SL1500_.jpg', 2018, 1, 1, 2, 1, '2020-07-17 12:56:43'),
(2, 'B01K8NJFJ0', 'What Is Love: the Best of by Haddaway', '\"What Is Love\" is a song recorded by Trinidadian-German Eurodance artist Haddaway for his debut album, The Album. The song was released on 8 May 1993 as the album\'s lead single.\r\n', 'available', 'Dance', 'https://images-na.ssl-images-amazon.com/images/I/51CUjZc1-XL.jpg', 2012, 2, 2, 2, 1, '2020-07-17 12:56:43'),
(3, 'B07JC4CWBH', 'Polynesia EP Special Edition', 'Daniela Niederer (born July 20, 1990), better known by her stage name Nora En Pure, is a South African-Swiss DJ and deep house producer. She first received recognition for her 2013 single', 'available', 'Progressive', 'https://m.media-amazon.com/images/I/81SdflFCFML._SS500_.jpg', 2019, 3, 3, 2, 1, '2020-07-17 12:56:43'),
(5, 'B01KKN0I30', 'Harry Potter and the Order of the Phoenix', 'Harry Potter and the Order of the Phoenix is a 2007 fantasy film directed by David Yates and distributed by Warner Bros. Pictures. It is based on J. K. Rowling\'s 2003 novel of the same name. The fifth instalment in the Harry Potter film series, it was written by Michael Goldenberg (making this the only film in the series not to be scripted by Steve Kloves) and produced by David Heyman and David Barron.', 'available', 'Action', 'https://images-na.ssl-images-amazon.com/images/I/91yYKadwVQL._SY550_.jpg', 2007, 4, 4, 3, 1, '2020-07-17 12:56:43'),
(6, 'B0008KLW7M', 'Harry Potter and the Chamber of Secrets', 'Harry Potter is a series of fantasy novels written by British author J. K. Rowling. The novels chronicle the lives of a young wizard, Harry Potter, and his friends Hermione Granger and Ron Weasley, all of whom are students at Hogwarts School of Witchcraft and Wizardry.', 'available', 'Action', 'https://images-na.ssl-images-amazon.com/images/I/91VVR9NbRKL._SY550_.jpg', 2002, 4, 4, 3, 1, '2020-07-17 12:56:43'),
(7, 'B07NC95X83', 'Harry Potter and the Sorcerers&#39;s Stone', 'An orphaned boy enrolls in a school of wizardry, where he learns the truth about himself, his family and the terrible evil that haunts the magical world.', 'reserved', 'Action', 'https://images-na.ssl-images-amazon.com/images/I/91y2gB9dgeL._SY550_.jpg', 2000, 4, 4, 3, 1, '2020-07-17 12:56:43'),
(8, '9781449335588', 'You Don\'t Know JS: Scope & Closures', 'Kyle Simpson is an Open Web Evangelist from Austin, TX. He\'s passionate about JavaScript, HTML5, real-time/peer-to-peer communications, and web performance. Otherwise, he\'s probably bored by it. Kyle is an author, workshop trainer, tech speaker, and avid OSS community member.', 'available', 'Coursebook', 'https://images-na.ssl-images-amazon.com/images/I/41ultdqyvXL._SX331_BO1,204,203,200_.jpg', 2014, 5, 5, 1, 1, '2020-07-17 12:56:43'),
(9, '9781491924464', 'You Don&#39;t Know JS - Up & Going', 'Kyle Simpson is an Open Web Evangelist from Austin, TX. He&#39;s passionate about JavaScript, HTML5, real-time/peer-to-peer communications, and web performance. Otherwise, he&#39;s probably bored by it. Kyle is an author, workshop trainer, tech speaker, and avid OSS community member.', 'available', 'Coursebook', 'https://images-na.ssl-images-amazon.com/images/I/41WdbPkuINL._SX331_BO1,204,203,200_.jpg', 2016, 5, 5, 1, 1, '2020-07-17 12:56:43'),
(10, '9781491904244', 'You Don&#39;t Know JS - ES6 & Beyond', 'Kyle Simpson is an Open Web Evangelist from Austin, TX. He&#39;s passionate about JavaScript, HTML5, real-time/peer-to-peer communications, and web performance. Otherwise, he&#39;s probably bored by it. Kyle is an author, workshop trainer, tech speaker, and avid OSS community member.', 'reserved', 'Coursebook', 'https://images-na.ssl-images-amazon.com/images/I/41arrvfm3fL._SX329_BO1,204,203,200_.jpg', 2014, 5, 5, 1, 1, '2020-07-17 12:56:43'),
(14, 'B005CNZN7A', 'Harry Potter and the Deathly Hallows P-2', 'Im großen Finale weitet sich der Kampf Gut gegen Böse in der Welt der Zauberer zu einem regelrechten Krieg aus. Niemals stand derart viel auf dem Spiel - niemand ist mehr sicher. Die entscheidende Auseinandersetzung mit Lord Voldemort scheint unausweichlich, und es sieht fast so aus, als ob Harry Potter sich opfern muss. Alles endet hier.', 'available', 'Action', 'https://images-na.ssl-images-amazon.com/images/I/91kKJKNniQL._SY550_.jpg', 2014, 4, 4, 3, 1, '2020-07-18 11:02:59'),
(15, '3826655486', 'Clean Code A Handbook of Agile Software Craftsmanscip', 'Robert C. »Uncle Bob« Martin entwickelt seit 1970 professionell Software. Seit 1990 arbeitet er international als Software-Berater. Er ist Gründer und Vorsitzender von Object Mentor, Inc., einem Team erfahrener Berater, die Kunden auf der ganzen Welt bei der Programmierung in und mit C++, Java, C#, Ruby, OO, Design Patterns, UML sowie Agilen Methoden und eXtreme Programming helfen.', 'available', 'Coursebook', 'https://images-na.ssl-images-amazon.com/images/I/41HfKvc01IL._SX354_BO1,204,203,200_.jpg', 2009, 8, 9, 1, 1, '2020-07-18 11:10:08'),
(16, 'B005CNZN7A', 'Rebirth Special Release Edition', 'Pavel Khvaleev was born in Naberezhnie Chelni in Russia, on May 27, 1984. In 2004 he founded the music project Moonbeam with his brother Vitaly. During the following years Moonbeam became a famous international act in the world wide electronic dance scene. This is his first solo project.', 'available', 'House, Progressive', 'https://f4.bcbits.com/img/a0571332753_10.jpg', 2017, 1, 6, 2, 1, '2020-07-18 11:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(55) NOT NULL,
  `publisher_address` varchar(255) NOT NULL,
  `publisher_zip` int(11) NOT NULL,
  `publisher_city` varchar(255) NOT NULL,
  `publisher_size` enum('small','big','medium') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `publisher_zip`, `publisher_city`, `publisher_size`) VALUES
(1, 'Black Hole', 'PO Box 7042', 4800, 'GA Breda', 'big'),
(2, 'BMG', 'Charlottenstraße 59', 10117, 'Berlin', 'medium'),
(3, 'Kontor Records GmbH', 'Neumühlen 17', 22763, 'Hamburg', 'medium'),
(4, 'WarnerBrothers', 'Neverland 2', 154200, 'Los Angeles', 'big'),
(5, 'O\'Reilly and Associates', 'O\'Reilly Street 547', 254110, 'Neverland', 'big'),
(6, 'Figura Music', 'Figura str 41', 15455, 'Nizhny Novgorod', 'small'),
(8, 'EMI Records', 'Emi 1254', 1010, 'Vienna', 'big'),
(9, 'MITP', 'MITP Street 125/1', 51200, 'Bremen', 'medium');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type` enum('book','cd','dvd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type`) VALUES
(1, 'book'),
(2, 'cd'),
(3, 'dvd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `admin`) VALUES
(1, 'Balint Bakos', 'balint.bb@gmail.com', '$2y$10$PS3ur8zRfppX0wHEyssEeOYFk3pFWTnGPhxEOKWc606BkLylFzeO6', '2020-07-17 12:47:28', 1),
(2, 'Magic', 'magic@gmail.com', '$2y$10$PQQAC5sx1fIA/qHY9F.5SuDcmZ0KWvB1pAnhEQMrFVDgYWbsEphS.', '2020-07-21 10:06:48', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`),
  ADD UNIQUE KEY `author_fname` (`author_fname`),
  ADD UNIQUE KEY `author_lname` (`author_lname`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `fk_author_id` (`fk_author_id`),
  ADD KEY `fk_publisher_id` (`fk_publisher_id`),
  ADD KEY `fk_type_id` (`fk_type_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`),
  ADD UNIQUE KEY `publisher_name` (`publisher_name`),
  ADD UNIQUE KEY `publisher_address` (`publisher_address`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`fk_author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`fk_publisher_id`) REFERENCES `publisher` (`publisher_id`),
  ADD CONSTRAINT `media_ibfk_3` FOREIGN KEY (`fk_type_id`) REFERENCES `type` (`type_id`),
  ADD CONSTRAINT `media_ibfk_4` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
