/*
Navicat MySQL Data Transfer

Source Server         : MyComputer
Source Server Version : 50636
Source Host           : localhost:3306
Source Database       : htmltodoc

Target Server Type    : MYSQL
Target Server Version : 50636
File Encoding         : 65001

Date: 2018-03-28 20:42:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `col_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `title` varchar(128) NOT NULL,
  `pid` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------

-- ----------------------------
-- Table structure for col
-- ----------------------------
DROP TABLE IF EXISTS `col`;
CREATE TABLE `col` (
  `col_id` int(11) NOT NULL AUTO_INCREMENT,
  `colname` varchar(128) NOT NULL,
  `pid` int(11) NOT NULL,
  `rank` int(11) NOT NULL COMMENT '级别',
  PRIMARY KEY (`col_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of col
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `identity` varchar(8) NOT NULL,
  PRIMARY KEY (`user_id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'student');
