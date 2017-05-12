<?php
/**
 * The config file of fc_project.
 *
 * @copyright   Copyright: 2012
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: config.php,v 1.3 2012/06/18 21:30:02 ld Exp $
 */
$config->module->name = '项目管理';                       // 中文名称
$config->module->icon = 'org64.png';
$config->module->moduleName = 'fc_region';
$config->module->projectName = '项目管理';
$config->module->btn = array('form'=>'opform','show'=>'/fc_region/show','edit'=>'/fc_region/edit','list'=>'/fc_region/index');
$config->module->huxingBtn = array('form'=>'opform','show'=>'/fc_region/editHuxing','edit'=>'/fc_region/editHuxing','list'=>'/fc_region/listHuxing');