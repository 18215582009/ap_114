<?php
/**
 * The config file of index.
 *
 * @copyright   Copyright: 2012
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: config.php,v 1.3 2012/06/18 21:30:02 ld Exp $
 */
$config->module = (object)[]; 
$config->module->name = '流程管理';                     // 中文名称
$config->module->icon = 'img.jpg';
$config->module->moduleName = 'admin_wkf';
$config->module->projectName = '流程管理';
$config->module->wkfBtn = array('show'=>'showWkf','edit'=>'editWkf','list'=>'index');
$config->module->actBtn = array('show'=>'showAct','edit'=>'editAct','list'=>'','sss'=>array('/sss/ww','sss'));
$config->module->tranBtn = array('show'=>'showTran','edit'=>'editTran','list'=>'');

//流程数据配置
$config->wkf = array(
	'field' => array('name','username','money','status','start_date','end_date'),
	'type' => array(1=>'活动节点',2=>'开始节点',3=>'结束节点'),
	'join_mode' => array(1=>'异或XOR',2=>'或OR',3=>'和AND'),
	'split_mode'=> array(1=>'异或XOR',2=>'或OR',3=>'和AND')
);
