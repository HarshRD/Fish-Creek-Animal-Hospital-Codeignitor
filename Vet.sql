-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 03:08 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vet`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientid` int(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `name`, `address`, `phone`, `email`, `password`) VALUES
(1, 'John', 'Mansfield, TX', '1111111111', 'john@hotmail.com', 'd45ff7001fcec53a870b67474f912e29'),
(2, 'Leo', 'Oklahoma, OK', '2222222222', 'leo@yahoo.com', 'afdbf26642a60e0088af0d639db6efb7'),
(3, 'Ron', 'Grand Rapids, MI', '3333333333', 'ron@gmail.com', '0649261fe296fb9d9ec430866af11da3'),
(4, 'Taylor', 'Orlando, FL', '4444444444', 'taylor@outlook.com', 'c08b144dbedc71d861bb5950074ba2a2');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comments/questions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `comments/questions`) VALUES
('Robert', 'robert1212@gmail.com', 'Very quick service.'),
('Eddie', 'eddie2303@yahoo.in', 'Satisfactory medical services.'),
('Dwayne', 'd_johnson@outlook.com', 'Excellent emergency and surgical services.'),
('Chris', 'chris.4545@hotmail.com', 'Not satisfied with the overall service.');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `petid` int(15) NOT NULL,
  `petname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`petid`, `petname`) VALUES
(1, 'Juno'),
(2, 'Tango'),
(3, 'Cody'),
(4, 'Murphy');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionid` int(15) NOT NULL,
  `question` varchar(75) NOT NULL,
  `answer` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionid`, `question`, `answer`) VALUES
(1, 'My dog loves to eat chocolates. Is it ok for the dog to eat chocolate?', 'Chocolate is toxic to dogs. Please do not feed you dog chocolate. '),
(2, 'Our rabbit, Juno is not playing from quite a few days. Please Help!', 'Feed Juno, his favorite food, take him to a place which he finds secure.'),
(3, 'My cat, Murphy is down with fever. What should I do?', 'Take Murphy for a walk and keep active. Visit us if conditions worsen.'),
(4, 'My parrot talks a lot. How to keep the parrot quite?', 'Place a piece of whole red chilly in parrots mouth to keep him quite.');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceid` int(15) NOT NULL,
  `servicename` varchar(30) NOT NULL,
  `description` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceid`, `servicename`, `description`) VALUES
(1, 'Medical Services', 'We offer state-of-the-art equipment and technology.'),
(2, 'Surgical Services', 'Full range of orthopedics and emergency surgeries.'),
(3, 'Dental Care', 'Preventive care such as scaling and polishing.'),
(4, 'House Calls', 'Elderly, physically challenged find helpful and convenient.'),
(5, 'Emergencies', 'At least one of our doctors is on call every day and night.');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `clientid` int(15) NOT NULL,
  `serviceid` int(15) NOT NULL,
  `petid` int(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`clientid`, `serviceid`, `petid`, `date`) VALUES
(1, 2, 2, '2017-11-15'),
(2, 3, 3, '2017-11-13'),
(3, 1, 4, '2017-11-11'),
(4, 4, 1, '2017-11-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`petid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD KEY `petid` (`petid`),
  ADD KEY `serviceid` (`serviceid`),
  ADD KEY `clientid` (`clientid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `petid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`serviceid`) REFERENCES `service` (`serviceid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscription_ibfk_3` FOREIGN KEY (`petid`) REFERENCES `pet` (`petid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
