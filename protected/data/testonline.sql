-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2014 at 06:43 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testonline`
--
CREATE DATABASE IF NOT EXISTS `testonline` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testonline`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionId` int(11) NOT NULL,
  `text` text,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `questionId` (`questionId`),
  KEY `questionId_2` (`questionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `subjectId` (`schoolId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `schoolId`, `name`) VALUES
(1, 1, 'Computer Science'),
(2, 1, 'Information System'),
(3, 1, 'Software Engineering'),
(4, 1, 'Data Communication and Computer Networks'),
(6, 1, 'Computer Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `eqa`
--

CREATE TABLE IF NOT EXISTS `eqa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `random` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `examId` (`examId`,`questionId`),
  KEY `questionId` (`questionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `eqa`
--

INSERT INTO `eqa` (`id`, `examId`, `questionId`, `random`) VALUES
(10, 101, 1, 'ACDB'),
(11, 101, 4, 'CABD'),
(12, 101, 2, 'ADCB'),
(13, 101, 3, 'BACD'),
(14, 102, 2, 'DBAC'),
(15, 102, 1, 'DBAC'),
(16, 102, 3, 'CABD'),
(17, 103, 1, 'DBAC'),
(18, 103, 2, 'DACB');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET latin1 NOT NULL,
  `subjectId` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `NoEasy` int(11) NOT NULL,
  `NoMedium` int(11) DEFAULT NULL,
  `NoDifficult` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subjectId` (`subjectId`),
  KEY `subjectId_2` (`subjectId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=104 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `name`, `subjectId`, `time`, `NoEasy`, `NoMedium`, `NoDifficult`) VALUES
(84, 'Mid-term', 1, 30, 1, 1, 1),
(85, 'Final Test', 3, 90, 1, 1, 1),
(86, 'Mid-term', 2, 90, 1, 1, 1),
(87, 'Final Test', 4, 9, 1, 1, 1),
(88, 'Mid-term', 5, 1, 1, 1, 1),
(89, 'Mid-term', 2, 1, 1, 1, 1),
(90, 'Mid-term', 2, 1, 1, 1, 1),
(91, 'Mid-term', 2, 1, 1, 1, 1),
(92, 'Mid-term', 2, 1, 1, 1, 1),
(93, 'Mid-term', 2, 1, 1, 1, 1),
(94, 'Mid-term', 2, 1, 1, 1, 1),
(95, 'Mid-term', 2, 1, 1, 1, 1),
(96, 'Mid-term', 2, 1, 1, 1, 1),
(97, 'Final Test', 2, 30, 1, 1, 1),
(98, 'Final Test', 1, 30, 1, 1, 1),
(99, 'Mid-term', 3, 90, 2, 1, 3),
(100, 'Mid-term', 3, 90, 2, 1, 3),
(101, 'Mid-term', 3, 90, 2, 1, 1),
(102, 'Mid-term', 1, 60, 1, 1, 1),
(103, 'Mid-term', 3, 10, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subjectId` int(11) NOT NULL,
  `difficulty` varchar(20) NOT NULL,
  `A` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `B` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `C` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `D` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `Answer` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subjectId` (`subjectId`),
  KEY `subjectId_2` (`subjectId`),
  KEY `subjectId_3` (`subjectId`),
  KEY `subjectId_4` (`subjectId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `content`, `subjectId`, `difficulty`, `A`, `B`, `C`, `D`, `Answer`) VALUES
(1, 'HTML la gi?', 5, 'easy', 'Ngon ngu lap trinh web', 'Ngon ngu css', 'Ngon ngu lap trinh he thong', 'kjdhkdfh', 'A'),
(2, 'Trong C++ 5/2 =', 4, 'medium', '2', '2.5', '3', '4', 'B'),
(3, 'Hãy xem xét đoạn mã sau:\r\nclass A  {\r\nint  a,b;\r\npublic:\r\nfloat F1,F2;\r\n};  \r\n\r\nclass B:\r\npublic A  {  ...  } \r\n\r\nHỏi: B sử dụng được các biến thành viên nào của A\r\n', 4, 'hard', 'F1, F2 ', 'a, b ', 'a,b,F1,F2 ', 'Không sử dụng được biến thành viên nào', 'A'),
(4, 'Phát biểu nào dưới đây là đúng:\r\n', 4, 'easy', 'Để chạy đc 1 chương trinhg java , đòi hỏi phải cài đặt đồng thời JDE và JDK ', 'Để chạy đc 1 chương trình java , chỉ có cách cài đặt JDK ', 'Chương trình java chạy ko cần cài đặt JDK ', 'không cần cài đặt gì cả', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`) VALUES
(1, 'School of Information Com'),
(2, 'School of Applied Mathema'),
(3, 'School of Chemical Engineering'),
(4, 'School of Economics and Management');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `departmentId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `departmentId` (`departmentId`),
  KEY `departmentId_2` (`departmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `departmentId`) VALUES
(1, 'Distributed System', 3),
(2, 'Introduction to Software Engineering', 3),
(3, 'Artificial Intelligence', 3),
(4, 'Object-Oriented Programming', 3),
(5, 'Web Programming', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `fullName` text NOT NULL,
  `birthday` date DEFAULT NULL,
  `major` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullName`, `birthday`, `major`) VALUES
(8, 'thuy', 'dcc74e4aaddc4271947b3c80bfc9e876ba51551d', 'Pham Thi Thu Thuy', '0000-00-00', 'CNTT'),
(9, 'tyler', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'Do Xuan Thai', '1992-01-15', 'ICT'),
(11, 'admin', '15ba7af5c5abd7ea58c1893ffa86bba91b596649', 'Pham Thi Thu Thuy', '1992-06-22', 'ICT'),
(12, 'thuthuy', 'dcc74e4aaddc4271947b3c80bfc9e876ba51551d', 'Thu Thuy Pham', '1992-06-22', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_exam`
--

CREATE TABLE IF NOT EXISTS `user_exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `examId` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `testDate` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`,`examId`),
  KEY `examId` (`examId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `school_fkey` FOREIGN KEY (`schoolId`) REFERENCES `school` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eqa`
--
ALTER TABLE `eqa`
  ADD CONSTRAINT `exam2_fkey` FOREIGN KEY (`examId`) REFERENCES `exam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question2_fkey` FOREIGN KEY (`questionId`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `sub_fkey` FOREIGN KEY (`subjectId`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `subject_fkey` FOREIGN KEY (`subjectId`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `departmen_fkey` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_exam`
--
ALTER TABLE `user_exam`
  ADD CONSTRAINT `exam_fkey` FOREIGN KEY (`examId`) REFERENCES `exam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fkey` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
