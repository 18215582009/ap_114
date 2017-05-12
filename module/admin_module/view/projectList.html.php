<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: index.html.php,v 1.4 2012/02/16 09:54:23 lj Exp $
 */
use lib\util\Util as Util;
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
body{background:#CCE0F1;}
.container-fluid{ padding:0;}
a{cursor: pointer}
.title{height:36px;line-height:36px;width:100%;/*background:#E7F5FF;border-top:#FFFFFF solid 1px;border-bottom:#FFFFFF solid 1px;*/background:#5CC7FF;}
.title img{padding:0 5px 0 10px;}
.title span{font-size:14px;font-weight:bold}
.add{background:url("/theme/default/images/icon/add.png") no-repeat;padding:16px 16px; margin-top:3px; float:right; margin-right:2px;}
.add:hover{background:url("/theme/default/images/icon/add_hover.png") no-repeat;}
.categroy{background:url("/images/icon/@asset.gif") no-repeat;padding:16px 10px 9px 16px; margin-top:10px; float:right; margin-right:2px;}
.refresh{background:url("/theme/default/images/icon/refresh.png") no-repeat;padding:16px 16px; margin-top:3px; float:right; margin-right:10px;}
.refresh:hover{background:url("/theme/default/images/icon/refresh_action.png") no-repeat;}
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
<div class="container-fluid">
		<div class="row-fluid" style="height: 105px;">
			<div style="float:left;width:64px;margin:20px 0 0 50px" ><img src="/images/app_icons/sys_module64.png" width="64"></div>
			<div class="fcolor_one f_16 f_bold" style="float:left; margin:47px 0 0 10px"><h3>模块管理</h3></div>
		</div>
		
		<div class="title">
			<a href="javascript:window.location.reload()" title="刷新" class="refresh"></a>
			<a href="/admin/addProject.candor" title="新增项目" class="add" target="mainFrame"></a>
			<img width="8" height="11" src="/theme/default/images/trigon_white_down.png" border="0" />
			<span>项目管理</span>
		</div>
		
		<div style="height:400px; width:100%;background:#FFFFFF">
			<!--div style="height:30px; width:100%; overflow:auto; background:#FFFFFF">
			<table class="table table-bordered table-striped">
			  <thead>
				  <tr>
					<th width="5%">ID</th>
					<th width="35%">模块名</th>
					<th width="30">所属项目</th>
					<th width="30%">操作</th>
				  </tr>
				</thead>
			  </table>
			</div-->
			<div style="height:395px; width:100%; overflow:auto; margin-bottom:10px; overflow-x:hidden; background:#FFFFFF">
				<table class="table table-bordered table-striped" style="border-top:none;">
					<tbody>
						<?php foreach($mList as $key=>$item){?>					
							<tr>
								<td width="5%"><?=$key+1?></td>
								<td width="40%" title="<?=$item['project_name']?>"><?=Util::msubstr($item['project_name'],0,6)?></td>
								</td>
								<td width="55%">
								<a href="/admin/categoryList.candor?type=parent&projectcode=<?=$item['project_code']?>" target="mainFrame" title="查看项目模块">模块(<?=$item['cnt']?>)</a>&nbsp;&nbsp;
								<a href="/admin/editProject.candor?pid=<?=$item['id']?>" target="mainFrame" title="编辑项目">编辑</a>&nbsp;&nbsp;
								<?php if($item['cnt']<1){?>
									<a href="/admin/delProject.candor?pid=<?=$item['id']?>" target="leftFrame" title="删除项目">删除</a>
								<?php }?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			  
    	</div>
		<div class="pagingbox" style="height:20px;padding:3px 0 0 5px;background:#E6E6E6; margin:0">
			<?=$page_html?>
		</div>
</div>
</body>
</html>
