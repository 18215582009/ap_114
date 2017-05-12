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
			array('name'=>$this->config->module->name,'method'=>'index?house_type=<?=$house_type?>')
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
                        </div>
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-md-4">
                              		<?=Form::input('title',empty($Info['title'])? '':$Info['title'],$handle,'标题');?>
                              		<?=Form::select('pright',$this->config->pright_option,empty($Info['pright'])? '':$Info['pright'],$handle,'产权类别');?>
                              		<?=Form::select_multiple('region',$region_option,empty($Info['region'])? '':$Info['region'],$handle,'片区');?>
                              		<?=Form::select('fitmen_type',$this->config->fitment_option,empty($Info['fitmen_type'])? '':$Info['fitmen_type'],$handle,'装修状况');?>	  	 
                              		<?=Form::input_time('build_year',empty($Info['build_year'])? '':$Info['build_year'],$handle,'建筑年代');?>  	
              									<?=Form::select('shi',$this->config->apa_room_option,empty($Info['shi'])? '':$Info['shi'],$handle,'室');?>
              									<?=Form::select('porch',$this->config->porch_option,empty($Info['porch'])? '':$Info['porch'],$handle,'阳台');?>
              									
                                  <?=Form::input('total_area',empty($Info['total_area'])? '':$Info['total_area'],$handle,'面积/m²');?>

                                    <?=Form::input('telphone',empty($Info['telphone'])? '':$Info['telphone'],$handle,'联系电话');?>
  <? if($house_type==1){

                                      echo Form::select('rent_way',$this->config->rent_way_option,empty($Info['rent_way'])? '':$Info['rent_way'],$handle,'租赁方式');



                                     }else{

                                      echo "";

                                     }



                                     ?>


                        
              



                              </div>
                                <div class="col-md-4">
                                <?=Form::input('address',empty($Info['address'])? '':$Info['address'],$handle,'地址');?>
                                <?=Form::select_multiple('pm_type[]',$this->config->pm_type_option,empty($Info['pm_type'])?0:$Info['pm_type'],$handle,'物业类型');?>
                                <?=Form::select('borough',$this->config->borough_option,empty($Info['borough'])? '':$Info['borough'],$handle,'行政区域');?>
                                <?=Form::input('house_struct',empty($Info['house_struct'])? '':$Info['house_struct'],$handle,'户型结构');?>
                                <?=Form::input('total_floor',empty($Info['total_floor'])? '':$Info['total_floor'],$handle,'总楼层');?>
                                <?=Form::select('ting',$this->config->ting_option,empty($Info['ting'])? '':$Info['ting'],$handle,'厅');?>

                                  <?=Form::select_multiple('facilities[]',$this->config->facilities,empty($Info['facilities'])?0:$Info['facilities'],$handle,'配套设施');?>


                              

                                    <?=Form::input('out_area',empty($Info['out_area'])? '':$Info['out_area'],$handle,'分摊面积/m²');?> 
                              
                                

  <?=Form::input('qq',empty($Info['qq'])? '':$Info['qq'],$handle,'QQ');?>


                                     <? if($house_type==1){

                                       echo Form::input_time('rent_live_date',empty($Info['rent_live_date'])? '':$Info['rent_live_date'],$handle,'入住时间');

                                     }else{

                                      echo "";

                                     }?>
			                  
			            
                              </div>



                                <div class="col-md-4">
                                	    <?=Form::input('reside',empty($Info['reside'])? '':$Info['reside'],$handle,'房源小区');?>
                                	    <?=Form::select('house_type',$this->config->house_type_option,empty($Info['house_type'])? 1 :$Info['house_type'],$handle,'房子类型');?>
                                	    <?=Form::select_multiple('circle',$this->config->circle_option,empty($Info['circle'])? '':$Info['circle'],$handle,'环线');?>

                                	    <?=Form::select('toward[]',$this->config->orientation_option,empty($Info['toward'])? '':$Info['toward'],$handle,'房屋朝向');?>


              										<?=Form::input('current_floor',empty($Info['current_floor'])? '':$Info['current_floor'],$handle,'所在楼层');?>
              										<?=Form::select('wei',$this->config->wei_option,empty($Info['wei'])? '':$Info['wei'],$handle,'卫');?>
                                    <?=Form::select('direction[]',$this->config->direction_option,empty($Info['direction'])? '':$Info['direction'],$handle,'方位');?>
              								 
                                    <? if($house_type ==1){
                                  
                                     echo Form::select('rent_deposit',$this->config->pay_way_option,empty($Info['rent_deposit'])? '':$Info['rent_deposit'],$handle,'押金');



                    
                                 

                                }else{
                                      echo ""; 
                                

                                } ?>


                                   
       	    

                                	   <? if($house_type==1){

                                  echo Form::input('price',empty($Info['price'])? '':$Info['price'],$handle,'售价/月');

                                }else{

                                 echo Form::input('price',empty($Info['price'])? '':$Info['price'],$handle,'售价/万');

                                }?>
                                <?=Form::input('email',empty($Info['email'])? '':$Info['email'],$handle,'email');?>
                               






                                	    
								</div>
                

          

         

      


								 <div class="col-md-11" >
								        <?=Form::textarea('selling_point',empty($Info['selling_point'])? '':$Info['selling_point'],$handle,'房屋卖点信息');?>
								</div>



  								 <div class="col-md-11">
								          <?=Form::textarea('note',empty($Info['note'])? '':$Info['note'],$handle,'房屋描述信息');?>
								</div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

 					<div class="row">
                      <div class="col-lg-12">
                          <div class="panel">
                              <div class="panel-heading">
                                  <div class="caption"><i class="glyphicon glyphicon-th-large"></i>综合参数</div>
                              </div>
                              <div class="panel-body">
                                  <div class="row">
                                      <div class="col-md-4">
                                          <?=Form::radio('flag',$this->config->flag_option,empty($Info['flag'])?0:$Info['flag'],$handle,'是否审核');?>
                              			  <?=Form::radio('is_top',$this->config->flag_option,empty($Info['flag'])?0:$Info['flag'],$handle,'是否置顶');?>
                             
                                      </div>
                                      <div class="col-md-4">
					                              
		                                <?=Form::radio('is_recommend',$this->config->flag_option,empty($Info['flag'])?0:$Info['flag'],$handle,'是否推荐');?>
		                                <?=Form::radio('elevator',$config->boole_option,empty($Info['elevator'])?0:$Info['elevator'],$handle,'是否有电梯');?>
	
                              			</div>
                              			<div class="col-md-4">
                              			<?=Form::radio('is_tube',$config->boole_option,empty($Info['is_tube'])?0:$Info['is_tube'],$handle,'是否在地铁沿线');?>
                              			<?=Form::radio('map_show',$config->map_show_option,empty($Info['map_show'])?0:$Info['map_show'],$handle,'是否显示在地图');?>

                              		
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
</body>
</html>
