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
<title><? echo $header['title'] ?></title>
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
</head>
<style>
table .icon-blue{vertical-align:middle}
</style>
<script>
function delModule(mid){
	if(confirm("确定要删除该模块吗？"))
	{
			parent.window.frames['mainFrame'].location='/admin/delModule.candor?mid='+mid;
	}
	else
	{
			
	}
}
</script>
<body>
<div style="position:absolute;right:1px;top:1px;">
	<a href="javascript:window.location.reload()" title="刷新" class="refresh"></a>
	<a href="javascript:history.back()" title="返回" class="return"></a>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<fieldset>
			<legend>模块信息</legend>	
			<form class="form-inline" id="opform" name="opform" action="/admin/categoryList.candor" method="GET">
				<input type="hidden" name="type" value="child" />
				所属项目：<select name="projectcode" id="projectcode" class="span2">
					<option value="0">全部</option>
			  <?php 
				foreach($project as $pkey=>$pitem){
					if($pitem['project_code']==$projectcode){
						echo '<option value="'.$pitem['project_code'].'" selected="selected">'.$pitem['project_name'].'</option>';	
					}else{
						echo '<option value="'.$pitem['project_code'].'">'.$pitem['project_name'].'</option>';
					}
				}
			  ?>
			</select>&nbsp;
			模块名：<input type="text" class="span2" id="business_name" name="business_name" value="<?=$business_name?>">
			<button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i>搜索</button>
			</form>
		</fieldset>
		<table style="margin-top:10px;margin-bottom:10px;" class="table table-bordered table-striped">
			<thead>
			  <tr>
					<th>序号</th>
					<th>名称</th>
					<th>类型</th>
					<th>所属项目</th>
					<th>开发者</th>
					<th>状态</th>
					<th>操作</th>
			  </tr>
			</thead>
			<tbody>
				<?php foreach($cList as $key=>$item){?>
				<tr>
					<td class="span1"><?=$key+1?></td>
					<td>
						<?php if($item['module_type']=='1'){ 
								echo '<a href="/admin/categoryList.candor?type=child&projectcode='.$item['project_code'].'&parentmodule='.$item['id'].'" title="查看子模块"><b>'.$item['business_name'].'</b> <font color=green>查看子模块('.$item['cnt'].')</font></a>';
							}else{
								echo $item['business_name'];
							}
						?>
					</td>
					<td>
					<?php
						if($item['module_type']=='1'){
							echo '分类';
						}else if($item['module_type']=='0'){
							echo '模块';
						}else{
							echo '菜单链接';
						}
					?>
					</td>
					<td><?=$item['project_name']?></td>
					<td><?=$item['developer']?></td>
					<td>
					<?php 
						if($item['flag']=='0'){
							echo '<font color=red>无效</font>';
						}elseif($item['flag']=='1'){
							echo '<font color=green>开发</font>';
						}elseif($item['flag']=='2'){
							echo '<font color=green>测试</font>';
						}
					?>
					</td>
					<td>
						<?php if($item['module_type']=='1'){
							echo '<a href="/admin/editCategory.candor?mid='.$item['id'].'&parent_module='.$item['parent_module'].'" title="编辑模块"><i class=" icon-bar-edit icon-blue"></i></a>&nbsp;&nbsp;';
						}else{
							echo '<a href="/admin/editModule.candor?mid='.$item['id'].'&parent_module='.$item['parent_module'].'" title="编辑模块"><i class=" icon-bar-edit icon-blue"></i></a>&nbsp;&nbsp;';
						}
						?>
						
						<?php if($item['module_type']=='0'){ ?>
						<a href="/admin/moduleFun.candor?mid=<?=$item['id']?>" title=""><i class="icon-bar-role icon-blue"></i></a>&nbsp;&nbsp;
						<?php } ?>
						
						<?php if($item['flag']=='0' && $item['cnt']<1){ ?>
						<a href="javascript:void(0);" onclick="delModule(<?=$item['id']?>)" title="删除模块"><i class="icon-bar-del icon-blue"></i></a>&nbsp;&nbsp;
						<?php } ?>
						
						<?php if($item['module_type']=='1'){ ?>
						<a href="/admin/addModule.candor?type=child&projectcode=<?=$item['project_code']?>&parent_module=<?=$item['id']?>" title="添加模块"><i class=" icon-bar-add icon-blue"></i></a>&nbsp;&nbsp;
						<?php } ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<div class="pagingbox">
			<div class="paging">
				<ul class="pagtools">
				<?php if($parent_module=='0'){ ?>
					<li><a href="/admin/addCategory.candor?projectcode=<?=$projectcode?>&parent_module=<?=$parent_module?>" title="新增分类"><i class="icon-bar-add icon-blue"></i>新增分类</a></li>
				<?php } ?>
					<li><a href="/admin/addModule.candor?projectcode=<?=$projectcode?>&parent_module=<?=$parent_module?>" title="新增模块"><i class="icon-bar-add icon-blue"></i>新增模块</a></li>
				</ul>
				<?=$page_html?>
			</div>
		</div>
	
	</div>
</div>
</body>
</html>
