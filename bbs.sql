/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : bbs

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-05-24 21:14:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bbs_priv
-- ----------------------------
DROP TABLE IF EXISTS `bbs_priv`;
CREATE TABLE `bbs_priv` (
  `uid` int(5) NOT NULL,
  `privilege` tinyint(1) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_priv
-- ----------------------------
INSERT INTO `bbs_priv` VALUES ('1', '0', 'jason');

-- ----------------------------
-- Table structure for bbs_userdata
-- ----------------------------
DROP TABLE IF EXISTS `bbs_userdata`;
CREATE TABLE `bbs_userdata` (
  `id` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ctime` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `privilege` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bbs_userdata
-- ----------------------------
INSERT INTO `bbs_userdata` VALUES ('1', 'jason', '123456', '123456@qq.com', '2017-05-24 10:58:27', '0');
