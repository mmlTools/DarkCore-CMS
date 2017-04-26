-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table mysite.contacts
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `way` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.contacts: ~2 rows (approximately)
DELETE FROM `contacts`;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `way`) VALUES
	(1, 'Youtube'),
	(2, 'Emulation Forums'),
	(3, 'Twitch');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Dumping structure for table mysite.countries
DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.countries: ~204 rows (approximately)
DELETE FROM `countries`;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id`, `country`) VALUES
	(1, 'Afghanistan'),
	(2, 'Albania'),
	(3, 'Algeria'),
	(4, 'Andorra'),
	(5, 'Angola'),
	(6, 'Antigua and Barbuda'),
	(7, 'Argentina'),
	(8, 'Armenia'),
	(9, 'Aruba'),
	(10, 'Australia'),
	(11, 'Austria'),
	(12, 'Azerbaijan'),
	(13, 'Bahamas'),
	(14, 'Bahrain'),
	(15, 'Bangladesh'),
	(16, 'Barbados'),
	(17, 'Belarus'),
	(18, 'Belgium'),
	(19, 'Belize'),
	(20, 'Benin'),
	(21, 'Bhutan'),
	(22, 'Bolivia'),
	(23, 'Bosnia and Herzegovina'),
	(24, 'Botswana'),
	(25, 'Brazil'),
	(26, 'Brunei'),
	(27, 'Bulgaria'),
	(28, 'Burkina Faso'),
	(29, 'Burma'),
	(30, 'Burundi'),
	(31, 'Cambodia'),
	(32, 'Cameroon'),
	(33, 'Canada'),
	(34, 'Cabo Verde'),
	(35, 'Central African Republic'),
	(36, 'Chad'),
	(37, 'Chile'),
	(38, 'China'),
	(39, 'Colombia'),
	(40, 'Comoros'),
	(41, 'Congo, Democratic Republic of the'),
	(42, 'Congo, Republic of the'),
	(43, 'Costa Rica'),
	(44, 'Cote d Ivoire'),
	(45, 'Croatia'),
	(46, 'Cuba'),
	(47, 'Curacao'),
	(48, 'Cyprus'),
	(49, 'Czechia'),
	(50, 'Denmark'),
	(51, 'Djibouti'),
	(52, 'Dominica'),
	(53, 'Dominican Republic'),
	(54, 'East Timor'),
	(55, 'Ecuador'),
	(56, 'Egypt'),
	(57, 'El Salvador'),
	(58, 'Equatorial Guinea'),
	(59, 'Eritrea'),
	(60, 'Estonia'),
	(61, 'Ethiopia'),
	(62, 'Fiji'),
	(63, 'Finland'),
	(64, 'France'),
	(65, 'Gabon'),
	(66, 'Gambia, The'),
	(67, 'Georgia'),
	(68, 'Germany'),
	(69, 'Ghana'),
	(70, 'Greece'),
	(71, 'Grenada'),
	(72, 'Guatemala'),
	(73, 'Guinea'),
	(74, 'Guinea-Bissau'),
	(75, 'Guyana'),
	(76, 'Haiti'),
	(77, 'Holy See'),
	(78, 'Honduras'),
	(79, 'Hong Kong'),
	(80, 'Hungary'),
	(81, 'Iceland'),
	(82, 'India'),
	(83, 'Indonesia'),
	(84, 'Iran'),
	(85, 'Iraq'),
	(86, 'Ireland'),
	(87, 'Israel'),
	(88, 'Italy'),
	(89, 'Jamaica'),
	(90, 'Japan'),
	(91, 'Jordan'),
	(92, 'Kazakhstan'),
	(93, 'Kenya'),
	(94, 'Kiribati'),
	(95, 'Korea, North'),
	(96, 'Korea, South'),
	(97, 'Kosovo'),
	(98, 'Kuwait'),
	(99, 'Kyrgyzstan'),
	(100, 'Laos'),
	(101, 'Latvia'),
	(102, 'Lebanon'),
	(103, 'Lesotho'),
	(104, 'Liberia'),
	(105, 'Libya'),
	(106, 'Liechtenstein'),
	(107, 'Lithuania'),
	(108, 'Luxembourg'),
	(109, 'Macau'),
	(110, 'Macedonia'),
	(111, 'Madagascar'),
	(112, 'Malawi'),
	(113, 'Malaysia'),
	(114, 'Maldives'),
	(115, 'Mali'),
	(116, 'Malta'),
	(117, 'Marshall Islands'),
	(118, 'Mauritania'),
	(119, 'Mauritius'),
	(120, 'Mexico'),
	(121, 'Micronesia'),
	(122, 'Moldova'),
	(123, 'Monaco'),
	(124, 'Mongolia'),
	(125, 'Montenegro'),
	(126, 'Morocco'),
	(127, 'Mozambique'),
	(128, 'Namibia'),
	(129, 'Nauru'),
	(130, 'Nepal'),
	(131, 'Netherlands'),
	(132, 'New Zealand'),
	(133, 'Nicaragua'),
	(134, 'Niger'),
	(135, 'Nigeria'),
	(136, 'North Korea'),
	(137, 'Norway'),
	(138, 'Oman'),
	(139, 'Pakistan'),
	(140, 'Palau'),
	(141, 'Palestinian Territories'),
	(142, 'Panama'),
	(143, 'Papua New Guinea'),
	(144, 'Paraguay'),
	(145, 'Peru'),
	(146, 'Philippines'),
	(147, 'Poland'),
	(148, 'Portugal'),
	(149, 'Qatar'),
	(150, 'Romania'),
	(151, 'Russia'),
	(152, 'Rwanda'),
	(153, 'Saint Kitts and Nevis'),
	(154, 'Saint Lucia'),
	(155, 'Saint Vincent and the Grenadines'),
	(156, 'Samoa'),
	(157, 'San Marino'),
	(158, 'Sao Tome and Principe'),
	(159, 'Saudi Arabia'),
	(160, 'Senegal'),
	(161, 'Serbia'),
	(162, 'Seychelles'),
	(163, 'Sierra Leone'),
	(164, 'Singapore'),
	(165, 'Sint Maarten'),
	(166, 'Slovakia'),
	(167, 'Slovenia'),
	(168, 'Solomon Islands'),
	(169, 'Somalia'),
	(170, 'South Africa'),
	(171, 'South Korea'),
	(172, 'South Sudan'),
	(173, 'Spain'),
	(174, 'Sri Lanka'),
	(175, 'Sudan'),
	(176, 'Suriname'),
	(177, 'Swaziland'),
	(178, 'Sweden'),
	(179, 'Switzerland'),
	(180, 'Syria'),
	(181, 'Taiwan'),
	(182, 'Tajikistan'),
	(183, 'Tanzania'),
	(184, 'Thailand'),
	(185, 'Timor-Leste'),
	(186, 'Togo'),
	(187, 'Tonga'),
	(188, 'Trinidad and Tobago'),
	(189, 'Tunisia'),
	(190, 'Turkey'),
	(191, 'Turkmenistan'),
	(192, 'Tuvalu'),
	(193, 'Uganda'),
	(194, 'Ukraine'),
	(195, 'United Arab Emirates'),
	(196, 'United Kingdom'),
	(197, 'Uruguay'),
	(198, 'Uzbekistan'),
	(199, 'Vanuatu'),
	(200, 'Venezuela'),
	(201, 'Vietnam'),
	(202, 'Yemen'),
	(203, 'Zambia'),
	(204, 'Zimbabwe');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;

-- Dumping structure for table mysite.forum_category
DROP TABLE IF EXISTS `forum_category`;
CREATE TABLE IF NOT EXISTS `forum_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.forum_category: ~3 rows (approximately)
DELETE FROM `forum_category`;
/*!40000 ALTER TABLE `forum_category` DISABLE KEYS */;
INSERT INTO `forum_category` (`id`, `title`) VALUES
	(1, 'Community Forums'),
	(2, 'Area Forums'),
	(3, 'Class discutions');
