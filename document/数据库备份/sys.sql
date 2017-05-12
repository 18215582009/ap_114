-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.24


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema fc114
--

CREATE DATABASE IF NOT EXISTS fc114;
USE fc114;

--
-- Definition of table `模板表（系统字段）`
--

DROP TABLE IF EXISTS `模板表（系统字段）`;
CREATE TABLE `模板表（系统字段）` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL COMMENT '创建人',
  `create_date` int(11) NOT NULL COMMENT '创建时间',
  `write_uid` int(11) NOT NULL COMMENT '修改人',
  `write_date` int(11) NOT NULL COMMENT '修改时间',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统字段表';

--
-- Dumping data for table `模板表（系统字段）`
--

/*!40000 ALTER TABLE `模板表（系统字段）` DISABLE KEYS */;
/*!40000 ALTER TABLE `模板表（系统字段）` ENABLE KEYS */;


--
-- Definition of table `sys_company`
--

DROP TABLE IF EXISTS `sys_company`;
CREATE TABLE `sys_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL COMMENT '创建人',
  `create_date` int(11) NOT NULL COMMENT '创建时间',
  `write_uid` int(11) NOT NULL COMMENT '修改人',
  `write_date` int(11) NOT NULL COMMENT '修改时间',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除，1未删）',
  `short_name` varchar(20) DEFAULT NULL COMMENT '企业简称',
  `full_name` varchar(50) DEFAULT NULL COMMENT '企业全称',
  `region_code` varchar(10) DEFAULT NULL COMMENT '地区编码',
  `org_file_no` varchar(10) DEFAULT NULL COMMENT '组织结构代码',
  `regi_date` datetime DEFAULT NULL COMMENT '登记日期',
  `economic_type` varchar(10) DEFAULT NULL COMMENT '经济类型',
  `tax_code` varchar(50) DEFAULT NULL COMMENT '税务证号',
  `patent_number` varchar(50) DEFAULT NULL COMMENT '营业执照号',
  `regi_ster_time` datetime DEFAULT NULL COMMENT '工商注册日期',
  `regi_ster_address` varchar(100) DEFAULT NULL COMMENT '工商注册地址',
  `regi_ster_region` varchar(20) DEFAULT NULL COMMENT '工商注册地区（未使用）',
  `regi_sting_organ` varchar(100) DEFAULT NULL COMMENT '发证机关',
  `regi_ster_capital` varchar(50) DEFAULT NULL COMMENT '注册资本',
  `licence_start_date` datetime DEFAULT NULL COMMENT '执照期限从',
  `licence_end_date` datetime DEFAULT NULL COMMENT '执照期限到',
  `unit_type` varchar(20) DEFAULT NULL COMMENT '单位类型（独资、股份、合资、合作、集体、联营、全民、私营）',
  `employee` int(11) DEFAULT NULL COMMENT '在册人员',
  `address` varchar(100) DEFAULT NULL COMMENT '办公地址',
  `region` varchar(20) DEFAULT NULL COMMENT '公司所在地区',
  `contact` varchar(20) DEFAULT NULL COMMENT '经办人',
  `phone` varchar(50) DEFAULT NULL COMMENT '联系电话',
  `fax` varchar(50) DEFAULT NULL COMMENT '传真',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号',
  `zip_code` varchar(10) DEFAULT NULL COMMENT '邮政编码',
  `home_page` varchar(80) DEFAULT NULL COMMENT '公司首页（未使用）',
  `regi_ster_money` decimal(20,2) DEFAULT NULL COMMENT '注册资金',
  `legal_man` varchar(60) DEFAULT NULL COMMENT '法人',
  `legal_sex` varchar(10) DEFAULT NULL COMMENT '法人性别',
  `legal_mobile` varchar(40) DEFAULT NULL COMMENT '法人电话',
  `legal_duty` varchar(20) DEFAULT NULL COMMENT '法人职务',
  `legal_post_code` varchar(10) DEFAULT NULL COMMENT '法人邮编',
  `legal_owner_id` varchar(20) DEFAULT NULL COMMENT '法人证件号码',
  `legal_phone` varchar(40) DEFAULT NULL COMMENT '法人电话',
  `bank` varchar(40) DEFAULT NULL COMMENT '开户银行',
  `account_num` varchar(40) DEFAULT NULL COMMENT '银行账号',
  `account_name` varchar(40) DEFAULT NULL COMMENT '银行账户',
  `destroy_man` varchar(20) DEFAULT NULL COMMENT '注销人（未使用）',
  `destroy_time` datetime DEFAULT NULL COMMENT '注销时间（未使用）',
  `description` text COMMENT '公司简介（未使用）',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '公司状态（未使用）',
  `active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否激活（0未激活、1激活）',
  `standby` varchar(255) DEFAULT NULL COMMENT '备用字段',
  `credit_rating` varchar(50) DEFAULT NULL COMMENT '公司信用等级（一级、二级、三级、暂定）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公司表';

--
-- Dumping data for table `sys_company`
--

/*!40000 ALTER TABLE `sys_company` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_company` ENABLE KEYS */;


--
-- Definition of table `sys_department`
--

