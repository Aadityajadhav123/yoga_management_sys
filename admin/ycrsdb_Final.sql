-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2023 at 02:22 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ycrsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 9313124092, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2024-03-02 00:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `ID` int NOT NULL,
  `ClassID` int DEFAULT NULL,
  `BookingNumber` int DEFAULT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Address` mediumtext,
  `BookingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Remark` mediumtext,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`ID`, `ClassID`, `BookingNumber`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `Address`, `BookingDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(4, 3, 439347479, 'Rajput', 'Kiran', 'kiran10@gmail.com', 9313124092, 'Pandesara', '2023-02-23 12:44:49', 'Nice', 'Approved', '2024-03-03 12:15:24'),
(5, 5, 574005856, 'sharma', 'Priya', 'priya23@gmail.com', 7896541230, 'Parvat patiya', '2022-03-09 12:56:24', 'Check the msg...', 'Cancelled', '2022-03-09 13:15:14'),
(6, 1, 422230604, 'john', 'ibraham', 'john23@gmail.com', 1456329702, 'pandesara', '2022-03-10 12:08:20', 'good', 'Approved', '2022-03-10 12:09:24'),
(7, 1, 833740061, 'Riya', 'Singh', 'riya67@gmail.com', 9874563210, 'Nanpura', '2022-03-13 05:06:48', 'join classes', 'Approved', '2022-03-13 05:08:40'),
(8, 1, 447140158, 'mohan', 'nawale', 'mnawale34@gmai;.com', 9737007448, 'VOIUGOERIHGOR', '2022-03-21 09:03:54', 'hi', 'Approved', '2022-03-21 09:04:52'),
(9, 6, 205911094, 'Mona', 'IIHT', 'mona@gmail.com', 9874563210, 'Surat', '2022-03-23 13:05:30', 'selected', 'Approved', '2023-01-02 11:48:16'),
(10, 9, 928682357, 'Mansi', 'Patel', 'mansi23@yahoo.com', 5638971425, 'Surat', '2022-03-23 13:12:39', 'Batch will start from 1st April 2022', 'Approved', '2022-03-23 13:14:24'),
(11, 6, 396475398, 'Vaishnavi', 'Rauth', 'VaishnaviR@gmail.com', 7016821582, 'Handi dhoya sheri, Haripura, Surat-395003', '2022-09-27 13:03:34', 'Yor Are not selected. Sorry', 'Cancelled', '2023-01-02 12:02:34'),
(12, 12, 210837750, 'Akash', 'Rajput', 'Akash.21@gmail.com', 8529637890, 'Rampura, Surat', '2022-09-27 13:04:50', 'Your class is approved', 'Approved', '2023-03-24 14:00:40'),
(13, 8, 708683463, 'Mugdha', 'Oberoy', 'Mugdha.O21@gmail.com', 1597536248, 'Ranitalav, Khatkiwad, Surat-395003', '2022-09-27 13:06:27', 'you are selected. Please take visit', 'Approved', '2023-01-02 11:49:39'),
(14, 4, 904532526, 'Hozefa', 'IIHT', 'hozefa@gmail.com', 1223456789, 'Surat', '2023-01-04 13:26:09', 'Approved the class', 'Approved', '2023-01-04 13:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `ID` int NOT NULL,
  `TypeofClasses` varchar(50) DEFAULT NULL,
  `YogaImages` varchar(100) DEFAULT NULL,
  `DaysTime` varchar(120) DEFAULT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `YogaTrainer` varchar(200) DEFAULT NULL,
  `TrainerContactnumber` bigint DEFAULT NULL,
  `ProfilePics` varchar(200) DEFAULT NULL,
  `Fees` decimal(10,2) NOT NULL,
  `ClassDuration` varchar(200) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`ID`, `TypeofClasses`, `YogaImages`, `DaysTime`, `Description`, `YogaTrainer`, `TrainerContactnumber`, `ProfilePics`, `Fees`, `ClassDuration`, `CreationDate`) VALUES
