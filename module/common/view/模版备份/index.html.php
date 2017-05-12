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
<meta http-equiv="Content-Type" content="text/html; charset=<?=$this->app->config->encoding?>" />
<title><?=$this->config->module->name?></title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_font-awesome.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_simple-line-icons.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_animate.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_all.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-switch.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/prettify.css';?>' type='text/css' media='screen' />
<link type="text/css" rel="stylesheet" href="" id="font-layout">
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/toastr.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_core.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system-responsive.css';?>' type='text/css' media='screen' />


<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' /><!--  -->
<style>
.the-price{padding:3px;}
.page-content > .box-content > .content {
    padding: 15px;
}
.page-profile{ background:#fff; padding-bottom:25px;}
.widget-user{ position:relative}
.widget-add{ position:absolute; bottom:-25px; right:30px; background:url(/images/add.png);padding:15px 20px 18px 25px; cursor:pointer}
.widget-add:hover{background:url(/images/add_act.png);}
.widget-other{float:left;margin-left:6px; margin-top:10px;};
</style>
<body>
<div class="page-wrapper">
<div class="page-content">
	<!-- begin page header-->
	<div class="page-title-breadcrumb">
		<!-- <div class="page-header pull-left col-lg-1">
			<div class="page-title"><?=Util::msubstr($this->config->module->name,0,4,"utf-8",'')?></div>
		</div> -->
		<form class="col-lg-7" method="get" id="opform">
			<ul class="list-group mail-action list-unstyled list-inline mts mbn">
				<li><input type="text" onclick="WdatePicker()" placeholder="请输入开始日期" value="" id="searchdatestart" class="form-control  pull-left" name="searchdatestart"></li>
				<li>
					<div class="input-group">
						<input type="text" placeholder="输入电话号码..." class="form-control">
						<div class="input-group-btn">
							<button class="btn btn-info">搜索</button>
						</div>
					</div>
				</li>
			</ul>
		</form>	
		
		<ol class="breadcrumb page-breadcrumb hidden-xs">
			<li><i class="fa fa-home"></i>&nbsp;<a href="index.html">个人中心</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li><a href="/<?=$this->config->module->moduleName?>/index.candor"><?=$this->config->module->name?></a>&nbsp;&nbsp;</li>
		</ol>
	</div>
	<!-- end  page header-->
	
	<!-- begin box-content -->
	<div class="box-content">
		<!--begin content-->
		<div class="content">
			<div class="page-profile">
				<div class="row">
					<div class="col-md-3 prn" style="z-index:2">
					    <div class="widget-user">
							<div class="header">
							  <div class="header-content pbs pts clearfix" style="background-color: <?=$this->config->module->background?>;height: 120px;">
								<div class="col-sm-3"><img style="border-width: 0px;box-shadow:none; " class="user-img" src="/images/app_icons/<?=$this->config->module->icon?>"></div>
								<div class="user-info col-sm-9">
								  <h3  style="margin-top: 35px;"><?=$this->config->module->name?></h3>
								</div>
								<div class="widget-other">
									<div class="btn btn-success btn-xs mlm" onclick="alertWin()"><i class="icon-login mrs"></i>导入</div>
									<div class="btn btn-info btn-xs mlm" onclick="alertWin()"><i class="icon-printer mrs"></i>打印</div>
								</div>
							  </div>
							</div>
							<div class="widget-add" onclick="window.location.href='/<?=$this->config->module->moduleName?>/add.candor'" style="padding-right: 25px;padding-bottom: 20px;">&nbsp;</div>
					    </div>
						
						<dl class="recent-post-list col-sm-6 col-md-12 mtl" style="padding-top: 22px;">
								<dt>
								<p class="title-line"><i class="fa fa-list-alt"></i>&nbsp;<?=$this->config->module->name?><span class="text-muted"></span>
								</p></dt>
								<dd class="mtm"><a class="post-title" href="/"><span><i class="fa fa-gavel"></i>&nbsp;普通配置</span></a>
								</dd>
								<dd class="mtm"><a class="post-title" href="/"><span><i class="fa fa-gear"></i>&nbsp;参数配置</span></a>
								</dd>
							</dl>
					</div>
					<div class="profile-right-side col-md-9" style="margin-left:-1px;z-index:1;">
						<div class="row">
							<div class="col-xs-12">
								<h3 style="color: #222"><?=$this->config->module->name?></h3>
							
								<!--p class="mlx plm">模块功能描述</p-->
								
							</div>
						</div>
						<div class="row">
							<div class="tabbable-line col-md-12">
								<div class="tab-content"  style="border-top-width: 0px;">
									<div class="tab-pane fade active in" id="tab-all">
										<div class="row">
										<div class="col-lg-12">
											<table class="table table-hover-color">
										<thead>
											<tr>
												<th><input id="checkall" name="checkall" type="checkbox"></input></th> 
												<th>流水号</th>
												<th>XXX</th>
												<th>XXX</th>
												<th>XXX</th>
												<th>XXX</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($data as $k => $v) {?>
										  	<tr style="cursor: pointer;">
												<td><?=$v["id"]?></td>
												<td title="<?=$v["name"]?>"><?=Util::msubstr($v["name"],0,8)?></td>
												<td><?=date("Y-m-d h:i:s",$v["create_date"])?></td>
												<td>test</td>
												<td>test</td>
												<td>test</td>
												<td>test</td>
												<td>
												<a href="/<?=$this->config->module->moduleName?>/edit.candor?id=1">编辑</a>&nbsp;&nbsp;
												<a href="javascript:void(0)" onclick="prompt('您确认删除该记录嘛？','question','url||/<?=$this->config->module->moduleName?>/remove.candor?id=1')">删除</a>
												</td>
										  	</tr>
										  	<?php }?>
										  	<tr style="cursor: pointer;">
												<td>1</td>
												<td>test</td>
												<td>test</td>
												<td>test</td>
												<td>test</td>
												<td>test</td>
												<td>test</td>
												<td>
												<a href="/<?=$this->config->module->moduleName?>/edit.candor?id=1">编辑</a>&nbsp;&nbsp;
												<a href="javascript:void(0)" onclick="prompt('您确认删除该记录嘛？','question','url||/<?=$this->config->module->moduleName?>/remove.candor?id=1')">删除</a>
												</td>
										  	</tr>
										</tbody>
										</table>
										 <div class="row">
											<ul class="pagination pull-right">
												<?=$pager?>
											</ul>
										  </div>
										</div>
										</div>
									</div><!-- tab-about end -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row end -->
			</div>
		</div>
		<!--end content-->
	</div>
	<!-- end box-content -->
	
</div>

	<div id="footer" style="padding-left:0">
		<div class="copyright"> Create by: CandorSoft
			<div class="pull-left">&copy;2015 - MES System</div>
		</div>
	</div>
</div>

<script src="/js/jquery-1.10.2.min.js" ></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/candor.blockui.js"></script>
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/bootstrap.min.js" ></script>
<script src="/js/bootstrap-hover-dropdown.js"></script>
<script src="/js/mtek_html5shiv.js"></script>
<script src="/js/respond.min.js"></script>
<script src="/js/jquery.metisMenu.js"></script>
<script src="/js/mtek_icheck.min.js"></script>
<script src="/js/mtek_custom.min.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/bootstrap-switch.min.js"></script>
<script src="/js/prettify.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="/js/jquery.pulsate.js"></script>

<!--LOADING SCRIPTS FOR PAGE-->


<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/jquery-responsive.js"></script>
<script src="/js/candor.portal.js"></script>
<script src="/js/candor.common.js"></script>

<script src="/js/plugins/datepicker/WdatePicker.js" ></script>
</body>
</html>
<script>jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
});

//alertWin
function alertWin() {
    art.dialog.open('/<?=$this->config->module->moduleName?>/alertWin.candor', {
        title: '<?=$this->config->module->name?>',
        width: '80%',
        height: '80%',
        lock: 'true',
        esc: 'false',
        id: 'editiframe',
        window: top,
        close: function () {
        	//重新刷新本页面;
    		window.location.reload();
            return true;   
        }		
    },false);
}

</script> 
