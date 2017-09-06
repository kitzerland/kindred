/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50625
Source Host           : 127.0.0.1:3306
Source Database       : kindred

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2017-09-06 10:53:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for city
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES ('1', 'Kurunegala');
INSERT INTO `city` VALUES ('2', 'Colombo');
INSERT INTO `city` VALUES ('3', 'Anuradhapura');

-- ----------------------------
-- Table structure for report_categories
-- ----------------------------
DROP TABLE IF EXISTS `report_categories`;
CREATE TABLE `report_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of report_categories
-- ----------------------------
INSERT INTO `report_categories` VALUES ('1', 'cat 1');
INSERT INTO `report_categories` VALUES ('2', 'cat 2');
INSERT INTO `report_categories` VALUES ('3', 'cat 3');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_number` varchar(255) DEFAULT '',
  `first_name` varchar(255) DEFAULT '',
  `last_name` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `city` int(11) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT '1',
  `age` varchar(2) DEFAULT '',
  `username` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `active` varchar(255) DEFAULT '0',
  `type` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '', 'Admin', null, null, '0', '1', null, 'admin', 'admin', '1', '99', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES ('7', '', 'patient first', 'last', 'address', '2', '1', '12', 'patient', '', '1', '1', '2017-09-05 20:01:25', '2017-09-05 20:01:25');
INSERT INTO `user` VALUES ('9', '', 'sdf', 'dsf', 'sdf', '1', '1', '12', 'sdf', 'sdf', '1', '1', '2017-09-02 20:29:01', '2017-09-02 20:29:01');
INSERT INTO `user` VALUES ('12', 'sfasfsadf', 'first', 'last', 'address', '1', '1', '25', 'doctor', '', '1', '2', '2017-09-05 18:28:20', '2017-09-05 14:58:20');
INSERT INTO `user` VALUES ('13', 'sfdafs', 'sdf', 'sdf', 'sdf', '1', '0', '22', 'sdf2', '', '0', '2', '2017-09-04 15:39:41', '2017-09-04 12:09:41');

-- ----------------------------
-- Table structure for user_schedule
-- ----------------------------
DROP TABLE IF EXISTS `user_schedule`;
CREATE TABLE `user_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `from` time DEFAULT NULL,
  `to` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_schedule
-- ----------------------------
INSERT INTO `user_schedule` VALUES ('6', '12', '2017-09-05', '05:00:00', '08:00:00', '2017-09-03 18:52:53', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for user_schedule_booking
-- ----------------------------
DROP TABLE IF EXISTS `user_schedule_booking`;
CREATE TABLE `user_schedule_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_schedule_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `patient_rating` int(11) DEFAULT NULL,
  `patient_done` tinyint(1) NOT NULL DEFAULT '0',
  `assigned_time` time NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `doctor_rating` int(11) DEFAULT NULL,
  `doctor_done` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `show_documents` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_schedule_booking
-- ----------------------------
INSERT INTO `user_schedule_booking` VALUES ('27', '6', '7', '3', '0', '06:00:00', '12', '4', '0', '1', '1', '2017-09-05 23:59:24', '2017-09-05 20:29:24');
