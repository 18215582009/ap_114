<?php
/**
 * The config file of index.
 *
 * @copyright   Copyright: 2012
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     : config.php,v 1.3 2012/06/18 21:30:02 ld Exp $
 */
$config->module->name = '组织管理';  // 中文名称
$config->module->icon = 'org64.png';
$config->module->moduleName = 'cyzt_companylist';
$config->module->projectName = '101';
$config->wsdl->FlowService = "http://129.19.100.84:6996/WSLogin.asmx?wsdl";
$config->module->access = array('ajaxGetCyOrgList','ajaxGetRoleRightById','ajaxGetallRoleRightById','addQa');
