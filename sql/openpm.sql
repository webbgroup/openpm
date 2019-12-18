-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2015 at 11:40 AM
-- Server version: 5.5.44
-- PHP Version: 5.4.41-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `files`
--
DROP DATABASE `files`;
CREATE DATABASE `files` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `files`;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `fileId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uSite` enum('tci','aycr','sahq','pb') DEFAULT NULL,
  `uname` varchar(50) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `filename` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(100) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `projType` enum('poid','aid','fsid','commid','csid','fpid','vid','site','loan','prod','profile','resid','resintid','commintid','projectid','taskid') DEFAULT NULL,
  `projId` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fileOrder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `private` tinyint(1) unsigned DEFAULT '0',
  `uType` enum('user','group','broker','affiliate','company','project') NOT NULL DEFAULT 'user',
  `purchase` tinyint(1) unsigned DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fileId`),
  KEY `projType` (`projType`),
  KEY `projId` (`projId`),
  KEY `fileOrder` (`fileOrder`),
  KEY `uType` (`uType`),
  KEY `aycr_uid` (`uid`),
  KEY `purchase` (`purchase`),
  KEY `tci_uid` (`uSite`),
  KEY `filesize` (`filesize`),
  KEY `private` (`private`),
  KEY `uname` (`uname`),
  KEY `timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `picId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniqueId` varchar(10) NOT NULL,
  `uSite` enum('tci','aycr','sahq','pb') DEFAULT NULL,
  `uname` varchar(50) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `filename` varchar(200) NOT NULL DEFAULT '',
  `description` varchar(100) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `projType` enum('poid','aid','fsid','commid','csid','fpid','vid','site','loan','prod','profile','resid','resintid','commintid','projectid','taskid') DEFAULT NULL,
  `projId` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fileOrder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `private` tinyint(1) unsigned DEFAULT '0',
  `logo` tinyint(1) unsigned DEFAULT '0',
  `uType` enum('user','group','broker','affiliate','company','project') NOT NULL DEFAULT 'user',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`picId`),
  KEY `projType` (`projType`),
  KEY `projId` (`projId`),
  KEY `fileOrder` (`fileOrder`),
  KEY `uType` (`uType`),
  KEY `uSite` (`uSite`),
  KEY `logo` (`logo`),
  KEY `uid` (`uid`),
  KEY `filesize` (`filesize`),
  KEY `uname` (`uname`),
  KEY `private` (`private`),
  KEY `generalSearch` (`uSite`,`uid`,`uType`),
  KEY `logoSearch` (`uid`,`uSite`,`uType`,`logo`),
  KEY `logolinkuid` (`uType`,`projType`,`logo`,`uid`),
  KEY `logolinkuname` (`uType`,`projType`,`logo`,`uname`),
  KEY `projSearch` (`projType`,`projId`),
  KEY `timestamp` (`timestamp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
--
-- Database: `openpm`
--
DROP DATABASE `openpm`;
CREATE DATABASE `openpm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `openpm`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `email` varchar(20) NOT NULL,
  `number` int(12) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `profile_pic` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `number`, `profile_pic`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', NULL, ''),
--
-- Database: `properties`
--
DROP DATABASE `properties`;
CREATE DATABASE `properties` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `properties`;

-- --------------------------------------------------------

--
-- Table structure for table `comm_interior`
--

DROP TABLE IF EXISTS `comm_interior`;
CREATE TABLE IF NOT EXISTS `comm_interior` (
  `commIntId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uSite` enum('tci','aycr','sahq','pb') NOT NULL DEFAULT 'tci',
  `title` varchar(25) DEFAULT NULL,
  `description` text,
  `typeId` int(2) DEFAULT NULL,
  `typeId2` int(10) unsigned DEFAULT '0',
  `typeId3` int(10) unsigned DEFAULT '0',
  `featured` date NOT NULL DEFAULT '0000-00-00',
  `shown` int(11) NOT NULL DEFAULT '0',
  `clicked` int(11) NOT NULL DEFAULT '0',
  `contacted` int(10) unsigned NOT NULL DEFAULT '0',
  `sendToFriend` int(10) unsigned NOT NULL DEFAULT '0',
  `linked` int(10) unsigned DEFAULT NULL,
  `status` enum('Incomplete','Active','Closed','Contingent','Contingent Accepting Backup Offers','Expired','Pending','Pending Accepting Backup Offers','Temporary Off Market','Withdrawn') DEFAULT 'Active',
  `parentId` int(10) unsigned DEFAULT NULL,
  `suite` varchar(10) DEFAULT '',
  `leasetype` varchar(16) DEFAULT '0',
  `available` date DEFAULT '0000-00-00',
  `price` decimal(12,2) unsigned DEFAULT '0.00',
  `rentType` enum('$/Year','$/Month','$/SF/Year','$/SF/Month') DEFAULT NULL,
  `yearAmt` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `yearFeet` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `monthAmt` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `monthFeet` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `leaseTerm` int(3) DEFAULT '0',
  `subleasedate` date DEFAULT NULL,
  `procurement` int(5) DEFAULT NULL,
  `parkingspaces` int(5) DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `numfloors` tinyint(4) DEFAULT '1',
  `sqfeet` int(10) unsigned DEFAULT '0',
  `mindivisible` int(10) unsigned DEFAULT '0',
  `maxcontiguous` int(10) unsigned DEFAULT '0',
  `dockdoors` int(5) DEFAULT '0',
  `gradedoors` int(5) DEFAULT '0',
  `taxes` int(10) unsigned DEFAULT '0',
  `opexpenses` decimal(10,0) DEFAULT '0',
  `rail` tinyint(1) DEFAULT '0',
  `fenced` tinyint(1) DEFAULT '0',
  `cranes` tinyint(1) DEFAULT '0',
  `trailerparking` tinyint(1) DEFAULT '0',
  `sprinklers` tinyint(1) DEFAULT '0',
  `power` varchar(30) DEFAULT NULL,
  `ceilingheight` int(3) DEFAULT '0',
  `officespace` int(10) unsigned DEFAULT '0',
  `cooling` varchar(30) DEFAULT '',
  `lighting` enum('Fluorescent','Incandescent','Halogen') DEFAULT 'Fluorescent',
  `heating` enum('Gas','Oil','Heat pump') DEFAULT 'Gas',
  `act` smallint(1) DEFAULT '1',
  `pbwordlist` text NOT NULL,
  `pbrank` decimal(10,4) unsigned NOT NULL DEFAULT '0.0000',
  `datePosted` date NOT NULL DEFAULT '0000-00-00',
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forSale` tinyint(1) unsigned DEFAULT '0',
  `leaseDuration` enum('Day(s)','Week(s)','Month(s)','Year(s)') DEFAULT NULL,
  `internet` tinyint(1) unsigned DEFAULT '0',
  `wheelchair` tinyint(1) unsigned DEFAULT '0',
  `domainLink` varchar(255) NOT NULL,
  `domainId` varchar(50) NOT NULL,
  PRIMARY KEY (`commIntId`),
  KEY `price` (`price`),
  KEY `available` (`available`),
  KEY `wheelchair` (`wheelchair`),
  KEY `commid` (`parentId`),
  KEY `cooling` (`cooling`),
  KEY `featured` (`featured`),
  KEY `mindivisible` (`mindivisible`),
  KEY `dateposted` (`datePosted`),
  KEY `typeId` (`typeId`),
  KEY `heating` (`heating`),
  KEY `forSale` (`forSale`),
  KEY `act` (`act`),
  KEY `typeId2` (`typeId2`),
  KEY `typeId3` (`typeId3`),
  KEY `sqfeet` (`sqfeet`),
  KEY `maxcontiguous` (`maxcontiguous`),
  KEY `lighting` (`lighting`),
  KEY `renttype` (`rentType`),
  KEY `pbrank` (`pbrank`),
  KEY `domainId` (`domainId`) USING BTREE,
  KEY `domainLink` (`domainLink`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

-- --------------------------------------------------------

--
-- Table structure for table `commercial`
--

DROP TABLE IF EXISTS `commercial`;
CREATE TABLE IF NOT EXISTS `commercial` (
  `commId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniqueId` varchar(7) DEFAULT NULL,
  `title` varchar(25) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `address2` varchar(25) DEFAULT '',
  `localityId` int(10) unsigned DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `provinceId` int(10) unsigned DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `postalcodeId` int(10) unsigned DEFAULT NULL,
  `zip` mediumint(5) unsigned zerofill DEFAULT NULL,
  `loc_match` tinyint(1) unsigned DEFAULT '0',
  `longitude` float DEFAULT '0',
  `latitude` float DEFAULT '0',
  `price` decimal(12,0) DEFAULT '0',
  `rentType` enum('$/Year','$/Month','$/SF/Year','$/SF/Month') DEFAULT NULL,
  `leaseType` varchar(16) DEFAULT NULL,
  `leaseTerm` int(3) unsigned DEFAULT NULL,
  `procurement` int(5) unsigned DEFAULT NULL,
  `leaseDuration` enum('Day(s)','Week(s)','Month(s)','Year(s)') DEFAULT NULL,
  `featured` date DEFAULT '0000-00-00',
  `shown` int(11) DEFAULT '0',
  `clicked` int(11) DEFAULT '0',
  `contacted` int(10) unsigned NOT NULL DEFAULT '0',
  `sendToFriend` int(10) unsigned NOT NULL DEFAULT '0',
  `linked` int(10) unsigned DEFAULT NULL,
  `description` text,
  `typeId` int(11) DEFAULT NULL,
  `typeId2` int(10) unsigned DEFAULT '0',
  `typeId3` int(10) unsigned DEFAULT '0',
  `status` enum('Incomplete','Active','Closed','Contingent','Contingent Accepting Backup Offers','Expired','Pending','Pending Accepting Backup Offers','Temporary Off Market','Withdrawn') DEFAULT NULL,
  `datePosted` datetime DEFAULT NULL,
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pbwordlist` text NOT NULL,
  `pbrank` decimal(10,4) unsigned NOT NULL DEFAULT '0.0000',
  `pbdelist` tinyint(3) unsigned DEFAULT '0',
  `aff_uid` int(10) unsigned DEFAULT '0',
  `notes` varchar(100) DEFAULT NULL,
  `numfloors` tinyint(4) DEFAULT '1',
  `sqfeet` int(10) unsigned DEFAULT '0',
  `lotsize` decimal(13,4) unsigned DEFAULT '0.0000',
  `useacreage` tinyint(1) DEFAULT '0',
  `trafficcount` int(10) unsigned DEFAULT '0',
  `parkingratio` int(5) unsigned DEFAULT '0',
  `zoning` varchar(30) DEFAULT '',
  `yearbuilt` int(4) DEFAULT NULL,
  `act` tinyint(1) DEFAULT '1',
  `available` date DEFAULT '0000-00-00',
  `uId` int(10) unsigned NOT NULL DEFAULT '0',
  `uSite` enum('tci','aycr','sahq','pb') NOT NULL DEFAULT 'tci',
  `forSale` tinyint(1) DEFAULT '0',
  `country` varchar(30) DEFAULT NULL,
  `countryId` int(10) unsigned NOT NULL,
  `garageSize` char(2) DEFAULT NULL,
  `financingDetails` varchar(250) DEFAULT NULL,
  `tax` int(10) unsigned DEFAULT '0',
  `groundLease` varchar(100) DEFAULT NULL,
  `noi` int(10) unsigned DEFAULT '0',
  `goi` int(10) unsigned DEFAULT '0',
  `cap` decimal(5,3) unsigned DEFAULT '0.000',
  `class` char(1) DEFAULT NULL,
  `mls` varchar(20) DEFAULT NULL,
  `fmv` decimal(10,0) DEFAULT NULL,
  `numUnits` int(4) DEFAULT NULL,
  `domainName` varchar(75) NOT NULL,
  `domainId` varchar(50) NOT NULL,
  `domainLink` varchar(255) DEFAULT NULL,
  `contactPhone` varchar(50) DEFAULT NULL,
  `contactEmail` varchar(50) DEFAULT NULL,
  `contactName` varchar(50) DEFAULT NULL,
  `bulkfeed` tinyint(3) unsigned NOT NULL,
  `occupancy` int(3) DEFAULT NULL,
  `parkingSpaces` int(10) unsigned DEFAULT NULL,
  `lawnSprinklers` tinyint(1) unsigned DEFAULT '0',
  `courtyard` tinyint(1) unsigned DEFAULT '0',
  `fenced` tinyint(1) unsigned DEFAULT '0',
  `leaseOp` tinyint(1) unsigned DEFAULT '0',
  `opExpenses` int(10) unsigned DEFAULT NULL,
  `cranes` tinyint(1) unsigned DEFAULT '0',
  `dockDoors` tinyint(1) unsigned DEFAULT '0',
  `gradeDoors` tinyint(1) unsigned DEFAULT '0',
  `rail` tinyint(1) unsigned DEFAULT '0',
  `trailerParking` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`commId`),
  UNIQUE KEY `uniqueId` (`uniqueId`),
  KEY `uId` (`uId`),
  KEY `leaseOp` (`leaseOp`),
  KEY `act` (`act`),
  KEY `MAT_LON` (`longitude`),
  KEY `pbrank` (`pbrank`),
  KEY `MAT_LAT` (`latitude`),
  KEY `typeId2` (`typeId2`),
  KEY `typeId3` (`typeId3`),
  KEY `status` (`status`),
  KEY `forSale` (`forSale`),
  KEY `date` (`available`),
  KEY `fmv` (`fmv`),
  KEY `yearbuilt` (`yearbuilt`),
  KEY `state` (`state`),
  KEY `aff_uid` (`aff_uid`),
  KEY `city` (`city`),
  KEY `zoning` (`zoning`),
  KEY `zip` (`zip`),
  KEY `price` (`price`),
  KEY `class` (`class`),
  KEY `uSite` (`uSite`),
  KEY `rail` (`rail`),
  KEY `mls` (`mls`),
  KEY `featured` (`featured`),
  KEY `lotsize` (`lotsize`),
  KEY `sqfeet` (`sqfeet`),
  KEY `typeId` (`typeId`),
  KEY `domainId` (`domainLink`),
  KEY `domainName` (`domainName`),
  KEY `datePosted` (`datePosted`),
  KEY `dateUpdated` (`dateUpdated`),
  KEY `generalsearch` (`city`,`state`,`zip`,`typeId`,`typeId2`,`typeId3`,`pbrank`,`act`,`uId`,`forSale`),
  KEY `bulkFeed` (`bulkfeed`),
  KEY `addresssearch` (`address`,`city`,`state`,`zip`,`uId`),
  KEY `quickSaleActSearch` (`uId`,`forSale`,`act`),
  KEY `contactEmail` (`contactEmail`),
  KEY `quickSaleActEmailSearch` (`act`,`contactEmail`,`forSale`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `res_interior`
--

DROP TABLE IF EXISTS `res_interior`;
CREATE TABLE IF NOT EXISTS `res_interior` (
  `resIntId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uSite` enum('tci','aycr','sahq','pb') NOT NULL DEFAULT 'tci',
  `title` varchar(25) DEFAULT NULL,
  `price` decimal(12,2) unsigned DEFAULT '0.00',
  `rentType` enum('$/Day','$/Week','$/BiWeek','$/Month') DEFAULT NULL,
  `description` text,
  `typeId` int(11) DEFAULT NULL,
  `typeId2` int(10) unsigned DEFAULT '0',
  `typeId3` int(10) unsigned DEFAULT '0',
  `beds` char(2) DEFAULT NULL,
  `baths` char(3) DEFAULT NULL,
  `featured` date NOT NULL DEFAULT '0000-00-00',
  `shown` int(10) unsigned NOT NULL DEFAULT '0',
  `clicked` int(10) unsigned NOT NULL DEFAULT '0',
  `contacted` int(10) unsigned NOT NULL DEFAULT '0',
  `sendToFriend` int(10) unsigned NOT NULL DEFAULT '0',
  `linked` int(10) unsigned DEFAULT NULL,
  `status` enum('Incomplete','Active','Closed','Contingent','Contingent Accepting Backup Offers','Expired','Pending','Pending Accepting Backup Offers','Temporary Off Market','Withdrawn') DEFAULT 'Active',
  `aid` int(10) unsigned DEFAULT NULL,
  `poid` int(10) unsigned DEFAULT '0',
  `air` char(1) DEFAULT NULL,
  `alarm` char(1) DEFAULT NULL,
  `balcony` char(1) DEFAULT NULL,
  `cable` char(1) DEFAULT NULL,
  `carpeted` char(1) DEFAULT NULL,
  `dishwasher` char(1) DEFAULT NULL,
  `disposal` char(1) DEFAULT NULL,
  `fireplace` char(1) DEFAULT NULL,
  `gasstove` char(1) DEFAULT NULL,
  `hardwood` char(1) DEFAULT NULL,
  `microwave` char(1) DEFAULT NULL,
  `waterfront` char(1) DEFAULT NULL,
  `patio` char(1) DEFAULT NULL,
  `wdIncluded` char(1) DEFAULT NULL,
  `wdConnections` char(1) DEFAULT NULL,
  `wheelchair` char(1) DEFAULT NULL,
  `refrig` char(1) DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `numfloors` tinyint(4) DEFAULT '1',
  `sqfeet` decimal(11,0) DEFAULT '0',
  `garagesize` varchar(30) DEFAULT NULL,
  `act` tinyint(1) DEFAULT '1',
  `secDep` decimal(10,0) DEFAULT '0',
  `windowUnits` smallint(6) DEFAULT '0',
  `vaulted` tinyint(1) DEFAULT '0',
  `datePosted` date NOT NULL DEFAULT '0000-00-00',
  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pbwordlist` text NOT NULL,
  `pbrank` float unsigned DEFAULT '1',
  `forSale` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `parentId` int(10) unsigned NOT NULL DEFAULT '0',
  `leaseDuration` enum('Day(s)','Week(s)','Month(s)','Year(s)') DEFAULT NULL,
  `heating` varchar(30) NOT NULL DEFAULT '',
  `internet` tinyint(1) unsigned DEFAULT '0',
  `leaseTerm` int(10) unsigned DEFAULT NULL,
  `subleaseDate` date DEFAULT '0000-00-00',
  `available` date DEFAULT '0000-00-00',
  `domainLink` varchar(255) DEFAULT NULL,
  `domainId` varchar(50) NOT NULL,
  PRIMARY KEY (`resIntId`),
  KEY `status` (`status`),
  KEY `forSale` (`forSale`),
  KEY `datePosted` (`datePosted`),
  KEY `vaulted` (`vaulted`),
  KEY `aid` (`aid`),
  KEY `wdConnections` (`wdConnections`),
  KEY `balcony` (`balcony`),
  KEY `wdIncluded` (`wdIncluded`),
  KEY `act` (`act`),
  KEY `typeId2` (`typeId2`),
  KEY `hardwood` (`hardwood`),
  KEY `typeId3` (`typeId3`),
  KEY `fireplace` (`fireplace`),
  KEY `gasstove` (`gasstove`),
  KEY `baths` (`baths`),
  KEY `numfloors` (`numfloors`),
  KEY `parentId` (`parentId`),
  KEY `wheelchair` (`wheelchair`),
  KEY `leaseTerm` (`leaseTerm`),
  KEY `garagesize` (`garagesize`),
  KEY `featured` (`featured`),
  KEY `air` (`air`),
  KEY `refrig` (`refrig`),
  KEY `subleaseDate` (`subleaseDate`),
  KEY `cable` (`cable`),
  KEY `dishwasher` (`dishwasher`),
  KEY `poid` (`poid`),
  KEY `typeId` (`typeId`),
  KEY `carpeted` (`carpeted`),
  KEY `patio` (`patio`),
  KEY `available` (`available`),
  KEY `microwave` (`microwave`),
  KEY `price` (`price`),
  KEY `leaseDuration` (`leaseDuration`),
  KEY `pbrank` (`pbrank`),
  KEY `alarm` (`alarm`),
  KEY `waterfont` (`waterfront`),
  KEY `beds` (`beds`),
  KEY `domainId` (`domainId`) USING BTREE,
  KEY `domainLink` (`domainLink`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `residential`
--

DROP TABLE IF EXISTS `residential`;
CREATE TABLE IF NOT EXISTS `residential` (
  `resId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniqueId` varchar(7) DEFAULT NULL,
  `title` varchar(25) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `address2` varchar(25) DEFAULT '',
  `localityId` int(10) unsigned DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `provinceId` int(10) unsigned DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `postalcodeId` int(10) unsigned DEFAULT NULL,
  `zip` mediumint(5) unsigned zerofill DEFAULT NULL,
  `loc_match` tinyint(1) unsigned DEFAULT '0',
  `longitude` float DEFAULT '0',
  `latitude` float DEFAULT '0',
  `price` decimal(12,0) DEFAULT '0',
  `featured` date DEFAULT '0000-00-00',
  `shown` int(11) DEFAULT '0',
  `clicked` int(11) DEFAULT '0',
  `contacted` int(10) unsigned NOT NULL DEFAULT '0',
  `sendToFriend` int(10) unsigned NOT NULL DEFAULT '0',
  `linked` int(10) unsigned DEFAULT NULL,
  `description` text,
  `typeId` int(11) DEFAULT NULL,
  `typeId2` int(10) unsigned DEFAULT '0',
  `typeId3` int(10) unsigned DEFAULT '0',
  `beds` int(11) DEFAULT NULL,
  `baths` float DEFAULT NULL,
  `status` enum('Incomplete','Active','Closed','Contingent','Contingent Accepting Backup Offers','Expired','Pending','Pending Accepting Backup Offers','Temporary Off Market','Withdrawn') DEFAULT NULL,
  `datePosted` datetime DEFAULT NULL,
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pbwordlist` text,
  `pbrank` decimal(10,4) unsigned DEFAULT '0.0000',
  `pbdelist` tinyint(3) unsigned DEFAULT '0',
  `neighborhood` varchar(25) DEFAULT NULL,
  `waterfront` char(1) DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `numfloors` tinyint(4) DEFAULT '1',
  `yearbuilt` smallint(4) unsigned DEFAULT NULL,
  `lotsize` decimal(13,4) unsigned DEFAULT '0.0000',
  `garagesize` varchar(30) DEFAULT NULL,
  `tax` decimal(10,0) DEFAULT '0',
  `tpgas` char(1) DEFAULT '0',
  `tpelectricity` char(1) DEFAULT '0',
  `tpwater` char(1) DEFAULT '0',
  `tpcable` char(1) DEFAULT '0',
  `tptrash` char(1) DEFAULT '0',
  `leaseOp` tinyint(1) unsigned DEFAULT '0',
  `country` varchar(100) DEFAULT NULL,
  `countryId` int(10) unsigned NOT NULL,
  `act` tinyint(1) DEFAULT '1',
  `sec8` char(1) DEFAULT NULL,
  `refrig` char(1) DEFAULT NULL,
  `secdep` decimal(10,0) DEFAULT '0',
  `avail` date DEFAULT '0000-00-00',
  `internet` tinyint(1) DEFAULT '0',
  `pets` tinyint(1) DEFAULT '0',
  `petDeposit` int(11) DEFAULT '0',
  `petPolicy` varchar(100) DEFAULT '',
  `appFee` smallint(6) DEFAULT '0',
  `elemSchool` varchar(50) DEFAULT '',
  `midSchool` varchar(50) DEFAULT '',
  `highSchool` varchar(50) DEFAULT '',
  `fitness` tinyint(1) unsigned DEFAULT '0',
  `golf` tinyint(1) unsigned DEFAULT '0',
  `pool` tinyint(1) unsigned DEFAULT '0',
  `spa` tinyint(1) unsigned DEFAULT '0',
  `sports` tinyint(1) unsigned DEFAULT '0',
  `tennis` tinyint(1) unsigned DEFAULT '0',
  `bikePath` tinyint(1) unsigned DEFAULT '0',
  `boating` tinyint(1) unsigned DEFAULT '0',
  `courtyard` tinyint(1) unsigned DEFAULT '0',
  `playground` tinyint(1) unsigned DEFAULT '0',
  `clubhouse` tinyint(1) unsigned DEFAULT '0',
  `gated` tinyint(1) unsigned DEFAULT '0',
  `publicTrans` tinyint(1) unsigned DEFAULT '0',
  `assocFee` tinyint(1) unsigned DEFAULT '0',
  `uId` int(10) unsigned NOT NULL DEFAULT '0',
  `uSite` enum('tci','aycr','sahq','pb') NOT NULL DEFAULT 'tci',
  `useAcreage` tinyint(1) unsigned DEFAULT NULL,
  `financingDetails` varchar(250) DEFAULT NULL,
  `groundLease` tinyint(1) unsigned DEFAULT NULL,
  `noi` int(10) unsigned DEFAULT NULL,
  `goi` int(10) unsigned DEFAULT NULL,
  `cap` decimal(5,3) unsigned DEFAULT '0.000',
  `forSale` tinyint(1) unsigned DEFAULT NULL,
  `onSiteLaundry` tinyint(1) unsigned DEFAULT '0',
  `slogan` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `fax` varchar(14) DEFAULT NULL,
  `commPool` tinyint(1) unsigned DEFAULT '0',
  `fmv` int(10) unsigned DEFAULT '0',
  `mls` varchar(25) DEFAULT NULL,
  `sqFeet` int(10) unsigned DEFAULT '0',
  `occupancy` decimal(5,2) unsigned DEFAULT '0.00',
  `parkingSpaces` int(10) unsigned DEFAULT NULL,
  `lawnSprinklers` tinyint(1) unsigned DEFAULT '0',
  `fenced` tinyint(1) unsigned DEFAULT '0',
  `opExpenses` int(10) unsigned DEFAULT NULL,
  `zoning` varchar(30) DEFAULT NULL,
  `available` date DEFAULT '0000-00-00',
  `numUnits` int(11) DEFAULT NULL,
  `domainName` varchar(75) NOT NULL,
  `domainId` varchar(50) NOT NULL,
  `domainLink` varchar(255) DEFAULT NULL,
  `contactPhone` varchar(50) DEFAULT NULL,
  `contactEmail` varchar(50) DEFAULT NULL,
  `contactName` varchar(50) DEFAULT NULL,
  `bulkfeed` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`resId`),
  UNIQUE KEY `uniqueId` (`uniqueId`),
  KEY `sqFeet` (`sqFeet`),
  KEY `baths` (`baths`),
  KEY `avail` (`avail`),
  KEY `publicTrans` (`publicTrans`),
  KEY `onSiteLaundry` (`onSiteLaundry`),
  KEY `waterfront` (`waterfront`),
  KEY `forSale` (`forSale`),
  KEY `act` (`act`),
  KEY `zip` (`zip`),
  KEY `beds` (`beds`),
  KEY `internet` (`internet`),
  KEY `tpelectricity` (`tpelectricity`),
  KEY `commPool` (`commPool`),
  KEY `tennis` (`tennis`),
  KEY `tpgas` (`tpgas`),
  KEY `sec8` (`sec8`),
  KEY `yearbuilt` (`yearbuilt`),
  KEY `state` (`state`),
  KEY `spa` (`spa`),
  KEY `lotsize` (`lotsize`),
  KEY `secdep` (`secdep`),
  KEY `gated` (`gated`),
  KEY `available` (`available`),
  KEY `featured` (`featured`),
  KEY `goi` (`goi`),
  KEY `typeId` (`typeId`),
  KEY `bikePath` (`bikePath`),
  KEY `pets` (`pets`),
  KEY `tpwater` (`tpwater`),
  KEY `uId` (`uId`),
  KEY `pbrank` (`pbrank`),
  KEY `city` (`city`),
  KEY `price` (`price`),
  KEY `cap` (`cap`),
  KEY `pool` (`pool`),
  KEY `golf` (`golf`),
  KEY `tptrash` (`tptrash`),
  KEY `uSite` (`uSite`),
  KEY `MAT_LON` (`longitude`),
  KEY `MAT_LAT` (`latitude`),
  KEY `typeId2` (`typeId2`),
  KEY `noi` (`noi`),
  KEY `opExpenses` (`opExpenses`),
  KEY `typeId3` (`typeId3`),
  KEY `tpcable` (`tpcable`),
  KEY `leaseop` (`leaseOp`),
  KEY `domainName` (`domainName`),
  KEY `datePosted` (`datePosted`),
  KEY `dateUpdated` (`dateUpdated`),
  KEY `generalsearch` (`city`,`state`,`beds`,`baths`,`forSale`,`typeId`,`pbrank`,`act`,`price`,`sqFeet`,`uId`),
  KEY `bulkFeed` (`bulkfeed`),
  KEY `addresssearch` (`address`,`city`,`state`,`zip`,`uId`),
  KEY `quickSaleActSearch` (`uId`,`forSale`,`act`),
  KEY `contactEmail` (`contactEmail`),
  KEY `quickSaleActEmailSearch` (`act`,`contactEmail`,`forSale`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `typeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `residential` tinyint(1) DEFAULT '0',
  `commercial` tinyint(1) DEFAULT '0',
  `forrent` tinyint(1) DEFAULT '0',
  `interior` tinyint(1) DEFAULT '0',
  `exterior` tinyint(4) DEFAULT '0',
  `finance` tinyint(1) DEFAULT '0',
  `minspaces` tinyint(1) DEFAULT '1',
  `maxspaces` int(11) DEFAULT '0',
  `apartment` tinyint(4) DEFAULT '0',
  `parentId` int(11) unsigned DEFAULT '0',
  `description` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`typeId`),
  KEY `apartment` (`apartment`),
  KEY `interior` (`interior`),
  KEY `minspaces` (`minspaces`),
  KEY `finance` (`finance`),
  KEY `maxspaces` (`maxspaces`),
  KEY `parentId` (`parentId`),
  KEY `forrent` (`forrent`),
  KEY `exterior` (`exterior`),
  KEY `residential` (`residential`),
  KEY `commercial` (`commercial`),
  KEY `description` (`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeId`, `residential`, `commercial`, `forrent`, `interior`, `exterior`, `finance`, `minspaces`, `maxspaces`, `apartment`, `parentId`, `description`) VALUES
(1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 'Assembly'),
(2, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 'Retail'),
(3, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 'Health Care'),
(4, 0, 1, 1, 0, 1, 1, 1, 0, 0, 0, 'Lodging'),
(5, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 'Industrial'),
(6, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 'Office'),
(7, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 'Sports and Leisure'),
(8, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 'Land'),
(9, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 'Apartments and Multifamily'),
(10, 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 'Construction'),
(11, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 'Single Family Home'),
(12, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 'Church'),
(13, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 'Theater / Live'),
(14, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 'Theater / Movie'),
(15, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 'Assembly Hall'),
(16, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 'Auditorium'),
(17, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 'Night Club'),
(18, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 'Restaurant'),
(19, 0, 1, 1, 1, 1, 1, 1, 0, 0, 2, 'Street Retail'),
(20, 0, 1, 1, 1, 1, 1, 1, 0, 0, 2, 'Shopping Mall'),
(21, 0, 1, 1, 1, 1, 1, 1, 0, 0, 3, 'Nursing Home'),
(22, 0, 1, 1, 1, 1, 1, 1, 0, 0, 3, 'Extended Care'),
(23, 0, 1, 1, 1, 1, 1, 1, 0, 0, 3, 'Hospital'),
(24, 0, 1, 1, 1, 1, 1, 1, 0, 0, 3, 'Short-term'),
(25, 0, 1, 1, 1, 1, 1, 1, 0, 0, 4, 'Hotel'),
(26, 0, 1, 1, 1, 1, 1, 1, 0, 0, 4, 'Motel'),
(27, 0, 1, 1, 1, 1, 1, 1, 0, 0, 4, 'Bed And Breakfast'),
(28, 0, 1, 1, 1, 1, 1, 1, 0, 0, 5, 'Warehouse'),
(29, 0, 1, 1, 1, 1, 1, 1, 0, 0, 5, 'Manufacturing Plant'),
(30, 0, 1, 1, 1, 1, 1, 1, 0, 0, 5, 'Artisan Studio'),
(31, 0, 1, 1, 1, 1, 1, 1, 0, 0, 5, 'Research And Development'),
(32, 0, 1, 1, 1, 1, 1, 1, 0, 0, 5, 'Garage / Automotive'),
(33, 0, 1, 1, 1, 1, 1, 1, 0, 0, 6, 'Central Business District'),
(34, 0, 1, 1, 1, 1, 1, 1, 0, 0, 6, 'Neighborhood'),
(35, 0, 1, 1, 1, 1, 1, 1, 0, 0, 6, 'Suburban'),
(36, 0, 1, 1, 1, 1, 1, 1, 0, 0, 7, 'Golf'),
(37, 0, 1, 1, 1, 1, 1, 1, 0, 0, 7, 'Tennis'),
(38, 0, 1, 1, 1, 1, 1, 1, 0, 0, 7, 'Marina'),
(39, 0, 1, 1, 1, 1, 1, 1, 0, 0, 7, 'Bowling'),
(40, 0, 1, 1, 1, 1, 1, 1, 0, 0, 7, 'Mini-golf'),
(41, 0, 1, 1, 1, 1, 1, 1, 0, 0, 7, 'Baseball'),
(42, 0, 1, 1, 1, 1, 1, 1, 0, 0, 7, 'Soccer'),
(43, 0, 1, 1, 1, 1, 1, 1, 0, 0, 7, 'Hockey'),
(44, 0, 1, 1, 1, 1, 1, 1, 0, 0, 7, 'Mixed-sport Center'),
(45, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Zoned Commercial'),
(46, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Zoned Residential'),
(47, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Zoned Industrial'),
(48, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Zoned Office'),
(49, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Zoned Retail'),
(50, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Agricultural'),
(51, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Mining'),
(52, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Forest'),
(53, 1, 0, 1, 1, 1, 1, 1, 2, 0, 9, 'Duplex'),
(54, 1, 0, 1, 1, 1, 1, 1, 3, 0, 9, 'Triplex'),
(55, 1, 0, 1, 1, 1, 1, 1, 4, 0, 9, 'Quadruplex'),
(67, 0, 1, 1, 1, 1, 1, 5, 15, 1, 9, 'Complex / 5-15 Units'),
(56, 0, 1, 1, 1, 1, 1, 16, 100, 1, 9, 'Complex / 16-100 Units'),
(57, 0, 1, 1, 1, 1, 1, 100, 0, 1, 9, 'Complex / 100+ Units'),
(58, 0, 0, 0, 0, 0, 1, 1, 0, 0, 10, 'Residential Unit'),
(59, 0, 0, 0, 0, 0, 1, 1, 0, 0, 10, 'Residential Rehab'),
(60, 1, 0, 1, 1, 1, 1, 1, 1, 0, 11, 'Detached'),
(61, 1, 0, 1, 1, 1, 1, 1, 1, 0, 11, 'Townhouse'),
(62, 1, 0, 1, 1, 1, 1, 1, 1, 0, 11, 'Row House'),
(63, 1, 0, 1, 1, 1, 0, 1, 1, 0, 11, 'Condo'),
(64, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 'School'),
(65, 0, 1, 1, 1, 1, 1, 1, 0, 0, 5, 'Flex Space'),
(66, 0, 1, 1, 1, 1, 1, 1, 0, 0, 6, 'Business Campus'),
(68, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Zoned Institutional'),
(69, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Zoned Golf Course'),
(70, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Zoned Age Restricted'),
(71, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Zoned Mobile Home'),
(72, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Zoned Mixed Use'),
(73, 0, 1, 1, 0, 1, 1, 1, -1, 0, 8, 'Zoned Multifamily'),
(74, 0, 1, 1, 1, 1, 1, 1, -1, 0, 9, 'Mobile Home Park'),
(75, 1, 0, 1, 1, 1, 0, 1, 0, 0, 0, 'Manufactured Housing'),
(76, 1, 0, 1, 1, 1, 0, 1, 1, 0, 75, 'Mobile Home'),
(77, 1, 0, 1, 1, 1, 0, 1, 1, 0, 75, 'Doublewide'),
(78, 1, 0, 1, 1, 1, 0, 1, 1, 0, 75, 'Modular'),
(79, 0, 1, 1, 1, 1, 1, 1, 0, 0, 2, 'Strip Center / Unanchored'),
(80, 0, 1, 1, 1, 1, 1, 1, 0, 0, 2, 'Outlot'),
(81, 0, 1, 1, 1, 1, 1, 1, 0, 0, 2, 'Strip Center / Anchored'),
(82, 1, 0, 1, 1, 0, 0, 1, 0, 0, 9, 'Studio'),
(83, 1, 0, 1, 1, 0, 0, 1, 0, 0, 9, 'Loft'),
(84, 1, 0, 1, 1, 0, 0, 1, 1, 0, 9, '1 Bedroom'),
(85, 1, 0, 1, 1, 0, 0, 1, 2, 0, 9, '2 Bedroom'),
(86, 1, 0, 1, 1, 0, 0, 1, 3, 0, 9, '3 Bedroom'),
(87, 1, 0, 1, 1, 0, 0, 1, 0, 0, 9, '4+ Bedroom'),
(88, 1, 0, 0, 1, 0, 0, 1, 0, 0, 9, 'Co-op'),
(89, 0, 1, 0, 0, 0, 1, 1, 0, 0, 10, 'Residential 2 or More Units'),
(90, 0, 1, 0, 0, 0, 1, 1, 0, 0, 10, 'Commercial Rehab'),
(91, 0, 1, 0, 0, 0, 1, 1, 0, 0, 10, 'Commercial Unit'),
(92, 0, 1, 0, 0, 0, 1, 1, 0, 0, 10, 'Commercial 2 or More Units'),
(93, 0, 1, 1, 1, 1, 1, 1, 0, 0, 5, 'Distribution'),
(94, 0, 1, 1, 1, 1, 1, 1, 0, 0, 6, 'Medical'),
(95, 0, 1, 1, 1, 1, 1, 1, 0, 0, 6, 'General / Flex'),
(96, 0, 1, 1, 1, 1, 1, 1, 0, 0, 6, 'Condo'),
(97, 0, 1, 1, 1, 1, 1, 1, 0, 0, 6, 'Showroom'),
(98, 0, 1, 0, 1, 1, 1, 1, 0, 0, 2, 'Storage'),
(99, 1, 1, 1, 0, 1, 1, 1, 0, 0, 0, 'Agricultural'),
(100, 1, 1, 1, 0, 1, 1, 1, -1, 0, 99, 'Farm'),
(101, 1, 1, 1, 0, 1, 1, 1, -1, 0, 99, 'Ranch'),
(102, 0, 1, 1, 0, 1, 1, 1, -1, 0, 99, 'Timberland');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
CREATE TABLE `pages` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `page_key` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `file_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`,`page_key`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `configuration` (
  `cid` tinyint(3) NOT NULL AUTO_INCREMENT,
  `ckey` varchar(20) NOT NULL,
  `cvalue` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `ckey_idx` (`ckey`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;