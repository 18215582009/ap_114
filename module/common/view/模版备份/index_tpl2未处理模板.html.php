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
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$header?></title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_font-awesome.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_simple-line-icons';?>' type='text/css' media='screen' />
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
<style>
body{
    background:#ebf0f3 ;}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
	<!-- begin page header-->
	<div class="page-title-breadcrumb">
		<div class="page-header pull-left">
			<div class="page-title"><?=$header?></div>
		</div>
		<ol class="breadcrumb page-breadcrumb hidden-xs">
			<li><i class="fa fa-home"></i>&nbsp;<a href="index.html">个人中心</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li><a href="/index/demo"><?=$header?></a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="active">新增计划管理</li>
		</ol>
	</div>
	<!-- end  page header-->
	
	<!-- begin box-content -->
	<div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <div class="page-mail">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="sidebar sidebar-left nav nav-pills">
                                        <div class="sidebar-row">
                                            <ul class="sidebar-list-info list-unstyled">
                                                <!--li class="mbm" style="border-bottom: 1px solid rgba(153, 153, 153, 0.32)">
                                                    <div class="sidebar-title">
													<a class="btn btn-info" data-toggle="tab" role="tab" href="#tab-compose"><i class="fa fa-play"></i>&nbsp;开始作业</a>
													</div>
                                                </li-->
                                                <li class="active"><a class="btn-group dropup btn-block" data-toggle="tab" role="tab" href="#tab-inbox">产品 (5)</a></li>
                                                <li class=""><a class="btn-group dropup btn-block" data-toggle="tab" role="tab" href="#tab-sent">检测报告 (2)</a></li>
												<li style="border-top: 1px solid rgba(153, 153, 153, 0.32)"><h4 class="mtl mbm" style="padding-left: 15px;">产品配套</h4></li>
												<li class=""><a class="btn-group dropup btn-block" data-toggle="tab" role="tab" href="#tab-inbox"><span class="mrs badge badge-success" style="display: inline"></span>齐套件</a>
												<li class=""><a class="btn-group dropup btn-block" data-toggle="tab" role="tab" href="#tab-sent"><span class="mrs badge badge-warning" style="display: inline"></span>参数配置</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="mail-main tab-content">
                                        <div class="tab-pane fade pdm" id="tab-compose">
                                            <ul class="list-group mail-action list-unstyled list-inline mbm">
												<li><h3 class="mbs mlx plm mtm" style="color: #222">作业管理</h3></li>
                                                <li class="pull-right">
												<a class="btn btn-default" data-original-title="Save Draft" data-hover="tooltip" href="#"> <i class="fa fa-floppy-o"></i></a>
												<a class="btn btn-default" data-original-title="Move to" data-hover="tooltip" href="#"> <i class="fa fa-folder"></i></a>
												<a class="btn btn-default" data-original-title="Trash" data-hover="tooltip" href="#"> <i class="fa fa-trash-o"></i></a></li>
                                            </ul>
											
                                            <form class="form-horizontal mtm" action="#" role="form">
                                                
                                                <div class="col-md-4">
													<div class="form-group"><label class="control-label" for="title">名称</label>
													<input type="text" class="form-control input-medium" placeholder="请输入计划名称" id="title">
													</div>
													<div class="form-group"><label class="control-label" for="title">产品名称</label>
													<input type="text" class="form-control input-medium" placeholder="请输入产品名称" id="title"></div>
													<div class="form-group"><label class="control-label" for="title">工艺线路</label>
													<input type="text" class="form-control input-medium" placeholder="工艺线路" id="title"></div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label" for="showEasing">开始时间</label>
														<input type="text" class="form-control input-medium" value="" placeholder="开始时间" id="showEasing">
													</div>
													<div class="form-group">
														<label class="control-label" for="hideEasing">产品数量</label>
														<input type="text" class="form-control input-medium" value="" placeholder="产品数量" id="hideEasing">
													</div>
													<div class="form-group">
														<label class="control-label" for="showMethod">计划负责人</label>
														<input type="text" class="form-control input-medium" value="slideDown" placeholder="计划负责人" id="showMethod">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label" for="showEasing">结束时间</label>
														<input type="text" class="form-control input-medium" value="" placeholder="结束时间" id="showEasing">
													</div>
													<div class="form-group">
														<label class="control-label" for="hideEasing">物料清单</label>
														<input type="text" class="form-control input-medium" value="" placeholder="物料清单" id="hideEasing">
													</div>
													<div class="form-group">
														<label class="control-label">计划状态</label>
														<div class="radio">
															<label>
															<input id="optionsRadios4" name="optionsRadiosInline" value="option1" checked="checked" class="form-control-shadow" type="radio">&nbsp; 草稿
															</label>
															<label>
															<input id="optionsRadios5" name="optionsRadiosInline" value="option2" type="radio">&nbsp; 执行
															</label>
														</div>
													</div>
												</div>
												<div class="col-md-11">
													<div class="form-group"><label class="control-label" for="message">说明</label><textarea class="form-control" placeholder="请填写说明信息 ..." rows="3" id="message"></textarea></div>
												</div>
									
                                                
                                                <div class="form-group">
                                                    <div class="col-lg-7 col-lg-offset-10">
                                                        <button class="btn btn-success" type="submit">保存</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade active in" id="tab-inbox">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    
                                                </div>
                                                <div class="col-lg-12">
                                                    <ul class="list-group mail-action list-unstyled list-inline">
                                                        <li><a class="btn btn-default" style="padding: 6px 15px;">
														<div class="icheckbox_square-blue" style="position: relative;">
														<input type="checkbox" class="checkall-email" /></div></a></li>
                                                        
                                                        <li class="dropdown">
															<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-folder"></i>&nbsp; 更多... &nbsp;<span class="caret"></span></a>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">...</a></li>
                                                                <li><a href="#">...</a></li>
                                                                <li><a href="#">...</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="pull-right">
															<div class="input-group"><input type="text" class="form-control" placeholder="输入名称...">
																<div class="input-group-btn">
																	<button class="btn btn-info">搜索</button>
																</div>
															</div>
														</li>
                                                    </ul>
                                                    <table class="table table-hover-color">
														<thead>
														<tr>
															<th>ID</th>
															<th>名称</th>
															<th>类型</th>
															<th>开始时间</th>
															<th>结束时间</th>
															<th>条码</th>
															<th>产品数量</th>
															<th>负责人</th>
															<th>状态</th>
														</tr>
														</thead>
														<tbody>
															<tr style="cursor: pointer;">
																<td><input type="checkbox" /> 4032</td>
																<td>C#高级编程</td>
																<td>A</td>
																<td>1970-01-20 </td>
																<td>1970-01-01 </td>
																<td>A303098293</td>
																<td>90</td>
																<td></td>
																<td>
																<i class="fa fa-play text-success"></i><span> 完成</span>
																</td>
															  </tr>
															  <tr style="cursor: pointer;">
																<td><input type="checkbox" /> 4033</td>
																<td>C#高级编程</td>
																<td>B</td>
																<td>1970-01-20 </td>
																<td>1970-01-01 </td>
																<td>B949823832</td>
																<td>90</td>
																<td></td>
																<td>
																<i class="fa fa-pause text-warning"></i><span> 检测中</span>
																</td>
															  </tr>
															  <tr style="cursor: pointer;">
																<td><input type="checkbox" /> 4032</td>
																<td>C#高级编程</td>
																<td>C</td>
																<td>1970-01-20 </td>
																<td>1970-01-01 </td>
																<td>C934838833</td>
																<td>90</td>
																<td></td>
																<td>
																<i class="fa fa-stop text-danger"></i><span> 停止</span>
																</td>
															  </tr>
														</tbody>
													</table>
													<ul class="pagination pull-right mts">
														<li class="disabled"><a href="javascript:;">上一页</a></li> <li class="active"><a href="javascript:;">1</a></li><li><a href="?page=2">2</a></li> <li><a href="?page=2">下一页</a></li>
													</ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-sent">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="input-group mtm mbm"><input type="text" class="form-control" placeholder="输入计划名称...">

                                                        <div class="input-group-btn">
                                                            <button class="btn btn-info">Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <ul class="list-group mail-action list-unstyled list-inline">
                                                        <li><a class="btn btn-default" style="padding: 6px 15px;"><div class="icheckbox_square-blue" style="position: relative;"><input type="checkbox" class="checkall-email"></div></a></li>
                                                        
                                                        <li class="dropdown"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-folder"></i>&nbsp; 更多... &nbsp;<span class="caret"></span></a>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">执行</a></li>
                                                                <li><a href="#">草稿</a></li>
                                                                <li><a href="#">完成</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="pull-right"><a class="btn btn-sm btn-default"><i class="fa fa-angle-left"></i></a><a class="btn btn-sm btn-default"><i class="fa fa-angle-right"></i></a></li>
                                                    </ul>
                                                    <div class="list-group mail-box">
														<a class="list-group-item" href="#">
                                                        <div class="row">
                                                            <div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">名称</strong>
															</div>
															
															<div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">类型</strong>
															</div>
															
															<div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">产品</strong>
															</div>
															
															<div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">负责人</strong>
															</div>
															
                                                        </div>
                                                    </a>
														<a class="list-group-item" href="#">
                                                        <div class="row">
                                                            <div class="col-md-3 col-lg-3">
																<div class="icheckbox_square-blue" style="position: relative;">
																<input type="checkbox">
																</div>
																<!--span class="fa fa-star mrm mlm text-warning"></span-->
																<strong class="mail-from">导弹头生产计划</strong>
															</div>
                                                            <div class="col-md-3 col-lg-3">
																<span class="text-muted" style="font-size: 11px;">月计划</span>
                                                            </div>
															<div class="col-md-3 col-lg-3">
																<span class="text-muted" style="font-size: 11px;">导弹头</span>
                                                            </div>
															<div class="col-md-3 col-lg-3">
																<span class="text-muted" style="font-size: 11px;">张三</span>
                                                            </div>
                                                        </div>
                                                    </a>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-drafts">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="input-group mtm mbm"><input type="text" class="form-control" placeholder="Enter text...">

                                                        <div class="input-group-btn">
                                                            <button class="btn btn-info">Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <ul class="list-group mail-action list-unstyled list-inline">
                                                        <li><a class="btn btn-default" style="padding: 6px 15px;"><div class="icheckbox_square-blue" style="position: relative;"><input type="checkbox" class="checkall-email"></div></a></li>
                                                        
                                                        <li class="dropdown"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-folder"></i>&nbsp; 更多... &nbsp;<span class="caret"></span></a>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">执行</a></li>
                                                                <li><a href="#">草稿</a></li>
                                                                <li><a href="#">完成</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="pull-right"><a class="btn btn-sm btn-default"><i class="fa fa-angle-left"></i></a><a class="btn btn-sm btn-default"><i class="fa fa-angle-right"></i></a></li>
                                                    </ul>
                                                    <div class="list-group mail-box">
														<a class="list-group-item" href="#">
                                                        <div class="row">
                                                            <div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">名称</strong>
															</div>
															
															<div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">类型</strong>
															</div>
															
															<div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">产品</strong>
															</div>
															
															<div class="col-md-3 col-lg-3">
																<strong class="mail-from mrm mlm ">负责人</strong>
															</div>
															
                                                        </div>
                                                    </a>
														<a class="list-group-item" href="#">
                                                        <div class="row">
                                                            <div class="col-md-3 col-lg-3">
																<div class="icheckbox_square-blue" style="position: relative;">
																<input type="checkbox">
																</div>
																<!--span class="fa fa-star mrm mlm text-warning"></span-->
																<strong class="mail-from">导弹头生产计划</strong>
															</div>
                                                            <div class="col-md-3 col-lg-3">
																<span class="text-muted" style="font-size: 11px;">月计划</span>
                                                            </div>
															<div class="col-md-3 col-lg-3">
																<span class="text-muted" style="font-size: 11px;">导弹头</span>
                                                            </div>
															<div class="col-md-3 col-lg-3">
																<span class="text-muted" style="font-size: 11px;">张三</span>
                                                            </div>
                                                        </div>
                                                    </a>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END CONTENT--></div>
	<!-- end box-content -->
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
<script src="/js/candor.portal.js" ></script>
<script src="/js/candor.common.js"></script>
</body>
</html>
<script>
jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
});
</script>
