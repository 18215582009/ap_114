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
										<?=lib\form\Form::toolbar_list('add.html?house_type='.$house_type,array('name'=>''));?>
									</div>
									<form name="form1" id="opform1" method="POST" action="operate">
                                    <input type="hidden" name="action" id="action" value="" />

									<div class="col-lg-12">
									<table class="table table-hover-color">
									<thead>
									<tr>
									<th><input name="checkbox" type="checkbox" onclick="CheckAll(this);" value="全选" ></th>
									<th>id编号</th>
									<th>房源基本信息</th>
									<th>发布时间</th>
                                    <th>联系电话</th>
                                    <th>物业类型</th>
									<th>是否审核</th>
									<th>访问次数</th>
									<th>操作</th>
									</tr>
									</thead>
									<tbody>
									<? foreach($list as $k=>$v){ ?>
									<tr>
									<td><input type="checkbox" name="ids[]" data-index="<?=$v['id']?>" value="<?=$v['id']?>" /></td>
									<td><?=$v['id']?></td>
									<td>
										 <p><a href="#" target="_blank"><?=$v['title']?></a></p>

                                        <p>设施：<?=$v['shi']?>室<?=$v['ting']?>厅<?=$v['wei']?>卫 面积：<?=$v['total_area']?>m² <span class="text-danger"><? if($house_type==2) {?> 售价：<?} else {?>租金： <?}?> <?=$v['price']?></span><? if($house_type==2) {?>万元<?} else {?>元 <?}?></p>
										
									</td>
									<td>

										<?=$v['create_date']?>

									</td>
									<td>

										<? if(!empty($v['telphone'])){

											echo $v['telphone'];

										}else{

											echo "暂无电话号码";

										}

										?>
									</td>
									

                                    <td style="width: 100px">
                                    	<?
									if(!empty($v['pm_type'])){
										$_pm_type = explode(',',$v['pm_type']);
										$cnt = count($_pm_type);
										foreach($_pm_type as $k=>$_v){
											if(!empty($_v))echo "<span style='display: inline-block'>".$this->config->pm_type_option[$_v]."</span>";
											if($cnt>($k+1))echo ', ';
										}
									}else{
										echo "暂无物业类型";
									}
									?>

                                    </td>

                                    <td>
										<?=Form::lable($this->config->flag_option[isset($v['flag'])?$v['flag']:0],isset($v['flag'])?$v['flag']:0);?>

									</td>

									<td>

									<? if (!empty($v['hits']) ) {

										echo $v['hits'];

									} else {

										echo "0";
									}?>

								     	
									</td>
									<td>
                                    <div>
                                    	<a class="btn btn-default btn-xs" target=""   href="/sale/detail?id=<?=$v['id']?>"><i class="fa fa-edit mrs"></i>查看</a>


									<a class="btn btn-default btn-xs" href="edit.html?resold_sale=<?=$v['id']?>&house_type=<?=$house_type?>"><i class="fa fa-edit mrs"></i>编辑</a>
									<a class="btn btn-default btn-xs" href="listPic?resold_sale=<?=$v['id']?>&house_type=<?=$house_type?>"><i class="fa fa-picture-o mrs"></i>图库</a>
									
									<!--
									<a class="btn btn-default btn-xs" href="del?id=<?=$v['id']?>" style="font-weight:normal"><i class="fa fa-times"></i>&nbsp;删除</a>

								-->

                                    </div>
             
				
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

function operate(type){
	//判断是否选取行
	if($(":checkbox:checked").length>0){
		$("#action").val(type);
		$("#opform1").submit();
	}else{
		alert('您没有选取需要操作的记录');
		
	}
	
}
</script>


</body>
</html>
