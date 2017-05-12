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
                            <?=Form::input('ting',$Info['ting'],$handle,'厅');?>
                            <?=Form::input('balcony',$Info['balcony'],$handle,'阳台');?>
                            <?=Form::input('price_apa_ini',$Info['price_apa_ini'],$handle,'初期总价');?>
                            <?=Form::input('price_apa_ini_date',$Info['price_apa_ini_date'],$handle,'初期价格采集时间');?>
                        </div>
                             
                        <div class="col-md-4">
                            <?=Form::input('shi',$Info['shi'],$handle,'室');?>
                            <?=Form::input('area_constru',$Info['area_constru'],$handle,'建筑面积');?>
                            <?=Form::input('price_apa_cur',$Info['price_apa_cur'],$handle,'当期价格');?>
                            <?=Form::input('price_apa_cur_date',$Info['price_apa_cur_date'],$handle,'当期价格采集时间');?>
                            
                        </div>
                             
                        <div class="col-md-4">
                             <?=Form::input('wei',$Info['wei'],$handle,'卫');?>
                             <?=Form::input('area_net',$Info['area_net'],$handle,'套内净面积');?>
                             <?=Form::select('apa_ori',$this->config->apa_ori_option,empty($Info['apa_ori'])?0:$Info['apa_ori'],$handle,'朝向');?>
							 <?=Form::radio('flag',$this->config->flag_option,empty($Info['flag'])?0:$Info['flag'],$handle,'是否有效');?>
                        </div>
                    </div>
                    
                    <div class="row">
                    <!-- begin other-config -->
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_default_1" data-toggle="tab">户型图</a></li>
                            <li><a href="#tab_default_2" data-toggle="tab">属性</a></li>
                            <li><a href="#tab_default_3" data-toggle="tab">户型评分</a></li>
                        </ul>
                        <div class="tab-content">
                        	<div id="tab_default_1" class="tab-pane active">
                            	<div class="row">
                                	<div class="col-md-2" >
                                        <div class="thumbnail">
                                            <img src="<?=empty($Info['img_diagram_url'])?'/images/pic_default.jpg':$Info['img_diagram_url'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    	<div class="form-group">
                                    	<label class="control-label" for="img_diagram_url">户型图</label>
	  									<input type="file"  value="" placeholder="请上传户型图" name="img_diagram_url" id="img_diagram_url" class="form-control " />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                    	<div class="thumbnail">
                                    	<img src="<?=empty($Info['img_apa_loc_url'])?'/images/pic_default.jpg':$Info['img_apa_loc_url'];?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    	<div class="form-group">
                                    	<label class="control-label" for="img_apa_loc_url">户型位置图</label>
	  									<input type="file"  value="" placeholder="请上传户型位置图" name="img_apa_loc_url" id="img_apa_loc_url" class="form-control " />
                                        </div>
                                    </div>
                                	<div class="col-md-12">
									<?=Form::textarea('des',$Info['des'],$handle,'户型(图)描述');?>
                                    </div>
                                </div>
                            </div>
                            <div id="tab_default_2" class="tab-pane">
                            	<div class="row">
                                    <div class="col-md-4">
                                        <?=Form::input('no_apa',$Info['no_apa'],$handle,'户型编号');?>
                                        <?=Form::input('layer_num',$Info['layer_num'],$handle,'层数');?>
                                        <?=Form::input('total_apa',$Info['total_apa'],$handle,'共有套数');?>
                                    </div>
                                         
                                    <div class="col-md-4">
                                        <?=Form::input('apaunique',$Info['apaunique'],$handle,'户型标签');?>
                                        <?=Form::input('layer_num',$Info['layer_num'],$handle,'层数');?>
                                        <?=Form::radio('is_apartment',$this->config->boole_option,empty($Info['is_apartment'])?0:$Info['is_apartment'],$handle,'是否公寓');?>
                                    </div>
                                         
                                    <div class="col-md-4">
                                         <?=Form::select('apa_type',$this->config->apa_type_option,empty($Info['apa_type'])?0:$Info['apa_type'],$handle,'户型类型');?>
                                         <?=Form::input('price_dif_floor',$Info['price_dif_floor'],$handle,'单价楼层差');?>
                                    </div>
                                    
                                </div>
                            </div>
                            <div id="tab_default_3" class="tab-pane">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?=Form::input('span_liv',$Info['span_liv'],$handle,'起居室楼间距');?>
                                        <?=Form::input('apa_light',$Info['apa_light'],$handle,'采光评分');?>
                                        <?=Form::input('cv',$Info['cv'],$handle,'便利性');?>
                                        <?=Form::input('ec',$Info['ec'],$handle,'环境舒适性');?>
                                    </div>
                                         
                                    <div class="col-md-4">
                                        <?=Form::input('span_bed',$Info['span_bed'],$handle,'主卧楼间距');?>
                                        <?=Form::input('apa_vent',$Info['apa_vent'],$handle,'通风评分');?>
                                        <?=Form::input('rc',$Info['rc'],$handle,'房间舒适性');?>
                                        
                                    </div>
                                         
                                    <div class="col-md-4">
                                         <?=Form::input('span_sec',$Info['span_sec'],$handle,'次卧楼间距');?>
                                         <?=Form::select('view_liv',$this->config->view_liv_option,empty($Info['view_liv'])?0:$Info['view_liv'],$handle,'起居室景观利用');?>
                                         <?=Form::select('view_bed',$this->config->view_liv_option,empty($Info['view_bed'])?0:$Info['view_bed'],$handle,'主卧景观利用');?>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                    <!-- end other-config -->
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

<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
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
