<?php
/**
 * The config file of index.
 *
 * @copyright   Copyright: 2012
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     : config.php,v 1.3 2012/06/18 21:30:02 ld Exp $
 */
$config->module->name = '角色管理';                       // 中文名称
$config->module->icon = 'role64.png';
$config->module->moduleName = 'cyzt_rolemanager';
$config->module->projectName = '101';
//$config->wsdl->FlowService = "http://129.19.100.24:5995/WSLogin.asmx?wsdl";
$config->module->access = array('getUserJson','getusersystem','getorgstructbyid','getsearchres');