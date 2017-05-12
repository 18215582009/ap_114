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
<script src="/js/plugins/html5Validate/jquery-html5Validate.js"></script>
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/candor.common.js"></script>
<script src="/js/plugins/candor-tab.js" ></script>
<script src="/js/plugins/datepicker/WdatePicker.js" ></script><!--时间控件JS-->
<script src="/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="/js/jquery.cookie.js" type="text/javascript"></script>
<script src='/js/plugins/jquery.dynatree/jquery.dynatree.js' type="text/javascript"></script>
<script src="/js/plugins/html5Validate/jquery-html5Validate.js"></script>
<script>
$(document).ready(function(){
	//$("#opform").html5Validate();
	$("#opform").html5Validate(function(){prompt('加载等待','loading');this.submit();},{});
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
	//disabled(true);
	// window.location.reload();
	//history.back();
	window.location.href="/cyzt_companylist/userlist.candor?type=company&opt=view&orgstruct_id=0";
}
function vk(){
	$("#opform").submit();	
}
</script>
<style>
blockquote small:before {
    content: " ";
}
.arrange li{width:130px;overflow:hidden;height:18px;}
.form-horizontal .control-label {
    width: 100px;
}

#main-content {
	margin-bottom: 40px !important;
    margin-top: 0;
	min-height:1000px;
    margin-left: 270px;
}
</style>
<script src="/js/plugins/candor-dropdown.js" type="text/javascript"></script> 
<script type="text/javascript">
	function refreshtree(pid){
		document.frames("leftFrame").src="http://www.baidu.com"; 
	}

	function deldialog1(orgid,parentid,flag,stype){
		art.dialog({
			content: '确实要删除该内容?',
			ok: function () {				
				$("#mainFrame").attr("src","/cyzt_companylist/removePerson.candor?act=del&orgid="+orgid+"&parentid="+parentid+"&flag="+flag+"&type="+stype);
				return true;				
			},
			cancelVal: '关闭',
			cancel: true //为true等价于function(){}
		});
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
			<!-- <ul class="nav nav-tabs">
				<li class="active"><a href="#1" data-toggle="tab">单位信息</a></li>
			</ul> -->
			<div class="tab-content">
				<div class="tab-pane active" id="1">
					<form class="form-horizontal" action="/cyzt_companylist/<?=$method?>.candor?act=save" method="POST" id="opform">
					<input type="hidden" name="id" value="<?=$info['id']?>"/>
						<div class="row-fluid">
								<fieldset>
									<legend>基本信息</legend>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
											<label class="control-label" for="REGIONCODE">所属地区：</label>
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
											<label class="control-label" for="input01">隶属：</label>
											<div class="controls">
												<?=$orgSelect?>
											</div>
										</div>	
										</div>
										<div class="span4">
											<div class="control-group">
											<label class="control-label" for="full_name">企业名称：</label>
											<div class="controls">
											<input type="text" class="input-medium" id="full_name" name="full_name" required value="<?=$info['full_name']?>" />
											</div>
											</div>
											<div class="control-group">
											<label class="control-label" for="short_name">企业简称：</label>
											<div class="controls">
											<input type="text" class="input-medium" id="short_name" name="short_name" required value="<?=$info['short_name']?>" />
											</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
											<label class="control-label" for="org_file_no">组织机构代码：</label>
											<div class="controls">
											<input type="text" class="input-medium" id="org_file_no" name="org_file_no" value="<?=$info['org_file_no']?>" />
											</div>
											</div>
										</div>
									</div>
								</fieldset>
						</div>
						<div class="row-fluid">
								<fieldset>
									<legend>相关信息</legend>
									<div class="row-fluid">
										<?php foreach ($this->config->editcompany as $k => $v) {?>
										<div class="span4">
										<div class="control-group">
										<label class="control-label" for="org_file_no"><?=$v["title"]?></label>
										<div class="controls">
										<?php if($v["type"]=="select"){?>
										<select type="<?=$v["type"]?>" class="input-medium" id="<?=$v["id"]?>" name="<?=$v["id"]?>" value="<?=$info[$v["id"]]?>">
											<?php foreach ($v["option"] as $k1 => $v1) {?>
											<option value="<?=$v1['value']?>" <?=$info[$v["id"]]==$v1['value']?"selected":""?>><?=$v1['title']?></option>
											<?php }?>
										</select>
										<?php }elseif ($v["type"]=="text") {?>
											<input type="text" class="input-medium" id="<?=$v["id"]?>" name="<?=$v["id"]?>" value="<?=$info[$v["id"]]?>"/>
										<?php }?>
										</div>
										</div>
										</div>
										<?php }?>
									</div>
								</fieldset>
						</div>
						
							
						<div class="row-fluid">
								<fieldset>
										<legend>其他信息</legend>
										<div class="row-fluid">
											<div class="span4">
												<div class="control-group">
													<label class="control-label" for="contact">经办人：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="contact" name="contact" <?=$this->config->auto_create_user?'required':''?>  value="<?=$info['contact']?>" />
													</div>
												</div>
												<div class="control-group">
												<label class="control-label" for="region">公司所在地区：</label>
												<div class="controls">
												<input type="text" class="input-medium" id="region" name="region" value="<?=$info['region']?>" />
												</div>
												</div>
												<div class="control-group">
													<label for="fax" class="control-label">传真：</label>
													<div class="controls">
														<input type="text" class="input-medium" id="fax" name="fax" value="<?=$info['fax']?>" />
													</div>
												</div> 
												
												<div class="control-group">
													<label class="control-label" for="regi_ster_capital">注册资本：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="regi_ster_capital" name="regi_ster_capital" value="<?=$info['regi_ster_capital']?>" />
													</div>
												</div>
												 <div class="control-group">
													<label class="control-label" for="账号">银行账号：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="account_num" name="account_num" value="<?=$info['account_num']?>" />
													</div>
												</div>
												
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label" for="phone">联系电话：</label>
													<div class="controls">
													<input type="tel" class="input-medium" id="phone" name="phone"  <?=$this->config->auto_create_user?'required':''?>  value="<?=$info['phone']?>" />
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="address">办公地址：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="address" name="address" value="<?=$info['address']?>" />
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="email">电子邮箱：</label>
													<div class="controls">
													<input type="email" class="input-medium" id="email" name="email" value="<?=$info['email']?>" />
													</div>
												</div>
												
												
												<div class="control-group">
													<label class="control-label" for="input01">开户银行：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="bank" name="bank" value="<?=$info['bank']?>" />
													</div>
												</div>
												
												
											</div>
											
											<div class="span4">
												<div class="control-group">
													<label class="control-label" for="zip_code">邮政编码：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="zip_code" name="zip_code" value="<?=$info['zip_code']?>" />
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="input01">网站：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="homepage" name="homepage" value="<?=$info['homepage']?>" />
													</div>
												</div>
												
												<!-- <div class="control-group">
													<label class="control-label" for="input01">注册资本单位：</label>
													<div class="controls">
														<select id="unit_type" class="input-medium" name="unit_type">
														<option <?if($info['unit_type']=='独资'){?>selected<?}?>>独资</option>
														<option <?if($info['unit_type']=='股份'){?>selected<?}?>>股份</option>
														<option <?if($info['unit_type']=='合资'){?>selected<?}?>>合资</option>
														<option <?if($info['unit_type']=='合作'){?>selected<?}?>>合作</option>
														<option <?if($info['unit_type']=='集体'){?>selected<?}?>>集体</option>
														<option <?if($info['unit_type']=='联营'){?>selected<?}?>>联营</option>
														<option <?if($info['unit_type']=='全民'){?>selected<?}?>>全民</option>
														<option <?if($info['unit_type']=='私营'){?>selected<?}?>>私营</option>
														</select>
													</div>
												</div> -->
												<div class="control-group">
													<label class="control-label" for="account_name">银行账户：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="account_name" name="account_name" value="<?=$info['account_name']?>" />
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="employee">在册人员：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="employee" name="employee" value="<?=$info['employee']?>" />
													</div>
												</div>
												
											</div>
										</div>
									</fieldset>  
						</div><!-- row end -->
						<div class="row-fluid">
								<fieldset>
										<legend>法人信息</legend>
										<div class="row-fluid">
											<div class="span4">
												<div class="control-group">
													<label class="control-label" for="legal_man">法人：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="legal_man" name="legal_man" value="<?=$info['legal_man']?>" />
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="input01">法人电话：</label>
													<div class="controls">
													<input type="tel" class="input-medium" id="legal_phone" name="legal_phone" value="<?=$info['legal_phone']?>" />
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label" for="legal_sex">法人性别：</label>
													<div class="controls">
													<select id="legal_sex" class="input-medium" name="legal_sex">
													<option <?php if($info['legal_sex']=='男'){?>selected<? } ?>>男</option>
													<option <?php if($info['legal_sex']=='女'){?>selected<? } ?>>女</option>
													</select>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="mobile">法人手机：</label>
													<div class="controls">
													<input type="tel" class="input-medium" id="mobile" name="mobile" value="<?=$info['mobile']?>" />
													</div>
												</div>
												
												
											</div>
											
											<div class="span4">
												<div class="control-group">
													<label class="control-label" for="legal_owner_id">法人证件号码：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="legal_owner_id" name="legal_owner_id" value="<?=$info['legal_owner_id']?>" />
													</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="legal_post_code">法人邮编：</label>
													<div class="controls">
													<input type="zipcode" class="input-medium" id="legal_post_code" name="legal_post_code" value="<?=$info['legal_post_code']?>" />
													</div>
												</div>
											</div>
										</div>
									</fieldset>
						</div><!-- row end -->
						<div class="row-fluid">
								<fieldset>
										<legend>执照信息</legend>
										<div class="row-fluid">
											<div class="span4">
												<div class="control-group">
												<label class="control-label" for="economic_type">经济类型：</label>
												<div class="controls">
												<input type="text" class="input-medium" id="economic_type" name="economic_type" value="<?=$info['economic_type']?>" />
												</div>
												</div>
												<div class="control-group">
													<label for="inlineCheckboxes" class="control-label">登记日期：</label>
													<div class="controls">
														<input type="text" class="span2" id="regi_date" name="regi_date" style="width:150px" onclick="WdatePicker()" value="<?=$info['regi_date']?>" />
													</div>
												</div> 
												<div class="control-group">
													<label class="control-label" for="regi_ster_time">工商注册日期：</label>
													<div class="controls">
													<input type="text" class="span2" id="regi_ster_time" name="regi_ster_time" style="width:150px" onclick="WdatePicker()" value="<?=$info['regi_ster_time']?>" />
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
												<label class="control-label" for="patent_number">营业执照号：</label>
												<div class="controls">
													<input type="text" class="input-medium" id="patent_number" name="patent_number" value="<?=$info['patent_number']?>" />
												</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="licence_start_date">执照期限从：</label>
													<div class="controls">
													<input type="text" class="span2" id="licence_start_date" name="licence_start_date" style="width:150px" onclick="WdatePicker()" value="<?=$info['licence_start_date']?>" />
													</div>
												</div>
												
												<div class="control-group">
													<label class="control-label" for="regi_ster_address">工商注册地址：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="regi_ster_address" name="regi_ster_address" value="<?=$info['regi_ster_address']?>" />
													</div>
												</div>
											</div>
											
											<div class="span4">
												<div class="control-group">
												<label class="control-label" for="regi_sting_organ">发证机关：</label>
												<div class="controls">
													<input type="text" class="input-medium" id="regi_sting_organ" name="regi_sting_organ" value="<?=$info['regi_sting_organ']?>" />
												</div>
												</div>
												<div class="control-group">
													<label class="control-label" for="licence_end_date">执照期限到：</label>
													<div class="controls">
													<input type="text" class="span2" id="licence_end_date" name="licence_end_date" style="width:150px" onclick="WdatePicker()" value="<?=$info['licence_end_date']?>" />
													</div>
												</div>
												
												<div class="control-group">
													<label class="control-label" for="tax_code">税务证号：</label>
													<div class="controls">
													<input type="text" class="input-medium" id="tax_code" name="tax_code" value="<?=$info['tax_code']?>" />
													</div>
												</div>
											</div>
										</div>
									</fieldset>
						</div><!-- row end -->
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