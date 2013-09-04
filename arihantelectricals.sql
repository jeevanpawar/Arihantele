-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2013 at 11:23 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arihantelectricals`
--

-- --------------------------------------------------------

--
-- Table structure for table `billtype`
--

CREATE TABLE IF NOT EXISTS `billtype` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_date` date NOT NULL,
  `b_type` varchar(15) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `billtype`
--

INSERT INTO `billtype` (`b_id`, `b_date`, `b_type`) VALUES
(1, '2013-09-04', 'With Bill'),
(2, '2013-09-04', 'With Bill');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(200) NOT NULL,
  `c_address` text NOT NULL,
  `c_mo` bigint(11) NOT NULL,
  `c_ph` bigint(11) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_id`, `c_name`, `c_address`, `c_mo`, `c_ph`, `c_email`) VALUES
(1, 'jeevan', 'lahavit', 9049402749, 9049402749, 'jeevan@gmail.com'),
(5, 'sachin', 'NASIK', 9049402749, 9049402749, 'sachin@gmail.com'),
(6, 'Geeta', ' Nashik', 8736256541, 2532599318, 'shindegit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `i_no` int(11) NOT NULL AUTO_INCREMENT,
  `i_name` varchar(25) NOT NULL,
  `i_address` varchar(100) NOT NULL,
  `i_date` date NOT NULL,
  `i_cno` bigint(11) NOT NULL,
  `i_ph` bigint(11) NOT NULL,
  `i_vat` int(10) NOT NULL,
  `i_other` double NOT NULL,
  `i_total` double NOT NULL,
  PRIMARY KEY (`i_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`i_no`, `i_name`, `i_address`, `i_date`, `i_cno`, `i_ph`, `i_vat`, `i_other`, `i_total`) VALUES
(3, 'jeevan', 'lahavit', '1970-01-01', 9049402749, 9049402749, 0, 25, 1601.25),
(4, 'jeevan', 'lahavit', '2013-08-27', 9049402749, 9049402749, 0, 200, 1522.5),
(5, 'jeevan', 'lahavit', '1970-01-01', 9049402749, 9049402749, 0, 100, 210),
(6, 'jeevan', 'lahavit', '1970-01-01', 9049402749, 9049402749, 0, 0, 26250),
(7, 'jeevan', 'lahavit', '1970-01-01', 9049402749, 9049402749, 0, 0, 0),
(8, 'jeevan', 'lahavit', '1970-01-01', 9049402749, 9049402749, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `partial_payment`
--

CREATE TABLE IF NOT EXISTS `partial_payment` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `sl_id` varchar(11) NOT NULL,
  `c_name` varchar(25) NOT NULL,
  `p_mode` varchar(25) NOT NULL,
  `p_date` date NOT NULL,
  `p_check` varchar(25) NOT NULL,
  `p_amt` double NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `partial_payment`
--

INSERT INTO `partial_payment` (`p_id`, `sl_id`, `c_name`, `p_mode`, `p_date`, `p_check`, `p_amt`) VALUES
(55, '6', 'jeevan', 'Cheque', '2013-08-27', '', 26000),
(56, '6', 'jeevan', 'Cheque', '2013-08-27', '', 50);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `date`) VALUES
(1, '2013-09-02', 'verona'),
(2, '2013-09-02', 'verona'),
(3, '2013-09-02', 'verona 18 module pla'),
(4, '2013-09-02', 'verona 4 plate'),
(5, '2013-09-03', '12 module plate'),
(6, '2013-09-03', 'vr 23 module plate'),
(7, '2013-09-03', 'verona module 23');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `sl_id` int(11) NOT NULL AUTO_INCREMENT,
  `sl_cust` varchar(25) NOT NULL,
  `sl_date` date NOT NULL,
  PRIMARY KEY (`sl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sl_id`, `sl_cust`, `sl_date`) VALUES
(12, 'jeevan', '2013-08-26'),
(13, 'jeevan', '2013-08-26'),
(14, 'jeevan', '2013-08-26'),
(15, 'jeevan', '2013-08-26'),
(16, 'jeevan', '2013-08-26'),
(17, 'jeevan', '2013-08-26'),
(18, 'jeevan', '2013-08-26'),
(19, 'jeevan', '2013-08-26'),
(20, 'jeevan', '2013-08-26'),
(21, 'jeevan', '2013-08-26'),
(22, 'jeevan', '2013-08-26'),
(23, 'Geeta', '2013-09-03'),
(24, 'jeevan', '2013-09-03'),
(25, 'jeevan', '2013-09-03'),
(26, 'sachin', '2013-09-03'),
(27, 'jeevan', '2013-09-03'),
(28, 'jeevan', '2013-09-03'),
(29, 'jeevan', '2013-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_date` date NOT NULL,
  `sup_name` varchar(200) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`st_id`, `st_date`, `sup_name`) VALUES
