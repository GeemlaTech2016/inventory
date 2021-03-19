-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2019 at 04:34 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignproduct`
--

CREATE TABLE `assignproduct` (
  `sn` int(10) UNSIGNED NOT NULL,
  `empid` varchar(45) DEFAULT NULL,
  `product` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bankid` varchar(10) NOT NULL DEFAULT '',
  `bankname` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branchid` varchar(15) NOT NULL DEFAULT '',
  `brname` varchar(45) NOT NULL DEFAULT '',
  `address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branchid`, `brname`, `address`) VALUES
('1', 'MKD_WADATA', 'Wadata'),
('2', 'MKD_MODERN_MARKET', 'Modern Market'),
('3', 'BSU College of Health', 'Shop no 4');

-- --------------------------------------------------------

--
-- Table structure for table `creditor`
--

CREATE TABLE `creditor` (
  `sn` varchar(55) NOT NULL DEFAULT '',
  `dot` varchar(15) NOT NULL DEFAULT '',
  `amt` varchar(15) DEFAULT NULL,
  `amtpaid` varchar(15) DEFAULT NULL,
  `amtbal` varchar(15) DEFAULT NULL,
  `dismode` varchar(15) DEFAULT NULL,
  `purpose` varchar(85) DEFAULT NULL,
  `creditor` varchar(55) DEFAULT NULL,
  `approvedby` varchar(15) DEFAULT NULL,
  `dstatus` varchar(15) DEFAULT NULL,
  `term` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditor`
--

INSERT INTO `creditor` (`sn`, `dot`, `amt`, `amtpaid`, `amtbal`, `dismode`, `purpose`, `creditor`, `approvedby`, `dstatus`, `term`) VALUES
('120190527144830', '2019-05-26', '14500', '0.0', '14500', 'Others', 'goods purchase', 'V120190521', '', 'pending', 'Short'),
('220190527145106', '2019-05-19', '6050', '0.0', '6050', 'Others', 'goods purchase', 'V220190527', 'admin', 'pending', 'Short'),
('320190528092443', '2019-05-28', '1918', '0.0', '1918', 'Cash', 'goods purchase', 'V120190521', 'peter', 'pending', 'Long');

-- --------------------------------------------------------

--
-- Table structure for table `creditrepayment`
--

CREATE TABLE `creditrepayment` (
  `sn` varchar(20) NOT NULL DEFAULT '',
  `dot` varchar(15) NOT NULL DEFAULT '',
  `amtpaid` varchar(45) DEFAULT NULL,
  `creditor` varchar(45) DEFAULT NULL,
  `payer` varchar(45) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `creditid` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `custid` varchar(25) NOT NULL DEFAULT '',
  `custname` varchar(55) NOT NULL DEFAULT '',
  `phone` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(25) DEFAULT NULL,
  `datereg` varchar(15) DEFAULT NULL,
  `address` varchar(65) DEFAULT NULL,
  `branchid` varchar(15) DEFAULT NULL,
  `ctype` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`custid`, `custname`, `phone`, `email`, `datereg`, `address`, `branchid`, `ctype`) VALUES
('CE120181218', 'Customer 1', '83289732897', 'c@gmail.com', '2018-12-18', '7 Iorchia Ayu Road Wurukum', '1', 'Dealer'),
('CE220190105', 'Edward Toro', '080788888898', '', '2019-01-05', 'jkhk', '1', 'Dealer');

-- --------------------------------------------------------

--
-- Table structure for table `debtors`
--

