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
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'js/plugins/jquery.dynatree/skin/ui.dynatree.css';?>' type='text/css' id='skinSheet' /> 
<link rel="stylesheet" href="/js/plugins/html5Validate/validate.css" type="text/css" />
<script src="/js/jquery-1.8.3.min.js" ></script>
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/plugins/artDialog/jquery.artDialog.source.js?skin=default" type="text/javascript"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js" type="text/javascript"></script>
<script src="/js/candor.common.js"></script>
<script src="/js/plugins/candor-tab.js" ></script>
<script src="/js/plugins/datepicker/WdatePicker.js" ></script><!--时间控件JS-->
<script src="/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>
<script src='/js/plugins/jquery.dynatree/jquery.dynatree.js' type="text/javascript"></script> 
<script src="/js/plugins/html5Validate/jquery-html5Validate.js"></script>
<style>
blockquote small:before {
    content: " ";
}
.arrange li{width:130px;overflow:hidden;height:18px;}
.inputnoborder{width:110px;border:0;}
.searchbtn{ background:url('/theme/default/images/icon/search.png') no-repeat;padding:0 12px; margin-left:5px}
.searchbtn:hover{background:url('/theme/default/images/icon/search-hover.png') no-repeat;}

#tree3{height:454px; background:#FFFFFF}


#main-content {
	margin-bottom: 40px !important;
    margin-top: 0;
	min-height:1000px;
    margin-left: 270px;
}
</style>
<script>
$(document).ready(function(){
	//$("#opform").html5Validate();
	$("#opform").html5Validate(function(){this.submit();},{});
	//disabled(true);
	operateBar('show','save,cancel');
	//给save按钮添加制定方法
	operateFactoryFun('save',vk);
	operateFactoryFun('cancel',cancel);
	var doaction = '<?=$method?>';
	if(doaction=='del'){
		if(confirm('确实要删除该单位吗?')){
			$("#opform").submit();
		}
	}
});	

