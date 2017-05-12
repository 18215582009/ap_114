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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$this->config->module->name?></title>
<link rel="stylesheet" href='<?php echo $this->app->getWebRoot() .'theme/fonts/open_sans.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_font-awesome.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_simple-line-icons.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_animate.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_all.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-switch.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/prettify.css';?>' type='text/css' media='screen' />
<link type="text/css" rel="stylesheet" href="" id="font-layout">
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/toastr.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/select2-custom.css';?>' type='text/css' id='skinSheet' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-select.min.css';?>' type='text/css' id='skinSheet' />
<link rel="stylesheet" href='<?php echo $this->app->getWebRoot() .'theme/multi-select-madmin.css';?>' type="text/css">
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_core.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_self.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system-responsive.css';?>' type='text/css' media='screen' />
<link rel="stylesheet" href="/js/bootstrap-datepicker/datepicker.css" type="text/css" media="screen">
</head>
<style>
.page-content {
    margin: 0px;
}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
<div class="box-content">
	<div class="content">
    	<div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="caption">创建：转换</div>
                        <div class="pull-right"><?=Form::btn_alert($this->config->module->tranBtn,$handle,@$phandle);?></div>
                    </div>
                    <div class="panel-body">
                      <form action="<?=$handle?>Tran?action=save" id="opform" name="opform"  method="post">
                      <!--p class="mlx plm">模块功能描述</p-->
                      <div class="row">
                          <input type="hidden" id="id" name="id" value="<?=$Info['id']?>" />
                          <input type="hidden" id="wkf_id" name="wkf_id" value="<?=$Info['wkf_id']?>" />
                          <div class="col-md-4">
                            <?=Form::select($name='act_from',$Info['actlist'],empty($Info['act_from'])?0:$Info['act_from'],$handle,'来源活动');?>
                            <?=Form::select($name='act_to',$Info['actlist'],empty($Info['act_to'])?0:$Info['act_to'],$handle,'目的活动');?>
                          </div><!-- col-md-4 -->
                          
                          <div class="col-md-4">
                            <?=Form::input('signal',$Info['signal'],$handle,'信号(按钮名称)');?>  
                            <?=Form::input('condition',$Info['condition'],$handle,'条件');?>
                            <!--div class="form-group">
                                <label class="control-label" for="role_id">授权角色</label>
                                <div class="input-group">
                                  <input type="text" placeholder="..." class="form-control input-xmedium" name="role_id" id="role_id">
                                  <span class="input-group-btn pull-right">
                                    <button type="button" class="btn btn-default pull-right" data-target="#modal-responsive" data-toggle="modal">选择</button>
                                  </span>
                                </div>
                            </div-->
                          </div><!-- col-md-4 -->
                          
                          <div class="col-md-4">
                             <div class="form-group">
                                <label class="control-label">授权角色</label>
                                <div class="input-group">
                                    <select multiple="true" id="role_id" name="role_id" class="select2-multi-value form-control input-medium">
                                        <optgroup label="军械部">
                                            <option value="1">Ak管理员</option>
                                            <option value="2">Hi管理员</option>
                                        </optgroup>
                                        <optgroup label="物资部">
                                            <option value="3">CA管理员</option>
                                            <option value="4">Nv管理员</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                          </div><!-- col-md-4 -->
                      </div>
                      <div class="row">
                         <div class="col-xs-12">
                            <div class="col-md-12">
                            <div class="form-group">	
                                <label class="control-label">转出条件</label>
                                <div class="input-group">
                                <select id="rules_feild" class="form-control input-medium pull-left">
                                <option value="0">-- 请选择字段 --</option>
                                <? foreach($Info['tranState'] as $v){ ?>
                                <option value="<?=$v?>"><?=$v?></option>
                                <? } ?>
                                </select>
                                <select id="rules_rel" class="form-control input-small pull-left ml10">
                                <option value="=">等于</option>
                                <option value="&lt;&gt;">不等于</option>
                                <option value="&gt;">大于</option>
                                <option value="&lt;">小于</option>
                                <option value="&gt;=">大于等于</option>
                                <option value="&lt;=">小于等于</option>
                                <option value="include">包含</option>
                                <option value="exclude">不包含</option>
                                </select>
                                <input type="text" value="" id="rules_value" class="form-control input-small ml10">
                                <select id="rules_relation" class="form-control input-small ml10">
                                <option value="AND">与</option>
                                <option value="OR">或者</option>
                                </select>
                                <a class="btn btn-default ml10" href="javascript:void(0);" onclick="addRule()">添加</a>
                                </div>
                            </div>
                            </div><!-- col-md-12 -->
                         </div>
                         <div class="col-xs-12" id="rules">
                          </div>
                      </div>
                      </form>
                    </div>
                  </div><!-- panel end -->
              </div>
          </div>
      </div>
</div>
</div>
</form>
</div>