/*!40000 ALTER TABLE `forum_category` ENABLE KEYS */;

-- Dumping structure for table mysite.forum_forums
DROP TABLE IF EXISTS `forum_forums`;
CREATE TABLE IF NOT EXISTS `forum_forums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.forum_forums: ~20 rows (approximately)
DELETE FROM `forum_forums`;
/*!40000 ALTER TABLE `forum_forums` DISABLE KEYS */;
INSERT INTO `forum_forums` (`id`, `category`, `title`, `description`, `icon`) VALUES
	(1, 1, 'General & Announcements', 'Here will be posted all announcements', 'images/forum/icons/general.jpg'),
	(2, 1, 'Suggestions and Ideeas', 'Post here your suggestions and ideeas', 'images/forum/icons/suggestions.jpg'),
	(3, 1, 'Reports and Appeals', 'Report something/someone or appeal a ban here', 'images/forum/icons/report.jpg'),
	(4, 1, 'Staff Section', 'Gamemasters section for reports', 'images/forum/icons/staff.jpg'),
	(5, 2, 'Romania', NULL, 'images/forum/icons/romania.png'),
	(6, 2, 'Germany', NULL, 'images/forum/icons/germany.png'),
	(7, 2, 'Brazil', NULL, 'images/forum/icons/brazil.png'),
	(8, 2, 'Mexico City', NULL, 'images/forum/icons/mexico.png'),
	(9, 2, 'New Zealand', NULL, 'images/forum/icons/newzealand.png'),
	(10, 2, 'Canada', NULL, 'images/forum/icons/canada.png'),
	(11, 3, 'Warrior', NULL, 'images/forum/icons/warrior.png'),
	(12, 3, 'Paladin', NULL, 'images/forum/icons/paladin.png'),
	(13, 3, 'Mage', NULL, 'images/forum/icons/mage.png'),
	(14, 3, 'Hunter', NULL, 'images/forum/icons/hunter.png'),
	(15, 3, 'Rogue', NULL, 'images/forum/icons/rogue.png'),
	(16, 3, 'Priest', NULL, 'images/forum/icons/priest.png'),
	(17, 3, 'Warlock', NULL, 'images/forum/icons/warlock.png'),
	(18, 3, 'Shaman', NULL, 'images/forum/icons/shaman.png'),
	(19, 3, 'Death Knight', NULL, 'images/forum/icons/dk.png'),
	(20, 3, 'Druid', NULL, 'images/forum/icons/druid.png');
/*!40000 ALTER TABLE `forum_forums` ENABLE KEYS */;

-- Dumping structure for table mysite.forum_reply
DROP TABLE IF EXISTS `forum_reply`;
CREATE TABLE IF NOT EXISTS `forum_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `body` text NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.forum_reply: ~0 rows (approximately)
DELETE FROM `forum_reply`;
/*!40000 ALTER TABLE `forum_reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_reply` ENABLE KEYS */;

