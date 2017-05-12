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
<title><?=$this->config->module->name?></title>
</head>
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_font-awesome.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_simple-line-icons';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap.min.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_animate.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_all.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-switch.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/prettify.css';?>' type='text/css' media='screen' />
<link type="text/css" rel="stylesheet" href="" id="font-layout">
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/toastr.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/bootstrap-select.min.css';?>' type='text/css' id='skinSheet' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_core.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system.css';?>' type='text/css' media='screen' />
<link rel='stylesheet' href='<?php echo $this->app->getWebRoot() .'theme/mtek_system-responsive.css';?>' type='text/css' media='screen' />

<body>
<div class="page-wrapper">
  <div class="page-content" style="min-height:0px;">
    <!-- begin page header-->
    <div class="page-title-breadcrumb">
      <div class="page-header pull-left">
        <div class="page-title"><?=$this->config->module->name?></div>
      </div>
      <ol class="breadcrumb page-breadcrumb hidden-xs">
        <li><i class="fa fa-home"></i>&nbsp;<a href="index.html">个人中心</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="index.candor"><?=$this->config->module->name?>列表</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active"><?php echo $method=='edit'?'编辑':'新增' ?><?=$this->config->module->name?></li>
      </ol>
    </div>
    <!-- end  page header-->
    <!-- begin box-content -->
    <div class="box-content">
      <!--begin content-->
      <div class="content" style="padding-bottom: 0px;">
      	<div class="panel">
			<div class="panel-body">
			  <div class="row">
				 <form class="form-horizontal formTab" action="/<?=$this->config->module->moduleName?>/<?=$method?>?action=save" id="opform" name="opform"  method="post"  enctype="multipart/form-data" onsubmit="">
				    <input type="hidden" id="id" name="id" value="<?=$data['id']?>" />
					<div class="col-xs-12">
					  <ul class="list-group mail-action list-unstyled list-inline mbm">
						<li>
						  <h3 class="mbs mtm" style="color: #222"><?php echo $method=='edit'?'编辑':'新增' ?><?=$this->config->module->name?></h3>
						</li>
						<li class="pull-right">
						  <div class="row-fluid demo-btn"  id="operateBar">
						  <? if($method=="show"){ ?>
							<a href="/<?=$this->config->module->moduleName?>/<?=$method?>.candor?id=<?=$_GET["id"]?>" class="btn btn-info" id="edit">编辑</a>
						  <? } else{?>
						   <a href="javascript:void(0)" class="btn btn-default" id="edit" onclick="prompt('您是否想离开此页面？','question','url|确认|<?=$back?>')">取消</a>
							<input class="btn btn-success" type="button" value="保存" onclick="submitForm()"></input>
							<input style="display: none;" type="submit" id="submit_form" value="submit" />
						  <? } ?>
						  </div>
						</li>
					  </ul>
					  <div class="row">
						  <div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="showEasing">名称</label>
								<input type="text" class="form-control input-medium" placeholder="请输入XXX" name="name" id="name" value="<?=$data['name']?>" required="required"/>
							</div>
							<div class="form-group">
							  <label class="control-label" for="title">XXX</label><br />
							  <select class="form-control input-medium" data-style="btn-default" placeholder="请选择XXX" size="1" id="" name="" value="">
								<option value=""  <?=$data["active"]=="X"?'selected="selected"':""?>>XXX</option>
								<option value=""  <?=$data["active"]=="X"?'selected="selected"':""?>>XXX</option>
							  </select>
							</div>                          
						  </div>
						  <div class="col-md-4">                            
							<div class="form-group">
							  <label class="control-label" for="title">XXX</label>
							  <input type="text" class="form-control input-medium" placeholder="请输入XXX" name="" id="" value="" required="required"/>
							</div>
							<div class="form-group">
							  <label class="control-label" for="title">XXX</label>
							  <div class="radio">
								<label>
								<input id="optionsRadios4" name="active" type="radio" value="1" <?=$data["active"]=="1"||!isset($data["active"])?'checked="checked"':""?> />
								&nbsp; 生效 &nbsp; &nbsp; </label>
								<label>
								<input id="optionsRadios5" name="active" type="radio" value="0" <?=$data["active"]=="0"||!isset($data["active"])?'checked="checked"':""?> />
								&nbsp; 失效 </label>
							  </div>
							</div>
						  </div>
						  <div class="col-md-4">
							<div class="form-group">
							  <label class="control-label" for="hideEasing">XXX</label>
							  <input type="text" class="form-control input-medium" placeholder="请输入XXX" id="" name="" value="" required="required" />
							</div>
						  </div>
						  
						  <div class="col-md-11">
							<div class="form-group">
							  <label class="control-label" for="message">说明</label>
							  <textarea class="form-control" placeholder="请填写说明信息 ..." rows="3" id="notes" name="notes" ><?=$data["notes"]?></textarea>
							</div>
						  </div>
					  </div>
					</div>
				</form>
			  </div>
			</div>
		</div><!--end panel-->
      </div>
      <!--end content-->
    </div>
    <!-- end box-content -->
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
<script src="/js/bootstrap-select.min.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->

<!--CORE JAVASCRIPT-->
<script src="/js/mtek_core.js"></script>
<script src="/js/mtek_system-layout.js"></script>
<script src="/js/jquery-responsive.js"></script>
<script src="/js/candor.portal.js" ></script>
<script src="/js/candor.common.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/plugins/jquery-autocomplete/jquery.autocomplete.js.min.js"></script>

<script src="/js/plugins/datepicker/WdatePicker.js" ></script>
</body>
</html>
<script>

jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();

});
function submitForm(){	
	$("form").eq(0).submit(function(){
		// return false;
		prompt('加载等待','loading');
	});
	$("#submit_form").eq(0).click();
}

</script>

