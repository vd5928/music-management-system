-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 09:09 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicdb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc1` (IN `pid` INT(10))  SELECT P.*,S.songName,SI.singerName,M.movieName,S.language,S.genre FROM playlist P,songs S,singers SI,movies M WHERE playlistID=pid AND S.songId=P.songID AND S.movieID=M.movieID AND S.singerID=SI.singerID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `country` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `userType` varchar(30) NOT NULL,
  `subscriptionPeriod` int(10) DEFAULT NULL,
  `subscriptionCost` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Fname`, `Lname`, `email`, `password`, `DOB`, `country`, `gender`, `userType`, `subscriptionPeriod`, `subscriptionCost`) VALUES
('Prashanth', 'Raju', 'admin@gmail.com', 'admin123', '1999-09-12', 'India', 'Male', 'admin', NULL, NULL),
('Prasad', 'Swamy', 'prasad@gmail.com', 'prasad123', '2019-11-24', 'USA', 'Male', 'user', 1, 100),
('Raveesh', 'M K', 'raveesh@gmail.com', 'raveesh123', '2000-06-19', 'UK', 'Male', 'user', 6, 500),
('Preetham', 'M S', 'preetham@gmail.com', 'preetham123', '1999-06-29', 'India', 'Male', 'user', 12, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieName` varchar(30) NOT NULL,
  `movieID` int(30) NOT NULL,
  `director` varchar(30) NOT NULL,
  `actor` varchar(30) NOT NULL,
  `actress` varchar(30) NOT NULL,
  `language` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieName`, `movieID`, `director`, `actor`, `actress`, `language`) VALUES
('3Idiots', 1001, 'Raj', 'Aamir', 'Kareena', 'Hindi'),
('Dhoom3', 1002, 'Khan', 'Hrithik', 'Katrina', 'Hindi'),
('KGF', 1003, 'Neel', 'Yash', 'Radhika', 'Kannada');

--
-- Triggers `movies`
--
DELIMITER $$
CREATE TRIGGER `langChange` AFTER UPDATE ON `movies` FOR EACH ROW BEGIN
UPDATE songs
SET language=(SELECT language FROM movies m WHERE m.movieID=songs.movieID);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `playlistName` varchar(30) NOT NULL,
  `playlistID` int(30) NOT NULL,
  `songID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`playlistName`, `playlistID`, `songID`) VALUES
('Favourite', 82, 103),
('Favourite', 82, 108),
('Favourite', 82, 114),
('Favourite', 82, 109),
('Old', 90, 113),
('Old', 90, 105),
('Favourite', 82, 110);

-- --------------------------------------------------------

--
-- Table structure for table `singers`
--

CREATE TABLE `singers` (
  `singerName` varchar(30) NOT NULL,
  `singerID` int(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `singers`
--

INSERT INTO `singers` (`singerName`, `singerID`, `country`, `DOB`, `Gender`) VALUES
('Ram', 501, 'India', '1985-05-08', 'Male'),
('Anil', 502, 'USA', '1995-06-12', 'Male'),
('Priya', 503, 'UK', '1992-02-20', 'Female'),
('Murali', 504, 'India', '1970-05-12', 'Male'),
('Shriya', 505, 'UK', '1994-05-25', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `songID` int(30) NOT NULL,
  `songName` varchar(30) NOT NULL,
  `singerID` int(30) NOT NULL,
  `movieID` int(30) NOT NULL,
  `lyricist` varchar(30) NOT NULL,
  `musicProducer` varchar(30) NOT NULL,
  `musicDistributer` varchar(30) NOT NULL,
  `language` varchar(30) NOT NULL,
  `genre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`songID`, `songName`, `singerID`, `movieID`, `lyricist`, `musicProducer`, `musicDistributer`, `language`, `genre`) VALUES
(101, 'Malang', 501, 1001, 'Pritam', 'Aditya Chopra', 'YRF Music', 'Hindi', 'Pop'),
(102, 'Kamli', 502, 1001, 'Pritam', 'Aditya Chopra', 'YRF Music', 'Hindi', 'Pop'),
(103, 'Tu Hi Junoon', 504, 1001, 'Pritam', 'Aditya Chopra', 'YRF Music', 'Hindi', 'Classical'),
(104, 'Dhoom Machale Dhoom', 503, 1001, 'Pritam', 'Aditya Chopra', 'YRF Music', 'Hindi', 'Jazz'),
(105, 'Bande Hain Hum Uske', 505, 1001, 'Pritam', 'Aditya Chopra', 'YRF Music', 'Hindi', 'Classical'),
(106, 'Aal Izz Well', 502, 1002, 'Sonu Nigam', 'Shantanu Moitra', 'T-Series', 'Hindi', 'EDM'),
(107, 'Zoobi Doobi', 501, 1002, 'Sonu Nigam', 'Shantanu Moitra', 'T-Series', 'Hindi', 'Electronic'),
(108, 'Behti Hawa Sa Tha Woh', 504, 1002, ' Naresh Iyer', 'Shantanu Moitra', 'T-Series', 'Hindi', 'Classical'),
(109, 'Give Me Some Sunshine', 504, 1002, ' Naresh Iyer', 'Shantanu Moitra', 'T-Series', 'Hindi', 'Hip Hop'),
(110, 'Jaane Nahin Denge Tujhe', 502, 1002, ' Naresh Iyer', 'Shantanu Moitra', 'T-Series', 'Hindi', 'Pop'),
(111, 'Salaam Rocky Bhai', 505, 1003, 'Dr. V. Nagendra Prasad', 'Ravi Basrur', 'Lahari Music', 'Kannada', 'Jazz'),
(112, 'Garbadhi', 501, 1003, 'Kinnal Raj', 'Ravi Basrur', 'Lahari Music', 'Kannada', 'Rock and Roll'),
(113, 'Sidila Barava', 501, 1003, 'Ravi Basrur', 'Ravi Basrur', 'Lahari Music', 'Kannada', 'Electronic'),
(114, 'Dheera Dheera', 502, 1003, 'Jayagopal', 'Ravi Basrur', 'Lahari Music', 'Kannada', 'Classical');

-- --------------------------------------------------------

--
-- Table structure for table `trending`
--

CREATE TABLE `trending` (
  `slno` int(30) NOT NULL,
  `songID` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trending`
--

INSERT INTO `trending` (`slno`, `songID`) VALUES
(3, 101),
(4, 102),
(1, 103),
(9, 104),
(7, 105),
(2, 108),
(8, 109),
(6, 110),
(10, 111),
(5, 114);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieID`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD KEY `fkey3` (`songID`);

--
-- Indexes for table `singers`
--
ALTER TABLE `singers`
  ADD PRIMARY KEY (`singerID`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`songID`),
  ADD KEY `fkey1` (`singerID`),
  ADD KEY `fkey2` (`movieID`);

--
-- Indexes for table `trending`
--
ALTER TABLE `trending`
  ADD UNIQUE KEY `slno` (`slno`),
  ADD UNIQUE KEY `songID` (`songID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `fkey3` FOREIGN KEY (`songID`) REFERENCES `songs` (`songID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `fkey1` FOREIGN KEY (`singerID`) REFERENCES `singers` (`singerID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkey2` FOREIGN KEY (`movieID`) REFERENCES `movies` (`movieID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `trending`
--
ALTER TABLE `trending`
  ADD CONSTRAINT `fkey4` FOREIGN KEY (`songID`) REFERENCES `songs` (`songID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
