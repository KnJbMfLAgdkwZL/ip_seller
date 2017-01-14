-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 19 2015 г., 14:47
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
-- Структура таблицы `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL COMMENT 'From User, 0 if admin',
  `to` int(11) NOT NULL COMMENT 'To User, 0 if admin',
  `message` text NOT NULL,
  `time` int(11) NOT NULL,
  `new` int(11) NOT NULL COMMENT 'New or not  (1, 0)',
  PRIMARY KEY (`id`),
  KEY `from` (`from`,`to`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `time`, `new`) VALUES
(84, 85, 0, '68678', 1426761549, 0),
(83, 85, 0, '567567', 1426761512, 0),
(82, 85, 0, '68678', 1426761368, 0),
(81, 0, 85, '5675', 1426760476, 0),
(80, 85, 0, '797', 1426760462, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=373 ;

--
-- Дамп данных таблицы `ipall`
--

INSERT INTO `ipall` (`id`, `ip`, `login`, `pass`, `country`, `state`, `city`, `zip`) VALUES
(314, '23.226.176.66', 'git', 'git', 'United States (US)', 'California', 'Los Angeles', '90014'),
(313, '198.2.55.91', 'admin', 'default', 'United States (US)', 'California', 'Los Angeles', 'Unknown'),
(312, '65.255.206.74', 'demo', 'demo', 'United States (US)', 'California', 'Culver City', '90230'),
(311, '66.232.188.141', 'admin', 'password', 'United States (US)', 'Illinois', 'Mount Vernon', '62864'),
(310, '137.119.124.60', 'ftp', 'ftp', 'United States (US)', 'Texas', 'Quitman', '75783'),
(309, '207.144.105.51', 'git', 'git', 'United States (US)', 'Georgia', 'Perry', '31069'),
(308, '108.60.62.206', 'support', 'support', 'United States (US)', 'California', 'North Hollywood', '91601'),
(307, '76.72.90.253', 'admin', 'default', 'United States (US)', 'Louisiana', 'Lafayette', '70508'),
(306, '216.249.220.146', 'webmaster', 'webmaster', 'United States (US)', 'South Dakota', 'Sioux Falls', '57110'),
(305, '69.5.140.251', 'support', 'support', 'United States (US)', 'Iowa', 'Ames', '50014'),
(304, '67.221.200.229', 'fax', 'changeme', 'United States (US)', 'Missouri', 'Columbia', '65203'),
(303, '71.185.213.139', 'admin', 'default', 'United States (US)', 'Pennsylvania', 'Wayne', '19087'),
(302, '97.78.117.195', 'admin', 'admin', 'United States (US)', 'Florida', 'Odessa', '33556'),
(301, '154.58.192.54', 'ubnt', 'ubnt', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(300, '166.148.191.59', 'admin', 'password', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(299, '96.11.82.235', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(298, '166.200.167.92', 'root', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(297, '74.80.237.182', 'admin', 'default', 'United States (US)', 'Massachusetts', 'Boston', '2108'),
(296, '174.103.151.227', 'ftpuser', 'asteriskftp', 'United States (US)', 'Ohio', 'Milford', '45150'),
(295, '207.228.228.118', 'mailman', 'mailman', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(294, '74.87.18.154', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(293, '166.200.167.149', 'root', '12345', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(292, '24.18.237.210', 'root', 'admin', 'United States (US)', 'Washington', 'Seattle', '98102'),
(291, '107.10.134.165', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(290, '166.200.165.171', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(289, '96.3.155.88', 'user', 'user', 'United States (US)', 'North Dakota', 'Bismarck', '58501'),
(288, '50.243.37.33', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(287, '50.20.63.138', 'admin', 'default', 'United States (US)', 'California', 'Walnut', 'Unknown'),
(286, '75.147.24.177', 'admin', 'default', 'United States (US)', 'Massachusetts', 'Leominster', '1453'),
(285, '64.195.25.13', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(284, '166.239.64.80', 'admin', 'password', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(283, '166.131.37.141', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(282, '166.200.164.94', 'root', 'synopass', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(281, '64.57.203.237', 'lpa', 'lpa', 'United States (US)', 'Arizona', 'Maricopa', '85139'),
(280, '107.144.54.12', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(279, '64.13.169.136', 'demo', 'demo', 'United States (US)', 'California', 'Mountain View', '94039'),
(278, '72.16.173.58', 'ftpuser', 'asteriskftp', 'United States (US)', 'Illinois', 'Bensenville', 'Unknown'),
(277, '75.144.51.181', 'admin', 'default', 'United States (US)', 'Tennessee', 'Memphis', 'Unknown'),
(276, '216.106.122.1', 'admin', 'default', 'United States (US)', 'Georgia', 'Atlanta', '30339'),
(275, '96.227.209.147', 'admin', 'default', 'United States (US)', 'Pennsylvania', 'Media', '19063'),
(274, '69.195.197.70', 'admin', 'default', 'United States (US)', 'Florida', 'Hollywood', '33023'),
(273, '173.162.5.25', 'ftpuser', 'asteriskftp', 'United States (US)', 'South Carolina', 'Mount Pleasant', 'Unknown'),
(272, '162.216.101.46', 'admIndian', 'admIndian', 'United States (US)', 'Missouri', 'Unknown', 'Unknown'),
(271, '74.143.82.123', 'ubnt', 'ubnt', 'United States (US)', 'Kentucky', 'Louisville', 'Unknown'),
(270, '107.144.111.0', 'demo', 'demo', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(269, '166.200.164.193', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(268, '107.146.28.221', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(267, '97.68.110.244', 'git', 'git', 'United States (US)', 'Florida', 'Orlando', '32837'),
(266, '97.89.51.212', 'ubnt', 'ubnt', 'United States (US)', 'Georgia', 'Ringgold', '30736'),
(265, '96.10.30.150', 'admin', 'default', 'United States (US)', 'North Carolina', 'Raleigh', 'Unknown'),
(264, '174.136.62.146', 'ubnt', 'ubnt', 'United States (US)', 'Texas', 'Houston', '77069'),
(263, '173.200.99.181', 'PlcmSpIp', 'PlcmSpIp', 'United States (US)', 'Colorado', 'Commerce City', 'Unknown'),
(262, '198.0.31.77', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(261, '97.68.212.67', 'sales', 'sales', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(260, '216.249.220.174', 'admin', 'admin', 'United States (US)', 'South Dakota', 'Sioux Falls', '57110'),
(259, '208.64.90.142', 'support', 'password', 'United States (US)', 'Utah', 'Lehi', '84043'),
(258, '173.10.20.197', 'admin', 'default', 'United States (US)', 'Utah', 'Salt Lake City', 'Unknown'),
(257, '50.169.75.44', 'ubnt', 'ubnt', 'United States (US)', 'Massachusetts', 'Brewster', '2631'),
(256, '216.249.220.182', 'sales', 'sales', 'United States (US)', 'South Dakota', 'Sioux Falls', '57110'),
(255, '173.8.188.129', 'admin', 'default', 'United States (US)', 'California', 'San Jose', 'Unknown'),
(254, '209.37.30.125', 'webmaster', 'webmaster', 'United States (US)', 'California', 'Palm Springs', '92264'),
(253, '173.166.112.10', 'admin', 'password', 'United States (US)', 'Massachusetts', 'Needham Heights', '2494'),
(252, '67.201.23.86', 'user', 'user', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(251, '97.68.215.241', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(250, '98.174.138.188', 'ftpuser', 'asteriskftp', 'United States (US)', 'California', 'Santee', '92071'),
(249, '68.169.128.73', 'admin', 'admin', 'United States (US)', 'Tennessee', 'Chattanooga', '37419'),
(248, '173.226.135.178', 'admin', 'default', 'United States (US)', 'Texas', 'Houston', 'Unknown'),
(247, '50.193.131.28', 'admin', 'default', 'United States (US)', 'District of Columbia', 'Washington', 'Unknown'),
(246, '216.249.220.207', 'git', 'git', 'United States (US)', 'South Dakota', 'Sioux Falls', '57110'),
(245, '107.146.58.175', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(244, '23.25.229.10', 'admin', 'default', 'United States (US)', 'Massachusetts', 'Boston', 'Unknown'),
(243, '50.242.177.117', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(242, '97.77.203.44', 'admin', 'default', 'United States (US)', 'Texas', 'San Antonio', '78232'),
(241, '166.200.166.5', 'root', 'synopass', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(240, '64.184.2.5', 'library', 'library', 'United States (US)', 'Indiana', 'Indianapolis', '46268'),
(239, '166.200.167.141', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(238, '76.72.210.173', 'webmaster', 'webmaster', 'United States (US)', 'Ohio', 'Fairfield', '45014'),
(237, '166.210.88.221', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(236, '67.221.200.2', 'ftp', 'ftp', 'United States (US)', 'Missouri', 'Columbia', '65203'),
(235, '173.163.217.37', 'admin', 'default', 'United States (US)', 'Florida', 'Venice', '34293'),
(234, '167.94.2.200', 'admin', 'default', 'United States (US)', 'Arizona', 'Scottsdale', 'Unknown'),
(233, '216.127.187.27', 'ftpuser', 'asteriskftp', 'United States (US)', 'California', 'Canyon Country', '91387'),
(232, '12.239.15.200', 'admin', 'default', 'United States (US)', 'Illinois', 'North Aurora', '60542'),
(231, '107.144.163.120', 'admin', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(230, '67.208.243.167', 'admin', 'admin', 'United States (US)', 'Michigan', 'Lansing', '48933'),
(229, '69.38.129.186', 'admin', 'admin', 'United States (US)', 'New York', 'New York', 'Unknown'),
(228, '166.200.166.137', 'root', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(227, '107.144.57.198', 'sales', 'sales', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(226, '209.37.31.103', 'sales', 'sales', 'United States (US)', 'California', 'Palm Springs', '92264'),
(225, '71.42.8.216', 'admin', 'admin', 'United States (US)', 'Florida', 'Maitland', '32751'),
(224, '166.200.167.185', 'root', '12345', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(223, '174.96.147.83', 'root', 'alpine', 'United States (US)', 'North Carolina', 'Charlotte', '28210'),
(222, '68.14.217.228', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(221, '166.200.166.105', 'root', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(220, '173.241.210.167', 'PlcmSpIp', 'PlcmSpIp', 'United States (US)', 'Michigan', 'Holton', '49425'),
(219, '216.249.220.133', 'ftp', 'ftp', 'United States (US)', 'South Dakota', 'Sioux Falls', '57110'),
(218, '69.198.42.26', 'admin', 'default', 'United States (US)', 'Colorado', 'Denver', 'Unknown'),
(217, '96.239.37.39', 'admin', 'default', 'United States (US)', 'New York', 'West Babylon', '11704'),
(216, '67.136.64.33', 'ftp', 'ftp', 'United States (US)', 'Minnesota', 'Minneapolis', '55408'),
(215, '71.168.212.98', 'admin', 'default', 'United States (US)', 'New Jersey', 'Trenton', '8619'),
(214, '166.200.164.242', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(213, '69.5.143.26', 'support', 'support', 'United States (US)', 'Iowa', 'Ames', '50014'),
(212, '70.184.97.228', 'admin', 'password', 'United States (US)', 'Arizona', 'Scottsdale', 'Unknown'),
(211, '204.14.121.34', 'admin', 'admin', 'United States (US)', 'Washington', 'Bothell', '98011'),
(210, '96.39.23.62', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(209, '166.140.169.96', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(208, '67.221.200.234', 'ftp', 'ftp', 'United States (US)', 'Missouri', 'Columbia', '65203'),
(207, '216.37.94.99', 'United', 'States', 'United States (US)', 'Tennessee', 'Memphis', 'Unknown'),
(206, '65.19.184.131', 'admIndian', 'admIndian', 'United States (US)', 'California', 'Fremont', '94539'),
(205, '97.78.152.174', 'webmaster', 'webmaster', 'United States (US)', 'Alabama', 'Millbrook', '36054'),
(204, '68.99.63.28', 'admin', 'default', 'United States (US)', 'Florida', 'Milton', 'Unknown'),
(203, '64.196.46.125', 'sales', 'sales', 'United States (US)', 'Illinois', 'Mount Carroll', '61053'),
(202, '184.105.172.13', 'ftpuser', 'asteriskftp', 'United States (US)', 'California', 'Fremont', '94539'),
(201, '24.103.109.179', 'admin', 'default', 'United States (US)', 'New York', 'New York', 'Unknown'),
(200, '96.3.135.200', 'user', 'user', 'United States (US)', 'North Dakota', 'Bismarck', '58501'),
(199, '204.93.138.36', 'oper', 'oper', 'United States (US)', 'Illinois', 'Chicago', '60604'),
(198, '173.241.210.171', 'sales', 'sales', 'United States (US)', 'Michigan', 'Holton', '49425'),
(197, '66.159.61.236', 'admin', 'default', 'United States (US)', 'California', 'Torrance', 'Unknown'),
(187, '70.107.229.160', 'admin', 'default', 'United States (US)', 'New York', 'New York', '10040'),
(188, '107.146.40.170', 'demo', 'demo', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(189, '166.200.165.139', 'root', 'admin', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(190, '208.64.230.213', 'ftpuser', 'asteriskftp', 'United States (US)', 'California', 'Canyon Country', '91387'),
(191, '67.222.119.88', 'demo', 'demo', 'United States (US)', 'New York', 'Buffalo', 'Unknown'),
(192, '76.98.35.21', 'admin', 'default', 'United States (US)', 'Pennsylvania', 'Bryn Mawr', '19010'),
(193, '98.191.208.85', 'root', 'root', 'United States (US)', 'Virginia', 'Lorton', '22079'),
(194, '206.169.26.110', 'admin', 'default', 'United States (US)', 'California', 'Bakersfield', 'Unknown'),
(195, '74.212.162.2', 'admin', 'admin', 'United States (US)', 'Florida', 'Miami', 'Unknown'),
(196, '71.41.27.45', 'admin', 'default', 'United States (US)', 'Texas', 'Copperas Cove', '76522'),
(186, '184.0.246.3', 'webmaster', 'webmaster', 'United States (US)', 'Florida', 'Fort Myers Beach', '33931'),
(185, '﻿75.151.201.133', 'PlcmSpIp', 'PlcmSpIp', 'United States (US)', 'Louisiana', 'Monroe', '71201'),
(315, '96.11.82.124', 'support', 'support', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(316, '96.39.102.226', 'PlcmSpIp', 'PlcmSpIp', 'United States (US)', 'Massachusetts', 'Worcester', 'Unknown'),
(317, '68.168.195.202', 'PlcmSpIp', 'PlcmSpIp', 'United States (US)', 'Texas', 'Quitman', '75783'),
(318, '24.111.219.222', 'user', 'user', 'United States (US)', 'North Dakota', 'Minot', '58703'),
(319, '97.68.124.16', 'git', 'git', 'United States (US)', 'Florida', 'Orlando', '32839'),
(320, '50.206.38.9', 'ubnt', 'ubnt', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(321, '207.180.113.121', 'support', 'support', 'United States (US)', 'Washington', 'Seattle', '98105'),
(322, '35.8.80.159', 'admIndian', 'admIndian', 'United States (US)', 'Michigan', 'East Lansing', '48824'),
(323, '67.208.243.51', 'ftp', 'ftp', 'United States (US)', 'Michigan', 'Lansing', '48933'),
(324, '108.247.217.90', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(325, '69.15.3.194', 'admin', 'default', 'United States (US)', 'Georgia', 'Alpharetta', 'Unknown'),
(326, '50.247.0.204', 'admin', 'default', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(327, '72.215.55.83', 'pi', 'raspberry', 'United States (US)', 'Connecticut', 'Southington', '6489'),
(328, '209.213.23.163', 'support', 'support', 'United States (US)', 'South Carolina', 'Ware Shoals', '29692'),
(329, '41.189.254.17', 'sales', 'sales', 'United States (US)', 'Armed Forces Europe, Middle East, & Canada', 'Fpo', 'Unknown'),
(330, '65.49.79.199', 'ftpuser', 'asteriskftp', 'United States (US)', 'California', 'Fremont', '94539'),
(331, '67.221.200.20', 'demo', 'demo', 'United States (US)', 'Missouri', 'Columbia', '65203'),
(332, '97.89.40.138', 'ftpuser', 'asteriskftp', 'United States (US)', 'Tennessee', 'Medina', '38355'),
(333, '41.189.254.23', 'user', 'user', 'United States (US)', 'Armed Forces Europe, Middle East, & Canada', 'Fpo', 'Unknown'),
(334, '97.68.91.68', 'sales', 'sales', 'United States (US)', 'Florida', 'Orlando', '32820'),
(335, '173.198.96.167', 'demo', 'demo', 'United States (US)', 'California', 'Bakersfield', '93311'),
(336, '24.118.51.233', 'PlcmSpIp', 'PlcmSpIp123', 'United States (US)', 'Minnesota', 'Saint Paul', '55110'),
(337, '96.2.30.44', 'user', 'user', 'United States (US)', 'South Dakota', 'Sioux Falls', '57103'),
(338, '67.190.156.46', 'pi', 'raspberry', 'United States (US)', 'Colorado', 'Pueblo', '81008'),
(339, '199.20.44.120', 'admin', 'default', 'United States (US)', 'New York', 'New York', 'Unknown'),
(340, '192.230.133.161', 'ftp', 'ftp', 'United States (US)', 'Iowa', 'Des Moines', '50309'),
(341, '166.200.165.166', 'root', 'root', 'United States (US)', 'Unknown', 'Unknown', 'Unknown'),
(342, '75.151.201.133', 'PlcmSpIp', 'PlcmSpIp', 'United States (US)', 'Louisiana', 'Monroe', '71201'),
(343, '127.0.0.1', 'git', 'git', 'Ukraine', 'Kiev', 'Киев', '12345'),
(344, '127.0.0.2', 'git', 'git', 'Ukraine', 'Kiev', 'Киев', '67891'),
(345, '127.0.0.3', 'git', 'git', 'Ukraine', 'Kiev', 'Белая Церковь', '75342'),
(346, '127.0.0.4', 'git', 'git', 'Ukraine', 'Kiev', 'Бровары', '95148'),
(347, '127.0.0.5', 'git', 'git', 'Ukraine', 'Kiev', 'Фастов', '90014'),
(348, '127.0.0.6', 'git', 'git', 'Ukraine', 'Kiev', 'Борисполь', '75386'),
(349, '127.0.0.7', 'git', 'git', 'Ukraine', 'Kiev', 'Борисполь', '35742'),
(350, '127.0.0.8', 'git', 'git', 'Ukraine', 'Odessa', 'Odessa', '73915'),
(351, '127.0.0.9', 'git', 'git', 'Ukraine', 'Odessa', 'Odessa', '97136'),
(352, '127.0.0.10', 'git', 'git', 'Ukraine', 'Odessa', 'Измаил', '63185'),
(353, '127.0.0.11', 'git', 'git', 'Ukraine', 'Odessa', 'Ильичёвск', '42685'),
(354, '127.0.0.12', 'git', 'git', 'Ukraine', 'Odessa', 'Белгород-Днестровский', '78123'),
(355, '127.0.0.13', 'git', 'git', 'Ukraine', 'Odessa', 'Котовск', '95186'),
(356, '127.0.0.14', 'git', 'git', 'Ukraine', 'Kharkiv', 'Kharkiv', '74965'),
(357, '127.0.0.15', 'git', 'git', 'Ukraine', 'Kharkiv', 'Kharkiv', '14365'),
(358, '127.0.0.16', 'git', 'git', 'Ukraine', 'Kharkiv', 'Kharkiv', '79468'),
(359, '127.0.0.17', 'git', 'git', 'Ukraine', 'Kharkiv', 'Лозовая', '12365'),
(360, '127.0.0.18', 'git', 'git', 'Ukraine', 'Kharkiv', 'Купянск', '46521'),
(361, '127.0.0.19', 'git', 'git', 'Ukraine', 'Kharkiv', 'Изюм', '89361'),
(362, '127.0.0.20', 'git', 'git', 'Japan', 'Kanto', 'Tokio', '78951'),
(363, '127.0.0.21', 'git', 'git', 'Japan', 'Kanto', 'Tokio', '11223'),
(364, '127.0.0.22', 'git', 'git', 'Japan', 'Kanto', 'Асикага', '33568'),
(365, '127.0.0.23', 'git', 'git', 'Japan', 'Kanto', 'Каги', '77896'),
(366, '127.0.0.24', 'git', 'git', 'Japan', 'Kanto', 'Канума', '11475'),
(367, '127.0.0.25', 'git', 'git', 'Somali', 'Muqdisho', 'Muqdisho', '77963'),
(368, '127.0.0.26', 'git', 'git', 'Somali', 'Muqdisho', 'Muqdisho', '96852'),
(369, '127.0.0.27', 'git', 'git', 'Somali', 'Muqdisho', 'Balcad', '88896'),
(370, '127.0.0.28', 'git', 'git', 'England', 'Greater London', 'London', '11113'),
(371, '127.0.0.29', 'git', 'git', 'England', 'Greater London', 'London', '11114'),
(372, '127.0.0.30', 'git', 'git', 'England', 'Greater Manchester', 'Bolton', '11115');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=192 ;

--
-- Дамп данных таблицы `ipstatus`
--

INSERT INTO `ipstatus` (`id`, `idipall`, `status`, `userid`, `time`) VALUES
(191, 371, 1, 85, NULL),
(190, 370, 1, 85, NULL);

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
('Price', '1'),
('LastCheckAllUserSession', '1426762924');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `newsshown`
--

INSERT INTO `newsshown` (`Id`, `IdNews`, `IdUsers`) VALUES
(25, 14, 87),
(24, 12, 85),
(23, 13, 85),
(22, 14, 85),
(26, 13, 87),
(27, 12, 87);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=136 ;

--
-- Дамп данных таблицы `userloginedtime`
--

INSERT INTO `userloginedtime` (`id`, `user`, `time`) VALUES
(134, 85, 1426762939);

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
(87, 'user3', '$2a$13$AGRlbptLEjH4w/vB2J2QueqDaIJsbARKL6Gd1yC/NKsMzPKwGAA/q', '2015-03-08 07:16:05', 2, 'user3@mail.ru', 7),
(85, 'user', '$2a$13$GQ5RXbAkBR2vQnxPH.b0Qu8pK2DdVtGHPxYanCGmTwG229p6Ax1fG', '2015-03-06 01:55:31', 2, 'user@mail.ru', 779),
(86, 'user2', '$2a$13$qUk/6S9VNEucrszKTEy6kuHPcelSnIXwx6ZZKnEKK4fVAzSArkCLy', '2015-03-08 03:27:37', 2, 'user2@mail.ru', 18);

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
