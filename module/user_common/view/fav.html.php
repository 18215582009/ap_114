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
    <title>我的收藏-个人中心</title>
    <?=Form::cssmin();?>
    <link rel='stylesheet' href='/theme/client/css/user_center.css' type='text/css' media='screen' />
    <!-- Theme CSS -->
    <link href="/theme/agency/css/agency.css" rel="stylesheet">
    <style>
        #mengban {
            width : 100%;
            height: 100%;
            position : absolute;
            z-index : 99;
        }
    </style>
</head>
<body class="font-source-sans-pro sidebar-color-white">
<div class="fluid">
    <?php include '../../user_center/view/navigation.html.php';?>

    <div id="wrapper"><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">

            <!--BEGIN SIDEBAR MAIN-->
            <?php include '../../user_center/view/left_easy.html.php';?>
            <!--END SIDEBAR MAIN-->

            <!--BEGIN PAGE CONTENT-->
            <div class="page-content"><!--BEGIN TITLE & BREADCRUMB PAGE-->

                <!-- begin page header-->
                <?=lib\form\Form::bread_crumb(
                    '我的收藏',
                    'user_common');
                ?>
                <!--弹出提示-->

                <div id="mengban" style="display:none">
                    <div id="prompt" style="display: none;box-shadow: 2px 4px 10px #000;z-index: 2;background-color: #fbfbfb;width:300px;height:180px;position: fixed;left: 40%;top:32%;text-align: center;font-size: 20px">
                        <div style="padding-top: 55px">
                            <span style="" class="glyphicon glyphicon-trash"></span> <span>确认删除此房源</span> <br/>
                            <input id="houseid" value="" type="hidden"/>
                        </div><br/>
                        <button id="confirm" class="btn">确认</button> <button id="cancel" class="btn">取消</button>
                        <button style="display: none" id="close" class="btn">关闭</button>
                    </div>
                </div>
                <!-- end  page header-->
                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                            <form name="opform" id="opform" method="get" action="/user_common/fav">
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
                                            </ul>
                                        </div>
                                    </div>

                            </form>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>编号(自编号)</th>
                                    <th>房源基本信息</th>
                                    <th>收藏时间</th>
                                    <th>房屋状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? foreach($house as $info){ ?>
                                    <? $url=""; if($info['fhouse_type'] == 1){$url="/rent/detail?id=".$info['id'];}else{$url="/sale/detail?id=".$info['id'];} ?>
                                    <tr>
                                        <td><?=$info['id']?></td>
                                        <td>
                                            <p><a href="<?=$url?>" target="_blank">
                                                    <? if(!empty($info['title'])){
                                                        echo $info['title'];
                                                    }else{
                                                        $this->loadModel('sale');
                                                        $title = $this->sale->title($info);
                                                        echo $title['title'];
                                                    }?>
                                            </a> <? if(!empty($info['img_path'])){echo "<font color='#FF6600'>[图]</font> ";} ?><?=$info['shi']?>室<?=$info['ting']?>厅<?=$info['wei']?>卫
                                            <?=$info['total_area']?>m² <font color="#FF0000"><?=round($info['price'])?></font><?=$info['fhouse_type']==1?"元/月":"万元"?></p>
                                        </td>
                                        <td>
                                            <?=date("Y-m-d H:i:s",$info['fcreate_date'])?>
                                        </td>
                                        <td><span class="label label-sm label-success"><?=$info['flag']==0?"无效":"有效"?></span></td>
                                        <td>
                                            <a href="<?=$url?>" target="_blank">查看</a>
                                            <a href="#" onclick="leave('<?=$info['id']?>');">删除</a>
                                        </td>
                                    </tr>
                                <? } ?>
                                </tbody>
                            </table>
                            <div id="pagination">
                                <?=$pageNation ?>
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
    "/js/plugins/artDialog/artDialog.source.js?skins=default",
    "/js/plugins/artDialog/plugins/iframeTools.js"
);
Form::jsmin($jsArr);
?>

<script>
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

    $("#confirm").click(function(){
        $("#prompt").css("display","none");
        $.ajax({
            type:'POST',
            url:'/user_common/delete',
            dataType:'JSON',
            data:{
                houseid:$("#houseid").val()
            },
            success:function(result){
                $("#prompt>div>span:eq(1)").html("删除成功");
                $("#prompt>div>span:eq(0)").attr("class","glyphicon glyphicon-ok");
                $("#prompt").css("display","block");
                $("#confirm").css("display","none");
                $("#cancel").css("display","none");
                $("#close").css("display","inline-block");
            },
            error:function(result){alert('no');}
        })
    });


    $("#cancel").click(function(){
        $("#prompt").css("display","none");
        $("#confirm").css("display","inline-block");
        $("#mengban").css("display","none");
        $("#topdiv").css("display","none");
//        $("body").css("overflow","auto");
    });
    $("#close").click(function(){
        window.location = "/user_common/fav";
    });


    function leave(id){
        $("#houseid").val(id);
        $("#prompt").css("display","block");
        $("#mengban").css("display","");
//        $("body").css("overflow","hidden");
    }



</script>
</body>
</html>