CREATE TABLE `debtors` (
  `sn` varchar(55) NOT NULL DEFAULT '',
  `dot` varchar(30) NOT NULL DEFAULT '',
  `amt` varchar(15) DEFAULT NULL,
  `amtpaid` varchar(15) DEFAULT NULL,
  `amtbal` varchar(15) DEFAULT NULL,
  `dismode` varchar(15) DEFAULT NULL,
  `purpose` varchar(85) DEFAULT NULL,
  `receiver` varchar(55) DEFAULT NULL,
  `approvedby` varchar(15) DEFAULT NULL,
  `dstatus` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debtors`
--

INSERT INTO `debtors` (`sn`, `dot`, `amt`, `amtpaid`, `amtbal`, `dismode`, `purpose`, `receiver`, `approvedby`, `dstatus`) VALUES
('1020190527142549', '2019-05-27 14:25:49', '2211', '0', '2211', 'yes', 'FGG00036', 'CE120181218', '', 'pending'),
('1120190528092233', '2019-05-28 09:22:33', '5118', '0', '5118', 'yes', 'FGF02056', 'CE220190105', '', 'pending'),
('120190527125942', '2019-05-27 12:59:42', '6050', '18150', '0', 'Cash', 'FGF02059', 'CE220190105', '', 'paid'),
('1220190528092339', '2019-05-28 09:23:39', '4428', '0', '4428', 'yes', 'FGF02060', 'CE120181218', '', 'pending'),
('1320190528162307', '2019-05-28 16:23:07', '1865', '0', '1865', 'yes', 'FGG00005', 'CE220190105', '', 'pending'),
('220190527125942', '2019-05-27 12:59:42', '14500', '14500', '0', 'Others', 'FGAL003', 'CE220190105', '', 'paid'),
('320190527125942', '2019-05-27 12:59:43', '1918', '1918', '0', 'Others', 'FGG00130', 'CE220190105', '', 'paid'),
('420190527142526', '2019-05-27 14:25:26', '5118', '0', '5118', 'yes', 'FGF02056', 'CE220190105', '', 'pending'),
('520190527142526', '2019-05-27 14:25:27', '4428', '13284', '0', 'Cash', 'FGF02060', 'CE220190105', '', 'paid'),
('620190527142526', '2019-05-27 14:25:27', '4119', '0', '4119', 'yes', 'FGG00123', 'CE220190105', '', 'pending'),
('720190527142526', '2019-05-27 14:25:27', '6918', '0', '6918', 'yes', 'FGG00133', 'CE220190105', '', 'pending'),
('820190527142549', '2019-05-27 14:25:49', '2106', '0', '2106', 'yes', 'FGG00016', 'CE120181218', '', 'pending'),
('920190527142549', '2019-05-27 14:25:49', '6050', '0', '6050', 'yes', 'FGF02059', 'CE120181218', '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `debtrepayment`
--

CREATE TABLE `debtrepayment` (
  `sn` varchar(20) NOT NULL DEFAULT '',
  `dot` varchar(30) NOT NULL DEFAULT '',
  `amtpaid` varchar(45) DEFAULT NULL,
  `custid` varchar(45) DEFAULT NULL,
  `receiver` varchar(45) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `debtid` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debtrepayment`
--

INSERT INTO `debtrepayment` (`sn`, `dot`, `amtpaid`, `custid`, `receiver`, `comment`, `debtid`) VALUES
('3201905271259422', '2019-05-27 12:59:43 09:26:41', '918', 'CE220190105', 'admin', 'debt payment', '320190527125942'),
('5201905271425263', '2019-05-27 14:25:27 14:30:11', '4428', 'CE220190105', 'admin', 'debt payment', '520190527142526');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `empid` varchar(10) NOT NULL DEFAULT '',
  `empname` varchar(45) NOT NULL DEFAULT '',
  `phone` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(25) DEFAULT NULL,
  `hiredate` varchar(15) DEFAULT NULL,
  `address` varchar(65) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `guarantor` varchar(65) DEFAULT NULL,
  `branch` varchar(15) DEFAULT NULL,
  `tdate` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `sn` varchar(45) NOT NULL DEFAULT '',
  `dot` varchar(30) NOT NULL DEFAULT '',
  `dismode` varchar(15) NOT NULL DEFAULT '',
  `amt` varchar(15) NOT NULL DEFAULT '',
  `purpose` varchar(55) DEFAULT NULL,
  `exptype` varchar(10) DEFAULT NULL,
  `receiver` varchar(15) DEFAULT NULL,
  `approvedby` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`sn`, `dot`, `dismode`, `amt`, `purpose`, `exptype`, `receiver`, `approvedby`) VALUES
('120190105103935', '2019-01-05', 'Cash', '1000', 'repair of edwar', 'CE4', 'Edward', '<br />\r\n<b>Noti'),
('120190525144236', '2019-05-25', 'Cash', '2000', 'bicycle repair', 'CE4', 'mike', ''),
('320190525144324', '2019-05-25', 'Cash', '2000', 'bicycle repair', 'CE4', 'mike', ''),
('420190525144836', '2019-04-30', 'Cheque', '15000', 'salary payment', 'ce1', 'peter', '');

-- --------------------------------------------------------

--
-- Table structure for table `expensetype`
--

