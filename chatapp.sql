-- ----------------------------
-- Database : chatapp
-- Database full structure below
-- ----------------------------
SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `chatapp`;
CREATE DATABASE `chatapp`;

USE `chatapp`;

-- ----------------------------
-- Table structure : chat_basic
-- ----------------------------
DROP TABLE IF EXISTS `chat_basic`;
CREATE TABLE `chat_basic` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `FK02` (`user_id`),
  CONSTRAINT `FK02` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_basic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure : contact_messages
-- ----------------------------
DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE `contact_messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(30) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `msg` varchar(255) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure : user_basic
-- ----------------------------
DROP TABLE IF EXISTS `user_basic`;
CREATE TABLE `user_basic` (
  `user_basic_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstName` varchar(10) DEFAULT NULL,
  `lastName` varchar(10) DEFAULT NULL,
  `aboutMe` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_basic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;



-- ----------------------------
-- Table structure : user_friend_list
-- ----------------------------
DROP TABLE IF EXISTS `user_friend_list`;
CREATE TABLE `user_friend_list` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  KEY `FK03` (`user_id`),
  CONSTRAINT `FK03` FOREIGN KEY (`user_id`) REFERENCES `user_basic` (`user_basic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




-- ----------------------------
-- Table structure : user_login_cookie
-- ----------------------------
DROP TABLE IF EXISTS `user_login_cookie`;
CREATE TABLE `user_login_cookie` (
  `user_basic_id` int(10) NOT NULL,
  `series_identifier` varchar(100) NOT NULL,
  `cookie_token` varchar(100) NOT NULL,
  KEY `FK01` (`user_basic_id`),
  CONSTRAINT `FK01` FOREIGN KEY (`user_basic_id`) REFERENCES `user_basic` (`user_basic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



