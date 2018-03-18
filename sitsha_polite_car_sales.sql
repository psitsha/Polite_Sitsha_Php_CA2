-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 07:08 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitsha_polite_car_sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `carID` int(10) NOT NULL,
  `salesmanID` int(10) NOT NULL,
  `carReg` varchar(20) NOT NULL,
  `carName` varchar(50) NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` varchar(4) NOT NULL,
  `engine` double NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` text,
  `status` varchar(10) NOT NULL DEFAULT 'For Sale'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`carID`, `salesmanID`, `carReg`, `carName`, `make`, `model`, `year`, `engine`, `price`, `image`, `status`) VALUES
(2, 2, '11D5622', 'BMW', 'Sedan', '3Series', '2011', 1.9, '6000.00', 'car1.png', 'Sold'),
(5, 3, '151C632', 'VW', 'Sedan', 'Passat', '2015', 1.6, '7600.00', 'car2.png', 'For Sale'),
(8, 1, '12KY666', 'VW ', 'TDI', 'Tourag', '2012', 2.6, '2800.00', 'car4.jpg', 'For Sale'),
(9, 9, '05MH191', 'SEAT', 'Ibiza', 'Sport', '2005', 1.2, '3000.00', 'car5.jpg', 'For Sale'),
(10, 7, '07G456', 'Audi', 'MK1', 'Audi TT', '2007', 1.8, '3100.00', 'car6.jpg', 'For Sale'),
(11, 1, '11L7755', 'Hyundai', 'i20', 'Coupe', '2011', 1.4, '2000.00', 'car7.jpg', 'For Sale'),
(12, 10, '10D9564', 'Hyundai', 'i30', 'Hatchback', '2010', 2, '4300.00', 'car8.jpg', 'For Sale'),
(13, 12, '151LH974', 'Hyndai', '4X4', 'Tucson', '2015', 2.4, '7000.00', 'car9.jpg', 'For Sale'),
(14, 12, '08DL7412', 'Opel', 'Corsa', 'Ecotec', '2008', 1.2, '4100.00', 'car10.jpg', 'For Sale'),
(15, 18, '161CN1299', 'Opel', 'Vectra', 'Sport', '2016', 1.4, '6600.00', 'car11.jpg', 'For Sale'),
(18, 1, '06LH3232', 'Opel', 'Zafira', 'Insignia', '2006', 2.4, '3600.00', 'car13.jpg', 'For Sale'),
(19, 1, '112G4545', 'Opel', 'Astra', 'Sedan', '2012', 1.6, '4750.00', 'car17.jpg', 'For Sale'),
(20, 1, '114KY8787', 'Toyota', 'Avensis', 'sedan', '2014', 1.8, '3500.00', 'car18.jpg', 'For Sale'),
(21, 1, '10OY9888', 'BMW', 'BMW', 'X5', '2010', 2, '6900.00', 'car19.png', 'For Sale'),
(22, 20, '09KY4564', 'Ford', 'Focus', 'SE Sedan', '2009', 2.2, '5000.00', 'car20.png', 'For Sale'),
(23, 23, '07MP7899', 'Audi', 'TDi', 'SE Sedan', '2007', 1.9, '6000.00', 'car14.jpg', 'For Sale'),
(24, 2, '151KY789', 'Nissan', 'Hardbody', 'Navara', '2015', 3, '5800.00', 'car2.png', 'For Sale'),
(25, 2, '141CN123', 'Toyota', 'Hilux', '4X4', '2014', 4.2, '6500.00', 'car6.jpg', 'For Sale'),
(26, 2, '131MN741', 'Nissan', '4X4', 'Duke', '2013', 3.2, '6700.00', 'car16.jpg', 'For Sale'),
(27, 3, '10G2342', 'Mercedes ', 'Sedan', 'C Class', '2010', 2.8, '5000.00', 'car5.jpg', 'For Sale'),
(28, 3, '09MH4564', 'Mercedes', 'Sedan', 'GLA', '2009', 2.1, '5500.00', 'car1.png', 'Sold'),
(29, 9, '161WX6544', 'Alfa Romeo', 'Sedan', 'Stevio', '2016', 2, '4500.00', 'car2.png', 'Sold'),
(33, 18, '08LM4564', 'Subaru', 'Sedan', 'VR12', '2008', 3.4, '6200.00', 'car8.jpg', 'For Sale'),
(37, 27, 'dfgdf', 'dfgdfgdf', 'dfgdfgdfg', 'dfgdfgdf', '2010', 4.2, '6000.00', 'car18.jpg', 'For Sale'),
(38, 1, 'srtry', 'rtyrtyrt', 'rtyrty', 'rtyrtyrty', '2030', 2.2, '4000.00', 'car12.jpg', 'Sold'),
(39, 28, '11GH4564', 'Opel', 'Hatchback', 'Astra', '2011', 2.1, '4000.00', 'car15.jpg', 'Sold'),
(40, 29, '04LH7899', 'Volvo', 'Sedan', 'S40', '2004', 2, '8000.00', 'car17.jpg', 'Sold'),
(41, 29, '151CN8797', 'Mazda', 'Mazda', 'Mazda 6', '2015', 2, '9000.00', 'car15.jpg', 'For Sale'),
(43, 28, '69GB36', 'Fast', 'Fast', 'FAST', '2011', 2.4, '2000.00', 'car2.png', 'For Sale'),
(48, 1, 'zdfgzdfg', 'dfgdfgd', 'zdfgdfg', 'dzfgdfgf', '4564', 4.2, '8000.00', 'car2.jpg', 'Sold'),
(54, 32, '06BB6531', 'Opel ', 'Hatchback', 'Corsa', '2006', 1.4, '7000.00', 'car2.jpg', 'For Sale'),
(57, 20, '171DL789', 'Audi', 'Sedan', 'A4', '2017', 3, '10000.00', 'car8.jpg', 'For Sale'),
(58, 28, '161WW4444', 'BMW', 'Hatchback', '1Series', '2016', 2.4, '10000.00', 'car19.png', 'For Sale'),
(59, 23, '10DL4564', 'Mazda', 'SoftTop', 'Mazda3', '2010', 2.2, '7000.00', 'car10.jpg', 'For Sale'),
(60, 33, '10DL988', 'bmw', 'Sedan', '3 series', '2010', 2.4, '6000.00', 'car1.png', 'Sold');

