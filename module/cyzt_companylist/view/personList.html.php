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
var opt = "<?=$opt;?>";

$(document).ready(function(){
		<?php if(($opt=='view')||($opt=='userlist')){ ?>
			disabled(true);
			parent.operateBar('show','edit,add');
			parent.operateFactoryFun('edit',edit);
		<?php }else {?>
			disabled(false);
			parent.operateBar('show','save,cancel');
			//给save按钮添加制定方法
			parent.operateFactory('save','mainFrame#opform');
			parent.operateFactoryFun('cancel',cancel);
		<?php } ?>
});
function cancel(){
		disabled(true);
		<?php if(($opt=='view')||($opt=='userlist')){ ?>
			parent.operateBar('show','edit,add');
			parent.operateFactoryFun('edit',edit);
		<?php }else{ ?>			
			history.back();
		<?php } ?>

		//alert('23123131');
	}
function edit(){

	<?php if(($opt=='view')||($opt=='userlist')){ ?>
		disabled(false);
		parent.operateBar('show','save,cancel');
		parent.operateFactory('save','mainFrame#opform');
		parent.operateFactoryFun('cancel',cancel);
	<?php } ?>

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
    margin-left: 270px;
}
</style>
<body>
<div id="search_content" style="position:fixed">
	<div id="search_frist_spacer">
		<form class="form-inline span6" action="/cyzt_companylist/companytree.candor" method="POST" target="leftFrame" id="searchform">
			<!--select style="width:80px;border:1px solid #CCCCCC;" onchange="changeformaction(this);">
				<option value="company">单位名称</option>
				<option value="user">按姓名搜索</option>
			</select-->
			 单位名称：<input type="text" class="input gray radius" id="org_name" name="org_name">
			<button class="btn" type="submit" onclick="javascript:document.forms.searchform.submit();"><i class="icon-search"></i>搜索</button>
		</form>
	</div>
	<div id="search_shadow"></div>
</div>

<div id="main-content">
	<div class="container-fluid" style="padding-top:40px;">
		 <div class="row-fluid">
		   <div class="span12">
				<fieldset>
					<legend>用户信息</legend>	
					<form class="form-inline" id="opform" name="opform" action="/cyzt_companylist/userlist.candor" method="GET">
					所属：<?=$orgSelect?>
					&nbsp;登录名&nbsp;<input type="text" writeable="true" class="input-medium" id="user_name" name="user_name" value="<?=$user_name?>">
					姓名&nbsp;<input type="text" writeable="true" class="input-medium" id="true_name" name="true_name" value="<?=$_REQUEST["true_name"]?>">
					<button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i>搜索</button>
					</form>
				</fieldset>
				<table style="margin-top:10px;margin-bottom:10px;" class="table table-bordered table-striped">
					<thead>
					  <tr>
							<th>序号</th>
							<th>登录名</th>
							<th>姓名</th>
							<th>职务</th>
							<th>组织</th>
							<th>操作</th>
					  </tr>
					</thead>
					<tbody>
						<?php foreach($userlist as $key=>$item){?>
						<tr>
							<td class="span1"><input type="checkbox"/><?=$item['id']?></td>
							<td align="right">
							
							 <!-- href="/cyzt_companylist/editperson.candor?option=view&org_id=<?=$item['id']?>&parent_id=<?=$item['org_id']?>" --> 
							<a href="/cyzt_companylist/editPerson.candor?id=<?=$item['id']?>&orgstruct_id=<?=$item['orgstruct_id']?>"
							 target="mainFrame"><?php if($item['active']=='0'){echo '<font color=red>'.$item['user_name'].'</font>';}else{echo $item['user_name'];}?></a></td>
							<td align="right"><?=$item['true_name']?></td>
							<td align="right"><?=$item['job']?></td>
							<td align="right"><?=$item['org_struct']?></td>
							<td align="right">
							<a href="/cyzt_companylist/editPerson.candor?id=<?=$item['id']?>&orgstruct_id=<?=$item['orgstruct_id']?>" target="mainFrame">编辑</a>&nbsp;|&nbsp;
							<a href="/cyzt_companylist/activePerson.candor?id=<?=$item['id']?>&orgstruct_id=<?=$item['orgstruct_id']?>&active=<?=$item['active']?>" target="mainFrame"><? if ($item['active']=='1'){echo '停用';} else { echo '启用';}?></a>&nbsp;|&nbsp;
							<a href="javascript:void(0);" onclick="prompt('你确定要执行该操作？','question','url|确认|/cyzt_companylist/delPerson?id=<?=$item['id']?>')" >删除</a>&nbsp;|&nbsp;
							<a href="javascript:void(0);" onclick="author(<?=$item['id']?>,'<?=$item['name']?>')">授权</a>
							<!-- <a href="/cyzt_companylist/editperson.candor?option=edit&orgid=<?=$item['ID']?>&parentid=<?=$orgid?>&tabselect=tab3&stype=<?=$stype?>">授权</a>&nbsp;|&nbsp;
							<a href="/cyzt_companylist/editperson.candor?option=edit&orgid=<?=$item['ID']?>&parentid=<?=$orgid?>&tabselect=tab4&stype=<?=$stype?>">权限范围</a> -->
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
<script type="text/javascript">
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