DROP TABLE IF EXISTS `sys_department`;
CREATE TABLE `sys_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL COMMENT '创建人',
  `create_date` int(11) NOT NULL COMMENT '创建时间',
  `write_uid` int(11) NOT NULL COMMENT '修改人',
  `write_date` int(11) NOT NULL COMMENT '修改时间',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除，1未删）',
  `company_id` int(11) NOT NULL COMMENT '公司id（未使用）',
  `name` varchar(20) DEFAULT NULL COMMENT '部门名称',
  `parent_id` int(11) DEFAULT NULL COMMENT '父id',
  `code` varchar(20) DEFAULT NULL COMMENT '部门编号',
  `tel` varchar(20) DEFAULT NULL COMMENT '部门电话',
  `address` varchar(100) DEFAULT NULL COMMENT '部门地址',
  `fax` varchar(40) DEFAULT NULL COMMENT '部门传真',
  `active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否激活（0未激活、1激活）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='公司部门表';

--
-- Dumping data for table `sys_department`
--

/*!40000 ALTER TABLE `sys_department` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_department` ENABLE KEYS */;


--
-- Definition of table `sys_groups`
--

DROP TABLE IF EXISTS `sys_groups`;
CREATE TABLE `sys_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL COMMENT '创建人',
  `create_date` int(11) NOT NULL COMMENT '创建时间',
  `write_uid` int(11) NOT NULL COMMENT '修改人',
  `write_date` int(11) NOT NULL COMMENT '修改时间',
  `flag` tinyint(4) DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  `name` varchar(50) DEFAULT NULL COMMENT '用户群名称',
  `note` varchar(200) DEFAULT NULL COMMENT '备注',
  `company_id` int(11) DEFAULT NULL COMMENT '公司id（未使用）',
  `active` tinyint(4) DEFAULT '1' COMMENT '是否激活（1激活、0未激活）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户组表';

--
-- Dumping data for table `sys_groups`
--

/*!40000 ALTER TABLE `sys_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_groups` ENABLE KEYS */;


--
-- Definition of table `sys_logs`
--

DROP TABLE IF EXISTS `sys_logs`;
CREATE TABLE `sys_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL COMMENT '创建人',
  `create_date` int(11) NOT NULL COMMENT '创建时间',
  `app_name` varchar(50) DEFAULT NULL COMMENT '项目名称',
  `opt_module` varchar(50) DEFAULT NULL COMMENT '模块',
  `opt_method` varchar(50) DEFAULT NULL COMMENT '方法',
  `opt_type` varchar(50) DEFAULT NULL COMMENT '类型（1普通操作日志、2登录日志）',
  `logs` varchar(4000) DEFAULT NULL COMMENT '日志',
  `notes` varchar(200) DEFAULT NULL COMMENT '备注',
  `flag` tinyint(4) DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='日志信息表';

--
-- Dumping data for table `sys_logs`
--

/*!40000 ALTER TABLE `sys_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_logs` ENABLE KEYS */;


--
-- Definition of table `sys_method`
--

DROP TABLE IF EXISTS `sys_method`;
CREATE TABLE `sys_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  `module_id` int(11) NOT NULL COMMENT '模块id',
  `module_name` varchar(50) DEFAULT NULL COMMENT '模块中文名（冗余）',
  `module` varchar(50) DEFAULT NULL COMMENT '模块英文名（冗余）',
  `method_name` varchar(50) DEFAULT NULL COMMENT '方法中文名',
  `method` varchar(50) DEFAULT NULL COMMENT '方法英文名',
  `app_name` varchar(50) DEFAULT NULL COMMENT '项目中文名称（冗余）',
  `app_id` int(11) NOT NULL COMMENT '对应项目编号project_code（冗余）',
  `parent_name` varchar(50) DEFAULT NULL COMMENT '模块父模块中文名称（冗余）',
  `parent_id` tinyint(4) NOT NULL COMMENT '模块父模块（父级分类id）（冗余）',
  PRIMARY KEY (`id`),
  KEY `FK_Reference_13` (`module_id`),
  CONSTRAINT `FK_Reference_13` FOREIGN KEY (`module_id`) REFERENCES `sys_module` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='方法表';

--
-- Dumping data for table `sys_method`
--

/*!40000 ALTER TABLE `sys_method` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_method` ENABLE KEYS */;


--
-- Definition of table `sys_module`
--

DROP TABLE IF EXISTS `sys_module`;
CREATE TABLE `sys_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL COMMENT '创建人',
  `create_date` int(11) NOT NULL COMMENT '创建时间',
  `write_uid` int(11) NOT NULL COMMENT '修改人',
  `write_date` int(11) NOT NULL COMMENT '修改时间',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  `business_name` varchar(50) DEFAULT NULL COMMENT '模块中文名称',
  `project_name` varchar(50) DEFAULT NULL COMMENT '项目名称（冗余）',
  `module_name` varchar(50) DEFAULT NULL COMMENT '模块英文名称',
  `method_name` varchar(50) DEFAULT NULL COMMENT '默认方法名',
  `parent_module` varchar(50) DEFAULT NULL COMMENT '父模块id',
  `module_type` int(11) DEFAULT '0' COMMENT '模块类型0独立模块，1分类，2菜单',
  `module_prefix` varchar(50) DEFAULT NULL COMMENT '模块前缀',
  `project_code` varchar(50) DEFAULT NULL COMMENT '项目代号（冗余）',
  `app_icon` varchar(50) DEFAULT NULL COMMENT '模块图标',
  `developer` varchar(50) DEFAULT NULL COMMENT '模块开发者',
  `url_param` varchar(200) DEFAULT NULL COMMENT 'url参数',
  `serial_number` varchar(50) DEFAULT NULL COMMENT '模块定义编号',
  `access_code` varchar(50) DEFAULT NULL COMMENT '（未使用字段）',
  `describe` text COMMENT '模块功能描述',
  `remark` text COMMENT '模块注意事项、开发难点、配置等信息',
  `background` varchar(50) DEFAULT NULL COMMENT '模块背景颜色',
  `opacity` float DEFAULT '1' COMMENT '模块透明度',
  `active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否激活（1激活、0未激活）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='模块表';

