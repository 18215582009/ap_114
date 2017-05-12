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
										<?=lib\form\Form::toolbar_list('edit.html','javascript;:','opform',$config->module->moduleName,array('delete'=>'删除','sort_asc'=>'正序','sort_desc'=>'反序','print'=>'打印','export'=>'导出'),array('name'=>''));?>
									</div>
									
									<div class="col-lg-12">
									<table class="table table-hover-color">
									<thead>
									<tr>
									<th><input name="checkbox" type="checkbox" onclick="CheckAll(this);" value="全选" ></th>
									<th>ID</th>
									<th>房源id</th>
                                    <th>发布人联系电话</th>
									<th>是否置顶</th>
									<th>是否首页推荐</th>
									<th>是否审核</th>
									<th>类型</th>
									<th>操作</th>
									</tr>
									</thead>
									<tbody>
									<? foreach($list as $k=>$v){ ?>
									<tr>
									<td><input type="checkbox" name="ids[]" data-index="<?=$v['id']?>" value="<?=$v['id']?>" /></td>
									<td><?=$v['id']?></td>
									<td><?=$v['esf_id']?></td>
									<td>123</td>
									<td>123</td>
									<td>123</td>
									<td>123</td>       
                                    <td>123123</td>
									<td>
                                    <div>
									<a class="btn btn-default btn-xs" href="edit.html?resold_rent=<?=$v['id']?>"><i class="fa fa-edit mrs"></i>编辑</a>
									    <a class="btn btn-default btn-xs" href="listPic?resold_rent=<?=$v['id']?>"><i class="fa fa-picture-o mrs"></i>图库</a>
                               
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
function CheckAll(obj){
	if($(obj).is(':checked')){
		$(":checkbox").attr("checked","checked");
	}else{
		$(":checkbox").removeAttr("checked"); 
	}
}
</script>
</body>
</html>
