<?php
/**
 * The config file of fc_project.
 *
 * @copyright   Copyright: 2012
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: config.php,v 1.3 2012/06/18 21:30:02 ld Exp $
 */
$config->module->name = '客户管理';                       // 中文名称
$config->module->icon = 'org64.png';
$config->module->moduleName = 'fc_project_reserve';
$config->module->projectName = '客户管理';
$config->module->btn = array('form'=>'opform','show'=>'/fc_project_reserve/show','edit'=>'/fc_project_reserve/edit','list'=>'/fc_project_reserve/index');
$config->module->huxingBtn = array('form'=>'opform','show'=>'/fc_project_reserve/editHuxing','edit'=>'/fc_project_reserve/editHuxing','list'=>'/fc_project_reserve/listHuxing');