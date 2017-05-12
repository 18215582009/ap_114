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
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$header?></title>
<?=Form::css();?>
</head>
<style>
.page-content {
    margin: 0px;
}
.bootstrap-select.btn-group:not(.input-group-btn), .bootstrap-select.btn-group[class*="span"]{ margin-bottom:0px;}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
	<!-- begin box-content -->
	<div class="box-content">
      <!--begin content-->
      <div class="content">
      	<form action="<?=$this->app->getMethodName()?>?action=save" id="opform" name="opform"  method="post" enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" value="<?=$Info['id']?>" name="id" id="id" />
        <input type="hidden" value="<?=$Info['project_id']?>" name="project_id" id="project_id">
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
              	<div class="panel-heading">
                    <div class="caption"><?=$header?></div>
                    <div class="pull-right"><?=Form::btn_alert($this->config->module->huxingBtn,$handle);?></div>
                </div>
                <div class="panel-body">
                  	<div class="row">
                        <div class="col-md-12">
                            <? //Form::radio('pm_type', $this->config->pm_type_option,empty($Info['pm_type'])?0:$Info['pm_type'],$handle,'物业类型');?>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="pm_type">物业类型</label>
                                <div class="radio col-md-9">
                                    <input name="pm_type" id=pm_type_22308 type="radio" value="22308" checked /> 住宅 &nbsp;&nbsp;
                                    <input name="pm_type" id=pm_type_22301 type="radio" value="22301" /> 别墅 &nbsp;&nbsp;
                                    <input name="pm_type" id=pm_type_22304 type="radio" value="22304" /> 商铺 &nbsp;&nbsp;
                                    <input name="pm_type" id=pm_type_22305 type="radio" value="22305" /> 写字楼 &nbsp;&nbsp;
                                </div>
                            </div>
                        <div class="col-md-4">
                            <?=Form::input('ave_price',$Info['ave_price'],$handle,'平均价（元/平米）');?>
                            <?=Form::radio('status',$this->config->price_status_option,empty($Info['status'])?1:$Info['status'],$handle,'价格类型');?>
                        </div>
                             
                        <div class="col-md-4">
                            <?=Form::input('max_price',$Info['max_price'],$handle,'最高价（元/平米）');?>
                            <?=Form::input_time('start_date',$Info['start_date'],$handle,'时间区间开始');?>
                        </div>
                             
                        <div class="col-md-4">
                             <?=Form::input('min_price',$Info['min_price'],$handle,'最低价（元/平米）');?>
                             <?=Form::input_time('end_date',$Info['end_date'],$handle,'时间区间结束');?>
                        </div>
                    </div>
                    
                    
                </div>
              </div>
            </div>
          </div>
           
            
		</form> 
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
	
	$('.selectpicker').selectpicker({
		iconBase: 'fa',
		tickIcon: 'fa-check'
	});
});

function vk(){
    var flag = true;
    var item = $('input[@name=pm_type][@checked]').val();
    if(item>0){
        alert('请选择物业类型！');
        return false;
    }

    if(isNull($('#max_price').val()) || isNull($('#min_price').val()) || isNull($('#ave_price').val())){
        alert('价格必须填写！');
        return false;
    }

    if(!isInteger($('#max_price').val())){
        alert('最大价格必须为整数！');
        return false;
    }
    if(!isInteger($('#min_price').val())){
        alert('最小价格必须为整数！');
        return false;
    }
    if(!isInteger($('#ave_price').val())){
        alert('评价价格必须为整数！');
        return false;
    }
	$("#opform").submit();
}
function cancel(){
	prompt('您确认放弃操作嘛？','warning');
}
</script>
</body>
</html>