--
-- Dumping data for table `sys_module`
--

/*!40000 ALTER TABLE `sys_module` DISABLE KEYS */;
INSERT INTO `sys_module` (`id`,`create_uid`,`create_date`,`write_uid`,`write_date`,`flag`,`business_name`,`project_name`,`module_name`,`method_name`,`parent_module`,`module_type`,`module_prefix`,`project_code`,`app_icon`,`developer`,`url_param`,`serial_number`,`access_code`,`describe`,`remark`,`background`,`opacity`,`active`) VALUES 
 (1,1,1455861110,1,1455861110,1,'模块管理','系统管理','admin','module','0',1,NULL,'900','sys_module64.png','luodong',NULL,NULL,NULL,'模块管理',NULL,NULL,1,1),
 (2,1,1462954601,1,1462954601,1,'基础配置','系统管理','baseset','index','0',1,'','900','tools_64.png','xyd','','CANDOR-LUODONG-2012-10-10-1234',NULL,'无','无','#3300FF',0.5,1),
 (3,1,1462954601,1,1462954601,1,'数据迁移','系统管理','datatransfer','index','0',1,'','900','tools_64.png','xyd','','CANDOR-LUODONG-2012-10-10-1234','','无','无','#3300FF',0.5,1),
 (4,1,1455861110,1,1465282290,0,'组织管理','从业主体','cyzt_companylist','index','0',0,'cyzt_','101','org64.png','luodong','','CANDOR-LUODONG-2012-10-10-1234',NULL,'组织管理','','',1,1),
 (5,1,1455861110,1,1455861110,1,'角色管理','从业主体','cyzt_rolemanager','index','0',0,'cyzt_','101','role64.png','luodong',NULL,NULL,NULL,'角色管理',NULL,NULL,1,1),
 (6,1,1462954569,1,1462954569,1,'学校管理','从业主体','cyzt_school','index','0',0,'cyzt_','101','tools_64.png','xyd','','CANDOR-LUODONG-2012-10-10-1234',NULL,'无','无','#3300FF',0.5,1),
 (38,1,1462954840,1,1465204640,0,'调查管理','调查管理','edu_questionnaire','index','0',0,'edu_','102','resume_64.png','xyd','','CANDOR-LUODONG-2012-10-10-1234',NULL,'无','无','#3300FF',0.5,1),
 (39,1,1462954904,1,1462954904,1,'数据统计','数据分析','data_stats','index','0',0,'data_','103','count64.png','xyd','','CANDOR-LUODONG-2012-10-10-1234',NULL,'无','无','#3300FF',0.5,1),
 (40,1,1463707823,1,1464248521,1,'问题管理','调查管理','edu_question','index','0',0,'edu_','102','task_64.png','xyd','','CANDOR-LUODONG-2012-10-10-1234',NULL,'无','无','#3300FF',0.5,1),
 (41,1,1462954601,1,1462954601,1,'基础配置','配置管理','base_baseset','index','0',0,'base_','100','tools_64.png','xyd','','CANDOR-LUODONG-2012-10-10-1234','','无','无','#3300FF',0.5,1);
/*!40000 ALTER TABLE `sys_module` ENABLE KEYS */;


--
-- Definition of table `sys_orgstruct`
--

DROP TABLE IF EXISTS `sys_orgstruct`;
CREATE TABLE `sys_orgstruct` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `org_name` varchar(200) DEFAULT NULL COMMENT '组织名称',
  `org_id` int(11) NOT NULL COMMENT '分别对应sys_company/sys_department表中的主键id',
  `type` varchar(50) DEFAULT NULL COMMENT '组织类型',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
  `relate_table` varchar(50) DEFAULT NULL COMMENT '关联表名称',
  `flag` tinyint(4) DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='组织结构表';

--
-- Dumping data for table `sys_orgstruct`
--

/*!40000 ALTER TABLE `sys_orgstruct` DISABLE KEYS */;
INSERT INTO `sys_orgstruct` (`id`,`org_name`,`org_id`,`type`,`parent_id`,`relate_table`,`flag`) VALUES 
 (1,'川大',1,'school',0,'edu_school',0),
 (2,'经贸学院',0,'department',1,'edu_college',0),
 (3,'电子商务',1,'job',2,'edu_specialty',0),
 (4,'冒充学院',0,'department',1,'edu_college',0),
 (5,'dsgh',4,'department',1,'edu_college',0),
 (6,'dfgret',0,'job',5,'edu_specialty',0),
 (7,'计算机学院',5,'department',1,'edu_college',0),
 (8,'通讯专业',3,'job',7,'edu_specialty',0),
 (9,'西华',2,'school',0,'edu_school',1),
 (10,'车辆学院',6,'department',9,'edu_college',1),
 (11,'车辆工程',4,'job',10,'edu_specialty',1),
 (12,'川大',3,'school',0,'edu_school',1);
