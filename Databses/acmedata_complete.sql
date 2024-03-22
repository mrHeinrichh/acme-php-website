-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 05:37 PM
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
-- Database: `acmedata`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `consultID` int(11) NOT NULL,
  `ownername` longtext NOT NULL,
  `email` longtext NOT NULL,
  `contact` longtext NOT NULL,
  `petname` longtext NOT NULL,
  `gender` longtext NOT NULL,
  `conditionz` longtext NOT NULL,
  `consult_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`consultID`, `ownername`, `email`, `contact`, `petname`, `gender`, `conditionz`, `consult_date`, `comment`) VALUES
(14, 'jordan catapang', 'Heinrich@icysocial.com', '0956974993', 'Evening', 'female', 'Sick and vomiting', '0000-00-00 00:00:00', 'give medcine 3x a day'),
(15, 'heinrich', 'heinrichsorbaf02@gmail.com', '09569749935', 'kimm', 'male', 'Sick and vomiting', '0000-00-00 00:00:00', 'give medcine 3x a day'),
(16, '', '', '', '', '', 'malala', '2022-01-03 18:39:30', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custid` int(255) NOT NULL,
  `name` longtext NOT NULL,
  `contact` longtext NOT NULL,
  `email` longtext NOT NULL,
  `ProfilePic` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custid`, `name`, `contact`, `email`, `ProfilePic`) VALUES
(5, 'Gabriel Mendoza', '0956974993', 'heinrichsorbaf02@gmail.com', 0x6434316438636439386630306232303465393830303939386563663834323765313634313130343134332e6a7067),
(6, 'Richard Marino', '09569749935', 'cathlynmendez24@gmail.com', 0x6434316438636439386630306232303465393830303939386563663834323765313634313130373333352e6a7067),
(7, '', '09454543453', 'cathlynmendez24@gmail.com', 0x6434316438636439386630306232303465393830303939386563663834323765313634313130383235312e6a7067),
(8, '123', '123', 'Heinrich@icysocial.com', 0x6434316438636439386630306232303465393830303939386563663834323765313634313130383330362e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `c_audit`
--

CREATE TABLE `c_audit` (
  `HCID` int(11) NOT NULL,
  `petID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `conditionz` varchar(225) NOT NULL,
  `note` varchar(225) NOT NULL,
  `c_date` date NOT NULL,
  `a_action` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `c_audit`
--

