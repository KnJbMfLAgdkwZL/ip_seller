-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 08 2015 г., 11:08
-- Версия сервера: 5.6.15-log
-- Версия PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ipseller`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ipall`
--

CREATE TABLE IF NOT EXISTS `ipall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=163 ;

--
-- Дамп данных таблицы `ipall`
--

INSERT INTO `ipall` (`id`, `ip`, `login`, `pass`, `country`, `state`, `city`, `zip`) VALUES
(5, '75.151.201.133', 'PlcmSpIp', 'PlcmSpIp', 'United States (US)', 'Louisiana', 'Monroe', '71201'),
(6, '184.0.246.3', 'webmaster', 'webmaster', 'United States (US)', 'Florida', 'Fort Myers Beach', '33931'),
(7, '70.107.229.160', 'admin', 'default', 'United States (US)', 'New York', 'New York', '10040'),
(8, '107.146.40.170', 'demo', 'demo', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(9, '166.200.165.139', 'root', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(10, '208.64.230.213', 'ftpuser', 'asteriskftp', 'United States (US)', 'California', 'Canyon Country', '91387'),
(11, '67.222.119.88', 'demo', 'demo', 'United States (US)', 'New York', 'Buffalo', 'Unknown'),
(12, '76.98.35.21', 'admin', 'default', 'United States (US)', 'Pennsylvania', 'Bryn Mawr', '19010'),
(13, '98.191.208.85', 'root', 'root', 'United States (US)', 'Virginia', 'Lorton', '22079'),
(14, '206.169.26.110', 'admin', 'default', 'United States (US)', 'California', 'Bakersfield', 'Unknown'),
(15, '74.212.162.2', 'admin', 'admin', 'United States (US)', 'Florida', 'Miami', 'Unknown'),
(16, '71.41.27.45', 'admin', 'default', 'United States (US)', 'Texas', 'Copperas Cove', '76522'),
(17, '66.159.61.236', 'admin', 'default', 'United States (US)', 'California', 'Torrance', 'Unknown'),
(18, '173.241.210.171', 'sales', 'sales', 'United States (US)', 'Michigan', 'Holton', '49425'),
(19, '204.93.138.36', 'oper', 'oper', 'United States (US)', 'Illinois', 'Chicago', '60604'),
(20, '96.3.135.200', 'user', 'user', 'United States (US)', 'North Dakota', 'Bismarck', '58501'),
(21, '24.103.109.179', 'admin', 'default', 'United States (US)', 'New York', 'New York', 'Unknown'),
(22, '184.105.172.13', 'ftpuser', 'asteriskftp', 'United States (US)', 'California', 'Fremont', '94539'),
(23, '64.196.46.125', 'sales', 'sales', 'United States (US)', 'Illinois', 'Mount Carroll', '61053'),
(24, '68.99.63.28', 'admin', 'default', 'United States (US)', 'Florida', 'Milton', 'Unknown'),
(25, '97.78.152.174', 'webmaster', 'webmaster', 'United States (US)', 'Alabama', 'Millbrook', '36054'),
(26, '65.19.184.131', 'admIndian', 'admIndian', 'United States (US)', 'California', 'Fremont', '94539'),
(27, '216.37.94.99', 'United', 'States', 'United States (US)', 'Tennessee', 'Memphis', 'Unknown'),
(28, '67.221.200.234', 'ftp', 'ftp', 'United States (US)', 'Missouri', 'Columbia', '65203'),
(29, '166.140.169.96', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(30, '96.39.23.62', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(31, '204.14.121.34', 'admin', 'admin', 'United States (US)', 'Washington', 'Bothell', '98011'),
(32, '70.184.97.228', 'admin', 'password', 'United States (US)', 'Arizona', 'Scottsdale', 'Unknown'),
(33, '69.5.143.26', 'support', 'support', 'United States (US)', 'Iowa', 'Ames', '50014'),
(34, '166.200.164.242', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(35, '71.168.212.98', 'admin', 'default', 'United States (US)', 'New Jersey', 'Trenton', '8619'),
(36, '67.136.64.33', 'ftp', 'ftp', 'United States (US)', 'Minnesota', 'Minneapolis', '55408'),
(37, '96.239.37.39', 'admin', 'default', 'United States (US)', 'New York', 'West Babylon', '11704'),
(38, '69.198.42.26', 'admin', 'default', 'United States (US)', 'Colorado', 'Denver', 'Unknown'),
(39, '216.249.220.133', 'ftp', 'ftp', 'United States (US)', 'South Dakota', 'Sioux Falls', '57110'),
(40, '173.241.210.167', 'PlcmSpIp', 'PlcmSpIp', 'United States (US)', 'Michigan', 'Holton', '49425'),
(41, '166.200.166.105', 'root', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(42, '68.14.217.228', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(43, '174.96.147.83', 'root', 'alpine', 'United States (US)', 'North Carolina', 'Charlotte', '28210'),
(44, '166.200.167.185', 'root', '12345', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(45, '71.42.8.216', 'admin', 'admin', 'United States (US)', 'Florida', 'Maitland', '32751'),
(46, '209.37.31.103', 'sales', 'sales', 'United States (US)', 'California', 'Palm Springs', '92264'),
(47, '107.144.57.198', 'sales', 'sales', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(48, '166.200.166.137', 'root', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(49, '69.38.129.186', 'admin', 'admin', 'United States (US)', 'New York', 'New York', 'Unknown'),
(50, '67.208.243.167', 'admin', 'admin', 'United States (US)', 'Michigan', 'Lansing', '48933'),
(51, '107.144.163.120', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(52, '12.239.15.200', 'admin', 'default', 'United States (US)', 'Illinois', 'North Aurora', '60542'),
(53, '216.127.187.27', 'ftpuser', 'asteriskftp', 'United States (US)', 'California', 'Canyon Country', '91387'),
(54, '167.94.2.200', 'admin', 'default', 'United States (US)', 'Arizona', 'Scottsdale', 'Unknown'),
(55, '173.163.217.37', 'admin', 'default', 'United States (US)', 'Florida', 'Venice', '34293'),
(56, '67.221.200.2', 'ftp', 'ftp', 'United States (US)', 'Missouri', 'Columbia', '65203'),
(57, '166.210.88.221', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(58, '76.72.210.173', 'webmaster', 'webmaster', 'United States (US)', 'Ohio', 'Fairfield', '45014'),
(59, '166.200.167.141', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(60, '64.184.2.5', 'library', 'library', 'United States (US)', 'Indiana', 'Indianapolis', '46268'),
(61, '166.200.166.5', 'root', 'synopass', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(62, '97.77.203.44', 'admin', 'default', 'United States (US)', 'Texas', 'San Antonio', '78232'),
(63, '50.242.177.117', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(64, '23.25.229.10', 'admin', 'default', 'United States (US)', 'Massachusetts', 'Boston', 'Unknown'),
(65, '107.146.58.175', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(66, '216.249.220.207', 'git', 'git', 'United States (US)', 'South Dakota', 'Sioux Falls', '57110'),
(67, '50.193.131.28', 'admin', 'default', 'United States (US)', 'District of Columbia', 'Washington', 'Unknown'),
(68, '173.226.135.178', 'admin', 'default', 'United States (US)', 'Texas', 'Houston', 'Unknown'),
(69, '68.169.128.73', 'admin', 'admin', 'United States (US)', 'Tennessee', 'Chattanooga', '37419'),
(70, '98.174.138.188', 'ftpuser', 'asteriskftp', 'United States (US)', 'California', 'Santee', '92071'),
(71, '97.68.215.241', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(72, '67.201.23.86', 'user', 'user', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(73, '173.166.112.10', 'admin', 'password', 'United States (US)', 'Massachusetts', 'Needham Heights', '2494'),
(74, '209.37.30.125', 'webmaster', 'webmaster', 'United States (US)', 'California', 'Palm Springs', '92264'),
(75, '173.8.188.129', 'admin', 'default', 'United States (US)', 'California', 'San Jose', 'Unknown'),
(76, '216.249.220.182', 'sales', 'sales', 'United States (US)', 'South Dakota', 'Sioux Falls', '57110'),
(77, '50.169.75.44', 'ubnt', 'ubnt', 'United States (US)', 'Massachusetts', 'Brewster', '2631'),
(78, '173.10.20.197', 'admin', 'default', 'United States (US)', 'Utah', 'Salt Lake City', 'Unknown'),
(79, '208.64.90.142', 'support', 'password', 'United States (US)', 'Utah', 'Lehi', '84043'),
(80, '216.249.220.174', 'admin', 'admin', 'United States (US)', 'South Dakota', 'Sioux Falls', '57110'),
(81, '97.68.212.67', 'sales', 'sales', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(82, '198.0.31.77', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(83, '173.200.99.181', 'PlcmSpIp', 'PlcmSpIp', 'United States (US)', 'Colorado', 'Commerce City', 'Unknown'),
(84, '174.136.62.146', 'ubnt', 'ubnt', 'United States (US)', 'Texas', 'Houston', '77069'),
(85, '96.10.30.150', 'admin', 'default', 'United States (US)', 'North Carolina', 'Raleigh', 'Unknown'),
(86, '97.89.51.212', 'ubnt', 'ubnt', 'United States (US)', 'Georgia', 'Ringgold', '30736'),
(87, '97.68.110.244', 'git', 'git', 'United States (US)', 'Florida', 'Orlando', '32837'),
(88, '107.146.28.221', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(89, '166.200.164.193', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(90, '107.144.111.0', 'demo', 'demo', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(91, '74.143.82.123', 'ubnt', 'ubnt', 'United States (US)', 'Kentucky', 'Louisville', 'Unknown'),
(92, '162.216.101.46', 'admIndian', 'admIndian', 'United States (US)', 'Missouri', 'Unknown', 'Unknown'),
(93, '173.162.5.25', 'ftpuser', 'asteriskftp', 'United States (US)', 'South Carolina', 'Mount Pleasant', 'Unknown'),
(94, '69.195.197.70', 'admin', 'default', 'United States (US)', 'Florida', 'Hollywood', '33023'),
(95, '96.227.209.147', 'admin', 'default', 'United States (US)', 'Pennsylvania', 'Media', '19063'),
(96, '216.106.122.1', 'admin', 'default', 'United States (US)', 'Georgia', 'Atlanta', '30339'),
(97, '75.144.51.181', 'admin', 'default', 'United States (US)', 'Tennessee', 'Memphis', 'Unknown'),
(98, '72.16.173.58', 'ftpuser', 'asteriskftp', 'United States (US)', 'Illinois', 'Bensenville', 'Unknown'),
(99, '64.13.169.136', 'demo', 'demo', 'United States (US)', 'California', 'Mountain View', '94039'),
(100, '107.144.54.12', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(101, '64.57.203.237', 'lpa', 'lpa', 'United States (US)', 'Arizona', 'Maricopa', '85139'),
(102, '166.200.164.94', 'root', 'synopass', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(103, '166.131.37.141', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(104, '166.239.64.80', 'admin', 'password', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(105, '64.195.25.13', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(106, '75.147.24.177', 'admin', 'default', 'United States (US)', 'Massachusetts', 'Leominster', '1453'),
(107, '50.20.63.138', 'admin', 'default', 'United States (US)', 'California', 'Walnut', 'Unknown'),
(108, '50.243.37.33', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(109, '96.3.155.88', 'user', 'user', 'United States (US)', 'North Dakota', 'Bismarck', '58501'),
(110, '166.200.165.171', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(111, '107.10.134.165', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(112, '24.18.237.210', 'root', 'admin', 'United States (US)', 'Washington', 'Seattle', '98102'),
(113, '166.200.167.149', 'root', '12345', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(114, '74.87.18.154', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(115, '207.228.228.118', 'mailman', 'mailman', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(116, '174.103.151.227', 'ftpuser', 'asteriskftp', 'United States (US)', 'Ohio', 'Milford', '45150'),
(117, '74.80.237.182', 'admin', 'default', 'United States (US)', 'Massachusetts', 'Boston', '2108'),
(118, '166.200.167.92', 'root', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(119, '96.11.82.235', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(120, '166.148.191.59', 'admin', 'password', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(121, '154.58.192.54', 'ubnt', 'ubnt', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(122, '97.78.117.195', 'admin', 'admin', 'United States (US)', 'Florida', 'Odessa', '33556'),
(123, '71.185.213.139', 'admin', 'default', 'United States (US)', 'Pennsylvania', 'Wayne', '19087'),
(124, '67.221.200.229', 'fax', 'changeme', 'United States (US)', 'Missouri', 'Columbia', '65203'),
(125, '69.5.140.251', 'support', 'support', 'United States (US)', 'Iowa', 'Ames', '50014'),
(126, '216.249.220.146', 'webmaster', 'webmaster', 'United States (US)', 'South Dakota', 'Sioux Falls', '57110'),
(127, '76.72.90.253', 'admin', 'default', 'United States (US)', 'Louisiana', 'Lafayette', '70508'),
(128, '108.60.62.206', 'support', 'support', 'United States (US)', 'California', 'North Hollywood', '91601'),
(129, '207.144.105.51', 'git', 'git', 'United States (US)', 'Georgia', 'Perry', '31069'),
(130, '137.119.124.60', 'ftp', 'ftp', 'United States (US)', 'Texas', 'Quitman', '75783'),
(131, '66.232.188.141', 'admin', 'password', 'United States (US)', 'Illinois', 'Mount Vernon', '62864'),
(132, '65.255.206.74', 'demo', 'demo', 'United States (US)', 'California', 'Culver City', '90230'),
(133, '198.2.55.91', 'admin', 'default', 'United States (US)', 'California', 'Los Angeles', 'Unknown'),
(134, '23.226.176.66', 'git', 'git', 'United States (US)', 'California', 'Los Angeles', '90014'),
(135, '96.11.82.124', 'support', 'support', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(136, '96.39.102.226', 'PlcmSpIp', 'PlcmSpIp', 'United States (US)', 'Massachusetts', 'Worcester', 'Unknown'),
(137, '68.168.195.202', 'PlcmSpIp', 'PlcmSpIp', 'United States (US)', 'Texas', 'Quitman', '75783'),
(138, '24.111.219.222', 'user', 'user', 'United States (US)', 'North Dakota', 'Minot', '58703'),
(139, '97.68.124.16', 'git', 'git', 'United States (US)', 'Florida', 'Orlando', '32839'),
(140, '50.206.38.9', 'ubnt', 'ubnt', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(141, '207.180.113.121', 'support', 'support', 'United States (US)', 'Washington', 'Seattle', '98105'),
(142, '35.8.80.159', 'admIndian', 'admIndian', 'United States (US)', 'Michigan', 'East Lansing', '48824'),
(143, '67.208.243.51', 'ftp', 'ftp', 'United States (US)', 'Michigan', 'Lansing', '48933'),
(144, '173.241.210.171', 'ftp', 'ftp', 'United States (US)', 'Michigan', 'Holton', '49425'),
(145, '108.247.217.90', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(146, '69.15.3.194', 'admin', 'default', 'United States (US)', 'Georgia', 'Alpharetta', 'Unknown'),
(147, '50.247.0.204', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(148, '72.215.55.83', 'pi', 'raspberry', 'United States (US)', 'Connecticut', 'Southington', '6489'),
(149, '209.213.23.163', 'support', 'support', 'United States (US)', 'South Carolina', 'Ware Shoals', '29692'),
(150, '41.189.254.17', 'sales', 'sales', 'United States (US)', 'Armed Forces Europe, Middle East, & Canada', 'Fpo', 'Unknown'),
(151, '65.49.79.199', 'ftpuser', 'asteriskftp', 'United States (US)', 'California', 'Fremont', '94539'),
(152, '67.221.200.20', 'demo', 'demo', 'United States (US)', 'Missouri', 'Columbia', '65203'),
(153, '97.89.40.138', 'ftpuser', 'asteriskftp', 'United States (US)', 'Tennessee', 'Medina', '38355'),
(154, '41.189.254.23', 'user', 'user', 'United States (US)', 'Armed Forces Europe, Middle East, & Canada', 'Fpo', 'Unknown'),
(155, '97.68.91.68', 'sales', 'sales', 'United States (US)', 'Florida', 'Orlando', '32820'),
(156, '173.198.96.167', 'demo', 'demo', 'United States (US)', 'California', 'Bakersfield', '93311'),
(157, '24.118.51.233', 'PlcmSpIp', 'PlcmSpIp123', 'United States (US)', 'Minnesota', 'Saint Paul', '55110'),
(158, '96.2.30.44', 'user', 'user', 'United States (US)', 'South Dakota', 'Sioux Falls', '57103'),
(159, '67.190.156.46', 'pi', 'raspberry', 'United States (US)', 'Colorado', 'Pueblo', '81008'),
(160, '199.20.44.120', 'admin', 'default', 'United States (US)', 'New York', 'New York', 'Unknown'),
(161, '192.230.133.161', 'ftp', 'ftp', 'United States (US)', 'Iowa', 'Des Moines', '50309'),
(162, '166.200.165.166', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown');

-- --------------------------------------------------------

--
-- Структура таблицы `ipstatus`
--

CREATE TABLE IF NOT EXISTS `ipstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idipall` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 Reserved, 2 Buyed, 3 Black, 4 Dead',
  `userid` int(11) DEFAULT NULL COMMENT 'If status Reserved or Buyed',
  `time` int(11) DEFAULT NULL COMMENT 'When Buyed',
  PRIMARY KEY (`id`),
  KEY `idipall` (`idipall`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=726 ;

--
-- Дамп данных таблицы `ipstatus`
--

INSERT INTO `ipstatus` (`id`, `idipall`, `status`, `userid`, `time`) VALUES
(679, 34, 2, 85, 1425808897),
(663, 18, 2, 85, 1425808897),
(662, 17, 2, 85, 1425808897),
(661, 16, 2, 85, 1425808897),
(660, 15, 2, 85, 1425808897),
(659, 14, 2, 85, 1425808897),
(658, 13, 2, 85, 1425808897),
(657, 12, 2, 85, 1425808897),
(656, 11, 2, 85, 1425808897),
(655, 10, 2, 85, 1425808897),
(654, 9, 2, 85, 1425808897),
(653, 8, 2, 85, 1425808897),
(652, 7, 2, 85, 1425808897),
(651, 6, 2, 85, 1425808897),
(664, 19, 2, 85, 1425808897),
(665, 20, 2, 85, 1425808897),
(678, 33, 2, 85, 1425808897),
(677, 32, 2, 85, 1425808897),
(676, 31, 2, 85, 1425808897),
(675, 30, 2, 85, 1425808897),
(674, 29, 2, 85, 1425808897),
(673, 28, 2, 85, 1425808897),
(672, 27, 2, 85, 1425808897),
(671, 26, 2, 85, 1425808897),
(670, 25, 2, 85, 1425808897),
(669, 24, 2, 85, 1425808897),
(668, 23, 2, 85, 1425808897),
(667, 22, 2, 85, 1425808897),
(666, 21, 2, 85, 1425808897),
(650, 5, 2, 85, 1425808897),
(684, 39, 2, 85, 1425808897),
(683, 38, 2, 85, 1425808897),
(682, 37, 2, 85, 1425808897),
(681, 36, 2, 85, 1425808897),
(680, 35, 2, 85, 1425808897),
(685, 40, 2, 85, 1425808897),
(686, 41, 2, 85, 1425808897),
(687, 42, 2, 85, 1425808897),
(688, 43, 2, 85, 1425808897),
(689, 44, 2, 85, 1425808897),
(690, 45, 2, 85, 1425808897),
(691, 46, 2, 85, 1425808897),
(692, 47, 2, 85, 1425808897),
(693, 48, 2, 85, 1425808897),
(694, 49, 2, 85, 1425808897),
(695, 50, 2, 85, 1425808897),
(696, 51, 2, 85, 1425808897),
(697, 52, 2, 85, 1425808897),
(698, 53, 2, 85, 1425808897),
(699, 54, 2, 85, 1425808897),
(700, 55, 2, 85, 1425808897),
(701, 56, 2, 85, 1425808897),
(702, 57, 2, 85, 1425808897),
(703, 58, 2, 85, 1425808897),
(704, 59, 2, 85, 1425808897),
(705, 60, 2, 85, 1425808897),
(706, 61, 2, 85, 1425808897),
(707, 62, 2, 85, 1425808897),
(708, 63, 2, 85, 1425808897),
(709, 64, 2, 85, 1425808897),
(710, 65, 2, 85, 1425808897),
(711, 66, 2, 85, 1425808897),
(712, 67, 2, 85, 1425808897),
(713, 68, 2, 85, 1425808897),
(714, 69, 1, 85, NULL),
(715, 70, 1, 85, NULL),
(716, 71, 1, 85, NULL),
(717, 72, 1, 85, NULL),
(718, 73, 1, 85, NULL),
(719, 74, 1, 85, NULL),
(720, 75, 1, 85, NULL),
(721, 76, 1, 85, NULL),
(722, 77, 1, 85, NULL),
(723, 78, 1, 85, NULL),
(724, 79, 1, 85, NULL),
(725, 80, 1, 85, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `management`
--

CREATE TABLE IF NOT EXISTS `management` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`key`),
  UNIQUE KEY `key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `management`
