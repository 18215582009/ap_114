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
<title>公司管理</title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/cdrstyle.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/style.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/default/page.css';?>' type='text/css' media='screen' />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/candor.common.js"></script>
<script src="/js/plugins/candor-tab.js" ></script>
<script src="/js/plugins/datepicker/WdatePicker.js" ></script><!--时间控件JS-->
<script>


//弹出授权页面
function author(user_id,name){
	art.dialog.open('/cyzt_companylist/authPerson.candor?user_id='+user_id+'&name='+name,{
		title:name+'的授权',
		width:'80%',
		height:'90%',
		lock:'true',
		esc:'false',
		id:'author',
		window:top
	});
}
</script>
<style>
.form-horizontal .control-label {
    width: 130px;
}

#main-content {
	margin-bottom: 40px !important;
    margin-top: 0;
	min-height:1000px;

}
</style>
<body>
<div id="search_content" style="position:fixed">
	<div id="search_frist_spacer">
		<form class="form-inline span6" action="/cyzt_companylist/index.candor" method="GET" id="opform">
			 用户名：<input type="text" class="input gray radius" id="login" name="login" value="<?=$login?>">
			<button class="btn" type="submit"><i class="icon-search"></i>搜索</button>
		</form>
	</div>
	<div id="search_shadow"></div>
</div>

<div id="main-content">
	<div class="container-fluid" style="padding-top:40px;">
		 <div class="row-fluid">
		   <div class="span12">
				<table style="margin-top:10px;margin-bottom:10px;" class="table table-bordered table-striped">
					<thead>
					  <tr>
							<th>序号</th>
							<th>名称</th>
							<th>用户名</th>
							<th>最近登录时间</th>
							<th>操作</th>
					  </tr>
					</thead>
					<tbody>
						<?php foreach($userlist as $key=>$item){?>
						<tr>
							<td class="span1"><?=$item['id']?></td>
							<td align="right"><?=$item['name']?></td>
							<td align="right"><?php if($item['active']=='0'){echo '<font color=red>'.$item['login'].'</font>';}else{echo $item['login'];}?></td>
							<td align="right"><?=$item['login_date']?></td>
							<td align="right">
							<a href="javascript:void(0);" onclick="author(<?=$item['id']?>,'<?=$item['name']?>')">授权</a>&nbsp;|&nbsp;
							<a href="/cyzt_companylist/oeactivePerson.candor?id=<?=$item['id']?>&active=<?=$item['active']?>"><? if ($item['active']=='1'){echo '停用';} else { echo '启用';}?></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<div class="pagingbox">
					<div class="paging">
						<!--ul class="pagtools">
							<li><a href="" title="新增用户"><i class="icon-check"></i>新增用户</a></li>
						</ul-->	
						<?=$splitPageStr?>	 
					</div>
				</div>
		   </div>
		 </div>
	</div>
</div>
	
</body>
</html>
