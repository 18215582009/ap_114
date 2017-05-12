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
<link rel="stylesheet" href="/js/plugins/html5Validate/validate.css" type="text/css" />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/candor.common.js"></script>
<script src="/js/plugins/datepicker/WdatePicker.js" ></script><!--时间控件JS-->
<script src="/js/plugins/html5Validate/jquery-html5Validate.js"></script>
<script>
$(document).ready(function(){
	$("#opform").html5Validate(function(){this.submit();},{});
	operateBar('show','save,cancel');
	//给save按钮添加制定方法
	operateFactoryFun('save',vk);
	operateFactoryFun('cancel',cancel);
	var doaction = '<?=$doaction?>';
	if(doaction=='del'){
		if(confirm('确实要删除该部门吗?')){
			$("#opform").submit();
		}
	}
});	

function vk(){
	prompt('加载等待','loading');
	$("#opform").submit();	
}

function cancel(){
	// history.go(-1);
	// history.back();
	window.location.href="/cyzt_companylist/userlist.candor?type=company&opt=view&orgstruct_id=0";
	//window.location.href="/cyzt_companylist/userlist.candor?option=view&type=<?=$stype?>&orgid=<?=$companyid?>";
}
</script>
<style>
blockquote small:before {
    content: " ";
}
.arrange li{width:130px;overflow:hidden;height:18px;}
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
			<input type="text" class="input gray radius" id="input01" name="orgname">
			<button class="btn" type="submit" onclick="javascript:document.forms.searchform.submit();"><i class="icon-search"></i>搜索</button>
		</form>
		<div class="btn-toolbar span6" id="operateBar">
			<div class="btn-group">
			<a href="javascript:;" class="btn" id="edit"><i class="icon-edit"></i>编辑</a>&nbsp;
			</div>
			<div class="btn-group">
			<a href="javascript:;" class="btn" id="cancel"><i class="icon-share"></i>取消</a>&nbsp;
			</div>
			<div class="btn-group">
			<a href="javascript:;" class="btn" id="save"><i class="icon-check"></i>保存</a>&nbsp;&nbsp;
			</div>
		</div><!-- /btn-toolbar -->
	</div>
	<div id="search_shadow"></div>
</div>

<div id="main-content">
	<div class="container-fluid" style="padding-top:40px;">
		<div class="tabbable">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#1" data-toggle="tab">部门信息</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="1">
					<form class="form-horizontal" id="opform" name="opform" action="/cyzt_companylist/<?=$method?>.candor?action=save" method="post">
					<input type="hidden" name="type" id="type" value="<?=$info["type"];?>" />
					<input type="hidden" name="id" id="id" value="<?=$info["id"];?>" />
					<input type="hidden" name="company_id" id="company_id" value="<?=$info["company_id"]?>"/>
					<input type="hidden" name="flag" value="<?=$info["flag"];?>"/>
					<input type="hidden" name="relate_table" id="relate_table" value="<?=$info["relate_table"];?>"/>
					<div class="row-fluid">
							<fieldset>
								<legend>基本信息</legend>
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
										<label class="control-label" for="ORGNAME">部门名称：</label>
										<div class="controls">
										<input type="text" class="input-medium" name="name" id="name" required value="<?=$info["name"];?>">
										</div>
										</div>
										<div class="control-group">
										<label class="control-label" for="input01">联系电话：</label>
										<div class="controls">
										<input type="text" class="input-medium" name="tel" id="tel" value="<?=$info["tel"];?>">
										</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
										<label class="control-label" for="input01">传真：</label>
										<div class="controls">
										<input type="text" class="input-medium" name="fax" id="fax" value="<?=$info["fax"];?>">
										</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="input01">隶属：</label>
											<div class="controls">
												<?=$orgSelect?>
											</div>
										</div>	
										<!--div class="control-group">
										<div class="controls">
										<input type="text" name="PARENTDEPART" id="PARENTDEPART" value="" readonly>
										</div>
										</div-->
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label" for="input01">部门地址：</label>
											<div class="controls">
											<input type="text" class="input-medium" name="address" id="address" value="<?=$info["address"];?>">
											</div>
										</div>
	
									</div>
								</div>
							</fieldset>
					</div>
					</form>
					
				</div>
			</div><!-- row-fluid end -->
		</div>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
var reload='<?=$_GET["reload"]?>';
if(reload){
	var t=reload.split(",");
	for(var k in t){
		window.parent.frames[t[k]].location.reload();
	}
}
</script>

