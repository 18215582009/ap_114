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

 Date: 05/12/2017 11:28:52 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `fc_rei`
-- ----------------------------
DROP TABLE IF EXISTS `fc_rei`;
CREATE TABLE `fc_rei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` int(10) DEFAULT '0' COMMENT '确实举报时间',
  `rei_uid` int(10) NOT NULL COMMENT '被举报人id',
  `name` varchar(128) DEFAULT NULL COMMENT '被举报人姓名',
  `telephone` varchar(50) NOT NULL DEFAULT '' COMMENT '被举报联系电话',
  `address` varchar(255) DEFAULT NULL COMMENT '联系人地址',
  `remark` varchar(255) DEFAULT NULL COMMENT '黑名单理由',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='中介黑名单';

SET FOREIGN_KEY_CHECKS = 1;
