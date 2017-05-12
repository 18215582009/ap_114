<?php
/**
 * Html模板文件
 *
 * @copyright   Copyright: 2010
 * @author      LuoDong<751450467@qq.com>
 * @package     CandorPHP
 * @version     $Id: index.html.php,v 1.4 2012/02/16 09:54:23 lj Exp $
 */
use lib\form\Form;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$this->config->module->name?></title>
    <?=Form::css()?>
</head>
<style>
.page-content {
    margin: 0px;
}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
	<!-- begin page header-->
	<!--div class="page-title-breadcrumb">
		<div class="page-header pull-left">
			<div class="page-title">项目管理</div>
		</div>
		<ol class="breadcrumb page-breadcrumb hidden-xs">
			<li><i class="fa fa-home"></i>&nbsp;<a href="/admin_entry/desktop">管理中心</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li><a href="#">***</a>&nbsp;&nbsp;</li>
		</ol>
	</div-->
    <?=lib\form\Form::bread_crumb(
		$title,
		$this->config->module->moduleName,
		$navlist=array(
			array('name'=>$this->config->module->name,'method'=>'index')
		));
	?>
	<!-- end  page header-->
	
	<!-- begin box-content -->
	<div class="box-content">
      <!--begin content-->
      <div class="content">
      	<div class="row">
            <div class="col-md-12">
            	<div class="panel">
                <div class="panel-body">
               	  <form action="<?=$handle?>?action=save" id="opform" name="opform"  method="post" class="form-horizontal">
                  <input type="hidden" id="id" name="id" value="<?=$Info['id']?>" />
                  <input type="text" id="page" name="page" value="<?=$page?>" />
                  <input type="text" id="code" name="code" value="<?=$Info['code']?>" />
                      <input type="text" id="ptype" name="ptype" value="<?=$Info['type']?>" />
                  <div class="row">
                     <!--p class="mlx plm">模块功能描述</p-->
                      <div class="col-md-4">
                        <?=Form::input('name',$Info['name'],$handle,'名称');?> 
                        <?=Form::radio($name='active',array(1=>'是',0=>'否'),empty($Info['active'])?1:$Info['active'],$handle,'是否激活');?>
                      </div><!-- col-md-4 -->
                      
                      <div class="col-md-4">
                      	<div class="form-group">
                            <label class="control-label col-md-3">所属上级</label>
                            <select data-style="btn-white" name="type" class="selectpicker col-md-9">
                                <?=$tree?>
                            </select>
                        </div>
                      </div><!-- col-md-4 -->
                      
                      <div class="col-md-4">
                        <?=Form::input('relate_code',$Info['relate_code'],$handle,'相关联代码');?>
                      </div><!-- col-md-4 -->
                  </div>
                  <hr />
                  </form>
                  <div class="row">
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-2">
                    <?=lib\form\Form::btn_main($this->config->module->confBtn,$handle,2);?>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
        </div>
      </div>
      <!--end content-->
    </div>
	<!-- end box-content -->
</div>
</div>

<?=Form::js();?>
<script>
jQuery(document).ready(function () {
    "use strict";
    JQueryResponsive.init();
    Layout.init();
	
	$('.selectpicker').selectpicker({
        iconBase: 'fa',
        tickIcon: 'fa-check'
    });
	
	$('#pm_type').selectpicker({
		iconBase: 'fa',
		tickIcon: 'fa-check'
	});
});

function vk(){
	$("#opform").submit();	
	//$("#opbtn").click();
}
function cancel(){
	prompt('您确认放弃操作嘛？','warning');
}

</script>
</body>
</html>