(1, 'Artist Yoga', '973042c8a1eab4a2e1053210247206011589977683.jpg', 'Saturday Morning: 10:00 to 11:30 evening: 5:30 to 7:00', 'Artistic yoga is a style of modern yoga which includes performing yoga asanas in a dancing style. It is a series of movements which include asanas to stretch and strengthen your body and keep it fit and rejuvenated. Artistic yoga postures can also be practiced for those who aim to lose weight.', 'Mega Arora', 7016821355, '53f558474e2e534a76f780c48954a3651673003614.jpg', '500.00', '45 days', '2020-05-20 01:13:15'),
(3, 'Traditional Hatha', '9b5fe4cceefcda8595b93b5da42158ff1672989734.png', 'Monday Morning: 10:00 to 11:30 evening: 5:30 to 7:00', 'Hatha Yoga tradition emphasizes on the Kriya – Asana combination as the first step supported by the sattvic food. Kriya doesnt necessarily mean only Shat Kriyas (six purification techniques). But every purification technique which removes the toxins from body-mind.', 'Rahul Thakre', 9798779798, '78a14f59bf170d4c47eb974760e375171673003658.jpg', '2000.00', '30 days', '2020-05-20 08:28:30'),
(4, 'Yoga Therapy', 'b9fb9d37bdf15a699bc071ce49baea531589983324.jpg', 'Tuesday Morning: 10:00 to 11:30 evening: 5:30 to 7:00', 'Yoga is a group of physical, mental, and spiritual practices or disciplines which originated in ancient India. Yoga is one of the six Āstika schools of Hindu philosophical traditions. There is a broad variety of yoga schools, practices, and goals in Hinduism, Buddhism, and Jainism\r\n', 'Priti', 4798715197, '6cb8a58c51b91696dc8e97777881eff31590238100.jpg', '1900.00', '45 days', '2020-05-20 08:32:04'),
(5, 'Yoga Balance', '1e6ae4ada992769567b71815f124fac51589983706.jpg', 'Saturday\r\nMorning: 10:00 to 11:30\r\nevening: 5:30 to 7:00', '<span style=\"color: rgb(126, 132, 140); font-family: Montserrat, -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen,=\"\" ubuntu,=\"\" cantarell,=\"\" \"fira=\"\" sans\",=\"\" \"droid=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" letter-spacing:=\"\" 0.5px;\"=\"\">Connecting to our base and stabilizer muscles, acknowledging our current capability, and harnessing drishti and breath are useful touch points in any balance pose or practice. But there’s more to improving balance than that. Balance is a learned skill: If we challenge our balance, it improves; if we don’t, it tends to atrophy, as commonly happens as we age. Beyond that, though, the challenges we offer our balance need to mirror those we encounter in life; stability in the varied conditions of real life requires more than what’s offered by the single-legged standing poses in yoga.</span><br>', 'Abishek Sharma', 4654646546, 'fccf17286f638ef0b94a5cb89369ceda1589983706.jpg', '5000.00', '2 Month', '2020-05-20 08:38:26'),
(6, 'Vinyasa yoga', '9e1d2bf60d8e6c6eea8784a1aaa3ec551589983971.jpg', 'Wednesday Morning: 10:00 to 11:30\r\nevening: 5:30 to 7:00', '<div class=\"g\" style=\"line-height: 1.2; width: 600px; font-family: arial, sans-serif; font-size: 14px; margin-top: 0px; margin-bottom: 28px; color: rgb(34, 34, 34);\"><div class=\"rc\" data-hveid=\"CAIQAA\" data-ved=\"2ahUKEwiF1P_9zsLpAhUdyDgGHQntC18QFSgAMBZ6BAgCEAA\" style=\"position: relative;\"><div class=\"s\" style=\"max-width: 48em; color: rgb(77, 81, 86); line-height: 1.58;\"><span class=\"st\" style=\"line-height: 1.58; overflow-wrap: break-word;\"><span style=\"font-weight: bold; color: rgb(95, 99, 104);\">Vinyasa</span>&nbsp;is a style of&nbsp;<span style=\"font-weight: bold; color: rgb(95, 99, 104);\">yoga</span>&nbsp;characterized by stringing postures together so that you move from one to another, seamlessly, using breath. Commonly referred to as “<span style=\"font-weight: bold; color: rgb(95, 99, 104);\">flow</span>”&nbsp;<span style=\"font-weight: bold; color: rgb(95, 99, 104);\">yoga</span>, it is sometimes confused with “power&nbsp;<span style=\"font-weight: bold; color: rgb(95, 99, 104);\">yoga</span>“.&nbsp;<span style=\"font-weight: bold; color: rgb(95, 99, 104);\">Vinyasa</span>&nbsp;classes offer a variety of postures and no two classes are ever alike.</span></div><div><span class=\"st\" style=\"line-height: 1.58; overflow-wrap: break-word;\"><br></span></div><div data-base-uri=\"/search?bih=608&amp;biw=1366&amp;rlz=1C1CHBF_enIN852IN868&amp;hl=en&amp;sxsrf=ALeKk00b7Bt4LQXbw3ilr2UZ2sYflMHq1g:1589983735448\" id=\"ed_6\" data-ved=\"2ahUKEwiF1P_9zsLpAhUdyDgGHQntC18Q2Z0BMBZ6BAgCEAk\"></div></div></div><span id=\"fld\" style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: medium;\"></span><div class=\"g\" style=\"line-height: 1.2; width: 600px; font-family: arial, sans-serif; font-size: 14px; margin-top: 0px; margin-bottom: 28px; color: rgb(34, 34, 34);\"><div class=\"rc\" data-hveid=\"CAMQAA\" data-ved=\"2ahUKEwiF1P_9zsLpAhUdyDgGHQntC18QFSgAMBd6BAgDEAA\" style=\"position: relative;\"></div></div>', 'Neha', 4464654646, '9ee1aa95fb51b1adbccbe8b41641f60d1589983971.jpg', '2000.00', '30 days', '2020-05-20 08:42:51'),
(7, 'Iyengar yoga', 'b6eab038083a0a7d2e813c5cd03bea121589984279.jpg', 'Saturday\r\nMorning: 10:00 to 11:30\r\nevening: 5:30 to 7:00', '<span style=\"color: rgb(84, 83, 83); font-family: museo-sans-rounded, Helvetica, Arial, sans-serif; background-color: rgb(241, 241, 241);\">Iyengar Yoga is a purist style of yoga developed by and named after B.K.S Iyengar in the 1960s. Iyengar Yoga is a very meticulous style of yoga, placing the emphasis on precision and alignment. The practice is all about the details of your breath control (pranayama) and posture (asana) and is excellent for building strength and flexibility. Iyengar yoga is great for learning the subtleties of correct alignment for all ages and abilities.</span><br>', 'Abishek Sharma', 4798779778, '0bb4348cc97d44c2a10e98927ab8b9111589984279.jpg', '6000.00', '3 Month', '2020-05-20 08:47:59'),
(8, 'Kundalini yoga', 'e3e4764bda0c9c8ca79586c48528ea841589984828.jpg', 'Saturday\r\nMorning: 10:00 to 11:30\r\nevening: 5:30 to 7:00', '<span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">Kundalini yoga derives from kundalini, defined in Hindu lore as energy that lies dormant at the base of the spine until it is activated and channeled upward through the chakras in the process of spiritual perfection. Kundalini is believed to be power associated with the divine feminine.</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;</span><br>', 'Rahul Thakre', 4798767979, 'f532ea1db461167b378d308244fadd1d1673003789.jpg', '8000.00', '3 Month', '2020-05-20 08:57:08'),
(9, 'Ashtanga yoga', '880abea4685a56e6904221224dfca56c1590039098.jpg', 'Saturday\r\nMorning: 10:00 to 11:30\r\nevening: 5:30 to 7:00', '<span style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; font-weight: 700; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(70, 70, 70);\"><em style=\"box-sizing: inherit; font-family: inherit; font-weight: inherit; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word;\">Ashtanga yoga</em></span><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">&nbsp;is a system of yoga recorded by the sage Vamana Rishi in the&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">Yoga Korunta</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">, an ancient manuscript “said to contain lists of many different groupings of&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">asanas</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">, as well as highly original teachings on&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">vinyasa, drishti, bandhas, mudras,</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">&nbsp;and philosophy” (Jois 2002 xv). Ashtanga Yoga India, The text of the&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">Yoga Korunta&nbsp;</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">“was imparted to Sri T. Krishnamacharya in the early 1900s by his Guru Rama Mohan Brahmachari, and was later passed down to Pattabhi Jois during the duration of his studies with Krishnamacharya, beginning in 1927” (“</span><a href=\"https://en.wikipedia.org/wiki/Ashtanga_Yoga\" style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; background: 0px 0px rgb(255, 255, 255); transition: all 0.3s ease 0s; color: rgb(234, 131, 28);\">Ashtanga Yoga</a><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">”). Since 1948, Pattabhi Jois has been teaching&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">Ashtanga yoga</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">&nbsp;from his yoga&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">shala</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">, the Ashtanga Yoga Research Institute (Jois 2002 xvi), according to the sacred tradition of&nbsp;</span><em style=\"box-sizing: inherit; font-family: Montserrat, sans-serif; font-size: 14px; line-height: inherit; border: 0px; outline: 0px; -webkit-font-smoothing: antialiased; overflow-wrap: break-word; color: rgb(0, 0, 0);\">Guru Parampara</em><span style=\"color: rgb(0, 0, 0); font-family: Montserrat, sans-serif; font-size: 14px;\">&nbsp;[disciplic succession] (Jois 2003 12).</span><br>', 'Sailesh Sharma', 2446797997, '5dc5e954379e919d8b477529ed0d91091590039098.jpg', '300.00', '1 Week', '2020-05-21 00:01:38'),
(10, 'Bikram yoga', 'c725dd989d6e1d214da7f0086cd0e4501590039489.jpg', 'Saturday\r\nMorning: 10:00 to 11:30\r\nevening: 5:30 to 7:00', '<span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px;\">Bikram Yoga</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;is a proprietary system of&nbsp;</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px;\">hot yoga</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;as exercise devised by&nbsp;</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif; font-size: 14px;\">Bikram</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;Choudhury; it became popular in the early 1970s. Classes consist of a fixed sequence of 26 postures, practised in a room heated to 105 °F (41 °C) with a humidity of 40%, intended to replicate the climate of India.</span><br>', 'Jyotasana Shah', 9764796987, '926ca489c6489f810c53a241fcb384e41590039489.jpg', '2000.00', '4 Week', '2020-05-21 00:08:09'),
(11, 'Yin yoga', '21953706c9470cca90b8985cb6ca5d201590039845.jpg', 'Saturday\r\nMorning: 10:00 to 11:30\r\nevening: 5:30 to 7:00', '<span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">Yin Yoga is a slow-paced style of yoga as exercise, incorporating principles of traditional Chinese medicine, with asanas that are held for longer periods of time than in other styles</span><br>', 'Kailash ', 6573198798, '2d9eb548873cf8e37f52b96419e07db91590039845.jpg', '9000.00', '12 Weeks', '2020-05-21 00:14:05'),
(12, 'Restorative yoga', 'bb9a24ea88b0128c0d1b9d8c6e37939f1590046997.png', 'Saturday\r\nMorning: 10:00 to 11:30\r\nevening: 5:30 to 7:00', 'ytrydutyu', 'Mega Arora', 6546798789, '4b2c95a595db3fc52fec3847d9518ffa1673003595.jpg', '2200.00', '2 month', '2020-05-21 02:13:17'),
(13, 'Prenatal yoga', '6cb8a58c51b91696dc8e97777881eff31647696162.jpg', 'Saturday\r\nMorning: 10:00 to 11:30\r\nevening: 5:30 to 7:00', 'qwerty', 'Artist Yoga', 7726036618, 'e8de8f3ac5802a20f586d02907f0d0691647696162.jpg', '1000000.00', '10 year', '2022-03-19 13:22:42'),
(18, 'Aerial Yoga', '25aaf88389fd8174a283bb60d7c687d51669724559.jpg', 'Saturday\r\nMorning: 10:00 to 11:30\r\nevening: 5:30 to 7:00', '<span style=\"font-weight: 700; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\">Aerial</span><span style=\"color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\">&nbsp;yoga is a type of yoga which uses a hammock or yoga swing to allow students to perform postures that they may not ordinarily be able to attempt on the yoga mat.</span><br>', 'Priti', 7018863412, '9fbdebf6acc569e02799998a60d141a61669724559.jpg', '2500.00', '6 Months', '2022-11-29 12:22:39'),
(20, 'Balance Yoga', '9fbdebf6acc569e02799998a60d141a61670936635.jpg', 'Monday Morning 8:30 to 10:00', 'Define your body balance and mind&nbsp;', 'Geeta', 7018863412, '7da802cc9d1267c841a1095fffc43f5f1670936635.png', '1300.00', '90 Days', '2022-12-13 13:03:55'),
(21, 'Chair-based Yoga', '8dedb75b5ceaa4cacca174995b076b4b1672948688.jpg', 'Afternoon:<div>3:30 to 5:00<br><div><br></div></div>', '<span style=\"color: rgb(35, 31, 32); font-family: &quot;Tiempos Text&quot;, &quot;Tiempos Text Fallback&quot;, serif; font-size: 18px;\">While it’s not super common at studios or gyms, chair-based yoga is becoming increasingly popular at community centers&nbsp;</span><br>', 'Raghunath Swami', 7018863412, '88cc2cc77ece45d4abee48048a5f4bf41672989092.jpg', '2500.00', '90 minutes', '2023-01-03 12:43:01'),
(34, 'Jivamukti yoga', 'f61b46369da1d72cb0a96f8200240f5b1679666214.jpg', '<div>Monday to Friday</div><div><span style=\"font-size: 1rem;\">Noon : 12:30 to 200</span></div>', 'For better mind set', 'Shivam Patel', 9236549870, '176c108dfde4b1b88ae66b0fc313be601672986635.png', '1300.00', '6 Months', '2023-01-06 18:55:59'),
(35, 'Aditya Yoga Class', 'e78af50f250cbca2607f567d43c2881d1679666164.jpg', '<b><font color=\"#cc3300\">Morning 8:00 to 9:00AM</font></b>', 'This yoga is very useful for boys and employees', 'Rahul Thakre', 7016820350, '', '4500.00', '1.5 month', '2023-03-24 13:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Message` mediumtext,
  `EnquiryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsRead` int DEFAULT NULL,
  `ReadDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Message`, `EnquiryDate`, `IsRead`, `ReadDate`) VALUES
