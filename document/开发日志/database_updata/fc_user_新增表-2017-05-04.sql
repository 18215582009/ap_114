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

 Date: 05/04/2017 10:37:48 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `fc_user`
-- ----------------------------
DROP TABLE IF EXISTS `fc_user`;
CREATE TABLE `fc_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_date` int(10) unsigned DEFAULT NULL COMMENT '创建时间',
  `write_date` int(10) unsigned DEFAULT NULL COMMENT '修改时间',
  `user_type` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '用户类型',
  `user_name` varchar(20) DEFAULT NULL COMMENT '用户名',
  `password` varchar(50) DEFAULT NULL,
  `true_name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `nickname` varchar(25) DEFAULT NULL COMMENT '昵称',
  `openid` varchar(100) DEFAULT NULL COMMENT '微信openid',
  `qq` varchar(25) DEFAULT NULL COMMENT 'QQ',
  `ip` varchar(16) DEFAULT NULL COMMENT 'ip地址',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email',
  `mobile` varchar(25) DEFAULT NULL COMMENT '手机',
  `headimgurl` varchar(200) DEFAULT NULL COMMENT '头像',
  `birthdate` datetime DEFAULT NULL COMMENT '出生日期',
  `sex` tinyint(1) unsigned DEFAULT '0' COMMENT '1男2女',
  `city` varchar(20) DEFAULT NULL COMMENT '城市',
  `province` varchar(20) DEFAULT NULL COMMENT '省',
  `country` varchar(20) DEFAULT NULL COMMENT '国家',
  `address` varchar(200) DEFAULT NULL COMMENT '地址',
  `score` int(10) unsigned DEFAULT '0' COMMENT '保留使用',
  `app_wechat_id` varchar(20) DEFAULT NULL COMMENT '微信原始id',
  `activity_id` int(10) unsigned DEFAULT NULL COMMENT '参加活动id',
  `status` tinyint(1) DEFAULT NULL COMMENT '用户状态',
  `active` tinyint(1) DEFAULT '1' COMMENT '用户是否激活（1激活、0未激活）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `fc_user`
-- ----------------------------
BEGIN;
INSERT INTO `fc_user` VALUES ('1', '1493865260', '1493865260', '10', null, '1Am3eSz1sFiEp/LlyRc0FTHmZ6MqOrlpb8zNIVDcp0I', null, '飘渺DK', null, null, null, null, '18980830015', null, null, '0', null, null, null, null, '0', null, null, null, '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
