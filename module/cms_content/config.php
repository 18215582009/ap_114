<?php
/**
 * The config file of cms_content.
 *
 * @copyright   Copyright: 2012
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: config.php,v 1.3 2012/06/18 21:30:02 ld Exp $
 */
$config->module->name = '信息管理';                       // 中文名称
$config->module->icon = 'org64.png';
$config->module->moduleName = 'cms_content';
$config->module->projectName = '信息管理';
$config->module->btn = array('form'=>'opform','show'=>'/cms_content/show','edit'=>'/cms_content/edit','list'=>'/cms_content/index');
$config->module->huxingBtn = array('form'=>'opform','show'=>'/cms_content/editHuxing','edit'=>'/cms_content/editHuxing','list'=>'/cms_content/listHuxing');