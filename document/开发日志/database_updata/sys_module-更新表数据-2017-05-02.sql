use fc114;

-- ----------------------------
--  Records of `sys_project`
-- ----------------------------
BEGIN;
UPDATE sys_module set business_name='小区管理' where module_name="resold_district";
COMMIT;

BEGIN;
INSERT INTO `sys_module` VALUES 
 ('46', '1', '1463707823', '1', '1463707823', '1', '片区管理', '新房管理', 'fc_region', 'index', '0', '0', 'fc_', '102', 'task_64.png', 'luodong', null, 'CANDOR-LUODONG-2012-10-10-1234', null, '无', '无', '#3300FF', '1', '1', null);
COMMIT;

