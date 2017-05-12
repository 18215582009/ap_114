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
$config->module->moduleName = 'fc_project';
$config->module->projectName = '项目管理';
$config->module->btn = array('form'=>'opform','show'=>'/fc_project/show','edit'=>'/fc_project/edit','list'=>'/fc_project/index');
$config->module->huxingBtn = array('form'=>'opform','show'=>'/fc_project/editHuxing','edit'=>'/fc_project/editHuxing','list'=>'/fc_project/listHuxing');