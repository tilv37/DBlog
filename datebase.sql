# Host: localhost  (Version: 5.5.47)
# Date: 2016-09-02 15:02:05
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "my_contents"
#

DROP TABLE IF EXISTS `my_contents`;
CREATE TABLE `my_contents` (
  `cid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `posttime` datetime NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` text,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `posttime` (`posttime`),
  KEY `posttime_2` (`posttime`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "my_contents"
#

/*!40000 ALTER TABLE `my_contents` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_contents` ENABLE KEYS */;

#
# Structure for table "my_metas"
#

DROP TABLE IF EXISTS `my_metas`;
CREATE TABLE `my_metas` (
  `mid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `postcount` int(11) unsigned DEFAULT '0',
  `type` varchar(50) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "my_metas"
#

/*!40000 ALTER TABLE `my_metas` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_metas` ENABLE KEYS */;

#
# Structure for table "my_relationships"
#

DROP TABLE IF EXISTS `my_relationships`;
CREATE TABLE `my_relationships` (
  `cid` int(10) NOT NULL,
  `mid` int(10) NOT NULL,
  PRIMARY KEY (`cid`,`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "my_relationships"
#

/*!40000 ALTER TABLE `my_relationships` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_relationships` ENABLE KEYS */;

#
# Structure for table "my_user"
#

DROP TABLE IF EXISTS `my_user`;
CREATE TABLE `my_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mail` varchar(200) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `screenname` varchar(32) DEFAULT NULL,
  `created` int(10) unsigned DEFAULT NULL,
  `logged` int(10) unsigned DEFAULT NULL,
  `authCode` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`name`,`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "my_user"
#

/*!40000 ALTER TABLE `my_user` DISABLE KEYS */;
INSERT INTO `my_user` VALUES (1,'tilv37@163.com','$2y$12$4xXSkd7lMWKYu3gh6/FFXOn8pOhwTGxZgvEFY44KdnUC7Z5wuvxRy','tilv37@163.com',NULL,'大宝',NULL,NULL,NULL);
/*!40000 ALTER TABLE `my_user` ENABLE KEYS */;
