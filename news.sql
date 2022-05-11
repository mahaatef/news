-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 09:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `name`, `created_at`) VALUES
(10, 'رياضة', '2022-04-05 10:46:04'),
(11, 'أعمال', '2022-04-08 22:51:59'),
(12, 'سياسة', '2022-04-08 22:52:07'),
(13, 'فن', '2022-04-08 22:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsID` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `catID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsID`, `title`, `body`, `image`, `catID`, `userID`, `created_at`) VALUES
(22, 'test', 'we’ll handle the backend of the file upload. First, in the same directory, create a new directory called uploads. This will be where our script will save the files.  Then, in the same directory as index.html, create a file called fileUploadScript.php. Notice that this is the same name as the action attribute in the form. Then add this code:', 'IMG-20220414-WA0011.jpg', 13, 0, '2022-04-06 11:44:54'),
(23, 'رعد حازم..\"سايبر\" جنين ومنفذ عملية ديزنغوف', 'عند التاسعة من مساء أمس الخميس، وقف شاب عشريني أمام مقهى ومحال تجارية في شارع ديزنغوف في وسط تل أبيب متأملا المشهد أمامه، قبل أن يفتح نيران سلاحه على الموجودين هناك.  هكذا بدأ الشاب الفلسطيني رعد حازم ليلة الرعب في تل أبيب الإسرائيلية، ليترك خلفه قبل أن ينسحب اثنين من القتلى و14 جريحا جراح بعضهم خطيرة، ومدينة يدب الرعب فيها.', 'رعد-حازم.jpg', 12, 0, '2022-04-08 22:53:55'),
(24, 'عملية تل أبيب.. نتنياهو كان في شارع ديزنغوف وقت الهجوم وظل محتجزا لساعات', ' هيئة البث الإسرائيلية اليوم الجمعة إن رئيس الوزراء السابق بنيامين نتنياهو كان موجودا في شارع ديزنغوف في تل أبيب في أثناء الهجوم الذي نفذه هناك الشاب الفلسطيني رعد حازم مساء أمس الخميس، وأدى إلى مقتل 3 إسرائيليين.  وذكرت الهيئة أنه، وفق توجيهات جهاز الأمن العام (شاباك)، جرى احتجاز نتنياهو لمدة 4 ساعات في مكتبه بالقرب من شارع ديزنغوف حين كان منفذ العملية يتجول في تل أبيب.  وأضافت الهيئة ', 'thumbs_b_c_953b434e996c097d80bf2199838f4b3a.jpg', 12, 0, '2022-04-08 22:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `type`, `name`, `firstName`, `lastName`, `email`, `mobile`, `password`, `created_at`) VALUES
(0, 'admin', 'ola90', 'ola', 'habib', 'olahabib90@gmail.com', 1235678, '1234', '2022-02-03 22:48:20'),
(9, 'user', 'user', 'user', 'user', 'olahabib@hotmail.com', 1235, '1234', '2022-03-18 22:02:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsID`),
  ADD KEY `catID` (`catID`),
  ADD KEY `products_ibfk_2` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `name` (`name`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