-- Dumping structure for table mysite.forum_topics
DROP TABLE IF EXISTS `forum_topics`;
CREATE TABLE IF NOT EXISTS `forum_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum` int(11) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `autor` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL DEFAULT 'images/forum/icons/topic.jpg',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.forum_topics: ~5 rows (approximately)
DELETE FROM `forum_topics`;
/*!40000 ALTER TABLE `forum_topics` DISABLE KEYS */;
INSERT INTO `forum_topics` (`id`, `forum`, `title`, `body`, `autor`, `thumbnail`, `date`) VALUES
	(1, 1, 'Revision resolution changelog', '<font size="2" color="#0066CC">Well after so much time and so many ups and down we managed to bring back everything to normal and the only thing we wish right now is to say sorry for everything that happened and hope you guys will give us a second chance here is a resolution list of major changes and what you should expect from the new realm.</font>\r\n<font size="2" color="#00CCCC">\r\n<ul>\r\n<li>-After all we were able to keep the accounts and characters intact the only problem is that you will feel a 10 days rollback.</li>\r\n<li>-We decided to keep the old Gear and Weapons with some stats changes don\'t worry we have increased the stats</li>\r\n<li>-We changed our haste system and now you won\'t be able to have less than 0.16 weapons speed we\'ve done this to avoid the offhand proc bugs and casters chanelling spells</li>\r\n<li>-During the revamp we\'ve seen that many players enjoyed the new levelroad so guess what it was added to the new realm we\'ve just changed the rewards</li>\r\n<li>-Same things goes to instance quests we have added all instance quests from the revamp realm to the old one and changed the requirements and rewards</li>\r\n<li>-Daily quests were also added to the new realm</li>\r\n<li>-Crossfaction Battleground was added to the new realm</li>\r\n<li>-1 vs 1 arena was added to the new realm</li>\r\n<li>-Emerald Gear and Weapon costs were hardly increased and emerald creatures HP too ED gear will be required for our last Tier wich will be added soon Tier 19</li>\r\n<li>-Khorne was removed and pvp gear was turned to limited time gear so those who got it be happy it\'s a unique gear ingame</li>\r\n<li>-Vote gear/offsets/weapons was added back</li>\r\n<li>-Main mats are now available to buy with Vote Tokens and Donation Points</li>\r\n<li>-Terror Hound Offset was also added to the new realm</li>\r\n<li>-We have redesigned the mall</li>\r\n<li>-VIP instance from the revamp realm was added to the new realm it have the same features but now junk creatures drop the mats and main BOSS drop the Gold gear</li>\r\n<li>-VIP ranks were changed to the ones we used on the revamp realm Gold/Platinum/Diamond</li>\r\n</ul>\r\n</font>\r\n<font size="2" color="#0066CC">Due to an issue happened yesterday we lost the forum and we decided to add the following changes to the website soon</font>\r\n<font size="2" color="#00CCCC">\r\n<ul>\r\n<li>-We are going to create our own forum module for the website it will be a minimalistic forum used only for the main discutions.</li>\r\n<li>-Gm application forum wich will became available only if players meet the requirement.</li>\r\n<li>-Notification system on website.</li>\r\n<li>-Realm Status will be modified a bit we are going to add pvp statistics.</li>\r\n</ul>\r\n</font>\r\n<font size="2" color="#0066CC">These and many other changes will be available tomorrow.</font>', 1, 'images/forum/icons/topic.jpg', '2015-11-21 22:49:34'),
	(2, 2, 'Anything else', '<font size="2" color="#0066CC">Well after so much time and so many ups and down we managed to bring back everything to normal and the only thing we wish right now is to say sorry for everything that happened and hope you guys will give us a second chance here is a resolution list of major changes and what you should expect from the new realm.</font>\r\n<font size="2" color="#00CCCC">\r\n<ul>\r\n<li>-After all we were able to keep the accounts and characters intact the only problem is that you will feel a 10 days rollback.</li>\r\n<li>-We decided to keep the old Gear and Weapons with some stats changes don\'t worry we have increased the stats</li>\r\n<li>-We changed our haste system and now you won\'t be able to have less than 0.16 weapons speed we\'ve done this to avoid the offhand proc bugs and casters chanelling spells</li>\r\n<li>-During the revamp we\'ve seen that many players enjoyed the new levelroad so guess what it was added to the new realm we\'ve just changed the rewards</li>\r\n<li>-Same things goes to instance quests we have added all instance quests from the revamp realm to the old one and changed the requirements and rewards</li>\r\n<li>-Daily quests were also added to the new realm</li>\r\n<li>-Crossfaction Battleground was added to the new realm</li>\r\n<li>-1 vs 1 arena was added to the new realm</li>\r\n<li>-Emerald Gear and Weapon costs were hardly increased and emerald creatures HP too ED gear will be required for our last Tier wich will be added soon Tier 19</li>\r\n<li>-Khorne was removed and pvp gear was turned to limited time gear so those who got it be happy it\'s a unique gear ingame</li>\r\n<li>-Vote gear/offsets/weapons was added back</li>\r\n<li>-Main mats are now available to buy with Vote Tokens and Donation Points</li>\r\n<li>-Terror Hound Offset was also added to the new realm</li>\r\n<li>-We have redesigned the mall</li>\r\n<li>-VIP instance from the revamp realm was added to the new realm it have the same features but now junk creatures drop the mats and main BOSS drop the Gold gear</li>\r\n<li>-VIP ranks were changed to the ones we used on the revamp realm Gold/Platinum/Diamond</li>\r\n</ul>\r\n</font>\r\n<font size="2" color="#0066CC">Due to an issue happened yesterday we lost the forum and we decided to add the following changes to the website soon</font>\r\n<font size="2" color="#00CCCC">\r\n<ul>\r\n<li>-We are going to create our own forum module for the website it will be a minimalistic forum used only for the main discutions.</li>\r\n<li>-Gm application forum wich will became available only if players meet the requirement.</li>\r\n<li>-Notification system on website.</li>\r\n<li>-Realm Status will be modified a bit we are going to add pvp statistics.</li>\r\n</ul>\r\n</font>\r\n<font size="2" color="#0066CC">These and many other changes will be available tomorrow.</font>', 1, 'images/forum/icons/topic.jpg', '2015-11-21 23:54:36'),
	(3, 1, 'Preety complicated', '<font size="2" color="#0066CC">Well after so much time and so many ups and down we managed to bring back everything to normal and the only thing we wish right now is to say sorry for everything that happened and hope you guys will give us a second chance here is a resolution list of major changes and what you should expect from the new realm.</font>\r\n<font size="2" color="#00CCCC">\r\n<ul>\r\n<li>-After all we were able to keep the accounts and characters intact the only problem is that you will feel a 10 days rollback.</li>\r\n<li>-We decided to keep the old Gear and Weapons with some stats changes don\'t worry we have increased the stats</li>\r\n<li>-We changed our haste system and now you won\'t be able to have less than 0.16 weapons speed we\'ve done this to avoid the offhand proc bugs and casters chanelling spells</li>\r\n<li>-During the revamp we\'ve seen that many players enjoyed the new levelroad so guess what it was added to the new realm we\'ve just changed the rewards</li>\r\n<li>-Same things goes to instance quests we have added all instance quests from the revamp realm to the old one and changed the requirements and rewards</li>\r\n<li>-Daily quests were also added to the new realm</li>\r\n<li>-Crossfaction Battleground was added to the new realm</li>\r\n<li>-1 vs 1 arena was added to the new realm</li>\r\n<li>-Emerald Gear and Weapon costs were hardly increased and emerald creatures HP too ED gear will be required for our last Tier wich will be added soon Tier 19</li>\r\n<li>-Khorne was removed and pvp gear was turned to limited time gear so those who got it be happy it\'s a unique gear ingame</li>\r\n<li>-Vote gear/offsets/weapons was added back</li>\r\n<li>-Main mats are now available to buy with Vote Tokens and Donation Points</li>\r\n<li>-Terror Hound Offset was also added to the new realm</li>\r\n<li>-We have redesigned the mall</li>\r\n<li>-VIP instance from the revamp realm was added to the new realm it have the same features but now junk creatures drop the mats and main BOSS drop the Gold gear</li>\r\n<li>-VIP ranks were changed to the ones we used on the revamp realm Gold/Platinum/Diamond</li>\r\n</ul>\r\n</font>\r\n<font size="2" color="#0066CC">Due to an issue happened yesterday we lost the forum and we decided to add the following changes to the website soon</font>\r\n<font size="2" color="#00CCCC">\r\n<ul>\r\n<li>-We are going to create our own forum module for the website it will be a minimalistic forum used only for the main discutions.</li>\r\n<li>-Gm application forum wich will became available only if players meet the requirement.</li>\r\n<li>-Notification system on website.</li>\r\n<li>-Realm Status will be modified a bit we are going to add pvp statistics.</li>\r\n</ul>\r\n</font>\r\n<font size="2" color="#0066CC">These and many other changes will be available tomorrow.</font>', 1, 'images/forum/icons/topic.jpg', '2015-11-21 23:54:42'),
	(4, 2, 'Fuck i can\'t find other titles', '<font size="2" color="#0066CC">Well after so much time and so many ups and down we managed to bring back everything to normal and the only thing we wish right now is to say sorry for everything that happened and hope you guys will give us a second chance here is a resolution list of major changes and what you should expect from the new realm.</font>\r\n<font size="2" color="#00CCCC">\r\n<ul>\r\n<li>-After all we were able to keep the accounts and characters intact the only problem is that you will feel a 10 days rollback.</li>\r\n<li>-We decided to keep the old Gear and Weapons with some stats changes don\'t worry we have increased the stats</li>\r\n<li>-We changed our haste system and now you won\'t be able to have less than 0.16 weapons speed we\'ve done this to avoid the offhand proc bugs and casters chanelling spells</li>\r\n<li>-During the revamp we\'ve seen that many players enjoyed the new levelroad so guess what it was added to the new realm we\'ve just changed the rewards</li>\r\n<li>-Same things goes to instance quests we have added all instance quests from the revamp realm to the old one and changed the requirements and rewards</li>\r\n<li>-Daily quests were also added to the new realm</li>\r\n<li>-Crossfaction Battleground was added to the new realm</li>\r\n<li>-1 vs 1 arena was added to the new realm</li>\r\n<li>-Emerald Gear and Weapon costs were hardly increased and emerald creatures HP too ED gear will be required for our last Tier wich will be added soon Tier 19</li>\r\n<li>-Khorne was removed and pvp gear was turned to limited time gear so those who got it be happy it\'s a unique gear ingame</li>\r\n<li>-Vote gear/offsets/weapons was added back</li>\r\n<li>-Main mats are now available to buy with Vote Tokens and Donation Points</li>\r\n<li>-Terror Hound Offset was also added to the new realm</li>\r\n<li>-We have redesigned the mall</li>\r\n<li>-VIP instance from the revamp realm was added to the new realm it have the same features but now junk creatures drop the mats and main BOSS drop the Gold gear</li>\r\n<li>-VIP ranks were changed to the ones we used on the revamp realm Gold/Platinum/Diamond</li>\r\n</ul>\r\n</font>\r\n<font size="2" color="#0066CC">Due to an issue happened yesterday we lost the forum and we decided to add the following changes to the website soon</font>\r\n<font size="2" color="#00CCCC">\r\n<ul>\r\n<li>-We are going to create our own forum module for the website it will be a minimalistic forum used only for the main discutions.</li>\r\n<li>-Gm application forum wich will became available only if players meet the requirement.</li>\r\n<li>-Notification system on website.</li>\r\n<li>-Realm Status will be modified a bit we are going to add pvp statistics.</li>\r\n</ul>\r\n</font>\r\n<font size="2" color="#0066CC">These and many other changes will be available tomorrow.</font>', 1, 'images/forum/icons/topic.jpg', '2015-11-21 23:54:53'),
	(5, 3, 'Something else ', '<font size="2" color="#0066CC">Well after so much time and so many ups and down we managed to bring back everything to normal and the only thing we wish right now is to say sorry for everything that happened and hope you guys will give us a second chance here is a resolution list of major changes and what you should expect from the new realm.</font>\r\n<font size="2" color="#00CCCC">\r\n<ul>\r\n<li>-After all we were able to keep the accounts and characters intact the only problem is that you will feel a 10 days rollback.</li>\r\n<li>-We decided to keep the old Gear and Weapons with some stats changes don\'t worry we have increased the stats</li>\r\n<li>-We changed our haste system and now you won\'t be able to have less than 0.16 weapons speed we\'ve done this to avoid the offhand proc bugs and casters chanelling spells</li>\r\n<li>-During the revamp we\'ve seen that many players enjoyed the new levelroad so guess what it was added to the new realm we\'ve just changed the rewards</li>\r\n<li>-Same things goes to instance quests we have added all instance quests from the revamp realm to the old one and changed the requirements and rewards</li>\r\n<li>-Daily quests were also added to the new realm</li>\r\n<li>-Crossfaction Battleground was added to the new realm</li>\r\n<li>-1 vs 1 arena was added to the new realm</li>\r\n<li>-Emerald Gear and Weapon costs were hardly increased and emerald creatures HP too ED gear will be required for our last Tier wich will be added soon Tier 19</li>\r\n<li>-Khorne was removed and pvp gear was turned to limited time gear so those who got it be happy it\'s a unique gear ingame</li>\r\n<li>-Vote gear/offsets/weapons was added back</li>\r\n<li>-Main mats are now available to buy with Vote Tokens and Donation Points</li>\r\n<li>-Terror Hound Offset was also added to the new realm</li>\r\n<li>-We have redesigned the mall</li>\r\n<li>-VIP instance from the revamp realm was added to the new realm it have the same features but now junk creatures drop the mats and main BOSS drop the Gold gear</li>\r\n<li>-VIP ranks were changed to the ones we used on the revamp realm Gold/Platinum/Diamond</li>\r\n</ul>\r\n</font>\r\n<font size="2" color="#0066CC">Due to an issue happened yesterday we lost the forum and we decided to add the following changes to the website soon</font>\r\n<font size="2" color="#00CCCC">\r\n<ul>\r\n<li>-We are going to create our own forum module for the website it will be a minimalistic forum used only for the main discutions.</li>\r\n<li>-Gm application forum wich will became available only if players meet the requirement.</li>\r\n<li>-Notification system on website.</li>\r\n<li>-Realm Status will be modified a bit we are going to add pvp statistics.</li>\r\n</ul>\r\n</font>\r\n<font size="2" color="#0066CC">These and many other changes will be available tomorrow.</font>', 1, 'images/forum/icons/topic.jpg', '2015-11-21 23:09:17');