(11, '2013-08-26', 'sager'),
(12, '2013-08-26', 'sager'),
(13, '2013-08-26', 'sager'),
(14, '2013-08-26', 'sager'),
(15, '2013-08-26', 'sager'),
(16, '2013-08-26', 'sager'),
(17, '2013-08-26', 'sager'),
(18, '2013-08-26', 'sager'),
(19, '2013-08-26', 'sager'),
(20, '2013-08-26', 'sager'),
(21, '2013-08-26', 'sager'),
(22, '2013-08-26', 'sager'),
(23, '2013-08-26', 'sager'),
(24, '2013-08-26', 'sager'),
(25, '2013-08-26', 'sager'),
(26, '2013-08-26', 'sager'),
(27, '2013-08-26', 'sager'),
(28, '2013-08-26', 'sager'),
(29, '2013-08-26', 'sager'),
(30, '2013-08-26', 'sager'),
(31, '2013-08-26', 'sager'),
(32, '2013-08-26', 'sager'),
(33, '2013-08-26', 'sager'),
(34, '2013-08-26', 'sager'),
(35, '2013-08-26', 'sager'),
(36, '2013-08-26', 'sager'),
(37, '2013-08-26', 'sager'),
(38, '2013-08-26', 'sager'),
(39, '2013-08-26', 'sager'),
(40, '2013-08-26', 'sager'),
(41, '2013-08-26', 'sager'),
(42, '2013-08-26', 'sager'),
(43, '2013-08-26', 'sager'),
(44, '2013-08-26', 'sager'),
(45, '2013-08-26', 'sager'),
(46, '2013-08-26', 'sager'),
(47, '2013-08-26', 'sager'),
(48, '2013-08-26', 'sager'),
(49, '2013-08-26', 'sager'),
(50, '2013-08-26', 'sager'),
(51, '2013-08-26', 'sager'),
(52, '2013-08-26', 'sager'),
(53, '2013-08-26', 'sager');

-- --------------------------------------------------------

--
-- Table structure for table `stock_detail`
--

