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
    <title><? if(($house_type == 1)) {?> <?=$this->config->module->rentname;?> <?} else {?>  <?=$this->config->module->salename;?>  <? } ?>-个人中心</title>
    <?=Form::cssmin();?>
    <link rel='stylesheet' href='/theme/client/css/user_center.css' type='text/css' media='screen' />
</head>
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


                 <div id="prompt" style="display:none;box-shadow: 2px 4px 10px #000;z-index: 2;background-color: #fbfbfb;width:300px;height:180px;position: fixed;left: 40%;top:32%;text-align: center;font-size: 20px">
                    <div style="padding-top: 55px">
                        <span style="" class="glyphicon glyphicon-trash"></span> <span>确认删除此房源</span> <br/>
                        <input id="houseid" value="" type="hidden"/>
                    </div><br/>
                    <button id="confirm" class="btn">确认</button> <button id="cancel" class="btn">取消</button>
                    <button style="display: none" id="close" class="btn">关闭</button>
                </div>


                   <div id="del_success" style="display:none;box-shadow: 2px 4px 10px #000;z-index: 2;background-color: #fbfbfb;width:300px;height:180px;position: fixed;left: 40%;top:32%;text-align: center;font-size: 20px">
                    <div style="padding-top: 55px">
                        <span style="" class="glyphicon "></span> <span>删除房源成功</span> <br/>
                    </div><br/>
                    
                </div>



                <!-- end  page header-->

                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                            <!--<p>您最多可刷新 5 次房源,您已经刷新了3次房源,您还可以刷新2次房源！(刷新房源可以使您的房屋在搜索时排列靠前)</p>-->
                            <form name="opform" id="opform" method="get" action="<?=$handle?>">
                                    <input type="hidden" name="house_type" value="<?=$house_type?>" id="house_type">
                                    <div class="btn-toolbar mtm mbm">

                                        <div class="input-group pull-left">
                                            <ul class="list-group mail-action list-unstyled list-inline" style="margin-bottom:0;float:left">
                                                <li>
                                                    <div class="input-group">
                                                        <input name="keyword" class="form-control pull-left" id="keyword" value="" placeholder="请输关键字" type="text">
                                                        <div class="input-group-btn">
                                                            <button type="submit" class="btn btn-info">搜索</button>

                                                        </div>
                                                       
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="input-group">
                                                        <? if($house_type == 1) {?>
                                                         <a href="add?house_type=<?=$house_type?>" class="btn btn-info">发布出租</a>

                                                         <?} else {?>

                                                             <a href="add?house_type=<?=$house_type?>" class="btn btn-info">发布房源</a>

                                                         <?}?>


                                                     </div>
                                                     

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                            </form>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>编号(自编号)</th>
                                    <th>房源基本信息</th>
                                    <th>访问统计(次)<!--昨日/本月--></th>
                                    <th>上一次刷新时间</th>
                                    <th>查看电话次数(人)</th>
                                    <th>佣金(元)</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <? foreach ($arr_list as $key => $value) { ?>

                                        <tr>
                                            <td><?=$value['id']?></td>
                                            <td>
                                                <p><a href="#" target="_blank"><?if($value['title']==''){$this->loadModel('sale'); $title = $this->sale->title($value);echo $title['title'];}else{ echo $value['title'];} ?></a> <span class="text-warning"><?=$value['img_path']==''?'':$value['img_path'] ?></span></p>
                                                <p><?=$value['shi']?>室<?=$value['ting']?>厅<?=$value['wei']?>卫 <?=$value['total_area']?>m² <span class="text-danger"><?=$value['price']?></span>万元</p>
                                            </td>
                                            <td><?=$value['hits']?></td>
                                            <td><?=$value['refresh_date']?></td>
                                            <td><span class="label label-sm label-success">3</span></td>
                                            <td><?=$value['rent_deposit']?></td>
                                            <td>
                                                <a href="/sale/detail?id=<?=$value['id']?>" target="_blank" class="btn btn-info">查看</a>
                                                <a href="edit?house_type=<?=$house_type?>&esf_id=<?=$value['id']?>" target="_blank" class="btn btn-info">编辑</a>
                                                <a href="#" onclick="del('<?=$value['id']?>');" class="btn btn-info">删除</a>

                                               
                                                   <input type="button" value="刷新" onclick="refresh(<?=$value['id']?>)" class="btn btn-info" id="refresh"/>
              
                                              
                                            </td>
                                        </tr>
      
                                    <? } ?>

                                </tbody>
                            </table>
                                <div class="row">
                                    <ul class="pagination pull-right">
                                        <?=$splitPageStr?>
                                    </ul>
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-lg-12">
                                <b>房源管理说明：</b>
                                <ol>
                                    <li>出租房源</li>
                                    <li>展示到期房源：出售/租房源线上展示150天后会自动转移到展示到期房源，将不在网页上显示，如需恢复，可点击“有效”。</li>
                                    <li>失效房源：如个人所属房源已完成交易或房源有问题，即可从房源库中点击“失效”，后期仍可恢复，失效房源将不在网页上显示。</li>
                                    <li>自助广告房源：选择使用自助广告功能的房源，通过自助广告，可以使您的房源曝光率大大增加，并可在百度、Google上更容易找到您的房源。</li>
                                    <li>出售房源</li>
                                    <li>展示到期房源：出售/租房源线上展示150天后会自动转移到展示到期房源，将不在网页上显示，如需恢复，可点击“有效”。</li>
                                    <li>失效房源：如个人所属房源已完成交易或房源有问题，即可从房源库中点击“失效”，后期仍可恢复，失效房源将不在网页上显示。</li>
                                </ol>
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

<script type="text/javascript">



</script>

<?
$jsArr = array(
        "/js/plugins/artDialog/artDialog.source.js?skins=default",
     "/js/plugins/artDialog/plugins/iframeTools.js",

   
);
Form::jsmin($jsArr);
?>

<script>
 function refresh(data){
    var url = "index"
     $.ajax({
      url: url,
      type: 'POST',
      dataType: 'json',
      data:{
        data:data
      },
      success: function (status) {
        if(status){
        $.each(status,function(){
          if(status.status==1){
            alert("刷新成功");
            location.href=location.href;
          }
        });
      
        }
      },
    })
 }
  $("#confirm").click(function(){
        $("#prompt").css("display","none");
        var url = "del"
        $.ajax({
            type:'POST',
            url:url,
            dataType:'JSON',
            data:{
                houseid:$("#houseid").val()
            },
            success:function(result){
                if(result.status==1){
                    $("#del_success").show().delay(1000).hide(0);
                    location.href=location.href;
                }
            },
            error:function(result){alert('参数错误');}
        })
    });

    $("#cancel").click(function(){
        $("#prompt").css("display","none");
    });

    function del(id){
        $("#houseid").val(id);
        $("#prompt").css("display","block");
    }




    jQuery(document).ready(function () {
        "use strict";
        JQueryResponsive.init();
        Layout.init();
        //page_pricing_table.init();
        //$("#main").height($(window).height()-60);

    });

    jQuery(document).ready(function () {
        index.init();
    });





</script>
</body>
</html>