CREATE TABLE `expensetype` (
  `ecode` varchar(10) NOT NULL DEFAULT '',
  `exptype` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensetype`
--

INSERT INTO `expensetype` (`ecode`, `exptype`) VALUES
('ce1', 'SALARY'),
('ce2', 'FUEL'),
('ce3', 'DIESEL'),
('CE4', 'BICYCLE REPAIRS'),
('CE52', 'ACCESSORIES');

-- --------------------------------------------------------

--
-- Table structure for table `kgpricetb`
--

CREATE TABLE `kgpricetb` (
  `prodid` varchar(50) NOT NULL DEFAULT '',
  `cprice` varchar(5) DEFAULT NULL,
  `sprice` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kgpricetb`
--

INSERT INTO `kgpricetb` (`prodid`, `cprice`, `sprice`) VALUES
('PA1', '274.5', '352');

-- --------------------------------------------------------

--
-- Table structure for table `lockserver`
--

CREATE TABLE `lockserver` (
  `sn` int(11) NOT NULL,
  `enddate` varchar(255) DEFAULT NULL,
  `startdate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lockserver`
--

INSERT INTO `lockserver` (`sn`, `enddate`, `startdate`) VALUES
(1, '2020-04-19 23:59:59', '2018-04-20 00:00:00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `role1` varchar(15) NOT NULL DEFAULT '',
  `status1` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `password`, `role1`, `status1`) VALUES
('admin', '1', 'admin', 'active'),
('s1', 's1', 'Sales', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `sn` int(10) UNSIGNED NOT NULL,
  `dot` varchar(30) NOT NULL DEFAULT '',
  `datepaid` varchar(20) DEFAULT NULL,
  `amt` varchar(15) DEFAULT NULL,
  `amtpaid` varchar(15) DEFAULT NULL,
  `amtbal` varchar(15) DEFAULT NULL,
  `dismode` varchar(15) DEFAULT NULL,
  `purpose` varchar(85) DEFAULT NULL,
  `custid` varchar(55) DEFAULT NULL,
  `tellernum` varchar(15) DEFAULT NULL,
  `bankname` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productcat`
--

CREATE TABLE `productcat` (
  `catid` varchar(15) NOT NULL DEFAULT '',
  `category` varchar(65) NOT NULL DEFAULT '',
  `prodid` varchar(65) NOT NULL DEFAULT '',
  `cylindersize` varchar(15) DEFAULT NULL,
  `instock` varchar(10) DEFAULT NULL,
  `unit` varchar(15) DEFAULT NULL,
  `costprice` varchar(15) DEFAULT NULL,
  `sellprice` varchar(15) DEFAULT NULL,
  `sellpricedealer` varchar(15) DEFAULT NULL,
  `tco` varchar(45) DEFAULT NULL,
  `vat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcat`
--

INSERT INTO `productcat` (`catid`, `category`, `prodid`, `cylindersize`, `instock`, `unit`, `costprice`, `sellprice`, `sellpricedealer`, `tco`, `vat`) VALUES
('FGAL003', 'ALUMINIUM FOIL 45CMX8M', 'P1420190521170007', '', '37', 'NYL', '725', '14500', NULL, '10000', 'Yes'),
('FGF02034', 'ROSE C. HANDKERCHIEF', 'P1220190521165611', '', '26', 'CTN', '240', '4800', NULL, '40000', 'Yes'),
('FGF02056', 'ROSE BELLE FACIAL 150 SHEETS', 'P1220190521165611', '', '37', 'CTN', '255.9', '5118', NULL, '80000', 'Yes'),
('FGF02059', 'ROSE CARLA 100', 'P1220190521165611', '', '3', 'CTN', '302.5', '6050', NULL, '50000', 'Yes'),
('FGF02060', 'ROSE OF AFRICA', 'P1220190521165611', '', '26', 'CTN', '221.4', '4428', NULL, '50000', 'Yes'),
('FGF02062', 'SOFTWAVE FACIAL TISSUE 3X8', 'P1220190521165611', '', '28', 'CTN', '168', '3360', NULL, '55000', 'Yes'),
('FGG00005', 'FINTEX SMALL', 'P1020190521164510', '', '26', 'CTN', '93.25', '1865', NULL, '93.25', 'Yes'),
('FGG00010', 'JOYCE PLUS 1X48', 'P1020190521164510', '', '45', 'CTN', '88.45', '1769', NULL, '30000', 'Yes'),
('FGG00016', 'BETTI PLUS 1X48', 'P1020190521164510', '', '14', 'CTN', '105.3', '2106', NULL, '15000', 'Yes'),
('FGG00023', 'JOYCE PLUS 1X60', 'P1020190521164510', '', '10', 'CTN', '75.85', '1517', NULL, '10000', 'Yes'),
('FGG00036', 'ROSE JUMBO YELLOW 1X48', 'P1020190521164510', '', '9', 'CTN', '110.55', '2211', NULL, '30000', 'Yes'),
('FGG00077', 'ROSE BELLE 2X24', 'P1020190521164510', '', '15', 'CTN', '186.05', '3721', NULL, '30000', 'Yes'),
('FGG00123', 'ROSE CARLA SINGLE 1X12', 'P1320190521165721', '', '49', 'CTN', '205.95', '4119', NULL, '60000', 'Yes'),
('FGG00124', 'ROSE CARLA DOUBLE 2X6', 'P1320190521165721', '', '70', 'CTN', '199.3', '3986', NULL, '60000', 'Yes'),
('FGG00130', 'ROSE FAMILY 6X8', 'P1020190521164510', '', '19', 'CTN', '95.9', '1918', NULL, '30000', 'Yes'),
('FGG00133', 'ROSE CARLA IMPROVED 6X8', 'P1020190521164510', '', '19', 'CTN', '345.9', '6918', NULL, '40000', 'Yes'),
('FGG00139', 'ROSE FAMILY 4X12', 'P1020190521164510', '', '30', 'CTN', '95.9', '1918', NULL, '10000', 'Yes'),
('FGG00148', 'ROSE BELLE 4X12', 'P1020190521164510', '', '50', 'CTN', '179.2', '3584', NULL, '40000', 'Yes'),
('FGG00149', 'ROSE CARLA 4X12', 'P1020190521164510', '', '20', 'CTN', '328', '6560', NULL, '30000', 'Yes'),
('FGG00150', 'ROSE BELLE TOWEL SINGLE 1X12', 'P1320190521165721', '', '10', 'CTN', '155.15', '3103', NULL, '10000', 'Yes'),
('FGG00151', 'ROSE BELLE TOWEL DOUBLE 2X6', 'P1320190521165721', '', '30', 'CTN', '149.8', '2996', NULL, '40000', 'Yes'),
('FGG00154', 'SOFTWAVE SMALL', 'P1020190521164510', '', '30', 'CTN', '93.25', '1865', NULL, '30000', 'Yes'),
('FGG00155', 'SOFTWAVE JUMBO', 'P1020190521164510', '', '50', 'CTN', '93.25', '1865', NULL, '50000', 'Yes'),
('FGG00157,', 'ROSE PLUS 6X8(BLUE)', 'P1020190521164510', '', '25', 'CTN', '114.45', '2289', NULL, '30000', 'Yes'),
('FGG00167,', 'ROSE PLUS 6X8(PINK)', 'P1020190521164510', '', '19', 'CTN', '114.45', '2289', NULL, '20000', 'Yes'),
('FGG00208', 'SOFTWAVE 2X24', 'P1020190521164510', '', '25', 'CTN', '82.15', '1643', NULL, '35000', 'Yes'),
('FGG00210,', 'ROSE PLUS 2X24(TWIN)', 'P1020190521164510', '', '10', 'CTN', '109.2', '2184', NULL, '15000', 'Yes'),
('FGG00212', 'ROSE PLUS 4X12', 'P1020190521164510', '', '45', 'CTN', '107.35', '2147', NULL, '45000', 'Yes'),
('FGG00214', 'FINTEX JUMBO', 'P1020190521164510', '', '10', 'CTN', '93.25', '1865', NULL, '10000', 'Yes'),
('FGG00217', 'ROSE PLUS TOWEL SINGLE 1X12', 'P1320190521165721', '', '30', 'CTN', '98.95', '1979', NULL, '30000', 'Yes'),
('FGG00218,', 'ROSE PLUS JUMBO', 'P1020190521164510', '', '25', 'CTN', '114.45', '2289', NULL, '30000', 'Yes'),
('FGN02057', 'ROSE BELLE CUBIC 80 SHEETS', 'P1220190521165611', '', '10', 'CTN', '204.15', '4083', NULL, '10000', 'Yes'),
('FGN03002', 'ROSE CARLA SERVIETTE 33X33(WHITE)', 'P1120190521165258', '', '50', 'CTN', '290', '5800', NULL, '60000', 'Yes'),
('FGN03009', 'ROSE CARLA SERVIETTE 33X33(PEACH)', 'P1120190521165258', '', '30', 'CTN', '290', '5800', NULL, '30000', 'Yes'),
('FGN03026', 'ROSE BELLE SERVIETTE', 'P1120190521165258', '', '30', 'CTN', '109.5', '2190', NULL, '30000', 'Yes'),
('FGN03030', 'ROSE CARLA SERVIETTE 33X33(YELLOW)', 'P1120190521165258', '', '50', 'CTN', '290', '5800', NULL, '20000', 'Yes'),
('FGN03035', 'FINTEX SERVIETTE X40', 'P1120190521165258', '', '10', 'CTN', '99', '1980', NULL, '10000', 'Yes'),
('FGN03063', 'Rose Plus Serviettes x40', 'P1120190521165258', '', '10', 'CTN', '99', '1980', NULL, '1000', 'Yes'),
('FGN03064', 'ROSE CARLA SERVIETTE 22X22(WHITE)', 'P1120190521165258', '', '20', 'CTN', '175', '3500', NULL, '20000', 'Yes'),
('FGN03065', 'ROSE CARLA SERVIETTE 38X38(WHITE)', 'P1120190521165258', '', '10', 'CTN', '367.5', '7350', NULL, '20000', 'Yes'),
('FGN03068', 'ROSE CARLA SERVIETTE 22X22(YELLOW)', 'P1120190521165258', '', '10', 'CTN', '175', '3500', NULL, '10000', 'Yes'),
('FGN03069', 'ROSE CARLA SERVIETTE 22X22(PEACH)', 'P1120190521165258', '', '30', 'CTN', '175', '3500', NULL, '30000', 'Yes'),
('FGN03070', 'ROSE CARLA SERVIETTE 38X38(YELLOW)', 'P1120190521165258', '', '20', 'CTN', '367.5', '7350', NULL, '30000', 'Yes'),
('FGN03071', 'ROSE CARLA SERVIETTE 38X38(PEACH)', 'P1120190521165258', '', '30', 'CTN', '367.5', '7350', NULL, '50000', 'Yes'),
('No  Number3', 'MR. BAGGY REFUSE BAG', 'P1520190521170141', '', '10', 'BAG', '275', '5500', NULL, '20000', 'Yes'),
('No Number2', 'SOFTWAVE SERVIETTE', 'P1120190521165258', '', '10', 'CTN', '70', '1400', NULL, '30000', 'Yes'),
('PC3320190522141', 'ROSE FAMILY SERVIETTE', 'P1120190521165258', '', '10', 'CTN', '75', '1500', NULL, '40000', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodid` varchar(100) NOT NULL DEFAULT '',
  `prodname` varchar(75) NOT NULL DEFAULT '',
  `proddesc` varchar(150) DEFAULT NULL,
  `totqty` varchar(15) NOT NULL DEFAULT '',
  `unit` varchar(10) NOT NULL DEFAULT '',
  `onhand` varchar(15) DEFAULT NULL,
  `tco` varchar(15) DEFAULT NULL,
  `asat` varchar(15) DEFAULT NULL,
  `reorderlevel` varchar(15) DEFAULT NULL,
  `expdate` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodid`, `prodname`, `proddesc`, `totqty`, `unit`, `onhand`, `tco`, `asat`, `reorderlevel`, `expdate`) VALUES
('P1020190521164510', 'TOILET', 'Toilet', '821', 'kg', '200', '93.25', '2019-05-28 14:3', '10', '2023-05-31'),
('P1120190521165258', 'NAPKINS', 'NAPKINS', '340', 'CTN', '200', '20000', '2019-05-27', '10', '2021-05-17'),
('P120181208051947', 'PAPER', 'PAPER', '949', 'PAPER', '1000', '50000', '2018-12-08', '100', '2018-12-31'),
('P1220190521165611', 'FACIAL', 'FACIAL', '159', 'CTN', '200', '20000', '2019-05-27', '10', '2021-05-29'),
('P1320190521165721', 'TOWEL', 'TOWEL', '199', 'CTN', '200', '20000', '2019-05-27', '10', '2021-05-08'),
('P1420190521170007', 'Al.Foil', 'Al.Foil', '186', 'NYL', '200', '20000', '2019-05-27', '10', '2020-05-28'),
('P1520190521170141', 'REFUSE BAGS', 'REFUSE BAGS', '200', 'BAG', '200', '20000', '2019-05-27', '10', '2020-01-30'),
('P220181208052745', 'SACHET', 'SACHET', '990', 'SACHET', '1000', '50000', '2018-12-08', '100', '2018-12-31'),
('P320181208053039', 'STRAWBERRY', 'STRAWBERRY', '1000', 'SACHET', '1000', '50000', '2018-12-08', '100', '2018-12-31'),
('P420181208053200', 'ICE CREAM', 'ICE CREAM', '1000', 'SACHET', '1000', '50000', '2018-12-08', '100', '2018-12-31'),
('P520181208053909', 'SUPER', 'SUPER', '1000', 'SACHET', '1000', '50000', '2018-12-08', '100', '2018-12-31'),
('P620181208054005', 'FAN', 'FAN', '1000', 'SACHET', '1000', '50000', '2018-12-08', '100', '2018-12-31'),
('P720181208054039', 'FAN DANGO', 'FAN DANGO', '1000', 'SACHET', '1000', '50000', '2018-12-08', '100', '2018-12-31'),
('P820181208054140', 'FANTASTIC', 'FANTASTIC', '1000', 'SACHET', '1000', '50000', '2018-12-08', '100', '2018-12-31'),
('P920181208054355', 'FAN-UP', 'FAN UP', '1000', 'SACHET', '1000', '50000', '2018-12-08', '100', '2018-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `returnedgoods`
--

CREATE TABLE `returnedgoods` (
  `saleid` varchar(35) NOT NULL DEFAULT '',
  `qty` varchar(15) NOT NULL DEFAULT '',
  `dot` varchar(25) NOT NULL DEFAULT '',
  `custid` varchar(65) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returnedgoods`
--

INSERT INTO `returnedgoods` (`saleid`, `qty`, `dot`, `custid`) VALUES
('220181218205348', '5', '2018-12-18 20:53:49', 'CE120181218'),
('420190105102043', '5', '2019-01-05 10:20:44', 'CE220190105');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `saleid` varchar(70) NOT NULL DEFAULT '',
  `prodid` varchar(65) NOT NULL DEFAULT '',
  `unitprice` varchar(15) NOT NULL DEFAULT '',
  `qty` varchar(45) NOT NULL DEFAULT '',
  `totalprice` varchar(15) NOT NULL DEFAULT '',
  `dot` varchar(30) NOT NULL DEFAULT '',
  `transid` varchar(65) NOT NULL DEFAULT '',
  `staffid` varchar(45) DEFAULT NULL,
  `discount` varchar(15) DEFAULT NULL,
  `custid` varchar(55) DEFAULT NULL,
  `transtype` varchar(45) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `itype` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`saleid`, `prodid`, `unitprice`, `qty`, `totalprice`, `dot`, `transid`, `staffid`, `discount`, `custid`, `transtype`, `status`, `itype`) VALUES
('1020190524124747', 'FGF02059', '6050', '1', '6050', '2019-05-24 12:47:48', '102019052412474720190524124747', '', '', 'CE220190105', 'Bank', 'active', NULL),
('1120190524124747', 'FGF02060', '4428', '1', '4428', '2019-05-24 12:47:48', '112019052412474720190524124747', '', '', 'CE220190105', 'Bank', 'active', NULL),
('1120190527125942', 'FGF02059', '6050', '4', '24200', '2019-05-27 12:59:42', '112019052712594220190527125942', '', '', 'CE220190105', 'Credit', 'active', NULL),
('1220190524124828', 'FGAL003', '14500', '1', '14500', '2019-05-23 12:48:28', '122019052412482820190524124828', '', '', 'CE120181218', 'Cash', 'active', NULL),
('1220190527125942', 'FGAL003', '14500', '1', '14500', '2019-05-27 12:59:42', '122019052712594220190527125942', '', '', 'CE220190105', 'Credit', 'active', NULL),
('1320190527125942', 'FGG00130', '1918', '1', '1918', '2019-05-27 12:59:43', '132019052712594220190527125942', '', '', 'CE220190105', 'Credit', 'active', NULL),
('1420190527142526', 'FGF02056', '5118', '1', '5118', '2019-05-27 14:25:26', '142019052714252620190527142526', '', '', 'CE220190105', 'Credit', 'active', NULL),
('1520190527142526', 'FGF02060', '4428', '1', '4428', '2019-05-27 14:25:27', '152019052714252620190527142526', '', '', 'CE220190105', 'Credit', 'active', NULL),
('1620190527142526', 'FGG00123', '4119', '1', '4119', '2019-05-27 14:25:27', '162019052714252620190527142526', '', '', 'CE220190105', 'Credit', 'active', NULL),
('1720190527142526', 'FGG00133', '6918', '1', '6918', '2019-05-27 14:25:27', '172019052714252620190527142526', '', '', 'CE220190105', 'Credit', 'active', NULL),
('1820190527142549', 'FGG00016', '2106', '1', '2106', '2019-05-27 14:25:49', '182019052714254920190527142549', '', '', 'CE120181218', 'Credit', 'active', NULL),
('1920190527142549', 'FGF02059', '6050', '1', '6050', '2019-05-27 14:25:49', '192019052714254920190527142549', '', '', 'CE120181218', 'Credit', 'active', NULL),
('2020190527142549', 'FGG00036', '2211', '1', '2211', '2019-05-27 14:25:49', '202019052714254920190527142549', '', '', 'CE120181218', 'Credit', 'active', NULL),
('2120190527150827', 'FGAL003', '14500', '3', '43500', '2019-05-27 15:08:27', '212019052715082720190527150827', '', '', 'CE120181218', 'Cash', 'active', NULL),
('2220190527152024', 'FGAL003', '14500', '1', '14500', '2019-05-27 15:20:24', '222019052715202420190527152024', '', '', 'CE220190105', 'Bank', 'active', NULL),
('2320190527152024', 'FGF02034', '4800', '1', '4800', '2019-05-27 15:20:24', '232019052715202420190527152024', '', '', 'CE220190105', 'Bank', 'active', NULL),
('2420190528092107', 'FGAL003', '14500', '2', '29000', '2019-05-28 09:21:07', '242019052809210720190528092107', '', '', 'CE120181218', 'Cash', 'active', NULL),
('2520190528092233', 'FGF02056', '5118', '20', '102360', '2019-05-28 09:22:33', '252019052809223320190528092233', '', '', 'CE220190105', 'Credit', 'active', NULL),
('2620190528092339', 'FGF02060', '4428', '1', '4428', '2019-05-28 09:23:39', '262019052809233920190528092339', '', '', 'CE120181218', 'Credit', 'active', NULL),
('2720190528124816', 'FGG00167,', '2289', '1', '2289', '2019-05-28 12:48:16', '272019052812481620190528124816', '', '', 'CE220190105', 'Cash', 'active', NULL),
('2820190528124816', 'FGF02060', '4428', '1', '4428', '2019-05-28 12:48:16', '282019052812481620190528124816', '', '', 'CE220190105', 'Cash', 'active', NULL),
('2920190528124816', 'FGF02062', '3360', '1', '3360', '2019-05-28 12:48:16', '292019052812481620190528124816', '', '', 'CE220190105', 'Cash', 'active', NULL),
('3020190528124816', 'FGG00157,', '2289', '5', '11445', '2019-05-28 12:48:16', '302019052812481620190528124816', '', '', 'CE220190105', 'Cash', 'active', NULL),
('3120190528151819', 'FGG00005', '1865', '1', '1865', '2019-05-27 15:18:19', '312019052815181920190528151819', '', '', 'CE220190105', 'Cash', 'active', NULL),
('320190105102043', 'LV', '100', '10', '1000', '2019-01-05 10:20:43', '32019010510204320190105102043', '', '', 'CE220190105', 'Cash', 'active', NULL),
('3220190528151841', 'FGG00005', '1865', '2', '3730', '2019-05-28 15:18:41', '322019052815184120190528151841', '', '', 'CE120181218', 'Cash', 'active', NULL),
('3320190528162307', 'FGG00005', '1865', '1', '1865', '2019-05-28 16:23:07', '332019052816230720190528162307', '', '', 'CE220190105', 'Credit', 'active', NULL),
('420190105102043', 'PC', '100', '15', '1500', '2019-01-05 10:20:44', '42019010510204320190105102043', '', '', 'CE220190105', 'Cash', 'active', NULL),
('520190105104942', 'PV', '150', '1', '150', '2019-01-05 10:49:42', '52019010510494220190105104942', '', '', 'x', 'Cash', 'active', NULL),
('620190523155057', 'FGAL003', '14500', '1', '14500', '2019-05-01 15:50:57', '62019052315505720190523155057', '', '', 'CE120181218', 'Cash', 'active', NULL),
('720190523155057', 'FGF02034', '4800', '1', '4800', '2019-05-01 15:50:57', '72019052315505720190523155057', '', '', 'CE120181218', 'Cash', 'active', NULL),
('820190524124747', 'FGF02034', '4800', '1', '4800', '2019-05-24 12:47:47', '82019052412474720190524124747', '', '', 'CE220190105', 'Bank', 'active', NULL),
('920190524124747', 'FGF02056', '5118', '1', '5118', '2019-05-24 12:47:48', '92019052412474720190524124747', '', '', 'CE220190105', 'Bank', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockid` varchar(50) NOT NULL DEFAULT '',
  `prodid` varchar(55) NOT NULL DEFAULT '',
  `totqty` varchar(15) NOT NULL DEFAULT '',
  `unit` varchar(15) DEFAULT NULL,
  `tco` varchar(15) DEFAULT NULL,
  `dot` varchar(15) DEFAULT NULL,
  `vendor` varchar(20) DEFAULT NULL,
  `transid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockid`, `prodid`, `totqty`, `unit`, `tco`, `dot`, `vendor`, `transid`) VALUES
('S1020190521164510', 'P1020190521164510', '200', 'CTN', '20000', '2019-05-27', 'V120190521', 'P102019052116451016'),
('S1120190521165258', 'P1120190521165258', '200', 'CTN', '20000', '2019-05-27', 'V120190521', 'P112019052116525817'),
('S120181208051947', 'P120181208051947', '1000', 'PAPER', '50000', '2018-12-08', 'V120181208', 'P1201812080519471'),
('S1220190521165611', 'P1220190521165611', '200', 'CTN', '20000', '2019-05-27', 'V120190521', 'P122019052116561118'),
('S1320190521165721', 'P1320190521165721', '200', 'CTN', '20000', '2019-05-27', 'V120190521', 'P132019052116572119'),
('S1420190521170007', 'P1420190521170007', '200', 'NYL', '20000', '2019-05-27', 'V120190521', 'P142019052117000720'),
('S1520190521170141', 'P1520190521170141', '200', 'BAG', '20000', '2019-05-27', 'V120190521', 'P152019052117014121'),
('S1620190528143934', 'P1020190521164510', '10', 'kg', '93.25', '2019-05-28 14:3', 'V120190521', 'P102019052116451059'),
('S220181208052745', 'P220181208052745', '1000', 'SACHET', '50000', '2018-12-08', 'V120181208', 'P2201812080527452'),
('S320181208053039', 'P320181208053039', '1000', 'SACHET', '50000', '2018-12-08', 'V120181208', 'P3201812080530393'),
('S420181208053200', 'P420181208053200', '1000', 'SACHET', '50000', '2018-12-08', 'V120181208', 'P4201812080532004'),
('S520181208053909', 'P520181208053909', '1000', 'SACHET', '50000', '2018-12-08', 'V120181208', 'P5201812080539095'),
('S620181208054005', 'P620181208054005', '1000', 'SACHET', '50000', '2018-12-08', 'V120181208', 'P6201812080540056'),
('S720181208054039', 'P720181208054039', '1000', 'SACHET', '50000', '2018-12-08', 'V120181208', 'P7201812080540397'),
('S820181208054140', 'P820181208054140', '1000', 'SACHET', '50000', '2018-12-08', 'V120181208', 'P8201812080541408'),
('S920181208054355', 'P920181208054355', '1000', 'SACHET', '50000', '2018-12-08', 'V120181208', 'P9201812080543559');

-- --------------------------------------------------------

--
-- Table structure for table `stockhistory`
--

CREATE TABLE `stockhistory` (
  `stockhistory_id` varchar(50) NOT NULL,
  `dot` varchar(50) NOT NULL,
  `prodid` varchar(50) NOT NULL,
  `addedqty` varchar(10) NOT NULL,
  `newqty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockhistory`
--

INSERT INTO `stockhistory` (`stockhistory_id`, `dot`, `prodid`, `addedqty`, `newqty`) VALUES
('stk201905281439343418', '2019-05-28 14:39:34', 'FGG00005', '10', '30');

-- --------------------------------------------------------

--
-- Table structure for table `transhistory`
--

CREATE TABLE `transhistory` (
  `transid` varchar(100) NOT NULL DEFAULT '',
  `dot` varchar(30) NOT NULL DEFAULT '',
  `staffid` varchar(20) DEFAULT NULL,
  `transtype` varchar(15) DEFAULT NULL,
  `tco` varchar(15) DEFAULT NULL,
  `receipt` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transhistory`
--

INSERT INTO `transhistory` (`transid`, `dot`, `staffid`, `transtype`, `tco`, `receipt`) VALUES
('102019052412474720190524124747', '2019-05-24 12:47:48', 'admin', 'Sale', '6050', ''),
('112019052412474720190524124747', '2019-05-24 12:47:48', 'admin', 'Sale', '4428', ''),
('112019052712544420190527125444', '2019-05-27 12:54:44', 'admin', 'Sale', '14500', ''),
('112019052712594220190527125942', '2019-05-27 12:59:42', 'admin', 'Sale', '24200', ''),
('12018121820534820181218205348', '2018-12-18 20:53:48', 'admin', 'Sale', '1000', ''),
('12019052712594231', '2019-05-27 12:59:42 13:11:59', 'admin', 'Debt', '6050', ''),
('122019052412482820190524124828', '2019-05-23 12:48:28', 'admin', 'Sale', '14500', ''),
('122019052712544420190527125444', '2019-05-27 12:54:45', 'admin', 'Sale', '5118', ''),
('122019052712594220190527125942', '2019-05-27 12:59:42', 'admin', 'Sale', '14500', ''),
('132019052710565820190527105658', '2019-05-27 10:56:58', 'admin', 'Sale', '14500', ''),
('132019052712544420190527125444', '2019-05-27 12:54:45', 'admin', 'Sale', '6050', ''),
('132019052712594220190527125942', '2019-05-27 12:59:43', 'admin', 'Sale', '1918', ''),
('142019052710565820190527105658', '2019-05-27 10:56:58', 'admin', 'Sale', '6050', ''),
('142019052712544420190527125444', '2019-05-27 12:54:45', 'admin', 'Sale', '3360', ''),
('142019052714252620190527142526', '2019-05-27 14:25:26', 'admin', 'Sale', '5118', ''),
('144', '2019-05-26', 'admin', 'Credit', '14500', ''),
('145', '2019-05-26', 'admin', 'Credit', '14500', ''),
('152019052711414820190527114148', '2019-05-27 11:41:48', 'admin', 'Sale', '14500', ''),
('152019052714252620190527142526', '2019-05-27 14:25:27', 'admin', 'Sale', '4428', ''),
('162019052712485220190527124852', '2019-05-27 12:48:52', 'admin', 'Sale', '4800', ''),
('162019052714252620190527142526', '2019-05-27 14:25:27', 'admin', 'Sale', '4119', ''),
('172019052712485220190527124852', '2019-05-27 12:48:52', 'admin', 'Sale', '29000', ''),
('172019052714252620190527142526', '2019-05-27 14:25:27', 'admin', 'Sale', '6918', ''),
('182019052714254920190527142549', '2019-05-27 14:25:49', 'admin', 'Sale', '2106', ''),
('192019052714254920190527142549', '2019-05-27 14:25:49', 'admin', 'Sale', '6050', ''),
('202019052714254920190527142549', '2019-05-27 14:25:49', 'admin', 'Sale', '2211', ''),
('212019052715082720190527150827', '2019-05-27 15:08:27', 'admin', 'Sale', '43500', ''),
('22018121820534820181218205348', '2018-12-18 20:53:49', 'admin', 'Sale', '2000', ''),
('22019052712594232', '2019-05-27 12:59:42 13:19:56', 'admin', 'Debt', '14500', ''),
('222019052715202420190527152024', '2019-05-27 15:20:24', 'admin', 'Sale', '14500', ''),
('232019052715202420190527152024', '2019-05-27 15:20:24', 'admin', 'Sale', '4800', ''),
('242019052809210720190528092107', '2019-05-28 09:21:07', 'admin', 'Sale', '29000', ''),
('246', '2019-05-19', 'admin', 'Credit', '6050', ''),
('252019052809223320190528092233', '2019-05-28 09:22:33', 'admin', 'Sale', '102360', ''),
('262019052809233920190528092339', '2019-05-28 09:23:39', 'admin', 'Sale', '4428', ''),
('272019052812481620190528124816', '2019-05-28 12:48:16', 'admin', 'Sale', '2289', ''),
('282019052812481620190528124816', '2019-05-28 12:48:16', 'admin', 'Sale', '4428', ''),
('292019052812481620190528124816', '2019-05-28 12:48:16', 'admin', 'Sale', '3360', ''),
('302019052812481620190528124816', '2019-05-28 12:48:16', 'admin', 'Sale', '11445', ''),
('312019052815181920190528151819', '2019-05-27 15:18:19', 'admin', 'Sale', '1865', ''),
('32019010510204320190105102043', '2019-01-05 10:20:43', 'admin', 'Sale', '1000', ''),
('32019052712594233', '2019-05-27 12:59:43 13:33:57', 'admin', 'Debt', '1000', ''),
('32019052712594254', '2019-05-27 12:59:43 09:26:41', 'admin', 'Debt', '918', ''),
('322019052815184120190528151841', '2019-05-28 15:18:41', 'admin', 'Sale', '3730', ''),
('332019052816230720190528162307', '2019-05-28 16:23:07', 'admin', 'Sale', '1865', ''),
('353', '2019-05-28', 'admin', 'Credit', '1918', ''),
('42019010510204320190105102043', '2019-01-05 10:20:44', 'admin', 'Sale', '1500', ''),
('52019010510494220190105104942', '2019-01-05 10:49:42', 's1', 'Sale', '150', ''),
('52019052714252641', '2019-05-27 14:25:27 14:27:21', 'admin', 'Debt', '4428', ''),
('52019052714252642', '2019-05-27 14:25:27 14:28:05', 'admin', 'Debt', '4428', ''),
('52019052714252643', '2019-05-27 14:25:27 14:30:11', 'admin', 'Debt', '4428', ''),
('62019052315505720190523155057', '2019-05-01 15:50:57', 'admin', 'Sale', '14500', ''),
('72019052315505720190523155057', '2019-05-01 15:50:57', 'admin', 'Sale', '4800', ''),
('82019052412474720190524124747', '2019-05-24 12:47:47', 'admin', 'Sale', '4800', ''),
('92019052412474720190524124747', '2019-05-24 12:47:48', 'admin', 'Sale', '5118', ''),
('P102019052116451016', '2019-05-27', 'admin', 'Purchase', '20000', '1111'),
('P102019052116451059', '2019-05-28 14:39:34', 'admin', 'Purchase', '93.25', '123643'),
('P112019052116525817', '2019-05-27', 'admin', 'Purchase', '20000', '2222'),
('P122019052116561118', '2019-05-27', 'admin', 'Purchase', '20000', '3333'),
('P132019052116572119', '2019-05-27', 'admin', 'Purchase', '20000', '4444'),
('P142019052117000720', '2019-05-27', 'admin', 'Purchase', '20000', '5555'),
('P152019052117014121', '2019-05-27', 'admin', 'Purchase', '20000', '6666');

-- --------------------------------------------------------

--
-- Table structure for table `vault`
--

CREATE TABLE `vault` (
  `sn` varchar(45) NOT NULL DEFAULT '',
  `dot` varchar(15) NOT NULL DEFAULT '',
  `dismode` varchar(15) NOT NULL DEFAULT '',
  `amt` varchar(15) NOT NULL DEFAULT '',
  `incash` varchar(15) DEFAULT NULL,
  `inbank` varchar(15) DEFAULT NULL,
  `outcash` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendid` varchar(20) NOT NULL DEFAULT '',
  `vendname` varchar(55) NOT NULL DEFAULT '',
  `phone` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendid`, `vendname`, `phone`, `email`, `address`) VALUES
('V120190521', 'ABC', '08099', 'abd@email.com', 'abc address'),
('V220190527', 'Salami Trees', '080432', 'salamitrees@salami.com', 'no 3 bank road makurdi');

-- --------------------------------------------------------

--
-- Table structure for table `wastages`
--

CREATE TABLE `wastages` (
  `sn` varchar(55) NOT NULL DEFAULT '',
  `prodid` varchar(75) NOT NULL DEFAULT '',
  `qty` varchar(15) DEFAULT NULL,
  `unit` varchar(15) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `dot` varchar(15) DEFAULT NULL,
  `culprit` varchar(45) DEFAULT NULL,
  `wtype` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignproduct`
--
ALTER TABLE `assignproduct`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bankid`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branchid`);

--
-- Indexes for table `creditor`
--
ALTER TABLE `creditor`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `creditrepayment`
--
ALTER TABLE `creditrepayment`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `debtors`
--
ALTER TABLE `debtors`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `debtrepayment`
--
ALTER TABLE `debtrepayment`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `expensetype`
--
ALTER TABLE `expensetype`
  ADD PRIMARY KEY (`ecode`);

--
-- Indexes for table `kgpricetb`
--
ALTER TABLE `kgpricetb`
  ADD PRIMARY KEY (`prodid`);

--
-- Indexes for table `lockserver`
--
ALTER TABLE `lockserver`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `productcat`
--
ALTER TABLE `productcat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodid`);

--
-- Indexes for table `returnedgoods`
--
ALTER TABLE `returnedgoods`
  ADD PRIMARY KEY (`saleid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`saleid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockid`);

--
-- Indexes for table `stockhistory`
--
ALTER TABLE `stockhistory`
  ADD PRIMARY KEY (`stockhistory_id`);

--
-- Indexes for table `transhistory`
--
ALTER TABLE `transhistory`
  ADD PRIMARY KEY (`transid`);

--
-- Indexes for table `vault`
--
ALTER TABLE `vault`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendid`);

--
-- Indexes for table `wastages`
--
ALTER TABLE `wastages`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignproduct`
--
ALTER TABLE `assignproduct`
  MODIFY `sn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lockserver`
--
ALTER TABLE `lockserver`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `sn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
