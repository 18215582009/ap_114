<?php
/**
 * The config file of CandorPHP.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: config.php,v 1.3 2012/02/15 07:30:02 lj Exp $
 */
$config->version     = '2.0.STABLE.090620'; // 版本号，切勿修改。2.1.0.160511,2.0.STABLE.090620
$config->debug       = false;              // 是否打开debug功能。
$config->webRoot     = '/';                // web网站的根目录。
$config->encoding    = 'UTF-8';            // 网站的编码。
$config->cookiePath  = '/';               // cookie的有效路径。
$config->cookieLife  = time() + 2592000;  // cookie的生命周期。
$config->auth        = false;             //是否开启认证
$config->domain = 'www.school.com';      //网站域名
$config->siteName = '乐山城市房产';          //网站名称
$config->shortName = '乐山房产';          //网站名称缩写
$config->super2OBJ=true;                  //是否支持$this->session->set()设置或访问session

$config->requestType = 'PATH_INFO';       // 如何获取当前请求的信息，可选值：PATH_INFO|GET
$config->pathType    = 'clean';           // requestType=PATH_INFO: 请求url的格式，可选值为full|clean，full格式会带有参数名称，clean则只有取值。
$config->requestFix  = '/';               // requestType=PATH_INFO: 请求url的分隔符，可选值为斜线、下划线、减号。后面两种形式有助于SEO。
$config->moduleVar   = 'm';               // requestType=GET: 模块变量名。
$config->methodVar   = 'f';               // requestType=GET: 方法变量名。
$config->viewVar     = 't';               // requestType=GET: 模板变量名。

$config->views       = ',html,xml,json,txt,csv,doc,pdf,'; // 支持的视图列表。
$config->langs       = 'zh-cn,zh-tw,zh-hk,en';            // 支持的语言列表。
$config->themes      = 'default';                         // 支持的主题列表。

$config->default = (object)[]; 
$config->default->view   = 'html';                      // 默认的视图格式。
$config->default->lang   = 'zh-cn';                     // 默认的语言。
$config->default->theme  = 'default';                   // 默认的主题。已有主题blue、default、
$config->default->module = 'index';                 // 默认的模块。当请求中没有指定模块时，加载该模块。
$config->default->method = 'index';                     // 默认的方法。当请求中没有指定方法或者指定的方法不存在时，调用该方法。
$config->access = false;				                // 是否开启-权限访问
$config->app_name="房产综合服务平台";					//系统名称

//sms Config
$config->sms = (object)[];
$config->sms->appkey = '79fc767742ce9fec3f09e8cf64c51094';
$config->sms->appsecret = '525ae653bb38';
$config->sms->api = 'N5406617';
$config->sms->apisecret = 'P0zrGxfu1l5192';

//DataBase Config
$config->db = (object)[]; 
$config->db = require_once( dirname(__FILE__) . '/database.php' );

$config->module = (object)[]; 
/*************************** 系统文件上传配置 **********************************/
define('DB_PREFIX_SYS','sys_');  //系统表前缀
define('DB_PREFIX_WEB','web_');  //CMS表前缀
define('WEB_ROOT', str_replace("config", "www", dirname(__FILE__)));// 站点根目录WEB_ROOT
define('WEB_UPLOAD', WEB_ROOT."\\upload");// 文件上传目录WEB_UPLOAD
define('CK_WATER',true);                                 //是否开启水印
define('WATER_POS','4');                                //定义水印位置
define('WATER_PIC_PATH',WEB_ROOT.'/images/edit_act.png');//定义水印图片
define('FONTFACE_PATH',WEB_ROOT.'/data/encode/simhei.ttf');     //定义水印字体
define('WATER_TEXT','水印文字');                        //定义水印文字
define('FONT_SIZE','25');                               //定义水印字体大小
define('FONT_COLOR','#ff0000');                         //定义水印字体颜色
define('WATER_PCT','100');                              //定义水印透明度
define('WATER_TYPE','overlay');                         //使用水印类型overlay，text


/*************************** 业务基本配置 **********************************/
//页面分页大小设置
$config->pageSize=10;

/******************导入基础配置***************************************/
if ( file_exists( dirname(__FILE__) . '/basecode.php') ) {
	/** The web_config file resides in WEB_ROOT */
	require_once( dirname(__FILE__) . '/basecode.php' );
} else {
	// A web_config file doesn't exist
	die("系统错误：basecode.php配置文件不存在！");

}

/******************导入地区基础配置***************************************/
if ( file_exists( dirname(__FILE__) . '/basecode_ls.php') ) {
    /** The web_config file resides in WEB_ROOT */
    require_once( dirname(__FILE__) . '/basecode_ls.php' );
} else {
    // A web_config file doesn't exist
    die("系统错误：basecode_ls.php配置文件不存在！");

}


/******************导入缓存配置***************************************/
if ( file_exists( dirname(__FILE__) . '/cache.php') ) {
	/** The web_config file resides in WEB_ROOT */
	$config->cache = require_once( dirname(__FILE__) . '/cache.php' );
} else {
	// A web_config file doesn't exist
	//die("系统错误：cache.php配置文件不存在！");

}