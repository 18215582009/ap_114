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
                <form action="<?=$handle?>.html?action=save" id="opform" name="opform"  method="post" class="form-horizontal">
                  <input type="hidden" value="<?=$Info['id']?>" name="id" id="id" />
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="panel">
                        <div class="panel-heading">
                            <div class="caption"><i class="glyphicon glyphicon-th-large"></i>基础信息</div>
                            <!--div class="action-group btn-group pull-right mtm mbm">
                                <a class="btn btn-default mrm"><i class="fa fa-bullhorn mrs"></i>动态</a>
                                <a class="btn btn-default mrm"><i class="fa fa-cny mrs"></i>价格</a>
                                <a class="btn btn-default mrm"><i class="fa fa-home mrs"></i>户型</a>
                                <a class="btn btn-default mrm"><i class="fa fa-picture-o mrs"></i>图库</a>
                                <a class="btn btn-default mrm"><i class="fa fa-th mrs"></i>楼盘表</a>
                            </div-->
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-md-4">

                                <?=Form::input('name',$Info['name'],$handle,'客户名称');?>



                                   <?=Form::select('type',$this->config->reserve_type,empty($Info['type'])? '':$Info['type'],$handle,'类型');?>

                                <?=Form::input('other_project',$Info['other_project'],$handle,'感兴趣的楼盘');?>
                                <?=Form::input('price',$Info['price'],$handle,'期望价格/万');?>
                                <?=Form::input('address',$Info['address'],$handle,'客户联系地址');?>
                                <?=Form::select('circle',$this->config->circle_option,empty($Info['circle'])? '':$Info['circle'],$handle,'环域');?> 
                                <?=Form::input('from_page',$Info['from_page'],$handle,'资源来源');?>
                                <?=Form::input('angel_name',$Info['angel_name'],$handle,'天使对接顾问');?>



                              </div>
                              <div class="col-md-4">

                                <?=Form::input('tel',$Info['tel'],$handle,'客户电话');?>

                                <?
                                if($Info['type']=="3" ){

                                 Form::select('subtype',$this->config->reserve_subtype,empty($Info['subtype'])? '':$Info['subtype'],$handle,'子类型(限订阅)');

                                }else {

                                  echo "";
                                }
                               


                                ?>

                                <?=Form::input('will',$Info['will'],$handle,'客户意向');?>
                                <?=Form::input('mode',$Info['mode'],$handle,'期望户型');?>
                                <?=Form::input('email',$Info['email'],$handle,'客户邮箱');?>
                                <?=Form::input('region',$Info['region'],$handle,'意向区域');?>
                                <?=Form::input('loan_money',$Info['loan_money'],$handle,'货款金额');?>
                                <?=Form::input('order_no',$Info['order_no'],$handle,'商户订单号');?>
                                <?=Form::radio('order_status',$this->config->order_status_option,empty($Info['order_status'])?0:$Info['order_status'],$handle,'订单状态');?>

                              </div>
                              <div class="col-md-4">

                                <?=Form::input('project_name',$Info['project_name'],$handle,'项目名称');?> 
                                <?=Form::input('area',$Info['area'],$handle,'期望面积/m²');?> 
                                <?=Form::input('job',$Info['job'],$handle,'客户职业');?> 
                                <?=Form::select('pay_type',$this->config->pay_type_option,empty($Info['pay_type'])? '':$Info['pay_type'],$handle,'付款方式');?> 
                                <?=Form::input('direction',$Info['direction'],$handle,'方向');?> 
                                <?=Form::input('loan_use',$Info['loan_use'],$handle,'货款用桶');?> 
                                <?=Form::input('money',$Info['money'],$handle,'支付定金');?>
                                <?=Form::radio('flag',$this->config->flag_option,empty($Info['flag'])?0:$Info['flag'],$handle,'是否有效');?>

                              </div>

                              <div class="col-md-11" >
                                    <?=Form::textarea('note',empty($Info['note'])?'':$Info['note'],$handle,'说明');?>
                              </div>

                                <div class="col-md-11" >
                                    <?=Form::textarea('angel_uid',empty($Info['angel_uid'])?'':$Info['angel_uid'],$handle,'顾问解答反馈');?>
                               </div>

                              <div class="col-md-11" >
                                    <?=Form::textarea('reply',empty($Info['reply'])?'':$Info['reply'],$handle,'临时回复信息');?>
                               </div>

                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

               
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="panel">
                       
                        <div class="panel-body">
                             
                             <?=lib\form\Form::btn_main($this->config->module->btn,$handle,2);?>
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
    $("#type").change(function(){
      if($(this).val()==3){
      $("#subtype").removeAttr("disabled");
        
      }else{
        
        $("#subtype").attr("disabled","disabled");

      }

    })



})
</script>



</body>
</html>
