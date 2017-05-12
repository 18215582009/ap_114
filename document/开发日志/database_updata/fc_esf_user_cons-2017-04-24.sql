/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost
 Source Database       : fc114

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : utf-8

 Date: 04/25/2017 09:16:41 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `fc_esf_user_cons`
-- ----------------------------
DROP TABLE IF EXISTS `fc_esf_user_cons`;
CREATE TABLE `fc_esf_user_cons` (
  `id` int(10) NOT NULL,
  `create_uid` int(10) DEFAULT NULL,
  `create_date` int(10) DEFAULT NULL,
  `esf_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL COMMENT '消费积分',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
