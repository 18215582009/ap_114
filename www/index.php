<?php
/**
 * The demo app router file of CandorPHP.
 *
 * All request should be routed by this router.
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong <751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: index.php,v 1.2 2012/01/31 01:47:22 lj Exp $
 */

/*
if(!isset($_SERVER['PHP_AUTH_USER']) && !isset($_SERVER['PHP_AUTH_PW'])){
    Header("WWW-Authenticate: Basic realm=\"USER LOGIN\"");
    Header("HTTP/1.0 401 Unauthorized");
} else {
    echo $_SERVER['PHP_AUTH_USER'];
    echo $_SERVER['PHP_AUTH_PW'];
}
*/

/* Register The Auto Loader */
require __DIR__.'/../vendor/autoload.php';
/*
use NoahBuscher\Macaw\Macaw;

Macaw::get('/', function() {
  echo 'I <3 GET commands!';
});

Macaw::post('/', function() {
  echo 'I <3 POST commands!';
});

Macaw::error(function() {
  echo '404 :: Not Found';
});

Macaw::dispatch();
exit;
*/
ini_set("display_errors","off");
date_default_timezone_set('Etc/GMT-8'); 
header("Content-type: text/html; charset=utf-8");
session_start();

/* 记录最开始的时间 */
$timeStart = _getTime();

/* 实例化路由对象，并加载配置，连接到数据库，加载common模块 */
$app    = Router::createApp('fg', dirname(dirname(__FILE__)));

/* 导入系统配置文件app\config\config.php */
$config= $app->loadConfig();

if($config->debug){
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
}

/* 设置客户端所使用的语言、风格 */
$app->setClientLang();
$app->setClientTheme();

/* 导入公共模块app\module\common\lang\zh-cn.php */
$lang = $app->loadLang();

/* 实例化common，即new common(),让其他模块可以调用公共模块中的方法 */
$common = $app->loadCommon(); 

/* 处理请求，加载相应的模块 */
$app->parseRequest();
$app->loadModule();

/* Debug信息，监控页面的执行时间和内存占用。*/
$timeUsed = round(_getTime() - $timeStart, 4) * 1000;
$memory   = round(memory_get_usage() / 1024, 1);

if(!$config->debug)
{
	echo "<font color='green' style='position:fixed;bottom:1px;'>页面运行时间:$timeUsed ms; 内存</strong>:$memory KB</font>";
}

/* 获取系统时间，微秒为单位 */
function _getTime()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
