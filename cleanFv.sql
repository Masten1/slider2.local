-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2013 at 03:15 PM
-- Server version: 5.5.30
-- PHP Version: 5.3.23-1~dotdeb.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `avtovektor`
--

-- --------------------------------------------------------

--
-- Table structure for table `empAdvertise`
--

CREATE TABLE IF NOT EXISTS `empAdvertise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `weight` int(10) unsigned NOT NULL,
  `isActive` tinyint(1) unsigned NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `empAdvertise`
--


-- --------------------------------------------------------

--
-- Table structure for table `empConfig`
--

CREATE TABLE IF NOT EXISTS `empConfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(64) NOT NULL DEFAULT '',
  `value` varchar(64) DEFAULT NULL,
  `mtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `empConfig`
--


-- --------------------------------------------------------

--
-- Table structure for table `empDictionary`
--

CREATE TABLE IF NOT EXISTS `empDictionary` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `keyword` (`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `empDictionary`
--


-- --------------------------------------------------------

--
-- Table structure for table `empDictionaryLang`
--

CREATE TABLE IF NOT EXISTS `empDictionaryLang` (
  `id` int(11) unsigned NOT NULL,
  `languageId` int(11) unsigned NOT NULL,
  `translation` text NOT NULL,
  UNIQUE KEY `index3` (`id`,`languageId`),
  KEY `FK_empDictionaryLang_empLanguages` (`languageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empDictionaryLang`
--


-- --------------------------------------------------------

--
-- Table structure for table `empDomain`
--

CREATE TABLE IF NOT EXISTS `empDomain` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT 'имя домена',
  `weight` tinyint(3) unsigned DEFAULT '0',
  `isActive` int(1) unsigned NOT NULL DEFAULT '1' COMMENT 'активен',
  `ctime` datetime NOT NULL COMMENT 'создан',
  `mtime` datetime NOT NULL COMMENT 'изменен',
  `isDefault` int(1) unsigned NOT NULL DEFAULT '0' COMMENT 'по умолчанию',
  `creatorId` int(11) unsigned DEFAULT NULL COMMENT 'по умолчанию',
  `modifierId` int(11) unsigned DEFAULT NULL COMMENT 'по умолчанию',
  PRIMARY KEY (`id`),
  KEY `FK_empDomain_empUsers` (`creatorId`),
  KEY `FK_empDomain_empUsers_2` (`modifierId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `empDomain`
--

INSERT INTO `empDomain` (`id`, `url`, `weight`, `isActive`, `ctime`, `mtime`, `isDefault`, `creatorId`, `modifierId`) VALUES
(1, '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `empFeedback`
--

CREATE TABLE IF NOT EXISTS `empFeedback` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `ctime` datetime NOT NULL,
  `mtime` datetime NOT NULL,
  `message` text,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `empFeedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `empFrontendMenu`
--

CREATE TABLE IF NOT EXISTS `empFrontendMenu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,  
  `isActive` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `weight` int(10) unsigned NOT NULL DEFAULT '0',  
  PRIMARY KEY (`id`),
  KEY `isActive` (`isActive`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `empFrontendMenu`
--


-- --------------------------------------------------------

--
-- Table structure for table `empLanguages`
--

CREATE TABLE IF NOT EXISTS `empLanguages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(2) NOT NULL,
  `isDefault` tinyint(1) unsigned NOT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `weight` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `empLanguages`
--

INSERT INTO `empLanguages` (`id`, `name`, `code`, `isDefault`, `isActive`, `weight`) VALUES
(1, 'Русский', 'ru', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `empLog`
--

CREATE TABLE IF NOT EXISTS `empLog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `objectType` varchar(255) NOT NULL,
  `objectName` varchar(255) NOT NULL,
  `objectId` int(10) unsigned NOT NULL,
  `managerId` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL,
  `operation` varchar(45) NOT NULL,
  `editLink` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date_idx` (`date`),
  KEY `manager_idx` (`managerId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `empLog`
--


-- --------------------------------------------------------

--
-- Table structure for table `empPages`
--

CREATE TABLE IF NOT EXISTS `empMeta` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) ,
  `mTitle` varchar(255) DEFAULT NULL,
  `mDescription` text,
  `mKeywords` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Table structure for table `empSession`
--

CREATE TABLE IF NOT EXISTS `empSession` (
  `sess_id` varchar(32) NOT NULL DEFAULT '',
  `lastUpdated` int(11) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`sess_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empSession`
--


-- --------------------------------------------------------

--
-- Table structure for table `empStaticPages`
--

CREATE TABLE IF NOT EXISTS `empStaticPages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `techUrl` varchar(255) NOT NULL,  
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `mTitle` varchar(255) DEFAULT NULL,
  `mDescription` text,
  `mKeywords` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `empStaticPages`
--

-- --------------------------------------------------------

--
-- Table structure for table `empUserGroups`
--

CREATE TABLE IF NOT EXISTS `empUserGroups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `info` text,
  `permissions` text,    
  `isDefault` tinyint(1) unsigned NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 PACK_KEYS=1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `empUserGroups`
--

INSERT INTO `empUserGroups` (`id`, `name`, `info`, `permissions`, `isDefault`, `isActive`) VALUES
(1, 'administrator', NULL, 'a:3:{i:0;s:17:"acl_backend_login";i:1;s:18:"acl_frontend_login";i:2;s:17:"acl_frontend_user";}', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `empUsers`
--

CREATE TABLE IF NOT EXISTS `empUsers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL DEFAULT '',
  `groupId` int(11) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL DEFAULT '',  
  `name` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',  
  `isRoot` tinyint(1) NOT NULL DEFAULT '0',  
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `empUsers`
--

INSERT INTO `empUsers` (`id`, `login`, `groupId`, `email`, `password`, `name`, `isActive`, `isRoot`, `phone`, `address`) VALUES
(1, 'admin', 1, 'info@it-me.com.ua', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'Администратор', 1, 1, '0666784532', 'Адрес');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `empDictionaryLang`
--
ALTER TABLE `empDictionaryLang`
  ADD CONSTRAINT `empDictionaryLang_ibfk_1` FOREIGN KEY (`id`) REFERENCES `empDictionary` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empDictionaryLang_ibfk_2` FOREIGN KEY (`languageId`) REFERENCES `empLanguages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
