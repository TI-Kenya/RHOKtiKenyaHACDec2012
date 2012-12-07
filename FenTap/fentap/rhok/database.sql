-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2012 at 09:34 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mutie`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL,
  `refno` int(50) NOT NULL,
  `app_date` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `incident_id` bigint(20) unsigned DEFAULT NULL,
  `checkin_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT '0',
  `comment_author` varchar(100) DEFAULT NULL,
  `comment_email` varchar(120) DEFAULT NULL,
  `comment_description` text,
  `comment_ip` varchar(100) DEFAULT NULL,
  `comment_spam` tinyint(4) NOT NULL DEFAULT '0',
  `comment_active` tinyint(4) NOT NULL DEFAULT '0',
  `comment_date` datetime DEFAULT NULL,
  `comment_date_gmt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `incident_id` (`incident_id`),
  KEY `checkin_id` (`checkin_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores comments made on reports/checkins' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) DEFAULT NULL,
  `msg_id_fk` int(11) DEFAULT NULL,
  `uid_fk` int(11) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`com_id`),
  KEY `uid_fk` (`uid_fk`),
  KEY `msg_id_fk` (`msg_id_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `comment`, `msg_id_fk`, `uid_fk`, `ip`, `created`, `username`, `email`) VALUES
(1, 'This is the best', 3, 1, '127.0.0.1', 1354387919, '', ''),
(2, 'This is interesting', 10, 1, '127.0.0.1', 1354389149, '', ''),
(3, 'I like this.', 11, 1, '127.0.0.1', 1354389598, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `final_members`
--

CREATE TABLE IF NOT EXISTS `final_members` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `final_members`
--

INSERT INTO `final_members` (`uid`, `username`, `name`, `email`, `password`, `phonenumber`) VALUES
(1, 'mutiemule', 'Joseph Mutie', 'jmutie09@gmail.com', 'josemutie', ''),
(9, 'mutiemule', 'Joseph Mutie', 'jmutie09@gmail.com', 'josemutie', ''),
(10, 'mutiemule', 'Joseph Mutie', 'jmutie09@gmail.com', 'josemutie', '715195998'),
(11, 'mutiemule', 'Joseph Mutie', 'jmutie09@gmail.com', 'josemutie', '715195998'),
(12, 'mutiemule', 'Joseph Mutie', 'jmutie09@gmail.com', 'josemutie', '715195998'),
(13, 'mutiemule', 'Joseph Mutie', 'jmutie09@gmail.com', 'josemutie', '715195998'),
(14, 'mutiemule', 'Joseph Mutie', 'jmutie09@gmail.com', 'josemutie', '715195998'),
(15, 'joenamwaks', 'ANdrian Nwamakira', 'mutiedocs@gmail.com', 'josemutie', '707345890');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT '0',
  `incident_id` bigint(20) unsigned DEFAULT '0',
  `user_id` int(11) unsigned DEFAULT '0',
  `reporter_id` bigint(20) unsigned DEFAULT NULL,
  `service_messageid` varchar(100) DEFAULT NULL,
  `message_from` varchar(100) DEFAULT NULL,
  `message_to` varchar(100) DEFAULT NULL,
  `message` text,
  `message_detail` text,
  `message_type` tinyint(4) DEFAULT '1' COMMENT '1 - INBOX, 2 - OUTBOX (From Admin), 3 - DELETED',
  `message_date` datetime DEFAULT NULL,
  `message_level` tinyint(4) DEFAULT '0' COMMENT '0 - UNREAD, 1 - READ, 99 - SPAM',
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `incident_id` (`incident_id`),
  KEY `reporter_id` (`reporter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores tweets, emails and SMS messages' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `uid_fk` int(11) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`msg_id`),
  KEY `uid_fk` (`uid_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `message`, `uid_fk`, `ip`, `created`, `email`, `username`) VALUES
(3, 'Announcement two', 1, '127.0.0.1', 1354386599, '', ''),
(6, 'announcement', 1, '127.0.0.1', 1354387107, '', ''),
(10, 'Sierra Leone Elections http://www.youtube.com/watch?v=-Rvyyc7J4vA', 1, '127.0.0.1', 1354388931, '', ''),
(11, 'http://www.youtube.com/watch?v=G3zKMy6fH1o', 1, '127.0.0.1', 1354389382, '', ''),
(12, 'Lets not use this site to preach war. Lets maintain peace.', 1, '127.0.0.1', 1354389413, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `registered_members`
--

CREATE TABLE IF NOT EXISTS `registered_members` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `registered_members`
--

INSERT INTO `registered_members` (`uid`, `username`, `name`, `email`, `password`, `phonenumber`, `code`) VALUES
(1, 'mutiemule', 'Joseph Mutie', 'jmutie09@gmail.com', 'josemutie', '712789056', 33163),
(5, 'edwardk', 'Edward Kinywa', 'jmutie09@gmail.com', 'josemutie', '712789056', 33163),
(6, 'joenamwaks', 'ANdrian Nwamakira', 'mutiedocs@gmail.com', 'josemutie', '707345890', 29973);

-- --------------------------------------------------------

--
-- Table structure for table `smschools`
--

CREATE TABLE IF NOT EXISTS `smschools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `villageid` varchar(20) NOT NULL,
  `village` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `lng` float NOT NULL,
  `lat` float NOT NULL,
  `altitude` float NOT NULL,
  `healthfacility` varchar(70) NOT NULL,
  `hlat` float NOT NULL,
  `hlng` float NOT NULL,
  `halt` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `smschools`
--

INSERT INTO `smschools` (`id`, `villageid`, `village`, `district`, `school`, `lng`, `lat`, `altitude`, `healthfacility`, `hlat`, `hlng`, `halt`, `type`) VALUES
(3, 'Bondo', 'KE088', 'Got-Kachieng', 'Got-Kachieng', 34.2605, 1151, 1173, 'Ouya Dispensary', 34.2387, -0.190984, '1178', ''),
(4, 'Bondo', 'KE172', 'Magawa', 'Magawa', 34.1684, -0.0816357, 1188, 'Kapiyo Dispensary', 34.1755, -0.088974, '1178', 'C'),
(5, 'Bondo', 'KE173', 'Sinyanya', 'Sinyanya', 34.1708, -0.115045, 1146, 'Kapiyo Dispensary', 34.1755, -0.088974, '1178', 'A'),
(6, 'Bondo', 'KE174', 'Nyandusi', 'Nyandusi', 34.1472, -0.104563, 1151, 'Kapiyo Dispensary', 34.1755, -0.088974, '1178', ''),
(7, 'Bondo', 'KE175', 'Pala', 'Pala', 34.6784, -0.077194, 1136, 'Got Matar Health Center', 34.1768, -0.047249, '1244', ''),
(8, 'Bondo', 'KE176', 'Nyamonye', 'Nyamonye', 34.1383, -0.0485587, 1156, 'Nyamoye Catholic Dispensary', 34.1378, -0.051112, '1133', ''),
(9, 'Bondo', 'KE177', 'Majengo', 'Majengo', 34.203, -0.052163, 1179, 'Usigu Health Center', 34.0932, -0.059394, '1156', ''),
(10, 'Bondo', 'KE178', 'Bar awendo', 'Bar Awendo', 34.1146, -0.063386, 1162, 'Usigu Health Center', 34.0932, -0.059394, '1156', ''),
(11, 'Bondo', 'KE179', 'Nyangera', 'Nyangera', 34.0822, -0.061894, 1138, 'Usenge Dispensary', 34.0693, -0.061218, '1166', ''),
(12, 'Bondo', 'KE180', 'Kanyibok', 'Kanyibok', 34.0774, -0.085229, 0, 'Misori Dispensary', 34.2787, -0.321293, '', ''),
(13, 'Bondo', 'KE181', 'Rapogi', 'Rapogi', 34.0653, -0.101516, 1125, 'Misori Dispensary', 34.2787, -0.321293, '', ''),
(14, 'Bondo', 'KE182', 'Nyabondo', 'nyabondo', 34.0684, -0.057839, 1179, 'Misori Dispensary', 34.2787, -0.321293, '', ''),
(15, 'Bondo', 'KE183', 'Usenge', 'Usenge', 34.0484, -0.0707781, 1153, 'Usenge Dispensary', 34.0693, -0.061218, '1166', ''),
(16, 'Bondo', 'KE184', 'Sanda', 'Sanda', 34.0428, -0.0744474, 1072, 'Usenge Dispensary', 34.0693, -0.061218, '1166', ''),
(17, 'Bondo', 'KE185', 'Ulowa', 'Ulowa', 34.0376, -0.039578, 1158, 'Got Agulu Sub-District Hospital', 34.0308, -0.035469, '1168', ''),
(18, 'Bondo', 'KE186', 'Warianda', 'Warianda', 34.1506, -0.132158, 1163, 'Uyawi Dispensary', 34.1669, -0.164204, '', ''),
(19, 'Bondo', 'KE187', 'Olago', 'Olago', 34.1251, -0.155311, 1206, 'Uyawi Dispensary', 34.1669, -0.164204, '', ''),
(20, 'Bondo', 'KE188', 'Lenya', 'Lenya', 34.1164, -0.154495, 1176, 'Uyawi Dispensary', 34.1669, -0.164204, '', ''),
(21, 'Bondo', 'KE189', 'Uyawi', 'Uyawi', 34.1379, -0.172713, 1200, 'Uyawi Dispensary', 34.1669, -0.164204, '', ''),
(22, 'Bondo', 'KE190', 'Migiro', 'Migiro', 34.1536, -0.190952, 1137, 'Uyawi Dispensary', 34.1669, -0.164204, '', ''),
(23, 'Bondo', 'KE191', 'Miyandhe', 'Miyandhe', 34.1647, -0.185062, 1159, 'Uyawi Dispensary', 34.1669, -0.164204, '', ''),
(24, 'Bondo', 'KE192', 'Dago', 'Dago', 34.1737, -0.182691, 1196, 'Uyawi Dispensary', 34.1669, -0.164204, '', ''),
(25, 'Bondo', 'KE193', 'Luore', 'Luore', 34.1783, -0.185834, 1186, 'Uyawi Dispensary', 34.1669, -0.164204, '', ''),
(26, 'Bondo', 'KE194', 'Orengo', 'Orengo', 34.2059, -0.206755, 1178, 'Nyaguda Dispensary', 34.2195, -0.215091, '1170', ''),
(27, 'Bondo', 'KE195', 'Mbeka', 'Mbeka', 34.1924, -0.17547, 0, 'Nyangoma Health Center', 34.199, -0.155525, '1227', ''),
(28, 'Bondo', 'KE196', 'Uhendo', 'Uhendo', 34.2003, -0.22243, 1150, 'Nyaguda Dispensary', 34.2195, -0.215091, '1170', ''),
(29, 'Bondo', 'KE197', 'Otuoma', 'Otuoma', 34.2144, -0.233674, 1134, 'Nyaguda Dispensary', 34.2195, -0.215091, '1170', ''),
(30, 'Bondo', 'KE198', 'Nyaguda', 'Nyaguda', 34.2256, -0.215027, 1172, 'Nyaguda Dispensary', 34.2195, -0.215091, '1170', ''),
(31, 'Bondo', 'KE205', 'Nyamuanga', 'Nyamuanga', 34.2235, -0.125302, 1182, 'Nyangoma Health Center', 34.199, -0.155525, '1227', ''),
(32, 'Bondo', 'KE216', 'Minya', 'Minya', 34.2487, -0.222849, 1136, 'Got Agulu Sub-District Hospital', 34.0308, -0.035469, '1168', ''),
(33, 'Homa Bay', 'KE199', 'St.Patricks Makongeni', 'st.patricks makongeni', 34.7874, -0.106838, 1136, 'Homa Bay District Hospital', 34.4611, -0.53318, '1116', ''),
(34, 'Homa Bay', 'KE200', 'Lake Primary', 'Lake Primary', 34.4592, -0.525048, 1124, 'Homa Bay District Hospital', 34.4611, -0.53318, '1116', ''),
(35, 'Homa Bay', 'KE201', 'Pedo', 'Pedo', 34.4483, -0.539124, 1174, 'Homa Bay District Hospital', 34.4611, -0.53318, '1116', ''),
(36, 'Homa Bay', 'KE202', 'Lala', 'Lala', 34.4448, -0.555249, 1206, 'Homa Bay District Hospital', 34.4611, -0.53318, '1116', ''),
(37, 'Homa Bay', 'KE203', 'Nyagidha', 'Nyagidha', 34.427, -0.545722, 1171, 'Homa Bay District Hospital', 34.4611, -0.53318, '1116', ''),
(38, 'Homa Bay', 'KE204', 'Got rabuor', 'Got rabuor', 34.4724, -0.524254, 1182, 'Homa Bay District Hospital', 34.4611, -0.53318, '1116', ''),
(39, 'Homa Bay', 'KE206', 'Got Koketch', 'Got Koketch', 34.4929, -0.50933, 1123, 'Ngegu Dispensary', 34.5101, -0.492528, '1148', ''),
(40, 'Homa Bay', 'KE207', 'Wahambla', 'Wahambla', 34.4903, -0.519823, 1146, 'Homa Bay District Hospital', 34.4611, -0.53318, '1116', ''),
(41, 'Homa Bay', 'KE208', 'Ngegu', 'Ngegu', 34.5056, -0.500028, 1185, 'Ngegu Dispensary', 34.5101, -0.492528, '1148', ''),
(42, 'Homa Bay', 'KE209', 'Got bondo', 'Got bondo', 34.517, -0.494256, 1144, 'Ngegu Dispensary', 34.5101, -0.492528, '1148', ''),
(43, 'Homa Bay', 'KE210', 'Kuoyo Kochia', 'Kuoyo Kochia', 34.5204, -0.477283, 1113, 'Ngegu Dispensary', 34.5101, -0.492528, '1148', ''),
(44, 'Homa Bay', 'KE211', 'Kuoyo Kaura', 'Kuoyo Kaura', 34.5163, -0.483913, 1213, 'Ngegu Dispensary', 34.5101, -0.492528, '1148', ''),
(45, 'Kisumu East', 'KE131', 'Odienya', 'Odienya', 34.8257, -0.227622, 1117, 'Nyangande Health Center', 34.8454, -0.208128, '', ''),
(46, 'Kisumu East', 'KE132', 'Nyamrundu', 'Nyamrundu', 34.8171, -0.244553, 0, 'Nyangande Health Center', 34.8454, -0.208128, '', ''),
(47, 'Kisumu East', 'KE133', 'Mao', 'Mao', 34.8243, -0.205972, 1132, 'Nyangande Health Center', 34.8454, -0.208128, '', ''),
(48, 'Kisumu East', 'KE212', 'Rae Kanyaika', 'Rae Kanyaika', 34.7934, -0.117223, 1112, 'Ragumo Dispensary', 34.8089, -0.117534, '', ''),
(49, 'Kisumu East', 'KE213', 'Bwanda', 'Bwanda', 34.786, -0.134743, 0, 'Ohongo Dispensary', 34.7889, -0.118296, '', ''),
(50, 'Kisumu East', 'KE214', 'Nyalunya', 'Nyalunya', 34.8024, -0.117491, 1154, 'Ragumo Dispensary', 34.8089, -0.117534, '', ''),
(51, 'Kisumu Municipality', 'KE158', 'Dr. Robert Ouko', 'dr. robert ouko', 34.698, -0.077998, 0, 'St Marks Lela Dispensary', 34.6951, -0.073589, '', ''),
(52, 'Kisumu Municipality', 'KE159', 'Ngege', 'Ngege', 34.6926, -0.088255, 1133, 'St Marks Lela Dispensary', 34.6951, -0.073589, '', ''),
(53, 'Kisumu Municipality', 'KE160', 'Tiengre', 'Tiengre', 34.6899, -0.081067, 1180, 'St Marks Lela Dispensary', 34.6951, -0.073589, '', ''),
(54, 'Kisumu Municipality', 'KE161', 'Ogal', 'Ogal', 34.5903, -0.136342, 1178, 'Ober Kamoth Health Center', 34.6097, -0.115002, '', ''),
(55, 'Kisumu Municipality', 'KE162', 'Gongo', 'Gongo', 34.6074, -0.141459, 0, 'Ober Kamoth Health Center', 34.6097, -0.115002, '', ''),
(56, 'Kisumu Municipality', 'KE163', 'Lisuka', 'Lisuka', 34.6473, -0.108414, 1141, 'Rota Dispensary', 34.6736, -0.092793, '', ''),
(57, 'Kisumu Municipality', 'KE164', 'Usari', 'Usari', 34.6651, -0.10231, 1138, 'Rota Dispensary', 34.6736, -0.092793, '', ''),
(58, 'Kisumu Municipality', 'KE165', 'Rota', 'Rota', 34.6732, -0.092514, 1149, 'Rota Dispensary', 34.6736, -0.092793, '', ''),
(59, 'Kisumu Municipality', 'KE225', 'Kotetni', 'Kotetni', 34.7146, -0.07508, 0, 'Kodiaga Prison Health Center', 34.7088, -0.062162, '', ''),
(60, 'Kisumu West', 'KE217', 'Oruga', 'Oruga', 34.5395, -0.139099, 1204, 'Bodi Health Center', 34.5126, -0.163571, '', ''),
(61, 'Kisumu West', 'KE218', 'Olare', 'Olare', 34.5547, -0.096055, 1213, 'Bodi Health Center', 34.5126, -0.163571, '', ''),
(62, 'Kisumu West', 'KE219', 'Kajulu', 'Kajulu', 34.5496, -0.124197, 1209, 'Rodi Dispensary', 34.5728, -0.119025, '', ''),
(63, 'Kisumu West', 'KE220', 'Rabongi', 'Rabongi', 34.5287, -0.149023, 1230, 'Bodi Health Center', 34.5126, -0.163571, '', ''),
(64, 'Kisumu West', 'KE221', 'Abol', 'Abol', 34.5107, -0.168614, 1176, 'Bodi Health Center', 34.5126, -0.163571, '', ''),
(65, 'Kisumu West', 'KE222', 'Ngutu', 'Ngutu', 34.5122, -0.160363, 1187, 'Bodi Health Center', 34.5126, -0.163571, '', ''),
(66, 'Kisumu West', 'KE223', 'Rodi Primary', 'Rodi Primary', 34.5695, -0.121911, 0, 'Rodi Dispensary', 34.5728, -0.119025, '', ''),
(67, 'Kisumu West', 'KE224', 'Jonyo', 'Jonyo', 34.5067, -0.181607, 1150, 'Bodi Health Center', 34.5126, -0.163571, '', ''),
(68, 'Nyakach', 'KE166', 'sango Buru', 'sango Buru', 34.8083, -0.331339, 1129, 'Sango Rota Dispensary', 34.8051, -0.315974, '', ''),
(69, 'Nyakach', 'KE167', 'Nyongonga', 'Nyongona', 34.8003, -0.316533, 1206, 'Sango Rota Dispensary', 34.8051, -0.315974, '', ''),
(70, 'Nyakach', 'KE168', 'Obange', 'Obange', 34.7865, -0.302403, 1129, 'Sango Rota Dispensary', 34.8051, -0.315974, '', ''),
(71, 'Nyakach', 'KE169', 'Nyamanyinga', 'Nyamanyinga', 34.7912, -0.307649, 1131, 'Sango Rota Dispensary', 34.8051, -0.315974, '', ''),
(72, 'Nyakach', 'KE170', 'Onego', 'Onego', 34.8341, -0.333259, 0, 'Sango Rota Dispensary', 34.8051, -0.315974, '', ''),
(73, 'Nyakach', 'KE171', 'Nyadina', 'Nyadina', 34.7773, -0.312005, 1090, 'Sango Rota Dispensary', 34.8051, -0.315974, '', ''),
(74, 'Rachuonyo North', 'KE076', 'Kobala ', 'Kobala ', 34.766, -0.348784, 1121, 'Rakwaro Health Center', 34.756, -354759, '1155', ''),
(75, 'Rachuonyo North', 'KE077', 'Kogweno', 'Kogweno', 34.747, -0.365831, 1185, 'Rakwaro Health Center', 34.756, -354759, '1155', ''),
(76, 'Rachuonyo North', 'KE078', 'St. Douglas Weta', 'St. Douglas Weta', 34.754, -0.537989, 1162, 'Rakwaro Health Center', 34.756, -354759, '1155', ''),
(77, 'Rachuonyo North', 'KE079', 'Apuko Doh', 'Apuko Doh', 34.7916, -0.375305, 1378, 'Rakwaro Health Center', 34.756, -354759, '1155', ''),
(78, 'Rachuonyo North', 'KE080', 'Konyach', 'Konyach', 34.7605, -0.358075, 1168, 'Rakwaro Health Center', 34.756, -354759, '1155', ''),
(79, 'Rachuonyo North', 'KE081', 'Kamwala', 'Kamwala', 34.7495, -0.360521, 1167, 'Rakwaro Health Center', 34.756, -354759, '1155', ''),
(80, 'Rachuonyo North', 'KE082', 'Kanyangwena', 'kanyangwena', 34.7336, -0.358997, 1160, 'Rakwaro Health Center', 34.756, -354759, '1155', ''),
(81, 'Rachuonyo North', 'KE083', 'Karabondi', 'Karabondi', 34.7212, -0.358825, 1167, 'Lela Dispensary', 34.7112, -0.3585, '1170', ''),
(82, 'Rachuonyo North', 'KE084', 'Mirembe', 'Mirembe', 34.7133, -0.365124, 1176, 'Lela Dispensary', 34.7112, -0.3585, '1170', ''),
(83, 'Rachuonyo North', 'KE085', 'Kamser', 'Kamser', 34.6977, -0.358944, 1122, 'Lela Dispensary', 34.7112, -0.3585, '1170', ''),
(84, 'Rachuonyo North', 'KE086', 'Seka Dok', 'Seka Dok', 34.6836, -0.356594, 1137, 'Lela Dispensary', 34.7112, -0.3585, '1170', ''),
(85, 'Rachuonyo North', 'KE087', 'Maguti', 'Maguti', 34.6607, -0.358161, 1138, 'Lela Dispensary', 34.7112, -0.3585, '1170', ''),
(86, 'Rachuonyo North', 'KE090', 'Kotieno Gumba', 'Kotieno Gumba', 34.6684, -0.364362, 1185, 'Kendu Sub-District Hospital', 34.6504, -0.370391, '1134', ''),
(87, 'Rachuonyo North', 'KE091', 'Rongo Nyagowa', 'Rongo Nyagowa', 34.5924, -0.349749, 1148, 'Wagwe Health Center', 34.5741, -0.349835, '1157', ''),
(88, 'Rachuonyo North', 'KE092', 'Alego', 'Alego', 34.6089, -0.352582, 1159, 'Wagwe Health Center', 34.5741, -0.349835, '1157', ''),
(89, 'Rachuonyo North', 'KE093', 'Osika', 'Osika', 34.6104, -0.361294, 1125, 'Wagwe Health Center', 34.5741, -0.349835, '1157', ''),
(90, 'Rachuonyo North', 'KE094', 'Simbi', 'Simbi', 34.6253, -0.358322, 1125, 'Simbi Kogembo Health Center', 34.6301, -0.364683, '1138', ''),
(91, 'Rachuonyo North', 'KE134', 'Kagayi', 'Kagayi', 35.5741, -0.358428, 1156, 'Wagwe Health Center', 34.5741, -0.349835, '1157', ''),
(92, 'Rachuonyo North', 'KE135', 'Wagwe', 'Wagwe', 34.5687, -0.351573, 1133, 'Wagwe Health Center', 34.5741, -0.349835, '1157', ''),
(93, 'Rachuonyo North', 'KE136', 'Oindo', 'Oindo', 34.5484, -0.346959, 1180, 'Wagwe Health Center', 34.5741, -0.349835, '1157', ''),
(94, 'Rachuonyo North', 'KE137', 'Kingii', 'Kingii', 34.5471, -0.336478, 1143, 'Wagwe Health Center', 34.5741, -0.349835, '1157', ''),
(95, 'Rachuonyo North', 'KE138', 'Kokoth', 'Kokoth', 34.5373, -0.355564, 1201, 'Nyaoga Dispensary', 34.5202, -0.349491, '1193', ''),
(96, 'Rachuonyo North', 'KE139', 'Onyando', 'Onyando', 34.5325, -0.34255, 1208, 'Nyaoga Dispensary', 34.5202, -0.349491, '1193', ''),
(97, 'Rachuonyo North', 'KE140', 'Migunde', 'Migunde', 34.5194, -0.350533, 1181, 'Nyaoga Dispensary', 34.5202, -0.349491, '1193', ''),
(98, 'Rachuonyo North', 'KE141', 'Koboo', 'Koboo', 34.5191, -0.3424, 1170, 'Nyaoga Dispensary', 34.5202, -0.349491, '1193', ''),
(99, 'Rachuonyo North', 'KE142', 'Kasibos', 'Kasibos', 34.5125, -0.35064, 1198, 'Nyaoga Dispensary', 34.5202, -0.349491, '1193', ''),
(100, 'Rachuonyo North', 'KE143', 'Abundu', 'Abundu', 34.5085, -0.355543, 1258, 'Homa Hills Health Center', 34.4683, -0.353976, '1151', ''),
(101, 'Rachuonyo North', 'KE144', 'Jonyo', 'Jonyo', 34.4716, -0.364802, 1181, 'Homa Hills Health Center', 34.4683, -0.353976, '1151', ''),
(102, 'Rachuonyo North', 'KE145', 'Chula', 'Chula', 34.4639, -0.373353, 1168, 'Homa Hills Health Center', 34.4683, -0.353976, '1151', ''),
(103, 'Rachuonyo North', 'KE146', 'Alara', 'Alara', 34.4775, -0.406998, 1245, 'Homa Line Health Center', 34.4755, -0.430333, '1177', ''),
(104, 'Rachuonyo North', 'KE147', 'Homa Hills', 'Homa Hills', 34.4659, -0.358472, 1151, 'Homa Hills Health Center', 34.4683, -0.353976, '1151', ''),
(105, 'Rachuonyo North', 'KE148', 'Angonga', 'Angonga', 34.4666, -0.387343, 1241, 'Homa Line Health Center', 34.4755, -0.430333, '1177', ''),
(106, 'Rachuonyo North', 'KE149', 'Ndere', 'Ndere', 34.4641, -0.393416, 1226, 'Homa Hills Health Center', 34.4683, -0.353976, '1151', ''),
(107, 'Rachuonyo North', 'KE150', 'Kanam', 'Kanam', 34.4813, -0.355049, 1132, 'Homa Hills Health Center', 34.4683, -0.353976, '1151', ''),
(108, 'Rachuonyo North', 'KE151', 'Kisindi', 'Kisindi', 34.459, -0.407245, 1165, 'Homa Hills Health Center', 34.4683, -0.353976, '1151', ''),
(109, 'Rachuonyo North', 'KE152', 'Homa Lime', 'Homa Lime', 34.4803, -0.418135, 1232, 'Homa Line Health Center', 34.4755, -0.430333, '1177', ''),
(110, 'Rachuonyo North', 'KE153', 'Nduga', 'Nduga', 34.5128, -0.446062, 1140, 'Homa Line Health Center', 34.4755, -0.430333, '1177', ''),
(111, 'Rachuonyo North', 'KE154', 'Lwanda', 'Lwanda', 34.5007, -0.435022, 1191, 'Homa Line Health Center', 34.4755, -0.430333, '1177', ''),
(112, 'Rachuonyo North', 'KE155', 'Lo-rateng', 'Lo-rateng', 34.491, -0.440601, 1212, 'Homa Line Health Center', 34.4755, -0.430333, '1177', ''),
(113, 'Rachuonyo North', 'KE156', 'Rabuor Koguta', 'Rabuor Koguta', 34.483, -0.42469, 1198, 'Homa Line Health Center', 34.4755, -0.430333, '1177', ''),
(114, 'Rachuonyo North', 'KE157', 'Ngou', 'Ngou', 34.4998, -0.422812, 1234, 'Okiki Amayo Memorial Health Center', 34.5114, -0.411965, '1279', ''),
(115, 'Rachuonyo North', 'KE215', 'Migeni', 'Migeni', 34.4892, -0.410356, 1322, 'Okiki Amayo Memorial Health Center', 34.5114, -0.411965, '1279', ''),
(116, 'Rarieda', 'KE089', 'Nyamasore', 'Nyamasore', 34.3786, -0.259691, 0, 'RAGEGNI Dispensary', 34.3642, -0.272136, '', ''),
(117, 'Rarieda', 'KE095', 'Got okola', 'Got okola', 34.3232, -0.249155, 0, 'Pap Kadero Dispensary', 34.3232, -0.249155, '', ''),
(118, 'Rarieda', 'KE096', 'Komolo', 'Komolo', 34.3088, -0.273917, 1188, 'Pap Kadero Dispensary', 34.3232, -0.249155, '', ''),
(119, 'Rarieda', 'KE097', 'Got Kojwang', 'Got Kojwang', 34.2737, -0.2158, 1140, 'Manyuanda Health Center', 34.2767, -0.255174, '1192', ''),
(120, 'Rarieda', 'KE098', 'Kawuondi', 'Kawuondi', 34.2756, -0.225424, 1154, 'Manyuanda Health Center', 34.2767, -0.255174, '1192', ''),
(121, 'Rarieda', 'KE099', 'kagwa', 'Kagwa', 34.2575, -0.229661, 1237, 'Kagwa Dispensary', 34.2572, -0.227322, '1161', ''),
(122, 'Rarieda', 'KE100', 'Manyuanda', 'Manyuanda', 34.2791, -0.253854, 1187, 'Manyuanda Health Center', 34.2767, -0.255174, '1192', ''),
(123, 'Rarieda', 'KE101', 'Nyakongo', 'Nyakongo', 34.2792, -0.279024, 1201, 'Manyuanda Health Center', 34.2767, -0.255174, '1192', ''),
(124, 'Rarieda', 'KE102', 'Bar-kogonga', 'Bar-kogonga', 34.2585, -0.292232, 1218, 'Manyuanda Health Center', 34.2767, -0.255174, '1192', ''),
(125, 'Rarieda', 'KE103', 'Akuom', 'Akuom', 34.2715, -0.276868, 1197, 'Manyuanda Health Center', 34.2767, -0.255174, '1192', ''),
(126, 'Rarieda', 'KE104', 'Tuju', 'Tuju', 34.261, -0.241957, 1166, 'Manyuanda Health Center', 34.2767, -0.255174, '1192', ''),
(127, 'Rarieda', 'KE105', 'Kahoya', 'Kahoya', 34.29, -0.264532, 1178, 'Manyuanda Health Center', 34.2767, -0.255174, '1192', ''),
(128, 'Rarieda', 'KE106', 'Tanga', 'Tanga', 34.2975, -0.284174, 1199, 'Naya Dispensary', 34.313, -0.36537, '1177', ''),
(129, 'Rarieda', 'KE107', 'Ogango', 'Ogango', 34.2962, -0.290777, 0, 'Madiany District Hospital', 34.3231, -0.283734, '1212', ''),
(130, 'Rarieda', 'KE108', 'nyabera', 'Nyabera', 34.2911, -0.305532, 0, 'Misori Dispensary', 34.2787, -0.321293, '', ''),
(131, 'Rarieda', 'KE109', 'Wambisa', 'Wambisa', 34.2804, -0.309298, 0, 'Misori Dispensary', 34.2787, -0.321293, '', ''),
(132, 'Rarieda', 'KE110', 'Misori', 'Misori', 34.2717, -0.319113, 0, 'Misori Dispensary', 34.2787, -0.321293, '', ''),
(133, 'Rarieda', 'KE111', 'Mirando', 'Mirando', 34.2871, -0.334525, 0, 'Misori Dispensary', 34.2787, -0.321293, '', ''),
(134, 'Rarieda', 'KE112', 'Lwala Rahongo', 'Lwala Rahongo', 34.3078, -0.323657, 0, 'Naya Dispensary', 34.313, -0.36537, '1177', ''),
(135, 'Rarieda', 'KE113', 'Ramoya', 'Ramoya', 34.3236, -0.311307, 0, 'Lieta Health Center', 34.3429, -0.325126, '', ''),
(136, 'Rarieda', 'KE114', 'Ndigwa ', 'Ndigwa ', 34.3226, -0.33358, 0, 'Madiany District Hospital', 34.3231, -0.283734, '1212', ''),
(137, 'Rarieda', 'KE115', 'Rabel', 'Rabel', 34.331, -0.323775, 0, 'Lieta Health Center', 34.3429, -0.325126, '', ''),
(138, 'Rarieda', 'KE116', 'Naya', 'Naya', 34.3017, -0.382676, 1200, 'Naya Dispensary', 34.313, -0.36537, '1177', ''),
(139, 'Rarieda', 'KE117', 'Chianda', 'Chianda', 34.3416, -0.244542, 0, 'Pap Kadero Dispensary', 34.3232, -0.249155, '', ''),
(140, 'Rarieda', 'KE118', 'Ranyala', 'Ranyala', 34.3074, -0.373846, 0, 'Naya Dispensary', 34.313, -0.36537, '1177', ''),
(141, 'Rarieda', 'KE119', 'Kadundo', 'Kadundo', 34.3133, -0.345972, 0, 'Naya Dispensary', 34.313, -0.36537, '1177', ''),
(142, 'Rarieda', 'KE120', 'Ndonyo', 'Ndonyo', 34.3235, -0.353354, 0, 'Naya Dispensary', 34.313, -0.36537, '1177', ''),
(143, 'Rarieda', 'KE121', 'Kunya', 'Kunya', 34.3904, -0.286728, 0, 'Kunya Dispensary', 34.4001, -0.288476, '', ''),
(144, 'Rarieda', 'KE122', 'Lieta', 'Lieta', 34.3441, -0.323495, 0, 'Lieta Health Center', 34.3429, -0.325126, '', ''),
(145, 'Rarieda', 'KE123', 'Mumbo', 'Mumbo', 34.3562, -0.336198, 0, 'Lieta Health Center', 34.3429, -0.325126, '', ''),
(146, 'Rarieda', 'KE124', 'Wayaga', 'Wayaga', 34.3621, -0.303636, 0, 'Ragegni Dispensary', 34.3642, -0.272136, '', ''),
(147, 'Rarieda', 'KE125', 'Buru', 'Buru', 34.3362, -0.338559, 0, 'Lieta Health Center', 34.3429, -0.325126, '', ''),
(148, 'Rarieda', 'KE126', 'Agok', 'Agok', 34.3313, -0.349797, 0, 'Naya Dispensary', 34.313, -0.36537, '1177', ''),
(149, 'Rarieda', 'KE127', 'Nyangoye', 'Nyangoye', 34.2953, -0.34653, 1155, 'Naya Dispensary', 34.313, -0.36537, '1177', ''),
(150, 'Rarieda', 'KE128', 'Mirau', 'Mirau', 34.2957, -0.38936, 0, 'Wi Omino Dispensary', 34.3128, -0.36512, '', ''),
(151, 'Rarieda', 'KE129', 'Lenrose', 'Lenrose', 34.2867, -0.388609, 0, 'Naya Dispensary', 34.313, -0.36537, '1177', ''),
(152, 'Rarieda', 'KE130', 'Nyaondo', 'Nyaondo', 34.2889, -0.383875, 0, 'Naya Dispensary', 34.313, -0.36537, '1177', '');

-- --------------------------------------------------------

--
-- Table structure for table `smskuls`
--

CREATE TABLE IF NOT EXISTS `smskuls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `villageid` varchar(20) NOT NULL,
  `village` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `lng` float NOT NULL,
  `lat` float NOT NULL,
  `altitude` float NOT NULL,
  `healthfacility` varchar(70) NOT NULL,
  `type` varchar(10) NOT NULL,
  `hlat` float NOT NULL,
  `hlng` float NOT NULL,
  `halt` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `smskuls`
--

INSERT INTO `smskuls` (`id`, `villageid`, `village`, `district`, `school`, `lng`, `lat`, `altitude`, `healthfacility`, `type`, `hlat`, `hlng`, `halt`) VALUES
(3, 'Bondo', 'KE088', 'Got-Kachieng', 'Got-Kachieng', 34.2605, 1151, 1173, 'Ouya Dispensary', 'b', 34.2387, -0.190984, '1178'),
(4, 'Bondo', 'KE172', 'Magawa', 'Magawa', 34.1684, -0.0816357, 1188, 'Kapiyo Dispensary', 'm', 34.1755, -0.088974, '1178'),
(5, 'Bondo', 'KE173', 'Sinyanya', 'Sinyanya', 34.1708, -0.115045, 1146, 'Kapiyo Dispensary', 'c', 34.1755, -0.088974, '1178'),
(6, 'Bondo', 'KE174', 'Nyandusi', 'Nyandusi', 34.1472, -0.104563, 1151, 'Kapiyo Dispensary', 'b', 34.1755, -0.088974, '1178'),
(7, 'Bondo', 'KE175', 'Pala', 'Pala', 34.6784, -0.077194, 1136, 'Got Matar Health Center', 'c', 34.1768, -0.047249, '1244'),
(8, 'Bondo', 'KE176', 'Nyamonye', 'Nyamonye', 34.1383, -0.0485587, 1156, 'Nyamoye Catholic Dispensary', 'c', 34.1378, -0.051112, '1133'),
(9, 'Bondo', 'KE177', 'Majengo', 'Majengo', 34.203, -0.052163, 1179, 'Usigu Health Center', 'b', 34.0932, -0.059394, '1156'),
(10, 'Bondo', 'KE178', 'Bar awendo', 'Bar Awendo', 34.1146, -0.063386, 1162, 'Usigu Health Center', 'c', 34.0932, -0.059394, '1156'),
(11, 'Bondo', 'KE179', 'Nyangera', 'Nyangera', 34.0822, -0.061894, 1138, 'Usenge Dispensary', 'b', 34.0693, -0.061218, '1166'),
(12, 'Bondo', 'KE180', 'Kanyibok', 'Kanyibok', 34.0774, -0.085229, 0, 'Misori Dispensary', 'c', 34.2787, -0.321293, ''),
(13, 'Bondo', 'KE181', 'Rapogi', 'Rapogi', 34.0653, -0.101516, 1125, 'Misori Dispensary', 'b', 34.2787, -0.321293, ''),
(14, 'Bondo', 'KE182', 'Nyabondo', 'nyabondo', 34.0684, -0.057839, 1179, 'Misori Dispensary', 'b', 34.2787, -0.321293, ''),
(15, 'Bondo', 'KE183', 'Usenge', 'Usenge', 34.0484, -0.0707781, 1153, 'Usenge Dispensary', 'c', 34.0693, -0.061218, '1166'),
(16, 'Bondo', 'KE184', 'Sanda', 'Sanda', 34.0428, -0.0744474, 1072, 'Usenge Dispensary', 'b', 34.0693, -0.061218, '1166'),
(17, 'Bondo', 'KE185', 'Ulowa', 'Ulowa', 34.0376, -0.039578, 1158, 'Got Agulu Sub-District Hospital', 'b', 34.0308, -0.035469, '1168'),
(18, 'Bondo', 'KE186', 'Warianda', 'Warianda', 34.1506, -0.132158, 1163, 'Uyawi Dispensary', 'b', 34.1669, -0.164204, ''),
(19, 'Bondo', 'KE187', 'Olago', 'Olago', 34.1251, -0.155311, 1206, 'Uyawi Dispensary', 'b', 34.1669, -0.164204, ''),
(20, 'Bondo', 'KE188', 'Lenya', 'Lenya', 34.1164, -0.154495, 1176, 'Uyawi Dispensary', 'c', 34.1669, -0.164204, ''),
(21, 'Bondo', 'KE189', 'Uyawi', 'Uyawi', 34.1379, -0.172713, 1200, 'Uyawi Dispensary', 'm', 34.1669, -0.164204, ''),
(22, 'Bondo', 'KE190', 'Migiro', 'Migiro', 34.1536, -0.190952, 1137, 'Uyawi Dispensary', 'c', 34.1669, -0.164204, ''),
(23, 'Bondo', 'KE191', 'Miyandhe', 'Miyandhe', 34.1647, -0.185062, 1159, 'Uyawi Dispensary', 'c', 34.1669, -0.164204, ''),
(24, 'Bondo', 'KE192', 'Dago', 'Dago', 34.1737, -0.182691, 1196, 'Uyawi Dispensary', 'c', 34.1669, -0.164204, ''),
(25, 'Bondo', 'KE193', 'Luore', 'Luore', 34.1783, -0.185834, 1186, 'Uyawi Dispensary', 'b', 34.1669, -0.164204, ''),
(26, 'Bondo', 'KE194', 'Orengo', 'Orengo', 34.2059, -0.206755, 1178, 'Nyaguda Dispensary', 'm', 34.2195, -0.215091, '1170'),
(27, 'Bondo', 'KE195', 'Mbeka', 'Mbeka', 34.1924, -0.17547, 0, 'Nyangoma Health Center', 'c', 34.199, -0.155525, '1227'),
(28, 'Bondo', 'KE196', 'Uhendo', 'Uhendo', 34.2003, -0.22243, 1150, 'Nyaguda Dispensary', 'c', 34.2195, -0.215091, '1170'),
(29, 'Bondo', 'KE197', 'Otuoma', 'Otuoma', 34.2144, -0.233674, 1134, 'Nyaguda Dispensary', 'm', 34.2195, -0.215091, '1170'),
(30, 'Bondo', 'KE198', 'Nyaguda', 'Nyaguda', 34.2256, -0.215027, 1172, 'Nyaguda Dispensary', 'c', 34.2195, -0.215091, '1170'),
(31, 'Bondo', 'KE205', 'Nyamuanga', 'Nyamuanga', 34.2235, -0.125302, 1182, 'Nyangoma Health Center', 'b', 34.199, -0.155525, '1227'),
(32, 'Bondo', 'KE216', 'Minya', 'Minya', 34.2487, -0.222849, 1136, 'Got Agulu Sub-District Hospital', 'c', 34.0308, -0.035469, '1168'),
(33, 'Homa Bay', 'KE199', 'St.Patricks Makongeni', 'st.patricks makongeni', 0, 34.7874, -0.106838, '1136', 'Homa Bay D', 34.4611, -0.53318, '1116'),
(34, 'Homa Bay', 'KE200', 'Lake Primary', 'Lake Primary', 34.4592, -0.525048, 1124, 'Homa Bay District Hospital', 'c', 34.4611, -0.53318, '1116'),
(35, 'Homa Bay', 'KE201', 'Pedo', 'Pedo', 34.4483, -0.539124, 1174, 'Homa Bay District Hospital', 'c', 34.4611, -0.53318, '1116'),
(36, 'Homa Bay', 'KE202', 'Lala', 'Lala', 34.4448, -0.555249, 1206, 'Homa Bay District Hospital', 'c', 34.4611, -0.53318, '1116'),
(37, 'Homa Bay', 'KE203', 'Nyagidha', 'Nyagidha', 34.427, -0.545722, 1171, 'Homa Bay District Hospital', 'b', 34.4611, -0.53318, '1116'),
(38, 'Homa Bay', 'KE204', 'Got rabuor', 'Got rabuor', 34.4724, -0.524254, 1182, 'Homa Bay District Hospital', 'c', 34.4611, -0.53318, '1116'),
(39, 'Homa Bay', 'KE206', 'Got Koketch', 'Got Koketch', 34.4929, -0.50933, 1123, 'Ngegu Dispensary', 'b', 34.5101, -0.492528, '1148'),
(40, 'Homa Bay', 'KE207', 'Wahambla', 'Wahambla', 34.4903, -0.519823, 1146, 'Homa Bay District Hospital', 'b', 34.4611, -0.53318, '1116'),
(41, 'Homa Bay', 'KE208', 'Ngegu', 'Ngegu', 34.5056, -0.500028, 1185, 'Ngegu Dispensary', 'b', 34.5101, -0.492528, '1148'),
(42, 'Homa Bay', 'KE209', 'Got bondo', 'Got bondo', 34.517, -0.494256, 1144, 'Ngegu Dispensary', 'b', 34.5101, -0.492528, '1148'),
(43, 'Homa Bay', 'KE210', 'Kuoyo Kochia', 'Kuoyo Kochia', 34.5204, -0.477283, 1113, 'Ngegu Dispensary', 'c', 34.5101, -0.492528, '1148'),
(44, 'Homa Bay', 'KE211', 'Kuoyo Kaura', 'Kuoyo Kaura', 34.5163, -0.483913, 1213, 'Ngegu Dispensary', 'c', 34.5101, -0.492528, '1148'),
(45, 'Kisumu East', 'KE131', 'Odienya', 'Odienya', 34.8257, -0.227622, 1117, 'Nyangande Health Center', 'c', 34.8454, -0.208128, ''),
(46, 'Kisumu East', 'KE132', 'Nyamrundu', 'Nyamrundu', 34.8171, -0.244553, 0, 'Nyangande Health Center', 'b', 34.8454, -0.208128, ''),
(47, 'Kisumu East', 'KE133', 'Mao', 'Mao', 34.8243, -0.205972, 1132, 'Nyangande Health Center', 'b', 34.8454, -0.208128, ''),
(48, 'Kisumu East', 'KE212', 'Rae Kanyaika', 'Rae Kanyaika', 34.7934, -0.117223, 1112, 'Ragumo Dispensary', 'b', 34.8089, -0.117534, ''),
(49, 'Kisumu East', 'KE213', 'Bwanda', 'Bwanda', 34.786, -0.134743, 0, 'Ohongo Dispensary', 'b', 34.7889, -0.118296, ''),
(50, 'Kisumu East', 'KE214', 'Nyalunya', 'Nyalunya', 34.8024, -0.117491, 1154, 'Ragumo Dispensary', 'c', 34.8089, -0.117534, ''),
(51, 'Kisumu Municipality', 'KE158', 'Dr. Robert Ouko', 'dr. robert ouko', 34.698, -0.077998, 0, 'St Marks Lela Dispensary', 'b', 34.6951, -0.073589, ''),
(52, 'Kisumu Municipality', 'KE159', 'Ngege', 'Ngege', 34.6926, -0.088255, 1133, 'St Marks Lela Dispensary', 'c', 34.6951, -0.073589, ''),
(53, 'Kisumu Municipality', 'KE160', 'Tiengre', 'Tiengre', 34.6899, -0.081067, 1180, 'St Marks Lela Dispensary', 'c', 34.6951, -0.073589, ''),
(54, 'Kisumu Municipality', 'KE161', 'Ogal', 'Ogal', 34.5903, -0.136342, 1178, 'Ober Kamoth Health Center', 'c', 34.6097, -0.115002, ''),
(55, 'Kisumu Municipality', 'KE162', 'Gongo', 'Gongo', 34.6074, -0.141459, 0, 'Ober Kamoth Health Center', 'c', 34.6097, -0.115002, ''),
(56, 'Kisumu Municipality', 'KE163', 'Lisuka', 'Lisuka', 34.6473, -0.108414, 1141, 'Rota Dispensary', 'b', 34.6736, -0.092793, ''),
(57, 'Kisumu Municipality', 'KE164', 'Usari', 'Usari', 34.6651, -0.10231, 1138, 'Rota Dispensary', 'c', 34.6736, -0.092793, ''),
(58, 'Kisumu Municipality', 'KE165', 'Rota', 'Rota', 34.6732, -0.092514, 1149, 'Rota Dispensary', 'b', 34.6736, -0.092793, ''),
(59, 'Kisumu Municipality', 'KE225', 'Kotetni', 'Kotetni', 34.7146, -0.07508, 0, 'Kodiaga Prison Health Center', 'm', 34.7088, -0.062162, ''),
(60, 'Kisumu West', 'KE217', 'Oruga', 'Oruga', 34.5395, -0.139099, 1204, 'Bodi Health Center', 'c', 34.5126, -0.163571, ''),
(61, 'Kisumu West', 'KE218', 'Olare', 'Olare', 34.5547, -0.096055, 1213, 'Bodi Health Center', 'c', 34.5126, -0.163571, ''),
(62, 'Kisumu West', 'KE219', 'Kajulu', 'Kajulu', 34.5496, -0.124197, 1209, 'Rodi Dispensary', 'c', 34.5728, -0.119025, ''),
(63, 'Kisumu West', 'KE220', 'Rabongi', 'Rabongi', 34.5287, -0.149023, 1230, 'Bodi Health Center', 'b', 34.5126, -0.163571, ''),
(64, 'Kisumu West', 'KE221', 'Abol', 'Abol', 34.5107, -0.168614, 1176, 'Bodi Health Center', 'c', 34.5126, -0.163571, ''),
(65, 'Kisumu West', 'KE222', 'Ngutu', 'Ngutu', 34.5122, -0.160363, 1187, 'Bodi Health Center', 'c', 34.5126, -0.163571, ''),
(66, 'Kisumu West', 'KE223', 'Rodi Primary', 'Rodi Primary', 34.5695, -0.121911, 0, 'Rodi Dispensary', 'c', 34.5728, -0.119025, ''),
(67, 'Kisumu West', 'KE224', 'Jonyo', 'Jonyo', 34.5067, -0.181607, 1150, 'Bodi Health Center', 'b', 34.5126, -0.163571, ''),
(68, 'Nyakach', 'KE166', 'sango Buru', 'sango Buru', 34.8083, -0.331339, 1129, 'Sango Rota Dispensary', 'c', 34.8051, -0.315974, ''),
(69, 'Nyakach', 'KE167', 'Nyongonga', 'Nyongona', 34.8003, -0.316533, 1206, 'Sango Rota Dispensary', 'b', 34.8051, -0.315974, ''),
(70, 'Nyakach', 'KE168', 'Obange', 'Obange', 34.7865, -0.302403, 1129, 'Sango Rota Dispensary', 'c', 34.8051, -0.315974, ''),
(71, 'Nyakach', 'KE169', 'Nyamanyinga', 'Nyamanyinga', 34.7912, -0.307649, 1131, 'Sango Rota Dispensary', 'b', 34.8051, -0.315974, ''),
(72, 'Nyakach', 'KE170', 'Onego', 'Onego', 34.8341, -0.333259, 0, 'Sango Rota Dispensary', 'm', 34.8051, -0.315974, ''),
(73, 'Nyakach', 'KE171', 'Nyadina', 'Nyadina', 34.7773, -0.312005, 1090, 'Sango Rota Dispensary', 'm', 34.8051, -0.315974, ''),
(74, 'Rachuonyo North', 'KE076', 'Kobala ', 'Kobala ', 34.766, -0.348784, 1121, 'Rakwaro Health Center', 'b', 34.756, -354759, '1155'),
(75, 'Rachuonyo North', 'KE077', 'Kogweno', 'Kogweno', 34.747, -0.365831, 1185, 'Rakwaro Health Center', 'c', 34.756, -354759, '1155'),
(76, 'Rachuonyo North', 'KE078', 'St. Douglas Weta', 'St. Douglas Weta', 34.754, -0.537989, 1162, 'Rakwaro Health Center', 'c', 34.756, -354759, '1155'),
(77, 'Rachuonyo North', 'KE079', 'Apuko Doh', 'Apuko Doh', 34.7916, -0.375305, 1378, 'Rakwaro Health Center', 'b', 34.756, -354759, '1155'),
(78, 'Rachuonyo North', 'KE080', 'Konyach', 'Konyach', 34.7605, -0.358075, 1168, 'Rakwaro Health Center', 'b', 34.756, -354759, '1155'),
(79, 'Rachuonyo North', 'KE081', 'Kamwala', 'Kamwala', 34.7495, -0.360521, 1167, 'Rakwaro Health Center', 'b', 34.756, -354759, '1155'),
(80, 'Rachuonyo North', 'KE082', 'KanyangWena', 'kanyangwena', 34.7336, -0.358997, 1160, 'Rakwaro Health Center', 'c', 34.756, -354759, '1155'),
(81, 'Rachuonyo North', 'KE083', 'Karabondi', 'Karabondi', 34.7212, -0.358825, 1167, 'Lela Dispensary', 'b', 34.7112, -0.3585, '1170'),
(82, 'Rachuonyo North', 'KE084', 'Mirembe', 'Mirembe', 34.7133, -0.365124, 1176, 'Lela Dispensary', 'c', 34.7112, -0.3585, '1170'),
(83, 'Rachuonyo North', 'KE085', 'Kamser', 'Kamser', 34.6977, -0.358944, 1122, 'Lela Dispensary', 'b', 34.7112, -0.3585, '1170'),
(84, 'Rachuonyo North', 'KE086', 'Seka Dok', 'Seka Dok', 34.6836, -0.356594, 1137, 'Lela Dispensary', 'c', 34.7112, -0.3585, '1170'),
(85, 'Rachuonyo North', 'KE087', 'Maguti', 'Maguti', 34.6607, -0.358161, 1138, 'Lela Dispensary', 'c', 34.7112, -0.3585, '1170'),
(86, 'Rachuonyo North', 'KE090', 'Kotieno Gumba', 'Kotieno Gumba', 34.6684, -0.364362, 1185, 'Kendu Sub-District Hospital', 'c', 34.6504, -0.370391, '1134'),
(87, 'Rachuonyo North', 'KE091', 'Rongo Nyagowa', 'Rongo Nyagowa', 34.5924, -0.349749, 1148, 'Wagwe Health Center', 'b', 34.5741, -0.349835, '1157'),
(88, 'Rachuonyo North', 'KE092', 'Alego', 'Alego', 34.6089, -0.352582, 1159, 'Wagwe Health Center', 'b', 34.5741, -0.349835, '1157'),
(89, 'Rachuonyo North', 'KE093', 'Osika', 'Osika', 34.6104, -0.361294, 1125, 'Wagwe Health Center', 'b', 34.5741, -0.349835, '1157'),
(90, 'Rachuonyo North', 'KE094', 'Simbi', 'Simbi', 34.6253, -0.358322, 1125, 'Simbi Kogembo Health Center', 'b', 34.6301, -0.364683, '1138'),
(91, 'Rachuonyo North', 'KE134', 'Kagayi', 'Kagayi', 35.5741, -0.358428, 1156, 'Wagwe Health Center', 'c', 34.5741, -0.349835, '1157'),
(92, 'Rachuonyo North', 'KE135', 'Wagwe', 'Wagwe', 34.5687, -0.351573, 1133, 'Wagwe Health Center', 'b', 34.5741, -0.349835, '1157'),
(93, 'Rachuonyo North', 'KE136', 'Oindo', 'Oindo', 34.5484, -0.346959, 1180, 'Wagwe Health Center', 'b', 34.5741, -0.349835, '1157'),
(94, 'Rachuonyo North', 'KE137', 'Kingii', 'Kingii', 34.5471, -0.336478, 1143, 'Wagwe Health Center', 'c', 34.5741, -0.349835, '1157'),
(95, 'Rachuonyo North', 'KE138', 'Kokoth', 'Kokoth', 34.5373, -0.355564, 1201, 'Nyaoga Dispensary', 'b', 34.5202, -0.349491, '1193'),
(96, 'Rachuonyo North', 'KE139', 'Onyando', 'Onyando', 34.5325, -0.34255, 1208, 'Nyaoga Dispensary', 'c', 34.5202, -0.349491, '1193'),
(97, 'Rachuonyo North', 'KE140', 'Migunde', 'Migunde', 34.5194, -0.350533, 1181, 'Nyaoga Dispensary', 'c', 34.5202, -0.349491, '1193'),
(98, 'Rachuonyo North', 'KE141', 'Koboo', 'Koboo', 34.5191, -0.3424, 1170, 'Nyaoga Dispensary', 'b', 34.5202, -0.349491, '1193'),
(99, 'Rachuonyo North', 'KE142', 'Kasibos', 'Kasibos', 34.5125, -0.35064, 1198, 'Nyaoga Dispensary', 'c', 34.5202, -0.349491, '1193'),
(100, 'Rachuonyo North', 'KE143', 'Abundu', 'Abundu', 34.5085, -0.355543, 1258, 'Homa Hills Health Center', 'c', 34.4683, -0.353976, '1151'),
(101, 'Rachuonyo North', 'KE144', 'Jonyo', 'Jonyo', 34.4716, -0.364802, 1181, 'Homa Hills Health Center', 'c', 34.4683, -0.353976, '1151'),
(102, 'Rachuonyo North', 'KE145', 'Chula', 'Chula', 34.4639, -0.373353, 1168, 'Homa Hills Health Center', 'c', 34.4683, -0.353976, '1151'),
(103, 'Rachuonyo North', 'KE146', 'Alara', 'Alara', 34.4775, -0.406998, 1245, 'Homa Line Health Center', 'c', 34.4755, -0.430333, '1177'),
(104, 'Rachuonyo North', 'KE147', 'Homa Hills', 'Homa Hills', 34.4659, -0.358472, 1151, 'Homa Hills Health Center', 'b', 34.4683, -0.353976, '1151'),
(105, 'Rachuonyo North', 'KE148', 'Angonga', 'Angonga', 34.4666, -0.387343, 1241, 'Homa Line Health Center', 'c', 34.4755, -0.430333, '1177'),
(106, 'Rachuonyo North', 'KE149', 'Ndere', 'Ndere', 34.4641, -0.393416, 1226, 'Homa Hills Health Center', 'c', 34.4683, -0.353976, '1151'),
(107, 'Rachuonyo North', 'KE150', 'Kanam', 'Kanam', 34.4813, -0.355049, 1132, 'Homa Hills Health Center', 'b', 34.4683, -0.353976, '1151'),
(108, 'Rachuonyo North', 'KE151', 'Kisindi', 'Kisindi', 34.459, -0.407245, 1165, 'Homa Hills Health Center', 'b', 34.4683, -0.353976, '1151'),
(109, 'Rachuonyo North', 'KE152', 'Homa Lime', 'Homa Lime', 34.4803, -0.418135, 1232, 'Homa Line Health Center', 'c', 34.4755, -0.430333, '1177'),
(110, 'Rachuonyo North', 'KE153', 'Nduga', 'Nduga', 34.5128, -0.446062, 1140, 'Homa Line Health Center', 'b', 34.4755, -0.430333, '1177'),
(111, 'Rachuonyo North', 'KE154', 'Lwanda', 'Lwanda', 34.5007, -0.435022, 1191, 'Homa Line Health Center', 'b', 34.4755, -0.430333, '1177'),
(112, 'Rachuonyo North', 'KE155', 'Lo-rateng', 'Lo-rateng', 34.491, -0.440601, 1212, 'Homa Line Health Center', 'c', 34.4755, -0.430333, '1177'),
(113, 'Rachuonyo North', 'KE156', 'Rabuor Koguta', 'Rabuor Koguta', 34.483, -0.42469, 1198, 'Homa Line Health Center', 'c', 34.4755, -0.430333, '1177'),
(114, 'Rachuonyo North', 'KE157', 'Ngou', 'Ngou', 34.4998, -0.422812, 1234, 'Okiki Amayo Memorial Health Center', 'b', 34.5114, -0.411965, '1279'),
(115, 'Rachuonyo North', 'KE215', 'Migeni', 'Migeni', 34.4892, -0.410356, 1322, 'Okiki Amayo Memorial Health Center', 'c', 34.5114, -0.411965, '1279'),
(116, 'Rarieda', 'KE089', 'Nyamasore', 'Nyamasore', 34.3786, -0.259691, 0, 'Ragegni Dispensary', 'c', 34.3642, -0.272136, ''),
(117, 'Rarieda', 'KE095', 'Got okola', 'Got okola', 34.3232, -0.249155, 0, 'Pap Kadero Dispensary', 'b', 34.3232, -0.249155, ''),
(118, 'Rarieda', 'KE096', 'Komolo', 'Komolo', 34.3088, -0.273917, 1188, 'Pap Kadero Dispensary', 'c', 34.3232, -0.249155, ''),
(119, 'Rarieda', 'KE097', 'Got Kojwang', 'Got Kojwang', 34.2737, -0.2158, 1140, 'Manyuanda Health Center', 'b', 34.2767, -0.255174, '1192'),
(120, 'Rarieda', 'KE098', 'Kawuondi', 'Kawuondi', 34.2756, -0.225424, 1154, 'Manyuanda Health Center', 'b', 34.2767, -0.255174, '1192'),
(121, 'Rarieda', 'KE099', 'kagwa', 'Kagwa', 34.2575, -0.229661, 1237, 'Kagwa Dispensary', 'c', 34.2572, -0.227322, '1161'),
(122, 'Rarieda', 'KE100', 'Manyuanda', 'Manyuanda', 34.2791, -0.253854, 1187, 'Manyuanda Health Center', 'c', 34.2767, -0.255174, '1192'),
(123, 'Rarieda', 'KE101', 'Nyakongo', 'Nyakongo', 34.2792, -0.279024, 1201, 'Manyuanda Health Center', 'c', 34.2767, -0.255174, '1192'),
(124, 'Rarieda', 'KE102', 'Bar-kogonga', 'Bar-kogonga', 34.2585, -0.292232, 1218, 'Manyuanda Health Center', 'b', 34.2767, -0.255174, '1192'),
(125, 'Rarieda', 'KE103', 'Akuom', 'Akuom', 34.2715, -0.276868, 1197, 'Manyuanda Health Center', 'm', 34.2767, -0.255174, '1192'),
(126, 'Rarieda', 'KE104', 'Tuju', 'Tuju', 34.261, -0.241957, 1166, 'Manyuanda Health Center', 'b', 34.2767, -0.255174, '1192'),
(127, 'Rarieda', 'KE105', 'Kahoya', 'Kahoya', 34.29, -0.264532, 1178, 'Manyuanda Health Center', 'b', 34.2767, -0.255174, '1192'),
(128, 'Rarieda', 'KE106', 'Tanga', 'Tanga', 34.2975, -0.284174, 1199, 'Naya Dispensary', 'b', 34.313, -0.36537, '1177'),
(129, 'Rarieda', 'KE107', 'Ogango', 'Ogango', 34.2962, -0.290777, 0, 'Madiany District Hospital', 'c', 34.3231, -0.283734, '1212'),
(130, 'Rarieda', 'KE108', 'nyabera', 'Nyabera', 34.2911, -0.305532, 0, 'Misori Dispensary', 'b', 34.2787, -0.321293, ''),
(131, 'Rarieda', 'KE109', 'Wambisa', 'Wambisa', 34.2804, -0.309298, 0, 'Misori Dispensary', 'b', 34.2787, -0.321293, ''),
(132, 'Rarieda', 'KE110', 'Misori', 'Misori', 34.2717, -0.319113, 0, 'Misori Dispensary', 'm', 34.2787, -0.321293, ''),
(133, 'Rarieda', 'KE111', 'Mirando', 'Mirando', 34.2871, -0.334525, 0, 'Misori Dispensary', 'b', 34.2787, -0.321293, ''),
(134, 'Rarieda', 'KE112', 'Lwala Rahongo', 'Lwala Rahongo', 34.3078, -0.323657, 0, 'Naya Dispensary', 'm', 34.313, -0.36537, '1177'),
(135, 'Rarieda', 'KE113', 'Ramoya', 'Ramoya', 34.3236, -0.311307, 0, 'Lieta Health Center', 'b', 34.3429, -0.325126, ''),
(136, 'Rarieda', 'KE114', 'Ndigwa ', 'Ndigwa ', 34.3226, -0.33358, 0, 'Madiany District Hospital', 'b', 34.3231, -0.283734, '1212'),
(137, 'Rarieda', 'KE115', 'Rabel', 'Rabel', 34.331, -0.323775, 0, 'Lieta Health Center', 'c', 34.3429, -0.325126, ''),
(138, 'Rarieda', 'KE116', 'Naya', 'Naya', 34.3017, -0.382676, 1200, 'Naya Dispensary', 'b', 34.313, -0.36537, '1177'),
(139, 'Rarieda', 'KE117', 'Chianda', 'Chianda', 34.3416, -0.244542, 0, 'Pap Kadero Dispensary', 'b', 34.3232, -0.249155, ''),
(140, 'Rarieda', 'KE118', 'Ranyala', 'Ranyala', 34.3074, -0.373846, 0, 'Naya Dispensary', 'm', 34.313, -0.36537, '1177'),
(141, 'Rarieda', 'KE119', 'Kadundo', 'Kadundo', 34.3133, -0.345972, 0, 'Naya Dispensary', 'c', 34.313, -0.36537, '1177'),
(142, 'Rarieda', 'KE120', 'Ndonyo', 'Ndonyo', 34.3235, -0.353354, 0, 'Naya Dispensary', 'c', 34.313, -0.36537, '1177'),
(143, 'Rarieda', 'KE121', 'Kunya', 'Kunya', 34.3904, -0.286728, 0, 'Kunya Dispensary', 'b', 34.4001, -0.288476, ''),
(144, 'Rarieda', 'KE122', 'Lieta', 'Lieta', 34.3441, -0.323495, 0, 'Lieta Health Center', 'b', 34.3429, -0.325126, ''),
(145, 'Rarieda', 'KE123', 'Mumbo', 'Mumbo', 34.3562, -0.336198, 0, 'Lieta Health Center', 'c', 34.3429, -0.325126, ''),
(146, 'Rarieda', 'KE124', 'Wayaga', 'Wayaga', 34.3621, -0.303636, 0, 'Ragegni Dispensary', 'b', 34.3642, -0.272136, ''),
(147, 'Rarieda', 'KE125', 'Buru', 'Buru', 34.3362, -0.338559, 0, 'Lieta Health Center', 'b', 34.3429, -0.325126, ''),
(148, 'Rarieda', 'KE126', 'Agok', 'Agok', 34.3313, -0.349797, 0, 'Naya Dispensary', 'c', 34.313, -0.36537, '1177'),
(149, 'Rarieda', 'KE127', 'Nyangoye', 'Nyangoye', 34.2953, -0.34653, 1155, 'Naya Dispensary', 'b', 34.313, -0.36537, '1177'),
(150, 'Rarieda', 'KE128', 'Mirau', 'Mirau', 34.2957, -0.38936, 0, 'Wi Omino Dispensary', 'c', 34.3128, -0.36512, ''),
(151, 'Rarieda', 'KE129', 'Lenrose', 'Lenrose', 34.2867, -0.388609, 0, 'Naya Dispensary', 'b', 34.313, -0.36537, '1177'),
(152, 'Rarieda', 'KE130', 'Nyaondo', 'Nyaondo', 34.2889, -0.383875, 0, 'Naya Dispensary', 'c', 34.313, -0.36537, '1177');

-- --------------------------------------------------------

--
-- Table structure for table `temp_members_db`
--

CREATE TABLE IF NOT EXISTS `temp_members_db` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `confirm_code` varchar(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `temp_members_db`
--

INSERT INTO `temp_members_db` (`id`, `confirm_code`, `name`, `username`, `email`, `password`, `phonenumber`) VALUES
(1, 'bcfcc6a496c3f55bef1bd2c683ff29bb', '', '', 'josemutie', 'josemutie', ''),
(2, '067f8959c14cfbf4323d80417c6d5a6f', '', '', 'josemutie', 'josemutie', ''),
(3, 'ec54528c3b530b4ac95f0e8ca21144c7', '', '', 'josemutie', 'josemutie', ''),
(4, 'd0dcf2e1686f550387fb51b44a143448', '', '', 'josemutie', 'josemutie', ''),
(5, '1085423017fb44271b2ca1c98668f147', 'Mutie Mule ', 'mutiemule', 'jmutie09@gmail.com', 'josemutie', ''),
(6, 'd84461d8124e0247935dc9855072e263', 'Mutie Mule ', 'mutiemule', 'jmutie09@gmail.com', 'josemutie', ''),
(7, '098279139d85e2b678bfc70e1bccc5c4', 'Mutie Mule ', 'mutiemule', 'jmutie09@gmail.com', 'josemutie', ''),
(8, 'b3ae45fe251f7dee0910b286ba23bd5f', '', '', '', '', ''),
(9, 'f6ffa81e6559a8686ae3bc589edc8700', '', '', '', '', ''),
(12, 'e1168122a4aaa0647509b25040839c70', 'Joseph Mutie', 'mutiemule', 'jmutie09@gmail.com', 'josemutie', ''),
(14, 'b7a4ac35b5fc9e2a992c61d7eb84037f', 'Edward Kinywa', 'edwardk', 'jmutie09@gmail.com', 'josemutie', ''),
(16, '04d7c71e07c1ba2e393ff012b2415be8', 'Edward Kinywa', 'edwardk', 'jmutie09@gmail.com', 'josemutie', ''),
(18, '78695643d9ecfcb3c9a1c5c283828bb8', 'ANdrian Nwamakira', 'joenamwaks', 'mutiedocs@gmail.com', 'josemutie', ''),
(19, '88ee5a9d2d65f0acd9e30c2bde1f2c71', 'ANdrian Nwamakira', 'joenamwaks', 'mutiedocs@gmail.com', 'josemutie', ''),
(20, '32cd69016a418d68e271a60e2cfa37c8', 'ANdrian Nwamakira', 'joenamwaks', 'mutiedocs@gmail.com', 'josemutie', '');

-- --------------------------------------------------------

--
-- Table structure for table `tenders_app`
--

CREATE TABLE IF NOT EXISTS `tenders_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tender_name` varchar(50) NOT NULL,
  `refno` varchar(30) NOT NULL,
  `tenders` varchar(30) NOT NULL,
  `category` varchar(40) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact_person` varchar(40) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `app_date` varchar(50) NOT NULL,
  `deadline` varchar(50) NOT NULL,
  `amount_app` varchar(25) NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tenders_app`
--

INSERT INTO `tenders_app` (`id`, `tender_name`, `refno`, `tenders`, `category`, `name`, `email`, `contact_person`, `phone_number`, `app_date`, `deadline`, `amount_app`, `description`) VALUES
(1, 'Supply of eggs', 'REF :2243311', 'Industrial', 'Cement', 'Joseph Mutie', 'jmutie09@gmail.com', 'Jacob kalisa', '0710901555', '1354411053', '12/12/2012', '120000', 'supply of eggs'),
(2, 'Supply of eggs', 'REF :3518354', 'Industrial', 'Cement', 'Joseph Mutie', 'jmutie09@gmail.com', 'Jacob kalisa', '0710901555', '1354411219', '12/12/2012', '120000', 'supply of eggs'),
(3, 'Construction of Bridges', 'REF :2226152', 'Transportation', 'Roads', 'Joseph Mutie', 'jmutie09@gmail.com', 'Kolo Toure', '0712345123', '1354436777', '26/12/2012', '678000', 'A good contractor to make a concrete bridge'),
(4, 'Construction of Bridges', 'REF :3271913', 'Transportation', 'Roads', 'Joseph Mutie', 'jmutie09@gmail.com', 'Kolo Toure', '0712345123', '1354436814', '26/12/2012', '678000', 'A good contractor to make a concrete bridge'),
(5, 'Construction of Bridges', 'REF :2291707', 'Transportation', 'Roads', 'Joseph Mutie', 'jmutie09@gmail.com', 'Kolo Toure', '0712345123', '1354436858', '26/12/2012', '678000', 'A good contractor to make a concrete bridge');

-- --------------------------------------------------------

--
-- Table structure for table `tenders_types`
--

CREATE TABLE IF NOT EXISTS `tenders_types` (
  `id_tender` int(11) NOT NULL,
  `tender_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tenders_types`
--

INSERT INTO `tenders_types` (`id_tender`, `tender_name`) VALUES
(1, 'Automobiles'),
(1, 'Cement'),
(1, 'Fertilizer'),
(1, 'Leather'),
(1, 'Machinery'),
(1, 'Minerals'),
(1, 'Mining'),
(1, 'Plastic'),
(1, 'Rubber'),
(1, 'Textiles'),
(1, 'Fire Safety'),
(1, 'Security'),
(1, 'Printing');

-- --------------------------------------------------------

--
-- Table structure for table `tender_categories`
--

CREATE TABLE IF NOT EXISTS `tender_categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tender_categories`
--

INSERT INTO `tender_categories` (`id_category`, `category_name`) VALUES
(1, 'Industrial'),
(2, 'Consultancy'),
(3, 'Infrastructure'),
(4, 'Environment'),
(5, 'Transportation');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `riverid` varchar(128) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(127) NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` char(50) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Flag incase admin opts in for email notifications',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `color` varchar(6) NOT NULL DEFAULT 'FF0000',
  `code` varchar(30) DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `public_profile` tinyint(1) NOT NULL DEFAULT '1',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `needinfo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Stores registered usersâ€™ information' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `riverid`, `name`, `email`, `username`, `password`, `logins`, `last_login`, `notify`, `updated`, `color`, `code`, `confirmed`, `public_profile`, `approved`, `needinfo`) VALUES
(1, '', 'Administrator', 'jmutie09@gmail.com', 'admin', '9e8e5d626615631f71282bd3d50cc15dada6f4d0e1a7b31a0a', 0, 1221420023, 0, '2012-12-02 07:16:56', 'FF0000', NULL, 1, 0, 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`uid_fk`) REFERENCES `registered_members` (`uid`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`msg_id_fk`) REFERENCES `messages` (`msg_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`uid_fk`) REFERENCES `registered_members` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
