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
<title><?=$header?></title>
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
    <?=lib\form\Form::bread_crumb(
		$header,
		$this->config->module->moduleName,
		$navlist=array(
			array('name'=>$this->config->module->name,'method'=>'index')
		));
	?>
	<!-- end  page header-->
	
	<!-- begin box-content -->
	<div class="box-content">
		<!--begin content-->
		<div class="content">
			<div class="page-profile">
				<div class="row">
					<div class="col-lg-12">
						<!-- begin panel -->
						<div class="panel">
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<?=lib\form\Form::toolbar_list('',array('name'=>''));?>
									</div>
									
									<div class="col-lg-12">
									<table class="table table-hover-color">
									<thead>
									<tr>
									<th>ID</th>
									<th>名称</th>
									<th>电话</th>
                                    <th>物业类型</th>
									<th>项目类型</th>
									<th>项目状态</th>
									<th>操作</th>
									</tr>
									</thead>
									<tbody>
									<? foreach($list as $k=>$v){ ?>
									<tr>
									<td><?=$v['id']?></td>
									<td><?=$v['name']?></td>
									<td><?=$v['telephone']?></td>
                                    <td>
									<?
									if(!empty($v['pm_type'])){
										$_pm_type = explode(',',$v['pm_type']);
										$cnt = count($_pm_type);
										foreach($_pm_type as $k=>$_v){
											if(!empty($_v))echo $this->config->pm_type_option[$_v];
											if($cnt>($k+1))echo ', ';
										}
									}
									?></td>
									<td>
                                    <?
                                    if(!empty($v['type'])){
										$_type = explode(',',$v['type']);
										$cnt = count($_type);
										foreach($_type as $k=>$_v){
											if(!empty($_v))echo $this->config->type_option[$_v];
											if($cnt>($k+1))echo ', ';
										}
									}
									?>
                                    </td>
                                    <td><?=Form::lable($this->config->status_option[isset($v['status'])?$v['status']:0],isset($v['status'])?$v['status']:0);?></td>
									<td>
                                    <div>
									<a class="btn btn-default btn-xs" href="edit.html?project_id=<?=$v['id']?>"><i class="fa fa-edit mrs"></i>编辑</a>
									<a class="btn btn-default btn-xs" href="listDynamic?project_id=<?=$v['id']?>"><i class="fa fa-bullhorn mrs"></i>动态</a>
                                    <a class="btn btn-default btn-xs" href="listPrice?project_id=<?=$v['id']?>"><i class="fa fa-cny mrs"></i>价格</a>
                                    </div>
                                    <div class="mts">
                                    <a class="btn btn-default btn-xs" href="listHuxing?project_id=<?=$v['id']?>"><i class="fa fa-home mrs"></i>户型</a>
                                    <a class="btn btn-default btn-xs" href="listPic?project_id=<?=$v['id']?>"><i class="fa fa-picture-o mrs"></i>图库</a>
                                    <a class="btn btn-default btn-xs" href=""><i class="fa fa-th mrs"></i>楼盘表</a>
                                    </div>
									
									<!--a class="btn btn-default btn-xs" href="del.html?project_id=<?=$v['id']?>" style="font-weight:normal"><i class="fa fa-times"></i>&nbsp;删除</a-->
									</td>
									</tr>
									<? } ?>
									</tbody>
									</table>
									</div>
								</div>
								<div class="row">
                                    <ul class="pagination pull-right">
                                        <?=$splitPageStr?>
                                    </ul>
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
});
</script>
</body>
</html>
