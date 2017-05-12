<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: index.html.php,v 1.4 2012/02/16 09:54:23 lj Exp $
 */
use lib\form\Form as Form;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$this->config->module->name?></title>
	<?=Form::css()?>
</head>
<style>
.page-content {
    margin: 0px;
}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
	<!-- begin page header-->
	<div class="page-title-breadcrumb">
		<div class="page-header pull-left">
			<div class="page-title"><?=$this->config->module->name?></div>
		</div>
		<ol class="breadcrumb page-breadcrumb hidden-xs">
			<li><i class="fa fa-home"></i>&nbsp;<a href="/admin_entry/desktop">管理中心</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li><a href="/conf_basecode/index"><?=$this->config->module->name?></a>&nbsp;&nbsp;</li>
            <?=$navBar?>
		</ol>
	</div>
	<!-- end  page header-->
	
	<!-- begin box-content -->
	<div class="box-content">
		<!--begin content-->
		<div class="content">
			<div class="page-profile">
				<div class="row">
					<div class="col-md-12">
						<!-- begin panel -->
						<div class="panel">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<?=lib\form\Form::toolbar_list('add?code='.$code.'&page='.$page,$search);?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<table class="table table-hover-color">
											<thead>
											<tr>
												<th>ID</th>
												<th>名称</th>
												<th>编码</th>
												<th>状态</th>
												<th>排序</th>
												<th>下级节点</th>
												<th>操作</th>
											</tr>
											</thead>
											<tbody>
											<? foreach($list as $k=>$v){ ?>
												<tr>
													<td><?=$v['id']?></td>
													<td><?=$v['name']?></td>
													<td><?=$v['code']?></td>
													<td>
														<?
														if($v['active']=='1'){
															echo '<div class="label label-success">有效</div>';
														}else{
															echo '<div class="label label-default">无效</div>';
														}
														?>
													</td>
													<td><?=$v['order_list']?></td>
													<td><?
														if($v['cnt']){
															echo '<a href="/conf_basecode/index?code='.$v['code'].'">进入下级('.$v['cnt'].')</a>';
														}else{
															echo '无';
														}
														?></td>
													<td>
														<a class="btn btn-default btn-xs" href="edit.html?id=<?=$v['id']?>&page=<?=$page?>" style="font-weight:normal"><i class="fa fa-edit"></i>&nbsp;编辑</a>&nbsp;&nbsp;
														<?
														if(!$v['cnt']){
															echo '<a class="btn btn-default btn-xs" href="del.html?id='.$v['id'].'" style="font-weight:normal"><i class="fa fa-edit"></i>&nbsp;删除</a>';
														}
														?>
													</td>
												</tr>
											<? } ?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<ul class="pagination pull-right">
											<?=$splitPageStr?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- end panel -->
					</div>
				</div>

			</div>
		</div>
		<!--end content-->
	</div>
	<!-- end box-content -->
</div>
</div>
<?=Form::js();?>

<script>
jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
});
</script>
</body>
</html>
