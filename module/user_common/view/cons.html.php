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
    <title>看房记录-个人中心</title>
    <link rel="stylesheet" href="/css/fonts/open_sans.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_simple-line-icons.css" type="text/css">
    <link rel="stylesheet" href="/js/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/js/vendor/bootstrap-datepicker/datepicker.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_core.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_system.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_system-responsive.css" type="text/css">
    <link rel="stylesheet" href="/css/mtek_self.css" type="text/css">
    <link rel='stylesheet' href='/theme/client/css/user_center.css' type='text/css' media='screen' />
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
                    '看房记录',
                    'user_common');
                ?>
                <!-- end  page header-->

                <div class="box-content"><!--BEGIN CONTENT-->
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="navbar-form navbar-left mln mbm"  name="opform" id="opform" method="get" action="/user_common/cons">
                                    <ul class="nav navbar-nav navbar-left" style="margin-bottom:0;float:left">
                                        <li>
                                            <div class="form-group">
                                                查看时间: <input type="text" id="starttime" name="starttime" value="<?if(isset($_GET['starttime'])){echo $_GET['starttime'];}?>" class="form-control datepicker-default" placeholder=""> -
                                                <input type="text" id="endtime" name="endtime" value="<?if(isset($_GET['endtime'])){echo $_GET['endtime'];}?>" class="form-control datepicker-default" placeholder="">
                                            </div>
                                            <button type="submit" class="btn btn-default">搜索</button>
                                        </li>
                                        <li>
                                            <div class="form-group mlm mtm"><a href="/user_common/cons">清空所有搜索条件</a></div>
                                        </li>
                                    </ul>
                                </form>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>编号(自编号)</th>
                                    <th>房源基本信息</th>
                                    <th>房东信息</th>
                                    <th>查看时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? foreach($res as $key=>$info){ ?>
                                    <tr>
                                        <? $url=""; if($info['house_type'] == 1){$url="/rent/detail?id=".$info['id'];}else{$url="/sale/detail?id=".$info['id'];} ?>
                                        <td><?=$info['esf_id'] ?></td>
                                        <td>
                                            <p><a href="<?=$url ?>" target="_blank"><?=$info['title'] ?></a> <span class="text-warning">[图]</span></p>
                                            <p><?=$info['shi'] ?>室<?=$info['ting'] ?>厅<?=$info['wei'] ?>卫 <?=$info['total_area'] ?>m² <span class="text-danger">90</span><?=$info['house_type']==1?"元/月":"万元"?></p>
                                        </td>
                                        <td>
                                            <?
                                                if(strstr($esfidstr,$info['id'])){
                                                    $name = $info['linkman']==''?'未提供':$info['linkman'];
                                                    $information =  "<p><span class='text-muted'>房东:</span>".$name." <span class='text-muted'>电话:</span>".$info['telphone']."</p>
                                                    <p>房东提示：暂无提示</p>";
                                                }else{
                                                    $information = "未获取房东信息 <a href='".$url."'>前往获取</a>";
                                                }
                                                echo $information;
                                            ?>
                                        </td>
                                        <td>
                                            <?=date("Y-m-d H:i:s",$info['create_date'])?>
                                        </td>
                                    </tr>
                                <? } ?>

                                </tbody>
                            </table>

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
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/js/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>

<script>
    jQuery(document).ready(function () {
        "use strict";
        $('.datepicker-default').datepicker();
    });


</script>
</body>
</html>