/*!40000 ALTER TABLE `sys_orgstruct` ENABLE KEYS */;


--
-- Definition of table `sys_poststation`
--

DROP TABLE IF EXISTS `sys_poststation`;
CREATE TABLE `sys_poststation` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  `company_id` int(11) DEFAULT NULL COMMENT '公司id（冗余）',
  `depart_id` int(11) DEFAULT NULL COMMENT '部门id（冗余）',
  `code` int(11) NOT NULL COMMENT '代号',
  `name` varchar(50) DEFAULT NULL COMMENT '岗位名称',
  `active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否激活（1激活、0未激活）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='岗位表';

--
-- Dumping data for table `sys_poststation`
--

/*!40000 ALTER TABLE `sys_poststation` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_poststation` ENABLE KEYS */;


--
-- Definition of table `sys_project`
--

DROP TABLE IF EXISTS `sys_project`;
CREATE TABLE `sys_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL COMMENT '创建人',
  `create_date` int(11) NOT NULL COMMENT '创建时间',
  `write_uid` int(11) NOT NULL COMMENT '修改人',
  `write_date` int(11) NOT NULL COMMENT '修改人时间',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  `project_code` varchar(50) DEFAULT NULL COMMENT '项目代号',
  `project_name` varchar(50) DEFAULT NULL COMMENT '项目名称',
  `project_prefix` varchar(50) DEFAULT NULL COMMENT '项目前缀',
  `project_icon` varchar(50) DEFAULT NULL COMMENT '项目图标',
  `parent_code` varchar(50) DEFAULT NULL COMMENT '父项目代号',
  `isadmin` int(11) NOT NULL DEFAULT '0' COMMENT '是否为超级管理员（1是、0不是）',
  `active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '用户是否激活（1激活、0未激活）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='系统表';

--
-- Dumping data for table `sys_project`
--

/*!40000 ALTER TABLE `sys_project` DISABLE KEYS */;
INSERT INTO `sys_project` (`id`,`create_uid`,`create_date`,`write_uid`,`write_date`,`flag`,`project_code`,`project_name`,`project_prefix`,`project_icon`,`parent_code`,`isadmin`,`active`) VALUES 
 (1,1,1455861110,1,1455861110,1,'900','系统管理',NULL,'opt_monitoring_48.png','0',1,1),
 (2,1,1455861110,1,1455861110,1,'101','从业主体','cyzt_','resume_config_48.png','0',0,1),
 (4,1,1462954372,1,1465962458,1,'100','配置管理','base_','tools_48.png','0',0,1),
 (5,1,1462954754,1,1464248521,1,'102','调查管理','edu_','task_48.png','0',0,1),
 (6,1,1462954793,1,1462954793,1,'103','数据分析','data_','count48.png','0',0,1);
/*!40000 ALTER TABLE `sys_project` ENABLE KEYS */;


--
-- Definition of table `sys_rightsadd`
--

DROP TABLE IF EXISTS `sys_rightsadd`;
CREATE TABLE `sys_rightsadd` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `right_id` int(11) NOT NULL COMMENT '方法id',
  `group_id` int(11) DEFAULT NULL COMMENT '用户群id',
  `roleuser_id` int(11) DEFAULT NULL COMMENT '角色用户id',
  `rightsadd` text COMMENT '附加权限名',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='附加权限表（未使用）';

--
-- Dumping data for table `sys_rightsadd`
--

/*!40000 ALTER TABLE `sys_rightsadd` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_rightsadd` ENABLE KEYS */;


--
-- Definition of table `sys_roles`
--

DROP TABLE IF EXISTS `sys_roles`;
CREATE TABLE `sys_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL COMMENT '创建人',
  `create_date` int(11) NOT NULL COMMENT '创建时间',
  `write_uid` int(11) NOT NULL COMMENT '修改人',
  `write_date` int(11) NOT NULL COMMENT '修改时间',
  `flag` tinyint(4) DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  `name` varchar(50) DEFAULT NULL COMMENT '角色名称',
  `alias` varchar(50) DEFAULT NULL COMMENT '角色别名',
  `note` varchar(200) DEFAULT NULL COMMENT '角色备注',
  `company_id` int(11) DEFAULT NULL COMMENT '公司id（未使用）',
  `active` tinyint(4) DEFAULT '1' COMMENT '用户是否激活（1激活、0未激活）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色表';

--
-- Dumping data for table `sys_roles`
--

/*!40000 ALTER TABLE `sys_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_roles` ENABLE KEYS */;


--
-- Definition of table `sys_roles_method`
--

DROP TABLE IF EXISTS `sys_roles_method`;
CREATE TABLE `sys_roles_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `role_id` int(11) DEFAULT NULL COMMENT '角色id',
  `method_id` int(11) DEFAULT NULL COMMENT '方法id',
  `module_id` int(11) DEFAULT NULL COMMENT '模块id（冗余）',
  `project_code` int(11) DEFAULT NULL COMMENT '项目代号（冗余）',
  PRIMARY KEY (`id`),
  KEY `FK_Reference_18` (`method_id`),
  KEY `FK_Reference_2` (`role_id`),
  CONSTRAINT `FK_Reference_18` FOREIGN KEY (`method_id`) REFERENCES `sys_method` (`id`),
  CONSTRAINT `FK_Reference_2` FOREIGN KEY (`role_id`) REFERENCES `sys_roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色与权限表';

--
-- Dumping data for table `sys_roles_method`
--

/*!40000 ALTER TABLE `sys_roles_method` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_roles_method` ENABLE KEYS */;