-- --------------------------------------------------------

--
-- Table structure for table `salesmen`
--

CREATE TABLE `salesmen` (
  `salesmanID` int(10) NOT NULL,
  `salesmanName` varchar(255) NOT NULL,
  `salesmanAddress` varchar(255) NOT NULL,
  `salesmanEmail` varchar(255) NOT NULL,
  `salesmanPhone` varchar(10) NOT NULL,
  `salesmanCommission` decimal(10,2) NOT NULL,
  `salesmanPPSN` varchar(15) NOT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesmen`
--

INSERT INTO `salesmen` (`salesmanID`, `salesmanName`, `salesmanAddress`, `salesmanEmail`, `salesmanPhone`, `salesmanCommission`, `salesmanPPSN`, `image`) VALUES
(1, 'Polite', 'college manor', 'polite@gmail.com', '0412654980', '0.00', '696969D', 'avatar-01.png'),
(2, 'Brad', 'Dundalk', 'brad@internet.com', '0863636456', '0.00', '999888Q', 'avatar-04.png'),
(3, 'James', 'Drogheda', 'james@internet.com', '0412546927', '0.00', '4690274H', 'avatar-05.png'),
(7, 'Mandy', 'Drumcar', 'mandy@internet.com', '041895432', '0.00', '0456014M', 'avatar-02.png'),
(9, 'Natasha', 'Dublin', 'sean@internet.com', '0416546927', '0.00', '12113142X', 'avatar-03.png'),
(10, 'Rennie', 'Cavan', 'rennie@internet.com', '0412741093', '0.00', '6398666K', 'avatar-04.png'),
(12, 'Bonnie ', 'Clyde', 'bonie@inet.com', '45646654', '0.00', '21321321W', 'avatar-06.png'),
(18, 'Sammy Smith', 'London', 'sam@internet.com', '1321321', '0.00', '32132131K', 'avatar-07.png'),
(20, 'Sean', 'Seane Land', 'zzzz@zzzz.zz', '1231321', '0.00', '3231231Y', 'avatar-01.png'),
(23, 'Homer', 'springfield', 'simson@intrnet.com', '456564', '0.00', '454456F', 'avatar-05.png'),
(27, 'azsdfgasdfg', 'sdfsdfsfsd', 'adffdg@dfgdf.ffd', '3135353', '0.00', '32132131W', 'avatar-01.png'),
(28, 'KJ', '45 zoom zoom', 'zoom@inet.com', '456511', '0.00', '1280391S', 'avatar-06.png'),
(29, 'Jayden', 'Dundalk', 'jayden@inet.com', '789789', '0.00', '13654679J', 'avatar-04.png'),
(32, 'Girly', 'Monaghan', 'girly@inet.com', '456456', '0.00', '45645654G', 'avatar-03.png'),
(33, 'Angela', 'Dundalk', 'angela1@gmail.com', '123456', '0.00', '987654H', 'avatar-07.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`carID`,`salesmanID`),
  ADD KEY `salesmanID` (`salesmanID`);

--
-- Indexes for table `salesmen`
--
ALTER TABLE `salesmen`
  ADD PRIMARY KEY (`salesmanID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `carID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `salesmen`
--
ALTER TABLE `salesmen`
  MODIFY `salesmanID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `salesmanID` FOREIGN KEY (`salesmanID`) REFERENCES `salesmen` (`salesmanID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