--

INSERT INTO `management` (`key`, `value`) VALUES
('Price', '1.5'),
('LiveIP', '2'),
('DeadIP', '3'),
('BlackIP', '4'),
('LastCheckAllUserSession', '1425809264');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Header` text NOT NULL,
  `Body` text NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`Id`, `Header`, `Body`, `Date`) VALUES
(12, 'Тест темы', 'Тест содержания\r\n', '2015-03-06'),
(13, 'gdgdf', 'gdfgdfg', '2015-03-06'),
(14, 'vnfgjn', 'nbvnvbn', '2015-03-07');

-- --------------------------------------------------------

--
-- Структура таблицы `newsshown`
--

CREATE TABLE IF NOT EXISTS `newsshown` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdNews` int(11) NOT NULL,
  `IdUsers` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdNews` (`IdNews`,`IdUsers`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Структура таблицы `userloginedtime`
--

CREATE TABLE IF NOT EXISTS `userloginedtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_2` (`user`),
  KEY `user` (`user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Дамп данных таблицы `userloginedtime`
--

INSERT INTO `userloginedtime` (`id`, `user`, `time`) VALUES
(45, 85, 1425809303);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Reg_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Role` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Balans` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Login` (`Login`),
  UNIQUE KEY `Email` (`Email`),
  KEY `Role` (`Role`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Id`, `Login`, `Password`, `Reg_Date`, `Role`, `Email`, `Balans`) VALUES
(59, 'Admin', '$2a$13$iCD/WvVcPSDrtMwi1t2f9ONMIucIqUEvZx5Da3fGRvWdr4pQFszKS', '2015-03-05 18:47:51', 1, 'hgj951gj@mail.ru', 0),
(87, 'user3', '$2a$13$AGRlbptLEjH4w/vB2J2QueqDaIJsbARKL6Gd1yC/NKsMzPKwGAA/q', '2015-03-08 07:16:05', 2, 'user3@mail.ru', 0),
(85, 'user', '$2a$13$GQ5RXbAkBR2vQnxPH.b0Qu8pK2DdVtGHPxYanCGmTwG229p6Ax1fG', '2015-03-06 01:55:31', 2, 'user@mail.ru', 107),
(86, 'user2', '$2a$13$qUk/6S9VNEucrszKTEy6kuHPcelSnIXwx6ZZKnEKK4fVAzSArkCLy', '2015-03-08 03:27:37', 2, 'user2@mail.ru', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_roles`
--

CREATE TABLE IF NOT EXISTS `users_roles` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users_roles`
--

INSERT INTO `users_roles` (`Id`, `Name`) VALUES
(1, 'Admin'),
(2, 'User');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