--
-- Definition of table `sys_roles_user`
--

DROP TABLE IF EXISTS `sys_roles_user`;
CREATE TABLE `sys_roles_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`id`),
  KEY `FK_Reference_4` (`role_id`),
  KEY `FK_Reference_5` (`user_id`),
  CONSTRAINT `FK_Reference_4` FOREIGN KEY (`role_id`) REFERENCES `sys_roles` (`id`),
  CONSTRAINT `FK_Reference_5` FOREIGN KEY (`user_id`) REFERENCES `sys_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户与角色关系表';

--
-- Dumping data for table `sys_roles_user`
--

/*!40000 ALTER TABLE `sys_roles_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_roles_user` ENABLE KEYS */;


--
-- Definition of table `sys_user`
--

DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL COMMENT '创建人',
  `create_date` int(11) NOT NULL COMMENT '创建时间',
  `write_date` int(11) NOT NULL COMMENT '修改时间',
  `write_uid` int(11) NOT NULL COMMENT '修改人',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  `relate_table` varchar(255) DEFAULT NULL,
  `relate_id` int(11) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL COMMENT '用户类型',
  `region_code` varchar(50) DEFAULT NULL COMMENT '地区编码',
  `user_name` varchar(50) DEFAULT NULL COMMENT '登录名',
  `true_name` varchar(50) DEFAULT NULL COMMENT '用户真实姓名',
  `password` varchar(50) DEFAULT NULL COMMENT '密码',
  `knowledge` varchar(25) DEFAULT NULL COMMENT '学历（大专、高中、本科、研究生、博士、其他）',
  `orgstruct_id` int(11) DEFAULT NULL COMMENT '组织（公司部门）id',
  `job` varchar(50) DEFAULT NULL COMMENT '职务',
  `id_type` varchar(25) DEFAULT NULL COMMENT '证件类型',
  `ip_address` varchar(50) DEFAULT NULL COMMENT '证件地址',
  `log_date` datetime DEFAULT NULL COMMENT '（未使用）',
  `expire_date` datetime DEFAULT NULL COMMENT '证件到期时间',
  `nationality` varchar(50) DEFAULT NULL COMMENT '国籍',
  `birthdate` datetime DEFAULT NULL COMMENT '出生日期',
  `sex` varchar(50) DEFAULT NULL COMMENT '性别',
  `id_number` varchar(25) DEFAULT NULL COMMENT '证件号',
  `qq` varchar(50) DEFAULT NULL COMMENT 'qq号',
  `fax` varchar(50) DEFAULT NULL COMMENT '传真号',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱号',
  `phone` varchar(50) DEFAULT NULL COMMENT '电话号',
  `address` varchar(200) DEFAULT NULL COMMENT '地址',
  `mobile` varchar(50) DEFAULT NULL COMMENT '手机号',
  `note` text COMMENT '备注',
  `status` int(11) DEFAULT '1' COMMENT '用户状态',
  `sort` int(11) DEFAULT NULL COMMENT '权重',
  `is_admin` int(11) DEFAULT '0' COMMENT '是否是超级管理员',
  `active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '用户是否激活（1激活、0未激活）',
  `quick_module` varchar(200) DEFAULT NULL COMMENT '记录的左侧模块',
  PRIMARY KEY (`id`),
  KEY `FK_Reference_6` (`orgstruct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- Dumping data for table `sys_user`
--

/*!40000 ALTER TABLE `sys_user` DISABLE KEYS */;
INSERT INTO `sys_user` (`id`,`create_uid`,`create_date`,`write_date`,`write_uid`,`flag`,`relate_table`,`relate_id`,`user_type`,`region_code`,`user_name`,`true_name`,`password`,`knowledge`,`orgstruct_id`,`job`,`id_type`,`ip_address`,`log_date`,`expire_date`,`nationality`,`birthdate`,`sex`,`id_number`,`qq`,`fax`,`email`,`phone`,`address`,`mobile`,`note`,`status`,`sort`,`is_admin`,`active`,`quick_module`) VALUES 
 (1,1,1455860077,1465802476,1,1,'edu_student',1,1,NULL,'ADMIN','系统保留','1Imt',NULL,12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,1,1,'1,5,6,39,40'),
 (2,1,1463021163,1464168606,1,1,'edu_student',1,0,'0','TEST','23434','1Imt','0',12,'','身份证','',NULL,NULL,'','0000-00-00 00:00:00','男','0','','','','','','',NULL,1,0,0,1,NULL),
 (3,1,1463032263,1465178371,1,0,'edu_student',2,0,'0','23','','20C','0',11,'','身份证','',NULL,NULL,'','0000-00-00 00:00:00','男','23','','','','','','',NULL,1,0,0,1,NULL),
 (4,1,1464945900,1464945900,1,1,'edu_student',3,0,'0','wer','','TRc8','0',11,'','身份证','',NULL,NULL,'','0000-00-00 00:00:00','男','wer','','','','','','',NULL,1,0,0,1,NULL),
 (5,1,1465176989,1465177023,1,1,'edu_student',4,0,'0','510','','xcCu','0',11,'','身份证','',NULL,NULL,'','0000-00-00 00:00:00','男','510','','','','','','',NULL,1,0,0,1,NULL);
