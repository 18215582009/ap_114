<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: index.html.php,v 1.4 2012/02/16 09:54:23 lj Exp $
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP框架-基础调用</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/plugins/artDialog/jquery.artDialog.source.js?skin=default" type="text/javascript"></script>
<script src="/js/candor.common.js"></script>
<style>
body{ background:none}

</style>
<body>
<div class="container-fluid">
	<div class="row">
	<h2>php页面提示/提示文本</h2>
	<form class="form-horizontal">    
	<table class="table table-bordered">
		<thead>
		  <tr>
			<th>方法</th>
			<th>属性</th>
			<th>所属基类</th>
			<th>参数</th>
			<th>描述及调用</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td><span class="helpe-inline">page_msg</span></td>
			<td><code>static</code></td>
			<td><p class="helpe-block">lib/Util.class.php</p></td>
			<td rowspan="2">
				 <p><code>object $msg</code>页面提示信息</p>
				 <p><code>string $type</code>调用页面类型,参数类型:<code>succeed,error,help,warning,info,stop,forbidden</code></p>
				 <p><code>string $url</code>跳转页面地址,为空返回前一链接，数据格式为"url",也可以为"url|title",如"http://www.fg.com/index|返回平台首页"</p>
				 <p><code>int $time</code>等待跳转时间,设置为0,页面不自动跳转</p>
				 <p><code>string $url2</code>跳转页面地址2,数据格式同$url参数,但是该参数不能为空</p>
			</td>
			<td class="span6">
			<code>Util::page_msg('提示信息','succeed','/',3);</code><br />
			<code>Util::page_msg('提示信息','succeed','/|返回用户列表',3);</code><br />
			<code>Util::page_msg('提示信息','succeed','/|返回用户列表',3,'/|返回列表页');</code><br />
			</td>
		  </tr>
		  <tr>
			<td><p class="helpe-block">alert_msg</p></td>
			<td><code>static</code></td>
			<td><p class="helpe-block">lib/Util.class.php</p></td>
			<td>
				<code>Util::alert_msg('提示信息','succeed','/',3);</code><br />
				<code>Util::alert_msg('提示信息','succeed','/|返回用户列表',3);</code><br />
				<code>Util::alert_msg('提示信息','succeed','/|返回用户列表',3,'/|返回列表页');</code><br />
			</td>
		  </tr>
		</tbody>
	  </table>
	  <p>$_SERVER['HTTP_REFERER'] #链接到当前页面的前一页面的 URL 地址</p>
	  </form>
	</div>
	
	
	<div class="row">
	<h2>javaqscript页面提示/提示文本</h2>
	<form class="form-horizontal">    
	<table class="table table-bordered">
		<thead>
		  <tr>
			<th>方法</th>
			<th>属性</th>
			<th>所属基类</th>
			<th>调用代码</th>
			<th>描述及调用</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td><span class="helpe-inline">alert_msg</span></td>
			<td><code>static</code></td>
			<td><p class="helpe-block">lib/Util.class.php</p></td>
			<td>
				加载<code>&lt;script src="/js/plugins/artDialog/artDialog.source.js?skin=default"&gt;&lt;/script&gt;
&lt;script src="/js/plugins/artDialog/jquery.artDialog.source.js?skin=default" type="text/javascript"&gt;&lt;/script&gt;
&lt;script src="/js/candor.common.js"&gt;&lt;/script&gt;</code><br />
				 <p><code>alert_msg('请等待...','loading')</code></p>
				 <p><code>alert_msg('成功提示','succeed','sdf|ddd')</code></p>
				 <p><code>alert_msg('失败提示','error','sdf|bbb')</code></p>
			</td>
			<td class="span6">
			<button class="btn" onclick="loading()">加载等待</button>
			<button class="btn" onclick="alert_msg('请等待...','loading')">加载等待</button>
			<button class="btn" onclick="alert_msg('成功提示','succeed','sdf|ddd',3,'sdd|sss',true)">成功提示</button>
			<button class="btn" onclick="alert_msg('失败提示','error','sdf|bbb')">失败提示</button></td>
		  </tr>
		</tbody>
	  </table>
	  </form>
	</div>
</div>	
</body>
</html>

