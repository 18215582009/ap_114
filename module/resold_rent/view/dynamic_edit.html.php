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
      	<form action="<?=$this->app->getMethodName()?>?action=save" id="opform" name="opform"  method="post" enctype="multipart/form-data">
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
                        <div class="col-md-4">
                            <?=Form::input('title',$Info['title'],$handle,'动态标题');?>
                            <?=Form::input_time('start_date',$Info['start_date'],$handle,'开始时间');?>
                        </div>
                             
                        <div class="col-md-4">
                            <?=Form::select('type',$this->config->dynamic_type_option,$Info['type'],$handle,'信息类型');?>
                            <?=Form::input_time('end_date',$Info['end_date'],$handle,'结束时间');?>
                        </div>
                             
                        <div class="col-md-4">
                        	 <?=Form::select('from',$this->config->dynamic_from_option,$Info['from'],$handle,'信息来源');?>
                             <?=Form::radio('flag',$this->config->flag_option,empty($Info['flag'])?1:$Info['flag'],$handle,'是否有效');?>
                        </div>
                        <div class="col-md-12">
                        	<?=Form::textarea('content',$Info['content'],$handle,'信息内容');?>
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
	$("#opform").submit();	
	//$("#opbtn").click();
}
function cancel(){
	prompt('您确认放弃操作嘛？','warning');
}

</script>
</body>
</html>
