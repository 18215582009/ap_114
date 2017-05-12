<?php
use lib\form\Form;
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <? if(($house_type == 1)) {?> <?=$this->config->module->rentname;?> <?} else {?>  <?=$this->config->module->salename;?>  <? } ?>-个人中心</title>
    <?=Form::cssmin();?>
    <link rel="Stylesheet" href="/js/vendor/AutoComplete/styles.css" />
    <link rel="Stylesheet" href="/js/vendor/bootstrap-datepicker/datepicker.css" />
    <link rel='stylesheet' href='/theme/client/css/user_center.css' type='text/css' media='screen' />
    <link href="/theme/agency/css/hs_pub.css" rel="stylesheet">
</head>
<style>
    /*字体大小 颜色*/
    .f_brown{color:#885B20;}
    .f_orange{color:#FF6604;}
    .f_green{color:#74A700;}
    .f_greenblack{color:#4A7911;}
    .f_brownblack{color:#5A493F}
    .f_browndark{color:#7D3703}
    .f_grayblack{color:#7D7F7C}
    .f_red{color:#FF0000;}
    .f_blod{font-weight:bold;}
    .f_I{font-style: italic;}
    .f_14{font-size:14px;}
    .f_20{font-size:20px;}

    .publish_wec{height:26px;width:700px;font-size:14px;font-weight:bold}
    .publish_des{height:36px;width:600px;padding-left:24px;color:#4A7911;font-size:14px;font-weight:bold}
    .publish_title{height:28px;line-height:28px;font-weight:bold;font-size:16px;padding-top:3px;}
    .publish_title .pub_info{float:right;color:#FF0000;font-size: 12px;font-weight: 100;width: 610px;}
    .publish_title .pub_info span{color:#7E7C7D;margin-left: 30px;}

    .arrow_line{height:10px;width:100%;margin-top:5px;background:url(../theme/client/img/arrow_line.gif) repeat-x 5px 0;}
    .sharp_line{height:10px;width:100%;background:url(../theme/client/img/arrow_line.gif) repeat-x;}
    .shadow_line{height:10px;width:100%;background:url(/theme/client/img/shadow_line_bg.png) no-repeat 40px;margin-bottom: 20px;}
    .dashed_line{height:10px;width:100%;border-top: 1px dashed #C3AB87; margin-bottom: 10px;}
    .remark{color:#7D7F7C;}

    .showpicfile td{width:250px;}
    .showpicfile td a{float:right;margin:40px 20px;text-decoration: underline;width:40px;overflow: hidden;}
    .showpicfile .imgBorder{border:solid 1px #D0D0D0;padding:2px;display: table-cell;width:150px;height:100px;text-align: center;vertical-align: middle;*display:inline-block;line-height: 150px;font-size: 75px;background: url('../images/loading.gif') no-repeat center center;}

    form{display:inline;margin:0;padding:0}
    textarea,input,select{font:12px Arial;text-align:left;}
    .form-control{border:1px solid #C8A680;}
    .input-small{width: 150px;display: inline;}
    .input-xsmall{display: inline;}
</style>
<body class="font-source-sans-pro sidebar-color-white">
<div class="fluid">
    <?php include '../../company_center/view/navigation.html.php';?>

    <div id="wrapper"><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">

            <!--BEGIN SIDEBAR MAIN-->
            <?php include '../../user_center/view/left_easy.html.php';?>
            <!--END SIDEBAR MAIN-->

            <!--BEGIN PAGE CONTENT-->
            <div class="page-content"><!--BEGIN TITLE & BREADCRUMB PAGE-->


                <!-- begin page header-->
               <? if(($house_type == 1)) {?>

                    <?=lib\form\Form::bread_crumb(
                        $this->config->module->rentname,
                        'user_resold_sale');
                    ?>

                <?} else {?>
                    <?=lib\form\Form::bread_crumb(
                        $this->config->module->salename,
                        'user_resold_sale');
                    ?>

                <? } ?>
                <!-- end  page header-->
                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="right_content">
                                    <div class="publish_wec">欢迎来到FC114</div>
                                    <div class="publish_des">截止目前为止，已有11354位用户选择FC114</div>
                                    <form class="form-horizontal" name="form1" method="post" action="save?action=<?=$handle?>" enctype="multipart/form-data"  onSubmit="return submitForm()">
                                        <input type="hidden" name="house_type" value="<?=$house_type?>" id="house_type">
                                         <input type="hidden" name="act" value="<?=$handle?>" id="handle">


                                        <!--<input type="hidden" name="state" value="updata">-->

                                        <? if(isset($info['district_id'])) { ?>
                                        <input type="hidden" name="district_id" id="district_id" value="" class="form-control">
                                        <? }else {?>
                                        <input type="hidden" name="district_id" id="district_id" value="" class="form-control">

                                         <? } ?>

                                         <? if (isset($info['id']) ) {?>
                                        <input type="hidden" name="id" value="<?=$info['id']?>" class="form-control">
                                        <?} else {?>

                                           <input type="hidden" name="id" value="" class="form-control">
                                        <? } ?>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="publish_title">
                                                    <div class="pub_info">*必填信息<span>精确完整的标题是您增加点击量，吸引客户注意力第一步！</span></div>
                                                    <span class="f_brown">基础信息</span>
                                                </div>

                                                <div class="dashed_line"></div>



                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>标题:</label>
                                                    <div class="col-md-5">

                                                        <? if (isset($info['title'])){?>

                                                        <input type="text" name="title"  class="int-text" value="<?=$info['title']?>" id="title" placeholder="如：金堂锦绣香江清水房套二(可变套三)800元出租"  maxlength="25" size="40" onkeyup="countTextLength('title',25)">

                                                        <?}  else { ?>

                                                          <input type="text" name="title" value=""   class="int-text"  id="title" placeholder="如：金堂锦绣香江清水房套二(可变套三)800元出租"  maxlength="25" size="40" onkeyup="countTextLength('title',25)">

                                                        <? } ?>

                                                    </div>
                                                    <div class="col-md-5 remark">
                                                        此处最大能输入<span class="text-orange">25</span>个字,可输入<span class="org" id="titleTEXT">25</span>个字
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>小区名称:</label>
                                                    <div class="col-md-5">
                                                        <? if (isset($info['reside'])) {?>

                                                        <input type="text" name="reside" value="<?=$info['reside']?>"  placeholder="小区名称" id="reside" class="int-text" maxlength="25" size="40" autocomplete="off">
                                                        <?} else {?>

                                                           <input type="text" name="reside" value=""  placeholder="小区名称" id="reside" class="int-text" maxlength="25" size="40" autocomplete="off">

                                                        <? } ?>


                                                    </div>
                                                    <div class="col-md-5 remark">
                                                        此处最大能输入<span class="text-orange">25</span>个字,可输入<span class="org" id="resideTEXT">25</span>个字
                                                    </div>
                                                </div>

                                                <div class="arrow_line">
                                                    <img src="/theme/client/img/arrow1.gif" style="margin-left:30px;">
                                                </div>



                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>房源地址:</label>
                                                    <div class="col-md-5">
                                                        <? if(isset($info['address'])) { ?>
                                                        <input type="text" name="address" id="address"   class="int-text"maxlength="50" size="40" onkeyup="countTextLength('address',50)" value="<?=$info['address']?>">
                                                        <?} else { ?>

                                                        <input type="text" name="address" id="address"  class="int-text" maxlength="50" size="40" onkeyup="countTextLength('address',50)" value="">

                                                        <? } ?>

                                                    </div>
                                                    <div class="col-md-5 remark">
                                                        此处最大能输入<span class="text-orange">25</span>个字,可输入<span class="org" id="addressTEXT">25</span>个字
                                                    </div>
                                                </div>





                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>区&nbsp;&nbsp;&nbsp;&nbsp;县:</label>
                                                    <div class="col-md-5">
                                                        <select name="borough" id="borough1" class="int-text" style="width:120px;" width="100px;">

                                                                <? foreach($this->config->borough_option as $key=>$item) { 
                                                                   
                                                                        $seleted = '';
                                                                    if($key==$info['borough'] && !empty($info['borough'])){
                                                                        $seleted='selected';
                                                                        echo " <option label=".$item." value=".$info['borough']." selected=".$seleted.">".$item."</option>";
                                                                     }else{
                                                                        echo " <option label=".$item." value=".$key." >".$item."</option>";

                                                                     }

                                                                   
                                                                   
                                                                }
                                                                ?>

 
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>片&nbsp;&nbsp;&nbsp;&nbsp;区:</label>
                                                    <div class="col-md-5">
                                                        <select id="area" name="area" class="int-text" style="width:120px;" >


                                                                <? foreach($region_option as $key=>$item) { 
                                                                        $seleted = '';
                                                                         if($key==$info['region'] && !empty($info['region'])){
                                                                            $seleted='selected';
                                                                            echo " <option label=".$item." value=".$info['region']." selected=".$seleted.">".$item."</option>";
                                                                         }else{
                            
                                                                            
                                                                            echo " <option label=".$item." value=".$key." >".$item." </option>";

                                                                     }

   
                                                                }
                                                                ?>


                                                        </select>
                                                    </div>
                                                </div>




                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name">地图坐标:</label>
                                                    <div class="col-md-7">
                                                        <? if(isset($info['map_x'])) { ?>
                                                        <input type="text" name="map_x" value="<?=$info['map_x']?>" id="map_x" class="int-text"  style="width:100px;" readonly=""> -
                                                        <?} else {?>

                                                         <input type="text" name="map_x" value="" id="map_x" class="int-text" style="width:100px;" readonly=""> -

                                                        <?} ?>


                                                        <? if (isset($info['map_y'])) {?>

                                                        <input type="text" name="map_y" value="<?=$info['map_y']?>" id="map_y" class="int-text" style="width:100px;" readonly="">

                                                     

                                                         
                                                        <?} else {?>

                                                          <input type="text" name="map_y" value="" id="map_y" class="int-text" style="width:100px;" readonly="">


                                                        <?}?>

                                                       <!-- <span title="请选择地图坐标" class="img-cur" id="choseMap"><a><span color="#497812">选择地图位置</span></a></span>-->


                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name">交通情况:</label>
                                                    <div class="col-md-7">
                                                        <? if(isset($info['traffic'])) {?>
                                                        <input type="text" name="traffic" value="<?=$info['traffic']?>" id="traffic" class="int-text" size="74">
                                                        <?} else {?>
                                                        <input type="text" name="traffic" value="" id="traffic" class="int-text" size="74">

                                                        <? } ?>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name">环&nbsp;&nbsp;&nbsp;&nbsp;线:</label>
                                                    <div class="col-md-7">
                                                        <select id="circle" name="circle" class="int-text" style="width:120px;">

                                                               <? foreach($this->config->circle_option as $key=>$item) {
                                                                
                                                                     $selected = '';
                                                                    if($key == $info['circle'] &&!empty($info['circle'])){
                                                                        $selected = "selected";
                                                                        echo " <option label=".$item." value=".$info['circle']." selected=".$selected.">".$item."</option>";

                                                                    }else{

                                                                    echo " <option label=".$item." value=".$key." >".$item."</option>";

                                                                }
                                              
                                                      
                                                            }
                                                            ?>

                                                     
                                                        </select>
                                                    </div>
                                                </div>






                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name">地铁沿线:</label>
                                                    <div class="col-md-7">
                                                        <select id="tube" name="tube" class="int-text" style="width:120px;">

                                                        
                                                               <? foreach($this->config->tube_option as $key=>$item) {
                                                               
                                                                    $selected='';
                                                                    if($key == $info['tube'] &&!empty($info['tube'])){
                                                                        $selected = 'selected';
                                                                        echo " <option label=".$item." value=".$info['tube']." selected=".$selected.">".$item."</option>";


                                                                    }else{

                                                                      echo " <option label=".$item." value=".$key." >".$item."</option>";

                                                                }

                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>




                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name">周边配套:</label>
                                                    <div class="col-md-7">

                                                        <? if (!empty($info['school']) or !empty($info['market']) or !empty($info['hospital']) or !empty($info['postoffice']) or !empty($info['bank']) or !empty($info['college'])){?>

                                                        <textarea name="trade_circle" id="trade_circle" class="int-text" style=" height:80px; margin-top:5px; ">
学校：<?=$info['school']?>|商场：<?=$info['market']?>|医院：<?$info['hospital']?>|邮局：<?=$info['postoffice']?>|银行：<?=$info['bank']?>|其他：<?=$info['hotel']?>,<?=$info['college']?>

                                                        </textarea>

                                                        <?} else {?>

                                                        <textarea name="trade_circle" id="trade_circle" class="int-text" style="width:300px; height:80px; margin-top:5px;">

                                                        
                                                        </textarea>


                                                        <? } ?>

                                                        
                                                    </div>
                                                </div>


                                                <div class="sharp_line"></div>



                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>物业类型:</label>
                                                    <div class="col-md-8">


                                                        

                                                          <? foreach($this->config->pm_type_option as $key=>$item) {
                                                          
                                                                $checked = '';
                                                                if($key == $info['pm_type'] && !empty($info['pm_type'])){
                                                                    $checked="checked";
                                                                    echo "<label><input type='radio' name='pm_type' id ='pm_type' value=".$info['pm_type']." checked=".$checked." style='margin-left:5px;'>$item</label>";

                                                                }else{
                                                                   echo "<label><input type='radio' name='pm_type' id ='pm_type' value=".$key." style='margin-left:5px;'>$item</label>";

                                                            }

                                                            }
                                                            ?>

                                                    </div>
                                                </div>

                                                <? if($house_type==1){?>



                                                  <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>租赁方式:</label>
                                                    <div class="col-md-5">
                                                        <select id="rent_way" name="rent_way" class="int-text" style="width:120px;">

                                                               <? foreach($this->config->rent_way_option as $key=>$item) {

                                                               
                                                                 $selected='';
                                                            
                                                            if($key==$info['rent_way'] && !empty($info['rent_way'])){
                                                                $selected='selected';
                                                                  echo " <option label=".$item." value=".$info['rent_way']." selected=".$selected.">".$item."</option>";
                                                               
                                                            }else{
                                                                 echo " <option label=".$item." value=".$key." >".$item."</option>";
                                                               
                                                            }
 
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>
                                               

                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>押金:</label>
                                                    <div class="col-md-5">
                                                        <?if(!empty($info['deposit'])) {?>

                                                             <input type="text" name="deposit"  class="int-text" value="<?=$info['deposit']?>" id="deposit" placeholder="请填写数字" >

                                                             <?} else {?>


                                                              <input type="text" name="deposit" class="int-text" value="" id="deposit"  placeholder="请填写数字">


                                                             <? } ?>
                                                              
                                                      
                                                    </div>
                                                </div>

                                                  <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>收费:</label>
                                                    <div class="col-md-5">
                                                        <?if(!empty($info['price'])) {?>

                                                             <input type="text" name="price" value="<?=$info['price']?>" id="price"  class="int-text" placeholder="请填写数字">

                                                             <?} else {?>


                                                              <input type="text" name="price" value="" id="price"  class="int-text" placeholder="请填写数字">


                                                             <? } ?>
                                                              
                                                      
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>押金方式:</label>
                                                    <div class="col-md-5">
                                                        <select id="pay_way" name="pay_way"  class="int-text" style="width:120px;">

                                                               <? foreach($this->config->pay_way_option as $key=>$item) {

                                                                 echo " <option label=".$item." value=".$key." >".$item."</option>";
 
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                </div>

                                              





                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>入住时间:</label>
                                                    <div class="col-md-5">
                                                        <?if(!empty($info['rent_live_date'])) {?>

                                                        <input type="text" name="rent_live_date" value="<?=$info['rent_live_date']?>" id="rent_live_date" class="int-text datepicker" realvalue="" format="dd-mm-yyyy"> 

                                                        <?} else {?>

                                                         <input type="text" name="rent_live_date" value="" id="rent_live_date" class="int-text datepicker" realvalue="" format="dd-mm-yyyy">

                                                        <? } ?>


                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>最短期限:</label>
                                                    <div class="col-md-5">
                                                        <?if(!empty($info['limit_day'])) {?>

                                                        <input type="text" name="limit_day" value="<?=$info['limit_day']?>" id="limit_day" class="int-text" placeholder="请填写天数">

                                                        <?} else {?>

                                                         <input type="text" name="limit_day" value="" id="limit_day" class="int-text"  placeholder="请填写天数">

                                                        <? } ?>

                                                    </div>
                                                </div>



                                                <?}else{?>



                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>总&nbsp;&nbsp;&nbsp;&nbsp;价:</label>
                                                    <div class="col-md-5">

                                                        <? if(null!==$info['price']) {?>


                                                        <input type="text" name="price" value="<?=$info['price']?>" id="price" class="int-text min-text">
                                                        万元/套

                                                        <?} else {?>
                                                          <input type="text" name="price" value="" id="price" class="int-text min-text">
                                                        万元/套


                                                        <?}?>


                                                    </div>
                                                </div>


                                                <?}?>



                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>楼&nbsp;&nbsp;&nbsp;&nbsp;层:</label>
                                                    <div class="col-md-5">

                                                        <? if(null!==$info['current_floor']){?>

                                                        第&nbsp;<input type="text" name="current_floor" value="<?=$info['current_floor']?>" id="current_floor" class="int-text min-text" size="2" maxlength="2">&nbsp;层&nbsp;&nbsp;共
                                                        <?} else {?>


                                                         第&nbsp;<input type="text" name="current_floor" value="" id="current_floor" class="int-text min-text"  size="2" maxlength="2">&nbsp;层&nbsp;&nbsp;共

                                                        <? } ?>

                                                        <? if(null!==$info['total_floor']) {?>

                                                        &nbsp;<input type="text" name="total_floor" value="<?=$info['total_floor']?>" id="total_floor" class="int-text min-text"  size="2" maxlength="2">&nbsp;层

                                                        <?} else {?>


                                                        &nbsp;<input type="text" name="total_floor" value="" id="total_floor" class="int-text min-text"  size="2" maxlength="2">&nbsp;层

                                                        <? } ?>

                                                    </div>
                                                </div>





                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>户&nbsp;&nbsp;&nbsp;&nbsp;型:</label>
                                                    <div class="col-md-5">
                                                        <select name="shi" class="int-text min-text"  style="width:35px;display: inline" id="room_select">

                                                            

                                                            <? foreach($this->config->apa_room_option as $key=>$item) {
                                                               
                                                                     $selected="";
                                                                    if($key ==$info['shi'] && !empty($info['shi'])){
                                                                        $selected="selected";
                                                                        echo " <option label=".$key." value=".$info['shi']." selected=".$selected.">".$key."</option>";
                                                                    }else{

                                                                     echo " <option label=".$key." value=".$key." >".$key."</option>";

                                                                }

                                                            }
                                                            ?>

                            

                                                        </select>室&nbsp;
                                                        <select name="ting" class="int-text min-text"  style="width:35px;display: inline" id="ting_select">




                                                            <? foreach($this->config->ting_option as $key=>$item) {
                                                             
                                                                    $selected="selected";
                                                                    if($key==$info['ting'] && !empty($info['ting'])){
                                                                        $selected="selected";
                                                                        echo " <option label=".$key." value=".$info['ting']." selected=".$selected.">".$key."</option>";

                                                                    }else{
                                                                     echo " <option label=".$key." value=".$key." >".$key."</option>";

                                                                }

                                                                
                                                                
  
                                                            }
                                                            ?>



                                                        </select>厅&nbsp;
                                                        <select name="wei" class="int-text min-text"  style="width:35px;display: inline" id="toilet_select">
                                                           
                                                          
                                                            <? foreach($this->config->wei_option as $key=>$item) {
                                                              
                                                                    $selected="";
                                                                    if($key==$info['wei'] &&!empty($info['wei'])){
                                                                        $selected="selected";
                                                                        echo " <option label=".$key." value=".$info['wei']." selected=".$selected." >".$key."</option>";

                                                                     }else{

                                                                     echo " <option label=".$key." value=".$key." >".$key."</option>";

                                                                }  
  
                                                            }
                                                            ?>


                                                        </select>卫&nbsp;
                                                        <select name="porch" class="int-text min-text"  style="width:35px;display: inline" id="porch_select">
                                                           

                                                           <? foreach($this->config->porch_option as $key=>$item) {
                                                           
                                                                $selected="";
                                                                if($key ==$info['porch'] && !empty($info['porch'])){
                                                                $selected="selected";

                                                                echo " <option label=".$key." value=".$info['porch']." selected=".$selected.">".$key."</option>";


                                                                }else{

                                                                echo " <option label=".$key." value=".$key." >".$key."</option>";

                                                                }
                                                                
                                                            }
                                                            ?>


                                                        </select>阳台
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>房屋朝向:</label>
                                                    <div class="col-md-5">
                                                        <select name="toward" id="toward1" class="int-text min-text"  style="width:120px;">
                                                            
                                                            

                                                              <? foreach($this->config->orientation_option as $key=>$item) {
                                                             
                                                                    $selected="";
                                                                    if($key ==$info['toward'] &&!empty($info['toward'])){
                                                                    $selected="selected";
                                                                    echo " <option label=".$item." value=".$info['toward']." selected=".$selected.">".$key." </option>";

                                                                    }else{

                                                                    echo " <option label=".$item." value=".$key." >".$key."</option>";

                                                                }
                                                                
                                       
                                              
                                                            }
                                                            ?>



                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="shadow_line"></div>
                                                <div class="publish_title">
                                                    <span class="f_brown">其他信息</span>
                                                </div>
                                                <div class="dashed_line"></div>



                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name">
                                                        <span class="require">*</span>装修状况:
                                                    </label>
                                                    <div class="col-md-7">
                                                        <? foreach($this->config->fitment_option as $key=>$item) {
                                                           
                                                                $checked="";
                                                                if($key==$info['fitmen_type'] && !empty($info['fitmen_type'])){
                                                                    $checked="selected";
                                                                    echo " <input type='radio' name='fitmen_type'   value=".$info['fitmen_type']." checked=".$checked."> ".$item." ";

                                                                }else{

                                                                 echo " <input type='radio' name='fitmen_type' value=".$key." > ".$item." ";

                                                            }

                                                            }
                                                        ?>

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>建筑面积:</label>
                                                    <div class="col-md-5">

                                                        <? if(null!==$info['total_area']) {?>

                                                        <input type="text" size="8" name="total_area" value="<?=$info['total_area']?>" id="total_area"  class="int-text" style="width:120px;" >&nbsp;平方米

                                                        <?} else {?>


                                                        <input type="text" size="8" name="total_area" value="" id="total_area" class="int-text" style="width:120px;">&nbsp;平方米


                                                        <? } ?>


                                                    </div>
                                                </div>




                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>分摊面积:</label>
                                                    <div class="col-md-5">

                                                        <? if(null!==$info['out_area']) {?>


                                                         <input type="text" size="8" name="out_area" value="<?=$info['out_area']?>" id="out_area" class="int-text" style="width:120px;">&nbsp;平方米


                                                        <?} else {?>

                                                        <input type="text" size="8" name="out_area" value="" id="out_area" class="int-text" style="width:120px;">&nbsp;平方米


                                                        <?}?>


                                                       


                                                    </div>
                                                </div>




                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name">房源描述:</label>
                                                    <div class="col-md-5">


                                                            <? if(null!==$info['selling_point']) {?>
                                                              <textarea name="selling_point" id="selling_point" class="int-text" style=" height:100px; margin-top:5px;" onkeyup="countTextLength('selling_point',5000)"><?=$info['selling_point']?></textarea>
                                                            <?} else {?>

                                                              <textarea name="selling_point" id="selling_point" class="int-text" style=" height:100px; margin-top:5px;" onkeyup="countTextLength('selling_point',5000)"></textarea>


                                                            <? } ?>
                                                        
                                                    </div>
                                                    <div class="col-md-5">

                                                        此处可详细描述该房源的特点，如：楼盘周边学校情况、周边环境等；
                                                        <div class="description">此处还可输入<span class="text-orange" id="selling_pointTEXT">5000</span>个字</div>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name">配套设施:</label>
                                                    <div class="col-md-8">

                                                            <? foreach($this->config->facilities as $key=>$item) {
                                                                    $checked = '';
                                                                    if(in_array($key,$info['facilities'] )&&!empty($info['facilities'])){$checked = 'checked';
                                                                         echo " <div style='width:24.5%;text-align:left;float:left;' id='facilities'>";
                                                                         echo  "<input type='checkbox' name='facilities[]' value=".$info['facilities']."  checked=".$checked.">".$item."";
                                                                         echo "</div>";

                                                                    }else{
                                                                     echo " <div style='width:24.5%;text-align:left;float:left;' id='facilities'>";
                                                                     echo  "<input type='checkbox' name='facilities[]' value=".$key.">".$item."";
                                                                     echo "</div>";

                                                                }
                                                            }
                                                            ?>

                                                         <div style="width:24.5%;text-align:left;float:left;"></div>



                                                        <div style="width:24.5%;text-align:left;float:left;color:red;cursor:hand;">
                                                            <input type="checkbox" id="i_facilities" onclick="select_all(this);" style="padding:0;">
                                                            <font color="#4A7911">配套设施-全选</font>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="shadow_line"></div>
                                                <div class="publish_title">
                                                    <span class="f_brown">房东信息</span>
                                                </div>
                                                <div class="dashed_line"></div>




                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>联系人:</label>


                                                    <div class="col-md-5">

                                                        <? if(!empty($info['linkman'])) {?>

                                                        <input type="text" name="linkman" value="<?=$info['linkman']?>" class="int-text" id="linkman" class="form-control">

                                                        <?} else {?>

                                                         <input type="text" name="linkman" value="" class="int-text" id="linkman" class="form-control">

                                                        <? } ?>


                                                    </div>



                                                </div>



                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>联系电话:</label>
                                                    <div class="col-md-5">


                                                        <? if(!empty($info['telphone'])) { ?>

                                                        <input type="text" name="telphone" value="<?=$info['telphone']?>" id="telphone" class="int-text"><span class="f_red" style="display:none;">提示：您所填写的电话号码存在不良记录，需要管理员审核通过之后才能在网站公示！</span>

                                                        <?} else {?>


                                                        <input type="text" name="telphone" value="" id="telphone" class="int-text"><span class="f_red" style="display:none;">提示：您所填写的电话号码存在不良记录，需要管理员审核通过之后才能在网站公示！</span>

                                                        <? } ?>


                                                    </div>
                                                </div>




                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>卖(租)房要求:</label>
                                                    <div class="col-md-5">
                                                        <textarea name="link_require" id="link_require" class="int-text" style=" height:60px; margin-top:5px;" onkeyup="countTextLength('link_require',5000)"></textarea>
                                                    </div>
                                                    <div class="col-md-5">填写联系时间、看房时间等，如：看房时间下午6点后！</div>
                                                </div>





                                                <div class="shadow_line"></div>
                                                <div class="publish_title">
                                                    <span class="f_brown">添加图片</span>
                                                </div>
                                                <div class="dashed_line"></div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>外景图:</label>
                                                    <div class="col-md-5">
                                                        <div id="idPicFile1" class="btn btn-success fileinput-button mbm" data='1'>上传图片</div>
                                                        <table>
                                                            <tbody id="idPicList1" class="showpicfile">
                                                             
                                                            </tbody>
                                                        </table>
                                                        <table>
                                                            <tbody class="showpicfile">

                                                                    <? if(!empty($info['on_pic']) ) {?>
                                                                        <? foreach ($info['on_pic'] as $key => $value) { 
                                                                        echo "<tr>";
                                                                        echo "<td align='left'>";
                                                                        echo "<a onclick='delimg(".$value['attach_id'].",this);'>移除</a>";
                                                                        echo "<img src=".$value['url']." width='150' height='100' alt=''>";
                                                                        echo "</td>";
                                                                        echo "</tr>";
                                                                          
                                                                       }?>



                                                                   
                                                                    <?}?>

                                                            
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="name"><span class="require">*</span>室内图:</label>
                                                    <div class="col-md-5">
                                                        <div id="idPicFile2" class="btn btn-success fileinput-button mbm">上传图片</div>
                                                        <table>
                                                            <tbody id="idPicList2" class="showpicfile">
                                                            </tbody>
                                                        </table>
                                                        <table>
                                                            <tbody class="showpicfile">

                                                                    <? if(!empty($info['in_pic']) ) {?>
                                                                        <? foreach ($info['on_pic'] as $key => $value) { 
                                                                        echo "<tr>";
                                                                        echo "<td align='left'>";
                                                                        echo "<a onclick='delimg(".$value['attach_id'].",this);'>移除</a>";
                                                                        echo "<img src=".$value['url']." width='150' height='100' alt=''>";
                                                                        echo "</td>";
                                                                        echo "</tr>";
                                                                          
                                                                       }?>
                                                                   
                                                                    <?}?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="shadow_line"></div>

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-lg-9 col-lg-offset-3">
                                                <button type="submit" class="btn btn-success">提交</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!--END CONTENT-->
                </div>
            </div>
            <!--END PAGE CONTENT-->
        </div>
        <!--END PAGE WRAPPER-->
    </div>
    <!--BEGIN FOOTER-->
    <!--END FOOTER-->
</div>

<?
$jsArr = array(
    
  
    "/js/vendor/AutoComplete/jquery.autocomplete-min.js",
    "/js/vendor/bootstrap-datepicker/bootstrap-datepicker.js",
    "/js/vendor/jUploader/jquery.jUploader-1.0.min.js",
    "/js/plugins/artDialog/artDialog.source.js?skins=default",
      "/js/plugins/artDialog/plugins/iframeTools.js",

);
Form::jsmin($jsArr);
?>



<script>
    jQuery(document).ready(function () {
        "use strict";
        JQueryResponsive.init();
        Layout.init();
$('.datepicker').datepicker();

        //自动加载
        var onComSelect = function(value,id) {
            $.ajax({
                type: "POST",
                dataType:"json",
                url: "/user_resold_sale/getDistrictById?num="+Math.random(),
                data: "id="+id,
                success: function(msg){
                    $("#reside").val(msg.reside);
                    $("#address").val(msg.address);
                    $("input[type=radio][name=pm_type][value="+msg.pm_type+"]").attr("checked",'checked');
                    $("select[name=borough] option[value="+msg.borough+"]").attr("selected",true) ;
                    $("#trade_circle").val("学校："+msg.school+"|商场："+msg.market+"|医院："+msg.hospital+"|邮局："+msg.postoffice+"|银行："+msg.bank+"|其他："+msg.other+"");
                    $("#traffic").val(msg.traffic);
                    $("#map_x").val(msg.map_x);
                    $("#map_x1").val(msg.map_x);
                    $("#map_y").val(msg.map_y);
                    $("#map_y1").val(msg.map_y);
                    $("#district_id").val(msg.Id);
                    $("#circle").val(msg.circle);
                    $("#tube").val(msg.tube);
                }
            });
        }
        $('#reside').autocomplete({
            serviceUrl:"/user_resold_sale/ajaxXqlist",
            width: 235,
            delimiter: /(,|;)\s*/,
            params:{},
            onSelect: onComSelect
        });

        var PicTr=0;
        $.jUploader({
            button: 'idPicFile1',
            action: '/user_resold_sale/uploadImg',
            onUpload: function (fileName) {
                PicTr++;
                $("#idPicList1").append(getTr('idPicList1',PicTr,'1'));
            },
            onComplete: function (fileName, response) {
                if (response.status=='1') {
                    var newclick = eval("(function(){delNImg('"+response.id+"',this)});");
                    $("#idPicList1"+PicTr).attr('onclick','').click(newclick);
                    $("#imgidPicList1"+PicTr).append("<img src='"+response.url+"' width='150' height='100' />");
                    $("#imgUploadidPicList1"+PicTr).val(response.id);
                } else {
                    $("#idPicList1"+PicTr).parent('td').parent('tr').remove();
                     alert('上传失败'+PicTr);
                }
            }
        });

        $.jUploader({
            button: 'idPicFile2',
            action: '/user_resold_sale/uploadImg',
            onUpload: function (fileName) {
                PicTr++;
                $("#idPicList2").append(getTr('idPicList2',PicTr,'2'));
            },
            onComplete: function (fileName, response) {
                if (response.status=='1') {
                    var newclick = eval("(function(){delNImg('"+response.id+"',this)});");
                    $("#idPicList2"+PicTr).attr('onclick','').click(newclick);
                    $("#imgidPicList2"+PicTr).append("<img src='"+response.url+"' width='150' height='100' />");
                    $("#imgUploadidPicList2"+PicTr).val(response.id);
                } else {
                    $("#idPicList2"+PicTr).parent('td').parent('tr').remove();
                    alert('上传失败'+PicTr);
                }
            }
        });

    });

    var delimg = function($id,obj){
        if(confirm('确定删除吗?')){
            var a = $(obj).parent('td').slideUp('fast');
            $.get('/user_resold_sale/deluploadimg',{'id':$id},
                function($data){
                    if($data=='1')
                    {
                        $.dialog.tips('删除图片成功',2);
                    }
                    else
                    {
                        $.dialog.tips('删除图片失败',5);
                        $(obj).parent('td').slideDown('fast');
                    }
                }
            )

        }
    }
    var delNImg = function($id,obj) {
        if(confirm('确定删除吗?')){
            var a = $(obj).parent('td').parent('tr').slideUp('fast');
            $.get('delNImg',{sp:$id},
                function($data){
                    if($data=='1')
                    {
                        alert('删除图片成功');
                    }
                    else
                    {
                        alert('删除图片失败',5);
                        $(obj).parent('td').parent('tr').slideDown('fast');
                    }
                }
            )

        }
    }
    var trRm = function(obj) {
        if(confirm('确定删除吗?')){
            $(obj).parent('td').parent('tr').remove();
        }
    }


    // $(function(){
    //     $("#price").click(function(){
    //         if($.trim($("#price").val())=='面议')$("#price").val('');
    //     }).blur(function(){ if($.trim($("#price").val()).length==0)$("#price").val('面议');})
    //     $("#live_date").click(function(){
    //         WdatePicker();
    //     }).blur(function(){
    //         if($.trim($("#live_date").val()).length==0){
    //             $("#live_date").val('立即入住');
    //         }
    //     })
    // })




    function select_all(obj){
        if($(obj).attr("checked")){
            $('input[name="facilities[]"]').attr("checked",'true');
        }else{
            $('input[name="facilities[]"]').removeAttr("checked");
        }
    }


    //验证劳务费
    function checkfee(){
        var fee = $("#rebate").val();
        if(isNumber(fee)){
            //判断劳务费是否大于总价的1%
            var maxfee = $("#price").val()*10000*0.01;
            if(parseInt(fee/1)>maxfee){
                alert("劳务费不能大于总价的1%！");
                return false;
            }
        }else{
            alert("请正确填写劳务费!");
            return false;
        }
    }

    //验证整数
    function IsInt(s)
    {
        var   patrn=/^[0-9]{1,20}$/;
        if   (!patrn.exec(s))   return   false
        return   true
    }
    //验证数字
    function isNumber(oNum)
    {
        if(!oNum) return false;
        var strP=/^\d+(\.\d+)?$/;
        if(!strP.test(oNum)) return false;
        try{
            if(parseFloat(oNum)!=oNum) return false;
        }
        catch(ex)
        {
            return false;
        }
        return true;
    }

    function countTextLength(IDname,maxLength)
    {
        var LengthId =IDname+'TEXT';
        var i = maxLength - $('#'+IDname).val().length;
        $('#'+LengthId).text(i);
    }

 

    function again()
    {
        $("#vilad_in").css("display","inline");
        $("#vilad_out").css("display",'none');
        $("#address").attr("readonly",false);
        $("#address").css("background-color","#fff");
        return false;
    }

    function getTr($pictr,PicTr,type)
    {
        var tr = "<tr>";
        tr += '<td align="left">';
        tr += '<a id="'+$pictr+PicTr+'" onclick="trRm(this);" >移除</a>';
        tr += '<span class="imgBorder" id="img'+$pictr+PicTr+'" >';
        //tr += '<img src="ui/images/loading.gif" alt="">';
        tr += '</span>';
        tr += '<input type="hidden" name="pic'+type+'[]" id="imgUpload'+$pictr+PicTr+'" >';
        tr += '</td>' ;
        tr += '</tr>';
        return tr;
    }

    function uploadImg(file,type)
    {
        $.post('/user_resold_sale',{'action':'uploadimg', fileElementId:file,'type':type},
            function($data){alert($data);
                if($data=='1')
                {
                    $.dialog.tips('删除图片成功',2);
                }
                else
                {
                    $.dialog.tips('删除图片失败',5);
                    $(obj).parent('td').slideDown('fast');
                }
            }
        )
    }

  
  function submitForm(){

    if($("#title").val().length==0){
        alert("请填写标题!");
        $("#title").focus();
        return false;
    }
    if($("#reside").val().length==0){
        alert("请填写小区!");
        $("#reside").focus();
        return false;
    }
    if($('#deposit').val().length==0){
         alert("请填写押金!");
        $("#deposit").focus();
        return false;
    }
    if($("#price").val().length==0){
        alert("请填写价格!");
        $("#price").focus();
        return false;
    }
    if($('#rent_live_date').val().length==0){
         alert("请填写入住时间!");
        $("#rent_live_date").focus();
        return false;
    }
    if($('#limit_day').val().length==0){
         alert("请填写最短期限!");
        $("#limit_day").focus();
        return false;
    }
    if($('#current_floor').val().length==0 ){
               alert("所在楼层没有填写!");
            $("#current_floor").focus();
            return false;
    }
     if($('#total_floor').val().length==0 ){
               alert("总楼层没有填写!");
            $("#total_floor").focus();
            return false;
    }
     if($('#total_area').val().length==0 ){
               alert("建筑面积没有填写!");
            $("#total_area").focus();
            return false;
    }

 if($('#out_area').val().length==0 ){
               alert("分摊面积没有填写!");
            $("#out_area").focus();
            return false;
    }
 if($('#selling_point').val().length==0 ){
               alert("房源描述没有填写!");
            $("#selling_point").focus();
            return false;
    }
if($('#linkman').val().length==0 ){
               alert("联系人必须填写!");
            $("#linkman").focus();
            return false;
    }
if($('#telphone').val().length==0 ){
               alert("联系电话必须填写!");
            $("#telphone").focus();
            return false;
    }
if($('#link_require').val().length==0 ){
                   alert("卖(租)房要求没有填写!");
                $("#link_require").focus();
                return false;
        }

  }

   
</script>
</body>
</html>
