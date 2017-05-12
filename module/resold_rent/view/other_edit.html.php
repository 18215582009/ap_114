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
<title><?=$header?></title>
<?=Form::css()?>
</head>
<style>
.page-content {margin: 0px;}
.panel{margin-bottom:0px;}
.caption{font-weight:normal}
.bootstrap-select.btn-group:not(.input-group-btn), .bootstrap-select.btn-group[class*="span"]{ margin-bottom:0px;}
</style>
<body>
<div class="page-wrapper">

<div class="page-content">
	<!-- begin page header-->
	<?=lib\form\Form::bread_crumb(
		$header,
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
	
    
	<? if($handle=='edit'){ ?>
    <div class="tabbable-line-wrapper">
        <div class="tabbable-line">
            <?=$tab?>
            <div class="tab-content">
                <div id="default" class="tab-pane active">
    <? }?>
                    <div id="default" class="tab-pane fade in active">
                        <form action="<?=$handle?>PmType.html?action=save" id="opform" name="opform"  method="post" class="form-horizontal">
                          <input type="text" value="<?=$Info['id']?>" name="id" id="id" />
                            <input type="text" value="<?=$pmType?>" name="pm_type" id="pm_type"/>
                            <input type="text" value="<?=$Info['project_id']?>" name="project_id" id="project_id"/>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                      <div class="col-md-4">
                                          <?=Form::select('status',$this->config->status_option,empty($Info['status'])?0:$Info['status'],$handle,'楼盘状态');?>
                                          <?=Form::input_time('open_date',$Info['open_date'],$handle,'开盘时间');?>
                                          <?=Form::input_time('live_date',$Info['live_date'],$handle,'入住时间');?>
                                      </div>
                                      <div class="col-md-4">
                                          <?=Form::input('total_area',$Info['total_area'],$handle,'总建筑面积');?>
                                          <?=Form::input('total_dong',$Info['total_dong'],$handle,'总栋数');?>
                                          <?=Form::input('total_house',$Info['total_house'],$handle,'总套数');?>
                                      </div>
                                      <div class="col-md-4">
                                          <?=Form::input('slogan',$Info['slogan'],$handle,'宣传口号');?>
                                          <?=Form::input('elevator',$Info['elevator'],$handle,'电梯配置');?>
                                          <?=Form::input('use_age',$Info['use_age'],$handle,'产权年限');?>
                                      </div>
                                    </div>
                                    <div class="text-right ptm">
                                        <button class="btn btn-info" type="button" id="save" onclick="$('#opform').submit();">保存</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                    </div>
    <? if($handle=='edit'){ ?>
                </div>
            </div>
        </div>
    </div>
	<? } ?>

      	 
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
	
	$('#live_date').datepicker();
	$('#open_date').datepicker();

	
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
