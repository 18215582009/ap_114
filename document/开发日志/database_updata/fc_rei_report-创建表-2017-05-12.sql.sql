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

 Date: 05/12/2017 11:29:13 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `fc_rei_report`
-- ----------------------------
DROP TABLE IF EXISTS `fc_rei_report`;
CREATE TABLE `fc_rei_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '举报人ID',
  `create_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '举报时间',
  `write_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `write_uid` int(10) NOT NULL,
  `rei_uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '被举报人id',
  `type` varchar(20) DEFAULT NULL COMMENT '举报类型',
  `reason` varchar(255) NOT NULL COMMENT '举报理由',
  `page_url` varchar(125) NOT NULL DEFAULT '' COMMENT '举报来源页面',
  `is_pass` tinyint(1) NOT NULL DEFAULT '0',
  `is_add_rei` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否加入黑名单',
  `is_add_scores` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否返送积分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='中介举报';

SET FOREIGN_KEY_CHECKS = 1;
