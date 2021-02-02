-- Set DB Variables
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+02:00";

-- --------------------------------------------------------

-- Create Database
CREATE DATABASE IF NOT EXISTS `dembebxq_sma_db`;

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL  
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin` 
--

INSERT INTO `admin` (`email`, `password`) VALUES
('info@safemotherhoodalliance.org', '12345');

-- --------------------------------------------------------

-- Create table: users
CREATE TABLE IF NOT EXISTS `emailSubscribe` (
  `emailSubscribeId` BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `emailSubscribeDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT user_key UNIQUE (email)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

-- Create table: contactus
CREATE TABLE IF NOT EXISTS `contactUs` ( 
  `contactUsId` BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fullName` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `subject` VARCHAR(1000) NOT NULL,
  `message` VARCHAR(1000) NOT NULL,
  `markRead` tinyint(1) NOT NULL DEFAULT 0,
  `contactDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


-- --------------------------------------------------------


CREATE TABLE `sysfiles` (
  `fileId` BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `path` varchar(255) NOT NULL,
  `fileType` varchar(255) NOT NULL,
  `sourceId` bigint(20) NOT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


-- --------------------------------------------------------


-- Create table
CREATE TABLE IF NOT EXISTS `blog` ( 
  `blogId` BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `blogTitle` VARCHAR(255) NOT NULL,
  `blogText` VARCHAR(1000) NOT NULL,
  `shared` tinyint(1) NOT NULL DEFAULT 0,
  `uploadDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;




-- ---------------------DROP TABLES-----------------------------------
-- DROP TABLE emailSubscribe;
-- DROP TABLE admin;
-- DROP TABLE contactus;
