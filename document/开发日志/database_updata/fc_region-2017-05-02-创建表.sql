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

 Date: 05/02/2017 11:39:21 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `fc_region`
-- ----------------------------
DROP TABLE IF EXISTS `fc_region`;
CREATE TABLE `fc_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '小区ID',
  `create_uid` int(10) DEFAULT NULL,
  `create_date` int(10) DEFAULT NULL,
  `write_date` int(10) DEFAULT NULL,
  `write_uid` int(10) DEFAULT NULL,
  `flag` tinyint(3) DEFAULT '0' COMMENT '是否有效0 无效 1有效',
  `name` varchar(30) DEFAULT NULL COMMENT '片区名称',
  `code` varchar(255) DEFAULT NULL COMMENT '片区代码',
  `direction` int(10) DEFAULT NULL COMMENT '方位(东西南北片区)',
  `borough` int(10) DEFAULT NULL COMMENT '所在城区',
  `circle` int(10) unsigned DEFAULT '0' COMMENT '环线',
  `college` varchar(300) DEFAULT NULL COMMENT '大学',
  `middleschool` varchar(300) DEFAULT NULL COMMENT '中学',
  `preschool` varchar(255) DEFAULT NULL COMMENT '幼儿园',
  `market` varchar(255) DEFAULT NULL COMMENT '商场',
  `postoffice` varchar(255) DEFAULT NULL COMMENT '邮局',
  `bank` varchar(255) DEFAULT NULL COMMENT '银行',
  `hospital` varchar(255) DEFAULT NULL COMMENT '医院',
  `school` text COMMENT '学校',
  `hotel` text COMMENT '酒店',
  `attris` text COMMENT '景点',
  `tube` tinyint(3) DEFAULT NULL COMMENT '地铁',
  `traffic` varchar(255) DEFAULT NULL COMMENT '交通情况',
  `facilities` varchar(255) DEFAULT NULL COMMENT '周边配套',
  `map_range` varchar(255) DEFAULT NULL COMMENT '片区范围（地理信息）',
  `des` varchar(255) DEFAULT NULL COMMENT '特征描述',
  `related_code` varchar(255) DEFAULT NULL COMMENT '相邻片区代码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='二手房小区表';

SET FOREIGN_KEY_CHECKS = 1;
