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

 Date: 05/12/2017 11:29:59 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `fc_user_log`
-- ----------------------------
DROP TABLE IF EXISTS `fc_user_log`;
CREATE TABLE `fc_user_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_uid` int(10) NOT NULL COMMENT '会员ID',
  `create_date` int(10) DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '日志说明如[查看房源联系方式、房屋评估报告、房源验证]',
  `ip` varchar(20) DEFAULT NULL,
  `product_del` varchar(50) DEFAULT NULL COMMENT '产品名[查看房源联系方式、房屋评估报告、房源验证]',
  `score_use_del` tinyint(4) DEFAULT NULL COMMENT '积分使用[1消费2增加]',
  `score_del` int(6) DEFAULT '0' COMMENT '积分',
  `pay_type_del` varchar(45) CHARACTER SET utf8 DEFAULT NULL COMMENT '付费方式',
  `money_del` float(10,2) DEFAULT NULL COMMENT '金额',
  `trader_uid_del` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '交易人',
  `trader_date_del` int(12) DEFAULT NULL COMMENT '交易时间',
  `trade_status_del` int(1) DEFAULT '0' COMMENT '交易状态1成功0失败 ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;