/*!40000 ALTER TABLE `sys_user` ENABLE KEYS */;


--
-- Definition of table `sys_user_groups`
--

DROP TABLE IF EXISTS `sys_user_groups`;
CREATE TABLE `sys_user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `group_id` int(11) DEFAULT NULL COMMENT '用户群id',
  PRIMARY KEY (`id`),
  KEY `FK_Reference_1` (`user_id`),
  KEY `FK_Reference_3` (`group_id`),
  CONSTRAINT `FK_Reference_1` FOREIGN KEY (`user_id`) REFERENCES `sys_user` (`id`),
  CONSTRAINT `FK_Reference_3` FOREIGN KEY (`group_id`) REFERENCES `sys_groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户与用户组关系表';

--
-- Dumping data for table `sys_user_groups`
--

/*!40000 ALTER TABLE `sys_user_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_user_groups` ENABLE KEYS */;


--
-- Definition of table `wfk_instance`
--

DROP TABLE IF EXISTS `wfk_instance`;
CREATE TABLE `wfk_instance` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL COMMENT '创建人',
  `create_date` int(11) NOT NULL COMMENT '创建时间',
  `write_uid` int(11) NOT NULL COMMENT '修改人',
  `write_date` int(11) NOT NULL COMMENT '修改时间',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  `wkf_id` int(11) DEFAULT NULL COMMENT '所属过程定义编号',
  `res_table` varchar(50) DEFAULT NULL COMMENT '与当前过程定义相关联的业务数据表名称',
  `res_id` int(11) DEFAULT NULL COMMENT '关联业务表的记录编号值',
  `state` varchar(10) DEFAULT NULL COMMENT '流程实例状态（冻结、取消）',
  `reason` varchar(200) DEFAULT NULL COMMENT '冻结、取消流程的原因',
  PRIMARY KEY (`id`),
  KEY `FK_wfk_instance_wkf_id_fkey` (`wkf_id`),
  CONSTRAINT `FK_wfk_instance_wkf_id_fkey` FOREIGN KEY (`wkf_id`) REFERENCES `wkf` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='流程实例的数据模型';

--
-- Dumping data for table `wfk_instance`
--

/*!40000 ALTER TABLE `wfk_instance` DISABLE KEYS */;
/*!40000 ALTER TABLE `wfk_instance` ENABLE KEYS */;


--
-- Definition of table `wkf`
--

