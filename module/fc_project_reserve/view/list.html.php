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
<style type="text/css">
.row ul li{
list-style:none;
float:left;
height:30px;
line-height:30px;
margin-left:10px;

}
.row ul li select{
height:30px;
line-height:30px;
border:1px solid #dddddd;

}
.row ul li input{
height:30px;
line-height:30px;
border-radius:3px;
border:1px solid #dddddd;


}

</style>
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
										 <div class="panel">
			                             
			                            	<form action="index" method="post">
			                                  <div class="row">
			                                     <ul>
			                                     	<li>
			                                     		类型：<select id="reserve_type" name="reserve_type">
			                                     			<option value="0">无限制</option>
			                                     			<option value="1">预约看房</option>
			                                     			<option value="2">组团看房</option>
			                                     			<option value="3">订阅</option>
			                                     			<option value="4">专家咨询</option>
			                                     		</select>
			                                     	</li>
			                                     	<li class="reserve_subtype" style="display:none;">
			                                     		订阅子类：
			                                     		<select id="reserve_subtype" name="reserve_subtype">
			                                     			<option value="0">无限制</option>
			                                     			<option value="1">变价通知</option>
			                                     			<option value="2">优惠通知</option>
			                                     			<option value="3">开盘通知</option>
			                                     			<option value="4">最新动态</option>
			                                     			<option value="5">看房团通知</option>
			                                     		</select>
			                                     	</li>
			                                     	<li>
			                                     		开始时间：
			                                     		<input type="text" id="start_time" name="start_time"/>
			                                     		
			                                     	</li>
			                                     	<li>
			                                     		结束时间：
			                                     		<input type="text" id="end_time" name="end_time"/>
			                                     	</li>
			                                     	  <li>
											       		<div class="input-group">
											        				<input type="text" name="tel_name" class="form-control pull-left" id="tel_name" value="" placeholder="电话/名字"  style="height:30px;"/>
											         				<div class="input-group-btn">';
											     					<button  type="submit" class="btn btn-info" style="height:30px;">搜索</button>
											   						</div>
											   			</div>
										        	</li>
			                                     
			                                     </ul>
				                     
										      	 
										     
											</div>
						
									</form>
									</div>
									
									<div class="col-lg-12">
									<table class="table table-hover-color">
									<thead>
									<tr>
									<th>ID</th>
									<th>客户姓名</th>
									<th>客户电话</th>
                                    <th>楼盘名称</th>
									<th>类型</th>
									<th>项目状态</th>
									<th>操作</th>
									</tr>
									</thead>
									<tbody>
									<? foreach($list as $k=>$v){ ?>
									<tr>
									<td><?=$v['id']?></td>
									<td><?=$v['name']?></td>
									<td><?=$v['tel']?></td>
                                    <td>
									<?=$v['project_name']?>
									</td>
									<td>
                                 
                                  		<?=Form::lable($this->config->reserve_type[isset($v['type'])?$v['type']:0],isset($v['type'])?$v['type']:0);?>
                                  		子类：<?=Form::lable($this->config->reserve_subtype[isset($v['subtype'])?$v['subtype']:0],isset($v['subtype'])?$v['subtype']:0);?>
                                  		 
                                    </td>

                                    <td><?=Form::lable($this->config->flag_option[isset($v['flag'])?$v['flag']:0],isset($v['flag'])?$v['flag']:0);?></td>

									<td>
                                    <div>
									<a class="btn btn-default btn-xs" href="edit.html?project_id=<?=$v['id']?>"><i class="fa fa-edit mrs"></i>编辑</a>

									<button class="btn btn-default btn-xs"  id="del" value="<?=$v['id']?>"><i class="fa fa-edit mrs"></i>删除</button>



									<!--<a class="btn btn-default btn-xs" href="listDynamic?project_id=<?=$v['id']?>"><i class="fa fa-bullhorn mrs"></i>动态</a>
                                    <a class="btn btn-default btn-xs" href="listPrice?project_id=<?=$v['id']?>"><i class="fa fa-cny mrs"></i>价格</a>-->

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
    $( "#start_time" ).datepicker();
    $( "#end_time" ).datepicker();
 	$("#reserve_type").change(function(){
 		if($(this).val() ==  3 ){
 			$(".reserve_subtype").css("display","block");
 		}else{
 				$(".reserve_subtype").css("display","none");
 		}
 	})

});






</script>
</body>
</html>
