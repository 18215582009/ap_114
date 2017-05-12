<?php
/**
 * The config file of fc_project.
 *
 * @copyright   Copyright: 2012
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: config.php,v 1.3 2012/06/18 21:30:02 ld Exp $
 */
$config->module->name = '出租管理';                       // 中文名称
$config->module->icon = 'org64.png';
$config->module->moduleName = 'resold_rent';
$config->module->projectName = '二手房管理';
$config->module->btn = array('form'=>'opform','show'=>'/resold_sale/show','edit'=>'/resold_sale/edit','list'=>'/resold_sale/index');
$config->module->huxingBtn = array('form'=>'opform','show'=>'/resold_sale/editHuxing','edit'=>'/resold_sale/editHuxing','list'=>'/resold_sale/listHuxing');