(6, 'Priti', 'Pandy', 1234566789, 'priti@yahoo.com', 'Hi...', '2022-03-09 13:02:07', 1, '2022-03-09 13:14:20'),
(7, 'Shivam', 'Randeri', 9825659557, 'shivam@gmail.com', 'I want to join bikram yoga classes', '2022-09-23 12:20:49', 1, '2022-09-23 12:24:38'),
(8, 'Shahid', 'maaruth', 9875641320, 'shahid@gmail.com', 'Want to ', '2022-09-23 12:26:41', 1, '2022-09-23 13:03:32'),
(9, 'Vreesha', 'Mathur', 8529637419, 'Vreesham@gmail.com', 'Want to Discuss about yoga class', '2022-09-23 13:07:31', 1, '2023-01-02 10:46:26'),
(10, 'Veeha', 'pinal', 1234567889, 'abc@gmail.com', 'Inquiry for Yoga and Gym Classes', '2023-02-28 06:36:24', 1, '2023-03-24 14:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `ID` int NOT NULL,
  `FullName` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Remark` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`ID`, `FullName`, `Email`, `Remark`) VALUES
(1, 'neha', 'neha@gmail.com', 'hello'),
(2, 'Mugdha Oberoy', 'Mugdha.O21@gmail.com', 'like your web site');

-- --------------------------------------------------------

--
-- Table structure for table `tblnclass`
--

CREATE TABLE `tblnclass` (
  `id` int NOT NULL,
  `Class_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblnclass`
--

INSERT INTO `tblnclass` (`id`, `Class_name`) VALUES
(2, 'Balance Yoga'),
(3, 'Power Yoga'),
(4, 'Hatha Yoga'),
(5, 'Artist Yoga'),
(6, 'Traditional Hatha'),
(7, 'Yoga Therapy'),
(8, 'Yoga Balance'),
(9, 'Vinyasa yoga'),
(10, 'Iyengar yoga'),
(11, 'Kundalini yoga'),
(12, 'Ashtanga yoga'),
(14, 'Bikram yoga'),
(15, 'Yin yoga'),
(16, 'Restorative yoga'),
(17, 'Prenatal yoga'),
(18, 'Anusara yoga'),
(19, 'Jivamukti yoga'),
(24, 'Aerial Yoga'),
(25, 'Chair-based Yoga'),
(28, 'Aditya Yoga Class');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `OpenningTime` varchar(200) NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `OpenningTime`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<ul style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.313em; margin-left: 1.655em; color: rgb(0, 0, 0); font-family: \" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" center;=\"\" background-color:=\"\" rgb(255,=\"\" 246,=\"\" 246);\"=\"\"><li style=\"text-align: left; \">Yoga is suitable for everybody regardless of their age, fitness, religion, gender or belief system.</li><li style=\"text-align: left; \">Yoga heals physical, emotional and psychological needs to maintain good health.</li><li style=\"text-align: left; \">Yoga&nbsp; is a path to cope with stresses of life as it is very objective intelligent compared to all other cross-training.</li><li style=\"text-align: left; \">It is an ultimate mind body experience, the practitioner will develop a noticeable improvement in their practice with greater flexibility, balance and coordination.</li><li style=\"text-align: left; \">Yoga cleanses and purifies the body of all toxins. You feel very relaxed, happy and connect with the inner self, which improves your relationships, career and lifestyle.</li><li style=\"text-align: left; \">We focus on proper form and alignment, so you get the most out your workout. We customize your unique fitness class. The secret of our success is the daily routine practice.</li><li style=\"text-align: left;\">Our mission is to inspire and motivate every woman and man to practice wellness in life.</li></ul>', NULL, NULL, '', '2020-05-20 01:51:52'),
(2, 'contactus', 'Contact Us', 'D-204, Hole Town South West,Delhi-110096,India', 'info@gmail.com', 4654645646, 'Mon - Sat: 6:30am - 07:45pm', '2020-05-20 01:54:07'),
(3, 'feedback', 'Share your feedback', 'Feel free to share your feedback ', 'fivefitnees@gmail.com', 9886574254, 'Mon - Sat: 6:30am - 07:45pm', '2022-03-11 17:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribe`
--

CREATE TABLE `tblsubscribe` (
  `ID` int NOT NULL,
  `Email_id` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubscribe`
--

INSERT INTO `tblsubscribe` (`ID`, `Email_id`) VALUES
(2, 'priti8@gmail.com'),
(3, 'priya45@gmail.com'),
(6, 'Mugdha.O21@gmail.com'),
(7, 'rahul.T@gmail.com'),
(8, 'Anish@gmail.com'),
(9, 'Shivam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbltrainer`
--

CREATE TABLE `tbltrainer` (
  `ID` int NOT NULL,
  `Tname` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `Timages` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `Taddr` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `Tcity` varchar(25) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `Tcontact` bigint NOT NULL,
  `Temail` varchar(25) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `Teducation` varchar(200) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `Texpr` varchar(200) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltrainer`
--

INSERT INTO `tbltrainer` (`ID`, `Tname`, `Timages`, `Taddr`, `Tcity`, `Tcontact`, `Temail`, `Teducation`, `Texpr`) VALUES
(1, 'Neha', 'JosephArmstrong.jpg', 'Pandesara', 'Hazira', 1965472310, 'neha34@gmail.com', 'B.sc', '2years'),
(2, 'Geeta', '113716-281x425-Learnhowtobalanceononeleginyoga.jpg', 'RingRoad', 'Surat', 2063489714, 'geeta567@gmai.com', 'BA', '5years'),
(3, 'Priti', '176c108dfde4b1b88ae66b0fc313be601672989554.png', 'Surat', 'Surat', 9234567899, 'priti@gmail.com', 'Diploma in Yoga', '1'),
(9, 'Abishek Sharma', 'a979e31bc5464490c8e9dc5838ab1e5e1669395126.jpg', 'Haripura', 'Surat', 7018863412, 'abishek@gmail.com', 'Bachelor of Arts in yoga ', '2 Years'),
(10, 'Mega Arora', 'eca95f4974eefc83eff19d9350dd55091669395399.jpg', 'Adajan', 'Surat', 7015823359, 'mega@gmail.com', 'Bachelor of Arts in yoga ', '3+ years'),
(11, 'Rahul Thakre', '6f6089a1227610354076e48e16f49f771670847319.jpg', 'New City Light Road', 'Surat', 7016820350, 'rahul.yoga@gmail.com', 'Bachelor of Arts in yoga ', '2+ Years'),
(12, 'Raghunath Swami', '420dd4dc44af80427540582fa3d2dc3b1671023859.jpg', 'Pal,Hazira', 'Surat', 9825659775, 'Raghu.yoga@gmail.com', 'Diploma in Yoga', '10 years+'),
(15, 'Shivam Patel', '176c108dfde4b1b88ae66b0fc313be601672986635.png', 'Rander Road', 'Surat', 9236549870, 'Shivam@gmail.com', 'Bachelor of Arts in yoga ', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `F.K` (`ClassID`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnclass`
--
ALTER TABLE `tblnclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubscribe`
--
ALTER TABLE `tblsubscribe`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltrainer`
--
ALTER TABLE `tbltrainer`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblnclass`
--
ALTER TABLE `tblnclass`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsubscribe`
--
ALTER TABLE `tblsubscribe`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbltrainer`
--
ALTER TABLE `tbltrainer`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD CONSTRAINT `F.K` FOREIGN KEY (`ClassID`) REFERENCES `tblclasses` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
