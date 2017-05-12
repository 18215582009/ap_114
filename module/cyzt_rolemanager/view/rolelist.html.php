<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: rolelist.html.php,v 1.4 2014/06/05 09:57:01 lj Exp $
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>权限管理</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/candor.common.js"></script>
<script type="text/javascript">
function selectedcolor(obj){
	$(obj).parents("table").find("a").each(
		function(){
			$(this).attr("style","color:#4A7911");
		}
	);
	$(obj).parents("tr").find("a").attr("style","color:red");
}


</script>
<style>
body{background:#CCE0F1;}
a{cursor: pointer}
.title{height:36px;line-height:36px;width:100%;/*background:#E7F5FF;border-top:#FFFFFF solid 1px;border-bottom:#FFFFFF solid 1px;*/background:#5CC7FF;}
.title img{padding:0 5px 0 10px;}
.title span{font-size:14px;font-weight:bold}
.refresh{background:url("/theme/default/images/icon/refresh.png") no-repeat;padding:16px 16px; margin-top:3px; float:right; margin-right:10px;}
.refresh:hover{background:url("/theme/default/images/icon/refresh_action.png") no-repeat;}
.add{background:url("/theme/default/images/icon/add.png") no-repeat;padding:16px 16px; margin-top:3px; float:right; margin-right:2px;}
.add:hover{background:url("/theme/default/images/icon/add_hover.png") no-repeat;}
</style>
<body>
	<div class="ui-layout-west">
		<div class="row-fluid" style="height: 105px;">
			<div style="float:left;width:64px;margin:20px 0 0 50px" ><img src="/images/app_icons/<?php echo $this->app->config->module->icon; ?>" width="64"></div>
			<div class="fcolor_one f_16 f_bold" style="float:left; margin:47px 0 0 10px"><h3><?php echo $this->app->config->module->name; ?></h3></div>
		</div>
		
		<div class="title">
			<a href="javascript:window.location.reload()" title="刷新" class="refresh"></a>
			<a href="/cyzt_rolemanager/addRole.candor" title="新增角色" class="add" target="mainFrame"></a>
			<img width="8" height="11" src="/theme/default/images/trigon_white_down.png" border="0" />
			<span>角色管理</span>
			<a style="margin-left:20px;color:#FFFFFF" title="组织管理" onclick="frameWorkTab('app_2','组织管理','/cyzt_companylist/index.candor')" href="javascript:;">组织管理&raquo;</a>	
		</div>
		
		<div style="height:400px; width:100%;background:#FFFFFF">
			<!--div style="height:30px; width:100%; overflow:auto; background:#FFFFFF">
			<table class="table table-bordered table-striped">
			  <thead>
				  <tr>
					<th width="5%">ID</th>
					<th width="65%">角色名</th>
					<th width="30%">操作</th>
				  </tr>
				</thead>
			  </table>
			</div-->
			<div style="height:400px; width:100%; overflow:auto; margin-bottom:10px; overflow-x:hidden; background:#FFFFFF">
				<table class="table table-bordered table-striped" style="border-top:none;" id="rolelist">
					<tbody>
						<?php foreach($rolelist as $key=>$item){?>					
							<tr>
								<td width="6%"><?=$page_size*($page-1)+$key+1?></td>
								<td width="55%"><a href="/cyzt_rolemanager/editRole.candor?id=<?=$item['id']?>" target="mainFrame" onclick="selectedcolor(this);" <?if($key==0){?>style="color:red;"<?}?>><?=$item['name']?></a></td>
								<td width="39%">
								<a onclick="selectedcolor(this);" href="/cyzt_rolemanager/rightsGive.candor?id=<?=$item['id']?>" target="mainFrame" title="授权"><img src="/theme/default/images/icon/auth.png"></a>&nbsp;&nbsp;
								<a onclick="selectedcolor(this);" href="/cyzt_rolemanager/editRole.candor?id=<?=$item['id']?>" target="mainFrame" title="编辑角色"><img src="/theme/default/images/icon/edit.png"></a>&nbsp;&nbsp;
								<a href="javascript:void(0);" onclick="prompt('您确定要删除该角色嘛？','question','url|确定|/cyzt_rolemanager/delRole.candor?id=<?=$item['id']?>')" target="leftFrame" title="删除角色" target="leftFrame"><img src="/theme/default/images/icon/del.png" /></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			  
    	</div>
		<div class="pagingbox" style="height:20px;padding:3px 0 0 5px;background:#E6E6E6; margin:0">
		<div class="paging">
				<?=$page_html?>
				<button id="modules">导出方法</button><button id="roles">导出角色</button>
		</div>
		</div>
		<div style="height:14px;width:100%; background:url('/theme/default/images/bot_shadow.png') no-repeat"></div>
		
	</div>
</body>
<script>
$(function(){
	$('#modules').click(function(){
		window.open('getmodulesPDF.candor');
	})
	$('#roles').click(function(){
		window.open('getrolesPDF.candor');
	})
	// alert($("#rolelist tr:eq(0) td:eq(1) a:eq(0)").prop("outerHTML"));

	$("#rolelist tr:eq(0) td:eq(1) a:eq(0)").click();
	eval('window.parent.frames["'+$("#rolelist tr:eq(0) td:eq(1) a:eq(0)").attr("target")+'"].location.href=$("#rolelist tr:eq(0) td:eq(1) a:eq(0)").attr("href");');
})
</script>
</html>
