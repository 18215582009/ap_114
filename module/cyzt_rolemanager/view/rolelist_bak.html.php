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
<title>权限管理</title>
</head>
<link rel='stylesheet' href='/js/plugins/jquery.layout/layout-default-latest.css' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript">
</script>
<style>
body{background:#CCE0F1;}
a{cursor: pointer}
.title{height:36px;line-height:36px;width:100%;/*background:#E7F5FF;border-top:#FFFFFF solid 1px;border-bottom:#FFFFFF solid 1px;*/background:#5CC7FF;}
.title img{padding:0 5px 0 10px;}
.title span{font-size:14px;font-weight:bold}
.refresh{background:url("/theme/img/icon/refresh.png") no-repeat;padding:16px 16px; margin-top:3px; float:right; margin-right:10px;}
.refresh:hover{background:url("/theme/img/icon/refresh_action.png") no-repeat;}
</style>
<body>
	<div class="ui-layout-west">
		<div class="row-fluid" style="height: 100px;">
			<div class="row-fluid">
				<div style="float:left;width:64px;margin:20px 0 0 50px" ><img src="/images/app_icons/@crs.png"/ width="64"></div>
				<div class="fcolor_one f_16 f_bold" style="float:left; margin:47px 0 0 10px"><h3>权限管理</h3></div>
			</div>
		</div>
		
		<div class="title">
			<a href="javascript:window.location.reload()" title="刷新" class="refresh"></a>
			<img width="8" height="11" alt="展开/隐藏" src="/theme/img/trigon_white_down.png" border="0" />
			<span>权限管理</span>
			<a style="margin-left:20px;color:#FFFFFF" >组织管理&raquo;</a>
		</div>
		
		<div style="height:20px;padding:3px 0 0 5px;background:#E6E6E6">
			<img border=0 src="/theme/img/icon/organize.png" style="vertical-align:baseline"><a title=点击查看公司结构列表 href="/" target=sys_main>权限结构</a>
			<a style="float:right; margin-right:20px;" href="/cyzt_rolemanager/rightsgive.candor" target="mainFrame">批量赋权&raquo;</a>
			<a href="/cyzt_rolemanager/addrole.candor" target="mainFrame" style="float:right; margin-right:20px;">新增角色&raquo;</a>
		</div>
		
		<div style="overflow-x:auto; width:300px;height:400px; background:#FFFFFF">
			<div style="overflow-x:auto; width:298px;">
			<table class="table table-bordered table-striped" style="margin-buttom:10px; width:740px; margin-bottom:0; max-width:none">
			  <thead>
				  <tr>
					<th width="30">ID</th>
					<th width="100">角色名</th>
					<th width="50">模块名</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td><input type="checkbox">1</td>
					<td class="muted">初始登记</td>
					<td class="muted">房屋登记</td>
				  </tr>
				</tbody>
			  </table>
			  </div>
    	</div>
		<div style="height:14px;width:100%; background:url('/theme/img/bot_shadow.png') no-repeat"></div>
		
	</div>
</body>
</html>