DROP TABLE IF EXISTS `wkf`;
CREATE TABLE `wkf` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `created_uid` int(11) NOT NULL DEFAULT '0' COMMENT '创建人',
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `write_uid` int(11) NOT NULL DEFAULT '0' COMMENT '修改人',
  `write_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  `name` varchar(50) DEFAULT NULL COMMENT '过程定义名称',
  `res_table` varchar(50) DEFAULT NULL COMMENT '与当前过程定义相关联的业务数据表名称',
  `alias` varchar(50) DEFAULT NULL COMMENT '业务数据表中文名称',
  `res_field` varchar(50) DEFAULT NULL COMMENT '业务数据表的标识字段名称',
  `is_define_completed` tinyint(4) DEFAULT '0' COMMENT '当前过程是否已被完整定义（只有定义完整的过程才可用0未配置完成1已配置完成）',
  `is_suspended` tinyint(4) DEFAULT '0' COMMENT '当前过程是否被挂起（被挂起的过程不可用0未挂起1挂起）',
  `due_date` int(11) DEFAULT NULL COMMENT '业务过程的承诺办理期限（单位为天）',
  `xml_schema` text COMMENT '业务流程xml文件',
  `no` varchar(50) DEFAULT NULL COMMENT '业务流程编号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='工作流过程数据模型';

--
-- Dumping data for table `wkf`
--

/*!40000 ALTER TABLE `wkf` DISABLE KEYS */;
INSERT INTO `wkf` (`id`,`created_uid`,`created_date`,`write_uid`,`write_date`,`flag`,`name`,`res_table`,`alias`,`res_field`,`is_define_completed`,`is_suspended`,`due_date`,`xml_schema`,`no`) VALUES 
 (3,1,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00',1,'员工出差申请','wkf_exp_evect','出差申请','status',NULL,1,4,NULL,NULL),
 (4,1,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00',1,'员工年假申请','test','员工年假申请','',0,0,5,NULL,NULL),
 (5,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1,'婚假申请','hunjia','婚假申请','state',0,0,5,NULL,NULL),
 (6,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1,'产假申请','chanjia','产假申请','state',0,0,5,NULL,NULL),
 (7,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1,'电脑申请','diannao','电脑申请','state',0,0,3,NULL,NULL),
 (8,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1,'电脑配件申请','peijian','电脑配件申请','state',0,0,5,NULL,NULL),
 (9,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1,'办公用品申请','bangong','办公用品申请','state',0,0,3,NULL,NULL),
 (10,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1,'车辆申请','cheliang','车辆申请','state',0,0,1,NULL,NULL),
 (11,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1,'病假申请','bingjia','病假申请','state',0,0,2,NULL,NULL),
 (12,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1,'探亲假申请','tanqin','探亲假申请','state',0,0,3,NULL,NULL),
 (13,0,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00',1,'加班申请','wkf','加班申请','flag,alias',0,0,3,NULL,NULL),
 (19,0,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00',1,'sadf','wkf','asdf','flag',0,1,3,NULL,NULL),
 (20,0,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00',1,'sdf','wkf','sdf','flag',0,0,2,NULL,NULL);
/*!40000 ALTER TABLE `wkf` ENABLE KEYS */;


--
-- Definition of table `wkf_activity`
--

DROP TABLE IF EXISTS `wkf_activity`;
CREATE TABLE `wkf_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL COMMENT '创建人',
  `create_date` int(11) NOT NULL COMMENT '创建时间',
  `write_uid` int(11) NOT NULL COMMENT '修改人',
  `write_date` int(11) NOT NULL COMMENT '修改时间',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  `name` varchar(50) DEFAULT NULL COMMENT '活动名称',
  `wkf_id` int(11) DEFAULT NULL COMMENT '所属过程定义编号',
  `type` varchar(10) DEFAULT NULL COMMENT '活动节点类型（2开始、3结束节点或1活动节点）',
  `kind` varchar(50) DEFAULT NULL COMMENT '执行的动作类别（空, 函数,子流程, 全部停止四种）',
  `join_mode` varchar(10) DEFAULT NULL COMMENT '合并（聚合）模式（1异或XOR，2或OR，3和AND）',
  `split_mode` varchar(10) DEFAULT NULL COMMENT '拆分（聚合）模式（1异或XOR，2或OR，3和AND）',
  `action` varchar(50) DEFAULT NULL COMMENT '执行动作（程序方法）',
  `subflow_id` varchar(50) DEFAULT NULL COMMENT '执行子流程',
  `allow_attached` varchar(2) DEFAULT NULL COMMENT '是否可以上载或下载附件',
  `readable_fields` varchar(50) DEFAULT NULL COMMENT '当前活动可读的业务数据表字段名集和',
  `writable_fields` varchar(50) DEFAULT NULL COMMENT '当前活动可编辑的业务数据表字段名集和',
  `due_date` int(11) DEFAULT NULL COMMENT '当前活动的承诺完成期限（天）',
  PRIMARY KEY (`id`),
  KEY `FK_wkf_activity_wkf_id_fkey` (`wkf_id`),
  CONSTRAINT `FK_wkf_activity_wkf_id_fkey` FOREIGN KEY (`wkf_id`) REFERENCES `wkf` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='过程活动数据模型';

--
-- Dumping data for table `wkf_activity`
--

