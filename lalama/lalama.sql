/*
Navicat MySQL Data Transfer

Source Server         : jah
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : lalama

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2012-12-02 14:17:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `agents`
-- ----------------------------
DROP TABLE IF EXISTS `agents`;
CREATE TABLE `agents` (
  `agent_phone` varchar(40) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `region_id` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `council` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`agent_phone`),
  KEY `Area` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of agents
-- ----------------------------
INSERT INTO `agents` VALUES ('0713689987', 'daniel Musyoka', 'N', 'Northern', 'NAIROBI');
INSERT INTO `agents` VALUES ('0715221313', 'paul ngumii', 'S', 'Southern', 'NAIROBI');
INSERT INTO `agents` VALUES ('0878788787', 'Accadius Ben ', 'W', 'western ', 'NAIROBI');
INSERT INTO `agents` VALUES ('09090909', 'andre Kibet', 'NE', 'North Eastern', 'NAIROBI');
INSERT INTO `agents` VALUES ('778776766', 'jonh Him', 'E', 'Eastern', 'Nairobi');
INSERT INTO `agents` VALUES ('909989898', 'Mike Sonko', 'C', 'central', 'NAIROBI');

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Comment` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('32', 'Ras tafari', 'pahstarasta@gmail.co', 'This is good :)');
INSERT INTO `comments` VALUES ('35', 'Accadius', 'accadiusben@gmail.co', 'so far so not bad');

-- ----------------------------
-- Table structure for `complains`
-- ----------------------------
DROP TABLE IF EXISTS `complains`;
CREATE TABLE `complains` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `point_y` double DEFAULT NULL,
  `point_x` double DEFAULT NULL,
  `problem_type` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `report_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `solved` varchar(10) DEFAULT 'no',
  `tcode` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `assign1` varchar(100) DEFAULT NULL,
  `assign2` varchar(100) DEFAULT NULL,
  `assign3` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `problem_type` (`problem_type`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of complains
-- ----------------------------
INSERT INTO `complains` VALUES ('10', null, 'Westerm', null, null, 'Embezzlement', 'just spotted a bribe', null, '2012-12-01 20:00:50', 'no', 'TIK13922', '298301928', 'eplus@eplus.com', null, null, null);
INSERT INTO `complains` VALUES ('11', null, 'kawangware', null, null, 'Collusion', 'trial', null, '2012-12-01 23:19:44', 'no', 'TIK14850', '0724008039', 'accadiusben@gmail.com', null, null, null);
INSERT INTO `complains` VALUES ('12', null, 'kawangware', null, null, 'Bribery', 'amepewa', null, '2012-12-01 23:23:48', 'no', 'TIK15562', '0724008039', 'accadiusben@gmail.com', null, null, null);
INSERT INTO `complains` VALUES ('13', null, 'jah', null, null, 'Inefficiency', 'jflkasjjfkojkl', null, '2012-12-01 23:57:51', 'no', 'TIK16450', '0394-89085092', 'accadiusben@gmail.com', null, null, null);
INSERT INTO `complains` VALUES ('14', null, 'kisumu', null, null, 'Bribery', 'yes', null, '2012-12-02 11:45:05', 'no', 'TIK25395', '0724008039', 'accadiusben@gmail.com', null, null, null);

-- ----------------------------
-- Table structure for `corruption_categories`
-- ----------------------------
DROP TABLE IF EXISTS `corruption_categories`;
CREATE TABLE `corruption_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(10) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of corruption_categories
-- ----------------------------
INSERT INTO `corruption_categories` VALUES ('1', 'CAT1', 'Not Related To Corruption');
INSERT INTO `corruption_categories` VALUES ('2', 'CAT2', 'Blackmail');
INSERT INTO `corruption_categories` VALUES ('3', 'CAT3', 'Bribery');
INSERT INTO `corruption_categories` VALUES ('4', 'CAT4', 'Collusion');
INSERT INTO `corruption_categories` VALUES ('5', 'CAT5', 'Conflict Of Interest');
INSERT INTO `corruption_categories` VALUES ('6', 'CAT6', 'Nepotism');
INSERT INTO `corruption_categories` VALUES ('7', 'CAT7', 'Embezzlement');
INSERT INTO `corruption_categories` VALUES ('8', 'CAT8', 'Tax Evasion');
INSERT INTO `corruption_categories` VALUES ('9', 'CAT9', 'Tax Fraud');
INSERT INTO `corruption_categories` VALUES ('10', 'CAT10', 'Inefficiency');
INSERT INTO `corruption_categories` VALUES ('11', 'CAT11', 'Mismanagement Of Public Funds and Resources');
INSERT INTO `corruption_categories` VALUES ('12', 'CAT12', 'Misuse Of Insider Information');
INSERT INTO `corruption_categories` VALUES ('13', 'CAT13', 'Misuse of Public Position');
INSERT INTO `corruption_categories` VALUES ('14', 'CAT14', 'Money Laundering');
INSERT INTO `corruption_categories` VALUES ('15', 'CAT15', 'Sexual Favors');
INSERT INTO `corruption_categories` VALUES ('16', 'CAT16', 'Theft');
INSERT INTO `corruption_categories` VALUES ('17', 'CAT17', 'Traffic Of Influence');
INSERT INTO `corruption_categories` VALUES ('18', 'CAT18', 'Vote-buying');

-- ----------------------------
-- Table structure for `messagein`
-- ----------------------------
DROP TABLE IF EXISTS `messagein`;
CREATE TABLE `messagein` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SendTime` datetime DEFAULT NULL,
  `ReceiveTime` datetime DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `SMSC` varchar(80) DEFAULT NULL,
  `MessageText` text,
  `MessageType` varchar(80) DEFAULT NULL,
  `MessagePDU` text,
  `Gateway` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messagein
-- ----------------------------
INSERT INTO `messagein` VALUES ('34', null, null, null, null, null, 'jah is the way', null, null, null, null);
INSERT INTO `messagein` VALUES ('35', null, null, null, null, null, '#TIK13922 status', null, null, null, null);

-- ----------------------------
-- Table structure for `messagelog`
-- ----------------------------
DROP TABLE IF EXISTS `messagelog`;
CREATE TABLE `messagelog` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SendTime` datetime DEFAULT NULL,
  `ReceiveTime` datetime DEFAULT NULL,
  `StatusCode` int(11) DEFAULT NULL,
  `StatusText` varchar(80) DEFAULT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageText` text,
  `MessageType` varchar(80) DEFAULT NULL,
  `MessageId` varchar(80) DEFAULT NULL,
  `ErrorCode` varchar(80) DEFAULT NULL,
  `ErrorText` varchar(80) DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `MessagePDU` text,
  `UserId` varchar(80) DEFAULT NULL,
  `UserInfo` text,
  PRIMARY KEY (`Id`),
  KEY `IDX_MessageId` (`MessageId`,`SendTime`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messagelog
-- ----------------------------
INSERT INTO `messagelog` VALUES ('1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `messagelog` VALUES ('2', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `messagelog` VALUES ('3', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `messagelog` VALUES ('4', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `messagelog` VALUES ('5', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `messagelog` VALUES ('6', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `messagelog` VALUES ('7', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `messageout`
-- ----------------------------
DROP TABLE IF EXISTS `messageout`;
CREATE TABLE `messageout` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `MessageTo` varchar(80) DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageText` text,
  `MessageType` varchar(80) DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  `UserInfo` text,
  `Priority` int(11) DEFAULT NULL,
  `Scheduled` datetime DEFAULT NULL,
  `IsSent` tinyint(1) NOT NULL DEFAULT '0',
  `IsRead` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `IDX_IsRead` (`IsRead`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messageout
-- ----------------------------
INSERT INTO `messageout` VALUES ('32', null, null, 'Thank you for reporting the complain. use this tracking code TIK63614 to follow up. TI Kenya', null, null, null, null, null, null, '1', '0');
INSERT INTO `messageout` VALUES ('33', null, null, 'Thank you for reporting the complain. use this tracking code TIK69358 to follow up. TI Kenya', null, null, null, null, null, null, '1', '0');

-- ----------------------------
-- Table structure for `organisations`
-- ----------------------------
DROP TABLE IF EXISTS `organisations`;
CREATE TABLE `organisations` (
  `NGO` varchar(255) DEFAULT NULL,
  `Website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of organisations
-- ----------------------------
INSERT INTO `organisations` VALUES ('Action Against Hunger (AAH)', 'http://www.aah-usa.org/', '', '');
INSERT INTO `organisations` VALUES ('CARE', 'http://www.careusa.org/', '', '');
INSERT INTO `organisations` VALUES ('Caritas Internationalis', 'http://www.caritas.org/', '', '');
INSERT INTO `organisations` VALUES ('Catholic Relief Services (CRS - USCC)', 'http://www.crs.org/', '', '');
INSERT INTO `organisations` VALUES ('Doctors Without Borders ', 'http://www.dwb.org/', '', '');
INSERT INTO `organisations` VALUES ('Emergency Nutrition Network (ENN)', 'http://www.ennonline.net/', '', '');
INSERT INTO `organisations` VALUES ('Food For The Hungry International (FHI)', 'http://www.fh.org/', '', '');
INSERT INTO `organisations` VALUES ('Hunger Plus, Inc.', 'http://www.hungerplus.org/', '', '');
INSERT INTO `organisations` VALUES ('Interaction', 'http://www.interaction.org/', '', '');
INSERT INTO `organisations` VALUES ('Co International mmittee of the Red Cross (ICRC)', 'http://www.icrc.org/eng', '', '');
INSERT INTO `organisations` VALUES ('International Federation of Red Cross and Red Crescent Societies (IFRC)', 'http://www.ifrc.org/', '', '');
INSERT INTO `organisations` VALUES ('International Organization for Migration (IOM)', 'http://www.iom.int/', '', '');
INSERT INTO `organisations` VALUES ('International Rescue Committee (IRC)', 'http://www.theirc.org/', '', '');
INSERT INTO `organisations` VALUES ('Lutheran World Federation', 'http://www.lutheranworld.org/', '', '');
INSERT INTO `organisations` VALUES ('Mennonite Central Committee (MCC)', 'http://www.mennonitecc.ca/', '', '');
INSERT INTO `organisations` VALUES ('Mercy Corps (MC)', '//http: www.mercycorps.org/', '', '');
INSERT INTO `organisations` VALUES ('Overseas Development Institute (ODI)', 'http://www.odi.org.uk/', '', '');
INSERT INTO `organisations` VALUES ('Oxfam', 'http://www.oxfam.org/', '', '');
INSERT INTO `organisations` VALUES ('Refugees International', 'http://www.refintl.org/', '', '');
INSERT INTO `organisations` VALUES ('Relief International', 'http://www.ri.org/', '', '');
INSERT INTO `organisations` VALUES ('Save the Children', 'http://www.savethechildren.org/', '', '');
INSERT INTO `organisations` VALUES ('The Office of U.S. Foreign Disaster Assistance (OFDA)', 'http://www.usaid.gov/our_work/humanitarian_assistance/disaster_assistance/', '', '');
INSERT INTO `organisations` VALUES ('United Nations Children\'s Fund (UNICEF)', 'http://www.unicef.org/', '', '');
INSERT INTO `organisations` VALUES ('United Nations High Commissioner for Refugees (UNHCR) ', 'http://www.unhcr.org/cgi-bin/texis/vtx/home', '', '');
INSERT INTO `organisations` VALUES ('United Nations Office for the Coordination of Humanitarian Affairs (OCHA)', 'http://ochaonline.un.org/', '', '');
INSERT INTO `organisations` VALUES ('US Committee for Refugees (USCR)', 'http://www.refugees.org/', '', '');
INSERT INTO `organisations` VALUES ('World Vision International', 'http://www.worldvision.org/', '', '');

-- ----------------------------
-- Table structure for `regions`
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `region_id` varchar(5) DEFAULT NULL,
  `area_name` varchar(100) DEFAULT NULL,
  `council` set('NAIROBI') DEFAULT 'NAIROBI',
  KEY `area_name` (`area_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of regions
-- ----------------------------
INSERT INTO `regions` VALUES ('C', 'CENTRAL', 'NAIROBI');
INSERT INTO `regions` VALUES ('N', 'NORTHERN', 'NAIROBI');
INSERT INTO `regions` VALUES ('E', 'EASTERN', 'NAIROBI');
INSERT INTO `regions` VALUES ('W', 'WESTERN', 'NAIROBI');
INSERT INTO `regions` VALUES ('S', 'SOUTHERN', 'NAIROBI');
INSERT INTO `regions` VALUES ('NE', 'NORTH- EASTERN', 'NAIROBI');

-- ----------------------------
-- Table structure for `requests`
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `phoneno` varchar(15) DEFAULT NULL,
  `msgtype` varchar(50) DEFAULT NULL,
  `msg` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of requests
-- ----------------------------

-- ----------------------------
-- Table structure for `sectors`
-- ----------------------------
DROP TABLE IF EXISTS `sectors`;
CREATE TABLE `sectors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` varchar(10) DEFAULT NULL,
  `sector` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sectors
-- ----------------------------
INSERT INTO `sectors` VALUES ('1', 'S1', 'Agriculture');
INSERT INTO `sectors` VALUES ('2', 'S2', 'Financial');
INSERT INTO `sectors` VALUES ('3', 'S3', 'Construction');
INSERT INTO `sectors` VALUES ('4', 'S4', 'Civil Society');
INSERT INTO `sectors` VALUES ('5', 'S5', 'Culture');
INSERT INTO `sectors` VALUES ('6', 'S6', 'Customs and Immigration');
INSERT INTO `sectors` VALUES ('7', 'S7', 'Defence/ Security');
INSERT INTO `sectors` VALUES ('8', 'S8', 'Education');
INSERT INTO `sectors` VALUES ('9', 'S9', 'Elections');
INSERT INTO `sectors` VALUES ('10', 'S10', 'Government');
INSERT INTO `sectors` VALUES ('11', 'S11', 'Health');
INSERT INTO `sectors` VALUES ('12', 'S12', 'Media');
INSERT INTO `sectors` VALUES ('13', 'S13', 'International Cooperation/ Aid');
INSERT INTO `sectors` VALUES ('14', 'S14', 'Anticorruption Institutions');
INSERT INTO `sectors` VALUES ('15', 'S15', 'Judiciary');
INSERT INTO `sectors` VALUES ('16', 'S16', 'Employment/ Labour');
INSERT INTO `sectors` VALUES ('17', 'S17', 'Land and Property');
INSERT INTO `sectors` VALUES ('18', 'S18', 'Legislative/ Parliament');
INSERT INTO `sectors` VALUES ('19', 'S19', 'Local Government');
INSERT INTO `sectors` VALUES ('20', 'S20', 'Natural Resources');
INSERT INTO `sectors` VALUES ('21', 'S21', 'Police');
INSERT INTO `sectors` VALUES ('22', 'S22', 'Politics and Parties');
INSERT INTO `sectors` VALUES ('23', 'S23', 'Roads and Railroads');
INSERT INTO `sectors` VALUES ('24', 'S24', 'Social Services');
INSERT INTO `sectors` VALUES ('25', 'S25', 'Sports');
INSERT INTO `sectors` VALUES ('26', 'S26', 'Transportation and Logistics');
INSERT INTO `sectors` VALUES ('27', 'S27', 'Utilities');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `group` varchar(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Accadius Sabwa', 'asabwa', 'accadiusben@gmail.com', null, 'a027184a55211cd23e3f3094f1fdc728df5e0500 ');

-- ----------------------------
-- View structure for `vw_complains`
-- ----------------------------
DROP VIEW IF EXISTS `vw_complains`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_complains` AS select `c`.`Name` AS `name`,`c`.`region` AS `region`,`c`.`point_x` AS `point_x`,`c`.`point_y` AS `point_y`,`c`.`problem_type` AS `problem_type`,`c`.`description` AS `description`,`c`.`photo` AS `photo`,`c`.`report_time` AS `report_time`,`p`.`icon` AS `icon` from (`complains` `c` join `problem` `p`) where (`p`.`problem` = `c`.`problem_type`) ;
DROP TRIGGER IF EXISTS `jah`;
DELIMITER ;;
CREATE TRIGGER `jah` AFTER INSERT ON `messagein` FOR EACH ROW BEGIN

set @tcode=(SELECT floor(rand() * 100000) as randNum);
set @msg=new.MessageText;
set @nani=new.MessageFrom;

IF(LOCATE('#',@msg) AND LOCATE(',',@msg) ) 

THEN

SET @TCODE=(SELECT MID( @msg,1, LOCATE('#', @msg)+1) );

INSERT INTO requests(phoneno,msgtype,msg) VALUES(@nani,'Request Message',@msg);

set @jibu1=(SELECT solved FROM  complains where tcode=@tcode); 


INSERT INTO messageout(MessageTo,MessageText) VALUES (@nani,CONCAT("Thank you for following on ", @tcode, "status =",@jibu1, " keep checking") );

ELSE

INSERT INTO complains(description,report_time, tcode,phone) VALUES(@msg,now(),CONCAT("TIK", @tcode), @nani);
INSERT INTO messageout(MessageTo,MessageText) VALUES (@nani,CONCAT("Thank you for reporting the complain. use this tracking code TIK", @tcode, " to follow up. TI Kenya") );

END IF;
END
;;
DELIMITER ;