INSERT INTO `c_audit` (`HCID`, `petID`, `ID`, `conditionz`, `note`, `c_date`, `a_action`) VALUES
(1, 94, 27, 'asda', 'asda', '2022-01-05', 'update'),
(1, 85, 27, 'asda', 'asda', '2022-01-05', 'update'),
(2, 85, 27, 'bbb', 'bbb', '2022-01-04', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `haircut`
--

CREATE TABLE `haircut` (
  `cutid` int(11) NOT NULL,
  `groomtype` longtext NOT NULL,
  `ProfilePic` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hconsultation`
--

CREATE TABLE `hconsultation` (
  `HCID` int(11) NOT NULL,
  `petID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `conditionz` varchar(225) NOT NULL,
  `note` varchar(225) DEFAULT NULL,
  `hc_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hconsultation`
--

INSERT INTO `hconsultation` (`HCID`, `petID`, `ID`, `conditionz`, `note`, `hc_date`) VALUES
(1, 76, 27, 'asda', 'asda', '2022-01-05');

--
-- Triggers `hconsultation`
--
DELIMITER $$
CREATE TRIGGER `before_item_delete` BEFORE DELETE ON `hconsultation` FOR EACH ROW BEGIN
INSERT INTO c_audit (HCID,petID,ID,conditionz,c_date,note,a_action)
values ( OLD.HCID, OLD.petID, OLD.ID,OLD.conditionz,OLD.hc_date,OLD.note,'delete');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_item_update` BEFORE UPDATE ON `hconsultation` FOR EACH ROW BEGIN
INSERT INTO c_audit (HCID,petID,ID,conditionz,c_date,note,a_action)
values ( OLD.HCID, OLD.petID, OLD.ID,OLD.conditionz,OLD.hc_date,OLD.note,'update');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `petID` int(11) NOT NULL,
  `nickname` longtext NOT NULL,
  `gender` longtext NOT NULL,
  `breed` longtext NOT NULL,
  `custid` int(11) DEFAULT NULL,
  `ProfilePic` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`petID`, `nickname`, `gender`, `breed`, `custid`, `ProfilePic`) VALUES
(76, 'kimmy', 'female', 'shitzu', 5, 0x3738613664303139363738366561623566656561386233323039346363653665313634313131323835342e6a7067),
(85, 'kimmy1', 'female', 'shitzu', 7, 0x3738613664303139363738366561623566656561386233323039346363653665313634313131343733312e6a7067),
(93, 'kimmy2', 'female', 'shitzu', 5, 0x3738613664303139363738366561623566656561386233323039346363653665313634313131393039352e6a7067),
(94, 'kimmy', 'female', 'shitzu', 6, 0x3738613664303139363738366561623566656561386233323039346363653665313634313131393133342e6a7067),
(95, 'kimmy3', 'female', 'shitzu', 5, 0x3738613664303139363738366561623566656561386233323039346363653665313634313133303131342e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `petgrooming`
--

CREATE TABLE `petgrooming` (
  `serviceID` int(11) NOT NULL,
  `groomingtype` longtext NOT NULL,
  `costs` double(11,2) NOT NULL,
  `ProfilePic` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petgrooming`
--

INSERT INTO `petgrooming` (`serviceID`, `groomingtype`, `costs`, `ProfilePic`) VALUES
(8, 'kalbo', 9999.00, 0x6434316438636439386630306232303465393830303939386563663834323765313634313138323537342e6a7067),
(9, 'mohawks', 12.00, 0x6434316438636439386630306232303465393830303939386563663834323765313634313339333134312e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `username` longtext NOT NULL,
  `password` longtext NOT NULL,
  `Address` mediumtext DEFAULT NULL,
  `ProfilePic` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `username`, `password`, `Address`, `ProfilePic`, `CreationDate`) VALUES
(27, 'Heinrich', 'Fabros', 956974993, 'Heinrich@icysocial.com', 'heinrich123', 'password', '#73 TUP COMPOUND WESTERN BICUTAN', 'd41d8cd98f00b204e9800998ecf8427e1641104113.jpg', '2022-01-02 06:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `TID` int(11) NOT NULL,
  `custid` int(11) NOT NULL,
  `petID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `tdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`TID`, `custid`, `petID`, `serviceID`, `ID`, `tdate`) VALUES
(1, 6, 94, 9, 27, '2022-01-04'),
(3, 5, 76, 8, 27, '2022-01-05'),
(4, 5, 93, 8, 27, '2022-01-06'),
(5, 5, 93, 8, 27, '2022-01-06'),
(6, 5, 93, 8, 27, '2022-01-06'),
(7, 5, 93, 8, 27, '2022-01-06'),
(8, 5, 95, 8, 27, '2022-01-06');

--
-- Triggers `trans`
--
DELIMITER $$
CREATE TRIGGER `before_trans_delete` BEFORE DELETE ON `trans` FOR EACH ROW BEGIN
INSERT INTO t_audit (TID,custid,petID,ID,tdate,a_action)
values(OLD.TID,OLD.custid,OLD.petID,OLD.ID,OLD.tdate,'DELETE');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_trans_update` BEFORE UPDATE ON `trans` FOR EACH ROW BEGIN
INSERT INTO t_audit (TID,custid,petID,ID,tdate,a_action)
values(OLD.TID,OLD.custid,OLD.petID,OLD.ID,OLD.tdate,'UPDATE');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_audit`
--

CREATE TABLE `t_audit` (
  `TID` int(11) NOT NULL,
  `custid` int(11) NOT NULL,
  `petID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `tdate` date NOT NULL,
  `a_action` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_audit`
--

INSERT INTO `t_audit` (`TID`, `custid`, `petID`, `ID`, `tdate`, `a_action`) VALUES
(1, 6, 94, 27, '2022-01-05', 'UPDATE'),
(9, 5, 95, 27, '2022-01-06', 'DELETE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`consultID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `haircut`
--
ALTER TABLE `haircut`
  ADD PRIMARY KEY (`cutid`);

--
-- Indexes for table `hconsultation`
--
ALTER TABLE `hconsultation`
  ADD PRIMARY KEY (`HCID`),
  ADD KEY `petID2` (`petID`),
  ADD KEY `ID2` (`ID`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`petID`);

--
-- Indexes for table `petgrooming`
--
ALTER TABLE `petgrooming`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`TID`),
  ADD KEY `petID3` (`petID`),
  ADD KEY `ID3` (`ID`),
  ADD KEY `custid3` (`custid`),
  ADD KEY `serviceID` (`serviceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `consultID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `haircut`
--
ALTER TABLE `haircut`
  MODIFY `cutid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hconsultation`
--
ALTER TABLE `hconsultation`
  MODIFY `HCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `petID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `petgrooming`
--
ALTER TABLE `petgrooming`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `haircut`
--
ALTER TABLE `haircut`
  ADD CONSTRAINT `haircut_ibfk_1` FOREIGN KEY (`cutid`) REFERENCES `tblusers` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hconsultation`
--
ALTER TABLE `hconsultation`
  ADD CONSTRAINT `ID2` FOREIGN KEY (`ID`) REFERENCES `tblusers` (`ID`),
  ADD CONSTRAINT `petID2` FOREIGN KEY (`petID`) REFERENCES `pet` (`petID`);

--
-- Constraints for table `trans`
--
ALTER TABLE `trans`
  ADD CONSTRAINT `ID3` FOREIGN KEY (`ID`) REFERENCES `tblusers` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `custid3` FOREIGN KEY (`custid`) REFERENCES `customer` (`custid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `petID3` FOREIGN KEY (`petID`) REFERENCES `pet` (`petID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `serviceID` FOREIGN KEY (`serviceID`) REFERENCES `petgrooming` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