/*!40000 ALTER TABLE `wkf_activity` DISABLE KEYS */;
INSERT INTO `wkf_activity` (`id`,`create_uid`,`create_date`,`write_uid`,`write_date`,`flag`,`name`,`wkf_id`,`type`,`kind`,`join_mode`,`split_mode`,`action`,`subflow_id`,`allow_attached`,`readable_fields`,`writable_fields`,`due_date`) VALUES 
 (8,1,1471403100,1,1473229361,1,'开始',13,'2','2','1','1','apply',NULL,NULL,NULL,NULL,3),
 (9,1,1471411737,1,1473229421,1,'申请',13,'1','0','0','0','apply',NULL,NULL,NULL,NULL,3),
 (10,1,1471412029,1,1473212512,1,'初审',13,'1','2','3','3','apply',NULL,NULL,NULL,NULL,2),
 (11,1,1471412115,1,1471414689,1,'复审',13,'1','2','1','1','apply',NULL,NULL,NULL,NULL,3),
 (20,1,1473243584,1,1473243584,1,'结束',13,'3','2','2','0','over',NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `wkf_activity` ENABLE KEYS */;


--
-- Definition of table `wkf_exp_evect`
--

DROP TABLE IF EXISTS `wkf_exp_evect`;
CREATE TABLE `wkf_exp_evect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL COMMENT '出差申请名称',
  `username` varchar(45) DEFAULT NULL COMMENT '出差人',
  `start_date` int(10) unsigned DEFAULT NULL COMMENT '出差开始时间',
  `end_date` int(10) unsigned DEFAULT NULL COMMENT '出差结束时间',
  `note` varchar(45) DEFAULT NULL COMMENT '出差事由',
  `status` varchar(45) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wkf_exp_evect`
--

/*!40000 ALTER TABLE `wkf_exp_evect` DISABLE KEYS */;
/*!40000 ALTER TABLE `wkf_exp_evect` ENABLE KEYS */;


--
-- Definition of table `wkf_transition`
--

DROP TABLE IF EXISTS `wkf_transition`;
CREATE TABLE `wkf_transition` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `create_uid` int(11) NOT NULL COMMENT '创建人',
  `create_date` int(11) NOT NULL COMMENT '创建时间',
  `write_uid` int(11) NOT NULL COMMENT '修改人',
  `write_date` int(11) NOT NULL COMMENT '修改时间',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除（0删除、1未删）',
  `wkf_id` int(11) DEFAULT NULL COMMENT '所属过程定义编号',
  `act_from` int(11) DEFAULT NULL COMMENT '状态转变的起始活动',
  `act_to` int(11) DEFAULT NULL COMMENT '状态转变的结束活动',
  `condition` varchar(250) DEFAULT NULL COMMENT '满足条件的表达式',
  `signal` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '触发状态转变的信号（按钮名称）',
  `role_id` varchar(50) DEFAULT NULL COMMENT '分配的任务角色编号',
  PRIMARY KEY (`id`),
  KEY `FK_wkf_transition_act_from_fkey` (`act_from`),
  KEY `FK_wkf_transition_act_to_fkey` (`act_to`),
  KEY `FK_wkf_transition_wkf_id_fkey` (`wkf_id`),
  CONSTRAINT `FK_wkf_transition_act_from_fkey` FOREIGN KEY (`act_from`) REFERENCES `wkf_activity` (`id`),
  CONSTRAINT `FK_wkf_transition_act_to_fkey` FOREIGN KEY (`act_to`) REFERENCES `wkf_activity` (`id`),
  CONSTRAINT `FK_wkf_transition_wkf_id_fkey` FOREIGN KEY (`wkf_id`) REFERENCES `wkf` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COMMENT='活动状态转变数据模型';

--
-- Dumping data for table `wkf_transition`
--

/*!40000 ALTER TABLE `wkf_transition` DISABLE KEYS */;
INSERT INTO `wkf_transition` (`id`,`create_uid`,`create_date`,`write_uid`,`write_date`,`flag`,`wkf_id`,`act_from`,`act_to`,`condition`,`signal`,`role_id`) VALUES 
 (15,1,1473301426,1,1473310927,1,13,8,9,'flag=1','提交申请',NULL),
 (16,1,1473301480,1,1473310936,1,13,9,10,'flag=2','提交初审',NULL),
 (17,1,1473310973,1,1473310973,1,13,10,11,'flag=3','通过初审',NULL),
 (21,1,1473312402,1,1473312402,1,13,11,20,'flag=5','等分',NULL);
/*!40000 ALTER TABLE `wkf_transition` ENABLE KEYS */;


--
-- Definition of table `wkf_witm_trans`
--

DROP TABLE IF EXISTS `wkf_witm_trans`;
CREATE TABLE `wkf_witm_trans` (
  `trans_id` int(11) DEFAULT NULL COMMENT '活动状态转变id',
  `inst_id` int(11) DEFAULT NULL COMMENT '流程实例id',
  KEY `FK_wkf_witm_trans_inst_id_fkey` (`inst_id`),
  KEY `FK_wkf_witm_trans_teans_id_fkey` (`trans_id`),
  CONSTRAINT `FK_wkf_witm_trans_inst_id_fkey` FOREIGN KEY (`inst_id`) REFERENCES `wfk_instance` (`id`),
  CONSTRAINT `FK_wkf_witm_trans_teans_id_fkey` FOREIGN KEY (`trans_id`) REFERENCES `wkf_transition` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='任务（活动）实例状态转变数据模型';

--
-- Dumping data for table `wkf_witm_trans`
--

/*!40000 ALTER TABLE `wkf_witm_trans` DISABLE KEYS */;
/*!40000 ALTER TABLE `wkf_witm_trans` ENABLE KEYS */;


--
-- Definition of table `wkf_workitem`
--

DROP TABLE IF EXISTS `wkf_workitem`;
CREATE TABLE `wkf_workitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `act_id` int(11) DEFAULT NULL COMMENT '活动id',
  `inst_id` int(11) DEFAULT NULL COMMENT '流程实例id',
  `state` varchar(10) DEFAULT NULL COMMENT '任务实例状态',
  `start_date` datetime DEFAULT NULL COMMENT '任务开始时间',
  `end_date` datetime DEFAULT NULL COMMENT '任务结束时间',
  `uid` int(11) DEFAULT NULL COMMENT '拾起任务的用户编号',
  PRIMARY KEY (`id`),
  KEY `FK_wkf_workitem_act_id_fkey` (`act_id`),
  KEY `FK_wkf_workitem_inst_id_fkey` (`inst_id`),
  CONSTRAINT `FK_wkf_workitem_act_id_fkey` FOREIGN KEY (`act_id`) REFERENCES `wkf_activity` (`id`),
  CONSTRAINT `FK_wkf_workitem_inst_id_fkey` FOREIGN KEY (`inst_id`) REFERENCES `wfk_instance` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='任务（活动）实例数据模型';

--
-- Dumping data for table `wkf_workitem`
--

/*!40000 ALTER TABLE `wkf_workitem` DISABLE KEYS */;
/*!40000 ALTER TABLE `wkf_workitem` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
