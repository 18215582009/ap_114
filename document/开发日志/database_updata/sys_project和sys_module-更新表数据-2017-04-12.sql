use fc114;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Records of `sys_project`
-- ----------------------------
BEGIN;
INSERT INTO `sys_project` VALUES ('8', '1', '1462954793', '1', '1462954793', '1', '105', '二手房管理', 'resold_', 'icon-book-open', '0', '9');
COMMIT;

BEGIN;
INSERT INTO `sys_module` VALUES 
 ('43', '1', '1463707823', '1', '1463707823', '1', '出售房源', '二手房管理', 'resold_sale', 'index', '0', '0', 'resold_', '105', 'task_64.png', 'luodong', null, 'CANDOR-LUODONG-2012-10-10-1234', null, '无', '无', '#3300FF', '1', '1', null), 
 ('44', '1', '1463707823', '1', '1463707823', '1', '出租管理', '二手房管理', 'resold_rent', 'index', '0', '0', 'resold_', '105', 'task_64.png', 'luodong', null, 'CANDOR-LUODONG-2012-10-10-1234', null, '无', '无', '#3300FF', '1', '1', null), 
 ('45', '1', '1463707823', '1', '1463707823', '1', '片区管理', '二手房管理', 'resold_district', 'index', '0', '0', 'resold_', '105', 'task_64.png', 'luodong', null, 'CANDOR-LUODONG-2012-10-10-1234', null, '无', '无', '#3300FF', '1', '1', null);
COMMIT;

