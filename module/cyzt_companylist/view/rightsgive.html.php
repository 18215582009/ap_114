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
<title>公司管理</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/plugins/candor-dropdown.js" ></script>
<script src="/js/plugins/datepicker/WdatePicker.js" ></script><!--时间控件JS-->
<script>
$(document).ready(function(){
	//parent.operateBar('show','save,cancel');
	//给save按钮添加制定方法
	//parent.operateFactory('save','mainFrame#opform');
	//parent.operateFactory('cancel','mainFrame#opform');
});	
</script>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">  
			<form class="form-horizontal" id="opform" name="opform" action="/cyzt_rolemanager/rightsgive.candor?act=add" method="POST">
				<div class="row-fluid">
					<fieldset>
					<legend>已选中角色</legend>
						<p>名称：初始登记&nbsp;&nbsp;组织管理&nbsp;&nbsp;</p>
					</fieldset>	
				</div>
				<div class="row-fluid">
					<div class="span6">
					<fieldset>
					<legend>用户列表</legend>
						<div class="wrap-sl">
							<div class="wrap-sl-header">
								组织机构：<input type="text" id="input01" class="input-medium">
								用户名：<input type="text" class="input-medium" id="username" name="username" value="">
								<button type="submit" class="btn btn-primary">搜索</button>
							</div>
							<div class="wrap-sl-content">
								<ul class="unstyled arrange">
									<li><input type="checkbox" /><a href="javascript:void(0)">新闻发布</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">内容审核</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">新闻发布</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">内容审核</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">新闻发布</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">内容审核</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">新闻发布</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">内容审核</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">新闻发布</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">内容审核</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">新闻发布</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">内容审核</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">新闻发布</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">内容审核</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">新闻发布</a></li>
									<li><input type="checkbox" /><a href="javascript:void(0)">内容审核</a></li>
								</ul>
							</div>
						</div>
					</fieldset>
					</div>
					<div class="span6">
						<fieldset>
						<legend>已选中用户</legend>
							<div class="wrap-sl light-purple">
								<div class="wrap-sl-header gray-blue">
									<p><span class="label label-info">说明</span>具有权限的用户信息</p>
								</div>
								<div class="wrap-sl-content">
									
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</form>
		</div>
	</div><!-- row-fluid end -->
</div>	
</body>
</html>