function cancel(){
	window.location.href="/cyzt_companylist/userlist.candor?type=company&opt=view&orgstruct_id=0";
	// window.location.reload();
	//window.location.href="/cyzt_companylist/userlist.candor?option=view&type=<?=$stype?>&orgid=<?=$companyid?>";
}
function vk(){
	prompt('加载等待','loading');
	if($("#password").val()!=$("#password").attr("default_value")){
		$("#change_password").val('1');
	}
	$("#opform").submit();	
}
</script>
<body>
<div id="search_content" style="position:fixed">
	<div id="search_frist_spacer">
		<form class="form-inline span6" action="/cyzt_companylist/companytree.candor" method="POST" target="leftFrame" id="searchform">
			<!--select style="width:80px;border:1px solid #CCCCCC;" onchange="changeformaction(this);">
				<option value="company">单位名称</option>
				<option value="user">按姓名搜索</option>
			</select-->
			<input type="text" class="input gray radius" id="org_name" name="org_name">
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
				<li class="active"><a href="#1" data-toggle="tab">用户信息</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="1">
					<form class="form-horizontal" id="opform" name="opform" action="/cyzt_companylist/<?=$method?>.candor?action=save&type=person" method="post">
						<input type="hidden" name="id" id="id" value="<?=$info['id']?>"/>
						<input type="hidden" name="change_password" id="change_password" value="0"/>
						<div class="row-fluid">
							<fieldset>
								<legend>用户信息</legend>
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
										<label class="control-label" for="region_code">地区编码：</label>
										<div class="controls">
										<select class="input-medium" id="region_code" name="region_code">
											<option value="0" selected="selected">请选择</option>
											<?php foreach($codeInfo as $key=>$item){ ?>
											<option value="<?=$key?>" <?php if($key==$info['region_code']){echo 'selected="selected"';} ?>><?=$item?></option>
											<?php } ?>
										</select>
										</div>
										</div>
										<div class="control-group">
										<label class="control-label" for="true_name">姓名：</label>
										<div class="controls">
										<input type="text" class="input-medium" name="true_name" onchange="setusername(this)" id="true_name" required value="<?=$info['true_name']?>">
										</div>
										</div>
										<div class="control-group">
										<label class="control-label" for="job">职务：</label>
										<div class="controls">
										<input type="text" class="input-medium" name="job" id="job" value="<?=$info['job']?>">
										</div>
										</div>
										
										
									</div>  
									<div class="span4">
										<div class="control-group">
										<label class="control-label" for="user_name">登录名：</label>
										<div class="controls">
										<input type="text" class="input-medium" name="user_name" id="user_name" required value="<?=$info['user_name']?>">
										</div>
										</div>
										<div class="control-group">
										<label class="control-label" for="active">是否生效：</label>
										<div class="controls">
										<select name="active" id="active" class="input-medium" value="<?=$info['active']?>" >
											<option value="1">是</option>
											<option value="0">否</option>
										</select>
										</div>
										</div>
							
										<div class="control-group">
										<label class="control-label" for="ORDER">权重：</label>
										<div class="controls">
										<input type="text" class="input-medium" name="sort" id="sort" value="<?=$info['sort']?>">
										</div>
										</div>
									</div>  
									<div class="span4">
		
										<div class="control-group">
										<label class="control-label" for="PASSWORD">密码：</label>
										<div class="controls">
										<input type="text" class="input-medium" name="password" id="password" required value="<?=$info['password']?>" default_value="<?=$info['password']?>">
										</div>
										</div>
										<div class="control-group">
										<label class="control-label" for="user_type">人员类别：</label>
										<div class="controls">
											<select name="user_type" id="user_type" class="input-medium" value="<?=$info['user_type']?>">
												<option value="0" <?=$info['user_type']==0?"selected":""?>>普通人员</option>
												<?php if(strtolower($_SESSION["isadmin"])=="1"){?>
												<option value="1" <?=$info['user_type']==1?"selected":""?>>高级人员</option>
												<?php }?>
											</select>
										</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="input01">隶属：</label>
											<div class="controls">
												<?=$orgSelect?>
											</div>
										</div>	
									</div>  
								</div>
							</fieldset>
						</div>
		
						<div class="row-fluid">
							<fieldset>
									<legend>基本属性</legend>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
											<label class="control-label" for="nationality">国籍：</label>
											<div class="controls">
											<input type="text" class="input-medium" name="nationality" id="nationality" value="<?=$info['nationality']?>">
											</div>
											</div>
											<div class="control-group">
											<label class="control-label" for="phone">联系电话：</label>
											<div class="controls">
											<input type="text" class="input-medium" name="phone" id="phone" value="<?=$info['phone']?>">
											</div>
											</div>
											<div class="control-group">
											<label class="control-label" for="email">电子邮箱：</label>
											<div class="controls">
											<input type="text" class="input-medium" name="email" id="email" value="<?=$info['email']?>">
											</div>
											</div>
										</div>  
										<div class="span4">
											<div class="control-group">
											<label class="control-label" for="birthdate">出生日期：</label>
											<div class="controls">
											<input type="text" class="span2" id="birthdate" name="birthdate"  style="width:150px" onclick="WdatePicker()" value="<?=$info['birthdate']?>"/>
											</div>
											</div>
											<div class="control-group">
											<label class="control-label" for="mobile">移动电话：</label>
											<div class="controls">
											<input type="text" class="input-medium" name="mobile" id="mobile" value="<?=$info['mobile']?>">
											</div>
											</div>
											<div class="control-group">
											<label class="control-label" for="qq">QQ：</label>
											<div class="controls">
											<input type="text" class="input-medium" name="qq" id="qq" value="<?=$info['qq']?>">
											</div>
											</div>
										</div>  
										<div class="span4">
											<div class="control-group">
											<label class="control-label" for="sex">性别：</label>
											<div class="controls">
												<select name="sex" id="sex" class="input-medium" value="<?=$info['sex']?>">
													<option>男</option>
													<option>女</option>
												</select>
											</div>
											</div>
											<div class="control-group">
											<label class="control-label" for="fax">传真：</label>
											<div class="controls">
												<input type="text" class="input-medium" name="fax" id="fax" value="<?=$info['fax']?>">
											</div>
											</div>
											<div class="control-group">
											<label class="control-label" for="knowledge">学历：</label>
											<div class="controls">
												<select name="knowledge" id="knowledge" class="input-medium" value="<?=$info['knowledge']?>">
												<option value="0">请选择</option>
												<option value="大专">大专</option>
												<option value="高中">高中</option>
												<option value="本科">本科</option>
												<option value="研究生">研究生</option>
												<option value="博士">博士</option>
												<option value="其他">其他</option>
												</select>
											</div>
											</div>
										</div>  
									</div>
									<div class="row-fluid">
										<div class="span12">
											<div class="control-group">
											<label class="control-label" for="address">地址：</label>
											<div class="controls">
											<input type="text" class="input-medium" name="address" id="address" value="<?=$info['address']?>">
											</div>
											</div>
										</div> 
									</div>
								</fieldset>
						</div>
					
						<div class="row-fluid">
							<fieldset>
									<legend>证件信息</legend>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
											<label class="control-label" for="id_type">证件类型：</label>
											<div class="controls">
												<select name="id_type" id="id_type" class="input-medium" value="<?=$info['id_type']?>">
													<option>身份证</option>
													<option>出生证</option>
													<option>户口薄</option>
													<option>护照</option>
													<option>兵役证</option>
													<option>军官证</option>
													<option>港澳台身份证</option>
													<option>企业代码证</option>
												</select>
											</div>
											</div>
										</div>   
										<div class="span4">
											<div class="control-group">
											<label class="control-label" for="id_number">证件号码：</label>
											<div class="controls">
												<input type="text" class="input-medium" name="id_number" id="id_number" value="<?=$info['id_number']?>">
											</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
											<label class="control-label" for="input01">证件地址：</label>
											<div class="controls">
											<input type="text" class="input-medium" name="ip_address" id="ip_address" value="<?=$info['ip_address']?>">
											</div>
											</div>
										</div>  
									</div>
									
								</fieldset>
						</div>
					</form>
				</div><!--tab-pane end-->
			</div><!--tab-content end-->
		</div>
	</div>	
</div>
</body>
</html>
