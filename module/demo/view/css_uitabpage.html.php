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
<title>Css+Html前端框架</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/common.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/plugins/candor-tab.js"></script>
<script src="/js/plugins/candor-dropdown.js"></script>
<style>
body{ background:#f1f1f1}

</style>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="subnav subnav-fixed navbar-fixed-top">
			<form class="form-inline span6">
				业务宗号:<input type="text" class="input-small" id="input01">
				流水号:<input type="text" class="input-small search-query">
				<button class="btn" type="submit"><i class="icon-search"></i>搜索</button>
			</form>
			
			    <ul class="nav nav-pills">
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">按钮 <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#buttonGroups">按钮组</a></li>
          <li><a href="#buttonDropdowns">下拉按钮</a></li>
        </ul>
      </li>
      <li class="dropdown active">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">导航 <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#navs">导航，标签页，胶囊链接</a></li>
          <li class="active"><a href="#navbar">导航条</a></li>
          <li><a href="#breadcrumbs">面包屑导航栏</a></li>
          <li><a href="#pagination">分页</a></li>
        </ul>
      </li>
      <li><a href="#labels">标签</a></li>
      <li><a href="#badges">标记</a></li>
      <li><a href="#typography">排版</a></li>
      <li><a href="#thumbnails">缩略图</a></li>
      <li><a href="#alerts">警告</a></li>
      <li><a href="#progress">进度条</a></li>
      <li><a href="#misc">杂项</a></li>
    </ul>
		</div>
	</div>
	
	<div class="row-fluid" style="margin-top:40px;">
		<div class="span2">
			<div class="row">
				<div style="float:left;width:64px;margin:10px 0 0 50px" ><img src="/images/app_icons/@crs.png"/ width="64"></div>
				<div class="fcolor_one f_16 f_bold" style="float:left; margin:47px 0 0 10px">登记受理</div>
			</div>
			<div class="row-fluid">
				<a class="btn">新增</a>
				<a class="btn">修改</a>
				<a class="btn">提交</a>
				<a class="btn">打印</a>
			</div>
			
			<div class="tabbable tabs-left mt10">
				<div class="row-fluid">
				<ul class="nav nav-tabs span12">
				<li class="active"><a href="#1" data-toggle="tab">tab 1</a></li>
				<li><a href="#2" data-toggle="tab">tab 2</a></li>
				</ul>
				</div><!-- row end -->
			</div>
				
		</div>
		<div class="span10">
			<div class="row-fluid">
				<div class="tab-content span12">
					<div class="tab-pane active" id="1" style="border:1px solid #ddd; height:900px; background:#fefefe">
						<p>这里是tab 1的内容区a域asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdf.</p>
					</div>
					<div class="tab-pane" id="2">
						<p>这里是tab 2的内容区域.</p>
					</div>
				</div><!-- tab-pane end -->
			</div><!-- row-fluid end -->
		</div>
		
	</div>
	
</div>	
</body>
</html>

