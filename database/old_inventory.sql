-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2019 at 12:41 PM
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
  `dstatus` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `creditrepayment`
--

CREATE TABLE `creditrepayment` (
  `sn` varchar(20) NOT NULL,
  `dot` varchar(15) NOT NULL,
  `amtpaid` varchar(45) DEFAULT NULL,
  `creditor` varchar(45) DEFAULT NULL,
  `payer` varchar(45) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `creditid` varchar(45) NOT NULL
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
  `dot` varchar(15) NOT NULL DEFAULT '',
  `amt` varchar(15) DEFAULT NULL,
  `amtpaid` varchar(15) DEFAULT NULL,
  `amtbal` varchar(15) DEFAULT NULL,
  `dismode` varchar(15) DEFAULT NULL,
  `purpose` varchar(85) DEFAULT NULL,
  `receiver` varchar(55) DEFAULT NULL,
  `approvedby` varchar(15) DEFAULT NULL,
  `dstatus` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `debtrepayment`
--

CREATE TABLE `debtrepayment` (
  `sn` varchar(20) NOT NULL,
  `dot` varchar(15) NOT NULL,
  `amtpaid` varchar(45) DEFAULT NULL,
  `custid` varchar(45) DEFAULT NULL,
  `receiver` varchar(45) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `debtid` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('120190105103935', '2019-01-05', 'Cash', '1000', 'repair of edwar', 'CE4', 'Edward', '<br />\r\n<b>Noti');

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
('LV', 'LARGE VANILLA', 'P220181208052745', '', '190', 'SACHET', '70', '100', NULL, NULL, NULL),
('PC', 'CHOCO', 'P120181208051947', '', '225', 'PAPER', '90', '100', NULL, NULL, NULL),
('PV', 'VANILLA', 'P120181208051947', '', '499', 'PAPER', '140', '150', NULL, NULL, NULL),
('PY', 'YOGO', 'P120181208051947', '', '235', 'PAPER', '90', '100', NULL, NULL, NULL);

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
('P120181208051947', 'PAPER', 'PAPER', '949', 'PAPER', '1000', '50000', '2018-12-08', '100', '2018-12-31'),
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
('120181218205348', 'PC', '100', '10', '1000', '2018-12-18 20:53:48', '12018121820534820181218205348', '', '', 'CE120181218', 'Credit', 'active', NULL),
('220181218205348', 'PY', '100', '15', '1500', '2018-12-18 20:53:49', '22018121820534820181218205348', '', '', 'CE120181218', 'Credit', 'active', NULL),
('320190105102043', 'LV', '100', '10', '1000', '2019-01-05 10:20:43', '32019010510204320190105102043', '', '', 'CE220190105', 'Cash', 'active', NULL),
('420190105102043', 'PC', '100', '15', '1500', '2019-01-05 10:20:44', '42019010510204320190105102043', '', '', 'CE220190105', 'Cash', 'active', NULL),
('520190105104942', 'PV', '150', '1', '150', '2019-01-05 10:49:42', '52019010510494220190105104942', '', '', 'x', 'Cash', 'active', NULL);

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
('S120181208051947', 'P120181208051947', '1000', 'PAPER', '50000', '2018-12-08', 'V120181208', 'P1201812080519471'),
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
('', '2019-01-05', 'admin', 'Expense', '1000', ''),
('12018121820534820181218205348', '2018-12-18 20:53:48', 'admin', 'Sale', '1000', ''),
('22018121820534820181218205348', '2018-12-18 20:53:49', 'admin', 'Sale', '2000', ''),
('32019010510204320190105102043', '2019-01-05 10:20:43', 'admin', 'Sale', '1000', ''),
('42019010510204320190105102043', '2019-01-05 10:20:44', 'admin', 'Sale', '1500', ''),
('52019010510494220190105104942', '2019-01-05 10:49:42', 's1', 'Sale', '150', ''),
('P1201812080519471', '2018-12-08', 'admin', 'Purchase', '50000', '545'),
('P2201812080527452', '2018-12-08', 'admin', 'Purchase', '50000', '545'),
('P3201812080530393', '2018-12-08', 'admin', 'Purchase', '50000', '545'),
('P4201812080532004', '2018-12-08', 'admin', 'Purchase', '50000', '545'),
('P5201812080539095', '2018-12-08', 'admin', 'Purchase', '50000', '545'),
('P6201812080540056', '2018-12-08', 'admin', 'Purchase', '50000', '545'),
('P7201812080540397', '2018-12-08', 'admin', 'Purchase', '50000', '545'),
('P8201812080541408', '2018-12-08', 'admin', 'Purchase', '50000', '545'),
('P9201812080543559', '2018-12-08', 'admin', 'Purchase', '50000', '545');

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
  `vendname` varchar(55) NOT NULL,
  `phone` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendid`, `vendname`, `phone`, `email`, `address`) VALUES
('V120181208', 'FAN MILK', '07037724454', 'akosuga.associate.consult.ltd@gmail.com', '2 Adjacent Police E Division, Akpehe Road, Makurdi, Benue');

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
