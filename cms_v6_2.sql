-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2017 at 07:20 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_v6`
--

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(50) NOT NULL,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Group Users';

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`groupId`, `groupName`) VALUES
(2, 'RSM');

-- --------------------------------------------------------

--
-- Table structure for table `groupusers`
--

DROP TABLE IF EXISTS `groupusers`;
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
(1, 12, 1),
(1, 13, 1),
(1, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_customer`
--

DROP TABLE IF EXISTS `mst_customer`;
CREATE TABLE IF NOT EXISTS `mst_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `created_by` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='tabel master supplier';

--
-- Dumping data for table `mst_customer`
--

INSERT INTO `mst_customer` (`id`, `code`, `name`, `address`, `notelp`, `created_by`, `created_at`) VALUES
(1, 'C001', 'Admin Aja deh', 'Jakarta', '89898989', 'admin', '2017-06-12 18:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `mst_gudang`
--

DROP TABLE IF EXISTS `mst_gudang`;
CREATE TABLE IF NOT EXISTS `mst_gudang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Data master gudang';

-- --------------------------------------------------------

--
-- Table structure for table `mst_prodtype`
--

DROP TABLE IF EXISTS `mst_prodtype`;
CREATE TABLE IF NOT EXISTS `mst_prodtype` (
  `ProdTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `ProdTypeName` varchar(150) NOT NULL,
  PRIMARY KEY (`ProdTypeId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='product type';

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

DROP TABLE IF EXISTS `mst_product`;
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
  `isPromo` enum('0','1') NOT NULL,
  `CreatedBy` varchar(100) NOT NULL,
  `CreatedDate` date NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COMMENT='Product';

--
-- Dumping data for table `mst_product`
--

INSERT INTO `mst_product` (`ProductId`, `ProductCode`, `ProductName`, `ProductDesc`, `ProductType`, `productQty`, `stokIn`, `stokOut`, `ProductPrice`, `isPromo`, `CreatedBy`, `CreatedDate`) VALUES
(8, 'PC002', 'Jersey Barcelona 2014/2015', '<p>Ukuran : S, M , L</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 16, 8, '105000', '1', '', '2014-06-27'),
(9, 'PC003', 'Jersey Atletico Madrid 2014/2015', '<p>Ukuran : S, M , L</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 44, 0, '105000', '1', '', '2014-06-27'),
(10, 'PC004', 'Jersey Chelsea 2014/2015', '<p>Ukuran : S, M , L</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 10, 14, '105000', '1', '', '2014-06-27'),
(11, 'PC005', 'Jersey PSG 2014/2015', '<p>Ukuran : S, M , L</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 22, 2, '105000', '', '', '2014-06-27'),
(12, 'PC006', 'Jersey AC MIlan 2014/2015 (Home)', '<p>Ukuran : S, M , L</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 204, 0, '105000', '1', '', '2014-06-27'),
(13, 'PC007', 'Jersey Club ISL', '<p>Ukuran : S, M , L</p>\r\n<p>Tersedia : Persib, Persipura, Mitra Kukar, dll</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, -66, 90, '55000', '', '', '2014-06-27'),
(14, 'PC008', 'Jaket Nike', '<p>Ukuran : S, M , L, XL</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '1', 24, 24, 0, '85000', '', '', '2014-06-27'),
(15, 'PC009', 'Jersey Timnas (Wanita)', '<p>Tersedia berbagai ukuran.</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 23, 1, '55000', '', '', '2014-06-27'),
(16, 'PC010', 'Celana Olahraga', '<p>Tersedia berbagai ukuran (All Size)</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 4, 20, '35000', '', '', '2014-06-27'),
(17, 'PC011', 'Jersey Timnas Indonesia', '<p>Tersedia berbagai ukuran.</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 22, 2, '105000', '', '', '2014-06-27'),
(18, 'PC012', 'Jersey Liverpool', '<p>Tersedia berbagai ukuran.</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 24, 0, '105000', '1', '', '2014-06-27'),
(19, 'PC013', 'Kaos Bola All Club', '<p>Tersedia berbagai ukuran.</p>\r\n<p>Disc 10% - 15% , jika membeli secara grosir (min. 1 Lusin)</p>', '4', 24, 24, 0, '105000', '', '', '2014-06-27'),
(20, 'PC013', 'Jersey Leicester', 'Desain Fox', '4', 30, 18, 2, '1900000', '0', 'admin', '2017-01-09'),
(21, 'P014', 'Produk', 'Produk', '3', 20, 0, 0, '10000', '0', 'admin', '2017-01-17'),
(22, 'P014', 'Produk', 'Produk', '3', 20, 0, 0, '10000', '0', 'admin', '2017-01-17'),
(23, 'P015', 'Jersey Leicester', '', '3', 20, 0, 0, '10000', '0', 'admin', '2017-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `mst_supplier`
--

DROP TABLE IF EXISTS `mst_supplier`;
CREATE TABLE IF NOT EXISTS `mst_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `created_by` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='tabel master supplier';

--
-- Dumping data for table `mst_supplier`
--

INSERT INTO `mst_supplier` (`id`, `code`, `name`, `address`, `notelp`, `created_by`, `created_at`) VALUES
(1, 'S001', 'Admin Vendor', 'Jakarta Aja', '89898989', 'admin', '2017-06-12 18:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `sys_module`
--

DROP TABLE IF EXISTS `sys_module`;
CREATE TABLE IF NOT EXISTS `sys_module` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` varchar(11) NOT NULL,
  `parentName` varchar(20) NOT NULL,
  `menuName` varchar(50) NOT NULL,
  `moduleUrl` varchar(120) NOT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='system module';

--
-- Dumping data for table `sys_module`
--

INSERT INTO `sys_module` (`menuId`, `parentId`, `parentName`, `menuName`, `moduleUrl`) VALUES
(1, '0', '', 'Users', ''),
(2, '0', '', 'Admin', ''),
(3, '0', '', 'Content', ''),
(4, '1', 'Users', 'User', 'user'),
(5, '1', 'Users', 'Group', 'group'),
(10, '2', 'Admin', 'Product', 'product'),
(11, '3', 'Content', 'Inventory In', 'purchase'),
(12, '3', 'Content', 'Inventory Out', 'invoice'),
(13, '2', 'Admin', 'Customer', 'customer'),
(14, '2', 'Admin', 'Supplier', 'supplier');

-- --------------------------------------------------------

--
-- Table structure for table `sys_reftype`
--

DROP TABLE IF EXISTS `sys_reftype`;
CREATE TABLE IF NOT EXISTS `sys_reftype` (
  `reftypeId` int(11) NOT NULL AUTO_INCREMENT,
  `reftypeCode` varchar(20) NOT NULL,
  `reftypeName` varchar(100) NOT NULL,
  `reftypeGroup` varchar(100) NOT NULL,
  PRIMARY KEY (`reftypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Referensi Type';

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
-- Table structure for table `trn_barangkeluar`
--

DROP TABLE IF EXISTS `trn_barangkeluar`;
CREATE TABLE IF NOT EXISTS `trn_barangkeluar` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `ticketId` int(11) NOT NULL,
  `orderItemId` int(11) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `orderDeliveryDate` date NOT NULL,
  `orderQty` int(11) NOT NULL,
  `orderPrice` int(10) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `isOrderDelete` int(1) NOT NULL,
  `isProcess` int(1) NOT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Transaksi Barang keluar';

--
-- Dumping data for table `trn_barangkeluar`
--

INSERT INTO `trn_barangkeluar` (`orderId`, `ticketId`, `orderItemId`, `customer_id`, `orderDeliveryDate`, `orderQty`, `orderPrice`, `created_by`, `created_at`, `isOrderDelete`, `isProcess`) VALUES
(1, 713414, 10, 1, '2017-06-19', 10, 105000, 'admin', '2017-06-12 18:26:59', 0, 0),
(2, 141270, 10, 1, '2017-06-30', 4, 105000, 'admin', '2017-06-12 18:43:20', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trn_barangmasuk`
--

DROP TABLE IF EXISTS `trn_barangmasuk`;
CREATE TABLE IF NOT EXISTS `trn_barangmasuk` (
  `buyId` int(11) NOT NULL AUTO_INCREMENT,
  `buyDate` datetime NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `buyDescription` text NOT NULL,
  `buyItemId` int(11) NOT NULL,
  `buyQty` int(11) NOT NULL,
  `buyPrice` decimal(17,0) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `isBuyDelete` int(1) NOT NULL,
  `isProccess` int(1) NOT NULL,
  PRIMARY KEY (`buyId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Transaksi Beli';

--
-- Dumping data for table `trn_barangmasuk`
--

INSERT INTO `trn_barangmasuk` (`buyId`, `buyDate`, `supplier_id`, `buyDescription`, `buyItemId`, `buyQty`, `buyPrice`, `created_by`, `created_at`, `isBuyDelete`, `isProccess`) VALUES
(1, '2017-06-12 18:04:06', 1, 'Barang Masuk', 12, 80, '100000', 'admin', '2017-06-12 18:04:06', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginname` varchar(20) NOT NULL,
  `groupId` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastlogindate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='users';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `loginname`, `groupId`, `password`, `lastlogindate`, `firstname`, `lastname`) VALUES
(1, 'admin', 1, 'e10adc3949ba59abbe56e057f20f883e', '2017-06-09 15:48:32', '', ''),
(2, 'user', 1, 'e10adc3949ba59abbe56e057f20f883e', '2014-07-18 08:06:20', '', ''),
(3, 'user1', 2, 'e10adc3949ba59abbe56e057f20f883e', '2016-05-16 06:03:43', '0', 'user'),
(4, 'user2', 1, 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00 00:00:00', '0', 'Sales');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
