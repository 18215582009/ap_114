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

 Date: 04/12/2017 17:56:48 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `sys_user`
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL DEFAULT '0' COMMENT '创建人(0代表为注册用户)',
  `create_date` int(11) NOT NULL COMMENT '创建时间(注册时间)',
  `write_date` int(11) NOT NULL COMMENT '修改时间',
  `write_uid` int(11) NOT NULL DEFAULT '0' COMMENT '修改人',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  `relate_table` varchar(255) DEFAULT NULL,
  `relate_id` int(11) DEFAULT NULL,
  `orgstruct_id` int(11) DEFAULT NULL COMMENT '组织（公司部门）id',
  `region_code` varchar(50) DEFAULT NULL COMMENT '地区编码',
  `user_type` int(4) DEFAULT NULL COMMENT '用户类型',
  `user_name` varchar(50) DEFAULT NULL COMMENT '登录名',
  `true_name` varchar(50) DEFAULT NULL COMMENT '用户真实姓名',
  `password` varchar(50) DEFAULT NULL COMMENT '密码',
  `nickname` varchar(20) DEFAULT NULL COMMENT '昵称',
  `openid` varchar(50) DEFAULT NULL COMMENT '微信openid',
  `ip` varchar(16) DEFAULT NULL COMMENT 'ip地址',
  `qq` varchar(50) DEFAULT NULL COMMENT 'qq号',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱号',
  `headimgurl` varchar(200) DEFAULT NULL COMMENT '头像',
  `birthdate` datetime DEFAULT NULL COMMENT '出生日期',
  `sex` varchar(50) DEFAULT NULL COMMENT '性别',
  `city` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL COMMENT '手机号',
  `phone` varchar(50) DEFAULT NULL COMMENT '电话号',
  `fax` varchar(50) DEFAULT NULL COMMENT '传真号',
  `job` varchar(50) DEFAULT NULL COMMENT '职务',
  `nationality` varchar(50) DEFAULT NULL COMMENT '国籍',
  `knowledge` varchar(25) DEFAULT NULL COMMENT '学历（大专、高中、本科、研究生、博士、其他）',
  `address` varchar(200) DEFAULT NULL COMMENT '地址',
  `id_type` varchar(25) DEFAULT NULL COMMENT '证件类型',
  `id_address` varchar(50) DEFAULT NULL COMMENT '证件地址',
  `id_number` varchar(25) DEFAULT NULL COMMENT '证件号',
  `log_date` datetime DEFAULT NULL COMMENT '（未使用）',
  `expire_date` datetime DEFAULT NULL COMMENT '证件到期时间',
  `note` text COMMENT '备注',
  `status` int(11) DEFAULT '1' COMMENT '用户状态',
  `sort` int(11) DEFAULT NULL COMMENT '权重',
  `active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '用户是否激活（1激活、0未激活）',
  `is_admin` int(11) DEFAULT '0' COMMENT '是否是超级管理员',
  `quick_module` varchar(200) DEFAULT NULL COMMENT '记录的左侧模块',
  PRIMARY KEY (`id`),
  KEY `FK_Reference_6` (`orgstruct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
--  Records of `sys_user`
-- ----------------------------
BEGIN;
INSERT INTO `sys_user` VALUES ('1', '1', '1455860077', '1465802476', '1', '1', 'edu_student', '1', '12', null, '1', 'fc114', '系统保留', '0c+HZcnV5MQ2NVFVaCkgsSvkIC4Z2Pynrw56St0ZshB', null, null, null, null, null, null, null, null, null, null, null, '13312312312', null, null, null, null, null, null, null, null, null, null, null, null, '1', null, '1', '1', '1,5,6,39,40'), ('2', '1', '1463021163', '1464168606', '1', '1', 'edu_student', '1', '12', '0', '0', 'test', '23434', '1Imt', null, null, null, '', '', null, '0000-00-00 00:00:00', '男', null, null, null, '', '', '', '', '', '0', '', '身份证', '', '0', null, null, null, '1', '0', '1', '0', null), ('3', '1', '1463032263', '1465178371', '1', '0', 'edu_student', '2', '11', '0', '0', '23', '', '20C', null, null, null, '', '', null, '0000-00-00 00:00:00', '男', null, null, null, '', '', '', '', '', '0', '', '身份证', '', '23', null, null, null, '1', '0', '1', '0', null), ('4', '1', '1464945900', '1464945900', '1', '1', 'edu_student', '3', '11', '0', '0', 'wer', '', 'TRc8', null, null, null, '', '', null, '0000-00-00 00:00:00', '男', null, null, null, '', '', '', '', '', '0', '', '身份证', '', 'wer', null, null, null, '1', '0', '1', '0', null), ('5', '1', '1465176989', '1465177023', '1', '1', 'edu_student', '4', '11', '0', '0', '510', '', 'xcCu', null, null, null, '', '', null, '0000-00-00 00:00:00', '男', null, null, null, '', '', '', '', '', '0', '', '身份证', '', '510', null, null, null, '1', '0', '1', '0', null), ('6', '0', '1489591167', '1489591167', '0', '1', null, null, null, null, '10', null, null, null, '123123', null, null, null, null, null, null, null, null, null, null, '13312312311', null, null, null, null, null, null, null, null, null, null, null, null, '1', null, '1', '0', null), ('9', '0', '1491983324', '1491983324', '0', '1', null, null, null, null, '10', null, null, 'lJWQPrBpJ7t5PJfQf0f87ioxxZoZxZJZ0sHmq5EksQN', '飘渺DK', null, null, null, null, null, null, null, null, null, null, '18980830015', null, null, null, null, null, null, null, null, null, null, null, null, '1', null, '1', '0', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
