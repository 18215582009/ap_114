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

 Date: 04/25/2017 09:16:48 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `fc_esf_user_favorites`
-- ----------------------------
DROP TABLE IF EXISTS `fc_esf_user_favorites`;
CREATE TABLE `fc_esf_user_favorites` (
  `id` int(10) NOT NULL,
  `create_uid` int(10) DEFAULT NULL,
  `create_date` int(10) DEFAULT NULL,
  `house_type` tinyint(1) DEFAULT NULL COMMENT '房屋类别[1:出租 2:出售 0:其他]',
  `esf_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
