-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2016 at 02:39 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `courier`
--
CREATE DATABASE `courier` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `courier`;

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `goid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `recipient` varchar(30) NOT NULL,
  `recidno` int(11) NOT NULL,
  `approval` varchar(30) NOT NULL,
  `sender` int(11) NOT NULL,
  `status` varchar(10) DEFAULT 'PENDING',
  `personnel` int(11) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `charges` int(11) DEFAULT NULL,
  `fromm` int(11) DEFAULT NULL,
  `tto` int(11) DEFAULT NULL,
  PRIMARY KEY (`goid`),
  KEY `sender` (`sender`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`goid`, `name`, `type`, `recipient`, `recidno`, `approval`, `sender`, `status`, `personnel`, `weight`, `charges`, `fromm`, `tto`) VALUES
(3, 'Cakes', 'food', 'Njoroge', 6543, 'abcd', 1, 'DELIVERED', 4, 'less than 10 kg', 200, 1, 2),
(7, 'Pens', 'stationary', 'kimani', 678, 'abcd', 1, 'DELIVERED', 4, 'less than 20 kg', 300, 2, 1),
(5, 'kayvoh', 'Toyota Sal', 'Njoroge', 333, 'try', 1, 'PICKED', 4, 'less than 30 kg', 1000, 2, 2),
(6, 'kayvoh', 'Toyota Sal', 'Njoroge', 333, 'try', 1, 'PICKED', 4, 'less than 30 kg', 100, 2, 1),
(8, 'books', 'text', 'james', 98765, 'james', 1, 'DELIVERED', 4, 'less than 10 kg', 300, 1, 2),
(9, 'Laptops', 'Technical', 'kimani', 98765, 'lappy', 1, 'PICKED', 8, 'less than 30 kg', 2000, 4, 2),
(10, 'bag', 'parce', 'wex', 455345, '234567', 11, 'DELIVERED', 8, 'less than 1 kg', 100, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE IF NOT EXISTS `office` (
  `ofid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `status` varchar(10) DEFAULT 'OPEN',
  PRIMARY KEY (`ofid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`ofid`, `name`, `location`, `status`) VALUES
(1, 'office1', 'Kianjai', 'OPEN'),
(2, 'office2', 'Nyeri', 'OPEN'),
(3, 'Main Office', 'Nairobi', 'OPEN'),
(4, 'Injooh', 'Kiambu', 'OPEN'),
(5, 'Macha', 'Machakos', 'OPEN'),
(6, 'Pwani', 'Mombasa', 'OPEN'),
(7, 'Desert', 'Mandera', 'OPEN'),
(8, 'Buganda', 'Kampala', 'OPEN'),
(9, 'r', '', 'OPEN');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `usid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `idno` int(11) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `dob` date NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `office` int(11) DEFAULT NULL,
  PRIMARY KEY (`usid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usid`, `fname`, `lname`, `idno`, `phone`, `email`, `dob`, `username`, `password`, `type`, `status`, `office`) VALUES
(1, 'Kelvin', 'Nderitu', 30423233, '0705314090', 'kayvoh6@gmail.com', '2016-03-02', 'kayvoh', '84639b992cd4b222bbfb8f446be61a5a', 'customer', 'ACTIVE', NULL),
(6, 'James', 'Nyakundi', 45678, '56789', 'joshua@joshua.com', '2016-03-04', 'james', 'b4cc344d25a2efe540adbf2678e2304c', 'employee', 'ACTIVE', 1),
(3, 'Admin', 'Admin', 45678, '0705314090', 'admin@admin.com', '2016-03-03', 'root', '63a9f0ea7bb98050796b649e85481845', 'admin', 'ACTIVE', NULL),
(4, 'Nicole', 'Ailakin', 1456789, '0705314090', 'kayvoh6@gmail.com', '2016-03-10', 'nic', 'e821ba1edb9dc0a445b61d8ce702052a', 'employee', 'ACTIVE', 1),
(7, 'Chris', 'Osunga', 45678, '543', 'stephen@stephen.com', '2016-03-10', 'chris', '6b34fe24ac2ff8103f6fce1f0da2ef57', 'employee', 'ACTIVE', 2),
(8, 'Norman', 'Mwangi', 9876543, '876543', 'fchgvb@utvghbjn.com', '2018-05-29', 'norman', '9ac915832a9a1c970c1564708917c3aa', 'employee', 'ACTIVE', 4),
(9, 'Gladys', 'Wangari', 8765434, '4567898765', 'jhgf@ghj.com', '2016-03-27', 'gladys', '05fe03b494c0f1a7d6cb49f0bf3fd70d', 'employee', 'ACTIVE', 3),
(10, 'George', 'Gitonga', 876543, '98765456789', 'isaac@gitonga.com', '1994-05-11', 'george', '9b306ab04ef5e25f9fb89c998a6aedab', 'customer', 'ACTIVE', NULL),
(11, 'james', 'Mwangi', 75566656, '4567898765', 'jj@gmai.com', '2016-06-01', 'asix', '81dc9bdb52d04dc20036dbd8313ed055', 'customer', 'ACTIVE', NULL);
