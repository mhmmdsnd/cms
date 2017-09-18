-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2017 at 03:39 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toms`
--
CREATE DATABASE IF NOT EXISTS `toms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `toms`;

-- --------------------------------------------------------

--
-- Table structure for table `toms_mst_category`
--

CREATE TABLE IF NOT EXISTS `toms_mst_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='category';

--
-- Truncate table before insert `toms_mst_category`
--

TRUNCATE TABLE `toms_mst_category`;
-- --------------------------------------------------------

--
-- Table structure for table `toms_mst_location`
--

CREATE TABLE IF NOT EXISTS `toms_mst_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Data lokasi pengiriman';

--
-- Truncate table before insert `toms_mst_location`
--

TRUNCATE TABLE `toms_mst_location`;
-- --------------------------------------------------------

--
-- Table structure for table `toms_sys_group`
--

CREATE TABLE IF NOT EXISTS `toms_sys_group` (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(50) NOT NULL,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Group Users';

--
-- Truncate table before insert `toms_sys_group`
--

TRUNCATE TABLE `toms_sys_group`;
--
-- Dumping data for table `toms_sys_group`
--

INSERT INTO `toms_sys_group` (`groupId`, `groupName`) VALUES
(2, 'Users');

-- --------------------------------------------------------

--
-- Table structure for table `toms_sys_groupusers`
--

CREATE TABLE IF NOT EXISTS `toms_sys_groupusers` (
  `groupId` int(10) NOT NULL,
  `moduleId` int(10) NOT NULL,
  `access` int(11) NOT NULL,
  PRIMARY KEY (`groupId`,`moduleId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `toms_sys_groupusers`
--

TRUNCATE TABLE `toms_sys_groupusers`;
--
-- Dumping data for table `toms_sys_groupusers`
--

INSERT INTO `toms_sys_groupusers` (`groupId`, `moduleId`, `access`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(2, 3, 1),
(2, 4, 1),
(2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `toms_sys_module`
--

CREATE TABLE IF NOT EXISTS `toms_sys_module` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` varchar(11) NOT NULL,
  `parentName` varchar(20) NOT NULL,
  `menuName` varchar(50) NOT NULL,
  `moduleUrl` varchar(120) NOT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='system module';

--
-- Truncate table before insert `toms_sys_module`
--

TRUNCATE TABLE `toms_sys_module`;
--
-- Dumping data for table `toms_sys_module`
--

INSERT INTO `toms_sys_module` (`menuId`, `parentId`, `parentName`, `menuName`, `moduleUrl`) VALUES
(1, '0', '', 'Users', ''),
(2, '0', '', 'Configuration', ''),
(3, '0', '', 'Transfer Order', ''),
(4, '1', 'Users', 'User', 'user'),
(5, '1', 'Users', 'Group', 'group'),
(6, '2', 'Configuration', 'Location', 'location'),
(7, '3', 'Transfer Order', 'Create TO', 'transfer'),
(8, '3', 'Transfer Order', 'Received TO', 'received'),
(9, '3', 'Transfer Order', 'Transit TO', 'transit');

-- --------------------------------------------------------

--
-- Table structure for table `toms_sys_reftype`
--

CREATE TABLE IF NOT EXISTS `toms_sys_reftype` (
  `reftypeId` int(11) NOT NULL AUTO_INCREMENT,
  `reftypeCode` varchar(20) NOT NULL,
  `reftypeName` varchar(100) NOT NULL,
  `reftypeGroup` varchar(100) NOT NULL,
  PRIMARY KEY (`reftypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Referensi Type';

--
-- Truncate table before insert `toms_sys_reftype`
--

TRUNCATE TABLE `toms_sys_reftype`;
--
-- Dumping data for table `toms_sys_reftype`
--

INSERT INTO `toms_sys_reftype` (`reftypeId`, `reftypeCode`, `reftypeName`, `reftypeGroup`) VALUES
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
-- Table structure for table `toms_sys_users`
--

CREATE TABLE IF NOT EXISTS `toms_sys_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginname` varchar(20) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `locationId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastlogindate` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `locationId` (`locationId`),
  KEY `groupId` (`groupId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='users';

--
-- Truncate table before insert `toms_sys_users`
--

TRUNCATE TABLE `toms_sys_users`;
--
-- Dumping data for table `toms_sys_users`
--

INSERT INTO `toms_sys_users` (`id`, `loginname`, `firstname`, `lastname`, `locationId`, `groupId`, `password`, `lastlogindate`) VALUES
(1, 'admin', '', '', 0, 1, '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00'),
(2, 'user', '', '', 0, 1, 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00 00:00:00'),
(3, 'user1', '0', 'user', 0, 2, 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00 00:00:00'),
(4, 'user2', '0', 'Sales', 0, 1, 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `toms_trn_transfer_order`
--

CREATE TABLE IF NOT EXISTS `toms_trn_transfer_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toNumber` varchar(10) NOT NULL,
  `fromSite` int(11) DEFAULT NULL COMMENT 'lokasi awal',
  `toSite` int(11) DEFAULT NULL COMMENT 'lokasi tujuan',
  `categoryItem` int(11) DEFAULT NULL COMMENT 'tipe barang',
  `description` text NOT NULL COMMENT 'deskripsi barang yang dikirim',
  `qtyBarang` int(11) DEFAULT NULL COMMENT 'jml barang',
  `jmlTransit` int(1) NOT NULL COMMENT 'total transit',
  `created_by` varchar(20) NOT NULL,
  `userlocation_id` int(11) NOT NULL COMMENT 'user location',
  `created_at` datetime NOT NULL,
  `update_by` varchar(20) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDelete` int(1) NOT NULL COMMENT 'soft Delete',
  `statusTO` int(1) NOT NULL COMMENT 'status transfer order',
  PRIMARY KEY (`id`),
  KEY `fk_toms_trn_transfer_order_toms_mst_location1_idx` (`fromSite`),
  KEY `fk_toms_trn_transfer_order_toms_mst_location2_idx` (`toSite`),
  KEY `fk_toms_trn_transfer_order_toms_mst_category1_idx` (`categoryItem`),
  KEY `fk_toms_trn_transfer_order_toms_sys_reftype1_idx` (`statusTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Transfer Order';

--
-- Truncate table before insert `toms_trn_transfer_order`
--

TRUNCATE TABLE `toms_trn_transfer_order`;
-- --------------------------------------------------------

--
-- Table structure for table `toms_trn_transit`
--

CREATE TABLE IF NOT EXISTS `toms_trn_transit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transferId` int(11) NOT NULL,
  `statusTransit` int(11) DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `dateTransit` datetime DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_toms_trn_transit_toms_mst_location1_idx` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Transit TO';

--
-- Truncate table before insert `toms_trn_transit`
--

TRUNCATE TABLE `toms_trn_transit`;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `toms_sys_group`
--
ALTER TABLE `toms_sys_group`
  ADD CONSTRAINT `sys_groupusers` FOREIGN KEY (`groupId`) REFERENCES `toms_sys_groupusers` (`groupId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
