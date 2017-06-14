-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2017 at 04:04 PM
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms_v6`
--
CREATE DATABASE IF NOT EXISTS `cms_v6` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cms_v6`;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(50) NOT NULL,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Group Users' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`groupId`, `groupName`) VALUES
(2, 'RSM');

-- --------------------------------------------------------

--
-- Table structure for table `groupusers`
--

CREATE TABLE IF NOT EXISTS `groupusers` (
  `groupId` int(10) DEFAULT NULL,
  `moduleId` int(10) DEFAULT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupusers`
--

INSERT INTO `groupusers` (`groupId`, `moduleId`, `access`) VALUES
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 1, 1),
(1, 2, 1),
(2, 3, 1),
(2, 4, 1),
(2, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(1, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_bank`
--

CREATE TABLE IF NOT EXISTS `mst_bank` (
  `bankId` int(11) NOT NULL AUTO_INCREMENT,
  `bankName` varchar(50) NOT NULL,
  PRIMARY KEY (`bankId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `mst_bank`
--

INSERT INTO `mst_bank` (`bankId`, `bankName`) VALUES
(1, 'Bank BCA'),
(2, 'Bank Mandiri'),
(3, 'Bank Syariah Mandiri'),
(4, 'Bank BNI'),
(5, 'Bank Niaga'),
(6, 'Lippo Bank'),
(7, 'Bank BII'),
(8, 'Bank Mega'),
(9, 'Bank BRI');

-- --------------------------------------------------------

--
-- Table structure for table `mst_member`
--

CREATE TABLE IF NOT EXISTS `mst_member` (
  `memberId` int(11) NOT NULL AUTO_INCREMENT,
  `memberName` varchar(20) NOT NULL,
  `memberFName` varchar(20) NOT NULL,
  `memberLName` varchar(30) NOT NULL,
  `memberMF` enum('Male','Female') NOT NULL,
  `memberBDate` date NOT NULL,
  `memberAddress` text NOT NULL,
  `memberPassword` varchar(32) NOT NULL,
  `memberEmail` varchar(100) NOT NULL,
  `memberPhone` int(11) NOT NULL,
  `isLogin` int(1) NOT NULL,
  `isEnabled` int(1) NOT NULL,
  `lastLogin` datetime NOT NULL,
  `createdBy` varchar(20) NOT NULL,
  `createdDate` date NOT NULL,
  `updateBy` varchar(20) NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`memberId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Member' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_prodtype`
--

CREATE TABLE IF NOT EXISTS `mst_prodtype` (
  `ProdTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `ProdTypeName` varchar(150) NOT NULL,
  PRIMARY KEY (`ProdTypeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='product type' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mst_prodtype`
--

INSERT INTO `mst_prodtype` (`ProdTypeId`, `ProdTypeName`) VALUES
(1, 'Accessoris'),
(3, 'Merchandise'),
(4, 'Jersey');

-- --------------------------------------------------------

--
-- Table structure for table `mst_product`
--

CREATE TABLE IF NOT EXISTS `mst_product` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductCode` varchar(150) NOT NULL,
  `ProductName` varchar(200) NOT NULL,
  `ProductDesc` text NOT NULL,
  `ProductType` varchar(100) NOT NULL,
  `productQty` int(11) NOT NULL,
  `stokIn` int(11) NOT NULL,
  `stokOut` int(11) NOT NULL,
  `ProductPrice` decimal(17,0) NOT NULL,
  `ProductPict` varchar(150) NOT NULL,
  `productView` int(11) NOT NULL,
  `productSell` int(11) NOT NULL,
  `isPromo` enum('0','1') NOT NULL,
  `CreatedBy` varchar(100) NOT NULL,
  `CreatedDate` date NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Product' AUTO_INCREMENT=21 ;

--
-- Dumping data for table `mst_product`
--

INSERT INTO `mst_product` (`ProductId`, `ProductCode`, `ProductName`, `ProductDesc`, `ProductType`, `productQty`, `stokIn`, `stokOut`, `ProductPrice`, `ProductPict`, `productView`, `productSell`, `isPromo`, `CreatedBy`, `CreatedDate`) VALUES
(8, 'PC002', 'Jersey Barcelona 2014/2015', '<p>Ukuran : S, M , L</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 22, 2, '105000', 'prod8-Jersey Barcelona_2014-2015.jpg', 7, 0, '1', '', '2014-06-27'),
(9, 'PC003', 'Jersey Atletico Madrid 2014/2015', '<p>Ukuran : S, M , L</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 24, 0, '105000', 'prod9-jersey_atletico.jpg', 1, 0, '1', '', '2014-06-27'),
(10, 'PC004', 'Jersey Chelsea 2014/2015', '<p>Ukuran : S, M , L</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 24, 0, '105000', 'prod10-jersey_chelsea.jpg', 4, 0, '1', '', '2014-06-27'),
(11, 'PC005', 'Jersey PSG 2014/2015', '<p>Ukuran : S, M , L</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 22, 2, '105000', 'prod11-jersey_psg.jpg', 6, 0, '', '', '2014-06-27'),
(12, 'PC006', 'Jersey AC MIlan 2014/2015 (Home)', '<p>Ukuran : S, M , L</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 24, 0, '105000', 'prod12-milan-home-2015.jpg', 5, 0, '1', '', '2014-06-27'),
(13, 'PC007', 'Jersey Club ISL', '<p>Ukuran : S, M , L</p>\r\n<p>Tersedia : Persib, Persipura, Mitra Kukar, dll</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 24, 0, '55000', 'prod13-IMG_20140329_125018.jpg', 3, 0, '', '', '2014-06-27'),
(14, 'PC008', 'Jaket Nike', '<p>Ukuran : S, M , L, XL</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '1', 24, 24, 0, '85000', 'prod14-IMG_20140405_090348.jpg', 3, 0, '', '', '2014-06-27'),
(15, 'PC009', 'Jersey Timnas (Wanita)', '<p>Tersedia berbagai ukuran.</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 24, 0, '55000', 'prod15-IMG_20140422_164902.jpg', 4, 0, '', '', '2014-06-27'),
(16, 'PC010', 'Celana Olahraga', '<p>Tersedia berbagai ukuran (All Size)</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 8, 16, '35000', 'prod16-IMG_20140513_101541.jpg', 37, 0, '', '', '2014-06-27'),
(17, 'PC011', 'Jersey Timnas Indonesia', '<p>Tersedia berbagai ukuran.</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 22, 2, '105000', 'prod17-IMG_20140514_134907.jpg', 4, 0, '', '', '2014-06-27'),
(18, 'PC012', 'Jersey Liverpool', '<p>Tersedia berbagai ukuran.</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 24, 0, '105000', 'prod18-IMG_20140514_134913.jpg', 4, 0, '1', '', '2014-06-27'),
(19, 'PC013', 'Kaos Bola All Club', '<p>Tersedia berbagai ukuran.</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 24, 0, '105000', 'prod19-IMG_20140513_101548.jpg', 3, 0, '', '', '2014-06-27'),
(20, 'PC013', 'Jersey Leicester', 'Desain Fox', '4', 30, 0, 0, '1900000', '', 0, 0, '0', 'admin', '2017-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `sys_module`
--

CREATE TABLE IF NOT EXISTS `sys_module` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` varchar(11) NOT NULL,
  `parentName` varchar(20) NOT NULL,
  `menuName` varchar(50) NOT NULL,
  `moduleUrl` varchar(120) NOT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='system module' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sys_module`
--

INSERT INTO `sys_module` (`menuId`, `parentId`, `parentName`, `menuName`, `moduleUrl`) VALUES
(1, '0', '', 'Users', ''),
(2, '0', '', 'Configuration', ''),
(3, '0', '', 'Content', ''),
(4, '1', 'Users', 'User', 'user'),
(5, '1', 'Users', 'Group', 'group'),
(10, '2', 'Configuration', 'Product', 'product'),
(11, '3', 'Content', 'Purchase', 'purchase'),
(12, '3', 'Content', 'Invoice', 'invoice');

-- --------------------------------------------------------

--
-- Table structure for table `sys_reftype`
--

CREATE TABLE IF NOT EXISTS `sys_reftype` (
  `reftypeId` int(11) NOT NULL AUTO_INCREMENT,
  `reftypeCode` varchar(20) NOT NULL,
  `reftypeName` varchar(100) NOT NULL,
  `reftypeGroup` varchar(100) NOT NULL,
  PRIMARY KEY (`reftypeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Referensi Type' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sys_reftype`
--

INSERT INTO `sys_reftype` (`reftypeId`, `reftypeCode`, `reftypeName`, `reftypeGroup`) VALUES
(1, '1', 'Active', 'supplierStatus'),
(2, '2', 'Not Active', 'supplierStatus'),
(3, '3', 'Blocked', 'supplierStatus'),
(4, '1', 'Open', 'whStatus'),
(5, '2', 'Closed', 'whStatus'),
(6, '1', 'Draft', 'InventStatus'),
(7, '2', 'Approve', 'InventStatus'),
(8, '3', 'Reject', 'InventStatus');

-- --------------------------------------------------------

--
-- Table structure for table `trn_buy`
--

CREATE TABLE IF NOT EXISTS `trn_buy` (
  `buyId` int(11) NOT NULL AUTO_INCREMENT,
  `buyDate` date NOT NULL,
  `buyDescription` text NOT NULL,
  `buyItemId` int(11) NOT NULL,
  `buyQty` int(11) NOT NULL,
  `buyPrice` decimal(17,0) NOT NULL,
  `createdBy` varchar(20) NOT NULL,
  `createdDate` date NOT NULL,
  `updateBy` varchar(20) NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isBuyDelete` int(1) NOT NULL,
  `isProccess` int(1) NOT NULL,
  PRIMARY KEY (`buyId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Transaksi Beli' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `trn_buy`
--

INSERT INTO `trn_buy` (`buyId`, `buyDate`, `buyDescription`, `buyItemId`, `buyQty`, `buyPrice`, `createdBy`, `createdDate`, `updateBy`, `updateDate`, `isBuyDelete`, `isProccess`) VALUES
(1, '2014-06-04', 'test', 1, 30, '125000', 'admin', '2014-06-21', 'admin', '2014-06-21 07:54:58', 0, 1),
(3, '2014-06-21', 'Pembelian Jersey Brazil', 1, 40, '120000', 'admin', '2014-06-21', 'admin', '2014-06-21 08:16:11', 0, 1),
(4, '2014-06-21', 'jersey jerman', 2, 20, '120000', 'admin', '2014-06-21', '', '0000-00-00 00:00:00', 0, 1),
(5, '2014-06-21', 'Jersey Italia', 2, 10, '120000', 'admin', '2014-06-21', 'admin', '2014-06-21 09:29:56', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trn_konfirmasi`
--

CREATE TABLE IF NOT EXISTS `trn_konfirmasi` (
  `confirmId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `ticketId` int(6) NOT NULL,
  `namarekening` varchar(150) NOT NULL,
  `listbank` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgltransfer` date NOT NULL,
  `vcode` varchar(20) NOT NULL,
  `createdDate` date NOT NULL,
  `createdBy` varchar(120) NOT NULL,
  `updateBy` varchar(120) NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isConfirm` int(1) NOT NULL,
  PRIMARY KEY (`confirmId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabel konfirmasi' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trn_order`
--

CREATE TABLE IF NOT EXISTS `trn_order` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `ticketId` int(11) NOT NULL,
  `orderItemId` int(11) NOT NULL,
  `orderName` varchar(20) NOT NULL,
  `orderEmail` varchar(100) NOT NULL,
  `orderPhone` int(12) NOT NULL,
  `orderHP` int(12) NOT NULL,
  `orderAddress` text NOT NULL,
  `orderDate` date NOT NULL,
  `orderDeliveryDate` date NOT NULL,
  `orderQty` int(11) NOT NULL,
  `orderDisc` int(2) NOT NULL,
  `orderPrice` decimal(17,0) NOT NULL,
  `orderExpiredDate` datetime NOT NULL COMMENT 'expired date order',
  `createdBy` varchar(20) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updateBy` varchar(20) NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isOrderDelete` int(1) NOT NULL,
  `isProcess` int(1) NOT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Order' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `trn_order`
--

INSERT INTO `trn_order` (`orderId`, `ticketId`, `orderItemId`, `orderName`, `orderEmail`, `orderPhone`, `orderHP`, `orderAddress`, `orderDate`, `orderDeliveryDate`, `orderQty`, `orderDisc`, `orderPrice`, `orderExpiredDate`, `createdBy`, `createdDate`, `updateBy`, `updateDate`, `isOrderDelete`, `isProcess`) VALUES
(1, 210875, 16, 'admin', 'amdin@admin.com', 7890101, 817889999, 'jkt', '2014-07-04', '0000-00-00', 2, 0, '35000', '0000-00-00 00:00:00', '', '2014-07-04 15:46:48', '', '2014-07-04 08:47:26', 0, 1),
(2, 573637, 8, 'admin', 'admin@admin.com', 8909888, 815687899, 'jakarta', '2014-07-07', '0000-00-00', 2, 0, '105000', '2014-07-10 00:00:00', '', '2014-07-07 16:57:31', '', '2014-07-07 09:57:31', 0, 0),
(3, 315179, 8, 'admin', 'adm@admin.com', 21321321, 12323123, 'admin', '2017-01-10', '0000-00-00', 2, 0, '105000', '2017-01-13 00:00:00', 'admin', '2017-01-10 05:18:58', '', '2017-01-10 04:18:58', 0, 0),
(4, 537992, 8, 'admin', 'adm@admin.com', 21321321, 12323123, 'admin', '2017-01-10', '0000-00-00', 2, 0, '105000', '2017-01-13 00:00:00', 'admin', '2017-01-10 05:20:09', '', '2017-01-10 04:20:09', 0, 0),
(5, 466600, 8, 'admin', 'adm@admin.com', 21321321, 12323123, 'admin', '2017-01-10', '0000-00-00', 2, 0, '105000', '2017-01-13 00:00:00', 'admin', '2017-01-10 05:20:30', '', '2017-01-10 04:20:30', 0, 0),
(6, 388789, 11, 'admin', 'adm@admin.com', 21321321, 12323123, 'adress', '2017-01-10', '0000-00-00', 2, 0, '105000', '2017-01-13 00:00:00', 'admin', '2017-01-10 06:21:15', '', '2017-01-10 09:49:14', 0, 2),
(7, 619037, 17, 'admin', 'adm@admin.com', 21321321, 12323123, 'asd', '2017-01-10', '0000-00-00', 2, 0, '105000', '2017-01-13 00:00:00', 'admin', '2017-01-10 06:25:13', '', '2017-01-10 05:25:13', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginname` varchar(20) NOT NULL,
  `groupId` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastlogindate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='users' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `loginname`, `groupId`, `password`, `lastlogindate`, `firstname`, `lastname`) VALUES
(1, 'admin', 1, '21232f297a57a5a743894a0e4a801fc3', '2014-12-05 02:20:56', '', ''),
(2, 'user', 1, 'e10adc3949ba59abbe56e057f20f883e', '2014-07-18 08:06:20', '', ''),
(3, 'user1', 2, 'e10adc3949ba59abbe56e057f20f883e', '2016-05-16 06:03:43', '0', 'user'),
(4, 'user2', 1, 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00 00:00:00', '0', 'Sales');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