/*!40000 ALTER TABLE `forum_topics` ENABLE KEYS */;

-- Dumping structure for table mysite.guides
DROP TABLE IF EXISTS `guides`;
CREATE TABLE IF NOT EXISTS `guides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.guides: ~0 rows (approximately)
DELETE FROM `guides`;
/*!40000 ALTER TABLE `guides` DISABLE KEYS */;
/*!40000 ALTER TABLE `guides` ENABLE KEYS */;

-- Dumping structure for table mysite.inbox
DROP TABLE IF EXISTS `inbox`;
CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(50) NOT NULL,
  `to` int(11) NOT NULL,
  `subject` tinytext NOT NULL,
  `body` text NOT NULL,
  `date` int(11) NOT NULL,
  `viewed` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.inbox: ~0 rows (approximately)
DELETE FROM `inbox`;
/*!40000 ALTER TABLE `inbox` DISABLE KEYS */;
/*!40000 ALTER TABLE `inbox` ENABLE KEYS */;

-- Dumping structure for table mysite.news
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `author` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.news: ~4 rows (approximately)
DELETE FROM `news`;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `body`, `author`, `date`) VALUES
	(1, 'Welcome to DarkCore CMS', 'DarKcorE CMS is an Open Source work in progress Content Management System for Trinitycore released for free for our lovely emulation communities.\r\nDarKcorE CMS is an Open Source work in progress Content Management System for Trinitycore released for free for our lovely emulation communities.\r\nDarKcorE CMS is an Open Source work in progress Content Management System for Trinitycore released for free for our lovely emulation communities.\r\nDarKcorE CMS is an Open Source work in progress Content Management System for Trinitycore released for free for our lovely emulation communities.\r\nDarKcorE CMS is an Open Source work in progress Content Management System for Trinitycore released for free for our lovely emulation communities.', 1, 1492107566),
	(2, 'Welcome to DarkCore CMS 1', 'DarKcorE CMS is an Open Source work in progress Content Management System for Trinitycore released for free for our lovely emulation communities.', 1, 1492107566),
	(3, 'Welcome to DarkCore CMS 2', 'DarKcorE CMS is an Open Source work in progress Content Management System for Trinitycore released for free for our lovely emulation communities.', 1, 1492107566),
	(4, 'Welcome to DarkCore CMS 3', 'DarKcorE CMS is an Open Source work in progress Content Management System for Trinitycore released for free for our lovely emulation communities.', 1, 1492107566);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table mysite.news_reply
DROP TABLE IF EXISTS `news_reply`;
CREATE TABLE IF NOT EXISTS `news_reply` (
  `id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `body` tinytext,
  `date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.news_reply: ~0 rows (approximately)
DELETE FROM `news_reply`;
/*!40000 ALTER TABLE `news_reply` DISABLE KEYS */;
/*!40000 ALTER TABLE `news_reply` ENABLE KEYS */;

-- Dumping structure for table mysite.rules
DROP TABLE IF EXISTS `rules`;
CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(4) NOT NULL DEFAULT '0',
  `rule` text NOT NULL,
  `edit_date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.rules: ~0 rows (approximately)