<div class="modal fade" aria-hidden="true" aria-labelledby="modal-wide-width-label" role="dialog" tabindex="-1" id="modal-responsive" style="display: none;">
	<div class="modal-dialog modal-wide-width">
		<div class="modal-content">
			<div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                <h4 id="modal-responsive-label" class="modal-title">Modal Responsive</h4></div>
            <div class="modal-body">
                <!--BEGIN HTML-->
                <div class="row">
				<label class="control-label col-md-3">Pre-selected Options</label>
                <div class="col-md-6">
                    <select id="pre-selected-options" multiple="multiple">
                        <option value="elem_1" selected="selected">elem 1</option>
                        <option value="elem_2">elem 2</option>
                        <option value="elem_3">elem 3</option>
                        <option value="elem_4" selected="selected">elem 4</option>
                        <option value="elem_5">elem 5</option>
                        <option value="elem_6">elem 6</option>
                        <option value="elem_7">elem 7</option>
                        <option value="elem_8">elem 8</option>
                        <option value="elem_9">elem 9</option>
                        <option value="elem_10">elem 10</option>
                        <option value="elem_11">elem 11</option>
                        <option value="elem_12">elem 12</option>
                        <option value="elem_13">elem 13</option>
                        <option value="elem_14">elem 14</option>
                        <option value="elem_15">elem 15</option>
                        <option value="elem_16">elem 16</option>
                        <option value="elem_17">elem 17</option>
                        <option value="elem_18">elem 18</option>
                        <option value="elem_19">elem 19</option>
                        <option value="elem_20">elem 20</option>
                    </select>
                </div>
				</div>
                <!--END HTML-->
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Close
                </button>
                <button type="button" class="btn btn-success">Save changes</button>
            </div>
		</div>
	</div>
</div>


<script src="/js/jquery-1.10.2.min.js" ></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/candor.blockui.js"></script>
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/bootstrap.min.js" ></script>
<script src="/js/bootstrap-hover-dropdown.js"></script>
<script src="/js/mtek_html5shiv.js"></script>
<script src="/js/respond.min.js"></script>
<script src="/js/jquery.metisMenu.js"></script>
<script src="/js/mtek_icheck.min.js"></script>
<script src="/js/mtek_custom.min.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/bootstrap-switch.min.js"></script>
<script src="/js/prettify.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="/js/jquery.pulsate.js"></script>

<!--LOADING SCRIPTS FOR PAGE-->
<script src="/js/select2.min.js"></script>
<script src="/js/bootstrap-select.min.js"></script>
<script src="/js/jquery.multi-select.js"></script>
<script src="/js/plugins/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/plugins/artDialog/plugins/iframeTools.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->

<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/mtek_jquery-responsive.js"></script>

<script>
jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
	
	$(".select2-multi-value").select2();
	//$('#pre-selected-options').multiSelect();
	
});

function vk(){
	$("#opform").submit();	
	//$("#opbtn").click();
}
function cancel(){
	prompt('您确认放弃操作嘛？','warning');
}

var rulesJson = [];
var i = 0;
//添加规则
function addRule(){
	var rules_feild = $('#rules_feild').val();
	var rules_rel = $('#rules_rel').val();
	var rules_value = $('#rules_value').val();
	var rules_relation = $('#rules_relation').val();
	if(rules_feild=='0'){
		alert('请补充完成条件');
		$('#rules_feild').focus();
		return false;
	}
	if(rules_value==''){
		alert('请补充完成条件');
		$('#rules_value').focus();
		return false;
	}

	//var rules = {};
	if(IsAddRule(rulesJson,rules_feild)){
		rulesJson[i] = [];
		rulesJson[i]['rules_feild']=rules_feild;
		rulesJson[i]['rules_rel']=rules_rel;
		rulesJson[i]['rules_value']=rules_value;
		rulesJson[i]['rules_relation']=rules_relation;
		i++;
		//rulesJson.push(rules);
		//console.log(rulesJson);
		showRule(rulesJson);
		//if(getJsonObjLength(rulesJson)>1){
		//	var ruleInfo = '<h4>'+rules_relation+' '+rules_feild+rules_rel+rules_value+' <span class="label label-default" title="'+i+'">删除</span></h4>';
		//}else{
		//	var ruleInfo = '<h4>'+rules_feild+rules_rel+rules_value+' <span class="label label-default" title="'+i+'">删除</span></h4>';
		//}
		
	}else{
		alert('条件重复');
		$('#rules_feild').focus();
		return false;
	}
}

function showRule(){
	$("#rules").empty();
	var rulelist = '',ruleInfo='';
	for (var item in rulesJson) {
		if(item>0){
			ruleInfo = '<h4>'+rulesJson[item].rules_relation +' '+ rulesJson[item].rules_feild + rulesJson[item].rules_rel + rulesJson[item].rules_value+' <span class="label label-default" title="'+item+'">删除</span></h4>';
			rulelist += rulesJson[item].rules_relation +' '+ rulesJson[item].rules_feild + rulesJson[item].rules_rel + rulesJson[item].rules_value;
		}else{
			ruleInfo = '<h4>'+rulesJson[item].rules_feild + rulesJson[item].rules_rel + rulesJson[item].rules_value+' <span class="label label-default" title="'+item+'">删除</span></h4>';
			rulelist += rulesJson[item].rules_feild + rulesJson[item].rules_rel + rulesJson[item].rules_value;
		}
		$(ruleInfo).appendTo("#rules");
	}
	$("#condition").val(rulelist);
	$("#rules").find('span').click(function(){
		rulesJson.splice([$(this).attr('title')],1);
		console.log(rulesJson);
		showRule(rulesJson);
	});
}

function getJsonObjLength(jsonObj) {
	var Length = 0;
	for (var item in jsonObj) {
	  Length++;
	}
	return Length;
}

function IsAddRule(jsonObj,val) {
	if(getJsonObjLength(jsonObj)>0){
		for (var item in jsonObj) {
		  //alert(jsonObj[item].rules_feild+'='+val);
		  if(jsonObj[item].rules_feild==val){
			return false;
		  }
		}
		return true;
	}else{
		return true;
	}
}
</script>
</body>
</html>