CREATE TABLE IF NOT EXISTS `stock_detail` (
  `stock_name` varchar(25) NOT NULL,
  `stock_bag` int(10) NOT NULL,
  `stock_kg` double NOT NULL,
  `total_kg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_detail`
--

INSERT INTO `stock_detail` (`stock_name`, `stock_bag`, `stock_kg`, `total_kg`) VALUES
('stock_one', 75, 3, 496),
('stock_two', 49, 20, 2862);

-- --------------------------------------------------------

--
-- Table structure for table `sub_billtype`
--

CREATE TABLE IF NOT EXISTS `sub_billtype` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(50) NOT NULL,
  `qty` int(100) NOT NULL,
  `mrp` double NOT NULL,
  `tax` double NOT NULL,
  `rate` double NOT NULL,
  `amt` double NOT NULL,
  `date` date NOT NULL,
  `billtype` varchar(20) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sub_billtype`
--

INSERT INTO `sub_billtype` (`s_id`, `s_name`, `qty`, `mrp`, `tax`, `rate`, `amt`, `date`, `billtype`) VALUES
(1, 'vr 23 module plate', 10, 25, 5, 25, 175, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_invoice`
--

CREATE TABLE IF NOT EXISTS `sub_invoice` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_no` int(10) NOT NULL,
  `si_p` varchar(25) NOT NULL,
  `s_bag` int(10) NOT NULL,
  `s_kg` double NOT NULL,
  `s_rate` double NOT NULL,
  `s_amt` double NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `sub_invoice`
--

INSERT INTO `sub_invoice` (`s_id`, `i_no`, `si_p`, `s_bag`, `s_kg`, `s_rate`, `s_amt`) VALUES
(21, 3, 'stock_two', 25, 5, 2, 250),
(22, 3, 'stock_one', 10, 5, 25, 1250),
(23, 4, 'stock_one', 25, 2, 25, 1250),
(24, 5, 'stock_two', 1, 10, 10, 100),
(25, 6, 'stock_two', 50, 20, 25, 25000),
(26, 7, 'stock_one', 25, 2, 25, 1250),
(27, 8, 'vr 23 module plate', 20, 20, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sale`
--

CREATE TABLE IF NOT EXISTS `sub_sale` (
  `ss_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `st_name` varchar(25) NOT NULL,
  `qty` int(10) NOT NULL,
  `rate` double NOT NULL,
  `disc` double NOT NULL,
  `tax` double NOT NULL,
  `amt` int(50) NOT NULL,
  PRIMARY KEY (`ss_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sub_sale`
--

INSERT INTO `sub_sale` (`ss_id`, `s_id`, `st_name`, `qty`, `rate`, `disc`, `tax`, `amt`) VALUES
(1, 28, 'verona', 5, 5, 0, 0, 0),
(2, 29, 'vr 23 module plate', 6, 20, 20, 12.5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_stock`
--

CREATE TABLE IF NOT EXISTS `sub_stock` (
  `sb_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_id` int(10) NOT NULL,
  `sb_date` date NOT NULL,
  `sb_name` varchar(25) NOT NULL,
  `st_name` varchar(25) NOT NULL,
  `st_bag` int(11) NOT NULL,
  `st_kg` double NOT NULL,
  `st_total` double NOT NULL,
  PRIMARY KEY (`sb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `sub_stock`
--

INSERT INTO `sub_stock` (`sb_id`, `st_id`, `sb_date`, `sb_name`, `st_name`, `st_bag`, `st_kg`, `st_total`) VALUES
(7, 11, '2013-08-26', 'sager', 'stock2', 25, 2, 50),
(8, 12, '2013-08-26', 'sager', 'stock2', 25, 4, 100),
(9, 13, '2013-08-26', 'sager', 'stock2', 25, 5, 125),
(10, 14, '2013-08-26', 'sager', 'stock1', 10, 5, 50),
(11, 15, '2013-08-26', 'sager', 'stock2', 25, 5, 125),
(12, 16, '2013-08-26', 'sager', 'stock2', 100, 2, 200),
(13, 17, '2013-08-26', 'sager', 'stock2', 100, 2, 200),
(14, 18, '2013-08-26', 'sager', 'stock1', 25, 25, 625),
(15, 19, '2013-08-26', 'sager', 'stock_one', 100, 5, 500),
(16, 20, '2013-08-26', 'sager', 'stock_one', 200, 5, 1000),
(17, 21, '2013-08-26', 'sager', 'stock_one', 25, 0, 0),
(18, 22, '2013-08-26', 'sager', 'stock_one', 25, 0, 0),
(19, 23, '2013-08-26', 'sager', 'stock_one', 25, 0, 0),
(20, 24, '2013-08-26', 'sager', 'stock_one', 25, 0, 0),
(21, 25, '2013-08-26', 'sager', 'stock_one', 25, 0, 0),
(22, 26, '2013-08-26', 'sager', 'stock_one', 25, 0, 0),
(23, 27, '2013-08-26', 'sager', 'stock_one', 25, 0, 0),
(24, 28, '2013-08-26', 'sager', 'stock_one', 4, 0, 0),
(25, 29, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(26, 30, '2013-08-26', 'sager', 'stock_one', 25, 25, 625),
(27, 30, '2013-08-26', 'sager', 'stock_two', 25, 25, 625),
(28, 31, '2013-08-26', 'sager', 'stock_one', 25, 25, 625),
(29, 31, '2013-08-26', 'sager', 'stock_two', 25, 25, 625),
(30, 32, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(31, 32, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(32, 33, '2013-08-26', 'sager', 'stock_one', 25, 2, 50),
(33, 34, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(34, 35, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(35, 36, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(36, 37, '2013-08-26', 'sager', 'stock_one', 5, 0, 0),
(37, 38, '2013-08-26', 'sager', 'stock_one', 25, 0, 0),
(38, 39, '2013-08-26', 'sager', 'stock_one', 25, 0, 0),
(39, 40, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(40, 41, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(41, 42, '2013-08-26', 'sager', 'stock_one', 5, 5, 25),
(42, 43, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(43, 43, '2013-08-26', 'sager', 'stock_two', 25, 5, 125),
(44, 44, '2013-08-26', 'sager', 'stock_one', 5, 5, 25),
(45, 44, '2013-08-26', 'sager', 'stock_one', 5, 5, 25),
(46, 45, '2013-08-26', 'sager', 'stock_two', 25, 5, 125),
(47, 45, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(48, 46, '2013-08-26', 'sager', 'stock_two', 50, 10, 500),
(49, 47, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(50, 47, '2013-08-26', 'sager', 'stock_two', 25, 5, 125),
(51, 48, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(52, 48, '2013-08-26', 'sager', 'stock_two', 25, 5, 125),
(53, 49, '2013-08-26', 'sager', 'stock_one', 25, 25, 625),
(54, 50, '2013-08-26', 'sager', 'stock_two', 50, 50, 2500),
(55, 51, '2013-08-26', 'sager', 'stock_one', 25, 5, 125),
(56, 51, '2013-08-26', 'sager', 'stock_two', 25, 5, 125),
(57, 52, '2013-08-26', 'sager', 'stock_one', 10, 5, 50),
(58, 53, '2013-08-26', 'sager', 'stock_one', 100, 5, 500);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(200) NOT NULL,
  `s_address` text NOT NULL,
  `s_mo` bigint(11) NOT NULL,
  `s_ph` bigint(11) NOT NULL,
  `s_email` varchar(25) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`s_id`, `s_name`, `s_address`, `s_mo`, `s_ph`, `s_email`) VALUES
(1, 'sager', 'chandwad', 9049402749, 9049402749, 'sager@gmail.com'),
(2, 'sachin', 'nasik', 9049402794, 9049402794, 'sachin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`t_id`, `title`, `des`) VALUES
(15, 'hi', 'this is my inventory\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(25) NOT NULL,
  `u_password` varchar(25) NOT NULL,
  `u_type` varchar(25) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_password`, `u_type`) VALUES
(1, 'jeevan', 'jeevan', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