DELETE FROM `rules`;
/*!40000 ALTER TABLE `rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `rules` ENABLE KEYS */;

-- Dumping structure for table mysite.rules_groups
DROP TABLE IF EXISTS `rules_groups`;
CREATE TABLE IF NOT EXISTS `rules_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.rules_groups: ~0 rows (approximately)
DELETE FROM `rules_groups`;
/*!40000 ALTER TABLE `rules_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `rules_groups` ENABLE KEYS */;

-- Dumping structure for table mysite.store_cart
DROP TABLE IF EXISTS `store_cart`;
CREATE TABLE IF NOT EXISTS `store_cart` (
  `account_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.store_cart: ~0 rows (approximately)
DELETE FROM `store_cart`;
/*!40000 ALTER TABLE `store_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `store_cart` ENABLE KEYS */;

-- Dumping structure for table mysite.store_items
DROP TABLE IF EXISTS `store_items`;
CREATE TABLE IF NOT EXISTS `store_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL DEFAULT '0',
  `vp_price` int(11) NOT NULL DEFAULT '0',
  `dp_price` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.store_items: ~0 rows (approximately)
DELETE FROM `store_items`;
/*!40000 ALTER TABLE `store_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `store_items` ENABLE KEYS */;

-- Dumping structure for table mysite.store_logs
DROP TABLE IF EXISTS `store_logs`;
CREATE TABLE IF NOT EXISTS `store_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.store_logs: ~0 rows (approximately)
DELETE FROM `store_logs`;
/*!40000 ALTER TABLE `store_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `store_logs` ENABLE KEYS */;

-- Dumping structure for table mysite.vote_logs
DROP TABLE IF EXISTS `vote_logs`;
CREATE TABLE IF NOT EXISTS `vote_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` int(11) NOT NULL,
  `site` int(11) NOT NULL,
  `voted` bigint(20) NOT NULL,
  `expire` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`site`,`account`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.vote_logs: ~0 rows (approximately)
DELETE FROM `vote_logs`;
/*!40000 ALTER TABLE `vote_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `vote_logs` ENABLE KEYS */;

-- Dumping structure for table mysite.vote_sites
DROP TABLE IF EXISTS `vote_sites`;
CREATE TABLE IF NOT EXISTS `vote_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `link` varchar(500) NOT NULL,
  `postback` varchar(25) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `end_week_points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table mysite.vote_sites: ~7 rows (approximately)
DELETE FROM `vote_sites`;
/*!40000 ALTER TABLE `vote_sites` DISABLE KEYS */;
INSERT INTO `vote_sites` (`id`, `title`, `link`, `postback`, `logo`, `points`, `end_week_points`) VALUES
	(1, 'Xtreme Top 100', 'http://www.xtremetop100.com/in.php?site=1132351354', '', 'http://www.xtremeTop100.com/votenew.jpg', 10, 18),
	(2, 'G-Top 100', 'http://www.gtop100.com/topsites/World-of-Warcraft/sitedetails/GamingZeta-Thorium-Realms-255-WOTLK-86632?vote=1', '', 'http://www.gtop100.com/images/votebutton.jpg', 9, 16),
	(3, 'Top Gaming', 'http://topg.org/wow-private-servers/in-391514', '', 'http://topg.org/topg.gif', 9, 16),
	(4, 'Open WoW', 'http://www.openwow.com/vote=3232', '', 'http://cdn.openwow.com/toplist/vote_small.jpg', 10, 18),
	(5, 'Rivel Toplist', 'http://rivaltoplist.com/in/2312', '', 'http://rivaltoplist.com/vote.jpg', 9, 16),
	(6, 'GamingTop100', 'http://www.gamingtop100.net/in-15143', '', 'http://gamingtop100.net/vote.gif', 9, 16),
	(7, 'ArenaTOP100', 'http://www.arena-top100.com/index.php?a=in&u=darksoke', '', 'http://www.arena-top100.com/button.php?u=darksoke&amp;buttontype=static', 9, 16);
/*!40000 ALTER TABLE `vote_sites` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
